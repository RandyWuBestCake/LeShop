$(function(){
	$("#zan").live('click',function(){
		var _this = $(this);
		var commentId = $(this).attr("commentId");
		var url=sendLink.foru+'/api/web/query/commentPraiseNum.jsonp';
		var param="commentId="+commentId;
		var span =  $(this).find("span");
		Js.sendData(url,{dataType:'jsonp',type:'post',param:param},function(data){
			if(data.status == "1"){
				var sum =$(span).html();
				var currentSum = parseInt(sum) + 1;
				$(span).html(currentSum);
                 	_this.addClass("zancheck");
			}else{
				alert(data.message);
			}
		});
		return false;
	});
});
/**
	功能：回复按钮提交函数
	param :
		replyButton : 提交按钮的jquery 对象
*/
function submitReply(replyButton){
	Js.login.hasLogin(function(){
      	$(replyButton).attr("value","正在发表...");
		var reply_div = $(replyButton).parent().parent().parent();
		var url=sendLink.foru+'/api/web/query/insertCommentReplay.jsonp';
		var reUserId = $(replyButton).attr("reUserId");
		var reUserName = $(replyButton).attr("reUserName");
		var commentId = $(replyButton).attr("commentId");
		var content = $(replyButton).parent().parent().find("textarea").val();
		var param="content="+content+"&commentId="+commentId+"&reUserName="+ reUserName +"&reUserId="+reUserId;
		Js.sendData(url,{dataType:'jsonp',type:'post',param:param},function(data){
				if(data.status=="1"){
                  	var nickName = getCookie("COOKIE_NICKNAME");
                  	var msg = $('<div class="comments_content reply_msg_div"><p class="font14 gray">'+content+'</p><p class="gray"><span class="pr10 dark">'+nickName+'</span> 回复 <span class="pr10">'+reUserName +'</span>  于<span class="date">'+getDtime()+'</span></p></div>');
                  	var _reply = $(reply_div).parent().find("a[id=reply]");
                  	$(_reply).attr("id","_replyDone");
                  	$(_reply).attr("href","javascript:alert('您已回复');");
                  	var sum =_reply.find("span").html();
					var currentSum = parseInt(sum) + 1;
                  	_reply.find("span").html(currentSum);
                  	
					$(reply_div).before(msg)
					$(reply_div).remove();
                }else{
                	pop(showMsg("error",null,data.message));
                }
		});
      	$(replyButton).attr("value","发表回复");
	});
}
function getDtime(){
	var myDate = new Date(); 
	var y = myDate.getFullYear();    //获取完整的年份(4位,1970-????)    
	var m = myDate.getMonth()+1;       //获取当前月份(0-11,0代表1月)    
	var d = myDate.getDate();        //获取当前日(1-31)    
	var h = myDate.getHours();       //获取当前小时数(0-23)    
	var M = myDate.getMinutes();     //获取当前分钟数(0-59)    
	var s= myDate.getSeconds();     //获取当前秒数(0-59)    
	//alert(y+","+ m +","+ d +","+ h +","+ M +","+ s);
	return y+"-"+ m +"-"+ d +" "+ h +":"+ M +":"+ s
}
/**
	功能：验证文本录入及加载出初信息
	param
		maxlimit : 最大限制
		emptyText : 页面加载后录入框中为空时的显示信息
		buttonObject : 触发按钮
		inputObject : 输入信息Jquery对象
		msgObect : 输出提示信息Jquery对象
		execFn : 点击校验后，可执行函数
		param : 执行函数参数
*/
function validatConfirm(maxlimit, emptyText , buttonObject ,inputObject , msgObect , execFn , param){
	//校验留言信息
	Js.validator.init({
		id:$(buttonObject).attr("id"),
		uriEncode:false,
		el:[{
				id:$(inputObject).attr("id"),
				keyUp:function(){checkTextCounter(maxlimit, inputObject, msgObect);},
				rule:"rangelength",
	            param:[1,maxlimit],
				emptyText:emptyText
			}],
		submit:{
			id:$(buttonObject).attr("id"),
			callback:function(uri,uriObject){ 
				if(param != null){
					execFn(param);
				}else{
					execFn();
				}
			}
		}
	});
    return false;
}
/**
	功能：计算输入字数
	param
		maxlimit 最大限制
		inputObject : 输入信息Jquery对象
		msgObect : 输出提示信息Jquery对象
*/
/**
		功能：计算输入字数
		param
			maxlimit 最大限制
			inputObject : 输入信息Jquery对象
			msgObect : 输出提示信息Jquery对象
	*/
function checkTextCounter(maxlimit, inputObject , msgObect){
  if($(msgObect).length > 0){
		var v = $.trim($(inputObject).val());
		if (v.length > maxlimit){
			$(inputObject).val(v.substring(0,maxlimit));
            $(msgObect).html(maxlimit);
        }else {
            $(msgObect).html(v.length);
        }
  }
}
