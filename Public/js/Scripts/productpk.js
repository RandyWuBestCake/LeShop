function randomlsproduct(isleft){
	if(isleft == "left"){
		window.location.href="randomProdcutToPk.action?pid="+document.getElementById("dbpid1").value+"&oldid="+document.getElementById("dbpid").value+"&isleft=left";
	}else{
		window.location.href="randomProdcutToPk.action?pid="+document.getElementById("dbpid").value+"&oldid="+document.getElementById("dbpid1").value+"&isleft=right";
	}
}



//多个对比页换一款
function randomlsproduct1(rnum){
	var pkids = "";
	var ids="";
	var t = 1;
	
	while(document.getElementById("dbpid"+t) != undefined){
		if(ids==""){
			ids = document.getElementById("dbpid"+t).value;
		}else{
			ids += "," + document.getElementById("dbpid"+t).value;
		}
		t++;
	}
	$.ajax({
		async: false,
		url: "randowLsProduct1.action",
		type: "post", 
		data: {"pid":ids},
		dataType: 'json',
		success: function(data){
			if(data!=""){
				document.getElementById("dbpid"+rnum).value = data;
				var tt=1;
				while(document.getElementById("dbpid"+tt) != undefined){
					pkids += "_"+document.getElementById("dbpid"+tt).value;
					tt++;
				}
				window.location.href="product"+pkids+"_r.html";
			}
		}
	});
}

//投票     选中效果
function postVoteForPK(flag,vid){
	var pid;
	var pname;
	var vname;
	if(flag=="left"){
		if($("#lefttoupiao").val()=="true"){
			$("#leftPingjia").html("您已经评价过了！")
			setTimeout(function(){
				$("#leftPingjia").html("");
				},3000);
			return false;
		}
		pid = $("#leftid").val();
		pname = $("#leftName").val();
		vname = $("#left"+vid).text();
	}else if(flag=="right"){
		if($("#righttoupiao").val()=="true"){
			$("#rightPingjia").html("您已经评价过了！")
			setTimeout(function(){
				$("#rightPingjia").html("");
				},3000);
			return false;
		}
		pid = $("#rightid").val();
		pname = $("#rightName").val();
		vname = $("#right"+vid).text();
	}
	
	$.ajax({
		async: false,
		url: "postVoteOption.action",
		type: "post",
		data: {"pid":pid,"vid":vid,"vname":vname,"pname":pname},   //传入产品ID和投票选项ID
		dataType: 'json',
		error: function (data) {
            //alert("评价失败，请联系管理员！");
        },
		success: function(result){
			
			if(result =="success"){
				if(flag =="left"){
					$("#leftname"+vid).html("<font style='color: red;'>评价成功</font>");
					setTimeout(function(){
						$("#leftname"+vid).html(vname);
						$("#left"+vid).removeClass("yanshe1");
						$("#left"+vid).attr("class","yanshe"); //修改被选中
						},2000);
					
					$("#lefttoupiao").val("true");
				}else if(flag=="right"){
					$("#rightname"+vid).html("<font style='color: red;'>评价成功</font>");
					setTimeout(function(){
						$("#rightname"+vid).html(vname);
						$("#right"+vid).removeClass("yanshe1");
						$("#right"+vid).attr("class","yanshe"); //修改被选中
						},2000);
					
					$("#righttoupiao").val("true");
				}	
			}	
		}
		
	});
}


//页面加载点赞数量     （左边）
function getLeftPraiseNum(){
	if($("#zan").val()=="right"){
		$("#rightimg").attr("src","images/dgz2_1.jpg");
		$("#rightTop_tu").attr("class","top_tuB");
	}else if($("#zan").val()=="left"){
		$("#leftimg").attr("src","images/dgz1_1.jpg");
		$("#leftTop_tu").attr("class",'top_tuA');
	}
	var pid = $("#leftid").val(); //产品ID
	var leftCount = 0;
	$.ajax({
		async: false,
		url: "praiseForProduct.action",
		type: "post",
		data: {"pid":pid},
		dataType: 'json',
		error: function (data) {
            //alert("点赞次数加载失败，请联系管理员！");
        },
		success: function(result){
			var temp = result.split(",");
			for(var i=0;i<temp.length;i++){
				$("#leftZan").text(temp[0]);
				if(temp[1]=="null"){
					$("#leftMaxVote").css("display","none"); //隐藏
					$("#leftorther").css("display",""); 
				}else{					
					$("#leftMaxVote").css("display",""); //
					$("#leftMaxVoteName").text(temp[1]);
				}
				
			}
			leftCount = temp[0];
		}
		
	});
	return leftCount;
}
//页面加载点赞数量     （右边）
function getRightPraiseNum(){
	if($("#zan").val()=="right"){
		$("#rightimg").attr("src","images/dgz2_1.jpg");
		$("#rightTop_tu").attr("class","top_tuB");
	}else if($("#zan").val()=="left"){
		$("#leftimg").attr("src","images/dgz1_1.jpg");
		$("#leftTop_tu").attr("class",'top_tuA');
	}
	var pid = $("#rightid").val(); //产品ID
	var rightCount = 0;
	$.ajax({
		async: false,
		url: "praiseForProduct.action",
		type: "post",
		data: {"pid":pid},
		dataType: 'json',
		error: function (data) {
            //alert("点赞次数加载失败，请联系管理员！");
        },
		success: function(result){
			var temp = result.split(",");
			for(var i=0;i<temp.length;i++){
				$("#rightZan").text(temp[0]);
				if(temp[1]=="null"){
					$("#rightMaxVote").css("display","none"); //隐藏
					$("#rightorther").css("display","");
				}else{			
					$("#rightMaxVote").css("display",""); //
					$("#rightMaxVoteName").text(temp[1]);
				}
				
			}
			rightCount = temp[0];
		}
		
	});
	return rightCount;
}
//用户点赞
function postPraiseNum(flag){
	if($("#zan").val()=="left" || $("#zan").val()=="right"){
		//alert("您已经赞过了！");
	}else{
		var pid;
		var pname;
		if(flag =="left"){
			pid = $("#leftid").val();
			pname = $("#leftName").val();
		}else if(flag == "right"){
			pid = $("#rightid").val();
			pname = $("#rightName").val();
		}

		$.ajax({
			async: false,
			url: "praiseForProduct.action",
			type: "post",
			data: {"pid":pid,"update":"true","pname":pname},
			dataType: 'json',
			error: function (data) {
	            //alert("点赞失败，请联系管理员！");
	        },
			success: function(result){
				//alert(result);
				var temp = result.split(",");
				for(var i=0;i<temp.length;i++){
					if(flag =="left"){
						$("#leftimg").attr("src","images/dgz1_1.jpg");
						$("#zan").val("left");
						$("#leftTop_tu").attr("class",'top_tuA');
					}else if(flag =="right"){
						$("#rightimg").attr("src","images/dgz2_1.jpg");
						$("#zan").val("right");
						$("#rightTop_tu").attr("class","top_tuB");
						
					}
					$("#yyrdz").text(temp[0]);
					
					
					 var left = getLeftPraiseNum();
                     var right = getRightPraiseNum();
                     getPercent(left,right);
				}
				

			}
			
		});
	}
}
 //支持率百分比
function getPercent(leftnum,rightnum){
	if(leftnum ==0 && rightnum !=0){
		$("#rightPraise").text("100%");
		$("#leftPraise").text("0%");
		$("#lanPraise").css("width","100%");
		$("#hongPraise").css("width","0");
	}else if(leftnum !=0 && rightnum ==0){
		$("#leftPraise").text("100%");	
		$("#rightPraise").text("0%");
		$("#hongPraise").css("width","100%");
		$("#lanPraise").css("width","0");
	}else if(leftnum !=0 && rightnum !=0){
		var sum = parseInt(leftnum)+parseInt(rightnum);
		var left = parseInt(leftnum)/sum;
		var right = parseInt(rightnum)/sum;
        var leftvalue = left.toPercent(1);
        var rightvalue = right.toPercent(1);
        if(leftvalue =="100.0%"){
        	leftvalue ="100%";
        }else if(leftvalue =="0.0%"){
        	leftvalue = "0%";
        }
        if(rightvalue =="100.0%"){
        	rightvalue ="100%";
        }else if(rightvalue =="0.0%"){
        	rightvalue = "0%";
        }
		$("#rightPraise").text(rightvalue);
		$("#leftPraise").text(leftvalue);
		$("#lanPraise").css("width",rightvalue);
		$("#hongPraise").css("width",leftvalue);
	}else if(leftnum ==0 && rightnum ==0){
		$("#rightPraise").text("0%");
		$("#leftPraise").text("0%");
		$("#lanPraise").css("width","50%");
		$("#hongPraise").css("width","50%");
	}
}

//小数转化为百分比
Number.prototype.toPercent = function(n){
	n = n || 2;
	return ( Math.round( this * Math.pow( 10, n + 2 ) ) / Math.pow( 10, n ) ).toFixed( n ) + '%';
}


//产品印象
function LeftProductImpression(){

    var pid = $("#leftid").val(); //产品ID
	$.ajax({
		async: false,
		url: "ProductImpression.action",
		type: "post",
		data: {"pid":pid,"flagForPK":"PK"},
		dataType: 'json',
		error: function (data) {
	        //alert("产品印象页面数据加载失败，请联系管理员！");
	    },
		success: function(result){	
			var temp = result.split(",");
			for(var i=0;i<temp.length;i++){
				$("#left_price").html(temp[0]);	
				$("#left_screen").html(temp[1]);	
				$("#left_resolution").html(temp[2]);	
			}
		}
		
	});
}

//右边产品印象
function rightProductImpression(){
    var pid = $("#rightid").val(); //产品ID
	$.ajax({
		async: false,
		url: "ProductImpression.action",
		type: "post",
		data: {"pid":pid,"flagForPK":"PK"},
		dataType: 'json',
		error: function (data) {
	        //alert("产品印象页面数据加载失败，请联系管理员！");
	    },
		success: function(result){	
			var temp = result.split(",");
			for(var i=0;i<temp.length;i++){
				$("#right_price").html(temp[0]);	
				$("#right_screen").html(temp[1]);	
				$("#right_resolution").html(temp[2]);	
			}
		}
		
	});
}

function guanbi(idtab,idimg){
	if(document.getElementById(idtab).style.display==''||document.getElementById(idtab).style.display=='block'){ // == 判断div.display是否为显示
		$("#"+idtab).slideUp("fast");
		document.getElementById(idimg).src="images/jia.jpg";
	}else{
		$("#"+idtab).slideDown("fast");
		document.getElementById(idimg).src="images/jian.jpg";
	}
}

function removeone(pnum){
	document.getElementById("dbpid"+pnum).value="0";
	var pkids = "";
	var t = 1;
	
	while(document.getElementById("dbpid"+t) != undefined){
		pkids += "_"+document.getElementById("dbpid"+t).value;
		t++;
	}
	if(pkids != ""){
		window.location.href="product"+pkids+"_r.html";
	}else{
		window.location.href="list_p1.html";
	}
	
}

//多产品对比页面点赞
function PraiseNum(pid,pname){
	if($("#zan"+pid).val()=="true"){
		//alert("您已经赞过了！");
	}else{
		$.ajax({
			async: false,
			url: "praiseForProduct.action",
			type: "post",
			data: {"pid":pid,"update":"true","pname":pname},
			dataType: 'json',
			error: function (data) {
	            //alert("点赞失败，请联系管理员！");
	        },
			success: function(result){
				//alert(result);
				var temp = result.split(",");
				for(var i=0;i<temp.length;i++){
					//$("#yyrdz").text("已有"+temp[0]+"人点赞");
					//$("#maxVote").text(temp[1]);
					$("#z"+pid).removeClass("dgz");
    				$("#z"+pid).attr("class","dgz1");
    				$("#z"+pid).html("<span>"+temp[0]+"</span>");
					$("#zan"+pid).val("true");
				}
			}
			
		});
	}
}

function initBrowseLog(){
	var pid = document.getElementById("dbpid").value;
	var pid1 = document.getElementById("dbpid1").value;
	
	$.ajax({
		async: false,
		url: "getProductBrowseLog.action",
		type: "post", 
		data: {"pids":pid+","+pid1},
		dataType: 'json',
		success: function(result){
			var temp=eval(result);
			if(temp != null && temp.length>0){
				var inhtml ="<div class=\"gongyong_top\" id=\"db\" onclick=\"xdianji1()\">大家都对比的产品：</div>";
				inhtml +="<div class=\"gongyong_top1 bian\" id=\"gz\" onclick=\"xdianji2()\">大家都关注的产品：</div>";
				inhtml +="<div class=\"gongyong_nr\" id=\"gongyongnr1\" >";
				inhtml +="</div>";
				
				inhtml +="<div class=\"gongyong_nr\" id=\"gongyongnr\" style=\"display:none;\" >";
				var count = temp.length;
				if(temp.length>5){
					count = 6;
				}
				for(var i=0;i<count;i++){
					var allprice = "";
					if(temp[i].price1 != null && temp[i].price1!= undefined && temp[i].price1!="null" && temp[i].price1!=""){
						allprice=temp[i].price1;
					}
					if(temp[i].price2 != null && temp[i].price2!= undefined && temp[i].price2!="null" && temp[i].price2!=""){
						allprice+="+"+temp[i].price2;
					}
					if(temp[i].price3 != null && temp[i].price3!= undefined && temp[i].price3!="null" && temp[i].price3!=""){
						allprice+="+"+temp[i].price3;
					}
					if(temp[i].price4 != null && temp[i].price4!= undefined && temp[i].price4!="null" && temp[i].price4!=""){
						allprice+="+"+temp[i].price4;
					}
					if(temp[i].price5 != null && temp[i].price5!= undefined && temp[i].price5!="null" && temp[i].price5!=""){
						allprice+="+"+temp[i].price5;
					}
					inhtml += "<input type=\"hidden\" id=\"allprice"+temp[i].id+"\" value=\""+allprice+"\" />";
					//inhtml += "<dd onmousemove='lilandd(this)' onmouseout='lilanremove(this)'>";
					inhtml += "<ul onmousemove=\"lilandd(this)\" onmouseout=\"lilanremove(this)\">";
		            var imgpath = "images/nopic.jpg";
		            if(temp[i].image1 != null && temp[i].image1!= undefined && temp[i].image1!="null" && temp[i].image1!=""){
		            	imgpath = temp[i].image1;
		            }
		            inhtml += "<li class='li1'><a  href='productinfo_"+temp[i].id+".html'  target='_blank' onclick='productinfo2(\""+temp[i].id+"\")' ><img id=\"img"+temp[i].id+"\" src='"+imgpath+"' width='162' height='106' /></a></li>";
		            inhtml += "<li class='li2'><div class=\"li2_bb\"><a  href='productinfo_"+temp[i].id+".html'  target='_blank' onclick='productinfo2(\""+temp[i].id+"\")' id=\"pname"+temp[i].id+"\" >"+temp[i].name+"</a></div></li>";
		            var jiage ="";
		            if(temp[i].priceinfo1 != null && temp[i].priceinfo1!= undefined && temp[i].priceinfo1!="null" && temp[i].priceinfo1!=""){
		            	jiage += "<span class=\"xianshi_span\" onmousemove=\"xsjiage('lldiv"+temp[i].id+"1')\" onmouseout=\"gbjiage('lldiv"+temp[i].id+"1')\">￥"+temp[i].price1;
		            	jiage += "<div class=\"xianshi_div1\" id=\"lldiv"+temp[i].id+"1\"><div class=\"jian\"></div><div class=\"kuang\">"+temp[i].priceinfo1+"</div></div>";
		            	jiage += "</span>";
		            }else{
		            	jiage += "<span class=\"xianshi_span1\" onmousemove=\"xsjiage('lldiv"+temp[i].id+"1')\" onmouseout=\"gbjiage('lldiv"+temp[i].id+"1')\">￥"+temp[i].price1;
		            	jiage += "</span>";
		            }
		            
		            if(temp[i].price2 != null && temp[i].price2!= undefined && temp[i].price2!="null" && temp[i].price2!="" && (temp[i].price3 == null || temp[i].price3== undefined || temp[i].price3=="null" || temp[i].price3=="")){
		            	jiage += "<span>+</span>";
		            	jiage += "<span class=\"xianshi_span\" onmousemove=\"xsjiage('lldiv"+temp[i].id+"2')\" onmouseout=\"gbjiage('lldiv"+temp[i].id+"2')\">￥"+temp[i].price2;
						jiage += "<div class=\"xianshi_div3\" id=\"lldiv"+temp[i].id+"2\">";	            	
						jiage += "<div class=\"jian\"></div>";
						jiage += "<div class=\"kuang\">"+temp[i].priceinfo2+"</div>";
						jiage += "</div></span>";
		            }else if(temp[i].price2 != null && temp[i].price2!= undefined && temp[i].price2!="null" && temp[i].price2!=""){
		            	jiage += "<span>+</span>";
		            	jiage += "<span class=\"xianshi_span\" onmousemove=\"xsjiage('lldiv"+temp[i].id+"2')\" onmouseout=\"gbjiage('lldiv"+temp[i].id+"2')\">￥"+temp[i].price2;
						jiage += "<div class=\"xianshi_div2\" id=\"lldiv"+temp[i].id+"2\">";	            	
						jiage += "<div class=\"jian\"></div>";
						jiage += "<div class=\"kuang\">"+temp[i].priceinfo2+"</div>";
						jiage += "</div></span>";
		            }
		            if(temp[i].price3 != null && temp[i].price3!= undefined && temp[i].price3!="null" && temp[i].price3!="" && (temp[i].price4 == null || temp[i].price4== undefined || temp[i].price4=="null" || temp[i].price4=="")){
		            	jiage += "<span>+</span>";
		            	jiage += "<span class=\"xianshi_span\" onmousemove=\"xsjiage('lldiv"+temp[i].id+"3')\" onmouseout=\"gbjiage('lldiv"+temp[i].id+"3')\">￥"+temp[i].price3;
						jiage += "<div class=\"xianshi_div3\" id=\"lldiv"+temp[i].id+"3\">";	            	
						jiage += "<div class=\"jian\"></div>";
						jiage += "<div class=\"kuang\">"+temp[i].priceinfo3+"</div>";
						jiage += "</div></span>";
		            }else if(temp[i].price3 != null && temp[i].price3!= undefined && temp[i].price3!="null" && temp[i].price3!=""){
		            	jiage += "<span>+</span>";
		            	jiage += "<span class=\"xianshi_span\" onmousemove=\"xsjiage('lldiv"+temp[i].id+"3')\" onmouseout=\"gbjiage('lldiv"+temp[i].id+"3')\">￥"+temp[i].price3;
						jiage += "<div class=\"xianshi_div2\" id=\"lldiv"+temp[i].id+"3\">";	            	
						jiage += "<div class=\"jian\"></div>";
						jiage += "<div class=\"kuang\">"+temp[i].priceinfo3+"</div>";
						jiage += "</div></span>";
		            }
		            if(temp[i].price4 != null && temp[i].price4!= undefined && temp[i].price4!="null" && temp[i].price4!="" && (temp[i].price5 == null || temp[i].price5== undefined || temp[i].price5=="null" || temp[i].price5=="")){
		            	jiage += "<span>+</span>";
		            	jiage += "<span class=\"xianshi_span\" onmousemove=\"xsjiage('lldiv"+temp[i].id+"4')\" onmouseout=\"gbjiage('lldiv"+temp[i].id+"4')\">￥"+temp[i].price4;
						jiage += "<div class=\"xianshi_div3\" id=\"lldiv"+temp[i].id+"4\">";	            	
						jiage += "<div class=\"jian\"></div>";
						jiage += "<div class=\"kuang\">"+temp[i].priceinfo4+"</div>";
						jiage += "</div></span>";
		            }else if(temp[i].price4 != null && temp[i].price4!= undefined && temp[i].price4!="null" && temp[i].price4!=""){
		            	jiage += "<span>+</span>";
		            	jiage += "<span class=\"xianshi_span\" onmousemove=\"xsjiage('lldiv"+temp[i].id+"4')\" onmouseout=\"gbjiage('lldiv"+temp[i].id+"4')\">￥"+temp[i].price4;
						jiage += "<div class=\"xianshi_div2\" id=\"lldiv"+temp[i].id+"4\">";	            	
						jiage += "<div class=\"jian\"></div>";
						jiage += "<div class=\"kuang\">"+temp[i].priceinfo4+"</div>";
						jiage += "</div></span>";
		            }
		            if(temp[i].price5 != null && temp[i].price5!= undefined && temp[i].price5!="null" && temp[i].price5!=""){
		            	jiage += "<span>+</span>";
		            	jiage += "<span class=\"xianshi_span\" onmousemove=\"xsjiage('lldiv"+temp[i].id+"5')\" onmouseout=\"gbjiage('lldiv"+temp[i].id+"5')\">￥"+temp[i].price5;
						jiage += "<div class=\"xianshi_div3\" id=\"lldiv"+temp[i].id+"5\">";	            	
						jiage += "<div class=\"jian\"></div>";
						jiage += "<div class=\"kuang\">"+temp[i].priceinfo5+"</div>";
						jiage += "</div></span>";
		            }
		            
		            inhtml += "<li class='li3'>"+jiage+"</li>";
		            inhtml +="<input type=\"hidden\" name=\"orderId\" value=\""+temp[i].id+"\">";
		            inhtml += "<li class='li4'>"
		            //inhtml +="<a id=\""+temp[i].id+"\" class=\"gz\"  href=\"javascript:saveFrontUser("+temp[i].id+",'"+temp[i].name+"');\" ></a>" ;
		            inhtml += "<a name=\"duibiname\" id=\"duibi"+temp[i].id+"\" href=\"javascript:intocomp('"+temp[i].id+"')\" class='dbanniu'></a></li>";
		           	
		            inhtml += "</ul>";
		           // inhtml += "</dd>";
				}
				$("#dllulan").html(inhtml);
				$("#dllulan1").css("display","block");
				comparisonForTop();
			}
		}
	});
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
						jiage += "<div class=\"xianshi_div3\" id=\"lldiv"+temp[n-1].id+i+"3\">";	            	
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
						jiage2 += "<div class=\"xianshi_div2\" id=\"lldiv"+temp[n].id+i+"3\">";	            	
						jiage2 += "<div class=\"jian\"></div>";
						jiage2 += "<div class=\"kuang\">"+temp[n].priceinfo3+"</div>";
						jiage2 += "</div></span>";
		            }
		            if(temp[n].price5 != null && temp[n].price5!= undefined && temp[n].price5!="null" && temp[n].price5!=""){
		            	jiage2 += "<span>+</span>";
		            	jiage2 += "<span class=\"xianshi_span\" onmousemove=\"xsjiage('lldiv"+temp[n].id+i+"3')\" onmouseout=\"gbjiage('lldiv"+temp[n].id+i+"3')\">￥"+temp[n].price3;
						jiage2 += "<div class=\"xianshi_div3\" id=\"lldiv"+temp[n].id+i+"3\">";	            	
						jiage2 += "<div class=\"jian\"></div>";
						jiage2 += "<div class=\"kuang\">"+temp[n].priceinfo3+"</div>";
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

function initBrowseLog1(){
	var ids="";
	var t = 1;
	
	while(document.getElementById("dbpid"+t) != undefined){
		if(ids==""){
			ids = document.getElementById("dbpid"+t).value;
		}else{
			ids += "," + document.getElementById("dbpid"+t).value;
		}
		t++;
	}
	$.ajax({
		async: false,
		url: "getProductBrowseLog.action",
		type: "post", 
		data: {"pids":ids},
		dataType: 'json',
		success: function(result){
			var temp=eval(result);
			if(temp != null && temp.length>0){
				var inhtml ="<div class=\"gongyong_top\" id=\"db\" onclick=\"xdianji1()\">大家都对比的产品：</div>";
				inhtml +="<div class=\"gongyong_top1 bian\" id=\"gz\" onclick=\"xdianji2()\">大家都关注的产品：</div>";
				inhtml +="<div class=\"gongyong_nr\" id=\"gongyongnr1\" >";
				inhtml +="</div>";
				
				inhtml +="<div class=\"gongyong_nr\" id=\"gongyongnr\" style=\"display:none;\" >";
				var count = temp.length;
				if(temp.length>5){
					count = 6;
				}
				for(var i=0;i<count;i++){
					var allprice = "";
					if(temp[i].price1 != null && temp[i].price1!= undefined && temp[i].price1!="null" && temp[i].price1!=""){
						allprice=temp[i].price1;
					}
					if(temp[i].price2 != null && temp[i].price2!= undefined && temp[i].price2!="null" && temp[i].price2!=""){
						allprice+="+"+temp[i].price2;
					}
					if(temp[i].price3 != null && temp[i].price3!= undefined && temp[i].price3!="null" && temp[i].price3!=""){
						allprice+="+"+temp[i].price3;
					}
					if(temp[i].price4 != null && temp[i].price4!= undefined && temp[i].price4!="null" && temp[i].price4!=""){
						allprice+="+"+temp[i].price4;
					}
					if(temp[i].price5 != null && temp[i].price5!= undefined && temp[i].price5!="null" && temp[i].price5!=""){
						allprice+="+"+temp[i].price5;
					}
					inhtml += "<input type=\"hidden\" id=\"allprice"+temp[i].id+"\" value=\""+allprice+"\" />";
					//inhtml += "<dd onmousemove='lilandd(this)' onmouseout='lilanremove(this)'>";
					inhtml += "<ul onmousemove=\"lilandd(this)\" onmouseout=\"lilanremove(this)\">";
		            var imgpath = "images/nopic.jpg";
		            if(temp[i].image1 != null && temp[i].image1!= undefined && temp[i].image1!="null" && temp[i].image1!=""){
		            	imgpath = temp[i].image1;
		            }
		            inhtml += "<li class='li1'><a  href='productinfo_"+temp[i].id+".html'  target='_blank' onclick='productinfo2(\""+temp[i].id+"\")' ><img id=\"img"+temp[i].id+"\" src='"+imgpath+"' width='162' height='106' /></a></li>";
		            inhtml += "<li class='li2'><div class=\"li2_bb\"><a  href='productinfo_"+temp[i].id+".html'  target='_blank' onclick='productinfo2(\""+temp[i].id+"\")' id=\"pname"+temp[i].id+"\" >"+temp[i].name+"</a></div></li>";
		            var jiage ="";
		            
		            if(temp[i].priceinfo1 != null && temp[i].priceinfo1!= undefined && temp[i].priceinfo1!="null" && temp[i].priceinfo1!=""){
		            	jiage += "<span class=\"xianshi_span\" onmousemove=\"xsjiage('lldiv"+temp[i].id+"1')\" onmouseout=\"gbjiage('lldiv"+temp[i].id+"1')\">￥"+temp[i].price1;
		            	jiage += "<div class=\"xianshi_div1\" id=\"lldiv"+temp[i].id+"1\"><div class=\"jian\"></div><div class=\"kuang\">"+temp[i].priceinfo1+"</div></div>";
		            	jiage += "</span>";
		            }else{
		            	jiage += "<span class=\"xianshi_span1\" onmousemove=\"xsjiage('lldiv"+temp[i].id+"1')\" onmouseout=\"gbjiage('lldiv"+temp[i].id+"1')\">￥"+temp[i].price1;
		            	jiage += "</span>";
		            }
		            
		            if(temp[i].price2 != null && temp[i].price2!= undefined && temp[i].price2!="null" && temp[i].price2!="" && (temp[i].price3 == null || temp[i].price3== undefined || temp[i].price3=="null" || temp[i].price3=="")){
		            	jiage += "<span>+</span>";
		            	jiage += "<span class=\"xianshi_span\" onmousemove=\"xsjiage('lldiv"+temp[i].id+"2')\" onmouseout=\"gbjiage('lldiv"+temp[i].id+"2')\">￥"+temp[i].price2;
						jiage += "<div class=\"xianshi_div3\" id=\"lldiv"+temp[i].id+"2\">";	            	
						jiage += "<div class=\"jian\"></div>";
						jiage += "<div class=\"kuang\">"+temp[i].priceinfo2+"</div>";
						jiage += "</div></span>";
		            }else if(temp[i].price2 != null && temp[i].price2!= undefined && temp[i].price2!="null" && temp[i].price2!=""){
		            	jiage += "<span>+</span>";
		            	jiage += "<span class=\"xianshi_span\" onmousemove=\"xsjiage('lldiv"+temp[i].id+"2')\" onmouseout=\"gbjiage('lldiv"+temp[i].id+"2')\">￥"+temp[i].price2;
						jiage += "<div class=\"xianshi_div2\" id=\"lldiv"+temp[i].id+"2\">";	            	
						jiage += "<div class=\"jian\"></div>";
						jiage += "<div class=\"kuang\">"+temp[i].priceinfo2+"</div>";
						jiage += "</div></span>";
		            }
		            
		            if(temp[i].price3 != null && temp[i].price3!= undefined && temp[i].price3!="null" && temp[i].price3!="" && (temp[i].price4 == null || temp[i].price4== undefined || temp[i].price4=="null" || temp[i].price4=="")){
		            	jiage += "<span>+</span>";
		            	jiage += "<span class=\"xianshi_span\" onmousemove=\"xsjiage('lldiv"+temp[i].id+"3')\" onmouseout=\"gbjiage('lldiv"+temp[i].id+"3')\">￥"+temp[i].price3;
						jiage += "<div class=\"xianshi_div3\" id=\"lldiv"+temp[i].id+"3\">";	            	
						jiage += "<div class=\"jian\"></div>";
						jiage += "<div class=\"kuang\">"+temp[i].priceinfo3+"</div>";
						jiage += "</div></span>";
		            }else if(temp[i].price3 != null && temp[i].price3!= undefined && temp[i].price3!="null" && temp[i].price3!=""){
		            	jiage += "<span>+</span>";
		            	jiage += "<span class=\"xianshi_span\" onmousemove=\"xsjiage('lldiv"+temp[i].id+"3')\" onmouseout=\"gbjiage('lldiv"+temp[i].id+"3')\">￥"+temp[i].price3;
						jiage += "<div class=\"xianshi_div2\" id=\"lldiv"+temp[i].id+"3\">";	            	
						jiage += "<div class=\"jian\"></div>";
						jiage += "<div class=\"kuang\">"+temp[i].priceinfo3+"</div>";
						jiage += "</div></span>";
		            }
		            
		            if(temp[i].price4 != null && temp[i].price4!= undefined && temp[i].price4!="null" && temp[i].price4!="" && (temp[i].price5 == null || temp[i].price5== undefined || temp[i].price5=="null" || temp[i].price5=="")){
		            	jiage += "<span>+</span>";
		            	jiage += "<span class=\"xianshi_span\" onmousemove=\"xsjiage('lldiv"+temp[i].id+"4')\" onmouseout=\"gbjiage('lldiv"+temp[i].id+"4')\">￥"+temp[i].price4;
						jiage += "<div class=\"xianshi_div3\" id=\"lldiv"+temp[i].id+"4\">";	            	
						jiage += "<div class=\"jian\"></div>";
						jiage += "<div class=\"kuang\">"+temp[i].priceinfo4+"</div>";
						jiage += "</div></span>";
		            }else if(temp[i].price4 != null && temp[i].price4!= undefined && temp[i].price4!="null" && temp[i].price4!=""){
		            	jiage += "<span>+</span>";
		            	jiage += "<span class=\"xianshi_span\" onmousemove=\"xsjiage('lldiv"+temp[i].id+"4')\" onmouseout=\"gbjiage('lldiv"+temp[i].id+"4')\">￥"+temp[i].price4;
						jiage += "<div class=\"xianshi_div2\" id=\"lldiv"+temp[i].id+"4\">";	            	
						jiage += "<div class=\"jian\"></div>";
						jiage += "<div class=\"kuang\">"+temp[i].priceinfo4+"</div>";
						jiage += "</div></span>";
		            }
		            
		            if(temp[i].price5 != null && temp[i].price5!= undefined && temp[i].price5!="null" && temp[i].price5!=""){
		            	jiage += "<span>+</span>";
		            	jiage += "<span class=\"xianshi_span\" onmousemove=\"xsjiage('lldiv"+temp[i].id+"5')\" onmouseout=\"gbjiage('lldiv"+temp[i].id+"5')\">￥"+temp[i].price5;
						jiage += "<div class=\"xianshi_div3\" id=\"lldiv"+temp[i].id+"5\">";	            	
						jiage += "<div class=\"jian\"></div>";
						jiage += "<div class=\"kuang\">"+temp[i].priceinfo5+"</div>";
						jiage += "</div></span>";
		            }
		            
		            inhtml += "<li class='li3'>"+jiage+"</li>";
		            inhtml +="<input type=\"hidden\" name=\"orderId\" value=\""+temp[i].id+"\">";
		            inhtml += "<li class='li4'>"
		            //inhtml +=" <a id=\""+temp[i].id+"\" class=\"gz\" href=\"javascript:saveFrontUser("+temp[i].id+",'"+temp[i].name+"');\" ></a>" ;
		            inhtml += "<a name=\"duibiname\" id=\"duibi"+temp[i].id+"\" href=\"javascript:intocomp('"+temp[i].id+"')\" class='dbanniu'></a></li>";
		            
		            inhtml += "</ul>";
		            inhtml += "</dd>";
				}
				$("#dllulan").html(inhtml);
				$("#dllulan1").css("display","block");
				comparisonForTop();
			}
		}
	});
}

//搜索产品
function searchProduct2(){
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
						instr += "<li><a href=\"javascript:gosearchProduct('"+temp[i].pid+"','"+temp[i].pname+"');\">"+temp[i].pname+"</a></li>";
					}
					$("#ulbb").html(instr);
				}
			}
		});
	}else{
		$("#ulbb").html("");
	}
}
function gosearchProduct(id,name){
	$("#wenzhi").val(name);
	productinfo1(id);
}

function shbi(){
	var shbi=document.getElementById("shbi");
	var tubiao=document.getElementById("tubiao");
	if(shbi.className=='shangpinduibi'){
		shbi.className='shangpinduibi1';
		tubiao.src="images/gudin.jpg";
	}else{
		shbi.className='shangpinduibi';
		tubiao.src="images/qxgd.png";
	}
}

var hideids = "";

function showSame(){
	$("#btx").html("隐藏相同项");
	if(hideids1 != ""){
		var s = hideids1.split(",");
		for(var i=0;i<s.length;i++){
			$("#tr"+s[i]).show();
		}
	}
	hideids1="";
	if($("#xtx").html()=="取消"){
		$("#xtx").html("显示相同项");
		if(hideids != ""){
			var s = hideids.split(",");
			for(var i=0;i<s.length;i++){
				$("#tr"+s[i]).show();
			}
		}
		hideids="";
	}else{
		$("#xtx").html("取消");
		var pid1=$("#dbpid1").val();
		var pid2=$("#dbpid2").val();
		var pid3=$("#dbpid3").val();
		var pid4=$("#dbpid4").val();
		
		var t = 1;
		hideids="";
		while(document.getElementById("tr"+t) != undefined){
			var h1 = document.getElementById("tr"+t).firstChild.nextSibling.nextSibling.nextSibling.innerHTML;
			var h2 = document.getElementById("tr"+t).firstChild.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.innerHTML;
			var h3 = document.getElementById("tr"+t).firstChild.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.innerHTML;
			var h4 = document.getElementById("tr"+t).firstChild.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.innerHTML;
			if(pid1=="0" && pid2=="0" && pid3=="0" && pid4=="0"){
				break;
			}else{
				 if(pid1=="0"){
				 	if(pid2!="0"){
				 		h1 = h2;
				 	}else if(pid3!="0"){
				 		h1 = h3;
				 	}else if(pid4!="0"){
				 		h1 = h4;
				 	}
				 }
				 if(pid2=="0"){
				 	if(pid1!="0"){
				 		h2 = h1;
				 	}else if(pid3!="0"){
				 		h2 = h3;
				 	}else if(pid4!="0"){
				 		h2 = h4;
				 	}
				 }
				 if(pid3=="0"){
				 	if(pid1!="0"){
				 		h3 = h1;
				 	}else if(pid2!="0"){
				 		h3 = h2;
				 	}else if(pid4!="0"){
				 		h3 = h4;
				 	}
				 }
				 if(pid4=="0"){
				 	if(pid1!="0"){
				 		h4 = h1;
				 	}else if(pid2!="0"){
				 		h4 = h2;
				 	}else if(pid3!="0"){
				 		h4 = h3;
				 	}
				 }
			}
			
			if(h1 != h2 || h2 != h3 || h3 != h4 || h1 != h3 || h1 != h4 || h2 != h4){
				if(document.getElementById("tr"+t).style.display != "none"){
					if(hideids == ""){
						hideids = t+"";
					}else{
						hideids += ","+t;
					}
				}
				$("#tr"+t).hide();
			}
			t++;
		}
	}
	
}

var hideids1 = "";

function hideSame(){
	$("#xtx").html("显示相同项");
	if(hideids != ""){
		var s = hideids.split(",");
		for(var i=0;i<s.length;i++){
			$("#tr"+s[i]).fadeIn("fast");
		}
	}
	hideids="";
	if($("#btx").html()=="取消"){
		$("#btx").html("隐藏相同项");
		if(hideids1 != ""){
			var s = hideids1.split(",");
			for(var i=0;i<s.length;i++){
				$("#tr"+s[i]).fadeIn("fast");
			}
		}
		hideids1="";
	}else{
		$("#btx").html("取消");
		var pid1=$("#dbpid1").val();
		var pid2=$("#dbpid2").val();
		var pid3=$("#dbpid3").val();
		var pid4=$("#dbpid4").val();
		
		var t = 1;
		hideids1="";
		while(document.getElementById("tr"+t) != undefined){
			var h1 = document.getElementById("tr"+t).firstChild.nextSibling.nextSibling.nextSibling.innerHTML;
			var h2 = document.getElementById("tr"+t).firstChild.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.innerHTML;
			var h3 = document.getElementById("tr"+t).firstChild.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.innerHTML;
			var h4 = document.getElementById("tr"+t).firstChild.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.innerHTML;
			if(pid1=="0" && pid2=="0" && pid3=="0" && pid4=="0"){
				break;
			}else{
				 if(pid1=="0"){
				 	if(pid2!="0"){
				 		h1 = h2;
				 	}else if(pid3!="0"){
				 		h1 = h3;
				 	}else if(pid4!="0"){
				 		h1 = h4;
				 	}
				 }
				 if(pid2=="0"){
				 	if(pid1!="0"){
				 		h2 = h1;
				 	}else if(pid3!="0"){
				 		h2 = h3;
				 	}else if(pid4!="0"){
				 		h2 = h4;
				 	}
				 }
				 if(pid3=="0"){
				 	if(pid1!="0"){
				 		h3 = h1;
				 	}else if(pid2!="0"){
				 		h3 = h2;
				 	}else if(pid4!="0"){
				 		h3 = h4;
				 	}
				 }
				 if(pid4=="0"){
				 	if(pid1!="0"){
				 		h4 = h1;
				 	}else if(pid2!="0"){
				 		h4 = h2;
				 	}else if(pid3!="0"){
				 		h4 = h3;
				 	}
				 }
			}
			
			if(h1 == h2 && h2 == h3 && h3 == h4){
				if(document.getElementById("tr"+t).style.display != "none"){
					if(hideids1 == ""){
						hideids1 = t+"";
					}else{
						hideids1 += ","+t;
					}
				}
				$("#tr"+t).fadeOut("fast");
			}
			t++;
		}
	}
	
}

function searchProductbyBrand(id,flag){
	if(id !=null && id!=""){
		$.ajax({
			async: false,
			url: "searchProductForBrand.action",
			type: "post", 
			data: {"BrandId":id},
			dataType: 'json',
			success: function(result){
				
				var temp=eval(result);
				var instr = "";
				if(flag =="left"){
					if(temp != null && temp != undefined && temp.length>0){
						//document.getElementById("xinghao").style.display="block";
						//document.getElementById("xinghao2").style.display="block";
						for(var i=0;i<temp.length;i++){
							instr += "<li title=\""+temp[i].pname+"\" ><b onclick=\"javascript:changeTheProduct1('"+temp[i].pid+"','"+temp[i].pname+"');\" >"+temp[i].pname+"</b></li>";
						}
						$("#xinghao_left").html(instr);
					}else{
						$("#xinghao_left").html("");
					}
				}else if(flag=="right"){
					if(temp != null && temp != undefined && temp.length>0){
						//document.getElementById("xinghao").style.display="block";
						//document.getElementById("xinghao2").style.display="block";
						for(var i=0;i<temp.length;i++){
							instr += "<li title=\""+temp[i].pname+"\" ><b onclick=\"javascript:changeTheProduct2('"+temp[i].pid+"','"+temp[i].pname+"');\" >"+temp[i].pname+"</b></li>";
						}
						$("#xinghao_right").html(instr);
					}else{
						$("#xinghao_right").html("");
					}
				}
				
			}
		});
	}
}

function searchProductbyBrand1(id,flag){
	if(id !=null && id!=""){
		$.ajax({
			async: false,
			url: "searchProductForBrand.action",
			type: "post", 
			data: {"BrandId":id},
			dataType: 'json',
			success: function(result){
				
				var temp=eval(result);
				var instr = "";
				if(flag =="1"){
					if(temp != null && temp != undefined && temp.length>0){
						for(var i=0;i<temp.length;i++){
							instr += "<li title=\""+temp[i].pname+"\" ><b onclick=\"javascript:changeTheProduct('"+temp[i].pid+"','"+temp[i].pname+"','1');\" >"+temp[i].pname+"</b></li>";
						}
						$("#xinghao_1").html(instr);
					}else{
						$("#xinghao_1").html("");
					}
				}else if(flag=="2"){
					if(temp != null && temp != undefined && temp.length>0){
						for(var i=0;i<temp.length;i++){
							instr += "<li title=\""+temp[i].pname+"\" ><b onclick=\"javascript:changeTheProduct('"+temp[i].pid+"','"+temp[i].pname+"','2');\" >"+temp[i].pname+"</b></li>";
						}
						$("#xinghao_2").html(instr);
					}else{
						$("#xinghao_2").html("");
					}
				}else if(flag=="3"){
					if(temp != null && temp != undefined && temp.length>0){
						for(var i=0;i<temp.length;i++){
							instr += "<li title=\""+temp[i].pname+"\" ><b onclick=\"javascript:changeTheProduct('"+temp[i].pid+"','"+temp[i].pname+"','3');\" >"+temp[i].pname+"</b></li>";
						}
						$("#xinghao_3").html(instr);
					}else{
						$("#xinghao_3").html("");
					}
				}else if(flag=="4"){
					if(temp != null && temp != undefined && temp.length>0){
						for(var i=0;i<temp.length;i++){
							instr += "<li title=\""+temp[i].pname+"\" ><b onclick=\"javascript:changeTheProduct('"+temp[i].pid+"','"+temp[i].pname+"','4');\" >"+temp[i].pname+"</b></li>";
						}
						$("#xinghao_4").html(instr);
					}else{
						$("#xinghao_4").html("");
					}
				}
				
			}
		});
	}
}

function changeTheProduct1(pid,pname){
	var aH3= document.getElementById('sel_left').getElementsByTagName('h3');
	aH3[1].innerHTML= pname;
	window.location.href ="product_"+pid+"_vs_"+document.getElementById("dbpid1").value+"_r.html";
}

function changeTheProduct2(pid,pname){
	var aH3= document.getElementById('sel_right').getElementsByTagName('h3');
	aH3[1].innerHTML= pname;
	window.location.href ="product_"+document.getElementById("dbpid").value+"_vs_"+pid+"_r.html";
}

function changeTheProduct(pid,pname,pnum){
	var aH3= document.getElementById('sel_'+pnum).getElementsByTagName('h3');
	aH3[1].innerHTML= pname;
	
	document.getElementById("dbpid"+pnum).value=pid;
	var pkids = "";
	var t = 1;
	
	while(document.getElementById("dbpid"+t) != undefined){
		pkids += "_"+document.getElementById("dbpid"+t).value;
		t++;
	}
	if(pkids != ""){
		window.location.href="product"+pkids+"_r.html";
	}else{
		window.location.href="list_p1.html";
	}
}
