@extends('layouts.default')

@section('the_title')
@if(isset($study_program) && $study_program->count())
<title>{{ trans('text.view_study_program') }} {{ $study_program->study_program_name }}</title>
@else
<title>{{ trans('text.study_program_not_found') }}</title>
@endif
@stop

@section('body_title')
@if(isset($study_program) && $study_program->count())
<h3 class="page-title"> {{ trans('text.view_study_program') }} {{ $study_program->study_program_name }} </h3>
@else
<h3 class="page-title"> {{ trans('text.study_program_not_found') }} </h3>
@endif
@stop

@if(isset($study_program) && $study_program->count())
   @section('breadcrumb', Breadcrumbs::render('show_study_program', $study_program))
@endif

@section('content')
<div class="col-md-12">
<!-- BEGIN EXAMPLE TABLE PORTLET--> 
@if(isset($study_program) && $study_program->count())
<div class="portlet gren">
  <div class="portlet-title">
    <div class="caption">{{ trans('text.study_program') }} - {{$study_program->study_program_name}} </div>
    <div class="actions"> @if(check_permission('edit_study_program')) <a href='{{ url("study_programs/$study_program->study_program_id/edit") }}' class="btn btn-default btn-sm"> <i class="fa fa-pencil"></i> {{ trans('text.edit_study_program') }} </a> @endif
      @if(check_permission('delete_study_program')) <a href='{{ url("study_programs/{$study_program->study_program_id}/delete") }}'  class="btn red btn-sm"> {{ trans('text.delete') }}</a> @endif </div>
  </div>
  <div class="portlet-body">
    <table class="table table-striped table-bordered table-hover" id="view-user">
      <tbody>
        <tr>
          <td width="106">{{ trans('text.study_program_name') }}</td>
          <td width="330"><strong>{{$study_program->study_program_name}}</strong></td>
        </tr>
        <tr>
          <td width="106">{{ trans('text.study_program_duration') }}</td>
          <td width="330"><strong>{{$study_program->study_program_duration}}</strong></td>
        </tr>
        <tr>
          <td width="106">{{ trans('text.study_program_department') }}</td>
          <td width="330"><strong>{{$study_program->department->department_name}}</strong></td>
        </tr>
        <tr>
          <td width="106">{{ trans('text.study_program_description') }}</td>
          <td width="330"><strong>{{$study_program->study_program_desc}}</strong></td>
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