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
        <div class="col-12 pb-3">
            <h5>Welcome, {{ Auth::user()->name }}! <br>
            Have a productive day {{ 'as' }} usual {{ 'and' }} don{{ '"'}}t forget to fill in the <b>timesheet</b>!</h5>
        </div>
        <div class="card col-3 p-3 card-col-vifin">
            <div class="card-body card-vifin">
                <a href="/timesheet">
                    <i class="fas fa-clock card-icon-vifin pb-3 pt-3"></i>
                    <p>TIME SHEET</p>
                </a>
            </div>
        </div>
        <div class="card col-3 col-xs-6 p-3 card-col-vifin">
            <div class="card-body card-vifin">
                <a href="/projects">
                    <i class="fas fa-layer-group card-icon-vifin pb-3 pt-3"></i>
                    <p>PROJECTS</p>
                </a>
            </div>
        </div>
        <div class="card col-3 col-xs-6 p-3 card-col-vifin">
            <div class="card-body card-vifin">
                <a href="/employees">
                    <i class="fas fa-users card-icon-vifin pb-3 pt-3"></i>
                    <p>EMPLOYEES</p>
                </a>
            </div>
        </div>
        <div class="card col-3 col-xs-6 p-3 card-col-vifin">
            <div class="card-body card-vifin">
                <a href="/profile">
                    <i class="fas fa-user-alt card-icon-vifin pb-3 pt-3"></i>
                    <p>PROFILE</p>
                </a>
            </div>
        </div>
    </div>
</div>    
@endsection
