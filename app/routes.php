<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
   return View::make('index');	
});

// companies 
Route::get('departments/{department_id}/delete', 'DepartmentsController@delete');
Route::resource('departments', 'DepartmentsController');


// users
Route::get('users/{user_id}/update_status', 'UserController@update_status');
Route::resource('users', 'UserController');