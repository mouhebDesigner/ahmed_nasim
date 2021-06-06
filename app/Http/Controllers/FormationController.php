<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\Participant;
use Illuminate\Http\Request;
use Auth;
class FormationController extends Controller
{

    
    public function index(){
        $formations  = Formation::paginate(10);

        return view('pages.formations.index', compact('formations'));
    }

    public function show($id){
        $formation = Formation::find($id);

        if(Participant::where('formation_id', $formation->id)->where('user_id', Auth::id())->count() == 0){
            $participant = new Participant();
    
            $participant->user_id = Auth::user()->id;
    
            $participant->formation_id = $id;
    
            $participant->save();
        }

        return view('pages.formations.show', compact('formation'));
    }
}
