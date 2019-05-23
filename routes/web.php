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
Route::get('/timesheet', 'PagesController@timesheet');

Route::resource('workpackages', 'WorkPackagesController');

Route::resource('projects', 'ProjectsController');


//Route::resource('/', 'ProjectsController');
Route::get('projects/{project_id}', 'ProjectsController@show');
//Route::get('project/{project_id}', function ($id) {
//    echo "test " . $id;
//});
Route::get('projects/create', 'ProjectsController@create');
Route::get('projects', 'ProjectsController@index');
Route::post('projects', 'ProjectsController@store');

Auth::routes();

Route::get('/dashboard', 'DasboardController@index');
