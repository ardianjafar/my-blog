@extends('layouts.admin.dashboard')

@section('title')
    Create
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('add_user') }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
       <div class="card">
          <div class="card-body">
             <form action="" method="POST">
                <!-- name -->
                <div class="form-group">
                   <label for="input_user_name" class="font-weight-bold">
                      Name
                   </label>
                   <input id="input_user_name" value="" name="name" type="text" class="form-control" placeholder="Masukkan Nama" />
                   <!-- error message -->
                </div>
                <!-- role -->
                <div class="form-group">
                   <label for="select_user_role" class="font-weight-bold">
                      Role
                   </label>
                   <select id="select_user_role" name="role" data-placeholder="Masukkan role" class="custom-select w-100">
                      <option value="" selected="selected">Role</option>
                   </select>
                   <!-- error message -->
                </div>
                <!-- email -->
                <div class="form-group">
                   <label for="input_user_email" class="font-weight-bold">
                      Email
                   </label>
                   <input id="input_user_email" value="" name="email" type="email" class="form-control" placeholder="Masukkan Email"
                      autocomplete="email" />
                   <!-- error message -->
                </div>
                <!-- password -->
                <div class="form-group">
                   <label for="input_user_password" class="font-weight-bold">
                      Password
                   </label>
                   <input id="input_user_password" name="password" type="password" class="form-control" placeholder="Masukkan password"
                      autocomplete="new-password" />
                   <!-- error message -->
                </div>
                <!-- password_confirmation -->
                <div class="form-group">
                   <label for="input_user_password_confirmation" class="font-weight-bold">
                      Password confirmation
                   </label>
                   <input id="input_user_password_confirmation" name="password_confirmation" type="password"
                      class="form-control" placeholder="Masukkan Konfirmasi Password" autocomplete="new-password" />
                   <!-- error message -->
                </div>
                <div class="float-right">
                   <a href="{{ route('users.index') }}" class="btn btn-warning px-4 mx-2" href="">
                      Kembali
                   </a>
                   <button type="submit" class="btn btn-primary float-right px-4">
                      Simpan
                   </button>
                </div>
             </form>
          </div>
       </div>
    </div>
 </div>
@endsection
