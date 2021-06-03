<?php

namespace App\Http\Controllers\Admin;

use App\Models\Td;
use App\Models\Tp;
use App\Models\Cour;
use App\Models\Matiere;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MatiereRequest;

class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matieres = Matiere::paginate(10);

        return view('admin.matieres.index', compact('matieres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.matieres.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MatiereRequest $request)
    {
        $matiere = new Matiere();

        $matiere->titre = $request->titre;
        $matiere->section_id = $request->section_id;
        $matiere->niveau = $request->niveau." ".$request->cycle;
        $matiere->module_id = $request->module_id;

        
        if(isset($request->enseignant_id_tp)){
            $matiere->has_tp = 1;
            $matiere->save();
            $tp = new Tp();
            $tp->matiere_id = $matiere->id;
            $tp->enseignant_id = $request->enseignant_id_tp;
            $tp->save();
        }
        if(isset($request->enseignant_id_td)){
            $matiere->has_td = 1;
            $matiere->save();
            $td = new Td();
            $td->matiere_id = $matiere->id;
            $td->enseignant_id = $request->enseignant_id_td;
            $td->save();
        }
        if(isset($request->enseignant_id_cours)){
            $matiere->has_cour = 1;
            $matiere->save();

            $cour = new Cour();
            $cour->matiere_id = $matiere->id;
            $cour->enseignant_id = $request->enseignant_id_cours;
            $cour->save();
        }

        return redirect('admin/matieres')->with('added', 'Le matière a été ajouté avec succés');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $matiere = Matiere::find($id);

        return view('admin.matieres.edit', compact('matiere'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MatiereRequest $request, $id)
    {
        
        $matiere =  Matiere::find($id);

        $matiere->titre = $request->titre;
        $matiere->section_id = $request->section_id;
        $matiere->module_id = $request->module_id;

        
        if(isset($request->enseignant_id_tp)){
            if($matiere->has_tp == 0){
                $tp = new Tp();
                $tp->enseignant_id = $request->enseignant_id_tp;
                $tp->matiere_id = $id;
            } else {
                $tp_id = Tp::where('matiere_id', $id)->first()->id;
                $tp =  Tp::find($tp_id);
                $tp->enseignant_id = $request->enseignant_id_tp;
                $tp->matiere_id = $id;
            }
            $matiere->has_tp = 1;
            $matiere->save();
            $tp->save();
        }
        if(isset($request->enseignant_id_td)){
            if($matiere->has_td == 0){
                $td = new Td();
                $td->enseignant_id = $request->enseignant_id_td;
                $td->matiere_id = $id;
            } else {
                $td_id = Td::where('matiere_id', $id)->first()->id;
                $td =  Td::find($td_id);
                $td->enseignant_id = $request->enseignant_id_td;
                $td->matiere_id = $id;
            }
            $matiere->has_td = 1;
            $matiere->save();
            $td->save();
        }
        if(isset($request->enseignant_id_cours)){
            if($matiere->has_cour == 0){
                $cour = new Cour();
                $cour->enseignant_id = $request->enseignant_id_cours;
                $cour->matiere_id = $id;
            } else {
                $cour_id = Cour::where('matiere_id', $id)->first()->id;
                $cour =  Cour::find($cour_id);
                $cour->enseignant_id = $request->enseignant_id_cours;
                $cour->matiere_id = $id;
            }
            $matiere->has_cour = 1;
            $matiere->save();
            $cour->save();
        }

        return redirect('admin/matieres')->with('updated', 'Le matière a été modifié avec succés');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Matiere::find($id)->delete();
        return redirect('admin/matieres')->with('deleted', 'Le matière a été supprimer avec succés');
        
    }
}