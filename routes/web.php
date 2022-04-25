<?php

use App\Http\Controllers\Auth\SocialMediaController;
use App\Http\Controllers\CommentController;

use App\Http\Controllers\PostController;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/posts',[PostController::class,'index'])->name('posts.index')->middleware('auth');
Route::get('/',[PostController::class,'index'])->name('posts.index')->middleware('auth');
Route::get('/posts/post/{id}',[PostController::class,'show'])->name('post.show')->middleware('auth');

/*
 *  create new Book require 2 steps:-
 *      > get  : request to display the form
 *      > post : request to preform change
*/
Route::get('/posts/create',[PostController::class,'create'])->name('post.create')->middleware('auth');
Route::post('/posts/store',[PostController::class,'store'])->name('post.store')->middleware('auth');
/*
 * edit on an existing book require 2 steps :-
 *      > get  : request to display the form to edit
 *      > post : request to preform the update on form
 */
Route::get('/posts/edit/{id}',[PostController::class,'edit'])->name('post.edit')->middleware('auth');
Route::put('/posts/update/{id}',[PostController::class,'update'])->name('post.update')->middleware('auth');

/*
 * delete an existing record :-
 *
 *
 */
Route::delete('/posts/delete/{id}',[PostController::class,'delete'])->name('post.delete')->middleware('auth');
Route::put('/posts/restore/{id}',[PostController::class,'restore'])->name('post.restore')->middleware('auth');


// delete comment

Route::delete('/posts/{id}',[CommentController::class,'deleteComment'])->name('post.deleteComment')->middleware('auth');
Route::put('/posts/{id}',[CommentController::class,'restoreComment'])->name('post.restoreComment')->middleware('auth');

// edit comment
Route::get('/posts/editComment/{id}',[CommentController::class,'editComment'])->name('post.editComment')->middleware('auth');
Route::put('/posts/updateComment/{id}',[CommentController::class,'updateComment'])->name('post.updateComment')->middleware('auth');

// add comment
Route::post('/posts/comment/store',[CommentController::class,'storeComment'])->name('post.storeComment')->middleware('auth');



Route::get('social-auth/{provider}/callback',[SocialMediaController::class,'providerCallback']);
Route::get('social-auth/{provider}',[SocialMediaController::class,'redirectToProvider'])->name('social.redirect');



Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
