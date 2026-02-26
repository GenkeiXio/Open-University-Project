<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    // Fillable allows mass assignment in your Seeder
    protected $fillable = [
        'title',
        'content',
        'image',
        'created_at'
    ];
}