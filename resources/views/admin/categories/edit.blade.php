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
      <h3 class="card-title">Edit Category</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label for="input_category_title">Edit Category</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $category->title) }}" name="title"
                id="input_category_title" placeholder="Enter Category">
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
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
                    <input id="input_category_thumbnail" name="thumbnail" value="{{ old('thumbnail', asset($category->thumbnail)) }}" type="text" class="form-control @error('thumbnail') is-invalid @enderror"
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
                <img src="{{ asset('' . $category->thumbnail) }}" alt="" class="w-25">
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
        <div class="card-footer">
            <a href="{{ route('category.index') }}" class="btn btn-warning btn-sm">Kembali</a>
            <button type="submit" class="btn btn-primary btn-sm">Edit</button>
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
