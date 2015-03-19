@extends('layouts.default')

@section('the_title')
@if(isset($permission_set) && $permission_set->count())
<title>{{ trans('text.view_permission_set') }} {{ $permission_set->permission_set_name }}</title>
@else
<title>{{ trans('text.permission_set_not_found') }}</title>
@endif
@stop

@section('body_title')
@if(isset($permission_set) && $permission_set->count())
<h3 class="page-title"> {{ trans('text.view_permission_set') }} {{ $permission_set->permission_set_name }} </h3>
@else
<h3 class="page-title"> {{ trans('text.permission_set_not_found') }} </h3>
@endif
@stop

@if(isset($permission_set) && $permission_set->count())
   @section('breadcrumb', Breadcrumbs::render('show_permission_set', $permission_set))
@endif

@section('content')
<div class="col-md-12">
<!-- BEGIN EXAMPLE TABLE PORTLET--> 
@if(isset($permission_set) && $permission_set->count())
<div class="portlet gren">
  <div class="portlet-title">
    <div class="caption">{{ trans('text.permission_set') }} - {{$permission_set->permission_set_name}} </div>
    <div class="actions"> @if(check_permission('edit_permission_set'))<a href='{{ url("permissions/$permission_set->permission_set_id/edit") }}' class="btn btn-default btn-sm"> <i class="fa fa-pencil"></i> {{ trans('text.edit_permission_set') }} </a>@endif @if(check_permission('delete_permission_set'))<a href='{{ url("permissions/{$permission_set->permission_set_id}/delete") }}'  class="btn red btn-sm"> {{ trans('text.delete') }}</a> @endif
    
    </div>
  </div>
  <div class="portlet-body">
    <table class="table table-striped table-bordered table-hover" id="view-user">
      <tbody>
        <tr>
          <td width="106">{{ trans('text.permission_set_name') }}</td>
          <td width="330"><strong>{{$permission_set->permission_set_name}}</strong></td>
        </tr>
        <tr>
          <td width="106">{{ trans('text.permissions') }}</td>
          <td width="330"><strong>{{ Permission::get_str_formatted($permission_set->permission_ids) }}</strong></td>
        </tr>
         <tr>
          <td width="106">{{ trans('text.permission_set_desc') }}</td>
          <td width="330"><strong>{{ $permission_set->permission_set_desc }}</strong></td>
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