<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [FeedController::class, 'index'])->name('feed');

Route::prefix('/profile')
    ->group(function () {
        Route::get('/{username}', [ProfileController::class, 'show'])->name('profile');

        Route::middleware(['auth'])->group(function () {
            Route::get('', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('', [ProfileController::class, 'destroy'])->name('profile.destroy');
        });
    });

Route::prefix('/post')->group(function () {
    Route::get('/{uuid}', [PostController::class, 'show'])->name('post.details');

    Route::middleware(['auth'])->group(function () {
        Route::post('', [PostController::class, 'store'])->name('post.create');
        Route::get('/{uuid}/edit', [PostController::class, 'edit'])->name('post.edit');
        Route::patch('/{uuid}', [PostController::class, 'update'])->name('post.update');
        Route::delete('/{uuid}', [PostController::class, 'destroy'])->name('post.remove');
        Route::post('/{uuid}/comment', [CommentController::class, 'store'])->name('comment.create');
        Route::delete('/{uuid}/comment/{commentUUID}', [CommentController::class, 'destroy'])->name('comment.remove');
    });
});

require __DIR__ . '/auth.php';
