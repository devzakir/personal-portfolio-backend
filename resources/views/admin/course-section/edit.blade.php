@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom d-flex justify-content-between align-items-center">
                <h2>Edit Course Section - {{ $section->name }}</h2>
                <a href="{{ route('course-section.index') }}" class="btn btn-primary">Go back to Portfolio
                    Categories</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6 offset-3">
                        <form action="{{ route('course-section.update', $section->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="course">Select Course</label>
                                <select name="course" id="course" class="form-control">
                                    @foreach($courses as $course)
                                    <option value="{{ $course->id }}" @if($course->id == $section->course_id) selected @endif>{{$course->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Section Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $section->name }}" placeholder="Name">
                            </div>
                            <div class="form-group text-center"><button type="submit" class="btn btn-success">Update Course Section </button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection