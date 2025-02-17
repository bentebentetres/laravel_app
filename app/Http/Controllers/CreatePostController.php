<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class CreatePostController extends Controller
{

    public function DeletePost(Task $post){
        if (auth()->user()->id === $post['user_id']) {
            $post->delete(); 
        }
        return redirect('/');
    }

    public function UpdatePost(Task $post, Request $request){
        if (auth()->user()->id !== $post['user_id']) {
            return redirect('/');
        }

        $validates = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $validates['title'] =strip_tags($validates['title']);
        $validates['description'] =strip_tags($validates['description']);

        $post->update($validates);
        return redirect('/');
    }

    public function showEditScreen(Task $post){
        if (auth()->user()->id !== $post['user_id']) {
            return redirect('/');
        }
        return view('editPost', ['post' => $post]);
    }

    public function createPost(Request $request) {
        $postss = $request->validate([
            'title' => 'required',
            'description' => 'required|string',
        ]);

        $postss['title'] = strip_tags($postss['title']);
        $postss['description'] = strip_tags($postss['description']??'');
        $postss['user_id'] = auth()->id();
        Task::create($postss);
        return redirect('/');
    }
}
