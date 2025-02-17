<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\taskController;
use App\Http\Controllers\CreatePostController;


Route::get('/', function () {
    return view('greet');
});

Route::post('/task', [taskController::class, 'CrudTask']);
Route::post('/logout', [taskController::class, 'logout']);

Route::post('/createPost', [CreatePostController::class, 'createPost']);