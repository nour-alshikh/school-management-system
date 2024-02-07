<?php

use App\Http\Controllers\Classrooms\ClassroomController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Grades\GradeController;
use App\Http\Controllers\sections\SectionController;
use App\Http\Controllers\Students\StudentController;
use App\Http\Controllers\Teachers\TeacherController;
use App\Livewire\AddParents;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


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

    ##################### parents #####################
    Route::get('/add-parents', AddParents::class);

    ##################### teachers #####################
    Route::resource('teachers', TeacherController::class);

    ##################### students #####################
    Route::resource('students', StudentController::class);
    Route::get('/get-sections/{id}', [StudentController::class, 'get_sections']);
    Route::post('/upload-attachments', [StudentController::class, 'upload_attachments']);
    Route::get('/download-attachment/{student_name}/{file_name}', [StudentController::class, 'download_attachment']);
    Route::post('/delete-attachment', [StudentController::class, 'delete_attachment']);

    Livewire::setUpdateRoute(function ($handle) {
        return Route::post('/livewire/update', $handle);
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
