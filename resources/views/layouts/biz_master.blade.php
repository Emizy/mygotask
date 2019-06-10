<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
    <meta charset="UTF-8">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap 4.1.3 -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Animate Css -->
    <link rel="stylesheet" href="{{ asset('css/plugins/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">
    <!-- Google Font -->
    <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900"
            rel="stylesheet">
    <!-- Font Awesome -->
    <link
            href="../../stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
            rel="stylesheet">
    <!-- Slick Slider -->
    <link rel="stylesheet" href="{{ asset('css/plugins/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/slick-theme.css') }}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('css/plugins/magnific-popup.css') }}">
    <!-- Main Style -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <script src="{{ asset('js/plugins/jquery-3.3.1.min.js') }}"></script>
    <meta content="{{ Session::get('description') }}" name="description">
    @yield('title')
</head>
<body>
<!-- Page Loading -->
<div class="se-pre-con"></div>
<!-- ======== Start Navbar ======== -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('img/logo4.png') }}" alt="logo"></a>
        <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Contact</a>
                </li>

            </ul>
            <a href="{{ route('biz.login') }}" class="btn-1">Free Try</a>
        </div>
    </div>
</nav>

@yield('content')


<!-- ======== Start Footer ======== -->
<footer class="footer">
    <div class="container text-center">
        <img src="{{ asset('img/logo-white.png') }}" alt="">
        <p>© 2018 MyGoTask. All rights reserved.</p>
    </div>
</footer>
<!-- ======== End Footer ======== -->

<!-- ======== Java Script ======== -->

<!-- Bootstrap 4.1.3 -->
<script src="{{ asset('js/plugins/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- Slick Slider -->
<script src="{{ asset('js/plugins/slick.min.js') }}"></script>
<!-- Couner Up-->
<script src="{{ asset('js/plugins/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('js/plugins/jquery.counterup.min.js') }}"></script>
<!-- Wow JS -->
<script src="{{ asset('js/plugins/wow.min.js') }}"></script>
<!-- Magnific Popup-->
<script src="{{ asset('js/plugins/magnific-popup.min.js') }}"></script>
<!-- Main Js-->
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>