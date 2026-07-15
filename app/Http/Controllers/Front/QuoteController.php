<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    /**
     * Formulaire de demande de devis
     */
    public function create()
    {
        return view('quotes.create');
    }

    /**
     * Enregistrer une demande
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'fullname'      => 'required|string|max:255',

            'phone'         => 'required|string|max:30',

            'email'         => 'nullable|email|max:255',

            'city'          => 'required|string|max:255',

            'project_type'  => 'required|string|max:100',

            'budget'        => 'nullable|numeric',

            'message'       => 'required|string',

            'attachment'    => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',

        ]);

        if ($request->hasFile('attachment')) {

            $validated['attachment'] = $request
                ->file('attachment')
                ->store('quotes', 'public');

        }

        Quote::create($validated);

        return redirect()
            ->route('quotes.success')
            ->with('success', 'Votre demande de devis a été envoyée avec succès.');
    }

    /**
     * Page de confirmation
     */
    public function success()
    {
        return view('quotes.success');
    }
}