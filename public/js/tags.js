function addTag(value)
{
    let tag = document.createElement("div");
    tag.setAttribute("class", "tags");
    tag.innerText = value;

    let del = document.createElement("button");
    del.setAttribute("class", "tags-delete btn btn-sm btn-danger");
    del.addEventListener("click", function(){
        let option = document.createElement("option");
        option.innerHTML = $(this).parent().text();
        $(".tags-remain").append(option);
        del.parentNode.parentNode.removeChild(del.parentNode);
    });
    tag.appendChild(del);

    $(".tags-selected").append(tag);

}

function collectTags()
{
    let tags_selected = "";
    $(".tags-selected").children().each(function(){
        tags_selected = tags_selected+$(this).text()+";";
    });
    $(".tags-seleted-post").val(tags_selected);

    let tags_remain = "";
    $(".tags-remain").children().each(function(){
        if($(this).text()!=" ")
            tags_remain = tags_remain+$(this).text()+";";
    });
    $(".tags-remain-post").val(tags_remain);

    return false;
}

function addTagAll()
{

    $(".tags-box").children().each(function(){
        let option = document.createElement("option");
        option.innerHTML = $(this).text();
        $(".tags-select").append(option);
    });
}

function initial()
{
    $(".tags-box-remain").children().each(function(){
        let option = document.createElement("option");
        option.innerHTML = $(this).text();
        $(".tags-remain").append(option);
    });

    $(".tags-box-selected").children().each(function(){
       addTag($(this).text());
    });
}

$(document).ready(function(){

    initial();


    $(".tags-remain").change(function(){
        let tag_value = $(this).val();
        addTag(tag_value);
        $(".tags-remain").children().each(function(){
           if($(this).text() == tag_value)
           {
               $(this).remove();
           }
        });
    });
});