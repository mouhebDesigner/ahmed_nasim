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
        $matieres = Cour::with('matiere')->where('enseignant_id', Auth::user()->enseignant->id)->get('matiere_id');
        $quizzes = Quizze::whereIn('matiere_id', $matieres)->paginate(10);
        
        
        return view('enseignants.quizzes.index', compact('quizzes'));
        
    }
    

    public function create(){
        return view('enseignants.quizzes.create');
    }

    public function store(QuizRequest $request){

        $quiz = new Quizze();

        $quiz->matiere_id = $request->matiere_id;
        $quiz->nbr_questions = $request->nbr_questions;
        $quiz->nbr_reponses = $request->nbr_reponses;

        $quiz->save();

        return redirect('enseignant/quizzes')->with('added', 'Quiz a été ajouté avec succée');
    }

    public function edit($id){
        
        $quizze = Quizze::find($id);

        return view('enseignants.quizzes.edit', compact('quizze'));
    }

    public function update(QuizRequest $request, $id){

        $quiz = Quizze::find($id);

        $quiz->matiere_id = $request->matiere_id;
        $quiz->nbr_questions = $request->nbr_questions;
        $quiz->nbr_reponses = $request->nbr_reponses;

        $quiz->save();

        return redirect('enseignant/quizzes')->with('added', 'Quiz a été modifié avec succée');
    }

    public function destroy($id)
    {

        Quizze::find($id)->delete();

        return redirect('enseignant/quizzes')->with('deleted', 'Quiz a été supprimé avec succée');
    }

    public function deleteAll(Request $request){


        foreach($request->quizzes as $quizze){

            Quiz::find($quizze)->delete();
        }

        return  redirect()->back()->with('deleted', 'Quiz a été ajouté avec succée');

    }


}
