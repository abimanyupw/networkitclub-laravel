<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\ManageCategoryController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/',[LandingController::class, 'home'])->name('home');
Route::get('/about',[LandingController::class, 'about'])->name('about');
Route::get('/classes',[LandingController::class, 'classes'])->name('classes');
Route::get('/classes/{course:slug}', [LandingController::class, 'class'])->name('class.show');

Route::get('/contact',[LandingController::class, 'contact'])->name('contact');


Route::get('/classes/{course:slug}/{material:slug}', [MaterialController::class, 'show'])
    ->name('materials.show');

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
});
Route::get('/terms', function () {
    return view('terms');
});

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard')->middleware('auth');
Route::resource('/manageuser',ManageUserController::class)->middleware('auth');
Route::resource('/managecategory',ManageCategoryController::class)->middleware('auth');




Route::get('/login', [LoginController::class, 'show'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
Route::get('/register', [RegisterController::class, 'show'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'register'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');