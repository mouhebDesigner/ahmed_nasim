<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\EtudiantRequest;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = User::where('grade', 'admin')->paginate(10);

        return view('admin.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {
        $admin = new User();
        $admin->nom = $request->nom;
        $admin->prenom = $request->prenom;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->numtel = $request->numtel;
        $admin->date_naissance = $request->date_naissance;
        $admin->grade = "admin";
      

        $admin->save();

        

        return redirect('admin/admins')->with('added', 'L\'administrateur a été ajouté avec succés');
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

        $admin = User::find($id);

        return view('admin.admins.edit', compact('admin'));
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
        ]);

        $admin =  User::find($id);

        $admin->nom = $request->nom;
        $admin->prenom = $request->prenom;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->numtel = $request->numtel;
        $admin->date_naissance = $request->date_naissance;
      

        $admin->save();
        



        return redirect('admin/admins')->with('updated', 'L\'administrateur a été modifié avec succés');
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
        return redirect('admin/admins')->with('deleted', 'L\'administrateur a été supprimer avec succés');
        
    }
}
