@extends('layouts.default')

@section('the_title')
<title>Manage Departments</title>
@stop

@section('body_title')
<h3 class="page-title"> Departments <small>Manage Departments</small> </h3>
@stop

@section('breadcrumb', Breadcrumbs::render('departments', $departments))

@section('content')
<div class="col-md-12"> 
  <!-- BEGIN EXAMPLE TABLE PORTLET-->
  <div class="portlet box grey-cascade">
    <div class="portlet-title">
      <div class="caption">Departments </div>
      <div class="tools"> <a href="javascript:;" class="collapse"> </div>
    </div>
    <div class="portlet-body">
      <div class="table-toolbar">
        <div class="row">
          <div class="col-md-6">
            <div class="btn-group"> <a id="sample_editable_1_new" class="btn green" href="{{ url('departments/create') }}"> Add Department <i class="fa fa-plus"></i> </a> </div>
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
      <table class="table table-striped table-bordered table-hover" id="departments">
        <thead>
          <tr>
            <th> {{ SortableTrait::link_to_sorting_action('department_id', 'Department ID') }} </th>
            <th> {{ SortableTrait::link_to_sorting_action('department_name', 'Department Name') }} </th>
            <th> {{ trans('text.edit') }} </th>
            <th> {{ trans('text.status') }} </th>
          </tr>
        </thead>
        <tbody>
        
        @foreach ($departments as $department)
        <tr class="odd gradeX">
          <td> {{ $department->department_id }} </td>
          <td> {{ link_to("departments/{$department->department_id}", $department->department_name) }} </td>
          <td> {{ link_to("departments/{$department->department_id}/edit", trans('text.edit')) }} </td>
          <td> {{ link_to("departments/{$department->department_id}/delete", 'Delete') }} </td>
        </tr>
        @endforeach
          </tbody>
        
      </table>
      {{$departments->appends(Request::except('page'))->links()}}
      @else
      <p>No Department Added</p>
      @endif </div>
  </div>
  <!-- END EXAMPLE TABLE PORTLET--> 
</div>
@stop