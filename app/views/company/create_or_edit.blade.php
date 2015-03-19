@extends('layouts.default')

@section('the_title')
<title>@if(isset($company)) {{ trans('text.edit_company') }} - {{ $company->company_name }} @else {{ trans('text.create_company') }} @endif</title>
@stop

@section('body_title')
<h3 class="page-title">@if(isset($company)) {{ trans('text.edit_company') }} - {{ $company->company_name }} @else {{ trans('text.create_company') }} @endif</h3>
@stop

@section('breadcrumb', Breadcrumbs::render('create_edit_company', (isset($company)) ? $company : false))

@section('content')
<div class="col-md-12"> 
  <!-- BEGIN EXAMPLE TABLE PORTLET--><!-- END EXAMPLE TABLE PORTLET-->
  <div class="portlet light bordered">
    <div class="portlet-title">
      <div class="caption"> <span class="caption-subject  bold uppercase">@if(isset($company)){{ trans('text.edit_company_details') }} @else {{ trans('text.enter_company_details') }} @endif</span> <span class="caption-helper">{{ trans('text.required_fields') }}</span> </div>
    </div>
    <div class="portlet-body form"> 
      <!-- BEGIN FORM--> 
      @if(isset($company))
      {{ Form::model($company, array('route' => array('company.update', $company->company_id), 'files' => true, 'method' => 'PUT', 'class' => 'form-horizontal')) }}
      @else
      {{ Form::open(array('route' => 'company.store', 'files' => true, 'class' => 'form-horizontal')) }}
      @endif
      <div class="form-body">
        <div class="form-group @if($errors->has('company_name')) has-error @endif"> {{ Form::label_html('company_name', trans('text.company_name').'<span class="required">*</span>', array('class' => 'col-md-3 control-label')) }}
          <div class="col-md-4"> {{ Form::text('company_name', Input::old('company_name'), array('class' => 'form-control')) }} {{ $errors->first('company_name', '<span class="help-block help-block-error">:message</span>') }}</div>
        </div>
        <div class="form-group @if($errors->has('company_reg_no')) has-error @endif"> {{ Form::label_html('company_reg_no', trans('text.company_reg_no') . '<span class="required">*</span>', array('class' => 'col-md-3 control-label')) }}
          <div class="col-md-4"> {{ Form::text('company_reg_no', Input::old('company_reg_no'), array('class' => 'form-control')) }} {{ $errors->first('company_reg_no', '<span class="help-block help-block-error">:message</span>') }}</div>
        </div>
        <div class="form-group @if($errors->has('company_country')) has-error @endif"> {{ Form::label_html('company_country', trans('text.company_country'), array('class' => 'col-md-3 control-label')) }}
          <div class="col-md-4"> {{ Form::select('company_country', array_combine(DB::table('countries')->lists('name'), DB::table('countries')->lists('name')), Input::old('company_country'), array('class' => 'form-control select2me')) }} {{ $errors->first('company_country', '<span class="help-block help-block-error">:message</span>') }}</div>
        </div>
        <div class="form-group @if($errors->has('company_city')) has-error @endif"> {{ Form::label_html('company_city', trans('text.company_city'), array('class' => 'col-md-3 control-label')) }}
          <div class="col-md-4"> {{ Form::text('company_city', Input::old('company_city'), array('class' => 'form-control')) }} {{ $errors->first('company_city', '<span class="help-block help-block-error">:message</span>') }}</div>
        </div>
        <div class="form-group @if($errors->has('company_state')) has-error @endif"> {{ Form::label_html('company_state', trans('text.company_state'), array('class' => 'col-md-3 control-label')) }}
          <div class="col-md-4"> {{ Form::text('company_state', Input::old('company_state'), array('class' => 'form-control')) }} {{ $errors->first('company_state', '<span class="help-block help-block-error">:message</span>') }}</div>
        </div>
        <div class="form-group @if($errors->has('company_address')) has-error @endif"> {{ Form::label_html('company_address', trans('text.company_address'), array('class' => 'col-md-3 control-label')) }}
          <div class="col-md-4"> {{ Form::textarea('company_address', Input::old('company_address'), ['size' => '40x3', 'class' => 'form-control']) }} {{ $errors->first('company_address', '<span class="help-block help-block-error">:message</span>') }}</div>
        </div>
        <div class="form-group @if($errors->has('company_phone')) has-error @endif"> {{ Form::label_html('company_phone', trans('text.company_phone'), array('class' => 'col-md-3 control-label')) }}
          <div class="col-md-4"> {{ Form::text('company_phone', Input::old('company_phone'), array('class' => 'form-control')) }} {{ $errors->first('company_phone', '<span class="help-block help-block-error">:message</span>') }}</div>
        </div>
        <div class="form-group @if($errors->has('company_website')) has-error @endif"> {{ Form::label_html('company_website', trans('text.company_website'), array('class' => 'col-md-3 control-label')) }}
          <div class="col-md-4"> {{ Form::text('company_website', Input::old('company_website'), array('class' => 'form-control')) }} {{ $errors->first('company_website', '<span class="help-block help-block-error">:message</span>') }}</div>
        </div>
        <div class="form-group @if($errors->has('company_email')) has-error @endif"> {{ Form::label_html('company_email', trans('text.company_email'), array('class' => 'col-md-3 control-label')) }}
          <div class="col-md-4"> {{ Form::text('company_email', Input::old('company_email'), array('class' => 'form-control')) }} {{ $errors->first('company_email', '<span class="help-block help-block-error">:message</span>') }}</div>
        </div>
        <div class="form-group @if($errors->has('company_ntn')) has-error @endif"> {{ Form::label_html('company_ntn', trans('text.company_ntn'), array('class' => 'col-md-3 control-label')) }}
          <div class="col-md-4"> {{ Form::text('company_ntn', Input::old('company_ntn'), array('class' => 'form-control')) }} {{ $errors->first('company_ntn', '<span class="help-block help-block-error">:message</span>') }}</div>
        </div>
        <div class="form-group @if($errors->has('company_vat')) has-error @endif"> {{ Form::label_html('company_vat', trans('text.company_vat'), array('class' => 'col-md-3 control-label')) }}
          <div class="col-md-4"> {{ Form::text('company_vat', Input::old('company_vat'), array('class' => 'form-control')) }} {{ $errors->first('company_vat', '<span class="help-block help-block-error">:message</span>') }}</div>
        </div>
        <div class="form-group @if($errors->has('company_currency_code')) has-error @endif"> {{ Form::label_html('company_currency_code', trans('text.company_currency_code'), array('class' => 'col-md-3 control-label')) }}
          <div class="col-md-4"> {{ Form::text('company_currency_code', Input::old('company_currency_code', 'USD'), array('class' => 'form-control')) }} {{ $errors->first('company_currency_code', '<span class="help-block help-block-error">:message</span>') }}</div>
        </div>
        <div class="form-group @if($errors->has('company_users_limit')) has-error @endif"> {{ Form::label_html('company_users_limit', trans('text.company_users_limit'), array('class' => 'col-md-3 control-label')) }}
          <div class="col-md-4"> {{ Form::text('company_users_limit', Input::old('company_users_limit', 10), array('class' => 'form-control')) }} {{ $errors->first('company_users_limit', '<span class="help-block help-block-error">:message</span>') }}</div>
        </div>
        
        <div class="form-group @if($errors->has('company_contacts')) has-error @endif"> {{ Form::label_html('company_contacts', trans('text.company_contacts'), array('class' => 'col-md-3 control-label')) }}
          <?php $company_contacts_old = ''; ?>
           @if (isset($company) && $company_contacts = Company::get_contacts($company->company_id))
          <?php $company_contact_counter = 1; ?>
          @foreach ($company_contacts as $company_contact)
             <?php $company_contacts_old .= $company_contact['name'] . ", " .  $company_contact['title'] . ", " .  $company_contact['email']  ?>
             @if ($company_contact_counter != count($company_contacts))
             <?php $company_contacts_old .= "\n"; ?>
             @endif
             <?php $company_contact_counter ++; ?>
          @endforeach
          @endif
          <div class="col-md-4"> {{ Form::textarea('company_contacts', Input::old('company_contacts', $company_contacts_old), ['size' => '40x5', 'class' => 'form-control']) }} <p class="help-block">{{ trans('text.company_contacts_help') }}</p> {{ $errors->first('company_contacts', '<span class="help-block help-block-error">:message</span>') }}</div>
        </div>
        
        <div class="form-group last @if($errors->has('company_logo_uri')) has-error @endif"> {{ Form::label_html('company_logo_uri', trans('text.company_logo'), array('class' => 'col-md-3 control-label')) }}
          <div class="col-md-4"> {{ Form::file('company_logo_uri') }} {{ $errors->first('company_logo_uri', '<span class="help-block help-block-error">:message</span>') }}
            <p class="help-block">{{ trans('text.logo_type_req') }}<br>
              {{ trans('text.image_dim_reqs') }} {{ Setting::get('company_logo_width') }}px {{trans('text.by')}} {{ Setting::get('company_logo_height') }}px</p>
            @if(isset($company) && $company->company_logo_uri)
            <p><img src="{{url('uploads/companies/' . $company->company_logo_uri)}}"/></p>
            @endif </div>
        </div>
      </div>
      <div class="form-actions">
        <div class="row">
          <div class="col-md-offset-3 col-md-9">
            <button type="submit" class="btn green">@if(isset($company)) {{ trans('text.edit_company') }} @else {{ trans('text.create_company') }} @endif</button>
            {{ link_to('company', trans('text.cancel'), ['class' => 'btn default']) }} </div>
        </div>
      </div>
      {{ Form::close() }} 
      <!-- END FORM--> 
    </div>
  </div>
</div>
@stop