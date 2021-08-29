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
                                    {{-- @foreach ($statuses as $value => $label)
                                      <option value="{{ $value }}"
                                      {{ $statusSelected == $value ? 'selected' : null }}>
                                          {{ $label }}
                                      </option>
                                    @endforeach --}}
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
                        @forelse ($posts as $post)
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
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->status }}</td>
                                    <td>{{ $post->created_at }}</td>
                                    <td>Manyan</td>
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
                        @empty
                        <div class="text-center">
                            <p>
                                <strong>Data Post Belum Ada</strong>
                            </p>
                        </div>
                        @endforelse
                    </div>
                </div>
             </div>
        </div>
    </div>
</section>
@endsection
