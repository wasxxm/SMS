@extends('layouts.default')

@section('the_title')
<?php $user_permissions->user_fullname = User::find($user_id)->pluck('user_fullname'); ?>
<title>{{ Lang::get('text.user_permissions2', ['name' => $user_permissions->user_fullname]) }}</title>
@stop

@section('body_title')
<h3 class="page-title"> {{ Lang::get('text.user_permissions2', ['name' => $user_permissions->user_fullname]) }} <small>{{ trans('text.manage_user_permissions') }}</small> </h3>
@stop

@section('breadcrumb', Breadcrumbs::render('show_user_permissions', User::find($user_id)))

@section('content')
<div class="col-md-12"> 
  <!-- BEGIN EXAMPLE TABLE PORTLET-->
  <div class="portlet box grey-cascade">
    <div class="portlet-title">
      <div class="caption">{{ trans('text.user_permissions') }} </div>
      <div class="tools"> <a href="javascript:;" class="collapse"> </div>
    </div>
    <div class="portlet-body">
      <div class="table-toolbar">
        <div class="row">
          <div class="col-md-6">
            <div class="btn-group"> @if(check_permission('manage_user_permissions'))<a id="sample_editable_1_new" class="btn green" href="{{ url("users/$user_id/permissions/create") }}"> {{ trans('text.add_user_permission') }} <i class="fa fa-plus"></i> </a>@else <a href=""></a> @endif </div>
          </div>
          <div class="col-md-6">
            <div class="btn-group pull-right">
              <button class="btn dropdown-toggle" data-toggle="dropdown">{{ trans('text.tools') }} <i class="fa fa-angle-down"></i> </button>
              <ul class="dropdown-menu pull-right">
                <li> <a href="#"> {{ trans('text.export_excel') }} </a> </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      @if (isset($user_permissions) && $user_permissions->count())
      <table class="table table-striped table-bordered table-hover" id="users">
        <thead>
          <tr>
            <th>{{ trans('text.permission_set_id') }}</th>
            <th>{{ trans('text.permission_set_name') }}</th>
             @if(check_permission('manage_user_permissions'))
            <th> {{ trans('text.delete') }} </th>
            @endif </tr>
        </thead>
        <tbody>
        @foreach ($user_permissions as $user_permission)
        <tr class="odd gradeX">
        <td> {{ $user_permission->user_permission_set_id }} </td>
          <td> {{ link_to("permissions/{$user_permission->user_permission_set_id}", $user_permission->permissionset->permission_set_name, ['target' => '_blank']) }} </td>
           @if(check_permission('manage_user_permissions'))
          <td> {{ link_to("users/{$user_permission->user_id}/permissions/{$user_permission->user_permission_set_id}/delete", trans('text.delete')) }} </td>
          @endif
           </tr>
        @endforeach
          </tbody>
        
      </table>
      
      @else
      <p>{{ trans('text.no_user_permission_added') }}</p>
      @endif </div>
  </div>
  <!-- END EXAMPLE TABLE PORTLET--> 
</div>
@stop