@extends('layouts.admin')
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card card-default">
        <div class="card-header card-header-border-bottom d-flex justify-content-between align-items-center">
          <h2>Styled Map</h2>
          <a href="{{ route('user.index') }}" class="btn btn-primary">Go back to Users</a>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-6 offset-3">
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi vitae nulla repellat dolore quos debitis et? Officia, doloremque facilis! Eaque similique reprehenderit illum obcaecati, sequi necessitatibus praesentium maxime! Fugiat, quos.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection