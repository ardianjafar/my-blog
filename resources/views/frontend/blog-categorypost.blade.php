@extends('layouts.frontend.app')

@section('title')
    Category Post
@endsection
@section('content')
    <h2 class="mt-4 mb-3 text-center">
        Category Post : {{ $category->title }}
    </h2>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @forelse ($posts as $post)
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    @if(file_exists(public_path($posts[0]->thumbnail)))
                                        <a href="{{ route('blog.detail',$posts[0]->slug) }}" class="text-decoration-none">
                                            <img class="card-img-top" src="{{ asset($posts[0]->thumbnail) }}" alt="{{ $posts[0]->title }}">
                                        </a>
                                    @else
                                        <img class="img-fluid rounded" src="http://placehold.it/750x300" alt="{{ $posts[0]->title }}">
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <h2 class="card-title">
                                        {{ $post->title }}
                                    </h2>
                                    <p class="cart-text">
                                        {{ $post->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center">
                        <h1>No Category By Posts</h1>
                    </div>
                @endforelse
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <h5 class="card-header">
                        Coba Saja
                    </h5>
                    <div class="card-body">
                        @if ($category->slug == $categoryRoot->slug)
                            {{ $categoryRoot->title }}
                        @else
                            <a href="{{ route('blog.posts.category', ['slug' => $categoryRoot->slug]) }}">
                                {{ $categoryRoot->title }}
                            </a>
                        @endif

                        @if ($categoryRoot->descendants)
                            @include('frontend.sub-category',[
                                'categoryRoot'  => $categoryRoot->descendants,
                                'category'      => $category
                            ])
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="justify-content-center">
            @if ($posts->hasPages())
                <div class="text-center">
                    {{ $posts->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection