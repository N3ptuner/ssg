@extends('default/default')
@section('title', '个人主页')

@section('content')
    <div class="jumbotron">
            @include("users._card")

            @if($projects->isEmpty())
                <div class="container">
                    <p class="text-center">
                        他还没有创建项目
                    </p>
                </div>
            @else
                <div class="container">
                    <div class="row">
                        @foreach($projects as $project)
                                @include("projects._card_show_without_operation")
                        @endforeach
                    </div>
                </div>
            @endif
    </div>
@stop