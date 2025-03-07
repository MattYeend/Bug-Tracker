<?php

use App\Http\Controllers\BugController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ReportsController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    Route::get('/reports', [ReportsController::class, 'index'])
        ->name('reports.index');

    Route::prefix('bugs')->name('bugs.')->group(function() {
        Route::get('/', [BugController::class, 'index'])->name('index');
        Route::get('/create', [BugController::class, 'create'])->name('create');
        Route::post('/', [BugController::class, 'store'])->name('store');
        Route::get('/{bugs}', [BugController::class, 'show'])->name('show');
        Route::get('/{bugs}/edit', [BugController::class, 'edit'])->name('edit');
        Route::put('/{bugs}', [BugController::class, 'update'])->name('update');
        Route::delete('/{bugs}', [BugController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('projects')->name('projects.')->group(function() {
        Route::get('/', [ProjectController::class, 'index'])->name('index');
        Route::get('/create', [ProjectController::class, 'create'])->name('create');
        Route::post('/', [ProjectController::class, 'store'])->name('store');
        Route::get('/{projects}', [ProjectController::class, 'show'])->name('show');
        Route::get('/{projects}/edit', [ProjectController::class, 'edit'])->name('edit');
        Route::put('/{projects}', [ProjectController::class, 'update'])->name('update');
        Route::delete('/{projects}', [ProjectController::class, 'destroy'])->name('destroy');
    });
});

require __DIR__.'/auth.php';
