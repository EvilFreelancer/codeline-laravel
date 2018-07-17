<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/css/app.css" rel="stylesheet"/>
    <title>Films</title>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
            background-color: #fff
        }

        #mute {
            position: absolute;
        }

        #mute.on {
            opacity: 0.7;
            z-index: 1000;
            background: white;
            height: 100%;
            width: 100%;
        }

        .heading h1 {
            margin-bottom: 0;
        }
    </style>
</head>
<body>
@include('layouts.navbar')
<section class="container mt-4">
    @yield('content')
</section>
<script src="/js/app.js"></script>
</body>
</html>
