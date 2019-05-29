@extends('layouts.app')

@section('content')
<div class="projects-vifin">
    <div class="row top-head-vifin-col p-3 {{ Request::segment(1) === 'timesheet' ? 'active' : null  }}">
        <div class="col-1 top-head-text-col">
            <a href="/timesheet">
                <i class="fas fa-plus-square icon-home-vifin-head"></i>
            </a>
        </div>
        <div class="col-11">
            <a href="/timesheet">
                <h4>CREATE TIMESHEET</h4>
            </a>
        </div>
    </div>
    <div>
        {!! Form::open(['action' => 'TimesheetController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            {{ csrf_field() }}
        <div class="row pl-3">
            <div class="col-5">
                {{-- <div class="form-group">
                    {{Form::select('project_name', '', ['class' => 'form-control login-form', 'placeholder' => 'Project Name'])}}
                </div> --}}
                <div class="form-group">
                    {{Form::label('ts_date', 'Date')}}
                    {{Form::date('ts_date', '', ['class' => 'form-control login-form', 'placeholder' => 'Date'])}}
                </div>
                <div class="form-group">
                    {{Form::label('hours_spent', 'Hours Spent On Activity')}}
                    {{Form::number('hours_spent', '', ['class' => 'form-control login-form', 'placeholder' => 'Hours Spent On Activity'])}}
                </div>
                <div class="form-group">
                    {{Form::label('activity', 'Write Activity')}} <br>
                    {{Form::textarea('activity', '', ['id' => 'text_editor', 'class' => 'form-control login-form', 'placeholder' => 'Write Activity'])}}
                </div> 
            </div>           
        </div>
        <div class="row p-3">
            <div class="col-6">
                <button type="button" class="btn btn-vifin">
                    <a href="javascript:history.back()" class="btn-vifin-a">BACK</a>
                </button>   
            </div>
            <div class="col-6 vifin-align-right">
                {{Form::submit('SUBMIT', ['class' => 'btn btn-primary btn-vifin'])}}
            </div>       
            {!! Form::close() !!} <br>    
        </div>   
    </div>
</div>    

    
{{--      <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>  --}}
@endsection

@section('script')
    tinymce.init({selector:'textarea'});
@endsection