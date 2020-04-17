@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom d-flex justify-content-between align-items-center">
                <h2>All Course Sections</h2>
                <a href="{{ route('course-section.create') }}" class="btn btn-primary">Create Course Section</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Course Name</th>
                            <th style="width:150px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($sections->count() > 0)
                        @foreach($sections as $section)
                        <tr>
                            <td>{{ $section->id }}</td>
                            <td>{{ $section->name }}</td>
                            <td>{{ $section->course->title }}</td>
                            <td class="d-flex" style="width:150px">
                                <a href="{{ route('course-section.edit', $section->id) }}" class="btn btn-success btn-sm mr-1">
                                    <span class="mdi mdi-square-edit-outline"></span>
                                </a>
                                <a href="{{ route('course-video.index') }}" class="mr-1 btn btn-success btn-sm mr-1"> <i class="mdi mdi-menu"></i> </a>
                                <form action="{{ route('course-section.destroy', $section->id) }}" method="post">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"> <span
                                            class="mdi mdi-delete"></span> </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr> 
                            <td colspan="4">
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