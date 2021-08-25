@extends('layouts.admin.dashboard')

@section('title')
    Create Tags
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('tags_edit', $tag) }}
@endsection

@section('content')
    <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Create Tags</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('tags.update', $tag->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label for="title">Tags</label>
                <input type="text" value="{{ old('title', $tag->title) }}" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Enter tags">
            </div>
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-sm">Edit</button>
            <a href="{{ route('tags.index') }}" type="submit" class="btn btn-warning btn-sm">Back</a>
        </div>
    </form>
  </div>
@endsection
