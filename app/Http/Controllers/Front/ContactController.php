<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    /**
     * Afficher la page Contact
     */
    public function index()
    {
        return view('contact');
    }
}