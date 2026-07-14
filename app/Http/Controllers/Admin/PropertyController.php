<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PropertyController extends Controller
{
    /**
     * Afficher la liste des biens.
     */
    public function index()
    {
        $properties = Property::with('category')
            ->latest()
            ->paginate(10);

        return view('admin.properties.index', compact('properties'));
    }

    /**
     * Afficher le formulaire de création.
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.properties.create', compact('categories'));
    }

    /**
     * Enregistrer un nouveau bien.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'type' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'address' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'surface' => 'required|numeric|min:0',
            'bedrooms' => 'nullable|integer|min:0',
            'bathrooms' => 'nullable|integer|min:0',
            'status' => 'required|in:a_vendre,a_louer',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        ]);

        /*
        |--------------------------------------------------------------------------
        | Génération d'un slug unique
        |--------------------------------------------------------------------------
        */

        $slug = Str::slug($validated['title']);
        $originalSlug = $slug;
        $count = 1;

        while (Property::where('slug', $slug)->exists()) {

            $slug = $originalSlug . '-' . $count++;

        }

        $validated['slug'] = $slug;

        /*
        |--------------------------------------------------------------------------
        | Upload de l'image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            $validated['image'] = $request
                ->file('image')
                ->store('properties', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Enregistrement
        |--------------------------------------------------------------------------
        */

        Property::create($validated);

        return redirect()
            ->route('admin.properties.index')
            ->with('success', 'Le bien immobilier a été ajouté avec succès.');
    }

    /**
     * Afficher un bien.
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Formulaire de modification.
     */
    public function edit(Property $property)
    {
        //
    }

    /**
     * Mettre à jour un bien.
     */
    public function update(Request $request, Property $property)
    {
        //
    }

    /**
     * Supprimer un bien.
     */
    public function destroy(Property $property)
    {
        //
    }
}