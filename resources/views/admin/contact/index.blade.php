@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom d-flex justify-content-between align-items-center">
                <h2>Message List</h2>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($contacts->count() > 0)
                        @foreach($contacts as $c)
                        <tr>
                            <td>{{$c->id}}</td>
                            <td>{{$c->email}}</td>
                            <td>{{$c->subject}}</td>
                            <td>
                            @if($c->created_at)  {{ $c->created_at->diffForHumans() }} @endif
                            </td>
                            <td>
                                @if($c->status == 1)<span class="badge badge-primary"> Unread </span>@endif
                                @if($c->status == 2)<span class="badge badge-success"> Read </span>@endif
                                @if($c->status == 5)<span class="badge badge-secondary"> Spam </span>@endif
                            </td>
                            <td class="d-flex">
                                <a href="{{ route('contact.edit', $c->id) }}" class="btn btn-success btn-sm"> <span class="mdi mdi-square-edit-outline"></span> </a>
                                <a href="{{ route('contact.show', $c->id) }}" class="btn btn-primary btn-sm ml-1"> <span class="mdi mdi-eye"></span> </a> 
                                <form action="{{ route('contact.destroy', $c->id) }}" method="post" class="ml-1">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"> <span class="mdi mdi-delete"></span> </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @else 
                            <tr>
                                <td colspan="6"><h5 class="text-center pt-4 pb-4">No Messages Found</h5></td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection