<div class="tags_search" >
    <div class="tags-box-remain">
        @foreach($tags_remain as $tag)
            <p class="tags-box-item" hidden>{{ $tag }}</p>
        @endforeach
    </div>
    <div class="tags-box-selected">
        @foreach($tags_selected as $tag)
            <p class="tags-box-item" hidden>{{ $tag }}</p>
        @endforeach
    </div>
    <div class="tags-selected form-inline">
    </div>
    <div class="tags-input">
{{--        <input class="form-control tags_input"  type="text">--}}

        <select class="tags-remain form-control">
            <option class="default-option"> </option>
{{--            <option class="option-hide" value="option-hide" selected></option>--}}
        </select>
        <form  method="GET" action="{{ route($product_type) }}" onclick="collectTags()">
            {{ csrf_field() }}
            <input hidden class="tags-seleted-post" name="tags_selected">
            <input hidden class="tags-remain-post" name="tags_remain">

            <button type="submit" class="tags-search btn btn btn-outline-success" style="margin-top: 5px; margin-bottom: 10px">检索</button>

        </form>

    </div>
</div>