

    @if(Auth::check())
        <li class="nav-item"><a class="nav-link" href="{{ route('users.show', Auth::user()) }}">{{ Auth::user()->username }}</a></li>
        <li class="nav-item" ><a class="nav-link" href="{{ route('projects.show_by_user', Auth::user()) }}">项目</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('users.edit', Auth::user()) }}">设置</a></li>
        <li class="nav-item" >
            <a class="nav-link" href="#">
                <form action="{{ route('logout') }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="submit" value="登出">
                </form>
            </a>
        </li>
    @else
        <li class="nav-item"><a class="nav-link" href="{{ route('users.create') }}">注册</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">登陆</a></li>
    @endif
</div>