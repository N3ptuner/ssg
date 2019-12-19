<form method="POST" action="{{ route('comments.store')}}" >
    {{ csrf_field() }}
    <label for="content"></label>
    <input type="text" name="content_md">
    <input type="hidden" name="parent_id" value="{{ $comment->id }} ">
    <input type="hidden" name="level" value="{{ $comment->level+1 }}">
    <input type="hidden" name="parent_type" value="App\Comment">
    <input type="hidden" name="project_id" value="{{ $project->id }}">
    <input type="submit" value="回复">
</form>
