<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LandController;
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

Route::get('/', [LandController::class, 'index'])->name('land.index');
Route::get('/blog-posts', [BlogController::class, 'posts'])->name('posts');
Route::get('/blog-single-post/{id}', [BlogController::class, 'single_post'])->name('single.post');
Route::get('comments', [CommentController::class, 'index'])->name('comments.index');
Route::post('comments/delete/{id}', [CommentController::class, 'delete'])->name('comments.delete');
Route::post('comments/store/{post_id}', [CommentController::class, 'store'])->name('comments.store');
