<?php

use App\Http\Controllers\Classrooms\ClassroomController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Grades\GradeController;
use App\Http\Controllers\sections\SectionController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth', 'verified']
], function () {
    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
    Route::get('/', function () {
        return view('dashboard');
    });

    ##################### Grades #####################
    Route::resource('grades', GradeController::class);

    ##################### Classrooms #####################
    Route::resource('classrooms', ClassroomController::class);
    Route::delete('/delete-all', [ClassroomController::class, 'delete_all'])->name('classrooms.delete-all');
    Route::post('/filter-classes', [ClassroomController::class, 'filter_classes'])->name('classrooms.filter-classes');

    ##################### sections #####################
    Route::resource('sections', SectionController::class);
    Route::get('/get-classes/{id}', [SectionController::class, 'get_classes']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
