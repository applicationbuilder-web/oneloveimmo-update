<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\Category;

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
        //
    }

    /**
     * Afficher un bien.
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Afficher le formulaire de modification.
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
