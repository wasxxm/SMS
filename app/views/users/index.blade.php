@extends('layouts.default')

@section('the_title')
<title>{{ trans('text.manage_users') }}</title>
@stop

@section('body_title')
<h3 class="page-title"> {{ trans('text.users') }} <small>{{ trans('text.manage_users') }}</small> </h3>
@stop

@section('breadcrumb')
<ul class="page-breadcrumb">
  <li> <i class="fa fa-home"></i> {{ link_to('/', trans('text.dashboard')); }} <i class="fa fa-angle-right"></i> </li>
  <li> {{ trans('text.users') }} </li>
</ul>
@stop

@section('content')
<div class="col-md-12"> 
  <!-- BEGIN EXAMPLE TABLE PORTLET-->
  <div class="portlet box grey-cascade">
    <div class="portlet-title">
      <div class="caption">{{ trans('text.users') }} </div>
      <div class="tools"> <a href="javascript:;" class="collapse"> </div>
    </div>
    <div class="portlet-body">
      <div class="table-toolbar">
        <div class="row">
          <div class="col-md-6">
            <div class="btn-group"> <a id="sample_editable_1_new" class="btn green" href="{{ url('users/create') }}"> {{ trans('text.add_user') }} <i class="fa fa-plus"></i> </a> </div>
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
      @if ($users->count())
      <table class="table table-striped table-bordered table-hover" id="users">
        <thead>
          <tr>
            <th> {{ SortableTrait::link_to_sorting_action('user_id', trans('text.id')) }} </th>
            <th> {{ SortableTrait::link_to_sorting_action('user_fullname', trans('text.name')) }} </th>
            <th> {{ SortableTrait::link_to_sorting_action('user_company_id', trans('text.company_name')) }} </th>
            <th> {{ SortableTrait::link_to_sorting_action('user_email', trans('text.email')) }} </th>
            <th> {{ SortableTrait::link_to_sorting_action('created_at', trans('text.register_date')) }} </th>
            <th> {{ trans('text.edit') }} </th>
            <th> {{ trans('text.status') }} </th>
          </tr>
        </thead>
        <tbody>
        
        @foreach ($users as $user)
        <tr class="odd gradeX">
          <td> {{ $user->user_id }} </td>
          <td> {{ link_to("users/{$user->user_id}", $user->user_fullname) }} </td>
          <td> {{ (($company = $user->company) ? link_to("companies/$company->company_id", $company->company_name, ['target' => '_blank']) : '') }} </td>
          <td><a href="mailto:{{ $user->user_email }}"> {{ $user->user_email }} </a></td>
          <td> {{ format_date($user->created_at) }} </td>
          <td> {{ link_to("users/{$user->user_id}/edit", trans('text.edit')) }} </td>
          <td>{{ ($user->user_status)? '<span class="label label-sm label-success">' . trans('text.active') . '</span>' : '<span class="label label-sm label-danger">' . trans('text.blocked') . '</span>' }}&nbsp; &nbsp; {{ link_to("users/{$user->user_id}/update_status", ($user->user_status) ? trans('text.block'):trans('text.activate')) }}</td>
        </tr>
        @endforeach
          </tbody>
        
      </table>
      {{$users->appends(Request::except('page'))->links()}}
      @else
      <p>{{ trans('text.no_user_added') }}</p>
      @endif </div>
  </div>
  <!-- END EXAMPLE TABLE PORTLET--> 
</div>
@stop