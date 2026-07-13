<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Property;

class PropertyController extends Controller
{
    /**
     * Afficher la liste des biens
     */
    public function index()
    {
        $properties = Property::latest()->get();

        return view('properties.index', compact('properties'));
    }


    /**
     * Afficher un bien en détail
     */
    public function show(Property $property)
    {
        return view('properties.show', compact('property'));
    }
}