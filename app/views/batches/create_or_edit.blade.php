@extends('layouts.default')

@section('the_title')
<title>@if(isset($batch) && $batch->count()) {{ trans('text.edit_batch') }} - {{ $batch->batch_name }} @else {{ trans('text.create_batch') }} @endif</title>
@stop

@section('body_title')
<h3 class="page-title">@if(isset($batch) && $batch->count()) {{ trans('text.edit_batch') }} - {{ $batch->batch_name }} @else {{ trans('text.create_batch') }} @endif</h3>
@stop

@section('breadcrumb', Breadcrumbs::render('create_edit_batch', (isset($batch) && $batch->count()) ? $batch : false))

@section('content')
<div class="col-md-12">
<!-- BEGIN EXAMPLE TABLE PORTLET--><!-- END EXAMPLE TABLE PORTLET-->
<div class="portlet light bordered">
  <div class="portlet-title">
    <div class="caption"> <span class="caption-subject  bold uppercase">@if(isset($batch) && $batch->count()){{ trans('text.edit_batch_details') }} @else {{ trans('text.enter_batch_details') }} @endif</span> <span class="caption-helper">{{ trans('text.required_fields') }}</span> </div>
  </div>
  <div class="portlet-body form"> 
    <!-- BEGIN FORM--> 
    @if(isset($batch) && $batch->count())
    {{ Form::model($batch, array('route' => array('batches.update', $batch->batch_id), 'method' => 'PUT', 'class' => 'form-horizontal')) }}
    @else
    {{ Form::open(array('route' => 'batches.store', 'class' => 'form-horizontal')) }}
    @endif
    <div class="form-body">
      <div class="form-group @if($errors->has('batch_name')) has-error @endif"> {{ Form::label_html('batch_name', trans('text.batch_name') . '<span class="required">*</span>', array('class' => 'col-md-3 control-label')) }}
        <div class="col-md-4"> {{ Form::text('batch_name', Input::old('batch_name'), array('class' => 'form-control')) }} {{ $errors->first('batch_name', '<span class="help-block help-block-error">:message</span>') }}</div>
      </div>
      <div class="form-group @if($errors->has('batch_start_date')) has-error @endif"> {{ Form::label_html('batch_start_date', trans('text.batch_start_date') . '<span class="required">*</span>', array('class' => 'col-md-3 control-label')) }}
        <div class="col-md-4"> {{ Form::text('batch_desc', Input::old('batch_start_date'), array('class' => 'form-control date-picker')) }} {{ $errors->first('batch_start_date', '<span class="help-block help-block-error">:message</span>') }}</div>
      </div>
      <?php
	  $study_program_names = StudyProgram::with('department')->get();
	  $sp_names = array();
	  foreach ($study_program_names as $study_program_name)
	  {
	      $sp_names[] = $study_program_name->study_program_name . ' ('  .  $study_program_name->department->department_name  . ' )';  	     
	  }
	  ?>
      <div class="form-group @if($errors->has('study_program_id')) has-error @endif"> {{ Form::label_html('study_program_id', trans('text.choose_study_program') . '<span class="required">*</span>', array('class' => 'col-md-3 control-label')) }}
        <div class="col-md-4"> {{ Form::select('study_program_id', array_combine(StudyProgram::get()->lists('study_program_id'), $sp_names), Input::old('study_program_id'), array('class' => 'form-control select2me')) }} {{ $errors->first('study_program_id', '<span class="help-block help-block-error">:message</span>') }}</div>
      </div>
      <div class="form-actions">
        <div class="row">
          <div class="col-md-offset-3 col-md-9">
            <button type="submit" class="btn green">@if(isset($batch) && $batch->count()) {{ trans('text.edit_batch') }} @else {{ trans('text.create_batch') }} @endif</button>
            {{ link_to('batches', trans('text.cancel'), ['class' => 'btn default']) }} </div>
        </div>
      </div>
      {{ Form::close() }} 
      <!-- END FORM--> 
    </div>
  </div>
</div>
@stop