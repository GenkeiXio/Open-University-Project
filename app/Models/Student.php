<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasFactory;

    // Point to the 'students' table
    protected $table = 'students';

    // Specify the custom primary key
    protected $primaryKey = 'student_id';

    protected $fillable = [
        'txt_fname',
        'txt_minitial',
        'txt_lname',
        'txt_extension',
        'txt_email',
        'txt_email_verified_at',
        'txt_password',
        'txt_lastlogin',
        'txt_lastlogout',
    ];

    protected $hidden = [
        'txt_password',
    ];
}
