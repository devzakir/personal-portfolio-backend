@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom d-flex justify-content-between align-items-center">
                <h2>Styled Map</h2>
                <div>
                    <a href="{{ route('contact.index') }}" class="btn btn-primary"> Go back to Message </a>
                    <a href="{{ route('contact.edit', $contact->id) }}" class="btn btn-primary"> Edit Contact Status </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-8 offset-2">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th> Name </th>
                                    <td> {{ $contact->name }} </td>
                                </tr>
                                <tr>
                                    <th> Email </th>
                                    <td> {{ $contact->email }} </td>
                                </tr>
                                <tr>
                                    <th> Status </th>
                                    <td>
                                        @if($contact->status == 1)<span class="badge badge-primary"> Unread </span>@endif
                                        @if($contact->status == 2)<span class="badge badge-success"> Read </span>@endif
                                        @if($contact->status == 5)<span class="badge badge-secondary"> Spam </span>@endif
                                    </td>
                                </tr>
                                <tr>
                                    <th> Date </th>
                                    <td> 
                                        @if($contact->created_at)  {{ $contact->created_at->diffForHumans() }} @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th> Subject </th>
                                    <td> {{ $contact->subject }} </td>
                                </tr>
                                <tr>
                                    <th> Message </th>
                                    <td> {{ $contact->message }} </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection