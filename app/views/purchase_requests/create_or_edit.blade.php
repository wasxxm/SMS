@extends('layouts.default')

@section('the_title')
<title>@if(isset($purchase_request) && $purchase_request->count()) {{ trans('text.edit_purchase_request') }} - {{ $purchase_request->purchase_request_name}} @else {{ trans('text.create_purchase_request') }} @endif</title>
@stop

@section('body_title')
<h3 class="page-title">@if(isset($purchase_request) && $purchase_request->count()) {{ trans('text.edit_purchase_request') }} - {{ $purchase_request->purchase_request_name }} @else {{ trans('text.create_purchase_request') }} @endif</h3>
@stop

@section('breadcrumb', Breadcrumbs::render('create_edit_purchase_request', (isset($purchase_request) && $purchase_request->count()) ? $purchase_request : false))

@section('content')
<div class="col-md-12"> 
  <!-- BEGIN EXAMPLE TABLE PORTLET--><!-- END EXAMPLE TABLE PORTLET-->
  <div class="portlet light bordered">
    <div class="portlet-title">
      <div class="caption"> <span class="caption-subject  bold uppercase">@if(isset($purchase_request) && $purchase_request->count()){{ trans('text.edit_purchase_request_details') }} @else {{ trans('text.enter_purchase_request_details') }} @endif</span> <span class="caption-helper">{{ trans('text.required_fields') }}</span> </div>
    </div>
    <div class="portlet-body form"> 
      <!-- BEGIN FORM--> 
      @if(isset($purchase_request) && $purchase_request->count())
      {{ Form::model($purchase_request, array('route' => array('purchase_requests.update', $purchase_request->purchase_request_id), 'method' => 'PUT', 'class' => 'form-horizontal')) }}
      @else
      {{ Form::open(array('route' => 'purchase_requests.store', 'class' => 'form-horizontal')) }}
      @endif
      <div class="form-body">
        <div class="form-group @if($errors->has('purchase_request_name')) has-error @endif"> {{ Form::label_html('purchase_request_name', trans('text.purchase_request_name'), array('class' => 'col-md-3 control-label')) }}
          <div class="col-md-4"> {{ Form::text('purchase_request_name', Input::old('purchase_request_name'), array('class' => 'form-control')) }} {{ $errors->first('purchase_request_name', '<span class="help-block help-block-error">:message</span>') }}</div>
        </div>
        <div class="form-group @if($errors->has('purchase_request_desc')) has-error @endif"> {{ Form::label_html('purchase_request_desc', trans('text.purchase_request_desc'), array('class' => 'col-md-3 control-label')) }}
          <div class="col-md-4"> {{ Form::textarea('purchase_request_desc', Input::old('purchase_request_desc'), array('class' => 'form-control', 'size' => '40x3')) }} {{ $errors->first('purchase_request_desc', '<span class="help-block help-block-error">:message</span>') }}</div>
        </div>
        @if(!isset($purchase_request) || !$purchase_request->count())
        <div class="form-group"> {{ Form::label_html('purchase_request_products', trans('text.purchase_request_products'), array('class' => 'col-md-3 control-label')) }}
          <div class="col-md-4"><strong><p class="form-control-static">{{ trans('text.purchase_request_products_add') }}</p></strong></div>
        </div>
        @endif
      </div>
      <div class="form-actions">
        <div class="row">
          <div class="col-md-offset-3 col-md-9">
            <button type="submit" class="btn green">@if(isset($purchase_request) && $purchase_request->count()) {{ trans('text.edit_purchase_request') }} @else {{ trans('text.create_purchase_request') }} @endif</button>
            {{ link_to('purchase_requests', trans('text.cancel'), ['class' => 'btn default']) }} </div>
        </div>
      </div>
      {{ Form::close() }} 
      <!-- END FORM--> 
    </div>
  </div>
</div>
@stop