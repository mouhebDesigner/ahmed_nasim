<?php

namespace App\Http\Controllers\Enseignant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cour;
use Auth;
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
}
