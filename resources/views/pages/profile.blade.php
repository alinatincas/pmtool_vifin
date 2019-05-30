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
    <div class="row pl-3">
        <div class="card col-9 p-3 card-col-vifin">           
            <div class="card-body card-vifin card-vifin-indiv-project">
                <div class="row">
                    <div class="col-5 vifin-icon-p">
                        <i class="fas fa-user icon-vifin-project">Name:</i>
                        <p>{{ Auth::user()->fname }} {{ Auth::user()->lname }}</p>

                        <i class="fas fa-phone-square icon-vifin-project">Phone number:</i>
                        <p>{{ Auth::user()->phone_no }}</p>


                        <i class="fas fa-envelope icon-vifin-project">Email:</i>
                        <p>{{ Auth::user()->email }}</p>
                    </div>              
                    <div class="col-4">
                        <h4 class="text-color-aqua">Hourly pay (dkk):</h4>
                        <p>{{ Auth::user()->pay }}</p>
                        <h4 class="text-color-aqua">Department name:</h4>
                        <p>{{ Auth::user()->dep_name }}</p>
                        <h4 class="text-color-aqua">Position Name:</h4>
                        <p>{{ Auth::user()->pos_name }} </p>
                    </div>      
                        
                </div>                
            </div>            
        </div>      
    </div>
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

