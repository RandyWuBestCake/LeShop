(function($){
	var settings=null;
	$.fn.focusImgFn=function(options){
		settings=$.extend({
			autoPlay:true,
            imgCurrent:false,
            comeLeft:0,
            imgText:null,
            playTime:5
			}, options||{});
		var This=$(this);
		var Tul=This.find('ul');
		var liWidth=Tul.find('li').eq(0).outerWidth(true);
		var time=null;
        var now=0;
		var imgCur=false;
		init();
		var Tli=Tul.find('li');
		if(settings.autoPlay==true){
            autoPlayFn();
		}
        //下一页函数
		function nextPlay(iNow){
			if(iNow>Tli.size()/2){
				Tul.css('left',settings.comeLeft);
				now=1;
				iNow=1;
			}
			Tul.stop().animate({'left':-liWidth*iNow+settings.comeLeft});
			if(imgCur){
				This.find('div').find('span').eq(iNow%(Tli.size()/2)).attr('class','imgOn').siblings().attr('class','');
			}
		}
        //上一页函数
		function prePlay(iNow){
			if(iNow<0){
				Tul.css('left',-((Tli.size()/2)*liWidth)+settings.comeLeft);
				now=Tli.size()/2-1;
				iNow=Tli.size()/2-1;
			}
			Tul.stop().animate({'left':-liWidth*iNow+settings.comeLeft});
			if(imgCur){
				This.find('div').find('span').eq(iNow%(Tli.size()/2)).attr('class','imgOn').siblings().attr('class','');
			}
		};
        //初始化
		function init(){
			var Tli=Tul.find('li');
            if(settings.imgText!=null){
                for(var j=0;j<settings.imgText.length;j++){
                    $("<span class='imgText'><p>"+settings.imgText[j]+"</p></span>").appendTo(Tli.eq(j));
                }
            }
			Tli.eq(Tli.size()-1).prependTo(Tul);
			Tul.find('li').clone().appendTo(Tul);
			Tli=Tul.find('li');
			Tul.css({'left':settings.comeLeft,'width':liWidth*Tli.size()})
			if(settings.imgCurrent==true){
				var Tdiv=$('<div>').appendTo(This);
				for(var i=1;i<=Tli.size()/2;i++){
					$('<span>').appendTo(Tdiv);
				}
				Tdiv.find('span').eq(0).addClass('imgOn');
                Tdiv.find('span').on("click",function(){
                    $(this).attr('class','imgOn').siblings().attr('class','');
                    Tul.stop().animate({'left':-liWidth*$(this).index()+settings.comeLeft});
                    Tli.eq($(this).index()+1).stop().animate({'opacity':1}).siblings().stop().animate({'opacity':0.4});
                    now=$(this).index();
                });
                Tdiv.find('span').on("mouseover",function(){
                    clearInterval(time);
                });
                Tdiv.find('span').on("mouseout",autoPlayFn);
				imgCur=true;
			}
		};
        //自动播放
        function autoPlayFn() {
            time=null;
            time=setInterval(function(){
                now++;
                nextPlay(now);
            },settings.playTime*1000);
        }
        Tul.find('li').hover(function(){
            clearInterval(time);
        },function(){
            autoPlayFn();
        });
        This.find(".pre").hover(function(){
            clearInterval(time);
        },function(){
            autoPlayFn();
        });
        This.find(".next").hover(function(){
            clearInterval(time);
        },function(){
            autoPlayFn();
        });
        This.find(".pre").on("click",function(){
            prePlay(--now);
        });
        This.find(".next").on("click",function(){
            nextPlay(++now);
        });
	};

})(jQuery);
