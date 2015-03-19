@extends('layouts.default')

@section('the_title')
<title>{{ trans('text.add_department_permission') }}</title>
@stop

@section('body_title')
<h3 class="page-title"> {{ trans('text.add_department_permission') }} </h3>
@stop

@section('breadcrumb', Breadcrumbs::render('add_department_permission', $department = Department::find($department_id)))

@section('content')
<div class="col-md-12"> 
  <!-- BEGIN EXAMPLE TABLE PORTLET--><!-- END EXAMPLE TABLE PORTLET-->
  <div class="portlet light bordered">
    <div class="portlet-title">
      <div class="caption"> <span class="caption-subject  bold uppercase"> {{ trans('text.add_department_permission') }} </span> </div>
    </div>
    <div class="portlet-body form"> 
      <!-- BEGIN FORM--> 
      {{ Form::open(array('url' => "departments/$department_id/permissions", 'class' => 'form-horizontal', 'method' => 'POST')) }}
      <div class="form-body">
      <div class="form-group @if($errors->has('department_id')) has-error @endif"> {{ Form::label_html('department_id', trans('text.department'), array('class' => 'col-md-3 control-label')) }}
          <div class="col-md-4"> <p class="form-control-static"><strong>{{ $department->department_name }}</strong></p> {{ $errors->first('department_id', '<span class="help-block help-block-error">:message</span>') }}</div>
        </div>
        <div class="form-group @if($errors->has('department_permission_set_id')) has-error @endif"> {{ Form::label_html('department_permission_set_id', trans('text.choose_permission_set'), array('class' => 'col-md-3 control-label')) }}
          <div class="col-md-4"> {{ Form::select('department_permission_set_id', array_combine(PermissionSet::where('company_id', get_user_cid())->get()->lists('permission_set_id'), PermissionSet::where('company_id', get_user_cid())->get()->lists('permission_set_name')), Input::old('department_permission_set_id'), array('class' => 'form-control select2me')) }} {{ $errors->first('department_permission_set_id', '<span class="help-block help-block-error">:message</span>') }}</div>
        </div>
      </div>
      <div class="form-actions">
        <div class="row">
          <div class="col-md-offset-3 col-md-9">
            <button type="submit" class="btn green"> {{ trans('text.add_department_permission') }} </button>
            {{ link_to('departments/permissions', trans('text.cancel'), ['class' => 'btn default']) }} </div>
        </div>
      </div>
      {{ Form::close() }} 
      <!-- END FORM--> 
    </div>
  </div>
</div>
@stop