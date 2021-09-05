@extends('layouts.frontend.app')


@section('title')
    Blog
@endsection

@section('content')
<div class="container py-3">
    <div class="row mt-lg-5">
        <div class="col-lg-7 mt-2">
            @forelse ($posts as $post)
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <!-- thumbnail:start -->
                        @if (file_exists(public_path($post->thumbnail)))
                            <img class="card-img-top" src="{{ asset($post->thumbnail) }}" alt="{{ $post->title }}">
                        @else
                            <img class="img-fluid rounded" src="http://placehold.it/750x300" alt="{{ $post->title }}">
                        @endif
                    </div>
                </div>
            </div>
            <div class="mt-2">
                <h1>{{ $post->title }}</h1>
                <hr>
                <p class="card-text">
                 {{ $post->description }} <a href="">readmore...</a>
                </p>
            </div>
            @empty
                No Data
            @endforelse
        </div>

        <div class="col-lg-4 mt-2">
            <div class="card mb-4">
                <div class="card-header">Search</div>
                <div class="card-body">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                        <button class="btn btn-primary" id="button-search" type="button">Cari</button>
                    </div>
                </div>
            </div>
            <h1>Category</h1>
            <hr>
            <div class="card">
                <div class="card-body mb-4">

                </div>
            </div>

            <h1>Tags</h1>
            <hr>
            <div class="card">
                <div class="card-body mb-4">

                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <hr>
        <h1>Next Post</h1>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h1>Test</h1>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h1>Test</h1>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h1>Test</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center mt-3">
        <a href="">Load More...</a>
    </div>
</div>
@endsection


