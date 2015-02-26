@extends('layouts.default')

@section('the_title')
@if(isset($department) && $department->count())
<title>{{ trans('text.department') }} {{ $department->department_name }} {{ trans('text.details') }}</title>
@else
<title>{{ trans('text.department_not_found') }}</title>
@endif
@stop

@section('body_title')
@if(isset($department) && $department->count())
<h3 class="page-title"> {{ trans('text.view_department') }} {{ $department->department_name }} </h3>
@else
<h3 class="page-title"> {{ trans('text.department_not_found') }} </h3>
@endif
@stop

@if(isset($department) && $department->count())
   @section('breadcrumb', Breadcrumbs::render('show_department', $department))
@endif

@section('content')
<div class="col-md-12">
<!-- BEGIN EXAMPLE TABLE PORTLET--> 
@if(isset($department) && $department->count())
<div class="portlet gren">
  <div class="portlet-title">
    <div class="caption">{{ trans('text.department') }} - {{$department->department_name}} </div>
    <div class="actions"> <a href='{{ url("companies/$department->department_id/edit") }}' class="btn btn-default btn-sm"> <i class="fa fa-pencil"></i> {{ trans('text.edit_department') }} </a> 

    <a href='{{ url("companies/{$department->department_id}/update_status") }}'  class="btn {{ ($department->department_status) ? 'red' : 'green' }} btn-sm"> {{ ($department->department_status) ? trans('text.disable'):trans('text.activate') }}</a>
    
    </div>
  </div>
  <div class="portlet-body">
    <table class="table table-striped table-bordered table-hover" id="view-department">
      <tbody>
        <tr class="odd gradeX">
          <td width="106">Department Name</td>
          <td width="330"><strong>{{$department->department_name}}</strong></td>
        </tr>
        <tr>
          <td>Department Description</td>
          <td><strong>{{$department->department_desc}}</strong></td>
        </tr>
      </tbody>
    </table>
  </div>
  @else
  <p>{{ trans('text.try_diff_keyword') }}</p>
  @endif 
  <!-- END EXAMPLE TABLE PORTLET--> 
</div>
@stop