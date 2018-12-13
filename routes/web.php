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
	Route::group(['prefix' => '', 'as' => 'posts.'], function() {
		Route::get('/{owner?}/{category_slug?}/', 'PostController@index')->name('index')->where(['owner' => 'mine|all']);
		Route::post('/', 'PostController@store')->middleware('auth')->name('store');
		Route::get('create', 'PostController@create')->middleware('auth')->name('create');
		Route::get('{slug}', 'PostController@show')->name('show');
		Route::get('{id}/edit', 'PostController@edit')->name('edit');
		Route::put('{id}', 'PostController@update')->name('update');
		Route::delete('{id}', 'PostController@destroy')->name('delete');
});

	Route::get('profile', 'ProfileController@edit')->name('user.profile')->middleware('auth');
	Route::put('profile', 'ProfileController@update')->name('user.profile')->middleware('auth');
	Auth::routes();
});

Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'admin'], function() {
	Route::group(['prefix' => 'posts', 'as' => 'posts.'], function() {
		Route::get('/', 'PostController@index')->name('index');
		Route::post('/', 'PostController@store')->name('store');
		Route::get('create', 'PostController@create')->name('create');
		Route::get('edit/{id}', 'PostController@edit')->name('edit');
		Route::put('{id}', 'PostController@update')->name('update');
		Route::delete('{id}', 'PostController@destroy')->name('delete');
		Route::get('{id}', 'PostController@show')->name('show');
	});
});

Route::get('change-language/{code}', 'PostController@changeLanguage')->name('change-language');

