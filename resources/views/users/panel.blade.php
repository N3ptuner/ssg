@if (Auth::check())
    <li class="nav-item dropdown dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ Auth::user()->username }}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('projects.show_by_user', Auth::user()) }}">项目管理</a>
            <a class="dropdown-item" href="{{ route('users.edit', Auth::user()) }}">个人设置</a>
            <a class="dropdown-item" href="{{ route('follows.followings', Auth::user()) }}">关注列表</a>
            <a class="dropdown-item" href="{{ route('follows.followers', Auth::user()) }}">粉丝</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" id="logout" href="#">
                <form action="{{ route('logout') }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-block btn-danger" type="submit" name="button">退出</button>
                </form>
            </a>
        </div>
    </li>
@else
    <li class="nav-item"><a class="nav-link" href="{{ route('users.create') }}">注册</a></li>
    <li class="nav-item" ><a class="nav-link" href="{{ route('login') }}">登录</a></li>
@endif