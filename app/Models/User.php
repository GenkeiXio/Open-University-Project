<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
        use HasFactory;

    // Point to the 'users' table you just created
    protected $table = 'users';

    // Specify the custom primary key from your SQL
    protected $primaryKey = 'user_id';

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
