@extends('layouts.admin')
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card card-default">
        <div class="card-header card-header-border-bottom d-flex justify-content-between align-items-center">
          <h2>Edit About Info</h2>
        </div>
        <div class="card-body">
            @if($errors->any())
              <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $item)
                      <li>{{$item}}</li>
                    @endforeach
                </ul>
              </div>
            @endif
          <div class="row">
            <div class="col-6 offset-3">
              <form action="{{ route('about.update', ['id' => $about->id]) }}" method="post" enctype="multipart/form-data">
                @csrf 
                <div class="form-group">
                  <label for="">Name</label>  
                  <input type="text" name="name" value="{{ $about->name }}" class="form-control" placeholder="Your Name">
                </div>  
                <div class="form-group">
                  <label for="">Greeting</label>
                  <input type="text" name="greeting" value="{{ $about->greeting }}" class="form-control" placeholder="Greeting Title">
                </div>
                <div class="form-group">
                  <label for="">Banner Title</label>
                  <input type="text" name="banner_title" value="{{ $about->banner_title }}" class="form-control" placeholder="Banner Title">
                </div>
                <div class="form-group">
                  <label for="">Greeting Note</label>
                  <input type="text" name="greeting_note" value="{{ $about->greeting_note }}" class="form-control" placeholder="Greeting Note">
                </div>
                <div class="row">
                    <div class="col-8">
                      <div class="form-group">
                        <label for="">Choose Avatar</label>
                        <input type="file" name="image" class="form-control-file">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="image" style="height:60px;width:auto;overflow:hidden;">
                        <img src="{{ asset($about->avatar) }}" alt="" style="height:100%; width: auto;">
                      </div>
                    </div>
                  </div>
                <div class="form-group">
                  <label for="">Description</label>
                  {{-- <div id="editor">{!! $about->description !!}</div> --}}
                  <textarea type="text" id="description" name="description" rows="3" class="form-control" placeholder="Description">
                      {!! $about->description !!}
                  </textarea>
                </div>
                <div class="form-group text-center"><button class="btn btn-success">Update About Info</button></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>


<script>
  // var quill = new Quill('#editor', {
  //   theme: 'snow',
  //   placeholder: 'Compose an epic...',    
  // });

  //   var form = document.querySelector('form');
  //   form.onsubmit = function() {
  //     // Populate hidden form on submit
  //     var about = document.querySelector('input[name=about]');
  //     about.value = JSON.stringify(quill.getContents());
      
  //     // console.log("Submitted", $(form).serialize(), $(form).serializeArray());
      
  //     // // No back end to actually submit to!
  //     // alert('Open the console to see the submit data!')
  //     // return false;
  //   };

  $('#description').summernote({
    placeholder: 'Description',
    tabsize: 2,
    height: 200
  });

</script>

@endsection