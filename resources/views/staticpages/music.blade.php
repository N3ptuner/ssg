@extends('default/default')
@section('title', '音乐')

@section('content')
    @include("staticpages.tags_search")

    <div class="jumbotron form-inline">
        @if($musics->isEmpty())
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