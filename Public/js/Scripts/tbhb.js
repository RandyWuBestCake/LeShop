
function huan_a1() {
	alert("已经是第一题了");
}
function huan_a2() {
	
	var div = $("#J_UL");
	if (div.hasClass("dest")) {
		div.removeClass("dest").animate({left:0}, 400);
	} else {
		div.addClass("dest").animate({left:0}, 400);
	}
	document.getElementById("J_UL").style.left = 0 + "px";
	document.getElementById("huan_A1").style.display = "none";
	document.getElementById("huan_A2").style.display = "none";
	document.getElementById("huan_A3").style.display = "none";
	document.getElementById("huan_A4").style.display = "none";
	document.getElementById("huan_A5").style.display = "none";
	document.getElementById("huan_B1").style.display = "block";
	document.getElementById("huan_B2").style.display = "none";
	document.getElementById("huan_B3").style.display = "none";
	document.getElementById("huan_B4").style.display = "none";
	document.getElementById("huan_B5").style.display = "none";
	document.getElementById("quandiv1").className = "ys2";
	document.getElementById("quandiv2").className = "ys3";
	document.getElementById("quandiv3").className = "ys3";
	document.getElementById("quandiv4").className = "ys3";
	document.getElementById("quandiv5").className = "ys3";
}
function huan_a3() {
	var div = $("#J_UL");
	if (div.hasClass("dest")) {
		div.removeClass("dest").animate({left:-500}, 400);
	} else {
		div.addClass("dest").animate({left:-500}, 400);
	}
	document.getElementById("huan_A1").style.display = "none";
	document.getElementById("huan_A2").style.display = "block";
	document.getElementById("huan_A3").style.display = "none";
	document.getElementById("huan_A4").style.display = "none";
	document.getElementById("huan_A5").style.display = "none";
	document.getElementById("huan_B1").style.display = "none";
	document.getElementById("huan_B2").style.display = "block";
	document.getElementById("huan_B3").style.display = "none";
	document.getElementById("huan_B4").style.display = "none";
	document.getElementById("huan_B5").style.display = "none";
	document.getElementById("quandiv1").className = "ys1";
	document.getElementById("quandiv2").className = "ys2";
	document.getElementById("quandiv3").className = "ys3";
	document.getElementById("quandiv4").className = "ys3";
	document.getElementById("quandiv5").className = "ys3";
}
function huan_a4() {
	var div = $("#J_UL");
	if (div.hasClass("dest")) {
		div.removeClass("dest").animate({left:-1000}, 400);
	} else {
		div.addClass("dest").animate({left:-1000}, 400);
	}
	document.getElementById("huan_A1").style.display = "none";
	document.getElementById("huan_A2").style.display = "none";
	document.getElementById("huan_A3").style.display = "block";
	document.getElementById("huan_A4").style.display = "none";
	document.getElementById("huan_A5").style.display = "none";
	document.getElementById("J_UL").style.left = -1000 + "px";
	document.getElementById("huan_B1").style.display = "none";
	document.getElementById("huan_B2").style.display = "none";
	document.getElementById("huan_B3").style.display = "block";
	document.getElementById("huan_B4").style.display = "none";
	document.getElementById("huan_B5").style.display = "none";
	document.getElementById("quandiv1").className = "ys1";
	document.getElementById("quandiv2").className = "ys1";
	document.getElementById("quandiv3").className = "ys2";
	document.getElementById("quandiv4").className = "ys3";
	document.getElementById("quandiv5").className = "ys3";
}
function huan_a5() {
	var div = $("#J_UL");
	if (div.hasClass("dest")) {
		div.removeClass("dest").animate({left:-1500}, 400);
	} else {
		div.addClass("dest").animate({left:-1500}, 400);
	}
	document.getElementById("huan_A1").style.display = "none";
	document.getElementById("huan_A2").style.display = "none";
	document.getElementById("huan_A3").style.display = "none";
	document.getElementById("huan_A4").style.display = "block";
	document.getElementById("huan_A5").style.display = "none";
	document.getElementById("huan_B1").style.display = "none";
	document.getElementById("huan_B2").style.display = "none";
	document.getElementById("huan_B3").style.display = "none";
	document.getElementById("huan_B4").style.display = "block";
	document.getElementById("huan_B5").style.display = "none";
	document.getElementById("quandiv1").className = "ys1";
	document.getElementById("quandiv2").className = "ys1";
	document.getElementById("quandiv3").className = "ys1";
	document.getElementById("quandiv4").className = "ys2";
	document.getElementById("quandiv5").className = "ys3";
}
function huan_b1() {
	var div = $("#J_UL");
	if (div.hasClass("dest")) {
		div.removeClass("dest").animate({left:-500}, 400);
	} else {
		div.addClass("dest").animate({left:-500}, 400);
	}
	document.getElementById("huan_A1").style.display = "none";
	document.getElementById("huan_A2").style.display = "block";
	document.getElementById("huan_A3").style.display = "none";
	document.getElementById("huan_A4").style.display = "none";
	document.getElementById("huan_A5").style.display = "none";
	document.getElementById("huan_B1").style.display = "none";
	document.getElementById("huan_B3").style.display = "none";
	document.getElementById("huan_B4").style.display = "none";
	document.getElementById("huan_B5").style.display = "none";
	document.getElementById("quandiv1").className = "ys1";
	document.getElementById("quandiv2").className = "ys2";
	document.getElementById("quandiv3").className = "ys3";
	document.getElementById("quandiv4").className = "ys3";
	document.getElementById("quandiv5").className = "ys3";
	var t =1;
	while(document.getElementById("xx2"+t) != undefined){
		if(document.getElementById("xx2"+t).className=="p2"){
			document.getElementById("huan_B2").style.display = "block";
			break;
		}
		t++;
	}
}

function huan_b2() {
	var div = $("#J_UL");
	if (div.hasClass("dest")) {
		div.removeClass("dest").animate({left:-1000}, 400);
	} else {
		div.addClass("dest").animate({left:-1000}, 400);
	}
	document.getElementById("huan_A1").style.display = "none";
	document.getElementById("huan_A2").style.display = "none";
	document.getElementById("huan_A3").style.display = "block";
	document.getElementById("huan_A4").style.display = "none";
	document.getElementById("huan_A5").style.display = "none";
	document.getElementById("huan_B1").style.display = "none";
	document.getElementById("huan_B2").style.display = "none";
	document.getElementById("huan_B4").style.display = "none";
	document.getElementById("huan_B5").style.display = "none";
	document.getElementById("quandiv1").className = "ys1";
	document.getElementById("quandiv2").className = "ys1";
	document.getElementById("quandiv3").className = "ys2";
	document.getElementById("quandiv4").className = "ys3";
	document.getElementById("quandiv5").className = "ys3";
	var t =1;
	while(document.getElementById("xx3"+t) != undefined){
		if(document.getElementById("xx3"+t).className=="p2"){
			document.getElementById("huan_B3").style.display = "block";
			break;
		}
		t++;
	}
}
function huan_b3() {
	var div = $("#J_UL");
	if (div.hasClass("dest")) {
		div.removeClass("dest").animate({left:-1500}, 400);
	} else {
		div.addClass("dest").animate({left:-1500}, 400);
	}
	document.getElementById("J_UL").style.left = -1500 + "px";
	document.getElementById("huan_A1").style.display = "none";
	document.getElementById("huan_A2").style.display = "none";
	document.getElementById("huan_A3").style.display = "none";
	document.getElementById("huan_A4").style.display = "block";
	document.getElementById("huan_A5").style.display = "none";
	document.getElementById("huan_B1").style.display = "none";
	document.getElementById("huan_B2").style.display = "none";
	document.getElementById("huan_B3").style.display = "none";
	document.getElementById("huan_B5").style.display = "none";
	document.getElementById("quandiv1").className = "ys1";
	document.getElementById("quandiv2").className = "ys1";
	document.getElementById("quandiv3").className = "ys1";
	document.getElementById("quandiv4").className = "ys2";
	document.getElementById("quandiv5").className = "ys3";
	var t =1;
	while(document.getElementById("xx4"+t) != undefined){
		if(document.getElementById("xx4"+t).className=="p2"){
			document.getElementById("huan_B4").style.display = "block";
			break;
		}
		t++;
	}
}
function huan_b4() {
	var div = $("#J_UL");
	if (div.hasClass("dest")) {
		div.removeClass("dest").animate({left:-2000}, 400);
	} else {
		div.addClass("dest").animate({left:-2000}, 400);
	}
	document.getElementById("huan_A1").style.display = "none";
	document.getElementById("huan_A2").style.display = "none";
	document.getElementById("huan_A3").style.display = "none";
	document.getElementById("huan_A4").style.display = "none";
	document.getElementById("huan_A5").style.display = "block";
	document.getElementById("huan_B1").style.display = "none";
	document.getElementById("huan_B2").style.display = "none";
	document.getElementById("huan_B3").style.display = "none";
	document.getElementById("huan_B4").style.display = "none";
	document.getElementById("quandiv1").className = "ys1";
	document.getElementById("quandiv2").className = "ys1";
	document.getElementById("quandiv3").className = "ys1";
	document.getElementById("quandiv4").className = "ys1";
	document.getElementById("quandiv5").className = "ys2";
	var t =1;
	while(document.getElementById("xx5"+t) != undefined){
		if(document.getElementById("xx5"+t).className=="p2"){
			document.getElementById("huan_B5").style.display = "block";
			break;
		}
		t++;
	}
}
function huan_b5() {
	var itemids="";
	for(var i=1;i<6;i++){
		
		if(document.getElementById("xx"+i+"1").className=="p1"&&document.getElementById("xx"+i+"2").className=="p1"&&document.getElementById("xx"+i+"3").className=="p1"){
			alert("第"+i+"个问题您还没有回答");
			return false;
		}
		var qids = "";
		for(var j=1;j<4;j++){
			if(document.getElementById("xx"+i+j).className=="p2"){
				if(qids ==""){
					qids = document.getElementById("xx"+i+j).getAttribute("itemid");
				}else{
					qids += "," + document.getElementById("xx"+i+j).getAttribute("itemid");
				}
			}
		}
		if(itemids ==""){
			itemids = qids;
		}else{
			itemids += "A" + qids;
		}
	}
	window.open("questionProduct.action?itemids="+itemids);
}

function huanlj_b1() {
	var t =1;
	var isx = false;
	while(document.getElementById("xx1"+t) != undefined){
		if(document.getElementById("xx1"+t).className=="p2"){
			document.getElementById("huan_B1").style.display = "block";
			isx = true;
			break;
		}
		t++;
	}
	if(!isx){
		document.getElementById("huan_B1").style.display = "none";
	}
}
function huanlj_b2() {
	var t =1;
	var isx = false;
	while(document.getElementById("xx2"+t) != undefined){
		if(document.getElementById("xx2"+t).className=="p2"){
			document.getElementById("huan_B2").style.display = "block";
			isx = true;
			break;
		}
		t++;
	}
	if(!isx){
		document.getElementById("huan_B2").style.display = "none";
	}
}
function huanlj_b3() {
	var t =1;
	var isx = false;
	while(document.getElementById("xx3"+t) != undefined){
		if(document.getElementById("xx3"+t).className=="p2"){
			document.getElementById("huan_B3").style.display = "block";
			isx = true;
			break;
		}
		t++;
	}
	if(!isx){
		document.getElementById("huan_B3").style.display = "none";
	}
}
function huanlj_b4() {
	var t =1;
	var isx = false;
	while(document.getElementById("xx4"+t) != undefined){
		if(document.getElementById("xx4"+t).className=="p2"){
			document.getElementById("huan_B4").style.display = "block";
			isx = true;
			break;
		}
		t++;
	}
	if(!isx){
		document.getElementById("huan_B4").style.display = "none";
	}
}
function huanlj_b5() {
	var t =1;
	var isx = false;
	while(document.getElementById("xx5"+t) != undefined){
		if(document.getElementById("xx5"+t).className=="p2"){
			document.getElementById("huan_B5").style.display = "block";
			isx = true;
			break;
		}
		t++;
	}
	if(!isx){
		document.getElementById("huan_B5").style.display = "none";
	}
}

var ele = document.getElementById("J_UL");
var w = ele.clientWidth;
var n = 20, t = 20;
var timers = new Array(n);
function doSlide() {
	var x = ele.scrollLeft;
	var d = this.index * w - x;
	if (!d) {
		return;
	}
	for (var i = 0; i < n; i++) {
		(function () {
			if (timers[i]) {
				clearTimeout(timers[i]);
			}
			var j = i;
			timers[i] = setTimeout(function () {
				ele.scrollLeft = x + Math.round(d * Math.sin(Math.PI * (j + 1) / (2 * n)));
			}, (i + 1) * t);
		})();
	}
}

