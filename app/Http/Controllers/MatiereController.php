<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use Illuminate\Http\Request;
use Auth;
class MatiereController extends Controller
{
    public function index(){
        $matieres = Matiere::where('section_id', Auth::user()->etudiant->section_id)->paginate(6);

        return view('pages.matieres.index', compact('matieres'));
    }

    public function show($id){
        $matiere = Matiere::find($id);

        return view('pages.matieres.show', compact('matiere'));
    }
    
}
