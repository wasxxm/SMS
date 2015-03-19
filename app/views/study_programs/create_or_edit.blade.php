@extends('layouts.default')

@section('the_title')
<title>@if(isset($study_program) && $study_program->count()) {{ trans('text.edit_study_program') }} - {{ $study_program->study_program_name }} @else {{ trans('text.create_study_program') }} @endif</title>
@stop

@section('body_title')
<h3 class="page-title">@if(isset($study_program) && $study_program->count()) {{ trans('text.edit_study_program') }} - {{ $study_program->study_program_name }} @else {{ trans('text.create_study_program') }} @endif</h3>
@stop

@section('breadcrumb', Breadcrumbs::render('create_edit_study_program', (isset($study_program) && $study_program->count()) ? $study_program : false))

@section('content')
<div class="col-md-12"> 
  <!-- BEGIN EXAMPLE TABLE PORTLET--><!-- END EXAMPLE TABLE PORTLET-->
  <div class="portlet light bordered">
    <div class="portlet-title">
      <div class="caption"> <span class="caption-subject  bold uppercase">@if(isset($study_program) && $study_program->count()){{ trans('text.edit_study_program_details') }} @else {{ trans('text.enter_study_program_details') }} @endif</span> <span class="caption-helper">{{ trans('text.required_fields') }}</span> </div>
    </div>
    <div class="portlet-body form"> 
      <!-- BEGIN FORM--> 
      @if(isset($study_program) && $study_program->count())
      {{ Form::model($study_program, array('route' => array('study_programs.update', $study_program->study_program_id), 'method' => 'PUT', 'class' => 'form-horizontal')) }}
      @else
      {{ Form::open(array('route' => 'study_programs.store', 'class' => 'form-horizontal')) }}
      @endif
      <div class="form-body">
        <div class="form-group @if($errors->has('study_program_name')) has-error @endif"> {{ Form::label_html('study_program_name', trans('text.study_program_name') . '<span class="required">*</span>', array('class' => 'col-md-3 control-label')) }}
          <div class="col-md-4"> {{ Form::text('study_program_name', Input::old('study_program_name'), array('class' => 'form-control')) }} {{ $errors->first('study_program_name', '<span class="help-block help-block-error">:message</span>') }}</div>
        </div>
        <div class="form-group @if($errors->has('study_program_desc')) has-error @endif"> {{ Form::label_html('study_program_desc', trans('text.study_program_desc'), array('class' => 'col-md-3 control-label')) }}
          <div class="col-md-4"> {{ Form::textarea('study_program_desc', Input::old('study_program_desc'), array('class' => 'form-control', 'size' => '40x3')) }} {{ $errors->first('study_program_desc', '<span class="help-block help-block-error">:message</span>') }}</div>
        </div>
        <div class="form-group @if($errors->has('study_program_duration')) has-error @endif"> {{ Form::label_html('study_program_duration', trans('text.study_program_duration') . '<span class="required">*</span>', array('class' => 'col-md-3 control-label')) }}
          <div class="col-md-4"> {{ Form::text('study_program_duration', Input::old('study_program_duration'), array('class' => 'form-control')) }} {{ $errors->first('study_program_duration', '<span class="help-block help-block-error">:message</span>') }}</div>
        </div>
        <div class="form-group @if($errors->has('department_id')) has-error @endif"> {{ Form::label_html('department_id', trans('text.choose_department') . '<span class="required">*</span>', array('class' => 'col-md-3 control-label')) }}
          <div class="col-md-4"> {{ Form::select('department_id', array_combine(Department::get()->lists('department_id'), Department::get()->lists('department_name')), Input::old('department_id'), array('class' => 'form-control select2me')) }} {{ $errors->first('department_id', '<span class="help-block help-block-error">:message</span>') }}</div>
        </div>
      </div>
      <div class="form-actions">
        <div class="row">
          <div class="col-md-offset-3 col-md-9">
            <button type="submit" class="btn green">@if(isset($study_program) && $study_program->count()) {{ trans('text.edit_study_program') }} @else {{ trans('text.create_study_program') }} @endif</button>
            {{ link_to('study_programs', trans('text.cancel'), ['class' => 'btn default']) }} </div>
        </div>
      </div>
      {{ Form::close() }} 
      <!-- END FORM--> 
    </div>
  </div>
</div>
@stop