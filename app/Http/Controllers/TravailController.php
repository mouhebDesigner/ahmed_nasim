<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Activite;
use Illuminate\Http\Request;
use App\Models\TravailDemande;

class TravailController extends Controller
{
    public function deposer(Request $request, $activite_id){
        $travail = new TravailDemande();

        $travail->user_id = Auth::user()->id;
        $travail->activite_id = $activite_id;
        if($request->hasFile('fichier')){
            $travail->fichier = $request->fichier->store('files');
        }

        $travail->save();

        return redirect()->back()->with('success', 'Votre travail a été déposer avec succée');
    }

    public function travails($activite_id){

        $travails = TravailDemande::where('activite_id', $activite_id)->get();

        // $ids = [];
        // foreach($users as $user){
        //     array_push($ids, $user->user_id);
        // }

        // $etudiants = User::whereIn('id', $ids)->get();

        // return response()->json($etudiants);
        return view('enseignants.travails.index', compact('travails'));

    }
}
