<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware'=>['auth','web']],function()
	{
Route::resource('/library','BookController');
Route::resource('/category','CategoryController',['except'=>['create']]);
Route::resource('/tag','TagController', ['except' => ['create']]);
Route::get('/file/{id}','BookController@getBook');	
Route::get('/dashboard',function()
	{
		echo 'You have Access!!!';
	})->middleware('isAdmin');	
	});

Route::get('/unauthorized',function()
	{
	return view('unauthorized');
});
Auth::routes();

Route::get('/home', 'HomeController@index');
