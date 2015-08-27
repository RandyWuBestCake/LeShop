var loadingbar =$('<li><span style="display: block; text-align: center;" id="initloading"><img src="/htmlResource/images/loading.gif"></span></li>');
var href_path=hrefPath;
var all_count = allCount;
var current_page = currentPage;
var page_size=pageSize;//每页显示的数据条数
var orderid="";//评价用到的订单id
var img_src= imgSrc;//评价的商品图片
var op_name= opname;//评价的商品名称
var systemTabs="";
var sd_url ="";//晒单新窗口URL
var share_url = window.location.href + "?cpsid=u_p_PingL";
var share_content="只有当你使用了才知道它的好，真是超赞的产品，如果不和小伙伴儿们分享，都觉得愧对他们，我要现在就告诉他们";


/**
*方法入口
*/
$(function(){
    initPage4pjsd();
});
//初始化页面
function initPage4pjsd(){
	{
    	if(systemTabs == ""){
    		var url = sendLink.foru + "api/web/query/commentTabInfo.jsonp"
			Js.sendData(url,{dataType:'jsonp',type:'post'},function(data){
				if(data.status == "1"){
					$.each(data.result,function(index,data){
						systemTabs += '<span class="pj_tips tips_normal"><input type="hidden" name="systab" value="'+data.ID+'" />'+ data.NAME +'</span>';
					});
				}
			});
    	}
	}
	$("#tab_all span").live("click",function(){
		if ($(this).hasClass("tips_check")){
			$(this).removeClass("tips_check");
		}else{
			$(this).addClass("tips_check");
		}
	});
	/** 只有晒单校验没通过，才会有这个事件的操作 */
	$("#mysd").live("click",function(){
		Js.login.hasLogin(function(){
			var url=sendLink.orpe+"api/web/query/getValidCommentOrder.jsonp";
			var param = "product_id="+pid+"&comment_type=2";
			Js.sendData(url,{dataType:'jsonp',type:'post',param:param},function(data){
				if(data.status=="1"){
					var order_id = data.result[0].order_id;//订单id
					if(typeof order_id != "undefined" && order_id!=""){
						window.location.href=href_path+"/user/center/pingjia.html";
					}else{
						window.location.href=href_path+"/user/center/pingjia.html";
					}
				}else{
					window.location.href=href_path+"/user/center/pingjia.html";
				}
			});
		});
		return false;
	});
	/**点击打开评价详情页*/
	$("#pj_detail").live('click',function(){
		var commentId= $(this).attr("commentId");
		window.open(href_path+'/comment/comm-pid-'+param_pid+'-commentId-'+commentId+'.html');
	});
       /**点击打开评价详情页*/
	$("#sd_detail").live('click',function(){
		var commentId= $(this).attr("commentId");
		window.open(href_path+'/share/share-pid-'+param_pid+'-commentId-'+commentId+'.html');
	});
	/**点击打开评价详情页*/
	$("#view_more").live('click',function(){
		var url = href_path+'/comment/index-pid-'+ param_pid +'.html';
		window.open(url);
	});
	/** 处理回复文本框并绑定事件*/	
	$("#reply").live('click',function(){
        var _this = this;
      	var _this_next_div =  $(_this).parent().parent().next();
      	if(_this_next_div.is(":hidden")){
          	Js.login.hasLogin(function(){
                  /**操作回复DIV*/
                 {
                     $("#pj_content_ul_list .reply_div").hide();
                     var maxlimit = 50 ; 
                     var emptyText = "最多回复50个字！"
                     var inputObject = $(_this).parent().parent().next().find("textarea");
                     var buttonObject = $(_this).parent().parent().next().find("input");
                     var msgObect = $(_this).parent().parent().next().find(".red");
                     validatConfirm(maxlimit, emptyText , buttonObject ,inputObject , msgObect , submitReply , buttonObject);
                     $(_this).parent().parent().next().show();
                 }
            });
          	return false;
        }else{
        	_this_next_div.hide();
        }
	});
	//去我的评价页面Q
	$("#mypj").live("click",function(){
		Js.login.hasLogin(function(){
			var url=sendLink.orpe+"api/web/query/getValidCommentOrder.jsonp";
			var param = "product_id="+pid+"&comment_type=1";
			Js.sendData(url,{dataType:'jsonp',type:'post',param:param},function(data){
				if(data.status=="1"){
					var order_id = data.result[0].order_id;//订单id
					if(order_id!=""){
						orderid=order_id;
						var popdiv='<div class="dlgdiv dlgdiv_operate hidden" style="width:872px;">'
									+' <div class="hd"><h3>商品评价 - '+op_name+' </h3><a href="javascript:void(0)" id="wjPop-close" class="close"></a></div>'
									+' <div class="bd clearfix pb15">'
											+'  <div class="productimg left"><img width="280" src="'+_imagePath+"/"+img_src+'"/></div>'
											+' <div class="producttxt">'
													+' <p><span class="span80"><i class="red">* </i>产品质量：</span><em class="star star2" id="zl"><i class="on"></i><i class="on"></i><i class="on"></i><i class="on"></i><i class="on"></i></em><span class="red mr10" id="zl_score_show">(5分)</span><span class="red" id="zl_msg">非常满意</span></p>'
													+' <input type="hidden" id="zl_score" value="5"/>'
													+' <p><span class="span80"><i class="red">* </i>服务态度：</span><em class="star star2" id="fw"><i class="on"></i><i class="on"></i><i class="on"></i><i class="on"></i><i class="on"></i></em><span class="red mr10" id="fw_score_show">(5分)</span><span class="red" id="fw_msg">非常满意</span></p>'
													+' <input type="hidden" id="fw_score" value="5"/>'
													+' <p><span class="span80"><i class="red">* </i>物流配送：</span><em class="star star2" id="wl"><i class="on"></i><i class="on"></i><i class="on"></i><i class="on"></i><i class="on"></i></em><span class="red mr10" id="wl_score_show">(5分)</span><span class="red" id="wl_msg">非常满意</span></p>'
													+' <input type="hidden" id="wl_score" value="5"/>'
													+' <div class="clearfix"> '
														+' <span class="span80 left"><i class="red">* </i>标签：</span> '
														+' <div class="right div400"><div id="tab_all">'
															+ systemTabs +'</div>'
															+' <span class="pj_self">'
																+' <input type="text" class="ipt" name="" id="customTabName" maxlength="5"/>'
																+' <a href="javascript:void(0);" id="tabSubmit" class="inline_block gray_bt_short">提交</a>'
																//+' <a href="javascript:void(0);" id="cancel" class="inline_block gray_bt_short">取消</a>'
															+ '</span> '
														+' </div> '
													+' </div> '
													+' <p class="clearfix"><span class="span80 left"><i class="red">* </i>评价内容：</span><textarea class="textare left" rows="5" id="MESSAGE" name="MESSAGE" maxlength="200"></textarea></p>'
													+' <p class="t_r font12 gray">您已输入 <span id="studyNum_pop" class="red">0</span> 字，最多输入200字</p>'
													
													
													//+' <div class="pt10 pb10">'
														//+' <span class="span80">同步分享：</span>'
														//+' <span class="pj_share share_check"><input type="hidden" name="" value="" checked="checked"/> <i class="weibo"></i> </span>'
														//+' <span class="pj_share share_check"><input type="hidden" name="" value="" checked="checked"/> <i class="qqkj"></i> </span>'
														//+' <span class="pj_share"><input type="hidden" name="" value="" checked="checked"/> <i class="douban"></i> </span>'
													//+' </div>'
													+' <p><span class="span80"></span><input type="button" id="confirmButton" class="inline_block red_bt_m" value="确定" /><input type="button" style="display:none" class="inline_block red_bt_m" id="waitButton" value="提交中..." /><span class="ml10 errormsg red" ></span></p>'
												
											+' </div>'
									+' </div>'
								+' </div>'
						pop(popdiv);
						initStar();
						//校验留言信息
						{
							var maxlimit = 200 ; 
							var emptyText = "欢迎您从商品的外观、质量、使用感受，易用性等发表 您的个人看法，给购买他人提供些参考，互惠互利";
							var inputObject = $("#MESSAGE");
							var buttonObject = $("#confirmButton");
							var msgObect = $("#studyNum_pop");
							validatConfirm(maxlimit, emptyText , buttonObject ,inputObject , msgObect , submitPj , null);
						}
                         	//设置自定义标签校验
                           {
                               var maxlimit = 5 ; 
                               var emptyText = "请填写标签";
                               var inputObject = $("#customTabName");
                               var buttonObject = $("#tabSubmit");
                               var msgObect = $("#studyNum_pop1");
                               validatConfirm(maxlimit, emptyText , buttonObject ,inputObject , msgObect , tabSubmitOp , buttonObject);
                           }
                    }else{
                      	window.location.href=href_path+"/user/center/pingjia.html";
                    }
                }else{
                  		window.location.href=href_path+"/user/center/pingjia.html";
                }
			});
		});
	});
}
/** 
show
hide
*/
function ifLoading(flag){
  if(flag == "show"){
  	$("#initloading").show();
  }else{
  	$("#initloading").hide();
  }
}
function callPjService(type){
	var url=sendLink.foru+'api/web/query/commentService.jsonp';
		/** 测试数据 */
	var param={param:'currentPage='+current_page+'&pageSize='+ page_size +'&pid='+ pid +'&type='+type};
	Js.sendData(url,param,function(data){
      	data.productImg=_imagePath+"/"+img_src;
      	data.shareUrl =share_url;
		if(type != 5){
          	
			$("#pj_content").empty();
			$("#sd_content").empty();
			$("#pj_content").append(Js.Tools.template('pj_templete',data));
            $("#pj_content").show();
            $("#sd_content").hide();
		}else{
			$("#pj_content").empty();
			$("#sd_content").empty();
			$("#sd_content").append(Js.Tools.template('sd_templete',data));
            $("#pj_content").hide();
            $("#sd_content").show();
		}
      	with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion='+~Math.ceil(new Date()/3600000)];
	});
}
//自定义标签提交按钮
function tabSubmitOp(_this){
    var tab_div = $(_this).parent().prev();
    var customTabName = $("#customTabName").val();
    if(customTabName == ""){
        $(".errormsg").html("<font color='red'>请输入您自己的标签信息</font>");
        return false;
    }
    $("#customTabName").val("");
    $("#customTabName").focus();
    /**定制标签*/
    var customTab = $('<span class="pj_tips tips_normal tips_check"><input type="hidden" value="'+customTabName+'" name="customTab">'+customTabName+'</span>');
    $(tab_div).append(customTab);
}
function submitPj() {
	$(".errormsg").empty();
	$("#confirmButton").hide();
	$("#waitButton").show();
	//保存留言信息
	var zl_score = $("#zl_score").val();
	var fw_score = $("#fw_score").val();
	var wl_score = $("#wl_score").val();
	var type = 1;
	var systemTab = "";
	var customTab = "";
	if($("#tab_all .tips_check").length <= 6){
         	var temp = $("#tab_all > span").length;
         	$("#tab_all > span").each(function(i){
              if ($(this).hasClass("tips_check")) {
				var input_val = $(this).find("input").val();
				var input_name = $(this).find("input").attr("name");
				if (input_name == "customTab") {
					customTab += "," + input_val;
				} else if (input_name == "systab") {
					systemTab += "," + input_val;
				}
			}
           });
	}else{
        $("#confirmButton").show();
		$("#waitButton").hide();
		$(".errormsg").html("<font color='red'>最多只能选择6个标签</font>");
		return false;
	}
	
	if (systemTab != "" || customTab != "") {
		if ($.trim(systemTab) != "") {
			systemTab = systemTab.substring(1);
		}
		if ($.trim(customTab) != "" && $.trim(customTab) != "null") {
			customTab = customTab.substring(1);
		}
	} else {
        $("#confirmButton").show();
		$("#waitButton").hide();
		$(".errormsg").html("<font color='red'>请选择1~6个标签!</font>");
		return false;
	}
	var displayImg;
	//console.log("用户评分：质量="+zl_score+",服务="+fw_score+"，物流="+wl_score);
	var url = sendLink.foru + "api/web/query/insertComment.jsonp";
  	//var url = "http://10.58.65.239:8080/forum/api/web/query/insertComment.jsonp"
	var param = "skuNo=" + pid + "&orderId=" + orderid + "&distributionScore=" + wl_score + "&productScore=" + zl_score + "&serviceScore=" + fw_score + "&content=" + $("#MESSAGE").val() + "&type=" + type + "&systemTab=" + systemTab + "&userTab=" + customTab +"&suiteNo="+suiteNo+"&optype="+optype;
  	Js.sendData(url, {dataType : 'jsonp',type : 'post',param : param}, function (data) {
		$("#confirmButton").show();
		$("#waitButton").hide();
		if (data.status == "1") {
            var msg = "您已成功发表了对"+op_name+"的评价";
            var title = "感谢您的评价！";
			pop(showMsg("success",title,msg));
            //document.getElementById("bdshell_js_pjsd").src='http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion='+Math.ceil(new Date()/3600000);
			with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion='+~Math.ceil(new Date()/3600000)];

		} else {
            pop(showMsg("error",null,data.message));
		}
	});        
}
//初始化评论星数功能
function initStar(){
    var aMsg = ["很不满意",
                "不满意",
                "一般",
                "满意",
                "非常满意"];
    $(".star").each(function(){
        var aLi = $(this).find("i");
        var id = $(this).attr("id");
        for (i = 1; i <= aLi.length; i++){
            aLi[i - 1].index = i;
            aLi[i - 1].onmouseover = function (){
                $("#"+id+"_score_show").html("("+this.index+"分)");
                $("#"+id+"_msg").html(aMsg[this.index - 1]);
                for (j = 0; j < aLi.length; j++){
                    aLi[j].className = j < this.index ? "on" : "";
                }
            };
            aLi[i - 1].onmouseout = function (){
                var score = $("#"+id+"_score").val();
                $("#"+id+"_score_show").html("("+score+"分)");
                $("#"+id+"_msg").html(aMsg[score-1]);
                for (j = 0; j < aLi.length; j++){
                    aLi[j].className = j < score ? "on" : "";
                }
            };
            aLi[i - 1].onclick = function (){
                $("#"+id+"_score").val(this.index);
                $("#"+id+"_score_show").html("("+this.index+"分)");
                $("#"+id+"_msg").html(aMsg[this.index - 1]);
                for (j = 0; j < aLi.length; j++){
                    aLi[j].className = j < this.index ? "on" : "";
                }
            }
        }
    });  
}
/**
	功能：生成弹出层
    	param :
        	status :success
			title : 标题
            msg : 提示信息
*/
function showMsg(status,title,msg){
    var alert_msg = "";
    if(status == 'success'){//successMsg
        alert_msg = '<div class="dlgdiv dlgdiv_operate" id="show_pj_div" style="width:440px;">'+
                        '<div class="hd"><h3>提示 </h3><a href="javascript:void(0)" id="wjPop-close" class="close"></a></div>'+
                        '<div class="bd clearfix pb15 dlgdiv_result">'+
                            '<p class="font16 dark">'+ title +'</p>'+
                            '<p>您已成功发表了对'+op_name+'的评价</p>'+
                            '<div class="result_share">'+
                                    '<span>向好友分享网购乐趣：</span>'+
                                    '<div class="result_share_div"><div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare" data="{\'text\':\''+share_content+'\',\'desc\':\''+share_content+'\',\'url\':\''+ share_url +'\',\'pic\':\'http://img0.hdletv.com/'+img_src+'\'}"><a class="bds_qzone"></a><a class="bds_tsina"></a><a class="bds_tqq"></a><a class="bds_renren"></a></div></div>'+
                                '</div>'+
                            '<div class="t_c btnbox">'+
                                //'<a href="javascript:void(0)" class="inline_block gray_bt_m mr15" id="wjPop-view"><span>查看评价</span></a>'+
                                '<a  href="javascript:void(0)" class="inline_block gray_bt_m" id="wjPop-close"><span>关闭</span></a>'+
                            '</div>'+
                        '</div>'+
                    '</div>';
    }else{//errorMsg
        alert_msg = '<div class="dlgdiv dlgdiv_operate" id="show_pj_div" style="width:440px;">'+
                        '<div class="hd"><h3>提示 </h3><a href="javascript:void(0)" id="wjPop-close" class="close"></a></div>'+
                        '<div class="bd clearfix pb15 dlgdiv_result">'+
                            '<p>'+msg+'</p>'+
                            '<div class="t_c btnbox">'+
                                '<a  href="javascript:void(0)" class="inline_block gray_bt_m" id="wjPop-close"><span>关闭</span></a>'+
                            '</div>'+
                        '</div>'+
                    '</div>';
    }
    return alert_msg;
}