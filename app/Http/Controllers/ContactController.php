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
        Contact::create($request->validate($request->rules()));
        return redirect('/contact');
    }
}
