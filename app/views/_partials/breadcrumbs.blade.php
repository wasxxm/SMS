@if ($breadcrumbs)
    <ul class="page-breadcrumb">
    <li> <i class="fa fa-home"></i> Dashboard <i class="fa fa-angle-right"></i> </li>
        @foreach ($breadcrumbs as $breadcrumb)
            @if (!$breadcrumb->last)
                <li><a href="{{{ $breadcrumb->url }}}">{{{ $breadcrumb->title }}}</a> <i class="fa fa-angle-right"></i></li>
            @else
                <li class="active">{{{ $breadcrumb->title }}}</li>
            @endif
        @endforeach
    </ul>
@endif