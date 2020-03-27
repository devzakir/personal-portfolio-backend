@extends('layouts.admin')
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card card-default">
        <div class="card-header card-header-border-bottom d-flex justify-content-between align-items-center">
          <h2>Hiring List</h2>
          <a href="{{ route('hire.create') }}" class="btn btn-primary">Create Hire</a>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-striped">
            <thead class="thead-dark">
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Budget</th>
                <th>Social</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($hires as $hire)
              <tr>
                <td>{{$hire->id}}</td>
                <td>{{$hire->name}}</td>
                <td>{{$hire->email}}</td>
                <td>{{$hire->budget}}</td>
                <td>{{$hire->social}}</td>
                <td>
                  <a href="{{ route('hire.create', ['id' => $hire->id]) }}" class="btn btn-success btn-sm"> <span class="mdi mdi-square-edit-outline"></span> </a>
                  <a href="{{ route('hire.edit', ['id' => $hire->id]) }}" class="btn btn-primary btn-sm"> <span class="mdi mdi-eye"></span> </a>
                  <a href="{{ route('hire.destroy', ['id' => $hire->id]) }}" class="btn btn-danger btn-sm"> <span class="mdi mdi-delete"></span> </a>
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