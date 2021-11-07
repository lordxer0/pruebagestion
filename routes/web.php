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

Auth::routes();

Route::group(['middleware' => ['auth']],function(){

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/home', 'HomeController@index')->name('home');

    //zona recursos
    //lista de recursos
    Route::get('/resource', 'ResourceController@index')->name('resource');
    Route::get('/resource/list', 'ResourceController@index')->name('resource.list');
    
    //agregado de recursos
    Route::get('/resource/add', 'ResourceController@add')->name('resource.add');
    Route::post('/resource/add', 'ResourceController@add')->name('resource.add');
    // termina zona recursos

    //zona usuarios
    //lista de usuarios
    Route::get('/user', 'UserController@index')->name('user');
    Route::get('/user/list', 'UserController@index')->name('user.list');

    //termina zona usuarios

    //zona asignacion
    //
    Route::get('/resourcexuser', 'ResourceUserController@index')->name('resourcexuser');
    

    Route::get('/resourcexuser/add', 'ResourceUserController@add')->name('resourcexuser.add');
    Route::post('/resourcexuser/add', 'ResourceUserController@add')->name('resourcexuser.add');
    Route::post('/resourcexuser/selectResource', 'ResourceUserController@selectResource')->name('resourcexuser.selectResource');
    
    Route::get('/resourcexuser/historical', 'ResourceUserController@historical')->name('resourcexuser.hist');
    Route::post('/resourcexuser/tableHistorical', 'ResourceUserController@resourceHistorical')->name('resourcexuser.tableHistorical');

});
