<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::post('/contact-form', [HomeController::class, 'contact'])->name('contact.store');

require __DIR__.'/user.php';
require __DIR__.'/admin.php';
require __DIR__.'/auth.php';
