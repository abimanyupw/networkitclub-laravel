<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;

Route::get('/',[LandingController::class, 'home'])->name('home');
Route::get('/about',[LandingController::class, 'about'])->name('about');
Route::get('/class',[LandingController::class, 'class'])->name('class');
Route::get('/contact',[LandingController::class, 'contact'])->name('contact');