@extends('layouts.default')

@section('the_title')
<title>{{ trans('text.add_user_department') }}</title>
@stop

@section('body_title')
<h3 class="page-title"> {{ trans('text.add_user_department') }} <small>{{ trans('text.add_user_department') }}</small> </h3>
@stop

@section('breadcrumb', Breadcrumbs::render('add_user_department', $user = User::find($user_id)))

@section('content')
<div class="col-md-12"> 
  <!-- BEGIN EXAMPLE TABLE PORTLET--><!-- END EXAMPLE TABLE PORTLET-->
  <div class="portlet light bordered">
    <div class="portlet-title">
      <div class="caption"> <span class="caption-subject  bold uppercase"> {{ trans('text.add_user_department') }} </span> </div>
    </div>
    <div class="portlet-body form"> 
      <!-- BEGIN FORM--> 
      {{ Form::open(array('url' => "users/$user_id/departments", 'class' => 'form-horizontal', 'method' => 'POST')) }}
      <div class="form-body">
      <div class="form-group @if($errors->has('user_id')) has-error @endif"> {{ Form::label_html('user_id', trans('text.user'), array('class' => 'col-md-3 control-label')) }}
          <div class="col-md-4"> <p class="form-control-static"><strong>{{ $user->user_fullname }}</strong></p> {{ $errors->first('user_id', '<span class="help-block help-block-error">:message</span>') }}</div>
        </div>
        <div class="form-group @if($errors->has('department_id')) has-error @endif"> {{ Form::label_html('department_id', trans('text.choose_department'), array('class' => 'col-md-3 control-label')) }}
          <div class="col-md-4"> {{ Form::select('department_id', array_combine(Department::get()->lists('department_id'), Department::get()->lists('department_name')), Input::old('department_id'), array('class' => 'form-control select2me')) }} {{ $errors->first('department_id', '<span class="help-block help-block-error">:message</span>') }}</div>
        </div>
      </div>
      <div class="form-actions">
        <div class="row">
          <div class="col-md-offset-3 col-md-9">
            <button type="submit" class="btn green"> {{ trans('text.add_user_department') }} </button>
            {{ link_to('users/departments', trans('text.cancel'), ['class' => 'btn default']) }} </div>
        </div>
      </div>
      {{ Form::close() }} 
      <!-- END FORM--> 
    </div>
  </div>
</div>
@stop