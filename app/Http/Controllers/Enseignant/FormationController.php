<?php

namespace App\Http\Controllers\Enseignant;

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

        return view('enseignants.formations.index', compact('formations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('enseignants.formations.create');
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
        $formation->user_id = Auth::user()->id;
        
        $formation->description = $request->description;
        
        if($request->hasFile('image')){
            $formation->image = $request->image->store('images');
        }

        $formation->save();
        

        return redirect('enseignant/formations')->with('added', 'La formation a été ajouté avec succés');
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

        return view('enseignants.formations.edit', compact('section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormationRequest $request, $id)
    {
        $formation =  Formation::find($id);


        $formation->titre = $request->titre;
        
        $formation->description = $request->description;
        
        if($request->hasFile('image')){
            $formation->image = $request->image->store('images');
        }

        $formation->save();

        return redirect('enseignant/formations')->with('updated', 'La formation a été modifié avec succés');
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
        return redirect('enseignant/formations')->with('deleted', 'La formation a été supprimer avec succés');
    }
}