<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\taskController;
use App\Http\Controllers\CreatePostController;


Route::get('/', function () {
    $posts = Task::where('user_id', auth()->id())->get();
    return view('greet', ['posts' => $posts]);
});

Route::post('/task', [taskController::class, 'CrudTask']);
Route::post('/logout', [taskController::class, 'logout']);

Route::post('/createPost', [CreatePostController::class, 'createPost']);
Route::get('/editPost/{post}',[CreatePostController::class, 'showEditScreen']);
Route::put('/editPost/{post}', [CreatePostController::class, 'UpdatePost'])->name('editPost');
Route::delete('/deletePost/{post}', [CreatePostController::class, 'DeletePost'])->name('deletePost');
