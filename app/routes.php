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
})->before('auth');

// login session
Route::get('login', 'SessionController@create');
Route::get('logout', 'SessionController@destroy');
Route::resource('session', 'SessionController');

// forgot password
Route::controller('password', 'RemindersController');

// user departments
Route::get("users/{user_id}/departments/{department_id}/delete", 'UserDepartmentsController@delete');
Route::resource("users/{user_id}/departments", 'UserDepartmentsController');

// user permissions
Route::get("users/{user_id}/permissions/{permission_set_id}/delete", 'UserPermissionsController@delete');
Route::resource("users/{user_id}/permissions", 'UserPermissionsController');

// users
Route::get('users/{user_id}/update_status', 'UserController@update_status');
Route::resource('users', 'UserController');

// departments
Route::get("departments/{department_id}/delete", 'DepartmentsController@delete');
Route::resource('departments', 'DepartmentsController');

// study_programs
Route::get("study_programs/{study_program_id}/delete", 'StudyProgramsController@delete');
Route::resource('study_programs', 'StudyProgramsController');

// batches
Route::get("batches/{batch_id}/delete", 'BatchesController@delete');
Route::resource('batches', 'BatchesController');

// permission sets
Route::get("permissions/{permission_set_id}/delete", 'PermissionSetsController@delete');
Route::resource('permissions', 'PermissionSetsController');

// sections
Route::get("sections/{section_id}/delete", 'SectionsController@delete');
Route::resource('sections', 'SectionsController');
