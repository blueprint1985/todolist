<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/notes', 'NoteController@index');
Route::get('/notes/{id}', 'NoteController@edit');
Route::delete('/notes', 'NoteController@destroy');
Route::put('/notes', 'NoteController@store');
Route::post('/notes', 'NoteController@update');

Route::get('/projects', 'ProjectController@index');
Route::get('/users', 'UserController@index');

Route::get('/test', function () {
    return view('test');
});

Route::get('/phpinfo', function () {
    return view(phpinfo());
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

