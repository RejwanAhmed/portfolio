<?php

use App\Http\Controllers\CvController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\HomeController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Project\ProjectController;
use App\Http\Controllers\Project\ProjectImageController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/other-information/{user}', [ProfileController::class, 'updateOtherInformation'])->name('profile.otherInformation');

    Route::resource('/projects', ProjectController::Class);
    Route::resource('/skills', SkillController::Class);
    
    Route::prefix('project-images')->name('project.images.')->group(function () {
        Route::get('/{project}', [ProjectImageController::class, 'index'])->name('index');
        Route::post('/{project}', [ProjectImageController::class, 'store'])->name('store');
        Route::delete('/{projectImage}', [ProjectImageController::class, 'destroy'])->name('destroy');
    });

    Route::resource('/experiences', ExperienceController::class);
    Route::resource('/educations', EducationController::class);
    Route::prefix('cvs')->name('cvs.')->group( function() {
        Route::get('/', [CvController::class, 'index'])->name('index');
        Route::post('/store', [CvController::class, 'store'])->name('store');
        Route::delete('/{cv}', [CvController::class, 'destroy'])->name('destroy');
        Route::patch('/{cv}/change-status', [CvController::class, 'changeStatus'])->name('changeStatus');
    });
});

require __DIR__.'/auth.php';
