<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Affiche la page d'accueil.
     */
    public function index()
    {
        return view('home.index');
    }
}