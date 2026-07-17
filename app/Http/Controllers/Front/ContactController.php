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
        $validated = $request->validate([

            'name'    => 'required|string|max:255',

            'phone'   => 'nullable|string|max:30',

            'email'   => 'required|email|max:255',

            'subject' => 'required|string|max:255',

            'message' => 'required|string',

        ]);

        Contact::create($validated);

        return redirect()
            ->route('contact')
            ->with('success', 'Votre message a été envoyé avec succès.');
    }
}