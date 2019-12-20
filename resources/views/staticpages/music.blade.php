@extends('default/default')
@section('title', '音乐')

@section('content')
    <table  style="border:3px #cccccc solid;" cellpadding="10" border='1'>
        @foreach($musics as $project)
            @include('projects._project_home_card')
        @endforeach
    </table>

@stop