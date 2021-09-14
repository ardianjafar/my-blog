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
                        <th>title</th>
                        <th>created at</th>
                        <th>create by</th>
                        <th>Views</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($posts as $post)    
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td class="text-lowercase">{{ $post->title }}</td>
                          <td>{{ $post->created_at }}</td>
                          <td>Win 95+</td>
                          <td> 4</td>
                        </tr>
                      @endforeach
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
