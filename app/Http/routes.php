<?php
/*Event::listen('illuminate.query', function($query)
{
var_dump($query);
});*/

Route::get('/', 'HomeController@index');
Route::get('about', 'HomeController@about');
Route::get('contact', 'HomeController@contact');
Route::get('post/{slug}', 'HomeController@post');
Route::post('create-comment', 'HomeController@createComment');
Route::get('filter/{rule}/{slug}', 'HomeController@filter');


Route::group(['middleware'=>'auth'],function(){
	Route::get('auth/logout', 'Auth\AuthController@getLogout');



	Route::group(['prefix'=>'admin','middleware'=>'admin'], function(){

	Route::get('/', 'Admin\AdminController@index');
		
		//category resource
		Route::resource('category', 'Admin\CategoryController');

		//posts resource
		Route::resource('post', 'Admin\PostController');

		//comments resource
		Route::resource('comment', 'Admin\CommentController');

		//userss resource
		Route::resource('user', 'Admin\UserController');

		//tags resource
		Route::resource('tag', 'Admin\TagController',['only' => ['index', 'show','destroy']]);
	});


});





Route::group(['middleware'=>'guest'], function(){
	// Authentication routes...
	Route::get('auth/login', 'Auth\AuthController@getLogin');
	Route::post('auth/login', 'Auth\AuthController@postLogin');
});
