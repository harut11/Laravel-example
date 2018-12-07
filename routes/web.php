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
Route::group(['middleware' => 'lang'], function() {
	Route::group(['prefix' => 'posts'], function() {
		Route::get('/', 'PostController@index')->name('posts.index');
		Route::post('/', 'PostController@store')->middleware('auth')->name('posts.store');
		Route::get('create', 'PostController@create')->middleware('auth')->name('posts.create');
		Route::get('{id}', 'PostController@show')->name('posts.show');
		Route::get('{id}/edit', 'PostController@edit')->name('posts.edit');
		Route::put('{id}', 'PostController@update')->name('posts.update');
		Route::delete('{id}', 'PostController@destroy')->name('posts.delete');
});
	Auth::routes();

});

Route::get('change-language/{code}', 'PostController@changeLanguage')->name('change-language');

