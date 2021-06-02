<?php

namespace App\Http\Controllers\Enseignant;

use App\Models\Quizze;
use App\Models\Reponse;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Requests\QuestionRequest;
use App\Http\Controllers\Controller;    


class QuestionController extends Controller
{
    public function index($quizze_id){

        $questions = Quizze::find($quizze_id)->questions()->paginate(10);

        return view('enseignants.questions.index', compact('questions', 'quizze_id'));

    }

    public function create($quizze_id){

        return view('enseignants.questions.create', compact('quizze_id'));
        
    }

    public function store(QuestionRequest $request, $quizze_id){

        $question = new Question;

        $question->quizze_id = $quizze_id;
        $question->content = $request->content;
        $question->save();

        for($i=1; $i <= Quizze::find($quizze_id)->nbr_reponses; $i++){

            $reponse = new Reponse();
    
            $reponse->titre = $request->input('reponse_'.$i);
            if($request->reponse_correct == "reponse_".$i)
                $reponse->reponse = 1;
            $reponse->question_id = $question->id;
            $reponse->save();
        }

        return redirect('enseignant/quizze/'.$question->quizze_id.'/questions')->with('added', 'La question a été ajouté avec succés');


    }

    public function edit($id){
        $question = Question::find($id);

        return view('enseignants.questions.edit', compact('question'));
    }

    public function update(QuestionRequest $request, $id){
    
        $question = Question::find($id);

        $question->content = $request->content;
        $question->save();

        $reponse_ids = $question->reponses()->get('id');

        for($i=1; $i <= Quizze::find($question->quizze_id)->nbr_reponses; $i++){

            $reponse =  Reponse::find($reponse_ids[$i-1]->id);
            
            $reponse->titre = $request->input('reponse_'.$i);

            if($request->reponse_correct == "reponse_".$i)
                $reponse->reponse = 1;
            $reponse->save();
        }

        // enseignant/quizze/1/questions
        return redirect('enseignant/quizze/'.$question->quizze_id.'/questions')->with('updated', 'La question a été modifié avec succés');
    }

    public function destroy($id){

        $quizze_id = Question::find($id)->quizze_id;
        Question::find($id)->delete();

        return redirect('enseignant/quizze/'.$quizze_id.'/questions')->with('updated', 'La question a été supprimé avec succés');
    }

    public function deleteAll(Request $request){

        foreach($request->questions as $question){
            Question::find($question)->delete();
        }
        return  redirect()->back()->with('deleted', __('messages.deleted_message'));

    }
    

}
