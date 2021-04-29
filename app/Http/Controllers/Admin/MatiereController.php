<?php

namespace App\Http\Controllers\Admin;

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
        $matiere->module_id = $request->module_id;
        $matiere->enseignant_id = $request->enseignant_id;

        $matiere->save();

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
        $matiere->enseignant_id = $request->enseignant_id;

        $matiere->save();

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