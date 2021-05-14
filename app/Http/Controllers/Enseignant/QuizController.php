<?php

namespace App\Http\Controllers\Enseignant;

use App\Models\Quizze;
use App\Models\Matiere;
use Illuminate\Http\Request;
use App\Http\Requests\QuizRequest;
use App\Http\Controllers\Controller;    

class QuizController extends Controller
{

    public function index(){
        
        $quizzes = Quizze::paginate(10);

        return view('enseignants.quizzes.index', compact('quizzes'));
        
    }

    public function create($matiere_id){
        return view('enseignants.quizzes.create', compact('matiere_id'));
    }

    public function store(QuizRequest $request, $matiere_id){

        $quiz = new Quizze();

        $quiz->matiere_id = $matiere_id;
        $quiz->nbr_questions = $request->nbr_questions;
        $quiz->nbr_reponses = $request->nbr_reponses;

        $quiz->save();

        return redirect('enseignant/quizzes')->with('added', __('messages.added_message'));
    }

    public function edit($matiere_id, $id){
        
        $quiz = Quiz::find($id);

        return view('enseignants.pages.quizzes.edit', compact('quiz', 'matiere_id'));
    }

    public function update(QuizRequest $request, $matiere_id, $id){

        $quiz = Quiz::find($id);

        $quiz->matiere_id = $matiere_id;
        $quiz->nbr_questions = $request->nbr_questions;
        $quiz->nbr_reponses = $request->nbr_reponses;

        $quiz->save();

        return redirect('admin/quizzes')->with('added', __('messages.added_message'));
    }

    public function destroy($matiere_id, $id)
    {

        Quiz::find($id)->delete();

        return redirect('admin/quizzes')->with('deleted', __('messages.deleted_message'));
    }

    public function deleteAll(Request $request){


        foreach($request->quizzes as $quizze){

            Quiz::find($quizze)->delete();
        }

        return  redirect()->back()->with('deleted', __('messages.deleted_message'));

    }


}
