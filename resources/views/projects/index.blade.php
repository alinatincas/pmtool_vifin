@extends('layouts.myapp')

@section('content')
    <h1>Projects</h1>
    @if(count($projects) > 0)
        @foreach ($projects as $project)
            <div class="card p-3">
                <h3><a href="/projects/{{$project->project_id}}">{{$project->project_name}}</a></h3>
            </div> <br>
        @endforeach  
        {{$projects->links()}}     
    @else 
        <p>No projects found</p>
    @endif
@endsection