<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostsController;
use App\Models\Posts;

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
/*-----------------------------------------POSTS ROUTES------------------------------------------*/

//Show all posts
Route::get('/', [PostsController::class,'index'])->name('home');

//Show post creating form
Route::get('/posts/create', [PostsController::class,'create'])->name('post.create')->middleware('auth');

//Store post details in the database
Route::post('/posts', [PostsController::class,'store'])->middleware('auth');

//Show the edit form
// Route::get('/posts/{postId}/edit', [PostsController::class,'edit'])->name('post.edit')->middleware('auth');
//Method2
Route::get('/posts/{post}/edit', [PostsController::class,'edit'])->name('post.edit')->middleware('auth');



//Update the post details in the database
// Route::put('/posts/{postId}/update', [PostsController::class,'update'])->name('post.update')->middleware('auth');
//Method2
Route::put('/posts/{post}', [PostsController::class,'update'])->name('post.update')->middleware('auth');


//Manage Posts(Show table of all posts of the logged in user)
Route::get('/posts/manage', [PostsController::class,'manage'])->name('post.manage')->middleware('auth');

//Delete a post
Route::delete('/posts/{postId}/delete', [PostsController::class,'destroy'])->name('post.delete')->middleware('auth');

/*-----------------------------------------USER ROUTES------------------------------------------*/
//show register/create form
Route::get('/register', [UserController::class, 'create'])->name('register')->middleware('guest');

//create a new user
Route::post('/users', [UserController::class, 'store']);

//user logout
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//Show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//Login user
Route::post('/users/authenticate', [UserController::class, 'authenticate']); 



//Show a single post
Route::get('/posts/{postId}', [PostsController::class,'show'])->name('post.show');