<!DOCTYPE html>
<html lang="zxx" class="js">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}">
    <!-- Site Title  -->
    <title>Genox - Creative Agency &amp; Digital Web Agency Multipurpose HTML Template</title>
    <!-- Bundle and Base CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor.bundle.css?ver=141') }}" >
    <link rel="stylesheet" href="{{ asset('assets/css/style.css?ver=141') }}" >
    <link rel="stylesheet" href="{{ asset('assets/css/theme.css?ver=141') }}" >
</head>

<body class="body-wider">
@include('layouts.navbar')
@yield('content')
@include('layouts.footer')
</body>
</html>
