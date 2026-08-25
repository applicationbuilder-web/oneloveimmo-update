<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Construction;
use App\Models\Property;
use App\Models\SiteSetting;

class HomeController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::first();

        $properties = Property::latest()->take(6)->get();

        $constructions = Construction::latest()->take(6)->get();

        return view('home.index', compact(
            'settings',
            'properties',
            'constructions'
        ));
    }
}