@extends('layouts.app')

@section('content')
    <h1>Create project</h1>
    {!! Form::open(['action' => 'ProjectsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        {{ csrf_field() }}
        <div class="form-group">
            {{Form::label('project_name', 'Project Name')}}
            {{Form::text('project_name', '', ['class' => 'form-control', 'placeholder' => 'Project Name'])}}
        </div>

        <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::textarea('description', '', ['id' => 'text_editor', 'class' => 'form-control', 'placeholder' => 'Description text'])}}
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