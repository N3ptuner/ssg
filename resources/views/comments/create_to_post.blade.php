<form method="POST" action="{{ route('comments.store')}}" >
    {{ csrf_field() }}
    <label for="content"></label>
    <input type="text" name="content_md">
    <input type="hidden" name="parent_id" value="{{ $post->id }}">
    <input type="hidden" name="parent_type" value="App\Post" hidden="hidden">
    <input type="hidden" name="level" value="0" hidden="hidden">
    <input type="hidden" name="project_id" value="{{ $project->id }}">

    <input type="submit" value="评论">
</form>
