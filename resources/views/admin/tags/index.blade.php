@extends('layouts.admin.dashboard')

@section('title')
    Testing
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render('tags') }}
@endsection
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-tools">
                    <form action="{{ route('tags.index') }}" method="get">
                        <div class="input-group input-group-sm" style="width: 380px;">
                        <input type="search" value="{{ request()->get('keyword') }}" name="keyword" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                            </button>
                        </div>
                        </div>
                    </form>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    @if (count($tags))
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tags</th>
                        <th>Slug</th>
                        <th>Created at</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($tags as $tag => $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->slug }}</td>
                            <td>{{ $item->created_at->diffForHumans() }}</td>
                            <td>
                                @can('tag_update')
                                    <a href="{{ route('tags.edit',$item->id , '/edit') }}" class="btn btn-sm btn-primary">Edit</a>
                                @endcan
                                @can('tag_delete')
                                    <form class="d-inline" action="{{ route('tags.destroy',$item->id) }}" method="POST" role="alert">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm btn-sm" type="submit">
                                            Delete
                                        </button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <div class="p-3">
                            <p>
                                @if (request()->get('keyword'))
                                   <strong>Pencarian {{ request()->get('keyword') }} tidak di temukan</strong>
                                @else
                                <strong>Data Tag Belum Ada</strong>
                                @endif
                            </p>
                        </div>
                        @endif
                    </tbody>
                  </table>
                  @if ($tags->hasPages())
                    <div class="card-footer">
                        {{ $tags->links('vendor.pagination.bootstrap-4') }}
                    </div>
                  @endif
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
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
