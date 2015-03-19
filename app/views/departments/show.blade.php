@extends('layouts.default')

@section('the_title')
@if(isset($department) && $department->count())
<title>{{ trans('text.view_department') }} {{ $department->department_name }}</title>
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
    <div class="actions"> @if(check_permission('edit_department')) <a href='{{ url("departments/$department->department_id/edit") }}' class="btn btn-default btn-sm"> <i class="fa fa-pencil"></i> {{ trans('text.edit_department') }} </a> @endif
@if(check_permission('delete_department')) <a href='{{ url("departments/{$department->department_id}/delete") }}'  class="btn red btn-sm"> {{ trans('text.delete') }}</a> @endif 
    
    </div>
  </div>
  <div class="portlet-body">
    <table class="table table-striped table-bordered table-hover" id="view-user">
      <tbody>
        <tr>
          <td width="106">{{ trans('text.department_name') }}</td>
          <td width="330"><strong>{{$department->department_name}}</strong></td>
        </tr>
        <tr>
          <td width="106">{{ trans('text.study_programs') }}</td>
          <td width="330"><strong>
          <?php
		  $study_programs = StudyProgram::where('department_id', $department->department_id);
		  ?>
          @if ($study_programs->count())
          <?php
          $study_programs = $study_programs->get();
		  ?>
              @foreach ($study_programs as $study_program)
             <a class="btn default blue-stripe" target="_blank" style="margin-top:8px" href='{{ url("study_programs/{$study_program->study_program_id}") }}'>{{ $study_program->study_program_name }}</a> 
             @endforeach
          @else
          {{ trans('text.no_sp_assigned') }}       
          @endif
          </strong></td>
        </tr>
        <tr>
          <td width="106">{{ trans('text.department_desc') }}</td>
          <td width="330"><strong>{{$department->department_desc}}</strong></td>
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