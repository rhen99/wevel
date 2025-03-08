<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Novel;

class Chapter extends Model
{
    public function novel()
    {
        return $this->belongsTo(Novel::class);
    }
}
