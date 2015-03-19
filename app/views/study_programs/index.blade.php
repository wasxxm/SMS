@extends('layouts.default')

@section('the_title')
<title>{{ trans('text.manage_study_programs') }}</title>
@stop

@section('body_title')
<h3 class="page-title"> {{ trans('text.study_programs') }} <small>{{ trans('text.manage_study_programs') }}</small> </h3>
@stop

@section('breadcrumb', Breadcrumbs::render('study_programs', $study_programs))

@section('content')
<div class="col-md-12"> 
  <!-- BEGIN EXAMPLE TABLE PORTLET-->
  <div class="portlet box grey-cascade">
    <div class="portlet-title">
      <div class="caption">{{ trans('text.study_programs') }} </div>
      <div class="tools"> <a href="javascript:;" class="collapse"> </div>
    </div>
    <div class="portlet-body">
      <div class="table-toolbar">
        <div class="row">
          <div class="col-md-6">
            <div class="btn-group"> @if(check_permission('create_study_program'))<a id="sample_editable_1_new" class="btn green" href="{{ url('study_programs/create') }}"> {{ trans('text.add_study_program') }} <i class="fa fa-plus"></i> </a>@else <a href=""></a> @endif </div>
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
      @if ($study_programs->count())
      <table class="table table-striped table-bordered table-hover" id="users">
        <thead>
          <tr>
            <th width="100"> {{ SortableTrait::link_to_sorting_action('study_program_id', trans('text.id')) }} </th>
            <th> {{ SortableTrait::link_to_sorting_action('study_program_name', trans('text.name')) }} </th>
            <th> {{ trans('text.department') }} </th>
            @if(check_permission('edit_study_program'))
            <th> {{ trans('text.edit') }} </th>
            @endif
             @if(check_permission('delete_study_program'))
            <th> {{ trans('text.delete') }} </th>
            @endif </tr>
        </thead>
        <tbody>
        
        @foreach ($study_programs as $study_program)
        <tr class="odd gradeX">
          <td> {{ $study_program->study_program_id }} </td>
          <td> {{ link_to("study_programs/{$study_program->study_program_id}", $study_program->study_program_name) }} </td>
          <td> {{ link_to("departments/{$study_program->department->department_id}", $study_program->department->department_name) }} </td>
          @if(check_permission('edit_study_program'))
          <td> {{ link_to("study_programs/{$study_program->study_program_id}/edit", trans('text.edit')) }} </td>
          @endif
           @if(check_permission('delete_study_program'))
          <td> {{ link_to("study_programs/{$study_program->study_program_id}/delete", trans('text.delete')) }} </td>
          @endif
           </tr>
        @endforeach
          </tbody>
        
      </table>
      {{$study_programs->appends(Request::except('page'))->links()}}
      @else
      <p>{{ trans('text.no_study_program_added') }}</p>
      @endif </div>
  </div>
  <!-- END EXAMPLE TABLE PORTLET--> 
</div>
@stop