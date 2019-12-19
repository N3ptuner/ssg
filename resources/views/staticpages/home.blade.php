@extends('home')
@section('title', '主页')

@section('content')
    <h2>Game</h2>
    <table  style="border:3px #cccccc solid;" cellpadding="10" border='1'>
    @foreach($games as $project)
        @include('projects._project_home_card')
    @endforeach
    </table>
    <h2>Music</h2>
    <table  style="border:3px #cccccc solid;" cellpadding="10" border='1'>
        @foreach($musics as $project)
            @include('projects._project_home_card')
        @endforeach
    </table>
    <h2>Picture</h2>
    <table  style="border:3px #cccccc solid;" cellpadding="10" border='1'>
        @foreach($pictures as $project)
            @include('projects._project_home_card')
        @endforeach
    </table>
    <h2>Tool</h2>
    <table  style="border:3px #cccccc solid;" cellpadding="10" border='1'>
        @foreach($tools as $project)
            @include('projects._project_home_card')
        @endforeach
    </table>

@stop