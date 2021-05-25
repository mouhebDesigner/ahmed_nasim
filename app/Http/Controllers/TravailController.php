<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TravailDemande;
use Auth;
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
}
