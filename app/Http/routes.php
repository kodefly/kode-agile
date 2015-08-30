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

Route::get('/', ['as' => 'home', function() {
    return redirect()->route('projects.index');
}]);


Route::get('projects/{projects}/backlogs', [
    'as'   => 'projects.backlogs.index',
    'uses' => 'ProjectsController@backlogs',
]);

Route::post('backlogs', [
    'as'   => 'backlogs.store',
    'uses' => 'BacklogsController@store',
]);

Route::post('comments', [
    'as' => 'comments.store',
    'uses' => 'CommentsController@store',
]);

Route::resource('backlogs.sprints', 'BacklogsSprintsController', [
    'except' => ['index', 'destroy', 'update', 'edit']
]);

Route::resource('projects', 'ProjectsController', [
    'except' => ['show', 'destroy']
]);



Route::get('unauthorized', function() {
    return view('auth.unauthorized');
});


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');



