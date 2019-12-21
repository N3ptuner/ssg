@if(!$comments->isEmpty())
    @foreach($comments as $comment)
        @include("comments.card")
    @endforeach
@else
    <div class="card">
        <p class="card-text text-md-center" style="margin-bottom: 20px; margin-top: 20px" >暂时没有评论哦~</p>
    </div>
@endif
@include("comments.create_to_post")