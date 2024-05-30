<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
Route::get('/', function () {
    return view('welcome');
});


Route::get('/api/posts', [PostController::class, 'index']);
Route::post('/api/posts', [PostController::class, 'store']);
Route::get('/api/posts/{post}', [PostController::class, 'show']);
Route::put('/api/posts/{post}', [PostController::class, 'update']);
Route::delete('/api/posts/{post}', [PostController::class, 'destroy']);

