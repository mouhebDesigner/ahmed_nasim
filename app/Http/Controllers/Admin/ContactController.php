<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index(){
        $contacts = Contact::paginate(10);

        return view('admin.contacts.index', compact('contacts'));
    }

    public function show($id){
        $contact = Contact::find($id);

        return view('admin.contacts.show', compact('contact'));
    }

    public function destroy($id)
    {
        Contact::find($id)->delete();
        return redirect('admin/contacts')->with('deleted', 'Le message a été supprimé avec succés');
        
    }

    public function create(){
        return view('enseignants.contacts.index');
    }
}
