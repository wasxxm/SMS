@extends('layouts.default')

@section('the_title')
<title>{{ trans('text.purchase_request') }} '{{ $purchase_request_products->purchase_request_name }}' {{ trans('text.products') }}</title>
@stop

@section('body_title')
<h3 class="page-title"> {{ trans('text.purchase_request') }} '<strong>{{ $purchase_request_products->purchase_request_name }}</strong>' {{ trans('text.products') }}  </h3>
@stop

@section('breadcrumb', Breadcrumbs::render('purchase_request_products', $purchase_request_products))

@section('content')
<div class="col-md-12"> 
  <!-- BEGIN EXAMPLE TABLE PORTLET-->
  <div class="portlet box grey-cascade">
    <div class="portlet-title">
      <div class="caption">{{ trans('text.purchase_request_products') }} </div>
      <div class="tools"> <a href="javascript:;" class="collapse"> </div>
    </div>
    <div class="portlet-body">
      <div class="table-toolbar">
        <div class="row">
          <div class="col-md-6">
            <div class="btn-group"> @if(check_permission('create_purchase_request'))<a id="sample_editable_1_new" class="btn green" href="{{ url("purchase_requests/{$purchase_request_products->purchase_request_id}/products/create") }}"> {{ trans('text.add_purchase_request_products') }} <i class="fa fa-plus"></i> </a>@else <a href=""></a> @endif </div>
          </div>
          <div class="col-md-6">
            <div class="btn-group pull-right">
              <button class="btn dropdown-toggle" data-toggle="dropdown">{{ trans('text.tools') }} <i class="fa fa-angle-down"></i> </button>
              <ul class="dropdown-menu pull-right">
                <li> <a href="#"> {{ trans('text.export_excel') }} </a> </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      @if ($purchase_request_products->products && count($purchase_request_products->products))
      <table class="table table-striped table-bordered table-hover" id="users">
        <thead>
          <tr>
            <th width="100"> {{ trans('text.id') }} </th>
            <th> {{ trans('text.name') }} </th>
            <th> {{ trans('text.value') }} ({{ get_company_config('currency_code') }} - {{ get_currency(get_company_config('currency_code')) }})</th>
            <th> {{ trans('text.quantity') }} </th>
            <th> {{ trans('text.total_value') }} ({{ get_currency(get_company_config('currency_code')) }}) </th>
            <th> {{ trans('text.category') }} </th>
             @if(check_permission('delete_purchase_request'))
            <th> {{ trans('text.delete') }} </th>
            @endif </tr>
        </thead>
        <tbody>
        <?php
		$total = 0;
		?>
        @foreach ($purchase_request_products->products as $purchase_request_product)
        <tr class="odd gradeX">
          <td> {{ $purchase_request_product->product_id }} </td>
          <td> {{ link_to("products/{$purchase_request_product->product_id}", $purchase_request_product->product_name) }} </td>
          <td> {{ $purchase_request_product->pivot->value }} </td>
          <td> {{ $purchase_request_product->pivot->quantity }} </td>
          <?php 
		  $quantity_total = $purchase_request_product->pivot->value * $purchase_request_product->pivot->quantity;
		  $total += $quantity_total;
		  ?>
          <td> {{ $quantity_total }} </td>
          <td> {{ $purchase_request_product->category->product_category_name }} </td>
           @if(check_permission('delete_purchase_request'))
          <td> {{ link_to("purchase_requests/{$purchase_request_products->purchase_request_id}/products/{$purchase_request_product->product_id}/delete", trans('text.delete')) }} </td>
          @endif
           </tr>
        @endforeach
        <tr class="odd gradeX">
        <td colspan="4"><strong>{{ trans('text.grand_total') }} ({{ get_currency(get_company_config('currency_code')) }})</strong></td><td colspan="3"><strong>{{ $total }}</strong></td>
        </tr>
          </tbody>
        
      </table>
      @else
      <p>{{ trans('text.no_product_added_to_pr') }}</p>
      @endif </div>
  </div>
  <!-- END EXAMPLE TABLE PORTLET--> 
</div>
@stop