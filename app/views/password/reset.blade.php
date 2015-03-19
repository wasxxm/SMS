@extends('layouts.box')
@section('the_head')
<link href="{{ URL::asset('assets/admin/pages/css/login.css') }}" rel="stylesheet" type="text/css"/>
@stop
@section('the_title')
<title>{{ trans('text.reset_pass') }}</title>
@stop 

@section('content') 
<!-- BEGIN FORGOT PASS FORM -->
<form action="{{ action('RemindersController@postReset') }}" method="POST" class="forget-form show">
<h3 class="form-title">{{ trans('text.reset_pass') }}?</h3>
<p> {{ trans('text.enter_pass_reset') }} </p>
<div class="form-group"> 
  <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that--> 
  {{ Form::label_html('user_email', trans('text.user_email'), array('class' => 'control-label visible-ie8 visible-ie9')) }}
  <div class="input-icon"> <i class="fa fa-envelope"></i> {{ Form::email('email', Input::old('email'), array('class' => 'form-control placeholder-no-fix', 'autocomplete' => 'off', 'placeholder' => trans('text.email'))) }} </div>
</div>
<div class="form-group"> 
<div class="input-icon"> <i class="fa fa-key"></i> {{ Form::password('password', array('class' => 'form-control placeholder-no-fix', 'autocomplete' => 'off', 'placeholder' => trans('text.password'))) }} </div>
</div>
<div class="form-group"> 
<div class="input-icon"> <i class="fa fa-key"></i> {{ Form::password('password_confirmation', array('class' => 'form-control placeholder-no-fix', 'autocomplete' => 'off', 'placeholder' => trans('text.confirm_password'))) }} </div>
</div>
<input type="hidden" name="token" value="{{ $token }}">
<div class="form-actions">
  <button type="submit" class="btn blue pull-right"> {{ trans('text.reset_pass') }} <i class="m-icon-swapright m-icon-white"></i> </button>
</div>
<div class="forget-password">
  <p> {{ Lang::get('text.go_back_login', ['login' => url('login')]) }} </p>
</div>
{{ Form::close() }} 
<!-- END FORGOT PASS FORM --> 
@stop