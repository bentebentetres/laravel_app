<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class CreatePostController extends Controller
{
    public function createPost(Request $request) {
        $postss = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $postss['title'] = strip_tags($postss['title']);
        $postss['description'] = strip_tags($postss['description']??'');
        $postss['user_id'] = auth()->id();
        Task::create($postss);
        return redirect('/');
    }
}
