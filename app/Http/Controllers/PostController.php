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
        return view('posts.show', ['post' => $id]);
    }

    public function create(){
        return view('posts.create');
    }
    
    public function store(){
        Post::create($this->validatePost());

        return redirect()->route('posts.index');
    }

    public function edit(Post $id){
        return view('posts.edit', ['post' => $id]);
    }

    public function update(Post $id){
        $id->update($this->validatePost());

        return redirect()->route('posts.edit', $id->id);
    }

    public function destroy(Post $id){
        $id->delete();

        return redirect()->route('posts.index');
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
