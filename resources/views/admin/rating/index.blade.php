@extends('layouts.admin')
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card card-default">
        <div class="card-header card-header-border-bottom d-flex justify-content-between align-items-center">
          <h2>All Rating List</h2>
          <a href="{{ route('rating.create') }}" class="btn btn-primary"> Create Rating </a>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-striped">
            <thead class="thead-dark">
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Rating</th>
                <th>Feedback</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($ratings as $r)
              <tr>
                <td>{{ $r->id }}</td>
                <td>{{ $r->name }}</td>
                <td>{{ $r->rating }}</td>
                <td>{{ $r->feedback }}</td>
                <td>
                    <a href="#" class="btn btn-success btn-sm"> <span class="mdi mdi-square-edit-outline"></span> </a>
                    <a href="{{ route('rating.show', ['id' => $r->id]) }}" class="btn btn-primary btn-sm"> <span class="mdi mdi-eye"></span> </a>
                    <a href="{{ route('rating.destroy', ['id' => $r->id]) }}" class="btn btn-danger btn-sm"> <span class="mdi mdi-delete"></span> </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection