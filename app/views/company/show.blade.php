@extends('layouts.default')

@section('the_title')
@if(isset($company))
<title>{{ trans('text.company') }} {{ $company->company_name }} {{ trans('text.details') }}</title>
@else
<title>{{ trans('text.company_not_found') }}</title>
@endif
@stop

@section('body_title')
@if(isset($company))
<h3 class="page-title"> {{ trans('text.manage_company') }} {{ $company->company_name }} </h3>
@else
<h3 class="page-title"> {{ trans('text.company_not_found') }} </h3>
@endif
@stop

@if(isset($company))
   @section('breadcrumb', Breadcrumbs::render('show_company', $company))
@endif

@section('content')
<div class="col-md-12">
<!-- BEGIN EXAMPLE TABLE PORTLET--> 
@if(isset($company))
<div class="portlet gren">
  <div class="portlet-title">
    <div class="caption">{{ trans('text.company') }} - {{$company->company_name}} </div>
    <div class="actions"> @if(check_permission('edit_company'))<a href='{{ url("company/$company->company_id/edit") }}' class="btn btn-default btn-sm"> <i class="fa fa-pencil"></i> {{ trans('text.edit_company') }} </a> @endif
    
    </div>
  </div>
  <div class="portlet-body">
    <table class="table table-striped table-bordered table-hover" id="view-company">
      <tbody>
        <tr class="odd gradeX">
          <td width="106">{{ trans('text.company_name') }}</td>
          <td width="330"><strong>{{$company->company_name}}</strong></td>
        </tr>
        <tr>
          <td>{{ trans('text.company_reg_no') }}</td>
          <td><strong>{{$company->company_reg_no}}</strong></td>
        </tr>
        <tr>
          <td>{{ trans('text.company_contacts') }}</td>
          <td>
          @if ($company_contacts = Company::get_contacts($company->company_id))
          <ol>
          <?php $company_contact_counter = 1; ?>
          @foreach ($company_contacts as $company_contact)
             <li>
             {{ trans('text.name') }}: <strong>{{ $company_contact['name'] }}</strong><br>
             {{ trans('text.title') }}: <strong>{{ $company_contact['title'] }}</strong><br>
             {{ trans('text.email') }}: <strong><a href="mailto:{{ $company_contact['email'] }}">{{ $company_contact['email'] }}</a></strong><br>
             @if ($company_contact_counter != count($company_contacts))<hr>@endif
             <?php $company_contact_counter ++; ?>
             </li>
          @endforeach
          </ol>
          @endif
          </td>
        </tr>
        <tr>
          <td>{{ trans('text.company_country') }}</td>
          <td><strong>{{$company->company_country}}</strong></td>
        </tr>
        <tr>
          <td>{{ trans('text.company_city') }}</td>
          <td><strong>{{$company->company_city}}</strong></td>
        </tr>
        <tr>
          <td>{{ trans('text.company_state') }}</td>
          <td><strong>{{$company->company_state}}</strong></td>
        </tr>
        <tr>
          <td>{{ trans('text.company_address') }}</td>
          <td><strong>{{$company->company_address}}</strong></td>
        </tr>
        <tr>
          <td>{{ trans('text.company_phone') }}</td>
          <td><strong>{{$company->company_phone}}</strong></td>
        </tr>
        <tr>
          <td>{{ trans('text.company_website') }}</td>
          <td><strong>{{$company->company_website}}</strong></td>
        </tr>
        <tr>
          <td>{{ trans('text.company_email') }}</td>
          <td><strong>{{$company->company_email}}</strong></td>
        </tr>
        <tr>
          <td>{{ trans('text.company_ntn') }}</td>
          <td><strong>{{$company->company_ntn}}</strong></td>
        </tr>
        <tr>
          <td>{{ trans('text.company_vat') }}</td>
          <td><strong>{{$company->company_vat}}</strong></td>
        </tr>
        <tr>
          <td>{{ trans('text.company_notes') }}</td>
          <td><strong>{{$company->company_notes}}</strong></td>
        </tr>
        <tr>
          <td>{{ trans('text.company_users_limit') }}</td>
          <td><strong>{{$company->company_users_limit}}</strong></td>
        </tr>
        <tr>
          <td>{{ trans('text.company_currency_code') }}</td>
          <td><strong>{{$company->company_currency_code}}</strong></td>
        </tr>
        <tr>
          <td>{{ trans('text.company_added_date') }}</td>
          <td><strong>{{format_date($company->created_at)}}</strong></td>
        </tr>
        <tr>
          <td>{{ trans('text.company_status') }}</td>
          <td><strong>{{ ($company->company_status)? '<span class="label label-sm label-success">'  . trans('text.active') . '</span>' : '<span class="label label-sm label-danger">' . trans('text.disabled') . '</span>' }}</strong></td>
        </tr>
        <tr>
          <td>{{ trans('text.company_logo') }}</td>
          <td>@if($company->company_logo_uri) <img src="{{url('uploads/companies/' . $company->company_logo_uri)}}"/> @endif</strong></td>
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