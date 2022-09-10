<?php 

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CustomerAdminController;
use App\Http\Controllers\Admin\ProjectAdminController;
use App\Http\Controllers\Admin\TaskAdminController;
use App\Http\Controllers\Admin\IssueAdminController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\Admin\PositionController;

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'as' => 'admin.'
], function (){
    Route::group(['middleware' => ['role:admin', 'auth', 'verified']], function() {
        Route::get('/', [AdminController::class, 'index']);
        Route::get('/profile', [AdminController::class, 'edit'])->name('profile');
        Route::post('/update',  [AdminController::class,'update'])->name('profile.update');

        Route::get('/customer', [CustomerAdminController::class, 'index'])->name('customer.index');
        Route::get('/customer/{id}', [CustomerAdminController::class, 'show'])->name('customer.show');
        Route::get('/customer/create', [CustomerAdminController::class, 'create'])->name('customer.create');
        Route::post('/customer/create', [CustomerAdminController::class, 'store'])->name('customer.store');
        Route::get('/customer/{id}/edit', [CustomerAdminController::class, 'edit'])->name('customer.edit');
        Route::put('/customer/{id}', [CustomerAdminController::class, 'update'])->name('customer.update');
        Route::delete('/customer/{id}', [CustomerAdminController::class, 'destroy'])->name('customer.delete');

        Route::get('/project', [ProjectAdminController::class, 'index'])->name('project.index');
        Route::get('/project/create', [ProjectAdminController::class, 'create'])->name('project.create');
        Route::post('/project/create', [ProjectAdminController::class, 'store'])->name('project.store');
        Route::get('/project/{id}/edit', [ProjectAdminController::class, 'edit'])->name('project.edit');
        Route::get('/project/{id}', [ProjectAdminController::class, 'show'])->name('project.show');
        Route::put('/project/{id}', [ProjectAdminController::class, 'update'])->name('project.update');
        Route::delete('/project/{id}', [ProjectAdminController::class, 'destroy'])->name('project.delete');

        Route::get('/project/{project_id}/task/create', [TaskAdminController::class, 'create'])->name('task.create');
        Route::post('/project/create/task', [TaskAdminController::class, 'store'])->name('task.store');
        Route::get('/project/task/{id}', [TaskAdminController::class, 'show'])->name('task.show');
        Route::get('/project/task/{id}/edit', [TaskAdminController::class, 'edit'])->name('task.edit');
        Route::put('/project/task/{id}', [TaskAdminController::class, 'update'])->name('task.update');
        Route::delete('/project/task/{id}', [TaskAdminController::class, 'destroy'])->name('task.delete');

        Route::get('/project/{project_id}/issue/create', [IssueAdminController::class, 'create'])->name('issue.create');
        Route::get('/project/issue/{id}', [IssueAdminController::class, 'show'])->name('issue.show');
        Route::post('/project/create/issue', [IssueAdminController::class, 'store'])->name('issue.store');
        Route::get('/project/issue/{id}/edit', [IssueAdminController::class, 'edit'])->name('issue.edit');
        Route::put('/project/issue/{id}', [IssueAdminController::class, 'update'])->name('issue.update');
        Route::delete('/project/issue/{id}', [IssueAdminController::class, 'destroy'])->name('issue.delete');

        Route::get('/user', [UserAdminController::class, 'index'])->name('user.index');
        Route::get('/user/create', [UserAdminController::class, 'create'])->name('user.create');
        Route::post('/user/create', [UserAdminController::class, 'store'])->name('user.store');
        Route::get('/user/{id}/edit', [UserAdminController::class, 'edit'])->name('user.edit');
        Route::put('/user/{id}', [UserAdminController::class, 'update'])->name('user.update');
        Route::delete('/user/{id}', [UserAdminController::class, 'destroy'])->name('user.delete');

        Route::get('/position', [PositionController::class, 'index'])->name('position.index');
        Route::get('/position/create', [PositionController::class, 'create'])->name('position.create');
        Route::post('/position/create', [PositionController::class, 'store'])->name('position.store');
        Route::get('/position/{id}/edit', [PositionController::class, 'edit'])->name('position.edit');
        Route::put('/position/{id}', [PositionController::class, 'update'])->name('position.update');
        Route::delete('/position/{id}', [PositionController::class, 'destroy'])->name('position.delete');
    });
});