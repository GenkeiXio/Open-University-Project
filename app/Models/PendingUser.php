<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendingUser extends Model
{
    protected $primaryKey = 'pending_id';

    protected $fillable = [
        'txt_fname',
        'txt_lname',
        'txt_email',
        'txt_password',
        'status'
    ];
}
