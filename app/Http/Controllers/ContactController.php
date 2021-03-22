<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();

        return view('contact', array(
            'contacts' => $contacts,
        ));
    }

    public function store(ContactRequest $request)
    {
        Contact::create(request()->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'email' => 'required', 'email',
            'message'=> 'required',
        ]));

        return redirect('/contact');
        /*
        $contact = new Contact(); //on instancie un nouveau projet
        $contact->name = request('name'); //on set le titre avec la donnée envoyée du formulaire
        $contact->email = request('email');
        $contact->message = request('message');
        $contact->date = date('Y-m-d H:i:s');
        $contact->save(); // on enregistre dans la base
        return redirect('/contact'); // ->with('message', 'Projet créé');*/

        /*$maVar = request->val();
        $maVar['date'] = date
        create($maV)*/
    }

    public function show()
    {

    }

}
