<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Server;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Validator;

class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $freeServers = Server::free()->get();
        $premiumServers = Server::premium()->get();
        return view('backend.servers.index', [
            'countries' => listCountries(),
            'statusOptions'        => ['1'=>'Enabled', '0'=>'Disabled'],
            'recommendOptions'        => ['1'=>'True', '0'=>'False'],
            'serverOptions'        => ['1'=>'Premium', '0'=>'Free'],
            'freeServers' => $freeServers,
            'premiumServers' => $premiumServers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'country' => ['required'],
            'state' => ['required'],
            'status' => ['required'],
            'ip_address' => ['required'],
            'port' => ['required'],
            'recommended' => ['required'],
            'is_premium' => ['required'],
        ]);
        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                toastr()->error($error);
            }
            return back();
        }
                
        $createServer = Server::create([
            'country' => $request->country,
            'state' => $request->state,
            'status' => $request->status,
            'ip_address' => $request->ip_address,
            'port' => $request->port,
            'recommended' => $request->recommended,
            'is_premium' => $request->is_premium,
        ]);
        if ($createServer) {
            toastr()->success(admin_lang('Added successfully'));
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function show(Subscription $subscription)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function edit(Server $server)
    {
        $form = (object) [
            'countries' => listCountries(),
            'statusOptions'        => ['1'=>'Enabled', '0'=>'Disabled'],
            'recommendOptions'        => ['1'=>'True', '0'=>'False'],
            'serverOptions'        => ['1'=>'Premium', '0'=>'Free'],
        ];
        return view('backend.servers.edit', ['server' => $server, 'form' => $form]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Server $server)
    {
        $validator = Validator::make($request->all(), [
            'country' => ['required'],
            'state' => ['required'],
            'status' => ['required'],
            'ip_address' => ['required'],
            'port' => ['required'],
            'recommended' => ['required'],
            'is_premium' => ['required'],
        ]);
        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                toastr()->error($error);
            }
            return back();
        }
        $updateServer = $server->update([
            'country' => $request->country,
            'state' => $request->state,
            'status' => $request->status,
            'ip_address' => $request->ip_address,
            'port' => $request->port,
            'recommended' => $request->recommended,
            'is_premium' => $request->is_premium,
        ]);
        if ($updateServer) {
            toastr()->success(admin_lang('Updated successfully'));
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function destroy(Server $server)
    {
        $server->delete();
        toastr()->success(admin_lang('Deleted successfully'));
        return back();
    }
}
