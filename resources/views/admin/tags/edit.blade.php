@extends('layouts.admin.dashboard')

@section('title')
    Edit Tag
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('edit_tag', $tag) }}
@endsection

@section('content')
    <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit Tag</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('tags.update', ['tag' => $tag]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label for="input_tag_title" class="font-weight-bold">
                   Title
                </label>
                <input id="input_tag_title" value="{{ old('title', $tag->title) }}" name="title" type="text"
                   class="form-control @error('title') is-invalid @enderror"
                   placeholder="Masukkan title" />
                   @error('title')
                      <span class="invalid-feedback">
                          <strong>{{ $message }}</strong>
                      </span>
                   @enderror
             </div>
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group">
                <label for="input_tag_slug" class="font-weight-bold">
                   Slug
                </label>
                <input id="input_tag_slug" value="{{ old('slug', $tag->slug) }}" name="slug" type="text"
                   class="form-control @error('slug') is-invalid @enderror"
                   placeholder="Auto Generate" readonly />
                   @error('slug')
                      <span class="invalid-feedback">
                          <strong>{{ $message }}</strong>
                      </span>
                   @enderror
             </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('tags.index') }}" class="btn btn-warning btn-sm">Kembali</a>
            <button type="submit" class="btn btn-primary btn-sm">Buat</button>
        </div>
    </form>
  </div>
@endsection

@push('javascript-internal')
    <script>
        $(document).ready(function() {
            const generateSlug = (value) => {
            return value.trim()
                .toLowerCase()
                .replace(/[^a-z\d-]/gi, '-')
                .replace(/-+/g, '-').replace(/^-|-$/g, "")
            }

        /*
            Event -> slug
        */
        $("#input_tag_title").change(function(event) {
            $("#input_tag_slug").val(generateSlug(event.target.value))
        });
    });

    </script>
@endpush
