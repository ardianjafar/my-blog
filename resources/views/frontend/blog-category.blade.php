@extends('layouts.frontend.fix')


@section('title')
    Blog
@endsection

@section('content')
<div class="container">
    <br><br><br><br>
    <div class="content">
        <div class="team">
            <div class="row py-5">
                <div class="col-md-12">
                    <div class="row">
                        @forelse ($categories as $category)
                        <div class="col-md-4">
                            <div class="card card-member">
                                <div class="content">
                                    <div class="avatart avatar-danger">
                                        @if (file_exists(public_path($category->thumbnail)))
                                            <img src="{{ asset($category->thumbnail) }}" alt="{{ $category->title }}" class="card-img-top" >
                                        @else 
                                            <a href="/posts?category={{ $category->slug }}">
                                                <div class="bg-dark text-white">
                                                    <img src="https://source.unsplash.com/500x500?{{ $category->slug }}" class="card-img" alt="{{ $category->slug }}">
                                                    <div class="card-img-overlay d-flex align-items-center p-0">
                                                    </div>
                                                </div>
                                            </a>
                                        @endif
                                    </div>
                                    <div class="description">
                                        <p class="card-text fs-2">
                                            <a href="{{ route('blog.posts.category', ['slug' => $category->slug]) }}"
                                                class="text-decoration-none">
                                                <h3>
                                                    {{ $category->title }}
                                                </h3>
                                            </a>
                                        </p>
                                        <p class="card-text">
                                            {{ $category->description }}
                                        </p>
                                    </div>
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
            </div>
        </div>
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