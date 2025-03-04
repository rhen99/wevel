<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Novel extends Model
{
    public function user()
    {
        $this->belongsTo(User::class);
    }
    public function chapters()
    {
        $this->hasMany(Novel::class);
    }
}
