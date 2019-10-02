<!DOCTYPE html>
<html>
<head>
    <title> @yield('title')</title>

    <!-- Meta/Favicons/Fonts Section ---------------------------------------------------------------------------------->
    <meta charset="utf-8">

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('lib/fontawesome-pro-5.0.8/web-fonts-with-css/css/fa-brands.min.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('lib/fontawesome-pro-5.0.8/web-fonts-with-css/css/fa-light.min.css') }}">
	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('lib/fontawesome-pro-5.0.8/web-fonts-with-css/css/fontawesome.min.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('lib/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/main.css') }}">
    @yield('stylesheet')
</head>
<body>
    <!-- Content Section ---------------------------------------------------------------------------------------------->
    <section id="content" class="container-fluid">
        <div class="row">
            @yield('content')
        </div>
    </section>

    <!-- Scripts ------------------------------------------------------------------------------------------------------>
    <script src="{{ asset('lib/jquery/dist/jquery.min.js') }}"></script>
	<script src="{{ asset('lib/popper.js/dist/umd/popper.min.js') }}"></script>
	<script src="{{ asset('lib/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    @yield('script')
</body>
</html>