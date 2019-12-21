
<div class="card" style="margin-top: 20px; margin-bottom: 20px;">
    <div class="card-header form-inline">
        <a href="{{ route("users.index", $creator) }}">
            <h6>{{ $creator->username }}</h6>
        </a>
        <h6>
            <small>&nbsp; {{ $comment->created_at->diffForHumans()}}</small>
        </h6>


    </div>
    <div class="card-body">
        <div class="card-text">
            @if($comment->deleted)
                评论已删除
            @else
                {{ $comment->content_md }}
            @endif
        </div>

        @if(!$comment->deleted)
            <div class="form-inline">
                <button class="dropdown-toggle btn-primary btn-sm btn" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    回复
                </button>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <form method="POST" action="{{ route('comments.store')}}" >
                        {{ csrf_field() }}
                        <textarea name="content_md"class="form-control"></textarea>
                        <input type="hidden" name="parent_id" value="{{ $comment->id }} ">
                        <input type="hidden" name="level" value="{{ $comment->level+1 }}">
                        <input type="hidden" name="parent_type" value="App\Comment">
                        <input type="hidden" name="project_id" value="{{ $project->id }}">
                        <div class="dropdown-divider"></div>
                        <input class="float-right btn-primary btn btn-sm" type="submit" value="回复">
                    </form>
                </div>
                &nbsp;
                @if(Auth::user()->id == $comment->creator_id)
                    <a href="#">
                        <form method="POST" action="{{ route("comments.destroy", $comment) }}">
                            {{ csrf_field() }}
                            {{ method_field("DELETE") }}
                            <button type="submit" class="btn btn-sm btn-danger">删除</button>
                        </form>

                    </a>
                @endif
            </div>
        @endif


        @php
            $child_comments = \App\Comment::where('parent_id', $comment->id)
                                ->where('parent_type', 'App\Comment')
                                ->get();
        @endphp


        @foreach ($child_comments as $comment)
                @include('comments.card')
        @endforeach
    </div>
</div>

