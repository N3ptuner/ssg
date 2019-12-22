<div class="tags_search" >
    <button class="btn test-btn">测试</button>
    <div class="tags-box">
        @foreach($tags as $tag)
            <p class="tags-box-item" hidden>{{ $tag }}</p>
        @endforeach
    </div>
    <div class="tags-show form-inline">

    </div>
    <div class="tags-input">
{{--        <input class="form-control tags_input"  type="text">--}}

        <select class="tags-select form-control">
{{--            <option class="option-hide" value="option-hide" selected></option>--}}
        </select>
        <form  method="POST" action="{{ route("products.show_by_tags") }}" onclick="collectTags()">
            {{ csrf_field() }}
            <input hidden class="tags-post" name="tags">
            <button type="submit" class="tags-search btn btn btn-outline-success" style="margin-top: 5px; margin-bottom: 10px">检索</button>

        </form>

    </div>
</div>