<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\ProjectController;
use App\Http\Controllers\Dashboard\JobController;
use App\Http\Controllers\Dashboard\IssueController;
use App\Http\Controllers\Dashboard\CustomerController;
use App\Http\Controllers\Dashboard\TaskController;
use App\Http\Controllers\Dashboard\CommentController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CustomerAdminController;
use App\Http\Controllers\Admin\ProjectAdminController;
use App\Http\Controllers\Admin\TaskAdminController;
use App\Http\Controllers\Admin\IssueAdminController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CardListController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::post('/contact-form', [HomeController::class, 'contact'])->name('contact.store');

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
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
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
        Route::get('/project/job/{id}/edit', [JobController::class, 'edit'])->name('project.job.edit');
        Route::put('/project/job/{id}', [JobController::class, 'update'])->name('project.job.update');

        Route::get('/project/{project_id}/issue', [IssueController::class, 'index'])->name('project.issue.index');
        Route::get('/project/{project_id}/issue/create', [IssueController::class, 'create'])->name('project.issue.create');
        Route::post('/project/create/issue', [IssueController::class, 'store'])->name('project.issue.store');
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

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'as' => 'admin.'
], function (){
    Route::group(['middleware' => ['role:admin', 'auth', 'verified']], function() {
        Route::get('/', [AdminController::class, 'index']);
        Route::get('/customer', [CustomerAdminController::class, 'index'])->name('customer.index');
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
        Route::get('/project/task/{id}/edit', [TaskAdminController::class, 'edit'])->name('task.edit');
        Route::put('/project/task/{id}', [TaskAdminController::class, 'update'])->name('task.update');
        Route::delete('/project/task/{id}', [TaskAdminController::class, 'destroy'])->name('task.delete');
        Route::get('/project/{project_id}/issue/create', [IssueAdminController::class, 'create'])->name('issue.create');
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
