@include('layouts/header')
<body class="login">
<!-- BEGIN LOGO -->
<div class="logo"> @include('layouts/logo') </div>
<!-- BEGIN CONTAINER -->
<div class="content"> 
@if(Session::has('alert'))
    <div class="alert alert-{{ Session::get('alert_type', 'success') }} alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
    {{ Session::get('alert') }} </div>
@endif 
  @yield('content') </div>
<!-- END CONTAINER --> 
@include('layouts/box-footer')
