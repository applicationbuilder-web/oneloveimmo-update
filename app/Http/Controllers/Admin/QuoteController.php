<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quote;

class QuoteController extends Controller
{
    /**
     * Liste des demandes de devis.
     */
    public function index()
    {
        $quotes = Quote::latest()->paginate(10);

        return view('admin.quotes.index', compact('quotes'));
    }

    /**
     * Afficher une demande.
     */
    public function show(Quote $quote)
    {
        return view('admin.quotes.show', compact('quote'));
    }

    public function create()
    {
        abort(404);
    }

    public function store()
    {
        abort(404);
    }

    public function edit()
    {
        abort(404);
    }

    public function update()
    {
        abort(404);
    }

    /**
     * Modifier le statut d'une demande de devis.
     */
    public function changeStatus(Quote $quote)
    {
        switch ($quote->status) {

            case 'nouveau':
                $quote->status = 'en_cours';
                break;

            case 'en_cours':
                $quote->status = 'traite';
                break;

            default:
                $quote->status = 'nouveau';
                break;
        }

        $quote->save();

        return back()->with(
            'success',
            'Le statut de la demande a été mis à jour.'
        );
    }

    public function destroy(Quote $quote)
    {
        $quote->delete();

        return redirect()
            ->route('admin.quotes.index')
            ->with('success', 'La demande a été supprimée avec succès.');
    }
}
