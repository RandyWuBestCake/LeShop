/* window.onload=function(){
	
	function getContextPath() {
		var contextPath = document.location.pathname;
		var index = contextPath.substr(1).indexOf("/");
		var cp = contextPath.substr(1, index);

		if (/shijie||/.test(cp)) {
			return "/" + cp + "/";
		}

		return "/";
	};

	// 创建瀑布html
	function getItem(parame){
		
		var s=[];
		s.push('<div class="box">');
		s.push('<div class="pic_infos">');
		s.push('<div class="img"><a href="javascript:void(0)" onclick="getArtiDetailUrl(' + parame.id + ',\''+parame.strMonth+'\',1)"><img src="'+parame.thumb+'" width="100%"/></a></div>');
		s.push('<div class="infos"><a href="#" class="title">'+ parame.title +'</a>'+ parame.intro +'</div>');
		s.push('</div>');
		
		s.push('<div class="option">');
		s.push('<a href="javascript:void(0)" onclick="getArtiDetailUrl(' + parame.id + ',\''+parame.strMonth+'\',1)" class="forward">'+ parame.hits +'</a>');
		s.push('<a href="javascript:void(0)" onclick="getArtiDetailCommentsUrl(' + parame.id + ',\''+parame.strMonth+'\',1)" class="commend">'+ parame.commsnum +'</a>');
		s.push('<a href="javascript:void(0)" onclick="isUseful(' + parame.id + ',' + parame.isUseful + ')" class="good last"><span id="iuseful_' + parame.id + '">'+ parame.iuseful +'</span></a>');
		s.push('</div>');
		s.push('<div class="user_infos"><div class="pic"><a href="javascript:void(0)" onclick=""></a><img src="/baike/upload/form/201408201045023449000.JPG" width="36" height="36" /></div><div class="info"><a href="javascript:void(0)" onclick="">评论者：</a>我是评论内容评论内容评论内容评论内容评论内容</div><div class="info none">暂时没有评论哦~</div></div>');
		
		// 评论

		if(parame.commsnum>0){
			s.push('<div class="user_infos">');
			s.push('<div class="pic"><a href="javascript:void(0)" onclick="getArtiDetailCommentsUrl(' + parame.id + ',\''+parame.strMonth+'\',1)"></a><img src="/baike/'+parame.userFace+'" width="36" height="36" /></div>');
			s.push('<div class="info"><a href="javascript:void(0)" onclick="getArtiDetailCommentsUrl(' + parame.id + ',\''+parame.strMonth+'\',1)">'+parame.userNick+'：</a>'+parame.content+'</div>');
			s.push('</div>');
		}
		s.push('</div>');
		
		var $box = $(s.join(''));
		return $box;
	}
	var currPage = 1;
	var pageCount=0;
	var timer=null;

	function waterfall(page){
		var aUl=$('#pubu li');
		$.ajaxSetup({ 
			async : false 
		}); 
        
		$.post(getContextPath() + "index.do?act=loadData", {
			page : page,
			searchKey:$("#searchKey").val(),
			tag:$("#tag").val()
		}, function(result) {
			var rs = eval("(" + result + ")");
	
			pageCount = rs.totalPage;
			var data = rs.list;
			$.each(data,function(i,t){
				var $box = getItem(data[i]);
				var arr=[];
				for(var j=0; j<aUl.size(); j++){
					arr[j]=aUl[j];
				}
				arr.sort(function (ul1, ul2){
					return ul1.offsetHeight-ul2.offsetHeight;
				});
				
				$box.appendTo(arr[0]);
			});
			currPage++;
			$("#wfloading").html('');
			
		});
		


	}


	window.onscroll=window.onresize=function(){
		clearTimeout(timer);
		$("#wfloading").html('<div class="wfloading"><img src="shijie/images/loading.gif" />正在加载</div>');
		var scrollTop=document.documentElement.scrollTop||document.body.scrollTop;

		if(scrollTop>=document.body.scrollHeight-document.documentElement.clientHeight-500){
		
				if(currPage<=pageCount){
	
					timer=setTimeout(function(){
						waterfall(currPage);
					},30);
		
				}else{
					$("#wfloading").html('<div class="wfloading">没有数据啦</div>');
				}

	
		}
	};
	
	waterfall(1);
	
}; */