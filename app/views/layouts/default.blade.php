@include('layouts.header')
<!-- BEGIN BODY -->
<body class="page-header-fixed page-quick-sidebar-over-content">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top"> 
  <!-- BEGIN HEADER INNER -->
  <div class="page-header-inner"> 
    <!-- BEGIN LOGO -->
    <div class="page-logo"> @include('layouts.logo')
      <div class="menu-toggler sidebar-toggler hide"> 
        <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header --> 
      </div>
    </div>
    <!-- END LOGO --> 
    <!-- BEGIN RESPONSIVE MENU TOGGLER --> 
    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a> 
    <!-- END RESPONSIVE MENU TOGGLER --> 
    <!-- BEGIN TOP NAVIGATION MENU -->
    <div class="top-menu">
      <ul class="nav navbar-nav pull-right">
        <!-- BEGIN USER LOGIN DROPDOWN -->
        <li class="dropdown dropdown-user"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
@if(!Auth::user()->user_profile_pic_uri)
<?php Auth::user()->user_profile_pic_uri = 'profile_pic.jpg'; ?>
@endif
<img alt="" class="img-circle hide1" src="{{url('uploads/profiles/' . Auth::user()->user_profile_pic_uri)}}"/> <span class="username username-hide-on-mobile"> {{ Auth::user()->user_fullname }} </span> <i class="fa fa-angle-down"></i> </a>
          <ul class="dropdown-menu">
            <li> <a href="{{ url('users/' . Auth::id()) }}"> <i class="fa fa-user"></i> My Profile </a> </li>
            <li> <a href="{{ url('logout') }}"> <i class="fa fa-key"></i> Log Out </a> </li>
          </ul>
        </li>
        <!-- END USER LOGIN DROPDOWN -->
      </ul>
    </div>
    <!-- END TOP NAVIGATION MENU --> 
  </div>
  <!-- END HEADER INNER --> 
</div>
<!-- END HEADER -->
<div class="clearfix"> </div>
<!-- BEGIN CONTAINER -->
<div class="page-container"> 
  <!-- BEGIN SIDEBAR -->
  <div class="page-sidebar-wrapper"> 
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing --> 
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse"> 
      <!-- BEGIN SIDEBAR MENU -->
      @include('layouts/sidebar')
      <!-- END SIDEBAR MENU --> 
    </div>
  </div>
  <!-- END SIDEBAR --> 
  <!-- BEGIN CONTENT -->
  <div class="page-content-wrapper">
    <div class="page-content"> 
      <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
      <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
              <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body"> Widget settings form goes here </div>
            <div class="modal-footer">
              <button type="button" class="btn blue">Save changes</button>
              <button type="button" class="btn default" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content --> 
        </div>
        <!-- /.modal-dialog --> 
      </div>
      <!-- /.modal --> 
      <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM--> 
      <!-- BEGIN PAGE HEADER--> 
      @yield('body_title')
      <div class="page-bar"> @yield('breadcrumb')
        <div class="page-toolbar"> 
          <!--<div id="dashboard-report-range" class="pull-right tooltips btn btn-fit-height grey-salt" data-placement="top" data-original-title="Change dashboard date range"> <i class="icon-calendar"></i>&nbsp; <span class="thin uppercase visible-lg-inline-block"></span>&nbsp; <i class="fa fa-angle-down"></i> </div>--> 
        </div>
      </div>
      @if(Session::has('alert'))
      <div class="alert alert-{{ Session::get('alert_type', 'success') }} alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
        {{ Session::get('alert') }} </div>
      @endif 
      <!-- END PAGE HEADER--> 
      <!-- BEGIN DASHBOARD STATS -->
      <div class="row"> @yield('content') </div>
      <!-- END DASHBOARD STATS -->
      <div class="clearfix"> </div>
      <div class="clearfix"> </div>
      <div class="clearfix"> </div>
      <div class="clearfix"> </div>
      <div class="clearfix"> </div>
    </div>
  </div>
  <!-- END CONTENT --> 
</div>
<!-- END CONTAINER --> 
@include('layouts/footer')