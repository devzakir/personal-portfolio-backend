@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom d-flex justify-content-between align-items-center">
                <h2>Edit Course Section - {{ $section->name }}</h2>
                <a href="{{ route('course.section.index', ['id' => $section->id]) }}" class="btn btn-primary">Go back to Portfolio
                    Categories</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6 offset-3">
                        <form action="{{ route('course.section.update', ['id' => $section->id, 'videoId' => $video->id]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Video Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Video title" value="{{ $video->title }}">
                            </div>
                            <div class="form-group">
                                <label for="">Video Time</label>
                                <input type="number" step=".01" name="video_time" class="form-control" placeholder="Video time" value="{{ $video->video_time }}">
                            </div>
                            <div class="form-group">
                                <label for="course">Select Course</label>
                                <select name="course" id="course" class="form-control">
                                    @foreach($courses as $course)
                                    <option value="{{ $course->id }}" @if($course->id == $section->course_id) selected @endif>{{ $course->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="section">Select Section</label>
                                <select name="section" id="section" class="form-control">
                                    @foreach($sections as $courseSection)
                                    <option value="{{ $courseSection->id }}" @if($courseSection->id == $section->id) selected @endif>{{ $courseSection->name }}</option>
                                    @endforeach
                                </select>
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