@extends('home')
@section('title',  $project->name )

@section('content')
    {{ $project }}
    @include('posts.show')
@stop
