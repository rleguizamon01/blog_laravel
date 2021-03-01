@extends('layout')

@section('title', 'Posts')

@section('container')
      <div class="container d-flex flex-wrap justify-content-around">

        @foreach($posts as $post)
                <div class="card mb-4 mt-4 shadow p-3 mb-5 bg-white rounded" style="width: 18rem;">
                    <div class="card-body">
                            <h2 class="card-title text-center">
                                <a href="{{ route('posts.show', $post->id) }}">
                                    {{ $post->title }}
                                </a>
                            </h2>

                        <p>
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
                        </p>

                        <p class="card-text">
                            <strong> 
                                {{ $post->category->name }}
                            </strong>
                        </p>
                    </div>
                </div>
        @endforeach
 
    </div>

    <div class="d-flex justify-content-center">
            {{ $posts->links('pagination::bootstrap-4') }}
    </div>
@endsection