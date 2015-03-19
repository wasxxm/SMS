@extends('layouts.default')

@section('the_title')
<title>{{ trans('text.manage_batches') }}</title>
@stop

@section('body_title')
<h3 class="page-title"> {{ trans('text.batches') }} <small>{{ trans('text.manage_batches') }}</small> </h3>
@stop

@section('breadcrumb', Breadcrumbs::render('batches', $batches))

@section('content')
<div class="col-md-12"> 
  <!-- BEGIN EXAMPLE TABLE PORTLET-->
  <div class="portlet box grey-cascade">
    <div class="portlet-title">
      <div class="caption">{{ trans('text.batches') }} </div>
      <div class="tools"> <a href="javascript:;" class="collapse"> </div>
    </div>
    <div class="portlet-body">
      <div class="table-toolbar">
        <div class="row">
          <div class="col-md-6">
            <div class="btn-group"> @if(check_permission('create_batch'))<a id="sample_editable_1_new" class="btn green" href="{{ url('batches/create') }}"> {{ trans('text.add_batch') }} <i class="fa fa-plus"></i> </a>@else <a href=""></a> @endif </div>
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
      @if ($batches->count())
      <table class="table table-striped table-bordered table-hover" id="users">
        <thead>
          <tr>
            <th width="100"> {{ SortableTrait::link_to_sorting_action('batch_id', trans('text.id')) }} </th>
            <th> {{ SortableTrait::link_to_sorting_action('batch_name', trans('text.name')) }} </th>
            <th> {{ SortableTrait::link_to_sorting_action('batch_start_date', trans('text.start_date')) }} </th>
            <th> {{ trans('text.study_program') }} </th>
            <th> {{ trans('text.department') }} </th>
            @if(check_permission('edit_batch'))
            <th> {{ trans('text.edit') }} </th>
            @endif
             @if(check_permission('delete_batch'))
            <th> {{ trans('text.delete') }} </th>
            @endif </tr>
        </thead>
        <tbody>
        
        @foreach ($batches as $batch)
        <tr class="odd gradeX">
          <td> {{ $batch->batch_id }} </td>
          <td> {{ link_to("batches/{$batch->batch_id}", $batch->batch_name) }} </td>
          <td> {{ format_date($batch->batch_start_date) }} </td>
          <td> 
          @if ($batch->studyprogram)
          {{ link_to("study_programs/{$batch->study_program->study_program_id}", $batch->study_program->study_program_name) }}
          @else
          ---
          @endif
           </td>
          <td> 
          @if ($batch->department)
          {{ link_to("departments/{$batch->department->department_id}", $batch->department->department_name) }}
           @else
          ---
          @endif
           </td>
          @if(check_permission('edit_batch'))
          <td> {{ link_to("batches/{$batch->batch_id}/edit", trans('text.edit')) }} </td>
          @endif
           @if(check_permission('delete_batch'))
          <td> {{ link_to("batches/{$batch->batch_id}/delete", trans('text.delete')) }} </td>
          @endif
           </tr>
        @endforeach
          </tbody>
        
      </table>
      {{$batches->appends(Request::except('page'))->links()}}
      @else
      <p>{{ trans('text.no_batch_added') }}</p>
      @endif </div>
  </div>
  <!-- END EXAMPLE TABLE PORTLET--> 
</div>
@stop