@extends('layouts.admin')
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card card-default">
        <div class="card-header card-header-border-bottom d-flex justify-content-between align-items-center">
          <h2>Edit Portfolio</h2>
          <a href="{{ route('portfolio.index') }}" class="btn btn-primary">Go back to Portfolio</a>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-6 offset-3">
              <form action="{{ route('portfolio.update', ['id' => $portfolio->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif
                <div class="form-group">
                  <label for="">Portfolio Title</label>
                  <input type="text" name="title" value="{{ $portfolio->title }}" class="form-control" placeholder="Portfolio Title">
                </div>
                <div class="form-group">
                  <label for="">Portfolio Link</label>
                  <input type="text" name="link" value="{{ $portfolio->link  }}" class="form-control" placeholder="Portfolio Link">
                </div>
                <div class="form-group">
                  <label for="category_id">Portfolio Category</label>
                  <select name="category_id" id="category_id" class="form-control">
                    <option value="" selected style="display:none">Select Category</option>
                    @foreach($categories as $c)
                      <option value="{{ $c->id }}" @if($c->id == $portfolio->category_id) selected @endif>{{$c->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="description">Portfolio Description</label>
                <textarea name="description" id="description" rows="3" class="form-control" placeholder="Describe yourself here...">{{ $portfolio->description }}</textarea>
                </div>
                <div class="row">
                  <div class="col-8">
                    <div class="form-group">
                      <label for="">Choose Portfolio Image</label>
                      <input type="file" name="image" class="form-control-file">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="image" style="height:60px;width:auto;overflow:hidden;">
                      <img src="{{ asset($portfolio->image) }}" alt="" style="height:100%; width: auto;">
                    </div>
                  </div>
                </div>
                <div class="form-group text-center">
                  <button class="btn btn-success" type="submit">Update Portfolio</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection