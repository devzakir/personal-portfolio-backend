@extends('layouts.admin')
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card card-default">
        <div class="card-header card-header-border-bottom d-flex justify-content-between align-items-center">
          <h2>Edit Category</h2>
          <a href="{{ route('portfolio.category.index') }}" class="btn btn-primary">Go back to Portfolio Categories</a>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-6 offset-3">
              <form action="{{ route('portfolio.category.update', ['id' => $category->id]) }}" method="post">
                @csrf
                <div class="form-group">
                  <label for="">Category Name</label>
                  <input type="text" class="form-control" name="name" value="{{ $category->name }}" placeholder="Name">
                </div>

                <div class="form-group text-center"><button type="submit" class="btn btn-success">Update Category</button></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection