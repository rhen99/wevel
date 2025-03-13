<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Novel;

class Chapter extends Model
{
    protected $fillable = [
        "title",
        "content",
        "chapter_number"
    ];
    public function novel()
    {
        return $this->belongsTo(Novel::class);
    }
}
