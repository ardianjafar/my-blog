@extends('layouts.frontend.fix')


@section('title')
    Blog
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @forelse ($categories as $category)    
                <div class="col-lg-4 col-sm-6 portfolio-item mb-3">
                    <div class="card">
                        @if (file_exists(public_path($category->thumbnail)))
                            <img src="{{ asset($category->thumbnail) }}" alt="{{ $category->title }}" class="card-img-top" >
                        @else 
                            <a href="/posts?category={{ $category->slug }}">
                                <div class="bg-dark text-white">
                                    <img src="https://source.unsplash.com/500x500?{{ $category->slug }}" class="card-img" alt="{{ $category->slug }}">
                                    <div class="card-img-overlay d-flex align-items-center p-0">
                                        <h5 class="card-title text-center flex-fill p-4 fs-3" style="background-color: rgba(0,0,0,0.7)">{{ $category->slug }}</h5>
                                    </div>
                                </div>
                            </a>
                        @endif
                        <div class="card-body">
                            <h6>Title</h6>
                            <p class="card-text fs-2">
                                <a href="{{ route('blog.posts.category', ['slug' => $category->slug]) }}"
                                    class="text-decoration-none">
                                    {{ $category->title }}
                                </a>
                            </p>
                            <p class="card-text">
                                {{ $category->description }}
                            </p>
                        </div>
                    </div>
                </div>
            @empty
            <h3 class="text-center">
                No data
            </h3>
            @endforelse
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