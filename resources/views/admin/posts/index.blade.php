@extends('layouts.admin.dashboard')

@section('title')
    Posts
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('posts') }}
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <form action="" method="GET" class="form-inline form-row">
                            <div class="col">
                               <div class="input-group mx-1">
                                  <label class="font-weight-bold mr-2">
                                      Status
                                  </label>
                                  <select name="status" class="custom-select">
                                    @foreach ($statuses as $value => $label)
                                      <option value="{{ $value }}"
                                      {{ $statusSelected == $value ? 'selected' : null }}>
                                          {{ $label }}
                                      </option>
                                    @endforeach
                                  </select>
                                  <div class="input-group-append">
                                     <button class="btn btn-primary" type="submit">
                                         Cari
                                     </button>
                                  </div>
                               </div>
                            </div>
                            <div class="col">
                               <div class="input-group mx-1">
                                  <input name="keyword" type="search" value="{{ request()->get('keyword') }}" class="form-control"
                                  placeholder="Cari">
                                  <div class="input-group-append">
                                     <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-search"></i>
                                     </button>
                                  </div>
                               </div>
                            </div>
                         </form>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Created-at</th>
                                    <th>Create By</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            @forelse ($posts as $post => $result)
                            <tbody>
                                <tr>
                                    <td>*</td>
                                    <td>{{ $result->title }}</td>
                                    <td>{{ $result->status }}</td>
                                    <td>{{ $result->created_at->diffForHumans() }}</td>
                                    <td>Manyan</td>
                                    <td class="d-flex">
                                        @can('post_detail')
                                            <a href="{{ route('posts.show', $result->id) }}" class="btn btn-info btn-sm mx-1">Detail</a>
                                        @endcan
                                        @can('post_update')
                                            <a href="{{ route('posts.edit', $result->id) }}" class="btn btn-primary btn-sm mx-1">Edit</a>
                                        @endcan
                                        @can('post_delete')
                                            <form action="{{ route('posts.destroy', ['post' => $result]) }}" method="post" role="alert">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    Delete
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            </tbody>
                            @empty
                            <div class="text-center">
                                <p>
                                    @if (request()->get('keyword'))
                                        Data  pencarian <strong>{{ request()->get('keyword') }}</strong> belum ada dalam postingan
                                    @else
                                        <strong>Data Post Draft Belum Ada</strong>
                                    @endif
                                </p>
                            </div>
                            @endforelse
                            </table>
                    </div>
                    @if ($posts->hasPages())
                        <div class="card-footer">
                            {{ $posts->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    @endif
                </div>
             </div>
        </div>
    </div>
</section>
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
