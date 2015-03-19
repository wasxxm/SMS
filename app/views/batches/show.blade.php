@extends('layouts.default')

@section('the_title')
@if(isset($batch) && $batch->count())
<title>{{ trans('text.view_batch_single') }} {{ $batch->batch_name }}</title>
@else
<title>{{ trans('text.batch_not_found') }}</title>
@endif
@stop

@section('body_title')
@if(isset($batch) && $batch->count())
<h3 class="page-title"> {{ trans('text.view_batch_single') }} {{ $batch->batch_name }} </h3>
@else
<h3 class="page-title"> {{ trans('text.batch_not_found') }} </h3>
@endif
@stop

@if(isset($batch) && $batch->count())
   @section('breadcrumb', Breadcrumbs::render('show_batch', $batch))
@endif

@section('content')
<div class="col-md-12">
<!-- BEGIN EXAMPLE TABLE PORTLET--> 
@if(isset($batch) && $batch->count())
<div class="portlet gren">
  <div class="portlet-title">
    <div class="caption">{{ trans('text.batch') }} - {{$batch->batch_name}} </div>
    <div class="actions"> @if(check_permission('edit_batch')) <a href='{{ url("batchs/$batch->batch_id/edit") }}' class="btn btn-default btn-sm"> <i class="fa fa-pencil"></i> {{ trans('text.edit_batch') }} </a> @endif
      @if(check_permission('delete_batch')) <a href='{{ url("batchs/{$batch->batch_id}/delete") }}'  class="btn red btn-sm"> {{ trans('text.delete') }}</a> @endif </div>
  </div>
  <div class="portlet-body">
    <table class="table table-striped table-bordered table-hover" id="view-user">
      <tbody>
        <tr>
          <td width="106">{{ trans('text.batch_name') }}</td>
          <td width="330"><strong>{{$batch->batch_name}}</strong></td>
        </tr>
        <tr>
          <td width="106">{{ trans('text.batch_start_date') }}</td>
          <td width="330"><strong>{{format_date($batch->batch_start_date)}}</strong></td>
        </tr>
        <tr>
          <td width="106">{{ trans('text.study_program') }}</td>
          <td width="330"><strong>{{ link_to("study_programs/{$batch->study_program->study_program_id}", $batch->study_program->study_program_name) }}</strong></td>
        </tr>
        <tr>
          <td width="106">{{ trans('text.department') }}</td>
          <td width="330"><strong>{{ link_to("departments/{$batch->department->department_id}", $batch->department->department_name) }}</strong></td>
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