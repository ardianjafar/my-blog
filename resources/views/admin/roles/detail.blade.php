@extends('layouts.admin.dashboard')

@section('title')
    Role Detail
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('detail_role', $role) }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
       <div class="card">
          <div class="card-body">
             <div class="form-group">
                <label for="input_role_name" class="font-weight-bold">
                   Role name
                </label>
                <input id="input_role_name" value="{{ $role->name }}" name="name" type="text" class="form-control" readonly />
             </div>
             <!-- permission -->
             <div class="form-group">
                <label for="input_role_permission" class="font-weight-bold">
                   permission
                </label>
                <div class="row">
                   <!-- list manage name:start -->
                   @forelse ($authorities as $manageName => $permissions)
                    <ul class="list-group mx-1">
                        <li class="list-group-item bg-dark text-white">
                            {{ trans("permissions.{$manageName}")  }}
                        </li>
                        <!-- list permission:start -->
                        @foreach ($permissions as $permission)
                        <li class="list-group-item">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"
                                    value="" onclick="return false;" {{ in_array($permission,$rolePermissions) ?  "checked" : null }}>
                                <label class="form-check-label">
                                    {{ trans("permissions.{$permission}")  }}
                                </label>
                            </div>
                        </li>
                        @endforeach
                        <!-- list permission:end -->
                    </ul>
                   @empty
                    <p>
                        Data Kosong
                    </p>
                   @endforelse

                   <!-- list manage name:end  -->
                </div>
             </div>
             <!-- button  -->
             <div class="d-flex justify-content-end">
                <a href="{{ route('roles.index') }}" class="btn btn-warning mx-1" role="button">
                   Kembali
                </a>
             </div>
          </div>
       </div>
    </div>
</div>
@endsection
