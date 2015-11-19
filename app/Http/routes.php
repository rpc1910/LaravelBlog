<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'BlogController@index');

Route::get('/post/{id}', "BlogController@post");

Route::group(['prefix' => 'auth'], function(){
	Route::get('login', 'Auth\AuthController@getLogin');
	Route::post('login', 'Auth\AuthController@postLogin');

	Route::get('logout', 'Auth\AuthController@getLogout');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
	// Route::get('', 'Auth\AuthController@getLogin');
	Route::group(['prefix' => 'posts'], function(){
		Route::get('', ['as' => 'admin.posts.index', 'uses' => 'PostsAdminController@index']);
		Route::get('inserir', ['as' => 'admin.posts.create', 'uses' => 'PostsAdminController@create']);
		Route::post('salvar', ['as' => 'admin.posts.salvar', 'uses' => 'PostsAdminController@salvar']);

		Route::get('editar/{id}', ['as' => 'admin.posts.editar', 'uses' => 'PostsAdminController@editar']);
		Route::put('atualizar/{id}', ['as' => 'admin.posts.atualizar', 'uses' => 'PostsAdminController@atualizar']);


		Route::get('apagar/{id}', ['as' => 'admin.posts.apagar', 'uses' => 'PostsAdminController@apagar']);
	});
});


// Rotas administrativas