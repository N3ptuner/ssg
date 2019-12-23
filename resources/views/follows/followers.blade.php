
@extends("default.default")
@section("title", "关注列表")

@section("content")
@foreach($users as $user)
@include('users._card')
@endforeach
@stop
