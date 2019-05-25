@extends('layouts.app')

@section('content')
    <h1>Projects</h1>
    @if(count($projects) > 0)
        @foreach ($projects as $project)
            <div class="card p-3">
                <div class="row">
                    <div class="col-md-4 cold-sm-4">
                        <img src="/storage/company_logos/{{$project->company_logo}}" alt="" style="width:100%">
                    </div>
                    <div class="col-md-8 cold-sm-8">
                        <h3><a href="/projects/{{$project->project_id}}">{{$project->project_name}}</a></h3>
                    </div>
                </div>
            </div> <br>
        @endforeach  
{{--          this creates the pagination links for projects
  --}}        {{$projects->links()}}  

    @else 
        <p>No projects found</p>
    @endif

    <button><a href="projects/create">Create</a></button>
@endsection