@extends('layouts.app')

@section('content')
<div class="timesheet-vifin">
    <div class="row top-head-vifin-col p-3 {{ Request::segment(1) === 'timesheet' ? 'active' : null  }}">
        <div class="col-1 top-head-text-col">
            <a href="/timesheet">
                <i class="fas fa-edit icon-home-vifin-head"></i>
            </a>
        </div>
        <div class="col-3">
            <a href="/timesheet">
                <h4>FILL IN TIMESHEET</h4>
            </a>
        </div>
    </div>
</div> 
@endsection



