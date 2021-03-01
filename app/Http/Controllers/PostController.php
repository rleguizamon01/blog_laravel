<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Storage;

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
        return view('posts.create', ['categories' => Category::all()]);
    }
    
    public function store(Request $request){
        $this->validatePost();


        Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category,
            'image' => $request->image->store('images', 'public'),
        ]);

        return redirect()->route('posts.index');
    }

    public function edit(Post $id){
        return view('posts.edit', ['post' => $id, 'categories' => Category::all()]);
    }

    public function update(Request $request, $id){
        $this->validatePost();

        $post = Post::findOrFail($id);

        Storage::delete('public/'.$post->image);
        
        $post->title = $request->title;
        $post->body = $request->body;
        $post->category_id =  $request->category;
        $post->image = $request->image->store('images', 'public');

        $post->save();

        return redirect()->route('posts.show', $id);
    }

    public function destroy(Post $id){
        Storage::delete('public/'.$id->image);

        $id->delete();

        return redirect()->route('posts.index');
    }

    protected function validatePost(){
        return request()->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'required',
            'category' => 'required'
        ]);
    }
}
