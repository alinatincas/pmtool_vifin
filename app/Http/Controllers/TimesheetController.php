<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timesheet;
use DB;

class TimesheetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        return view('timesheet.index');
    }
    public function daily()
    {

        return view('timesheet.daily');
    }
    public function overview()
    {
        $timesheet =  Timesheet::all();
        return view('timesheet.overview')->with('timesheet', $timesheet);
    }
    public function create()
    {
        return view('timesheet.create');
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
            'ts_date' => 'required',
            'activity' => 'required',
            'hours_spent' => 'required',
        ]);

        //Create Timesheet
        $timesheet = new Timesheet;
        $timesheet->project_name = $request->input('project_name');
        $timesheet->ts_date = $request->input('ts_date');
        $timesheet->activity = $request->input('activity');
        $timesheet->hours_spent = $request->input('hours_spent');
        $timesheet->save();

        return redirect('/timesheet/overview')->with('success', 'Timesheet Data Created');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $project_id
     * @return \Illuminate\Http\Response
     */
    public function edit($ts_id)
    {
        $timesheet = Timesheet::where('ts_id', $ts_id)->get();
        return view('timesheet.edit')->with('timesheet', $timesheet);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $project_id
     * @return \Illuminate\Http\Response
     */
    public function show($ts_id)
    {

        //$all_projects = Project::all();
        //echo $project;
        $timesheet = Timesheet::where('ts_id', $ts_id)->get();
        return view('timesheet.show')->with('timesheet', $timesheet);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $project_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $ts_id = $request->ts_id;

        $this->validate($request, [
            'project_name' => 'required',
            'ts_date' => 'required',
            'activity' => 'required',
            'hours_spent' => 'required',
        ]);

        //Create Timesheet
        Timesheet::where('ts_id', $ts_id)->update(['project_name' => $request->input('project_name')]);
        Timesheet::where('ts_id', $ts_id)->update(['ts_date' => $request->input('ts_date')]);
        Timesheet::where('ts_id', $ts_id)->update(['activity' => $request->input('activity')]);
        Timesheet::where('ts_id', $ts_id)->update(['hours_spent' => $request->input('hours_spent')]);

        return redirect('/timesheet/overview')->with('success', 'Timesheet Data Updated');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $timesheet = Timesheet::where('ts_id', $request->ts_id)->get();
        if ($timesheet == null) {
            return redirect('/timesheet/overview')->with('error', 'Timesheet data not found');
        }
        Timesheet::where('ts_id', $request->ts_id)->delete();

        return redirect('/timesheet/overview')->with('success', 'Timesheet Data Removed');
    }
}