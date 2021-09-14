@extends('layouts.admin.dashboard')

@section('title')
    Detail Posts
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('detail_post', $post) }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
       <div class="card">
          <div class="card-body">
              @if (file_exists(public_path($post->thumbnail)))
                <!-- thumbnail:true -->
                <div class="post-tumbnail" style="background-image: url('{{ asset($post->thumbnail) }}');">
                </div>
              @else
                <!-- thumbnail:false -->
                <svg class="img-fluid" width="100%" height="400" xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
                    <rect width="100%" height="100%" fill="#868e96"></rect>
                    <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="#dee2e6" dy=".3em"
                        font-size="24">
                        {{ $post->title }}
                        </text>
                </svg>
              @endif

             <!-- categories -->
             <div class="mt-3">
                 <span class="text-muted">Categories : </span>
                 @foreach ($categories as $category)
                    <span class="badge badge-primary">{{ $category->title }}</span>
                 @endforeach
             </div>
             <!-- end categories -->

             <!-- tags  -->
             <div class="mt-3">
                 <span class="text-muted">Tags : </span>
                 @foreach ($tags as $tag)
                    <span class="badge badge-info"># {{ $tag->title }}</span>
                 @endforeach
             </div>
             <!-- end tags -->

             <!-- title -->
             <h2 class="my-1">
                {{ $post->title }}
             </h2>
             <!-- end title -->
             <!-- description -->
             <p class="text-justify">
                 {{ $post->description }}
                </p>
            <!-- end description -->

             <div class="py-1">
                 {!! $post->content !!}
             </div>


             <div class="d-flex justify-content-end">
                <a href="{{ route('posts.index') }}" class="btn btn-warning mx-1" role="button">
                   Kembali
                </a>
             </div>
          </div>
       </div>
    </div>
</div>
@endsection


@push('css-internal')
<style>
    .post-tumbnail {
     width: 100%;
     height: 400px;
     background-repeat: no-repeat;
     background-position: center;
     background-size: cover;
  }
  </style>
@endpush
