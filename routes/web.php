<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\Useless;
use Illuminate\Foundation\Bootstrap\RegisterProviders;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'show'])->name('login.show');
    Route::post('/login', [LoginController::class, 'login'])->name("login");
    Route::get('/register', [RegisterController::class,'show'])->name('register.show');
    Route::post('/register', [RegisterController::class,'register'])->name('register');
});


Route::get('/home',function(){
    return view('posts.home');
});


//route group
Route::middleware(['auth'])->group(function () {
    Route::name("posts.")->prefix("posts")->group(function () {
        Route::get('/search', [PostController::class, 'search'])->name("search");
        Route::controller(CommentController::class)->group(function () {
            Route::post('/{post}/comments', 'store')->name("comments.store");
            Route::delete("/comments/{comment}", "destroy")->name('comments.destroy');
        });
    });
    // show,index,create,edit,update,store,destroy
    // Place this at the bottom to ensure custom routes are matched first
    Route::resource('posts', PostController::class);

    //logout
    Route::post('/logout', [LoginController::class, 'logout'])->name("logout");
});


