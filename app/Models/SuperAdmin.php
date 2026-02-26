<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class SuperAdmin extends Authenticatable
{
    use HasFactory;

    // Point to the 'admins' table you just created
    protected $table = 'admins';

    // Specify the custom primary key from your SQL
    protected $primaryKey = 'admin_id';

    protected $fillable = [
        'f_name',
        'l_name',
        'username',
        'password',
        'role',
        'status',
    ];

    protected $hidden = [
        'password',
    ];
}