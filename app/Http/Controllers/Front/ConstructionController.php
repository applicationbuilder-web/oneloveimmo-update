<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class ConstructionController extends Controller
{
    public function index()
    {
        return view('construction.index');
    }
}