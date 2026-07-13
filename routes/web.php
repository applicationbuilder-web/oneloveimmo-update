<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\PropertyController;
use App\Http\Controllers\Front\ConstructionController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Les routes suivantes seront développées progressivement
Route::get('/properties', fn () => 'Page des biens')->name('properties.index');

Route::get('/about', fn () => 'À propos')->name('about');

Route::get('/contact', fn () => 'Contact')->name('contact');

Route::get('/properties', [PropertyController::class, 'index'])
    ->name('properties.index');

Route::get('/properties/{property}', [PropertyController::class, 'show'])
    ->name('properties.show');
Route::get('/construction', [ConstructionController::class, 'index'])
    ->name('construction.index');