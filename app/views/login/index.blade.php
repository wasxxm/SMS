@extends('layouts.box')
@section('the_head')
<link href="{{ URL::asset('assets/admin/pages/css/login.css') }}" rel="stylesheet" type="text/css"/>
@stop
@section('the_title')
<title>{{ trans('text.login_title') }} - {{ trans('text.site_name') }}</title>
@stop 

@section('content') 
<!-- BEGIN LOGIN FORM --> 
{{ Form::open(array('route' => 'session.store', 'class' => 'form-horizontal', 'method' => 'POST')) }}
<h3 class="form-title">{{ trans('text.login_to_acc') }}</h3>
<div class="form-group"> 
  <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that--> 
  {{ Form::label_html('user_email', trans('text.user_email'), array('class' => 'control-label visible-ie8 visible-ie9')) }}
  <div class="input-icon"> <i class="fa fa-user"></i> {{ Form::email('email', Input::old('email'), array('class' => 'form-control placeholder-no-fix', 'autocomplete' => 'off', 'placeholder' => trans('text.email'))) }} </div>
</div>
<div class="form-group"> {{ Form::label_html('password', trans('text.user_password'), array('class' => 'control-label visible-ie8 visible-ie9')) }}
  <div class="input-icon"> <i class="fa fa-lock"></i> {{ Form::password('password', array('class' => 'form-control placeholder-no-fix', 'autocomplete' => 'off', 'placeholder' => trans('text.password'))) }} </div>
</div>
<div class="form-actions">
  <label class="checkbox" style="margin-left:10px">
  {{ Form::checkbox('remember', 1) }}
    {{ trans('text.remember_me') }} </label>
  <button type="submit" class="btn blue pull-right"> {{ trans('text.login') }} <i class="m-icon-swapright m-icon-white"></i> </button>
</div>
<div class="forget-password">
  <h4>{{ trans('text.forgot_pass') }}</h4>
  <p> {{ Lang::get('text.reset_pass_link', ['url' => url('password/remind')]) }} </p>
</div>
{{ Form::close() }}
<!-- END LOGIN FORM -->  
@stop