<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\CvController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobApplicationPhaseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Project\ProjectController;
use App\Http\Controllers\Project\ProjectImageController;
use App\Http\Controllers\SkillController;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard', [
        'breadcrumbs' => Breadcrumbs::generate('profile'),
        'pageTitle' => 'Dashboard',
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/contact', [ContactController::class, 'send'])->name('contactMe');

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
    Route::resource('job-applications', JobApplicationController::class);
    Route::prefix('job-applications/{jobApplication}/phases')->name('job-applications.phases.')->group(function () {
        Route::get('/', [JobApplicationPhaseController::class, 'index'])->name('index');
        Route::post('/', [JobApplicationPhaseController::class, 'store'])->name('store');
        Route::put('/{phase}', [JobApplicationPhaseController::class, 'update'])->name('update');
        Route::delete('/{phase}', [JobApplicationPhaseController::class, 'destroy'])->name('destroy');
    });
});

require __DIR__.'/auth.php';
