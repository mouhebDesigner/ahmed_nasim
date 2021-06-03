<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Module;
use App\Models\Matiere;
use Illuminate\Http\Request;

class MatiereController extends Controller
{
    
    public function index(){
        $modules  = Module::where('section_id', Auth::user()->etudiant->section_id)->get();
        $matieres = Matiere::where('section_id', Auth::user()->etudiant->section_id)->where('niveau', Auth::user()->etudiant->niveau)->paginate(6);

        return view('pages.matieres.index', compact('matieres', 'modules'));
    }

    public function show($id){
        $matiere = Matiere::find($id);

        return view('pages.matieres.show', compact('matiere'));
    }
    
}
