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
@endsection

