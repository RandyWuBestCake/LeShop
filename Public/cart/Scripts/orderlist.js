var orderPage = 1;	// 订单列表当前页
var maxNum = 10;// 订单列表每页行数
var searchTitle = "";	// 产品ID或订单ID或产品名称 	如果是商品id,普通产品ID
// ID类型或名称	1:产品ID 2：订单ID 3：产品名称 ;如果order_info填写，那么type是必填项
var searchType = "";		
var searchStatus = "";
var searchStartDate = "";
var searchEndDate = "";

var vipopid;//支付流水补录pop
var payorderid="";//支付流水补录订单id
  
//---add by wangjianmeng 晶赞统计代码
var zpd_orderId_status_list='';
var zpd_orderId_productId_list='';
var zpd_totalPrice= 0;
var zpd_pageInfo = '';
var _zpq = [];

//---初始化晶赞变量
function initZPQ(){	
	zpd_orderId_status_list = '';
	zpd_orderId_productId_list='';
	zpd_totalPrice= 0;
	zpd_pageInfo = '';
  	_zpq = [];
}
//---组装晶赞统计参数
function setZpqPushParam(val,allCount,pageNum){ 
	initZPQ();
	if(val.MYORDERS && val.MYORDERS.length>0){
		for(var i=0;i<val.MYORDERS.length;i++){
			var item = val.MYORDERS[i];
			if(i== (val.MYORDERS.length-1)){
				zpd_orderId_status_list += item.ORDER_ID+'-'+item.ORDER_STATUS_ID;
				var product_id_list_for_tongji = '';
				$.each(item.ORDER_ITEMS, function(k, p) {
						if(k==item.ORDER_ITEMS.length-1){
							product_id_list_for_tongji += p.pid;
						}else{
							product_id_list_for_tongji += p.pid+"-";
						}
					});
				zpd_orderId_productId_list += item.ORDER_ID+'^'+product_id_list_for_tongji;
			}else{
				zpd_orderId_status_list += item.ORDER_ID+'-'+item.ORDER_STATUS_ID+",";
				var product_id_list_for_tongji = '';
				$.each(item.ORDER_ITEMS, function(k, p) {
						if(k==item.ORDER_ITEMS.length-1){
							product_id_list_for_tongji += p.pid;
						}else{
							product_id_list_for_tongji += p.pid+"-";
						}	
					});
				zpd_orderId_productId_list += item.ORDER_ID+'^'+product_id_list_for_tongji+",";
			}
			zpd_totalPrice += item.ORDER_AMOUNT;
			zpd_pageInfo = pageNum+"#"+Math.ceil(allCount/maxNum);
		}
	}
	setZPQPushInfo();
}
//---设置晶赞参数信息
 function setZPQPushInfo(){
      _zpq.push(['_setPageID','127']);
      _zpq.push(['_setPageType','orderListPage']);  
	  _zpq.push(['_setParams',zpd_orderId_status_list,zpd_orderId_productId_list,zpd_totalPrice,zpd_pageInfo]);
 	  _zpq.push(['_setAccount','104']);
  	if(typeof(_zpq) != 'undefined' ){
    	if( null != _zpq && ''!= _zpq && 'null'!=_zpq ){
       	  var zp = document.createElement('script'); zp.type = 'text/javascript'; zp.async = true;
   		  zp.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.zampda.net/s.js';
    	  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(zp, s);
    	}
  	}
  }
//----晶赞统计代码  end  

$(function(){
	Js.login.hasLogin(function(){
		// 查询订单列表信息
		fn_ajax_order_list({searchTitle:searchTitle,searchType:"",orderPage:1});
	});
});

function popGuiderInfo(){

var popGuiderInfo = "<div class='pop_box pop_welcome'>"+
  "<div class='welcome'>"+
    "<div class='tit'>"+    
      "<div class='right pr50'><a id='wjPop-close' class='close'><span class='font22'></span></a></div>"+
      "<div class='clear'></div>"+
    "</div>"+
    "<div class='content t_c'>"+
               "<div class='block_center pt50 pb10 t_c' style='width:180px;'>"+
                 "<div class='pt20'>"+
				 "<a id='wjPop-close' class='red_bt_s block'><span class='white'>赶紧去看看</span></a></div>"+
               "</div>"+
    "</div>"+
  "</div>"+
"</div>"+(!!window.ActiveXObject && !window.XMLHttpRequest ? '<iframe style="width: 590px; height: 180px;position:absolute; top:0px; z-index:-1;" ></iframe>' : '');

	pop(popGuiderInfo,{removeAfterShow:true});
}

function fn_ajax_search_order_list(){
	sendWk("Center_search");
	searchTitle = $("#searchOrderOrProduct").val();
	orderPage = 1;
	if(searchTitle && searchTitle!="商品名称或订单号"){
		searchType = 0;
		fn_ajax_order_list({searchTitle:searchTitle,searchType:0,orderPage:1,order_status_id:searchStatus,searchStartDate:searchStartDate,searchEndDate:searchEndDate});
	}else{
		fn_ajax_order_list({searchTitle:'',searchType:'',orderPage:1,order_status_id:searchStatus,searchStartDate:searchStartDate,searchEndDate:searchEndDate});
	}
}

function sendWk(id){
	try{
		if(wt){
			wt.sendinfo({linkId:id,sendOnUnload:1});
		}
	}catch(e){}
}

function searchOrderByDate(){
	var searchDateType =  $("#searchOrderDate").val();
	var nowDate = new Date();
	searchEndDate = nowDate.getFullYear()+"-"+(nowDate.getMonth()+1)+"-"+nowDate.getDate();
	searchStartDate = getStringDate(searchDateType);
	if(searchStartDate && searchEndDate){
				
	}else{
		searchStartDate = "";		
	}
	
	if(searchTitle && searchTitle!="商品名称或订单号"){
		searchType = 0;
	}else{
		searchType = "";
		searchTitle = "";
	}
	if(searchDateType == "3"){
		searchEndDate = "2013-12-31";
	}
	orderPage = 1;
	fn_ajax_order_list({searchTitle:searchTitle,searchType:searchType,orderPage:1,order_status_id:searchStatus,searchStartDate:searchStartDate,searchEndDate:searchEndDate});
}
function getStringDate(searchDateType){
	var returnDate = "";
	var interval = 24*60*60*1000;
	if(searchDateType){
		switch(searchDateType){
			case '1':{returnDate = getStringDateByInterval((3*30*interval));}break;
			case '2':{returnDate = "2014-1-1";}break;
			case '3':{returnDate = "2013-1-1";}break;
		}
	}
	return returnDate;
}

function getStringDateByInterval(interval){
	var nowDate = new Date().getTime();
	var newTime = new Date((nowDate-interval));
	var returnDate = newTime.getFullYear()+"-"+(newTime.getMonth()+1)+"-"+newTime.getDate();
	return returnDate;
}

function searchOrderByStatus(){
	var orderStatus = $("#searchOrderStatus").val();
	if(orderStatus !=0){
		searchStatus = orderStatus;		
	}else{
		searchStatus = "";
	}
	if(searchTitle && searchTitle!="商品名称或订单号"){
		searchType = 0;
	}else{
		searchType = "";
		searchTitle = "";
	}
	orderPage = 1;
	fn_ajax_order_list({searchTitle:searchTitle,searchType:searchType,orderPage:1,order_status_id:searchStatus,searchStartDate:searchStartDate,searchEndDate:searchEndDate});
}

function setCookie2(key, value, times)
{
    var oDate = new Date();
    oDate.setDate(oDate.getDate() + times);
    document.cookie = key + '=' + encodeURI(value) + ';expires=' + oDate;
}

function getCookie2(key)
{
    var a = document.cookie.split('; ');
    for(var i=0; i<a.length; i++)
    {
        var b = a[i].split('=');
        if(b[0] == key)
        {
            return decodeURI(b[1]);
        }
    }
}

function delCookie2(key)
{
    setCookie(key, 1, -1);
}

function fn_ajax_order_list(searchCondation){
	$("#div_order_list").hide();
	$("#Pagination").hide();
	$("#div_loading").show();
	var param = "type="+searchCondation.searchType+"&page=" + searchCondation.orderPage + "&maxNum=" + maxNum;
	if(searchCondation.order_status_id){
		param += "&order_status_id="+searchCondation.order_status_id;
	}
	if(searchCondation.searchStartDate && searchCondation.searchEndDate){
		param += "&start_date="+searchCondation.searchStartDate+"&end_date="+searchCondation.searchEndDate;
	}
	if(searchCondation.searchTitle && searchCondation.searchTitle!="商品名称或订单号"){
		param += "&order_info="+searchCondation.searchTitle;
	}
	//判断请求处理时间
	/*
	qTimeout = setTimeout(function(){
			$("#div_loading").hide();
			alert("请求超时，请稍后再试");
		},6000);
		*/
	Js.sendData(sendLink.orpe+"api/web/query/getOrdersByDateRange.jsonp",param,function(data){
		//clearTimeout(qTimeout);	
    	$("#div_loading").hide();
		$("#div_order_list").show();
		$("#Pagination").show();
		if(data.status == 1 && data.result != "" && data.result[0].ALLCOUNT != 0){
			fn_append_html(data.result[0]);			 
			setZpqPushParam(data.result[0],data.result[0].ALLCOUNT,searchCondation.orderPage);
		}else{
			if(searchCondation.searchTitle || searchCondation.order_status_id || searchCondation.searchStartDate){
				$("#div_order_list").html("<div class='border'><div class='pt30 pb30 t_c font14'>抱歉，没有找到相关订单，<a href='javascript:fn_ajax_order_list({orderPage:1});refreshSelect();'><span class='blue'>查看所有订单</span></a></div></div>");
				$("#Pagination").html("");
			}else{
				$("#div_order_list").html("<div class='border'><div class='pt30 pb30 t_c font14'>您尚无订单，<a href='/' target='_blank'><span class='blue'>立即选购</span></a></div></div>");
				$("#Pagination").html("");
			}
			
		}
		
	});
}

function refreshSelect(){
	$("#searchOrderDate").val("0");
	$("#searchOrderStatus").val("0");
	$("#searchOrderOrProduct").val("商品名称或订单号");
	searchTitle = "";	
	searchType = "";		
	searchStatus = "";
	searchStartDate = "";
	searchEndDate = "";
	orderData = 1;
}
function fn_append_html(orderData){
	$("#div_order_list").empty().append(Js.Tools.template('div_order_list_template',orderData));
	$("#Pagination").pagination(orderData.ALLCOUNT, {current_page:orderPage,items_per_page:maxNum,num_display_entries:6,num_edge_entries:1,prev_text:'<',next_text:'>',callback:function(_page){
			orderPage = _page;
			fn_ajax_order_list({searchTitle:searchTitle,searchType:searchType,orderPage:_page,order_status_id:searchStatus,searchStartDate:searchStartDate,searchEndDate:searchEndDate});
		}
	});
	initMouseEvent();
}
var addressTime;
var deliverTime;

function initMouseEvent(){
	$("#closeNote").live('click',function (){
		$("#noteShow").slideUp("normal");
		$("#afterNoteShow").slideDown("normal").show();
	});	
	
	/*$(".trace_show").bind('mouseover', function(){	
		var orderId = $(this).attr("order-data");
		$("#showDelieverInfo_"+orderId).addClass("hover");
		showAddressOrProcess(true,false,orderId);
	}).bind("mouseout", function(){	
		var orderId = $(this).attr("order-data");
		if(deliverTime){
			clearTimeout(deliverTime);
		}
		deliverTime = setTimeout(function(){
			hideAddressOrProcess(true,false,orderId);
			$("#showDelieverInfo_"+orderId).removeClass("hover");
		},600);  
	});*/
  
  	//这里是 触发弹出窗的 事件
	$(".trace_show").bind('mouseenter', function(){	
      clearTimeout(deliverTime);
      deliverTime = null;
      
      $(".deliverInfoDiv").each(function (index, obj) {
      	obj.style.display = "none";
      });
      
       $(".mode").each(function (index, obj) {
      	$(obj).removeClass("hover");
      });
      
		var orderId = $(this).attr("order-data");
		$("#showDelieverInfo_"+orderId).addClass("hover");
		showAddressOrProcess(true,false,orderId);
	}).bind("mouseleave", function(){	
		var orderId = $(this).attr("order-data");     			
		//hideAddressOrProcess(false,true,orderId);	//隐藏弹出框
		//$("#order_address_"+orderId).removeClass("hover");
      
		deliverTime = setTimeout(function(){

			hideAddressOrProcess(true,false,orderId);	//隐藏弹出框
			//$("#showDelieverInfo_"+orderId).removeClass("hover");

          
          clearTimeout(deliverTime);
          deliverTime = null;
		},600);
	});	
  
  
	
  	//这里是 触发弹出窗的 事件
	$(".address").bind('mouseenter', function(){	
      clearTimeout(addressTime);
      addressTime = null;
      
      	$(".addressInfoDiv").each(function (index, obj) {
          obj.style.display = "none";
        });
      
      
		var orderId = $(this).attr("order-data");
		$(this).addClass("hover");
		showAddressOrProcess(false,true,orderId);
	}).bind("mouseleave", function(){	
		var orderId = $(this).attr("order-data");     			
		//hideAddressOrProcess(false,true,orderId);	//隐藏弹出框
		//$("#order_address_"+orderId).removeClass("hover");
		addressTime = setTimeout(function(){

			hideAddressOrProcess(false,true,orderId);	//隐藏弹出框
		//	$("#order_address_"+orderId).removeClass("hover");

          
          clearTimeout(addressTime);
          addressTime = null;
		},600);
	});
	
	$(".cancelOrder").live('click',function (){
		var orderId = $(this).attr("order-data");
		cancelOrder(orderId);
	});
	
	$(".relativeList").bind('mouseenter', function(){
		$(".relativeList").removeClass("hover");
		$(this).addClass("hover");
	}).bind("mouseleave", function(){	
		$(".relativeList").removeClass("hover");
	});
}

function popInfoMouseEvent(orderId){		
	/*$("#orderProcess_"+orderId).live('hover',function (event){
		var orderId = $(this).attr("order-data");	
		if (event.type =='mouseover' || event.type =='mouseenter'){
			$("#deliverInfo_div_"+orderId).show();
			$(".addressInfoDiv").hide();
			if(deliverTime){
				clearTimeout(deliverTime);
			}
		}else if(event.type =='mouseout' || event.type =='mouseleave') {	
			hideAddressOrProcess(true,false,orderId);					
		}		
	});	*/
  
  	//这里是 触发弹出窗移入的 事件 
	$("#orderProcess_"+orderId).live('hover',function (event){
		var orderId = $(this).attr("order-data");

      
		if (event.type =='mouseenter'){			
			$(".addressInfoDiv").hide();
			$("#deliverInfo_div_"+orderId).show();


			clearTimeout(deliverTime);	//清掉弹出框消失的定时器
          


		}else if(event.type =='mouseleave') {	
			hideAddressOrProcess(true,false,orderId);						
		}		
	});
	
  //这里是 触发弹出窗移入的 事件 
	$("#orderAddress_"+orderId).live('hover',function (event){
		var orderId = $(this).attr("order-data");

      
		if (event.type =='mouseenter'){			
			$(".deliverInfoDiv").hide();
			$("#addressInfo_div_"+orderId).show();


			clearTimeout(addressTime);	//清掉弹出框消失的定时器
          


		}else if(event.type =='mouseleave') {	
			hideAddressOrProcess(false,true,orderId);					
		}		
	});
	
	/**
	$("#orderProcess_"+orderId).live('click',function (event){
		var orderId = $(this).attr("order-data");	
		$("#deliverInfo_div_"+orderId).show();
		$(".addressInfoDiv").hide();
		clearTimeout(deliverTime);			
	});
	
	$("#orderAddress_"+orderId).live('click',function (event){
		var orderId = $(this).attr("order-data");			
		$(".deliverInfoDiv").hide();
		$("#addressInfo_div_"+orderId).show();			
		clearTimeout(addressTime);	
	});
	**/
	/**
	$(".address").live('hover',function (event){
		var orderId = $(this).attr("order-data");			
		if (event.type =='mouseover'){
			$("#order_address_"+orderId).addClass("hover");			
		}else if(event.type =='mouseout') {	
			$("#order_address_"+orderId).removeClass("hover");						
		}		
	});
	$(".mode").live('hover',function (event){
		var orderId = $(this).attr("order-data");			
		if (event.type =='mouseover'){
			$("#showDelieverInfo_"+orderId).addClass("hover");			
		}else if(event.type =='mouseout') {	
			$("#showDelieverInfo_"+orderId).removeClass("hover");						
		}		
	});
	**/
}


function showBlurValue(){
	if($("#searchOrderOrProduct").val() == ''){
		$("#searchOrderOrProduct").val("商品名称或订单号");
	}else{
		searchTitle = $("#searchOrderOrProduct").val();
	}
}

function showFocusValue(){
	$("#searchOrderOrProduct").val('');
	searchTitle = $("#searchOrderOrProduct").val();
}

function hideAddressOrProcess(isDeliver,isAddress,orderId){
	if(isDeliver){	
		$(".deliverInfoDiv").hide();
		$(".addressInfoDiv").hide();	
		$("#addressInfo_div_"+orderId).hide();
		$("#deliverInfo_div_"+orderId).hide();		
	}
	if(isAddress){
		$(".deliverInfoDiv").hide();	
		$(".addressInfoDiv").hide();
		$("#addressInfo_div_"+orderId).hide();
		$("#deliverInfo_div_"+orderId).hide();
	}
}

function showAddressOrProcess(isDeliver,isAddress,orderId){
	if(isDeliver){
		if($("#orderProcess_"+orderId) && $("#orderProcess_"+orderId).length >0){
			$("#deliverInfo_div_"+orderId).addClass("mode_popup").show();
			popInfoMouseEvent(orderId);
		}else{	
			$("#deliverInfo_div_"+orderId).show();
			$("#div_loading_deliver"+orderId).show();
			appendAddrAndProcess(orderId,true,false);		
		}
	}
	if(isAddress){
		if($("#orderAddress_"+orderId) && $("#orderAddress_"+orderId).length >0){
			$("#addressInfo_div_"+orderId).addClass("address_popup").show();
			popInfoMouseEvent(orderId);
		}else{		
			$("#addressInfo_div_"+orderId).show();
			$("#div_loading_address"+orderId).show();
			appendAddrAndProcess(orderId,false,true);	
		}
	}
}
function appendAddrAndProcess(orderId,isDeliver,isAddress){
	if(isDeliver){
		$("#deliverInfo_div_"+orderId).show();
		$("#div_loading_deliver"+orderId).show();			
	}
	if(isAddress){
		$("#addressInfo_div_"+orderId).show();
		$("#div_loading_address"+orderId).show();			
	}
	
	var urlPath =sendLink.orpe+"api/query/getOrderDetail.jsonp?order_id=" + orderId + "&callback=?";
	Js.sendData(urlPath,"",function(orderData){		
		orderData.orderId = orderId;
		if(orderData.status ==1){
			$("#deliverInfo_div_"+orderId).empty().append(Js.Tools.template('deliver_template',orderData));
			$("#addressInfo_div_"+orderId).empty().append(Js.Tools.template('order_address_template',orderData));
			
			$("#deliverInfo_div_"+orderId).addClass("border");
			$("#addressInfo_div_"+orderId).addClass("border");
			if(isDeliver){
				$(".deliverInfoDiv").hide();
				$(".addressInfoDiv").hide();
				$("#deliverInfo_div_"+orderId).addClass("mode_popup").show();
			}
			if(isAddress){
				$(".deliverInfoDiv").hide();
				$(".addressInfoDiv").hide();
				$("#addressInfo_div_"+orderId).addClass("address_popup").show();
			}	
			popInfoMouseEvent(orderId);
		}
	});
}

function cancelOrder(orderId){
	myConfirm("确认要取消该订单吗？",function(flag){
		if(flag){
			$.ajax({
			type:'get',
			url: sendLink.ordr_https + "api/update/cancelOrder.jsonp?order_id="+orderId+"&callback=?",
			dataType:'jsonp',
			async:false,
			success:function(data){
				if(data.status == "1"){
					alert("订单取消请求已提交,请稍后查看");
				}else{
					alert(data.message);
				}
				window.loaction.reload();
			}
			});
		}
	});
}

function goPay(orderid,on_money,methodid,loan,pids,orderType){
  //window.location.href="${hrefPath}/user/center/orderPay.html?orderId="+orderid+"&orderPrice="+on_money+"&payMentMethodId="+methodid+"&stage=0&loan="+loan;

  if(orderType != 5){
	 
			var murl=Js.Tools.urlCode("amount="+on_money+
								"&oId="+orderid+
								"&pId="+methodid+
								"&pInfo="+methodid+"_0_0_"+on_money+
								"&pName=在线支付&stage=1"+
								"&loanFee="+loan+"&t=1"+"&pids="+pids);
			window.location.href="/paymentInfo.html?"+murl;

	}else{
		//window.location.href="/user/center/orderPay.html?orderId="+orderid;
		var murl=Js.Tools.urlCode("amount="+on_money+
								"&oId="+orderid+
								"&pId="+methodid+
								"&pInfo="+methodid+"_0_0_"+on_money+
								"&pName=在线支付&stage=1"+
								"&loanFee="+loan+"&t=1"+"&pids="+pids+"&from=3");
			window.location.href="/paymentInfo.html?"+murl;
	}
}

function goPay_dj(orderid,on_money,methodid,pids,orderType){
  //window.location.href="${hrefPath}/user/center/orderPay.html?orderId="+orderid+"&orderPrice="+on_money+"&payMentMethodId="+methodid+"&stage=1";

  if(orderType != 5){
	
			var murl=Js.Tools.urlCode("amount="+on_money+
								"&oId="+orderid+
								"&pId="+methodid+
								"&pInfo="+methodid+"_0_0_"+on_money+
								"&pName=在线支付&stage=1"+
								"&loanFee=&t=1"+"&pids="+pids);
			window.location.href="/paymentInfo.html?"+murl;
		
	}else{
		//window.location.href="/user/center/orderPay.html?orderId="+orderid;
		var murl=Js.Tools.urlCode("amount="+on_money+
								"&oId="+orderid+
								"&pId="+methodid+
								"&pInfo="+methodid+"_0_0_"+on_money+
								"&pName=在线支付&stage=1"+
								"&loanFee=&t=1"+"&pids="+pids+"&from=3");
			window.location.href="/paymentInfo.html?"+murl;
	}
}
function goPay_wk(orderid,order_money,pre_money,methodid,pids,orderType){
    fn_ajax_payInfo(order_money,pre_money,orderid,function(last_money){
		if(last_money!=-1){
          //window.location.href="${hrefPath}/user/center/orderPay.html?orderId="+orderid+"&orderPrice="+last_money+"&payMentMethodId="+methodid+"&stage=1";
		  var userId = getCookie("COOKIE_USER_ID");
		  if(orderType != 5){
			  
					var murl=Js.Tools.urlCode("amount="+last_money+
									"&oId="+orderid+
									"&pId="+methodid+
									"&pInfo="+methodid+"_0_0_"+last_money+
									"&pName=在线支付&stage=1"+
									"&loanFee=&t=1"+"&pids="+pids);
				window.location.href="/paymentInfo.html?"+murl;
			  
		  }else{
			//window.location.href="/user/center/orderPay.html?orderId="+orderid;
			var murl=Js.Tools.urlCode("amount="+last_money+
									"&oId="+orderid+
									"&pId="+methodid+
									"&pInfo="+methodid+"_0_0_"+last_money+
									"&pName=在线支付&stage=1"+
									"&loanFee=&t=1"+"&pids="+pids+"&from=3");
				window.location.href="/paymentInfo.html?"+murl;
		  }
        }
	});
}
/** 订单支付信息 */
function fn_ajax_payInfo(order_money,pre_money,orderId,callback){
	//查询支付信息
	var virtual_pay=0;//虚拟支付v
	var last_money=0;//尾款
	var param="";
	var urlPath =sendLink.paym + "api/web/query/getOrderPayInfo.jsonp?&order_id=" + orderId + "&callback=?";
	Js.sendData(urlPath,param,function(data){
		if(data.status == "1"){
				var payInfo = data.result[0];
				// ACC-COUPON	优惠券 ACC-GC	礼品卡 ACC-VA	虚拟账户 ACC-DC	提货卡
				$.each(payInfo.PAYMENT_EXECUTION_DETAIL, function(key, payment){
					 if("ACC-COUPON" == payment.PAYMENT_METHOD_ID){
						virtual_pay = virtual_pay + payment.COMPLETE_AMOUNT;
					 }
					 if("ACC-GC" == payment.PAYMENT_METHOD_ID){				    
						virtual_pay = virtual_pay + payment.COMPLETE_AMOUNT;
					 }
					 if("ACC-VA" == payment.PAYMENT_METHOD_ID){
						virtual_pay = virtual_pay + payment.COMPLETE_AMOUNT;
					 }
				 });
			last_money=(order_money-virtual_pay-pre_money).toFixed(2);//尾款=订单金额-虚拟支付-订金金额
		}else if(data.status == 2){
			last_money=(order_money-virtual_pay-pre_money).toFixed(2);//尾款=订单金额-虚拟支付-订金金额
		}else{
			last_money=-1;
		}
		callback(last_money);
	});
}
