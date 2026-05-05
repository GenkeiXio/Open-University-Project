<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    // Point to the 'admins' table you just created
    protected $table = 'admins';

    // Specify the custom primary key from your SQL
    protected $primaryKey = 'admin_id';

    protected $fillable = [
        'txt_fname',
        'txt_minitial',
        'txt_lname',
        'txt_extension',
        'txt_email',
        'txt_password',
        'txt_role',
        'txt_status',
        'txt_position',
        'txt_permissions',
        'txt_lastlogin',
        'txt_lastlogout',
    ];

    protected $hidden = [
        'txt_password',
    ];

    protected $casts = [
        'txt_permissions' => 'array',
    ];
}