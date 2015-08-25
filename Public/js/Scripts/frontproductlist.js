

//点击排序
function pxorderProduct(id){	
	var oldfilter = $("#filter").val(); // 
	var url = "list";
	var cPage = $("#page\\.currentPage").val(); //页码
	if(id =="hot"){
		$("#hot").attr("class","a_hover");
		$("#cheap").removeClass("a_hover");
		$("#new").removeClass("a_hover");
		if(oldfilter !="_null"){
			oldfilter = oldfilter.replace("_cheap","");
			oldfilter = oldfilter.replace("_new","");
			oldfilter = oldfilter.replace("_hot","");
			//oldfilter = getSingleton(oldfilter,"new");
		}
		url +="_hot";
	}else if(id=="cheap"){
		$("#cheap").attr("class","a_hover");
		$("#hot").removeClass("a_hover");
		$("#new").removeClass("a_hover");
		if(oldfilter !="_null"){
			oldfilter = oldfilter.replace("_hot","");
			oldfilter = oldfilter.replace("_new","");
			oldfilter = oldfilter.replace("_cheap","");
			//oldfilter = getSingleton(oldfilter,"hot");
			//oldfilter = getSingleton(oldfilter,"new");
		}
		url +="_cheap";
	}else if(id=="new"){
		$("#new").attr("class","a_hover");
		$("#cheap").removeClass("a_hover");
		$("#hot").removeClass("a_hover");
		if(oldfilter !="_null"){
			oldfilter = oldfilter.replace("_hot","");
			oldfilter = oldfilter.replace("_cheap","");
			oldfilter = oldfilter.replace("_new","");
			//oldfilter = getSingleton(oldfilter,"hot");
			//oldfilter = getSingleton(oldfilter,"cheap");
		}
		url +="_new";
	}
	$("#f").val(id);
	if(oldfilter =="_null"){
		window.location.href=url+"_p"+cPage+".html";
	}else{
		window.location.href=url+oldfilter+"_p"+cPage+".html";
	}
	/*$("#formSearch").action = "getFrontProducList.action";
	$("#formSearch").submit();*/
}
//加载页面 更改排序
$(document).ready(function(){
	BeSelected(); //选中
	var id = $("#f").val();
	if(id=="cheap"){
		$("#cheap").attr("class","a_hover");
		$("#hot").removeClass("a_hover");
		$("#new").removeClass("a_hover");
	}else if(id=="new"){
		$("#new").attr("class","a_hover");
		$("#cheap").removeClass("a_hover");
		$("#hot").removeClass("a_hover");
	}else{
		$("#hot").attr("class","a_hover");
		$("#cheap").removeClass("a_hover");
		$("#new").removeClass("a_hover");
	}
	temptd();
	verificationFrontUser();
	initCompare();//初始化对比栏
	
	verificationFrontUserForOrther();//其他关注
	var oldfilter = $("#filter").val(); // 
	if(oldfilter !="_null"){
		$("#clean").css("display",""); 
	}else{
		$("#clean").css("display","none"); //隐藏
	}
	comparisonForTop();
	//if(islm == true){
	//	lamu();
	//}
	
}); 

//多选按钮
function duoxuan(id){
	if(id =="4"){
		if(document.getElementById("duoxuan4").className=="dd2"){
			document.getElementById("duoxuan4").className="dd3";
			document.getElementById("ppflag").value = "true";
		}else{
			document.getElementById("duoxuan4").className="dd2";
			document.getElementById("ppflag").value = "false";
		}
	}else if(id == "7"){
		if(document.getElementById("duoxuan7").className=="dd2"){
			document.getElementById("duoxuan7").className="dd3";
			document.getElementById("jgflag").value = "true";
		}else{
			document.getElementById("duoxuan7").className="dd2";
			document.getElementById("jgflag").value = "false";
		}
	}
}

//多选筛选项
function getSingleton1(str,type,fid){
	str = str.substring(1,str.length); //去掉第一个"_"
	var isl = true;
	if(str.indexOf(fid+"oror")>=0 || str.indexOf(fid+"or")>=0 || str.indexOf("oror"+fid)>=0 || str.indexOf("or"+fid)>=0 || str.indexOf(type+fid)>=0){
		isl = false;
	}
	str = str.replace(fid+"oror","").replace(fid+"or","").replace("oror"+fid,"").replace("or"+fid,"").replace(type+fid,type);
	
	var  temp = str.split("_");
	var  strType = null;
	var strid = null;
	var sumStr="";
	var isy = true;
	for(var i=0;i<temp.length;i++){
	  if(temp[i] =="cheap"){
	  	strType = temp[i].substring(0, 5);
	  }else{
	  	strType = temp[i].substring(0, 3);
	  }
	  if(strType ==type){
	  	if(temp[i] =="cheap"){
		  	strid = temp[i].substring(5,temp[i].length);
		  }else{
		  	strid = temp[i].substring(3,temp[i].length);
		  }
	  	  isy = false;
	  	  if(isl){
	  	  	if(strid==""){
		  	  	sumStr += fid+"or";
		  	  }else{
			  	sumStr += strid+"or"+fid;
			  }
	  	  }else{
	  	  	sumStr += strid+"or";
	  	  }
	  	  
		  break;
	  }
	}
	if(isy){
		if(strid != null && strid != ""){
			sumStr += strid+"or"+fid;
		}else{
			sumStr += fid+"or";
		}
	}
	return sumStr;
}

//只选择一个
function getSingleton(str,type){
		str = str.substring(1,str.length); //去掉第一个"_"
		var  temp = str.split("_");
		var  strType = null;
		var strid = null;
		var sumStr="";
		for(var i=0;i<temp.length;i++){
		  strType = temp[i].substring(0, 3);
		  strid = temp[i].substring(3,temp[i].length);
		  if(strType !=type){
		  	if(strType != "SHP"){
		  		sumStr +=("_"+(strType+strid));
		  	}
			
		  }else{
			  sumStr+=""; 
		  }
		}
		return sumStr;
}

//筛选项
function  changeOption(index,id,num,fid){
	var oldfilter = $("#filter").val(); // 
	var url = "list";
	var cPage = $("#page\\.currentPage").val(); //页码
	if(id =="4" && index !=null){ //品牌    BRA
		//$("#4").removeClass("p");
		$("#4").attr("class","p1");
		if(document.getElementById("ppflag").value=="true"){
			var tempfilter = oldfilter;
			if(oldfilter !="_null"){
				oldfilter = getSingleton(oldfilter,"BRA");
			}
			if(tempfilter != "_null"){
				var addf = getSingleton1(tempfilter,"BRA",fid);
				if(addf != ""){
					url +="_BRA"+addf;
				}
			}else{
				url +="_BRA"+fid+"or";  //(Brand)
			}
		}else{
			
			for(var i=0;i<num;i++){
				if(i !=index){
					$("#4_"+i).removeClass("a");
				}else{
					$("#4_"+index).attr("class","a");
					
				}
			}
			if(oldfilter !="_null"){
				oldfilter = getSingleton(oldfilter,"BRA");
			}
			url +="_BRA"+fid;  //(Brand)
		}
		
	}else if(id =="4" && index ==null){
		
		$("#4").attr("class","p");
		for(var i=0;i<num;i++){
			$("#4_"+i).removeClass("a");
		}
		if(oldfilter !="_null"){
			oldfilter = getSingleton(oldfilter,"BRA");
		}
	}
	
	if(id =="5" && index !=null){ //背光灯类型 LED
		$("#5").removeClass("p");
		$("#5").attr("class","p1");
		for(var i=0;i<num;i++){
			if(i !=index){
				
				$("#5_"+i).removeClass("a");
			}else{
				$("#5_"+index).attr("class","a");
			}
		}
		if(oldfilter !="_null"){
			oldfilter = getSingleton(oldfilter,"LED");
		}
		url +="_LED"+fid;
	}else if(id =="5" && index ==null){
		
		$("#5").attr("class","p");
		for(var i=0;i<num;i++){
			$("#5_"+i).removeClass("a");
		}
		if(oldfilter !="_null"){
			oldfilter = getSingleton(oldfilter,"LED");
		}
	}
	
	if(id =="2" && index !=null){ //电视类型   TVT
		$("#2").removeClass("p");
		$("#2").attr("class","p1");
		for(var i=0;i<num;i++){
			if(i !=index){
				
				$("#2_"+i).removeClass("a");
			}else{
				$("#2_"+index).attr("class","a");
			}
		}
		if(oldfilter !="_null"){
			oldfilter = getSingleton(oldfilter,"TVT");
		}
		url +="_TVT"+fid;
	}else if(id =="2" && index ==null){
		
		$("#2").attr("class","p");
		for(var i=0;i<num;i++){
			$("#2_"+i).removeClass("a");
		}
		if(oldfilter !="_null"){
			oldfilter = getSingleton(oldfilter,"TVT");
		}
	}
	
	if(id =="3" && index !=null){ //产品定位(position)
		$("#3").removeClass("p");
		$("#3").attr("class","p1");
		for(var i=0;i<num;i++){
			if(i !=index){
				
				$("#3_"+i).removeClass("a");
			}else{
				$("#3_"+index).attr("class","a");
			}
		}
		if(oldfilter !="_null"){
			oldfilter = getSingleton(oldfilter,"POS");
		}
		url +="_POS"+fid;
	}else if(id =="3" && index ==null){
		$("#3").attr("class","p");
		for(var i=0;i<num;i++){
			$("#3_"+i).removeClass("a");
		}
		if(oldfilter !="_null"){
			oldfilter = getSingleton(oldfilter,"POS");
		}
	}
	
	if(id =="6" && index !=null){ //支持格式;format  FOR
		$("#6").removeClass("p");
		$("#6").attr("class","p1");
		for(var i=0;i<num;i++){
			if(i !=index){
				
				$("#6_"+i).removeClass("a");
			}else{
				$("#6_"+index).attr("class","a");
			}
		}
		if(oldfilter !="_null"){
			oldfilter = getSingleton(oldfilter,"FOR");
		}
		url +="_FOR"+fid;
	}else if(id =="6" && index ==null){
		
		$("#6").attr("class","p");
		for(var i=0;i<num;i++){
			$("#6_"+i).removeClass("a");
		}
		if(oldfilter !="_null"){
			oldfilter = getSingleton(oldfilter,"FOR");
		}
	}
	if(id =="7" && index !=null){ //价格  price
		
		$("#7").removeClass("p");
		$("#7").attr("class","p1");
		if(document.getElementById("jgflag").value=="true"){
			
			var tempfilter = oldfilter;
			if(oldfilter !="_null"){
				oldfilter = getSingleton(oldfilter,"PRI");
			}
			if(tempfilter != "_null"){
				var addf = getSingleton1(tempfilter,"PRI",fid);
				if(addf != ""){
					url +="_PRI"+addf;
				}
			}else{
				url +="_PRI"+fid+"or";  //
			}
		}else{
			
			for(var i=0;i<num;i++){
				if(i !=index){
					
					$("#7_"+i).removeClass("a");
				}else{
					$("#7_"+index).attr("class","a");
				}
			}
			if(oldfilter !="_null"){
				oldfilter = getSingleton(oldfilter,"PRI");
			}
			url +="_PRI"+fid;
		}
		//url +="_PRI"+fid;
	}else if(id =="7" && index ==null){
		
		$("#7").attr("class","p");
		for(var i=0;i<num;i++){
			$("#7_"+i).removeClass("a");
		}
		if(oldfilter !="_null"){
			oldfilter = getSingleton(oldfilter,"PRI");
		}
	}
	if(id =="8" && index !=null){ //接收制式receiving system   REC
		$("#8").removeClass("p");
		$("#8").attr("class","p1");
		for(var i=0;i<num;i++){
			if(i !=index){
				
				$("#8_"+i).removeClass("a");
			}else{
				$("#8_"+index).attr("class","a");
			}
		}
		if(oldfilter !="_null"){
			oldfilter = getSingleton(oldfilter,"REC");
		}
		url +="_REC"+fid;
	}else if(id =="8" && index ==null){
		
		$("#8").attr("class","p");
		for(var i=0;i<num;i++){
			$("#8_"+i).removeClass("a");
		}
		if(oldfilter !="_null"){
			oldfilter = getSingleton(oldfilter,"REC");
		}
	}
	if(id =="9" && index !=null){ //扬声器数量speaker   SPE
		$("#9").removeClass("p");
		$("#9").attr("class","p1");
		for(var i=0;i<num;i++){
			if(i !=index){
				$("#9_"+i).removeClass("a");
			}else{
				$("#9_"+index).attr("class","a");
			}
		}
		if(oldfilter !="_null"){
			oldfilter = getSingleton(oldfilter,"SPE");
		}
		url +="_SPE"+fid;
	}else if(id =="9" && index ==null){
		
		$("#9").attr("class","p");
		for(var i=0;i<num;i++){
			$("#9_"+i).removeClass("a");
		}
		if(oldfilter !="_null"){
			oldfilter = getSingleton(oldfilter,"SPE");
		}
	}
	if(id =="10" && index !=null){ //操作系统system   SYS
		$("#10").removeClass("p");
		$("#10").attr("class","p1");
		for(var i=0;i<num;i++){
			if(i !=index){
				
				$("#10_"+i).removeClass("a");
			}else{
				$("#10_"+index).attr("class","a");
			}
		}
		if(oldfilter !="_null"){
			oldfilter = getSingleton(oldfilter,"SYS");
		}
		url +="_SYS"+fid;
	}else if(id =="10" && index ==null){
		
		$("#10").attr("class","p");
		for(var i=0;i<num;i++){
			$("#10_"+i).removeClass("a");
		}
		if(oldfilter !="_null"){
			oldfilter = getSingleton(oldfilter,"SYS");
		}
	}
	if(id =="11" && index !=null){ //处理器   cpu
		$("#11").removeClass("p");
		$("#11").attr("class","p1");
		for(var i=0;i<num;i++){
			if(i !=index){
				
				$("#11_"+i).removeClass("a");
			}else{
				$("#11_"+index).attr("class","a");
			}
		}
		if(oldfilter !="_null"){
			oldfilter = getSingleton(oldfilter,"CPU");
		}
		url +="_CPU"+fid;
	}else if(id =="11" && index ==null){
		
		$("#11").attr("class","p");
		for(var i=0;i<num;i++){
			$("#11_"+i).removeClass("a");
		}
		if(oldfilter !="_null"){
			oldfilter = getSingleton(oldfilter,"CPU");
		}
	}
	if(id =="12" && index !=null){ //无线配置wireless  wiR
		$("#12").removeClass("p");
		$("#12").attr("class","p1");
		for(var i=0;i<num;i++){
			if(i !=index){
				
				$("#12_"+i).removeClass("a");
			}else{
				$("#12_"+index).attr("class","a");
			}
		}
		if(oldfilter !="_null"){
			oldfilter = getSingleton(oldfilter,"WIR");
		}
		url +="_WIR"+fid;
	}else if(id =="12" && index ==null){
		
		$("#12").attr("class","p");
		for(var i=0;i<num;i++){
			$("#12_"+i).removeClass("a");
		}
		if(oldfilter !="_null"){
			oldfilter = getSingleton(oldfilter,"WIR");
		}
	}
	if(id =="13" && index !=null){ //液晶面板TFT LCD   LCD
		$("#13").removeClass("p");
		$("#13").attr("class","p1");
		for(var i=0;i<num;i++){
			if(i !=index){
				
				$("#13_"+i).removeClass("a");
			}else{
				$("#13_"+index).attr("class","a");
			}
		}
		if(oldfilter !="_null"){
			oldfilter = getSingleton(oldfilter,"LCD");
		}
		url +="_LCD"+fid;
	}else if(id =="13" && index ==null){
		
		$("#13").attr("class","p");
		for(var i=0;i<num;i++){
			$("#13_"+i).removeClass("a");
		}
		if(oldfilter !="_null"){
			oldfilter = getSingleton(oldfilter,"LCD");
		}
	} 
	if(id =="14" && index !=null){ //分辨率resolution    RES
		$("#14").removeClass("p");
		$("#14").attr("class","p1");
		for(var i=0;i<num;i++){
			if(i !=index){
				
				$("#14_"+i).removeClass("a");
			}else{
				$("#14_"+index).attr("class","a");
			}
		}
		if(oldfilter !="_null"){
			oldfilter = getSingleton(oldfilter,"RES");
		}
		url +="_RES"+fid;
	}else if(id =="14" && index ==null){
		
		$("#14").attr("class","p");
		for(var i=0;i<num;i++){
			$("#14_"+i).removeClass("a");
		}
		if(oldfilter !="_null"){
			oldfilter = getSingleton(oldfilter,"RES");
		}
	}
	if(id =="15" && index !=null){ //3D显示       3DS
		$("#15").removeClass("p");
		$("#15").attr("class","p1");
		for(var i=0;i<num;i++){
			if(i !=index){
				
				$("#15_"+i).removeClass("a");
			}else{
				$("#15_"+index).attr("class","a");
			}
		}
		if(oldfilter !="_null"){
			oldfilter = getSingleton(oldfilter,"3DS");
		}
		url +="_3DS"+fid;
	}else if(id =="15" && index ==null){
		
		$("#15").attr("class","p");
		for(var i=0;i<num;i++){
			$("#15_"+i).removeClass("a");
		}
		if(oldfilter !="_null"){
			oldfilter = getSingleton(oldfilter,"3DS");
		}
	}
	if(id =="16" && index !=null){ ////能效等级Energy Efficiency Grade  ENE
		$("#16").removeClass("p");
		$("#16").attr("class","p1");
		for(var i=0;i<num;i++){
			if(i !=index){
				
				$("#16_"+i).removeClass("a");
			}else{
				$("#16_"+index).attr("class","a");
			}
		}
		if(oldfilter !="_null"){
			oldfilter = getSingleton(oldfilter,"ENE");
		}
		url +="_ENE"+fid;
	}else if(id =="16" && index ==null){
		
		$("#16").attr("class","p");
		for(var i=0;i<num;i++){
			$("#16_"+i).removeClass("a");
		}
		if(oldfilter !="_null"){
			oldfilter = getSingleton(oldfilter,"ENE");
		}
	}
	if(id =="17" && index !=null){ ////屏幕尺寸screen SCR
		$("#17").removeClass("p");
		$("#17").attr("class","p1");
		/*if(document.getElementById("jgflag").value=="true"){
			
			var tempfilter = oldfilter;
			if(oldfilter !="_null"){
				oldfilter = getSingleton(oldfilter,"SCR");
			}
			if(tempfilter != "_null"){
				var addf = getSingleton1(tempfilter,"SCR",fid);
				if(addf != ""){
					url +="_SCR"+addf;
				}
			}else{
				url +="_SCR"+fid+"or";  //
			}
		}else{
			
			for(var i=0;i<num;i++){
				if(i !=index){
					
					$("#17_"+i).removeClass("a");
				}else{
					$("#17_"+index).attr("class","a");
				}
			}
			if(oldfilter !="_null"){
				oldfilter = getSingleton(oldfilter,"SCR");
			}
			url +="_SCR"+fid;
		}*/
		for(var i=0;i<num;i++){
			if(i !=index){
				
				$("#17_"+i).removeClass("a");
			}else{
				$("#17_"+index).attr("class","a");
			}
		}
		if(oldfilter !="_null"){
			oldfilter = getSingleton(oldfilter,"SCR");
		}
		url +="_SCR"+fid;
	}else if(id =="17" && index ==null){
		
		$("#17").attr("class","p");
		for(var i=0;i<num;i++){
			$("#17_"+i).removeClass("a");
		}
		if(oldfilter !="_null"){
			oldfilter = getSingleton(oldfilter,"SCR");
		}
	}
	//$("#formSearch").action = "getFrontProducList.action";
	//$("#formSearch").submit();
	if(oldfilter =="_null"){
		window.location.href=url+"_p"+cPage+".html";
	}else{
		window.location.href=url+oldfilter+"_p"+cPage+".html";
	}
	
}

function temptd(){
	var obj = document.getElementById("temptd");
	obj.removeChild(obj.lastChild);
	obj.removeChild(obj.lastChild);
	obj.removeChild(obj.lastChild);
	obj.removeChild(obj.lastChild);
	obj.removeChild(obj.lastChild);
}

//页面跳转
function toPage(){
	var cpage =  $("#tocurrentPage").val();
	var total = $("#totalpage").val();
	if(parseInt(total)<parseInt(cpage)){
		$("#tocurrentPage").val("");
	}else{
		$("#page\\.currentPage").val(cpage);
		$("#currentPage").val(cpage);
		//$("#formSearch").submit();
		document.location.href="list_p"+cpage+".html";
	}
}

//筛选项选中
function BeSelected(){
	var oldfilter = $("#filter").val();
	if(oldfilter !="_null"){
		oldfilter = oldfilter.substring(1,oldfilter.length); //去掉第一个"_"
		var  temp = oldfilter.split("_");
		var  strType = null;
		var  strID = null;
		var BRA = false;
		var LED = false;
		var TVT = false;
		var POS = false;
		var FOR = false;
		var PRI = false;
		var REC = false;
		var SPE = false;
		var SYS = false;
		var CPU = false;
		var WIR = false;
		var LCD = false;
		var RES = false;
		var ENE = false;
		var DS3 = false;
		var SCR = false;
		for(var i=0;i<temp.length;i++){
		  strType = temp[i].substring(0, 3);
		  strID   = temp[i].substring(3,temp[i].length);
		    if(strType=="BRA"){ //品牌
		    	BRA = true;
		    	$("#4").removeClass("p");
		    	$("#4").attr("class","p1");
		    	var id = $("#temp"+strID).val();
				/*if(id =="4"){
					$("#4").attr("class","p");
				}*/
		    	if(strID.indexOf("or")>=0){
		    		$("#duoxuan4").attr("class","dd3");
		    		$("#ppflag").val("true");
		    		var ids = strID.split("or");
		    		if(ids != null && ids.length>0){
		    			for(var ds = 0;ds<ids.length;ds++){
		    				$("#"+$("#temp"+ids[ds]).val()).attr("class","a");
		    			}
		    		}
		    	}else{
					$("#"+id).attr("class","a");
		    	}
			}else if(BRA==false){
				$("#4").attr("class","p");
			}
			if(strType=="LED"){ //背光灯类型 LED
				LED = true;
				$("#5").removeClass("p");
				$("#5").attr("class","p1");
				var id = $("#temp"+strID).val();
				if(id=="5"){
					$("#5").attr("class","p");
				}
				$("#"+id).attr("class","a");
			}else if(LED == false){
				$("#5").attr("class","p");
			}
			if(strType =="TVT"){//电视类型   TVT
				TVT = true;
				$("#2").removeClass("p");
				$("#2").attr("class","p1");
				var id = $("#temp"+strID).val();
				if(id=="2"){
					$("#2").attr("class","p");
				}
				$("#"+id).attr("class","a");
			}else if(TVT == false){
				$("#2").attr("class","p");
			}
			if(strType =="POS"){//产品定位(position)
				POS = true;
				$("#3").removeClass("p");
				$("#3").attr("class","p1");
				var id = $("#temp"+strID).val();
				if(id=="3"){
					$("#3").attr("class","p");
				}
				$("#"+id).attr("class","p");
			}else if(POS == false){
				$("#3").attr("class","p");
			}
			if(strType =="FOR"){//支持格式;format  FOR
				FOR =true;
				$("#6").removeClass("p");
				$("#6").attr("class","p1");
				var id = $("#temp"+strID).val();
				if(id=="6"){
					$("#6").attr("class","p");
				}
				$("#"+id).attr("class","p");
			}else if(FOR == false){
				$("#6").attr("class","p");
			}
			if(strType =="PRI"){//价格  price
				PRI = true;
				$("#7").removeClass("p");
				$("#7").attr("class","p1");
				var id = $("#temp"+strID).val();
				/*if(id=="7"){
					$("#7").attr("class","p");
				}*/
				if(strID.indexOf("or")>=0){
		    		$("#duoxuan7").attr("class","dd3");
		    		$("#jgflag").val("true");
		    		var ids = strID.split("or");
		    		if(ids != null && ids.length>0){
		    			for(var ds = 0;ds<ids.length;ds++){
		    				
		    				$("#"+$("#temp"+ids[ds]).val()).attr("class","a");
		    			}
		    		}
		    	}else{
					$("#"+id).attr("class","a");
		    	}
			}else if(PRI == false){
				$("#7").attr("class","p");
			}
			if(strType =="REC"){ //接收制式receiving system   REC
				REC = true;
				$("#8").removeClass("p");
				$("#8").attr("class","p1");
				var id = $("#temp"+strID).val();
				if(id=="8"){
					$("#8").attr("class","p");
				}
				$("#"+id).attr("class","a");
			}else if(REC == false){
				$("#8").attr("class","p");
			}
			if(strType =="SPE"){ ////扬声器数量speaker   SPE
				SPE = true;
				$("#9").removeClass("p");
				$("#9").attr("class","p1");
				var id = $("#temp"+strID).val();
				if(id=="9"){
					$("#9").attr("class","p");
				}
				$("#"+id).attr("class","a");
			}else if(SPE ==false){
				$("#9").attr("class","p");
			}
			if(strType =="SYS"){//操作系统system   SYS
				SYS = true;
				$("#10").removeClass("p");
				$("#10").attr("class","p1");
				var id = $("#temp"+strID).val();
				if(id=="10"){
					$("#10").attr("class","p");
				}
				$("#"+id).attr("class","a");
			}else if(SYS == false){
				$("#10").attr("class","p");
			}
			if(strType =="CPU"){//处理器   cpu
				CPU = true;
				$("#11").removeClass("p");
				$("#11").attr("class","p1");
				var id = $("#temp"+strID).val();
				if(id=="11"){
					$("#11").attr("class","p");
				}
				$("#"+id).attr("class","a");
			}else if(CPU == false){
				$("#11").attr("class","p");
			}
			if(strType =="WIR"){//无线配置wireless  wiR
				WIR = true;
				$("#12").removeClass("p");
				$("#12").attr("class","p1");
				var id = $("#temp"+strID).val();
				if(id=="12"){
					$("#12").attr("class","p");
				}
				$("#"+id).attr("class","a");
			}else if(WIR == false){
				$("#12").attr("class","p");
			}
			if(strType =="LCD"){//液晶面板TFT LCD   LCD
				LCD = true;
				$("#13").removeClass("p");
				$("#13").attr("class","p1");
				var id = $("#temp"+strID).val();
				if(id=="13"){
					$("#13").attr("class","p");
				}
				$("#"+id).attr("class","a");
			}else if(LCD == false){
				$("#13").attr("class","p");
			}
			if(strType =="RES"){//分辨率resolution    RES
				RES = true;
				$("#14").removeClass("p");
				$("#14").attr("class","p1");
				var id = $("#temp"+strID).val();
				if(id=="14"){
					$("#14").attr("class","p");
				}
				$("#"+id).attr("class","a");
			}else if(RES == false){
				$("#14").attr("class","p");
			}
			if(strType =="3DS"){//3D显示       3DS
				DS3 = true;
				$("#15").removeClass("p");
				$("#15").attr("class","p1");
				var id = $("#temp"+strID).val();
				if(id=="15"){
					$("#15").attr("class","p");
				}
				$("#"+id).attr("class","a");
			}else if(DS3 == false){
				$("#15").attr("class","p");
			}
			if(strType =="ENE"){////能效等级Energy Efficiency Grade  ENE
				ENE = true;
				$("#16").removeClass("p");
				$("#16").attr("class","p1");
				var id = $("#temp"+strID).val();
				if(id=="16"){
					$("#16").attr("class","p");
				}
				$("#"+id).attr("class","a");
			}else if(ENE == false){
				$("#16").attr("class","p");
			}
			if(strType =="SCR"){////屏幕尺寸screen SCR
				SCR = true;
				$("#17").removeClass("p");
				$("#17").attr("class","p1");
				var id = $("#temp"+strID).val();
				if(id=="17"){
					$("#17").attr("class","p");
				}
		    	if(strID.indexOf("or")>=0){
		    		$("#duoxuan17").attr("class","dd3");
		    		$("#jgflag").val("true");
		    		var ids = strID.split("or");
		    		if(ids != null && ids.length>0){
		    			for(var ds = 0;ds<ids.length;ds++){
		    				
		    				$("#"+$("#temp"+ids[ds]).val()).attr("class","a");
		    			}
		    		}
		    	}else{
					$("#"+id).attr("class","a");
		    	}
		    	
			}else if(SCR == false){
				$("#17").attr("class","p");
			}
	   }
	}else{
		$("#4").attr("class","p");
		$("#3").attr("class","p");
		$("#2").attr("class","p");
		$("#5").attr("class","p");
		$("#6").attr("class","p");
		$("#7").attr("class","p");
		$("#8").attr("class","p");
		$("#9").attr("class","p");
		$("#10").attr("class","p");
		$("#11").attr("class","p");
		$("#12").attr("class","p");
		$("#13").attr("class","p");
		$("#14").attr("class","p");
		$("#15").attr("class","p");
		$("#16").attr("class","p");
		$("#17").attr("class","p");
	}
}


//搜索产品
function searchProduct(){
	var name = $("#wenzhi").val();
	if(name != null && name != ""){
		$.ajax({
			async: false,
			url: "searchProduct.action",
			type: "post", 
			data: {"searchName":name},
			dataType: 'json',
			success: function(result){
				var temp=eval(result);
				var instr = "";
				if(temp != null && temp != undefined && temp.length>0){
					document.getElementById("ulbb").style.display="block";
					for(var i=0;i<temp.length;i++){
						instr += "<li onclick=\"javascript:gosearchPP("+temp[i].pid+");\"><a id=\""+temp[i].pid+"\" href=\"javascript:gosearch("+temp[i].pid+");\">"+temp[i].pname+"</a></li>";
					}
					$("#ulbb").html(instr);
				}
			}
		});
	}else{
		$("#ulbb").html("");
	}
}
function gosearchPP(id){
	var name = $("#"+id).text();
	$("#wenzhi").val(name.trim());
	//document.location.href="list_SHP"+id+"_p1"+".html";
	window.open("productinfo_"+id+".html");
}

function  cleanFiltrate(){
	delCookie("UNFOLD");
	window.location.href="list_p1.html";
}


function comparisonForTop(){
	$.ajax({
		async: false,
		url: "getTopCompareLog.action",
		type: "post", 
		
		dataType: 'json',
		success: function(result){
			var comphtml = "";
			var temp=eval(result);
			if(temp != null && temp.length>0){
				var count = temp.length;
				if(temp.length>=6){
					count = 4;
				}
				
				for(var i=1;i<count;i++){
					var n=1;
					if(i==2){
						n=3;
						comphtml +="<div class=\"divkuang\" id=\"divkuang"+i+"\" onmouseover=\"ydgg1('divkuang"+i+"')\" onmouseout=\"lkgg1('divkuang"+i+"')\" style=\"margin-left:-3px\">";
					}else if(i==3){
						n=5;
						comphtml +="<div class=\"divkuang\" id=\"divkuang"+i+"\" onmouseover=\"ydgg1('divkuang"+i+"')\" onmouseout=\"lkgg1('divkuang"+i+"')\" style=\"background-image:none; margin-left:-6px;\">";
					}else{
						comphtml +="<div class=\"divkuang\" id=\"divkuang"+i+"\" onmouseover=\"ydgg1('divkuang"+i+"')\" onmouseout=\"lkgg1('divkuang"+i+"')\">";
					}
					var imgpath1 = "images/nopic.jpg";
		            if(temp[n-1].image1 != null && temp[n-1].image1!= undefined && temp[n-1].image1!="null" && temp[n-1].image1!=""){
		            	imgpath1 = temp[n-1].image1; //第一个
		            }
		            var imgpath2 = "images/nopic.jpg";
		            if(temp[n].image1 != null && temp[n].image1!= undefined && temp[n].image1!="null" && temp[n].image1!=""){
		            	imgpath2 = temp[n].image1; // 第二个
		            }
		            var allprice1 = ""; //第一个价格
					if(temp[n-1].price1 != null && temp[n].price1!= undefined && temp[n-1].price1!="null" && temp[n-1].price1!=""){
						allprice1=temp[n-1].price1;
					}
					if(temp[n-1].price2 != null && temp[n-1].price2!= undefined && temp[n-1].price2!="null" && temp[n-1].price2!=""){
						allprice1+="+"+temp[n-1].price2;
					}
					if(temp[n-1].price3 != null && temp[n-1].price3!= undefined && temp[n-1].price3!="null" && temp[n-1].price3!=""){
						allprice1+="+"+temp[n-1].price3;
					}
					if(temp[n-1].price4 != null && temp[n-1].price4!= undefined && temp[n-1].price4!="null" && temp[n-1].price4!=""){
						allprice1+="+"+temp[n-1].price4;
					}
					if(temp[n-1].price5 != null && temp[n-1].price5!= undefined && temp[n-1].price5!="null" && temp[n-1].price5!=""){
						allprice1+="+"+temp[n-1].price5;
					}
					comphtml += "<input type=\"hidden\" id=\"allprice"+temp[n-1].id+"\" value=\""+allprice1+"\" />";
					
					var allprice2 = ""; // 第二个价格
					if(temp[n].price1 != null && temp[n].price1!= undefined && temp[n].price1!="null" && temp[n].price1!=""){
						allprice2=temp[i].price1;
					}
					if(temp[n].price2 != null && temp[n].price2!= undefined && temp[n].price2!="null" && temp[n].price2!=""){
						allprice2+="+"+temp[n].price2;
					}
					if(temp[n].price3 != null && temp[n].price3!= undefined && temp[n].price3!="null" && temp[n].price3!=""){
						allprice2+="+"+temp[n].price3;
					}
					if(temp[n].price4 != null && temp[n].price4!= undefined && temp[n].price4!="null" && temp[n].price4!=""){
						allprice2+="+"+temp[n].price4;
					}
					if(temp[n].price5 != null && temp[n].price5!= undefined && temp[n].price5!="null" && temp[n].price5!=""){
						allprice2+="+"+temp[n].price5;
					}
					comphtml += "<input type=\"hidden\" id=\"allprice"+temp[i].id+"\" value=\""+allprice2+"\" />";
					
			        comphtml +="<ul class=\"ul_l\">";
			        comphtml += "<li class=\"li1\"><a href='productinfo_"+temp[n-1].id+".html'  target='_blank' onclick='productinfo2(\""+temp[n-1].id+"\")' ><img id=\"img"+temp[n-1].id+"\" src='"+imgpath1+"' width=\"140\" height=\"92\" /></a></li>";
			        comphtml +="<li class=\"li2\"><div class=\"li2_bb\"><a href='productinfo_"+temp[n-1].id+".html'  target='_blank' onclick='productinfo2(\""+temp[n-1].id+"\")' id=\"pname"+temp[n-1].id+"\">"+temp[n-1].name+"</a></div></li>";
			        //  第一个价格
			        var jiage ="";
		            if(temp[n-1].priceinfo1 != null && temp[n-1].priceinfo1!= undefined && temp[n-1].priceinfo1!="null" && temp[n-1].priceinfo1!=""){
		            	
		            		jiage += "<span class=\"xianshi_span\" onmousemove=\"xsjiage('lldiv"+temp[n-1].id+i+"1')\" onmouseout=\"gbjiage('lldiv"+temp[n-1].id+i+"1')\">￥"+temp[n-1].price1;
		            	
		            	jiage += "<div class=\"xianshi_div1\" id=\"lldiv"+temp[n-1].id+i+"1\"><div class=\"jian\"></div><div class=\"kuang\">"+temp[n-1].priceinfo1+"</div></div>";
		            	jiage += "</span>";
		            }else{
		            	jiage += "<span class=\"xianshi_span1\" onmousemove=\"xsjiage('lldiv"+temp[n-1].id+i+"1')\" onmouseout=\"gbjiage('lldiv"+temp[n-1].id+i+"1')\">￥"+temp[n-1].price1;
		            	jiage += "</span>";
		            }
		            
		            if(temp[n-1].price2 != null && temp[n-1].price2!= undefined && temp[n-1].price2!="null" && temp[n-1].price2!="" && (temp[n-1].price3 == null || temp[n-1].price3== undefined || temp[n-1].price3=="null" || temp[n-1].price3=="")){
		            	jiage += "<span>+</span>";
		            	jiage += "<span class=\"xianshi_span\" onmousemove=\"xsjiage('lldiv"+temp[n-1].id+i+"2')\" onmouseout=\"gbjiage('lldiv"+temp[n-1].id+i+"2')\">￥"+temp[n-1].price2;
						jiage += "<div class=\"xianshi_div3\" id=\"lldiv"+temp[n-1].id+i+"2\">";	            	
						jiage += "<div class=\"jian\"></div>";
						jiage += "<div class=\"kuang\">"+temp[n-1].priceinfo2+"</div>";
						jiage += "</div></span>";
		            }else if(temp[n-1].price2 != null && temp[n-1].price2!= undefined && temp[n-1].price2!="null" && temp[n-1].price2!=""){
		            	jiage += "<span>+</span>";
		            		
		            		jiage += "<span class=\"xianshi_span\" onmousemove=\"xsjiage('lldiv"+temp[n-1].id+i+"2')\" onmouseout=\"gbjiage('lldiv"+temp[n-1].id+i+"2')\">￥"+temp[n-1].price2;
		            	
						jiage += "<div class=\"xianshi_div2\" id=\"lldiv"+temp[n-1].id+i+"2\">";	            	
						jiage += "<div class=\"jian\"></div>";
						jiage += "<div class=\"kuang\">"+temp[n-1].priceinfo2+"</div>";
						jiage += "</div></span>";
		            }
		            if(temp[n-1].price3 != null && temp[n-1].price3!= undefined && temp[n-1].price3!="null" && temp[n-1].price3!="" && (temp[n-1].price4 == null || temp[n-1].price4== undefined || temp[n-1].price4=="null" || temp[n-1].price4=="")){
		            	jiage += "<span>+</span>";
		            	jiage += "<span class=\"xianshi_span\" onmousemove=\"xsjiage('lldiv"+temp[n-1].id+i+"3')\" onmouseout=\"gbjiage('lldiv"+temp[n-1].id+i+"3')\">￥"+temp[n-1].price3;
						jiage += "<div class=\"xianshi_div3\" id=\"lldiv"+temp[n-1].id+i+"3\">";	            	
						jiage += "<div class=\"jian\"></div>";
						jiage += "<div class=\"kuang\">"+temp[n-1].priceinfo3+"</div>";
						jiage += "</div></span>";
		            }else if(temp[n-1].price3 != null && temp[n-1].price3!= undefined && temp[n-1].price3!="null" && temp[n-1].price3!=""){
		            	jiage += "<span>+</span>";
		            			            		
		            		jiage += "<span class=\"xianshi_span\" onmousemove=\"xsjiage('lldiv"+temp[n-1].id+i+"3')\" onmouseout=\"gbjiage('lldiv"+temp[n-1].id+i+"3')\">￥"+temp[n-1].price3;
		            	
						jiage += "<div class=\"xianshi_div2\" id=\"lldiv"+temp[n-1].id+i+"3\">";	            	
						jiage += "<div class=\"jian\"></div>";
						jiage += "<div class=\"kuang\">"+temp[n-1].priceinfo3+"</div>";
						jiage += "</div></span>";
		            }
		            if(temp[n-1].price4 != null && temp[n-1].price4!= undefined && temp[n-1].price4!="null" && temp[n-1].price4!="" && (temp[n-1].price5 == null || temp[n-1].price5== undefined || temp[n-1].price5=="null" || temp[n-1].price5=="")){
		            	jiage += "<span>+</span>";
		            	jiage += "<span class=\"xianshi_span\" onmousemove=\"xsjiage('lldiv"+temp[n-1].id+i+"4')\" onmouseout=\"gbjiage('lldiv"+temp[n-1].id+i+"4')\">￥"+temp[n-1].price4;
						jiage += "<div class=\"xianshi_div3\" id=\"lldiv"+temp[n-1].id+i+"4\">";	            	
						jiage += "<div class=\"jian\"></div>";
						jiage += "<div class=\"kuang\">"+temp[n-1].priceinfo4+"</div>";
						jiage += "</div></span>";
		            }else if(temp[n-1].price4 != null && temp[n-1].price4!= undefined && temp[n-1].price4!="null" && temp[n-1].price4!=""){
		            	jiage += "<span>+</span>";
		            	jiage += "<span class=\"xianshi_span\" onmousemove=\"xsjiage('lldiv"+temp[n-1].id+i+"4')\" onmouseout=\"gbjiage('lldiv"+temp[n-1].id+i+"4')\">￥"+temp[n-1].price4;
						jiage += "<div class=\"xianshi_div2\" id=\"lldiv"+temp[n-1].id+i+"4\">";	            	
						jiage += "<div class=\"jian\"></div>";
						jiage += "<div class=\"kuang\">"+temp[n-1].priceinfo4+"</div>";
						jiage += "</div></span>";
		            }
		            
		            if(temp[n-1].price5 != null && temp[n-1].price5!= undefined && temp[n-1].price5!="null" && temp[n-1].price5!=""){
		            	jiage += "<span>+</span>";
		            	jiage += "<span class=\"xianshi_span\" onmousemove=\"xsjiage('lldiv"+temp[n-1].id+i+"5')\" onmouseout=\"gbjiage('lldiv"+temp[n-1].id+i+"5')\">￥"+temp[n-1].price5;
						jiage += "<div class=\"xianshi_div3\" id=\"lldiv"+temp[n-1].id+i+"5\">";	            	
						jiage += "<div class=\"jian\"></div>";
						jiage += "<div class=\"kuang\">"+temp[n-1].priceinfo5+"</div>";
						jiage += "</div></span>";
		            }
			       
			        
			        
			        comphtml +="<li class=\"li3\">"+jiage;
			        comphtml +="</li>";    
			        comphtml +="</ul>";
			        comphtml +="<img src=\"images/dPk.png\" width=\"38\" height=\"41\" class=\"pk\" />";
			        comphtml +="<ul>";
			        comphtml +="<li class=\"li1\"><a href='productinfo_"+temp[n].id+".html'  target='_blank' onclick='productinfo2(\""+temp[n].id+"\")' ><img id=\"img"+temp[n].id+"\" src='"+imgpath2+"' width=\"140\" height=\"92\" /></a></li>";
			        comphtml +="<li class=\"li2\"><div class=\"li2_bb\"><a href='productinfo_"+temp[n].id+".html'  target='_blank' onclick='productinfo2(\""+temp[n].id+"\")' id=\"pname"+temp[n].id+"\">"+temp[n].name+"</a></div></li>";
			        
			        var jiage2 ="";
		            if(temp[n].priceinfo1 != null && temp[n].priceinfo1!= undefined && temp[n].priceinfo1!="null" && temp[n].priceinfo1!=""){
		            	
		            		jiage2 += "<span class=\"xianshi_span\" onmousemove=\"xsjiage('lldiv"+temp[n].id+i+"1')\" onmouseout=\"gbjiage('lldiv"+temp[n].id+i+"1')\">￥"+temp[n].price1;
		            	
		            	jiage2 += "<div class=\"xianshi_div1\" id=\"lldiv"+temp[n].id+i+"1\"><div class=\"jian\"></div><div class=\"kuang\">"+temp[n].priceinfo1+"</div></div>";
		            	jiage2 += "</span>";
		            }else{
		            	jiage2 += "<span class=\"xianshi_span1\" onmousemove=\"xsjiage('lldiv"+temp[n].id+i+"1')\" onmouseout=\"gbjiage('lldiv"+temp[n].id+i+"1')\">￥"+temp[n].price1;
		            	jiage2 += "</span>";
		            }
		            
		            if(temp[n].price2 != null && temp[n].price2!= undefined && temp[n].price2!="null" && temp[n].price2!="" && (temp[n].price3 == null || temp[n].price3== undefined || temp[n].price3=="null" || temp[n].price3=="")){
		            	jiage2 += "<span>+</span>";
		            	jiage2 += "<span class=\"xianshi_span\" onmousemove=\"xsjiage('lldiv"+temp[n].id+i+"2')\" onmouseout=\"gbjiage('lldiv"+temp[n].id+i+"2')\">￥"+temp[n].price2;
						jiage2 += "<div class=\"xianshi_div3\" id=\"lldiv"+temp[n].id+i+"2\">";	            	
						jiage2 += "<div class=\"jian\"></div>";
						jiage2 += "<div class=\"kuang\">"+temp[n].priceinfo2+"</div>";
						jiage2 += "</div></span>";
		            }else if(temp[n].price2 != null && temp[n].price2!= undefined && temp[n].price2!="null" && temp[n].price2!=""){
		            	jiage2 += "<span>+</span>";
		            	
		            		
		            		jiage2 += "<span class=\"xianshi_span\" onmousemove=\"xsjiage('lldiv"+temp[n].id+i+"2')\" onmouseout=\"gbjiage('lldiv"+temp[n].id+i+"2')\">￥"+temp[n].price2;
		            	
						jiage2 += "<div class=\"xianshi_div2\" id=\"lldiv"+temp[n].id+i+"2\">";	            	
						jiage2 += "<div class=\"jian\"></div>";
						jiage2 += "<div class=\"kuang\">"+temp[n].priceinfo2+"</div>";
						jiage2 += "</div></span>";
		            }
		            if(temp[n].price3 != null && temp[n].price3!= undefined && temp[n].price3!="null" && temp[n].price3!="" && (temp[n].price4 == null || temp[n].price4== undefined || temp[n].price4=="null" || temp[n].price4=="")){
		            	jiage2 += "<span>+</span>";
		            	jiage2 += "<span class=\"xianshi_span\" onmousemove=\"xsjiage('lldiv"+temp[n].id+i+"3')\" onmouseout=\"gbjiage('lldiv"+temp[n].id+i+"3')\">￥"+temp[n].price3;
						jiage2 += "<div class=\"xianshi_div3\" id=\"lldiv"+temp[n].id+i+"3\">";	            	
						jiage2 += "<div class=\"jian\"></div>";
						jiage2 += "<div class=\"kuang\">"+temp[n].priceinfo3+"</div>";
						jiage2 += "</div></span>";
		            }else if(temp[n].price3 != null && temp[n].price3!= undefined && temp[n].price3!="null" && temp[n].price3!=""){
		            	jiage2 += "<span>+</span>";
		            	
		            		
		            		jiage2 += "<span class=\"xianshi_span\" onmousemove=\"xsjiage('lldiv"+temp[n].id+i+"3')\" onmouseout=\"gbjiage('lldiv"+temp[n].id+i+"3')\">￥"+temp[n].price3;
		            	
						jiage2 += "<div class=\"xianshi_div2\" id=\"lldiv"+temp[n].id+i+"3\">";	            	
						jiage2 += "<div class=\"jian\"></div>";
						jiage2 += "<div class=\"kuang\">"+temp[n].priceinfo3+"</div>";
						jiage2 += "</div></span>";
		            }
		            if(temp[n].price4 != null && temp[n].price4!= undefined && temp[n].price4!="null" && temp[n].price4!="" && (temp[n].price5 == null || temp[n].price5== undefined || temp[n].price5=="null" || temp[n].price5=="")){
		            	jiage2 += "<span>+</span>";
		            	jiage2 += "<span class=\"xianshi_span\" onmousemove=\"xsjiage('lldiv"+temp[n].id+i+"4')\" onmouseout=\"gbjiage('lldiv"+temp[n].id+i+"4')\">￥"+temp[n].price4;
						jiage2 += "<div class=\"xianshi_div3\" id=\"lldiv"+temp[n].id+i+"4\">";	            	
						jiage2 += "<div class=\"jian\"></div>";
						jiage2 += "<div class=\"kuang\">"+temp[n].priceinfo4+"</div>";
						jiage2 += "</div></span>";
		            }else if(temp[n].price4 != null && temp[n].price4!= undefined && temp[n].price4!="null" && temp[n].price4!=""){
		            	jiage2 += "<span>+</span>";
		            	jiage2 += "<span class=\"xianshi_span\" onmousemove=\"xsjiage('lldiv"+temp[n].id+i+"4')\" onmouseout=\"gbjiage('lldiv"+temp[n].id+i+"4')\">￥"+temp[n].price4;
						jiage2 += "<div class=\"xianshi_div2\" id=\"lldiv"+temp[n].id+i+"4\">";	            	
						jiage2 += "<div class=\"jian\"></div>";
						jiage2 += "<div class=\"kuang\">"+temp[n].priceinfo4+"</div>";
						jiage2 += "</div></span>";
		            }
		            
		            if(temp[n].price5 != null && temp[n].price5!= undefined && temp[n].price5!="null" && temp[n].price5!=""){
		            	jiage2 += "<span>+</span>";
		            	jiage2 += "<span class=\"xianshi_span\" onmousemove=\"xsjiage('lldiv"+temp[n].id+i+"5')\" onmouseout=\"gbjiage('lldiv"+temp[n].id+i+"5')\">￥"+temp[n].price5;
						jiage2 += "<div class=\"xianshi_div3\" id=\"lldiv"+temp[n].id+i+"5\">";	            	
						jiage2 += "<div class=\"jian\"></div>";
						jiage2 += "<div class=\"kuang\">"+temp[n].priceinfo5+"</div>";
						jiage2 += "</div></span>";
		            }
			        comphtml +="<li class=\"li3\">"+jiage2;
			        
			        comphtml +="</li>";
			        comphtml +="</ul>";
			        comphtml +="<div class=\"clear\"></div>";
			        if(temp[n-1].id>temp[n].id){
			        	comphtml +="<a href='product_"+temp[n].id+"_vs_"+temp[n-1].id+".html'  target='_blank' class=\"dbjg\"><img src=\"images/dbjg.png\" width=\"110\" height=\"30\" /></a>";
			        }else{			        	
			        	comphtml +="<a href='product_"+temp[n-1].id+"_vs_"+temp[n].id+".html'  target='_blank' class=\"dbjg\"><img src=\"images/dbjg.png\" width=\"110\" height=\"30\" /></a>";
			        }
			        comphtml +="</div>";
			       
				}
				$("#gongyongnr1").html(comphtml);
			}
			}
		});	
	
	
	
}