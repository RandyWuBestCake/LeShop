/**
用户中心--地址操作
1、登陆判断
2、获取url参数
3、获得用户地址信息
4、地址数据展示
5、鼠标事件注册
	5.1全局事件注册
	5.2新增html标签的事件注册，例如：修改地址是动态输出的html，这需要重新注册事件
6、提交数据校验

原则：将可以全站通用的功能实现模块化，尽量实现css、鼠标事件、数据的统一封装及与其余功能模块的解耦
**/

$(function(){
  //Js.login.hasLogin(function(){
	init();
  //});
})
var globalParam = {
		pids:"",
		addressDataList:{}
}
function init(){
	//==1、获得商品参数，用于后边商品是否可达校验
	var param = Js.Tools.stringToJson(location.search.slice(1));
	if(param.pids){
		globalParam.pids = param.pids;
	}
	//==2、获得用户地址信息，包括一键购地址信息等
	initAddressData();
}
function initAddressData(){
	//--首先清空用户地址数据
	globalParam.addressDataList = [];
	$("#loading").show();
	Js.sendData(sendLink.addr+"api/web/query/userAddress.jsonp?sort=desc&is_default_first=1",'',function(addrDataList){
	 $("#loading").hide();
		if(addrDataList.status =='1' || addrDataList.status =='2'){
			//--保存用户地址数据，方便后续操作
			globalParam.addressDataList.result = addrDataList.result;
			$("#addressCount").empty().append(Js.Tools.template('addressCountTemplate', addrDataList)).show();
			addrDataList.hasYjg = false;
			if(addrDataList.result.length > 0){
				if(addrDataList.result[0].TYPE == "1"){
					addrDataList.hasYjg = true;
				}
			}
			$("#userAddressList").empty().append(Js.Tools.template('userAddressListTemplate', addrDataList));
        	$("#list_page").empty().append(Js.Tools.template('list_page_template', addrDataList));
			initMouseEvent();
		}
	});	
}
function initMouseEvent(){
	$(".newAddressButton").unbind("click").click(function(){
		//--新增、修改地址通用模块			
		hideAndShowControl('',true,false,0);
	});
	
	//--删除地址
	$(".delete").unbind("click").click(function(){
		var addrId = $(this).attr("data-addrId");
		myConfirm("是否要删除此地址？",function(isOk){
			if(isOk){
			  Js.sendData(sendLink.addr+"api/web/delete/delUserAddress.jsonp",{showLoad:true,param:'address_id='+addrId+"&is_asyn=0"},function (data){				
				if(data.status ==1){
					$("#addrInfo_"+addrId).slideUp("normal");
					$("#addrInfo_"+addrId).remove();
					if(addrId){
						if(globalParam.addressDataList){
							for(var i=0;i<globalParam.addressDataList.result.length;i++){
								var addrItem = globalParam.addressDataList.result[i];
								if(addrId == addrItem.ADDRESS_ID){
									globalParam.addressDataList.result.splice(i,1);
								}
							}
						}
						$("#addressCount").empty().append(Js.Tools.template('addressCountTemplate', globalParam.addressDataList)).show();
						initMouseEvent();
					}
				}
			  });
			}
		});
	});
	
	//--设置为常用地址
	$(".user_szcydz").unbind("click").click(function(){
		var addrId = $(this).attr("data-addrId");
		if(addrId){
			Js.sendData(sendLink.addr+"api/web/update/updUserAddressDefault.jsonp",'address_id='+addrId+"&is_asyn=0",function (data){
				if(data.status ==1){
					location.reload();
				}		
			});	
		}
	});
}

function hideNewAddress(isNewAddr,addrId){
	if(isNewAddr!=1){
		$(".showEditAddrInfo").slideUp("normal",function (){$("#addrInfo_"+addrId).slideDown("normal")});
		//--清空地址模板数据,因为地址的input框的id都是一样的
		$("#editAddress_"+addrId).empty();
		$("#newAddress").empty();
	}else{
		$(".showEditAddrInfo").slideUp("normal");
		//--清空地址模板数据
		$("#newAddress").empty();
	}
	
}

function hideAndShowControl(addrId,isNewAddr,upToYjg,checkDefault){
	var isEditing = false;
	var editingAddrId = "";
	$.each($(".showEditAddrInfo"),function(i,v){
		if(!$(v).is(":hidden")){
			isEditing = true;
			editingAddrId = $(v).attr("id").substring($(v).attr("id").indexOf("_")+1,$(v).attr("id").length);
		}
	});	
	var isEditingUpYjg = false;
	var editingUpYjgId = "";
	$.each($(".upToYjg_div"),function(i,v){
		if(!$(v).is(":hidden")){
			isEditingUpYjg = true;
			editingUpYjgId = $(v).attr("id").substring($(v).attr("id").indexOf("_")+1,$(v).attr("id").length);
		}
	});	
	
	if(!isEditing && !isEditingUpYjg){
		if(isNewAddr){
			var addrData = {type:0,isNewAddr:1};
			initEditAddress(addrData,$("#newAddress"));
		}else if(upToYjg){
			$(".upToYjg_div").hide();
			$(".addrInfo_li").show();
			$("#addrInfo_"+addrId).slideUp("normal");
			$("#upToYjg_"+addrId).slideDown("normal")
		}else{
			$(".showEditAddrInfo").slideUp("normal");
			$("#editAddress_"+editingAddrId).empty();	
			$("#addrInfo_"+addrId).slideUp("normal",function (){$("#editAddress_"+addrId).slideDown("normal")});	
			var addrData;
			if(addrId){
				for(var i=0;i<globalParam.addressDataList.result.length;i++){
					var addrItem = globalParam.addressDataList.result[i];
					if(addrId == addrItem.ADDRESS_ID){
						addrData = addrItem;
						addrData.isNewAddr = 0;
						addrData.checkDefault = checkDefault;
					}
				}
			}
			initEditAddress(addrData,$("#editAddress_"+addrId));
		}		
	}else if(isEditing){
		if(editingAddrId != "newAddress"){
			window.location.hash = $("#editAddress_"+editingAddrId).attr("id");
			$(".editingShow").show();
			var timer = setTimeout(function(){$(".editingShow").hide();}, 5000);
		}else{
			window.location.hash = "newAddress";
		}
	}else if(isEditingUpYjg){
		if(editingUpYjgId){
			window.location.hash = $("#upToYjg_"+editingUpYjgId).attr("id");
			$(".editingYjgShow").show();
			var timer = setTimeout(function(){$(".editingYjgShow").hide();}, 5000);
		}else{
			window.location.hash = "newAddress";
		}
	}

}

function editUserAddrInfo(addrId,checkDefault){
	hideAndShowControl(addrId,false,false,checkDefault);	
}

//==新增、修改地址统一模块
function initEditAddress(addrData,appender){
	addrData = addrData||{};
	$(appender).empty().append(Js.Tools.template('editAddressTemplate', addrData));
	$(appender).slideDown("normal");
	Js.sendData(sendLink.addr+"api/web/query/childArea.jsonp","isarrive=0&parent_id=0",function(data){
    data.pId = addrData.PROVINCE_ID||-22;
    $("#province").empty().append("<option value='-22'>请选择</option>").append(Js.Tools.template('addrRegion', data)).
    unbind("change").
    change(function(){
            if($(this).val()==-22){
                $("#provinceMess").html("");
            }else{			
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
								if(globalParam.pids){
									getAddrState({d:selectedDistrict.val(),p:addrData.province_id})
								}
								if($("#district option:selected").attr("post")){
									$("#useThisPostDiv").show();
									$("#referPostCode").empty().html("参考邮编为"+$("#district option:selected").attr("post"));
								}
                            });
                            if(districtData.result.length==1){
								addrData.DISTRICT_ID = districtData.result[0].AREA_ID;
								if(globalParam.pids){
									getAddrState({d:districtData.result[0].AREA_ID,p:addrData.province_id});
								}
                            }
                            if(addrData.DISTRICT_ID){
                              $("#district").trigger("change");
							}
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
  addrData.is_default     = 0;
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
		$.each($(".user_edit_addr").find(".message").children(),function(i,v){		  
			if($(v).attr("style").indexOf("inline") >-1){
				hasError = true;
			}
		});
		  
		  if($("#setDefaultAddr input").is(":checked")){
			addrData.is_default     = 1;
		  }else{
			 addrData.is_default     = 0;
		  }  
		  
		  if(!hasError){
				if(addrData.address_id){//更新
				    var editAddId = addrData.address_id;
				    Js.sendData(sendLink.addr+"api/web/update/updUserAddress.jsonp",{showLoad:true,param:Js.Tools.jsonToString(addrData,true)},function(data){
						if(data.status==1){
							location.reload();
						}else{
							alert(data.message);
						}
				    });
				}else {//新增
				   addrData.is_asyn=0;
				   addrData.TI = window.getCookie("COOKIE_SESSION_ID");
				   Js.sendData(sendLink.addr+"api/web/insert/addUserAddress.jsonp",{showLoad:true,param:Js.Tools.jsonToString(addrData,true)},function(data){
				       if(data.status==1){
							location.reload();
						}else{
							alert(data.message);
						}
				  });
				}
			}else{
				window.location.hash = $(appender).attr("id");
			}
        }
      }
  });	
}
function showSelectPostCode(){
	if($("#district option:selected").attr("post")){
		$("#post").val($("#district option:selected").attr("post"));
      	$("#postEmptyError").hide();
      	$("#postError").hide();
      	$("#post")[0].style.borderColor = "";
	}
}

function upToYjgAddr(addrId){
	hideAndShowControl(addrId,false,true,0);
}

function saveToYjg(addrId){	
	var invoiceType = $("#saveToYjg"+addrId).attr("data-invoiceType");
	var addrId = $("#saveToYjg"+addrId).attr("data-addrId");
	var invoiceContent = $("#detailInvoice"+addrId).val();

	if(!invoiceContent){
		$(".detailInvoiceError").show();
	}else{
		for(var i=0;i<globalParam.addressDataList.result.length;i++){
			var addrItem = globalParam.addressDataList.result[i];
			if(addrId == addrItem.ADDRESS_ID){
				addrItem = transLowcase(addrItem);
				addrItem.is_asyn=0;
				addrItem.shipping_method_id=1;
				addrItem.shipping_option = 1;
				addrItem.invoice_category_id  = 1;
				if(invoiceType == 3){
					addrItem.invoice_type_name = "增值税发票";
					addrItem.invoice_content = "";
				}
				if(invoiceType == 2){
					addrItem.invoice_type_name = "普通发票";
					addrItem.invoice_content = invoiceContent;
				}						
				addrItem.invoice_type_id = invoiceType;
				addrItem.type = 1;
				addrItem.payment_method_id = "ON-LEZF-ALIPAY-BALANCE-ALP";
				addrItem.shipping_method_id = 1;
				addrItem.shipping_method_name = "快递";
				addrItem.shipping_time_id = 1;	
				if(addrItem.address_name == "" || addrItem.address_name == "nickname"){
					addrItem.address_name = addrItem.receiver+"—"+addrItem.district_name;
				}
				addrItem = Js.Tools.jsonToString(addrItem,true);
				Js.sendData(sendLink.addr+"api/web/update/updUserAddress.jsonp",{showLoad:true,param:addrItem},function(data){
					if(data.status==1){
						location.reload();
					}else{
						alert(data.message);
					}
				});						
			}
		}
	}		
}

function showBlurValue(addrId,userInvocieContent){
	if($("#detailInvoice"+addrId).val() == ''){
		if(userInvocieContent && "null"!=userInvocieContent && "undefined"!=userInvocieContent){
			$("#detailInvoice"+addrId).val(userInvocieContent);
		}else{
			$("#detailInvoice"+addrId).val("个人");
		}
		
	}
}

function closeUpToYjg(addrId){
	$("#upToYjg_"+addrId).slideUp("normal");
	$("#addrInfo_"+addrId).slideDown("normal");
}
function showInvoiceInfo(invoiceType,addrId){
	if(invoiceType==2){
		$("#upToYjg_"+addrId+" .curInvoceType2").addClass("cur");
		$("#upToYjg_"+addrId+" .curInvoceType3").removeClass("cur");
		$("#upToYjg_"+addrId+" .invoice_type_2").show();
		$("#upToYjg_"+addrId+" .invoice_type_3").hide();		
	}
	if(invoiceType ==3){
		$("#upToYjg_"+addrId+" .curInvoceType3").addClass("cur");
		$("#upToYjg_"+addrId+" .curInvoceType2").removeClass("cur");
		$("#upToYjg_"+addrId+" .invoice_type_3").show();
		$("#upToYjg_"+addrId+" .invoice_type_2").hide();
	}
	$("#saveToYjg"+addrId).attr("data-invoiceType",invoiceType);
}

function getAddrState(areaData){
  if(areaData.p && areaData.d && areaData.d!=-22)
      //---add by wangjianmeng  地址可达判断，如果是存在套装，则只传套装id 否则传所有商品id begin
	var pids = "";		
	pids = globalParam.pids;
		//---add by wangjianmeng 地址可达判断 end 	
    Js.sendData(sendLink.prod+"api/web/query/getArrivalInfo.jsonp","pids="+pids+"&arrivalId="+areaData.p+"&districtId="+areaData.d+"&groupId="+(globalCollection.globalModule.globalModuleData.userGloblData.groupid ||0),getArriveData);	
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

function transLowcase(data){
  var lowcaseData={};
  for(var key in data){
    lowcaseData[key.toLowerCase()] = data[key];
  }
  return lowcaseData;
}
function transUpcase(data){
  var lowcaseData={};
  for(var key in data){
    lowcaseData[key.toUpperCase()] = data[key];
  }
  return lowcaseData;
}

//增加查看更多显示方式
function seeMore () {  
  var $displayAddress = $(".display-address"), size = $displayAddress.size(), count = 0;
  
  $.each($displayAddress, function (index, obj) {
    var $elem = $(obj);
    
    if ($elem.hasClass("hidden")) {
    	$elem.removeClass("hidden");
      
      	count++;
    }
    
    if (index === size - 1) {
    	$("#_page").hide();
    }
    
    if (count > 9) return false;
  });
}

function removeUnderline (_this) {
	$(_this).removeClass("underline");
}

function addUnderline (_this) {
	$(_this).addClass("underline");
}

function showDelText (_this) {
	$(_this).addClass("hover");
}

function showdelPic (_this) {
	$(_this).removeClass("hover");
}
