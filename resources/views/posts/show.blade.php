@extends('layout')

@section('title', $post->title)

@section('container')
<div class="container d-flex flex-wrap justify-content-around" >
    <div class="m-2 card w-100 p-4 ">
        <div class="row ">
            <div class="col-md-3"> 
                @if($post->image == "")
                    <img 
                    src="https://via.placeholder.com/253x169" 
                    class="card-img-top img-thumbnail" 
                    alt="..."
                    />
                @else
                    <img 
                    src="{{asset('../storage/app/public/'.$post->image) }}"
                    class="card-img-top img-thumbnail" 
                    />
                @endif
            </div>
            <div class="col-md-9">
                <div class="row">
                    <h1 class=""> {{ $post->title }} </h2>
                </div>
                <div class="row">
                    <h4> {{ $post->category->name }} </strong>
                </div>
                <div class="row">
                    <strong> {{ $post->body }} </strong>
                </div>
                <div class="row">
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                    <form method="POST" action="{{ route('posts.destroy', $post->id) }}">                    
                        @METHOD('delete')
                        @csrf
                        <div class="form-group">
                            <input type="submit" class="btn btn-danger delete-user" value="Delete post">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection