<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\ProjectController;
use App\Http\Controllers\Dashboard\JobController;
use App\Http\Controllers\Dashboard\IssueController;
use App\Http\Controllers\Dashboard\CustomerController;
use App\Http\Controllers\Dashboard\TaskController;
use App\Http\Controllers\Dashboard\CommentController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CardListController;

Route::group(['middleware' => ['role:user', 'auth', 'verified']], function() {
    Route::get('/boards', [BoardController::class, 'index'])->name('boards');
    Route::get('/boards/{board}/{card?}', [BoardController::class, 'show'])->name('boards.show');
    Route::put('/boards/{board}', [BoardController::class, 'update'])->name('boards.update');
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
        Route::get('/profile', [DashboardController::class, 'edit'])->name('profile');
        Route::post('/update',  [DashboardController::class,'update'])->name('profile.update');
        Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');
        Route::get('/customer/{id}', [CustomerController::class, 'show'])->name('customer.show');
        // Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');
        // Route::post('/customer/create', [CustomerController::class, 'store'])->name('customer.store');
        // Route::get('/customer/{id}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
        // Route::put('/customer/{id}', [CustomerController::class, 'update'])->name('customer.update');
        Route::get('/project', [ProjectController::class, 'index'])->name('project.index');
        Route::get('/project/planned', [ProjectController::class, 'planned'])->name('project.planned');
        Route::get('/project/progress', [ProjectController::class, 'progress'])->name('project.progress');
        Route::get('/project/done', [ProjectController::class, 'done'])->name('project.done');
        Route::get('/project/closed', [ProjectController::class, 'closed'])->name('project.closed');
        Route::get('/project/canceled', [ProjectController::class, 'canceled'])->name('project.canceled');
        Route::get('/project/hold', [ProjectController::class, 'hold'])->name('project.hold');
        // Route::get('/project/create', [ProjectController::class, 'create'])->name('project.create');
        // Route::post('/project/create', [ProjectController::class, 'store'])->name('project.store');
        // Route::get('/project/{id}/edit', [ProjectController::class, 'edit'])->name('project.edit');
        // Route::put('/project/{id}', [ProjectController::class, 'update'])->name('project.update');
        Route::get('/project/{id}', [ProjectController::class, 'show'])->name('project.show');
        Route::get('/project/{project_id}/jobs', [JobController::class, 'index'])->name('project.jobs.index');
        Route::get('/project/{project_id}/jobs/create', [JobController::class, 'create'])->name('project.jobs.create');
        Route::post('/project/create/job', [JobController::class, 'store'])->name('project.job.store');
        Route::get('/project/task/{id}', [JobController::class, 'show'])->name('task.show');
        Route::get('/project/job/{id}/edit', [JobController::class, 'edit'])->name('project.job.edit');
        Route::put('/project/job/{id}', [JobController::class, 'update'])->name('project.job.update');

        Route::get('/project/{project_id}/issue', [IssueController::class, 'index'])->name('project.issue.index');
        Route::get('/project/{project_id}/issue/create', [IssueController::class, 'create'])->name('project.issue.create');
        Route::post('/project/create/issue', [IssueController::class, 'store'])->name('project.issue.store');
        Route::get('/project/issue/{id}', [IssueController::class, 'show'])->name('issue.show');
        Route::get('/project/issue/{id}/edit', [IssueController::class, 'edit'])->name('project.issue.edit');
        Route::put('/project/issue/{id}', [IssueController::class, 'update'])->name('project.issue.update');

        Route::get('/project/{id}/comment', [CommentController::class, 'show'])->name('project.comment.show');

        // Route::get('/project', [ProjectController::class, 'index'])->name('project.index');
        // Route::get('/project/create', [ProjectController::class, 'create'])->name('project.create');

        // Route::get('/project/task/{id}', [TaskController::class, 'index'])->name('project.task');
        // Route::get('/project/task/{id}/create', [TaskController::class, 'create'])->name('project.task.create');
        // Route::post('/project/task', [TaskController::class, 'store'])->name('project.task.store');
        // Route::get('/project/task/{id}/edit', [TaskController::class, 'edit'])->name('project.task.edit');
        // Route::put('/project/task/{id}', [TaskController::class, 'update'])->name('project.task.update');
    });
});