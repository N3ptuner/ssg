@extends('default/default')

@section('title', '登陆')

@section('content')
    <div class="offset-md-2 col-md-8">
        <div class="card">
            <div class="card-header">
                <h5>登陆</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                    <label for="email">邮箱：</label>
                    <input class="form-control" name='email' type="email">
                    </div>
                <div class="form-group">
                    <label for="password">密码：</label>
                    <input class="form-control" name='password' type="password">
                </div>
                <button type="submit" class="btn btn-primary">登陆</button>
                </form>
            </div>
        </div>
    </div>
@stop