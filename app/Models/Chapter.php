<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Novel;
use App\Models\Comment;

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
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
