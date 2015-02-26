<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js') }}"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js') }}"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js') }}">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
@yield('the_title')
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('assets/global/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link href="{{ URL::asset('assets/global/plugins/gritter/css/jquery.gritter.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('assets/global/plugins/fullcalendar/fullcalendar/fullcalendar.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('assets/global/plugins/jqvmap/jqvmap/jqvmap.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('assets/global/plugins/select2/select2.css') }}" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
<link href="{{ URL::asset('assets/admin/pages/css/tasks.css') }}" rel="stylesheet" type="text/css"/>
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="{{ URL::asset('assets/global/css/components.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('assets/global/css/plugins.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('assets/admin/layout/css/layout.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('assets/admin/layout/css/themes/default.css') }}" rel="stylesheet" type="text/css" id="style_color"/>
<link href="{{ URL::asset('assets/admin/layout/css/custom.css') }}" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head><!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-header-fixed page-quick-sidebar-over-content">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top"> 
  <!-- BEGIN HEADER INNER -->
  <div class="page-header-inner"> 
    <!-- BEGIN LOGO -->
    <div class="page-logo"> <a href="{{ url('/') }}"> <img src="{{ URL::asset('assets/admin/layout/img/logo.png') }}" alt="logo" class="logo-default"/> </a>
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
        <li class="dropdown dropdown-user"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> <img alt="" class="img-circle hide1" src="{{ URL::asset('assets/admin/layout/img/avatar3_small.jpg') }}"/> <span class="username username-hide-on-mobile"> Bob </span> <i class="fa fa-angle-down"></i> </a>
          <ul class="dropdown-menu">
            <li> <a href="extra_profile.html"> <i class="icon-user"></i> My Profile </a> </li>
            <li> <a href="page_calendar.html"> <i class="icon-calendar"></i> My Calendar </a> </li>
            <li> <a href="inbox.html"> <i class="icon-envelope-open"></i> My Inbox <span class="badge badge-danger"> 3 </span> </a> </li>
            <li> <a href="#"> <i class="icon-rocket"></i> My Tasks <span class="badge badge-success"> 7 </span> </a> </li>
            <li class="divider"> </li>
            <li> <a href="extra_lock.html"> <i class="icon-lock"></i> Lock Screen </a> </li>
            <li> <a href="login.html"> <i class="icon-key"></i> Log Out </a> </li>
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
      <ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
        <li class="sidebar-toggler-wrapper"> 
          <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
          <div class="sidebar-toggler"> </div>
          <!-- END SIDEBAR TOGGLER BUTTON --> 
        </li>
        <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
        <li class="sidebar-search-wrapper"> 
          <!-- BEGIN RESPONSIVE QUICK SEARCH FORM --> 
          <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box --> 
          <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
          <form class="sidebar-search " action="#" method="POST">
            <a href="javascript:;" class="remove"> <i class="icon-close"></i> </a>
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search...">
              <span class="input-group-btn"> <a href="javascript:;" class="btn submit"><i class="fa fa-search"></i></a> </span> </div>
          </form>
          <!-- END RESPONSIVE QUICK SEARCH FORM --> 
        </li>
        <li class="{{ HTML::menu_active('/') }}"> <a href="{{ url('/') }}"> <span class="title">{{ trans('text.dashboard') }}</span> <span class="selected"></span> </a> </li>
        <li class="{{ HTML::menu_active('departments') }}"> <a href="{{ url('departments') }}"> <span class="title">Departments</span> <span class="arrow {{ HTML::menu_active('companies') }}"></span> </a>
          <ul class="sub-menu">
            <li class="{{ HTML::menu_active('departments', true) }}"> <a href="{{ url('departments') }}"> <span class="title">Manage Departments</span> </a></li>
            <li class="{{ HTML::menu_active('departments/create') }}"> <a href="{{ url('departments/create') }}"> <span class="title">Create Departments</span> </a></li>
          </ul>
        </li>
        <li class="{{ HTML::menu_active('users') }}"> <a href="{{ url('users') }}"> <span class="title">{{ trans('text.users') }}</span> <span class="arrow {{ HTML::menu_active('users') }}"></span> </a>
          <ul class="sub-menu">
            <li class="{{ HTML::menu_active('users', true) }}"> <a href="{{ url('users') }}"> <span class="title">{{ trans('text.manage_users') }}</span> </a></li>
            <li class="{{ HTML::menu_active('users/create') }}"> <a href="{{ url('users/create') }}"> <span class="title">{{ trans('text.create_user') }}</span> </a></li>
          </ul>
        </li>
      </ul>
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
<!-- BEGIN FOOTER -->
<div class="page-footer">
  <div class="page-footer-inner"> 2015 &copy; villeNegocios </div>
  <div class="page-footer-tools"> <span class="go-top"> <i class="fa fa-angle-up"></i> </span> </div>
</div>
<!-- END FOOTER --> 
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) --> 
<!-- BEGIN CORE PLUGINS --> 
<!--[if lt IE 9]>
<script src="{{ URL::asset('assets/global/plugins/respond.min.js') }}"></script>
<script src="{{ URL::asset('assets/global/plugins/excanvas.min.js') }}"></script> 
<![endif]--> 
<script src="{{ URL::asset('assets/global/plugins/jquery-1.11.0.min.js') }}" type="text/javascript"></script> 
<script src="{{ URL::asset('assets/global/plugins/jquery-migrate-1.2.1.min.js') }}" type="text/javascript"></script> 
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip --> 
<script src="{{ URL::asset('assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js') }}" type="text/javascript"></script> 
<script src="{{ URL::asset('assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script> 
<script src="{{ URL::asset('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}" type="text/javascript"></script> 
<script src="{{ URL::asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script> 
<script src="{{ URL::asset('assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script> 
<script src="{{ URL::asset('assets/global/plugins/jquery.cokie.min.js') }}" type="text/javascript"></script> 
<script src="{{ URL::asset('assets/global/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script> 
<script src="{{ URL::asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script> 
<!-- END CORE PLUGINS --> 
<!-- BEGIN PAGE LEVEL PLUGINS --> 
<script src="{{ URL::asset('assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js') }}" type="text/javascript"></script> 
<script src="{{ URL::asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js') }}" type="text/javascript"></script> 
<script src="{{ URL::asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js') }}" type="text/javascript"></script> 
<script src="{{ URL::asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js') }}" type="text/javascript"></script> 
<script src="{{ URL::asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js') }}" type="text/javascript"></script> 
<script src="{{ URL::asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js') }}" type="text/javascript"></script> 
<script src="{{ URL::asset('assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js') }}" type="text/javascript"></script> 
<script src="{{ URL::asset('assets/global/plugins/flot/jquery.flot.min.js') }}" type="text/javascript"></script> 
<script src="{{ URL::asset('assets/global/plugins/flot/jquery.flot.resize.min.js') }}" type="text/javascript"></script> 
<script src="{{ URL::asset('assets/global/plugins/flot/jquery.flot.categories.min.js') }}" type="text/javascript"></script> 
<script src="{{ URL::asset('assets/global/plugins/jquery.pulsate.min.js') }}" type="text/javascript"></script> 
<script src="{{ URL::asset('assets/global/plugins/bootstrap-daterangepicker/moment.min.js') }}" type="text/javascript"></script> 
<script src="{{ URL::asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js') }}" type="text/javascript"></script> 
<!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support --> 
<script src="{{ URL::asset('assets/global/plugins/fullcalendar/fullcalendar/fullcalendar.min.js') }}" type="text/javascript"></script> 
<script src="{{ URL::asset('assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js') }}" type="text/javascript"></script> 
<script src="{{ URL::asset('assets/global/plugins/jquery.sparkline.min.js') }}" type="text/javascript"></script> 
<script src="{{ URL::asset('assets/global/plugins/gritter/js/jquery.gritter.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/select2/select2.min.js') }}" type="text/javascript"></script>  
<!-- END PAGE LEVEL PLUGINS --> 
<!-- BEGIN PAGE LEVEL SCRIPTS --> 
<script src="{{ URL::asset('assets/global/scripts/metronic.js') }}" type="text/javascript"></script> 
<script src="{{ URL::asset('assets/admin/layout/scripts/layout.js') }}" type="text/javascript"></script> 
<script src="{{ URL::asset('assets/admin/layout/scripts/demo.js') }}" type="text/javascript"></script> 
<script src="{{ URL::asset('assets/admin/pages/scripts/index.js') }}" type="text/javascript"></script> 
<script src="{{ URL::asset('assets/admin/pages/scripts/tasks.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/admin/pages/scripts/components-dropdowns.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS --> 
<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   //QuickSidebar.init(); // init quick sidebar
   Demo.init(); // init demo features 
   Index.init();   
   Index.initDashboardDaterange();
   Index.initJQVMAP(); // init index page's custom scripts
   Index.initCalendar(); // init index page's custom scripts
   Index.initCharts(); // init index page's custom scripts
   Index.initChat();
   Index.initMiniCharts();
   //Index.initIntro();
   Tasks.initDashboardWidget();
   ComponentsDropdowns.init();
});
</script> 
<!-- END JAVASCRIPTS -->
</body>

<!-- END BODY -->
</html>