@extends('default/default')

@section('title', '注册')

@section('content')

    <form method="POST" action="{{ route('users.store') }}">

        {{ csrf_field() }}

        <label for="email">邮箱：</label>
        <input name='email' type="email" value="{{ old('email') }}">
        </br>
        <label for="username">用户名：</label>
        <input name='username' type="text" value="{{ old('username') }}">
        </br>
        <label for="password">密码：</label>
        <input name='password' type="password">
        </br>
        <label for="password_confirmation">确认密码：</label>
        <input name='password_confirmation' type="password">
        </br>
        <input type="submit" value="注册">
    </form>
@stop