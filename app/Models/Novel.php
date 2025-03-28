<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Chapter;

class Novel extends Model
{
    protected $fillable = [
        "title",
        "description",
        "genre",
        "cover_image",
        "is_published"
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }
}
