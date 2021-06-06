<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Formation;
use App\Http\Requests\FormationRequest;
use Auth;
class FormationController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formations = Formation::paginate(10);

        return view('admin.formations.index', compact('formations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.formations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormationRequest $request)
    {
        $formation = new Formation();

        $formation->titre = $request->titre;
        
        $formation->description = $request->description;
        
        if($request->hasFile('image')){
            $formation->image = $request->image->store('images');
        }

        if($request->hasFile('certificat')){
            $formation->certificat = $request->certificat->store('images');
        }

        $formation->save();

        $etudiants = User::where('grade', 'etudiant')->get();
        
        foreach($etudiants as $etudiant){

            $participant = new Participant();

            $participant->user_id = $etudiant->id;
            $participant->formation_id = $formation->id;

            $participant->save();
        }

        
        

        return redirect('admin/formations')->with('added', 'La formation a été ajouté avec succés');
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
        $formation = Formation::find($id);

        return view('admin.formations.edit', compact('formation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'titre' => 'required',
            'description' => 'required',
        ]);
        $formation =  Formation::find($id);


        $formation->titre = $request->titre;
        
        $formation->description = $request->description;
        
        if($request->hasFile('image')){
            $formation->image = $request->image->store('images');
        }
        if($request->hasFile('certificat')){
            $formation->certificat = $request->certificat->store('images');
        }

        $formation->save();

        return redirect('admin/formations')->with('updated', 'La formation a été modifié avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Formation::find($id)->delete();
        return redirect('admin/formations')->with('deleted', 'La formation a été supprimer avec succés');
    }
}
