@extends('default/default')
@section('title', '个人项目')

@section('content')
    <a href="{{ route('projects.create') }}">新建项目</a>

    <table style="border:3px #cccccc solid;" cellpadding="10" border='1'>

    @foreach($projects as $project)
        @include('projects._project_owner_card')
    @endforeach
    </table>

@stop