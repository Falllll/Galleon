<?php

use App\Http\Controllers\HomeController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CustomerAdminController;
use Inertia\Inertia;

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::post('/contact-form', [HomeController::class, 'contact'])->name('contact.store');

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'as' => 'admin.'
], function (){
    Route::group(['middleware' => ['role:admin', 'auth', 'verified']], function() {

        Route::get('/customer/create', [CustomerAdminController::class, 'create'])->name('customer.create');
       
       
    });
});
require __DIR__.'/user.php';
require __DIR__.'/admin.php';
require __DIR__.'/auth.php';