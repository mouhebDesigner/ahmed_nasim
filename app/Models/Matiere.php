<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    use HasFactory;

    public function tp(){
        return $this->hasOne(Tp::class);
    }
    
    public function td(){
        return $this->hasOne(Td::class);
    }
    public function cour(){
        return $this->hasOne(Cour::class);
    }
    public function module(){
        return $this->belongsTo(Module::class);
    }
    
    public function section(){
        return $this->belongsTo(Section::class);
    }

    public function enseignant(){
        return $this->belongsTo(Enseignant::class);
    }


}
