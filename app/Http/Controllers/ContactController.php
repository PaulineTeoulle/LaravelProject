<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        //Récupération des données de tous les contacts
        $contacts = Contact::all();

        //Passage des données à la view
        return view('contact', array(
            'contacts' => $contacts,
        ));
    }

    public function store(ContactRequest $request)
    {
        //Création du contact via la requète et les règles de validation et redirection
        Contact::create($request->validate($request->rules()));
        return redirect('/contact');
    }
}
