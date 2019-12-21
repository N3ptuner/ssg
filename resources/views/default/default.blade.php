<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', '深水港')</title>
    <link rel="stylesheet" href="{{ mix("css/app.css") }}">
    <link rel="stylesheet" href="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.css">
</head>
<body>
{{--    <img src="{{ asset("img/banner.jpg") }}">--}}
    @include('default._header')

    <div class="container">
        <div class="offset-md-1 col-md-10">
            @include('default._messages')
            @include('default._errors')

            @yield('content')
            @include('default._footer')

        </div>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>