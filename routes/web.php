<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

// Route::post('/register', [UserController::class, 'register']);
Route::controller(UserController::class)->group(function() {
    Route::post('/register', 'register');
    Route::post('/logout', 'logout');
    Route::post('/login', 'login');
});

Route::controller(PostController::class)->group(function() {
    Route::post('/create-post', 'createPost');
});