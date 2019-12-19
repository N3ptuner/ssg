@extends('home')
@section('title', '游戏')

@section('content')
    <table  style="border:3px #cccccc solid;" cellpadding="10" border='1'>
    @foreach($games as $project)
        @include('projects._project_home_card')
    @endforeach
    </table>
@stop