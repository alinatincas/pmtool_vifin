<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }

    public function timesheet()
    {
        $title = 'TIMESHEET';
        //return view('pages.timesheet');
        //return view('pages.timesheet', compact('title'));
        return view('pages.timesheet')->with('title', $title);
    }
}
