@extends('layouts.frontend.app')


@section('title')
    Blog
@endsection

@section('content')
<div class="container">
    <h1 class="mb-3 text-center mt-3">{{ $title }}</h1>
    <div class="row justify-content-center">
        <div class="col-md-8 mb-3">
            <form action="/posts">
                @if (request('categories'))
                    <input type="hidden" name="category" value="{{ request('categories') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
                    <button class="btn btn-dark" type="submit">Search</button>
                  </div>
            </form>
        </div>
    </div>

    
    @if($posts->count())
        <div class="card mb-3">
            @if(file_exists(public_path($posts[0]->thumbnail)))
                <a href="{{ route('blog.detail',$posts[0]->slug) }}" class="text-decoration-none">
                    <img class="card-img-top" src="{{ asset($posts[0]->thumbnail) }}" alt="{{ $posts[0]->title }}">
                </a>
            @else
                <img class="img-fluid rounded" src="http://placehold.it/750x300" alt="{{ $posts[0]->title }}">
            @endif
            <div class="card-body text-center">
            <h3 class="card-title">{{ $posts[0]->title }}</h3>
            <p>
                <small>
                    By . <a href="/posts?authors={{ $posts[0]->author->username }}" class="text-decoration-none">
                        {{ $posts[0]->author->name }}
                        </a>
                    In . 
                </small> 
            </p>
            <p class="card-text">{{ $posts[0]->description }}</p>
                <p class="card-text">
                    <small class="text-muted">
                        {{ $posts[0]->created_at->diffForHumans() }}
                    </small>
                </p>
            </div>
        </div>

    
        <div class="container">
            <div class="row">
            @foreach ($posts->skip(1) as $post)
                    <div class="col-md-4">
                        <div class="card mb-4">
                            {{-- <div class="position-absolute px-3 py-2 " style="background-color: rgba(0,0,0,0.7)">
                                <a href="/posts?category={{ $post->categories->slug }}" class="text-white text-decoration-none">{{ $post->categories->title }}</a>
                            </div> --}}
                            @if(file_exists(public_path($post->thumbnail)))
                            {{-- {{ Storage::url('public/blogs/').$blog->image }} --}}
                            <a href="{{ route('blog.detail',$post->slug) }}" class="text-decoration-none">
                                <img class="card-img-top" src="{{ asset($post->thumbnail) }}" alt="{{ $post->title }}">
                            </a>
                            @else
                                <img class="img-fluid rounded" src="http://placehold.it/750x300" alt="{{ $post->title }}">
                            @endif
                            <div class="card-body">
                                <h1 class="card-title">{{ $post->title }}</h1>
                                <div class="d-flex justify-content-between">
                                    <p class="text-muted">
                                        <small>
                                            By . <a href="/blog-content?authors={{ $post->author->name}}" class="text-decoration-none">
                                                    {{ $post->author->name }}
                                                 </a>
                                        </small> 
                                    </p>
                                    <p class="text-muted">
                                        <small>
                                            {{ $post->created_at->diffForHumans() }}
                                        </small>
                                    </p>
                                </div>
                                <p class="card-text">{!! $post->description !!}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="{{ route('blog.detail',$post->slug) }}" class="btn btn-primary btn-sm">Read more</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
            @endforeach
            </div>
        </div>
    @else 
    <p class="text-center fs-4">No Posts Found</p>
    @endif

    
  
    {{-- <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div> --}}
</div>
@endsection
