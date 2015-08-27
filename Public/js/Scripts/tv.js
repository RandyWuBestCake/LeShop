/**
*pc转到m站的跳转
*/
if(globalVar.m_url!=""){
var browser={versions:function(){var a=navigator.userAgent;return{mobile:!!a.match(/AppleWebKit.*Mobile.*/),ios:!!a.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/),android:-1<a.indexOf("Android"),iPhone:-1<a.indexOf("iPhone"),iPad:-1<a.indexOf("iPad"),webApp:-1==a.indexOf("Safari")}}()};if(document.cookie.indexOf("COOKIE_USER_ID_FORWARD_WAP")==-1&&!browser.versions.iPad&&(browser.versions.iPhone||browser.versions.mobile||browser.versions.android)){window.location.href=globalVar.m_url+location.search};
}
  /**
*渐隐渐现图片切换效果
*/
$.fn.galleryFade=function(options){var defaults={speed:600,time:2500,shift:0};var options=$.extend(defaults,options);return this.each(function(){var _this=$(this),slide=_this.find("ul"),slide_num=(slide.find("li").length),currentIndex=0;var auto_timer;slide.find("li").hide().eq(0).show();function switchImg(index){currentIndex=index;slide.find("li").hide().eq(index).fadeIn();_this.find(".slide_cotrl a").removeClass("cur").eq(index).addClass("cur");window.clearTimeout(auto_timer);auto_timer=setTimeout(function(){_this.find(".next").trigger("click");},options.time);}
_this.find(".slide_cotrl").delegate('a','click',function(event){switchImg(($(this).prevAll().length));});_this.find(".pre").click(function(){if(currentIndex>0){currentIndex-=1;}else{currentIndex=slide_num;}
switchImg(currentIndex);});_this.find(".next").click(function(){if(currentIndex<slide_num-1){currentIndex+=1;}else{currentIndex=0;}
switchImg(currentIndex);});auto_timer=setTimeout(function(){_this.find(".next").trigger("click");},options.time);_this.mouseover(function(){_this.find(".slide_cotrl2").show();}).mouseleave(function(){_this.find(".slide_cotrl2").hide();}).find(".slide_cotrl").mouseover(function(){window.clearTimeout(auto_timer);}).mouseleave(function(){auto_timer=setTimeout(function(){_this.find(".next").trigger("click");},options.time);});});}
/**
*图片轮播效果
*/
$.fn.indexGallery=function(){return this.each(function(){var _this=$(this),gallery=_this.find("ul"),galleryLen=gallery.find("li").length,width=gallery.find("li").width();var currentIndex=0;gallery.css("width",galleryLen*width);function switchImg(index){currentIndex=index;gallery.animate({"margin-left":-index*width+"px"},600);}
_this.find(".js_slide_tag").delegate('a','click',function(event){_this.find(".js_slide_tag a").removeClass("cur");$(this).addClass("cur");switchImg($(this).prevAll().length);});_this.find(".pre").click(function(){if(currentIndex>0)
currentIndex-=1;else
currentIndex=galleryLen-1;_this.find(".js_slide_tag a").eq(currentIndex).trigger("click");});_this.find(".next").click(function(){if(currentIndex<galleryLen-1)
currentIndex+=1;else
currentIndex=0;_this.find(".js_slide_tag a").eq(currentIndex).trigger("click");});});}	
/**
*飘窗效果
*/ 
$.fn.smartFloat=function(){var position=function(element){var top=element.position().top,pos=element.css("position");$(window).scroll(function(){var scrolls=$(this).scrollTop();if(scrolls>top){if(window.XMLHttpRequest){element.css({position:"fixed",top:0});}else{element.css({top:scrolls});}}else{element.css({position:pos,top:top});}});};return $(this).each(function(){position($(this));});}; 

/**
*页头标签切换事件
*/
function tabSwitch(){
  /**
    $(".uptabSwitch").find("li:not(.lema)").bind('click', function(){
        var i = $(this).index();
        $(".cur",(".uptabSwitch")).attr("class","");
        $(this).find("a").attr("class" ,"cur");
        $(".tabSwichDiv").hide();
        $(".tabSwichDiv"+i).show();
    }); 
    */
}

/**
*查询当前型号参加预约抢购活动的状态
*/
function queryRushInfo(rushid){
	Js.sendData(sendLink.ordr+"api/web/query/queryLocalRushList.jsonp","RUSH_ID="+rushid,function(data){
		for(var i=0;i<data.result.length;i++){
			  var rushItem = data.result[i];
			  showRushInfo(rushItem.AMTSTATUSNAME,rushItem.RUSHSTATUSNAME,rushItem.RUSH_ID,rushItem.USER_STATUS,rushItem.LONGTIME,rushItem.RUSHLONG);  
		}
	})
}  

//预约状态[1:未开始,2:正在进行,3:结束]，抢购状态[1:未开始,2:正在进行,3:结束]，活动id,是否已经预约,预约开始时间数，抢购开始时间数
function showRushInfo(yyCode,rushCode,rushId,user_status,longtime,rushtime){
	if(rushCode=="1"){//抢购未开始
		if(yyCode=="1"){//预约未开始
          $(".rush_1").removeClass("hidden");
		}else if(yyCode=="2"){//预约进行中
			$(".rush_2").removeClass("hidden");
		}else if(yyCode=="3"){//预约已结束
         $(".rush_3").removeClass("hidden");
		}      
	}else if(rushCode=="2"){//抢购进行中
         $(".rush_4").removeClass("hidden");
	}else if(rushCode=="3"){//抢购已结束
      $(".rush_5").removeClass("hidden");
	}
}