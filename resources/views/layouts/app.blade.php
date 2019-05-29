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
    <link rel="stylesheet" href="{{ env('MIX_URL_SITE') }}/css/style.css?11122345121112222231121222221">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="shortcut icon" href="/images/favicon_term.png" type="image/png">
    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script>window.html5 || document.write('<script src="js/vendor/html5shiv.js"><\/script>')</script>
    <![endif]-->
</head>
<body>
<div id="preloader">
    <div class="preloader-area">
        <div class="preloader-box">
                <div class="preloader"></div>
        </div>
    </div>
</div>
<div id="app">
    @yield('content')
</div>
<script src="{{ env('MIX_URL_SITE') }}/js/vendor/jquery-1.11.2.min.js"></script><!-- /#wrapper -->
<script src="{{ env('MIX_URL_SITE') }}/js/vendor/bootstrap.min.js"></script>
<script src="{{ env('MIX_URL_SITE') }}/js/isotope.pkgd.min.js"></script>
<script src="{{ env('MIX_URL_SITE') }}/js/owl.carousel.min.js"></script>
<script src="{{ env('MIX_URL_SITE') }}/js/wow.min.js"></script>
<script src="{{ env('MIX_URL_SITE') }}/js/app.js?111223451211122222311212232232"></script>
<script src="{{ env('MIX_URL_SITE') }}/js/custom.js?1223232"></script>

<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(53836633, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
    });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/53836633" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->


</body>

</html>
