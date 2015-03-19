@extends('layouts.default')

@section('the_title')
<title>{{ trans('text.manage_departments') }}</title>
@stop

@section('body_title')
<h3 class="page-title"> {{ trans('text.departments') }} <small>{{ trans('text.manage_departments') }}</small> </h3>
@stop

@section('breadcrumb', Breadcrumbs::render('departments', $departments))

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
            <div class="btn-group"> @if(check_permission('create_department'))<a id="sample_editable_1_new" class="btn green" href="{{ url('departments/create') }}"> {{ trans('text.add_department') }} <i class="fa fa-plus"></i> </a>@else <a href=""></a> @endif </div>
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
      @if ($departments->count())
      <table class="table table-striped table-bordered table-hover" id="users">
        <thead>
          <tr>
            <th width="100"> {{ SortableTrait::link_to_sorting_action('department_id', trans('text.id')) }} </th>
            <th> {{ SortableTrait::link_to_sorting_action('department_name', trans('text.name')) }} </th>
            @if(check_permission('edit_department'))
            <th> {{ trans('text.edit') }} </th>
            @endif
             @if(check_permission('delete_department'))
            <th> {{ trans('text.delete') }} </th>
            @endif </tr>
        </thead>
        <tbody>
        
        @foreach ($departments as $department)
        <tr class="odd gradeX">
          <td> {{ $department->department_id }} </td>
          <td> {{ link_to("departments/{$department->department_id}", $department->department_name) }} </td>
          @if(check_permission('edit_department'))
          <td> {{ link_to("departments/{$department->department_id}/edit", trans('text.edit')) }} </td>
          @endif
           @if(check_permission('delete_department'))
          <td> {{ link_to("departments/{$department->department_id}/delete", trans('text.delete')) }} </td>
          @endif
           </tr>
        @endforeach
          </tbody>
        
      </table>
      {{$departments->appends(Request::except('page'))->links()}}
      @else
      <p>{{ trans('text.no_department_added') }}</p>
      @endif </div>
  </div>
  <!-- END EXAMPLE TABLE PORTLET--> 
</div>
@stop