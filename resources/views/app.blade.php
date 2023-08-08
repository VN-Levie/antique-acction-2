<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <title inertia>{{ config('app.name', 'Laravel') }}</title>
     <meta charset="utf-8" />
     {{-- CSRF --}}
     <meta name="csrf-token" content="{{ csrf_token() }}">
     <link rel="SHORTCUT ICON" href="/img/mt-1804-favicon.ico?_build=1686913647" type="image/vnd.microsoft.icon" />
     <link rel="canonical" href="https://template80059.motopreview.com/" />
     <meta property="og:title" content="Home" />
     <meta property="og:url" content="https://template80059.motopreview.com/" />
     <meta property="og:type" content="website" />
     <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
          integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/v4-font-face.min.css"
          integrity="sha512-sx5f0oBw5bYJXpvIAFXqCP3p5heQFrIDUJEUu2ja7WbmFHBHKY565OjQK2PQM+8PruMwcDR18WEIOse4qEBJ8Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" integrity="sha512-uKQ39gEGiyUJl4AI6L+ekBdGKpGw4xJ55+xyJG7YFlJokPNYegn9KwQ3P8A7aFQAUtUsAQHep+d/lrGqrbPIDQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/v4-shims.min.css"
          integrity="sha512-fWfO/7eGDprvp7/UATnfhpPDgF33fetj94tDv9q0z/WN4PDYiTP97+QcV1QWgpbkb+rUp76g6glID5mdf/K+SQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     {{-- <link rel="preload" as="font" type="font/woff2" crossorigin href="/fontawesome-webfont.woff2?v=4.7.0" /> --}}
     <link rel="stylesheet" href="/assets.min.css" />
     {{-- <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script> --}}
     <meta name="csrf-token" content="{{ csrf_token() }}">
     <style>
          @import url(//fonts.googleapis.com/css?family=Libre+Baskerville:regular,italic,700|Montserrat:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic|Raleway:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&subset=latin);
     </style>
     <link rel="stylesheet" href="/style.css" id="moto-website-style" />
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
     <script src="https://js.pusher.com/beams/1.0/push-notifications-cdn.js"></script>
     {{-- <script src="/service-worker.js"></script> --}}
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
     <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
     {{-- <script src="//js.pusher.com/3.1/pusher.min.js"></script> --}}
     <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
     <script src="/js/bootstrap-notify.js"></script>
     <script src="/js/customs.js"></script>
     <script src="/js/jasny-bootstrap.min.js"></script>

     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous">
     </script>
     

</body>

</html>
