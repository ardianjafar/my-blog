@extends('layouts.admin.dashboard')

@section('title')
    Category
@endsection

@section('breadcrumbs')
    Category
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <div class="row">
                      <div class="col-md-6">
                         <form action="{{ route('category.index') }}" method="GET">
                            <div class="input-group">
                               <input name="keyword" type="search" class="form-control"
                               placeholder="Masukkan Pencarian"
                               value="{{ request()->get('keyword') }}">
                               <div class="input-group-append">
                                  <button class="btn btn-primary" type="submit">
                                     <i class="fas fa-search"></i>
                                  </button>
                               </div>
                            </div>
                         </form>
                      </div>
                      <div class="col-md-6">
                          {{-- @can('category_create') --}}
                              <a href="{{ route('category.create') }}" class="btn btn-primary float-right" role="button">Create Category
                                  <i class="fas fa-plus-square"></i>
                              </a>
                          {{-- @endcan --}}
                      </div>
                   </div>
                </div>
                <div class="card-body">
                   <ul class="list-group list-group-flush">
                      <!-- list category -->
                      @if (count($categories))
                          @include('admin.categories.category-list',[
                              'categories' => $categories,
                              'count'     => 0
                          ])
                      @else
                          <p>

                                  @if (request()->get('keyword'))
                                  <strong><i>Pencarian {{ request()->get('keyword') }}</i></strong> tidak ada dalam data
                                  @else
                                      <strong>Data tidak ada</strong>
                                  @endif

                          </p>
                      @endif
                   </ul>
                </div>
                @if ($categories->hasPages())
                  <div class="card-footer">
                      {{ $categories->links('vendor.pagination.bootstrap-4') }}
                  </div>
                @endif
             </div>
        </div>
    </div>
</div>
@endsection

@push('javascript-internal')
 <script>
     $(document).ready(function () {
        // -> event delete category
        $("form[role='alert']").submit(function(event) {
            event.preventDefault();
            Swal.fire({
            title: "Hapus Kategori",
            text: "Yakin anda mau hapus kategori ini ?...",
            icon: 'warning',
            allowOutsideClick: false,
            showCancelButton: true,
            cancelButtonText: "Tidakk",
            reverseButtons: true,
            confirmButtonText: "Iyaaa",
            }).then((result) => {
            if (result.isConfirmed) {
                // todo: process of deleting categories
                event.target.submit();
            }
            });
        });
     });
 </script>
@endpush
