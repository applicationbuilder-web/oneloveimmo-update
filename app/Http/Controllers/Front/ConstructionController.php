<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Construction;
use App\Models\SiteSetting;

class ConstructionController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::first();

        $constructions = Construction::latest()->paginate(9);

        return view('construction.index', compact(
            'settings',
            'constructions'
        ));
    }

    public function show(Construction $construction)
    {
        $settings = SiteSetting::first();

        return view('construction.show', compact(
            'settings',
            'construction'
        ));
    }
}