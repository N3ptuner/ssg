@extends('home')
@section('title', '设置')

@section('content')
    <form method="POST" action="{{ route('users.update', $user) }}">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}

        <label for="username">用户名：</label>
        <input type="text" name="username" value="{{ $user->username }}">
        </br>
        <label for="email">邮箱：</label>
        <input type="email" name="email" value="{{ $user->email }}" disabled>
        </br>
        <label for="password">密码：</label>
        <input type="password" name="password">
        </br>
        <label for="password_confirmation">确认密码：</label>
        <input type="password" name="password_confirmation">
        </br>
        <input type="submit" value="更新">
        </br>
    </form>
@stop