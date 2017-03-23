@extends('layouts.app')

@section('content')

    <nav>
        <div class="nav-wrapper">
            <a href="#!" class="brand-logo">Rudraksha</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="/category">Category</a></li>
                <li><a href="/product">Product</a></li>
                <li><a href="/customer">User Profile</a></li>
                <li><a href="/customer">Cart</a></li>
                <li><a href="/customer">Address</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li><a href="/category">Category</a></li>
                <li><a href="/product">Product</a></li>
                <li><a href="/customer">User Profile</a></li>
            </ul>
        </div>
    </nav>


@endsection
<script>
    $(".button-collapse").sideNav();


</script>