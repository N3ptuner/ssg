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

<div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
    <div class="thumbnail">
        <img src="{{ asset('img/cat.gif') }}" style="height: 20px; width: 20px" alt="..."class="img-responsive">
        <div class="caption">
            <h4>{{ $project->name }}</h4>
{{--            <p style="color:red;"></p>--}}
        </div>
    </div>
</div>