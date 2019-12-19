@if($comments != null)
    @foreach($comments as $comment)
        <table style="border:3px #cccccc solid;" cellpadding="10" border='1'>
        @include("comments.card")
        </table>
    @endforeach
@endif
@include("comments.create_to_post")