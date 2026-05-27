<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnalyticsEvent extends Model
{
    protected $fillable = [
        'event_type',
        'platform',
        'ip_address',
        'user_agent',
        'referrer',
    ];
}
