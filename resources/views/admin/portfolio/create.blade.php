@extends('layouts.admin')
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card card-default">
        <div class="card-header card-header-border-bottom d-flex justify-content-between align-items-center">
          <h2>Create a new Portfolio</h2>
          <a href="{{ route('portfolio.index') }}" class="btn btn-primary">Go back to Portfolio List</a>
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
              <form action="{{ route('portfolio.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="">Portfolio Title</label>
                  <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="Portfolio Title">
                </div>
                <div class="form-group">
                  <label for="">Portfolio Link</label>
                  <input type="text" name="link" value="{{ old('link') }}" class="form-control" placeholder="Portfolio Link">
                </div>
                <div class="form-group">
                  <label for="category_id">Portfolio Category</label>
                  <select name="category_id" id="category_id" class="form-control">
                    <option value="" selected style="display:none">Select Category</option>
                    @foreach($categories as $c)
                      <option value="{{ $c->id }}">{{$c->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="description">Portfolio Description</label>
                  <textarea name="description" id="description" rows="3" class="form-control" placeholder="Describe yourself here..."></textarea>
                </div>
                <div class="form-group">
                  <label for="">Choose Portfolio Image</label>
                  <input type="file" name="image" class="form-control-file">
                </div>
                <div class="form-group text-center">
                  <button class="btn btn-success" type="submit">Create Portfolio</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection