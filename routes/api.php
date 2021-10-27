<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

// Public route

// users
Route::post('users', [UserController::class, 'register']);
Route::post('users', [UserController::class, 'login']);

// Post
Route::get('posts', [PostController::class, 'index']);
Route::get('posts/{id}', [PostController::class, 'show']);

// Private route
Route::group(['middleware' => ['auth:sanctum']], function() {
    // User
    Route::post('users', [UserController::class, 'logout']);
    
    // Post
    Route::post('posts', [PostController::class, 'store']);
    Route::delete('posts/{id}', [PostController::class, 'destroy']);
    Route::put('posts/{id}', [PostController::class, 'update']);
});