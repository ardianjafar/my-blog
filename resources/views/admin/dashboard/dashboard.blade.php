@extends('layouts.admin.dashboard')

@section('title')
    This is dashboard
@endsection

@section('card')
    @include('layouts.admin.small-boxes')
@endsection
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Tags</th>
                        <th>Slug</th>
                        <th>Created at</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Coba</td>
                            <td>Coba</td>
                            <td>Coba</td>
                            <td>
                                {{-- <a href="{{ route('tags.edit',$item->id , '/edit') }}" class="btn btn-sm btn-primary">Edit</a>
                                <form class="d-inline" action="{{ route('tags.destroy',$item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm btn-sm" type="submit">
                                        Delete
                                    </button>
                                </form> --}}
                            </td>
                        </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
    </div>
</div>
@endsection
