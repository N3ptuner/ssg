<div class="card">
    <div class="card-header">
        <h5>{{ $product->name }}</h5>
    </div>
    <div class="card-body">
        <p class="card-text">
            {{ $post->content_md }}
        </p>
    </div>
</div>
<div class="comments jumbotron">
    @include("comments.show")
</div>