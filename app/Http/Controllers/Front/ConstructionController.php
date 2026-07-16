<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Construction;

class ConstructionController extends Controller
{
    /**
     * Afficher les projets de construction.
     */
    public function index()
    {
        $constructions = Construction::latest()->paginate(9);

        return view('construction.index', compact('constructions'));
    }
}