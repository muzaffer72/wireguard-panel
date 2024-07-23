<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigServerJob extends Model
{
    use HasFactory;

    protected $table = "config_server_jobs";

    /**
     * Scope a query to only include jobs of a given server IP.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $serverIp
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByServerIp($query, $serverIp)
    {
        return $query->where('ip', $serverIp);
    }
}
