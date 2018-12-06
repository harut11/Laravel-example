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
Route::get('/', 'HomeController@index');
Route::get('/posts', 'PostController@index');
Route::post('/posts', 'PostController@store');
Route::get('/posts/create', 'PostController@create')->middleware('lang');
Route::get('/posts/{id}', 'PostController@show');
Route::get('/posts/edit/{id}', 'PostController@edit');
Route::post('/posts/update/{id}', 'PostController@update');
Route::get('/posts/destroy/{id}', 'PostController@destroy');

Route::get('change-language/{code}', 'PostController@changeLanguage');
//Route::get('/tasks', function () {
	//$tasks = DB::table('tasks')->get();
	//$tasks = App\Task::all();
//	$tasks = App\Task::incomplete();
//    return view('tasks.index', compact('tasks'));
//});

//Route::get('/tasks/{task}', function ($id) {
	//$task = DB::table('tasks')->find($id);
//	$task = App\Task::find($id);
//    return view('tasks.show', compact('task'));
//});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
