@extends('layouts.admin')
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card card-default">
        <div class="card-header card-header-border-bottom d-flex justify-content-between align-items-center">
          <h2>Edit SEO Data</h2>
          <a href="{{ route('seo.index') }}" class="btn btn-primary">Go back to All Data</a>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-6 offset-3">
              <form action="{{ route('seo.update', ['id' => $seo->title]) }}" method="post">
                @csrf
                <div class="form-group">
                  <label for="">Category Name</label>
                  <input type="text" class="form-control" name="name" value="{{ $seo->title }}" placeholder="Name">
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