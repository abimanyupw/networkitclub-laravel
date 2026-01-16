<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\ManageCourseController;
use App\Http\Controllers\ManageCategoryController;
use App\Http\Controllers\ManageMaterialController;
use App\Http\Controllers\ManageInformationController;
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
Route::middleware(['auth', 'role:admin,developer'])
    ->group(function () {
        Route::resource('/manageuser', ManageUserController::class);
});

Route::middleware(['auth', 'role:admin,developer,teknisi'])
    ->group(function () {

        Route::get('/managecategory/checkSlug', [ManageCategoryController::class, 'checkSlug'])
            ->name('managecategory.checkSlug');
        Route::resource('/managecategory', ManageCategoryController::class);

        Route::get('/managematerial/checkSlug', [ManageMaterialController::class, 'checkSlug'])
            ->name('managematerial.checkSlug');
        Route::post('/managematerial/upload-image', [ManageMaterialController::class, 'uploadImage'])
            ->name('managematerial.uploadImage');
        Route::resource('/managematerial', ManageMaterialController::class);
        Route::get('/manageinformation/checkSlug', [ManageInformationController::class, 'checkSlug'])
            ->name('manageinformation.checkSlug');
        Route::resource('/manageinformation', ManageInformationController::class);
});
Route::middleware(['auth', 'role:admin,developer'])
    ->group(function () {

        Route::get('/managecourse/checkSlug', [ManageCourseController::class, 'checkSlug'])
            ->name('managecourse.checkSlug');
        Route::resource('/managecourse', ManageCourseController::class);
});


Route::middleware('auth')->group(function () {

    Route::get('/settings', [SettingController::class, 'show'])->name('settings.show');
    Route::get('/settings/profile', [SettingController::class, 'edit'])->name('settings.edit');
    Route::put('/settings/profile', [SettingController::class, 'update'])->name('settings.update');
});



Route::get('/login', [LoginController::class, 'show'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
Route::get('/register', [RegisterController::class, 'show'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'register'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');