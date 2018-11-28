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
Route::get('/posts', 'PostsController@index');
Route::get('/posts/create', 'CreatePostController@create');
Route::get('/posts/{id}', 'PostsController@show');
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
