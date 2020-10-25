@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom d-flex justify-content-between align-items-center">
                <h2>All Course Sections</h2>
                <div>
                    <a href="{{ route('course.index') }}" class="btn btn-warning">Course List</a>
                    <a href="{{ route('course.section.create', ['id' => $course->id]) }}" class="btn btn-primary">Create Course Section</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Course Name</th>
                            <th>Total Lesson</th>
                            <th style="width:150px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($sections->count() > 0)
                        @foreach($sections as $section)
                        <tr>
                            <td>{{ $section->id }}</td>
                            <td>{{ $section->name }}</td>
                            <td>
                                {{ $section->course->title }}
                                @if($section->course->coming_soon)
                                    <div class="badge badge-primary">Coming Soon</div>
                                @endif
                            </td>
                            <td>{{ $section->videos->count() }}</td>
                            <td class="d-flex" style="width:150px">
                                <a href="{{ route('course.section.edit', ['id' => $course->id, 'sectionId' => $section->id]) }}" class="btn btn-success btn-sm mr-1">
                                    <span class="mdi mdi-square-edit-outline"></span>
                                </a>
                                <a href="{{ route('course.video.index', ['id' => $section->id]) }}" class="mr-1 btn btn-success btn-sm mr-1"> <i class="mdi mdi-menu"></i> </a>
                                <form action="{{ route('course.section.destroy', ['id' => $course->id, 'sectionId' => $section->id]) }}" method="post">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"> <span
                                            class="mdi mdi-delete"></span> </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="5">
                                <h5 class="text-center pt-4 pb-4">No Sections Found</h5>
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