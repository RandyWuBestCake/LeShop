function getContextPath() {
	var contextPath = document.location.pathname;
	var index = contextPath.substr(1).indexOf("/");
	var cp = contextPath.substr(1, index);

	if (/wenwen|baike|wenda|video/.test(cp)) {
		return "/" + cp + "/";
	}

	return "/";
};

function getDomain() {
	var url = top.location.href;
	url = url.replace(document.location.pathname, '');
	url = url.split('?')[0];
	url = url.split('#')[0];
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
function getArtiDetailUrl(viewPath, id, pubDate, artiPageNo) {
	$.ajaxSetup({
		async : false
	});
	$.post(getContextPath() + "comm.do?act=hitlog", {
		dateType : 1,
		objId : id
	}, function(result) {
		// window.location = getContextPath() + viewPath + '/'
		// + pubDate + id + '_' + artiPageNo + '.html';

		var openUrl = getDomain() + getContextPath() + viewPath + '/' + pubDate
				+ id + '_' + artiPageNo + '.html';
		window.open(openUrl);
	});

}
function getArtiDetailCommentsUrl(viewPath, id, pubDate, artiPageNo) {
	$.ajaxSetup({
		async : false
	});
	$.post(getContextPath() + "comm.do?act=hitlog", {
		dateType : 1,
		objId : id
	}, function(result) {
		// window.location = getContextPath() + viewPath + '/'
		// + pubDate + id + '_' + artiPageNo + '.html#comments';

		var openUrl = getDomain() + getContextPath() + viewPath + '/' + pubDate
				+ id + '_' + artiPageNo + '.html#comments';
		window.open(openUrl);

	});

}

function savHitLog(id) {
	// console.log($.cookie('letv_arti_hits')+"|"+id);
	if (id != $.cookie('letv_arti_hits') || 0) {
		$.cookie('letv_arti_hits', id);
		$.post(getContextPath() + "comm.do?act=hitlog", {
			dateType : 1,
			objId : id
		}, function(result) {
			// console.log("ok");
		});

	}
}

function openArtiDetail() {

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
		//window.location = linkUrl;
		if(linkUrl!=null&&(linkUrl!='')){
			window.open(linkUrl);
		}
	});

}
/**
 * 位置导航
 */
function getPosition(viewPath, className, channel, titleShort) {

	var url = '';
	if (channel == 'ask') {
		url = '<a href="javascript:void(0)" onclick="window.location=\''
				+ getContextPath() + '\'">问一问</a> > ';
		url = url + '<a href="javascript:void(0)" onclick="window.location=\''
				+ getContextPath() + 'ask/all/1\'">乐视问答</a>';
		// if (viewPath != '' && viewPath != 'all') {

		if (viewPath != '') {
			if (viewPath == 'all') {
				className = 'All';
			}
			url = url
					+ " > "
					+ '<a href="javascript:void(0)" onclick="window.location=\''
					+ getContextPath() + 'ask/' + viewPath + '/1\'">'
					+ className + '</a>';
		}
		if (!!titleShort) {
			url = url + " > " + titleShort;
		}

	} else {

		url = '<a class="bailist_lo" href="javascript:void(0)" onclick="window.location=\''
				+ getContextPath() + '\'">问一问</a>';
		// if (viewPath != '' && viewPath != 'all') {

		if (viewPath != '') {
			if (viewPath == 'all') {
				className = 'All';
			}
			url = url
					+ "&nbsp;>&nbsp;"
					+ '<a href="javascript:void(0)" onclick="window.location=\''
					+ getContextPath() + viewPath + '/1\'">' + className
					+ '</a>';
		}
		if (!!titleShort) {
			url = url + " > " + titleShort;
		}
	}

	return url;

}
/**
 * 认为有用
 */
function isUseful(id, ishitted) {

	if (ishitted == '0') {
		$.post(getContextPath() + "comm.do?act=isuseful", {
			objId : id
		}, function(result) {
			// var i = $("#iuseful2_" + id).html();
			// $("#iuseful_" + id).html(eval(i) + 1);
			// $("#iuseful2_" + id).html((eval(i) + 1)+"人认为有用");
			$("#iuseful2_" + id).removeClass().addClass("dianzan yizan");
		
			// 绑定事件
			$(".dianzan.yizan").text(result);
			$(".dianzan.yizan").css("color", "#333");
			$(".dianzan.yizan").hover(function() {
				$(this).text(result);
				$(this).css("color", "#333");

			}, function() {
				// $(this).text("点赞");
				$(this).text(result);
				$(this).css("color", "#333");

			});
			// jSuccess("认为有用数+1");
			// $("#iuseful_" + id).parent().removeAttr("onclick");
			$("#iuseful2_" + id).removeAttr("onclick");

		});
	}
}

/**
 * 查询
 */
function searchSubmit(formId, channel, viewPath) {

	// var postUrl = getContextPath() + channel + "/" + viewPath + "/1";
	var postUrl = getContextPath() + viewPath + "/1";
	$("#" + formId).attr("action", postUrl);
	// $("#" + formId).submit();
	return;
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
			var rs = eval("(" + result + ")");
			window.location = getContextPath() + 'user/' + rs.uid + '.html';
		}

	});
}
/**
 * 弹出窗口
 */
function winDialog(url, dWidth, dHeight) {

	var dialogW = 700;
	var dialogH = 398;
	if (!!dWidth) {
		dialogW = dWidth;
	}
	if (!!dHeight) {
		dialogH = dHeight;
	}
	if ($("#dialogDiv").length === 0) {
		$("body")
				.append(
						'<div class="layer_style dx" id="dialogDiv" style="width:'
								+ dialogW
								+ 'px;height:'
								+ dialogH
								+ 'px; "><a href="javascript:void(0);" class="layer_close" onclick="closeDialog()">&nbsp;</a><iframe id="dialogIframe" name="dialogIframe" src="'
								+ getContextPath()
								+ url
								+ '" style="width:100%;height:100%;border:0"></iframe></div>');
	}

	$box = $('#dialogDiv');
	if ($box.size() >= 1) {
		$box.show();
		var wH = $(window).height(), lh = $box.height(), sw = $(window)
				.scrollTop(), top = 0;
		if (lh > wH) {
			top = 0;
		} else {
			top = (wH - lh) / 2;
		}
		$box.css({
			top : top + sw,
			'z-index' : 1001
		});
		$mask = $('<div id="mask" style="width:100%;height:100%; display:none;position:fixed;left:0;top:0; background:#000; opacity:.5;z-index:1000;"></div>');
		if ($("#mask").length === 0) {
			$mask.appendTo('body').css('height', wH).show();
		}
	}
}
/**
 * 关闭窗口
 */
function closeDialog() {
	$('#dialogDiv').remove();
	$('#mask').remove();
}

/*******************************************************************************
 * 区域
 * 
 * @param objId
 */
function getProvinces() {
	return provinces = {
		"0" : "",
		"110000" : "北京市",
		"120000" : "天津市",
		"130000" : "河北省",
		"140000" : "山西省",
		"150000" : "内蒙古自治区",
		"210000" : "辽宁省",
		"220000" : "吉林省",
		"230000" : "黑龙江省",
		"310000" : "上海市",
		"320000" : "江苏省",
		"330000" : "浙江省",
		"340000" : "安徽省",
		"350000" : "福建省",
		"360000" : "江西省",
		"370000" : "山东省",
		"410000" : "河南省",
		"420000" : "湖北省",
		"430000" : "湖南省",
		"440000" : "广东省",
		"450000" : "广西壮族自治区",
		"460000" : "海南省",
		"500000" : "重庆市",
		"510000" : "四川省",
		"520000" : "贵州省",
		"530000" : "云南省",
		"540000" : "西藏自治区",
		"610000" : "陕西省",
		"620000" : "甘肃省",
		"630000" : "青海省",
		"640000" : "宁夏回族自治区",
		"650000" : "新疆维吾尔自治区",
		"710000" : "台湾省",
		"810000" : "香港特别行政区",
		"820000" : "澳门特别行政区"
	};
}
function creatProvincesOption(objId, selected) {
	var opt = [];

	$.each(getProvinces(), function(key, val) {
		var sel = "";
		if (key == selected) {
			sel = "selected";
		}
		opt
				.push('<option value="' + key + '" ' + sel + '>' + val
						+ '</option>');
	});

	$("#" + objId).html(opt.join(''));

}
function getProvincesName(code) {
	var pname = "";
	$.each(getProvinces(), function(key, val) {
		if (key == code) {
			pname = val;
		}
	});
	return pname;
}
/**
 * 用户资料提交
 */
function userFormSubmit() {
	if ($.trim($("#signature").val()).length > 400) {
		$("#errTags").html("长度不能超过400个字符。");
	} else {
		$.ajax({
			type : 'POST',
			url : getContextPath() + "user.do?act=savUserInfo",
			data : {
				userNick : $("#userNick").val(),
				userName : $("#userName").val(),
				provinces : $("#provinces").val(),
				sex : $('input[name="sex"]:checked').val(),
				professional : $("#professional").val(),
				signature : $("#signature").val()
			},
			success : function(result) {
				window.parent.location.href = getContextPath() + 'user/'
						+ result + '.html';
			}
		});
	}

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
 * 意见反馈弹出
 */
function showadvise() {
	if ($("#yijianfk").length === 0) {
		$("body")
				.append(
						'<div class="yijianfankui" id="yijianfk" style="display: block;"><div class="yijianfankui_top"><div class="yjfk_left"><img src="/baike/baike/images/yjfk.png" width="120" height="40"></div><div class="yjfk_right"><a href="javascript:yijianhide()"><img src="/baike/baike/images/guanbi.png" width="16" height="16"></a></div></div><div class="yjfk_nr"><dl><dt>您的建议：<span id="yjErrTag" style="color:#D80B1A"></span></dt><dd><textarea id="yijiannr"></textarea><input name="mailTO" type="hidden" id="mailTO" value="baike@letv.com" /></dd></dl><div class="yjfk_but"><input type="button" value="点 击 提 交" class="but" id="sendMailBtn" onclick="sendMail()">&nbsp;&nbsp;<span id="tsnr"></span></div></div><div class="yjfk_wz">为了给您提供更好的服务，我们希望收集您使用比一比时的看法或建议。</div></div>');
	}
}
function yijianhide() {
	$("#yijianfk").remove();
}

function sendMail() {

	var context = $.trim($("#yijiannr").val());
	var mailTO = $("#mailTO").val()
	if (context.length == 0) {
		$("#yjErrTag").html("请填写您的意见");
	} else if (context.length > 2000) {
		$("#yjErrTag").html("意见内容不能超过2000个汉字或字符");
	} else {
		$("#sendMailBtn").removeAttr("onclick");

		$.ajax({
			type : 'POST',
			url : getContextPath() + "comm.do?act=smail",
			data : {
				mailSubject : "意见反馈",
				content : context,
				mailTO : mailTO
			},
			success : function(result) {
				$("#yijianfk").remove();
			}
		});
	}

}

/**
 * 添加评论
 */
function insertComments(objType, objId) {

	$
			.post(
					getContextPath() + "user.do?act=checkUserLogin",
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
								$
										.post(
												getContextPath()
														+ "comments.do?act=addComments",
												{
													textcon : textcon,
													objType : objType,
													objId : objId,
													commVcode : $("#commVcode")
															.val()
												},
												function(result) {
													$("#submitMask").remove();
													var rs = eval("(" + result
															+ ")");
													if (rs.code == 10000) {
														loadComments(objType,objId, 1, 0);
														//alert($("#commentsList ul").html())
														$("#commentsList ul").prepend(getSubmitCommsHtml(rs.obj,userInfo));
														
													}
													if (rs.code == 10001) {
														$("#errorCommentTags")
																.html(
																		"验证码输入错误！");
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
	$("#re_title_" + reId).html(s + " " + userNick)
	$("#commType_" + reId).val(commType);
	if ($("#re_comment_" + reId).is(":visible") == false) {
		$("#re_comment_" + reId).show();
		// 验证码
		$("#reVcodeImg_" + reId).attr(
				"src",
				getContextPath() + "checkcode.do?sessionCode=reCommVcode&s="
						+ Math.random());
	} else {
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

	$
			.post(
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
								var mask = '<div id="submitMask" style=" position:absolute; width:100%; height:100%; left:0px; top:0px; z-index:9999">';
								$("#re_comment_" + reId).append(mask);
								$.post(getContextPath()
										+ "comments.do?act=addComments", {
									textcon : textcon,
									objType : objType,
									objId : objId,
									commType : commType,
									pusername : pusername,
									pusernick : pusernick,
									pdatatime : pdatatime,
									pcontent : pcontent,
									parentId : reId,
									reCommVcode : $("#reCommVcode_" + reId)
											.val()
								}, function(result) {
									$("#submitMask").remove();

									var rs = eval("(" + result + ")");
									if (rs.code == 10000) {
										//loadComments(objType, objId, 1, 1);
										//alert("您回复的内容已经保存成功！");
										$("#reCoontext_"+reId).val('');
										$("#reVcodeImg_"+ reId).attr("src",getContextPath() +"checkcode.do?sessionCode=reCommVcode&s="+Math.random());
										$("#reCommVcode_"+reId).val('');
										$("#commentsReList_"+reId).prepend(getSubmitReCommsHtml(rs.obj,userInfo));
									}
									if (rs.code == 10002) {
										$("#errorTags_" + reId)
												.html("验证码输入错误！");
									}

								});
							}

						}

					});

}

/**
 * 点赞
 */
function isPrised(id) {

	$.post(getContextPath() + "comments.do?act=isPrised", {
		commId : id
	}, function(result) {

		var rs = eval("(" + result + ")");

		if (rs.code == -1) {
			// jSuccess("您已点过了");
			return;
		} else {
			// jSuccess("点赞数 " + rs.code);
			return;
		}

	});

}
/*******************************************************************************
 * 获取已选会员数量
 */
function getSelectUsersCount() {

	var checkCount = 0;
	var vals = [];
	$("[name='username']").each(function() {
		if ($(this).attr("checked")) {
			checkCount = checkCount + 1;
			vals.push($(this).val());
		}
	});
	$("#selectedUser").html(checkCount);
	$("#toUserArr").val(vals.join(','));
}
/**
 * 加载提问表单
 * 
 * @param obj
 * @param selectUser
 */
function loadSendQuestForm(obj, selectUser, specified) {

	var url = "ask.do?act=getAskForm&specified=" + specified + "&selectUser="
			+ selectUser;
	if (specified == 0) {
		winDialog(url, 955, 397);
	}
	if (specified == 1) {
		winDialog(url, 650, 397);
	}

	/*
	 * $("#" + obj).load(getContextPath() + "ask.do?act=getAskForm", { specified :
	 * specified,selectUser:selectUser }, function() {
	 * 
	 * if (selectUser != '') { $("#toUserArr").val(selectUser);
	 * $("#toUserSelectedBox").hide(); } });
	 */
}

/**
 * 加载会员
 */
function loadToUsers() {
	$("#toUserSelectedBox").load(getContextPath() + "ask.do?act=getMemberList",
			function() {
				$("#datagrpArr").val('');
			});
}
/**
 * 提交表单
 */
function sunmitQuestForm() {

	$.post(getContextPath() + "user.do?act=checkUserLogin", function(result) {

		if (result == 'false') {
			$("#errorTag").html("请登录后再试！");
		} else {

			// tijiao
			if ($.trim($("#content").val()).length > 50
					|| $.trim($("#content").val()).length == 0) {
				$("#errorTag").html("问题内容为必填项且不超过50个汉字会字符。");
				return false;
			}

			if ($.trim($("#supplement").val()).length > 200) {
				$("#errorTag").html("问题补充内容不能超过200个汉字会字符。");
				return false;
			}
			if (isNaN($("#ireward").val())) {
				$("#errorTag").html("悬赏分数必须为数字类型。");
				return false;
			}

			$.ajax({
				type : 'POST',
				url : getContextPath() + "ask.do?act=savAskForm",
				data : {
					toUserArr : $("#toUserArr").val(),
					content : $("#content").val(),
					supplement : $("#supplement").val(),
					datagrp : $('input[name="datagrp"]:checked').val(),
					ireward : $("#ireward").val(),
					parentid : $("#parentid").val(),
					datatype : $("#datatype").val()
				},
				success : function(result) {
					/*
					 * jSuccess("问题提交成功"); if ($("#specified").val() == 0) {
					 * $("#toUserArr").val(''); } $("#content").val('');
					 * $("#supplement").val(''); $("#ireward").val(0);
					 * $("#sendQuestion").hide(); $('#mask').remove();
					 */
					$('#mask').remove();
					$(window.parent.document).find("#mask").remove();
					$(window.parent.document).find("#dialogDiv").remove();

					$(window.parent.document).find("#mask").remove();

				}
			});

			// tijiao end

		}

	});

}

/**
 * 提交表单
 */
function sunmitAnswerForm() {
	$.post(getContextPath() + "user.do?act=checkUserLogin", function(result) {
		if (result == 'false') {
			$("#errorTag").html("请登录后再试！");
		} else {

			if ($.trim($("#supplement").val()).length > 1000
					|| $.trim($("#supplement").val()).length == 0) {
				$("#errorTag").html("问题内容为必填项且不超过1000个汉字会字符。");
				return false;
			}
			$.ajax({
				type : 'POST',
				url : getContextPath() + "ask.do?act=savAskForm",
				data : {
					supplement : $("#supplement").val(),
					anonymous : $('input[name="anonymous"]:checked').val(),
					parentid : $("#parentid").val(),
					datatype : 2,
					datagrp : $("#datagrp").val()
				},
				success : function(result) {
					window.location = getContextPath() + 'ask/'
							+ $("#pagrUrl").val();

				}
			});
		}
	});

}

/**
 * 问答明细连接
 */
function getAskDetailUrl(viewPath, id, pubDate) {

	$.post(getContextPath() + "comm.do?act=hitlog", {
		dateType : 2,
		objId : id
	}, function(result) {
		window.location = getContextPath() + 'ask/' + viewPath + '/' + pubDate
				+ id + '.html';
	});

}

/**
 * 采纳答案
 */
function updateAdoptAnswer(qid, aid) {

	$.post(getContextPath() + "user.do?act=checkUserLogin", function(result) {
		if (result == 'false') {
			$("#errorTag").html("请登录后再试！");
		} else {

			$.post(getContextPath() + "ask.do?act=updateAdoptAnswer", {
				qid : qid,
				aid : aid
			}, function(result) {
				window.location = getContextPath() + 'ask/'
						+ $("#pagrUrl").val();
			});
		}
	});

}

/**
 * 点赞
 */
function isAskPrised(id) {

	$.post(getContextPath() + "ask.do?act=isGoodAnswer", {
		aid : id
	}, function(result) {

		var rs = eval("(" + result + ")");
		var num = $.trim($("#goodsAnswerNum_" + id).html());
		if (rs.code == 10000) {
			$("#goodsAnswerNum_" + id).html(parseInt(num) + 1);
			// jSuccess("点赞数+1");
			return;
		}
		if (rs.code == 20000) {
			// jSuccess("您已点过了");
			return;
		}

	});

}
/*******************************************************************************
 * 会员中心
 * 
 * @param obj
 * @param url
 */
function uhomeLoadQuestion(obj, url) {

	for ( var i = 0; i < 4; i++) {
		if (obj == i) {

			$("#uhmQues" + i).attr("class", "current");

		} else {

			$("#uhmQues" + i).removeAttr("class");
		}
	}

	$("#uhomeQuestionList").load(url, {
		navigation : obj
	}, function() {

	});
}

/**
 * 
 * 
 */
function hiddenplace() {
	$("#message").val();
}
function showplace() {

	// if ($(".supplement").val().length == 0) {
	$(".placeholder ").show();
	// }
}

maxLength = 200;
function MaxInput() {
	if ($("#message").val().length > maxLength) {
		$("#message").val($("#message").val().substring(0, maxLength));
	} else {
		$("#asktipins").html($("#message").val().length);
	}
}

maxLengths = 99;
function MaxInputs() {
	if ($(".re_content").val().length > maxLengths) {
		// alert(1);
		// var con=$("#content").text();
		// $("#content").html($('#content').substring(0,maxLengths));
		$(".re_content").val($(".re_content").val().substring(0, maxLengths));
	} else {
		// alert(form.TLengths.innerHTML);
		// alert($("#content").val().length);
		$("#asktipin").html(maxLengths - $(".re_content").val().length);
		// form.TLengths.innerHTML = "1000";
	}
}

// 搜索产品
function searchProduct1() {
	var name = $("#searchKey").val();

	if (name == null || name == '') {

		$('.vi_searchtip').hide();

	} else {
		$.post(getContextPath() + "baike.do?act=getKeywordsToplist", {
			searchKey : name
		}, function(result) {
			if (result != null && result != "") {
				$("#searchtip").html(result);

				$('.vi_searchtip div a').bind("click", function() {
					$("#searchKey").val($(this).html());
					$('.vi_searchtip').hide();
				});

				$('.vi_searchtip').show();
			}
		});

	}

}
/**
 * 时间格式化
 * @param time
 * @returns {String}
 */
function timeStamp2String(time){
    var datetime = new Date();
    datetime.setTime(time);
    var year = datetime.getFullYear();
    var month = datetime.getMonth() + 1 < 10 ? "0" + (datetime.getMonth() + 1) : datetime.getMonth() + 1;
    var date = datetime.getDate() < 10 ? "0" + datetime.getDate() : datetime.getDate();
    var hour = datetime.getHours()< 10 ? "0" + datetime.getHours() : datetime.getHours();
    var minute = datetime.getMinutes()< 10 ? "0" + datetime.getMinutes() : datetime.getMinutes();
    var second = datetime.getSeconds()< 10 ? "0" + datetime.getSeconds() : datetime.getSeconds();
    //return year + "-" + month + "-" + date+" "+hour+":"+minute+":"+second;
    return year + "-" + month + "-" + date+" "+hour+":"+minute;
}
/**
 * 评论
 */
function getSubmitCommsHtml(obj,user){
	var shtml = [];
	shtml.push('<li>');
	shtml.push('<div class="user_info">');
	shtml.push('<div class="pic"><img src="'+getContextPath()+user.uface+'" width="76" height="76" data-bd-imgshare-binded="1"></div>');
	shtml.push('</div>');

	shtml.push('<div class="user_comtext">');
	shtml.push('<span href="javascript:void(0)" class="name">'+user.unick+'</span>');
	shtml.push('<div class="pic_time">'+timeStamp2String(obj.datatime)+'</div>');
	shtml.push('<div class="content">'+obj.content+'</div>');
	shtml.push('<div class="option"><a href="javascript:;" >回复(0)</a> </div>');
	shtml.push('</div>');
	shtml.push('</li>');
	return shtml.join('');
}
/**
 * 回复评论
 */
function getSubmitReCommsHtml(obj,user){
	var shtml = [];
	shtml.push('<div class="user_comtext com">');
	shtml.push('<div class="user_comtop">');
	shtml.push('<span href="javascript:void(0)" class="name" >'+user.unick+'</span><div class="pic_time">'+timeStamp2String(obj.datatime)+'</div>');  
	shtml.push('</div>');
	shtml.push('<div class="content com">'+obj.content+'</div>');
	shtml.push('</div>');
	return shtml.join('');
}
