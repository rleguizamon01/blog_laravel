<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        $posts = Post::latest()->get();

        return view('posts.index', compact('posts'));
    }

    public function show(Post $id){
        return view('posts.show', ['article' => $id]);
    }

    public function create(){
        return view('posts.create');
    }
    
    public function store(){
        Post::create($this->validatePost());

        return redirect(route('posts.index'));
    }

    protected function validatePost(){
        return request()->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'required',
            'category_id' => 'required'
        ]);
    }
}
