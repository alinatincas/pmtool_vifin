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
                    <h4>SEE TIMESHEET  {!!$timesheet[0]->ts_id!!}</h4>
                </a>
            </div>
        </div>
        <div>
    
    <div class="row pl-3">
        <div class="card col-9 p-3 card-col-vifin">           
            <div class="card-body card-vifin card-vifin-indiv-project">
                <div class="row">
                    <div class="p-3">
                        <i class="fas fa-user icon-vifin-project"><p> {!!$timesheet[0]->project_name!!}</p></i><br>

                        <i class="fas fa-phone-square icon-vifin-project"><p> {!!$timesheet[0]->ts_date!!}</p></i><br>

                        <i class="fas fa-envelope icon-vifin-project"><p> {!!$timesheet[0]->activity!!}</p></i><br>

                        <i class="fas fa-envelope icon-vifin-project"><p> {!!$timesheet[0]->hours_spent!!}</p></i><br>
                    </div>                    
                    
                    
                    <div class="col-2">
                        <button type="button" class="btn btn-vifin">
                        <i class="fas fa-envelope icon-vifin-project"><p> {!!$timesheet[0]->hours_spent!!}</p></i><br>
                            <i class="fas fa-pencil-alt"><a href="/projects/edit/{{$timesheet[0]->ts_id}}" class="btn-vifin-a">EDIT</a></i>
                        </button>
                        
                    </div>
                    <div class="col-2 vifin-align-end">
                        <button type="button" class="btn btn-danger">
                            {!! Form::open(['action' => ['TimesheetController@destroy']]) !!}
                                {{ method_field('DELETE') }}
                                {{ Form::hidden('project_id', $timesheet[0]->ts_id)}}
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