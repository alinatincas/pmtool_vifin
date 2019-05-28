@extends('layouts.app')

@section('content')
    <h1>Edit project</h1>
    {!! Form::open(['action' => ['ProjectsController@update', 'project_id' => $project[0]->project_id, 'method' => 'POST','enctype' => 'multipart/form-data']]) !!}
        {{ csrf_field() }}
        <div class="form-group">
            {{Form::text('project_name', $project[0]->project_name, ['class' => 'form-control', 'placeholder' => 'Project Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('start_date', 'Start Date')}}
            {{Form::date('start_date', $project[0]->start_date, ['class' => 'form-control', 'placeholder' => 'Start Date'])}}
        </div>
        <div class="form-group">
            {{Form::label('end_date', 'End Date')}}
            {{Form::date('end_date', $project[0]->end_date, ['class' => 'form-control', 'placeholder' => 'End Date'])}}
        </div>
        <div class="form-group">
            {{Form::text('contact_name', $project[0]->contact_name, ['class' => 'form-control', 'placeholder' => 'Contact Person Name'])}}
        </div>
        <div class="form-group">
            {{Form::email('contact_email', $project[0]->contact_email, ['class' => 'form-control', 'placeholder' => 'Contact Person Email Address'])}}
        </div>
        <div class="form-group">
            {{Form::text('contact_phone', $project[0]->contact_phone, ['class' => 'form-control', 'placeholder' => 'Contact Person Phone Number'])}}
        </div>
        <div class="form-group">
            {{Form::textarea('description', $project[0]->description, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Description text'])}}
        </div>

        <div class="form-group">
            {{Form::file('company_logo')}}
        </div>
        
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        
    {!! Form::close() !!}
@endsection

@section('script')
    tinymce.init({selector:'textarea'});
@endsection