@extends('layouts.app')

@section('content')
<div class="projects-vifin">
    <div class="row top-head-vifin-col p-3 {{ Request::segment(1) === 'projects' ? 'active' : null  }}">
        <div class="col-1 top-head-text-col">
            <a href="/projects">
                <i class="fas fa-plus-square icon-home-vifin-head"></i>
            </a>
        </div>
        <div class="col-11">
            <a href="/projects">
                <h4>CREATE PROJECT</h4>
            </a>
        </div>
    </div>
    <div>
        {!! Form::open(['action' => 'ProjectsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            {{ csrf_field() }}
        <div class="row pl-3">
            <div class="col-5">
                <div class="form-group">
                    {{Form::text('project_name', '', ['class' => 'form-control login-form', 'placeholder' => 'Project Name'])}}
                </div>
                <div class="form-group">
                    {{Form::label('start_date', 'Start Date')}}
                    {{Form::date('start_date', '', ['class' => 'form-control login-form', 'placeholder' => 'Start Date'])}}
                </div>
                <div class="form-group">
                    {{Form::label('end_date', 'End Date')}}
                    {{Form::date('end_date', '', ['class' => 'form-control login-form', 'placeholder' => 'End Date'])}}
                </div>
            </div>
            <div class="col-5">
                <div class="form-group">
                    {{Form::text('contact_name', '', ['class' => 'form-control login-form', 'placeholder' => 'Contact Person Name'])}}
                </div>
                <div class="form-group">
                    {{Form::email('contact_email', '', ['class' => 'form-control login-form', 'placeholder' => 'Contact Person Email Address'])}}
                </div>
                <div class="form-group">
                    {{Form::text('contact_phone', '', ['class' => 'form-control login-form', 'placeholder' => 'Contact Person Phone Number'])}}
                </div>
                <div class="form-group">
                    {{Form::label('company_logo', 'Add Company Logo:')}} <br>
                    {{Form::file('company_logo')}}
                </div>
            </div>
        </div>
            <div class="col-12">
                <div class="form-group">
                    {{Form::label('description', 'Project Description')}} <br>
                    {{Form::textarea('description', '', ['id' => 'text_editor', 'class' => 'form-control login-form', 'placeholder' => 'Project Description'])}}
                </div>     
                {{Form::submit('SUBMIT', ['class' => 'btn btn-primary btn-vifin'])}}         
            </div>           
        {!! Form::close() !!} <br>
    </div>
</div>    

    
{{--      <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>  --}}
@endsection

@section('script')
    tinymce.init({selector:'textarea'});
@endsection