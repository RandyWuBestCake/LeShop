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

  <link href="/object/Public/css/Content/common.css" rel="stylesheet" type="text/css" />
  <link href="/object/Public/css/Content/jnotify.jquery.css" rel="stylesheet" type="text/css" />
  <style type="text/css">
    #kinMaxShow{visibility:hidden;width:100%; height:359px; overflow:hidden;display:none;}
    #KMSPrefix_kinMaxShow_button{ display:block;height:8px;overflow:hidden; position:absolute;bottom:10px;left:50%;}
    #KMSPrefix_kinMaxShow_button li{border:0;width:8px;height:8px;float:left;margin:0 5px;overflow:hidden; background:url(/object/Public/images/Images/banner_dian.png) no-repeat left bottom;}
    #KMSPrefix_kinMaxShow_button li.KMSPrefix_kinMaxShow_focus{background:url(/object/Public/images/Images/banner_dian.png) no-repeat left top;}
    }
  </style>
  <script type="text/javascript" language="javascript" src="/object/Public/js/Scripts/jquery-1.7.2.min.js"></script>
  <script type="text/javascript" language="javascript" src="/object/Public/js/Scripts/jquery.kinmaxshow-1.1.src.js"  charset="utf-8"></script>
  <script type="text/javascript" language="javascript" src="/object/Public/js/Scripts/jnotify.jquery.js"></script>
  <script type="text/javascript" language="javascript" src="/object/Public/js/Scripts/shijie.js"></script>
  <script type="text/javascript" language="javascript" src="/object/Public/js/Scripts/waterfallhome.js"></script>



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



    
<body style="background:#F5F5F5;">
    <div class="main1">

      <div class="snav_box">
        <div class="bj_btn" onClick="window.open('http://zhifu.letv.com/tobuy/pro')"></div>
          <ul class="nav_li">
            <li class="cur"><a href="<?php echo U('Look/index');?>" class="current">首页</a></li>
            <li><a href="<?php echo U('Look/timeline');?>">时光轴</a></li>
            <li><a href="<?php echo U('Look/hot');?>">热播精选</a></li>
          </ul>
      </div>
    </div>

    <div class="banner">

    <!-- 代码 开始 -->
    <!-- 选出的主打样例 -->
    <div class="comm_header_adv">
        <div class="comm_header_advimg">
          <ul>
            <?php if(is_array($ban)): foreach($ban as $key=>$vo): if(($vo['tags'] != 1) and ($vo['tags'] != 2) and ($vo['tags'] != 3) and ($vo['tags'] != 4) ): ?><li><a href="<?php echo U('Look/xiangqing',array('id'=>$vo['id']));?>" target="_blank"><img src="/object<?php echo ($vo['img']); ?>"><span><?php echo ($t[$vo['tags']]); ?></span></a></li><?php endif; endforeach; endif; ?>
          </ul>
        </div>
    </div>

    <!-- 代码 结束 -->


    </div>

    <div class="vi_centerspan">
      <div>中国唯一4K内容频道+独家精彩自制剧+热播影视最速上线+独播NBA/F1赛事+海量正版3D片源</div>
    </div>
    <div class="vi_center">
      <div class="vi_fanpai">
        <div class="vi_fpmark">现在，乐视网TV版片库的视频数</div>
        <div class="vi_fpmarks">海量版权视频不断更新中...</div>
      </div>
      <div class="vi_pai">
        <div class="p0"></div>
        <div class="p0"></div>
        <div class="p1"></div>
        <div class="p0"></div>
        <div class="p4"></div>
        <div class="p2"></div>
        <div class="p5"></div>
        <div class="p0"></div>
      </div>
    </div>

    <div class="main2 vi">
      <div class="vision_right vi">
        <div class="boxxx" id="hotTop">
          <div class="title_box"><a href="/kankan/hot#rebo" class="more" style="display:none"></a>综合热播TOP10</div>
          <div class="top10">
          <ul>
            <li><em class="num num1">1</em><a href="http://shop.letv.com/LetvTV.html">银河护卫队</a><div class="type"><span>会员</span></div></li>
            <li><em class="num num2">2</em><a href="http://shop.letv.com/kankan/2014121538_1.html">武媚娘传奇</a><div class="type"><span>首播</span></div></li>
            <li><em class="num num3">3</em><a href="http://shop.letv.com/LetvTV.html">单身男女2</a><div class="type"><span>会员</span></div></li>
            <li><em class="num ">4</em><a href="http://shop.letv.com/kankan/2014111412_1.html">奔跑吧兄弟</a><div class="type"><span>综艺</span></div></li>
            <li><em class="num ">5</em><a href="http://shop.letv.com/LetvTV.html">傻儿传奇</a><div class="type"><span>热播</span></div></li>
            <li><em class="num ">6</em><a href="http://shop.letv.com/LetvTV.html">触不可及</a><div class="type"><span>热播</span></div></li>
            <li><em class="num ">7</em><a href="http://shop.letv.com/kankan/2014121565_1.html">屌丝留学记</a><div class="type"><span>自制</span></div></li>
            <li><em class="num ">8</em><a href="http://shop.letv.com/LetvTV.html">满仓进城</a><div class="type"><span>热播</span></div></li>
            <li><em class="num ">9</em><a href="http://shop.letv.com/LetvTV.html">Fate/stay night</a><div class="type"><span>动漫</span></div></li>
            <li><em class="num ">10</em><a href="http://shop.letv.com/LetvTV.html">非常静距离</a><div class="type"><span>访谈</span></div></li>
          </ul>
        </div>
      </div>
    <script>
      $('#hotTop').hover(
        function(){
          $(this).find('a.more').show();
        },
        function(){
          $(this).find('a.more').hide();
        }
      )
    </script>




    <!-- 右侧广告 Start-->
    <div class="ad">
      <ul>
        <li><a href="javascript:void(0)" onclick="getAdvertisUrl(1322,'http://shop.letv.com/zt/qszg.html')"><img src="/object/Public/images/Picture/201411181617071401246.jpg" width="230" /></a></li>
        <li><a href="javascript:void(0)" onclick="getAdvertisUrl(1323,'http://shop.letv.com/huodong/lemelyej.html')"><img src="/object/Public/images/Picture/201411181608423298491.jpg" width="230" /></a></li>
      </ul>
    </div> 
    <!--右侧广告 End-->
    <div class="boxxx" style="position: relative;">
      <div class="title_box">本周更新</div>
      <div class="vi_right_mark">
        <span></span>6
      </div>
      <div class="update">
        <ul>
            <li>
              <div class="infos">
                  <a href="http://shop.letv.com/kankan/2015011661_1.html">一步之遥</a><div class="type"><span>会员</span></div>
                    <div class="date">上线日期：2015年01月26日</div>
                </div>
                <div class="btn">
                  <a href="http://shop.letv.com/kankan/2015011661_1.html">阅读导视</a>
                  <!--<a href="http://shop.letv.com/kankan/2015011661_1.html">提醒我看</a>-->
                </div>
            </li>
            <li>
              <div class="infos">
                  <a href="http://shop.letv.com/kankan/2015011664_1.html">撒娇女人最好命</a><div class="type"><span>会员</span></div>
                    <div class="date">上线日期：2015年01月26日</div>
                </div>
                <div class="btn">
                  <a href="http://shop.letv.com/kankan/2015011664_1.html">阅读导视</a>
                  <!--<a href="http://shop.letv.com/kankan/2015011664_1.html">提醒我看</a>-->
                </div>
            </li>
            <li>
              <div class="infos">
                  <a href="http://shop.letv.com/kankan/2014121538_1.html">武媚娘传奇</a><div class="type"><span>剧集</span></div>
                    <div class="date">上线日期：2015年01月26日</div>
                </div>
                <div class="btn">
                  <a href="http://shop.letv.com/kankan/2014121538_1.html">阅读导视</a>
                  <!--<a href="http://shop.letv.com/kankan/2014121538_1.html">提醒我看</a>-->
                </div>
            </li>
            <li>
              <div class="infos">
                  <a href="http://shop.letv.com/kankan/2015011670_1.html">七号房的礼物</a><div class="type"><span>会员</span></div>
                    <div class="date">上线日期：2015年01月26日</div>
                </div>
                <div class="btn">
                  <a href="http://shop.letv.com/kankan/2015011670_1.html">阅读导视</a>
                  <!--<a href="http://shop.letv.com/kankan/2015011670_1.html">提醒我看</a>-->
                </div>
            </li>
            <li>
              <div class="infos">
                  <a href="http://shop.letv.com/kankan/2015011667_1.html">阿宪走着瞧</a><div class="type"><span>自制</span></div>
                    <div class="date">上线日期：2015年01月27日</div>
                </div>
                <div class="btn">
                  <a href="http://shop.letv.com/kankan/2015011667_1.html">阅读导视</a>
                  <!--<a href="http://shop.letv.com/kankan/2015011667_1.html">提醒我看</a>-->
                </div>
            </li>
        </ul>
      </div>
    </div>
    </div>
      <a name="tohottags" id="tohottags"></a>
      <div class="pubu_box">
          
        <!-- 瀑布流加载区 Start -->
        <input name="pageCount" type="hidden" id="pageCount" value="11" />
        <div id="waterfall">
        
         <div class="cell" id="one" style="display:none;">
            <li>
              <div class="box_4k"></div>
              <div class="box">
                <div class="pic_infos">
                  <div class="img"><a href="" target="_blank"><img src="" width="100%"></a></div>
                  <div class="infos"><a class="title" href="" target="_blank">\</a><p>\</p>
                  </div>
                </div>
              </div>
            </li>
          </div>
         
         <ul class="item" style="margin-left:10px;width:230px;float:left;">
         <ul id="pubu">
              <div class=""  >
                    <div class="tags_box">
                        <div class="boxxx">
                            <div class="title_box">热门标签<input name="tag" type="hidden" id="tag" value="" /></div>
                            <ul class="list">
                              <span><a href="<?php echo U('Look/index/');?>#tohottags" class="focus">全部</a></span>
                            <?php if(is_array($t)): foreach($t as $k=>$vo): ?><span><a href="javascript:url()" class="tag"><?php echo ($vo); ?></a></span><?php endforeach; endif; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <li></li>
                </div>

            </ul></ul>
         <ul class="item" style="margin-left:10px;width:230px;float:left;"></ul>
         <ul class="item" style="margin-left:10px;width:230px;float:left;"></ul>
         <ul class="item" style="margin-left:10px;width:230px;float:left;"></ul>
         <div id="loading" style="border:solid 1px #333;border-radius:50%;width:100px;height:100px;position:absolute;bottom:0px;left:300px;overflow:hidden;display:none"><img src="/object/Publicimages/Picture/" alt="" width="100%"></div>
          

    </div>
    <script>
      
        var p =1;
        var num =12;
        //初始化的时候  自动请求一次服务器
        $.get("<?php echo U('Look/datas');?>",{p:p,num:num},function(msg){
          for(var i = 0;i<msg.length;i++){
            var div = $('#one').clone();
            //设置标签
            div.find('.box_4k').html(msg[i].tags);
            //s设置图片
            div.find('img ').attr('src','/object'+msg[i].img);
            //设置标题
            div.find('.infos a').html(msg[i].title);
            div.find('.infos p').html(msg[i].con);
            div.find('.img a').attr('href',"<?php echo U('/Home/Look/xiangqing/id/"+msg[i].id+"');?>");
            div.find('.infos a').attr('href',"<?php echo U('/Home/Look/xiangqing/id/"+msg[i].id+"');?>");
           //$('#waterfall').append(div);
            
            
            $('.item').eq(i%4).append(div);
            div.show();
          }//页码自增
          p++;
        });
       
       $(window).scroll(function(){

          //检测当前是否正在请求服务器
          //总的文档高度
          var tHeight = $(document).height();
          var wHeight = $(window).height();
          var sHeight = $(window).scrollTop();
          
          //当地步跟东高度只有250像素时候开始请求服务器
          if(tHeight-wHeight-sHeight <=0){
            //开始请求服务器时候关闭通道
            $.get("<?php echo U('Look/datas');?>",{p:p,num:num},function(msg){
              for(var i=0;i<msg.length;i++){
                //克隆
                var div = $('#one').clone();
                //设置标签
                div.find('.box_4k').html(msg[i].tags);
                //s设置图片
                div.find('img ').attr('src','/object'+msg[i].img);
                //设置标题
                div.find('.infos a').html(msg[i].title);
                div.find('.infos p').html(msg[i].con);
                div.find('.img a').attr('href',"<?php echo U('/Home/Look/xiangqing/id/"+msg[i].id+"');?>");
                div.find('.infos a').attr('href',"<?php echo U('/Home/Look/xiangqing/id/"+msg[i].id+"');?>");
                $('.item').eq(i%4).append(div);
                div.show();
              }p++;
              
            });
            
          }
        })
      </script>
          <!-- 瀑布流加载区 End -->
            <div class="clearfix"></div>

            <!-- 加载等待提示 -->
            <div id ="wfloading"></div>

        </div>
        <div class="clearfix"></div>

    </div>

    <div style="position:relative; top:71px;">



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