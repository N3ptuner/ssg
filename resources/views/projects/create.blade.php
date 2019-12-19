@extends('home')
@section('title', '新建项目')

@section('content')

    <form method="POST" enctype="multipart/form-data" action="{{ route('projects.store')}}" >
        {{ csrf_field() }}
        <h2>项目信息</h2>
        <label for="project_name">项目名称：</label>
        <input type="text" name="project_name" value="项目1">
        </br>
        <label for="content_md">项目页面：</label>
        <input type="text" name="content_md" value="项目页面1">
        </br>

        <label for="visibility">可见性：</label>
        <input type="text" name="visibility" value="public">
        </br>
        <label for="template_id">模板：</label>
        <input type="text" name="template_id" value="1">
        </br>
        <h2>产品信息</h2>
        <label for="product_name">产品名称：</label>
        <input type="text" name="product_name" value="产品1">
        </br>
        <label for="product_introduction">产品描述：</label>
        <input type="text" name="product_introduction" value="产品描述1">
        </br>
        <label for="cover">封面：</label>
        <input type="file" name="cover">
        </br>
        <label for="classification">分类：</label>
        <input type="text" name="classification" value="game">
        </br>
        <label for="files">文件：</label>
        <input type="file" name="files">
        </br>
        <label for="tag_list">标签：</label>
        <input type="text" name="tag_list">
        </br>
        <label for="release_status">发布状态：</label>
        <input type="text" name="release_status" value="released">
        </br>

        <input type="submit" value="提交">
    </form>

@stop