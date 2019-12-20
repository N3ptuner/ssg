@extends('default/default')
@section('title',  $project->name )

@section('content')
    {{ $project }}
    @include('posts.show')
@stop
