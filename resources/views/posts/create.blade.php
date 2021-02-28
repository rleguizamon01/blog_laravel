@extends('layout')

@section('title', 'Upload App')

@section('container')
    <div class="container">
        <!-- Dev uploads app to database -->
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mt-3">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title">
            </div>

            <div class="form-group">
                <label for="body">Body</label>
                <input type="text" class="form-control" name="body">
            </div>
            
            <div class="form-group">
            <label for="category">Category</label> <br>
                <select class="custom-select" name="category">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"> {{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="image">Image</label>    
                <input type="file" class="form-control" name="image">
            </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if(session('status'))
            <div class="alert alert-success mt-3" role="alert">
                {{ session('status')}}
            </div>
        @endif
    </div>

@endsection