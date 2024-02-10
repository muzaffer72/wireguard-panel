<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;

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
    public function update(Request $request, Subscription $subscription)
    {
        $user = auth('api')->user();

        $validator = Validator::make($request->all(), [
            'plan' => ['required', 'integer'],
        ]);
        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }

        $plan = Plan::findOrFail($request->plan);
        $subscription = $subscription::where('user_id', $user->id);

        $subs = $subscription->first();
        $exp = explode(" ", $subs->expiry_at)[0] . " " . date("H:i:s");
        if ($plan->interval == 1) {
            $expiry_at = Carbon::parse($exp)->addMonth();
        } else {
            $expiry_at = Carbon::parse($exp)->addYear();
        }

        $updateSubscription = $subscription->update([
            'plan_id' => $plan->id,
            'expiry_at' => $expiry_at,
            'status' => 1,
        ]);
        if ($updateSubscription) {
            $subs = $subscription->first();
            return response200($subs, __('Successfully update subscription data'));
        }
    }
}
