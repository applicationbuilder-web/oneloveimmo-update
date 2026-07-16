<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Construction;
use App\Models\Property;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProperties = Property::count();

        $totalCategories = Category::count();

        $totalProjects = class_exists(Construction::class)
            ? Construction::count()
            : 0;

        $totalUsers = class_exists(User::class)
            ? User::count()
            : 0;

        return view('admin.dashboard', compact(
            'totalProperties',
            'totalCategories',
            'totalProjects',
            'totalUsers'
        ));
    }
}