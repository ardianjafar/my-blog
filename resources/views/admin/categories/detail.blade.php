@extends('layouts.admin.dashboard')

@section('title')
    Category
@endsection

@section('breadcrumbs')
   {{ Breadcrumbs::render('detail_category_title', $category) }}
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                {{-- {{ dd(asset($categories->thumbnail)) }} --}}
                @if (file_exists(public_path($category->thumbnail)))
                <div class="text-center">
                    <img src="{{ asset($category->thumbnail) }}" alt="{{ $category->title }}" style="height: 450px; width:750px;">
                </div>
                @else
                    <!-- thumbnail:false -->
                    <svg class="img-fluid" width="100%" height="400" xmlns="http://www.w3.org/2000/svg"
                        preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
                        <rect width="100%" height="100%" fill="#868e96"></rect>
                        <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="#dee2e6" dy=".3em"
                            font-size="24">
                            {{ $category->title }}
                        </text>
                    </svg>
                @endif
                <!-- title -->

                <h2 class="my-1">
                    {{ $category->title }}
                </h2>
                <!-- description -->
                <p class="text-justify">
                    {{ $category->description }}
                </p>
                <p class="text-justify">
                    {{ $category->created_at->diffForHumans() }}
                </p>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('category.index') }}" class="btn btn-primary mx-1" role="button">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
