@extends('default/default')
@section('title', '音乐')

@section('content')
    <div class="jumbotron form-inline">
        @if($music->isEmpty())
            <p class="text-sm-center">
                暂时空空如也~
            </p>
        @else
            @foreach($musics as $product)
                @include("products._card")
            @endforeach
        @endif
    </div>

@stop