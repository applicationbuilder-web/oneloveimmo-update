<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Property;

class PropertyController extends Controller
{
    /**
     * Liste des biens (Front)
     */
    public function index()
    {
        $properties = Property::latest()->paginate(9);

        return view('properties.index', compact('properties'));
    }

    /**
     * Détails d'un bien
     */
    public function show(Property $property)
    {
        return view('properties.show', compact('property'));
    }
}