<?php

use App\Http\Controllers\BoardController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::group(['middleware' => ['auth', 'verified']], function() {
    Route::get('/board', [BoardController::class, 'show'])->name('boards.show');
    Route::get('/boards', [BoardController::class, 'index'])->name('boards');
    Route::post('/boards', [BoardController::class, 'store'])->name('boards.store');
});

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

require __DIR__.'/auth.php';
