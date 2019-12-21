@extends('default/default')
@section('title',  $project->name)

@section('content')
    @include("posts.show")
@stop
