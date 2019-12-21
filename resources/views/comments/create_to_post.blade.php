<div class="card">
    <div class="card-header">
        <h5>评论</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('comments.store')}}" >
            {{ csrf_field() }}
            <textarea  name="content_md" class="text-body form-control"></textarea>
            <input type="hidden" name="parent_id" value="{{ $post->id }}">
            <input type="hidden" name="parent_type" value="App\Post" hidden="hidden">
            <input type="hidden" name="level" value="0" hidden="hidden">
            <input type="hidden" name="project_id" value="{{ $project->id }}">
            <button class="btn btn-primary" type="submit">评论</button>
        </form>
    </div>
</div>