@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-4 cold-sm-4">
            <img src="/storage/company_logos/{{$project->company_logo}}" alt="" style="width:100%">
        </div>
        <div class="col-md-8 cold-sm-8">
            <h1>{{$project[0]->project_name}}</h1>
            <h3>{!!$project[0]->description!!}</h3>
        </div>
    </div>
    
    <div>
        <a href="/projects" class="btn btn-danger">Go Back</a>
    </div><br>

     @if (!Auth::quest())   {{--  quest can't see these buttons  --}}
        <div>
            <a href="/projects/{{$project[0]}}/edit" class="btn btn-primary">Edit</a>
        </div>
        <br>
        {!! Form::open(['action' => ['ProjectsController@destroy', $project[0]],'method' => 'POST', 'class' => 'pull-right']) !!}
            
            {!! Form::hidden('method', 'DELETE') !!}
            
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}   
        {!! Form::close() !!}    
     @endif 
    
    
@endsection