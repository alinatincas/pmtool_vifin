<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Project;
use DB;

class ProjectsController extends Controller
{
    /**
     * Create a new controller instance.
     * Only those who login can see this page
     * @return void
     */
    /* public function __construct()
    {
        $this->middleware('auth');
    } */

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
            'description' => 'required',
            'company_logo' => 'image|nullable|max:1999'
        ]);

        //Handle file upload
        if ($request->hasFile('company_logo')) {
            //Get file name with the extension
            $filenameWithExt = $request->file('company_logo')->getClientOriginalName();

            //Get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //Get just extension
            $extension = $request->file('company_logo'->getClientOriginalExtension());

            //File name to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;

            //upload image
            $path = $request->file('company_logo')->storeAs('public/company_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        //Create Project
        $project = new Project;
        $project->project_name = $request->input('project_name');
        $project->decription = $request->input('decription');
        $project->company_logo = $fileNameToStore;
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

        //$all_projects = Project::all();
        //echo $project;
        echo $project_id;
        $project = Project::where('project_id', $project_id)->get();
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
        echo $project_id;
        $project = Project::where('project_id', $project_id)->get();
        return view('projects.edit')->with('project', $project);
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
        $this->validate($request, [
            'project_name' => 'required',
            'description' => 'required'
        ]);

        //Handle file upload
        if ($request->hasFile('company_logo')) {
            //Get file name with the extension
            $filenameWithExt = $request->file('company_logo')->getClientOriginalName();

            //Get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //Get just extension
            $extension = $request->file('company_logo'->getClientOriginalExtension());

            //File name to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;

            //upload image
            $path = $request->file('company_logo')->storeAs('public/company_images', $fileNameToStore);
        }

        //Create Project
        $project = Project::find($project_id);
        $project->project_name = $request->input('project_name');
        $project->decription = $request->input('decription');
        if ($request->hasFile('company_logo')) {
            $project->company_logo = $fileNameToStore;
        }
        $project->save();

        return redirect('/projects')->with('success', 'Project Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $project_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($project_id)
    {
        $project = Project::find($project_id);

        if ($project->company_logo != 'noimage.jpg') {
            //delete image
            Storage::delete('public/company_logos/' . $project->company_logo);
        }

        $project->delete();

        return redirect('/projects')->with('success', 'Project Removed');
    }
}
