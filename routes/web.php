<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/posts', [PostController::class,'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class,'create'])->name('posts.create');
Route::post('/posts',[PostController::class,'store'] )->name("posts.store");
Route::post('/posts/{post}/comments',[CommentController::class,'store'] )->name("comments.store");
Route::put("/posts/{post}",[PostController::class,"update"] )->name("posts.update");
Route::delete("/post/comments/{comment}",[CommentController::class,"destroy"])->name('comments.destroy');
Route::delete("/posts/{post}",[PostController::class,"destroy"])->name("posts.destroy");
Route::get('/posts/{post}/edit',[PostController::class,'edit'])->name('posts.edit');
Route::get('/posts/{post}', [PostController::class,'show'])->name('posts.show');