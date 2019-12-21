<div class="col-md-3">
    <div class="card mb-3 box-shadow">
        <img class="card-img-top" src="{{ asset("img/cat.gif") }}" style="height: 180px; width: 100%; display: block;">
        <div class="card-body">
            <p class="card-text">项目名称</p>
            <div class="form-inline">
                <a href="#" class="card-link">
                    <form method="POST" action="{{ route("projects.show", $project) }}">
                        {{ csrf_field() }}
                        {{ method_field("PATCH") }}
                        <button type="submit" class="btn btn-secondary btn-sm">修改</button>

                    </form>
                </a>
                <a href="#" class="card-link">
                    <form method="POST" action="{{ route("projects.destroy", $project) }}">
                        {{ csrf_field() }}
                        {{ method_field("DELETE") }}
                        <button type="submit" class="btn btn-danger btn-sm">删除</button>
                    </form>
                </a>
            </div>
        </div>
    </div>
</div>