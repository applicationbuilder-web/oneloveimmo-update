<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Construction;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class ConstructionController extends Controller
{
    /**
     * Liste des constructions et réalisations
     */
    public function index(Request $request)
    {
        $settings = SiteSetting::first();
        $query = Construction::latest();

        // Filtre par statut (termine, en_cours, a_venir)
        if ($request->filled('status') && in_array($request->status, ['termine', 'en_cours', 'a_venir'])) {
            $query->where('status', $request->status);
        }

        // Filtre par localisation / ville
        if ($request->filled('location')) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }

        $constructions = $query->paginate(9)->withQueryString();

        return view('construction.index', compact('settings', 'constructions'));
    }

    /**
     * Fiche d'un projet de construction
     */
    public function show(Construction $construction)
    {
        $settings = SiteSetting::first();
        $otherProjects = Construction::where('id', '!=', $construction->id)
            ->latest()
            ->take(3)
            ->get();

        return view('construction.show', compact('settings', 'construction', 'otherProjects'));
    }
}