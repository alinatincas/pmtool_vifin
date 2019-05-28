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
            <div class="card p-3">
                <div class="row">
                    <div class="col-md-4 cold-sm-4">
                        <img src="/storage/company_images/{{$project->company_logo}}" alt="" style="width:100%">

                    </div>
                    <div class="col-md-8 cold-sm-8">
                        <h3><a href="/projects/{{$project->project_id}}">{{$project->project_name}}</a></h3>
                    </div>
                </div>
            </div> <br>
        @endforeach  
    {{--this creates the pagination links for projects--}}    
    {{--$projects->links()--}}  

    @else 
        <p>No projects found</p>
    @endif

    <button><a href="/projects/create">Create</a></button>
@endsection

