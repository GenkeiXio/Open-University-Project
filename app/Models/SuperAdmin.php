<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class SuperAdmin extends Authenticatable
{
    use Notifiable;

    protected $table = 'super_admins';
    protected $primaryKey = 'superadmin_id';

    protected $fillable = [
        'f_name', 'l_name', 'username', 'password', 'role', 'status'
    ];

    protected $hidden = ['password'];
}