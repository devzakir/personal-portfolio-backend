@extends('layouts.admin')

@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom d-flex justify-content-between align-items-center">
        <h2>Course Category List</h2>
        <div>
            <a href="{{ route('course.index') }}" class="btn btn-primary">Course List</a>
            <a href="{{ route('course-category.create') }}" class="btn btn-primary">Create Category</a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th> # </th>
                            <th> Name </th>
                            <th> Slug </th>
                            <th style="width: 150px"> Handle </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($categories->count())
                        @foreach($categories as $category)
                        <tr>
                            <td> {{ $category->id }} </td>
                            <td> {{ $category->name }} </td>
                            <td> {{ $category->slug }} </td>
                            <td style="width: 150px" class="d-flex">
                                <a href="{{ route('course-category.edit', $category->id) }}" class="mr-1 btn btn-primary btn-sm"> <i class="mdi mdi-square-edit-outline"></i> </a>
                                <a href="#" class="mr-1 btn btn-success btn-sm"> <i class="mdi mdi-eye"></i> </a>
                                <form action="{{ route('course-category.destroy', $category->id) }}" method="post">
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
                                <h5 class="text-center pt-5 pb-5">NO Category Found</h5>
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
