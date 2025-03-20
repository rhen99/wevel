<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Chapter;
use App\Models\User;

class Comment extends Model
{
    protected $fillable = [
        "username",
        "name",
        "content",
        "chapter_id"
    ];
    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
