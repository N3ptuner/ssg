<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', '深水港')</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
{{--    <img src="{{ asset("img/banner.jpg") }}">--}}
    @include('default._header')
    @include('default._messages')
    @include('default._errors')

    @yield('content')


    @include('default._footer')
</body>
</html>