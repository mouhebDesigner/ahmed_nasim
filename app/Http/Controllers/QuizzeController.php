<?php

namespace App\Http\Controllers;

use App\Models\Quizze;
use Illuminate\Http\Request;

class QuizzeController extends Controller
{
    public function index($matiere_id){
        $questions  = Quizze::where('matiere_id', $matiere_id)->first()->questions;

        return view('pages.quizzes.index', compact('questions'));
    }
}
