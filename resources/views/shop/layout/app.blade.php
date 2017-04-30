@include('shop.layout.header')
@if(Request::path()=="/")
@include('shop.layout.banner')
@endif
<div class="content-wrapper">
    <div class="content">
        @include('shop.layout.notification')
        @yield('main-content')
    </div>
</div>


@include('shop.layout.footer')