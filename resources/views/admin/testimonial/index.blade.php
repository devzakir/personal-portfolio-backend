@extends('layouts.admin')
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card card-default">
        <div class="card-header card-header-border-bottom d-flex justify-content-between align-items-center">
          <h2>All Testimonial List</h2>
          <a href="{{ route('testimonial.create') }}" class="btn btn-primary">Create Testimonial</a>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-striped">
            <thead class="thead-dark">
              <tr>
                <th>Id</th>
                <th>Avatar</th>
                <th>Name</th>
                <th>Designation</th>
                <th>Description</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($testimonials as $t)
              <tr>
                <td>{{$t->id}}</td>
                <td>
                  <div style="max-height:60px; max-width:60px; overflow:hidden">
                    <img src="{{ asset($t->avatar) }}" alt="" class="img-fluid">
                  </div>  
                </td>
                <td>{{$t->name}}</td>
                <td>{{$t->designation}}</td>
                <td>{{$t->description}}</td>
                <td>
                  <a href="{{ route('testimonial.edit', ['id' => $t->id]) }}" class="btn btn-success btn-sm"> <span class="mdi mdi-square-edit-outline"></span> </a>
                  <a href="#" class="btn btn-primary btn-sm"> <span class="mdi mdi-eye"></span> </a>
                  <a href="{{ route('testimonial.destroy', ['id' => $t->id]) }}" class="btn btn-danger btn-sm"> <span class="mdi mdi-delete"></span> </a>
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