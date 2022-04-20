<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts',[PostController::class,'index'])->name('posts.index');
Route::get('/posts/post/{id}',[PostController::class,'show'])->name('post.show');

/*
 *  create new Book require 2 steps:-
 *      > get  : request to display the form
 *      > post : request to preform change
*/
Route::get('/posts/create',[PostController::class,'create'])->name('post.create');
Route::post('/posts/store',[PostController::class,'store'])->name('post.store');
/*
 * edit on an existing book require 2 steps :-
 *      > get  : request to display the form to edit
 *      > post : request to preform the update on form
 */
Route::get('/posts/edit/{id}',[PostController::class,'edit'])->name('post.edit');
Route::put('/posts/update/{id}',[PostController::class,'update'])->name('post.update');

/*
 * delete an existing record :-
 *
 *
 */
Route::delete('/posts/delete/{id}',[PostController::class,'delete'])->name('post.delete');
Route::put('/posts/restore/{id}',[PostController::class,'restore'])->name('post.restore');


// delete comment

Route::delete('/posts/{id}',[PostController::class,'deleteComment'])->name('post.deleteComment');
Route::put('/posts/{id}',[PostController::class,'restoreComment'])->name('post.restoreComment');
