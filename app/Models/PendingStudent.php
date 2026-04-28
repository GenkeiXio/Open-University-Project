<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendingStudent extends Model
{
    protected $table      = 'pending_students';
    protected $primaryKey = 'pending_student_id';

    protected $fillable = [
        'txt_fname',
        'txt_lname',
        'txt_email',
        'txt_password',
        'status',
    ];
}