@extends('layouts.default')

@section('the_title')
<title>@if(isset($department) && $department->count()) {{ trans('text.edit_department') }} - {{ $department->department_name }} @else {{ trans('text.create_department') }} @endif</title>
@stop

@section('body_title')
<h3 class="page-title">@if(isset($department) && $department->count()) {{ trans('text.edit_department') }} - {{ $department->department_name }} @else {{ trans('text.create_department') }} @endif</h3>
@stop

@section('breadcrumb', Breadcrumbs::render('create_edit_department', (isset($department) && $department->count()) ? $department : false))

@section('content')
<div class="col-md-12"> 
  <!-- BEGIN EXAMPLE TABLE PORTLET--><!-- END EXAMPLE TABLE PORTLET-->
  <div class="portlet light bordered">
    <div class="portlet-title">
      <div class="caption"> <span class="caption-subject  bold uppercase">@if(isset($department) && $department->count()){{ trans('text.edit_department_details') }} @else {{ trans('text.enter_department_details') }} @endif</span> <span class="caption-helper">{{ trans('text.required_fields') }}</span> </div>
    </div>
    <div class="portlet-body form"> 
      <!-- BEGIN FORM--> 
      @if(isset($department) && $department->count())
      {{ Form::model($department, array('route' => array('departments.update', $department->department_id), 'method' => 'PUT', 'class' => 'form-horizontal')) }}
      @else
      {{ Form::open(array('route' => 'departments.store', 'class' => 'form-horizontal')) }}
      @endif
      <div class="form-body">
        <div class="form-group @if($errors->has('department_name')) has-error @endif"> {{ Form::label_html('department_name', trans('text.department_name'), array('class' => 'col-md-3 control-label')) }}
          <div class="col-md-4"> {{ Form::text('department_name', Input::old('department_name'), array('class' => 'form-control')) }} {{ $errors->first('department_name', '<span class="help-block help-block-error">:message</span>') }}</div>
        </div>
        <div class="form-group @if($errors->has('department_desc')) has-error @endif"> {{ Form::label_html('department_desc', trans('text.department_desc'), array('class' => 'col-md-3 control-label')) }}
          <div class="col-md-4"> {{ Form::text('department_desc', Input::old('department_desc'), array('class' => 'form-control')) }} {{ $errors->first('department_desc', '<span class="help-block help-block-error">:message</span>') }}</div>
        </div>
      </div>
      <div class="form-actions">
        <div class="row">
          <div class="col-md-offset-3 col-md-9">
            <button type="submit" class="btn green">@if(isset($department) && $department->count()) {{ trans('text.edit_department') }} @else {{ trans('text.create_department') }} @endif</button>
            {{ link_to('departments', trans('text.cancel'), ['class' => 'btn default']) }} </div>
        </div>
      </div>
      {{ Form::close() }} 
      <!-- END FORM--> 
    </div>
  </div>
</div>
@stop