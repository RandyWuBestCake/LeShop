//========	页面初始化调用 begin ====
$(document).ready(function(){
  Js.login.hasLogin(init,{exitBn:false});
});
//========	页面初始化调用 end ====
//============   全局变量定义  begin ==========
var param = Js.Tools.stringToJson(Js.Tools.urlDecode(location.search.slice(1)));
var globalCollection ={
//---公共参数及上页面传递参数处理模块	
	globalModule:{
		globalModuleData:{
			supportList:{
				isSupportSSD:true,//是否支持顺时贷
				isComeFromCart:true,//是否从购物车下单
				isSupportArriveTime:true,//是否显示送达时间f
				isSupportCoupon:true,//是否支持优惠劵
				isSupportAlipay:true,//是否支持支付宝
				isSupportOffline:false,//是否支持线下支付
				isVIP:false,//是否大客户
				isBook:false,//是否为预售
				isLema:false,//是否为乐码
				isSupportJieNeng:false,//是否支持节能补贴
				isSupportArriveTimeSelect:false,
				isExtCard:false,//提货卡下单
				isSupportGroup:false//是否团购
			},
			userGloblData:{
				promotion_id:0,
				seller_id:1,
				split_package:0,
				order_way:0,
				pre_sale:0,
				is_energy_saving:0,
				province_id:-22,
				city_id:-22,
				district_id:-22,
				address_id:0,
				shipping_method_id:1,
				shipping_method_name:"快递",
				shipping_option:1,
				home_installation:1,
				payment_method_id:0,
				payment_method_name:"",
				invoice_cotent:1,//明细
				invoice_type:2,//普通 增值
				invoice_title:"个人",
				invoice_type_id:2,			
				realpromotionid_productid_promotionid_quantityingroup_quantity:"",
				suitMainProduct:{} 
			},
			orderData:{
				pInfo:"",
				fee:0,
				cartAllPrice:0,
				normalGoods:"",
				groupData:{},
				isZeroOrder:false,
				pre_pay_rate:1,
				isS40:false,
				productType:-1
			}			
		},
		globalModuleDataInit:function (){
			globalModuleDataInit();
		}
	},
//---地址模块	
	addressModule:{
		addressData:[],	//---地址数据存放
		userAddressData:{//用户地址数据
				is_default:0,
				type :0,
				shipping_method_id:1,
				shipping_time_id :1,
				invoice_category_id :1,
				invoice_type_id:2,
				invoice_content:"个人"
			},	
		addressModuleInit:function(){
			addressModuleInit(99,0);
		}	
	},
//---支付模块
	paymentModule:{
		paymentModuleData:[],
		paymentModuleInit:function(){
			paymentModuleInit();
		}	
	},
//---配送信息模块
	deliverModule:{
		deliverModuleData:[],
		deliverModuleInit:function(){
			deliverModuleInit();
		}
	},
//---发票信息模块
	invoiceModule:{
		invoiceModuleData:{
			invoice_cotent:1,//明细
			invoice_type:2,//普通 增值
			invoice_title:"个人"
		},
		invoiceModuleInit:function (){
			invoiceModuleInit();
		}
	},
//---商品信息模块
	productModule:{
		productModuleData:[],
		productModuleInit:function(){
			productModuleInit();
		}
	}
}

var showAllAddressControl = 0;
//============   全局变量定义  end ==========

//========	所有模块初始化 begin ====
function init(){
//---globalModule初始化，包括上页面参数传递及一些公共参数
	globalCollection.globalModule.globalModuleDataInit();
//---地址模块初始化
	globalCollection.addressModule.addressModuleInit(99,0);
//---商品信息模块初始化
	globalCollection.productModule.productModuleInit();
}
//========	所有模块初始化 end ====
function showAgreeDiv(){	
	if($("#agreeDiv").is(":hidden")){
		$("#agreeDiv").show();	
		$("#agreePop").live("click",function(){
			pop("#buyagreement");	
		});
	}
}

//========  全局参数处理（前一页面传递的参数）	=========
function globalModuleDataInit(){	
	var param = Js.Tools.stringToJson(Js.Tools.urlDecode(location.search.slice(1)));
	if(param.p){
		globalCollection.globalModule.globalModuleData.supportList.isComeFromCart=false;
	}
	if(param.j && param.j=="1"){//是否节能补贴
		globalCollection.globalModule.globalModuleData.supportList.isSupportJieNeng = true;
	}
	if(param.y && param.y=="1"){//是否为预售
		globalCollection.globalModule.globalModuleData.supportList.isBook = true;
		globalCollection.globalModule.globalModuleData.userGloblData.pre_sale=1;
	}
	if(param.gi && param.gz){//gi 礼品卡号 gz 套装id
		globalCollection.globalModule.globalModuleData.supportList.isExtCard = true;
		globalCollection.globalModule.globalModuleData.orderData.gi = param.gi;
		globalCollection.globalModule.globalModuleData.userGloblData.ps_id = param.gz;
	}
	if(param.l){//乐码
		globalCollection.globalModule.globalModuleData.supportList.isLema = true;
		globalCollection.globalModule.globalModuleData.userGloblData.lmcode = param.l;
		globalCollection.globalModule.globalModuleData.supportList.isSupportSSD =false;
	}
	if(param.t1 || param.t2){//团购
		globalCollection.globalModule.globalModuleData.userGloblData.groupid = param.t1;
		globalCollection.globalModule.globalModuleData.userGloblData.group_product_id = param.t2;
		globalCollection.globalModule.globalModuleData.userGloblData.pre_sale=0;
		globalCollection.globalModule.globalModuleData.supportList.isSupportGroup = true;
		globalCollection.globalModule.globalModuleData.supportList.isSupportCoupon = false;
		globalCollection.globalModule.globalModuleData.supportList.isSupportArriveTime = false;
		globalCollection.globalModule.globalModuleData.supportList.isSupportSSD = false;
		Js.sendData(sendLink.ordr + "api/web/query/getUserGroupBuy.jsonp","",function(data){
			
			data.result[0].PROVINCE_ID = param.tp;
			data.result[0].CITY_ID = param.tc;
			data.result[0].DISTRICT_ID = param.td;
			globalCollection.globalModule.globalModuleData.orderData.groupData = data.result[0];
			
		});
	}
	if(param.v && param.v=="1"){//大客户
		globalCollection.globalModule.globalModuleData.supportList.isVIP =  true;
		//supportList.isSupportCoupon = false;大客户可以使用优惠劵20131118
		globalCollection.globalModule.globalModuleData.supportList.isSupportArriveTime = false;
		globalCollection.globalModule.globalModuleData.supportList.isSupportOffline = true;
		// supportList.isSupportAlipay = false;
		globalCollection.globalModule.globalModuleData.supportList.isSupportSSD =false;
		globalCollection.globalModule.globalModuleData.userGloblData.order_way=3;
	}
	if(param.provinceId){
		globalCollection.addressModule.userAddressData.PROVINCE_ID = param.provinceId;
	}
	
		
	//---展示购机协议
	if(globalCollection.globalModule.globalModuleData.userGloblData.pre_sale ==1){
		showAgreeDiv();
	}
	
	//---显示费用
	$("#summaryBlock").html(Js.Tools.template('summary', globalCollection.globalModule.globalModuleData.supportList));
}

//===========1、地址模块初始化及地址相关操作控制 begin =============
//===optionType: 0 新增 1 修改 2 删除 99默认
function addressModuleInit(optionType,isDefault){
	Js.sendData(sendLink.addr+"api/web/query/userAddress.jsonp",{showLoad:true,param:'type=0&sort=desc'},function(data){
		if(data.status == "1" || data.status == 1){//有地址信息
		    var default_addr;//默认地址,需要放在第一位
			globalCollection.addressModule.addressData = [];
			//globalCollection.addressModule.addressData.length = 0;//用户地址列表
			globalCollection.addressModule.addressData.splice(0,globalCollection.addressModule.addressData.length);
			if(data.result && data.result.length>0){
				for(var i=0;i<data.result.length;i++){
					var addrItem = data.result[i];
					if(addrItem.IS_DEFAULT == "1"){//是默认地址
						default_addr=addrItem;						
					}else{//不是默认地址
						globalCollection.addressModule.addressData.push(addrItem);
					}
				}
				if(default_addr){//存在默认地址
					globalCollection.addressModule.addressData.splice(0,0,default_addr);//将默认地址放在第一位
				}
				if(globalCollection.addressModule.addressData[0]){
					var addreItem = transLowcase(globalCollection.addressModule.addressData[0]);
					if(addreItem.invoice_type_id && addreItem.invoice_type_id != 0 && addreItem.invoice_type_id != 1 && addreItem.invoice_type_id !="undefined"){
						globalCollection.addressModule.userAddressData.invoice_type_id = addreItem.invoice_type_id;
					}else{
						globalCollection.addressModule.userAddressData.invoice_type_id = 2;
					}									
					globalCollection.addressModule.userAddressData.invoice_type = globalCollection.addressModule.userAddressData.invoice_type_id;
					
					if(addreItem.invoice_type_name != ""){
						globalCollection.addressModule.userAddressData.invoice_type_name = addreItem.invoice_type_name;
					}else{
						globalCollection.addressModule.userAddressData.invoice_type_name = "普通发票";
						globalCollection.addressModule.userAddressData.invoice_title = "个人";
						globalCollection.addressModule.userAddressData.invoice_cotent = 1;
						globalCollection.addressModule.userAddressData.invoice_content = "明细";
					}
					
					globalCollection.addressModule.userAddressData.invoice_category_id = addreItem.invoice_category_id;
					globalCollection.addressModule.userAddressData.invoice_category_name = addreItem.invoice_category_name;
					globalCollection.addressModule.userAddressData.invoice_content = addreItem.invoice_content;
				}
			}
			//通过模板加载配送地址列表
			var selectedAddressId = "";
			if(optionType == 0 && globalCollection.addressModule.addressData.length>1 && isDefault!=1){				
				selectedAddressId = globalCollection.addressModule.addressData[1].ADDRESS_ID;
			}else if(optionType == 0 && isDefault == 1){
				selectedAddressId = globalCollection.addressModule.addressData[0].ADDRESS_ID;
			}else{
				selectedAddressId = globalCollection.addressModule.addressData[0].ADDRESS_ID;
			}
			showAddressInfo(selectedAddressId,0);
		}
		if(data.status == "2" || data.status == 2){//没地址信息
			showAddressInfo(0,0);//通过模板加载配送地址列表
		}
	});	
}

//---地址模块显示，如果当前地址少于一个，则展示出地址填写模块 
function showAddressInfo(addressid,showAllAdd){
	$("#addressModule").empty().append(Js.Tools.template("addressModuleTemplate", globalCollection.addressModule));
	if(globalCollection.addressModule.addressData.length<1){		
		showNewAddressInput(0,"");//打开地址填写模块
	}else{
		$("#newAddress").hide();
		$("#addressModule").show();
		addressMouseEventInit();//注册地址列表的事件
		if(showAllAdd>0){
			$(".yellow_a").trigger("click");
		}
		if(addressid>0){
			$(".addressListLi[addressId='"+addressid+"']").trigger("click");
		}
	}
	
//---发票信息模块初始化
	globalCollection.invoiceModule.invoiceModuleInit();
}

//---注册地址模块鼠标事件  
function addressMouseEventInit(){
	
	//显示全部地址 add by shixf 20140505	
		if(showAllAddressControl){
			$(".showAllAddress").show();
			$("#showAllAddressButton").hide();
		}else{
			$(".yellow_a").unbind("click").bind("click",function(){
				$(".showAllAddress").show();
				showAllAddressControl = 1;
				$("#showAllAddressButton").hide();
			});
		}
		
//---鼠标划过事件	
	$(".addressListLi").unbind("mouseover").bind('mouseover', function(){
		$(this).addClass("hover");
		var isdefault = $(this).attr("isDefault");
		if($(this).hasClass("cur")){//当前是选中状态
			$(this).find(".list_foot").show();
			if(isdefault=="1"){//当前地址是默认地址
				$(this).find(".set-up").hide();
			}else{
				$(this).find(".set-up").show();
			}
		}
	}).unbind("mouseleave").bind('mouseleave', function(){
		$(this).removeClass("hover");
		$(this).find(".list_foot").hide();
		$(this).find(".set-up").hide();		
	});	
//---鼠标点击事件（地址选定）
	$(".addressListLi").unbind("click").bind('click', function(){
		var addrId = $(this).attr("addressId");
		$(".nopsMsg").hide();
		$(".addressListLi").removeClass("cur");
		$(".addressListLi").find(".list_foot").hide();
		$(".addressListLi[addressId='"+addrId+"']").addClass("cur");
		$(".addressListLi[addressId='"+addrId+"']").find(".list_foot").show();
		var isdefault = $(".addressListLi[addressId='"+addrId+"']").attr("isDefault");
		if(isdefault=="1"){//当前地址是默认地址
			$(".addressListLi[addressId='"+addrId+"']").find(".set-up").hide();
		}else{
			$(".addressListLi[addressId='"+addrId+"']").find(".set-up").show();
		}
		selectAsDeliverAddr($(this).attr("addressId"));	
	});	
}

//---新地址填写模块//type 0 新增 1 更新 
function showNewAddressInput(type,addressId){
	if(type == 0){
		if(globalCollection.addressModule.addressData.length >= 39){
			alert("您的收货地址最多为39个！");	
		}else{
			getAddrInputThis({is_default:0,type:0},$("#newAddressModule"));
		}
	}else if(type == 1){
		var addrData;
		for(var i=0;i<globalCollection.addressModule.addressData.length;i++){
			var addressItem = globalCollection.addressModule.addressData[i];
			if(addressItem){
				if(addressItem.ADDRESS_ID == addressId){
					addrData = addressItem;
					break;
				}
			}
		}
		getAddrInputThis(addrData,$("#newAddressModule"));
	}
}

//---新地址填写模块
function getAddrInputThis(addrData,appender){//type 0 新增 1 更新
  $("#newAddress").show();
  $("#addressModule").hide();//add by shixf 20140505 显示录入地址时，隐藏上面的地址列表
  addrData = addrData||{};
  $(appender).empty().append(Js.Tools.template('addrInput', addrData));
  Js.sendData(sendLink.addr+"api/web/query/childArea.jsonp","isarrive=0&parent_id=0",function(data){
    data.pId = addrData.PROVINCE_ID||-22;
    $("#province").empty().append("<option value='-22'>请选择</option>").append(Js.Tools.template('addrRegion', data)).
    unbind("change").
    change(function(){
            if($(this).val()==-22){
                $("#provinceMess").html("");
            }
            else{
			
			addrData.province_id = $(this).find("option:selected").val();
            $("#cityMess").html("");
            $("#districtMess").html("");
            $("#district").html("<option value='-22'>请选择</option>");
                $("#provinceMess").html($(this).find("option:selected").text());
                Js.sendData(sendLink.addr+"api/web/query/childArea.jsonp","isarrive=0&parent_id="+$(this).val(),function(cityData){
                    cityData.pId = addrData.CITY_ID||-22;
                    $("#city").empty().
                    append("<option value='-22'>请选择</option>").
                    append(Js.Tools.template('addrRegion', cityData)).
                unbind("change").
                change(function(event,cityId){
					$("#regionArriveError").hide();
                     if($(this).val()==-22){
                        $("#cityMess").html("");
                    }
                    else{
                        $("#districtMess").html("");
                        $("#cityMess").html("，"+$(this).find("option:selected").text());
                        Js.sendData(sendLink.addr+"api/web/query/childArea.jsonp","isarrive=0&parent_id="+(cityId||$(this).val()),function(districtData){
                            districtData.pId = addrData.DISTRICT_ID||-22;
                            if(districtData.result.length < 2){
								addrData.DISTRICT_ID = districtData.result[0].AREA_ID;
								getAddrState({d:districtData.result[0].AREA_ID,p:addrData.province_id});
                            }
							
                            $("#district").empty().
                            append("<option value='-22'>请选择</option>").
                            append(Js.Tools.template('addrRegion', districtData)).
                            unbind("change").change(function(){
                                var selectedDistrict = $(this).find("option:selected");
                                addrData.DISTRICT_NAME = selectedDistrict.text();
                                 if(selectedDistrict.val()==-22){
                                    $("#districtMess").html("");
                                }
                                else{
                                  $("#dregionError").hide();                                  
                                  $("#districtMess").html("，"+selectedDistrict.text()+"    ");
                                }
								
								getAddrState({d:selectedDistrict.val(),p:addrData.province_id})
                            });
							
                            if(addrData.DISTRICT_ID)
                              $("#district").trigger("change");
                        });
                    }
                    addrData.CITY_NAME = $(this).find("option:selected").text();
                });
                  if(cityData.result.length==1){
                    $("#city").trigger("change",cityData.result[0].AREA_ID);
                  }
                  else if(addrData.CITY_ID){
                    $("#city").trigger("change");
                  }
                });
                addrData.PROVINCE_NAME = $(this).find("option:selected").text();
            }
        });
    if(addrData.PROVINCE_ID||-22)
        $("#province").trigger("change");
  });
	addrData.address_name = $("#addressName").val();
  $("#setDefaultAddr input").click(function(){
    if($(this).is(":checked"))
      addrData.is_default     = 1;
    else
      addrData.is_default     = 0;
  });

  Js.validator.init({
      id:"address",
      uriEncode:false,
      el:[
        {
          id:"receiver",
          rule:"minLength",
          param:1
        },
        {
          id:"detailAddr",
          rule:"minLength",
          param:1
        },
        {
          id:"post",
          rule:"post"
        },
        {
          id:"email",
          rule:"email"
        },
        {
          id:"mobile",
          rule:"mobile"
        },
        {
          id:"phone",
          rule:{r:["telphone","rangelength"]},
          param:["",[0,0]]
        },
        {
          id:"province",
          type:"select",
          errorId:"regionError",
          errorValue:-22
        },
        {
          id:"city",
          type:"select",
          errorId:"regionError",
          errorValue:-22
        },
        {
          id:"district",
          type:"select",
          errorId:"regionError",
          errorValue:-22
        },
		{
          id:"addressName",
		  rule:"minLength",
          param:1
        }
      ],
      submit:{
        id:"addrSubmit",
        callback:function(uri,uriObject){
          if(uriObject.province_id==-22||uriObject.city_id==-22||uriObject.district_id==-22){
            $("#regionError").show();
            return;
          }
		  
          addrData = transLowcase(addrData);
          $.extend(addrData,uriObject);
		  addrData.address_name = $("#addressName").val();
          addrData.is_asyn=0;
          addrData.shipping_method_id=1;
          addrData.shipping_option = 1;
          if(!addrData.invoice_category_id){
            addrData.invoice_category_id  = 1;
            addrData.invoice_type_id = 2;
            addrData.invoice_content = "个人";
          }
		  	  
		  var hasError = false;
		  
		$.each($(".addressee_info").find(".message").children(),function(i,v){		  
			if($(v).attr("style").indexOf("inline") >-1){
				hasError = true;
			}
		});
		  
		  if(!hasError){
				if(addrData.address_id){//更新
				    var editAddId = addrData.address_id;
					globalCollection.addressModule.userAddressData.address_id = editAddId;
					addrData = Js.Tools.jsonToString(addrData,true);
				    Js.sendData(sendLink.addr+"api/web/update/updUserAddress.jsonp",{showLoad:false,param:addrData},function(data){
				        updateShowAddress(1,editAddId,0);
				    });
				}else {//新增
					globalCollection.addressModule.userAddressData.is_save = 1;
				   addrData.is_asyn=0;
				   var isDefault = addrData.is_default;
				   addrData.TI = window.getCookie("COOKIE_SESSION_ID");
				   addrData = Js.Tools.jsonToString(addrData,true);
				   Js.sendData(sendLink.addr+"api/web/insert/addUserAddress.jsonp",{showLoad:false,param:addrData},function(data){
				       //----新增地址要更新当前地址模块的数据及页面展示
				       updateShowAddress(0,"",isDefault);
				  });
				}
			}else{
				window.location.hash = "addressModule";
			}
        }
      }
  });
}
function transLowcase(data){
  var lowcaseData={};
  for(var key in data){
    lowcaseData[key.toLowerCase()] = data[key];
  }
  return lowcaseData;
}

//---选为配送地址
function selectAsDeliverAddr(addrId){
	if(addrId){
	    var PROVINCE_ID;//选中地址的省份
		var DISTRICT_ID;//选中地址的地级市
		var selectAdd;//用户选中的地址
		if(globalCollection.addressModule.addressData){
			for(var i=0;i<globalCollection.addressModule.addressData.length;i++){
				var addrItem = globalCollection.addressModule.addressData[i];
				if(addrItem){
					if(addrId == addrItem.ADDRESS_ID ){
					
					/**
						addrItem.invoice_title = globalCollection.globalModule.globalModuleData.userGloblData.invoice_title;
						addrItem.invoice_type = globalCollection.globalModule.globalModuleData.userGloblData.invoice_type;
						addrItem.invoice_cotent = globalCollection.globalModule.globalModuleData.userGloblData.invoice_cotent;
						addrItem.invoice_category_id = globalCollection.globalModule.globalModuleData.userGloblData.invoice_category_id;						
						addrItem.invoice_type_id = globalCollection.globalModule.globalModuleData.userGloblData.invoice_type_id;
					**/
						$.extend(globalCollection.addressModule.userAddressData,addrItem);
						$.extend(globalCollection.addressModule.userAddressData,transLowcase(addrItem));
						if((!addrItem.INVOICE_TYPE_ID || addrItem.INVOICE_TYPE_ID=="undefined" || addrItem.INVOICE_TYPE_ID=="")){
							addrItem.INVOICE_TYPE_ID = 2;
						}
						if(addrItem.INVOICE_TYPE_ID ==0 || addrItem.INVOICE_TYPE_ID ==1){
							addrItem.INVOICE_TYPE_ID = 2;
						}
						
						globalCollection.addressModule.userAddressData.invoice_type_id = addrItem.INVOICE_TYPE_ID;
						
						selectAdd=globalCollection.addressModule.userAddressData;
						PROVINCE_ID=addrItem.PROVINCE_ID;
						DISTRICT_ID=addrItem.DISTRICT_ID;
						break;
					}
				}
			}
		}
			
		if(PROVINCE_ID && DISTRICT_ID && DISTRICT_ID!=-22){
		  //---add by wangjianmeng  地址可达判断，如果是存在套装，则只传套装id 否则传所有商品id begin
			var pids = "";
			if((globalCollection.globalModule.globalModuleData.userGloblData.suitMainProduct.isSuiteData == '1')){
				pids = globalCollection.globalModule.globalModuleData.userGloblData.suitMainProduct.suiteId;				 
			}else{
				if(globalCollection.globalModule.globalModuleData.orderData.cartAllPid){
					pids = globalCollection.globalModule.globalModuleData.orderData.cartAllPid.replace(/\^/g,",");
					
				}else{
					pids = "";
				}
			}
			
			//---add by wangjianmeng 地址可达判断 end 	
			Js.sendData(sendLink.prod+"api/web/query/getArrivalInfo.jsonp","pids="+pids+"&arrivalId="+PROVINCE_ID+"&districtId="+DISTRICT_ID+"&groupId="+(globalCollection.globalModule.globalModuleData.userGloblData.groupid ||0),function(data){
				if(data.status=="1"){
					if(data.result[0].res == 1){						
						var addrData = transLowcase(selectAdd);
						if(isNaN(addrId)){
						  return;
						}
						
						if(addrData.invoice_type_id==0 || addrData.invoice_type_id==1){
							addrData.invoice_type_id=2;
							addrData.invoice_content="个人";
						}	
						if(addrData.invoice_type_id==2 && addrData.invoice_content =="undefined"){
							addrData.invoice_content = "个人";
						}						
						addrData.invoice_category_id =1;
						$.extend(globalCollection.addressModule.userAddressData,addrData);
						globalCollection.globalModule.globalModuleData.userGloblData.address       = addrData.address_detail;
						globalCollection.globalModule.globalModuleData.userGloblData.zip_code      = addrData.postcode;
						globalCollection.globalModule.globalModuleData.userGloblData.invoice_content = addrData.invoice_content;
											
						$("#summaryCoupon").text("0.00");
						delete globalCollection.globalModule.globalModuleData.orderData.couponCash;//更改地址后重置优惠劵
						delete globalCollection.globalModule.globalModuleData.orderData.couponNo;
						delete globalCollection.globalModule.globalModuleData.orderData.couponPayType;
						calcOrderAmount();
						globalCollection.globalModule.globalModuleData.userGloblData.paymentmethodid_paymentno_paymentpw_paymentamount = addrData.payment_method_id+"_0_0_"+globalCollection.globalModule.globalModuleData.orderData.finalOrderAmount;
						$.extend(globalCollection.globalModule.globalModuleData.userGloblData,addrData);
						getAddrState({d:addrData.district_id,p:addrData.province_id});
						$(".alert").remove();
						checkPaymentState();
						
					}else{
						$(".nopsMsg").show();
						globalCollection.addressModule.userAddressData={};//用户要求的配送地址设为空
					}
				}			
				//==重新选择收货地址后的优惠劵重置
				couponModularInit();			
				});	
			}
	}	
	invoiceModuleInit();
}

function checkPaymentState(){//检查支付状态
  if(globalCollection.globalModule.globalModuleData.supportList.isExtCard){//此单为提货卡，则更改支付方式
    globalCollection.globalModule.globalModuleData.userGloblData.payment_method_id = "ACC-DC_"+globalCollection.globalModule.globalModuleData.orderData.gi+"_0_0";
    globalCollection.globalModule.globalModuleData.userGloblData.payment_method_name = "礼品卡";
  }
  else if(!globalCollection.globalModule.globalModuleData.userGloblData.payment_method_name || 
      (globalCollection.globalModule.globalModuleData.supportList.isSupportSSD==false && (globalCollection.globalModule.globalModuleData.userGloblData.payment_method_id.indexOf("LOAN")!=-1 || globalCollection.globalModule.globalModuleData.userGloblData.payment_method_id.indexOf("FANS")!=-1)) ||
      (globalCollection.globalModule.globalModuleData.supportList.isSupportAlipay==false && globalCollection.globalModule.globalModuleData.userGloblData.payment_method_id.indexOf("ALIPAY")!=-1) ||
      (globalCollection.globalModule.globalModuleData.supportList.isSupportOffline==false && globalCollection.globalModule.globalModuleData.userGloblData.payment_method_id.indexOf("OFFLINE")!=-1)
    ){//默认弹开支付方式要求重新选择
    delete globalCollection.addressModule.userAddressData.payment_method_id;
    delete globalCollection.addressModule.userAddressData.payment_method_name;
    delete globalCollection.globalModule.globalModuleData.userGloblData.payment_method_id;
    delete globalCollection.globalModule.globalModuleData.userGloblData.payment_method_name;
    //$("#modifyOnline").trigger("click");
  }
}
//---设为默认地址
function addToDefaultAddress(addrId){
	  if(addrId){
		Js.sendData(sendLink.addr+"api/web/update/updUserAddressDefault.jsonp",'address_id='+addrId+"&is_asyn=0",showDefaultAddress(addrId));	
	}	
}

//---设为默认地址候的界面显示控制
function showDefaultAddress(addressId){
	if(globalCollection.addressModule.addressData){
		for(var i=0;i<globalCollection.addressModule.addressData.length;i++){
			var addrItem = globalCollection.addressModule.addressData[i];
			if(addrItem){
				if(addressId == addrItem.ADDRESS_ID ){
					globalCollection.addressModule.addressData[i].IS_DEFAULT=1;
				}else{
					globalCollection.addressModule.addressData[i].IS_DEFAULT=0;
				}
			}
		}
	}
	showAddressInfo(addressId,0);//展示用户地址
}

//---修改及删除地址 type： 0：新增   1：修改 	2:删除
function editCurrentAddress(type,addressId){
	if(type == 1){
		showNewAddressInput(type,addressId);
	}
	if(type == 2){	
		myConfirm("是否要删除此地址？",function(isOk){
			if(isOk){
			  Js.sendData(sendLink.addr+"api/web/delete/delUserAddress.jsonp",{showLoad:true,param:'address_id='+addressId+"&is_asyn=0"},function (){updateShowAddress(2,addressId,0);});
			}
		});
	}
}

//---删除或修改完地址候更新地址显示及地址模块的数据 type： 0：新增   1：修改 	2:删除
function updateShowAddress(type,addressId,isDefault){	
	addressModuleInit(type,isDefault);
	//window.location.reload();
	/**
	if(type == 0){//新增
		Js.sendData(sendLink.addr+"api/web/query/userAddress.jsonp",{showLoad:true,param:'type=0&sort=desc'},function(data){
			if(data.status == 1){
				var addrData = data.result[0];
				var addrid = addrData.ADDRESS_ID;//新增加的地址id
				var adddefault = addrData.IS_DEFAULT;//新增加地址是否是默认地址
				globalCollection.addressModule.addressData.splice(0,0,addrData);//将新增地址放在第一位	
				for(var i=0;i<globalCollection.addressModule.addressData.length;i++){
					if(globalCollection.addressModule.addressData[i] && adddefault==1){
						var addressItem = globalCollection.addressModule.addressData[i];
						if(addrid != addressItem.ADDRESS_ID){
							  globalCollection.addressModule.addressData[i].IS_DEFAULT=0;
						}
					}				
				}
				showAddressInfo(addrid,0);//展示用户地址
			}			
		});			
	}else if(type == 1){//修改
		Js.sendData(sendLink.addr+"api/web/query/userAddress.jsonp",{showLoad:true,param:'type=0'},function(data){
			if(data.status == 1){
				var addrData;
				if(data.result && data.result.length>0){
					for(var i=0;i<data.result.length;i++){
						var addrItem = data.result[i];
						if(addrItem.ADDRESS_ID == addressId){
							addrData=addrItem;
							break;
						}
					}
				}
					
				if(addrData){
					var addrid = addrData.ADDRESS_ID;//新增加的地址id
					var adddefault = addrData.IS_DEFAULT;//新增加地址是否是默认地址
					for(var i=0;i<globalCollection.addressModule.addressData.length;i++){
						if(globalCollection.addressModule.addressData[i]){
							var addressItem = globalCollection.addressModule.addressData[i];
							if(addrid == addressItem.ADDRESS_ID){
								  globalCollection.addressModule.addressData[i]=addrData;
								  break;
							}
						}				
					}
					for(var i=0;i<globalCollection.addressModule.addressData.length;i++){
						if(globalCollection.addressModule.addressData[i] && adddefault==1){
							var addressItem = globalCollection.addressModule.addressData[i];
							if(addrid != addressItem.ADDRESS_ID){
								  globalCollection.addressModule.addressData[i].IS_DEFAULT=0;
							}
						}				
					}
					showAddressInfo(addrid,0);//展示用户地址
				}
			}			
		});		
	}else if(type == 2){//删除
		if(globalCollection.addressModule.addressData){
			for(var i=0;i<globalCollection.addressModule.addressData.length;i++){
				if(globalCollection.addressModule.addressData[i]){
					var addressItem = globalCollection.addressModule.addressData[i];
					if(addressId == addressItem.ADDRESS_ID){
						 delete globalCollection.addressModule.addressData[i];
					}
				}				
			}		
		}
		//addressModuleInit();
		var defaultAddressId = "";
		for(var i=0;i<globalCollection.addressModule.addressData.length;i++){
			if(globalCollection.addressModule.addressData[i]){
				if(globalCollection.addressModule.addressData[i] && globalCollection.addressModule.addressData[i].IS_DEFAULT==1){
					var addressItem = globalCollection.addressModule.addressData[i];
					defaultAddressId = addressItem.ADDRESS_ID;
				}
			}			
		}
		if(defaultAddressId == ""){
			for(var i=0;i<globalCollection.addressModule.addressData.length;i++){
				if(globalCollection.addressModule.addressData[i]){
					defaultAddressId = globalCollection.addressModule.addressData[i].ADDRESS_ID;
					break;
				}			
			}			
		}
		showAddressInfo(defaultAddressId,0);	
	}
	**/
}

//----判断地址是否可达

function getAddrState(areaData){
	if(!globalCollection.globalModule.globalModuleData.supportList.isComeFromCart && globalCollection.globalModule.globalModuleData.orderData.productType==1 && areaData.d)
    Js.sendData(sendLink.addr+"api/web/query/getArrivalTime.jsonp","shipping_method_id=1&destination_district_id="+areaData.d+"&product_info_list="+globalCollection.globalModule.globalModuleData.orderData.cartAllPid,getShipTime);
  if(globalCollection.globalModule.globalModuleData.supportList.isBook && areaData.p)
    Js.sendData(sendLink.addr+"api/web/query/bookProductArriveTime.jsonp",'product_id='+globalCollection.globalModule.globalModuleData.orderData.mainPid+"&destination_district_id="+areaData.d,getBookTime);
  if(!globalCollection.globalModule.globalModuleData.supportList.isComeFromCart && areaData.p)
    Js.sendData(sendLink.oldProd+"api/web/query/getProductStock.jsonp",'pid='+globalCollection.globalModule.globalModuleData.orderData.mainPid+"&district_id="+areaData.p,getStock);
  if(areaData.d && areaData.d!=-22)
    Js.sendData(sendLink.addr+"api/web/query/getFreight.jsonp","shipping_method_id=1&destination_district_id="+areaData.d+"&product_info_list="+globalCollection.globalModule.globalModuleData.orderData.pInfo,getFee);
  if(areaData.p && areaData.d && areaData.d!=-22){
      //---add by wangjianmeng  地址可达判断，如果是存在套装，则只传套装id 否则传所有商品id begin
		var pids = "";
		if((globalCollection.globalModule.globalModuleData.userGloblData.suitMainProduct.isSuiteData == '1')){
			pids = globalCollection.globalModule.globalModuleData.userGloblData.suitMainProduct.suiteId				 
		}else{
			pids = globalCollection.globalModule.globalModuleData.orderData.cartAllPid.replace(/\^/g,",");

		}
		//---add by wangjianmeng 地址可达判断 end 	
		Js.sendData(sendLink.prod+"api/web/query/getArrivalInfo.jsonp","pids="+pids+"&arrivalId="+areaData.p+"&districtId="+areaData.d+"&groupId="+(globalCollection.globalModule.globalModuleData.userGloblData.groupid ||0),getArriveData);
	}	
}


//----预约送货时间，暂时去掉
function getShipTime(data){

}

function getBookTime(data){
 if(globalCollection.globalModule.globalModuleData.orderData.isS40){
    $("#bookTime").text("超级电视S40预售订单，将在2周后开始发货，3周内完成发货。须100%全款支付，我们将按照支付完成次序，进行发货；");
  }
  else{
    $("#bookTime").empty();
    if(data.status=="1")
        $("#bookTime").text(data.result[0].CONTENT);
  }
}

function getStock(data){
	if(data.status=="1")
    globalCollection.globalModule.globalModuleData.orderData.mainPidStock = data.result[0].res;
}
function getFee(data){
	if(data.status=="1"){
		if(globalCollection.globalModule.globalModuleData.supportList.isVIP){
			//if(globalCollection.globalModule.globalModuleData.userGloblData.suitMainProduct.mainProductId == '600200000811'){
				globalCollection.globalModule.globalModuleData.orderData.fee = parseFloat(data.result[0].AMOUNT) - parseFloat(data.result[0].DISCOUNT);
				var fee = globalCollection.globalModule.globalModuleData.orderData.fee.toFixed(2);
				$(".summaryFee").html(fee);
				//配送信息模块展示运费信息
				if(fee>0){
					$(".summaryFeeShow").html("（配送费:￥"+fee+"）");
				}else{
					$(".summaryFeeShow").html("（免配送费）");
				}
				calcOrderAmount();
			//}			
		}else if(globalCollection.globalModule.globalModuleData.supportList.isExtCard){
			globalCollection.globalModule.globalModuleData.orderData.fee = 0;
			var fee = globalCollection.globalModule.globalModuleData.orderData.fee.toFixed(2);
			$(".summaryFee").html(fee);
			//配送信息模块展示运费信息
			if(fee>0){
				$(".summaryFeeShow").html("（配送费:￥"+fee+"）");
			}else{
				$(".summaryFeeShow").html("（免配送费）");
			}
			calcOrderAmount();
		}else{
			globalCollection.globalModule.globalModuleData.orderData.fee = parseFloat(data.result[0].AMOUNT) - parseFloat(data.result[0].DISCOUNT);
			var fee = globalCollection.globalModule.globalModuleData.orderData.fee.toFixed(2);
			$(".summaryFee").html(fee);
			//配送信息模块展示运费信息
			if(fee>0){
				$(".summaryFeeShow").html("（配送费:￥"+fee+"）");
			}else{
				$(".summaryFeeShow").html("（免配送费）");
			}
			calcOrderAmount();
		}
	}
}
function getArriveData(data){
	if(data.status=="1"){
	if(data.result[0].res){		
		$("#regionArriveError").hide();		
    }else{
		$("#regionArriveError").show();
	}
  }
}
//---隐藏新增收货地址模块
function hideNewAddress(){
	if(globalCollection.addressModule.addressData.length<1){
		alert("您还没有收货地址<br />请至少添加一个收货地址！");
	}else{
		$("#newAddress").hide();
		$("#addressModule").show();//add by shixf 20140505 隐藏录入地址时，显示上面的地址列表
	}
}
//===========1、地址模块初始化及地址相关操作控制 end =============

//===========2、支付模块初始化及支付相关操作控制 begin =============
function paymentModuleInit(){
	if(!globalCollection.globalModule.globalModuleData.supportList.isExtCard){
	
		//---大客户走线下支付，否则都是在线支付
		if(globalCollection.globalModule.globalModuleData.supportList.isVIP){
			//----大客户线下支付显示		
			var data = {};
			data.orderData = globalCollection.globalModule.globalModuleData.orderData;
			data.supportList = globalCollection.globalModule.globalModuleData.supportList;	
			$("#payBlock").html(Js.Tools.template('offlineDefault', data));
		}else{
			var data = {};
			data.orderData = globalCollection.globalModule.globalModuleData.orderData;
			data.supportList = globalCollection.globalModule.globalModuleData.supportList;
			$("#payBlock").html(Js.Tools.template('onlineDefault', data));//由于每次都是删除再添加html元素，所以需要重新注册事件
		}		 		
	}
	
	paymentMouseEventInit();
}

function paymentMouseEventInit(){	
	$(".DKHPayMethod").unbind("click").click(function(){		
		if($(this).attr("checked")=="checked"){
			if($(this).attr("id") =="DKHOnlinePay"){
				$("#showDKHOnlinePay").show();
				$("#showDKHOfflinePay").hide();
			}else{
				$("#showDKHOnlinePay").hide();
				$("#showDKHOfflinePay").show();
			}
		};
	});

	$("#bookSelectRate").change(function(){
		var rate = $(this).find("option:selected").val().split("|");
		$("#bookTip").text(globalCollection.globalModule.globalModuleData.orderData.presaleDeposits[rate[2]].deliveryPeriod);
		globalCollection.globalModule.globalModuleData.orderData.currentPayRateId = rate[2];
		globalCollection.globalModule.globalModuleData.orderData.pre_pay_rate = rate[0];
		globalCollection.globalModule.globalModuleData.userGloblData.pre_pay_percent = rate[1];
		$(".bookRate").html(globalCollection.globalModule.globalModuleData.orderData.pre_pay_rate*100);
		calcOrderAmount();
	});
}


function transUpcase(data){
  var lowcaseData={};
  for(var key in data){
    lowcaseData[key.toUpperCase()] = data[key];
  }
  return lowcaseData;
}
//===========2、支付模块初始化及支付相关操作控制 end =============

//========= 3、配送模块初始化  begin  =============
//---配送模块固定写死，只支持快递配送，运费这里只做提示，运费在商品金额里计算展示

//========= 3、配送模块初始化  end  =============

//========= 4、商品清单展示模块  begin  ============

//----商品来源分为购物车和非购物车
function productModuleInit(){
	//-----来自购物车
	var arrivalId = 1;
	if(typeof(globalCollection.addressModule.userAddressData.PROVINCE_ID) !="undefined"){
		arrivalId = globalCollection.addressModule.userAddressData.PROVINCE_ID;
	}
	if(globalCollection.globalModule.globalModuleData.supportList.isComeFromCart){
		$("#backToCart").show();
	  //globalCollection.globalModule.globalModuleData.userGloblData.seller_id = param.s;
	  globalCollection.globalModule.globalModuleData.userGloblData.seller_id = 1;
	  Js.sendData(sendLink.cart+"api/web/query/viewCart.jsonp","cartType=0&TO_PAY=0&arrivalId="+arrivalId,function(data){
		if(data.result.length==0){
		  alert("无结算商品，请重新添加",function(){
			location.href="/";
		  });
		  return;
		}
		if(data.result[0].products[0]){
			globalCollection.globalModule.globalModuleData.orderData.mainPid = data.result[0].products[0].productId;//目的是获得库存和送达时间
		}
		
		data.result[0].supportList = globalCollection.globalModule.globalModuleData.supportList;
		getCartItemData(data);
		//buildPageInfo(param);
	  });

	  $("#goBackTOCart").show();
		
		//---支付方式模块初始化
		globalCollection.paymentModule.paymentModuleInit();
	}else{
		var count = param.p.split('^');
		var pids="",pid=[],num=[],price=[];
		for(var i=0;i<count.length;i++){
			pid.push(count[i].split('_')[0]);
			pids+=pid[i]+",";
			num.push(count[i].split('_')[1]);
			price.push(count[i].split('_')[2]);//传递过来的价格
			if(count[i].split('_')[1]<1){
				alert("商品数量不正确，请重新抢购",function(){
					window.location.href="/";
				});
				return;
			}
		}
		Js.sendData(sendLink.prod+"api/web/query/getProductInfo.jsonp",'pids='+pids+"&arrivalId="+(param.d||1)+"&source="+(param.l?"lema":"")+"&idAdvance="+(param.y=="1"?1:0)+"&groupId="+(param.t2||"0")+"&isRelevace=1",function(data){
			if(data.status!="1"){
			  alert("信息无效，请重新添加",function(){
				history.back(-1);
			  });
			  return;
			}
			var cartData = {"status":"1","message": "", "result": [{"order": [], "suite": [], "products":[],"ORDER_PROMOTION":{"GIFT":[],"ALL_SELECT":{},"SELECT":{}}} ] };
			
			
			
		//---add by wangjianmeng 套装下单数据修改 begin
		//---1、判断是否套装， userGloblData 里新增套装节点  存放套装id  主商品id	
		if(data.status=="1"){
			for(var i=0;i<data.result.length;i++){
				var prodItem = data.result[i];
				if(prodItem.isSuiteData == 1){
					globalCollection.globalModule.globalModuleData.userGloblData.suitMainProduct.isSuiteData = prodItem.isSuiteData	//是否套装
					globalCollection.globalModule.globalModuleData.userGloblData.suitMainProduct.mainProductId = prodItem.suiteMainProductId; //主商品id
					globalCollection.globalModule.globalModuleData.userGloblData.suitMainProduct.suiteId = prodItem.pid; //套装id
					globalCollection.globalModule.globalModuleData.userGloblData.suitMainProduct.RELEVANCE = prodItem.RELEVANCE;//套装内的商品
				}				
			}
		}	
		//---by wangjianmeng 套装下单数据修改 end
		for(var i=0;i<data.result.length;i++){	  
			  data.result[i].gift=[];//模拟购物车中的数据节点，目的是调用同一处理方法（getCartItemData）
			  data.result[i].productId=pid[i];
			  data.result[i].showStatus=6;
			  data.result[i].ITEM_STATUS = "1";
			  //---add by wangjianmeng
			  //--如果是套装，则将查询出的商品价格替换为当前套装下商品的价格
			  if(globalCollection.globalModule.globalModuleData.userGloblData.suitMainProduct.RELEVANCE){
				for(var index=0;index<globalCollection.globalModule.globalModuleData.userGloblData.suitMainProduct.RELEVANCE.length;index++){
					var currentRelevanceProd = globalCollection.globalModule.globalModuleData.userGloblData.suitMainProduct.RELEVANCE[index];
					if(currentRelevanceProd && (currentRelevanceProd.PID == pid[i])){
						data.result[i].salePrice = currentRelevanceProd.SALE_PRICE;
					}
					//---计算当前套装下商品数量

					if(currentRelevanceProd && (currentRelevanceProd.PID == pid[i])){
						var prodQuantityInSuit = currentRelevanceProd.QUANTITY;
						data.result[i].groupQuantity = parseInt(prodQuantityInSuit);				
						data.result[i].purchaseQuantity=parseInt(num[i]);
						break;
					}else if((globalCollection.globalModule.globalModuleData.userGloblData.suitMainProduct.suiteId == pid[i]) && currentRelevanceProd && (currentRelevanceProd.PID == globalCollection.globalModule.globalModuleData.userGloblData.suitMainProduct.mainProductId)){
						//由于pid[i]中传过来的是套装的id，和配件list里的住商品id不同，所以这里处理套装下主商品的个数
						var prodQuantityInSuit = currentRelevanceProd.QUANTITY;
						data.result[i].groupQuantity = parseInt(prodQuantityInSuit);
						data.result[i].purchaseQuantity=parseInt(num[i]);
						break;
					}
				}
			  }else{
				data.result[i].purchaseQuantity=num[i];
			  }
			  
			  //data.result[i].productId=pid[i];
			  data.result[i].reduce=0;
			  data.result[i].points=0;	  
			  //data.result[i].promotionId=0;
			  //data.result[i].purchaseQuantity=num[i];
			  
			   //---add by wangjianmeng 如果存在套装则促销id改为套装id begin
			  if(globalCollection.globalModule.globalModuleData.userGloblData.suitMainProduct.isSuiteData && globalCollection.globalModule.globalModuleData.userGloblData.suitMainProduct.suiteId){
				data.result[i].promotionId= globalCollection.globalModule.globalModuleData.userGloblData.suitMainProduct.suiteId;
			  }else{      
				data.result[i].promotionId=0;
			  }			  
			  //---by wangjianmeng 如果存在套装则促销id改为套装id end

			  //---注掉商品数量参数拼装，改为上面根据商品套装下配件数量计算
			  //data.result[i].purchaseQuantity=num[i];
	  
			  if(price[i] && price[i]>=0){
				 data.result[i].salePrice=price[i];//传递过来的价格
			  }
			  cartData.result[0].products.push(data.result[i]);
			  //globalCollection.globalModule.globalModuleData.userGloblData.seller_id = data.result[i].eb_id;
			  globalCollection.globalModule.globalModuleData.userGloblData.seller_id = 1;
			  if(data.result[i].revealStatus=="2"){
				globalCollection.globalModule.globalModuleData.orderData.hasSpecilGoods = true;
				continue;
			  }
			  globalCollection.globalModule.globalModuleData.orderData.normalGoods += pid[i]+"_"+num[i]+"^";
		}
		globalCollection.globalModule.globalModuleData.orderData.mainPid = pid[0];
		globalCollection.globalModule.globalModuleData.orderData.productType = data.result[0].type;
		if(globalCollection.globalModule.globalModuleData.supportList.isBook){
		  if(!data.result[0].presaleDeposits.length){
			alert("此单为预售订单，但商品无预付比例",function(){
			  history.back(-1);
			});
			return;
		  }
		  globalCollection.globalModule.globalModuleData.orderData.currentPayRateId = 0;
		  globalCollection.globalModule.globalModuleData.orderData.presaleDeposits = data.result[0].presaleDeposits;

			if(globalCollection.globalModule.globalModuleData.orderData.presaleDeposits){
				var tempDeposits = globalCollection.globalModule.globalModuleData.orderData.presaleDeposits[0].deposits;
				for(var i=0;i<globalCollection.globalModule.globalModuleData.orderData.presaleDeposits.length;i++){
					if(tempDeposits < globalCollection.globalModule.globalModuleData.orderData.presaleDeposits[i].deposits){
						tempDeposits = globalCollection.globalModule.globalModuleData.orderData.presaleDeposits[i].deposits;
						globalCollection.globalModule.globalModuleData.orderData.currentPayRateId = i;
					}			
				}
				globalCollection.globalModule.globalModuleData.userGloblData.pre_pay_percent = tempDeposits;	  
				globalCollection.globalModule.globalModuleData.orderData.pre_pay_rate = tempDeposits;
			}
		  
		}

		cartData.result[0].supportList = globalCollection.globalModule.globalModuleData.supportList;
		getCartItemData(cartData);
		//buildPageInfo(param);
		if(globalCollection.globalModule.globalModuleData.orderData.mainPid=="DSulCqqrb"){
		 globalCollection.globalModule.globalModuleData.orderData.isS40 = true;
		}
		
		
		//---支付方式模块初始化
		globalCollection.paymentModule.paymentModuleInit();	
		});
	}
}


function getCartItemData(cartData){
	$("#cart-inner").empty().append(Js.Tools.template('product', cartData.result[0]));
	var data={
		cartAllPid:"",
		jieneng:0
	};
	if(cartData.result[0].products[0]){
		globalCollection.globalModule.globalModuleData.orderData.productType = cartData.result[0].products[0].type;
	}
	data.cartAllPid = "";
	globalCollection.globalModule.globalModuleData.orderData.cartAllPrice = 0;
	//---单品组装
	if(cartData.result[0].products){
		for(var i= 0;i<cartData.result[0].products.length;i++){
			var obj = cartData.result[0].products[i];
			if(obj.showStatus == 6 && obj.ITEM_STATUS == "1"){
				//---add by wangjianmeng begin	
				//---下单时判断如果是套装的话，将套装id替换成主商品id	
				if(obj.isSuiteData == '1'){
					obj.productId = obj.suiteMainProductId;				 
				}
				//---add by wangjianmeng end
				//---modify by wangjianmeng 下单时，商品数量要修改为当前套数（obj.purchaseQuantity/obj.groupQuantity）
				var prodQuantity = 1;
				if(!obj.purchaseQuantity || (obj.purchaseQuantity/(obj.groupQuantity||1)<1)){
					prodQuantity = 1;
				}else{
					prodQuantity = obj.purchaseQuantity/(obj.groupQuantity||1);
				}
				var realPromotionId = 0;
				if(obj.realpromotionid){
					realPromotionId = obj.realpromotionid;
				}
				globalCollection.globalModule.globalModuleData.userGloblData.realpromotionid_productid_promotionid_quantityingroup_quantity+=realPromotionId+"_"+obj.productId+"_"+(obj.promotionId||0)+"_"+(obj.groupQuantity||1)+"_"+prodQuantity+"^";		
				globalCollection.globalModule.globalModuleData.orderData.pInfo+=obj.purchaseQuantity+"_"+obj.BIZ_ID+"_"+obj.ROUGH_WEIGHT+"_"+obj.chargeMode+"_"+obj.VOLUME+"_"+obj.productId+"^";
				data.cartAllPid+=obj.productId+",";
				data.jieneng+=parseFloat(obj.ENERGY_SAVING_MONEY)*obj.purchaseQuantity;
				globalCollection.globalModule.globalModuleData.orderData.cartAllPrice+=(obj.salePrice-obj.reduce)*obj.purchaseQuantity;
			}
		}
	}

	
	//--套装组装
	
	for(var i= 0;i<cartData.result[0].suite.length;i++){
		var obj = cartData.result[0].suite[i];
			//---add by wangjianmeng begin	
		//---下单时判断如果是套装的话，将套装id替换成主商品id	
		
		obj.productId = obj.suiteMainProductId;				 
		if(obj.ITEM_STATUS == "1"){
			//---add by wangjianmeng end
			//---modify by wangjianmeng 下单时，商品数量要修改为当前套数（obj.purchaseQuantity/obj.groupQuantity）
			
			//==组装套装内必选商品
			if(obj.requiredProductinfo){
				for(var j=0;j<obj.requiredProductinfo.length;j++){
				
					var pordInSuiteItem = obj.requiredProductinfo[j];
					var prodQuantity = 1;
					
					prodQuantity = obj.purchaseQuantity;					
					var realPromotionId = 0;
					if(obj.realpromotionid){
						realPromotionId = obj.realpromotionid;
					}
					globalCollection.globalModule.globalModuleData.userGloblData.realpromotionid_productid_promotionid_quantityingroup_quantity+=realPromotionId+"_"+pordInSuiteItem.PID+"_"+(obj.suiteid||0)+"_"+(pordInSuiteItem.QUANTITY||1)+"_"+prodQuantity+"^";		
					globalCollection.globalModule.globalModuleData.orderData.pInfo+=obj.purchaseQuantity+"_"+pordInSuiteItem.BIZ_ID+"_"+pordInSuiteItem.ROUGH_WEIGHT+"_"+pordInSuiteItem.chargeMode+"_"+obj.VOLUME+"_"+pordInSuiteItem.PID+"^";
					
					data.jieneng+=parseFloat(obj.ENERGY_SAVING_MONEY)*obj.purchaseQuantity;
					globalCollection.globalModule.globalModuleData.orderData.cartAllPrice+=(pordInSuiteItem.SALE_PRICE-(pordInSuiteItem.reduce||0))*pordInSuiteItem.QUANTITY*prodQuantity;
				}
			}
			//==组装套装内可选商品
			if(obj.optionalProductinfo){
				for(var j=0;j<obj.optionalProductinfo.length;j++){
				
					var optionalProduct = obj.optionalProductinfo[j];
					var prodQuantity = 1;
					
					prodQuantity = obj.purchaseQuantity;
					var realPromotionId = 0;
					if(obj.realpromotionid){
						realPromotionId = obj.realpromotionid;
					}
					if(optionalProduct.IS_USE_MAINPID_NUM && optionalProduct.IS_USE_MAINPID_NUM == 1){
						globalCollection.globalModule.globalModuleData.userGloblData.realpromotionid_productid_promotionid_quantityingroup_quantity+=realPromotionId+"_"+optionalProduct.pid+"_"+(obj.suiteid||0)+"_"+(optionalProduct.purchaseQuantity||1)+"_"+prodQuantity+"^";
					}else{
						globalCollection.globalModule.globalModuleData.userGloblData.realpromotionid_productid_promotionid_quantityingroup_quantity+=realPromotionId+"_"+optionalProduct.pid+"_"+(obj.suiteid||0)+"_"+(optionalProduct.purchaseQuantity||1)+"_1^";
					}					
					globalCollection.globalModule.globalModuleData.orderData.pInfo+=obj.purchaseQuantity+"_"+optionalProduct.BIZ_ID+"_"+optionalProduct.ROUGH_WEIGHT+"_"+optionalProduct.chargeMode+"_"+obj.VOLUME+"_"+optionalProduct.pid+"^";
					data.jieneng+=parseFloat(obj.ENERGY_SAVING_MONEY)*obj.purchaseQuantity;
					globalCollection.globalModule.globalModuleData.orderData.cartAllPrice+=(optionalProduct.salePrice-(optionalProduct.reduce||0))*optionalProduct.purchaseQuantity;
				}
			}	
			data.cartAllPid+=obj.suiteid+",";
			
			if(obj.IS_ADVANCE_BOOKING == 1){
				showAgreeDiv();
			}
		}		
	}
	
	
	//--加价购组装
	if(cartData.result[0].promotionVOList && cartData.result[0].promotionVOList.priceMarkup){
		for(var i= 0;i<cartData.result[0].promotionVOList.priceMarkup.length;i++){
			var obj = cartData.result[0].promotionVOList.priceMarkup[i];
			if(obj.isAddCart == "1" && obj.showStatus == "6" && obj.ITEM_STATUS == "1" ){
					//---add by wangjianmeng begin	
				//---下单时判断如果是套装的话，将套装id替换成主商品id	
				//---add by wangjianmeng end
				//---modify by wangjianmeng 下单时，商品数量要修改为当前套数（obj.purchaseQuantity/obj.groupQuantity）
				var prodQuantity = obj.purchaseQuantity;
				if(obj.purchaseQuantity == 0){
					prodQuantity = 1;
				}
				var realPromotionId = 0;
				if(obj.realpromotionid){
					realPromotionId = obj.realpromotionid;
				}
				globalCollection.globalModule.globalModuleData.userGloblData.realpromotionid_productid_promotionid_quantityingroup_quantity+=realPromotionId+"_"+obj.productId+"_"+(obj.promotionId||0)+"_"+(obj.groupQuantity||1)+"_"+prodQuantity+"^";		
				globalCollection.globalModule.globalModuleData.orderData.pInfo+=obj.purchaseQuantity+"_"+obj.BIZ_ID+"_"+obj.ROUGH_WEIGHT+"_"+obj.chargeMode+"_"+obj.VOLUME+"_"+obj.productId+"^";
				data.cartAllPid+=obj.productId+",";
				data.jieneng+=parseFloat(obj.ENERGY_SAVING_MONEY)*prodQuantity;
				globalCollection.globalModule.globalModuleData.orderData.cartAllPrice+=obj.priceMarkUpPrice*prodQuantity;
			}
		}
	}
	
	//---展示分单提示
	if(isNeedShowSplit(cartData) && globalCollection.globalModule.globalModuleData.supportList.isComeFromCart){
		$("#splitNote").show();
	}
	
	globalCollection.globalModule.globalModuleData.orderData.cartAllPrice = parseFloat(globalCollection.globalModule.globalModuleData.orderData.cartAllPrice).toFixed(2);
	$.extend(globalCollection.globalModule.globalModuleData.orderData,data);
	$("#orderAmount").text(globalCollection.globalModule.globalModuleData.orderData.cartAllPrice);
	if(globalCollection.globalModule.globalModuleData.supportList.isSupportJieNeng){
		globalCollection.globalModule.globalModuleData.orderData.cartAllPrice -= globalModule.globalModuleData.orderData.jieneng;
		$("#orderJieneng").text(globalCollection.globalModule.globalModuleData.orderData.jieneng);
	}
	
	//---计算费用
	calcOrderAmount();
	
	//---计算运费，运费需要地址、商品id，这两个接口都返回数据之后才能正确执行
	selectAsDeliverAddr(globalCollection.addressModule.userAddressData.ADDRESS_ID);
	
	//---优惠劵信息初始化，需要orderData信息
	couponModularInit();
}

function isNeedShowSplit(cartData){
	var suiteCount = 0;
	var productCount = 0;
	var promotionCount = 0;
	if(cartData){
		if(cartData.result[0].suite){	
			for(var i=0;i<cartData.result[0].suite.length;i++){
				var suiteItem = cartData.result[0].suite[i];
				if(suiteItem.ITEM_STATUS == "1"){
					suiteCount++;
				}
			}
		}
		if(cartData.result[0].products){
			for(var i=0;i<cartData.result[0].products.length;i++){
				var productItem = cartData.result[0].products[i];
				if(productItem.showStatus == 6 && productItem.ITEM_STATUS == "1"){
					productCount++;
				}
			}
		}
		if(cartData.result[0].promotionVOList && cartData.result[0].promotionVOList.priceMarkup){
			for(var i=0;i<cartData.result[0].promotionVOList.priceMarkup.length;i++){
				var promotionItem = cartData.result[0].promotionVOList.priceMarkup[i];
				if(promotionItem.isAddCart == "1" && promotionItem.showStatus == "6" && promotionItem.ITEM_STATUS == "1"){
					promotionCount++;
				}
			}
		}
		if((suiteCount >1) ||((suiteCount+productCount)>1) || ((suiteCount+promotionCount)>1)){
			return true;
		}
	}
	return false;
}

function calcOrderAmount(){//计算订单总金额
  globalCollection.globalModule.globalModuleData.orderData.finalOrderAmount = globalCollection.globalModule.globalModuleData.orderData.cartAllPrice-(globalCollection.globalModule.globalModuleData.orderData.couponCash||0)+globalCollection.globalModule.globalModuleData.orderData.fee;
  globalCollection.globalModule.globalModuleData.orderData.finalOrderAmount = globalCollection.globalModule.globalModuleData.orderData.finalOrderAmount<0?0:globalCollection.globalModule.globalModuleData.orderData.finalOrderAmount;

  if(globalCollection.globalModule.globalModuleData.supportList.isBook){
    globalCollection.globalModule.globalModuleData.orderData.finalOrderAmount=(globalCollection.globalModule.globalModuleData.orderData.finalOrderAmount*globalCollection.globalModule.globalModuleData.orderData.pre_pay_rate).toFixed(2);
    $(".bookRate").html(globalCollection.globalModule.globalModuleData.orderData.pre_pay_rate*100);
  }
  globalCollection.globalModule.globalModuleData.userGloblData.paymentmethodid_paymentno_paymentpw_paymentamount=globalCollection.globalModule.globalModuleData.userGloblData.payment_method_id+"_0_0_"+(globalCollection.globalModule.globalModuleData.orderData.finalOrderAmount)+(globalCollection.globalModule.globalModuleData.orderData.couponPayType||"");
  globalCollection.globalModule.globalModuleData.orderData.finalOrderAmount = parseFloat(globalCollection.globalModule.globalModuleData.orderData.finalOrderAmount).toFixed(2);
  $("#finalAmount").text(globalCollection.globalModule.globalModuleData.orderData.finalOrderAmount);
  if(globalCollection.globalModule.globalModuleData.orderData.finalOrderAmount==0){
    globalCollection.globalModule.globalModuleData.orderData.isZeroOrder=true;
    globalCollection.globalModule.globalModuleData.userGloblData.invoice_type = globalCollection.addressModule.userAddressData.invoice_type_id  =1;
    globalCollection.globalModule.globalModuleData.userGloblData.invoice_title = globalCollection.addressModule.userAddressData.invoice_content = "";
    globalCollection.globalModule.globalModuleData.userGloblData.invoice_cotent = globalCollection.addressModule.userAddressData.invoice_category_id = 0;
  }
  else
    globalCollection.globalModule.globalModuleData.orderData.isZeroOrder=false;
}

//========= 4、商品清单展示模块  end  ============


//=================   发票信息模块初始化  begin    ========================
//----发票分为个人发票和大客户
function invoiceModuleInit(){	
	showInvoiceInfo();	
}

//---发票信息展示
function showInvoiceInfo(){		
	globalCollection.addressModule.userAddressData.INVOICE_TYPE_ID = globalCollection.addressModule.userAddressData.invoice_type_id;
	globalCollection.addressModule.userAddressData.invoice_type = globalCollection.addressModule.userAddressData.invoice_type_id;
	if(!globalCollection.globalModule.globalModuleData.orderData.isZeroOrder && !globalCollection.globalModule.globalModuleData.supportList.isExtCard){
		$("#invoiceBlock").empty().append(Js.Tools.template('invoiceDefault', transLowcase(globalCollection.addressModule.userAddressData))).show();
	}else{
		$("#invoiceBlock").hide();
		globalCollection.globalModule.globalModuleData.userGloblData.invoice_type = 1;
		globalCollection.globalModule.globalModuleData.userGloblData.invoice_title = "";
	}
	invoiceMouseEventInit();
}

//-----globalCollection.invoiceModule.invoiceModuleData
function invoiceMouseEventInit(){
	$("#modifyInvoice").unbind("click").click(function(){
		globalCollection.addressModule.userAddressData.invoice_type_id = globalCollection.addressModule.userAddressData.invoice_type;
		var data = $.extend(globalCollection.addressModule.userAddressData,globalCollection.globalModule.globalModuleData.supportList);
		data.jienengType = globalCollection.globalModule.globalModuleData.userGloblData.energy_subs_bm||1;
		$("#invoiceBlock").html(Js.Tools.template("invoice",transLowcase(data)));
		invoiceEvent();
	});
}

function invoiceEvent(){
  $("input[name='invoiceType']").unbind("click").click(function(){
    if($(this).val()==2){
      $(".invoiceType2").show();
      $(".invoiceType3").hide();
    }
    else{
      $(".invoiceType2").hide();
      $(".invoiceType3").show();
    }
  });

  
  $("#saveInvoiceButton").unbind("click").click(function(){
    globalCollection.globalModule.globalModuleData.userGloblData.invoice_type = globalCollection.addressModule.userAddressData.invoice_type_id = $("input[name='invoiceType']:checked").val();
	globalCollection.globalModule.globalModuleData.userGloblData.invoice_type_id = $("input[name='invoiceType']:checked").val();
    if(globalCollection.globalModule.globalModuleData.userGloblData.invoice_type==2 && $("input[name='invoiceContent']").val().length==0){
      alert("请输入发票抬头");
      return;
    }
	globalCollection.addressModule.userAddressData.invoice_type = globalCollection.globalModule.globalModuleData.userGloblData.invoice_type;
	globalCollection.addressModule.userAddressData.invoice_type_id = globalCollection.globalModule.globalModuleData.userGloblData.invoice_type_id;
    if(globalCollection.globalModule.globalModuleData.userGloblData.invoice_type==2){
      globalCollection.globalModule.globalModuleData.userGloblData.invoice_title = $("input[name='invoiceContent']").val();
	  globalCollection.addressModule.userAddressData.invoice_content = $("input[name='invoiceContent']").val();
      globalCollection.globalModule.globalModuleData.userGloblData.invoice_cotent = globalCollection.addressModule.userAddressData.invoice_category_id = 1;
	  globalCollection.globalModule.globalModuleData.userGloblData.invoice_type_name = "普通发票";
	  globalCollection.addressModule.userAddressData.invoice_type_name = "普通发票";
	  globalCollection.globalModule.globalModuleData.userGloblData.invoice_cotent = 1;
	  globalCollection.globalModule.globalModuleData.userGloblData.invoice_category_id = 1;
	  globalCollection.addressModule.userAddressData.invoice_cotent = 1;
	  globalCollection.addressModule.userAddressData.invoice_category_id = 1;
    }
    else{
      globalCollection.globalModule.globalModuleData.userGloblData.invoice_title = "";
	  globalCollection.addressModule.userAddressData.invoice_content = "";
      globalCollection.globalModule.globalModuleData.userGloblData.invoice_cotent = 0;
	  globalCollection.addressModule.userAddressData.invoice_category_id = 0;
		globalCollection.globalModule.globalModuleData.userGloblData.invoice_type_name = "增值税发票";
		globalCollection.addressModule.userAddressData.invoice_type_name = "增值税发票";
	}
	
	saveInvoiceToAddress(globalCollection.addressModule.userAddressData);
    //setMainDisplay();
	$("#invoiceBlock").html(Js.Tools.template("invoiceDefault",globalCollection.addressModule.userAddressData));
      //setMainDisplay();
	  invoiceMouseEventInit();
  });

  $("#closeInvoice").unbind("click").click(function(){
    $("#invoiceBlock").html(Js.Tools.template("invoiceDefault",globalCollection.addressModule.userAddressData));
      //setMainDisplay();
	  invoiceMouseEventInit();
  });
 
}
//=================   发票信息模块初始化  end    ========================

//=================	  优惠劵模块  begin   ==========================

function saveInvoiceToAddress(addressData){
	if(addressData){
		for(var i=0;i<globalCollection.addressModule.addressData.length;i++){
			var addressItem = globalCollection.addressModule.addressData[i];
			if(addressItem){
				if(addressItem.ADDRESS_ID == addressData.ADDRESS_ID){
					if(globalCollection.addressModule.userAddressData.invoice_type_id==2){
						globalCollection.addressModule.addressData[i].INVOICE_CONTENT = globalCollection.addressModule.userAddressData.invoice_content;
						globalCollection.addressModule.addressData[i].invoice_content = globalCollection.addressModule.userAddressData.invoice_content;
						globalCollection.addressModule.addressData[i].invoice_category_id = globalCollection.addressModule.userAddressData.invoice_category_id;
						globalCollection.addressModule.addressData[i].INVOICE_CATEGORY_ID = globalCollection.addressModule.userAddressData.invoice_category_id;
						globalCollection.addressModule.addressData[i].invoice_type_name = globalCollection.addressModule.userAddressData.invoice_type_name;	
						globalCollection.addressModule.addressData[i].INVOICE_TYPE_NAME = globalCollection.addressModule.userAddressData.invoice_type_name;
						globalCollection.addressModule.addressData[i].INVOICE_TYPE_ID = globalCollection.addressModule.userAddressData.invoice_type_id;	
						globalCollection.addressModule.addressData[i].INVOICE_TYPE = globalCollection.addressModule.userAddressData.invoice_type_id;
						globalCollection.addressModule.addressData[i].invoice_type = globalCollection.addressModule.userAddressData.invoice_type_id;	
						
					}else{
						globalCollection.addressModule.addressData[i].INVOICE_CONTENT = globalCollection.addressModule.userAddressData.invoice_content;
						globalCollection.addressModule.addressData[i].invoice_content = globalCollection.addressModule.userAddressData.invoice_content;
						globalCollection.addressModule.addressData[i].INVOICE_CATEGORY_ID = globalCollection.addressModule.userAddressData.invoice_category_id;
						globalCollection.addressModule.addressData[i].invoice_category_id = globalCollection.addressModule.userAddressData.invoice_category_id;
						globalCollection.addressModule.addressData[i].INVOICE_TYPE_NAME = globalCollection.addressModule.userAddressData.invoice_type_name;
						globalCollection.addressModule.addressData[i].invoice_type_name = globalCollection.addressModule.userAddressData.invoice_type_name;
						globalCollection.addressModule.addressData[i].INVOICE_TYPE_ID = globalCollection.addressModule.userAddressData.invoice_type_id;
						globalCollection.addressModule.addressData[i].INVOICE_TYPE = globalCollection.addressModule.userAddressData.invoice_type_id;
						globalCollection.addressModule.addressData[i].invoice_type = globalCollection.addressModule.userAddressData.invoice_type_id;
					}
				}
			}
		}
		sychUserAddressData();
	}
}

function sychUserAddressData(){
	globalCollection.addressModule.userAddressData.INVOICE_TYPE_ID = globalCollection.addressModule.userAddressData.invoice_type_id;
	globalCollection.addressModule.userAddressData.INVOICE_CONTENT = globalCollection.addressModule.userAddressData.invoice_content;
	globalCollection.addressModule.userAddressData.INVOICE_TYPE_NAME = globalCollection.addressModule.userAddressData.invoice_type_name;
	globalCollection.addressModule.userAddressData.INVOICE_CATEGORY_ID = globalCollection.addressModule.userAddressData.invoice_category_id;
	globalCollection.addressModule.userAddressData.INVOICE_CATEGORY_NAME = globalCollection.addressModule.userAddressData.invoice_category_name;
}

function couponModularInit(){

	getPay();

	$("#conponCardConfirm").unbind("click").click(function(){
		var number = $('#couponCardNo').val();
		if(number){
			Js.sendData(sendLink.paym_https+"api/web/query/accBindToUser.jsonp","type=ACC-COUPON&get_back=true&card_no="+number+"&pids="+(globalCollection.globalModule.globalModuleData.orderData.cartAllPid.replace(/\^/g,",")),function (data){getBindData(data,1)});
		}
		else{
			alert("请输入正确的卡号或密码！");
		}
		$('#couponCardNo').val("");
	});
}


function getPay(){

  var coupids='';
	if(globalCollection.globalModule.globalModuleData.userGloblData.suitMainProduct.isSuiteData==1){//是套装
		coupids=globalCollection.globalModule.globalModuleData.userGloblData.suitMainProduct.suiteId;
	}else{
		if(globalCollection.globalModule.globalModuleData.orderData.cartAllPid){
			coupids=globalCollection.globalModule.globalModuleData.orderData.cartAllPid.replace(/\^/g,",");
		}
	}
  Js.sendData(sendLink.paym+"api/web/query/getPayMethodGroup.jsonp","pids="+coupids+"&pm_type=1&cash="+(globalCollection.globalModule.globalModuleData.orderData.finalOrderAmount)+"&loan="+(globalCollection.globalModule.globalModuleData.supportList.isSupportSSD?"1":"0")+(globalCollection.globalModule.globalModuleData.supportList.isSupportOffline?"&offline=1":"")+"&isLema="+(globalCollection.globalModule.globalModuleData.supportList.isLema?"1":"0"),function(data){
    var onlinePayData,ssdId,focusIndex=0;
    for(var i=0;i<data.result.length;i++){
      if(data.result[i].PM_NAME=='ONLINE'){//获取在线支付节点数据
        onlinePayData = data.result[i].list;
      }
    }
	if(onlinePayData){
		for(var i=0;i<onlinePayData.length;i++){
		  if(onlinePayData[i].PM_NAME=="LOAN"){
			ssdId = onlinePayData[i].list[0].list[0];
		  }
		}
	}

    if(!globalCollection.globalModule.globalModuleData.supportList.isSupportAlipay){
      focusIndex = 1;
    }
    
    var defaultPayId;
	if(onlinePayData && onlinePayData.length>0){
		defaultPayId = onlinePayData[focusIndex].list[0].list[0].PM_NAME;
	}
    if(globalCollection.addressModule.userAddressData.payment_method_name){
      data.onlineId = globalCollection.addressModule.userAddressData.payment_method_id;
      if(!globalCollection.globalModule.globalModuleData.supportList.isSupportSSD && (globalCollection.addressModule.userAddressData.payment_method_id && globalCollection.addressModule.userAddressData.payment_method_id.indexOf("LOAN")!=-1)){
        data.onlineId = defaultPayId;
      }
      else if(!globalCollection.globalModule.globalModuleData.supportList.isSupportAlipay && (globalCollection.addressModule.userAddressData.payment_method_id && globalCollection.addressModule.userAddressData.payment_method_id.indexOf("ALIPAY")!=-1)){
        data.onlineId = defaultPayId;
      }
    }
    else{
      data.onlineId = defaultPayId;
    }
    data.supportList = globalCollection.globalModule.globalModuleData.supportList;
    data.tabId=focusIndex;
    data.offlineTabId = 0;
    template.helper('getOnlineTabId', function(id) {//在模板中调用此方法，目的是获得当前支付银行所对应的tab标签
      data.tabId = id;
    });
    template.helper('getOfflineTabId', function(id) {
      data.offlineTabId = id;
    });
    template.helper('getLoanTabId', function(id) {
      data.loanId = id;
    });
    data.orderData = globalCollection.globalModule.globalModuleData.orderData;
	
	//-----优惠劵展示
    $("#couponBlock").empty().append(Js.Tools.template("coupon",data));
    if(data.loanId){
      $("#"+data.loanId).prop("checked",true);
      $(".coupon").hide();
      $(".loanStage").hide();
      $("."+data.loanId).parent().show();
      loanStageShow.call($("input[name='bankItem']:checked"));

    }
	//如果是线下支付，隐藏优惠劵
	if(/^(offline)/i.test(globalCollection.addressModule.userAddressData.payment_method_id)){
      $(".coupon").hide();
    }
   // setOnlineShowID(data.tabId);
    $(".onlineTab").click(function(){
     // setOnlineShowID(parseInt($(this).attr('data-info')));
    });
   // setOfflineShowID(data.offlineTabId);
    $(".offlineTab").click(function(){
     // setOfflineShowID(parseInt($(this).attr('data-info')));
    });
   // payEvent(ssdId);
   
   couponEvent();
  });

}

function showCoupon(){
	var cs = $("#useCoupon").attr("class");
	if(cs=="pack-up"){
		$("#useCoupon").attr("class","open-up");
	}else{
		$("#useCoupon").attr("class","pack-up");
	}
	if($("#couponShowDiv").is(":hidden")){
		$("#couponShowDiv").show();
	}else{
		$("#couponShowDiv").hide();
	}	
}

function couponEvent(){

	$(".coupon_tit").find("a").unbind("click").click(function(){	
		$(".coupon_tit").find("a").removeClass("cur");
		$(this).addClass("cur");
		var id = $(this).attr("id");
		if(id == "newBindCoupon"){
			$("#bindedCouponDiv").hide();
			$("#newCouponDiv").show();
			
		}else{
			$("#newCouponDiv").hide();
			$("#bindedCouponDiv").show();
		}
	});
	
	$("#useNewCouponNo").unbind("click").click(function (){
		if($("#couponNOInput").val()){
		
		 var coupids='';
		if(globalCollection.globalModule.globalModuleData.userGloblData.suitMainProduct.isSuiteData==1){//是套装
			coupids=globalCollection.globalModule.globalModuleData.userGloblData.suitMainProduct.suiteId;
		}else{
			coupids=globalCollection.globalModule.globalModuleData.orderData.cartAllPid.replace(/\^/g,",");
		}
		
			Js.sendData(sendLink.paym_https+"api/web/query/accBindToUser.jsonp","type=ACC-COUPON&get_back=true&card_no="+$("#couponNOInput").val()+"&pids="+coupids,function (data){getBindData(data,1)});
		}else{
			 alert("请输入正确的卡号！");
			 $("#couponNOInput").val("");
		}
	});


	$(".useThisCouponNo").unbind("click").click(function (){
		var useThisCouponNo = $(this).attr("coupon-data");
		if(useThisCouponNo){
			var data = useThisCouponNo.split('_');
			globalCollection.globalModule.globalModuleData.orderData.couponCash    = parseFloat(data[1]);
			globalCollection.globalModule.globalModuleData.orderData.couponNo      = data[0];
			globalCollection.globalModule.globalModuleData.orderData.couponPayType = "^ACC-COUPON_"+globalCollection.globalModule.globalModuleData.orderData.couponNo+"_0_"+(globalCollection.globalModule.globalModuleData.orderData.couponCash>globalCollection.globalModule.globalModuleData.orderData.cartAllPrice?globalCollection.globalModule.globalModuleData.orderData.cartAllPrice:globalCollection.globalModule.globalModuleData.orderData.couponCash)+"^";
			calcOrderAmount();
			showSelectedCouponInfo(data);
		}else{
			delete globalCollection.globalModule.globalModuleData.orderData.couponCash;
			delete globalCollection.globalModule.globalModuleData.orderData.couponNo;
			delete globalCollection.globalModule.globalModuleData.orderData.couponPayType;
		}	
	});	
}

//选中一个优惠劵
function showSelectedCouponInfo(couponInfo){
	$("#selectedCouponInfo").html('已选优惠券：'+couponInfo[0]+'  优惠额度：'+couponInfo[1]+'  [ <a href="javascript:void(0)" class="delCoupon"><span class="skyblue">取消</span></a> ]');
	$("#summaryCoupon").text(globalCollection.globalModule.globalModuleData.orderData.couponCash);
	$("#couponShowDiv").hide();
	delSelectedCoupon();//注册删除选中优惠劵的方法
	$("#useCoupon").attr("class","pack-up");
}

//删除选中的优惠劵
function delSelectedCoupon(){
	$(".delCoupon").unbind("click").click(function (){
		delete globalCollection.globalModule.globalModuleData.orderData.couponCash;
		delete globalCollection.globalModule.globalModuleData.orderData.couponNo;
		delete globalCollection.globalModule.globalModuleData.orderData.couponPayType;
		$("#selectedCouponInfo").html("");
		$("#summaryCoupon").text("0.00");
		calcOrderAmount();		
	});	
}

//---点击绑定并使用时，flag传1，否则flag传0，用户处理绑定并使用的一次操作
function getBindData(data,flag){
   if(data.status=="1"){
     var cardMess = data.result[0].list[0];
	 var font_status = data.result[0].list[0].FRONT_STATUS;//是否可以使用
	 if((font_status==1) && (globalCollection.globalModule.globalModuleData.orderData.cartAllPrice>=cardMess.USE_QUOTA)){//订单金额大于或者等于限制金额		
		var useCouponNo = cardMess.CARD_NO+'_'+cardMess.CASH+'_'+cardMess.USE_QUOTA;
		$("#coupon-inner").append("<tr>"+
		"<td align='center'>"+cardMess.CARD_NO+"</td>"+
		"<td align='center'>￥"+cardMess.CASH+"</td>"+
		"<td align='center'>"+cardMess.USE_END_DATE+"</td>"+
		"<td align='center'>"+cardMess.REMARK+"</td>"+  
		"<td align='center'><a class='useThisCouponNo' coupon-data='"+useCouponNo+"'><span class='red'>使用</span></a></td></tr>");
		
		couponEvent();
		//alert(data.message);
		
		if(flag == 1){			
			if(useCouponNo){
				var data = useCouponNo.split('_');
				globalCollection.globalModule.globalModuleData.orderData.couponCash    = parseFloat(data[1]);
				globalCollection.globalModule.globalModuleData.orderData.couponNo      = data[0];
				globalCollection.globalModule.globalModuleData.orderData.couponPayType = "^ACC-COUPON_"+globalCollection.globalModule.globalModuleData.orderData.couponNo+"_0_"+(globalCollection.globalModule.globalModuleData.orderData.couponCash>globalCollection.globalModule.globalModuleData.orderData.cartAllPrice?globalCollection.globalModule.globalModuleData.orderData.cartAllPrice:globalCollection.globalModule.globalModuleData.orderData.couponCash)+"^";
				calcOrderAmount();
				showSelectedCouponInfo(data);
			}else{
				delete globalCollection.globalModule.globalModuleData.orderData.couponCash;
				delete globalCollection.globalModule.globalModuleData.orderData.couponNo;
				delete globalCollection.globalModule.globalModuleData.orderData.couponPayType;
			}
		}
		
	 }else{
		alert("您的优惠券已绑定成功，目前商品不适用该券，您可在会员中心查看适用范围。");
	 } 
   }else if(data.status!="5"){
		alert(data.message);
   }
}
//=================	  优惠劵模块  end   ==========================

//============  订单提交 =============
function orderSubmit(){
	if($("#newAddress") && $("#newAddress").length>0 && !$("#newAddress").is(":hidden")){
		alert("请保存正在编辑的地址");
		window.location.hash = "newAddress";
		return;
	}
	if($("#closeInvoice") && $("#closeInvoice").length>0 && !$("#closeInvoice").is(":hidden")){
		alert("请保存正在编辑的发票信息");
		window.location.hash = "invoiceBlock";
		return;
	}
		
	if(!$("#agreeDiv").is(":hidden")){
		if(!($("#agreeCheckBox").attr("checked"))){
			alert("请先同意预购协议");
			return;
		}
	}
	
	

/**
	if(!document.getElementById("newAddress").display == "none"){	
		$("#orderSubmitError").html("请保存收货地址!");
		window.location.hash = "newAddress";
		return;
	}
**/
	//---默认为支付宝支付
		globalCollection.globalModule.globalModuleData.userGloblData.payment_method_name = "在线支付";
		globalCollection.globalModule.globalModuleData.userGloblData.payment_method_id = "ON-LEZF-ALIPAY-BALANCE-ALP";
		 globalCollection.globalModule.globalModuleData.userGloblData.shipping_method_id=1;
		  globalCollection.globalModule.globalModuleData.userGloblData.shipping_method_name="快递";
		  globalCollection.addressModule.userAddressData.shipping_method_id=1;
		  globalCollection.addressModule.userAddressData.shipping_method_name="快递";
		  
   if(!globalCollection.globalModule.globalModuleData.supportList.isSupportSSD && (globalCollection.globalModule.globalModuleData.userGloblData.payment_method_id.indexOf("LEZF-LOAN")!=-1 || globalCollection.globalModule.globalModuleData.userGloblData.payment_method_id.indexOf("LEZF-FANS")!=-1)){
        alert("此订单不能使用乐迷卡支付，请重新选择");
        return;
    }
    else{
	
      if(globalCollection.globalModule.globalModuleData.supportList.isSupportArriveTimeSelect && $("#bigGoods").is(":visible") && globalCollection.globalModule.globalModuleData.userGloblData.order_arrival_date == undefined){
        alert("请选择预约送货日期");
        return;
      }
	  
	   /*** 新商品系统的基础商品都是有现货的，所以预售的库存控制需要去掉
      if(!globalCollection.globalModule.globalModuleData.supportList.isComeFromCart && !globalCollection.globalModule.globalModuleData.supportList.isSupportGroup){
          if(param.y == globalCollection.globalModule.globalModuleData.orderData.mainPidStock){//如果为预售y=1，如果主商品有库存mainPidStock=1，所以两值相等则证明此预售订单商品有问题
            myConfirm({body:"您的订单地址与收货省份地址不一致，无法下单，请重新选择。",okText:"修改地址",cancelText:"更换省份"},function(flag){
              if(flag){
                location.hash="addressModule";
                window.location = window.location;               
              }else{
                history.back(-1);
              }
            });
            return;
          }
      }
	  **/
      if(globalCollection.globalModule.globalModuleData.orderData.productType!=1){
        globalCollection.globalModule.globalModuleData.userGloblData.home_installation=0;
      }
	  
	   globalCollection.globalModule.globalModuleData.userGloblData.shipping_method_id=1;

      if(globalCollection.globalModule.globalModuleData.userGloblData.pre_sale || globalCollection.globalModule.globalModuleData.supportList.isSupportGroup)
        globalCollection.globalModule.globalModuleData.userGloblData.pre_pay_percent = globalCollection.globalModule.globalModuleData.userGloblData.pre_pay_percent*10;
		
		//判断用户选择的地址是可达
		if(!globalCollection.addressModule.userAddressData.ADDRESS_ID){
			alert("请选择正确的送货地址");
			return;
		}

		globalCollection.globalModule.globalModuleData.userGloblData.address       = transLowcase(globalCollection.addressModule.userAddressData).address_detail;//由于地址接口和下单接口参数名不一样，所以要做映射
		globalCollection.globalModule.globalModuleData.userGloblData.zip_code   = transLowcase(globalCollection.addressModule.userAddressData).postcode;
		globalCollection.addressModule.userAddressData.INVOICE_TYPE_ID = globalCollection.addressModule.userAddressData.invoice_type_id = globalCollection.addressModule.userAddressData.invoice_type;	
		$.extend(globalCollection.globalModule.globalModuleData.userGloblData,transLowcase(globalCollection.addressModule.userAddressData));
	
	//---默认为支付宝支付
	if(globalCollection.globalModule.globalModuleData.supportList.isVIP){
		if($("#DKHOfflinePay").attr("checked")=="checked"){			
			globalCollection.globalModule.globalModuleData.userGloblData.payment_method_name = "转账汇款";
			globalCollection.globalModule.globalModuleData.userGloblData.payment_method_id = "OFFLINE-COMPANYTRANSFER";
		}else{
			globalCollection.globalModule.globalModuleData.userGloblData.payment_method_name = "在线支付";
			globalCollection.globalModule.globalModuleData.userGloblData.payment_method_id = "ON-LEZF-ALIPAY-BALANCE-ALP";
		}	
	}else{
		globalCollection.globalModule.globalModuleData.userGloblData.payment_method_name = "在线支付";
		globalCollection.globalModule.globalModuleData.userGloblData.payment_method_id = "ON-LEZF-ALIPAY-BALANCE-ALP";
	}

	  if(globalCollection.globalModule.globalModuleData.supportList.isVIP){
		if($("#DKHOfflinePay").attr("checked")=="checked"){
			globalCollection.globalModule.globalModuleData.userGloblData.paymentmethodid_paymentno_paymentpw_paymentamount="OFFLINE-COMPANYTRANSFER"+"_0_0_"+globalCollection.globalModule.globalModuleData.orderData.finalOrderAmount+(globalCollection.globalModule.globalModuleData.orderData.couponPayType||"");
		}else{
			globalCollection.globalModule.globalModuleData.userGloblData.paymentmethodid_paymentno_paymentpw_paymentamount="ON-LEZF-ALIPAY-BALANCE-ALP"+"_0_0_"+globalCollection.globalModule.globalModuleData.orderData.finalOrderAmount+(globalCollection.globalModule.globalModuleData.orderData.couponPayType||"");
		}
	  
	   
	  }else{
	   globalCollection.globalModule.globalModuleData.userGloblData.paymentmethodid_paymentno_paymentpw_paymentamount="ON-LEZF-ALIPAY-BALANCE-ALP"+"_0_0_"+globalCollection.globalModule.globalModuleData.orderData.finalOrderAmount+(globalCollection.globalModule.globalModuleData.orderData.couponPayType||"");
	  }
     
	if(globalCollection.globalModule.globalModuleData.supportList.isExtCard){
		globalCollection.globalModule.globalModuleData.userGloblData.payment_method_id = "ACC-DC_"+globalCollection.globalModule.globalModuleData.orderData.gi+"_0_0";
		globalCollection.globalModule.globalModuleData.userGloblData.payment_method_name = "礼品卡";
		globalCollection.globalModule.globalModuleData.userGloblData.is_invoice=1;	
	}
	globalCollection.globalModule.globalModuleData.userGloblData.invoice_cotent = 1;
	globalCollection.globalModule.globalModuleData.userGloblData.invoice_title = globalCollection.globalModule.globalModuleData.userGloblData.invoice_content;
	if((globalCollection.addressModule.userAddressData.invoice_type == 3)){
		globalCollection.globalModule.globalModuleData.userGloblData.invoice_type_name = "增值税发票";
		globalCollection.globalModule.globalModuleData.userGloblData.invoice_type_id = 3;
		globalCollection.globalModule.globalModuleData.userGloblData.invoice_category_name = "";
		globalCollection.globalModule.globalModuleData.userGloblData.invoice_content = "";
		globalCollection.globalModule.globalModuleData.userGloblData.invoice_title = ""; 
		globalCollection.globalModule.globalModuleData.userGloblData.invoice_type = 3;	
		globalCollection.globalModule.globalModuleData.userGloblData.invoice_cotent = 0;
		globalCollection.globalModule.globalModuleData.userGloblData.invoice_category_id = 0;
	}
	if(globalCollection.addressModule.userAddressData.invoice_type == 2){
		globalCollection.globalModule.globalModuleData.userGloblData.invoice_cotent = 1;
		globalCollection.globalModule.globalModuleData.userGloblData.invoice_category_id = 1;
		globalCollection.globalModule.globalModuleData.userGloblData.invoice_type = 2;
		globalCollection.globalModule.globalModuleData.userGloblData.invoice_type_id = 2;		
		globalCollection.globalModule.globalModuleData.userGloblData.invoice_type_name = "普通发票";
	}
	globalCollection.addressModule.userAddressData.INVOICE_TYPE_ID = globalCollection.addressModule.userAddressData.invoice_type_id;
	globalCollection.addressModule.userAddressData.INVOICE_TYPE = globalCollection.addressModule.userAddressData.invoice_type;
	globalCollection.addressModule.userAddressData.INVOICE_CONTENT =globalCollection.addressModule.userAddressData.invoice_content;
	globalCollection.addressModule.userAddressData.INVOICE_TYPE_NAME =globalCollection.addressModule.userAddressData.invoice_type_name;
	globalCollection.addressModule.userAddressData.INVOICE_CATEGORY_NAME =globalCollection.addressModule.userAddressData.invoice_category_name;
	globalCollection.addressModule.userAddressData.INVOICE_CATEGORY_ID =globalCollection.addressModule.userAddressData.invoice_category_id;
	
	globalCollection.addressModule.userAddressData.TI = window.getCookie("COOKIE_SESSION_ID");
    var dataPara = Js.Tools.jsonToString(globalCollection.globalModule.globalModuleData.userGloblData,true);
    var dataAddr = Js.Tools.jsonToString(globalCollection.addressModule.userAddressData,true);
	$("#orderSubmitSpan").text("订单正在提交...");	
	Js.sendData(sendLink.ordr_https+"api/web/query/generateOrder.jsonp",dataPara,function(data){
		  if(data.status=="1"){
			if(globalCollection.addressModule.userAddressData.address_id){//更新
			  Js.sendData(sendLink.addr+"api/web/update/updUserAddress.jsonp",dataAddr);
			}else if(globalCollection.addressModule.userAddressData.is_save){//新增				
				Js.sendData(sendLink.addr+"api/web/insert/addUserAddress.jsonp",dataAddr);
			}
		
			var expired_hour="";//过期时间
			if(data.result[0].EXPIRED_HOUR){
				expired_hour=data.result[0].EXPIRED_HOUR+"&";
			}
			var murl=Js.Tools.urlCode(expired_hour+"amount="+data.result[0].ON_AMOUNT+
													"&oId="+data.result[0].order_id+
													"&pId="+data.result[0].PAYMENT_METHOD_ID+
													"&pInfo="+globalCollection.globalModule.globalModuleData.userGloblData.paymentmethodid_paymentno_paymentpw_paymentamount+
													"&pName="+globalCollection.globalModule.globalModuleData.userGloblData.payment_method_name+
													(globalCollection.globalModule.globalModuleData.userGloblData.pre_sale?"&stage=1":"")+
													(globalCollection.globalModule.globalModuleData.orderData.loanFee?"&loanFee="+globalCollection.globalModule.globalModuleData.orderData.loanFee:"")+
													(globalCollection.globalModule.globalModuleData.supportList.isSupportGroup?"&t=1&d="+(globalCollection.addressModule.userAddressData.province_name+globalCollection.addressModule.userAddressData.city_name):"")+"&pids="+(globalCollection.globalModule.globalModuleData.orderData.cartAllPid.replace(/\^/g,","))+"&from=1");
			var nextURL = _hrefPath+"/paymentInfo.html?"+murl;
			if(globalCollection.globalModule.globalModuleData.supportList.isComeFromCart){
			  Js.sendData(sendLink.cart + "api/web/delete/clearCart.jsonp","SELLER_ID="+globalCollection.globalModule.globalModuleData.userGloblData.seller_id,function(){
				window.location.href=nextURL;
			  });
			}
			else{
			  setTimeout(function(){
				window.location.href=nextURL;
			  },500);
			}
		  }else if(data.status=="5"){
			if(globalCollection.globalModule.globalModuleData.userGloblData.pre_sale || globalCollection.globalModule.globalModuleData.supportList.isSupportGroup)
			  globalCollection.globalModule.globalModuleData.userGloblData.pre_pay_percent = globalCollection.globalModule.globalModuleData.userGloblData.pre_pay_percent/10;
			
			$("#orderSubmit").find("span").text("提交订单");
		  } else{
			window.location.href=_hrefPath+"/orderFail.html?m="+data.message;
		  }
		});
	}
}