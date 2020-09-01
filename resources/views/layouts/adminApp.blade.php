@include('admin.partials.head')
@include('admin.partials.header')
@include('admin.partials.leftSideBar')

@yield('page-title')

<div class="am-mainpanel">
    <div class="am-pagebody">
        @yield('content')
    </div>
</div>
@include('admin.partials.foot')
