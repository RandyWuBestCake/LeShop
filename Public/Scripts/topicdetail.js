$(function(){
    $("a").focus(function(){
        $(this).blur();
    });
    var urlId=window.location.search;
    urlId=urlId.substring(1);
    urlId=urlId.split("=");
    //专题详情
    loadAjaxPt("./ajaxActDetail?subjectID="+urlId[1],"ztXq_template",".topicT");
    //专题应用初始化
    var topicAppPage=new LoadAjaxPage({
        ajaxUrl:'./ajaxActApp?subjectID='+urlId[1],
        pageSize:20,
        successFn:topicAppDom
    });
    topicAppPage.ajaxLoadPage(1,"pageBox");
    //专题APP，Ajax加载
    function topicAppDom(data){
        if(!data){
            return false;
        }
        for(var i= 0,dataLen=data.subjectAppList.length;i<dataLen;i++){
            data.subjectAppList[i].avgRating=data.subjectAppList[i].avgRating*10;
        }
        var output = Mustache.render($("#topicAppList_template").html(),data);
        $(".app_list_er ul").html(output);
        $(".app_list_er ul li:nth-child(4n)").css("margin-right",0);
        $(".app_list_er ul li").hover(function(){
            $(this).find("span div").hide()
            $(this).find(".pos_ts_bt").show();
        },function(){
            $(this).find("span div").show()
            $(this).find(".pos_ts_bt").hide();
        });
        $(".pos_ts_bt").off('click').on("click",function(){
        	var tsZt=tsFn($(this).attr("id"),$(this).attr("pn"));
            if(tsZt){
                prompt(true);
            }else{
                if(tsZt===0){
                    alert("推送失败，您未登录，请先登录！");
                    login();
                }else{
                    prompt(false);
                }
            }
        });
    }
});
