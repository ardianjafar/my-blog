@extends('layouts.frontend.app')


@section('title')
    Blog
@endsection

@section('content')
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @if(file_exists(public_path($post->thumbnail)))
                        <img class="card-img-top" src="{{ asset($post->thumbnail) }}" alt="{{ $post->title }}">
                @else
                        <img class="img-fluid rounded" src="http://placehold.it/750x300" alt="{{ $post->title }}">
                @endif
                
                <h2 class="mt-4 mb-3">
                    {{ $post->title  }}
                </h2>
                <hr>
                <!-- Post Content:start -->
                <div>
                    {!! $post->content  !!}
                </div>
            </div>
            <!-- Sidebar Widgets Column:start -->
            <div class="col-md-4">
                <!-- Categories Widget -->
                <div class="card mb-3">
                    <h5 class="card-header">
                        Categories
                    </h5>
                <div class="card-body">
                    <!-- category list:start -->
                    @foreach ($post->categories as $category)
                        <a href="{{  }}" class="badge bg-primary py-2 px-4 my-1 text-decoration-none text-white">
                            {{ $category->title }}
                        </a>
                    @endforeach
                </div>
                <!-- category list:end -->

            </div>
            <!-- Side Widget tags:start -->
            <div class="card mb-3">
                <h5 class="card-header">
                    Post Tags
                </h5>
                <div class="card-body">
                    <!-- tag list:start -->
                    @foreach ($post->tags as $tag)
                        <a href="" class="badge bg-info py-2 px-4 my-1 text-decoration-none">
                            #{{ $tag->title }}
                        </a>
                    @endforeach
                    <!-- tag list:end -->
                </div>
                </div>
                <!-- Side Widget tags:start -->
            </div>
            <!-- Sidebar Widgets Column:end -->
            
        </div>   
    </div>
@endsection