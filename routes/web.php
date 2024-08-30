<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



//access public
Route::get('/login', [LoginController::class, 'show'])->name('login.show');
Route::post('/login', [LoginController::class, 'login'])->name("login");
Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home/posts/{post}', [HomeController::class, 'show'])->name('home.posts.show');
Route::get('/home/tags/{tag}', [HomeController::class, 'searchByTags'])->name('home.tag');
Route::get('/home/search', [HomeController::class, 'search'])->name('home.search');

//authenticate 
Route::middleware(['auth'])->group(function () {

    // Comment routes (accessible to subscribers , admins and editors)
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('posts.comments.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('posts.comments.destroy');

    // Post management routes (accessible to admins and editors)
    Route::group(['middleware' => ['role:Admin|Editor']], function () {
        Route::get('/posts/search', [PostController::class, 'search'])->name('posts.search');
        // show,index,create,edit,update,store,destroy
        // Place this at the bottom to ensure custom routes are matched first
        Route::resource('posts', PostController::class);
    });


    //logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

});
