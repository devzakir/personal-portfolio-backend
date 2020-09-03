@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom d-flex justify-content-between align-items-center">
                <h2>All Course Videos</h2>
                {{-- <div>
                    <a href="{{ route('course.section.index', ['id' => $section->id]) }}" class="btn btn-warning">Course Section List</a>
                    <a href="{{ route('course.video.create', ['id' => $section->id]) }}" class="btn btn-primary">Create Course Video</a>
                </div> --}}
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Course Name</th>
                            <th>Section Name</th>
                            <th style="width:150px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($videos->count() > 0)
                        @foreach($videos as $video)
                        <tr>
                            <td>{{ $video->id }}</td>
                            <td>
                                {{ $video->title }}
                                @if($video->coming_soon)
                                    <div class="badge badge-primary">Coming Soon</div>
                                @endif
                            </td>
                            <td>
                                {{ $video->course->title }}
                                @if($video->course->coming_soon)
                                    <div class="badge badge-primary">Coming Soon</div>
                                @endif
                            </td>
                            <td>{{ $video->section->name }}</td>
                            <td class="d-flex" style="width:150px">
                                <a href="{{ route('course.video.edit', ['id' => $video->section_id, 'videoId' => $video->id]) }}"
                                    class="btn btn-success btn-sm"> <span class="mdi mdi-square-edit-outline"></span>
                                </a>
                                <a href="#" class="btn btn-primary btn-sm ml-1"> <span class="mdi mdi-eye"></span> </a>
                                <form action="{{ route('course.video.destroy', ['id' => $video->section_id, 'videoId' => $video->id]) }}" method="post"
                                    class="ml-1">
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
                                <h5 class="text-center pt-4 pb-4">No Videos Found</h5>
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