<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Enseignant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\EnseignantRequest;

class EnseignantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enseignants = User::where('grade', 'enseignant')->paginate(10);

        return view('admin.enseignants.index', compact('enseignants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.enseignants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EnseignantRequest $request)
    {
        $enseignant = new User();
        $enseignant->nom = $request->nom;
        $enseignant->prenom = $request->prenom;
        $enseignant->email = $request->email;
        $enseignant->password = Hash::make($request->password);
        $enseignant->numtel = $request->numtel;
        $enseignant->date_naissance = $request->date_naissance;
        $enseignant->grade = "enseignant";
      

        $enseignant->save();

        $enseignant_info = new Enseignant;

        $enseignant_info->user_id = $enseignant->id;

        $enseignant_info->save();

        return redirect('admin/enseignants')->with('added', 'L\'enseignant a été ajouté avec succés');
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
        $enseignant = User::find($id);

        return view('admin.enseignants.edit', compact('enseignant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EnseignantRequest $request, $id)
    {
        $enseignant =  User::find($id);

        $enseignant->nom = $request->nom;
        $enseignant->prenom = $request->prenom;
        $enseignant->email = $request->email;
        $enseignant->password = Hash::make($request->password);
        $enseignant->numtel = $request->numtel;
        $enseignant->date_naissance = $request->date_naissance;
      

        $enseignant->save();



        return redirect('admin/enseignants')->with('updated', 'L\'enseignant a été modifié avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect('admin/enseignants')->with('deleted', 'L\'enseignant a été supprimer avec succés');
        
    }
}
