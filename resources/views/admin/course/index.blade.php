@extends('layouts.admin')

@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom d-flex justify-content-between align-items-center">
        <h2>Courses List</h2>
        <div>
            <a href="{{ route('course-category.index') }}" class="btn btn-primary">Course Category</a>
            <a href="{{ route('course.create') }}" class="btn btn-primary">Create Course</a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th> # </th>
                            <th> Image </th>
                            <th> Title </th>
                            <th> Category </th>
                            <th> User </th>
                            <th> Price </th>
                            <th style="width: 150px"> Handle </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($courses->count())
                        @foreach($courses as $course)
                        <tr>
                            <td> {{ $course->id }} </td>
                            <td>
                                <div style="max-height:60px; max-width:60px; overflow:hidden">
                                    <img src="{{ asset($course->image) }}" alt="" class="img-fluid">
                                </div>
                            </td>
                            <td> 
                                {{ $course->title }} 
                                @if($course->coming_soon)
                                    <div class="badge badge-primary">Coming Soon</div>
                                @endif
                            </td>
                            <td> {{ $course->category_id }} </td>
                            <td> {{ $course->user_id }} </td>
                            <td> 
                                @if($course->sale_price)
                                    {{ $course->sale_price }} <span style="text-decoration: line-through;">{{ $course->price }}</span>
                                @else 
                                    {{ $course->price }}
                                @endif
                            </td>
                            <td style="width: 150px" class="d-flex">
                                <a href="{{ route('course.edit', $course->id) }}" class="mr-1 btn btn-primary btn-sm"> <i class="mdi mdi-square-edit-outline"></i> </a>
                                <a href="{{ route('course.show', $course->id) }}" class="mr-1 btn btn-success btn-sm"> <i class="mdi mdi-eye"></i> </a>
                                <a href="{{ route('course.section.index', ['id' => $course->id]) }}" class="mr-1 btn btn-success btn-sm"> <i class="mdi mdi-menu"></i> </a>
                                <form action="{{ route('course.destroy', $course->id) }}" method="post">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"> 
                                        <i class="mdi mdi-trash-can"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="6">
                                <h5 class="text-center pt-5 pb-5">NO Course Found</h5>
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
