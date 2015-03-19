@extends('layouts.default')

@section('the_title')
<title>{{ trans('text.manage_purchase_requests') }}</title>
@stop

@section('body_title')
<h3 class="page-title"> {{ trans('text.purchase_requests') }} <small>{{ trans('text.manage_purchase_requests') }}</small> </h3>
@stop

@section('breadcrumb', Breadcrumbs::render('purchase_requests', $purchase_requests))

@section('content')
<div class="col-md-12"> 
  <!-- BEGIN EXAMPLE TABLE PORTLET-->
  <div class="portlet box grey-cascade">
    <div class="portlet-title">
      <div class="caption">{{ trans('text.purchase_requests') }} </div>
      <div class="tools"> <a href="javascript:;" class="collapse"> </div>
    </div>
    <div class="portlet-body">
      <div class="table-toolbar">
        <div class="row">
          <div class="col-md-6">
            <div class="btn-group"> @if(check_permission('create_purchase_request'))<a id="sample_editable_1_new" class="btn green" href="{{ url('purchase_requests/create') }}"> {{ trans('text.add_purchase_request') }} <i class="fa fa-plus"></i> </a>@else <a href=""></a> @endif </div>
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
      @if ($purchase_requests->count())
      <table class="table table-striped table-bordered table-hover" id="users">
        <thead>
          <tr>
            <th width="100"> {{ SortableTrait::link_to_sorting_action('purchase_request_id', trans('text.id')) }} </th>
            <th> {{ SortableTrait::link_to_sorting_action('purchase_request_name', trans('text.name')) }} </th>
            <th> {{ trans('text.requested_by') }} </th>
            <th> {{ SortableTrait::link_to_sorting_action('purchase_request_date', trans('text.created_date')) }} </th>
            <th> {{ SortableTrait::link_to_sorting_action('purchase_request_status', trans('text.status')) }} </th>
            @if(check_permission('edit_purchase_request'))
            <th> {{ trans('text.edit') }} </th>
            @endif
             @if(check_permission('delete_purchase_request'))
            <th> {{ trans('text.delete') }} </th>
            @endif </tr>
        </thead>
        <tbody>
        
        @foreach ($purchase_requests as $purchase_request)
        <tr class="odd gradeX">
          <td> {{ $purchase_request->purchase_request_id }} </td>
          <td> {{ link_to("purchase_requests/{$purchase_request->purchase_request_id}", $purchase_request->purchase_request_name) }} </td>
          <td> {{ link_to("users/{$purchase_request->user->user_id}", $purchase_request->user->user_fullname, array('target' => '_blank')) }} </td>
          <td> {{ format_date($purchase_request->purchase_request_date) }} </td>
          <td> {{ format_purchase_request_status($purchase_request->purchase_request_status) }} </td>
          @if(check_permission('edit_purchase_request'))
          <td> {{ link_to("purchase_requests/{$purchase_request->purchase_request_id}/edit", trans('text.edit')) }} </td>
          @endif
           @if(check_permission('delete_purchase_request'))
          <td> {{ link_to("purchase_requests/{$purchase_request->purchase_request_id}/delete", trans('text.delete')) }} </td>
          @endif
           </tr>
        @endforeach
          </tbody>
        
      </table>
      {{$purchase_requests->appends(Request::except('page'))->links()}}
      @else
      <p>{{ trans('text.no_purchase_request_added') }}</p>
      @endif </div>
  </div>
  <!-- END EXAMPLE TABLE PORTLET--> 
</div>
@stop