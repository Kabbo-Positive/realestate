@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('add.roles') }}" class="btn btn-inverse-info">Add roles</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">Roles All</h6>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>SL</th>
            <th>Roles Name</th>
            <th>Guard Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($roles as $key => $item)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $item->name  }}</td>
                <td>{{ $item->guard_name   }}</td>
                <td>
                    <a href="{{ route('edit.roles', $item->id) }}" class="btn btn-inverse-warning"><i class="bi bi-pencil-square"></i></a>
                    <a href="{{ route('delete.roles', $item->id) }}" class="btn btn-inverse-danger" id="delete"><i class="bi bi-trash-fill"></i></a>
                </td>
              </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
        </div>
    </div>

</div>

@endsection