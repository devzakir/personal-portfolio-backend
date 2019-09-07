@extends('layouts.admin')

@section('content')
<div class="card card-default">
  <div class="card-header card-header-border-bottom d-flex justify-content-between align-items-center">
    <h2>Edit User - {{ $user->name }}</h2>
    <a href="{{ route('user.index') }}" class="btn btn-primary">Go Back To List</a>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-4 offset-4">
        @if($errors->any())
          <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
            <li> {{ $error }}</li>
            @endforeach
          </ul>
        @endif
        <form action="{{ route('user.update', ['id' => $user->id]) }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="">Your Name</label>
            <input type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="Your Name">
          </div>
          <div class="form-group">
            <label for="">Email address</label>
            <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="Enter Email">
          </div>
          
          <div class="form-group">
            <label for="">Avatar</label>
            <div class="custom-file mb-1">
              <input type="file" class="custom-file-input" name="avatar" id="coverImage" required="">
              <label class="custom-file-label" for="coverImage">Choose file...</label>
              <div class="invalid-feedback">Example invalid custom file feedback</div>
            </div>
          </div>
          <div class="form-footer pt-4 pt-5 mt-4 border-top">
            <button type="submit" class="btn btn-primary btn-default">Submit</button>
            <button type="submit" class="btn btn-secondary btn-default">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
 
@endsection
