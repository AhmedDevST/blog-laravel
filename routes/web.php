<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class,'show'])->name('login.show');
Route::post('/login',[LoginController::class,'login'] )->name("login");
Route::post('/logout',[LoginController::class,'logout'] )->name("logout");


Route::get('/posts', [PostController::class,'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class,'create'])->name('posts.create');
Route::post('/posts',[PostController::class,'store'] )->name("posts.store");
Route::get('/posts/search',[PostController::class,'search'] )->name("posts.search");
Route::put("/posts/{post}",[PostController::class,"update"] )->name("posts.update");
Route::delete("/posts/{post}",[PostController::class,"destroy"])->name("posts.destroy");
Route::get('/posts/{post}/edit',[PostController::class,'edit'])->name('posts.edit');
Route::get('/posts/{post}', [PostController::class,'show'])->name('posts.show');


Route::post('/posts/{post}/comments',[CommentController::class,'store'] )->name("posts.comments.store");
Route::delete("/post/comments/{comment}",[CommentController::class,"destroy"])->name('posts.comments.destroy');

