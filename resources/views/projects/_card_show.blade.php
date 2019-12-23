<div class="col-md-3">
    <div class="card mb-3 box-shadow">
        <a href="{{ route("projects.show", $project) }}">
        <img class="card-img-top" src="{{ asset($project->product()->get()[0]->cover) }}" style="height: 180px; width: 100%; display: block;">
        </a>
        <div class="card-body">
            <p class="card-text">{{ $project->name }}</p>
            <div class="form-inline">
                <a href="#" class="card-link">
                    <form method="GET" action="{{ route("projects.edit", $project) }}">
                        {{ csrf_field() }}
                        <button title="修改" type="submit" class="btn btn-secondary btn-sm">
                            <i class="fa fa-edit"></i>
                        </button>

                    </form>
                </a>
                <a href="#" class="card-link">
                    <form method="POST" action="{{ route("projects.destroy", $project) }}">
                        {{ csrf_field() }}
                        {{ method_field("DELETE") }}
                        <button title="删除" type="submit" class="btn btn-danger btn-sm">
                            <i class="fa fa-remove"></i>
                        </button>
                    </form>
                </a>
{{--                <a href="#" class="card-link">--}}
{{--                    <form method="POST" action="{{ route("posts.create", $project) }}">--}}
{{--                        {{ csrf_field() }}--}}
{{--                        <button title="新建项目日志" type="submit" class="btn btn-primary btn-sm">--}}
{{--                            <i class="fa fa-plus-square-o"></i>--}}
{{--                        </button>--}}
{{--                    </form>--}}
{{--                </a>--}}
            </div>
        </div>
    </div>
</div>