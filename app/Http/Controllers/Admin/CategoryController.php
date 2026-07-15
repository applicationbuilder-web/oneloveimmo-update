<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Liste des catégories.
     */
    public function index()
    {
        $categories = Category::latest()->paginate(10);

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Formulaire d'ajout.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Enregistrer une catégorie.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'name' => 'required|max:255|unique:categories,name',

            'icon' => 'nullable|max:255',

            'description' => 'nullable',

        ]);

        $validated['slug'] = Str::slug($validated['name']);

        Category::create($validated);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Catégorie ajoutée avec succès.');
    }

    /**
     * Afficher une catégorie.
     */
    public function show(Category $category)
    {
        return redirect()->route('admin.categories.index');
    }

    /**
     * Formulaire de modification.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Mettre à jour une catégorie.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([

            'name' => 'required|max:255|unique:categories,name,' . $category->id,

            'icon' => 'nullable|max:255',

            'description' => 'nullable',

        ]);

        $validated['slug'] = Str::slug($validated['name']);

        $category->update($validated);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Catégorie mise à jour avec succès.');
    }

    /**
     * Supprimer une catégorie.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Catégorie supprimée avec succès.');
    }
}