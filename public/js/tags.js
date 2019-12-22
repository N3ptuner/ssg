function addTag(value)
{
    let tag = document.createElement("div");
    tag.setAttribute("class", "tags");
    tag.innerText = value;

    let del = document.createElement("button");
    del.setAttribute("class", "tags-delete btn btn-sm btn-danger");
    del.addEventListener("click", function(){
        del.parentNode.parentNode.removeChild(del.parentNode);
    });
    tag.appendChild(del);

    $(".tags-show").append(tag);

}

function collectTags()
{
    let tags = "";
    $(".tags-show").children().each(function(){
        tags = tags+$(this).text()+"; ";
    });

    $(".tags-post").val(tags);

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

$(document).ready(function(){
    let tags_selected = new Array();
    addTagAll();
    //$(".tags-select").hide();
    //$(".tags-show").hide();
    // $(".option-hide").hide();
    // $(".tags-input").click(function(){
    //    addTagAll();
    // });
    // $(".tags-input").keyup(function(){
    //     let words_to_select = [1,2,3];
    //     //words_to_select = searchForWords();
    //     displayWords(words_to_select);
    // });
    $(".test-btn").click(function (){

    });

    $(".tags-delete").click(function(){
        // console.log($(this).siblings());
         let option = document.createElement("option");
         option.innerHTML = $(this).siblings().text();
         $(".tags-select").append(option);
         $(this).parent().remove();
    });

    $(".tags-select").change(function(){
        let tag_value = $(this).val();
        tags_selected[tags_selected.length] = tag_value;
        addTag(tag_value);
        $(".tags-select").children().each(function(){
           if($(this).text() == tag_value)
           {
               $(this).remove();
           }
        });
    });

    // $(".tags-search").click(function(){
    //     collectTags();
    // });



});