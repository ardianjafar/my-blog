@extends('layouts.admin.dashboard')

@section('title')
    Posts
@endsection

@section('breadcrumbs')

@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DataTable with default features</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="card-body">
                            <table id="example2" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Rendering engine</th>
                                    <th>Browser</th>
                                    <th>Platform(s)</th>
                                    <th>Engine version</th>
                                    <th>CSS grade</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Trident</td>
                                    <td>Internet
                                    Explorer 4.0
                                    </td>
                                    <td>Win 95+</td>
                                    <td> 4</td>
                                    <td>X</td>
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
                    </div>
                </div>
             </div>
        </div>
    </div>
</section>
@endsection
