<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faculty extends Model
{
    use HasFactory;

    // Point to the 'faculty' table you just created
    protected $table = 'faculty';

    // Specify the custom primary key from your SQL
    protected $primaryKey = 'faculty_id';

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
