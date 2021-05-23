<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\EtudiantRequest;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etudiants = User::where('grade', 'etudiant')->paginate(10);

        return view('admin.etudiants.index', compact('etudiants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $niveaux =  ['premiére licence', 'deuxième licence', 'troisième licence', 'première mastère', 'deuxième mastère'];
        return view('admin.etudiants.create', compact('niveaux'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(etudiantRequest $request)
    {
        $etudiant = new User();
        $etudiant->nom = $request->nom;
        $etudiant->prenom = $request->prenom;
        $etudiant->email = $request->email;
        $etudiant->password = Hash::make($request->password);
        $etudiant->numtel = $request->numtel;
        $etudiant->date_naissance = $request->date_naissance;
        $etudiant->grade = "etudiant";
      

        $etudiant->save();

        $etudiant_info = new etudiant;

        $etudiant_info->user_id = $etudiant->id;

        $etudiant_info->niveau = $request->niveau;
        $etudiant_info->section_id = $request->section_id;


        $etudiant_info->save();

        return redirect('admin/etudiants')->with('added', 'L\'etudiant a été ajouté avec succés');
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
        $niveaux =  ['premiére licence', 'deuxième licence', 'troisième licence', 'première mastère', 'deuxième mastère'];

        $etudiant = User::find($id);

        return view('admin.etudiants.edit', compact('etudiant', 'niveaux'));
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

        $validations_password = "";
        if($request->password != ""){
            $validations_password = "required | string | min:8 | confirmed";
        }
        $request->validate([
            'numtel' => "required | numeric | digits:8 | unique:users,numtel,".$id.",id",
            "password" => $validations_password,
            "email" =>  "required | string | email | max:255 | unique:users,email,".$id.",id",
            'nom' => 'required | string | max:255',
            'prenom' => 'required | string | max:255',
            'date_naissance' => 'required',
            'niveau' => 'required',
            'section_id' => 'required',
        ]);

        $etudiant =  User::find($id);

        $etudiant->nom = $request->nom;
        $etudiant->prenom = $request->prenom;
        $etudiant->email = $request->email;
        $etudiant->password = Hash::make($request->password);
        $etudiant->numtel = $request->numtel;
        $etudiant->date_naissance = $request->date_naissance;
      

        $etudiant->save();
        $etudiant_id = Etudiant::where('user_id', $id)->first()->id;
        $etudiant_info =  Etudiant::find($etudiant_id);


        $etudiant_info->niveau = $request->niveau;
        $etudiant_info->section_id = $request->section_id;


        $etudiant_info->save();



        return redirect('admin/etudiants')->with('updated', 'L\'etudiant a été modifié avec succés');
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
        return redirect('admin/etudiants')->with('deleted', 'L\'etudiant a été supprimer avec succés');
        
    }
}
