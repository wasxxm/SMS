@extends('layouts.default')

@section('the_title')
<title>@if(isset($user) && $user->count()) {{ trans('text.edit_user') }} - {{ $user->user_fullname }} @else {{ trans('text.create_user') }} @endif</title>
@stop

@section('body_title')
<h3 class="page-title">@if(isset($user) && $user->count()) {{ trans('text.edit_user') }} - {{ $user->user_fullname }} @else {{ trans('text.create_user') }} @endif</h3>
@stop

@section('breadcrumb', Breadcrumbs::render('create_edit_user', (isset($user) && $user->count()) ? $user : false))

@section('content')
<div class="col-md-12"> 
  <!-- BEGIN EXAMPLE TABLE PORTLET--><!-- END EXAMPLE TABLE PORTLET-->
  <div class="portlet light bordered">
    <div class="portlet-title">
      <div class="caption"> <span class="caption-subject  bold uppercase">@if(isset($user) && $user->count()){{ trans('text.edit_user_details') }} @else {{ trans('text.enter_user_details') }} @endif</span> <span class="caption-helper">{{ trans('text.required_fields') }}</span> </div>
    </div>
    <div class="portlet-body form"> 
      <!-- BEGIN FORM--> 
      @if(isset($user) && $user->count())
      {{ Form::model($user, array('route' => array('users.update', $user->user_id), 'method' => 'PUT', 'class' => 'form-horizontal')) }}
      @else
      {{ Form::open(array('route' => 'users.store', 'class' => 'form-horizontal')) }}
      @endif
      <div class="form-body">
        <div class="form-group @if($errors->has('user_label')) has-error @endif"> {{ Form::label_html('user_label', trans('text.user_label'), array('class' => 'col-md-3 control-label')) }}
          <div class="col-md-4"> {{ Form::text('user_label', Input::old('user_label'), array('class' => 'form-control')) }} {{ $errors->first('user_label', '<span class="help-block help-block-error">:message</span>') }}</div>
        </div>
        <div class="form-group @if($errors->has('user_fullname')) has-error @endif"> {{ Form::label_html('user_fullname', trans('text.user_fullname').'<span class="required">*</span>', array('class' => 'col-md-3 control-label')) }}
          <div class="col-md-4"> {{ Form::text('user_fullname', Input::old('user_fullname'), array('class' => 'form-control')) }} {{ $errors->first('user_fullname', '<span class="help-block help-block-error">:message</span>') }}</div>
        </div>
        <div class="form-group @if($errors->has('user_company_id')) has-error @endif"> {{ Form::label_html('user_company_id', trans('text.user_company_name') . '<span class="required">*</span>', array('class' => 'col-md-3 control-label')) }}
          <div class="col-md-4"> {{ Form::select('user_company_id', array_combine(Company::get_col('company_id'), Company::get_col('company_name')), Input::old('user_company_id'), array('class' => 'form-control select2me', 'data-placeholder' => trans('text.select_company'))) }} {{ $errors->first('user_company_id', '<span class="help-block help-block-error">:message</span>') }}</div>
        </div>
        <div class="form-group @if($errors->has('user_email')) has-error @endif"> {{ Form::label_html('user_email', trans('text.user_email'). '<span class="required">*</span>', array('class' => 'col-md-3 control-label')) }}
          <div class="col-md-4"> {{ Form::text('user_email', Input::old('user_email'), array('class' => 'form-control')) }} {{ $errors->first('user_email', '<span class="help-block help-block-error">:message</span>') }}</div>
        </div>
        <div class="form-group @if($errors->has('user_password')) has-error @endif"> @if(isset($user) && $user->count())
          {{ Form::label_html('user_password', trans('text.user_password'), array('class' => 'col-md-3 control-label')) }}
          @else
          {{ Form::label_html('user_password', trans('text.user_password') . '<span class="required">*</span>', array('class' => 'col-md-3 control-label')) }}
          @endif
          <div class="col-md-4"> {{ Form::password('user_password', array('class' => 'form-control')) }} {{ $errors->first('user_password', '<span class="help-block help-block-error">:message</span>') }}
            @if(isset($user) && $user->count())
            <p class="help-block">Leave password blank if you do not want to change</p>
            @endif </div>
        </div>
        <div class="form-group @if($errors->has('user_phone')) has-error @endif"> {{ Form::label_html('user_phone', trans('text.user_phone'), array('class' => 'col-md-3 control-label')) }}
          <div class="col-md-4"> {{ Form::text('user_phone', Input::old('user_phone'), array('class' => 'form-control')) }} {{ $errors->first('user_phone', '<span class="help-block help-block-error">:message</span>') }}</div>
        </div>
        <div class="form-group @if($errors->has('user_status')) has-error @endif"> {{ Form::label_html('user_status', trans('text.user_status'), array('class' => 'col-md-3 control-label')) }}
          <div class="col-md-4"> {{ Form::select('user_status', array(1 => trans('text.active'), 0 => trans('text.disabled')), Input::old('user_status') , array('class' => 'form-control select2me')) }} {{ $errors->first('user_status', '<span class="help-block help-block-error">:message</span>') }}</div>
        </div>
      </div>
      <div class="form-actions">
        <div class="row">
          <div class="col-md-offset-3 col-md-9">
            <button type="submit" class="btn green">@if(isset($user) && $user->count()) {{ trans('text.edit_user') }} @else {{ trans('text.create_user') }} @endif</button>
            {{ link_to('users', trans('text.cancel'), ['class' => 'btn default']) }} </div>
        </div>
      </div>
      {{ Form::close() }} 
      <!-- END FORM--> 
    </div>
  </div>
</div>
@stop