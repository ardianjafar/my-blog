@extends('layouts.admin.dashboard')

@section('title')
    This is Filemanager
@endsection

@section('breadcrumbs')
    This is Breadcrumbs
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <form action="" method="GET" style="width: 200px">
                        <div class="input-group">
                            <select name="type" id="" class="custom-select">
                                @foreach ($types as $value => $label)
                                    <option value="{{ $value }}" {{ $typeSelected == $value ? 'selected' : null }}>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    Terapkan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <iframe src="{{ route('unisharp.lfm.show') }}?type={{ $typeSelected }}" style="width: 100%; height: 600px; overflow: hidden; border: none;"></iframe>
                </div>
            </div>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
@endsection

