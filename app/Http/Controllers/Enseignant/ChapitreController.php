<?php

namespace App\Http\Controllers\Enseignant;

use App\Models\Cour;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class ChapitreController extends Controller
{
    public function index(){

        $chapitres = Cour::with('matiere')->where('enseignant_id', Auth::user()->enseignant->id)->get();
        // foreach($chapitres as $chapitre){
        //     return response()->json($chapitre->matiere);
        // }
        // // return response()->json($chapitres);
        return view('enseignants.chapitres.index', compact('chapitres'));
    }
}
