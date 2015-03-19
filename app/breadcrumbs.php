<?php

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
       $breadcrumbs->push(trans('text.user') . ' - ' . $user->user_fullname, url("users/$user->user_id"));
	}
});

/*
User Departments Breadcrumbs
*/

Breadcrumbs::register('show_user_departments', function($breadcrumbs, $user = false) {
	
	$breadcrumbs->parent('show_user', $user);
	
	if ($user)
	{
       $breadcrumbs->push(Lang::get('text.user_departments2', array('name' => $user->user_fullname)), url("users/$user->user_id/departments"));
	}
});

Breadcrumbs::register('add_user_department', function($breadcrumbs, $user = false) {
	
	$breadcrumbs->parent('show_user_departments', $user);
    
	$breadcrumbs->push(trans('text.add_user_department'), route('users.{user_id}.departments.create'));
});


/*
User Permissions Breadcrumbs
*/

Breadcrumbs::register('show_user_permissions', function($breadcrumbs, $user = false) {
	
	$breadcrumbs->parent('show_user', $user);
	
	if ($user)
	{
       $breadcrumbs->push(Lang::get('text.user_permissions2', array('name' => $user->user_fullname)), url("users/$user->user_id/permissions"));
	}
});

Breadcrumbs::register('add_user_permission', function($breadcrumbs, $user = false) {
	
	$breadcrumbs->parent('show_user_permissions', $user);
    
	$breadcrumbs->push(trans('text.add_user_permission'), route('users.{user_id}.permissions.create'));
});


/*
Departments Breadcrumbs
*/

Breadcrumbs::register('departments', function($breadcrumbs) {
    $breadcrumbs->push(trans('text.departments'), route('departments.index'));
});

Breadcrumbs::register('create_edit_department', function($breadcrumbs, $department = false) {
	$breadcrumbs->parent('departments', trans('text.departments'));
	if ($department)
	{
	   $breadcrumbs->push(trans('text.edit_department'), route('departments.edit'));	
	}
	else
	{
       $breadcrumbs->push(trans('text.create_department'), route('departments.create'));
	}
});

Breadcrumbs::register('show_department', function($breadcrumbs, $department = false) {
	$breadcrumbs->parent('departments', trans('text.departments'));
	if ($department)
	{
       $breadcrumbs->push(trans('text.department') . ' - ' . $department->department_name, url("departments/$department->department_id"));
	}
});


/*
Permission Sets Breadcrumbs
*/

Breadcrumbs::register('permission_sets', function($breadcrumbs) {
    $breadcrumbs->push(trans('text.permission_sets'), route('permissions.index'));
});

Breadcrumbs::register('create_edit_permission_set', function($breadcrumbs, $permission_set = false) {
	$breadcrumbs->parent('permission_sets', trans('text.permission_sets'));
	if ($permission_set)
	{
	   $breadcrumbs->push(trans('text.edit_permission_set'), route('permissions.edit'));	
	}
	else
	{
       $breadcrumbs->push(trans('text.create_permission_set'), route('permissions.create'));
	}
});

Breadcrumbs::register('show_permission_set', function($breadcrumbs, $permission_set = false) {
	$breadcrumbs->parent('permission_sets', trans('text.permission_sets'));
	if ($permission_set)
	{
       $breadcrumbs->push(trans('text.permission_set') . ' - ' . $permission_set->permission_set_name, route('permissions.show'));
	}
});

/*
Study Programs Breadcrumbs
*/

Breadcrumbs::register('study_programs', function($breadcrumbs) {
    $breadcrumbs->push(trans('text.study_programs'), route('study_programs.index'));
});

Breadcrumbs::register('create_edit_study_program', function($breadcrumbs, $study_program = false) {
	$breadcrumbs->parent('study_programs', trans('text.study_programs'));
	if ($study_program)
	{
	   $breadcrumbs->push(trans('text.edit_study_program'), route('study_programs.edit'));	
	}
	else
	{
       $breadcrumbs->push(trans('text.create_study_program'), route('study_programs.create'));
	}
});

Breadcrumbs::register('show_study_program', function($breadcrumbs, $study_program = false) {
	$breadcrumbs->parent('study_programs', trans('text.study_programs'));
	if ($study_program)
	{
       $breadcrumbs->push(trans('text.study_program') . ' - ' . $study_program->study_program_name, url("study_programs/$study_program->study_program_id"));
	}
});

/*
Batches Breadcrumbs
*/

Breadcrumbs::register('batches', function($breadcrumbs) {
    $breadcrumbs->push(trans('text.batches'), route('batches.index'));
});

Breadcrumbs::register('create_edit_batch', function($breadcrumbs, $batch = false) {
	$breadcrumbs->parent('batches', trans('text.batches'));
	if ($batch)
	{
	   $breadcrumbs->push(trans('text.edit_batch'), route('batches.edit'));	
	}
	else
	{
       $breadcrumbs->push(trans('text.create_batch'), route('batches.create'));
	}
});

Breadcrumbs::register('show_batch', function($breadcrumbs, $batch = false) {
	$breadcrumbs->parent('batches', trans('text.batches'));
	if ($batch)
	{
       $breadcrumbs->push(trans('text.batch') . ' - ' . $batch->batch_name, url("batches/$batch->batch_id"));
	}
});



?>