@extends('layouts.admin')

@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom d-flex justify-content-between align-items-center">
        <h2>Create Course</h2>
        <a href="{{ route('course.index') }}" class="btn btn-primary">Go Back To List</a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('course.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Course title</label>
                                <input type="text" class="form-control" name="title" placeholder="Course title">
                            </div>
                            <div class="form-group">
                                <label for="courseId">Select Course Category</label>
                                <select name="category" id="courseId" class="form-control">
                                    <option value="">Select Course Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Enter Price</label>
                                <input type="number" min="0" name="price" class="form-control" placeholder="Enter price">
                            </div>
                            <div class="form-group">
                                <label for="">Enter Sale Price</label>
                                <input type="number" min="0" name="sale_price" class="form-control" placeholder="Enter Sale price">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Choose File</label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile02" name="image">
                                        <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Enter video URL</label>
                                <input type="text" name="video" class="form-control" placeholder="Enter video url">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="4" placeholder="Enter description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Create Course</button>
                        <a href="{{ route('course.index') }}" class="btn btn-secondary btn-default">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
