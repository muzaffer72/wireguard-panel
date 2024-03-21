<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;
use Imdhemy\AppStore\Jws\Parser;
use Imdhemy\AppStore\Jws\AppStoreJwsVerifier;
use Imdhemy\AppStore\ServerNotifications\V2DecodedPayload;
use Illuminate\Support\Facades\Log;

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


	$jws = Parser::toJws($request->serverVerificationData);
        $d = V2DecodedPayload::fromJws($jws);
	Log::debug(print_r($d,true));die;

        $validator = Validator::make($request->all(), [
            'plan' => ['required', 'integer'],
            'expiry_at' => ['required'],
        ]);
        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }

        $plan = Plan::findOrFail($request->plan);
        $subscription = $subscription::where('user_id', $user->id);

        // $subs = $subscription->first();
        // $exp = explode(" ", $subs->expiry_at)[0] . " " . date("H:i:s");
        // if ($plan->interval == 1) {
        //     $expiry_at = Carbon::parse($exp)->addMonth();
        // } else {
        //     $expiry_at = Carbon::parse($exp)->addYear();
        // }

        $expiry_at = Carbon::parse($request->expiry_at);
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
