@extends('layouts.frontend.app')


@section('title')
    Blog
@endsection

@section('content')
    <div class="mt-4 mb-4">
        <h1 class="text-center">Posts Category </h1>
    </div>
    <div class="container">
        <div class="row">
            @forelse ($categories as $category)    
                <div class="col-lg-4 col-sm-6 portfolio-item mb-3">
                    <div class="card">
                        <a href="/posts?category={{ $category->slug }}">
                            <div class="bg-dark text-white">
                                <img src="https://source.unsplash.com/500x500?{{ $category->slug }}" class="card-img" alt="{{ $category->slug }}">
                                <div class="card-img-overlay d-flex align-items-center p-0">
                                    <h5 class="card-title text-center flex-fill p-4 fs-3" style="background-color: rgba(0,0,0,0.7)">{{ $category->slug }}</h5>
                                </div>
                            </div>
                        </a>
                        
                        <div class="card-body">
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