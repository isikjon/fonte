<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>@yield('title', \App\Models\Setting::get('site_title', 'Fonte di Joy — Питомник'))</title>
    <meta name="description" content="@yield('description', \App\Models\Setting::get('site_description', ''))">
    @if(\App\Models\Setting::get('meta_keywords'))
    <meta name="keywords" content="{{ \App\Models\Setting::get('meta_keywords') }}">
    @endif
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="/adaptive.css">
    <link rel="icon" href="/img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@700&display=swap" rel="stylesheet">
    @stack('styles')
    <script type="text/javascript">
        (function(m,e,t,r,i,k,a){
            m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();
            for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
            k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)
        })(window, document,'script','https://mc.yandex.ru/metrika/tag.js?id=105875423', 'ym');

        ym(105875423, 'init', {ssr:true, webvisor:true, clickmap:true, ecommerce:"dataLayer", accurateTrackBounce:true, trackLinks:true});
    </script>
</head>
<body class="@yield('body-class')">
<noscript><div><img src="https://mc.yandex.ru/watch/105875423" style="position:absolute; left:-9999px;" alt="" /></div></noscript>

@include('partials.header')

@yield('content')

@include('partials.footer')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
@stack('scripts-before')
<script src="/app.js"></script>
<script src="/js/translate.js"></script>
@stack('scripts')

</body>
</html>

