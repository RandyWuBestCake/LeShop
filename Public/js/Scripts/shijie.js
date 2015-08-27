function getContextPath() {
	var contextPath = document.location.pathname;
	var index = contextPath.substr(1).indexOf("/");
	var cp = contextPath.substr(1, index);

	if (/kankan|shijie|wenda|video/.test(cp)) {
		return "/" + cp + "/";
	}

	return "/";
};
function getDomain(){
	var url = top.location.href;
	url= url.replace(document.location.pathname,'');
	url= url.split('#')[0];
	return url;
}
/**
 * 文章明细页标题连接
 */
function getArtiPageUrl(id, pubDate, artiPageNo) {
	window.location = pubDate + id + '_' + artiPageNo + '.html';
}
/**
 * 文章明细连接
 */
function getArtiDetailUrl(id, pubDate, artiPageNo) {
	$.ajaxSetup({ 
		async : false 
	}); 
	$.post(getContextPath() + "comm.do?act=hitlog", {
		dateType : 1,
		objId : id
	}, function(result) {
		var openUrl = getDomain() + getContextPath() + pubDate + id + '_' + artiPageNo + '.html';
		window.open(openUrl);
	});

}

function getArtiDetailCommentsUrl(id, pubDate, artiPageNo) {
	$.ajaxSetup({ 
		async : false 
	}); 
	$.post(getContextPath() + "comm.do?act=hitlog", {
		dateType : 1,
		objId : id
	}, function(result) {
		var openUrl = getDomain() + getContextPath() + pubDate + id + '_' + artiPageNo + '.html#comments';
		window.open(openUrl);
	});

}
function savHitLog(id){
	//console.log($.cookie('letv_arti_hits')+"|"+id);
	if(id!=$.cookie('letv_arti_hits')||0){
		$.cookie('letv_arti_hits', id);
		$.post(getContextPath() + "comm.do?act=hitlog", {
			dateType : 1,
			objId : id
		}, function(result) {
			//console.log("ok");
		});

	}
}
/**
 * 点击广告更新点击数
 */
function getAdvertisUrl(id, linkUrl) {
	$.ajaxSetup({
		async : false
	});
	$.post(getContextPath() + "comm.do?act=hitlog", {
		dateType : 2,
		objId : id
	}, function(result) {
		if(linkUrl!=null&&(linkUrl!='')){
			window.open(linkUrl);
		}
	});

}

/**
 * 认为有用
 */
function isUseful(id, ishitted) {
	if (ishitted == '0') {
		$.post(getContextPath() + "comm.do?act=isuseful", {
			objId : id
		}, function(result) {
			//var i = $("#iuseful_" + id).html();
			//$("#iuseful_" + id).html(eval(i) + 1);
			//$("#iuseful2_" + id).html((eval(i) + 1)+"人认为有用");
			$("#iuseful2_" + id).removeClass().addClass("dianzan yizan");
			//绑定事件
			$(".dianzan.yizan").text(result);
			$(".dianzan.yizan").css("color","#333");
			$(".dianzan.yizan").hover(function(){
				
				$(this).text(result);
				$(this).css("color","#333");
				
			},function(){
				
				//$(this).text("点赞");
				//$(this).css("color","#333");
				$(this).text(result);
				$(this).css("color","#333");
				
			});
			//jSuccess("认为有用数+1");
			//$("#iuseful_" + id).parent().removeAttr("onclick");
			$("#iuseful2_" + id).removeAttr("onclick");
		});
	}
}

/**
 * 查询
 */
function searchSubmit(formId, channel, viewPath) {

	var postUrl = getContextPath() + channel + "/" + viewPath + "1";
	$("#" + formId).attr("src", postUrl);
	$("#" + formId).submit();
}

/**
 * 进入我的主页
 */
function openMyhomeUrl() {
	$.post(getContextPath() + "user.do?act=checkUserLogin", function(result) {

		if (result == 'false') {
			$("#loginerrTag").html("请登录后再试！");
		} else if (result == 'notlocal') {
			winDialog('user.do?act=getUserInfo');
		} else {
			window.location = getContextPath() + 'user/' + result + '.html';
		}

	});
}

/*******************************************************************************
 * 加载评论
 * 
 * @param commObjType
 *            评论对象
 * @param commObjId
 *            评论对象Id
 * @param commPage
 */
function loadComments(commObjType, commObjId, commPage, callAuchor) {
	$.ajaxSetup({ 
		async : false 
	}); 
	$("#commentsLoadDiv").load(getContextPath() + "comments.do", {
		commObjType : commObjType,
		commObjId : commObjId,
		commPage : commPage
	}, function() {

		if (callAuchor == 1) {
			location.hash = "comments";
		}
	});
}
function loadPageComm(url) {
	$("#commentsLoadDiv").load(url, function() {
		location.hash = "comments";
	});
}


/**
 * 添加评论
 */
function insertComments(objType, objId) {
	
	$.post(getContextPath() + "user.do?act=checkUserLogin",
					function(result) {

						if (result == 'false' || result == 'notlocal') {
							$("#errorCommentTags").html("请登录后再试！");
						} else {
							var userInfo = eval("(" + result + ")");
							var textcon = $("#textcon").val();
							if ($.trim(textcon).length == 0
									|| $.trim(textcon).length > 300) {
								$("#errorCommentTags").html("请填写评论内容！");
							} else {
								var mask = '<div id="submitMask" style=" position:absolute; width:100%; height:100%; left:0px; top:0px; z-index:9999">';
								$("#commentsSubmitBtn").append(mask);
								$.post(getContextPath()
										+ "comments.do?act=addComments", {
									textcon : textcon,
									objType : objType,
									objId : objId,
									commVcode:$("#commVcode").val()
								}, function(result) {
									$("#submitMask").remove();
									//loadComments(objType, objId, 1, 0);
									var rs = eval("(" + result + ")");
									if (rs.code == 10000) {
										loadComments(objType, objId, 1, 0);
										//alert("您评论的内容已经保存成功！");
										$("#commentsList ul").prepend(getSubmitCommsHtml(rs.obj,userInfo));
									}
									if (rs.code == 10001) {
										$("#errorCommentTags").html("验证码输入错误！");
									}
								});
							}

						}

					});
}

function showReComents(commType, reId, userNick) {

	var s = "";
	if (commType == 1) {
		s = "引用： ";
	}
	if (commType == 2) {
		s = "回复： ";
	}
	$("#re_title_" + reId).html(s + " " + userNick);
	$("#commType_" + reId).val(commType);
	//$("#re_comment_" + reId).show();
	
	if($("#re_comment_" + reId).is(":visible")==false){
		$("#re_comment_" + reId).show();
		//验证码
		$("#reVcodeImg_"+ reId).attr("src",getContextPath() +"checkcode.do?sessionCode=reCommVcode&s="+Math.random());
	}else{
		$("#re_comment_" + reId).hide();
	}
}
/**
 * 回复评论
 * 
 * @param objType
 * @param objId
 * @param reId
 * @param commType
 */
function insertReComments(objType, objId, reId) {

	$.post(
					getContextPath() + "user.do?act=checkUserLogin",
					function(result) {

						if (result == 'false' || result == 'notlocal') {
							$("#errorTags_" + reId).html("请登录后再试！");
						} else {
							var userInfo = eval("(" + result + ")");
							var commType = $("#commType_" + reId).val();
							var pusername = $("#pusername_" + reId).val();
							var pusernick = $("#pusernick_" + reId).val();
							var pdatatime = $("#pdatatime_" + reId).val();
							var pcontent = $("#pcontent_" + reId).val();
							var textcon = $("#reCoontext_" + reId).val();
							if ($.trim(textcon).length == 0
									|| $.trim(textcon).length > 300) {
								$("#errorTags_" + reId).html("请填写评论内容！");
							} else {
								var mask = '<div id="submitMask" style=" p