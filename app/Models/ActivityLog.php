<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $fillable = [
        'actor_id',
        'actor_name',
        'actor_role',
        'module',
        'action',
        'details',
        'ip_address',
    ];
}