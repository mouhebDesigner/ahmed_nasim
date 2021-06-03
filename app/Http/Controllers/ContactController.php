<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use Auth;
class ContactController extends Controller
{

    public function index(){
        return view('contact');
    }
    public function store(ContactRequest $request)
    {
        $contact = new Contact();   


        $contact->sujet = $request->sujet;
        $contact->nom = $request->nom;
        $contact->email = $request->email;
        $contact->numtel = $request->numtel;
        $contact->message = $request->message;

        $contact->save();
        if(Auth::check() && Auth::user()->grade == "enseignant")
        {
            return redirect('enseignant/contacts/create')->with('success', 'Votre message a été envoyé avec succés');
        }
        return redirect('contact')->with('signed', 'Votre message a été envoyé avec succés');

    }
}
