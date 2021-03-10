<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view ('contact');
    }

    public function store(ContactRequest $request)
    {

        $contact = new Contact(); //on instancie un nouveau projet
        $contact->name = request('name'); //on set le titre avec la donnée envoyée du formulaire
        $contact->email = request('email');
        $contact->message = request('message');
        $contact->date = date('Y-m-d H:i:s');
        $contact->save(); // on enregistre dans la base


        return redirect('/contact'); // méthode pour rediriger vers une autre url (en get par défaut)
           // ->with('message', 'Projet créé');


        /*
       $date = date('Y-m-d H:i:s');
       Contact::create(request()->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'email' => 'required',
            'message'=> 'required',

        ]), $date);

        return redirect('/contact');*/
    }

}
