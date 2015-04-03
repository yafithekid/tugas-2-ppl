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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::group(['prefix'=>'izin','namespace'=>'Izin'],function(){
    Route::group(['prefix'=>'jenis'],function(){
        Route::get('/create',['as'=>'izin.jenis.create','uses'=>'JenisController@getCreate']);
        Route::post('/create',['as'=>'izin.jenis.create.submit','uses'=>'JenisController@postCreate']);
        Route::get('/{id}/update',['as'=>'izin.jenis.update','uses'=>'JenisController@getUpdate']);
        Route::post('/{id}/update',['as'=>'izin.jenis.update.submit','uses'=>'JenisController@postUpdate']);
        Route::get('/{id}/delete',['as'=>'izin.jenis.delete','uses'=>'JenisController@getDelete']);
        Route::get('/{id}/read',['as'=>'izin.jenis.read','uses'=>'JenisController@getRead']);
        Route::get('/',['as'=>'izin.jenis.index','uses'=>'JenisController@getIndex']);
    });
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
