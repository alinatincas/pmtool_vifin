@extends('layouts.app')

@section('content')
<div class="home-vifin">
    <div class="row top-head-vifin-col {{ Request::is('/') ? 'active' : '' }} p-3">
        <div class="col-1 top-head-text-col">
            <a href="/">
                <i class="fas fa-home icon-home-vifin-head"></i>
            </a>
        </div>
        <div class="col-11 ">
            <a href="/">
                <h4>HOME PAGE</h4>
            </a>
        </div>
    </div>
    <div class="row pl-3">
        <div class="col-12">
            <h5>Welcome, {{ Auth::user()->name }}! <br>
            Have a productive day as usual and don't forget to fill in the <b>timesheet</b>!</h5>
        </div>
    </div>
</div>    
@endsection
