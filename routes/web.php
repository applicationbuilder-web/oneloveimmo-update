<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\PropertyController;
use App\Http\Controllers\Front\ConstructionController;
use App\Models\Property;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PropertyController as AdminPropertyController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Les routes suivantes seront développées progressivement
Route::get('/properties', fn() => 'Page des biens')->name('properties.index');

Route::get('/about', fn() => 'À propos')->name('about');

Route::get('/contact', fn() => 'Contact')->name('contact');

Route::get('/properties', [PropertyController::class, 'index'])
    ->name('properties.index');

Route::get('/properties/{property}', [PropertyController::class, 'show'])
    ->name('properties.show');

Route::get('/construction', [ConstructionController::class, 'index'])
    ->name('construction.index');

Route::get('/properties/{property}', [PropertyController::class, 'show'])
    ->name('properties.show');

Route::prefix('admin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');
});

Route::prefix('admin')->name('admin.')->group(function () {

    Route::resource('properties', AdminPropertyController::class);
});
// Front
Route::get('/properties', [PropertyController::class, 'index'])
    ->name('properties.index');

// Admin
Route::prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::resource('properties', AdminPropertyController::class);
    });
