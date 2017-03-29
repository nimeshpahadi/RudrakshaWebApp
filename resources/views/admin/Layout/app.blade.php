@include('admin.Layout.header')

<div class="content-wrapper">
    <div class="content">
        @include('admin.Layout.notification')
        @yield('main-content')
    </div>
</div>


@include('admin.Layout.footer')