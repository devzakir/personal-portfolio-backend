@extends('layouts.admin')
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card card-default">
        <div class="card-header card-header-border-bottom d-flex justify-content-between align-items-center">
          <h2>Create a new Service</h2>
          <a href="{{ route('service.index') }}" class="btn btn-primary">Go back to Services</a>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-6 offset-3">
              @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif
              <form action="{{ route('service.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="">Title</label>
                  <input type="text" name="title" value="{{ old('title') }}" placeholder="Service Title" class="form-control">
                </div>
                <div class="form-group">
                  <label for="icon">Icon</label>
                  <input type="file" id="icon" name="icon" class="form-control-file">
                </div>
                <div class="form-group">
                  <label for="">Description</label>
                  <textarea name="description" rows="3" class="form-control" placeholder="Service Description"></textarea>
                </div>
                <div class="form-group text-center"><button type="submit" class="btn btn-success">Create Service</button></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection