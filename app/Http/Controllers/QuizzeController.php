<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Quizze;
use App\Models\Reponse;
use App\Models\Resultat;
use Illuminate\Http\Request;

class QuizzeController extends Controller
{
    public function index($matiere_id){
        $quizze_id =  Quizze::where('matiere_id', $matiere_id)->first()->id;
        $questions  = Quizze::where('matiere_id', $matiere_id)->first()->questions;

        return view('pages.quizzes.index', compact('questions', 'quizze_id'));
    }
    public function repasser($quizze_id){

        $resultat_id = Resultat::where('quizze_id', $quizze_id)->first()->id;

        Resultat::find($resultat_id)->delete();

        $questions  = Quizze::find($quizze_id)->first()->questions;

        return view('pages.quizzes.index', compact('questions', 'quizze_id'));
    }

    public function store(Request $request, $quizze_id){

        $resultat = new Resultat;
        $note = 0;
        foreach($request->question_ids as $id){
            if(Reponse::find($request->input('reponse'.$id))->reponse == 1){
                $note++;
            }
        }

        $questions = Quizze::find($quizze_id)->questions()->count();

        if($note < $questions){
            $message = true;
        } else {
            $message = false;
        }
        $resultat->note = $note;
        $resultat->quizze_id = $quizze_id;

        $resultat->etudiant_id = Auth::user()->etudiant->id;

        $resultat->save();
        return view('pages.quizzes.result', compact('note', 'questions', 'quizze_id'));

    }
}
