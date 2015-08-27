$(function(){
    var hotHtml="";
    $("a").focus(function(){
        $(this).blur();
    });
    //加载全部标签按钮
    $("#moreTab").on("click",function(){
        if($(".tab_content ul").css("height")=="49px"){
            $(".tab_content ul").css({"height":"auto","overflow":"visible"})
            $(this).html("隐藏")
        }else{
            $(".tab_content ul").css({"height":49,"overflow":"hidden"});
            $(this).html("全部")
        }
    });
    //焦点图初始Ajax
    var focusPage=new LoadAjaxPage({
        ajaxUrl:'./homeSild',
        pageSize:6,
        successFn:focusDom
    });
    focusPage.ajaxLoadPage();
    //首页标签初始Ajax
    loadAjaxPt("./homeTags","homeTag_template",".tab_content ul")
    //热点推荐初始Ajax
    var hotApp=new LoadAjaxPage({
        ajaxUrl:'./homeNewReco',
        pageSize:12,
        successFn:hotAppDom
    });
    var hotNewApp=new LoadAjaxPage({
        ajaxUrl:'./newestAppList',
        pageSize:12,
        successFn:hotAppDom
    });
    hotApp.ajaxLoadPage();
    //热门推荐切换
    $(".right_tab li").on("click",function(){
        if($(this).hasClass("tab_on")){
            return false;
        }
        $(this).addClass("tab_on").siblings().removeClass("tab_on");
        $("#loadHot").show();
        hotHtml=""
        switch ($(this).attr("id")){
            case "xb_tj":
                hotApp.ajaxLoadPage();
                break;
            case "new_tj":
                hotNewApp.ajaxLoadPage();
                break;
        }
    });
    //加载更多热门推荐按钮
    $("#loadHot").on("click",function(){
        hotHtml=$('.app_box').html();
        if($("#xb_tj").hasClass("tab_on")){
            hotApp.ajaxLoadPage(++hotApp.pageNow);
        }else{
            hotNewApp.ajaxLoadPage(++hotNewApp.pageNow);
        }

    });
    //热门专题初始化
    loadAjaxPt("./hotSubject","homeZt_template",".zt_box",ztFn);
    //应用和游戏APP初始化
    //loadClassApp("/tvstore-tv-service/api/tvservice/core/categoryApp?ccode=20130418164308&model=100&categoryId=82&appId=110573&page=1&pageSize=5","class_yy");
    var o = 0;
    for (var i = 0; i < cates.length; i++) {
        for (var j = 0; j < cates[i]['num'].length; j++) {
            // console.log(cates[i]['num'][j])
            cid = cates[i]['cid'][j];
            num = cates[i]['num'][j];
            loadClassApp("./categoryApp?cid="+cid+"&pageSize="+num,"class_"+o);
            o++;
        };
    };
    // loadClassApp("./categoryApp?cid=1&pageSize=3","class1");

    //热点推荐成功回调函数
    function hotAppDom(data){
        if(!data){
            $("#loadHot").hide();
            return false;
        }
        if(data.newestAppList){
            data.recommendList=data.newestAppList;
        }
        for(var i= 0,dataLen=data.recommendList.length;i<dataLen;i++){
            data.recommendList[i].avgRating=data.recommendList[i].avgRating*10;
            if(data.recommendList[i].recommend == null){
              data.recommendList[i]._description = (data.recommendList[i].description).substr(0,26) + "...";
            }else{
              data.recommendList[i]._description = data.recommendList[i].recommend;
            }
        }
        
        var output = Mustache.render($("#hotApp_template").html(),data);
        $(".app_box").html(hotHtml+output);

        switch ($(".right_tab li.tab_on").attr("id")){
            case "xb_tj":
                if(hotApp.pageNow>=hotApp.pageTotal){
                    $("#loadHot").hide();
                }
                break;
            case "new_tj":
                if(hotNewApp.pageNow>=hotNewApp.pageTotal){
                    $("#loadHot").hide();
                }
                break;
        }
        $(".app_box dl:nth-child(4n)").css("margin-right",0);
        $(".img_tab img[src*='.png']").show();
        $('.app_box dl').hover(function(){
            $(this).find(".app_mark_w").show();
            $(this).find(".app_mark").show();
            $(this).find("dd").css("border-bottom","solid #dadbdb 1px");
        },function(){
            $(this).find(".app_mark_w").hide();
            $(this).find(".app_mark").hide();
            $(this).find("dd").css("border-bottom","solid #fff 1px");
        });
        // $(".down_bt").off("click").on("click",function(){
        //     var appID=$(this).attr('href').split("#");
        //     $.ajax({
        //         url:'/tvstore-tv-service/api/tvservice/core/appDownload?ccode=20130418164308&model=100&appId='+appID[1]+'&tokenType=PCSTORE_TK',
        //         type:'get',
        //         contentType: "application/json; charset=UTF-8",
        //         dataType:"json",
        //         success:function(downURL){
        //             window.location.href=downURL.downloadUrl;
        //         }
        //     });
        //     return false;
        // });
        $(".ts_bt").off("click").on("click",function(){
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
//焦点图成功回调函数
function focusDom(data){
    if(!data){
        return false;
    }
    var output = Mustache.render($("#foucsImg_template").html(),data);
    $("#focusImg ul").html(output);
    $("#focusImg").focusImgFn({
        autoPlay:true,
        comeLeft:-581,
        playTime:3
    });
}
//分类APP，Ajax加载
function loadClassApp(fullUrl,targetID){
    $.ajax({
        url:fullUrl,
        type:'get',
        contentType: "application/json; charset=UTF-8",
        dataType:"json",
        success:function(data){
            if(!data){
                return false;
            }
            for(var i= 0,dataLen=data.categoryAppList.length;i<dataLen;i++){
                data.categoryAppList[i].avgRating=data.categoryAppList[i].avgRating*10;
            }
            var output = Mustache.render($("#appClassList_template").html(),data);
            $("#"+targetID).html(output);
            $(".app_list_box ul li").hover(function(){
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
}
function ztFn(){
    $(".zt_box dl:first").removeClass("zt_marginL");
}
