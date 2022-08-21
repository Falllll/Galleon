<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CardListController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::post('/contact-form', [HomeController::class, 'contact'])->name('contact.store');

Route::group(['middleware' => ['auth', 'verified']], function() {
    Route::get('/boards/{board}/{card?}', [BoardController::class, 'show'])->name('boards.show');
    Route::put('/boards/{board}', [BoardController::class, 'update'])->name('boards.update');
    Route::get('/boards', [BoardController::class, 'index'])->name('boards');
    Route::post('/boards', [BoardController::class, 'store'])->name('boards.store');

    Route::post('/boards/{board}/lists', [CardListController::class, 'store'])->name('cardLists.store');
    Route::post('/cards', [CardController::class, 'store'])->name('cards.store');
    Route::put('/cards/{card}', [CardController::class, 'update'])->name('cards.update');
    Route::put('/cards/{card}/move', [CardController::class, 'move'])->name('cards.move');
    Route::delete('/cards/{card}', [CardController::class, 'destroy'])->name('cards.destroy');

    Route::group([
            'prefix' => 'dashboard',
            'namespace' => 'Dashboard',
            'as' => 'dashboard.'
    ], function (){
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    });
});

//Route::get('/', function () {
//    return Inertia::render('Welcome', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    ]);
//});

require __DIR__.'/auth.php';
