<a href="/">主页</a>
|<a href="/game">游戏</a>
|<a href="/music">音乐</a>
|<a href="/picture">图片</a>
|<a href="/tool">工具</a>
|<a href="{{ route('users.index') }}">用户列表</a>
@if(Auth::check())
|<a href="{{ route('follows.followers', Auth::user()) }}">被关注</a>
|<a href="{{ route('follows.followings', Auth::user()) }}">关注</a>
@endif
@if(Auth::check())
</br>
<a href="{{ route('users.show', Auth::user()) }}">{{ Auth::user()->username }}</a>
|<a href="{{ route('users.projects', Auth::user()) }}">项目</a>
|<a href="{{ route('users.edit', Auth::user()) }}">设置</a>
|<a href="#">
    <form action="{{ route('logout') }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <input type="submit" value="登出">
    </form>
</a>
@else
|<a href="{{ route('users.create') }}">注册</a>
|<a href="{{ route('login') }}">登陆</a>
@endif
</br>

