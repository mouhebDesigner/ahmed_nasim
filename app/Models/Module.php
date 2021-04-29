<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    public function section(){
        return $this->belongsTo(Section::class);
    }

    public function matieres(){
        return $this->hasMany(Matiere::class);
        
    }
}
