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
                <h4>ALL PROJECTS</h4>
            </a>
        </div>
    </div>
</div>   
    @if(count($projects) > 0)
    @foreach ($projects as $project)
    <div class="row pl-3">
        <div class="card col-3 p-3 card-col-vifin">           
            <div class="card-body card-vifin align-middle">
                <a href="/projects/{{$project->project_id}}">
                    <img src="/storage/company_images/{{$project->company_logo}}" alt="" style="width:100%"></a>
               <a href="/projects/{{$project->project_id}}"> <p class="list-vifin-p">{{$project->project_name}}</p></a>
            </div>            
        </div>
        @endforeach 
        @else 
            <div class="col-12 pb-2">
                <h5>No projects found</h5>
            </div>
        @endif       
    </div>
    <div class="col-12 pb-2">
        <button type="button" class="btn btn-vifin">
            <a href="javascript:history.back()" class="btn-vifin-a">BACK</a>
        </button>
    </div>
@endsection

