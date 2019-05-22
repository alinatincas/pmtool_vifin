@extends('layouts.myapp')

@section('content')
    <h1>{{$project[0]->project_name}}</h1>
    <h3>{!!$project[0]->description!!}</h3>
    <a href="/projects" class="btn btn-danger">Go Back</a>
@endsection