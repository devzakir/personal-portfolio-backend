@extends('layouts.admin')
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card card-default">
        <div class="card-header card-header-border-bottom d-flex justify-content-between align-items-center">
          <h2>SEO Details</h2>
          {{-- <a href="{{ route('portfolio.category.create') }}" class="btn btn-primary"> Create SEO </a> --}}
        </div>
        <div class="card-body">
          <table class="table table-bordered table-striped">
            <thead class="thead-dark">
              <tr>
                <th style="max-width:500px;">Id</th>
                <th style="max-width:500px;">Title</th>
                <th style="max-width:500px;">Keyword</th>
                <th style="max-width:500px;">Description</th>
                <th style="max-width:500px;">OG Image</th>
                <th style="max-width:500px;">Action</th>
              </tr>
            </thead>
            <tbody>
              @if($data->count() > 0)
              @foreach($data as $c)
              <tr>
                <td style="max-width:500px;">{{$c->id}}</td>
                <td style="max-width:500px;">{{$c->title}}</td>
                <td style="max-width:500px;">{{$c->keyword}}</td>
                <td style="max-width:500px;">{{$c->description}}</td>
                <td style="max-width:500px;">
                  <div style="height:50px;width:50px;overflow:hidden">
                    <img src="{{$c->image}}" alt="" class="img-fluid">
                  </div>
                </td>
                <td style="max-width:500px;">
                    <a href="{{ route('seo.edit', ['id' => $c->id]) }}" class="btn btn-success btn-sm"> <span class="mdi mdi-square-edit-outline"></span> </a>
                    <a href="#" class="btn btn-primary btn-sm"> <span class="mdi mdi-eye"></span> </a>
                    <a href="{{ route('seo.destroy', ['id' => $c->id]) }}" class="btn btn-danger btn-sm"> <span class="mdi mdi-delete"></span> </a>
                </td>
              </tr>
              @endforeach
              @else 
                <tr>
                  <td colspan="6"><h5 class="text-center">No SEO Data Found</h5></td>
                </tr>
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection