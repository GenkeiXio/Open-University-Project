<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = ['name', 'code', 'description'];
    
    public function researches()
    {
        return $this->hasMany(Research::class);
    }
}