$(function(){
    //热门专题初始化
    var topic=new LoadAjaxPage({
        ajaxUrl:'./hotSubject',
        pageSize:28,
        successFn:topicAppDom
    });
    topic.ajaxLoadPage(1,"pageBox");
});
function topicAppDom(data){
    if(!data){
        return false;
    }
    var output = Mustache.render($("#topic_template").html(),data);
    $(".zt_box").html(output);
    $(".zt_box dl:nth-child(4n)").removeClass("zt_marginR");
}