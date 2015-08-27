// Authored by Funa @ 2014.3

// var thisUrl = $("#appMain").attr('thisUrl');
// alert(thisUrl);

  // function download(){
  //   $.ajax({
  //     url: 'as',
  //     type: 'GET',
  //     contentType: "application/json; charset=UTF-8",
  //     dataType: 'json'
  //   }).success(function(data){
  //     $(".appInfo .btnGroup .download").attr("href",data.downloadUrl);
  //   }).fail(function() {
  //     // console.log("download error");
  //   });
  // }
  // 应用详情
  function detail(){
    $.ajax({
      url: get_detail,
      type: 'GET',
      contentType: "application/json; charset=UTF-8",
      dataType: 'json'
    }).success(function(data){
      // console.log(data);
      if(data.name == null){
        alert("抱歉！无此应用。");
        window.history.go(-1);
      }
      data._avgRating = data.avgRating *10;
      // console.log(data.recommend);
      if(data.recommend == null){
        data._description = (data.description).substr(0,12) + "...";
      }else{
        data._description = data.recommend;
      }      
      if(data.downloadCount > 10000){
       data._downloadCount = ((data.downloadCount)/10000).toFixed(1)+"万"
      }else{
       data._downloadCount = data.downloadCount
      }
      if(data.acountCount > 10000){
       data._acountCount = ((data.acountCount)/10000).toFixed(1)+"万"
      }else{
       data._acountCount = data.acountCount
      }
      var output = Mustache.render($("#appHead_template").html(),data),
      appMain = Mustache.render($("#appMain_template").html(),data),
      appDetail = Mustache.render($("#appDetail_template").html(),data);
      $("#appHead .headContent").html(output);
      $("#appMain").html(appMain);
      $("#appDetail").html(appDetail);
     // 重置截图框尺寸以适应多图
      if(data.images[0].length > 0){
        var newWidth=0;
        var newImg = new Image();
        newImg.src = data.images[data.images.length-1];
        newImg.onload = function(){
            for (var i = 0; i < data.images.length; i++) {
              var imgW = $(".screenShots .box img").eq(i).width() + 10;
              newWidth += parseInt(imgW);
              // alert(imgW);
              };
              $(".screenShots .box").width(newWidth);
            }
      }
      $("#appMain .pushTV").click(function(){
        isLogin();
        if(!needLogin()){
          var appid = $(this).attr("appid");
          var pn = $(this).attr("pn");
          sendPush(appid,pn);
        }
      });
      addFavor();
      // download();
      // 百度推荐
      window._bd_share_config={"common":{"bdSnsKey":{"tsina":"3577304239"},"bdText":'快来letvstore下载"'+data.name+'"<br>吧！',"bdMini":"2","bdMiniList":false,"bdPic":data.icon,"bdStyle":"1","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
    })
    .fail(function() {
      // console.log("app detail error");
    });
  }
  //评论内容
  var pageNum = 1;
  function loadMore(){
    pageNum++;
    record();
  }
  function record(){
    var pageSize = 5;
    $(".loadRecord").hide();
    $.ajax({
      url:get_comment,
      data:{"p":pageNum},
      type: 'GET',
      contentType: "application/json; charset=UTF-8",
      dataType: 'json'
    }).success(function(data){
      var total = data.total;
      var pageCount = parseInt(Math.ceil(total/pageSize));
      // console.log(data);
      for(var i=0;i<data.appCommentList.length;i++){
        data.appCommentList[i]._rating = (data.appCommentList[i].rating)*10;
      }
      var output = Mustache.render($("#record_template").html(),data);
      $(".comment").append(output);
      if(pageCount != pageNum)
      	$(".loadRecord").show();
    })
    .fail(function() {
      // console.log("comments load error");
      pageNum--;
      $(".loadRecord").show();
    });
  }

  //相关推荐
  function relative(){
    $.ajax({
      url: get_relativeApp,
      type: 'GET',
      contentType: "application/json; charset=UTF-8",
      dataType: 'json'
    }).success(function(data){
      // console.log(data);
      for(var i=0;i<data.recommendList.length;i++){
        data.recommendList[i].avgRating = data.recommendList[i].avgRating *10;
      }
      var output = Mustache.render($("#relative_template").html(),data);
      $("#relative").append(output);
      $("#relative ul").first().addClass('first');
      pushHover();
     })
    .fail(function() {
      // console.log("relative error");
    });
  }

  //最新上架
  function latest(){
    $.ajax({
      url: get_newApp,
      type: 'GET',
      contentType: "application/json; charset=UTF-8",
      dataType: 'json'
    }).success(function(data){
      // console.log(data);
      for(var i=0;i<data.newestAppList.length;i++){
        data.newestAppList[i].avgRating = data.newestAppList[i].avgRating *10;
      }
      var output = Mustache.render($("#latest_template").html(),data);
      $(".recommend.latest").append(output);
      $(".recommend.latest ul").first().addClass('first');
      pushHover();
    })
    .fail(function() {
      // console.log("latest error");
    });
  }
  // 推送到TV
  function pushHover(){
    $(".app .data").mouseenter(function(){
        $(this).parent().children(".data").children('.star').hide();
        $(this).parent().children(".data").children('.num').hide();
        $(this).parent().children('.push').show();
      });
      $(".app").mouseleave(function(){
        $(this).children('.push').hide();
        $(this).children(".data").children('.star').show();
        $(this).children(".data").children('.num').show();      
      });
      push();
  }
  function push(){
    $(".app .push button").unbind('click');
    $(".app .push button").click(function(){
      isLogin();
      if(!needLogin()){
        var appid = $(this).attr("appid");
        var pn = $(this).attr("pn");
        sendPush(appid,pn);
      }
    });
  }
  function sendPush(id,pn){
    var sso_tk = getCookie("sso_tk");
    str = '{"appId":'+id+',"packageName":"'+pn+'","username":"'+ scopeLogin.bean.username +'","sso_tk":"' + sso_tk+'"}'
    $.ajax({
      url: '/tvstore-tv-service/api/tvservice/appPush/push',
      type: 'POST',
      contentType: "application/json; charset=UTF-8",
      dataType: 'json',
      data: str
    }).success(function(data){
      // console.log(data)
      if(data){

        $(".dialog div").not(".close").hide();
        $(".mask").fadeIn('fast', function() {
          $(".dialog,.dialog .push.ok").show();
          $(".dialog").css({"left":$(window).width()/2-$(".dialog").outerWidth()/2,"top":$(window).height()/2-$(".dialog").outerHeight()/2+$(window).scrollTop()});
        });
      }else{
        $(".dialog div").not(".close").hide();
        $(".mask").fadeIn('fast', function() {
          $(".dialog,.dialog .push.false").show();
          $(".dialog").css({"left":$(window).width()/2-$(".dialog").outerWidth()/2,"top":$(window).height()/2-$(".dialog").outerHeight()/2+$(window).scrollTop()});
        });
      }
      // console.log(id +" pushed");
    })
    .fail(function() {
      $(".dialog div").not(".close").hide();
        $(".mask").fadeIn('fast', function() {
          $(".dialog,.dialog .push.false").show();
          $(".dialog").css({"left":$(window).width()/2-$(".dialog").outerWidth()/2,"top":$(window).height()/2-$(".dialog").outerHeight()/2+$(window).scrollTop()});
      });
      // alert(str);
      // console.log(id +" push error");
    });    
  }
  var scopeLogin = null;
  // 判断是否登录
  function isLogin(){
    $.ajax({
      url: is_Login,
      type: 'GET',
      contentType: "application/json;  charset=UTF-8",
      dataType: 'json',
      async:false,
    }).success(function(data){
      // console.log(data);
      if(parseInt(data.status) == 1){
        userCenterId = data.bean.ssouid;
        $("#userName").attr("uid",userCenterId).text(data.bean.username);
      }
      scopeLogin = data;
    })
    .fail(function() {
      // console.log("check Login error");
    });
  }
  //处理特殊字符
  function HTMLEnCode(str){
    var s = "";
    if (str.length == 0) return "";
    s = str.replace(/&/g, "&amp;");
    s = s.replace(/</g, "&lt;");
    s = s.replace(/>/g, "&gt;");
    s = s.replace(/ /g,"&nbsp;");
    s = s.replace(/\'/g, "&#39;");
    s = s.replace(/\"/g, "&quot;");
    //s = s.replace(/\n/g, "<br>");
    return s;
  }

  // 提交评论
  function submitComment(){
    var content = HTMLEnCode($(".comment textarea").val());
    var rating = $(".comment .markStar").attr("rating");
    // var sso_tk = getCookie("sso_tk");
    // var str = '{"ccode":"20130418164308","model":"100","userCenterId":"' + scopeLogin.bean.ssouid + '","appId": ' + appId + ',"rating":' + rating +',"comment":"' + content + '","tv_token":"' + sso_tk + '","tokenType":"SSO_TK"}';

    var str = 'sgid= ' + appId + '&lever=' + rating +'&con=' + content;
    $.ajax({
      url: add_comment,
      type: 'POST',
      // contentType: "application/json; charset=UTF-8",
      dataType: 'json',
      async:false,
      data: str
    }).success(function(data){
      console.log(str);
      console.log(data);
      if(data.status && !data.exist){
        alert("感谢您的评论！");
        // update(data.avgRating,data.total);
        window.location.reload();
      }else if(data.exist){
        alert("对不起，您已提交过评论。");
      }
    })
    .fail(function(data) {
      alert("对不起，提交失败。");
      // console.log(str);
      // console.log("check Login error");
    });
  }
  // 提交成功后更新页面数据
  function update(rating,total){
    if(rating==null || total ==null){return;}
    $("#appDetail .info .star em").css("width",rating*10 +"%");
    $("#appMain .appInfo .count li").last().children('i').text(total);
    $("#appDetail h3 span").text("（"+total+"条）");
  }

  //修改判断 01-22
  function needLogin(){
    // var code = getCookie("sso_tk").replace(/"/g,'');
    if(scopeLogin == null){
      alert("请先登录！");
      window.location.href=login_url+'?next_url='+encodeURIComponent(window.location.href);
      return true;
    }else{
      return false;
    }
  }
  //读取cookies
  function getCookie(name){
    var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)"); 
    if(arr=document.cookie.match(reg)) 
      return (arr[2]);
    else
      return null;
  }
  // 添加到收藏夹
  function addFavor(){
    $("#appMain>.addFavor").click(function(){
      $(".mask").height($("html").height()).fadeIn();
    });
  }
  
  $(function(){
    detail();
    record();
    relative();
    latest();
    isLogin();
    $("#loadMore").click(loadMore);
    $(".mask").click(function(){
      $(this).fadeOut();
      $(".dialog,.dialog div").not(".close").hide();
    });
    // 评论
    $(".comment .placeholder").click(function(){
      $(this).hide();
      $(".comment textarea").focus();
    });
    $(".comment textarea").blur(function(){
      checkValue($(this));
    }).focus(function(){
      $("#cmtCaution").html("");
      $(".confirm button").removeClass('disabled');
      $(".comment .placeholder").hide();
    });
    $(".confirm button").click(function(){
      if(!checkValue($(".comment textarea"))){
        return;
      }
      if(needLogin()){
        return;
      }
      submitComment();
    });
    // 关闭弹层
    $(".dialog .close").click(function(event) {
      $(".dialog,.dialog div,.mask").not(".close").hide();
    });
    // 打分
    $(".markStar span").mouseenter(function(event) {
      $(".markStar span").removeClass('on');
      $(".markStar").attr("rating",($(this).index() + 1)*2);
      for(i=0;i<=$(this).index();i++){
        $(".markStar span").eq(i).addClass('on');
      }
    });

  });
  function checkValue(obj){
    var len = $(obj).val().replace(/^\s*|[\x00-\x1f]|\s*$/g, '').replace(/^\n+|\n+$/g,"");
    if(len.length > 140){
      $("#cmtCaution").html("<span class='icon'></span> 对不起，评论不能超过140字");
      $(".confirm button").addClass('disabled');
      return false;
    }
    if(len==''){
      $(".comment .placeholder").show();
    }
    $("#cmtCaution").html("");
    return true;
  }