@extends('layouts.app')

@section('content')
    <h1>{{$project[0]->project_name}}</h1>
    <div>
        <h3>{!!$project[0]->description!!}</h3>
        <a href="/projects" class="btn btn-danger">Go Back</a>
    </div><br>
    <div>
        <a href="/projects/{{$project[0]}}/edit" class="btn btn-primary">Edit</a>
    </div>
    <br>
    {!! Form::open(['action' => ['ProjectsController@destroy', $project[0]],'method' => 'POST', 'class' => 'pull-right']) !!}
        
        {!! Form::hidden('method', 'DELETE') !!}
        
        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        

    {!! Form::close() !!}
    
    
@endsection