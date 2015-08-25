/**
  Copyright (c) 2012-09-26,  
  All rights reserved.
  @author 
  @see basic js grammer
  @version 1.0 
 */
 
 
var cookiename="productcompare";

var sort = "";
var direction = "";
function sortBy(sortField) {
	
	direction = document.getElementById("pageInfo.sorterDirection").value;
	sort = document.getElementById("pageInfo.sorterName").value = sortField;
	  
	if (sort == sortField) {
		if (direction == "ASC" || direction == "") {
			direction = "DESC";
		} else {
			direction = "ASC";
		}
	} else {
		direction = "ASC";
		sort = sortField;
	}
	document.getElementById("pageInfo.sorterName").value = sortField;
	document.getElementById("pageInfo.sorterDirection").value = direction;
	document.formSearch.submit();
}

// check required field 
function checkValue(fieldStr)
{
	var checkOk=true;
  if (fieldStr.length==0)
  return   checkOk;
  
        var arrayFieldName = fieldStr.split(',');
        var i;		
        for (i=0; i<arrayFieldName.length; i++)
        {
            var obj = document.getElementById(arrayFieldName[i]);
            if (obj.value == null || obj.value.trim() == "")
            {
            	var labelObj = document.getElementById(arrayFieldName[i] + "Label");
               	var msg = "\u8bf7\u8f93\u5165\u7ea2\u8272\u7684\u5fc5\u987b\u586b\u5199\u9879"
               	if(labelObj != null)
               		msg+="\n" + labelObj.innerText;
               	//alert(msg);
               	parent.$.messager.alert('\u53cb\u60c5\u63d0\u793a', msg, 'info');
                obj.focus();
				checkOk=false;
				break;
                //return false;
            }
        }
  
	return checkOk;
}

function selectAll(flag) {
	if(formSearch.orderId==undefined){
		return;
	}else{
		if(flag=="true"){
			formSearch.chkall.checked=true;
		}
	  	formSearch.orderId.checked= formSearch.chkall.checked
		for (var i = 0; i < formSearch.orderId.length; i++) {
			//alert("-----" + formSearch.orderId[i].disabled);
			if(formSearch.orderId[i].disabled == false){
				formSearch.orderId[i].checked = formSearch.chkall.checked;
			}
		}
	}
}
function selectCancel() {
	if(formSearch.orderId==undefined){
		return;
	}
 	formSearch.chkall.checked=false;
  	formSearch.orderId.checked=false;
	for (var i = 0; i < formSearch.orderId.length; i++) {
		formSearch.orderId[i].checked = false;
	}
}
function deleteChecked(tableName) {
	var idString = "";
	if (formSearch.orderId.length==undefined)
	{
	if (formSearch.orderId.checked == true)
	idString = formSearch.orderId.value
	}
	else{
		for (var i = 0; i < formSearch.orderId.length; i++) {
			if (formSearch.orderId[i].checked == true) {
				idString = idString + "," + formSearch.orderId[i].value;
			}
		}
	}
	if (idString.length == 0) {
		//alert("\u8bf7\u5148\u9009\u62e9\u8981\u5220\u9664\u7684\u8bb0\u5f55\uff01");
		parent.$.messager.alert('\u53cb\u60c5\u63d0\u793a', '\u8bf7\u5148\u9009\u62e9\u8981\u5220\u9664\u7684\u8bb0\u5f55\uff01', 'info');
		return;
	}
	//�޸���ʾ����
	//if (confirm("\u786e\u5b9e\u8981\u5220\u9664\u8fd9\u4e9b\u8bb0\u5f55\u5417\uff1f")) {
		//document.formSearch.action = tableName+"RemoveAll.action?orderIndexs=" + idString;
		//document.formSearch.submit();
	//}
	parent.$.messager.confirm('\u53cb\u60c5\u63d0\u793a', '\u786e\u5b9e\u8981\u5220\u9664\u8fd9\u4e9b\u8bb0\u5f55\u5417\uff1f', function (r){
	if (r) {
		if(idString.slice(0, 1) == ","){
			idString = idString.substring(1);
		}
		document.formSearch.action = tableName+"RemoveAll.action?orderIndexs=" + idString;
		document.formSearch.submit();
	}
	})
}
function sortInit(){
	if(document.getElementById("pageInfo.sorterName") != null){
	//if($("pageInfo.sorterName")!=null){
		sort = document.getElementById("pageInfo.sorterName").value;
		direction = document.getElementById("pageInfo.sorterDirection").value;
	}
}
function formSearchSubmit(){
	var currentPage = $("#currentPage");
	var pageInfo = $("#pageInfo\\.currentPage");
	if(currentPage){
		currentPage.val(1);
	}
	if(pageInfo){
		pageInfo.val(1);	
	}
	$("#formSearch").submit();
}
function pageSubmit(currentPageName,action,formName,targetPage){
	//$(currentPageName+".currentPage").value = targetPage; // prototype
	//document.getElementById(currentPageName+".currentPage").value = targetPage;
	//document.getElementById("currentPage").value = targetPage;
	//debugger;
	//$(formName).action = action; // prototype
	//document.getElementById(formName).action = action;
	 
	//document.getElementById(formName).submit();
	//document.location.href="list"+oldfilter+"_p"+targetPage+".html";
	var oldfilter = $("#filter").val();
	if(oldfilter =="_null"){
		window.location.href="list"+"_p"+targetPage+".html";
	}else{
		window.location.href="list"+oldfilter+"_p"+targetPage+".html";
	}
	
}
function checkThenSubmit(currentPageName,action,formName,targetPage,totalPage){
	var pageNum = targetPage;
	var re = /^[1-9]\d*$/;
	if(!re.test(pageNum)){
		parent.$.messager.alert('\u53cb\u60c5\u63d0\u793a', '请输入正确页数！', 'info');
		return false;
	}
	if(parseInt(targetPage)>parseInt(totalPage)){
		pageNum = totalPage;
	}
	if(parseInt(targetPage)<=0){
		pageNum = "1";
	}
	pageSubmit(currentPageName,action,formName,pageNum);
}
window.onload = sortInit;

function pageInfo(){
	var obj = "";
	$("input[name^='pageInfo']").map(function(){
		obj = obj + $(this).attr('name') + "=" + $j(this).val()+"&";
	});
	obj = obj.substring(0,obj.length-1);
	obj = encodeURI(obj);
	obj = encodeURI(obj);
	return obj;
}

function getbrowse(){ //判断当前浏览器是何种浏览器
	var str="";
	// 包含「Opera」文字列
	Agent=navigator.userAgent;
	if(Agent.indexOf("Opera") != -1) {
	str='Opera';
	}
	// 包含「MSIE」文字列
	else if(Agent.indexOf("MSIE") != -1) {
	str='MSIE';
	}
	// 包含「Firefox」文字列
	else if(Agent.indexOf("Firefox") != -1) {
		str='Firefox';
	}
	// 包含「Netscape」文字列
	else if(Agent.indexOf("Netscape") != -1) {
		str='Netscape';
	}
	// 包含「Safari」文字列
	else if(Agent.indexOf("Safari") != -1) {
		str='Safari';
	}else{  
	}  
	return str;
}

// 文件上传时，验证本地是否存在该文件（pathStr:文件路径）
function uploadFileValidatorNO(pathStr){
	//return true;
	var flag = false;
	var apths = pathStr.split("\\");
	var filespec = apths[0];
	for(var j = 1; j < apths.length; j++){
		filespec = filespec + "/" + apths[j];
	}
	var fso,s = filespec;   // filespec="C:/path/myfile.txt"
	fso=new ActiveXObject("Scripting.FileSystemObject");
	if(fso.FileExists(filespec)){
		//s+=" exists.";
		flag = true;
	}else{
		//s+=" doesn't exist.";alert(s);
		flag = false;		 
	}
	return flag;
}
// ajax验证上传的文件是否存在
function uploadFileValidator(id){
	return true;
	var flag = false;
	var docObj = document.getElementById(id);
	var pathStr = '';
	if(docObj.files && docObj.files[0]){ 
		//alert(docObj.files + "---" + docObj.value);
		pathStr = window.URL.createObjectURL(docObj.files[0]);
		return true;  
	}else{ 
		//IE下，使用滤镜 
		docObj.select(); 
		pathStr = document.selection.createRange().text;  
	}
	$j.ajax({
		async: false,
		url: ctx+"/user/checkFileExist.action",
		type: "post", 
		data: {"fileExist":pathStr},
		dataType: 'json',
		success: function(data){
			if(data == "succ"){
				flag = true;
			}else{
				flag = false;
			}
		}
	});
	return flag;
}


//去掉字符串头尾空格   
function trimStr(str) {   
    return str.replace(/(^\s*)|(\s*$)/g, "");   
}

function xsjiage(num){
	$("#"+num).css("display","block");
}
function gbjiage(num1){
	$("#"+num1).css("display","none");
}

//产品详细
function productinfo1(pid){
	window.open("productinfo_"+pid+".html");
	var userid = -1;
	var tuid = getCookie("COOKIE_USER_ID");
	if(tuid != null && tuid != undefined && tuid != ""){
		userid = t;
	}
	$.ajax({
   		url: "saveProductBrowseLog.action",
   		type: "post",
   		data: {"pid":pid,"userid":userid}, 
   		dataType: 'json',
   		error: function (result) {
           },
   		success: function(result){
   			if(result == "succ"){
   				//已添加浏览记录
   			}
   		}
   			
   	});
}

//产品详细
function productinfo2(pid){
	var userid = -1;
	var tuid = getCookie("COOKIE_USER_ID");
	if(tuid != null && tuid != undefined && tuid != ""){
		userid = t;
	}
	$.ajax({
   		url: "saveProductBrowseLog.action",
   		type: "post",
   		data: {"pid":pid,"userid":userid}, 
   		dataType: 'json',
   		error: function (result) {
           },
   		success: function(result){
   			if(result == "succ"){
   				//已添加浏览记录
   			}
   		}
   			
   	});
}

//加入对比栏
function intocomp(pid){
	$("#duibilan").fadeIn("slow");
	var oldids = getCookie('pids');
	var oldimgs = getCookie('pimgs');
	var oldprices = getCookie('pprices');
	var oldnames = getCookie('pnames');
	
	if(oldids ==null || oldids == undefined || oldids ==""){
		
		setCookie('pids',","+pid,0);
		setCookie('pimgs',","+$("#img"+pid).attr("src"),0);
		setCookie('pprices',","+escape($("#allprice"+pid).val()),0);
		setCookie('pnames',","+escape($("#pname"+pid).html()),0);
	}else{
		
		var ids = new Array();
		ids = oldids.split(",");
		for(var i=1;i<ids.length;i++){
			if(ids[i]==pid){
				clearone(pid);
				return;
			}
		}
		
		if(ids.length > 4){
			//alert("对比栏已满，您可以删除不需要的栏内商品再继续添加哦！");
			//$("#dbtishi").fadeIn("slow");
			$("#dbtishi").css("visibility","visible");
			initCompare();
			setTimeout("dbtishiyc()",2000);
			return;
		}
		
		setCookie('pids',oldids+","+pid,0);
		setCookie('pimgs',oldimgs+","+$("#img"+pid).attr("src"),0);
		setCookie('pprices',oldprices+","+escape($("#allprice"+pid).val()),0);
		setCookie('pnames',oldnames+","+escape($("#pname"+pid).html()),0);
	}
	
	initCompare();
}

function dbtishiyc(){
	//$("#dbtishi").fadeOut("slow");
	$("#dbtishi").css("visibility","hidden");
}

//清空对比栏
function clearprocom(){
	delCookie('pids');
	delCookie('pimgs');
	delCookie('pimgs');
	delCookie('pnames');
	var nr ="";
	for(var i=1;i<5;i++){
		nr += "<div class='jixu'><p>"+i+"</p>您还可以继续添加产品</div>";
	}
	var nr1 = "<div class='dianjidb'><img src='images/duibib.jpg' width='80' height='22' /><br /><a class='lanshe' href='javascript:clearprocom();'>清空对比栏</a></div>";
	$("#bb1").html(nr+nr1);
	initCompare();
}

//清空一款产品
function clearone(pid){
	var oldids = getCookie('pids');
	var oldimgs = getCookie('pimgs');
	var oldprices = getCookie('pprices');
	var oldnames = getCookie('pnames');
	var newids;
	var newimgs;
	var newprices;
	var newnames;
	if(oldids !=null && oldids != undefined && oldids !=""){
		var ids = oldids.split(",");
		var imgs = oldimgs.split(",");
		var prices = oldprices.split(",");
		var names = oldnames.split(",");
		for(var i=1;i<ids.length;i++){
			if(ids[i]!=pid){
				newids += ","+ids[i];
				newimgs += ","+imgs[i];
				newprices += ","+prices[i];
				newnames += ","+names[i];
			}
		}
	}
	setCookie('pids',newids,0);
	setCookie('pimgs',newimgs,0);
	setCookie('pprices',newprices,0);
	setCookie('pnames',newnames,0);
	initCompare();
}

//初始化对比栏
function initCompare(){
	
	var objs = document.getElementsByName("duibiname");
	if(objs!=null && objs!=undefined && objs.length>0){
		for(var i=0;i<objs.length;i++){
			objs[i].className="dbanniu";
		}
	}
	var objs1 = document.getElementsByName("duibinamea");
	if(objs1!=null && objs1!=undefined && objs1.length>0){
		for(var i=0;i<objs1.length;i++){
			objs1[i].className="dbanniu";
		}
	}
	var objs2 = document.getElementsByName("duibinameb");
	if(objs2!=null && objs2!=undefined && objs2.length>0){
		for(var i=0;i<objs2.length;i++){
			objs2[i].className="dbanniu";
		}
	}
	var oldids = getCookie('pids');
	var oldimgs = getCookie('pimgs');
	var oldprices = getCookie('pprices');
	var oldnames = getCookie('pnames');
	var nr="";
	var nr1 = "";
	if(oldids !=null && oldids != undefined && oldids!="undefined" && oldids !=""){
		$("#duibilan").fadeIn("slow");
		var ids = oldids.split(",");
		var imgs = oldimgs.split(",");
		var prices = oldprices.split(",");
		var names = oldnames.split(",");
		var i;
		for(i=1;i<ids.length;i++){
			var tempname = unescape(names[i]).replace("<h1>","").replace("<H1>","").replace("<h2>","").replace("<H2>","").replace("<h3>","").replace("<H3>","").replace("<h4>","").replace("<H4>","").replace("<h5>","").replace("<H5>","").replace("</h1>","").replace("</H1>","").replace("</h2>","").replace("</H2>","").replace("</h3>","").replace("</H3>","").replace("</h4>","").replace("</H4>","").replace("</h5>","").replace("</H5>","")
			nr += "<dl><dt><a href='productinfo_"+ids[i]+".html'  target='_blank' onclick='productinfo2(\""+ids[i]+"\")'><img title='"+tempname+"' src='"+imgs[i]+"' width='94' height='65' /></a></dt><dd class='gaodu' title='"+tempname+"'><a href='productinfo_"+ids[i]+".html'  target='_blank' onclick='productinfo2(\""+ids[i]+"\")'>"+tempname+"</a></dd><dd class='hs'>"+unescape(prices[i])+"</dd><dd><a href='javascript:clearone(\""+ids[i]+"\");' class='lanshe'>删除</a></dd></dl>";
			if(document.getElementById("duibi"+ids[i]) != undefined){
				document.getElementById("duibi"+ids[i]).className="dbanniu1";
			}
			if(document.getElementById("duibia"+ids[i]) != undefined){
				document.getElementById("duibia"+ids[i]).className="dbanniu1";
			}
			if(document.getElementById("duibib"+ids[i]) != undefined){
				document.getElementById("duibib"+ids[i]).className="dbanniu1";
			}
		}
		for(i;i<5;i++){
			nr += "<div class='jixu'><p>"+i+"</p>您还可以继续添加产品</div>";
		}
		if(ids.length>2){
			nr1 = "<div class='dianjidb'><a href='javascript:goCompare();' id=\"Leyibi_DB\" webtrekkparam=\"{ct:'Leyibi_DB'}\"><img src='images/duibi.jpg' width='80' height='22' /></a><br /><a class='lanshe' href='javascript:clearprocom();'>清空对比栏</a></div>";
		}else{
			nr1 = "<div class='dianjidb'><img src='images/duibib.jpg' width='80' height='22' /><br /><a class='lanshe' href='javascript:clearprocom();'>清空对比栏</a></div>";
		}
	}else{
		for(var i=1;i<5;i++){
			nr += "<div class='jixu'><p>"+i+"</p>您还可以继续添加产品</div>";
		}
		nr1 = "<div class='dianjidb'><img src='images/duibib.jpg' width='80' height='22' /><br /><a class='lanshe' href='javascript:clearprocom();'>清空对比栏</a></div>";
	}
	
	$("#bb1").html(nr+nr1);
	
	
}
//隐藏对比栏
function yinchangduibi(){
	$("#duibilan").fadeOut("slow");
}

//去对比
function goCompare(){
	var oldids = getCookie('pids');
	if(oldids !=null && oldids != undefined && oldids !=""){
		var ids = oldids.split(",");
		if(ids.length<3){
			alert("两款以上产品才能对比哦！");
		}else if(ids.length==3){
			var t1 = -1;
			var t2 = -1;
			if(ids[1]>ids[2]){
				t1 = ids[2];
				t2 = ids[1];
			}else{
				t1 = ids[1];
				t2 = ids[2];
			}
			window.open("product_"+t1+"_vs_"+t2+".html");
		}else{
			var pkids = "";
			for(var i=1;i<ids.length;i++){
				pkids += "_"+ids[i];
			}
			window.open("product"+pkids+".html");
		}
	}
}

//添加cookie
function setCookie(name,value,Days)
{
	if(Days == 0){
		document.cookie = name + "="+ escape (value);
	}else{
		var exp = new Date();
	    exp.setTime(exp.getTime() + Days*24*60*60*1000);
	    document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString();
	}
}

//读取cookies
function getCookie(name)
{
    var cookies = document.cookie.split(";");
	var iLen = cookies.length;
	if (iLen <= 0)
		return null;
	var keyName = Trim(objName);
	for ( var i = 0; i < iLen; i++) {
		if (typeof cookies[i] == 'undefined' || cookies[i] == "")
			continue;
		var keyValues = cookies[i].split("=");
		var key = Trim(keyValues[0]);
		if (key == keyName) {
			return decodeURIComponent(TrimQuotationMarks(Trim(keyValues[1]))).replace(/%20/g," ");
		}
	}
	return null;
}

//删除cookies
function delCookie(name)
{
    var exp = new Date();
    exp.setTime(exp.getTime() - 1);
    var cval=getCookie(name);
    if(cval!=null)
        document.cookie= name + "="+cval+";expires="+exp.toGMTString();
}

//验证关注
function verificationFrontUser(){
	var uid = "-1";
	var tuid = getCookie("COOKIE_USER_ID");
	if(tuid != null && tuid != undefined && tuid != ""){
		uid = tuid;
	}
	if(uid !=null && uid !="" && uid != "-1"){
		var ids = ""; 
		var pid = document.getElementsByName("orderId");   
	    var num = pid.length;   
	    for(var index =0 ; index<num;index++){
	    	if(index==num-1){
	    		ids += pid[index].value ;
	    	}else{
	    		ids += pid[index].value + ",";  
	    	}		               
	    }
	    $.ajax({
			async: false,
			url: "verificationFrontUser.action",
			type: "post",
			data: {"fuser.userid":uid,"ids":ids}, 
			dataType: 'json',
			error: function (data) {
	        },
			success: function(result){
				if(result =="false"){
					//设置所有的关注栏 为 "未关注状态"（默认 未关注）;
				}else{	
					var temp=eval(result);
					for(var index =0 ; index<num;index++){
						for(var i = 0; i < temp.length; i++){ 
							if(pid[index].value == temp[i].pid){
								$("#"+pid[index].value).removeClass("guanzhu");
			    				$("#"+pid[index].value).attr("class","yiguanzhu");
							}
						}
					}
				}
			}
				
		});
	}
	
}

// 关注
function saveFrontUser(pid,pname,isls){
    
    var uid = "-1";
	var tuid = getCookie("COOKIE_USER_ID");
	if(tuid != null && tuid != undefined && tuid != ""){
		uid = tuid;
	}
    var uname=getCookie("COOKIE_NICKNAME");
    if(uid !=null && uid !="" && uid != "-1"){
    	
    	$.ajax({
    		async: false,
    		url: "saveFrontUser.action",
    		type: "post",
    		data: {"fuser.userid":uid,"fuser.username":uname,"fuser.productid":pid,"fuser.productname":pname,"fuser.isls":isls}, 
    		dataType: 'json',
    		error: function (result) {
            },
    		success: function(result){
    			if(result == "success"){ //关注
    				$("#"+pid).removeClass("guanzhu");
    				$("#"+pid).attr("class","yiguanzhu");
    			}else if(result =="unAttention"){ // 再次点击 取消
    				$("#"+pid).removeClass("yiguanzhu");
    				$("#"+pid).attr("class","guanzhu");
    			}
    		}
    			
    	});
    }else{
    	//alert("请先登录！");
    	document.getElementById("login").click();
    }
	
}

//验证关注 for 其他人浏览记录中的关注
function verificationFrontUserForOrther(){
	var uid = "-1";
	var tuid = getCookie("COOKIE_USER_ID");
	if(tuid != null && tuid != undefined && tuid != ""){
		uid = tuid;
	}
	if(uid !=null && uid !="" && uid != "-1"){
		var ids = ""; 
		var pid = document.getElementsByName("lsorderId");   
	    var num = pid.length;   
	    for(var index =0 ; index<num;index++){
	    	if(index==num-1){
	    		ids += pid[index].value ;
	    	}else{
	    		ids += pid[index].value + ",";  
	    	}		               
	    }
	    $.ajax({
			async: false,
			url: "verificationFrontUser.action",
			type: "post",
			data: {"fuser.userid":uid,"ids":ids}, 
			dataType: 'json',
			error: function (data) {
	        },
			success: function(result){
				if(result =="false"){
					//设置所有的关注栏 为 "未关注状态"（默认 未关注）;
				}else{	
					var temp=eval(result);
					for(var index =0 ; index<num;index++){
						for(var i = 0; i < temp.length; i++){ 
							if(pid[index].value == temp[i].pid){
								$("#ls_"+pid[index].value).removeClass("guanzhu");
			    				$("#ls_"+pid[index].value).attr("class","yiguanzhu");
							}
						}
					}
				}
			}
				
		});
	}
	
}

// 关注
function saveFrontUserForOrther(pid,pname,isls){
    
    var uid = "-1";
	var tuid = getCookie("COOKIE_USER_ID");
	if(tuid != null && tuid != undefined && tuid != ""){
		uid = tuid;
	}
    var uname=getCookie("COOKIE_NICKNAME");
    if(uid !=null && uid !="" && uid != "-1"){
    	
    	$.ajax({
    		async: false,
    		url: "saveFrontUser.action",
    		type: "post",
    		data: {"fuser.userid":uid,"fuser.username":uname,"fuser.productid":pid,"fuser.productname":pname,"fuser.isls":isls}, 
    		dataType: 'json',
    		error: function (result) {
            },
    		success: function(result){
    			if(result == "success"){ //关注
    				$("#ls_"+pid).removeClass("gz");
    				$("#ls_"+pid).attr("class","gz1");
    			}else if(result =="unAttention"){ // 再次点击 取消
    				$("#ls_"+pid).removeClass("gz1");
    				$("#ls_"+pid).attr("class","gz");
    			}
    		}
    			
    	});
    }else{
    	document.getElementById("login").click();
    }
	
}
//其他人还关注的产品效果
function lilandd(num){
	num.className="ul1";
	
}

function lilanremove(num){
	num.className="";
}

//意见建议
function yijianshow(){
	//document.getElementById("yijianfk").style.display="block";
	$("#yijianfk").fadeIn("fast");
}

function yijianhide(){
	//document.getElementById("yijianfk").style.display="none";
	$("#yijianfk").fadeOut("fast");
}

function tijiaoyijian(){
	var nr = document.getElementById("yijiannr").value;
	if(nr.trim()==""){
		alert("请先填写意见内容！");
	}else{
		$.ajax({
    		async: false,
    		url: "sendYianjianMail.action",
    		type: "post",
    		data: {"nr":nr}, 
    		dataType: 'json',
    		error: function (result) {
            },
    		success: function(data){
    			if(data == "succ"){
    				$("#tsnr").html("提交成功！");
    				setTimeout("tijiaoyijian1()","500");
    			}else{
    				$("#tsnr").html("失败！");
    			}
    		}    			
    	});
	}
}

function tijiaoyijian1(){
	document.getElementById("yijiannr").value="";
	$("#tsnr").html("");
	$("#yijianfk").fadeOut("fast");
}

var a1=false;
var a2=false;
var a3=false;
var a4=false;
var a5=false;

function aopen1()
	{

	var stop;
	var w=document.getElementById("mmgg1").clientWidth;
	 if(w<151)
	 {
	  w+=1;
	  document.getElementById("mmgg1").style.width=w+"px";
	  stop=setTimeout('aopen1()',3)
	 }
	}
		
	function aopen2(mname)
	{
		
		if(mname=='1'){
			a1=true;	
		}else if(mname=='2'){
			a2=true;	
		}else if(mname=='3'){
			a3=true;	
		}else if(mname=='4'){
			a4=true;	
		}else if(mname=='5'){
			a5=true;	
		}
		var w=document.getElementById('mmgg'+mname).clientWidth;
	 if(w<120)
	 {
	  w+=3;
	  document.getElementById('mmgg'+mname).style.width=w+"px";
	  setTimeout('aopen2(\''+mname+'\')',3)
	 }
	}
	
	function dier(num1)
	{
		if(num1=='1'){
			a1=false;	
		}else if(num1=='2'){
			a2=false;	
		}else if(num1=='3'){
			a3=false;	
		}else if(num1=='4'){
			a4=false;	
		}else if(num1=='5'){
			a5=false;	
		}
		
	setTimeout('sss(\''+num1+'\')',10);
	}
	
	function sss(num1){
		if(num1=='1'){
			if(!a1){
				var w=document.getElementById('mmgg'+num1).clientWidth;
		 		document.getElementById('mmgg'+num1).style.width=0+"px";
			}
		}else if(num1=='2'){
			if(!a2){
				var w=document.getElementById('mmgg'+num1).clientWidth;
		 		document.getElementById('mmgg'+num1).style.width=0+"px";
			}
		}else if(num1=='3'){
			if(!a3){
				var w=document.getElementById('mmgg'+num1).clientWidth;
		 		document.getElementById('mmgg'+num1).style.width=0+"px";
			}
		}else if(num1=='4'){
			if(!a4){
				var w=document.getElementById('mmgg'+num1).clientWidth;
		 		document.getElementById('mmgg'+num1).style.width=0+"px";
			}
		}else if(num1=='5'){
			if(!a5){
				var w=document.getElementById('mmgg'+num1).clientWidth;
		 		document.getElementById('mmgg'+num1).style.width=0+"px";
			}
		}
		}
	
	
	function xdianji1(){
		document.getElementById('gongyongnr1').style.display="block";
		document.getElementById('gongyongnr').style.display="none";
		document.getElementById('gz').className="gongyong_top1 bian";
		document.getElementById('db').className="gongyong_top";
		}
	function xdianji2(){
		document.getElementById('gongyongnr').style.display="block";
		document.getElementById('gongyongnr1').style.display="none";
		document.getElementById('gz').className="gongyong_top1";
		document.getElementById('db').className="gongyong_top bian";
		}
	function ydgg1(num){
		document.getElementById(num).className="divkuang huaguo";
	}
	function lkgg1(num){
		document.getElementById(num).className="divkuang";
	}
	
	