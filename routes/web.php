<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', 'PagesController@index');



Route::get('timesheet/create', 'TimesheetController@create');
Route::get('timesheet/edit/{ts_id}', 'TimesheetController@edit');
Route::delete('timesheet/destroy', 'TimesheetController@destroy');
Route::put('timesheet/update', 'TimesheetController@update');
Route::get('timesheet', 'TimesheetController@index');
Route::get('timesheet/overview', 'TimesheetController@overview');
Route::get('timesheet/{ts_id}', 'TimesheetController@show');

Route::post('timesheet', 'TimesheetController@store');

Route::get('/profile', 'PagesController@profile');

Route::resource('workpackages', 'WorkPackagesController');

//Route::resource('projects', 'ProjectsController');


//Route::resource('/', 'ProjectsController');

//Route::get('project/{project_id}', function ($id) {
//    echo "test " . $id;
//});
Route::get('projects/create', 'ProjectsController@create');
Route::get('projects/edit/{project_id}', 'ProjectsController@edit');
Route::delete('projects/destroy', 'ProjectsController@destroy');
Route::put('projects/update', 'ProjectsController@update');
Route::get('projects', 'ProjectsController@index');
Route::get('projects/all', 'ProjectsController@all');
Route::get('projects/starred', 'ProjectsController@starred');
Route::get('projects/{project_id}', 'ProjectsController@show');
Route::post('projects', 'ProjectsController@store');


Auth::routes();

Route::get('/dashboard', 'DasboardController@index');
//Route::get('/employees', 'EmployeeController@index');
Route::POST('employees', 'EmployeeController@store');
Route::resources([
    'employees' => 'EmployeeController',
]);

Route::post('upload', 'UploadController@upload');

Route::get('users/{user}',  ['as' => 'users.edit', 'uses' => 'UserController@edit']);
Route::patch('users/{user}/update',  ['as' => 'users.update', 'uses' => 'UserController@update']);