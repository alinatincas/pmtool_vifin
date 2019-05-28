@extends('layouts.app')

@section('content')
    <h1>Create project</h1>
    {!! Form::open(['action' => 'ProjectsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        {{ csrf_field() }}
        <div class="form-group">
            {{Form::text('project_name', '', ['class' => 'form-control', 'placeholder' => 'Project Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('start_date', 'Start Date')}}
            {{Form::date('start_date', '', ['class' => 'form-control', 'placeholder' => 'Start Date'])}}
        </div>
        <div class="form-group">
            {{Form::label('end_date', 'End Date')}}
            {{Form::date('end_date', '', ['class' => 'form-control', 'placeholder' => 'End Date'])}}
        </div>
        <div class="form-group">
            {{Form::text('contact_name', '', ['class' => 'form-control', 'placeholder' => 'Contact Person Name'])}}
        </div>
        <div class="form-group">
            {{Form::email('contact_email', '', ['class' => 'form-control', 'placeholder' => 'Contact Person Email Address'])}}
        </div>
        <div class="form-group">
            {{Form::text('contact_phone', '', ['class' => 'form-control', 'placeholder' => 'Contact Person Phone Number'])}}
        </div>
        <div class="form-group">
            {{Form::textarea('description', '', ['id' => 'text_editor', 'class' => 'form-control', 'placeholder' => 'Project Description'])}}
        </div>

        <div class="form-group">
            {{Form::file('company_logo')}}
        </div>

        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        
    {!! Form::close() !!}
{{--      <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>  --}}
@endsection

@section('script')
    tinymce.init({selector:'textarea'});
@endsection