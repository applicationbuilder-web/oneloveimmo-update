<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Construction;
use App\Models\Contact;
use App\Models\Property;
use App\Models\Quote;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Totaux généraux
        $totalProperties  = Property::count();
        $totalCategories  = Category::count();
        $totalProjects    = Construction::count();
        $totalUsers       = User::count();
        $totalQuotes      = Quote::count();
        $totalContacts    = Contact::count();

        // Alertes
        $newQuotes        = Quote::where('status', 'nouveau')->count();
        $unreadContacts   = Contact::where('is_read', false)->count();

        // Derniers biens (5)
        $latestProperties = Property::with('category')
            ->latest()
            ->take(5)
            ->get();

        // Dernières demandes de devis (5)
        $latestQuotes = Quote::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalProperties',
            'totalCategories',
            'totalProjects',
            'totalUsers',
            'totalQuotes',
            'totalContacts',
            'newQuotes',
            'unreadContacts',
            'latestProperties',
            'latestQuotes'
        ));
    }
}