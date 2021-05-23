<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Matiere;
use Illuminate\Http\Request;
use Auth;
class ModuleController extends Controller
{
    public function index(){
        $modules  = Module::where('section_id', Auth::user()->etudiant->section_id)->get();

        return view('pages.modules', compact('modules'));
    }

    public function matieres($module_id){
        $matieres = Matiere::where('module_id', $module_id)->paginate(6);

        return view('pages.matieres.index', compact('matieres'));
    }
}
