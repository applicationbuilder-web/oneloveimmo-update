<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Les routes suivantes seront développées progressivement
Route::get('/properties', fn () => 'Page des biens')->name('properties.index');

Route::get('/about', fn () => 'À propos')->name('about');

Route::get('/contact', fn () => 'Contact')->name('contact');