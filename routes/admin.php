<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('admin')->group(function () {
    Route::get('/login', [AuthController::class, 'get_admin_login'])->name('get.admin.login');
    Route::post('login', [AuthController::class, 'login'])->name('admin.login');

    Route::middleware("auth:admin")->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
        // category
        Route::resource('category', CategoryController::class);
        // posts
        Route::resource('posts', PostController::class);
        // comment
        Route::get('comments', [CommentController::class, 'index'])->name('comments.index');
        //logout
        Route::post('logout', [AuthController::class, 'logout'])->name('admin.logout');
    });
});
