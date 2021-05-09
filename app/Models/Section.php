<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    public function module(){
        return $this->hasMany(Module::class);
    }
    public function matieres(){
        return $this->hasMany(Matiere::class);
    }
}
