(function(global,$,undefined){
    try{document.domain="letv.com";}catch(e){};
    //乐视站播放器调用
    var letvPlayer = function(data){
        var _self = this;
        this.options = data;
        //关键参数适配
        if(!data && (!data.vid || !data.mmsid)){
            throw('no has argument');
            return false;
        };

        //iframe唯一标示用于定位iframe
        this.iframeid = 'iframe_player_' + new Date().getTime() + '_'+ Math.floor(Math.random() * 10000);

        var playSrc = data.player || 'http://player.hz.letv.com/hzplayer.swf/typeFrom=lesc/v_list=47/vid=1933210/isPlayerAd=0/autoPlay=1'; //播放器版本适配
        var src="http://www.letv.com/zt/letvhd2013/letvhd_frame.html"//播放器指向页面

        var iframe = document.createElement('iframe');
        iframe.scrolling = 'no';
        iframe.marginheight = '0';
        iframe.marginwidth = '0';
        iframe.frameborder = 'no';
        iframe.width = data.size.width;
        iframe.height = data.size.height;
        iframe.style.border = 'none';
        iframe.name = iframe.id = this.iframeid;

        var id = data.vid ? 'vid='+data.vid : 'mmsid='+data.mmsid;
        src += '?iframe='+'_' +this.iframeid+'&width='+data.size.width+'&height='+data.size.height+'&'+id;

        var cont = document.getElementById(data.cont)||document.createElement("div");
        cont.innerHTML = '';
        cont.appendChild(iframe);
        iframe.src = src;
        window['_' + _self.iframeid] = this;


        //获得当前播放器播放器引用
        this.getplayer = function(){
            return frames[_self.iframeid].window['player'].player;
        };
        this.pause = function(){
            this.getplayer().call('pause');
        }
        this.resume = function(){
            this.getplayer().call('play');
        }
    }

    function video(option){
       option = $(this).attr("video-info")?eval("("+$(this).attr("video-info")+")"):option;
	   var _option = {playType:"self",width:805,height:453};
	   var data = $.extend(_option,option);
       var vp = null;
       var playData = {
            'vid':data.vid,
            'cont':(data.container||$(this).attr("id")),
            'size':{
                'width': data.width,
                'height':data.height
            },
            'autoplay':data.autoplay||1,
            'poster':(data.pic||''),
            'event':data.event||
               {
                 "onstart":function(){
                   //if(top_player && (vp!=top_player)){
                   	 //top_player.getplayer().call('pause');
                   //}
                 },
                 
                  "onplay":function(){
                   // if(top_player && (vp!=top_player)){
                   	// top_player.getplayer().call('pause');
                   //}
                 },
                  "onpause":function(){
                  },
                  "onend":function(){
  
                  }
            }
        };
	   if(data.playType == "pop"){			
         	$(this).click(function(){
                playData.cont= "videoPop";
              pop("<div class='video_tc clear'><div class='close right'><a href='javascript:void(0)' id='wjPop-close'>关闭</a></div><div id="+playData.cont+" style='width:"+data.width+"px;height:"+data.height+"px'></div></div>",{attachBG:true,notAni:true});
                vp = new letvPlayer(playData);
       		});
	   }
      else if(data.playType == "popSelf"){
                playData.cont= "videoPop";
        pop("<div class='video_tc clear'><div class='close right'><a href='javascript:void(0)' id='wjPop-close'>关闭</a></div><div id="+playData.cont+" style='width:"+data.width+"px;height:"+data.height+"px'></div></div>",{attachBG:true,notAni:true});
                vp = new letvPlayer(playData);
      }
  	   else{
         vp = new letvPlayer(playData);
       }
      	return vp;
    }
    $(".zxvd").die("click").live("click",video);
    $.fn.zxVideo = video;
    global.zxVideo = video;
})(window,jQuery);