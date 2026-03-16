<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // Gets all posts.
    // $posts = Post::all();

    // Checks post where id is equal to user_id, doesn't use relationship.
    // $posts = Post::where('user_id', auth()->id())->get();
    
    // Uses relationship between user and posts using user_id.
    $posts = [];
    if(auth()->check()) {
        $posts = auth()->user()->usersCoolPosts()->latest()->get();
    }
    return view('home', ['posts' => $posts]);
});

// Route::post('/register', [UserController::class, 'register']);
Route::controller(UserController::class)->group(function() {
    Route::post('/register', 'register');
    Route::post('/logout', 'logout');
    Route::post('/login', 'login');
});

Route::controller(PostController::class)->group(function() {
    Route::post('/create-post', 'createPost');
    Route::get('/edit-post/{post}', 'showEditScreen');
    Route::put('/edit-post/{post}', 'updatePost');
    Route::delete('/delete-post/{post}', 'deletePost');
});