@extends('default/default')
@section('title', '项目管理')

@section('content')

    <div style="margin-bottom: 20px">
        <a href="{{ route('projects.create') }}">
            <button class="btn btn-outline-success">新建项目</button>
        </a>
    </div>

    @if($projects->isEmpty())
        <div class="container">
            <p class="text-center">
            快创建你的第一个项目吧~
            </p>
        </div>
    @else
        @if($render_game)
            <div class="container">
                <h5>游戏</h5>
                <div class="row">
                    @foreach($projects as $project)
                        @if($project->product()->get()[0]->classification == "game")
                            @php
                                $render = true;
                            @endphp
                            @include("projects._card_show")
                        @endif
                    @endforeach
                </div>

            </div>
        @endif
        @if($render_music)
        <div class="container">
            <h5>音乐</h5>
            <div class="row">
                @foreach($projects as $project)
                    @if($project->product()->get()[0]->classification == "music")
                        @include("projects._card_show")
                    @endif
                @endforeach
            </div>
        </div>
        @endif
        @if($render_picture)
        <div class="container">
            <h5>图片</h5>
            <div class="row">

                @foreach($projects as $project)
                    @if($project->product()->get()[0]->classification == "picture")
                        @include("projects._card_show")
                    @endif
                @endforeach
            </div>
        </div>
        @endif
        @if($render_tool)
        <div class="container">
            <h5>工具</h5>
            <div class="row">

                @foreach($projects as $project)
                    @if($project->product()->get()[0]->classification == "tool")
                        @include("projects._card_show")
                    @endif
                @endforeach
            </div>
        </div>
        @endif
    @endif
@stop