@extends('layouts.frontend.fix')

@section('title')
    Category Post
@endsection
@section('content')
<br><br><br>
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
                                <div class="col-md-6">
                                    @if(file_exists(public_path($post->thumbnail)))
                                        <a href="{{ route('blog.detail',$post->slug) }}" class="text-decoration-none">
                                            <img class="img-thumbnail" src="{{ asset($post->thumbnail) }}" alt="{{ $post->title }}">
                                        </a>
                                    @else
                                        <img class="img-fluid rounded" src="http://placehold.it/750x300" alt="{{ $post->title }}">
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <h3 class="card-title">
                                        {{ $post->title }}
                                    </h3>
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
            <div class="col-md-4">
                <div class="card card-member">
                    <div class="content">
                        <div class="description">
                            <div class="button-get-started">
                                <a href="#gaia" class="btn btn-danger btn-fill btn-lg">Category</a>
                            </div>
                            <div class="">
                                @foreach ($post->categories as $category)
                                    <a href="{{ route('blog.posts.category', ['slug' => $category->slug]) }}" class="btn btn-primary btn-fill btn-sm">{{ $category->title }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            
            <div class="col-md-4">
                <div class="card card-member">
                    <div class="content">
                        <div class="description">
                            <div class="button-get-started">
                                <button class="btn btn-danger btn-fill btn-lg">Tags</button>
                            </div>
                            <div class="">
                                @foreach ($post->tags as $tag)
                                    <a href="#" class="btn btn-primary btn-fill btn-sm">{{ $tag->title }}</a>
                                @endforeach
                            </div>
                        </div>
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

@push('css-external')

    <link href="/css/app.css" rel="stylesheet" />

    <link href="/css/gaia.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->

    <link href='https://fonts.googleapis.com/css?family=Cambo|Poppins:400,600' rel='stylesheet' type='text/css'>

    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">

@endpush



@push('js-external')
        <!--   core js files    -->
        <script src="/js/jquery.min.js" type="text/javascript"></script>
        <script src="/js/bootstrap.js" type="text/javascript"></script>
        <!--  js library for devices recognition -->
        <script type="text/javascript" src="/js/modernizr.js"></script>
        <!--  script for google maps   -->

        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
        <!--   file where we handle all the script from the Gaia - Bootstrap Template   -->
        <script type="text/javascript" src="/js/gaia.js"></script>

@endpush