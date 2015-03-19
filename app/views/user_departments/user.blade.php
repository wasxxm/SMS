@extends('layouts.default')

@section('the_title')
<title>{{ trans('text.manage_user_departments') }}</title>
@stop

@section('body_title')
<h3 class="page-title"> {{ trans('text.user_departments') }} <small>{{ trans('text.manage_user_departments') }}</small> </h3>
@stop

@section('breadcrumb', Breadcrumbs::render('user_departments', $user_departments))

@section('content')
<div class="col-md-12"> 
  <!-- BEGIN EXAMPLE TABLE PORTLET-->
  <div class="portlet box grey-cascade">
    <div class="portlet-title">
      <div class="caption">{{ trans('text.departments') }} </div>
      <div class="tools"> <a href="javascript:;" class="collapse"> </div>
    </div>
    <div class="portlet-body">
      <div class="table-toolbar">
        <div class="row">
          <div class="col-md-6">
            <div class="btn-group"> @if(check_permission('manage_user_departments'))<a id="sample_editable_1_new" class="btn green" href="{{ url('users/departments/create') }}"> {{ trans('text.add_user_department') }} <i class="fa fa-plus"></i> </a>@else <a href=""></a> @endif </div>
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
      @if ($user_departments->count())
      <table class="table table-striped table-bordered table-hover" id="users">
        <thead>
          <tr>
            <th> {{ SortableTrait::link_to_sorting_action('department_id', trans('text.department_name')) }} </th>
             @if(check_permission('manage_user_departments'))
            <th> {{ trans('text.delete') }} </th>
            @endif </tr>
        </thead>
        <tbody>
        
        @foreach ($user_departments as $user_department)
        <tr class="odd gradeX">
          <td> {{ link_to("departments/{$user_department->department_id}", $user_department->department->department_name, ['target' => '_blank']) }} </td>
           @if(check_permission('manage_user_departments'))
          <td> {{ link_to("users/departments/{$user_department->user_department_id}/delete", trans('text.delete')) }} </td>
          @endif
           </tr>
        @endforeach
          </tbody>
        
      </table>
      {{$user_departments->appends(Request::except('page'))->links()}}
      @else
      <p>{{ trans('text.no_department_added') }}</p>
      @endif </div>
  </div>
  <!-- END EXAMPLE TABLE PORTLET--> 
</div>
@stop