<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
  <!-- js引用文件添加 -->
  <!-- 页面底部统一引用jsInclude -->
  <!-- 引用静态页面标签 -->
   
  <script>var _hrefPath = '',_imagePath = '',_basePath = '';</script>
  <!--[if lt IE 7]>
  <script type="text/javascript" src="/object/Public/js/Scripts/unitpngfix.js"></script>
  <![endif]-->

    <link  type='text/css' href='/object/Public/css/Content/global.css' rel='stylesheet' />

    <script type='text/javascript' src='/object/Public/js/Scripts/generatesession.js'></script>
    
    <script type='text/javascript' src='/object/Public/js/Scripts/zxlib.js'></script>

    <script type='text/javascript' src='/object/Public/js/Scripts/template.js'></script>

  <link  type='text/css' href='/object/Public/css/Content/global.css' rel='stylesheet' />
                <link  type='text/css' href='/object/Public/css/Content/help.css' rel='stylesheet' />
            <link  type='text/css' href='/object/Public/css/Content/index.css' rel='stylesheet' />
            <script type='text/javascript' src='/object/Public/js/Scripts/generatesession.js'></script>
            <script type='text/javascript' src='/object/Public/js/Scripts/zxlib.js'></script>
            <script type='text/javascript' src='/object/Public/js/Scripts/template.js'></script>
  <link rel="icon" href="/object/Public/images/favicon.ico" type="image/x-icon"/>
  <link rel="shortcut icon"  href="/object/Public/images//favicon.ico" type="image/x-icon"/>

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
                  <img  alt=""  src="/object/Public/images/Picture/886616c005564ee398fad966d50e6a73.gif" style="width:95px;"/>
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
    <div class="center">
      <a class="block logo left " webtrekkparam="{ct:'xbsy_LOGO'}" href="<?php echo U('Index:index');?>"><img src="<?php echo C('HTTP_LOGO');?>"></a>
      <div class="logo_right left">
        <a href="<?php echo U('Index:index');?>" webtrekkparam="{ct:'xbsy_zexhr'}">
          <img src="/object/Public/images/Picture/321c7a0420674f369ccbf2c19f3d4467.gif"/>
        </a>
      </div>
      <a class="block head_cart" href="<?php echo U('cart/index');?>" webtrekkparam="{ct:'xbsy_gwc'}" target="_blank">
        <div class="had_num" id="productNumInCart"></div>
        <span class="pl20 white font14">购物车</span>
      </a>
      <div class="clear"></div>
    </div>

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
          <!--<li>
          <a target="_blank" webtrekkparam="{ct:'H_tyzx'}" href="http://shop.hdletv.com/#/Homepage">超级体验中心</a>
        </li>
        -->
      </ul>
  </div>
  </div>
  </div>
   
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <!-- 系统引用 勿动 -->
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <!-- js引用文件添加 -->
    <!-- 页面底部统一引用jsInclude -->
    <!-- 引用静态页面标签 -->
    <script>var _hrefPath = '', _imagePath = 'http://img0.hdletv.com', _basePath = 'http://web_dev_service_group:80/';</script>
    <!--[if lt IE 7]>
    <script type="text/javascript" src="../Scripts/unitpngfix.js"></script>
    <![endif]-->
    <link type='text/css' href='/object/Public/CSS/global.css' rel='stylesheet'/>

    <script type='text/javascript' src='/object/Public/Scripts/generatesession.js'></script>

    <script type='text/javascript' src='/object/Public/Scripts/zxlib.js'></script>

    <script type='text/javascript' src='/object/Public/Scripts/template.js'></script>

    <link type='text/css' href='/object/Public/CSS/proinfo.css' rel='stylesheet'/>

    <script type='text/javascript' src='/object/Public/Scripts/newag.js'></script>
    <div class="main_body">
        <div class="product_info">
            <div style="height:73px;width:100%;min-width:1200px;">
                <div id="piao"
                     style="width:100%;min-width:1200px;height:70px;position:absolute; z-index:200; padding:0; top:150px; background-color:#fff;">
                    <section class="pro_info_head">
                        <div class="center ">
                            <div class="pro_name left"><a href="/product/max70.html"
                                                          webtrekkparam="{ct:'Max70_p_dh_cpjs'}"><h1><?php echo ($res['name']); ?></h1>
                            </a></div>
                            <a target="_blank" class="block left bt_oline_service" href="/onlineservice.html"
                               webtrekkparam="{ct:'introduction_Max70_zxzx'}">
                                <span class="font12">在线咨询</span>
                            </a>

                            <div class="pro_button"><a class="red_bt_m block left t_c"
                                                       webtrekkparam="{ct:'Max70_topbuy'}"
                                                       href="/product/product-pid-GWGT701002-n-3.html" target="_blank">
                                <span class="white">立即购买</span></a></div>
                            <div class="pro_tab right">
                                <ul class="uptabSwitch right">
                                    <li><a class="" href="<?php echo U('Goods/headline',array('pid'=>$res['pid']));?>"
                                           webtrekkparam="{ct:'$res['name']_toptab1'}"><span>概述</span></a>|
                                    </li>
                                    <li><a class="" href="<?php echo U('Goods/capability',array('pid'=>$res['pid']));?>"
                                           webtrekkparam="{ct:'$res['name']_toptab2'}"> <span>性能</span></a>|
                                    </li>
                                    <li><a class="" href="<?php echo U('Goods/design',array('pid'=>$res['pid']));?>"
                                           webtrekkparam="{ct:'$res['name']_toptab3'}"> <span>设计与工艺</span></a>|
                                    </li>
                                    <li><a class="cur" href="<?php echo U('Goods/letvUI',array('pid'=>$res['pid']));?>"
                                           webtrekkparam="{ct:'$res['name']_toptab4'}"> <span>LetvUI</span></a>|
                                    </li>
                                    <li><a class="" href="<?php echo U('Goods/letvStore',array('pid'=>$res['pid']));?>"
                                           webtrekkparam="{ct:'$res['name']_toptab5'}"> <span>LetvStore</span></a>|
                                    </li>
                                    <li><a class="" href="<?php echo U('Goods/param',array('pid'=>$res['pid']));?>"
                                           webtrekkparam="{ct:'$res['name']_toptab6'}"> <span>规格参数</span></a>|
                                    </li>
                                    <li><a class="" href="<?php echo U('Goods/compare',array('pid'=>$res['pid']));?>"
                                           webtrekkparam="{ct:'$res['name']_toptab7'}"><span>评价晒单</span></a>|
                                    </li>
                                </ul>
                            </div>
                            <div class="clear line_b"></div>
                        </div>
                    </section>
                </div>
            </div>

            <!--UI开始-->
            <div class="letvUI tabSwichDiv3 tabSwichDiv letv_max70">
                <a name="letvUI"></a>
                <!--/*UI开始*/-->
                <div class="center" style="background:#fff;">
                    <div class="line_b pb50">
                        <div class="intro_text pt95 t_c">
                            <div class="t_c pb25"><img alt=""
                                                       src="/object/Public/Picture/aea27583f3af415f8e2d5964617dfbe1.gif"
                                                       style=""/></div>
                            <H3>LetvUI 3.0 最好用的智能电视操作系统</H3>

                            <div class="h5 pt20">基于Android深度定制的LetvUI智能电视操作系统，每周一次更新，<br/>为乐视超级电视量身定制每一处细节，全心打造极致使用体验。
                            </div>
                        </div>
                        <div class="intro_pic pt30">
                            <div class="m70 t_c"><a class="txs" video-info="{'vid':'2239109',playType:'pop'}"
                                                    href="javascript:void(0);"><img alt=""
                                                                                    src="/object/Public/Picture/91703493391f49288e9c5809c03df2d8.gif"
                                                                                    style=""/></a></div>
                            <div class="x60"><a class="txs" video-info="{'vid':'2239109',playType:'pop'}"
                                                href="javascript:void(0);"><img alt=""
                                                                                src="/object/Public/Picture/8fb203bf89c64f3f93bf75dc536a2990.gif"
                                                                                style=""/></a></div>
                            <div class="s50"><a class="txs" video-info="{'vid':'2239109',playType:'pop'}"
                                                href="javascript:void(0);"><img alt=""
                                                                                src="/object/Public/Picture/dbd742077897490087fe6aeb35618854.gif"
                                                                                style=""/></a></div>
                            <div class="s40"><a class="txs" video-info="{'vid':'2239109',playType:'pop'}"
                                                href="javascript:void(0);"><img alt=""
                                                                                src="/object/Public/Picture/9ad65f04014c421fa24a129d11260a2a.gif"
                                                                                style=""/></a></div>
                        </div>
                    </div>
                    <div class="line_b tigan">
                        <div class="intro_text pt30 t_c">
                            <H3>智能体感操作 创新交互体验</H3>

                            <div class="normal pt20">
                                搭配体感摄像头你将体验到前所未有的智能交互方式，科幻电影中常见的手势操作在LetvUI 3.0上成为现实。<br/>
                                桌面切换，音量调节，应用选择，网页浏览等等操作只要对着摄像头挥挥手就可轻松实现。<br/>
                                还有全体感开关控制有效避免误操作的影响。<br/>
                            </div>
                        </div>
                        <div class="intro_pic pt30 t_c"><img alt=""
                                                             src="/object/Public/Picture/4d4d034e42b943e3a19a356e0d77a543.gif"
                                                             style=""/></div>
                    </div>
                    <div class="line_b pb20 pt20">
                        <div class="intro_text pt50  t_c">
                            <H3>强大语音识别 说到就能做到</H3>

                            <div class="normal pt20">
                                LetvUI 3.0具备强大语音功能，能智能识别你的话，用过一次就再也停不下来！播歌曲，找视频，查股票，搜地图，看天气……<br/>
                                超多功能都可语音来控制；更有离线语音命令库，就算没有网络也一样好用。<br/>
                            </div>
                        </div>
                        <div class="intro_pic pt50 t_c"><a class="txs" video-info="{'vid':'2095192',playType:'pop'}"
                                                           href="javascript:void(0);"><img alt=""
                                                                                           src="/object/Public/Picture/09729ccb3a764e78aa78537903d86885.gif"
                                                                                           style=""/></a></div>
                    </div>
                    <div class="line_b pb50 pt20">
                        <div class="intro_text pt50 pb20 t_c">
                            <H3>优化界面设计 重构系统逻辑</H3>
                        </div>
                        <div class="pic_gallery t_l" id="ui5" style="height:610px;">
                            <ul>
                                <li><img alt="" src="/object/Public/Picture/d1f38e720a724dad8846c68c76e13326.gif" style=""/>
                                </li>
                                <li><img alt="" src="/object/Public/Picture/62fb5576d5264a959fcdf606728f14f0.gif" style=""/>
                                </li>
                            </ul>
                            <div class="slide_control">
                                <div id="prevBtn" class="pre"></div>
                                <div id="nextBtn" class="next"></div>
                            </div>
                            <div class="slide_cotrl_point js_slide_tag">
                                <a class="cur" href="javascript:void(0)"></a><a class="" href="javascript:void(0)"></a>
                            </div>
                        </div>
                    </div>
                    <div class="line_b pb20 pt20 t_c">
                        <div class="intro_text pt50 t_c">
                            <H3>可换主题 给你个性化空间</H3>

                            <div class="normal pt20">
                                全球首个可换主题的智能电视操作系统，LetvUI 3.0提供众多漂亮主题供你选择。我们邀请业内一流设计师<br/>
                                独家定制个性化主题，换一个主题，换一个心情，这是专属你的个性化空间。<br/>
                            </div>
                        </div>
                        <div class="intro_pic pt30 t_c"><img alt=""
                                                             src="/object/Public/Picture/e460e55113c941159a34e12aa83f3199.gif"
                                                             style=""/></div>
                    </div>

                    <div class="line_b pb50">
                        <div class="intro_text pt50 pb20 t_c">
                            <H3>轮播桌面 打造极致体验</H3>
                        </div>
                        <div class="pic_gallery t_l" id="ui6" style="height:650px;">
                            <ul>
                                <li><img alt="" src="/object/Public/Picture/c1163b5c765e47d8a062917ba98153e1.gif" style=""/>
                                </li>
                                <li><img alt="" src="/object/Public/Picture/206bbf9260aa46adbf22d358f972cef9.gif" style=""/>
                                </li>
                                <li><img alt="" src="/object/Public/Picture/ddbe374554824301a44c37f223af66d2.gif" style=""/>
                                </li>
                            </ul>
                            <div class="slide_control">
                                <div id="prevBtn" class="pre"></div>
                                <div id="nextBtn" class="next"></div>
                            </div>
                            <div class="slide_cotrl_point js_slide_tag">
                                <a class="cur" href="javascript:void(0)"></a><a class=""
                                                                                href="javascript:void(0)"></a><a
                                    class="" href="javascript:void(0)"></a>
                            </div>
                        </div>
                    </div>
                    <div class="line_b pb20 pt20">
                        <div class="intro_text pt50 t_c">
                            <H3>新添搜索桌面 聚合全网视频</H3>

                            <div class="normal pt20">
                                全新搜索桌面有了更多优化改进，聚合全网优质资源为你独享。通过关键词可搜索全网高清视频内容，<br/>
                                热门搜索内容也有分类展示，助你快捷定位想要内容。<br/>
                            </div>
                        </div>
                        <div class="intro_pic pt30 t_c"><img alt=""
                                                             src="/object/Public/Picture/6335213269fe4e278cf61ee59e184cec.gif"
                                                             style=""/></div>
                    </div>
                    <div class="line_b pb20 pt20">
                        <div class="intro_text pt50 t_c">
                            <H3>LeCloud乐视云 海量资源无限存储</H3>

                            <div class="normal pt20">
                                LeCloud乐视云是你与家庭之间，不同设备之间资源共享，数据共享，信息共享的最佳平台。只需登录同一个账号，<br/>
                                就可在手机、Pad、超级电视上享受存储在乐视云上的海量图片、音乐、视频等内容，无容量限制放再多高清电影都不是问题。<br/>
                            </div>
                        </div>
                        <div class="intro_pic pt30 t_c"><img alt=""
                                                             src="/object/Public/Picture/b86d6faf44254ac88f22123b205db785.gif"
                                                             style=""/></div>
                    </div>
                    <div class="line_b pb50">
                        <div class="intro_text pt95 pb20 t_c">
                            <H3>多屏互动 一个应用就搞定</H3>

                            <div class="normal pt20">
                                只需在手机中安装多屏看看app程序，就能与超级电视实现多屏互动。手机上的图片、音乐和视频能一键推送电视大屏，<br/>
                                和家人、朋友一起分享生活中的精彩；还能用手机遥控超级电视，划屏、轻触、手势，丰富操作方式比传统遥控器更有趣。<br/>
                                <a onclick="$('.uptabSwitch').find('li:eq(3)').trigger('click');"
                                   webtrekkparam="{ct:'Max70_Letvui'}" href="/zt/sjzs.html"><span>了解更多 ></span></a>
                            </div>
                        </div>
                        <div class="intro_pic pt30 t_c"><img alt=""
                                                             src="/object/Public/Picture/595d7f43c42846209368428cdc9fe760.gif"
                                                             style=""/></div>
                        <!--<div class="pic_gallery t_l" id="ui7/object/Public
                              <ul>
                             <li><img  alt=""  src="../Picture/c60fe51c482141eeae246be420a3c02a.gif" style=""/></li>
                             <li><img  alt=""  src="../Picture/595d7f43c42846209368428cdc9fe760.gif" style=""/></li>
                              </ul>
                              <div class="slide_control"><div id="prevBtn" class="pre"></div><div id="nextBtn" class="next"></div></div>
                            <div class="slide_tag js_slide_tag">
                             <a class="cur tab_dot" href="javascript:void(0)"></a><a class="tab_dot" href="javascript:void(0)"></a>
                            </div>
                          </div>-->
                    </div>
                    <div class="line_b pb30 pt20">
                        <div class="intro_text pt50 t_c">
                            <H3>贴心管家式设计 智能为你所用</H3>

                            <div class="normal pt20">
                                LetvUI 3.0加入更多管家式贴心服务，天气应用新增PM2.5显示，日历应用增加节假日提醒标签，为你的生活提供更多便利；<br/>
                                开机启动项自由管理，后台应用一键清空等功能让系统运行快捷高效，操作流畅如飞；<br/>
                                还有智能电视锁功能避免孩子过度依赖电视，让孩子健康成长。<br/>
                            </div>
                        </div>
                        <div class="intro_pic pt30 t_c"><img alt=""
                                                             src="/object/Public/Picture/75dbc978bd3845de9c56d9fc2399c8cf.gif"
                                                             style=""/></div>
                    </div>
                    <div class="line_b pb50 pt20">
                        <div class="intro_text pt50 t_c">
                            <H3>乐视浏览器 畅享极速互联生活</H3>

                            <div class="normal pt20">
                                电视上最好用的上网浏览器，优化内核充分利用多线程性能带来更快捷的页面加载速度。全网在线视频直接观看，<br/>
                                搭配超级遥控器提供丰富交互方式，给你最舒适的大屏互联体验。<br/>
                            </div>
                        </div>
                        <div class="intro_pic pt50 t_c"><img alt=""
                                                             src="/object/Public/Picture/937701ba476f4ca89bb848a491fa925c.gif"
                                                             style=""/></div>
                    </div>
                    <div class="pb50 pt20">
                        <div class="intro_text pt50 t_c">
                            <H3><span class="font36">LetvUI - 每周更新苛求极致</span></H3>

                            <div class="normal pt20">
                                全行业唯一做到每周更新的智能电视操作系统，千万用户需求推动LetvUI不断完善，苛求极致！<br/>
                            </div>
                        </div>
                        <div class="intro_pic pt50 t_c"><img alt=""
                                                             src="/object/Public/Picture/9531baffbb9d4b3f93c770ad01ed187a.gif"
                                                             style=""/></div>
                    </div>
                </div>
                <!--/*UI结束*/-->

            </div>
            <!--UI结束-->

<!--主内容区part -->
<div class="clear"></div>
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
<img  alt=""  src="/object/Public/images/Picture/ef1c1735afc74eba8cdebd310f456911.gif" style=""/>
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
<span class="font16 dark mr15">乐视TV 官方微博</span>
<a href="#" class="inline_block">
<img src="/object/Public/images/Picture/7200f79c65bb409d817e6eecf3b3a3d7.gif" alt="" />
</a>
</div>
<div class="pl90 pb30 pt15 weixin">
<div class="clearfix">
<div class="left pr40 line_r">
<span class="font16 dark">乐视TV 官方微信</span>
<br />
<img src="/object/Public/images/Picture/64c541ee81b04f7fa6903f351f0e25a0.gif" alt="" />
</div>
<div class="left pl40">
<span class="font16 dark">乐视商城 官方微信</span>
<br />
<img src="/object/Public/images/Picture/6ee62666a6e84788ae6e0899d0b76733.gif" alt="" />
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
<!--<script type='text/javascript' src='/object/Public/js/Scripts/zxvideo.js'></script>-->
</html>
<!-- 系统引用 勿动 -->