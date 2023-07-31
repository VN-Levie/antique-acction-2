<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="utf-8" />

    <link rel="SHORTCUT ICON" href="/img/mt-1804-favicon.ico?_build=1686913647" type="image/vnd.microsoft.icon" />
    <link rel="canonical" href="https://template80059.motopreview.com/" />
    <meta property="og:title" content="Home" />
    <meta property="og:url" content="https://template80059.motopreview.com/" />
    <meta property="og:type" content="website" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
        integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link rel="preload" as="font" type="font/woff2" crossorigin href="/fontawesome-webfont.woff2?v=4.7.0" /> --}}
    <link rel="stylesheet" href="/assets.min.css" />
    <style>
        @import url(//fonts.googleapis.com/css?family=Libre+Baskerville:regular,italic,700|Montserrat:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic|Raleway:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&subset=latin);
    </style>
    <link rel="stylesheet" href="/style.css" id="moto-website-style" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- Fonts -->

    <link rel="preconnect" href="https://fonts.bunny.net">
    {{-- <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}
    @vite('resources/css/home.css')
    <!-- Scripts -->
    @routes
    @vite(['resources/js/home.js', "resources/js/Pages/{$page['component']}.vue"])
    @inertiaHead

</head>

<body class="font-sans antialiased">
    @inertia
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
