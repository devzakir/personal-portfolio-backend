@extends('layouts.admin')
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card card-default">
        <div class="card-header card-header-border-bottom d-flex justify-content-between align-items-center">
          <h2>All Service List</h2>
          <a href="{{ route('service.create') }}" class="btn btn-primary">Create Service</a>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-striped">
            <thead class="thead-dark">
              <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Description</th>
                <th>Icon</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($services as $s)
              <tr>
                <td>{{$s->id}}</td>
                <td>
                  <div style="max-height:60px; max-width:60px; overflow:hidden">
                    <img src="{{ asset($s->icon) }}" alt="" class="img-fluid">
                  </div>
                </td>
                <td>{{$s->title}}</td>
                <td>{{$s->description}}</td>
                <td>
                    <a href="{{ route('service.edit', ['id' => $s->id]) }}" class="btn btn-success btn-sm"> <span class="mdi mdi-square-edit-outline"></span> </a>
                    <a href="#" class="btn btn-primary btn-sm"> <span class="mdi mdi-eye"></span> </a>
                    <a href="{{ route('service.destroy', ['id' => $s->id]) }}" class="btn btn-danger btn-sm"> <span class="mdi mdi-delete"></span> </a>
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