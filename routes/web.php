<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;

Route::get('/',[LandingController::class, 'home'])->name('home');
Route::get('/about',[LandingController::class, 'about'])->name('about');
Route::get('/classes',[LandingController::class, 'classes'])->name('classes');
Route::get('/classes/{slug}',[LandingController::class, 'class'])->name('class');


Route::get('/contact',[LandingController::class, 'contact'])->name('contact');