<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'SSG')</title>
</head>
<body>
    @include('_header')
    @include('_messages')
    @include('_errors')

    @yield('content')
</body>
</html>