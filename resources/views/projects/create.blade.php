@extends('default/default')
@section('title', '新建项目')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>创建项目</h5>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="{{ route('projects.store')}}" >       {{ csrf_field() }}
                <div class="form-group">
                    <label for="project_name">项目名称：</label>
                    <input class="form-control" type="text" name="project_name" value="项目1">
                </div>
                <div class="form-group">
                    <label for="content_md">项目页面：</label>
                    <input class="form-control" type="text" name="content_md" value="项目页面1">
                </div>
                <div class="form-group">

                    <label for="visibility">可见性：</label>
                    <select class="form-control" name="visibility" value="public">
                        <option value="public">公开——所有人都可访问你的项目页面</option>
                        <option value="draft">草稿——你的项目仅自己可见</option>
                    </select>
                </div>
                <div class="form-group">

                    <label for="template_id">模板：</label>
                    <select class="form-control" name="template_id" value="1">
                        <option value="1">模板1</option>
                        <option value="2">模板2</option>
                        <option value="3">模板3</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="product_name">产品名称：</label>
                    <input class="form-control" type="text" name="product_name" value="产品1">
                </div>
                <div class="form-group">
                    <label for="product_introduction">产品描述：</label>
                    <input class="form-control" type="text" name="product_introduction" value="产品描述1">
                </div>
                <div class="form-group">
                    <label for="cover">封面：</label>
                    <input class="form-control-file" type="file" name="cover">
                </div>
                <div class="form-group">
                    <label for="classification">分类：</label>
                    <select class="form-control" name="classification" value="game">
                        <option value="game">游戏</option>
                        <option value="music">音乐</option>
                        <option value="picture">图片</option>
                        <option value="tool">工具</option>

                    </select>
                </div>
                <div class="form-group">
                    <label for="files">文件：</label>
                    <input class="form-control-file" type="file" name="files">
                </div>
                <div class="form-group">
                    <label for="tag_list">标签：</label>
                    <input class="form-control" type="text" name="tag_list">
                </div>
                <div class="form-group">
                    <label for="release_status">发布状态：</label>
                    <select class="form-control" name="release_status" value="released">
                        <option value="released">发布——向大家展示你的作品</option>
                        <option value="developing">开发中——继续打磨你的作品</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">提交</button>
            </form>
        </div>
    </div>
@stop