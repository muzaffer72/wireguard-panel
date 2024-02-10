<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Server;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;

class ServerController extends Controller
{
    /**
     * get servers
     *
     * @return JsonResponse
     */
    public function index()
    {
        $user = auth('api')->user();
        $free = $user->subscription->plan->is_free;
        $servers = Server::where('status',1);

        if ($user->subscription->isExpired() || $free == 1) {
            $servers->where('is_premium', 0);
        }
        $servers = $servers->get();
        return response200($servers, __('Successfully retrieved servers data'));
    }

    /**
     * get random server
     *
     * @return JsonResponse
     */
    public function random()
    {
        $server = Server::inRandomOrder()->where('status',1)->where('is_premium',0)->first();
        return response200($server, __('Successfully retrieved random server data'));
    }

}
