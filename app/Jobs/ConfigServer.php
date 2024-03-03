<?php

namespace App\Jobs;

use App\Models\ConfigServerAction;
use App\Models\ConfigServerJob;
use App\Models\Server;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ConfigServer implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 300;
    public $failOnTimeout = true;
    public $tries = 0;

    private ConfigServerJob $configJob;
    private $settings;

    public function __construct(ConfigServerJob $configJob, $settings) {
        $this->configJob = $configJob;
        $this->settings = $settings;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->configJob->job_id = $this->job->getJobId();
        $this->configJob->save();

        $vpsUsername = $this->configJob->vps_username;
        $vpsPassword = $this->configJob->vps_password;
        $sshPort = $this->configJob->ssh_port;
        $ip = $this->configJob->ip;

        //settings
        $sshTimeout = 30;

        $sshpass = "sshpass -p '$vpsPassword'";
        $sshCmd = "$sshpass ssh -p $sshPort $vpsUsername@$ip -o UserKnownHostsFile=/dev/null -o StrictHostKeyChecking=no -o ConnectTimeout=$sshTimeout -o LogLevel=QUIET";
        
        $cmds = [
            [
                'action' => "Install Docker",
                'command' => "cp ",
            ], [
                'action' => "Setting Container",
                'command' => "",
            ]
        ];

        array_push($cmds, [
            'action' => "Upload ssh key",
            'command' => "mkdir -p ~/.ssh && $sshpass ssh-copy-id -o UserKnownHostsFile=/dev/null -o StrictHostKeyChecking=no -o ConnectTimeout=$sshTimeout -i $ovpnPath/ssh_key -p $sshPort $vpsUsername@$ip",
        ], [
            'action' => "Uploading necessary files to server",
            'command' => "rm -rf $ovpnPath/ovpn_config_files && mkdir $ovpnPath/ovpn_config_files "
                . "&& cp $ovpnPath/server/* $ovpnPath/ovpn_config_files && cp $ovpnPath/ca.crt $ovpnPath/ovpn_config_files && cp $ovpnPath/ta.key $ovpnPath/ovpn_config_files "
                . "&& $sshpass scp -rp -o StrictHostKeyChecking=no -P $sshPort $ovpnPath/ovpn_config_files/ $vpsUsername@$ip:~/ "
                . "&& rm -rf $ovpnPath/ovpn_config_files"
        ], [
            'action' => "Installing wg-easy",
            'command' => "$sshCmd \"sudo apt -qq update && sudo apt -qq install -y openvpn ufw\""
        ]);

        echo "\nStarting Wg installation";
        foreach ($cmds as $index => $cmd) {
            $output = array();
            $result_code = -1;
            $action = new ConfigServerAction();
            $action->config_job_id = $this->configJob->id;
            $action->order = $index + 1;
            $action->result_code = -1;
            $action->action = $cmd['action'];
            $action->result = "Running...";
            $action->save();

            echo "action={$action->action}\n";
            echo "command={$cmd['command']}\n";
            exec($cmd['command'] . " 2>&1", $output, $result_code);

            $action->result_code = $result_code;
            if ($result_code == 0) {
                echo "Command success\n";
                $action->result = "Success";
                $action->save();
                continue;
            }

            $action->result = implode("\n", $output);
            echo "Result=$result_code & Output={$action->result}\n";
            $action->save();

            echo "VPN server installation failed.\n";
            $this->server->status = 'failed';
            $this->server->save();
            $this->fail();
            return;
        }

        echo "VPN server installation finished successfully.\n";

        if ($this->settings['config_server_auto_add']) {
            $maxOrder = Server::max('order');
            $server = new Server();
            $server->is_enabled =  $this->settings['config_server_auto_add'] == '1' ? 1 : 0;
            $server->country_code = strtolower($this->server->country_code);
            $server->city = "";
            $server->ip = $this->server->ip_address;
            $server->port = $this->server->ssh_port;
            $server->vpn_username = $vpnUsername;
            $server->vpn_password = $vpnPassword;
            $server->order = $maxOrder ? $maxOrder + 1 : 0;
            $server->free_connect_duration = 0;
            $server->capacity = 100;
            $server->protocol = $this->server->vpn_protocol;
            $server->is_free = 1;
            $server->service_provider_link = "";
            $server->notes = "";
            $server->save();
            $this->server->server_id = $server->id;
        }

        $this->server->status = 'success';
        $this->server->save();
    }
}
