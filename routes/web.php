<?php

use App\Repositories\UserRepository;
use App\Services\Twitter;
use \Illuminate\Filesystem\Filesystem;
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

//Route::get('/', 'PagesController@home');
Route::get('/', function (UserRepository $users){
    dd($users);
    return view('welcome');
});
//Route::get('/', function (Twitter $twitter){
//    dd($twitter);
//    return view('welcome');
//});
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');

Route::resource('/projects', 'ProjectsController');
//Route::patch('/tasks/{task}', 'ProjectTasksController@update');
//Route::post('/tasks', 'ProjectTasksController@store');    // need to pass params via hidden or see lower
Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');

Route::post('/completed-tasks/{task}', 'CompletedTasksController@store');
Route::delete('/completed-tasks/{task}', 'CompletedTasksController@destroy');
