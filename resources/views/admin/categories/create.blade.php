@extends('layouts.admin.dashboard')

@section('title')
    Category
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('add_category') }}
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
                <label for="input_category_slug" class="font-weight-bold">
                 Slug
                </label>
                <input id="input_category_slug" value="{{ old('slug') }}" name="slug" type="text" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}" readonly
                 placeholder="Auto Generate"/>
                 @error('slug')
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
                <label for="select_category_parent" class="font-weight-bold">
                    Parent Category
                </label>
                <select id="select_category_parent" name="parent_category"
                data-placeholder="Parent" class="custom-select w-100">
                 @if (old('parent_category'))
                     <option value="{{ old('parent_category')->id }}" selected>
                         {{ old('parent_category')->title }}
                     </option>
                 @endif
                </select>
             </div>
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
            <a href="{{ route('category.index') }}" class="btn btn-warning btn-sm">Kembali</a>
            <button type="submit" class="btn btn-primary btn-sm">Create</button>
        </div>
    </form>
</div>
@endsection

{{-- javascript external --}}
@push('css-internal')
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2-bootstrap4.min.css') }}">
@endpush
{{-- javascript external --}}
@push('javascript-external')
    <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
@endpush
{{-- end javascript external --}}
@push('javascript-internal')
<script>
    $(function(){
        // generate slug
        function generateSlug(value){
                return value.trim()
                .toLowerCase()
                .replace(/[^a-z\d-]/gi, '-')
                .replace(/-+/g, '-').replace(/^-|-$/g, "");
            }
        //parent category
        $('#select_category_parent').select2({
            theme: 'bootstrap4',
            language: "",
            allowClear: true,
            ajax: {
                url: "{{ route('category.select') }}",
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                        return {
                            text: item.title,
                            id: item.id
                        }
                        })
                    };
                }
            }
        });

        // event -> input title
        $('#input_category_title').change(function() {
                let title = $(this).val();
                let parent_category = $('#select_category_parent').val() ?? "";
                $('#input_category_slug').val(generateSlug(title + " " + parent_category));
            });

        // event -> select parent category
        $('#select_category_parent').change(function() {
            let title = $('#input_category_title').val();
            let parent_category = $(this).val() ?? "";
            $('#input_category_slug').val(generateSlug(title + " " + parent_category));
        });
        $('#button_category_thumbnail').filemanager('image');
    });
</script>
@endpush
