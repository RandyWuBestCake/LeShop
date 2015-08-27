// JavaScript Document
$(document).ready(function(){
	//侧边栏
/*	var $slideBar = $([
		'<div class="slide_fix">',
			'<ul>',
				'<li class="s1" rel="160"><div class="infos qcode"><img src="/baike/baike/images/rwm.jpg" /></div></li>',
				//'<li class="s2" rel="120"><div class="infos"><a href="http://shop.letv.com/baike/">进入乐视百科</a></div></li>',
				'<li class="s3" rel="120"><div class="infos"><a href="http://shop.letv.com/baike/">进入问一问</a></div></li>',
				'<li class="s4" rel="120"><div class="infos"><a href="http://shop.letv.com/shijie/">进入看一看</a></div></li>',
				'<li class="s5" rel="120"><div class="infos"><a href="http://shop.letv.com/biyibi/index.html">进入比一比</a></div></li>',
				'<li class="s7" onclick="showadvise();"><div class="infos"></div></li>',
				'<li class="s6"><a href="#" class="gotop"></a></li>',
			'</ul>',
		'</div>'
	].join(''));
*/	
	//setTimeout('check()',3000)
	$('.snav li a').hover(function(){
	
		var _this = $(this),
			rel = _this.attr('rel');
		$('.snav li a').removeClass('current');
		_this.addClass('current')
		//alert(1);
		$('.home_list > div[rel]').fadeOut();
		
		$('.home_list > div[rel="' + rel + '"]').fadeIn();
		
		/*  if($('.home_list > div[rel="' + rel + '"]').is(":show")){
			$('.home_list > div[rel="' + rel + '"]').show();
		}else{
			
		} */
 
	},function(){
	//$('.home_list > div[rel="' + rel + '"]').show();
		
	});
	//$slideBar.appendTo('body');
	/* $('li',$slideBar).hover(
		function(){
			var _this = $(this),
			    move = parseInt(_this.attr('rel'));
			$(this).find('.infos').show().stop().animate({
				left:-move,
				width:move
			},400)
		},
		function(){
			$(this).find('.infos').stop().animate({
				left:0,
				width:1
			},400,function(){
				$(this).hide();
			})
		}
	); */
	
	
	//$('.ask_list_box .list ul li:last').css('border',0)
	//$(".list_type1 li:eq(0) a,.list_type1 li:eq(0) .mark").css("color","#256bbb");
	//$(".list_type1 li:eq(1) a,.list_type1 li:eq(1) .mark").css("color","#256bbb");
	//$(".list_type1 li:eq(2) a,.list_type1 li:eq(2) .mark").css("color","#256bbb");
	
	
	$('.right_box .box li:last').css('border',0);
	$('.comment_list li:last').css('border',0);
	$('.other_answer .alist li:first').css('background','none')
	/*
	function showWin(id){
		$box = $('#'+id);
		if($box.size()>=1){
			$box.show();
			var wH = $(window).height(),
				lh = $box.height(),
				sw = $(window).scrollTop(),
				top = 0;
			if(lh > wH){
				top = 0;
			}else{
				top = (wH-lh)/2;
			}
			$box.css({
				top:top+sw,
				'z-index':1001
			})
			$mask = $('<div id="mask" style="width:100%;height:100%; display:none;position:fixed;left:0;top:0; background:#000; opacity:.5;z-index:1000;"></div>')
			$mask.appendTo('body').css('height',wH).show();
		}
	}
	*/
	$('.layer_close').click(function(){
		$(this).parents('.layer_style').hide();
		$('#mask').remove();
	})
	
	$(".pingluns").toggle( 
		function () { 
		$('#commentsLoadDiv').hide(); 
		$(this).text("我要评论");
		}, 
		function () { 
		$('#commentsLoadDiv').show(); 
		$(this).text("收起评论");
		} 
	);
	
	
	$(".baike_alls").hover(function(){
		
		//alert(123);
		$(this).css("background","url(baike/images/btn_03s.png) no-repeat");
		
	},function(){
		
		
		$(this).css("background","url(baike/images/btn_03.png) no-repeat");
		
	});
	
	
	
	$(".text_textspan").toggle( 
		function () { 
		$('.textarea_area').hide(); 
		$(this).css("background","url(/baike1/baike/images/texts_07.png) no-repeat center right");
		//$(this).css("background-position",";");
		
		}, 
		function () { 
		$('.textarea_area').show(); 
		$(this).css("background","url(/baike1/baike/images/texts_03.png) no-repeat center right");
		//$(this).css("background-position","center right;");
		
		} 
	);
	
	
	$(".other_answer .op a.get.add").toggle( 
		function () { 
		$('.comment_adds').show(); 
		$(this).text("取消追问");
		
		
		}, 
		function () { 
		$('.comment_adds').hide(); 
		$(this).text("追问");
		} 
	);
	
	$(".dianzan.d").hover(function(){
		
		$(this).text("+1");
		$(this).css("color","#333");
		
	},function(){
		
		$(this).text("点赞");
		$(this).css("color","#333");
		
	});
	
	
	$('.good_answer .op a.goods,.other_answer .op a.goods').hover(function(){
		
		$(this).find('span').text("赞一个");
		
	});
	
	
	$(".dianzan.yizan").hover(function(){
		
		//$(this).text("已赞");
		$(this).css("color","#333");
		
	},function(){
		
		//$(this).text("点赞");
		//$(this).text("已赞");
		$(this).css("color","#333");
		
	});
	
	
	
	
	$('#send_uestion').click(function(){
		showWin('sendQuestion');
	})
	
	$('.btn_tw,.right_user .btn a ').click(function(){
		//showWin('sendQuestion');
	})
	$('.btn_tw.my').click(function(){
		//showWin('sendQuestions');
	})
	
	$('.btn_tpl').click(function(){
		location.href='XXX.html'
		
	});
	
	$('#frmBaikeSearch #searchKey').click(function(){
	
		
	});
	
	
	
	
	
	
})

function submitForm(formName){

    if(window.event.ctrlKey&&window.event.keyCode==13){

       document.getElementById(formName).submit();

    }

}

