<tr>
    <td>
        <font size="4">{{ $creator->username }}</font>
        <font size="1">{{ $comment->created_at->diffForHumans()}}</font>
        </br>
        {{ $comment->content_md }}
        @include('comments.create_to_comment')
        @php
            $child_comments = \App\Comment::where('parent_id', $comment->id)
                                ->where('parent_type', 'App\Comment')
                                ->get();
        @endphp

        @foreach ($child_comments as $comment)
            <table style="border:3px #cccccc solid;" cellpadding="10" border='1'>
            @include('comments.card')
            </table>
        @endforeach

    </td>
</tr>