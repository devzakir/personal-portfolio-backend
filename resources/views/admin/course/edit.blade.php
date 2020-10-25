@extends('layouts.admin')

@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom d-flex justify-content-between align-items-center">
        <h2>Edit Course - {{ $course->title }}</h2>
        <a href="{{ route('course.index') }}" class="btn btn-primary">Go Back To List</a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('course.update', $course->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
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
                                <input type="text" class="form-control" name="title" placeholder="Course title" value="{{ $course->title }}">
                            </div>
                            <div class="form-group">
                                <label for="courseId">Select Course Category</label>
                                <select name="category" id="courseId" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" @if($course->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Enter Price</label>
                                <input type="number" min="0" name="price" class="form-control" placeholder="Enter price" value="{{ $course->price }}">
                            </div>
                            <div class="form-group">
                                <label for="">Enter Sale Price</label>
                                <input type="number" min="0" name="sale_price" class="form-control" placeholder="Enter Sale price" value="{{ $course->sale_price }}">
                            </div>
                            <div class="form-group">
                                <label for="">Total Course Duration</label>
                                <input type="number" min="0" name="duration" class="form-control" placeholder="total duration" value="{{ $course->duration }}">
                            </div>
                            <div class="form-group">
                                <label for="">Total Videos </label>
                                <input type="number" min="0" name="videos" class="form-control" placeholder="total videos" value="{{ $course->videos }}">
                            </div>
                            <div class="form-group">
                                <label for="">Total Projects </label>
                                <input type="number" min="0" name="projects" class="form-control" placeholder="total projects" value="{{ $course->projects }}">
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="level">Course Level </label>
                                        <select name="level" id="level" class="form-control">
                                            <option value="Beginner" @if($course->level == 'Beginner') selected @endif>Beginner</option>
                                            <option value="Intermediate" @if($course->level == 'Intermediate') selected @endif>Intermediate</option>
                                            <option value="Advance" @if($course->level == 'Advance') selected @endif>Advance</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="published">Course Published </label>
                                        <select name="published" id="published" class="form-control">
                                            <option value="0" @if(!$course->published) selected @endif>Draft</option>
                                            <option value="1" @if($course->published) selected @endif>Published</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-8">
                                    <label for="">Choose File</label>
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="inputGroupFile02" name="image">
                                            <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div style="max-height:150px; max-width:150px; overflow:hidden">
                                        <img src="{{ asset($course->image) }}" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Enter video Embed Code</label>
                                <textarea name="video" id="video" class="form-control" rows="2" placeholder="Enter video embed code">{{ $course->video }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="short_description">Short Description</label>
                                <textarea name="short_description" id="short_description" class="form-control" rows="4" placeholder="Enter short description">{{ $course->short_description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="4" placeholder="Enter description">{{ $course->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="highlight">Course highlight</label>
                                <textarea name="highlight" id="highlight" class="form-control" rows="4" placeholder="Enter highlights">{{ $course->highlight }}</textarea>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" name="coming_soon" id="customSwitch1" @if($course->coming_soon) checked @endif>
                                    <label class="custom-control-label" for="customSwitch1">Coming Soon</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Update Course Course</button>
                        <a href="{{ route('course.index') }}" class="btn btn-secondary btn-default">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('style')
<style>
.ck-editor__editable_inline {
    min-height: 100px;
}
</style>
@endsection

@section('script')

<script src="{{ asset('js') }}/ckeditor.js"></script>
<script>
    ClassicEditor
    .create( document.querySelector( '#description' ), {
        height: 500,
        toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' }
            ]
        },
        removePlugins: [
            'CKFinderUploadAdapter',
            'Autoformat',
            'EasyImage',
            'Image',
            'ImageCaption',
            'ImageStyle',
            'ImageToolbar',
            'ImageUpload',
            'MediaEmbed',
            'PasteFromOffice',
            'Table',
            'TableToolbar',
            'TextTransformation',
        ]
    } )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
    ClassicEditor
    .create( document.querySelector( '#highlight' ), {
        height: 500,
        toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' }
            ]
        },
        removePlugins: [
            'CKFinderUploadAdapter',
            'Autoformat',
            'EasyImage',
            'Image',
            'ImageCaption',
            'ImageStyle',
            'ImageToolbar',
            'ImageUpload',
            'MediaEmbed',
            'PasteFromOffice',
            'Table',
            'TableToolbar',
            'TextTransformation',
        ]
    } )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
</script>
@endsection