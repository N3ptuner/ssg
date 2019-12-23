@extends('default/default')
@section('title', '游戏')

@section('content')
    @include("staticpages.tags_search")

    <div class="jumbotron form-inline">
    @if($games->isEmpty())
            <p class="text-sm-center">
                暂时空空如也~
            </p>
    @else
        @foreach($games as $product)
            @include("products._card")
        @endforeach
    @endif
    </div>
@stop