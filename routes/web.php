<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\MaterialController;

Route::get('/',[LandingController::class, 'home'])->name('home');
Route::get('/about',[LandingController::class, 'about'])->name('about');
Route::get('/classes',[LandingController::class, 'classes'])->name('classes');
Route::get('/classes/{course:slug}', [LandingController::class, 'class'])->name('class.show');

Route::get('/contact',[LandingController::class, 'contact'])->name('contact');


Route::get('/classes/{course:slug}/{material:slug}', [MaterialController::class, 'show'])
    ->name('materials.show');