@extends('layouts.app')

@section('content')
<div class="projects-vifin">
    <div class="row top-head-vifin-col p-3 {{ Request::segment(1) === 'projects' ? 'active' : null  }}">
        <div class="col-1 top-head-text-col">
            <a href="/projects">
                <i class="fas fa-star icon-home-vifin-head"></i>
            </a>
        </div>
        <div class="col-11">
            <a href="/projects">
                <h4>MY PROJECTS</h4>
            </a>
        </div>
    </div>
    <div class="row pl-3">
        <div class="col-12 pb-2">
            <h5>No projects found!</h5>
        </div>
        <div class="col-12">
            <button type="button" class="btn btn-vifin">
                <a href="javascript:history.back()" class="btn-vifin-a">BACK</a>
            </button>
        </div>
    </div> 
</div>   
@endsection

