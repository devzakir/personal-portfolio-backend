@extends('layouts.admin')

@section('content')
<div class="card card-default">
  <div class="card-header card-header-border-bottom d-flex justify-content-between align-items-center">
    <h2>Users List</h2>
    <a href="{{ route('user.create') }}" class="btn btn-primary">Create User</a>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-12">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th> # </th>
              <th> Photo </th>
              <th> Name </th>
              <th> Email </th>
              <th> Role </th>
              <th> Handle </th>
            </tr>
          </thead>
          <tbody>
            @if($users->count())
            @foreach($users as $user)
            <tr>
              <td> {{ $user->id }} </td>
              <td> {{ $user->name }} </td>
              <td> {{ $user->name }} </td>
              <td> {{ $user->email }} </td>
              <td> {{ $user->profile->role->name }} </td>
              <td> 
                <a href="{{ route('user.edit', ['id' => $user->id]) }}" class="btn btn-primary btn-sm"> <i class="mdi mdi-square-edit-outline"></i> </a>
                <a href="{{ route('user.show', ['id' => $user->id]) }}" class="btn btn-success btn-sm"> <i class="mdi mdi-eye"></i> </a>
                <a href="{{ route('user.delete', ['id' => $user->id]) }}" class="btn btn-danger btn-sm"> <i class="mdi mdi-trash-can"></i> </a>
              </td>
            </tr>
            @endforeach
            @else 
            <tr>
              <td colspan="6">
                <h5 class="text-center pt-5 pb-5">NO Post Found</h5>
              </td>
            </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
 
@endsection
