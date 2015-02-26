@extends('layouts.default')

@section('the_title')
@if(isset($user) && $user->count())
<title>{{ trans('text.user') }} {{ $user->user_fullname }} {{ trans('text.details') }}</title>
@else
<title>{{ trans('text.user_not_found') }}</title>
@endif
@stop

@section('body_title')
@if(isset($user) && $user->count())
<h3 class="page-title"> {{ trans('text.view_user') }} {{ $user->user_fullname }} </h3>
@else
<h3 class="page-title"> {{ trans('text.user_not_found') }} </h3>
@endif
@stop

@if(isset($user) && $user->count())
   @section('breadcrumb', Breadcrumbs::render('show_user', $user))
@endif

@section('content')
<div class="col-md-12">
<!-- BEGIN EXAMPLE TABLE PORTLET--> 
@if(isset($user) && $user->count())
<div class="portlet gren">
  <div class="portlet-title">
    <div class="caption">{{ trans('text.user') }} - {{$user->user_fullname}} </div>
    <div class="actions"> <a href='{{ url("companies/$user->user_id/edit") }}' class="btn btn-default btn-sm"> <i class="fa fa-pencil"></i> {{ trans('text.edit_user') }} </a> <a href='{{ url("users/{$user->user_id}/update_status") }}'  class="btn {{ ($user->user_status) ? 'red' : 'green' }} btn-sm"> {{ ($user->user_status) ? trans('text.disable'):trans('text.activate') }}</a> 
    
    </div>
  </div>
  <div class="portlet-body">
    <table class="table table-striped table-bordered table-hover" id="view-user">
      <tbody>
        <tr>
          <td width="106">{{ trans('text.user_label') }}</td>
          <td width="330"><strong>{{$user->user_label}}</strong></td>
        </tr>
        <tr>
          <td width="106">{{ trans('text.user_fullname') }}</td>
          <td width="330"><strong>{{$user->user_fullname}}</strong></td>
        </tr>
        <tr>
          <td>{{ trans('text.user_company_name') }}</td>
          <td><strong>{{ ($company = $user->company) ? link_to("companies/$company->company_id", $company->company_name,  ['target' => '_blank']) : '' }}</strong></td>
        </tr>
        <tr>
          <td>{{ trans('text.user_email') }}</td>
          <td><strong>{{$user->user_email}}</strong></td>
        </tr>
        <tr>
          <td>{{ trans('text.user_phone') }}</td>
          <td><strong>{{$user->user_phone}}</strong></td>
        </tr>
        <tr>
          <td>{{ trans('text.user_last_date') }}</td>
          <td><strong>{{format_date($user->user_last_login_date)}}</strong></td>
        </tr>
        <tr>
          <td>{{ trans('text.user_last_ip') }}</td>
          <td><strong>{{$user->user_last_login_ip}}</strong></td>
        </tr>
        <tr>
          <td>{{ trans('text.user_status') }}</td>
          <td>{{ ($user->user_status)? '<span class="label label-sm label-success">' . trans('text.active') . '</span>' : '<span class="label label-sm label-danger">' . trans('text.blocked') . '</span>' }}</td>
        </tr>
        <tr>
          <td>{{ trans('text.user_block_note') }}</td>
          <td><strong>{{$user->user_block_note}}</strong></td>
        </tr>
        <tr>
          <td>{{ trans('text.user_created_at') }}</td>
          <td><strong>{{format_date($user->created_at)}}</strong></td>
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