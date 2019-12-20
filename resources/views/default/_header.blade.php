
    {{--|<a href="{{ route('users.index') }}">用户列表</a>--}}
    {{--@if(Auth::check())--}}
    {{--|<a href="{{ route('follows.followers', Auth::user()) }}">被关注</a>--}}
    {{--|<a href="{{ route('follows.followings', Auth::user()) }}">关注</a>--}}
    {{--@endif--}}
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">SSG App</a>
        <ul class="navbar-nav justify-content-end">
            @include('default._navibar')
            @include('users.panel')
        </ul>
    </div>
</nav>

