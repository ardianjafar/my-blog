@extends('layouts.frontend.fix')


@section('title')
    Blog
@endsection

@section('content')
<body style="background:black; height:50%;">
    <br><br><br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if($posts->count())
                <div class="card mb-3">
                    @if(file_exists(public_path($posts[0]->thumbnail)))
                        <a href="{{ route('blog.detail',$posts[0]->slug) }}" class="text-decoration-none">
                            <img class="card-img-top" src="{{ asset($posts[0]->thumbnail) }}" alt="{{ $posts[0]->title }}" style="width: 1250px; height: 500px;">
                        </a>
                    @else
                        <img class="img-fluid rounded" src="http://placehold.it/750x300" alt="{{ $posts[0]->title }}">
                    @endif
                    <div class="text-center">
                        <div class="row">
                            <div class="col-lg-offset-1 col-lg-10">
                                <h3 class="card-title">{{ $posts[0]->title }}</h3>
                                <p>
                                    <small>
                                        By . <a href="/posts?authors={{ $posts[0]->author->username }}" class="text-decoration-none">
                                            {{ $posts[0]->author->name }}
                                            </a>
                                        In . 
                                    </small> 
                                </p>
                                <p class="description">{{ $posts[0]->description }}</p>
                                <p class="">
                                    <small class="text-muted">
                                        {{ $posts[0]->created_at->diffForHumans() }}
                                    </small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
            <div class="content">
                <div class="section section-our-team-freebie">
                    <div class="row">
                        <div class="title-area">
                            <h2>Who We Are</h2>
                            <div class="separator separator-danger">✻</div>
                            <p class="description">We promise you a new look and more importantly, a new attitude. We build that by getting to know you, your needs and creating the best looking clothes.</p>
                        </div>
                    </div>
                </div>
    
                <div class="team">
                    <div class="row py-5">
                        <div class="col-md-12">
                            <div class="row">
                                @foreach ($posts->skip(1) as $post)
                                <div class="col-md-4">
                                    <div class="card card-member">
                                        <div class="content">
                                            <div class="avatar avatar-danger">
                                                @if(file_exists(public_path($post->thumbnail)))
                                                {{-- {{ Storage::url('public/blogs/').$blog->image }} --}}
                                                <a href="{{ route('blog.detail',$post->slug) }}" class="text-decoration-none">
                                                    <img class="card-img-top" src="{{ asset($post->thumbnail) }}" alt="{{ $post->title }}">
                                                </a>
                                                @else
                                                    <img class="img-fluid rounded" src="http://placehold.it/750x300" alt="{{ $post->title }}">
                                                @endif
                                            </div>
                                            <div class="description">
                                                <h3 class="title">
                                                    {{ $post->title }}
                                                </h3>
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
                                                <p>
                                                    {!! $post->description !!}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else 
            <p class="text-center fs-4">No Posts Found</p>
            @endif
    </div>
</body>
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