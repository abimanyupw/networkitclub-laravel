<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\ManageCourseController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ManageCategoryController;
use App\Http\Controllers\ManageMaterialController;
use App\Http\Controllers\ManageAssignmentController;
use App\Http\Controllers\ManageInformationController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/',[LandingController::class, 'home'])->name('home');
Route::get('/about',[LandingController::class, 'about'])->name('about');
Route::get('/classes',[LandingController::class, 'classes'])->name('classes');


Route::get('/contact',[LandingController::class, 'contact'])->name('contact');


Route::get('/classes/show', [ClassesController::class, 'index'])->name('kelas')->middleware('auth');
Route::get('/classes/{course:slug}', [ClassesController::class, 'class'])->name('class.show')->middleware('auth');
Route::get('/classes/{course:slug}/{material:slug}', [MaterialController::class, 'show'])
    ->name('materials.show')->middleware('auth');

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
              Route::post('/managematerial/upload-image', [ManageMaterialController::class, 'uploadImage'])
            ->name('managematerial.uploadImage');
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

Route::get('/information/{manageinformation:slug}', [InformationController::class, 'show'])
    ->name('information.show');
Route::get('/information', [InformationController::class, 'index'])
    ->name('information');



Route::get('/login', [LoginController::class, 'show'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
Route::get('/register', [RegisterController::class, 'show'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'register'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');




Route::get('/forgot-password', function () {
    return view('forgot-password');
})->name('forgot.password');

Route::post('/forgot-password', [ForgotPasswordController::class, 'process'])
    ->name('forgot.password.process');

Route::middleware(['auth', 'role:admin,developer,teknisi'])->group(function () {

    Route::get('/manageassignment/checkSlug',
        [ManageAssignmentController::class, 'checkSlug'])
        ->name('manageassignment.checkSlug');

    Route::resource('/manageassignment', ManageAssignmentController::class);
    Route::put('/submission/{submission}/score',
    [SubmissionController::class, 'score']);

    Route::post(
        '/manageassignment/submission/{submission}/score',
        [SubmissionController::class, 'score']
    )->name('submission.score');
});




Route::middleware('auth')->group(function () {

    Route::get('/assignments', [SubmissionController::class, 'index'])
        ->name('assignments.index');

    Route::get('/assignments/{assignment}', [SubmissionController::class, 'show'])
        ->name('assignments.show');

    Route::post('/assignments/{assignment}/submit', [SubmissionController::class, 'store'])
        ->name('assignments.submit');
});

Route::middleware(['auth', 'role:admin,developer,teknisi'])->group(function () {
    Route::post(
        '/manageassignment/{assignment:slug}/submission/{submission}/score',
        [ManageAssignmentController::class, 'giveScore']
    )->name('assignment.submission.score');
});