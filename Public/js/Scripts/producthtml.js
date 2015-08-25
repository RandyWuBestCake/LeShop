//页面加载
$(document).ready(function(){
	
	getVote();
	getPraiseNum();
	getProductImpression();
	initBrowseLog2();
	initCompare();//初始化对比栏
	
	verificationFrontUser();//初始化关注
	var urls = window.location.href;
	var url = urls + "?cps_id=u_p_byb";
	//var bd_params = "{'url':"+url+",'pic':http://shop.letv.com/biyibi/images/lby.jpg,'desc':'OMG，如此强大功能的电视怎能不让你心动。还在犹豫什么？细节决定成败，快来了解一下"+$("#pname").val()+"吧','text':'OMG，如此强大功能的电视怎能不让你心动。还在犹豫什么？细节决定成败，快来了解一下"+$("#pname").val()+"吧'}";
	var bd_params = "{'url':"+url+",'pic':http://shop.letv.com/biyibi/images/lby.jpg,'desc':'就你了！外观美腻功能棒，价格亲民内容赞~有了比一比，电视选美so easy！标签简单明了，参数完整到想哭，比一比实在太强大~一下就知道我想要TA！@超级电视 快到碗里来~','text':'就你了！外观美腻功能棒，价格亲民内容赞~有了比一比，电视选美so easy！标签简单明了，参数完整到想哭，比一比实在太强大~一下就知道我想要TA！@超级电视 快到碗里来~'}";
	$("#bdshare").attr('data',bd_params);
	setTimeout("towl()",2000);
}); 

//页面加载投票选项
function getVote(){
	
	$.ajax({
		async: false,
		url: "getVoteOption.action",
		type: "post",
		data: "",
		dataType: 'json',
		error: function (data) {
            //alert("投票选项页面数据加载失败，请联系管理员！");
        },
		success: function(result){
			$("#vote").html(result);
		}
		
	});
}
//投票     选中效果
function postVote(vid){
	if($("#toupiao").val()=="true"){
		$("#Pingjia").html("您已经评价过了！")
		setTimeout(function(){
			$("#Pingjia").html("");
			},3000);
		return false;
	}
	var pid = $("#pid").val(); //产品ID
	var pname = $("#pname"+pid).text();
	var vname = $("#"+vid).text();
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
				$("#"+vid).html("<font style='color: red;'>评价成功</font>");
				setTimeout(function(){
					$("#"+vid).html(vname);
					$("#c_"+vid).removeClass("yanshe1");
					$("#c_"+vid).attr("class","yanshe"); //修改被选中
					},2000);
				
				$("#toupiao").val("true");
				
			}	
		}
		
	});
}

//页面加载点赞数量
function getPraiseNum(){
	$("#yyrdz").removeClass("class");
	if($("#zan").val()=="true"){
		//$("#zanimg").attr("src","images/yzg.jpg");
		//$("#yyrdz").removeClass("class");
		$("#yyrdz").attr("class","dgz1");
	}else{
		$("#yyrdz").attr("class","dgz");
	}	
	var pid = $("#pid").val(); //产品ID
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
				//$("#yyrdz").text("已有"+temp[0]+"人点赞");
				if(temp[1]=="null"){
					$("#maxVoteAll").css("display","none"); //隐藏
				}else{					
					if($("#zan").val()=="true"){
						$("#yyrdz").html("<span>"+temp[0]+"</span>");
					}
					$("#maxVote").text(temp[1]);
				}
				
			}
			
		}
		
	});
	
}
//用户点赞
function postPraiseNum(){
	if($("#zan").val()=="true"){
		//alert("您已经赞过了！");
	}else{
		var pid = $("#pid").val(); //产品ID
		var pname = $("#pname"+pid).text();
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
					//$("#zanimg").attr("src","images/yzg.jpg");
					$("#yyrdz").removeClass("class");
					$("#yyrdz").attr("class","dgz1");
					$("#yyrdz").html("<span>"+temp[0]+"</span>");
					$("#maxVote").text(temp[1]);
					$("#zan").val("true");
				}
				

			}
			
		});
	}
}
// 页面加载产品印象
function getProductImpression(){
	var pid = $("#pid").val(); //产品ID
	$.ajax({
		async: false,
		url: "ProductImpression.action",
		type: "post",
		data: {"pid":pid},
		dataType: 'json',
		error: function (data) {
            //alert("产品印象页面数据加载失败，请联系管理员！");
        },
		success: function(result){
			
			$("#yinxiang").html(result);
		}
		
	});
}

function sousuozk(){
	document.getElementById("ulbb").style.display="block";
	if(document.getElementById("wenzhi").value=='品牌+尺寸模糊搜索'){
		document.getElementById("wenzhi").value='';
		document.getElementById("wenzhi").style.color="#333";
	}
}      
function sousuogb(){
	 document.getElementById("ulbb").style.display="none";
	 if(document.getElementById("wenzhi").value==''){
		document.getElementById("wenzhi").value='品牌+尺寸模糊搜索';
		document.getElementById("wenzhi").style.color="#999";
		}
	}


function ghcpzk(){
	document.getElementById("genghuanchanp").style.display="block";
	}
function ghcpgb(){
    document.getElementById("genghuanchanp").style.display="none";
} 
//电视图片切换
function changeImage(id){
	if(id=="1"){
		$("#img1").css("display",""); 
		$("#img2").css("display","none");
		$("#img3").css("display","none");
		$("#aimg1").attr("class","div1");
		$("#aimg2").removeClass("div1");
		$("#aimg3").removeClass("div1");
	}else if(id=="2"){
		$("#img2").css("display",""); 
		$("#img1").css("display","none");
		$("#img3").css("display","none");
		$("#aimg2").attr("class","div1");
		$("#aimg1").removeClass("div1");
		$("#aimg3").removeClass("div1");
	}else if(id=="3"){
		$("#img3").css("display",""); 
		$("#img2").css("display","none");
		$("#img1").css("display","none");
		$("#aimg3").attr("class","div1");
		$("#aimg2").removeClass("div1");
		$("#aimg1").removeClass("div1");
	}
	
}



function yyrdzxs(){
document.getElementById("yyrdz").style.display="block";
}
function yyrdzyc(){
document.getElementById("yyrdz").style.display="none";
}
function sousuozk() {
	document.getElementById("ulbb").style.display = "block";
	if (document.getElementById("wenzhi").value == "\u54c1\u724c+\u5c3a\u5bf8\u6a21\u7cca\u641c\u7d22") {
		document.getElementById("wenzhi").value = "";
		document.getElementById("wenzhi").style.color = "#333";
	}
}
function sousuogb() {
	document.getElementById("ulbb").style.display = "none";
	if (document.getElementById("wenzhi").value == "") {
		document.getElementById("wenzhi").value = "\u54c1\u724c+\u5c3a\u5bf8\u6a21\u7cca\u641c\u7d22";
		document.getElementById("wenzhi").style.color = "#999";
	}
}


//随机换一款乐视tv
function randomlsproduct(){
	var pid = document.getElementById('pid').value;
	$.ajax({
		async: false,
		url: "randowLsProduct1.action",
		type: "post", 
		data: {"pid":pid},
		dataType: 'json',
		success: function(data){
			if(data!=""){
				window.location.href="productinfo_"+data+".html";
			}
		}
	});
}

//与乐视tvpk
function pkvslsproduct(){
	var pid = document.getElementById('pid').value;
	$.ajax({
		async: false,
		url: "randowLsProduct.action",
		type: "post", 
		data: {"pid":pid},
		dataType: 'json',
		success: function(data){
			if(data!=""){
				window.open("product_"+pid+"_vs_"+data+".html");
			}
		}
	});
}


function initBrowseLog2(){
	var pid = document.getElementById('pid').value;
	$.ajax({
		async: false,
		url: "getProductBrowseLog.action",
		type: "post", 
		data: {"pids":pid},
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
		            inhtml += "<li class='li1'><a href='productinfo_"+temp[i].id+".html'  target='_blank' onclick='productinfo2(\""+temp[i].id+"\")' ><img id=\"img"+temp[i].id+"\" src='"+imgpath+"' width='162' height='108' /></a></li>";
		            inhtml += "<li class='li2'><div class='li2_bb'><a href='productinfo_"+temp[i].id+".html'  target='_blank' onclick='productinfo2(\""+temp[i].id+"\")' id=\"pname"+temp[i].id+"\" >"+temp[i].name+"</a></div></li>";
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
		            	jiage += "<span class=\"xianshi_span\" onmousemove=\"xsjiage('lldiv"+temp[i].id+"3')\" onmouseout=\"gbjiage('lldiv"+temp[i].id+"3')\">￥"+temp[i].price3;
						jiage += "<div class=\"xianshi_div3\" id=\"lldiv"+temp[i].id+"3\">";	            	
						jiage += "<div class=\"jian\"></div>";
						jiage += "<div class=\"kuang\">"+temp[i].priceinfo3+"</div>";
						jiage += "</div></span>";
		            }
		            
		            inhtml += "<li class='li3'>"+jiage+"</li>";
		            inhtml +="<input type=\"hidden\" name=\"orderId\" value=\""+temp[i].id+"\">";
		            inhtml += "<li class='li4'>" ;
		           // inhtml += "<a id=\"ls_"+temp[i].id+"\" href=\"javascript:saveFrontUserForOrther("+temp[i].id+",'"+temp[i].name+"',"+temp[i].isls+");\" class=\"gz\"></a>";
		            inhtml += "<a name=\"duibiname\" id=\"duibi"+temp[i].id+"\" href=\"javascript:intocomp('"+temp[i].id+"')\" class='dbanniu'></a></li>";
		           
                    
		            
		            
		            //inhtml += "<li class='li5'><a href='"+temp[i].buyurl+"' target='_blank'><img src='images/ljyd.jpg' width='100' height='25' /></a></li>";
		            inhtml += "</ul>";
		            //inhtml += "</dd>";
				}
				$("#dllulan").html(inhtml);
				$("#dllulan1").css("display","block");
				comparisonForTop();
			}else{
				$("#dllulan").html("暂无数据");
				$("#dllulan1").css("display","block");
				comparisonForTop();
			}
		}
	});
}

//都对比的
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

function searchProduct3(){
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
	document.location.href ="productinfo_"+id+".html";	
	var userid = -1;
	var tuid = getCookie("COOKIE_USER_ID");
	if(tuid != null && tuid != undefined && tuid != ""){
		userid = tuid;
	}
	$.ajax({
   		url: "saveProductBrowseLog.action",
   		type: "post",
   		data: {"pid":id,"userid":userid}, 
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


function searchProductbyBrand(id){
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
				if(temp != null && temp != undefined && temp.length>0){
					//document.getElementById("xinghao").style.display="block";
					//document.getElementById("xinghao2").style.display="block";
					for(var i=0;i<temp.length;i++){
						instr += "<li ><b onclick=\"javascript:changeDbProduct1('"+temp[i].pid+"','"+temp[i].pname+"');\" >"+temp[i].pname+"</b></li>";
					}
					$("#xinghao").html(instr);
				}else{
					$("#xinghao").html("");
				}
			}
		});
	}
}
function changeDbProduct1(id,name){
	document.location.href="productinfo_"+id+".html";
}

function towl(){
	//return false;
	var wl = unescape(getCookie("wordlink"));
	if(wl != ""){
		var t1 = new Array();
		t1 = wl.split("^^^");
		for(var i=0;i<t1.length;i++){
			var temp = $("#body1").html();
			var temp1 = $("#body2").html();
			
			$("#body1").html(temp.replace(new RegExp(t1[i].split("$$$")[0],"gm"),"<a href=\""+t1[i].split("$$$")[1]+"\" target=\"_blank\" style=\"color:#165db5;text-decoration:underline;\">"+t1[i].split("$$$")[0]+"</a>"));
			$("#body2").html(temp1.replace(new RegExp(t1[i].split("$$$")[0],"gm"),"<a href=\""+t1[i].split("$$$")[1]+"\" target=\"_blank\" style=\"color:#165db5;text-decoration:underline;\">"+t1[i].split("$$$")[0]+"</a>"));
		}
	}
}

