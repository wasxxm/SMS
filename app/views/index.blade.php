@extends('layouts.default')

@section('the_title')
<title>SMS - Semester Management System</title>
@stop

@section('content')
<h1>{{ link_to("departments", 'Manage Departments') }}</h1>
<h1>{{ link_to("users", 'Manage Users') }}</h1>
@stop