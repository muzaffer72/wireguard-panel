<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;

class FreeSubscriptionController extends Controller
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
    public function update(Request $request, Subscription $subscription)
    {
        $user = auth('api')->user();
        $expiry_at = Carbon::parse($subscription->expiry_at)->addYear();
        $plan = Plan::find(13);
        $validator = Validator::make($request->all(), [
            'plan' => $plan,
            'expiry_at' => $expiry_at,
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }


        $subscription = $subscription::where('user_id', $user->id);

        $updateSubscription = $subscription->update([
            'plan_id' => 13,
            'expiry_at' => $expiry_at,
            'status' => 1,
        ]);
        if ($updateSubscription) {
            $subs = $subscription->first();
            return response200($subs, __('Successfully update subscription data'));
        }
    }
}

