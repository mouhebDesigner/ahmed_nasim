<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\EtudiantRequest;

class EtudiantController extends Controller
{
    public function store(EtudiantRequest $request){

        $user = new User();

        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->numtel = $request->numtel;
        $user->grade = "etudiant";
        $user->date_naissance = $request->date_naissance;

        $user->save();

        $etudiant = new Etudiant;

        $etudiant->user_id = $user->id;
        $etudiant->niveau = $request->niveau." ".$request->cycle;
        $etudiant->section_id = $request->section_id;

        $etudiant->save();

        return redirect('register/etudiant')->with('signed', 'Votre compte a été créé avec succés');
    }
}
