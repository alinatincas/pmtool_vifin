@extends('layouts.app')

@section('content')
<div class="timesheet-vifin">
    <div class="row top-head-vifin-col p-3 {{ Request::segment(1) === 'timesheet' ? 'active' : null  }}">
        <div class="col-1 top-head-text-col">
            <a href="/timesheet">
                <i class="fas fa-clock icon-home-vifin-head"></i>
            </a>
        </div>
        <div class="col-11">
            <a href="/timesheet">
                <h4>TIMESHEET</h4>
            </a>
        </div>
    </div>
</div> 
<div class="row pl-3">
    <div class="col-12 pb-2">
        <h5>Fill in the timesheet {{ 'for' }} the day {{ 'or' }} have an overview of your monthly actvities{{ '.' }}</h5>
    </div>
    <div class="card col-3 p-3 card-col-vifin">
        <div class="card-body card-vifin">
            <a href="/timesheet/create">
                <i class="fas fa-edit card-icon-vifin pb-3 pt-3"></i>
                <p>FILL IN <br>
                    TIME SHEET</p>
            </a>
        </div>
    </div>
    <div class="card col-3 col-xs-6 p-3 card-col-vifin">
        <div class="card-body card-vifin">
            <a href="/timesheet/overview">
                <i class="fas fa-check-square card-icon-vifin pb-3 pt-3"></i>
                <p>TIME SHEET <br>
                    OVERVIEW</p>
            </a>
        </div>
    </div>
</div>
@endsection



