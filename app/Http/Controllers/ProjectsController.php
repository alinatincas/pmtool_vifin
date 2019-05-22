<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use DB;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$projects = Project::orderBy('project_name', 'desc')->get();

        //$projects = Project::orderBy('project_name', 'desc')->paginate(10);
        //$projects = Project::orderBy('created_at', 'desc')->paginate(10);

        //$projects = Project::orderBy('project_name', 'desc')->take(1)->get();

        $projects = Project::paginate(10);

        //limit with 1 post per page

        //$projects =  Project::all();

        //$projects = DB::select('SELECT * FROM projects');

        return view('projects.index')->with('projects', $projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'project_name' => 'required',
            'description' => 'required'
        ]);

        //Create Project
        $project = new Project;
        $project->project_name = $request->input('project_name');
        $project->decription = $request->input('decription');
        $project->save();

        return redirect('/projects')->with('success', 'Project Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $project_id
     * @return \Illuminate\Http\Response
     */
    public function show($project_id)
    {
        echo $project_id;
        $project = Project::where('project_id', $project_id)->get();
        //$all_projects = Project::all();
        //echo $project;

        return view('projects.show')->with('project', $project);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $project_id
     * @return \Illuminate\Http\Response
     */
    public function edit($project_id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $project_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $project_id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $project_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($project_id)
    {
        //
    }
}
