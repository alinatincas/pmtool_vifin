@extends('layouts.app')

@section('content')
<div class="profile-vifin">
    <div class="row top-head-vifin-col p-3 {{ Request::segment(1) === 'profile' ? 'active' : null  }}">
        <div class="col-1 top-head-text-col">
            <a href="/profile">
                <i class="fas fa-user-alt icon-home-vifin-head"></i>
            </a>
        </div>
        <div class="col-11">
            <a href="/profile">
                <h4>PROFILE</h4>
            </a>
        </div>
    </div>
</div> 
<div class="row">
    {{ Auth::user()->fname }} <br>
    {{ Auth::user()->lname }} <br>
    {{ Auth::user()->email }} <br>
    {{ Auth::user()->pay}} <br>
    {{ Auth::user()->phone_no }} <br>
    {{ Auth::user()->dep_name }} <br>
    {{ Auth::user()->pos_name }} <br>
    
</div>
{{-- <div class="row">
    <h1>File Upload</h1>
    <form action="{{('upload') }}" method="post" enctype="multipart/form-data">
        <label>Select image to upload:</label>
        <input type="file" name="file" id="file">
        <input type="submit" value="Submit" name="submit">
        <input type="hidden" value="{{ csrf_token() }}" name="_token">
    </form>
</div> --}}
{{--  <div>
    
    
</div>  --}}
@endsection

