<?php

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

//app()->bind('example', function (){
//    return new \App\Example;
//});
//app()->singleton('example', function (){
/*app()->singleton('App\Example', function (){
//    dd('called');
    return new \App\Example;
});*/
//app()->singleton('twitter', function (){
app()->singleton('App\Services\Twitter', function (){
//    return new Twitter(config('services.twitter.api_key'));
//    return new \App\Services\Twitter(config('services.twitter.api_key'));
    return new \App\Services\Twitter('random_string');
});
//Route::get('/', 'PagesController@home');
Route::get('/', function (){
//    dd(app(Filesystem::class));
//    dd(app('example'), app('example'));
    dd(app('App\Example'));
});
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');

Route::resource('/projects', 'ProjectsController');
//Route::patch('/tasks/{task}', 'ProjectTasksController@update');
//Route::post('/tasks', 'ProjectTasksController@store');    // need to pass params via hidden or see lower
Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');

Route::post('/completed-tasks/{task}', 'CompletedTasksController@store');
Route::delete('/completed-tasks/{task}', 'CompletedTasksController@destroy');
