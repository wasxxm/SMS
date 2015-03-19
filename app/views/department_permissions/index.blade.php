@extends('layouts.default')

@section('the_title')
<?php $department_permissions->department_name = Department::find($department_id)->pluck('department_name'); ?>
<title>{{ Lang::get('text.department_permissions2', ['name' => $department_permissions->department_name]) }}</title>
@stop

@section('body_title')
<h3 class="page-title"> {{ Lang::get('text.department_permissions2', ['name' => $department_permissions->department_name]) }} <small>{{ trans('text.manage_department_permissions') }}</small> </h3>
@stop

@section('breadcrumb', Breadcrumbs::render('show_department_permissions', Department::find($department_id)))

@section('content')
<div class="col-md-12"> 
  <!-- BEGIN EXAMPLE TABLE PORTLET-->
  <div class="portlet box grey-cascade">
    <div class="portlet-title">
      <div class="caption">{{ trans('text.department_permissions') }} </div>
      <div class="tools"> <a href="javascript:;" class="collapse"> </div>
    </div>
    <div class="portlet-body">
      <div class="table-toolbar">
        <div class="row">
          <div class="col-md-6">
            <div class="btn-group"> @if(check_permission('manage_department_permissions'))<a id="sample_editable_1_new" class="btn green" href="{{ url("departments/$department_id/permissions/create") }}"> {{ trans('text.add_department_permission') }} <i class="fa fa-plus"></i> </a>@else <a href=""></a> @endif </div>
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
      @if (isset($department_permissions) && $department_permissions->count())
      <table class="table table-striped table-bordered table-hover" id="departments">
        <thead>
          <tr>
            <th>{{ trans('text.permission_set_id') }}</th>
            <th>{{ trans('text.permission_set_name') }}</th>
             @if(check_permission('manage_department_permissions'))
            <th> {{ trans('text.delete') }} </th>
            @endif </tr>
        </thead>
        <tbody>
        @foreach ($department_permissions as $department_permission)
        <tr class="odd gradeX">
        <td> {{ $department_permission->department_permission_set_id }} </td>
          <td> {{ link_to("permissions/{$department_permission->department_permission_set_id}", $department_permission->permissionset->permission_set_name, ['target' => '_blank']) }} </td>
           @if(check_permission('manage_department_permissions'))
          <td> {{ link_to("departments/{$department_permission->department_id}/permissions/{$department_permission->department_permission_set_id}/delete", trans('text.delete')) }} </td>
          @endif
           </tr>
        @endforeach
          </tbody>
        
      </table>
      
      @else
      <p>{{ trans('text.no_department_permission_added') }}</p>
      @endif </div>
  </div>
  <!-- END EXAMPLE TABLE PORTLET--> 
</div>
@stop