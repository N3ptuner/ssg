@extends('default/default')

@section('title', '登陆')

@section('content')


    <form method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <label for="email">邮箱：</label>
        <input name='email' type="email">
        </br>
        <label for="password">密码：</label>
        <input name='password' type="password">
        </br>
        <input type="submit" value="登陆">
    </form>
@stop