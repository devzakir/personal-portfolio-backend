@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom d-flex justify-content-between align-items-center">
                <h2> Course Details </h2>
                <div>
                    <a href="{{ route('course.index') }}" class="btn btn-warning"> Course List </a>
                    <a href="{{ route('course.edit', $course->id) }}" class="btn btn-primary"> Edit Course </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="row">
                        <div class="col-6">
                            <table class="table table-bordered">
                                <tbody>
                                    @if($course->id)
                                    <tr>
                                        <th style="width: 150px">Course ID</th>
                                        <td> {{ $course->id }} </td>
                                    </tr>
                                    @endif
                                    @if($course->title)
                                    <tr>
                                        <th style="width: 150px">Course Title</th>
                                        <td> {{ $course->title }} </td>
                                    </tr>
                                    @endif
                                    @if($course->category_id)
                                    <tr>
                                        <th style="width: 150px">Course Category</th>
                                        <td>
                                            @if($course->category)
                                            <a href="{{ route('course-category.show', $course->category_id) }}">
                                                {{ $course->category->name }} </a>
                                            @else
                                            <a href="{{ route('course-category.show', $course->category_id) }}"> {{ $course->category_id }}
                                            </a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                    @if($course->user_id)
                                    <tr>
                                        <th style="width: 150px">Course Author</th>
                                        <td>
                                            @if($course->user)
                                            {{ $course->user->name }}
                                            @else
                                            {{ $course->user_id }}
                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                    @if($course->price)
                                    <tr>
                                        <th style="width: 150px">Course Price</th>
                                        <td> {{ $course->price }} </td>
                                    </tr>
                                    @endif
                                    @if($course->short_description)
                                    <tr>
                                        <th style="width: 150px">Course Short Description</th>
                                        <td> {{ $course->short_description }} </td>
                                    </tr>
                                    @endif
                                    @if($course->coming_soon)
                                    <tr>
                                        <th style="width: 150px">Course Coming Soon</th>
                                        <td> {{ $course->coming_soon }} </td>
                                    </tr>
                                    @endif
                                    @if($course->duration)
                                    <tr>
                                        <th style="width: 150px">Course Duration</th>
                                        <td> {{ $course->duration }} </td>
                                    </tr>
                                    @endif
                                    @if($course->videos)
                                    <tr>
                                        <th style="width: 150px">Course Videos</th>
                                        <td> {{ $course->videos }} </td>
                                    </tr>
                                    @endif
                                    @if($course->projects)
                                    <tr>
                                        <th style="width: 150px">Course Projects</th>
                                        <td> {{ $course->projects }} </td>
                                    </tr>
                                    @endif
                                    @if($course->level)
                                    <tr>
                                        <th style="width: 150px">Course Level</th>
                                        <td> {{ $course->level }} </td>
                                    </tr>
                                    @endif
                                    @if($course->enrollment)
                                    <tr>
                                        <th style="width: 150px">Course Entrollment</th>
                                        <td> {{ $course->enrollment }} </td>
                                    </tr>
                                    @endif
                                    @if($course->published)
                                    <tr>
                                        <th style="width: 150px">Course Published</th>
                                        <td> {{ $course->published }} </td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                            <h4>Course Description </h4>
                            <hr>
                            <div class="course-content">
                                {!! $course->description !!}
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="course-video mb-3">
                                {!! $course->video !!}
                            </div>
                            <div class="course-image">
                                <img src="{{ $course->image }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
