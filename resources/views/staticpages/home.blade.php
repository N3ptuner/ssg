@extends('default/default')
@section('title', '主页')

@section('content')
    <div class="jumbotron">
        <img src="">
        <h2>
            游戏
            <img class="brand-icon" height="40" width="40" src="http://gre-gory.site/wp-content/uploads/2017/05/icon23.png">
        </h2>
        <table  style="border:3px #cccccc solid;" cellpadding="10" border='1'>
        @foreach($games as $project)
            @include('projects._project_home_card')
        @endforeach
        </table>
        <h2>
            音乐
            <img class="brand-icon" height="40" width="40" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcReHodohhuPwgZOM-f7AEmNCvGisyGjUQ_m5jZChtpFG6pWgMYCMw&s">
        </h2>
        <table  style="border:3px #cccccc solid;" cellpadding="10" border='1'>
            @foreach($musics as $project)
                @include('projects._project_home_card')
            @endforeach
        </table>
        <h2>
            图片
            <img class="brand-icon" height="40" width="40" src="https://huiji-public.huijistatic.com/ff14/uploads/a/a9/0c50d51a3642ffdae21f65211537446a00fd63f7.png">
        </h2>
        <table  style="border:3px #cccccc solid;" cellpadding="10" border='1'>
            @foreach($pictures as $project)
                @include('projects._project_home_card')
            @endforeach
        </table>
        <h2>
            <img class="brand-icon"  src="{{ asset("img/hammer.png") }}">
            工具
        </h2>
        <table  style="border:3px #cccccc solid;" cellpadding="10" border='1'>
            @foreach($tools as $project)
                @include('projects._project_home_card')
            @endforeach
        </table>
    </div>
@stop