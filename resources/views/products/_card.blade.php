@php
    $project = $product->project()->get()[0];
@endphp
<div class="col-md-3">
    <div class="card">
        <a href="{{ route("projects.show", $project) }}">
            <img class="card-img-top" src="{{ $product->cover }}" style="height: 180px; width: 100%; display: block;" >
        </a>
        <div class="card-body">
            <a class="card-link" href="{{ route("projects.show", $project) }}">作品名称</a>
            <p class="card-text">作品介绍</p>
        </div>
    </div>
</div>