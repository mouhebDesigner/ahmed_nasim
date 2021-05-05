<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quizze extends Model
{
    use HasFactory;

    public function matiere(){
        return $this->belongsTo(Matiere::class);
    }

    public function questions(){
        return $this->hasMany(Question::class);
    }
}
