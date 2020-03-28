@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom d-flex justify-content-between align-items-center">
                <h2>Edit Contact</h2>
                <a href="{{ route('contact.index') }}" class="btn btn-primary">Go back to Message List</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-4 offset-4">
                        <form action="{{ route('contact.update', $contact->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Contact Status</label>
                                <select name="status" class="form-control">
                                    <option value="" style="display:none" selected>Select Status</option>
                                    <option value="1" @if($contact->status == 1) selected @endif> Unread </option>
                                    <option value="2" @if($contact->status == 2) selected @endif> Read </option>
                                    <option value="5" @if($contact->status == 5) selected @endif> Spam </option>
                                </select>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success">Update Contact</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection