<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Компания Терминал</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
    <link rel="stylesheet" href="{{ env('MIX_URL_SITE') }}/css/style.css?11122345121112222">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="shortcut icon" href="/images/favicon_term.png" type="image/png">

    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script>window.html5 || document.write('<script src="js/vendor/html5shiv.js"><\/script>')</script>
    <![endif]-->
</head>
<body>
<div id="app">
    @yield('content')
</div>

<script src="{{ env('MIX_URL_SITE') }}/js/vendor/jquery-1.11.2.min.js"></script>
<script src="{{ env('MIX_URL_SITE') }}/js/vendor/bootstrap.min.js"></script>
<script src="{{ env('MIX_URL_SITE') }}/js/isotope.pkgd.min.js"></script>
<script src="{{ env('MIX_URL_SITE') }}/js/owl.carousel.min.js"></script>
<script src="{{ env('MIX_URL_SITE') }}/js/wow.min.js"></script>
<script src="{{ env('MIX_URL_SITE') }}/js/custom.js"></script>
<script src="{{ env('MIX_URL_SITE') }}/js/app.js?11122345121112222"></script><!-- /#wrapper -->

</body>

</html>
