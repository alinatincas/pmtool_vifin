@extends('layouts.app')

@section('content')
    <h1>Edit project</h1>
    {!! Form::open(['action' => ['ProjectsController@update', $project->project_id, 'method' => 'POST','enctype' => 'multipart/form-data']) !!}
        {{ csrf_field() }}
        <div class="form-group">
            {{Form::label('project_name', 'Project Name')}}
            {{Form::text('project_name', $project->project_name, ['class' => 'form-control', 'placeholder' => 'Project Name'])}}
        </div>

        <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::textarea('description', $project->description, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Description text'])}}
        </div>

        <div class="form-group">
            {{Form::file('company_logo')}}
        </div>
        
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        
    {!! Form::close() !!}
@endsection