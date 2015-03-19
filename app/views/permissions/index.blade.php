@extends('layouts.default')

@section('the_title')
<title>{{ trans('text.manage_permission_sets') }}</title>
@stop

@section('body_title')
<h3 class="page-title"> {{ trans('text.permission_sets') }} <small>{{ trans('text.manage_permission_sets') }}</small> </h3>
@stop

@section('breadcrumb', Breadcrumbs::render('permission_sets', $permission_sets))

@section('content')
<div class="col-md-12"> 
  <!-- BEGIN EXAMPLE TABLE PORTLET-->
  <div class="portlet box grey-cascade">
    <div class="portlet-title">
      <div class="caption">{{ trans('text.permission_sets') }} </div>
      <div class="tools"> <a href="javascript:;" class="collapse"> </div>
    </div>
    <div class="portlet-body">
      <div class="table-toolbar">
        <div class="row">
          <div class="col-md-6">
            <div class="btn-group"> @if(check_permission('create_permission_set'))<a id="sample_editable_1_new" class="btn green" href="{{ url('permissions/create') }}"> {{ trans('text.add_permission_set') }} <i class="fa fa-plus"></i> </a>@else <a href=""></a> @endif </div>
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
      @if ($permission_sets->count())
      <table class="table table-striped table-bordered table-hover" id="users">
        <thead>
          <tr>
            <th width="100"> {{ SortableTrait::link_to_sorting_action('permission_set_id', trans('text.id')) }} </th>
            <th> {{ SortableTrait::link_to_sorting_action('permission_set_name', trans('text.name')) }} </th>
            <th> {{ trans('text.permissions') }} </th>
            <th> {{ trans('text.departments') }} </th>
            <th> {{ trans('text.users') }} </th>
            @if(check_permission('edit_permission_set'))
            <th> {{ trans('text.edit') }} </th>
            @endif
             @if(check_permission('delete_permission_set'))
            <th> {{ trans('text.delete') }} </th>
            @endif </tr>
        </thead>
        <tbody>
        
        @foreach ($permission_sets as $permission_set)
        <tr class="odd gradeX">
          <td> {{ $permission_set->permission_set_id }} </td>
          <td> {{ link_to("permissions/{$permission_set->permission_set_id}", $permission_set->permission_set_name) }} </td>
          <td> {{ Permission::get_str($permission_set->permission_ids) }} </td>
          <td> {{ $permission_set->departments_count }} </td>
          <td> {{ $permission_set->users_count }} </td>
          @if(check_permission('edit_permission_set'))
          <td> {{ link_to("permissions/{$permission_set->permission_set_id}/edit", trans('text.edit')) }} </td>
          @endif
           @if(check_permission('delete_permission_set'))
          <td> {{ link_to("permissions/{$permission_set->permission_set_id}/delete", trans('text.delete')) }} </td>
          @endif
           </tr>
        @endforeach
          </tbody>
        
      </table>
      {{$permission_sets->appends(Request::except('page'))->links()}}
      @else
      <p>{{ trans('text.no_permission_set_added') }}</p>
      @endif </div>
  </div>
  <!-- END EXAMPLE TABLE PORTLET--> 
</div>
@stop