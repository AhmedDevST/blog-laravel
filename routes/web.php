<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\Useless;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'show'])->name('login.show');
Route::post('/login', [LoginController::class, 'login'])->name("login");
Route::post('/logout', [LoginController::class, 'logout'])->name("logout");

//route group
Route::name("posts.")->prefix("posts")->group(function () {
    Route::get('/search', [PostController::class, 'search'])->name("search");
    Route::controller(CommentController::class)->group(function () {
        Route::post('/{post}/comments', 'store')->name("comments.store");
        Route::delete("/comments/{comment}", "destroy")->name('comments.destroy');
    });
});
Route::middleware(['auth'])->group(function () {
    // show,index,create,edit,update,store,destroy
    Route::resource('posts', PostController::class);
});


