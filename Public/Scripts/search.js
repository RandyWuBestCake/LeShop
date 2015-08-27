$(function(){
    $("#searchText").focus(function(){
        if($.trim($(this).val())!=="搜索应用/游戏"){
            return;
        }else{
            $(this).val("");
        }
    });
    $("#searchText").blur(function(){
        if($.trim($(this).val())==""){
            $(this).val("搜索应用/游戏");
        }
    });
    $("#searchText").keypress(function(event) {
        var key = event.keyCode;
        if(key==13){
          searchFn();
        }
    });
});
function searchFn(){
    var keyword= $.trim($("#searchText").val());
    if(keyword==""||keyword=="搜索应用/游戏"){
        return;
    }else{
        window.location.href="./cate?keyword="+encodeURIComponent(keyword);
    }
}