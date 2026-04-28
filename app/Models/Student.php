<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    protected $table = 'students';
    protected $primaryKey = 'student_id';

    protected $fillable = [
        'txt_fname',
        'txt_minitial',
        'txt_lname',
        'txt_extension',
        'txt_email',
        'txt_password',
        'txt_status',
        'txt_lastlogin',
        'txt_lastlogout',
    ];

    protected $hidden = ['txt_password'];

    // Accessors so Laravel's auth helpers work if needed later
    public function getAuthPassword()
    {
        return $this->txt_password;
    }

    // Full name helper
    public function getFullNameAttribute(): string
    {
        $parts = array_filter([
            $this->txt_fname,
            $this->txt_minitial ? $this->txt_minitial . '.' : null,
            $this->txt_lname,
            $this->txt_extension,
        ]);

        return implode(' ', $parts);
    }
}