<!DOCTYPE html>
<html lang="zxx" class="js">
<head>
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Site Title  -->
    {!! SEO::generate() !!}
    <!-- Bundle and Base CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor.bundle.css?ver=141') }}" >
    <link rel="stylesheet" href="{{ asset('assets/css/style.css?ver=141') }}" >
    <link rel="stylesheet" href="{{ asset('assets/css/theme.css?ver=141') }}" >

</head>

<body class="body-wider">
<div class="preloader preloader-florida"><span class="spinner spinner-alt"><img class="spinner-brand" srcset="{{ asset('assets/images/logo-white.png') }}"  alt=""></span></div>

@include('layouts.navbar')
<div>
    @yield('content')
</div>
@include('layouts.footer')

<!-- JavaScript -->
<script src="{{ asset('assets/js/jquery.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
@yield('scripts')
</body>
</html>

