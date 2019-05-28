@extends('layouts.app')

@section('content')
<div class="projects-vifin">
    <div class="row top-head-vifin-col p-3 {{ Request::segment(1) === 'projects' ? 'active' : null  }}">
        <div class="col-1 top-head-text-col">
            <a href="/projects">
                <i class="fas fa-star icon-home-vifin-head"></i>
            </a>
        </div>
        <div class="col-11">
            <a href="/projects">
                <h4>MY PROJECTS</h4>
            </a>
        </div>
    </div>
</div>   
    {{--  @if
        @foreach 

        @endforeach  

    @else   --}}
        <p>No projects found</p>
    {{--  @endif  --}}

@endsection

