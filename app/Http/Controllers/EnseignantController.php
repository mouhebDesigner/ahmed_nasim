<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Enseignant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\EnseignantRequest;

class EnseignantController extends Controller
{
    public function store(EnseignantRequest $request){
        

        $user = new User();

        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->numtel = $request->numtel;
        $user->grade = "enseignant";
        $user->date_naissance = $request->date_naissance;
        if($request->hasFile('photo')){

            $user->photo = $request->photo->store('images');
        }

        $user->save();

        $enseignant = new Enseignant();

        $enseignant->user_id = $user->id;

        $enseignant->save();
        
        return redirect()->back()->with('signed', 'Votre compte a été créé avec succés');
    }
}
