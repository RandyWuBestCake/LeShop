$(function(){
    $("a").focus(function(){
        $(this).blur();
    });
    var AppClassName="";
    var urlId=window.location.search;
    urlId=urlId.substring(1);
    urlId=urlId.split("=");
        // console.log(urlId)

    if(urlId[0]=="categoryId"){
            AppClassName=cateName;
    }else if(urlId[0]=="tagId"){
        var tagArray=urlId[1].split("&");
        urlId[1]=tagArray[0];
        AppClassName=decodeURIComponent(tagArray[1])||"无标签名";
    }else if(urlId[0]=="keyword"){
        AppClassName="关键字为 “"+decodeURIComponent(urlId[1])+"” 的应用";
        $(".right_tab").hide();
    }
    $(".lm_title span").html(AppClassName);
    //$(".tab_box h2").html(AppClassName);
    $(".navBox ul li:contains("+AppClassName+")").addClass("navCurrent").siblings().removeClass("navCurrent");

    if(urlId[1]&&urlId[0]=="categoryId"){
        //列表加载
        var zrAppPage=new LoadAjaxPage({
            ajaxUrl:cateApp,
            pageSize:28,
            // orderBy:'id',
            successFn:appClassDom,
        });
        zrAppPage.ajaxLoadPage(1,"pageBox");
        var zxAppPage=new LoadAjaxPage({
            ajaxUrl:zxApp,
            pageSize:28,
            successFn:appClassDom
        });
        var hpAppPage=new LoadAjaxPage({
            ajaxUrl:hpApp,
            pageSize:28,
            successFn:appClassDom
        });
    }else if(urlId[1]&&urlId[0]=="tagId"){
        var zrTagAppPage=new LoadAjaxPage({
            ajaxUrl:zrtApp,
            pageSize:28,
            successFn:tagAppClassDom
        });
        zrTagAppPage.ajaxLoadPage(1,"pageBox");
        var zxTagAppPage=new LoadAjaxPage({
            ajaxUrl:zxtApp,
            pageSize:28,
            successFn:tagAppClassDom
        });
        var hpTagAppPage=new LoadAjaxPage({
            ajaxUrl:hptApp,
            pageSize:28,
            successFn:tagAppClassDom
        });
    }else if(urlId[1]&&urlId[0]=="keyword"){
        var searchApp=new LoadAjaxPage({
            ajaxUrl:'./cateApp?query='+urlId[1],
            pageSize:28,
            successFn:searchAppClassDom
        });
        searchApp.ajaxLoadPage(1,"pageBox");
    }
    //应用排序标签切换
    $(".right_tab li").on("click",function(){
        if($(this).hasClass("tab_on")){
            return false;
        }
        $(this).addClass("tab_on").siblings().removeClass("tab_on");
        if(urlId[1]&&urlId[0]=="categoryId"){
            switch ($(this).attr("id")){
                case "zrApp":
                    zrAppPage.ajaxLoadPage(1,"pageBox");
                    break;
                case "zxApp":
                    zxAppPage.ajaxLoadPage(1,"pageBox");
                    break;
                case "hpApp":
                    hpAppPage.ajaxLoadPage(1,"pageBox");
                    break;
            }
        }else if(urlId[1]&&urlId[0]=="tagId"){
            switch ($(this).attr("id")){
                case "zrApp":
                    zrTagAppPage.ajaxLoadPage(1,"pageBox");
                    break;
                case "zxApp":
                    zxTagAppPage.ajaxLoadPage(1,"pageBox");
                    break;
                case "hpApp":
                    hpTagAppPage.ajaxLoadPage(1,"pageBox");
                    break;
            }
        }
    });
    /*--
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
    */
    //分类APP，Ajax加载
    function appClassDom(data){
        if(!data){
            return false;
        }
        for(var i= 0,dataLen=data.categoryAppList.length;i<dataLen;i++){
            data.categoryAppList[i].avgRating=data.categoryAppList[i].avgRating*10;
        }
        var output = Mustache.render($("#appClassList_template").html(),data);
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
    //标签APP，Ajax加载
    function tagAppClassDom(data){
        if(!data){
            return false;
        }
        for(var i= 0,dataLen=data.operatingAppList.length;i<dataLen;i++){
            data.operatingAppList[i].avgRating=data.operatingAppList[i].avgRating*10;
        }
        var output = Mustache.render($("#tagAppClassList_template").html(),data);
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
    //搜索，Ajax加载
    function searchAppClassDom(data){
        if(!data){
            return false;
        }
        for(var i= 0,dataLen=data.searchResults.length;i<dataLen;i++){
            data.searchResults[i].avgRating=data.searchResults[i].avgRating*10;
        }
        var output = Mustache.render($("#searchAppClassList_template").html(),data);
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
