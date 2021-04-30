<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tps(){
        return $this->hasMany(Tp::class);
    }
    public function tds(){
        return $this->hasMany(Td::class);
    }
    public function cours(){
        return $this->hasMany(Cour::class);
    }

    
}
    