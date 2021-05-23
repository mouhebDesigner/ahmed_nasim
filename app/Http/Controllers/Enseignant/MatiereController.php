<?php

namespace App\Http\Controllers\Enseignant;

use Auth;
use App\Models\Td;
use App\Models\Tp;
use App\Models\Cour;
use App\Models\Matiere;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MatiereController extends Controller
{
    public function index(){

        $matieres = Cour::with('matiere')->where('enseignant_id', Auth::user()->enseignant->id)->get();
        // foreach($chapitres as $chapitre){
        //     return response()->json($chapitre->matiere);
        // }
        // // return response()->json($chapitres);
        return view('enseignants.cours.index', compact('matieres'));
    }
        
    public function matiere(){
        $matieres_cour = Cour::with('matiere')->where('enseignant_id', Auth::user()->enseignant->id)->get('matiere_id');
        $matieres_tp = Tp::with('matiere')->where('enseignant_id', Auth::user()->enseignant->id)->get('matiere_id');
        $matieres_td = Td::with('matiere')->where('enseignant_id', Auth::user()->enseignant->id)->get('matiere_id');
        $matieres = [];
        foreach($matieres_cour as $value){
            array_push($matieres, $value->matiere_id);
        }
        
        foreach($matieres_tp as $value){
            array_push($matieres, $value->matiere_id);
        }
        
        foreach($matieres_td as $value){
            array_push($matieres, $value->matiere_id);
        }
        $matieres_list  = Matiere::whereIn('id', $matieres)->get();

        return view('enseignants.matieres.index', compact('matieres_list'));
            
    }
}
