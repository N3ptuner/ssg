@extends('default/default')
@section('title', '用户列表')

@section('content')
<table>
@foreach($users as $user)
    @if($user->id != \Illuminate\Support\Facades\Auth::user()->id)
        @include('users._card')
    @endif
@endforeach
</table>
@stop