<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

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
        $contact->numtel = $request->numtel;
        $contact->message = $request->message;

        $contact->save();

        return redirect('contact')->with('signed', 'Votre message a été envoyé avec succés');

    }
}
