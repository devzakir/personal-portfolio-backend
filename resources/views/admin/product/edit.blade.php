@extends('layouts.admin')
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card card-default">
        <div class="card-header card-header-border-bottom d-flex justify-content-between align-items-center">
          <h2>Edit Product</h2>
          <a href="{{ route('product.index') }}" class="btn btn-primary">Go back to Product</a>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif
            </div>
          </div>
          <form action="{{ route('product.update', ['id' => $product->id]) }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="">Product Title</label>
                  <input type="text" name="title" value="{{ old('title', $product->title) }}" class="form-control" placeholder="Product Title">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="">Product Link</label>
                  <input type="text" name="link" value="{{ old('link', $product->link) }}" class="form-control" placeholder="Product Link">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="category_id">Product Category</label>
                  <select name="category_id" id="category_id" class="form-control">
                    @foreach($categories as $c)
                      <option value="{{ $c->id }}" @if($product->category_id == $c->id) selected @endif>{{$c->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-6">
                  <div class="form-group">
                    <label for="">Layout</label>
                    <input type="text" class="form-control" name="layout" value="{{ old('layout', $product->layout) }}" placeholder="Layout">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="">Version</label>
                  <input type="text" class="form-control" name="version" value="{{ old('version', $product->version) }}" placeholder="Version">
                </div>
              </div>
              <div class="col-6">
                  <div class="form-group">
                    <label for="">Price</label>
                    <input type="number" step=".01" class="form-control" name="price" value="{{ old('price', $product->price) }}" placeholder="Price">
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="description">Product Description</label>
                  <textarea name="description" id="description" rows="4" class="form-control" placeholder="Describe yourself here...">{{$product->description }}</textarea>
                </div>
              </div>
              <div class="col-6">
                  <div class="form-group">
                    <label for="">License</label>
                    <input type="text" class="form-control" name="license" value="{{ old('license', $product->license) }}" placeholder="License">
                  </div>
                  <div class="form-group">
                    <label for="">Choose Product Image</label>
                    <input type="file" name="image" class="form-control-file">
                  </div>
              </div>
            </div>
            <div class="form-group text-center">
                <button class="btn btn-success" type="submit">Update Portfolio</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection