@extends('default/default')
@section('title', '工具')

@section('content')
    @include("staticpages.tags_search")

    <div class="jumbotron form-inline">
        @if($tools->isEmpty())
            <p class="text-sm-center">
                暂时空空如也~
            </p>
        @else
            @foreach($tools as $product)
                @include("products._card")
            @endforeach
        @endif
    </div>
@stop