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
<link href="{{ URL::asset('assets/global/css/gfont.css') }}" rel="stylesheet" type="text/css"/>
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
<link href="{{ URL::asset('assets/global/plugins/jquery-tags-input/jquery.tagsinput.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('assets/global/plugins/jquery-multi-select/css/multi-select.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('assets/global/plugins/bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css"/>

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
@yield('the_head')
</head><!-- END HEAD -->