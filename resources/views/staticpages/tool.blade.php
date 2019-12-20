@extends('default/default')
@section('title', '工具')

@section('content')
    <table  style="border:3px #cccccc solid;" cellpadding="10" border='1'>
        @foreach($tools as $project)
            @include('projects._project_home_card')
        @endforeach
    </table>
@stop