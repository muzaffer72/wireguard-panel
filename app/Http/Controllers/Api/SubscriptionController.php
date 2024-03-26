<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Subscription as Subs;
use Imdhemy\GooglePlay\Subscriptions\SubscriptionPurchase;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Validator;
use Imdhemy\Purchases\Facades\Subscription;

;

class SubscriptionController extends Controller
{
    /**
     * Validate and update subscription
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function validateAndUpdateSubscription(Request $request)
    {
        $platform = $request->input('platform');

        switch ($platform) {
            case 'itunes':
                return $this->validateAndUpdateITunesSubscription($request);
                break;
            case 'googleplay':
                return $this->validateAndUpdateGooglePlaySubscription($request);
                break;
            default:
                return response()->json(['error' => 'Invalid platform specified'], 400);
        }
    }

    /**
     * Validate and update iTunes subscription
     *
     * @param Request $request
     * @return JsonResponse
     */
    private function validateAndUpdateITunesSubscription(Request $request)
    {
        $receiptBase64Data = $request->input('receipt_data');


        try {
            $receiptResponse = Subscription::appStore()->receiptData($receiptBase64Data)->verifyRenewable();
            $receiptStatus = $receiptResponse->getStatus();
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

        // Proceed with update only if receipt is valid
        if ($receiptStatus->isValid()) {
            $user = auth('api')->user();
            $latestReceiptInfo = $receiptResponse->getLatestReceiptInfo();
            $receiptInfo = $latestReceiptInfo[0];

            $expiresDate = $receiptInfo->getExpiresDate();
            $subscription = Subs::where('user_id', $user->id)->first();

            if (!$subscription) {
                return response()->json(['error' => 'Subscription not found'], 404);
            }

            $validator = Validator::make($request->all(), [
                'plan' => ['required', 'integer'],
                'price' => ['required'],
                'payment_gateway_id' => ['required'],
                'type' => ['required'],
                'status' => ['required'],
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()]);
            }

            $plan = Plan::findOrFail($request->input('plan'));

            $updateSubscription = $subscription->update([
                'plan_id' => $plan->id,
                'expiry_at' => $expiresDate,
                'status' => 1,
            ]);

            if ($updateSubscription) {
                // Insert into transaction table
                $trx = new Transaction();
                $trx->checkout_id = date("YmdHis") . "-" . $user->id . "-" . $plan->id;
                $trx->user_id = $user->id;
                $trx->plan_id = $plan->id;
                $trx->price = $request->price;
                $trx->total = $request->price;
                $data = array(
                    "price" => $request->price,
                    "tax" => "0.00",  // Nilai pajak tetap 0.00 seperti yang diminta dalam JSON awal
                    "total" => $request->price
                );
                $trx->details_before_discount = (object) $data;
                $trx->payment_gateway_id = $request->payment_gateway_id;
                $trx->payment_id = $receiptInfo->getOriginalTransactionId();
                $trx->payer_email = $user->email;
                $trx->type = $request->type;
                $trx->status = $request->status;
                $trx->is_viewed = 0;
                $trx->save();

                $receipt = $receiptResponse->getLatestReceiptInfo();
                return response()->json(['receipt' => $receipt, 'message' => __('Successfully update subscription data')]);
            }
        } else {
            return response()->json([
                'valid' => false,
                'result_code' => $receiptResponse->getStatus()
            ]);
        }
    }

    /**
     * Validate Google Play subscription
     *
     * @param Request $request
     * @return JsonResponse
     */
    private function validateAndUpdateGooglePlaySubscription(Request $request)
    {
        $productId = $request->input('product_id');
        $purchaseToken = $request->input('receipt_data');

        try {
            $subscriptionReceipt = Subscription::googlePlay()->id($productId)->token($purchaseToken)->get();
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

        $user = auth('api')->user();
        $expiresDate = $subscriptionReceipt->getExpiryTime();
        $subscription = Subscription::where('user_id', $user->id)->first();

        if (!$subscription) {
            return response()->json(['error' => 'Subscription not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'plan' => ['required', 'integer'],
            'price' => ['required'],
            'payment_gateway_id' => ['required'],
            'type' => ['required'],
            'status' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $plan = Plan::findOrFail($request->input('plan'));

        $updateSubscription = $subscription->update([
            'plan_id' => $plan->id,
            'expiry_at' => $expiresDate,
            'status' => 1,
        ]);

        if ($updateSubscription) {
            // Insert into transaction table
            $trx = new Transaction();
            $trx->checkout_id = date("YmdHis") . "-" . $user->id . "-" . $plan->id;
            $trx->user_id = $user->id;
            $trx->plan_id = $plan->id;
            $trx->price = $request->price;
            $trx->total = $request->price;
            $data = array(
                "price" => $request->price,
                "tax" => "0.00",  // Nilai pajak tetap 0.00 seperti yang diminta dalam JSON awal
                "total" => $request->price
            );
            $trx->details_before_discount = (object) $data;
            $trx->payment_gateway_id = $request->payment_gateway_id;
            $trx->payment_id = $subscriptionReceipt->getOrderId();
            $trx->payer_email = $user->email;
            $trx->type = $request->type;
            $trx->status = $request->status;
            $trx->is_viewed = 0;
            $trx->save();

            $subs = $subscription->first();
            return response()->json(['receipt' => $subscriptionReceipt, 'message' => __('Successfully update subscription data')]);
        }

    }
}
