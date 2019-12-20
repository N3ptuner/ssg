@extends('default/default')
@section('title', '个人设置')

@section('content')
    <div class="offset-md-2 col-md-8">
        <div class="card">
            <div class="card-header">
                <h5>个人设置</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('users.update', $user) }}">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="username">用户名：</label>
                        <input class="form-control" type="text" name="username" value="{{ $user->username }}">
                    </div>
                    <div class="form-group">
                        <label for="email">邮箱：</label>
                        <input class="form-control" type="email" name="email" value="{{ $user->email }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="password">密码：</label>
                        <input class="form-control" type="password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">确认密码：</label>
                        <input class="form-control" type="password" name="password_confirmation">
                    </div>

                    <button class="btn btn-primary" type="submit">更新</button>
                </form>
            </div>
        </div>
    </div>

@stop