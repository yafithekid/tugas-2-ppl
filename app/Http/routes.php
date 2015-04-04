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

//Route::get('/', 'WelcomeController@index');

Route::get('/admin',['as'=>'home.admin','uses'=>'WelcomeController@index']);
Route::get('/',['as'=>'home','uses'=>'HomeController@index']);


Route::group(['namespace'=>'Auth'],function(){
    Route::get('/login',['as'=>'login','uses'=>'AuthController@getLogin']);
    Route::post('/login',['as'=>'login.submit','uses'=>'AuthController@postLogin']);
    Route::get('/logout',['as'=>'logout','uses'=>'AuthController@getLogout']);
});
Route::group(['prefix'=>'izin','namespace'=>'Izin'],function(){
    //CRUD untuk pengguna
    Route::group(['prefix'=>'pengguna'],function(){
        Route::get('/index',['as'=>'izin.pengguna.index','uses'=>'PenggunaController@getIndex']);
        Route::get('/create',['as'=>'izin.pengguna.create','uses' => 'PenggunaController@getCreate']);
        Route::post('/create',['as'=>'izin.pengguna.create.submit','uses' => 'PenggunaController@postCreate']);
        Route::get('/read',['as'=>'izin.pengguna.read','uses'=>'PenggunaController@getRead']);
    });
    //CRUD untuk admin
    Route::group(['prefix'=>'admin'],function(){
        Route::get('/index',['as'=>'izin.admin.index','uses'=>'AdminController@getIndex']);
    });
    //ubah jenis izin
    Route::group(['prefix'=>'jenis'],function(){
        Route::get('/create',['as'=>'izin.jenis.create','uses'=>'JenisController@getCreate']);
        Route::post('/create',['as'=>'izin.jenis.create.submit','uses'=>'JenisController@postCreate']);
        Route::get('/{id}/update',['as'=>'izin.jenis.update','uses'=>'JenisController@getUpdate']);
        Route::post('/{id}/update',['as'=>'izin.jenis.update.submit','uses'=>'JenisController@postUpdate']);
        Route::get('/{id}/delete',['as'=>'izin.jenis.delete','uses'=>'JenisController@getDelete']);
        Route::get('/{id}/read',['as'=>'izin.jenis.read','uses'=>'JenisController@getRead']);
        Route::get('/',['as'=>'izin.jenis.index','uses'=>'JenisController@getIndex']);
    });

    //ubah status izin
    Route::group(['prefix'=>'status'],function(){
        Route::get('/create',['as'=>'izin.status.create','uses'=>'StatusController@getCreate']);
        Route::post('/create',['as'=>'izin.status.create.submit','uses'=>'StatusController@postCreate']);
        Route::get('/{id}/update',['as'=>'izin.status.update','uses'=>'StatusController@getUpdate']);
        Route::post('/{id}/update',['as'=>'izin.status.update.submit','uses'=>'StatusController@postUpdate']);
        Route::get('/{id}/delete',['as'=>'izin.status.delete','uses'=>'StatusController@getDelete']);
        Route::get('/{id}/read',['as'=>'izin.status.read','uses'=>'StatusController@getRead']);
        Route::get('/',['as'=>'izin.status.index','uses'=>'StatusController@getIndex']);
    });
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
