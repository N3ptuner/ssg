<tr>
    <td>
        <a href="{{ route('projects.show', $project) }}">{{ $project->name }}</a>
        {{ $project->created_at->diffForHumans() }}

        <form method="GET" action="{{ route('projects.edit', $project) }}">
            {{ csrf_field() }}

            <input type="submit" value="编辑">
        </form>
        <form method="POST" action="{{ route('projects.destroy', $project) }}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <input type="submit" value="删除">
        </form>
    </td>
</tr>