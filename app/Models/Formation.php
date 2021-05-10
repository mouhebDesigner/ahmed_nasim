<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;

    public function videos(){
        return $this->hasMany(Video::class);
    }

    public function participants(){
        return $this->belongsToMany(User::class);
    }
}
