@extends('layouts.admin')

@section('content')
<div class="col-4 offset-4">
  <div class="bg-white border rounded">
      <div class="profile-content-left pt-5 pb-3 px-3 px-xl-5">
          <div class="card text-center widget-profile px-0 border-0">
              <div class="card-img mx-auto rounded-circle">
                @if($user->profile->avatar)
                    <img src="{{ asset($user->profile->avatar) }}" alt="user image" class="img-fit img-fluid">
                @else
                    <img src="{{ asset('storage') }}/user/user.jpg" alt="user image" class="img-fit img-fluid">
                @endif
              </div>
              <div class="card-body">
                  <h4 class="py-2 text-dark">{{ $user->name }}</h4>
                  <p>{{ $user->email }}</p>
                  {{-- <a class="btn btn-primary btn-pill btn-lg my-4" href="#">Follow</a> --}}
              </div>
          </div>
          <div class="d-flex justify-content-between ">
              <div class="text-center pb-4">
                  <h6 class="text-dark pb-2">1503</h6>
                  <p>Friends</p>
              </div>
              <div class="text-center pb-4">
                  <h6 class="text-dark pb-2">2905</h6>
                  <p>Followers</p>
              </div>
              <div class="text-center pb-4">
                  <h6 class="text-dark pb-2">1200</h6>
                  <p>Following</p>
              </div>
          </div>
          <hr class="w-100">
          <div class="contact-info pt-4">
              <h5 class="text-dark mb-1">Contact Information</h5>
              <p class="text-dark font-weight-medium pt-4 mb-2">Email address</p>
              <p>{{ $user->email }}</p>
              @if($user->profile->phone_number)
              <p class="text-dark font-weight-medium pt-4 mb-2">Phone Number</p>
              <p>{{ $user->profile->phone_number }}</p>
              @endif
              <p class="text-dark font-weight-medium pt-4 mb-2">User Role</p>
              <p> {{ $user->profile->role->name }} </p>
              <p class="text-dark font-weight-medium pt-4 mb-2">Birthday</p>
              <p>Nov 15, 1990</p>
              <p class="text-dark font-weight-medium pt-4 mb-2">Social Profile</p>
              <p class="pb-3 social-button">
                  <a href="#" class="mb-1 btn btn-outline btn-twitter rounded-circle">
                      <i class="mdi mdi-twitter"></i>
                  </a>
                  <a href="#" class="mb-1 btn btn-outline btn-linkedin rounded-circle">
                      <i class="mdi mdi-linkedin"></i>
                  </a>
                  <a href="#" class="mb-1 btn btn-outline btn-facebook rounded-circle">
                      <i class="mdi mdi-facebook"></i>
                  </a>
                  <a href="#" class="mb-1 btn btn-outline btn-skype rounded-circle">
                      <i class="mdi mdi-skype"></i>
                  </a>
              </p>
          </div>
      </div>
  </div>
</div>
@endsection
