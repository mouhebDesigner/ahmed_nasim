<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){
        $users = User::where('grade', '!=', 'admin')->where('approuver', NULL)->get();

        return view('admin.inscriptions.index', compact('users'));
    }

    public function approuver($id){
        $user = User::find($id);

        $user->approuver = 1;

        $user->save();

        return redirect()->back()->with('success', "L'inscription a été approuvé avec succés");
        // $2y$10$f9aynjGx9MI2kjYVuoDPy.1rcWfRJG1QRbE/koEyI/Dj9ZOV7hwPG
    }


    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->back()->with('deleted', "L'utilisateur a été supprimé avec succés");

    }
}
