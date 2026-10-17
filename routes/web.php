<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Front Controllers
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\PropertyController;
use App\Http\Controllers\Front\ConstructionController;
use App\Http\Controllers\Front\QuoteController;
use App\Http\Controllers\Front\ContactController;

/*
|--------------------------------------------------------------------------
| Admin Controllers
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PropertyController as AdminPropertyController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ConstructionController as AdminConstructionController;
use App\Http\Controllers\Admin\QuoteController as AdminQuoteController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\SiteSettingController;

/*
|--------------------------------------------------------------------------
| FRONT OFFICE
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/properties', [PropertyController::class, 'index'])
    ->name('properties.index');

Route::get('/properties/{property}', [PropertyController::class, 'show'])
    ->name('properties.show');

Route::get('/construction', [ConstructionController::class, 'index'])
    ->name('construction.index');

Route::get('/construction/{construction}', [ConstructionController::class, 'show'])
    ->name('construction.show');

Route::view('/about', 'about')
    ->name('about');

Route::get('/contact', [ContactController::class, 'index'])
    ->name('contact');

Route::post('/contact', [ContactController::class, 'store'])
    ->middleware('throttle:6,1')
    ->name('contact.store');

/*
|--------------------------------------------------------------------------
| DEMANDE DE DEVIS
|--------------------------------------------------------------------------
*/

Route::get('/quote', [QuoteController::class, 'create'])
    ->name('quotes.create');

Route::post('/quote', [QuoteController::class, 'store'])
    ->middleware('throttle:6,1')
    ->name('quotes.store');

Route::get('/quote/success', [QuoteController::class, 'success'])
    ->name('quotes.success');

/*
|--------------------------------------------------------------------------
| ADMINISTRATION (PROTÉGÉE PAR AUTH + ROLE ADMIN)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Dashboard
        |--------------------------------------------------------------------------
        */

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        /*
        |--------------------------------------------------------------------------
        | Catégories
        |--------------------------------------------------------------------------
        */

        Route::resource('categories', CategoryController::class);

        /*
        |--------------------------------------------------------------------------
        | Biens immobiliers
        |--------------------------------------------------------------------------
        */

        Route::resource('properties', AdminPropertyController::class);

        /*
        |--------------------------------------------------------------------------
        | Demandes de devis
        |--------------------------------------------------------------------------
        */

        Route::resource('quotes', AdminQuoteController::class);

        Route::patch(
            'quotes/{quote}/status',
            [AdminQuoteController::class, 'changeStatus']
        )->name('quotes.status');

        /*
        |--------------------------------------------------------------------------
        | Messages de contact
        |--------------------------------------------------------------------------
        */

        Route::resource('contacts', AdminContactController::class);

        /*
        |--------------------------------------------------------------------------
        | Projets de construction
        |--------------------------------------------------------------------------
        */

        Route::resource('constructions', AdminConstructionController::class);

        /*
        |--------------------------------------------------------------------------
        | Paramètres du site
        |--------------------------------------------------------------------------
        |
        | Gestion de l'image du Hero / Carousel de la page d'accueil.
        |
        */

        Route::get('/settings', [SiteSettingController::class, 'edit'])
            ->name('settings.edit');

        Route::put('/settings', [SiteSettingController::class, 'update'])
            ->name('settings.update');
    });

/*
|--------------------------------------------------------------------------
| AUTHENTIFICATION LARAVEL BREEZE
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';