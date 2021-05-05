<?php

namespace App\Http\Controllers\Enseignant;

use Auth;
use App\Models\Cour;
use App\Models\Matiere;
use App\Models\Chapitre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChapitreRequest;

class ChapitreController extends Controller
{
    public function index($matiere_id){
        $matiere = Matiere::find($matiere_id)->titre;

        $chapitres = Chapitre::where('matiere_id', $matiere_id)->paginate(10);
        // foreach($chapitres as $chapitre){
        //     return response()->json($chapitre->matiere);
        // }
        // // return response()->json($chapitres);
        return view('enseignants.chapitres.index', compact('chapitres', 'matiere', 'matiere_id'));
    }

    public function create($matiere_id){
        return view('enseignants.chapitres.create', compact('matiere_id'));

    }

    public function store(Request $request, $matiere_id){

        if($request->type == "document"){
            $request->validate([
                "titre" => "required | string",
                "type" => "required",
                "content" => "required | mimes:pdf",
            ]);
        } else {
            $request->validate([
                "titre" => "required | string",
                "type" => "required",
                "content" => "required",
            ]);

        }
        $chapitre = new Chapitre;

        $chapitre->titre = $request->titre;
        $chapitre->type = $request->type;
        if($request->type == "document"){
            if($request->hasFile('content')){
                $chapitre->content = $request->content->store('files');
            }
        } else {
            $chapitre->content = $request->content;
        }
        
        $chapitre->matiere_id = $matiere_id;

        $chapitre->save();

        return redirect('/enseignant/matiere/'.$matiere_id.'/chapitres')->with('added', 'Le chapitre a été ajouté avec succé');
    }
    public function edit($matiere_id, $id){
        $chapitre = Chapitre::find($id);

        return view('enseignants.chapitres.edit', compact('chapitre', 'matiere_id'));
    }
    public function update(Request $request, $matiere_id, $id){

        if($request->type == "document"){
            if($request->hasFile('content')){
                $request->validate([
                    "titre" => "required | string",
                    "type" => "required",
                    "content" => "mimes:pdf",
                ]);
            }else {
                
                $request->validate([
                    "titre" => "required | string",
                    "type" => "required",
                ]);
            }
        } else {
            $request->validate([
                "titre" => "required | string",
                "type" => "required",
                "content" => "required",
            ]);

        }
        $chapitre = Chapitre::find($id);

        $chapitre->titre = $request->titre;
        $chapitre->type = $request->type;
        if($request->type == "document"){
            if($request->hasFile('content')){
                $chapitre->content = $request->content->store('files');
            }
        } else {
            $chapitre->content = $request->content;
        }

        $chapitre->save();

        return redirect('/enseignant/matiere/'.$matiere_id.'/chapitres')->with('updated', 'Le chapitre a été modifié avec succé');
    }

    public function destroy($matiere_id, $id)
    {
        Chapitre::find($id)->delete();
        return redirect()->back()->with('deleted', 'Le chapitre a été supprimé avec succés');
        
    }
}
