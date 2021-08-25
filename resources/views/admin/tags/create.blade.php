@extends('layouts.admin.dashboard')

@section('title')
    Create Tags
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('tags_add') }}
@endsection

@section('content')
    <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Create Tags</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('tags.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="title">Tags</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Enter tags">
            </div>
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            {{-- <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" name="slug" id="slug" placeholder="Slug Auto Generate" readonly>
            </div> --}}
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-sm">Create</button>
        </div>
    </form>
  </div>
@endsection
