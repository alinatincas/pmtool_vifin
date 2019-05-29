@extends('layouts.app')

@section('content')
<div class="projects-vifin">
    <div class="row top-head-vifin-col p-3 {{ Request::segment(1) === 'projects' ? 'active' : null  }}">
        <div class="col-1 top-head-text-col">
            <a href="/projects">
                <i class="fas fa-layer-group icon-home-vifin-head"></i>
            </a>
        </div>
        <div class="col-11">
            <a href="/projects">
                <h4>{{$project[0]->project_name}}</h4>
            </a>
        </div>
    </div>
</div>   
    
    <div class="row pl-3">
        <div class="card col-9 p-3 card-col-vifin">           
            <div class="card-body card-vifin card-vifin-indiv-project">
                <div class="row">
                    <div class="col-4 vifin-icon-p">
                        <img src="/storage/company_images/{{$project[0]->company_logo}}" alt="" style="width:100%">
                        <div class="p-3">
                            <i class="fas fa-user icon-vifin-project"><p> {!!$project[0]->contact_name!!}</p></i><br>

                            <i class="fas fa-phone-square icon-vifin-project"><p> {!!$project[0]->contact_phone!!}</p></i><br>

                            <i class="fas fa-envelope icon-vifin-project"><p> {!!$project[0]->contact_email!!}</p></i><br>
                        </div>                    
                    </div>
                    <div class="col-4">
                        <h1 class="text-color-aqua">{{$project[0]->project_name}}</h1>   
                        <h4 class="text-color-aqua">Start Date:</h4>
                        <p>{!!$project[0]->start_date!!}</p>
                        <h4 class="text-color-aqua">End Date:</h4>
                        <p>{!!$project[0]->end_date!!}</p>
                        <h4 class="text-color-aqua">Project Description:</h4>
                        <p>{!!$project[0]->description!!}</p>
                    </div>
                    <div class="col-2">
                        <button type="button" class="btn btn-vifin">
                            <i class="fas fa-pencil-alt"><a href="/projects/edit/{{$project[0]->project_id}}" class="btn-vifin-a">EDIT</a></i>
                        </button>
                        
                    </div>
                    <div class="col-2 vifin-align-end">
                        <button type="button" class="btn btn-danger">
                            {!! Form::open(['action' => ['ProjectsController@destroy']]) !!}
                                {{ method_field('DELETE') }}
                                {{ Form::hidden('project_id', $project[0]->project_id)}}
                            <i class="fas fa-trash-alt">{!! Form::submit('DELETE', ['class' => 'btn btn-vifin-a']) !!} </i>
                            {!! Form::close() !!}  
                        </button>
                    </div>
                </div>
                
            </div>            
        </div>
      
    </div>
    <div class="col-12 pb-2">
        <button type="button" class="btn btn-vifin">
            <a href="javascript:history.back()" class="btn-vifin-a">BACK</a>
        </button>
        
    </div>    
@endsection