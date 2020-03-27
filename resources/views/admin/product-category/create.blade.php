@extends('layouts.admin')
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card card-default">
        <div class="card-header card-header-border-bottom d-flex justify-content-between align-items-center">
          <h2>Create a Category</h2>
          <a href="{{ route('product.category.index') }}" class="btn btn-primary">Go back to Category List</a>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-4 offset-4">
              <form action="{{ route('product.category.store') }}" method="post">
                @csrf
                <div class="form-group">
                  <label for="">Category Name</label>
                  <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name">
                </div>

                <div class="form-group text-center"><button type="submit" class="btn btn-success">Create Category</button></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection