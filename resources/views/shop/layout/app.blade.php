@include('shop.layout.header')

<div class="content-wrapper">
    <div class="content">
        @include('shop.layout.notification')
        @yield('main-content')
    </div>
</div>


@include('shop.layout.footer')