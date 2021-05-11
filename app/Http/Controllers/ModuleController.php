<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index(){
        $modules  = Module::all();

        return view('pages.modules', compact('modules'));
    }
}
