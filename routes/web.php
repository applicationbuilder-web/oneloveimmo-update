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

Route::get('/contact', [ContactController::class, 'index'])
    ->name('contact');
Route::post('/contact', [ContactController::class, 'store'])
    ->name('contact.store');

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

        Route::patch(
            'quotes/{quote}/status',
            [AdminQuoteController::class, 'changeStatus']
        )->name('quotes.status');

        Route::resource('constructions', AdminConstructionController::class);

        Route::resource('contacts', AdminContactController::class);
    });
