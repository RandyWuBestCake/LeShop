<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
  <!-- 系统引用 勿动 -->
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
  <!-- js引用文件添加 -->
  <!-- 页面底部统一引用jsInclude -->
  <!-- 引用静态页面标签 -->
  <script>var _hrefPath = '',_imagePath = '',_basePath = '';</script>
  <!--[if lt IE 7]>
  <script type="text/javascript" src="/object/Public/js/Scripts/unitpngfix.js"></script>
  <![endif]-->
    <script type='text/javascript' src='/object/Public/js/Scripts/generatesession.js'></script>
    <script type='text/javascript' src='/object/Public/js/Scripts/zxlib.js'></script>    

  <link rel="stylesheet" type="text/css" href="/object/Public/css/Content/style.css" />
  <script language="javascript" src="/object/Public/js/jquery.js"></script>
  <script type="text/javascript" src="/object/Public/js/Scripts/productpk.js"></script>
  <script type="text/javascript" src="/object/Public/js/Scripts/frontcommon.js"></script>
  <script language="javascript" src="/object/Public/js/Scripts/producthtml.js"></script>

<link  type='text/css' href='/object/Public/css/Content/global.css' rel='stylesheet' />
    <link  type='text/css' href='/object/Public/css/Content/index.css' rel='stylesheet' />

  <title><?php echo C('webTitle');?></title>
  <meta content="<?php echo C('keywords');?>" name="keywords">
  <meta content="<?php echo C('description');?>" name="description"></head>
<body>
  <div class="header"  style="text-align:center;background:#FFFFFF">
    <div class="top_link f8_bg">
      <div class="center">
        
          <ul class="left quick_links">
            <li>
              <a href="<?php echo U('Home/Appstore/index');?>"  target="_blank" webtrekkparam="{ct:'xbsy_dh1_Store'}" >
                <span class="pl15 pr15">LetvStore</span>
              </a>
              |
            </li>
            <li class="hd_list show_hide_block abroad" object="#abroad" type="slide" speed="fast" buffer="300">
              <a href="#" webtrekkparam="{ct:'xbsy_dh1_hw'}">
                <span class="pl15 pr25">海外版</span>
              </a>
              |
              <dl id="abroad">
                <dt>
                  <a href="#" webtrekkparam="{ct:'xbsy_dh1_hw'}">海外版</a>
                </dt>
                <dd>
                  <a href="#" webtrekkparam="{ct:'xbsy_dh1_HK'}">香港站</a>
                </dd>
              </dl>
            </li>
            <li class="mzhan show_hide_block" object="#mzhan" type="slide" speed="fast" buffer="300">
              <a href="#" webtrekkparam="{ct:'xbsy_dh1_sj'}">
                <span class="pl15 pr15">手机版</span>
              </a>
              |
              <div id="mzhan">
                <div class="left">
                  <img  alt=""  src="/object/Public/Picture/ewm_258.jpg" style="width:95px;"/>
                </div>
                <div class="left pl5">
                  <span class="dark">
                    扫描下载客户端
                    <br/>
                    手机抢购更给力
                  </span>
                  <br/>
                  <span class="gray">iPhone | Android</span>
                  <br/>
                  <a href="/app/download.html" webtrekkparam="{ct:'xbsy_dh1_sj_download'}" class="block red_bt_s mt10">
                    <span class="font12 white">免费下载</span>
                  </a>
                </div>
              </div>
            </li>
            <li>
              <a href="http://bbs.letv.com" webtrekkparam="{ct:'xbsy_dh1_sq'}">
                <span class="pl15 pr15">社区</span>
              </a>
              |
            </li>
            <li>
              <a href="/dkh.html" webtrekkparam="{ct:'xbsy_dh1_dkh'}">
                <span class="pl15 pr15">大客户通道</span>
              </a>
            </li>
          </ul>
        
        
          <ul class="right log_order t_r">
            <?php  session_start(); if(!session('users')){ ?>
        <li id="loginMess" class="loginNew"><a id="login" rel="nofollow" href="<?php echo U('Login/index');?>"><span class="pl15 ">登录</span></a> | <a rel="nofollow" target="_blank" href="<?php echo U('Register/index');?>"><span class=" pr15">注册</span></a></li>

        <?php  }else{ ?>

       <li class="loginNew" id="loginMess"><span class="gray">Hi,</span><a title="" target="_blank" href="" rel="nofollow"><span class="pl5 pr5"><?php echo ($_SESSION['users']['username']); ?></span></a> <a id="logout"  href="<?php echo U('Login/logout');?>" rel="nofollow"><span class="pl5 pr15">[退出]</span></a></li>

      <?php  } ?>
            <li class="order">
              <a rel="nofollow" webtrekkparam="{ct:'xbsy_dh1_myorder'}"  href="<?php echo U("Account/order");?>">
                <span class="pl15 pr15">我的订单</span>
              </a>
            </li>
            <li class="hd_list show_hide_block" object="#help" type="slide" speed="fast" buffer="300">
              <a href="<?php echo U("helpself/index");?>" webtrekkparam="{ct:'xbsy_dh1_help'}" target="_blank">
                <span class="pl15 pr25">帮助中心</span>
              </a>
              <dl id="help">
                <dt>
                  <a href="<?php echo U("helpself/index");?>" target="_blank">帮助中心</a>
                </dt>
                <dd>
                  <a href="#" webtrekkparam="{ct:'xbsy_dh1_help_psaz'}" target="_blank">配送安装</a>
                </dd>
                <dd>
                  <a href="#" webtrekkparam="{ct:'xbsy_dh1_help_shfw'}" target="_blank">售后服务</a>
                </dd>
                <dd>
                  <a href="#" webtrekkparam="{ct:'xbsy_dh1_help_yfbz'}" target="_blank">运费标准</a>
                </dd>
                <dd>
                  <a href="#" webtrekkparam="{ct:'xbsy_dh1_help_lxkf'}" target="_blank">联系客服</a>
                </dd>
              </dl>
            </li>
            <li class="hd_list show_hide_block" object="#dao" type="slide" speed="fast" buffer="300">
              <a href="javascript:void(0)" webtrekkparam="{ct:'xbsy_dh1_stdh'}">
                <span class="pl15 pr25">生态导航</span>
              </a>
              <dl id="dao">
                <dt>生态导航</dt>
                <dd>
                  <a href="#" webtrekkparam="{ct:'xbsy_dh1_stdh_lsw'}" target="_blank">乐视网</a>
                </dd>
                <dd>
                  <a href="#" webtrekkparam="{ct:'xbsy_dh1_stdh_wjw'}" target="_blank">网酒网</a>
                </dd>
                <dd>
                  <a href="#" webtrekkparam="{ct:'xbsy_dh1_stdh_lsh'}" target="_blank">乐生活</a>
                </dd>
                <!--<dd>
                <a href="/zt/cp2c.html" target="_blank">CP2C</a>
              </dd>
              -->
            </dl>
          </li>
        </ul>
      
    </div>
  </div>
  <block name ="banner">
    <div class="center">
      <a class="block logo left " webtrekkparam="{ct:'xbsy_LOGO'}" href="<?php echo U('home/Index/index');?>"><img src="<?php echo C('HTTP_LOGO');?>"></a>
      <div class="logo_right left">
        <a href="<?php echo U('home/Index/index');?>" webtrekkparam="{ct:'xbsy_zexhr'}">
          <img src="/object/Public/images/Picture/321c7a0420674f369ccbf2c19f3d4467.gif"/>
        </a>
      </div>
      <a class="block head_cart" href="<?php echo U('cart/index');?>" webtrekkparam="{ct:'xbsy_gwc'}" target="_blank">
        <div class="had_num" id="productNumInCart"></div>
        <span class="pl20 white font14">购物车</span>
      </a>
      <div class="clear"></div>
    </div>
  </block>
  <?php  $rNav = getNav(1); $lNav = getNav(0); ?>
  
    <div class="nav">
      <div class="center relative zindex299" >
        <ul class="main_nav left">
          <?php if(is_array($lNav)): foreach($lNav as $key=>$v): ?><li class="hadlist">
                <a href="<?php echo ($v['url']); ?>"> <?php echo ($v['title']); ?></a>
              </li><?php endforeach; endif; ?>
        </ul>
        <ul class="yinxiao right">
          <li>|</li>
          <?php if(is_array($rNav)): foreach($rNav as $key=>$v): ?><li>
              <a href="<?php echo ($v['url']); ?>" target="_blank" ><?php echo ($v['title']); ?></a>
            </li><?php endforeach; endif; ?>          
      </ul>
  </div>
</div>

</div>



<div class="xiangqing">
<div class="index_top" >
<div class="left"><a href="index.html" >比一比</a> > <a href="list_p1.html">产品列表</a> > 产品详情</div>
<div class="right"><a id="bdshare_show" href="#">这个工具不错，我要分享给朋友 <img src="/object/Public/images/Picture/fx.jpg" /></a></div><div class="ShareWindow hidden" id="ShareWindow" style="top:15px;right:-50px;position:absolute;width:40px;height:225px;display: none;">
<div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare" data="">
<a class="bds_qzone"></a> <a class="bds_tsina"></a> <a class="bds_tqq"></a> <a class="bds_tsohu"></a> <a class="bds_renren"></a>
<a class="bds_douban"></a>
</div>
</div>
<script type="text/javascript" id="bdshare_js" data="type=tools&uid=0"></script>
<script type="text/javascript" id="bdshell_js"></script>

<script type="text/javascript">
document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
var is_hidden="";
var bdguanzu_diplay = "1";
var bdshare_display = "1";
var timeOut;
$(function(){
var isIE6= navigator.appVersion.indexOf("MSIE 6")>-1;
if(!bdguanzu_diplay && bdshare_display == "1"){
$("#ShareWindow").css("top","185px");
if(isIE6){
$("#ShareWindow").css("top",185);
$("#ShareWindow").css("right",190);
}
}
$("#bdshare_show").mouseover(function(){
var showdiv = $("#ShareWindow").slideDown("slow");
clearTimeout(timeOut);
}).mouseleave(function(){
timeOut = setTimeout(hideDiv,300);
return false;
});
$("#ShareWindow").mouseover(function(){
clearTimeout(timeOut);
}).mouseleave(function(){
timeOut = setTimeout(hideDiv,300);
});
});
function hideDiv(){
$("#ShareWindow").slideUp("slow");
}
</script>
</div>
<script>
$(function(){
$(".gha").click(function(event){
var e=window.event || event;
if(e.stopPropagation){
e.stopPropagation();
}else{
e.cancelBubble = true;
}
$("#pinpai").hide();
$("#genghuanchanp").fadeIn("fast");
});
$("#genghuanchanp").click(function(event){
var e=window.event || event;
if(e.stopPropagation){
e.stopPropagation();
}else{
e.cancelBubble = true;
}
});

});

$(function(){ //隐藏
$(document).bind("click",function(e){
var target  = $(e.target);
if(target.closest(".genghuanchanp").length == 0){
$(".genghuanchanp").fadeOut("fast");
//document.getElementById("xinghao2").style.display="none";
document.getElementById("xinghao").style.display="none";
}
}) 
});

window.onload=function(){
var oflink = document.getElementById('sel');
var aDt = oflink.getElementsByTagName('dt');
var aUl = oflink.getElementsByTagName('ul');
var aH3= oflink.getElementsByTagName('h3');
var t = false;
for(var i=0;i<aDt.length;i++){

aDt[i].index = i;
aDt[i].onclick = function(ev){

var ev = ev || window.event;
var This = this;
for(var i=0;i<aUl.length;i++){
  $("#"+aUl[i].id).fadeOut("fast");
}
if(!t){
$("#"+aUl[this.index].id).fadeIn("fast",function(){t=true;});
}else{
t=false;
}

ev.cancelBubble = true;
};
}
for(var i=0;i<aUl.length;i++){
aUl[i].index = i;
(function(ul){
var iLi = ul.getElementsByTagName('li');
for(var i=0;i<iLi.length;i++){
iLi[i].onmouseover = function(){
	this.className = 'hover';
};
iLi[i].onmouseout = function(){
	this.className = '';
};
iLi[i].onclick = function(ev){
		t=false;
	var ev = ev || window.event;
	aH3[this.parentNode.index].innerHTML = this.innerHTML;
	ev.cancelBubble = true;
	 this.parentNode.style.display = 'none';
};
}

})(aUl[i]);
}

}
</script>
    <input type="hidden" id="allprice694" value="4999+980" /><div class="chanpintou">
    <ul class="tou_left">
      <li>
        <span id="img1" style="display:"><img id="img694" src="/object/<?php echo ($pros['imgmain']); ?>" width="355" height="218"/><br/></span>
        <span id="img2" style="display:none"><img src="/object/<?php echo ($pros['imgside']); ?>" width="355" height="218"/><br/></span>
        <span id="img3" style="display:none"><img src="/object/<?php echo ($pros['imgback']); ?>" width="355" height="218"/><br/></span>
      </li>
      <li class="li2">
        <div class="div1" id="aimg1" onclick="javascript:changeImage(1)"><a  id="aimg1"  title="正面图片">正</a>
        </div>
        <div id="aimg2"  onclick="javascript:changeImage(2);">
            <a    title="侧面图片">侧</a>
        </div>
        <div id="aimg3" onclick="javascript:changeImage(3);">
            <a  title="背面图片">背</a>
        </div>
      </li>
      <li class="xiangqi">
        <a href="javascript:postPraiseNum()" id="yyrdz" class="dgz"></a>
        <a id="duibi694" name="duibiname" href="javascript:intocomp('694');" class="dbanniu" ></a> 
        <div class="gha">
          <a href="javascript:;" style="margin: 0px;margin-left:-10px;">更换产品</a>
        <div class="genghuanchanp" id="genghuanchanp" >
        <div class="select_down"id="sel">
<dl>
<dt style="margin-left:8px;">
<h3>请选择品牌</h3>
<a href="javascript:;" style="margin:0px; right:7px; margin-top:5px;"></a>
<ul id="pinpai" style="display: none;left:8px; top:25px;"><li><b onclick="searchProductbyBrand(233)">松下</b></li><li><b onclick="searchProductbyBrand(19)">乐视</b></li><li><b onclick="searchProductbyBrand(142)">海信</b></li><li><b onclick="searchProductbyBrand(143)">创维</b></li><li><b onclick="searchProductbyBrand(144)">海尔</b></li><li><b onclick="searchProductbyBrand(145)">飞利浦</b></li><li><b onclick="searchProductbyBrand(146)">TCL</b></li><li><b onclick="searchProductbyBrand(147)">索尼</b></li><li><b onclick="searchProductbyBrand(148)">康佳</b></li><li><b onclick="searchProductbyBrand(149)">小米</b></li><li><b onclick="searchProductbyBrand(150)">联想</b></li><li><b onclick="searchProductbyBrand(151)">三星</b></li><li><b onclick="searchProductbyBrand(152)">夏普</b></li><li><b onclick="searchProductbyBrand(153)">长虹</b></li><li><b onclick="searchProductbyBrand(154)">LG</b></li><li><b onclick="searchProductbyBrand(155)">东芝</b></li><li><b onclick="searchProductbyBrand(157)">欧宝丽</b></li></ul>
</dt>
<dt id="xinghao2" style="margin-left:8px;">
<h3>请选择型号</h3>
<a href="javascript:;"style="margin:0px; right:7px; margin-top:28px;"></a>
<ul id="xinghao" style=" display: none;left:8px; top:47px;">
</ul>
</dt>
</dl>
</div>
</div>
</div>
</li>
</ul>
  <div class="tou_right">
    <dl>
      <dt>
        <span id="pname694"><h1><?php echo ($pros[proname]); ?></h1></span>
        <p><span onclick="javascript:void(0);"></span></p>
      </dt>
      <dd>
        <span class="span">价格：</span>
        <span class="xianshi_span" onmousemove="xsjiage('div6941')" onmouseout="gbjiage('div6941')"><?php echo ($pros['price']); ?>
          <div class="xianshi_div1" id="div6941">
            <div class="jian"></div>
            <div class="kuang">硬件全配价格+乐视网TV版24个月服务费</div>
          </div>
        </span>
      </dd>
    </dl>
<div id="body2" class="chanshu">
    <p><b>品牌：</b><span class="span1"><?php echo ($bname); ?></span></p>
    <p><b>屏幕尺寸：</b><span class="span1"><?php echo ($pros['size']); ?></span></p>
    <p><b>分辨率：</b><span class="span1"><?php echo ($pros['resolution']); ?></span></p>
    <p><b>最佳观看距离：</b><span class="span1"><?php echo ($pros['view_distance']); ?></span></p>
    <p><b>产品定位：</b><span class="span1"><?php echo ($pros['product_position']); ?></span></p>
</div>
<div class="chanshu">
    <p><b>音效系统：</b><span class="span1">
    音响系统：<?php echo ($pros['sound_system']); ?><br>
    </span></p>
    <p><b>接口参数：</b><span class="span1">
    <?php echo ($pros['interface']); ?></span></p>
    <p><b>整机重量：</b><span class="span1">
    <?php echo ($pros['weight']); ?></span></p>
    <p><a href="#productinfo">查看详细参数></a></p>
</div>
<div class="clear"></div><a href="http://shop.letv.com/product/product-pid-GWGT601006-n-3.html" class="lijiyuding" target="_blank">立即购买</a>
</div></div>

<div class="chanping">产品印象</div>
  <div class="dj_gj_l"> 
    <div class="youyige_left" id="yinxiang">
    <dl class="dl1">
      <dt>价格</dt>
        <dd>
          <ul class="ul1">
            <li <?php echo ($pros['price']<2000?'class="li"':''); ?>>低</li>
            <li>稍低</li>
            <li>中等</li>
            <li>稍高</li>
            <li>高</li>
          </ul>
          <ul class="ul2">
            <li <?php echo ($pros['price']<2500?'class="li"':''); ?>></li>
            <li <?php echo ($pros['price'] <= 4000 & $pros['price'] > 2500?'class="li"':''); ?>></li>
            <li <?php echo ($pros['price'] <= 6000 & $pros['price'] > 4000?'class="li"':''); ?>></li>
            <li <?php echo ($pros['price'] <= 8000 & $pros['price'] > 6000?'class="li"':''); ?>></li>
            <li <?php echo ($pros['price'] > 8000?'class="li"':''); ?>></li>
          </ul>
        </dd>
    </dl>
    <dl class="dl1">
      <dt>屏幕尺寸</dt>
        <dd>
          <ul class="ul1">
            <li>小</li>
            <li>较小</li>
            <li>中等</li>
            <li>较大</li>
            <li>大</li>
          </ul>
          <ul class="ul2">
            <li <?php echo ($pros['size'] < 40 ? 'class="li"':''); ?>></li>
            <li <?php echo ($pros['size'] <= 49 & $pros['size'] > 40?'class="li"':''); ?>></li>
            <li <?php echo ($pros['size'] <= 60 & $pros['size'] >= 50?'class="li"':''); ?>></li>
            <li <?php echo ($pros['size'] <= 70 & $pros['size'] > 60?'class="li"':''); ?>></li>
            <li <?php echo ($pros['size'] <= 80 & $pros['size'] > 70?'class="li"':''); ?>></li>
          </ul>
      </dd>
    </dl>
    <dl class="dl2">
      <dt>分辨率</dt>
        <dd>
          <ul class="ul1">
            <li >较低</li>
            <li>中等</li>
            <li>较高</li>
          </ul>
          <ul class="ul2">
            <li <?php echo ($pros['resolution'] == '1366*760' ? 'class="li"':''); ?>></li>
            <li <?php echo ($pros['resolution'] == '1920*1080'? 'class="li"': ''); ?>></li>
            <li <?php echo ($pros['resolution'] == '3840*2160'? 'class="li"' : ''); ?>></li>
          </ul>
      </dd>
    </dl>
  </div>
  <div id="maxVoteAll" class="djds">
    <p>大家都在说TA：</p>
    <div class="yanshe">
    <div class="yanshe_left"></div>
    <div id="maxVote" class="yanshe_cer"><?php echo ($tag); ?></div>
    <div class="yanshe_right"></div>
  </div>
</div>
  <div class="clear"></div><div id="vote" class="xihuan"></div>
</div>
<div class="clear"></div>
<table class="mws-table mws-datatable">
<div class="chanping" id="productinfo">产品规格</div>
  <div id="body1">
  <table  class="table">
    <tr class="trBiaoti">
      <th width="100" style="text-indent:0px;text-align:center;">信息</th>
      <th width="200" style="text-indent:0px;text-align:center;">名称</th>
      <th style="text-indent:0px;text-align:center;">详情</th>
    </tr>
  <?php if(is_array($spepr)): foreach($spepr as $k=>$vo): ?><tr>                  
    <td rowspan="<?php echo count($vo);?>" class="cer"><H3><?php echo ($name[$k]); ?></H3></td>
    <?php if(is_array($vo)): foreach($vo as $key=>$l): ?><td class="pig"><H4><?php echo ($l['name']); ?></H4></td>
    <td class="pig"><H5><?php echo ($l['con']); ?></H5></td>
  </tr><?php endforeach; endif; endforeach; endif; ?>
  </table>
</div>
<div id="dllulan" class="gongyong">
  <div onclick="xdianji1()" id="db" class="gongyong_top">大家都对比的产品：</div>
  <div onclick="xdianji2()" id="gz" class="gongyong_top1 bian">大家都关注的产品：</div>
  <div id="gongyongnr1" class="gongyong_nr">

  <div onmouseout="lkgg1('divkuang1')" onmouseover="ydgg1('divkuang1')" id="divkuang1" class="divkuang">
    <input type="hidden" value="999+980+300+100" id="allprice776">
    <input type="hidden" value="999+980+100" id="allprice773">
    <ul class="ul_l">
      <li class="li1">
        <a onclick="productinfo2(&quot;776&quot;)" target="_blank" href="productinfo_776.html">
          <img width="140" height="92" src="http://img0.hdletv.com/leyibi/uploadimg/14140557747801.jpg" id="img776">
        </a>
      </li>
      <li class="li2">
        <div class="li2_bb">
          <a id="pname776" onclick="productinfo2(&quot;776&quot;)" target="_blank" href="productinfo_776.html">乐视TV·超级电视S40 Air L郭敬明·小时代版
          </a>
        </div>
      </li>
      <li class="li3">
        <span onmouseout="gbjiage('lldiv77611')" onmousemove="xsjiage('lldiv77611')" class="xianshi_span">￥999
          <div id="lldiv77611" class="xianshi_div1">
            <div class="jian"></div>
            <div class="kuang">硬件全配价格</div>
          </div>
        </span>
      </li>
    </ul>
    <img width="38" height="41" class="pk" src="/object/Public/images/images/dPk.png">
    <ul>
      <li class="li1">
        <a onclick="productinfo2(&quot;773&quot;)" target="_blank" href="productinfo_773.html">
          <img width="140" height="92" src="http://img0.hdletv.com/leyibi/uploadimg/14111241708511.jpg" id="img773">
        </a>
      </li>
      <li class="li2">
        <div class="li2_bb">
          <a id="pname773" onclick="productinfo2(&quot;773&quot;)" target="_blank" href="productinfo_773.html">乐视TV·超级电视S40 Air L全配版
          </a>
        </div>
      </li>
      <li class="li3">
        <span onmouseout="gbjiage('lldiv77311')" onmousemove="xsjiage('lldiv77311')" class="xianshi_span">￥999
          <div id="lldiv77311" class="xianshi_div1" style="display: none;">
            <div class="jian"></div>
            <div class="kuang">硬件全配价格</div>
          </div>
        </span>
      </li>
    </ul>
    <div class="clear"></div>
    <a class="dbjg" target="_blank" href="product_773_vs_776.html">
    <img width="110" height="30" src="/object/Public/images/images/dbjg.png"></a>
  </div>

  <div style="margin-left:-3px" onmouseout="lkgg1('divkuang2')" onmouseover="ydgg1('divkuang2')" id="divkuang2" class="divkuang">
  <input type="hidden" value="4999+500+980" id="allprice688">
  <input type="hidden" value="4999+500+980" id="allprice688">
  <ul class="ul_l">
    <li class="li1">
      <a onclick="productinfo2(&quot;688&quot;)" target="_blank" href="productinfo_688.html">
        <img width="140" height="92" src="http://img0.hdletv.com/leyibi/uploadimg/14047079107581.jpg" id="img688">
      </a>
    </li>
    <li class="li2">
      <div class="li2_bb">
        <a id="pname688" onclick="productinfo2(&quot;688&quot;)" target="_blank" href="productinfo_688.html">乐视TV·超级电视X60S敢死队·硬汉版
        </a>
      </div>
    </li>
    <li class="li3">
      <span onmouseout="gbjiage('lldiv68821')" onmousemove="xsjiage('lldiv68821')" class="xianshi_span">￥4999
        <div id="lldiv68821" class="xianshi_div1">
          <div class="jian"></div>
          <div class="kuang">硬件全配价格</div>
        </div>
      </span>
    </li>
  </ul>
    <img width="38" height="41" class="pk" src="/object/Public/images/images/dPk.png">
    <ul>
      <li class="li1">
        <a onclick="productinfo2(&quot;577&quot;)" target="_blank" href="productinfo_577.html">
          <img width="140" height="92" src="http://img0.hdletv.com/biyibi/ueditor/jsp/upload1/20140504/98801399170688661.jpg" id="img577">
        </a>
      </li>
      <li class="li2">
        <div class="li2_bb">
          <a id="pname577" onclick="productinfo2(&quot;577&quot;)" target="_blank" href="productinfo_577.html">乐视TV·超级电视X50 Air张艺谋《归来》艺术版
          </a>
        </div>
      </li>
      <li class="li3">
        <span onmouseout="gbjiage('lldiv57721')" onmousemove="xsjiage('lldiv57721')" class="xianshi_span">￥2999
        <div id="lldiv57721" class="xianshi_div1">
          <div class="jian"></div>
          <div class="kuang">X50 Air硬件价格</div>
        </div>
        </span>
      </li>
    </ul>
    <div class="clear"></div>
      <a class="dbjg" target="_blank" href="product_577_vs_688.html">
        <img width="110" height="30" src="/object/Public/images/images/dbjg.png">
      </a>
    </div>
    <div style="background-image:none; margin-left:-6px;" onmouseout="lkgg1('divkuang3')" onmouseover="ydgg1('divkuang3')" id="divkuang3" class="divkuang">
    <input type="hidden" value="1999+980" id="allprice676">
    <input type="hidden" value="2999" id="allprice577">
    <ul class="ul_l">
      <li class="li1">
        <a onclick="productinfo2(&quot;676&quot;)" target="_blank" href="productinfo_676.html">
        <img width="140" height="92" src="http://img0.hdletv.com/biyibi/ueditor/jsp/upload1/20140610/84401402395122960.jpg" id="img676">
        </a>
      </li>
      <li class="li2">
        <div class="li2_bb">
          <a id="pname676" onclick="productinfo2(&quot;676&quot;)" target="_blank" href="productinfo_676.html">乐视TV·超级电视S50 Air 2D全配版
          </a>
        </div>
      </li>
      <li class="li3">
        <span onmouseout="gbjiage('lldiv67631')" onmousemove="xsjiage('lldiv67631')" class="xianshi_span">￥1999
          <div id="lldiv67631" class="xianshi_div1">
            <div class="jian"></div>
            <div class="kuang">硬件全配价格</div>
          </div>
        </span>
      </li>
    </ul>
    <img width="38" height="41" class="pk" src="/object/Public/images/images/dPk.png">
    <ul>
      <li class="li1">
        <a onclick="productinfo2(&quot;640&quot;)" target="_blank" href="productinfo_640.html">
          <img width="140" height="92" src="http://img0.hdletv.com/biyibi/ueditor/jsp/upload1/20140515/32611400146725609.jpg" id="img640">\
        </a>
      </li>
      <li class="li2">
        <div class="li2_bb">
          <a id="pname640" onclick="productinfo2(&quot;640&quot;)" target="_blank" href="productinfo_640.html">小米电视2 家庭影院版
          </a>
        </div>
      </li>
      <li class="li3">
        <span onmouseout="gbjiage('lldiv64031')" onmousemove="xsjiage('lldiv64031')" class="xianshi_span1">￥3999
        </span>
      </li>
    </ul>
    <div class="clear"></div>
      <a class="dbjg" target="_blank" href="product_640_vs_676.html">
        <img width="110" height="30" src="/object/Public/images/images/dbjg.png">
      </a>
    </div>
  </div>



  <div style="display:none;" id="gongyongnr" class="gongyong_nr">
    <input type="hidden" value="999+980+300+100" id="allprice776"><ul onmouseout="lilanremove(this)" onmousemove="lilandd(this)"><li class="li1"><a onclick="productinfo2(&quot;776&quot;)" target="_blank" href="productinfo_776.html"><img width="162" height="108" src="http://img0.hdletv.com/leyibi/uploadimg/14140557747801.jpg" id="img776"></a></li><li class="li2"><div class="li2_bb"><a id="pname776" onclick="productinfo2(&quot;776&quot;)" target="_blank" href="productinfo_776.html">乐视TV·超级电视S40 Air L郭敬明·小时代版</a></div></li><li class="li3"><span onmouseout="gbjiage('lldiv7761')" onmousemove="xsjiage('lldiv7761')" class="xianshi_span">￥999<div id="lldiv7761" class="xianshi_div1"><div class="jian"></div><div class="kuang">硬件全配价格</div></div></span><span>+</span><span onmouseout="gbjiage('lldiv7762')" onmousemove="xsjiage('lldiv7762')" class="xianshi_span">￥980<div id="lldiv7762" class="xianshi_div2"><div class="jian"></div><div class="kuang">乐视网TV版24个月服务费</div></div></span><span>+</span><span onmouseout="gbjiage('lldiv7763')" onmousemove="xsjiage('lldiv7763')" class="xianshi_span">￥300<div id="lldiv7763" class="xianshi_div2"><div class="jian"></div><div class="kuang">增配包价格</div></div></span><span>+</span><span onmouseout="gbjiage('lldiv7764')" onmousemove="xsjiage('lldiv7764')" class="xianshi_span">￥100<div id="lldiv7764" class="xianshi_div3"><div class="jian"></div><div class="kuang">进口SUMSUNG屏</div></div></span></li><input type="hidden" value="776" name="orderId"><li class="li4"><a class="dbanniu" href="javascript:intocomp('776')" id="duibi776" name="duibiname"></a></li></ul><input type="hidden" value="4999+980" id="allprice694"><ul onmouseout="lilanremove(this)" onmousemove="lilandd(this)"><li class="li1"><a onclick="productinfo2(&quot;694&quot;)" target="_blank" href="productinfo_694.html"><img width="162" height="108" src="http://img0.hdletv.com/leyibi/uploadimg/14059922786951.jpg" id="img694"></a></li><li class="li2"><div class="li2_bb"><a id="pname694" onclick="productinfo2(&quot;694&quot;)" target="_blank" href="productinfo_694.html">乐视TV·超级电视X60S全配版</a></div></li><li class="li3"><span onmouseout="gbjiage('lldiv6941')" onmousemove="xsjiage('lldiv6941')" class="xianshi_span">￥4999<div id="lldiv6941" class="xianshi_div1"><div class="jian"></div><div class="kuang">硬件全配价格</div></div></span><span>+</span><span onmouseout="gbjiage('lldiv6942')" onmousemove="xsjiage('lldiv6942')" class="xianshi_span">￥980<div id="lldiv6942" class="xianshi_div3"><div class="jian"></div><div class="kuang">乐视网TV版24个月服务费</div></div></span></li><input type="hidden" value="694" name="orderId"><li class="li4"><a class="dbanniu" href="javascript:intocomp('694')" id="duibi694" name="duibiname"></a></li></ul><input type="hidden" value="4999+500+980" id="allprice688"><ul onmouseout="lilanremove(this)" onmousemove="lilandd(this)"><li class="li1"><a onclick="productinfo2(&quot;688&quot;)" target="_blank" href="productinfo_688.html"><img width="162" height="108" src="http://img0.hdletv.com/leyibi/uploadimg/14047079107581.jpg" id="img688"></a></li><li class="li2"><div class="li2_bb"><a id="pname688" onclick="productinfo2(&quot;688&quot;)" target="_blank" href="productinfo_688.html">乐视TV·超级电视X60S敢死队·硬汉版</a></div></li><li class="li3"><span onmouseout="gbjiage('lldiv6881')" onmousemove="xsjiage('lldiv6881')" class="xianshi_span">￥4999<div id="lldiv6881" class="xianshi_div1"><div class="jian"></div><div class="kuang">硬件全配价格</div></div></span><span>+</span><span onmouseout="gbjiage('lldiv6882')" onmousemove="xsjiage('lldiv6882')" class="xianshi_span">￥500<div id="lldiv6882" class="xianshi_div2"><div class="jian"></div><div class="kuang">增配包价值</div></div></span><span>+</span><span onmouseout="gbjiage('lldiv6883')" onmousemove="xsjiage('lldiv6883')" class="xianshi_span">￥980<div id="lldiv6883" class="xianshi_div3"><div class="jian"></div><div class="kuang">乐视网TV版24个月服务费</div></div></span></li><input type="hidden" value="688" name="orderId"><li class="li4"><a class="dbanniu" href="javascript:intocomp('688')" id="duibi688" name="duibiname"></a></li></ul><input type="hidden" value="2999+500+980" id="allprice577"><ul onmouseout="lilanremove(this)" onmousemove="lilandd(this)"><li class="li1"><a onclick="productinfo2(&quot;577&quot;)" target="_blank" href="productinfo_577.html"><img width="162" height="108" src="http://img0.hdletv.com/biyibi/ueditor/jsp/upload1/20140504/98801399170688661.jpg" id="img577"></a></li><li class="li2"><div class="li2_bb"><a id="pname577" onclick="productinfo2(&quot;577&quot;)" target="_blank" href="productinfo_577.html">乐视TV·超级电视X50 Air张艺谋《归来》艺术版</a></div></li><li class="li3"><span onmouseout="gbjiage('lldiv5771')" onmousemove="xsjiage('lldiv5771')" class="xianshi_span">￥2999<div id="lldiv5771" class="xianshi_div1"><div class="jian"></div><div class="kuang">X50 Air硬件价格</div></div></span><span>+</span><span onmouseout="gbjiage('lldiv5772')" onmousemove="xsjiage('lldiv5772')" class="xianshi_span">￥500<div id="lldiv5772" class="xianshi_div2"><div class="jian"></div><div class="kuang">艺术级增配包</div></div></span><span>+</span><span onmouseout="gbjiage('lldiv5773')" onmousemove="xsjiage('lldiv5773')" class="xianshi_span">￥980<div id="lldiv5773" class="xianshi_div3"><div class="jian"></div><div class="kuang">乐视网TV版24个月服务费</div></div></span></li><input type="hidden" value="577" name="orderId"><li class="li4"><a class="dbanniu" href="javascript:intocomp('577')" id="duibi577" name="duibiname"></a></li></ul><input type="hidden" value="2999+500+980" id="allprice667"><ul onmouseout="lilanremove(this)" onmousemove="lilandd(this)"><li class="li1"><a onclick="productinfo2(&quot;667&quot;)" target="_blank" href="productinfo_667.html"><img width="162" height="108" src="http://img0.hdletv.com/biyibi/ueditor/jsp/upload1/20140603/62931401763423710.jpg" id="img667"></a></li><li class="li2"><div class="li2_bb"><a id="pname667" onclick="productinfo2(&quot;667&quot;)" target="_blank" href="productinfo_667.html">乐视TV·超级电视X50 Air C罗·足球版</a></div></li><li class="li3"><span onmouseout="gbjiage('lldiv6671')" onmousemove="xsjiage('lldiv6671')" class="xianshi_span">￥2999<div id="lldiv6671" class="xianshi_div1"><div class="jian"></div><div class="kuang">X50 Air硬件价格</div></div></span><span>+</span><span onmouseout="gbjiage('lldiv6672')" onmousemove="xsjiage('lldiv6672')" class="xianshi_span">￥500<div id="lldiv6672" class="xianshi_div2"><div class="jian"></div><div class="kuang">C罗·足球版增配包</div></div></span><span>+</span><span onmouseout="gbjiage('lldiv6673')" onmousemove="xsjiage('lldiv6673')" class="xianshi_span">￥980<div id="lldiv6673" class="xianshi_div3"><div class="jian"></div><div class="kuang">乐视网TV版24个月服务费</div></div></span></li><input type="hidden" value="667" name="orderId"><li class="li4"><a class="dbanniu" href="javascript:intocomp('667')" id="duibi667" name="duibiname"></a></li></ul><input type="hidden" value="2499+980" id="allprice682"><ul onmouseout="lilanremove(this)" onmousemove="lilandd(this)"><li class="li1"><a onclick="productinfo2(&quot;682&quot;)" target="_blank" href="productinfo_682.html"><img width="162" height="108" src="http://img0.hdletv.com/biyibi/ueditor/jsp/upload1/20140610/59081402396036056.jpg" id="img682"></a></li><li class="li2"><div class="li2_bb"><a id="pname682" onclick="productinfo2(&quot;682&quot;)" target="_blank" href="productinfo_682.html">乐视TV·超级电视S50 Air 3D全配版</a></div></li><li class="li3"><span onmouseout="gbjiage('lldiv6821')" onmousemove="xsjiage('lldiv6821')" class="xianshi_span">￥2499<div id="lldiv6821" class="xianshi_div1"><div class="jian"></div><div class="kuang">硬件全配价格</div></div></span><span>+</span><span onmouseout="gbjiage('lldiv6822')" onmousemove="xsjiage('lldiv6822')" class="xianshi_span">￥980<div id="lldiv6822" class="xianshi_div3"><div class="jian"></div><div class="kuang">乐视网TV版24个月服务费</div></div></span></li><input type="hidden" value="682" name="orderId"><li class="li4"><a class="dbanniu" href="javascript:intocomp('682')" id="duibi682" name="duibiname"></a></li></ul></div></div>
 <input type="hidden" id="pname" value=乐视TV·超级电视X60S全配版>
<div class="piaofu" id="duibilan"><div class="top" id="p1">对比栏</div><span id="dbtishi">对比栏已满，您可以删除不需要的栏内商品再继续添加哦！</span><a href="javascript:" class="yc" onclick="javascript:yinchangduibi();">隐藏</a><div class="neirong"><div id="bb1"></div><div class="jixu"></div></div></div><div class="PK_lyb"></div></div>
<input type="hidden" name="pid" id="pid" value="694" />
<input type="hidden" name="toupiao" id="toupiao" value="false" />
<input type="hidden" name="zan" id="zan" value="false" />



<script  type="text/javascript">
    $(function(){
        $(".tabs").find("li").bind("click",function(){
                var id=$(this).attr("id");
                $(".tabs").find("li").removeClass("curr");
                $(this).addClass("curr");
                
            $(".bd").hide();
            $("#c"+id).show();
        });
        
        //绷定事件
        $(".zzfw").live("click",function(){
            var url = $(this).attr("url");
            Js.login.hasLogin(function(){
                window.location.href=url;
                window.event.returnValue = false;
            }); 
        });                         
    }); 
</script>

<!--<a href="http://www.sojump.com/jq/3674687.aspx" target="_blank" class="diaocha block"></a>
-->

<!--右侧飘窗-->
<div class="sidebar_float">
<!-- 百度分享 -->
<div class="is_share ie6-hover border hand handle  hidden " object="#bd_share">
<div class="share_show" id="bd_share">
<div class="share_bg absolute bdsharebuttonbox">
<a title="分享到QQ空间" href="javascript:void(0);" class="bds_qzone" data-cmd="qzone"></a>
<a title="分享到新浪微博" href="javascript:void(0);" class="bds_tsina" data-cmd="tsina"></a>
<a title="分享到微信" href="javascript:void(0);" class="bds_weixin" data-cmd="weixin"></a>
<a title="分享到腾讯微博" href="javascript:void(0);" class="bds_tqq" data-cmd="tqq"></a>
<a title="分享到搜狐微博" href="javascript:void(0);" class="bds_tsohu" data-cmd="tsohu"></a>
<a title="分享到人人网" href="javascript:void(0);" class="bds_renren" data-cmd="renren"></a>
<a title="分享到豆瓣网" href="javascript:void(0);" class="bds_douban" data-cmd="douban"></a>
</div>
</div>
</div>
<!-- 有奖调查 -->
<a href="http://www.sojump.com/jq/3881495.aspx" target="_blank">
<div class="is_survey ie6-hover border hand handle  show1 " id="diaocha_div" object="#dc_div">
<!--<div class="top_show" id="dc_div">
<div class="arrow absolute"></div>
<div class="red_bg absolute">有奖调查</div>
</div>
-->
</div>
</a>
<!-- 销量天王 -->
<a href="<?php echo U('index:index');?>" target="_blank">
<div class="is_king ie6-hover border hand handle  show2 " id="king_div" object="#tw_div">
<!--<div class="top_show" id="tw_div">
<div class="arrow absolute"></div>
<div class="red_bg absolute">销量天王</div>
</div>
-->
</div>
</a>
<!-- 下载APP -->
<div class="is_app ie6-hover border hand handle  show3 " id="app_div" object="#xz_div">
<div class="app_show" id="xz_div">
<div class="app_bg border absolute">
<p class="pt5 pb5">手机下单更快捷</p>
<p>
<a href="http://shop.letv.com/app/download.html?cps_id=yd_pc_yg_rk_pcfb_0_h" target="_blank">
<img  alt=""  src="/object/Public/Picture/ewm_258.jpg" width="85px" style=""/>
</a>
</p>
</div>
</div>
</div>
</div>

<!--返回顶部-->
<div class="top_float ">
<div class="is_top ie6-hover border hand handle" id="backTop" object="#bt_div">
<!--<div class="top_show" id="bt_div">
<div class="arrow absolute"></div>
<div class="red_bg absolute">返回顶部</div>
</div>
-->
</div>
</div>


<div class="footer">
<div class="white_bg pt40 pb30">
<div class="center clearfix">
<ul class="icon_list line_b clear">
<li class="zheng">
<span class="font18 dark">正品保障</span>
<br />
所有产品都是原装正品
</li>
<li class="threeday">
<a webtrekkparam="{ct:'xbsy_fwpt_3RNSD'}">
<span class="font18 dark">3日内送达</span>
<br />
<span class="gray">24大核心城市</span>
</a>
</li>
<li class="returns">
<a webtrekkparam="{ct:'xbsy_fwpt_7RWLY'}">
<span class="font18 dark">7天无理由退换货</span>
<br />
<span class="gray">支持7天退货，30天换货</span>
</a>
</li>
<li class="delivery">
<a webtrekkparam="{ct:'xbsy_fwpt_616CSSD'}">
<span class="font18 dark">616城市送达</span>
<br />
<span class="gray">覆盖全国29个省</span>
</a>
</li>
<li class="policy">
<a webtrekkparam="{ct:'xbsy_fwpt_3BZC'}">
<span class="font18 dark">3包政策</span>
<br />
<span class="gray">享受国家质量保障政策</span>
</a>
</li>
</ul>
<div class="help_list  left pt50">
<dl>
<dt>新手入门</dt>
<dd>
<a webtrekkparam="{ct:'xbsy_fwpt_xsrm_zcydl'}" href="#">
<span class="simsun">></span>
注册与登录
</a>
</dd>
<dd>
<a webtrekkparam="{ct:'xbsy_fwpt_xsrm_zhaq'}" href="#" >
<span class="simsun">></span>
账户安全
</a>
</dd>
<dd>
<a webtrekkparam="{ct:'xbsy_fwpt_xsrm_zhmm'}" href="#" >
<span class="simsun">></span>
如何找回密码
</a>
</dd>
<!--<dd>
<a webtrekkparam="{ct:'YW_xsrm_tab4'}" href="#" >
<span class="simsun">></span>
购物指南
</a>
</dd>
-->
<dd>
<a webtrekkparam="{ct:'xbsy_fwpt_xsrm_lmFAQ'}" href="#" >
<span class="simsun">></span>
乐码FAQ
</a>
</dd>
</dl>
<dl>
<dt>订单服务</dt>
<dd>
<a webtrekkparam="{ct:'xbsy_fwpt_ddfw_wszf'}" href="#">
<span class="simsun">></span>
网上支付
</a>
</dd>
<dd>
<a webtrekkparam="{ct:'xbsy_fwpt_ddfw_tksm'}" href="#" >
<span class="simsun">></span>
退款说明
</a>
</dd>
<dd>
<a webtrekkparam="{ct:'xbsy_fwpt_ddfw_fpzd'}" href="#" >
<span class="simsun">></span>
发票制度
</a>
</dd>

</dl>
<dl>
<dt>物流服务</dt>
<dd>
<a webtrekkparam="{ct:'xbsy_fwpt_psyaz_psaz'}" href="#" >
<span class="simsun">></span>
配送范围查询
</a>
</dd>
<dd>
<a webtrekkparam="{ct:'xbsy_fwpt_psyaz_pscx'}" href="#">
<span class="simsun">></span>
配送费收取标准
</a>
</dd>
<dd>
<a webtrekkparam="{ct:'xbsy_fwpt_psyaz_yhqs'}" href="#" >
<span class="simsun">></span>
自提与签收注意事项
</a>
</dd>
<dd>
<a webtrekkparam="{ct:'xbsy_fwpt_psyaz_cjwt'}" href="#">
<span class="simsun">></span>
配送常见问题
</a>
</dd>
<!--<dd>
<a webtrekkparam="{ct:'xbsy_fwpt_psyaz_yyaz'}" href="#">
<span class="simsun">></span>
预约安装
</a>
</dd>
-->
</dl>
<dl>
<dt>售后服务</dt>
<!--<dd>
<a webtrekkparam="{ct:'xbsy_fwpt_fwyzc_gwts'}" href="#" >
<span class="simsun">></span>
购物提示
</a>
</dd>
-->
<dd>
<a href="#" webtrekkparam="{ct:'Help_fwzc_tab1'}">
<span class="simsun">></span>
关于安装
</a>
</dd>
<!--<dd>
<a href="#" webtrekkparam="{ct:'Help_fwzc_tab2'}">
<span class="simsun">></span>
国家三包政策
</a>
</dd>
-->
<dd>
<a href="#" webtrekkparam="{ct:'Help_fwzc_tab3'}">
<span class="simsun">></span>
售后服务政策
</a>
</dd>
<!--<dd>
<a href="#" webtrekkparam="{ct:'Help_fwzc_tab4'}">
<span class="simsun">></span>
配件、盒子三包政策
</a>
</dd>
-->
<!--<dd>
<a href="#" webtrekkparam="{ct:'Help_fwzc_tab5'}">
<span class="simsun">></span>
超级电视售后说明
</a>
</dd>
-->
<!--<dd>
<a href="#" webtrekkparam="{ct:'Help_fwzc_tab6'}">
<span class="simsun">></span>
配件、盒子售后说明
</a>
</dd>
-->
<dd>
<a href="#" webtrekkparam="{ct:'Help_fwzc_tab7'}">
<span class="simsun">></span>
线下服务中心
</a>
</dd>
<dd>
<a href="#" webtrekkparam="{ct:'Help_fwzc_tab8'}">
<span class="simsun">></span>
售后服务公示
</a>
</dd>
<dd>
<a href="#" webtrekkparam="{ct:'Help_fwzc_tab9'}">
<span class="simsun">></span>
线下体验厅
</a>
</dd>
<dd>
<a href="#" webtrekkparam="{ct:'Help_fwzc_tab10'}">
<span class="simsun">></span>
TV版服务续费教程
</a>
</dd>
<dd>
<a webtrekkparam="{ct:'xbsy_fwpt_fwyzc_hyj'}" href="#" >
<span class="simsun">></span>
电视合约机
</a>
</dd>
</dl>
<dl>
<dt>走进乐视TV</dt>
<dd>
<a webtrekkparam="{ct:'xbsy_fwpt_zjlsTV_gsjs'}"  href="#">
<span class="simsun">></span>
公司介绍
</a>
</dd>
<dd>
<a webtrekkparam="{ct:'xbsy_fwpt_zjlsTV_ppsp'}"  href="#" >
<span class="simsun">></span>
品牌视频
</a>
</dd>
<dd>
<a webtrekkparam="{ct:'xbsy_fwpt_zjlsTV_share'}"  href="#" >
<span class="simsun">></span>
分享邀请
</a>
</dd>
<dd>
<a webtrekkparam="{ct:'xbsy_fwpt_zjlsTV_shhyx'}"  href="#">
<span class="simsun">></span>
社会化营销
</a>
</dd>
<dd>
<a webtrekkparam="{ct:'xbsy_fwpt_zjlsTV_lxwm'}"  href="#">
<span class="simsun">></span>
联系我们
</a>
</dd>
<dd>
<a webtrekkparam="{ct:'xbsy_fwpt_zjlsTV_gzwm'}"  href="javascript:void(0)" onclick="javascript:pop('#guanzhuPOP')">
<span class="simsun">></span>
关注我们
</a>
</dd>
</dl>
</div>
<div class="service_online pt50 right">
<dl>
<dt>在线服务</dt>
<dd class="phone400">
<span class="font16 dark">1010-9000</span>
<br />
7*24小时客服电话
<br />
（仅收市话费）
</dd>
<dd class="kf_online">
<a webtrekkparam="{ct:'xbsy_fwpt_ZXFW'}" href="#">
<span class="font16 dark">在线客服</span>
<br />
<span class="gray">服务时段 8:00-20:00</span>
</a>
</dd>
<dd class="UE_center">
<a webtrekkparam="{ct:'xbsy_fwpt_YHTYZX'}" href="#">
<span class="font16 dark">用户体验中心</span>
<br />
<span class="gray">从用户的角度完善购物体验</span>
</a>
</dd>
<dd class="returns_oline">
<a webtrekkparam="{ct:'xbsy_fwpt_ZXTHH'}" href="#">
<span class="font16 dark">在线退换货</span>
</a>
</dd>
</dl>
</div>
<div class="clear"></div>
</div>
</div>
<div class="copyright">
<div class="center">
Copyright © <?php echo C('HTTP_COPY');?>
</div>
</div>
</div>

<!--关注我们 弹框-->
<div id="guanzhuPOP" class="hidden" style="width:640px">
<div class="f8_bg title pl10 line_b relative">
<span class="font14 dark">关注我们</span>
<a href="javascript:void(0)" class="absolute" id="wjPop-close">×</a>
</div>
<div class="pl30 pr30 pt20 white_bg careus border">
<div class="pl90 pb30 pt15 line_b sina">
<span class="font16 dark mr15">LAMP 95 官方微博</span>
<a href="#" class="inline_block">
<img src="/object/Public/images/Picture/7200f79c65bb409d817e6eecf3b3a3d7.gif" alt="" />
</a>
</div>
<div class="pl90 pb30 pt15 weixin">
<div class="clearfix">
<div class="left pr40 line_r">
<span class="font16 dark">LAMP 95 官方微信</span>
<br />
<img src="/object/Public/Picture/ewm_258.jpg" width="180px;" alt="" />
</div>
<div class="left pl40">
<span class="font16 dark">LAMP 95 官方微信</span>
<br />
<img src="/object/Public/Picture/ewm_258.jpg" width="180px;" alt="" />
</div>
</div>
<div class="mt15 gray font12">打开微信，点击右上角的“魔法棒”，选择“扫一扫”功能，对准下方二维码即可。</div>
</div>
</div>
</div>


<script type="text/javascript">
//右侧飘窗显示隐藏方法
$.fn.extend({showOrHide:function(){var _this=this;this.each(function(index,elem){var $handle=$(elem);var name=$handle.attr("object");var $content=$(name);var timer=null;$handle.mouseover(function(){show();}).mouseout(function(){hide();});$content.mouseover(function(){show();}).mouseout(function(){hide2();});function show(){clearTimeout(timer);$content.show();}
function hide(){var interval=300;timer=setTimeout(function(){ $content.hide();},interval);}
function hide2(){ $content.hide();}});}});

var is_hidden="1";//返回顶部
var is_share_show="0";//是否分享

$(function(){
    //右侧飘窗显示隐藏
    $(".handle").showOrHide();
    //返回顶部
    if(is_hidden=="1"){
        initBackTop();
    }
    
  $(".ie6-hover").mouseover(function () {
    $(this).addClass("hover");
  });
  
  $(".ie6-hover").mouseout(function () {
    $(this).removeClass("hover");
  });
});

//初始化返回顶部按钮事件
function initBackTop(){
    window.onscroll=function(){
        if(document.body.scrollTop==0?document.documentElement.scrollTop:document.body.scrollTop > 50){
            $("#backTop").show();
        }else{
            $("#backTop").hide();
        }
    }

    $("#backTop").unbind("click").bind("click",function(){
        pageScroll();
    });
}
//鼠标滚动事件  
function pageScroll(){
    window.scrollBy(0,-50);
    scrolldelay = setTimeout('pageScroll()',1);
    var sTop=document.documentElement.scrollTop+document.body.scrollTop;
    if(sTop==0){
        clearTimeout(scrolldelay);
    }
}
</script>

</body>

<!-- 底部系统引用 勿动 -->
<script type='text/javascript' src='/object/Public/js/Scripts/jquery.lazyload.js'></script>
<script type='text/javascript' src='/object/Public/js/Scripts/zxvideo.js'></script>
<script type='text/javascript' src='/object/Public/js/Scripts/sxf_scroll_pic.js'></script>
<script type='text/javascript' src='/object/Public/js/Scripts/jquery.easing.1.3.js'></script>
<script type='text/javascript' src='/object/Public/js/Scripts/index.js'></script>

</html>
<!-- 系统引用 勿动 -->