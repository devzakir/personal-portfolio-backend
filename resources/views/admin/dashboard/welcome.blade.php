@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-body d-flex justify-content-center align-items-center bg-primary text-light flex-column" style="min-height:300px">
                    <h1 class="mb-2">Hi, {{ auth()->user()->name }}</h1>
                    <p style="max-width:400px;margin:0 auto; text-align:center">Welcome to {{ config('app.name') }} Dashboard. Now, control is yours. </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="media widget-media rounded bg-warning border d-flex justify-content-between align-items-center">
          <div class="icon rounded-circle mr-4 bg-white">
              <i class="mdi mdi-basket text-warning "></i>
            </div>
          <a href="#" class="btn btn-light">Go to Products</a>
        </div>
      </div>
      <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="media widget-media rounded bg-danger border d-flex justify-content-between align-items-center">
          <div class="icon rounded-circle mr-4 bg-white">
              <i class="mdi mdi-cart-outline text-danger "></i>
            </div>
          <a href="#" class="btn btn-light">Go to Orders</a>
        </div>
      </div>
      <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="media widget-media rounded bg-primary border d-flex justify-content-between align-items-center">
          <div class="icon rounded-circle mr-4 bg-white">
              <i class="mdi mdi-account-circle text-primary "></i>
            </div>
          <a href="#" class="btn btn-light">Go to Users</a>
        </div>
      </div>
      <div class="col-md-6 col-lg-6 col-xl-3">
          <div class="media widget-media rounded bg-success border d-flex justify-content-between align-items-center">
            <div class="icon rounded-circle mr-4 bg-white">
                <i class="mdi mdi-view-dashboard text-success "></i>
              </div>
            <a href="{{ route('analytics') }}" class="btn btn-light">Go to Analytics</a>
          </div>
      </div>
    </div>
@endsection