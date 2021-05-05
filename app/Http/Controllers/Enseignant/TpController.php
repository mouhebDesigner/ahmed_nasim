<?php

namespace App\Http\Controllers\Enseignant;

use Auth;
use App\Models\Td;
use App\Models\Cour;
use App\Models\Matiere;
use App\Models\Activite;
use App\Models\Chapitre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ActiviteRequest;

class TpController extends Controller
{
    public function index($matiere_id){
        $matiere = Matiere::find($matiere_id)->titre;

        $tps = Activite::where('matiere_id', $matiere_id)->where('type', 'tp')->paginate(10);
        // foreach($chapitres as $chapitre){
        //     return response()->json($chapitre->matiere);
        // }
        // // return response()->json($chapitres);
        return view('enseignants.travaux_pratiques.index', compact('tps', 'matiere', 'matiere_id'));
    }

    public function create($matiere_id){
        $chapitres = Chapitre::where('matiere_id', $matiere_id)->get();
        return view('enseignants.travaux_pratiques.create', compact('matiere_id', 'chapitres'));
    }

    public function store(ActiviteRequest $request, $matiere_id){

        $activite = new Activite;

        $activite->titre = $request->titre;
        $activite->type= "tp";
        $activite->chapitre_id = $request->chapitre_id;
        $activite->matiere_id = $matiere_id;
        if($request->hasFile('document')){
            $activite->document = $request->document->store('files');
        }
        
        $activite->matiere_id = $matiere_id;

        $activite->save();

        return redirect('/enseignant/matiere/'.$matiere_id.'/travaux_pratiques')->with('added', 'L\'activité a été ajouté avec succé');
    
    }
    public function edit($matiere_id, $id){

        $activite = Activite::find($id);
        $chapitres = Chapitre::where('matiere_id', $matiere_id)->get();

        return view('enseignants.travaux_pratiques.edit', compact('activite', 'matiere_id', 'chapitres'));
    }

    public function update(Request $request, $matiere_id, $id){

        $activite = Activite::find($id);


        $activite->titre = $request->titre;
        $activite->chapitre_id = $request->chapitre_id;
        $activite->matiere_id = $matiere_id;
        if($request->hasFile('document')){
            $activite->document = $request->document->store('files');
        }
        

        $activite->save();


        return redirect('/enseignant/matiere/'.$matiere_id.'/travaux_pratiques')->with('updated', 'L\'activité a été modifié avec succé');
    }

    public function destroy($matiere_id, $id)
    {
        Activite::find($id)->delete();
        
        return redirect()->back()->with('deleted', 'L\'activité a été supprimé avec succés');
        
    }
}
