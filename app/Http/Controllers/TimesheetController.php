<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        return view('timesheet.overview');
    }
}