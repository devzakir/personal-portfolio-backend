@extends('layouts.admin')

@section('content')
<div class="card card-default">
  <div class="card-header card-header-border-bottom d-flex justify-content-between align-items-center">
    <h2>Create User</h2>
    <a href="{{ route('user.index') }}" class="btn btn-primary">Go Back To List</a>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-4 offset-4">
        <form action="{{ route('user.store') }}" method="post">
          @csrf
          <div class="form-group">
            <label for="">Your Name</label>
            <input type="text" class="form-control" name="name" placeholder="Your Name">
          </div>
          <div class="form-group">
            <label for="">Email address</label>
            <input type="email" class="form-control" name="email" placeholder="Enter Email">
          </div>
          <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password">
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
