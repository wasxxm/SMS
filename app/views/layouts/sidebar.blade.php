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
  
  @if (check_permission('view_department'))
  <li class="{{ HTML::menu_active('departments') }}"> <a href="{{ url('departments') }}"> <span class="title">{{ trans('text.departments') }}</span> <span class="arrow {{ HTML::menu_active('departments') }}"></span> </a>
    <ul class="sub-menu">
      <li class="{{ HTML::menu_active('departments', true) }}"> <a href="{{ url('departments') }}"> <span class="title">{{ trans('text.manage_departments') }}</span> </a></li>
      @if (check_permission('create_department'))
      <li class="{{ HTML::menu_active('departments/create') }}"> <a href="{{ url('departments/create') }}"> <span class="title">{{ trans('text.create_department') }}</span> </a></li>
      @endif
    </ul>
  </li>
  @endif
  
    @if (check_permission('view_study_program'))
  <li class="{{ HTML::menu_active('study_programs') }}"> <a href="{{ url('study_programs') }}"> <span class="title">{{ trans('text.study_programs') }}</span> <span class="arrow {{ HTML::menu_active('study_programs') }}"></span> </a>
    <ul class="sub-menu">
      <li class="{{ HTML::menu_active('study_programs', true) }}"> <a href="{{ url('study_programs') }}"> <span class="title">{{ trans('text.view_study_programs') }}</span> </a></li>
      @if (check_permission('create_study_program'))
      <li class="{{ HTML::menu_active('study_programs/create') }}"> <a href="{{ url('study_programs/create') }}"> <span class="title">{{ trans('text.create_study_program') }}</span> </a></li>
      @endif
    </ul>
  </li>
  @endif
  
  @if (check_permission('view_batch'))
  <li class="{{ HTML::menu_active('batches') }}"> <a href="{{ url('batches') }}"> <span class="title">{{ trans('text.batches') }}</span> <span class="arrow {{ HTML::menu_active('batches') }}"></span> </a>
    <ul class="sub-menu">
      <li class="{{ HTML::menu_active('batches', true) }}"> <a href="{{ url('batches') }}"> <span class="title">{{ trans('text.view_batch') }}</span> </a></li>
      @if (check_permission('create_batch'))
      <li class="{{ HTML::menu_active('batches/create') }}"> <a href="{{ url('batches/create') }}"> <span class="title">{{ trans('text.create_batch') }}</span> </a></li>
      @endif
    </ul>
  </li>
  @endif
  
  @if (check_permission('view_section'))
  <li class="{{ HTML::menu_active('sections') }}"> <a href="{{ url('sections') }}"> <span class="title">{{ trans('text.sections') }}</span> <span class="arrow {{ HTML::menu_active('sections') }}"></span> </a>
    <ul class="sub-menu">
      <li class="{{ HTML::menu_active('sections', true) }}"> <a href="{{ url('sections') }}"> <span class="title">{{ trans('text.view_sections') }}</span> </a></li>
      @if (check_permission('create_section'))
      <li class="{{ HTML::menu_active('sections/create') }}"> <a href="{{ url('sections/create') }}"> <span class="title">{{ trans('text.create_section') }}</span> </a></li>
      @endif
    </ul>
  </li>
  @endif
  
  @if (check_permission('view_user'))
  <li class="{{ HTML::menu_active('users') }}"> <a href="{{ url('users') }}"> <span class="title">{{ trans('text.users') }}</span> <span class="arrow {{ HTML::menu_active('users') }}"></span> </a>
    <ul class="sub-menu">
      <li class="{{ HTML::menu_active('users', true) }}"> <a href="{{ url('users') }}"> <span class="title">{{ trans('text.manage_users') }}</span> </a></li>
      @if (check_permission('create_user'))
      <li class="{{ HTML::menu_active('users/create') }}"> <a href="{{ url('users/create') }}"> <span class="title">{{ trans('text.create_user') }}</span> </a></li>
      @endif
    </ul>
  </li>
  @endif
  
  @if (check_permission('view_permission_set'))
  <li class="{{ HTML::menu_active('permissions') }}"> <a href="{{ url('permissions') }}"> <span class="title">{{ trans('text.permissions') }}</span> <span class="arrow {{ HTML::menu_active('permissions') }}"></span> </a>
    <ul class="sub-menu">
      <li class="{{ HTML::menu_active('permissions', true) }}"> <a href="{{ url('permissions') }}"> <span class="title">{{ trans('text.manage_permission_sets') }}</span> </a></li>
      @if (check_permission('create_permission_set'))
      <li class="{{ HTML::menu_active('permissions/create') }}"> <a href="{{ url('permissions/create') }}"> <span class="title">{{ trans('text.create_permission') }}</span> </a></li>
      @endif
    </ul>
  </li>
  @endif
</ul>
