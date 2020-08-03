@extends('layouts.admin')

@section('content')
<div class="col-4 offset-4">
  <div class="bg-white border rounded">
      <div class="profile-content-left pt-5 pb-3 px-3 px-xl-5">
        <div class="border-bottom pb-3 mb-4">
          <h4 class="text-dark">Edit Your Account Information</h4>
        </div>
        @if($errors->any())
          <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
            <li> {{ $error }}</li>
            @endforeach
          </ul>
        @endif
        <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="">Your Name</label>
            <input type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="Your Name">
          </div>
          <div class="form-group">
            <label for="">Email address</label>
            <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="Enter Email" readonly>
          </div>
          <div class="form-group">
            <label for="">Phone Number</label>
            <input type="text" class="form-control" name="phone" value="{{ $user->phone }}" placeholder="Enter Phone">
          </div>
          <div class="form-group">
            <label for="">New Password</label>
            <input type="password" class="form-control" name="password" placeholder="Enter New Password">
          </div>
          <div class="form-group">
            <label for="">Avatar</label>
            <div class="custom-file mb-1">
              <input type="file" class="custom-file-input" name="avatar" id="coverImage">
              <label class="custom-file-label" for="coverImage">Choose a new Avatar...</label>
              <div class="invalid-feedback">Example invalid custom file feedback</div>
            </div>
          </div>
          <div class="form-footer pt-4 pt-5 mt-4 border-top">
            <button type="submit" class="btn btn-primary btn-default">Update Information</button>
            <a href="{{ route('user.index') }}" class="btn btn-secondary btn-default">Cancel</a>
          </div>
        </form>
      </div>
  </div>
</div>
@endsection
