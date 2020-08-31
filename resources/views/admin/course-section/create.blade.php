@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom d-flex justify-content-between align-items-center">
                <h2>Create Course Section</h2>
                <div>

                    <a href="{{ route('course.section.index', ['id' => $course->id]) }}" class="btn btn-primary">Go back to Course Sections</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6 offset-3">
                        <form action="{{ route('course.section.store', ['id' => $course->id]) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Section Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name">
                            </div>
                            <div class="form-group text-center"><button type="submit" class="btn btn-success">Create Section</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection