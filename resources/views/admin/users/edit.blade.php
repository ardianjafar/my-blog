@extends('layouts.admin.dashboard')

@section('title')
    Edit
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('edit_users', $user) }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
       <div class="card">
          <div class="card-body">
             <form action="{{ route('users.update', ['user' => $user]) }}" method="POST">
                @method('PUT')
                @csrf
                <!-- name -->
                <div class="form-group">
                   <label for="input_user_name" class="font-weight-bold">
                      Nama
                   </label>
                   <input id="input_user_name" value="{{ $user->name }}" name="name" type="text" class="form-control @error('name') is-invalid @enderror" readonly/>
                </div>
                <!-- email -->
                <div class="form-group">
                    <label for="input_user_email" class="font-weight-bold">
                       Email
                    </label>
                    <input id="input_user_email" value="{{ $user->email }}" name="email" type="email" class="form-control" readonly
                       autocomplete="email" />
                    <!-- error message -->

                 </div>
                <!-- role -->
                <div class="form-group">
                   <label for="select_user_role" class="font-weight-bold">
                     User Role
                   </label>
                   <select id="select_user_role" name="role" data-placeholder="Role" class="custom-select w-100 @error('role') is-invalid @enderror">
                        @if (old('role', $userSelected))
                            <option value="{{ old('role', $userSelected)->id }}" selected>
                                {{ old('role',$userSelected)->name }}
                            </option>
                        @endif
                   </select>
                   <!-- error message -->
                   @error('role')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                   @enderror
                </div>

                <div class="float-right">
                   <a class="btn btn-warning px-4 mx-2" href="{{ route('users.index') }}">
                      Kembali
                   </a>
                   <button type="submit" class="btn btn-primary float-right px-4">
                      Ubah
                   </button>
                </div>
             </form>
          </div>
       </div>
    </div>
 </div>
@endsection

@push('css-external')
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2-bootstrap4.min.css') }}">
@endpush

@push('javascript-external')
    {{-- Select 2 --}}
    <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/js/i18n/' . app()->getLocale() . '.js') }}"></script>
@endpush

@push('javascript-internal')
    <script>
        $(function(){
            // select2 parent category
            $('#select_user_role').select2({
            theme: 'bootstrap4',
            language: "{{ app()->getLocale() }}",
            allowClear: true,
            ajax: {
                url: "{{ route('roles.select') }}",
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                        return {
                            text: item.name,
                            id: item.id
                        }
                        })
                    };
                }
            }
            });
        });
    </script>
@endpush
