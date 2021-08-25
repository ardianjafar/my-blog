@extends('layouts.admin.dashboard')

@section('title')
    Category
@endsection

@section('breadcrumbs')
    Category
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Create Tags</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="input_category_title" class="font-weight-bold">
                   Title
                </label>
                <input id="input_category_title" value="{{ old('title') }}" name="title" type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}"
                placeholder="Masukkan Title"/>
                @error('title')
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
                @enderror
             </div>
            <div class="form-group">
                <label for="thumbnail">
                    Gambar
                </label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        {{-- data-input="thumbnail"  --}}
                       <button id="button_category_thumbnail" data-input="input_category_thumbnail"
                       class="btn btn-primary" type="button" data-preview="holder">
                         Cari
                       </button>
                    </div>
                    <input id="input_category_thumbnail" name="thumbnail" value="{{ old('thumbnail') }}" type="text" class="form-control @error('thumbnail') is-invalid @enderror"
                    placeholder="Telusuri Gambar" readonly>
                    @error('thumbnail')
                       <span class="invalid-feedback" role="alert">
                           {{ $message }}
                       </span>
                    @enderror
                </div>
            </div>
            <!-- Preview Image -->
            <div id="holder">
            </div>
            <!-- End Preview Image-->
            <div class="form-group">
                <label for="input_category_description" class="font-weight-bold">
                    Deskripsi
                </label>
                <textarea id="input_category_description" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}" rows="3"
                placeholder="Masukkan Deskripsi">{{ old('description') }}</textarea>
                @error('description')
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
                @enderror
             </div>
        </div>
        <div class="float-right m-3">
            <button type="submit" class="btn btn-primary btn-sm">Create</button>
        </div>
    </form>
</div>
@endsection

{{-- javascript external --}}
@push('javascript-external')
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
@endpush
{{-- end javascript external --}}
@push('javascript-internal')
<script>
    $('#button_category_thumbnail').filemanager('image');
</script>
@endpush
