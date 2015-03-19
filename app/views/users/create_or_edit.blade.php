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
      {{ Form::model($user, array('route' => array('users.update', $user->user_id), 'method' => 'PUT', 'class' => 'form-horizontal', 'files' => true)) }}
      @else
      {{ Form::open(array('route' => 'users.store', 'class' => 'form-horizontal', 'files' => true)) }}
      @endif
      <div class="form-body">
        <div class="form-group @if($errors->has('user_label')) has-error @endif"> {{ Form::label_html('user_label', trans('text.user_label'), array('class' => 'col-md-3 control-label')) }}
          <div class="col-md-4"> {{ Form::text('user_label', Input::old('user_label'), array('class' => 'form-control')) }} {{ $errors->first('user_label', '<span class="help-block help-block-error">:message</span>') }}</div>
        </div>
        <div class="form-group @if($errors->has('user_fullname')) has-error @endif"> {{ Form::label_html('user_fullname', trans('text.user_fullname').'<span class="required">*</span>', array('class' => 'col-md-3 control-label')) }}
          <div class="col-md-4"> {{ Form::text('user_fullname', Input::old('user_fullname'), array('class' => 'form-control')) }} {{ $errors->first('user_fullname', '<span class="help-block help-block-error">:message</span>') }}</div>
        </div>
        
        <div class="form-group @if($errors->has('email')) has-error @endif"> {{ Form::label_html('email', trans('text.user_email'). '<span class="required">*</span>', array('class' => 'col-md-3 control-label')) }}
          <div class="col-md-4"> {{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }} {{ $errors->first('email', '<span class="help-block help-block-error">:message</span>') }}</div>
        </div>
        <div class="form-group @if($errors->has('user_password')) has-error @endif"> @if(isset($user) && $user->count())
          {{ Form::label_html('password', trans('text.user_password'), array('class' => 'col-md-3 control-label')) }}
          @else
          {{ Form::label_html('password', trans('text.user_password') . '<span class="required">*</span>', array('class' => 'col-md-3 control-label')) }}
          @endif
          <div class="col-md-4"> {{ Form::password('password', array('class' => 'form-control')) }} {{ $errors->first('password', '<span class="help-block help-block-error">:message</span>') }}
            @if(isset($user) && $user->count())
            <p class="help-block">Leave password blank if you do not want to change</p>
            @endif </div>
        </div>
        <div class="form-group @if($errors->has('user_phone')) has-error @endif"> {{ Form::label_html('user_phone', trans('text.user_phone'), array('class' => 'col-md-3 control-label')) }}
          <div class="col-md-4"> {{ Form::text('user_phone', Input::old('user_phone'), array('class' => 'form-control')) }} {{ $errors->first('user_phone', '<span class="help-block help-block-error">:message</span>') }}</div>
        </div>
        @if (check_permission('edit_user'))
        <div class="form-group @if($errors->has('user_status')) has-error @endif"> {{ Form::label_html('user_status', trans('text.user_status'), array('class' => 'col-md-3 control-label')) }}
          <div class="col-md-4"> {{ Form::select('user_status', array(1 => trans('text.active'), 0 => trans('text.disabled')), Input::old('user_status') , array('class' => 'form-control select2me')) }} {{ $errors->first('user_status', '<span class="help-block help-block-error">:message</span>') }}</div>
        </div>
        @endif
        <div class="form-group last @if($errors->has('user_profile_pic_uri')) has-error @endif"> {{ Form::label_html('user_profile_pic_uri', trans('text.user_profile_pic'), array('class' => 'col-md-3 control-label')) }}
          <div class="col-md-4"> {{ Form::file('user_profile_pic_uri') }} {{ $errors->first('user_profile_pic_uri', '<span class="help-block help-block-error">:message</span>') }}
            <p class="help-block">{{ trans('text.profile_pic_type_req') }}<br>
              {{ trans('text.image_dim_reqs') }} {{ Setting::get('profile_pic_width') }}px {{trans('text.by')}} {{ Setting::get('profile_pic_height') }}px</p>
            @if(isset($user) && $user->count() && $user->user_profile_pic_uri)
            <p><img src="{{url('uploads/profiles/' . $user->user_profile_pic_uri)}}"/></p>
            @endif </div>
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