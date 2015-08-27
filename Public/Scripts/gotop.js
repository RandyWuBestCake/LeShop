$(function(){
    var user=isLogin(),time=null;
    if(user){
        $(".login_bt").hover(function(){
            if($("#userMenu").attr("id")){
                $("#userMenu").show();
            }else{
                $(this).attr("href","javascript:;")
                $(".topSearch").append($("<dl id='userMenu'></dl>"));
                $("#userMenu").html("<dd>"+user+"</dd><!--<dd><a href='javascript:;'>我的收藏</a></dd><dd><a href='javascript:;'>站内信</a></dd><dd><a href='javascript:;'>用户中心</a></dd>--><dd><a href='"+login_out+"'>安全退出</a></dd>")
            }
        },function(){
            time=setTimeout(function(){
                $("#userMenu").hide();
            },1000);
            $("#userMenu").off("mouseover").on("mouseover",function(){
                clearInterval(time);
                $("#userMenu").show();
            });
            $("#userMenu").off("mouseout").on("mouseout",function(){
                $("#userMenu").hide();
            });
        });
    }
    var winWide = $(window).width(),playerTop=$("body").offset().top+150;
    $("#appPlayer").css({"top":playerTop,"left":winWide-(winWide-1004)/2-1100});
    $(window).on("scroll",function(){
        goTopInit()
        if($(window).scrollTop()>=playerTop){
            $("#appPlayer").css({"position":"fixed","top":0});
        }else{
            $("#appPlayer").css({"position":"absolute","top":playerTop});
        }
    });
    $(window).on("resize",function(){
        goTopInit()
    });
    $("#goTop").on("click",function(){
        $(window).scrollTop(0);
    });
    function goTopInit(){
        if($(window).scrollTop()==0){
            $("#goTop").hide();
        }else{
            $("#goTop").show();
        }
        $("#goTop").css({"left":(winWide-1004)/2+1040});
    }
});
//推送成功弹出框
function prompt(tsBean){
    var $body=$("body"),$window=$(window);
    if($('#tsTipMark').attr("id")){
        $("#tsTipMark").show();
        $("#tsTip").show()
        if(tsBean){
            $("#tsTip h2").html("推送成功");
            $("#tsTip p").html("应用已成功推送至TV，请在电视端使用！");
        }else{
            $("#tsTip h2").html("推送失败");
            $("#tsTip p").html("应用未能推送至TV，请检查网络！");
        }
    }else{
        if(tsBean){
            $body.append($("<div id='tsTipMark'></div>"));
            $body.append($("<div id='tsTip'></div>"));
            $("#tsTip").html("<span id='closeTip'></span><h2 class='tsTitleCg'>推送成功</h2><p>应用已成功推送至TV，请在电视端使用！</p><img src='images/ts_cg.jpg' />");
        }else{
            $body.append($("<div id='tsTipMark'></div>"));
            $body.append($("<div id='tsTip'></div>"));
            $("#tsTip").html("<span id='closeTip'></span><h2 class='tsTitleSb'>推送失败</h2><p>应用未能推送至TV，请检查网络！</p>");
        }
    }
    $("#tsTipMark").height($body.height());
    $("#tsTip").css({"left":$window.width()/2-$("#tsTip").outerWidth()/2,"top":$window.height()/2-$("#tsTip").outerHeight()/2+$window.scrollTop()});
    $("#closeTip").on("click",function(){
        $("#tsTipMark").hide();
        $("#tsTip").hide()
    })
}
function login(){
    window.location.href=login_url+'/?next_url='+encodeURIComponent(window.location.href);
}
//读取cookies
function getCookie(name)
{
    var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");

    if(arr=document.cookie.match(reg))

        return (arr[2]);
    else
        return null;
}
function isLogin(){
    var sso_cookie=getCookie("sso_tk"),loginBean=false;
    // alert(sso_cookie);
    if(sso_cookie){
        return loginBean;
    }else{
//        if(sso_cookie.substring(0,1)==='"'){
//            sso_cookie=sso_cookie.replace(/^\"|\"$/g,"");
//        }
        $.ajax({
            url:is_Login,
            type:'get',
            async:false,
            contentType: "application/json; charset=UTF-8",
            dataType:"json",
            success:function(data){
                if(data.bean.username){
                    loginBean=data.bean.username;
                }else{
                    loginBean=false;
                }
            }
        });
    }
    return loginBean;
}
function tsFn(apID,pn){
    var userName=isLogin(),tsBean=false;
    if(userName){
        var sso_cookie=getCookie("sso_tk");
//        sso_cookie=sso_cookie.substring(1,sso_cookie.length-1);//fk 为毛要截取？两边带引号？啥浏览器会这样？
        $.ajax({
            url:"/tvstore-tv-service/api/tvservice/appPush/push",
            type:'post',
            data:'{"appId":'+apID+',"packageName":"'+pn+'","username":"'+userName+'","sso_tk":"'+sso_cookie+'"}',
            async:false,
            contentType: "application/json; charset=UTF-8",
            dataType:"json",
            success:function(data){
                tsBean=data;
            }
        });
    }else{
        tsBean = 0;
    }
    return tsBean;
}