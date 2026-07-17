<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Construction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ConstructionController extends Controller
{
    /**
     * Liste des projets.
     */
    public function index()
    {
        $constructions = Construction::latest()
            ->paginate(10);

        return view(
            'admin.constructions.index',
            compact('constructions')
        );
    }

    /**
     * Formulaire de création.
     */
    public function create()
    {
        return view('admin.constructions.create');
    }

    /**
     * Enregistrement.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'title'       => 'required|string|max:255',
            'location'    => 'required|string|max:255',
            'type'        => 'required|string|max:255',
            'status'      => 'required',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

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
            ->with('success', 'Le projet de construction a été ajouté avec succès.');
    }

    /**
     * Détails.
     */
    public function show(Construction $construction)
    {
        return view(
            'admin.constructions.show',
            compact('construction')
        );
    }

    /**
     * Formulaire de modification.
     */
    public function edit(Construction $construction)
    {
        return view(
            'admin.constructions.edit',
            compact('construction')
        );
    }

    /**
     * Mise à jour.
     */
    public function update(Request $request, Construction $construction)
    {
        $validated = $request->validate([

            'title'       => 'required|string|max:255',
            'location'    => 'required|string|max:255',
            'type'        => 'required|string|max:255',
            'status'      => 'required',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        ]);

        if ($construction->title != $validated['title']) {

            $validated['slug'] = Str::slug($validated['title']);
        }

        if ($request->hasFile('image')) {

            if ($construction->image) {

                Storage::disk('public')
                    ->delete($construction->image);
            }

            $validated['image'] = $request
                ->file('image')
                ->store('constructions', 'public');
        }

        $construction->update($validated);

        return redirect()
            ->route('admin.constructions.index')
            ->with('success', 'Le projet a été mis à jour avec succès.');
    }

    /**
     * Suppression.
     */
    public function destroy(Construction $construction)
    {
        if ($construction->image) {

            Storage::disk('public')
                ->delete($construction->image);
        }

        $construction->delete();

        return redirect()
            ->route('admin.constructions.index')
            ->with('success', 'Le projet a été supprimé avec succès.');
    }
}