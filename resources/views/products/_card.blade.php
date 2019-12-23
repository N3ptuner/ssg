@php
   //dd($product);
   $project = $product->project()->get()[0];
@endphp
<div class="col-md-3">
    <div class="card">
        <a href="{{ route("projects.show", $project) }}">
            @if($product->cover == '#')
                <img class="card-img-top" src="{{ asset("img/default_img.jpg") }}" style="height: 180px; width: 100%; display: block;" >
            @else
            <img class="card-img-top" src="{{ $product->cover }}" style="height: 180px; width: 100%; display: block;" >
            @endif
        </a>
        <div class="card-body">
            <a class="card-link" href="{{ route("projects.show", $project) }}">{{ $product->name }}</a>
            <p class="card-text">{{ $product->introduction }}</p>
        </div>
    </div>
</div>