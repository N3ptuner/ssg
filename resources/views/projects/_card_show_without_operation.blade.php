<div class="col-md-3">
    <div class="card mb-3 box-shadow">
        <a href="{{ route("projects.show", $project) }}">
        <img class="card-img-top" src="{{ asset($project->product()->get()[0]->cover) }}" style="height: 180px; width: 100%; display: block;">
        </a>
        <div class="card-body">
            <p class="card-text">{{ $project->name }}</p>
        </div>
    </div>
</div>