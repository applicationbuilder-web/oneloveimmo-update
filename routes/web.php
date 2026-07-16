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

/*
|--------------------------------------------------------------------------
| Front Office
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

Route::view('/about', 'about')
    ->name('about');

Route::view('/contact', 'contact')
    ->name('contact');

/*
|--------------------------------------------------------------------------
| Demande de devis
|--------------------------------------------------------------------------
*/

Route::get('/quote', [QuoteController::class, 'create'])
    ->name('quotes.create');

Route::post('/quote', [QuoteController::class, 'store'])
    ->name('quotes.store');

Route::get('/quote/success', [QuoteController::class, 'success'])
    ->name('quotes.success');

/*
|--------------------------------------------------------------------------
| Administration
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('categories', CategoryController::class);

        Route::resource('properties', AdminPropertyController::class);

        Route::resource('quotes', AdminQuoteController::class);

        Route::resource('constructions', AdminConstructionController::class);

    });