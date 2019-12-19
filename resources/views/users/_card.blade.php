<tr>
    <td>
        <a href="{{ route('users.show', $user) }}">{{ $user->username }}</a>
        @if(\Illuminate\Support\Facades\Auth::user()->is_following($user))
        <a href="{{ route('follows.destroy', $user) }}">取消关注</a>
            @else
        <a href="{{ route('follows.store', $user) }}">关注</a>
        @endif
    </td>
</tr>