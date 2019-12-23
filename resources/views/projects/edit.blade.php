@extends('default/default')
@section('title', '编辑项目')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>编辑项目</h5>
        </div>
        <div class="card-body">
    <form method="POST" enctype="multipart/form-data" action="{{ route('projects.update', $project)}}" >
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <div class="form-group">
        <label for="project_name">项目名称：</label>
        <input class="form-control" type="text" name="project_name" value="{{ $project->name }}">
        </div>
        <div class="form-group">

        <label for="content_md">项目页面：</label>
        <input class="form-control" type="text" name="content_md" value="{{ \App\Post::where('id', $project->post_id)->get()[0]->content_md }}">
        </div>

        <div class="form-group">
            <label for="visibility">可见性：</label>
            <select class="form-control" name="visibility">
                    <option {{ $project->visibility == "public"?'selected':'' }} value="public">公开——所有人都可访问你的项目页面</option>
                    <option {{ $project->visibility == "draft"?'selected':'' }} value="draft">草稿——你的项目仅自己可见</option>
            </select>
        </div>

{{--        <label for="release_status">发布状态：</label>--}}
{{--        <input class="form-control" type="text" name="release_status" value="{{ $project->release_status }}">--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}

        <div class="form-group">
        <label for="template_id">模板：</label>
        <input class="form-control" type="text" name="template_id" value="{{ $project->template_id }}">
        </div>


        <div class="form-group">
        <label for="product_name">产品名称：</label>
        <input class="form-control" type="text" name="product_name" value="{{ $product->name }}">
        </div>
        <div class="form-group">
        <label for="product_introduction">产品描述：</label>
        <input class="form-control" type="text" name="product_introduction" value="{{ $product->introduction }}">
        </div>
        <div class="form-group">
        <label for="cover">封面：</label>
        <input class="form-control-file" type="file" name="cover" value="{{  $product->cover }}" >
        </div>
        <div class="form-group">
        <label for="classification">分类：</label>
        <input class="form-control" type="text" name="classification" value="{{ $product->classification }}">
        </div>
        <div class="form-group">
        <label for="files">文件：</label>
        <input class="form-control-file" type="file" name="files" value="{{ $product->files }}">
        </div>
        <div class="form-group">
            <label for="release_status">发布状态：</label>
            <select class="form-control" name="release_status" >
                <option {{ $product->release_status == "released"?'selected':'' }} value="released">发布——向大家展示你的作品</option>
                <option {{ $product->release_status == "developing"?'selected':'' }} value="developing">开发中——继续打磨你的作品</option>
            </select>
        </div>
        <div class="form-group">
        <label for="tag_list">标签：</label>
        <input class="form-control" type="text" name="tag_list" value="{{ $product->tag_list }}">
        </div>

        <button class="btn btn-success " type="submit">提交</button>
    </form>
        </div>

@stop