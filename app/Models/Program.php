<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
        public function researches()
    {
        return $this->hasMany(Research::class);
    }
}
