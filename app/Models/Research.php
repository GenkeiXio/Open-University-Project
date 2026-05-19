<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    protected $table = 'researches';

    protected $fillable = [
        'title',
        'author',
        'level',
        'status',
        'program_id',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}