@extends('default/default')
@section('title', '图片')

@section('content')

    <div class="jumbotron form-inline">
        @if($pictures->isEmpty())
            <p class="text-sm-center">
                暂时空空如也~
            </p>
        @else
            @foreach($pictures as $product)
                @include("products._card")
            @endforeach
        @endif
    </div>


@stop