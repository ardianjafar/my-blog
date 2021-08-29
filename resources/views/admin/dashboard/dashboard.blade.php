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
                        <th>Views</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Trident</td>
                        <td>windows-11
                        </td>
                        <td>Win 95+</td>
                        <td> 4</td>
                        <td>
                            <form action="" method="post">
                                <a href="" class="btn btn-danger btn-sm">Delete</a>
                                <a href="" class="btn btn-info btn-sm">Detail</a>
                                <a href="" class="btn btn-primary btn-sm">Edit</a>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Trident</td>
                        <td>Internet
                        Explorer 4.0
                        </td>
                        <td>Win 2001</td>
                        <td> 8</td>
                        <td>
                            <form action="" method="post">
                                <a href="" class="btn btn-danger btn-sm">Delete</a>
                                <a href="" class="btn btn-info btn-sm">Detail</a>
                                <a href="" class="btn btn-primary btn-sm">Edit</a>
                            </form>
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
