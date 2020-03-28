@extends('layouts.admin')

@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom d-flex justify-content-between align-items-center">
        <h2>Edit Setting</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('setting.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">App Name</label>
                        <input type="text" class="form-control" name="name" placeholder="App name" value="{{ $setting->name }}">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-8">
                                <label for="">App Logo</label>
                                <input type="file" class="form-control-file" name="logo" value="{{ $setting->logo }}">
                            </div>
                            <div class="col-4">
                                <div style="height: 70px; width: 70px; overflow: hidden">
                                    <img src="{{ asset($setting->logo) }}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <label for="">Phone Number</label>
                        <input type="text" class="form-control" name="phone" placeholder="Enter phone" value="{{ $setting->phone }}">
                    </div>
                    <div class="form-group">
                        <label for="">Email address</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter email" value="{{ $setting->email }}">
                    </div>
                    <div class="form-group">
                        <label for="">Copyright</label>
                        <input type="text" class="form-control" name="copyright" placeholder="Copyright text" vlaue="{{ $setting->copyright }}">
                    </div>
                    <div class="form-group">
                        <label for="">Address</label>
                        <textarea name="address" rows="1" class="form-control" placeholder="Address"> {{ $setting->address }} </textarea>
                    </div>
                    <div class="form-group">
                        <label for="">About</label>
                        <textarea name="about" rows="3" class="form-control" placeholder="About"> {{ $setting->about }} </textarea>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Github Profile</label>
                        <input type="text" class="form-control" name="github" placeholder="Enter github" value="{{ $setting->github }}">
                    </div>
                    <div class="form-group">
                        <label for="">Facebook Profile</label>
                        <input type="text" class="form-control" name="facebook" placeholder="Enter facebook" value="{{ $setting->facebook }}">
                    </div>
                    <div class="form-group">
                        <label for="">Linkedin Profile</label>
                        <input type="text" class="form-control" name="linkedin" placeholder="Enter linkedin" value="{{ $setting->linkedin }}">
                    </div>
                    <div class="form-group">
                        <label for="">Stackoverflow Profile</label>
                        <input type="text" class="form-control" name="stackoverflow" placeholder="Enter stackoverflow" value="{{ $setting->stackoverflow }}">
                    </div>
                    <div class="form-group">
                        <label for="">Skype Profile</label>
                        <input type="text" class="form-control" name="skype" placeholder="Enter skype" value="{{ $setting->skype }}">
                    </div>
                    <div class="form-group">
                        <label for="">Quora Profile</label>
                        <input type="text" class="form-control" name="quora" placeholder="Enter quora" value="{{ $setting->quora }}">
                    </div>
                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Save Setting</button>
                        <a href="{{ route('user.index') }}" class="btn btn-secondary btn-default">Cancel</a>
                    </div>
                </div>
            </div>
            
        </form>
    </div>
</div>

@endsection
