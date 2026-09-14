<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = [
        'session_id',
        'ip_address',
        'display_name',
        'city',
        'country',
        'country_code',
        'device',
        'browser',
        'page_views',
        'last_activity_at',
    ];

    protected $casts = [
        'last_activity_at' => 'datetime',
    ];
}
