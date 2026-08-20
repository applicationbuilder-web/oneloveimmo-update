<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Construction;

class HomeController extends Controller
{
    /**
     * Affiche la page d'accueil.
     */
    public function index()
    {
        $constructions = Construction::latest()
            ->take(6)
            ->get();

        return view('home.index', compact('constructions'));
    }
}