@extends('layouts.admin.dashboard')

@section('title')
    Roles
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('roles') }}
@endsection

@section('content')
    <!-- section:content -->
<div class="row">
    <div class="col-md-12">
       <div class="card">
          <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('roles.index') }}" method="GET">
                        <div class="input-group">
                           <input name="keyword" value="{{ request()->get('keyword') }}" type="search" class="form-control" placeholder="Caro Roles">
                           <div class="input-group-append">
                              <button class="btn btn-primary" type="submit">
                                 <i class="fas fa-search"></i>
                              </button>
                           </div>
                        </div>
                     </form>
                </div>
                <div class="col-md-6">
                   <a href="{{ route('roles.create') }}" class="btn btn-primary float-right" role="button">
                      Add new
                      <i class="fas fa-plus-square"></i>
                   </a>
                </div>
             </div>
          </div>
          <div class="card-body">
             <ul class="list-group list-group-flush">
                <!-- list role -->
                  @forelse ($roles as $role)
                  <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center pr-0">
                    <label class="mt-auto mb-auto">
                       <!-- Role name -->
                       {{ $role->name }}
                       </label>
                       <div>
                          <!-- edit -->
                          <a href="{{ route('roles.show', ['role' => $role]) }}" class="btn btn-sm btn-primary" role="button">
                            <i class="fas fa-eye"></i>
                          </a>
                          <!-- edit -->
                          <a href="{{ route('roles.edit', ['role' => $role]) }}" class="btn btn-sm btn-info" role="button">
                             <i class="fas fa-edit"></i>
                          </a>
                          <!-- delete -->
                          <form class="d-inline" action="{{ route('roles.destroy',$role->id) }}" method="POST" role="alert">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm btn-sm" type="submit">
                                Delete
                            </button>
                        </form>
                       </div>
                  </li>
                  @empty
                    <p>
                        @if (request()->get('keyword'))
                            Data <strong>{{ request()->get('keyword') }}</strong> belum ada pada database
                        @else
                            <strong>Database masih kosong</strong>
                        @endif
                    </p>
                  @endforelse

                      <!-- list role -->
             </ul>
          </div>
          @if ($roles->hasPages())
                <div class="card-footer">
                    {{ $roles->links('vendor.pagination.bootstrap-4') }}
                </div>
          @endif
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
            title: "Hapus Role",
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
