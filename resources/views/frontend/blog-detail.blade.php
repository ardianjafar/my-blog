@extends('layouts.frontend.fix')


@section('title')
    Blog
@endsection

@section('content')
    <div class="container mb-5">
        <br><br><br><br>
        <div class="row">
            <div class="col-lg-8">
                @if(file_exists(public_path($post->thumbnail)))
                        <img class="card-img-top" src="{{ asset($post->thumbnail) }}" alt="{{ $post->title }}" style="width: 750px">
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
            <div class="col-md-4">
                <div class="card card-member">
                    <div class="content">
                        <div class="description">
                            <div class="button-get-started">
                                <a href="#gaia" class="btn btn-danger btn-fill btn-lg">Category</a>
                            </div>
                            <div class="">
                                @foreach ($post->categories as $category)
                                    <a href="#gaia" class="btn btn-primary btn-fill btn-sm">{{ $category->title }}</a>
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
                                <a href="#gaia" class="btn btn-danger btn-fill btn-lg">Tags</a>
                            </div>
                            <div class="">
                                @foreach ($post->tags as $tag)
                                    <a href="#gaia" class="btn btn-primary btn-fill btn-sm">{{ $tag->title }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br> 
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