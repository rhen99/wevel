<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Novel extends Model
{
    protected $fillable = [
        "title",
        "description",
        "genre",
        "cover_image"
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function chapters()
    {
        return $this->hasMany(Novel::class);
    }
}
