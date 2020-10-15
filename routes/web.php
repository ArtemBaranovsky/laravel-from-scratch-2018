<?php

use App\Notifications\SubscriptionRenewalFailed;
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

Route::get('/', 'PagesController@home');

// notifications testing
//Route::get('/', function (){
//    $user = App\User::first();
//    $user->notify(new SubscriptionRenewalFailed());
//    return 'Done';
//});

//Route::get('/', function (UserRepository $users){
//    dd($users);
//    return view('welcome');
//});
//Route::get('/', function (Twitter $twitter){
//    dd($twitter);
//    return view('welcome');
//});
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');

//Route::resource('/projects', 'ProjectsController');
Route::resource('/projects', 'ProjectsController')->middleware('can:update,project');
//Route::patch('/tasks/{task}', 'ProjectTasksController@update');
//Route::patch('/tasks/{task}', 'ProjectTasksController@update')->middleware('auth')->except(['show']);
//Route::post('/tasks', 'ProjectTasksController@store');    // need to pass params via hidden or see lower
Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');

Route::post('/completed-tasks/{task}', 'CompletedTasksController@store');
Route::delete('/completed-tasks/{task}', 'CompletedTasksController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
//Route::get('/signup', 'HomeController@index')->name('home')->middleware('guest');
