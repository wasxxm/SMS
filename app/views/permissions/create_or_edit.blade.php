@extends('layouts.default')

@section('the_title')
<title>@if(isset($permission_set) && $permission_set->count()) {{ trans('text.edit_permission_set') }} - {{ $permission_set->permission_set_name }} @else {{ trans('text.create_permission_set') }} @endif</title>
@stop

@section('body_title')
<h3 class="page-title">@if(isset($permission_set) && $permission_set->count()) {{ trans('text.edit_permission_set') }} - {{ $permission_set->permission_set_name }} @else {{ trans('text.create_permission_set') }} @endif</h3>
@stop

@section('breadcrumb', Breadcrumbs::render('create_edit_permission_set', (isset($permission_set) && $permission_set->count()) ? $permission_set : false))

@section('content')
<div class="col-md-12"> 
  <!-- BEGIN EXAMPLE TABLE PORTLET--><!-- END EXAMPLE TABLE PORTLET-->
  <div class="portlet light bordered">
    <div class="portlet-title">
      <div class="caption"> <span class="caption-subject  bold uppercase">@if(isset($permission_set) && $permission_set->count()){{ trans('text.edit_permission_set') }} @else {{ trans('text.enter_permission_set') }} @endif</span> <span class="caption-helper">{{ trans('text.required_fields') }}</span> </div>
    </div>
    <div class="portlet-body form"> 
      <!-- BEGIN FORM--> 
      @if(isset($permission_set) && $permission_set->count())
      <?php $permissions = Permission::get_str($permission_set->permission_ids); ?>
      {{ Form::model($permission_set, array('route' => array('permissions.update', $permission_set->permission_set_id), 'method' => 'PUT', 'class' => 'form-horizontal')) }}
      @else
      {{ Form::open(array('route' => 'permissions.store', 'class' => 'form-horizontal')) }}
      @endif
      <div class="form-body">
        <div class="form-group @if($errors->has('permission_set_name')) has-error @endif"> {{ Form::label_html('permission_set_name', trans('text.permission_set_name'), array('class' => 'col-md-3 control-label')) }}
          <div class="col-md-4"> {{ Form::text('permission_set_name', Input::old('permission_set_name'), array('class' => 'form-control')) }} {{ $errors->first('permission_set_name', '<span class="help-block help-block-error">:message</span>') }}</div>
        </div>
        <div class="form-group"> {{ Form::label_html('permissions', trans('text.add_permissions'), array('class' => 'col-md-3 control-label')) }}
          <div class="col-md-4">
            <?php
		      $permissions = array_combine(Permission::where('super_user', 0)->get()->lists('permission_id'), Permission::where('super_user', 0)->get()->lists('permission_name'));
		   ?>
            <select multiple="multiple" name="permission_ids[]" id="permission_ids1" class="multi-select">
                         
             @foreach($permissions as $id => $name)
                 @if(isset($permission_set) && $permission_set->count())
                 
              <?php $permission_ids = $permission_set->permission_ids; $permission_ids = explode(',', $permission_ids); ?>
              <option value="{{$id}}" @if(in_array($id, $permission_ids)) selected @endif>{{$name}}</option>
                 @else  
               <?php $permission_ids = (array)Input::old('permission_ids');?>
               <option value="{{$id}}" @if(in_array($id, $permission_ids)) selected @endif>{{$name}}</option>            
                 @endif
             @endforeach
            
            </select>
          </div>
        </div>
        <div class="form-group @if($errors->has('permission_set_desc')) has-error @endif"> {{ Form::label_html('permission_set_desc', trans('text.permission_set_desc'), array('class' => 'col-md-3 control-label')) }}
          <div class="col-md-4"> {{ Form::textarea('permission_set_desc', Input::old('permission_set_desc'), array('class' => 'form-control', 'size' => '40x3')) }} {{ $errors->first('permission_set_desc', '<span class="help-block help-block-error">:message</span>') }}</div>
        </div>
      </div>
      <div class="form-actions">
        <div class="row">
          <div class="col-md-offset-3 col-md-9">
            <button type="submit" class="btn green">@if(isset($permission_set) && $permission_set->count()) {{ trans('text.edit_permission_set') }} @else {{ trans('text.create_permission_set') }} @endif</button>
            {{ link_to('permissions', trans('text.cancel'), ['class' => 'btn default']) }} </div>
        </div>
      </div>
      {{ Form::close() }} 
      <!-- END FORM--> 
    </div>
  </div>
</div>
@stop