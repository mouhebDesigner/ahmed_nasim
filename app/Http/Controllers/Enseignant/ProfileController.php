<?php

namespace App\Http\Controllers\Enseignant;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        return view('enseignants.profile');
    }


    public function update(Request $request, $id){
        $validations_password = "";
        if($request->password != ""){
            $validations_password = "required | string | min:8 | confirmed";
        }
        
        $request->validate([
            'numtel' => "required | numeric | digits:8 | unique:users,numtel,".Auth::id().",id",
            "password" => $validations_password,
            "email" =>  "required | string | email | max:255 | unique:users,email,".Auth::id().",id",
            'nom' => 'required | string | max:255',
            'prenom' => 'required | string | max:255',
            'date_naissance' => 'required',
        ]);
        $user = User::find($id);

        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->email = $request->email;
        if($request->password != ""){

            $user->password = Hash::make($request->password);
        }
        $user->numtel = $request->numtel;
        $user->date_naissance = $request->date_naissance;

        if($request->hasFile('photo')){
            $user->photo = $request->photo->store('images');
        }

        $user->save();

        return redirect()->back()->with('updated', 'Votre profile a été edité avec succé');
    }
}
