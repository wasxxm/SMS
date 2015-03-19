@extends('layouts.default')

@section('the_title')
<title>{{ trans('text.add_pr_products') }} - {{ $purchase_request->purchase_request_name }}</title>
@stop

@section('body_title')
<h3 class="page-title">{{ trans('text.add_pr_products') }} - <strong>{{ $purchase_request->purchase_request_name }}</strong></h3>
@stop

@section('breadcrumb', Breadcrumbs::render('add_pr_products', $purchase_request))

@section('content')
<div class="col-md-12"> 
  <!-- BEGIN EXAMPLE TABLE PORTLET--><!-- END EXAMPLE TABLE PORTLET-->
  <div class="portlet light bordered">
    <div class="portlet-title">
      <div class="caption"> <span class="caption-subject  bold uppercase">{{ trans('text.add_pr_products') }}</span> <span class="caption-helper">{{ trans('text.required_fields') }}</span> </div>
    </div>
    <div class="portlet-body form"> 
      <!-- BEGIN FORM--> 
      {{ Form::open(array('url' => "purchase_requests/{$purchase_request->purchase_request_id}/products", 'class' => 'form-horizontal', 'method' => 'POST')) }}
      <div class="form-body">
        <div class="form-group"> {{ Form::label_html('purchase_request_name', trans('text.purchase_request_name'), array('class' => 'col-md-3 control-label')) }}
          <div class="col-md-4">
            <p class="form-control-static"><strong>{{ $purchase_request->purchase_request_name }}</strong></p>
          </div>
        </div>
        <div class="form-group @if($errors->has('product_id')) has-error @endif"> {{ Form::label_html('product_id', trans('text.choose_product'), array('class' => 'col-md-3 control-label')) }}
          <div class="col-md-4">{{ Form::select('product_id', array_combine(Product::get()->lists('product_id'), get_products_with_values()), Input::old('product_id'), array('class' => 'form-control select2me')) }} {{ $errors->first('product_id', '<span class="help-block help-block-error">:message</span>') }}</div>
        </div>
        <div class="form-group @if($errors->has('product_value')) has-error @endif"> {{ Form::label_html('product_value', trans('text.product_value') . ' (' . get_company_config('currency_code').' - '.get_currency(get_company_config('currency_code')).')', array('class' => 'col-md-3 control-label')) }}
          <div class="col-md-4"> {{ Form::number('product_value', Input::old('product_value'), array('class' => 'form-control', 'step' => '.1', 'min' => '0')) }} {{ $errors->first('product_value', '<span class="help-block help-block-error">:message</span>') }} <p class="help-block">{{ trans('text.product_value_input') }}</p></div>
        </div>
        <div class="form-group @if($errors->has('product_quantity')) has-error @endif"> {{ Form::label_html('product_quantity', trans('text.product_quantity'), array('class' => 'col-md-3 control-label')) }}
          <div class="col-md-4"> {{ Form::number('product_quantity', Input::old('product_quantity'), array('class' => 'form-control', 'step' => '1', 'min' => 1)) }} {{ $errors->first('product_quantity', '<span class="help-block help-block-error">:message</span>') }}</div>
        </div>
      </div>
      <div class="form-actions">
        <div class="row">
          <div class="col-md-offset-3 col-md-9">
            <button type="submit" class="btn green"> {{ trans('text.add_product') }} </button>
            {{ link_to("purchase_requests/$purchase_request->purchase_request_id/products", trans('text.cancel'), ['class' => 'btn default']) }} </div>
        </div>
      </div>
      {{ Form::close() }} 
      <!-- END FORM--> 
    </div>
  </div>
</div>
@stop