<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Afficher la page Contact
     */
    public function index()
    {
        return view('contact');
    }

    /**
     * Enregistrer un message
     */
    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required|max:255',

            'phone' => 'nullable|max:30',

            'email' => 'required|email',

            'subject' => 'required|max:255',

            'message' => 'required',

        ]);

        Contact::create($request->all());

        return redirect()
            ->route('contact')
            ->with('success', 'Votre message a été envoyé avec succès.');
    }
}