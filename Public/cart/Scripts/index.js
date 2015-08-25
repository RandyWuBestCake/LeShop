/*   $(function(){
 var isWatchUserActionTop = false,isWatchUserActionBottom=false;
 var t = new Date().getTime();
 var sid = getCookie("COOKIE_SESSION_ID");
 $("#userActionBottom").load("/htmlResource/newstat-P-0-E-0-T-"+t+"_"+sid+".html");
 var pageBottomY = $("body").height()-$(window).height()-50;
 $(window).bind("scroll",function(event){
 if(!isWatchUserActionTop){
 $("#userActionTop").load("/htmlResource/newstat-P-0-E-2-T-"+t+"_"+sid+".html");
 isWatchUserActionTop=true;
 }
 if(!isWatchUserActionBottom && $(window).scrollTop()>=pageBottomY){
 isWatchUserActionBottom=true;
 $("#userActionBottom").load("/htmlResource/newstat-P-0-E-3-T-"+t+"_"+sid+".html");
 }
 });
 })*/

var img_select_timer;
$("#img_select").find("li").mousemove(function(){
    var target = $(this).attr("target");
    if(target){
        clearTimeout(img_select_timer);
        img_select_timer = setTimeout(function(){var arry = target.split("-");$("#aId"+arry[0]).find(".slide_cotrl a:eq("+(arry[1]-1)+")").trigger("click");},60);
    }

});

//展示弹窗拉幕
function top_show(){
    if($(".top_fadeIn_big").length>0){
        $(".top_fadeIn_big").slideDown("slow");
        $(".top_fadeIn_big").find(".close").click(top_hidden);
        $(".top_fadeIn_small").find(".close").click(function(){
            $(".top_fadeIn_small").slideUp("slow");
        });
        setTimeout(top_hidden,"3000");
    }
}
//隐藏弹窗拉幕
function top_hidden(){
    $(".top_fadeIn_big").slideUp("slow",function(){
        if($(".top_fadeIn_small").length>0){
            // $(".top_fadeIn_small").slideDown("slow");
        }
    });
}

void function(){
    $.fn.indexGallery = function(){
        return this.each(function(){
            var _this = $(this),gallery = _this.find("ul"),galleryLen = gallery.find("li").length,width = gallery.find("li").width();
            var galleryLi = gallery.find("li");
            lazyLoadImg(0);
            var currentIndex = 0;
            gallery.css("width",galleryLen*width);
            function switchImg(index){
                currentIndex = index;
                gallery.animate({"margin-left":-index*width+"px"},600);
            }
            function lazyLoadImg(index){
                insertImgSrc(index);
                for(var k=0;k<index;k++){
                    insertImgSrc(k);
                }
                if(index<galleryLen-1){
                    insertImgSrc(index+1);
                }
                if(index==0){
                    insertImgSrc(galleryLen-1);
                }
            }

            function insertImgSrc(index){
                var lazyImg = galleryLi.eq(index).find("img").attr("lazy_src");
                var src_url = galleryLi.eq(index).find("img").attr("src");
                if(lazyImg && (lazyImg != src_url)){
                    galleryLi.eq(index).find("img").attr("src",lazyImg);
                }
            }

            _this.find(".slide_tag").delegate('a', 'click', function(event) {
                _this.find(".slide_tag a").removeClass("cur");
                $(this).addClass("cur");
                lazyLoadImg($(this).prevAll().length);
                switchImg($(this).prevAll().length);
            });
            _this.find(".pre").click(function(){
                if(currentIndex>0)
                    currentIndex-=1;
                else
                    currentIndex = galleryLen-1;
                _this.find(".slide_tag a").eq(currentIndex).trigger("click");
            });
            _this.find(".next").click(function(){
                if(currentIndex<galleryLen-1)
                    currentIndex+=1;
                else
                    currentIndex = 0;
                _this.find(".slide_tag a").eq(currentIndex).trigger("click");
            });
        });
    }
}();

function getPxNum(str){
    return Number(str.substring(0, str.length - 2));
}

function floatPic(pic){
    $.each(pic, function(i, item){
        setTimeout(function(){
            if($(item).attr('direct') == "x"){
                $(item).animate({left : $(item).attr('orileft'), opacity : 1}, Number($(item).attr('float-speed')), "easeInQuad");
            } else {
                $(item).animate({top : $(item).attr('oritop'), opacity : 1}, Number($(item).attr('float-speed')), "easeInQuad");
            }
        }, Number($(item).attr('delay')) || 0);
    });
}

function movePic(obj, type){
    var top = obj.attr('oritop'), distance = Number(obj.attr('distance')), speed = Number(obj.attr("speed"));

    if(type == "up"){
        top = (getPxNum(top) - distance) + "px";
    }

    obj.clearQueue();
    obj.animate({top : top}, speed);
}

function initFloat(obj){
    $.each(obj, function(i, item){
        if($(item).attr('direct') == 'x'){
            $(item).css('left', (getPxNum($(item).css("left")) + Number($(item).attr('range'))) + "px");
        } else {
            $(item).css('top', (getPxNum($(item).css("top")) + Number($(item).attr('range'))) + "px");
        }

        $(item).css('opacity', 0);
        $(item).css('filter', 'alpha(opacity=0)');
    });
}

function judgeToFloatPic(floatTVPicList, floatTVRight, floatItemPicList){

    return function(){
        var scrollTop = $(window).scrollTop();

        if(scrollTop > 500 && scrollTop < 700){
            floatPic([floatTVPicList[0], floatTVRight[0]]);
        }

        if(scrollTop > 800 && scrollTop < 1000){
            floatPic([floatTVPicList[1], floatTVPicList[2], floatTVPicList[4], floatTVRight[1]]);
        }

        if(scrollTop > 900 && scrollTop < 1100){
            floatPic([floatTVRight[2]]);
        }

        if(scrollTop > 1000 && scrollTop < 1200){
            floatPic([floatTVPicList[3]]);
        }

        if(scrollTop > 1100 && scrollTop < 1300){
            floatPic([floatTVRight[3]]);
        }

        if(scrollTop > 2400 && scrollTop < 2600){
            floatPic([floatItemPicList[0], floatItemPicList[1], floatItemPicList[2]]);
        }

        if(scrollTop > 2700 && scrollTop < 2900){
            floatPic([floatItemPicList[3], floatItemPicList[4], floatItemPicList[5], floatItemPicList[6]]);
        }
    }
}

function floatSdList(){
    setTimeout(function(){
        var sdList = $("#sdList");
        var firstNode = sdList.find("li:first");

        sdList.append(firstNode.clone());
        sdList.animate({"top" : "-114px"}, 1000, function(){
            firstNode.remove();
            sdList.css("top", "0px");
            floatSdList();
        })
    }, 1500);
}

$(function(){
    var isWatchUserActionTop = false,isWatchUserActionBottom=false;
    var pageBottomY = $("body").height()-$(window).height()-50;
    $(window).bind("scroll",function(){
        if(!isWatchUserActionTop){
            isWatchUserActionTop=true;
            postPVdata(2, 2, null, null);
            //$.post("/htmlResource/pv.jsonp", {info:"2|||2||||||"+getTongJiLink()});
        }
        if(!isWatchUserActionBottom && $(window).scrollTop()>=pageBottomY){
            isWatchUserActionBottom=true;
            postPVdata(2, 3, null, null);
            //$.post("/htmlResource/pv.jsonp", {info:"2|||3||||||"+getTongJiLink()});
        }
    });

    top_show();
    $("#scrollImg").find("li").bind("mouseover",function(){
        $(this).find("a").css({display:"block", margin:"0 auto",position:"absolute",left:"-5px",top:"-6px","z-index":"99"}).find("img").css({width:"106px",height:"136px"});
    }).bind("mouseleave",function(){
        $(this).find("a").attr("style","").find("img").css({width:"87px",height:"113px"});
    });
    $("#index_tv,#index_yk,#index_box").indexGallery();

    //绑定鼠标移入图片浮动效果
    $("[oritop]").unbind("mouseenter").mouseenter(function(){
        movePic($(this), "up");
    });

    $("[oritop]").unbind("mouseleave").mouseleave(function(){
        movePic($(this), "down");
    });

    if(!(Js.Tools.mobileDev().iPhone || Js.Tools.mobileDev().iPad || Js.Tools.mobileDev().android)){
        //初始化电视广告位移入效果
        var floatTVPicList = $(".index_tv_list li");
        var floatTVRight = $(".index_tv_right .absolute");
        //初始化配件广告位移入效果
        var floatItemPicList = $(".part_list li");

        initFloat(floatTVPicList.toArray().concat(floatTVRight.toArray()).concat(floatItemPicList.toArray()));

        var _judgeToFloatPic = judgeToFloatPic(floatTVPicList, floatTVRight, floatItemPicList);

        $(window).scroll(_judgeToFloatPic);
        _judgeToFloatPic();
    }

    floatSdList();
});