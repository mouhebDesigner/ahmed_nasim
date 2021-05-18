<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    public function index(){
        $formations  = Formation::paginate(10);

        return view('pages.formations.index', compact('formations'));
    }

    public function show($id){
        $formation = Formation::find($id);

        return view('pages.formations.show', compact('formation'));
    }
}
