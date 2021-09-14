@extends('layouts.admin.dashboard')

@section('title')
    User
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('users') }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
       <div class="card">
          <div class="card-header">
             <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('users.index') }}" method="GET">
                        <div class="input-group">
                           <input name="keyword" value="{{ request()->get('keyword') }}" type="search" class="form-control" placeholder="Cari Users">
                           <div class="input-group-append">
                              <button class="btn btn-primary" type="submit">
                                 <i class="fas fa-search"></i>
                              </button>
                           </div>
                        </div>
                     </form>
                </div>
                <div class="col-md-6">
                    @can('user_create')
                        <a href="{{ route('users.create') }}" class="btn btn-primary float-right" role="button">
                            Create
                            <i class="fas fa-plus-square"></i>
                        </a>
                    @endcan
                </div>
             </div>
          </div>
          <div class="card-body">
             <div class="row">
                <!-- list users -->
                    @forelse ($users as $user)
                    <div class="col-md-4">
                        <div class="card my-1">
                           <div class="card-body">
                              <div class="row">
                                 <div class="col-md-2">
                                    <i class="fas fa-id-badge fa-5x"></i>
                                 </div>
                                 <div class="col-md-10">
                                    <table>
                                       <tr>
                                          <th>
                                             Nama
                                          </th>
                                          <td>:</td>
                                          <td>
                                             <!-- show user name -->
                                             {{ $user->name }}
                                          </td>
                                       </tr>
                                       <tr>
                                          <th>
                                             Email
                                          </th>
                                          <td>:</td>
                                          <td>
                                             <!-- show user email -->
                                             {{ $user->email }}
                                          </td>
                                       </tr>
                                       <tr>
                                          <th>
                                             Role
                                          </th>
                                          <td>:</td>
                                          <td>
                                             <!-- Show user roles -->
                                             {{ $user->roles->first()->name ?? '-- Unset --' }}
                                          </td>
                                       </tr>
                                    </table>
                                 </div>
                              </div>
                              <div class="float-right">
                                  @can('user_update')
                                    <!-- edit -->
                                    <a href="{{ route('users.edit', ['user' => $user]) }}" class="btn btn-sm btn-info" role="button">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                  @endcan
                                  @can('user_delete')
                                    <!-- delete -->
                                    <form class="d-inline" action="{{ route('users.destroy',$user->id) }}" method="POST" role="alert">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm btn-sm" type="submit">
                                            Delete
                                        </button>
                                    </form>
                                  @endcan
                              </div>
                           </div>
                        </div>
                     </div>
                    @empty
                    <p>
                        <strong>
                            @if (request()->get('keyword'))
                                Data Pencarian {{ request()->get('keyword') }} Tidak di temukan
                            @else
                                Database masih kosong
                            @endif
                        </strong>
                     </p>
                    @endforelse
                <!-- end list users -->
             </div>
          </div>
          <div class="card-footer">
             <!-- Todo:paginate -->
             @if ($users->hasPages())
                    <div class="card-footer">
                        {{ $users->links('vendor.pagination.bootstrap-4') }}
                    </div>
             @endif
          </div>
       </div>
    </div>
</div>
@endsection

@push('javascript-internal')
    <script>
        $(document).ready(function(event) {
            $("form[role='alert']").submit(function (event) {
            event.preventDefault();
            Swal.fire({
            title: "Hapus Tag",
            text: "Yakin anda mau hapus kategori ini ?...",
            icon: 'warning',
            allowOutsideClick: false,
            showCancelButton: true,
            cancelButtonText: "Tidakkk",
            reverseButtons: true,
            confirmButtonText: "Iyaaa",
            }).then((result) => {
            if (result.isConfirmed) {
                    event.target.submit();
               }
             });
           });
        });
    </script>
@endpush
