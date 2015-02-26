<?php

/*
Companies Breadcrumbs
*/
Breadcrumbs::register('departments', function($breadcrumbs) {
    $breadcrumbs->push('Departments', route('departments.index'));
});

Breadcrumbs::register('create_edit_department', function($breadcrumbs, $department = false) {
	$breadcrumbs->parent('departments', trans('text.departments'));
	if ($department)
	{
	   $breadcrumbs->push('Edit Department', route('departments.edit'));	
	}
	else
	{
       $breadcrumbs->push('Create Department', route('departments.create'));
	}
});

Breadcrumbs::register('show_department', function($breadcrumbs, $department = false) {
	$breadcrumbs->parent('departments', trans('text.departments'));
	if ($department)
	{
       $breadcrumbs->push(trans('text.department') . ' - ' . $department->department_name, route('departments.show'));
	}
});

/*
Users Breadcrumbs
*/

Breadcrumbs::register('users', function($breadcrumbs) {
    $breadcrumbs->push(trans('text.users'), route('users.index'));
});

Breadcrumbs::register('create_edit_user', function($breadcrumbs, $user = false) {
	$breadcrumbs->parent('users', trans('text.users'));
	if ($user)
	{
	   $breadcrumbs->push(trans('text.edit_user'), route('users.edit'));	
	}
	else
	{
       $breadcrumbs->push(trans('text.create_user'), route('users.create'));
	}
});

Breadcrumbs::register('show_user', function($breadcrumbs, $user = false) {
	$breadcrumbs->parent('users', trans('text.users'));
	if ($user)
	{
       $breadcrumbs->push(trans('text.user') . ' - ' . $user->user_fullname, route('users.show'));
	}
});


?>