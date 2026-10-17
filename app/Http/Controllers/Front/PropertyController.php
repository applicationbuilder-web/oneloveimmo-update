<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Liste des biens (Front) avec recherche et filtres
     */
    public function index(Request $request)
    {
        $query = Property::with('category')->latest();

        // Filtre par statut (vente / location)
        if ($request->filled('status') && in_array($request->status, ['a_vendre', 'a_louer'])) {
            $query->where('status', $request->status);
        }

        // Filtre par catégorie
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Filtre par ville
        if ($request->filled('city')) {
            $query->where('city', 'like', '%' . $request->city . '%');
        }

        // Recherche par mot-clé
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('address', 'like', "%{$search}%")
                  ->orWhere('type', 'like', "%{$search}%");
            });
        }

        $properties = $query->paginate(9)->withQueryString();
        $categories = Category::all();

        return view('properties.index', compact('properties', 'categories'));
    }

    /**
     * Détails d'un bien
     */
    public function show(Property $property)
    {
        $similarProperties = Property::where('id', '!=', $property->id)
            ->where(function ($q) use ($property) {
                $q->where('category_id', $property->category_id)
                  ->orWhere('status', $property->status);
            })
            ->latest()
            ->take(3)
            ->get();

        return view('properties.show', compact('property', 'similarProperties'));
    }
}