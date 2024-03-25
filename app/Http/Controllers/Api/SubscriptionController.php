<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Validator;
use ReceiptValidator\iTunes\Validator as iTunesValidator;

class SubscriptionController extends Controller
{
    /**
     * get plans
     *
     * @return JsonResponse
     */
    public function plans()
    {
        $plans = Plan::all();
        return response200($plans, __('Successfully retrieved plan data'));
    }

    /**
     * update subscription
     * 
     * @return JSONResponse
     */
    public function validateAndUpdateSubscription(Request $request)
    {
        $receiptBase64Data = $request->input('receipt_data');
        $yourSharedSecret = $request->input('shared_secret');

        $validator = new iTunesValidator(iTunesValidator::ENDPOINT_PRODUCTION);

        try {
            // Validate receipt with shared secret for recurring subscriptions
            $response = $validator->setSharedSecret($yourSharedSecret)
                ->setReceiptData($receiptBase64Data)
                ->validate();
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

        // Proceed with update only if receipt is valid
        if ($response->isValid()) {
            $user = auth('api')->user();
            foreach ($response->getLatestReceiptInfo() as $purchase) {
                $expiresDate = $purchase->getExpiresDate();
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
                    // insert to transaction table
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
                    $trx->payment_id = $purchase->getOriginalTransactionId();
                    $trx->payer_email = $user->email;
                    $trx->type = $request->type;
                    $trx->status = $request->status;
                    $trx->is_viewed = 0;
                    $trx->save();

                    $subs = $subscription->first();
                    $receipt = $response->getReceipt();
                    return response200($subs, __('Successfully update subscription data'));
                }
            }

        } else {
            return response()->json([
                'valid' => false,
                'result_code' => $response->getResultCode()
            ]);
        }
    }
}

