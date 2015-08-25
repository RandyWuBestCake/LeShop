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
    <script>var _hrefPath = '', _imagePath = 'http://img0.hdletv.com', _basePath = 'http://web_dev_service_group:80/';</script>
    <!--[if lt IE 7]>
    <script type="text/javascript" src="../Scripts/unitpngfix.js"></script>
    <![endif]-->
    <link type='text/css' href='/object/Public/CSS/global.css' rel='stylesheet'/>

    <script type='text/javascript' src='/object/Public/Scripts/generatesession.js'></script>

    <script type='text/javascript' src='/object/Public/Scripts/zxlib.js'></script>

    <script type='text/javascript' src='/object/Public/Scripts/template.js'></script>


    <link rel="icon" href="http://www.letv.com/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="http://www.letv.com/favicon.ico" type="image/x-icon"/>
    <title>乐视电视Max70 应用介绍 - 乐视商城</title>
<div class="main_body">
    <div class="product_info">
        <div style="height:73px;width:100%;min-width:1200px;">
            <div id="piao"
                 style="width:100%;min-width:1200px;height:70px;position:absolute; z-index:200; padding:0; top:150px; background-color:#fff;">
                <section class="pro_info_head">
                    <div class="center ">
                        <div class="pro_name left"><a href="/product/max70.html" webtrekkparam="{ct:'Max70_p_dh_cpjs'}">
                            <h1><?php echo ($res['name']); ?></h1></a></div>
                        <a target="_blank" class="block left bt_oline_service" href="/onlineservice.html"
                           webtrekkparam="{ct:'introduction_Max70_zxzx'}">
                            <span class="font12">在线咨询</span>
                        </a>

                        <div class="pro_button"><a class="red_bt_m block left t_c" webtrekkparam="{ct:'Max70_topbuy'}"
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
                                <li><a class="" href="<?php echo U('Goods/letvUI',array('pid'=>$res['pid']));?>"
                                       webtrekkparam="{ct:'$res['name']_toptab4'}"> <span>LetvUI</span></a>|
                                </li>
                                <li><a class="cur" href="<?php echo U('Goods/letvStore',array('pid'=>$res['pid']));?>"
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

        <!--Store开始-->
        <div class="letvStore tabSwichDiv4 tabSwichDiv"><a name="Store"></a>

            <div style="background:#fff;">
                <div class="tigan center">
                    <div class="intro_text pt50 t_c">
                        <H3>无所不能，无限可能<br/>
                            中国第一智能电视应用商店</H3>

                        <div class="normal pt20"> 亲子教育、生活工具、游戏娱乐。超过4000款app的中国第一智能电视应用市场<br/>
                            现在以每月至少50款的速度在增加和更新。你安装的app越多，为你和全家带来的愉悦越多。尽情来和我们一起体验这些精选app吧。<br/>
                        </div>
                    </div>
                    <div class="intro_pic pt30 t_c"><img alt=""
                                                         src="/object/Public/Picture/9faa7422cbda4836b2208da7c252585f.gif"
                                                         style=""/></div>
                </div>
                <div class="lunbo_dian" style="background-color:#f5f5f5;">
                    <div class="pt20 pb20">
                        <div class="intro_text pt50 pb20 t_c">
                            <H3>专为超级电视打造，大屏畅享</H3>

                            <div class="normal pt20"> 应用商店为超级电视提供了娱乐、休闲、教育等多种应用，让你除了看全网视频外，还能享受各种App带来的非凡感受；<br/>
                                他们不是手机、Pad版的简单全屏拉伸，而是根据超级电视的屏幕、硬件和遥控方式所设计的app，<br/>
                                以便发挥乐视生态全部的优势。他可以让你全家都尽享大屏的无限乐趣。<br/>
                            </div>
                        </div>
                        <div class="pic_gallery t_l relative" id="store1" style="height:650px;">
                            <ul>
                                <li><img alt="" src="/object/Public/Picture/7f8e48f16b0a49c294e31142ec73a79c.gif" style=""/>
                                </li>
                                <li><img alt="" src="/object/Public/Picture/fe736845a7f54a65b9a95469a9d97f26.gif" style=""/>
                                </li>
                            </ul>
                            <div class="slide_control">
                                <div id="prevBtn" class="pre"></div>
                                <div id="nextBtn" class="next"></div>
                            </div>
                            <div class="slide_cotrl_point js_slide_tag"><a class="cur" href="javascript:void(0)"></a><a
                                    class="" href="javascript:void(0)"></a></div>
                        </div>
                    </div>
                </div>
                <div class="tigan center">
                    <div class="intro_text pt80 t_c">
                        <H3>适合每个人，胜任每件事</H3>

                        <div class="normal pt20"> 教小朋友学英文儿歌，了解健康养生的信息，或者放松一下玩玩游戏，<br/>
                            你想用超级电视干什么，应用商店的App来帮你实现。<br/>
                        </div>
                    </div>
                    <div class="intro_pic pt30 t_c pb50"><img alt=""
                                                              src="/object/Public/Picture/de4ed1b835ca4aeeadd7dcc824669126.gif"
                                                              style=""/></div>
                </div>
                <div class="lunbo_zi" style="background-color:#f5f5f5;">
                    <div class="pt20">
                        <div class="intro_text pt50 pb20 t_c">
                            <H3>游戏Game</H3>

                            <div class="normal pt20"> 超强的硬件配置，加上遥控器/手柄，让你的超级电视变成你乐趣无穷的大屏游戏机。<br/>
                                从棋牌类游戏到射击、角色扮演，应有尽有。<br/>
                            </div>
                        </div>
                        <div class="pic_gallery t_l relative" id="store2" style="height:681px;">
                            <ul>
                                <li><img alt="" src="/object/Public/Picture/cb3b7ae97db34af8b83d16e18921da39.gif" style=""/>
                                </li>
                                <li><img alt="" src="/object/Public/Picture/18dd378d54284f0f87894c9609e162ea.gif" style=""/>
                                </li>
                                <li><img alt="" src="/object/Public/Picture/568a5cf63c5c4e8a87dd30a67cd0b511.gif" style=""/>
                                </li>
                            </ul>
                            <div class="slide_control">
                                <div id="prevBtn" class="pre"></div>
                                <div id="nextBtn" class="next"></div>
                            </div>
                            <div class="slide_cotrl_button js_slide_tag t_c" style="top:555px;"><a class="cur btn_l"
                                                                                                   href="javascript:void(0)">益智游戏</a><a
                                    class="btn_m" href="javascript:void(0)">体感游戏</a><a class="btn_r"
                                                                                       href="javascript:void(0)">手柄游戏</a>
                            </div>
                            <div class="store_zi t_c" style="top:605px;"><a
                                    href="/product/product-pid-409900000283.html" target="_blank"><span class="red">选购游戏配件>></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--图片轮播 开始-->
                <div class="lunbo_zi">
                    <div class="">
                        <div class="pic_gallery t_l relative" id="store2" style="height:742px;">
                            <ul>
                                <li style="background:url(/object/Public/Images/6eec84b73c8444c596ab0b1f8a3246f3.gif) no-repeat top center;">
                                    <div class="intro_text t_l" style="padding:210px 0 0 750px;">
                                        <H3>娱乐Entertainment</H3>

                                        <div class="normal pt20">听网络电台、大屏看新闻、或者自己在家吼几段，<br/>
                                            纵情欣赏、自娱自乐，快乐不断。<br/>
                                        </div>
                                        <div class="normal pt20"><a href="/product/product-pid-405100000768.html"
                                                                    target="_blank"><span
                                                class="red font16">家庭K歌神器选购 >></span></a></div>
                                    </div>
                                </li>
                                <li style="background:url(/object/Public/Images/0048192096f047f88ca5c2ddd48638de.gif) no-repeat top center;">
                                    <div class="intro_text t_l" style="padding:210px 0 0 750px;">
                                        <H3>娱乐Entertainment</H3>

                                        <div class="normal pt20">听网络电台、大屏看新闻、或者自己在家吼几段，<br/>
                                            纵情欣赏、自娱自乐，快乐不断。<br/>
                                        </div>
                                    </div>
                                </li>
                                <li style="background:url(/object/Public/Images/e6d716dd27b84ec7b08897af5c183558.gif) no-repeat top center;">
                                    <div class="intro_text t_l" style="padding:210px 0 0 750px;">
                                        <H3>娱乐Entertainment</H3>

                                        <div class="normal pt20">听网络电台、大屏看新闻、或者自己在家吼几段，<br/>
                                            纵情欣赏、自娱自乐，快乐不断。<br/>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="slide_control">
                                <div id="prevBtn" class="pre"></div>
                                <div id="nextBtn" class="next"></div>
                            </div>
                            <div class="slide_cotrl_button js_slide_tag t_c" style="top:635px;"><a class="cur btn_l"
                                                                                                   href="javascript:void(0)">K歌</a><a
                                    class="btn_m" href="javascript:void(0)">网络电台</a><a class="btn_r"
                                                                                       href="javascript:void(0)">杂志</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--图片轮播 结束-->
                <div style="background-color:#f5f5f5;">
                    <div class="tigan center" style="background-color:#f5f5f5;">
                        <div class="intro_text pt50 t_c">
                            <H3>健康Healthy</H3>

                            <div class="normal pt20">虽不能帮你直接减去赘肉，但是却可以让你的饮食和生活更健康，<br/>
                                学做美食、打打太极、跟练瑜伽，全家一起。<br/>
                            </div>
                        </div>
                        <div class="intro_pic pt30 t_c pb50"><img alt=""
                                                                  src="/object/Public/Picture/93ab76043ee54d2ea8d69dea6147760a.gif"
                                                                  style=""/></div>
                    </div>
                    </div/object/Public
                    <div class="tigan center">
                        <div class="intro_text pt50 t_c">
                            <H3>教育Education</H3>

                            <div class="normal pt20">教育类的智能App，让自己和家人的学习走在他人的前面，还有很多你一直在想但却没开始的新内容。</div>
                        </div>
                        <div class="intro_pic pt30 t_c pb50"><img alt=""
                                                                  src="/object/Public/Picture/89ab8f4a1fcd4020bd719d151b15a1b6.gif"
                                                                  style=""/></div>
                    </div>
                    <div class="lunbo_dian" style="background-color:#f5f5f5;">
                        <div class="pt20">
                            <div class="intro_text pt50 pb20 t_c">
                                <H3>生活Life</H3>

                                <div class="normal pt20"> 今天的黄历如何，天气怎样，为宝宝起个什么名字好，不管你热衷什么，总会找到些惊喜。</div>
                            </div>
                            <div class="pic_gallery t_l relative" id="store4" style="height:630px;">
                                <ul>
                                    <li><img alt="" src="/object/Public/Picture/819d4d728c464e9b8b227fbf6d12cc4f.gif"
                                             style=""/></li>
                                    <li><img alt="" src="/object/Public/Picture/34c3e9e713174400afc725cab6cbbf56.gif"
                                             style=""/></li>
                                    <li><img alt="" src="/object/Public/Picture/69589dec01e54303adb9ef50ff14cd42.gif"
                                             style=""/></li>
                                </ul>
                                <div class="slide_control">
                                    <div id="prevBtn" class="pre"></div>
                                    <div id="nextBtn" class="next"></div>
                                </div>
                                <div class="slide_cotrl_point js_slide_tag" style="bottom:50px;"><a class="cur"
                                                                                                    href="javascript:void(0)"></a><a
                                        class="" href="javascript:void(0)"></a><a class=""
                                                                                  href="javascript:void(0)"></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="lunbo_dian">
                        <div class="pt20">
                            <div class="intro_text pt50 pb20 t_c">
                                <H3>购物Shopping</H3>

                                <div class="normal pt20"> 淘宝天猫、京东苏宁，在家享受大屏血拼的乐趣，<br/>
                                    带着你的父母和孩子一起感受网络购物的便捷吧<br/>
                                </div>
                            </div>
                            <div class="pic_gallery t_l relative" id="store5" style="height:630px;">
                                <ul>
                                    <li><img alt="" src="/object/Public/Picture/2b2d79a7441b4dfc8d3e28caa26d9c71.gif"
                                             style=""/></li>
                                    <li><img alt="" src="/object/Public/Picture/98cd89b899a640c1969671011a3ac663.gif"
                                             style=""/></li>
                                    <li><img alt="" src="/object/Public/Picture/f3e5a9b50e27458490b69893b3ae3513.gif"
                                             style=""/></li>
                                </ul>
                                <div class="slide_control">
                                    <div id="prevBtn" class="pre"></div>
                                    <div id="nextBtn" class="next"></div>
                                </div>
                                <div class="slide_cotrl_point js_slide_tag" style="bottom:50px;"><a class="cur"
                                                                                                    href="javascript:void(0)"></a><a
                                        class="" href="javascript:void(0)"></a><a class=""
                                                                                  href="javascript:void(0)"></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Store结束-->
        </div>
    </div>
    <a href="http://www.sojump.com/jq/3564480.aspx" target="_blank" class="diaocha block"></a>
    <script type='text/javascript'>
        //全局统计变量
        var globalTongJi = {
            wk_contentId: "introduction.tv.max70",//webtrek用到的contentId
            zp_pageId: "122",//晶赞用到的_setPageID
            zp_pageType: "productPage",//晶赞用到的_setPageType
            zp_params: ['乐视超级电视Max70，两倍性能，1/3价格,在线购买-乐视商城', '乐视超级电视Max70', '0']//晶赞用到的_setParams
        }
    </script>


    <!-- 统计代码start-->
    <div style="display:none">
        <script type="text/javascript">
            var myTongJi = {
                wk_contentId: "",//webtrek用到的contentId
                zp_pageId: "",//晶赞用到的_setPageID
                zp_pageType: "",//晶赞用到的_setPageType
                zp_params: [],//晶赞用到的_setParams
                zp_need: "1"
            }
            if (typeof(globalTongJi) != 'undefined') {
                if (globalTongJi.wk_contentId) {
                    myTongJi.wk_contentId = globalTongJi.wk_contentId;
                }
                var zpqUrlPath = window.location.pathname;
                var zpqTitle = document.title;
                if (zpqUrlPath.indexOf("/help/") != -1 && !globalTongJi.wk_contentId) {
                    myTongJi.zp_pageId = "helpPage";
                } else {
                    myTongJi.zp_pageId = globalTongJi.wk_contentId;
                }
                if (globalTongJi.zp_pageId) {
                    myTongJi.zp_pageId = globalTongJi.zp_pageId;
                }
                if (globalTongJi.zp_pageType) {
                    myTongJi.zp_pageType = globalTongJi.zp_pageType;
                }
                if (globalTongJi.zp_params) {
                    myTongJi.zp_params = globalTongJi.zp_params;
                }
                if (globalTongJi.zp_need) {
                    myTongJi.zp_need = globalTongJi.zp_need;
                }
            } else {
                var zpqUrlPath = window.location.pathname;
                var zpqTitle = document.title;
                if (zpqUrlPath.indexOf("/help/") != -1) {
                    myTongJi.zp_pageType = "helpPage";
                    myTongJi.zp_params = [$(document).attr("title")];
                }
            }
        </script>
        <!-- 百度统计 start-->
        <script type="text/javascript" src="/object/Public/Scripts/bdtj.js"></script>
        <!-- 百度统计 end-->

        <!-- webtrek统计 start-->
        <script type="text/javascript">
            var webtrekk_params = {
                contentId: myTongJi.wk_contentId
            };
        </script>
        <script type="text/javascript" src="/object/Public/Scripts/webtrekk_v3.js"></script>
        <!-- webtrek统计 end-->

        <!-- 艾瑞统计 start-->
        //
        <script type="text/javascript">
            //   _iwt_no_flash = 1; //默认为0开启flash cookie；可以修改为1关闭flash cookie
            //   var _iwt_UA = "UA-letv-000002"; //客户项目编号,根据实际生成
            //   (function (D) {
            //   var h = D.getElementsByTagName('head')[0],
            //   s = D.createElement('script');
            //   s.type = 'text/javascript';
            //   s.charset = 'utf-8';
            //   s.src =_hrefPath+'/htmlResource/js/iwt.js';
            //   h.firstChild ? h.insertBefore(s, h.firstChild) : h.appendChild(s);
            //   })(document);
            // </script>
        <!-- 艾瑞统计 end-->

        <!-- pv统计 start-->
        <script type="text/javascript">
            var __INFO__ = {};

            var _siteid = '1';
            var _chlid = '16';
            var _clickTracker = false;
            (function (D) {
                window.Stat = {P1: 4, P2: 41};
                var h = D.getElementsByTagName('head')[0],
                        s = D.createElement('script');
                s.type = 'text/javascript';
                s.charset = 'utf-8';
                s.src = 'http://js.letvcdn.com/js/201409/16/leStats.js';
                h.firstChild ? h.insertBefore(s, h.firstChild) : h.appendChild(s);
            })(document);

            $(function () {
                var pvstatsTime = null;

                if (pvstatsTime) {
                    pvstatsTime = null;
                } else {
                    pvstatsTime = setTimeout(hidePVStatsDiv, 1000);
                }

                function hidePVStatsDiv() {
                    if ($("#rookieswf") && $("#rookieswf").length > 0) {
                        $("#rookieswf").parent().hide();
                    } else {
                        pvstatsTime = setTimeout(hidePVStatsDiv, 1000);
                    }
                }
            });
        </script>
        <!-- pv统计 end-->

        <!-- 晶赞统计代码  begin  -->
        <script type='text/javascript'>
            var _sparam = ['_setParams'].concat(myTongJi.zp_params);
            var _zpq = _zpq || [];
            _zpq.push(['_setPageID', myTongJi.zp_pageId]);
            _zpq.push(['_setPageType', myTongJi.zp_pageType]);
            _zpq.push(_sparam);
            _zpq.push(['_setAccount', '104']);
            (function () {
                if (myTongJi.zp_need && (myTongJi.zp_need == "1")) {
                    var zp = document.createElement('script');
                    zp.type = 'text/javascript';
                    zp.async = true;
                    zp.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.zampda.net/s.js';
                    var s = document.getElementsByTagName('script')[0];
                    s.parentNode.insertBefore(zp, s);
                }
            })();
        </script>
        <!-- 晶赞统计代码  end  -->
    </div>
    <!-- 统计代码end-->
    <script type="text/javascript">
        window._bd_share_config = {
            "common": {
                "bdSnsKey": {},
                "bdText": "有了大屏@超级电视 Max70，还去什么电影院！双倍性能只要1/3价格，客厅一放立马高大上~#我爱超级电视#海量片源看不完，高清3D效果赞！什么都别说了，赶紧入手私家影院>>>",
                "bdDesc": "有了大屏@超级电视 Max70，还去什么电影院！双倍性能只要1/3价格，客厅一放立马高大上~#我爱超级电视#海量片源看不完，高清3D效果赞！什么都别说了，赶紧入手私家影院>>>",
                "bdUrl": "http://shop.letv.com/product/max70/store.html?cps_id=u_p_max70",
                "bdPic": "http://img2.hdletv.com/file/20141103/default/51391080306264089",
                "bdMini": "2",
                "bdMiniList": false,
                "bdStyle": "0",
                "bdSize": "32"
            },
            "share": {}
        };
        with (document)0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-new Date() / 36e5)];
    </script>

    <script type="text/javascript">
        //右侧飘窗显示隐藏方法
        $.fn.extend({
            showOrHide: function () {
                var _this = this;
                this.each(function (index, elem) {
                    var $handle = $(elem);
                    var name = $handle.attr("object");
                    var $content = $(name);
                    var timer = null;
                    $handle.mouseover(function () {
                        show();
                    }).mouseout(function () {
                        hide();
                    });
                    $content.mouseover(function () {
                        show();
                    }).mouseout(function () {
                        hide2();
                    });
                    function show() {
                        clearTimeout(timer);
                        $content.show();
                    }

                    function hide() {
                        var interval = 300;
                        timer = setTimeout(function () {
                            $content.hide();
                        }, interval);
                    }

                    function hide2() {
                        $content.hide();
                    }
                });
            }
        });

        var is_hidden = "1";//返回顶部
        var is_share_show = "1";//是否分享

        $(function () {
            //右侧飘窗显示隐藏
            $(".handle").showOrHide();
            //返回顶部
            if (is_hidden == "1") {
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
        function initBackTop() {
            window.onscroll = function () {
                if (document.body.scrollTop == 0 ? document.documentElement.scrollTop : document.body.scrollTop > 50) {
                    $("#backTop").show();
                } else {
                    $("#backTop").hide();
                }
            }

            $("#backTop").unbind("click").bind("click", function () {
                pageScroll();
            });
        }
        //鼠标滚动事件
        function pageScroll() {
            window.scrollBy(0, -50);
            scrolldelay = setTimeout('pageScroll()', 1);
            var sTop = document.documentElement.scrollTop + document.body.scrollTop;
            if (sTop == 0) {
                clearTimeout(scrolldelay);
            }
        }
    </script>
</body>
<!-- 底部系统引用 勿动 -->
<script type='text/javascript' src='/object/Public/Scripts/jquery.lazyload.js'></script>

<script type='text/javascript' src='/object/Public/Scripts/zxvideo.js'></script>

</html>
<!-- 系统引用 勿动 -->
<!-- 系统引用 勿动 -->
<script type="text/javascript" src="/object/Public/Scripts/tv.js"></script>
<script type='text/javascript'>
    $(function () {
        //渐隐渐现
        $("#S50qp_gs3").galleryFade({time: 3000, width: 0});
        //轮播
        $("#ui5,#ui6,#ui7,#store1,#store2,#store3,#store4,#store5").indexGallery();

        //飘窗
        $("#piao").smartFloat();
        //超级电视弹窗视频效果
        $(".txs").each(function () {
            $(this).zxVideo();
        });
    });
</script>

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