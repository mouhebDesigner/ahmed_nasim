<?php

namespace App\Http\Controllers\Enseignant;

use App\Models\Cour;
use App\Models\Quizze;
use App\Models\Matiere;
use Illuminate\Http\Request;
use App\Http\Requests\QuizRequest;
use App\Http\Controllers\Controller;    
use Auth;
class QuizController extends Controller
{

    public function index(){
        $quizzes = Quizze::get();

        return view('admin.quizzes.index', compact('quizzes'));
        
    }
    

    public function create(){
        return view('admin.quizzes.create');
    }

    public function store(QuizRequest $request){

        $quiz = new Quizze();

        $quiz->nbr_questions = $request->nbr_questions;
        $quiz->nbr_reponses = $request->nbr_reponses;

        $quiz->save();

        return redirect('club/quizzes')->with('added', 'Quiz a été ajouté avec succée');
    }

    public function edit($id){
        
        $quizze = Quizze::find($id);

        return view('admin.quizzes.edit', compact('quizze'));
    }

    public function update(QuizRequest $request, $id){

        $quiz = Quizze::find($id);

        $quiz->nbr_questions = $request->nbr_questions;
        $quiz->nbr_reponses = $request->nbr_reponses;

        $quiz->save();

        return redirect('club/quizzes')->with('added', 'Quiz a été modifié avec succée');
    }

    public function destroy($id)
    {

        Quizze::find($id)->delete();

        return redirect('club/quizzes')->with('deleted', 'Quiz a été supprimé avec succée');
    }

    


}
