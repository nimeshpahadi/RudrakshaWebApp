<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> {{ config('app.name') }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
    {!! Html::style('css/bootstrap.min.css') !!}
    <!-- Font Awesome -->
    {!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css') !!}
    <!-- Ionicons -->
    {!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css') !!}
    <!-- Theme style -->
    {!! Html::style('css/AdminLTE.min.css') !!}
    {!! Html::style('css/_all-skins.min.css') !!}
    {!! Html::style('css/custom.css') !!}





    <script>
        var app_url = "{{Request::root()}}";
    </script>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <a href="/home" class="logo">
            <span class="logo-mini"><b>A</b>LTE</span>
            <span class="logo-lg"><b>Admin</b>LTE</span>
        </a>
        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </ul>
            </div>
        </nav>
    </header>
    <aside class="main-sidebar">
        <section class="sidebar">



            <li class="active">
                <a href="/admin/category">
                    <i class="fa fa-dashboard"></i> <span>Category</span>
                </a>
            </li>
            <li class="active">
                <a href="/admin/products">
                    <i class="fa fa-dashboard"></i> <span>Product</span>
                </a>
            </li>
            <li class="active">
                <a href="/admin/capping">
                    <i class="fa fa-dashboard"></i> <span>Capping</span>
                </a>
            </li>
            <li class="active">
                <a href="/admin/customer">
                    <i class="fa fa-dashboard"></i> <span>Customer</span>
                </a>
            </li>


        </section>

    </aside>

