@extends('layouts.myapp')

@section('content')
    <h1>Create project</h1>
    {!! Form::open(['action' => 'ProjectsController@store', 'method' => 'POST']) !!}
        {{ csrf_field() }}
        <div class="form-group">
            {{Form::label('project_name', 'Project Name')}}
            {{Form::text('project_name', '', ['class' => 'form-control', 'placeholder' => 'Project Name'])}}
        </div>

        <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::textarea('description', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Description text'])}}
        </div>

        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        
    {!! Form::close() !!}
@endsection