@extends('layouts.default')

@section('the_title')
@if(isset($purchase_request) && $purchase_request->count())
<title>{{ trans('text.view_purchase_request') }} {{ $purchase_request->purchase_request_name }}</title>
@else
<title>{{ trans('text.purchase_request_not_found') }}</title>
@endif
@stop

@section('body_title')
@if(isset($purchase_request) && $purchase_request->count())
<h3 class="page-title"> {{ trans('text.view_purchase_request') }} <strong>{{ $purchase_request->purchase_request_name }}</strong> </h3>
@else
<h3 class="page-title"> {{ trans('text.purchase_request_not_found') }} </h3>
@endif
@stop

@if(isset($purchase_request) && $purchase_request->count())
   @section('breadcrumb', Breadcrumbs::render('show_purchase_request', $purchase_request))
@endif

@section('content')
<div class="col-md-12">
<!-- BEGIN EXAMPLE TABLE PORTLET--> 
@if(isset($purchase_request) && $purchase_request->count())
<div class="portlet gren">
  <div class="portlet-title">
    <div class="caption">{{ trans('text.purchase_request') }} - {{$purchase_request->purchase_request_name}} </div>
    <div class="actions"> @if(check_permission('create_purchase_request')) <a href='{{ url("purchase_requests/$purchase_request->purchase_request_id/products") }}' class="btn btn-default btn-sm"> <i class="fa fa-pencil"></i> {{ trans('text.manage_products') }} </a> @endif
      @if(check_permission('reject_purchase_request') && $purchase_request->purchase_request_status != 2) <a href='{{ url("purchase_requests/$purchase_request->purchase_request_id/reject") }}' class="btn red btn-sm"> <i class="fa fa-pencil"></i> {{ trans('text.reject') }} </a> @endif
      @if(check_permission('approve_purchase_request') && $purchase_request->purchase_request_status != 1) <a href='{{ url("purchase_requests/$purchase_request->purchase_request_id/approve") }}' class="btn green btn-sm"> <i class="fa fa-pencil"></i> {{ trans('text.approve') }} </a> @endif
      @if(check_permission('edit_purchase_request')) <a href='{{ url("purchase_requests/$purchase_request->purchase_request_id/edit") }}' class="btn btn-default btn-sm"> <i class="fa fa-pencil"></i> {{ trans('text.edit') }} </a> @endif
      @if(check_permission('delete_purchase_request') && $purchase_request->purchase_request_status != 1) <a href='{{ url("purchase_requests/$purchase_request->purchase_request_id/delete") }}' class="btn red btn-sm"> <i class="fa fa-pencil"></i> {{ trans('text.delete') }} </a> @endif </div>
  </div>
  <div class="portlet-body">
    <table class="table table-striped table-bordered table-hover" id="view-user">
      <tbody>
        <tr>
          <td width="106">{{ trans('text.purchase_request_id') }}</td>
          <td width="330"><strong>{{$purchase_request->purchase_request_id}}</strong></td>
        </tr>
        <tr>
          <td width="106">{{ trans('text.requested_by') }}</td>
          <td width="330"><strong>{{ link_to("users/{$purchase_request->user->user_id}", $purchase_request->user->user_fullname, array('target' => '_blank')) }}</strong></td>
        </tr>
        <tr>
          <td width="106">{{ trans('text.purchase_request_desc') }}</td>
          <td width="330"><strong>{{$purchase_request->purchase_request_desc}}</strong></td>
        </tr>
        <tr>
          <td width="106">{{ trans('text.products') }}</td>
          <td width="330"><strong>{{ format_product_names($purchase_request->products, $purchase_request->purchase_request_id) }}</strong></td>
        </tr>
        <tr>
          <td width="106">{{ trans('text.status') }}</td>
          <td width="330"><strong>{{ format_purchase_request_status($purchase_request->purchase_request_status) }}</strong></td>
        </tr>
        <tr>
          <td width="106">{{ trans('text.reject_reason') }}</td>
          <td width="330"><strong>{{$purchase_request->purchase_request_reject_notes}}</strong></td>
        </tr>
        <tr>
          <td width="106">{{ trans('text.date_created') }}</td>
          <td width="330"><strong>{{format_date($purchase_request->purchase_request_date)}}</strong></td>
        </tr>
        <tr>
          <td width="106">{{ trans('text.date_last_edited') }}</td>
          <td width="330"><strong>{{format_date($purchase_request->purchase_request_edited_date)}}</strong></td>
        </tr>
      </tbody>
    </table>
  </div>
  @else
  <p>{{ trans('text.try_diff_keyword') }}</p>
  @endif 
  <!-- END EXAMPLE TABLE PORTLET--> 
</div>
@stop