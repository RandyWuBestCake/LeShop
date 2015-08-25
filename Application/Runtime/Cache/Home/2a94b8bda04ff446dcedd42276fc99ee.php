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

<script>var _hrefPath = '',_imagePath = '',_basePath = '',_indexPath="<?php echo U('Index:sildJson');?>",_cartPath="<?php echo U('Cart/index');?>";</script>
				<!--[if lt IE 7]>
				        <script type="text/javascript" src="/object/Public/js/Scripts/unitpngfix.js"></script>
				<![endif]-->
  		  		<link  type='text/css' href='/object/Public/css/Content/global.css' rel='stylesheet' />

  		  		<script type='text/javascript' src='/object/Public/js/Scripts/generatesession.js'></script>

  		  		<script type='text/javascript' src='/object/Public/js/Scripts/zxlib.js'></script>

  		  		<script type='text/javascript' src='/object/Public/js/Scripts/template.js'></script>

  		  		<link  type='text/css' href='/object/Public/css/Content/index.css' rel='stylesheet' />

  		  		<script type='text/javascript' src='/object/Public/js/Scripts/newag.js'></script>


				<link rel="icon" href="/object/Public/images/favicon.ico" type="image/x-icon"/> 
				<link rel="shortcut icon"  href="/object/Public/images/favicon.ico" type="image/x-icon"/>     
                          <!-- <link rel="canonical" href="http://shop.letv.com/"/> -->
  	<style type="text/css">
      .overHidden{overflow:hidden;*position:relative;}
  	</style>

</head>

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



<!-- 弹出广告-->
        <div class="top_fadeIn_big hidden">
            <div class="center">
                <a class="block close right" href="javascript:void(0)"></a>
                <a href="http://shop.letv.com/huodong/150113.html"  target="_blank" webtrekkparam="{ct:'xbsy_LM'}">
                    <img  alt="" src="/object/Public/Uploads/<?php echo ($adv['img']); ?>"/>
                </a>
            </div>
        </div>

<!-- 拉幕广告-->
        <div class="top_fadeIn_small hidden" style="background-image:url(/object/Public/images/Images/51eab68f856544e4b8b8901d2ad10149.gif);">
            <div class="center">
                <a class="block close right" href="javascript:void(0)"></a>
                <a href="http://shop.letv.com/huodong/1111.html"  target="_blank" class="block center" style="height:80px;" webtrekkparam="{ct:'xbsy_DT'}">
                    <!--<img  alt="" src="/object/Public/images/Picture/c71db71aad4948d78c089abd0d648182.gif"/>-->
                </a>
            </div>
        </div>

<script type="text/javascript">
    var timeOutList = {};
    $(document).ready(function () {
        $.each($(".show_hide_block"), function () {
            showHideBlock(this, $(this).attr("object"), $(this).attr("type"), $(this).attr("buffer"), $(this).attr("speed"), $(this).attr("effect"))
        });
        $.each($(".show_children"), function () {
            showChildren(this, $(this).attr("buffer"), $(this).attr("speed"))
        });
        $.each($('[status="toggle"]'), function () {
            $($(this).attr("object")).hide()
        })
    });
    function showHideBlock(a, b, g, d, f, c, h, i) {
        var e = null;
        "undefined" == typeof c && (c = "");
        e = "slide" == g ? ["slideDown", "slideUp"] : "fade" == g ? ["fadeIn", "fadeOut"] : ["show", "hide"];
        i = i || 0;
        $(a).unbind("mouseenter").mouseenter(function () {
            clearTimeout(timeOutList[b]);
            timeOutList[a] = setTimeout(function(){
                $(a).addClass(c);
                $(a).siblings().removeClass(c);
                $(b)[e[0]](f, function () {
                    $(this).css("overflow", "visible")
                });
            }, i);
        });
        $(b).unbind("mouseenter").mouseenter(function () {
            $(a).addClass(c);
            clearTimeout(timeOutList[b]);
        });
        $(b).unbind("mouseleave").mouseleave(function () {
            timeOutList[b] = setTimeout(function () {
                $(b)[e[1]](f, function () {
                    $(a).removeClass(c);
                    !!h ? h() : null;
                });
            }, d || 1E3);
        });
        $(a).unbind("mouseleave").mouseleave(function () {
            clearTimeout(timeOutList[a], i);
            timeOutList[b] = setTimeout(function () {
                $(b)[e[1]](f, function () {
                    $(a).removeClass(c);
                    !!h ? h() : null;
                });
            }, d || 1E3);
        })
    }
    function showChildren(a, b) {
        $(a).mouseenter(function () {
            clearTimeout(timeOutList[$(this).text()]);
            $("ul", $(this)).show();
            $(this).siblings().find("ul").hide()
        });
        $(a).unbind("mouseleave").mouseleave(function () {
            var a = $(this).text(), d = this;
            clearTimeout(timeOutList[a]);
            timeOutList[a] = setTimeout(function () {
                $("ul", d).hide()
            }, b || 1E3)
        })
    }
    $(function () {
        try {
            $("img.lz").lazyload({data_attribute: "url", skip_invisible: !1, threshold: 10});
        } catch (e) {
        }
        ;
        refreshHeader()
    });
    function refreshHeader() {
        if (Js.login.getAuth()) {
            var a = getCookie("COOKIE_NICKNAME"), a = 10 < a.length ? a.substring(0, 10) + "..." : a;
            $("#loginMess").html('<span class="gray">Hi,</span><a rel="nofollow" href="' + _hrefPath + '/user/center/orderList.html" target="_blank" title="' + getCookie("COOKIE_NICKNAME") + '"><span class="pl5 pr5">' + a + '</span></a> <a rel="nofollow" id="logout"><span class="pl5 pr15">[退出]</span></a>');
            $("#logout").click(function () {
                Js.login.logout(function () {
                    window.location.href = "/"
                })
            })
        } else $("#login").click(function () {
            Js.login.hasLogin(function () {
                location.reload()
            })
        })
    }
    ;
</script> 
<script type="text/javascript">
    function SlideTabs(opt){
        this.opt = $.extend({}, this.oriOpt, opt); //合并默认参数与传递参数
        this.container = $("#" +this.opt.id); //最外层容器
        this.curTabIndex = 1; //当前标签
        this.isAnimating = false; //是否有动画方法正在进行中
        this.tabList = this.container.find("ul.product_tabs li"); //标签列表
        this.tabDetails = this.container.find(".tab_detail"); //标签详情列表
        this.init();
    }

    SlideTabs.prototype = {
        oriOpt : {

        },
        /**
         * 初始化方法
         */
        init : function(){
            var tabfocus = this.slideTab();
            //初始化所有标签和详情的下标
            for(var i = 0; i < this.tabList.length; i ++){
                var tab = $(this.tabList[i]), detail = $(this.tabDetails[i]);

                tab.attr("tab_index", i);
                detail.attr("detail_index", i);
            }
            //标签附上鼠标移入时间
            this.tabList.mouseenter(tabfocus);
        },
        /**
         * 根据鼠标指向移动
         */
        slideTab : function(){
            var _this = this;
            return function(){
                var prevTabWidth = 0, prevTabs;

                $(this).siblings().removeClass("hover");
                $(this).addClass("hover");

                //改变当前标签下标
                _this.curTabIndex = $(this).attr("tab_index");
                prevTabs = _this.container.find(".tab_detail[detail_index=" + _this.curTabIndex + "]").prevAll();

                for(var i = 0; i < prevTabs.length; i ++){
                    prevTabWidth += $(prevTabs[i]).outerWidth();
                }

                if(_this.container.find(".tab_detail_box").css('display') == 'none'){
                    _this.container.find(".tab_detail_box").fadeIn();
                    _this.container.find(".tab_detail_box ul").css('margin-left', - prevTabWidth + "px");
                    return;
                }

                _this.container.find(".tab_detail_box ul").clearQueue().animate({'margin-left' : - prevTabWidth + "px"}, 600);
            }
        },
        hideDetail : function(){
            this.container.find(".tab_detail_box").hide();
            this.container.find("ul.product_tabs li").removeClass("hover");
        }
    }

    $(document).ready(function(){
        var allProduct = new SlideTabs({id : "allProduct"});
        showHideBlock("#allProductTab", "#allProduct", "fade", 100, "fast", "hover", function(){
            allProduct.hideDetail();
        }, 200);

        var allTV = new SlideTabs({id : "allTV"});
        showHideBlock("#allTVTab", "#allTV", "fade", 100, "fast", "hover", function(){
            allTV.hideDetail();
        }, 200);
		
      	var allLeMe = new SlideTabs({id : "allLeMe"});
        showHideBlock("#allLeMeTab", "#allLeMe", "fade", 100, "fast", "hover", function(){
            allLeMe.hideDetail();
        }, 200);
        // showProductNumInCart();
    });

    function showProductNumInCart(){
        $("#productNumInCart").hide();
        var arrivalId = getCookie("COOKIE_SELECT_PROVINCE_ID") || 1;

        Js.sendData(sendLink.cart + "api/web/query/viewCart.jsonp","cartType=0&TO_PAY=0&arrivalId="+arrivalId,function(data){
            if (data.status == "1") {
                if(data.result && data.result[0] && data.result[0].itemCount){
                    $("#productNumInCart").html(data.result[0].itemCount).show();
                }
            }
        });
    }
</script> 
<div class="main">
<!-- 轮播 -->
<div class="index_slide">
    <div id="aId98"></div>
    <script>
      new ASlide(98,18,6000,0,526,'index_lunbo').init();
    </script>
</div>
<!-- 方块广告 -->
  <div class="index_pic_group">
    <ul class="center t_c">
        	<li target ="" class="ad-Loading">
                    <a oritop="3px" distance="3" speed="300"  href="http://shop.letv.com/huodong/150113.html" webtrekkparam="{ct:'xbsy_sydfk1'}" target="_blank">
                    	<img src="/object/Public/images/Picture/3881920fb3274e4c8762d581e07d1b5e.gif"  alt="1月13日周二现货日" />
                    </a>
		      </li>
    			<li target ="" class="ad-Loading">
                        <a oritop="3px" distance="3" speed="300"  href="http://bbs.letv.com/thread-458916-1.html" webtrekkparam="{ct:'xbsy_sydfk2'}" target="_blank">
                    		<img src="/object/Public/images/Picture/1fd443ce25de49998b5fd4c7b5338f5b.gif"  alt="销量天王" />
                        </a>
    			</li>
    			<li target ="" class="ad-Loading">
                        <a oritop="3px" distance="3" speed="300"  href="http://shop.letv.com/zt/singer3.html" webtrekkparam="{ct:'xbsy_sydfk3'}" target="_blank">
                        	<img src="/object/Public/images/Picture/2b8b457c52e54473ace7efd08745aa68.gif"  alt="我是歌手" />
                        </a>
    			</li>
    			<li target ="" class="ad-Loading">
                        <a oritop="3px" distance="3" speed="300"  href="http://shop.letv.com/product/lemexl.html" webtrekkparam="{ct:'xbsy_sydfk4'}" target="_blank">
                        	<img src="/object/Public/images/Picture/8bb00499bbe24a37a20a0db992cd65ae.gif"  alt="99元蓝牙耳机" />
                        </a>
    			</li>
		</ul>
  </div>
<div class="index_supertv ef_bg">
    <div class="center overHidden">
        <div class="title t_c pt40 dark"><h1><a href="product/index.html" webtrekkparam="{ct:'xbsy_lsTVBT'}" target="_blank"><span class="">乐视TV · 超级电视</span></a></h1><!--<a href="/tv/all.html" target="_blank"><span class="font14">全部电视 ></span></a>-->
        </div>
        <div class="slogan t_c pt10 pb20 font14">我不是一台电视，而是一套完整的大屏互联网生态系统 </div>
            <ul class="index_tv_list left">
                    <li class="t1" oritop="5px" orileft="3px" distance="3" speed="300" delay="0" direct="x" range="-150" float-speed="700">
                        <a target="_blank" href="<?php echo U('Goods/headline');?>" webtrekkparam="{ct:'xbsy_ppjs1'}"><img  alt="S40 Air L" class="lz" src="/object/Public/images/Picture/55379565210995949.jpg" /></a>
                    </li>
                    <li class="t2" oritop="305px" orileft="3px" distance="3" speed="300" delay="100" direct="x" range="-200" float-speed="700">
                        <a target="_blank" href="<?php echo U('Fit/detail',array('id'=>32));?>" webtrekkparam="{ct:'xbsy_ppjs2'}"><img  alt="甜甜圈蓝牙音箱"  src="/object/Public/images/Picture/56338360806236404.jpg" class="lz" /></a>
                    </li>
                    <li class="t3" oritop="305px" orileft="303px" distance="3" speed="300" delay="0" direct="x" range="-150" float-speed="700">
                        <a target="_blank" href="<?php echo U('Fit/detail',array('id'=>19));?>" webtrekkparam="{ct:'xbsy_ppjs3'}"><img  alt="无线游戏手柄"  src="/object/Public/images/Picture/52131669264127983.jpg" class="lz" /></a>
                    </li>
                    <li class="t4" oritop="605px" orileft="3px" distance="3" speed="300" delay="0" direct="x" range="-200" float-speed="700">
                        <a target="_blank" href="<?php echo U('Goods/headline');?>" webtrekkparam="{ct:'xbsy_ppjs4'}"><img  alt="S50 Air C罗足球版"  src="/object/Public/images/Picture/54617888240537939.jpg" class="lz" /></a>
                    </li>
                    <li class="t5" oritop="305px" orileft="603px" distance="3" speed="300" delay="200" direct="y" range="150" float-speed="700">
                        <a target="_blank" href="<?php echo U('Fit/detail',array('id'=>33));?>" webtrekkparam="{ct:'xbsy_ppjs5'}"><img  alt="移动推车"  src="/object/Public/images/Picture/53985212808322113.jpg" class="lz" /></a>
                    </li>
            </ul>

        <div class="index_tv_right relative right">
            <div class="video absolute" orileft="0px" delay="300" direct="x" range="150" float-speed="600">
                    <a onClick="playVideo(2175907)" href="javascript:void(0)" webtrekkparam="{ct:'xbsy_ppjs_sp'}">
                        <img src="/object/Public/images/Picture/1b9c324ae8344c8cadf57a11e5c5988a.gif" /><span class="play_bt"></span>
                        <div class="black_layer">
                            <div class="video_name">观看影片“超级电视交互篇”</div>
                        </div>
                    </a>
            </div>
            <!-- 看一看 -->
            <div class="shijie absolute" orileft="0px" delay="300" direct="x" range="150" float-speed="600">
                <div class="title"><a href="<?php echo U('Look/index');?>" webtrekkparam="{ct:'xbsy_ppjs_k1k'}" target="_blank" >看一看</a></div>
                <ul class="pic">
                <?php if(is_array($arts)): foreach($arts as $key=>$vo): ?><li>
                      <a href="<?php echo U('Look/xiangqing',array('id'=>$vo['id']));?>"target="_blank" webtrekkparam="{ct:'xbsy_ppjs_k1k_<?php echo ($vo['id']); ?>'}">
                        <img  src="/object/<?php echo ($vo['img']); ?>" alt="<?php echo ($vo['title']); ?>" width="60" height="80"/>
                      </a>
                    </li><?php endforeach; endif; ?>
                </ul>
                <div class="text pt5">超过10万集电视剧，5000多部电影，<br />
                    业界最全面的4K、1080p、3D影视资源。</div>
            </div>
            <!-- 问一问 -->
            <div class="baike absolute" orileft="0px" delay="300" direct="x" range="150" float-speed="600">
                <div class="title"><a href="<?php echo U('Article/index');?>" webtrekkparam="{ct:'xbsy_ppjs_w1w'}" target="_blank" >问一问</a></div>
                <ul>
                <?php if(is_array($arts1)): foreach($arts1 as $key=>$vo): ?><li>
                      <a href="<?php echo U('Article/xiangqing',array('id'=>$vo['id']));?>" target="_blank" webtrekkparam="{ct:'xbsy_ppjs_w1w_8'}"><?php echo ($vo['title']); ?>
                      </a>
                    </li><?php endforeach; endif; ?>
                </ul>
            </div>
            <!-- 比一比 -->
            <div class="biyibi absolute" orileft="0px" delay="300" direct="x" range="150" float-speed="600">
                <div class="title">
                  <a href="<?php echo U('Product/index');?>" webtrekkparam="{ct:'xbsy_ppjs_b1b'}" target="_blank">比一比</a>
                </div>
                <ul class="pt20">
                    <li>
                      <a href="<?php echo U('Product/lists');?>" target="_blank" webtrekkparam="{ct:'xbsy_ppjs_b1b_1'}">
                        <div class="icon i1"></div>
                        <div class="text pt10">性价比最高</div>
                      </a>
                    </li>
                    <li>
                      <a href="<?php echo U('Product/lists');?>" target="_blank" webtrekkparam="{ct:'xbsy_ppjs_b1b_2'}">
                        <div class="icon i2"></div>
                        <div class="text pt10">同尺寸销量最好</div>
                      </a>
                    </li>
                    <li>
                      <a href="<?php echo U('Product/lists');?>" target="_blank" webtrekkparam="{ct:'xbsy_ppjs_b1b_3'}">
                        <div class="icon i3"></div>
                        <div class="text pt10">视频资源最丰富</div>
                      </a>
                    </li>
                  </ul>
            </div>
        </div>
        <div class="clear pt45"></div>
    </div>
</div>
<div class="index_tvcontent t_c pb45">
    <div class="title pt40 pb25"><h2><a href="/LetvTV.html" webtrekkparam="{ct:'xbsy_lswTVbBT'}"><span class="">乐视网TV版</span></a></h2></div>
    <ul class="pic_list center">
      <?php if(is_array($tv)): foreach($tv as $k=>$vo): ?><li style="width:295px;">
                <a target="_blank" href="<?php echo U('Look/xiangqing',array('id'=>$vo['id']));?>" webtrekkparam="{ct:'xbsy_lswTVb<?php echo ($k+1); ?>'}">
                  <img  alt="<?php echo ($vo['title']); ?>"  src="/object/<?php echo ($vo['img']); ?>" width="150" height="200"/>
                </a>
                <div class="absolute title t_c "><?php echo ($vo['title']); ?></div>
            </li><?php endforeach; endif; ?>
            <!-- <li>
                <a target="_blank" href="http://shop.letv.com/kankan/2014121538_1.html" webtrekkparam="{ct:'xbsy_lswTVb1'}">
                  <img  alt="武媚娘传奇"  src="/object/Public/images/Picture/1d6e5b79b76d4ff2a998da1a0af946a9.gif" />
                </a>
                <div class="absolute title t_c ">武媚娘传奇</div>
            </li>
            <li>
                <a target="_blank" href="http://shop.letv.com/kankan/2014121514_1.html" webtrekkparam="{ct:'xbsy_lswTVb2'}">
                  <img  alt="沉睡魔咒"  src="/object/Public/images/Picture/cb0ac846aaac40388b7e3d0ebc75f41a.gif" />
                </a>
                <div class="absolute title t_c ">沉睡魔咒</div>
            </li>
            <li>
                <a target="_blank" href="http://shop.letv.com/kankan/2014121541_1.html" webtrekkparam="{ct:'xbsy_lswTVb3'}">
                  <img  alt="露水红颜"  src="/object/Public/images/Picture/687c80356bcb4b5ca8ec087c59298181.gif" />
                </a>
                <div class="absolute title t_c ">露水红颜</div>
            </li>
            <li>
                <a target="_blank" href="http://shop.letv.com/kankan/2014121547_1.html" webtrekkparam="{ct:'xbsy_lswTVb4'}">
                  <img  alt="老农民"  src="/object/Public/images/Picture/78ecf7397ac74a63b766a5c6ff9a086e.gif" />
                </a>
                <div class="absolute title t_c ">老农民</div>
            </li>
            <li>
                <a target="_blank" href="http://shop.letv.com/kankan/2014121571_1.html" webtrekkparam="{ct:'xbsy_lswTVb5'}">
                  <img  alt="二炮手"  src="/object/Public/images/Picture/6e62b76d9cf04eb383708737b8ec9902.gif" />
                </a>
                <div class="absolute title t_c ">二炮手</div>
            </li>
            <li>
                <a target="_blank" href="http://shop.letv.com/kankan/2014121517_1.html" webtrekkparam="{ct:'xbsy_lswTVb6'}">
                  <img  alt="敢死队3"  src="/object/Public/images/Picture/c86d2e7813bf41e08f40cabbb030704e.gif" />
                </a>
                <div class="absolute title t_c ">敢死队3</div>
            </li>
            <li>
                <a target="_blank" href="http://shop.letv.com/kankan/2014121526_1.html" webtrekkparam="{ct:'xbsy_lswTVb7'}">
                  <img  alt="狂暴飞车"  src="/object/Public/images/Picture/77ca620fc1444bada42d23b7df187b8c.gif" />
                </a>
                <div class="absolute title t_c ">狂暴飞车</div>
            </li>
            <li>
                <a target="_blank" href="http://shop.letv.com/kankan/2014121523_1.html" webtrekkparam="{ct:'xbsy_lswTVb8'}">
                  <img  alt="龙之谷：破晓奇兵"  src="/object/Public/images/Picture/3ddeceb12d2b43829993bcb78c56ba1b.gif" />
                </a>
                <div class="absolute title t_c ">龙之谷：破晓奇兵</div>
            </li> -->
    </ul>
    <div class="text t_c pt20 font14">乐视网TV版能够让你获得乐视生态圈提供的海量内容与服务。不仅可以享受超过10万集电视剧，5000多部电影，<br />
        以及动漫、娱乐、综艺、纪录片等多领域内容，还可观看业界最全面的4K、1080p、3D影视资源，尊贵特权为你独享。</div>
    <div class="t_c pt20 "><img  alt=""  class="lz" data-url="http://img1.hdletv.com/file/20140904/default/46239606625912352" style=""/></div>
    <div class="list  pt40  center">

       
    </div>
</div>
<div class="index_parts ef_bg">
    <div class="center pb45 t_c overHidden">
        <div class="title pt40 pb25"><span class="pl100 pr20"><h2><a href="<?php echo U('Fit/FitList');?>" webtrekkparam="{ct:'xbsy_pjzqBT'}" target="_blank"><span class="">乐视TV · 配件专区</span></a></h2></span><a href="<?php echo U('Fit/FitList');?>" webtrekkparam="{ct:'xbsy_pjzqBTqbpj'}" target="_blank"><span class="font14">全部配件></span></a></div>
            <ul class="part_list relative">
                    <li class="p01" oritop="5px" orileft="3px" distance="3" speed="300" delay="0" direct="x" range="-150" float-speed="700">
                        <a target="_blank" href="<?php echo U('Fit/detail',array('id'=>34));?>" webtrekkparam="{ct:'xbsy_pjzq_1'}"><img  alt="乐视Letv 体感摄像头套件"  src="/object/Public/images/Picture/" style="" class="lz" /></a>
                    </li>
                    <li class="p02" oritop="5px" orileft="603px" distance="3" speed="300" delay="0" direct="x" range="150" float-speed="700">
                        <a target="_blank" href="<?php echo U('Fit/detail',array('id'=>35));?>" webtrekkparam="{ct:'xbsy_pjzq_2'}"><img  alt="超级歌王 mini"  src="/object/Public/images/Picture/fe6d55dbec394cde9340f0aa63f869af.gif" style="" class="lz" data-url="http://img3.hdletv.com/ag/20141111/default/52131819984364968"/></a>
                    </li>
                    <li class="p03" oritop="5px" orileft="903px" distance="3" speed="300" delay="100" direct="x" range="150" float-speed="700">
                        <a target="_blank" href="<?php echo U('Fit/detail',array('id'=>3));?>" webtrekkparam="{ct:'xbsy_pjzq_3'}"><img  alt="微软无线键鼠"  src="/object/Public/images/Picture/5c974eeeb7934365bb0228f372c68f51.gif"/></a>
                    </li>
                    <li class="p04" oritop="305px" orileft="3px" distance="3" speed="300" delay="100" direct="x" range="-150" float-speed="700">
                        <a target="_blank" href="<?php echo U('Fit/detail',array('id'=>18));?>" webtrekkparam="{ct:'xbsy_pjzq_4'}"><img  alt="外置移动硬盘"  src="/object/Public/images/Picture/a37a6b74f83d462ea4b84a954600b105.gif" style="" class="lz" data-url="http://img2.hdletv.com/ag/20141111/default/52131865846246646"/></a>
                    </li>
                    <li class="p05" oritop="305px" orileft="303px" distance="3" speed="300" delay="0" direct="x" range="-150" float-speed="700">
                        <a target="_blank" href="<?php echo U('Fit/detail',array('id'=>31));?>" webtrekkparam="{ct:'xbsy_pjzq_5'}"><img  alt="乐视Letv 超级歌王 Music King"  src="/object/Public/images/Picture/1f888584026748928dc04f53db3af8ee.gif" style="" class="lz" data-url="http://img0.hdletv.com/ag/20150109/default/57200609703374338"/></a>
                    </li>
                    <li class="p06" oritop="305px" orileft="603px" distance="3" speed="300" delay="0" direct="x" range="150" float-speed="700">
                        <a target="_blank" href="<?php echo U('Fit/detail',array('id'=>17));?>" webtrekkparam="{ct:'xbsy_pjzq_6'}"><img  alt="乐视Letv 3D眼镜"  src="/object/Public/images/Picture/a37a6b74f83d462ea4b84a954600b105.gif" style="" class="lz" data-url="http://img2.hdletv.com/ag/20141111/default/52131910199453101"/></a>
                    </li>
                    <li class="p07" oritop="305px" orileft="903px" distance="3" speed="300" delay="100" direct="x" range="150" float-speed="700">
                        <a target="_blank" href="<?php echo U('Fit/detail',array('id'=>36));?>" webtrekkparam="{ct:'xbsy_pjzq_7'}"><img  alt="乐视Letv 超级歌王小盒子"  src="/object/Public/images/Picture/1759dc2c5f864c94bd7bbfb422a89d0f.gif"/></a>
                    </li>
            </ul>
    </div>
</div>
<div class="index_video pb45">
    <div class="center t_c">
        <div class="title  pt40 pb25"><h2><a href="/zt/ppTv.html" webtrekkparam="{ct:'xbsy_ppspzqBT'}" target="_blank"><span class="pl100 pr20">乐视TV · 品牌视频专区</span></a></h2><a href="/zt/ppTv.html" webtrekkparam="{ct:'xbsy_ppspzqBTqbsp'}" target="_blank"><span class="font14">全部视频></span></a></div>
        <ul class="index_video_list">
            <li class="">
                    <a onClick="playVideo(20053438)" href="javascript:void(0)" webtrekkparam="{ct:'xbsy_ppspzq_1'}">
                        <img src="/object/Public/images/Picture/95269a34dca645b7aa4638fe2cba7e3f.gif" class="lz" data-url="http://img1.hdletv.com/ag/20141023/default/50461810712360848"/><span class="play_bt"></span>
                        <div class="black_layer">
                            <div class="video_name">观看影片“超级电视 X50Air 产品功能篇”</div>
                        </div>
                    </a>
            </li><li class="">
                <a onClick="playVideo(20134184)" href="javascript:void(0)" webtrekkparam="{ct:'xbsy_ppspzq_2'}">
                    <img src="/object/Public/images/Picture/fe6d55dbec394cde9340f0aa63f869af.gif" class="lz" data-url="http://img3.hdletv.com/ag/20141023/default/50461834567347459"/><span class="play_bt"></span>
                    <div class="black_layer">
                        <div class="video_name">观看影片“超级电视S40Air S50Air 产品功能篇”</div>
                    </div>
                </a>
        </li><li class="">
                <a onClick="playVideo(20212721)" href="javascript:void(0)" webtrekkparam="{ct:'xbsy_ppspzq_3'}">
                    <img src="/object/Public/images/Picture/95269a34dca645b7aa4638fe2cba7e3f.gif" class="lz" data-url="http://img1.hdletv.com/ag/20141023/default/50461896444695215"/><span class="play_bt"></span>
                    <div class="black_layer">
                        <div class="video_name">观看影片“CP2C 2.0重新定义制造概念篇”</div>
                    </div>
                </a>
        </li><li class="">
                <a onClick="playVideo(20166044)" href="javascript:void(0)" webtrekkparam="{ct:'xbsy_ppspzq_4'}">
                    <img src="/object/Public/images/Picture/dfc7a57f13034e7588802734496d2edb.gif"/><span class="play_bt"></span>
                    <div class="black_layer">
                        <div class="video_name">观看影片“乐迷社会化服务团队 向你问好”</div>
                    </div>
                </a>
        </li>
        </ul>
    </div>
</div>
<div class="f6_bg pt40 pb45">
    <div class="center">
        <div class="index_letvUI line_r left t_c">
            <div class="title"><h2><a href="http://ui.letv.com/index.html" webtrekkparam="{ct:'xbsy_ppspzq_LetvUIBT'}" target="_blank">Letv UI</a></h2></div>
            <div class="slogan">最好用的智能电视系统</div>
            <div class="pic pt10"><a href="http://ui.letv.com/index.html" webtrekkparam="{ct:'xbsy_ppspzq_LetvUITP'}" target="_blank"><img  alt=""  src="/object/Public/images/Picture/2dc002935dde499c9a073cd797b28a9d.gif" style=""/></a></div>
            <ul class="video_list pt20">
                <li>
                    <a href="javascript:void(0)" webtrekkparam="{ct:'xbsy_ppspzq_LetvUIsp1'}" class="txs" onclick="playVideo(20072444)">
                        <div class="pic"><img  alt=""  src="/object/Public/images/Picture/7f88c68afb3146aa94201a9154b71813.gif" style=""/></div>
                        <div class="text font14 ">全新的UI3.0</div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)" webtrekkparam="{ct:'xbsy_ppspzq_LetvUIsp2'}" class="txs" onclick="playVideo(2239109)">
                        <div class="pic"><img  alt=""  src="/object/Public/images/Picture/4189de9ca3764381a2c9d865e3f4091d.gif" style=""/></div>

                        <div class="text font14 ">Letv UI3.0 介绍</div>
                    </a>
                </li>
            </ul>
            <ul class="icon_list">
                <li><div>
                    <div class="pic"><img  alt=""  src="/object/Public/images/Picture/9ec2c8e0137849d78ae5cce70670583e.gif" style=""/></div>
                    <div class="text pt15 "><span class="dark">全视频设计的多桌面</span></div>
                </div>
                </li>
                <li><div>
                    <div class="pic"><img  alt=""  src="/object/Public/images/Picture/47c78907e1d04111966a96cea32cb175.gif" style=""/></div>
                    <div class="text pt15 "><span class="dark">观看视频更随心</span></div></div>
                </li>
                <li><div>
                    <div class="pic"><img  alt=""  src="/object/Public/images/Picture/05b56b0f9e16439a81c4378e2370e2fb.gif" style=""/></div>
                    <div class="text pt15 "><span class="dark">全体感操作</span></div></div>
                </li>
                <li><div>
                    <div class="pic"><img  alt=""  src="/object/Public/images/Picture/50278462a7b14498a7f59a5f7d10d24d.gif" style=""/></div>
                    <div class="text pt15 "><span class="dark">语音控制更智能</span></div></div>
                </li>

            </ul>
        </div>
        <div class="index_letvStore right t_c">
            <div class="title"><h2><a target="_blank" webtrekkparam="{ct:'xbsy_ppspzq_LetvStoreBT'}" href="http://www.letvstore.com/">Letv Store</a></h2></div>
            <div class="slogan">中国第一智能电视应用市场</div>
            <div class="pic pt10"><a target="_blank" webtrekkparam="{ct:'xbsy_ppspzq_LetvStoreTP'}" href="http://www.letvstore.com/"><img  alt=""  src="/object/Public/images/Picture/b66304097b3140028884f627c2c1707d.gif" style=""/></a></div>
            <div class="content pt20 pb30">乐视应用商店（LetvStore)为智能电视、<br />智能机顶盒用户提供最多、最好玩的应用及游戏下载服务。</div>
            <ul class="icon_list">


                <li>
                    <a href="http://www.letvstore.com/appDetail.html?id=114775" webtrekkparam="{ct:'xbsy_ppspzq_LetvStore1'}" target="_blank">
                        <div class="pic"><img  alt="真实滑雪"  src="/object/Public/images/Picture/58d6f387804c484da7184cb550ebdb0d.gif" style=""/></div>
                        <div class="text">真实滑雪<br><br></div>
                    </a>
                </li>
                <li><a href="http://www.letvstore.com/appDetail.html?id=114781" webtrekkparam="{ct:'xbsy_ppspzq_LetvStore2'}" target="_blank">
                    <div class="pic"><img  alt="狂奔弗雷德"  src="/object/Public/images/Picture/df4eaa27699f4f819bd5ee31494ef5eb.gif" style=""/></div>
                    <div class="text">狂奔弗雷德<br><br></div></a>
                </li>
                <li><a href="http://www.letvstore.com/appDetail.html?id=114774" webtrekkparam="{ct:'xbsy_ppspzq_LetvStore3'}" target="_blank">
                    <div class="pic"><img  alt="纳美萌兽"  src="/object/Public/images/Picture/54335ce79d744c1eb171fb99287f17f1.gif" style=""/></div>
                    <div class="text">纳美萌兽<br><br></div></a>
                </li>
                <li><a href="http://www.letvstore.com/appDetail.html?id=114804" webtrekkparam="{ct:'xbsy_ppspzq_LetvStore4'}" target="_blank">
                    <div class="pic"><img  alt="刀塔传奇"  src="/object/Public/images/Picture/2e66e140cedf42c9b7e87d7513bc7293.gif" style=""/></div>
                    <div class="text">刀塔传奇<br><br></div></a>
                </li>
                <li><a href="http://www.letvstore.com/appDetail.html?id=111065" webtrekkparam="{ct:'xbsy_ppspzq_LetvStore5'}" target="_blank">
                    <div class="pic"><img  alt="有乐德州扑克"  src="/object/Public/images/Picture/79cff07e4e5e49f79717ae520bea9552.gif" style=""/></div>
                    <div class="text">有乐德州扑克<br><br></div></a>
                </li>
                <li><a href="http://www.letvstore.com/appDetail.html?id=114012" webtrekkparam="{ct:'xbsy_ppspzq_LetvStore6'}" target="_blank">
                    <div class="pic"><img  alt="西米斗地主"  src="/object/Public/images/Picture/acb08e8a94dd4541825eaffe7cad0837.gif" style=""/></div>
                    <div class="text">西米斗地主<br><br></div></a>
                </li>
                <li><a href="http://www.letvstore.com/appDetail.html?id=114344" webtrekkparam="{ct:'xbsy_ppspzq_LetvStore7'}" target="_blank">
                    <div class="pic"><img  alt="苏宁易购"  src="/object/Public/images/Picture/7db66a4b6f3448829ab3bb9244a12966.gif" style=""/></div>
                    <div class="text">苏宁易购<br><br></div></a>
                </li>
               <li><a href="http://www.letvstore.com/appDetail.html?id=114231" webtrekkparam="{ct:'xbsy_ppspzq_LetvStore8'}" target="_blank">
                                   <div class="pic"><img  alt="云盘"  src="/object/Public/images/Picture/c21180fef89543f7833324bbc6a5fe83.gif" style=""/></div>
                                   <div class="text">云盘<br><br></div></a>
                               </li>
            </ul>
        </div>

        <div class="clear"></div>
    </div>
</div>
<div class="index_service pt40 pb45">
    <div class="center clearfix">
        <div class="title pb25 t_c"><h2>乐视TV · 超级服务平台</h2></div>
        <ul>
            <li class="kefu t_c border"><a webtrekkparam="{ct:'xbsy_fwpt_Lecare'}" href="/onlineservice.html" target="_blank" ><span class="">Lecare</span></a></li>

            <li class="saidan">
                <dl class="border" style="overflow: hidden; position:relative">
                    <dt>评论晒单</dt>
                    <dd style="overflow: hidden; position:relative">
                            <ul id="sdList" style="position: relative;">
                                    <li>
                                        <div class="pic "><img  alt=""  src="/object/Public/images/Picture/0c9108ffd49f4a57b1f50241289b5ef9.gif" style=""/></div>
                                        <div class="text">
                                                <div class="pro_name"><a href="/comment/comm-pid-GWGT401008-commentId-40088.html" target="_blank" webtrekkparam="{ct:'xbsy_fwpt_sd0'}"><span class="font14">S40 Air L全配版</span></a></div>
                                                <div class="user_said font12">电视真的性价比挺高的。。值得购买就是要等太久了。。每次现货都抢不到。。都抢一个月了。。后面被逼无奈只能预定。。结果还是等了一个多月。。</div>
                                        </div>
                                        <div class="clear "></div>
                                    </li>
                                    <li>
                                        <div class="pic "><img  alt=""  src="/object/Public/images/Picture/55b3c1f694df41b7ab7970cca49c89bd.gif" style=""/></div>
                                        <div class="text">
                                                <div class="pro_name"><a href="/comment/comm-pid-YYST500066-commentId-39888.html" target="_blank" webtrekkparam="{ct:'xbsy_fwpt_sd1'}"><span class="font14">乐视TV•超级电视 Letv X50 Air张艺谋《归来》艺术版</span></a></div>
                                                <div class="user_said font12">第一次接触4k，也不知道是好是坏，但感觉电视还是很清晰的，比较满意，就是比较吃网速，为了流畅，还给家里提了速</div>
                                        </div>
                                        <div class="clear "></div>
                                    </li>
                                    <li>
                                        <div class="pic "><img  alt=""  src="/object/Public/images/Picture/864d4e55e7e94600a8ecf2a2222ce548.gif" style=""/></div>
                                        <div class="text">
                                                <div class="pro_name"><a href="/comment/comm-pid-GWGT602003-commentId-39765.html" target="_blank" webtrekkparam="{ct:'xbsy_fwpt_sd2'}"><span class="font14">Letv X60S 敢死队硬汉版</span></a></div>
                                                <div class="user_said font12">说实在的我自从抱着试一试的心态买了第一台乐视电视，当时到货后真的让我感到真靠谱，测试功能后让我惊呆了，之后我的买了两台，帮我朋友买的加起来差不多购买了近十台。后来提到售后服务，那态度真的太好了，比这个电器商城的售后真的好上十倍＋！这次又要帮朋友抢购两台，希望能抢到！</div>
                                        </div>
                                        <div class="clear "></div>
                                    </li>
                                    <li>
                                        <div class="pic "><img  alt=""  src="/object/Public/images/Picture/87a90cee6abf4ac6a691e01d2cf92384.gif" style=""/></div>
                                        <div class="text">
                                                <div class="pro_name"><a href="/comment/comm-pid-GWGT402007-commentId-39732.html" target="_blank" webtrekkparam="{ct:'xbsy_fwpt_sd3'}"><span class="font14">S40 Air L全配版</span></a></div>
                                                <div class="user_said font12">我是在我是歌手第二季看到乐视TV的，当时觉得这个电视好漂亮，后来就买了一台，我用了好几个月才来评价的，个人感觉性价比高，电视画质好，放在家里蛮好看的，唯一不足的地方就是想要看高清的电影非要买会员，一年480，蛮贵的。如果能去掉就完美了</div>
                                        </div>
                                        <div class="clear "></div>
                                    </li>
                                    <li>
                                        <div class="pic "><img  alt=""  src="/object/Public/images/Picture/0c9108ffd49f4a57b1f50241289b5ef9.gif" style=""/></div>
                                        <div class="text">
                                                <div class="pro_name"><a href="/comment/comm-pid-GWGT402007-commentId-39634.html" target="_blank" webtrekkparam="{ct:'xbsy_fwpt_sd4'}"><span class="font14">S40 Air L全配版</span></a></div>
                                                <div class="user_said font12">不错，高端大气上档次，在外面，40寸够用了。全好评。希望后续不要出质量问题，要对得起我的全好评啊</div>
                                        </div>
                                        <div class="clear "></div>
                                    </li>
                            </ul>
                    </dd>
                </dl>
            </li>
            <li class="bake t_c border" onclick="<?php echo U('Article/index');?>"><a href="<?php echo U('Article/index');?>" webtrekkparam="{ct:'xbsy_fwpt_w1w'}" target="_blank"><span class="">问一问</span><br><span class="font14">智能硬件百科</span></a></li>
<!-- 请输入模块内容 -->
<li class="note">
				<dl class="border">
                  <dt><a target="_blank" href="/xinwen/zixun.html" webtrekkparam="{ct:'xbsy_fwpt_scgg'}">商城公告</a><div class="more right hidden"><a href="/xinwen/zixun.html" target="_blank" webtrekkparam="{ct:'H_new_more}'}" >更多 > </a></div></dt> 

                  <?php if(is_array($announcements)): foreach($announcements as $key=>$vo): ?><dd>           
                            <a target="_blank" webtrekkparam="{ct:'xbsy_fwpt_scgg_1'}"
                      		href="<?php echo U('Article/xiangqing',array('id'=>$vo['id']));?>" title="<?php echo ($vo['title']); ?>">· <?php echo ($vo['title']); ?>
                      		</a>
               </dd><?php endforeach; endif; ?>            
              <!--  <dd>           
                            <a target="_blank" webtrekkparam="{ct:'xbsy_fwpt_scgg_2'}"
                      		href="/xinwen/zixunDetail-aid-128.html" title="#1223圣诞感恩专场#150台超级电视免费送 完全中奖名单">· #1223圣诞感恩专场#150台...
                      		</a>
               </dd>               
               <dd>           
                            <a target="_blank" webtrekkparam="{ct:'xbsy_fwpt_scgg_3'}"
                      		href="/xinwen/zixunDetail-aid-126.html" title="黑龙江、吉林、辽宁三省全省降雪，部分订单推迟配送">· 黑龙江、吉林、辽宁三省全省降雪，...
                      		</a>
               </dd>               
               <dd>           
                        	<a target="_blank" webtrekkparam="{ct:'xbsy_fwpt_scgg_4'}"
                      		href="/xinwen/zixunDetail-aid-124.html" title="黑龙江地区部分订单推迟配送">· 黑龙江地区部分订单推迟配送
                     		</a>
               </dd>               
               <dd>           
                        	<a target="_blank" webtrekkparam="{ct:'xbsy_fwpt_scgg_5'}"
                      		href="/xinwen/zixunDetail-aid-122.html" title="乐视商城系统升级公告">· 乐视商城系统升级公告
                     		</a>
               </dd>               
               <dd>           
                            <a target="_blank" webtrekkparam="{ct:'xbsy_fwpt_scgg_6'}"
                      		href="/xinwen/zixunDetail-aid-121.html" title="11月3日至11月14日北京顺丰配送时效说明">· 11月3日至11月14日北京顺丰...
                      		</a>
               </dd>                -->
     </dl>
  </li>               
<!-- 最新资讯 -->
        </ul>
    </div>

</div>
<!--<div id="userActionTop" style="display:none"></div>
<div id="userActionBottom" style="display:none"></div>-->
</div>

<!-- 新版上线公告 start-->
<div id="opendiv" class=" hidden" style="height:540px;width: 1080px; margin: 0 auto;position: relative;">
	<div class="close myclose" style="width: 60px;height: 50px;background-image: url(Images/402b1b888ed54cac9ce3997a1bdb1fd6.gif);position: absolute;top: -10px; right: 0;cursor: pointer; z-index: 999;" id="wjPop-close"></div>
	<div class="pic1" style="position: relative;"><img  alt="" style="height:540px;width: 1080px;" src="/object/Public/images/Picture/afd914766df7427ebd4de21a6b45d4dc.gif" style=""/><div class="next_pic" onclick="javascript:$('.pic1').hide();$('.pic2').fadeIn('slow');" style=" position: absolute;width: 180px; height: 60px; bottom: 0;right: -10px; background-image:url(Images/a7a5c3d3fd584deb83b0fe80c1061e5c.gif) ; display: block; cursor: pointer;"></div></div>	
	<div class="pic2 hidden" style="position: relative;"><img  alt=""  style="height:540px;width: 1080px;" src="/object/Public/images/Picture/40e3d85671014347a44f36e3eeae645b.gif" style=""/><div class="next_pic" onclick="javascript:$('.pic2').hide();$('.pic3').fadeIn('slow');" style=" position: absolute;width: 180px; height: 60px; bottom: 0;right: -10px; background-image:url(Images/a7a5c3d3fd584deb83b0fe80c1061e5c.gif) ; display: block; cursor: pointer;"></div></div>
	<div class="pic3 hidden" style="position: relative;"><img  alt=""  style="height:540px;width: 1080px;" src="/object/Public/images/Picture/1172ef91f6564b0f82cfab46447a66a2.gif" style=""/><div class="next_pic" onclick="javascript:$('.pic3').hide();$('.pic4').fadeIn('slow');" style=" position: absolute;width: 180px; height: 60px; bottom: 0;right: -10px; background-image:url(Images/a7a5c3d3fd584deb83b0fe80c1061e5c.gif) ; display: block; cursor: pointer;"></div></div>
	<div class="pic4 hidden" style="position: relative;"><div class="center_close" onclick="javascript:$('.myclose').trigger('click')" style="cursor: pointer;"><img  alt=""  style="height:540px;width: 1080px;" src="/object/Public/images/Picture/ca96dfbc516b4868896d427a36f52e20.gif" style=""/></div></div>
	
</div>
<!-- 新版上线公告 end-->
<a href="http://www.sojump.com/jq/3674687.aspx" target="_blank" class="diaocha block"></a>

<!-- 统计全局变量begin --->
<script type='text/javascript'>
	var isRegUser='0';
	if(Js.login.getAuth()){
		isRegUser = '1';
	}
	var globalTongJi={
		wk_contentId:"homepageindex",//webtrek用到的contentId
		zp_pageId:"121",//晶赞用到的_setPageID
		zp_pageType:"homepage",//晶赞用到的_setPageType
		zp_params:isRegUser//晶赞用到的_setParams
	}
    /**
    var popad = getCookie("COOKIE_INDEX_POP");
  if(!(popad!=null && popad!="")){
        addCookie("COOKIE_INDEX_POP", "1", 0);
        pop("#opendiv",{removeAfterShow:true,layerClick:true});
  }
  */
</script>
<!-- 统计全局变量end --->
 
  
  
  
  
  
  
<!--右侧飘窗-->
<div class="sidebar_float">
	<!-- 百度分享 -->
	<div class="is_share ie6-hover border hand handle  show1 " object="#bd_share">
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
    <a href="http://www.sojump.com/jq/4223975.aspx" target="_blank">
	<div class="is_survey ie6-hover border hand handle  show2 " id="diaocha_div" object="#dc_div">
		<!--<div class="top_show" id="dc_div">
			<div class="arrow absolute"></div>
			<div class="red_bg absolute">有奖调查</div>
		</div>-->
	</div>
  </a>
    <a href="http://bbs.letv.com/thread-458916-1.html" target="_blank">
    <div class="is_king ie6-hover border hand handle  show3 " id="king_div" object="#tw_div">
		<!--<div class="top_show" id="tw_div">
			<div class="arrow absolute"></div>
			<div class="red_bg absolute">销量天王</div>
		</div>-->
	</div>
  </a>
</div>

<!--返回顶部-->
<div class="top_float ">
	<div class="is_top ie6-hover border hand handle" id="backTop" object="#bt_div">
		<!--<div class="top_show" id="bt_div">
			<div class="arrow absolute"></div>
			<div class="red_bg absolute">返回顶部</div>
		</div>-->
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
			<span class="font16 dark mr15">乐视TV 官方微博</span>
			<a href="#" class="inline_block"><img src="/object/Public/images/Picture/c3396c81915a4c3d80ecce294f22cd48.gif" alt="" /></a>
		</div>
		<div class="pl90 pb30 pt15 weixin">
			<div class="clearfix">
				<div class="left pr40 line_r">
					<span class="font16 dark">乐视TV 官方微信</span><br />
					<img src="/object/Public/images/Picture/c9a5f691731341d88406a3eb241c7080.gif" alt="" />
				</div>
				<div class="left pl40">
					<span class="font16 dark">乐视商城 官方微信</span><br />
					<img src="/object/Public/images/Picture/7e0e89316c6345c38c480486bbec00d2.gif" alt="" />
				</div>
			</div>
			<div class="mt15 gray font12">打开微信，点击右上角的“魔法棒”，选择“扫一扫”功能，对准下方二维码即可。</div>
		</div>
	</div>
</div>

<script type="text/javascript">
//右侧飘窗显示隐藏方法
$.fn.extend({showOrHide:function(){
    var _this=this;
    this.each(function(index,elem){
        var $handle=$(elem);
        var name=$handle.attr("object");
        var $content=$(name);
        var timer=null;
        $handle.mouseover(function(){
            show();
            }).mouseout(function(){
              hide();
            });
        $content.mouseover(function(){
            show();
          }).mouseout(function(){
            hide2();
          });
        function show(){
          clearTimeout(timer);
          $content.show();
        }
        function hide(){
                var interval=300;
                timer=setTimeout(function(){
                  $content.hide();
                },interval);
              }
        function hide2(){
          $content.hide();
        }
        });
    }});
var is_hidden="1";//返回顶部
var is_share_show="1";//是否分享

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
<!--     <div class="friendlink center pt10 pb10">
	<dl>

		<dt><a href="/links.html" target="_blank">友情链接：</a></dt>
              <?php if(is_array($links)): foreach($links as $key=>$vo): ?><dd><a href="<?php echo ($vo['url']); ?>" target="_blank" ><?php echo ($vo['title']); ?></a></dd><?php endforeach; endif; ?>
	
    </dl>
</div> -->
<!-- 浏览器跳转
<script type = "text/javascript">
var browser={versions:function(){var a=navigator.userAgent;return{mobile:!!a.match(/AppleWebKit.*Mobile.*/),ios:!!a.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/),android:-1<a.indexOf("Android"),iPhone:-1<a.indexOf("iPhone"),iPad:-1<a.indexOf("iPad"),webApp:-1==a.indexOf("Safari")}}()};if(document.cookie.indexOf("COOKIE_USER_ID_FORWARD_WAP")==-1&&!browser.versions.iPad&&(browser.versions.iPhone||browser.versions.mobile||browser.versions.android)){window.location.href="http://m.shop.letv.com"+location.search};
</script>
-->
<div class="friendlink center pt10 pb10">
  <dl>
    <dt><a href="/links.html" target="_blank">友情链接：</a></dt>
              <?php if(is_array($links)): foreach($links as $key=>$vo): ?><dd><a href="<?php echo ($vo['url']); ?>" target="_blank" ><?php echo ($vo['title']); ?></a></dd><?php endforeach; endif; ?>
  
    </dl>
</div>



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