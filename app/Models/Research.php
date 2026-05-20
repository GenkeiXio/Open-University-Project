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
        'degree',
        'document_type',
        'abstract',
        'published_date',
        'adviser',
        'chairperson',
        'panel_members',
        'keywords',
        'citation',
        'pdf_path',
        'uploaded_by',
    ];

    protected $casts = [
        'panel_members' => 'array',
        'keywords' => 'array',
        'published_date' => 'date',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}