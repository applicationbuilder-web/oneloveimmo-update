<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Construction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ConstructionController extends Controller
{
    /**
     * Liste des réalisations.
     */
    public function index()
    {
        $constructions = Construction::latest()->paginate(10);

        return view('admin.constructions.index', compact('constructions'));
    }

    /**
     * Formulaire d'ajout.
     */
    public function create()
    {
        return view('admin.constructions.create');
    }

    /**
     * Enregistrer.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'title' => 'required|max:255',

            'location' => 'required|max:255',

            'type' => 'required|max:255',

            'status' => 'required',

            'description' => 'required',

            'image' => 'nullable|image|max:2048',

        ]);

        $validated['slug'] = Str::slug($validated['title']);

        if ($request->hasFile('image')) {

            $validated['image'] = $request
                ->file('image')
                ->store('constructions', 'public');

        }

        Construction::create($validated);

        return redirect()
            ->route('admin.constructions.index')
            ->with('success', 'Projet enregistré avec succès.');
    }

    /**
     * Afficher.
     */
    public function show(Construction $construction)
    {
        return view('admin.constructions.show', compact('construction'));
    }

    /**
     * Modifier.
     */
    public function edit(Construction $construction)
    {
        return view('admin.constructions.edit', compact('construction'));
    }

    /**
     * Mise à jour.
     */
    public function update(Request $request, Construction $construction)
    {
        //
    }

    /**
     * Suppression.
     */
    public function destroy(Construction $construction)
    {
        $construction->delete();

        return redirect()
            ->route('admin.constructions.index')
            ->with('success', 'Projet supprimé.');
    }
}