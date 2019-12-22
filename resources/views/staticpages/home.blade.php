@extends('default/default')
@section('title', '主页')

@section('content')
    @include("staticpages.tags_search")
    <div class="jumbotron">
        <h2>
            游戏
        </h2>
        <div class="form-inline">
        @foreach($games as $product)
            @include('products._card')
        @endforeach
        </div>
        <h2>
            音乐
        </h2>
        <div class="form-inline">
        @foreach($musics as $product)
            @include('products._card')
        @endforeach
        </div>
        <h2>
            图片
        </h2>
        <div class="form-inline">

        @foreach($pictures as $product)
            @include('products._card')
        @endforeach
        </div>
        <h2>
            工具
        </h2>
        <div class="form-inline">

        @foreach($tools as $product)
            @include('products._card')
        @endforeach
        </div>
    </div>
@stop