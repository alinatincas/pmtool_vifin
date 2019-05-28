@extends('layouts.app')

@section('content')
<div class="projects-vifin">
    <div class="row top-head-vifin-col p-3 {{ Request::segment(1) === 'projects' ? 'active' : null  }}">
        <div class="col-1 top-head-text-col">
            <a href="/projects">
                <i class="fas fa-layer-group icon-home-vifin-head"></i>
            </a>
        </div>
        <div class="col-11">
            <a href="/projects">
                <h4>PROJECTS</h4>
            </a>
        </div>
    </div>
</div>   
<div class="row pl-3">
    <div class="col-12 pb-2">
        <h5>See all projects, favourite them {{ 'and' }} see them in your projects{{ '.' }}</h5>
    </div>
    <div class="card col-3 p-3 card-col-vifin">
        <div class="card-body card-vifin">
            <a href="/projects/all">
                <i class="fas fa-edit card-icon-vifin pb-3 pt-3"></i>
                <p>ALL<br>
                    PROJECTS</p>
            </a>
        </div>
    </div>
    <div class="card col-3 col-xs-6 p-3 card-col-vifin">
        <div class="card-body card-vifin">
            <a href="/projects/starred">
                <i class="fas fa-check-square card-icon-vifin pb-3 pt-3"></i>
                <p>MY<br>
                    PROJECTS</p>
            </a>
        </div>
    </div>
    <div class="card col-3 col-xs-6 p-3 card-col-vifin">
        <div class="card-body card-vifin">
            <a href="/projects/create">
                <i class="fas fa-check-square card-icon-vifin pb-3 pt-3"></i>
                <p>CREATE<br>
                    PROJECT</p>
            </a>
        </div>
    </div>
</div>
@endsection

