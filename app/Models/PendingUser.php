<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendingUser extends Model
{
    protected $primaryKey = 'pending_id';

    protected $fillable = [
        'txt_fname',
        'txt_minitial',
        'txt_lname',
        'txt_extension',
        'txt_email',
        'verification_token',
        'email_verified_at',
        'status'
    ];
}
