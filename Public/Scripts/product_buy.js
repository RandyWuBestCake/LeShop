var browser={versions:function(){var a=navigator.userAgent;return{mobile:!!a.match(/AppleWebKit.*Mobile.*/),ios:!!a.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/),android:-1<a.indexOf("Android")||-1<a.indexOf("Linux"),iPhone:-1<a.indexOf("iPhone"),iPad:-1<a.indexOf("iPad"),webApp:-1==a.indexOf("Safari")}}()};if(document.cookie.indexOf("COOKIE_USER_ID_FORWARD_WAP")==-1&&!browser.versions.iPad&&(browser.versions.iPhone||browser.versions.mobile||browser.versions.android)){window.location.href="http://m.shop.letv.com/index.php?c=products&a=view&pid="+globalVar.pid};

$.fn.smartFloat=function(){var position=function(element){var top=element.position().top,pos=element.css("position");$(window).scroll(function(){var scrolls=$(this).scrollTop();if(scrolls>top){if(window.XMLHttpRequest){element.css({position:"fixed",top:0});}else{element.css({top:scrolls});}}else{element.css({position:pos,top:top});}});};return $(this).each(function(){position($(this));});};


/**
*方法入口
*/
$(function(){
	//初始化页面
	initPage();
    //计算默认省份库存
    checkStock();
	//计算默认的配件和商品
	opeTVCar();
});

/**
*初始化页面
*/
function initPage(){
	//电视周边图片滚动效果
    if(globalVar.hasPhotoList>0){	
		$(".scrollImg").jCarouselLite({
			btnPrev: "#top",
			btnNext: "#foot",
			speed: 500,
			visible:6,
			vertical:false,
			circular:false
		});
	}
    //硬件价格+内容价格切换
	$(".showdiv").mouseover(function(){
		$(".absolute").hide();
		var tid = $(this).attr("tid");
		$("#"+tid).show();
	}).mouseleave(function(){
		$(".absolute").hide();
	});
	
	//商品介绍+评价晒单+参数规格+售后服务切换
	$(".tab_title").find("li").live("click",function(){
	    var cid=$(this).attr("cid");
		$(".tab_title").find("li").attr('class','');
		$(this).attr('class','cur');
		$(".tab_content").hide();
        if(cid=="pingjia" || cid=="jieshao"){	
			$("#pingjia").show();
		}
		$("#"+cid).show();
	});
  		
	
	//评价锚点
	$("#gopj").live("click",function(){
        $("[cid='pingjia']").trigger("click");
      window.location.hash = "#pingjia";
	});
	
	//绑定飘窗
	$("#piao").smartFloat();
	
	//从cookie中获取用户以前选择的省份id
    var select_province_id = getCookie("COOKIE_SELECT_PROVINCE_ID");
    if(select_province_id!=null && select_province_id!=""){
        $("#provinceid").val(select_province_id);
    }else{
        var provinceid = getCookie("COOKIE_USER_PROVINCE_ID");
        if(provinceid!=null && provinceid!=""){
            $("#provinceid").val(provinceid);
        }
    }
	//延保事件绷定
	$(".insurance").mouseover(function(){
		$(".insurance").removeClass("hidden");
	}).mouseout(function(){
		$(".insurance").addClass("hidden");
		$(".insurance.cur").removeClass("hidden");
	});
	
	$(".insurance").live("click",function(){
		$(".insurance").addClass("hidden");
		$(".insurance").removeClass("cur");
		$(this).removeClass("hidden");
		$(this).addClass("cur");
		opeTVCar();
	});
	
	//大客户购买事件绷定
	$(".toCart_dkh").click(function(){
		Js.login.hasLogin(function(){ 
			if(checkDkh()){
				return;
			}
			var cityid = $("#provinceid").val();
			var murl=Js.Tools.urlCode("p="+globalVar.bmpids+"&j=0"+"&y=0"+"&d="+cityid+"&v="+globalVar.isdkPro);
			window.location.href="/orderInfoNew.html?"+murl;
			window.event.returnValue = false;
		});
	});
	
	$(".toCartPj_dkh").click(function(){
		var pjpid=$(this).attr("pid");//配件id
	    var pnum=$(this).attr("num");//配件数量
		var pids=pjpid+"_"+pnum;
		Js.login.hasLogin(function(){ 
			if(checkDkh()){
				return;
			}
			var murl=Js.Tools.urlCode("p="+pids+"&j=0"+"&y=0"+"&d="+cityid+"&v="+globalVar.isdkPro);
			window.location.href="/orderInfoNew.html?"+murl;
			window.event.returnValue = false;
		});
	});
	
}

/**
*判断大客户相关信息
*/
function checkDkh(){
    var usertype = getCookie("COOKIE_USER_TYPE");
    if(usertype!="5" && globalVar.isdkPro=="1"){//用户非大客户,商品是大客户商品
        pop("#dkhalert2");
        return true;
    }
    return false;
}

/**
*根据省份判断库存
*/
function checkStock(){
    $(".quickBuyName").hide();//购买按钮隐藏
	$(".quickBuyNameZH").hide();//购买按钮隐藏
	$(".noBuyName").hide();//购买按钮隐藏
	$(".noBuyNameZH").hide();//购买按钮隐藏
    $(".loading_img").show();//展示loading
    var cityid = $("#provinceid").val();
    var params={param:'arrivalId='+cityid+'&pids='+globalVar.pid,showPartLoad:true,partLoadId:"#showaddDialog"};
    Js.sendData(sendLink.prod+"api/web/query/getProductInfo.jsonp",params,function(data){
        var result = data.result;
        var status=data.status;
        if(status==1){
            $(".loading_img").hide();//隐藏展示loading
            var miniPro = result[0];//查询商品状态相关信息
            if(miniPro.IS_ADVANCE_BOOKING==1 ){
                if(miniPro.showStatus==1 ){
                    globalVar.stockstatus=2;
                    $("#stockdesc").html("");
                    $(".noBuyName").html("<a class='gray_bt_m block'><span style='cursor:default'>暂停预定</span></a>");
					$(".quickBuyNameZH").html("<a class='gray_bt_s block'><span style='cursor:default'>暂停预定</span></a>");
					$(".noBuyName").show();
					$(".noBuyNameZH").show();
                }else if(miniPro.showStatus==3 || miniPro.showStatus==4 || miniPro.showStatus==5){
                    globalVar.stockstatus=2;
                    $("#stockdesc").html("");
                    $(".noBuyName").html("<a class='gray_bt_m block'><span style='cursor:default'>商品不可售</span></a>");
					$(".quickBuyNameZH").html("<a class='gray_bt_s block'><span style='cursor:default'>商品不可售</span></a>");
					$(".noBuyName").show();
					$(".noBuyNameZH").show();
                }else{
                    globalVar.stockstatus=0;
                    $("#stockdesc").html('<span class="red pl10">持续预售中</span><span class="black">（查看</span><a href="http://shop.letv.com/help/yggz.html" target="_blank"><span class="skyblue">预售规则</span></a>，<a target="_blank" href="http://shop.letv.com/help/wlps/cjdsps.html"><span class="skyblue">配送范围</span></a><span class="black">）</span>');
					$(".quickBuyName").show();
					$(".quickBuyNameZH").show();         
                }
            }else{
                if(miniPro.showStatus==6){//可以正常购买
                    globalVar.stockstatus=1;
                    $("#stockdesc").html("有货");
					$(".quickBuyName").show();
					$(".quickBuyNameZH").show();  
                    //---预购流程修改end
                }else if(miniPro.showStatus==1){//已下架
                    globalVar.stockstatus=2;
                    $("#stockdesc").html("");
                    $(".noBuyName").html("<a class='gray_bt_m block'><span style='cursor:default'>暂停预定</span></a>");
					$(".noBuyNameZH").html("<a class='gray_bt_s block'><span style='cursor:default'>暂停预定</span></a>");
					$(".noBuyName").show();
					$(".noBuyNameZH").show();
                }else if(miniPro.showStatus==3 || miniPro.showStatus==4 || miniPro.showStatus==5){//不可售
                    globalVar.stockstatus=2;
                    $("#stockdesc").html("");
                    $(".noBuyName").html("<a class='gray_bt_m block'><span style='cursor:default'>商品不可售</span></a>");
					$(".noBuyNameZH").html("<a class='gray_bt_s block'><span style='cursor:default'>商品不可售</span></a>");
					$(".noBuyName").show();
					$(".noBuyNameZH").show();
                }else if(miniPro.showStatus==2){//无货
                    globalVar.stockstatus=2;
                    $("#stockdesc").html("无货");
                    $(".noBuyName").html("<a class='gray_bt_m block'><span style='cursor:default'>商品缺货</span></a>");
					$(".noBuyNameZH").html("<a class='gray_bt_s block'><span style='cursor:default'>商品缺货</span></a>");
					$(".noBuyName").show();
					$(".noBuyNameZH").show();
                }
            }
        }
    });
	//将用户选择的省份id存放在cookie中
	var cookie_province_id = $("#provinceid").val();
	addCookie("COOKIE_SELECT_PROVINCE_ID",cookie_province_id);
}

//计算必买配件
function opeTVCar(){
	if(globalVar.isdkPro=="1"){//大客户商品
		opeTVCarForDkh();
	}else{//普通商品
		opeTVCarForPt();
	}
}

//计算必买配件（普通商品）
function opeTVCarForPt(){
	globalVar.bmpids='';
	var tvNum=parseInt($("#tvSelectNum").val());//用户购买数量
    var suitId=0;//如果是套装，则suitId=pid；如果不是套装，则suitId=0
    if(globalVar.isSuitData=="1"){//是套装
        suitId=globalVar.pid;
    }
	/***计算必买配件***/
	$("input[name='bmprolist']").each(function(){
		var pid = $(this).attr("pid");
		var pnum = parseInt($(this).attr("num"));//选择的配件数量
		if(globalVar.bmpids!=''){
			globalVar.bmpids+="^"+"0_"+pid+"_"+suitId+"_"+(pnum * tvNum);
		}else{
			globalVar.bmpids+="0_"+pid+"_"+suitId+"_"+(pnum * tvNum);
		}
	});
	
	if($(".insurance.cur").length>0){//如果存在延保
		var insu_pid=$(".insurance.cur").attr("val");//延保的商品id
		if(insu_pid!="0"){
			globalVar.bmpids+="^"+"0_"+insu_pid+"_"+suitId+"_"+tvNum;
		}
	}
	
	//拼装加入购物车的商品参数
	$(".addToCart_TV").attr("pids",globalVar.bmpids);
}

//计算必买配件（大客户商品）
function opeTVCarForDkh(){
	globalVar.bmpids='';
	var tvNum=parseInt($("#tvSelectNum").val());//用户购买数量
    
	/***计算必买配件***/
	$("input[name='bmprolist']").each(function(){
		var pid = $(this).attr("pid");
		var pnum = parseInt($(this).attr("num"));//选择的配件数量
		if(globalVar.bmpids!=''){
			globalVar.bmpids+="^"+pid+"_"+(pnum * tvNum);
		}else{
			globalVar.bmpids+=pid+"_"+(pnum * tvNum);
		}
	});
	
	if($(".insurance.cur").length>0){//如果存在延保
		var insu_pid=$(".insurance.cur").attr("val");//延保的商品id
		if(insu_pid!="0"){
			globalVar.bmpids+="^"+insu_pid+"_"+tvNum;
		}
	}
}

/**
*修改配件数量
*/
function changeBuyNum(id,type){
    var value=$("#"+id).val();
    var min = parseInt($("#"+id).attr("min"));
    var max = parseInt($("#"+id).attr("max"));
    var newvalue;
    if(type==0){//用户自己输入
        if(value.search("^-?\\d+$") != 0 || value.substring(0,1) == "0"){
            $("#"+id).val(min);
            $("#"+id).focus();
			opeTVCar();	
            /***修改价格*/
            alert("请填写正确的数量！");
            return;
        }
        newvalue=parseInt(value);
    }else if(type==-1){//减
        newvalue = parseInt(value)-1;
    }else if(type==1){//加
        newvalue = parseInt(value)+1;
    }
    if(newvalue<min){
        $("#"+id).val(min);
        /***修改价格*/
		opeTVCar();	
        alert("已少于商品最少购买数量");
        return;
    }else if(newvalue>max){
        $("#"+id).val(max);
        /***修改价格*/
		opeTVCar();	
        alert("已超过商品最大购买数量");
        return;
    }else{
		$("#"+id).val(newvalue);
		opeTVCar();	
	}
}