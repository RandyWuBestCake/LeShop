<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
  <!-- js引用文件添加 -->
  <!-- 页面底部统一引用jsInclude -->
  <!-- 引用静态页面标签 -->
   
<script>var _hrefPath = '',_imagePath = 'http://img0.hdletv.com',_basePath = 'http://web_dev_service_group:80/';</script>
        <!--[if lt IE 7]>
                <script type="text/javascript" src="/object2/Public/Scripts/unitpngfix.js"></script>
        <![endif]-->
    <link  type='text/css' href='/object/Public/CSS/global.css' rel='stylesheet' />

            <script type='text/javascript' src='/object/Public/Scripts/generatesession.js'></script>

            

            <script type='text/javascript' src='/object/Public/Scripts/template.js'></script>

            <link  type='text/css' href='/object/Public/CSS/sppj.css' rel='stylesheet' />

            <link  type='text/css' href='/object/Public/CSS/products.css' rel='stylesheet' />
            <!-- // <script type='text/javascript' src='/object/Public/Scripts/zxlib.js'></script> -->
            
            <link  type='text/css' href='/object/Public/CSS/jquery.jqzoom.css' rel='stylesheet' />
            <link rel="stylesheet" href="/object/Public/css/base.css" />
            <script type="text/javascript" src='/object/Public/js/zoom/base.js'></script>
            <script type="text/javascript" src='/object/Public/js/zoom/jquery-1.4.2.min.js'></script>
            <script type="text/javascript" src='/object/Public/js/zoom/jquery.jqzoom.js'></script>
        <link rel="icon" href="http://www.letv.com/favicon.ico" type="image/x-icon"/> 
        <link rel="shortcut icon"  href="http://www.letv.com/favicon.ico" type="image/x-icon"/>   

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
   
<div class="main_body">

<input type="hidden" id="productid" value="408200000978"/>
<input type="hidden" name="bmprolist" pid="408200000978" num="1"/>
<div class="pro_top center font14 clearfix ">
   <div class="left"><a href="/object"><span class="font16 dark">首页</span></a>
  > <span class="dark"><a href="/product/parts.html">配件专区</a></span> > <span class="dark" value="<?php echo ($res["id"]); ?>"><?php echo ($res["name"]); ?></span>  
  </div>
  <div class="pro_info clear TV center" style="width:600px;float:left;">
  <div class="pro_pic left" style="float:left;">
     <div class="right-extra" style="margin:0px;width:600px;">
      <!--产品参数开始-->
      <div style="width:550px;">
        <div id="preview" class="spec-preview" style="width:100%;height:450px;overflow:hidden;"> <span class="jqzoom"><img jqimg="/object<?php echo ($image['0']['img']); ?>" src="/object<?php echo ($image['0']['img']); ?>" width="100%"/></span> </div>
        <!--缩图开始-->
        <div class="spec-scroll" style="width:550px;"> <a class="prev">&lt;</a> <a class="next">&gt;</a>
          <div class="items" style="aline:center">
            <ul>
             <?php if(is_array($image)): foreach($image as $key=>$vo): ?><li><img alt="" bimg="/object<?php echo ($vo['img']); ?>" src="/object<?php echo ($vo['img']); ?>" onmousemove="preview(this);"></li><?php endforeach; endif; ?>
            </ul>
          </div>
        </div>
        <!--缩图结束-->
      </div>
    </div>
     <div id="foot" class="right next"></div>
    </div>
  
    <div style="line-height:24px;float:left;" class="clear t_c pt10 pl100">
       <a class="block left pl20 pr20 border  hidden" target="_blank" href="/biyibi/index.html">电视对比</a>
        <div class="left pro_share pl20">
           <div class="left">分享到：</div>
           <div data="{'url':'http://shop.letv.com/','pic':'http://img3.hdletv.com/parts/20141105/51589385737180234_XL','desc':'乐视Letv 云底座LeTV Yun60A','text':'乐视Letv 云底座LeTV Yun60A'}" class="bdshare_t bds_tools get-codes-bdshare" id="bdshare">
        <a class="bds_qzone" title="分享到QQ空间" href="#"></a>
        <a class="bds_tsina" title="分享到新浪微博" href="#"></a>
        <a class="bds_tqq" title="分享到腾讯微博" href="#"></a>
        <a class="bds_tsohu" title="分享到搜狐微博" href="#"></a>
        <a class="bds_renren" title="分享到人人网" href="#"></a>
        <a class="bds_douban" title="分享到豆瓣网" href="#"></a>          
      </div>
      </div>
    </div>
   </div>
<div class="right pro_text" style="margin-top:250px;width:600px;line-height:30px;float:right;margin-right;30px;margin-top:0px;">
    <div class="line_b pb15 title">
      <div class="font20 black"><?php echo ($res["name"]); ?></div>
      <div></div>
     <!-- <dd>商品编号：408200000978</dd>-->
    </div>  
    <div class="line_b pb10 font14">
  
    <dl>
      <dt>售价：</dt>
      <dd><span class="font14 red">￥</span>
      <span class="font18 red"><?php echo ($res["price"]); ?></span>
      </dd>
    </dl>
       
        <dl class="">
      <dt><span class="font14">商品简介：</span></dt>
      <dd><span class="gray_2">
      <p>
  <?php echo ($res["headline"]); ?></p>
      </span></dd>
    </dl>
    
      <dl>
        <dt><span class="font14">适用机型：</span></dt>
        <dd>
          <a style="cursor:default"><?php echo ($res["fit"]); ?></a>
        </dd>
      </dl>
        <dl>
            <dt>配送：</dt>
            <dd>
                <select onchange="checkStock()" id="provinceid" size="1" name="addr">
                            <!-- <option value="0">请选择</option> -->
                            <?php if(is_array($province)): foreach($province as $k=>$vo): ?><option value="<?php echo ($k); ?>"><?php echo ($vo); ?></option><?php endforeach; endif; ?>
                </select>
               <span id="stockdesc" ></span>
            </dd>
        </dl>
    <dl>
         <div class="left pr20" >
  商品评价：<em class="star firststar" grade="<?php echo ($res["grade"]); ?>">
      <i class="" ></i><i class=""></i><i class=""></i><i class=""></i><i class=""></i>
    </em>
  <span><a href="javascript:void(0)" onclick="return false;" id="gopj">已有
  <?php if($num['p_num'] != 0 ): echo ($num['p_num']); else: ?>0<?php endif; ?>
  人评价 ></a></span>                                
         </div>
          <a target="_blank" class="block left bt_oline_service" href="/onlineservice.html"  webtrekkparam="{ct:'CJDS_zxzx'}"><span class="font12">在线咨询</span> </a>
         <div class="clear"></div>
    </dl>
     </div>
    <dl>
      <dt class=" font14">选择数量：</dt>
      <dd class="buy">
      <span class="dolower" style="display:block;float:left;text-align:center;height:20px;line-height:20px;margin:0 6px;width:20px;;border:1px solid #dfdfdf;cursor:pointer;">-</span>
      <input type="text" class="c_num" size="4" value="1" min="1" max="1" style="float:left;text-align:center;">
      <span class="dohigher" style="display:block;float:left;text-align:center;height:20px;line-height:20px;margin:0 6px;width:20px;;border:1px solid #dfdfdf;cursor:pointer;">+</span>
         <!-- <span class="red pl10">限购1台</span> -->
        </dd>
    </dl>
    <div style="display:none;width:1474px;height:7657px;*background: #000000;" class="wjPop" id="shadeLayer"></div>
  <div class="wjPop" id="wjPop-body" style="display:none;left: 435px; position: fixed; top: 191px; opacity: 1;"><div style="width: 402px; height: 150px; overflow: hidden; background: none repeat scroll 0% 0% rgb(255, 255, 255); "><div style="height:40px; width:100%;"><a class=" hand pt10 pr10 right" id="wjPop-close"><img src="/object/public/images/wrong.jpg" style="width:30px;height:30px;"></a></div><div style="height:40px; line-height:40px;" class="dark font18 t_c"><img src="/object/public/images/right.png" style="margin: 5px auto -5px;width:45px;height:45px;"> 添加成功</div><div class="mt20 t_c"><a href="<?php echo U('Cart/index');?>" target="_blank" class="inline_block red_bt_m mr40"><span class="dark">去购物车结算</span></a><a id="wjPop-close"  class="inline_block gray_bt_m" href="<?php echo U('Fit/FitList');?>"><span class="dark">继续购物</span></a></div></div></div>
    <div class="clear"></div>
  <div class="pt10 pb10 hidden">
    <input type="checkbox" checked="checked" id="agreeCheckBox"/> 我已阅读并同意<a id="agreePop"><span class="skyblue">乐视TV·超级电视预购协议</span></a>
  </div>
  <div >
   <div class="pt20">
   <a href='javascript:void(0)' class='red_bt_m block addToCart addToCart_TV' parabola='true' levelid='1' ctags='0|1'><span class='white'>加入购物车</span></a>
   </div>
   <div class="pt20 stopbuy" style="display:none;background:none repeat scroll 0 0 #f8f8f8;border:1px solid #dfdfdf;border-radius:3px;color:#333333;font-size:14px;height:28px;line-height:28px;text-align:center;width:108px;padding:0px;"><span>暂停预定</span></div>
   <a class="pl10 inline_block pt25  hidden" href="/zt/cp2c_2.html" target="_blank"><span class="blue">定制我自己的电视></span></a>
  <!-- <div style="text-align:left;" class="loading_img"><img src="/object/Public/Picture/loading.gif"></div> -->
    

   <div class="clear"></div>

                

    <style type="text/css">
      .fcolor{color:#D80C18;}
    </style>
    <!-- 购物数量控制及进入购物车页面控制 -->
    <script type="text/javascript">

      //获取star的值
        var f_grade = $('.firststar').attr('grade');
        // 循环加星
        for(var g=0;g<f_grade;g++){
          $('.firststar').find('i').eq(g).attr('class','on');
        }

      // 商品的id
      var goods_id = $('.pro_top').find('span').eq(2).attr('value');
      //页面加载完毕时候判定,是否开启预定功能
      $(document).ready(function(){
          var num = $('.c_num').attr('value');
          $.get("<?php echo U('Fit/dmaxNum');?>",{num:num,goods_id:goods_id},function(msg){
            if(num>msg){
              $('.addToCart').css('display','none');
              $('.stopbuy').show(100);
              $('.stopbuy').mousemove(function(){
               $(this).css({'background-color':'#333333','color':'white'});
              }) 
              $('.stopbuy').mouseout(function(){
                $(this).css({'background-color':'#f8f8f8','color':'#333333'});
              })
            }
          })
      })
      $('.buy span').mousemove(function(){
          $(this).addClass('fcolor');
      })
      $('.buy span').mouseout(function(){
          $(this).removeClass('fcolor');
      })
      
      
      $('.dolower').click(function(){
         var num = $('.c_num').attr('value');
          var fnum = num-1;
          if(fnum<1){
            alert('已少于商品最少购买数量');
          }else{
            $('.c_num').attr('value',fnum);
          } 
      })
      $('.dohigher').click(function(){
          var num = $('.c_num').attr('value');
          $.get("<?php echo U('Fit/maxNum');?>",{num:num,goods_id:goods_id},function(msg){
            if(num>=msg['num']){
              alert('已达到商品最大购买数量');
              $('.c_num').attr('value',msg['num']);
            }else{
              $('.c_num').attr('value',msg['num']);
            }
          })
      })
     // $('.dohigher').keyup(function(){
        
     //  }) 
      $('.c_num').focusout(function(){
        var num = $('.c_num').attr('value');
        if(num<1){
          alert('请填写正确的数量！');
        }else{
          $.get("<?php echo U('Fit/dmaxNum');?>",{num:num,goods_id:goods_id},function(msg){
            if(num>msg){
              alert("超过目前最大购买数量,最大购买数量是"+msg);
              $('.c_num').attr('value',msg);
            }else{
              $('.c_num').attr('value',num);
            }
          })
        }
      })
      //添加到购物车的商品数量
        var goods_id = $('.pro_top').find('span').eq(2).attr('value');//上面已经有,可删除

        var cart_amount = $('.c_num').attr('value');
      $('.addToCart').click(function(){
        $('#wjPop-body').fadeIn(1000,'linear');
        $('#shadeLayer').fadeIn(500,'linear');
        $('#productNumInCart').show(100);
        var productNum = $('#productNumInCart').html();
        //******************此处ajax到后台做个判断看购物车中是否已经存在该物品****************
        $.get("<?php echo U('Cart/addCart');?>",{goods_id:goods_id,cart_amount:cart_amount},function(msg){
          if(msg =='1'){
            var new_productNum = productNum;
          }else{
            var new_productNum = productNum*1+1;
          }
          $('#productNumInCart').html(new_productNum);
        })
        // var new_productNum = productNum*1+1;
        
      })
      $('#wjPop-close').click(function(){
        $('#wjPop-body').hide(300,'linear');
        $('#shadeLayer').hide(500,'linear');
      })
       

        // ****************************此处写href后面的路径****************************

    </script>
  

</div>
<div class="clear"></div>
         </div>
<!-- 推荐配件开始 -->
<!-- 推荐配件结束 -->

<div class="neirong clear  pt10">
    <div class=" line_b clear tab_title" id="piao">
      <div  class="center">
      <ul class="left">
      <li class="cur" onclick="return false;" cid="jieshao"><span class="font16 ">商品介绍</span></li>
      <li onclick="return false;" cid="canshu"><span class="font16 ">参数规格</span></li>
    <li onclick="return false;" cid="pingjia"><span class="font16 ">评价晒单</span></li>
      <li onclick="return false;" cid="shouhou"><span class="font16 ">售后服务</span></li>
      <!-- <li onclick="return false;" cid="pangzhu"><span class="font16 ">帮助中心</span></li> -->
        
      </ul>
      <!-- <div class="quickBuyNameZH hidden right pt10" style="width:100px;"><a href='javascript:void(0)' class='red_bt_s block addToCart addToCart_TV' onclick='return false;' parabola='true' levelid='1' ctags='0|1' onclick='return false;'><span class='white'>加入购物车</span></a></div> -->
  
  </div>
</div>
<div class="tab_content center " id="jieshao">
    <?php echo ($res["desc"]); ?>
</div>
<div class="tab_content pb50 product_tab center hidden" id="canshu">
    <?php echo ($res["param"]); ?>
</div>
<div class="tab_content pb50 center hidden" id="shouhou">
    <div class="">
<br><br>
 

<div class="t_c font24">乐视超级电视售后服务政策</div>
<div class="font14" style="line-height:25px;">
一、  三包政策<br><br>
1、退换机政策<br><br>
  <table border="1px" cellspacing="0" cellpadding="0" style="width:100%;">
  <tr>
    <td width="135"><p align="center"><strong>产品 </strong></p></td>
    <td width="106"><p align="center"><strong>服务内容 </strong></p></td>
    <td width="113"><p align="center"><strong>期限 </strong></p></td>
    <td width="135"><p align="center"><strong>服务类型 </strong></p></td>
    <td width="198"><p align="center"><strong>备注 </strong></p></td>
  </tr>
  <tr>
    <td width="135" rowspan="2"><p align="center">乐视超级电视系列 </p></td>
    <td width="106"><p align="center">退机/换机/维修 </p></td>
    <td width="113"><p align="center">7天 </p></td>
    <td width="135"><p align="center">上门服务 </p></td>
    <td width="198"><p align="center">以实际收货日期为准 </p></td>
  </tr>
  <tr>
    <td width="106"><p align="center">换机/维修 </p></td>
    <td width="113"><p align="center">30天 </p></td>
    <td width="135"><p align="center">上门服务 </p></td>
    <td width="198"><p align="center">以实际收货日期为准 </p></td>
  </tr>
</table><br>
退换货原因：<br>
A：商品安装前，顾客与配送人员共同开箱验机发现外观不良、原装配件缺失、发票型号与实物不符，安装前售后安装人员试机发现性能故障。<br>
B：商品安装后，顾客使用过程中发现性能故障，经售后鉴定人员鉴定，并经工作人员确认鉴定结果，出具相应的鉴定报告。<br> 
以下情况不予退换货：<br> 
A：商品安装前顾客需与配送人员当场开箱验机，开箱后如产品无质量问题，不予退换货。<br>
B：未经授权的修理、误用、疏忽、滥用、事故、改动、不正确的安装，或因个人使用不当造成的商品损坏的。<br>
C：假性故障或因顾客家中环境影响使用效果，经鉴定无故障的，不予退换货。<br><br>
2、保修政策<br><br>
<table border="1" cellspacing="0" cellpadding="0" style="width:100%;" >
  <tr>
    <td width="54"><p align="center"><strong>产品 </strong></p></td>
    <td width="67"><p align="center"><strong>保修范围 </strong></p></td>
    <td width="220"><p align="center"><strong>部件名称 </strong></p></td>
    <td width="71"><p align="center"><strong>保修期(月） </strong></p></td>
    <td width="71"><p align="center"><strong>服务类型 </strong></p></td>
    <td width="220"><p align="center"><strong>备注 </strong></p></td>
  </tr>
  <tr>
    <td width="54" rowspan="4"><p align="center">乐视超级电视系列 </p></td>
    <td width="67"><p align="center">整机 </p></td>
    <td width="220"><p align="center">主板、电源板、智能板、除主要部件外的其它机内电性能部件、遥控器等 </p></td>
    <td width="71"><p align="center">12</p></td>
    <td width="71"><p align="center">上门服务 </p></td>
    <td width="220"><p align="center">　 </p></td>
  </tr>
  <tr>
    <td width="67"><p align="center">主要部件 </p></td>
    <td width="220"><p align="center">显示屏、背光组件、逻辑组件、高频调谐器 </p></td>
    <td width="71"><p align="center">36</p></td>
    <td width="71"><p align="center">上门服务 </p></td>
    <td width="220"><p align="center">高频调谐器发生故障的免费更换主板 </p></td>
  </tr>
  <tr>
    <td width="67"><p align="center">软件 </p></td>
    <td width="220"><p align="center">UI操作系统 </p></td>
    <td width="71"><p align="center">12</p></td>
    <td width="71"><p align="center">上门服务 </p></td>
    <td width="220"><p align="left">1、仅针对因UI操作系统原因导致的电视性能故障（如开机定屏、无法进入系统等） <br>
      2、仅指将电视操作系统恢复到出厂状态 </p></td>
  </tr>
  <tr>
    <td width="67"><p align="center">其他材料　 </p></td>
    <td width="220"><p align="center">随机资料(如说明书、随机光盘等)、包装 </p></td>
    <td width="71"><p align="center">0</p></td>
    <td width="71"><p align="center">无　 </p></td>
    <td width="220"><p align="center">　 </p></td>
  </tr>
</table><br>
备注：以下情况不属于免费维修的范围<br>
     A：消费者因使用、维护或保管不当造成损坏的；<br>
     B：非乐视电视特约服务商安装或拆动原因造成损坏的；<br>
     C：三包凭证及有效发票超过包修期的；<br>
     D：三包凭证型号与维修产品型号不符或者涂改的；<br>
     E：因病毒感染、黑客袭击或其他恶意侵害行为造成的故障或损坏；<br>
     F：因消费者自行安装或下载非乐视指定软件导致的故障或损坏；<br>
     G：因自然灾害等不可抗拒因素造成损坏的；<br><br>
二、服务政策<br><br>
<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
  <tr>
    <td width="107"><p align="center"><strong>产品 </strong></p></td>
    <td width="78"><p align="center"><strong>服务内容 </strong></p></td>
    <td width="85"><p align="center"><strong>服务类型 </strong></p></td>
    <td width="340"><p align="center"><strong>备注 </strong></p></td>
  </tr>
  <tr>
    <td width="107" rowspan="3"><p align="center">乐视超级电视系列 </p></td>
    <td width="78"><p align="center">座架安装 </p></td>
    <td width="85"><p align="center">上门服务 </p></td>
    <td width="340"><p align="center">首次安装免费 </p></td>
  </tr>
  <tr>
    <td width="78"><p align="center">挂架安装 </p></td>
    <td width="85"><p align="center">上门服务 </p></td>
    <td width="340"><p align="center">首次安装免费 </p></td>
  </tr>
  <tr>
    <td width="78"><p align="center">功能调试 </p></td>
    <td width="85"><p align="center">上门服务 </p></td>
    <td width="340"><p>收货之日起三个月内免费调试1次，用户再次要求上门调试的需收取上门调试费。 </p></td>
  </tr>
</table><br>
备注：用户从非乐视渠道购买的挂架不提供上门安装服务；特殊墙体（瓷砖、大理石、玻璃等）收费100元/次，并签署免责协议。<br>
</div>
    </div>
</div>

<div class="tab_content pb20 center hidden" id="pangzhu">
    <link rel="stylesheet" href="../CSS/help.css" type="text/css">


     <!--右侧栏区part -->
    <!--右侧栏区part -->
   <div class="main content pt10 pb10">
    <div class="tab01 font14">
      <a class="yjfk " href="/help/kffeedback.html" target="_blank">意见反馈>></a>
    <ul class="tabs">
      <li><span class=" hand" >自助服务</span></li>
     
    </ul>
    </div>
    <div class="zysever bd ">
    <div class="">
    <ul>
    <li><a target="_blank" href="/help/fwwd.html"  webtrekkparam="{ct:'HELP_zzfw1'}"><i class="icon-1"></i><br/>线下服务中心</a></li>
  <li><a target="_blank" href="javascript:void(0)" url="/user/center/refundOrderList.html" onclick="return false;" webtrekkparam="{ct:'HELP_zzfw2'}" class="zzfw"><i class="icon-2"></i><br/>退换货查询 </a></li>
    <li><a target="_blank" href="javascript:void(0)"  webtrekkparam="{ct:'HELP_zzfw3'}" onclick="return false;" class="zzfw" url="/user/center/fixAndMaintain.html"><i class="icon-3"></i><br/>预约安装/报修  </a></li>
    <li class=""><a target="_blank" href="javascript:void(0)"  webtrekkparam="{ct:'HELP_zzfw4'}" onclick="return false;" class="zzfw" url="/user/center/address.html"><i class="icon-4"></i><br/>修改收货人信息  </a></li>
    <li class=""><a target="_blank" href="javascript:void(0)"  webtrekkparam="{ct:'HELP_zzfw5'}" onclick="return false;" class="zzfw" url="/user/center/orderList.html"><i class="icon-5"></i><br/>取消订单  </a></li>
    <li class="last"><a target="_blank" href="/help/wlps/ddps.html"  webtrekkparam="{ct:'HELP_zzfw6'}"><i class="icon-6"></i><br/>物流查询  </a></li>
      <li class="borderno"><a target="_blank" href="/help/psfwcx.html" webtrekkparam="{ct:'HELP_zzfw7'}"><img  alt=""  src="Picture/f352a7188bd643a0a27b611930bb9dd2.gif" style="margin-bottom:5px;"/><br/>超级电视配送范围查询  </a></li>
    <li class="borderno"><a target="_blank" href="http://sso.letv.com/user/backpwd"  webtrekkparam="{ct:'HELP_zzfw8'}"><i class="icon-7"></i><br/>找回注册密码  </a></li>
    <li class="borderno "><a target="_blank" href="/LetvStore.html"  webtrekkparam="{ct:'HELP_zzfw9'}"><i class="icon-8" ></i><br/>资源下载  </a></li>
        </ul>    
    </div>
    </div>
     
        <div class="tab01 font14 mt10">
   
    <ul class="tabs">
     
      <li><span class=" hand" >联系客服</span></li>
  
    </ul>
    </div>
    <div class="lxkf  bd " id="c02">
    <div class="pl10 pr10 pt50 pb50">
      <ul style='overflow:hidden;zoom:1;'>
        <li style="border-right:1px solid #e1e1e1;"><a class="block icon-1" href="/onlineservice.html" target="_blank"></a><br/>在线客服通过在线解答的方式为您提供咨询服务<br/>工作时间：<span class="red">8:00-20:00(周一至周日)</span></li>
    <li><i class="icon-2"></i><br/>电话客服：仅收取市话费<br/>工作时间：<span class="red">7x24小时</span></li>
        </ul>    
    </div>
    </div>
         <div class="tab01 font14 mt10">
     
    <ul class="tabs">
     
  <li><span class=" hand" >帮助分类</span></li>
  
    </ul>
    </div>
    <div class="zysever  bd" id="c03">
    <div class="pt30 pb30 pl30 pr30 ">
    <dl><dt>· 新手入门</dt>
    <dd>
        <a target="_blank" href="/help/xsrm/zczh.html">注册与登录</a><span>|</span>
        <a target="_blank" href="/help/zczh/dlzh.html">账户安全</a><span>|</span>
        <a target="_blank" href="/help/xsrm/zhmm.html">如何找回密码</a><span>|</span>
        <a target="_blank" href="/help/gwlc.html">购物指南</a><span>|</span>
        <a target="_blank" href="/help/lema_faq.html">乐码FAQ</a></dd>
      </dl><dl>
     <dt>· 订单服务</dt>
    <dd> 
        <a target="_blank" href="/help/zxzf.html">网上支付</a><span>|</span>
        <a target="_blank" href="/help/ddfw/tksm.html">退款说明</a><span>|</span>
        <a target="_blank" href="/help/fpzd.html">发票制度</a>
    </dd></dl><dl>
      <dt>· 物流服务</dt> 
      <dd> 
          <a target="_blank" href="/help/wlps/cjdsps.html">配送范围查询</a><span>|</span>
        <!--<a target="_blank" href="/help/psfwcx.html">超级电视配送范围查询</a><span>|</span>-->
          <a target="_blank" href="/help/wlps/ddps.html">配送费收取标准</a><span>|</span>
              <a target="_blank" href="/help/yhqs.html">自提与签收注意事项</a><span>|</span>
          <a target="_blank" href="/help/pswt/cjds.html">配送常见问题</a>
          
      </dd></dl><dl>
       <dt>· 售后服务</dt>
       <dd> 
            <!--<a target="_blank" href="/help/gwts.html">购物提示</a><span>|</span>-->
           <a target="_blank" href="/help/fwzc/gyaz.html" webtrekkparam="{ct:'Help_fwzc_tab1'}">关于安装<span>|</span></a>
               <!--<a target="_blank" href="/help/fwzc/gjsb.html" webtrekkparam="{ct:'Help_fwzc_tab2'}">国家三包政策</a>-->
               <a target="_blank" href="/help/bxzc/cjds.html" webtrekkparam="{ct:'Help_fwzc_tab3'}">售后服务政策<span>|</span></a>
  <!--<a target="_blank" href="/help/bxzc/lshz.html" webtrekkparam="{ct:'Help_fwzc_tab4'}">配件、盒子三包政策</a>-->
  <!--<a target="_blank" href="/help/thhzc/cjds.html" webtrekkparam="{ct:'Help_fwzc_tab5'}">超级电视售后说明</a>-->
  <!--<a target="_blank" href="/help/thhzc/lshz.html" webtrekkparam="{ct:'Help_fwzc_tab6'}">配件、盒子售后说明</a>-->
  <a target="_blank" href="/help/fwwd.html" webtrekkparam="{ct:'Help_fwzc_tab7'}">线下服务中心<span>|</span></a>
  <a target="_blank" href="/help/fwzc/fwgs.html" webtrekkparam="{ct:'Help_fwzc_tab8'}">售后服务公示<span>|</span></a>
  <a target="_blank" href="/help/xxtyt.html" webtrekkparam="{ct:'Help_fwzc_tab9'}">线下体验厅<span>|</span></a>
  <a target="_blank" href="/help/xufei.html" webtrekkparam="{ct:'Help_fwzc_tab10'}">TV版服务续费教程</a>
       </dd></dl><dl>
        <dt>· 下载中心</dt>
         <dd> 
             <a target="_blank" href="http://ui.letv.com/website/downloads/">超级电视固件下载</a>
             <!--<a target="_blank" href="/help/gjxz.html">乐视盒子固件下载</a>-->
         </dd></dl><dl>
         <dt>· 产品FAQ</dt>
        <dd>
            <a target="_blank" href="/help/cpfaq.html">乐视网TV版</a><span>|</span>
            <a target="_blank" href="/help/cpsz/c1s.html">乐视盒子</a><span>|</span>
            <a target="_blank" href="/help/cpsz/X60.html">超级电视</a><span>|</span>
            <a target="_blank" href="/help/lmxt.html">乐迷学堂</a>
        </dd></dl>
      <div class='clear'></div>       
    </div>
    </div>
        <div class="tab01 font14 mt10">
     
    <ul class="tabs">

  <li><span class=" hand" >乐迷学堂</span></li> 
    </ul>
    </div>
    <div class="news list border bd" >
        <div  class="pt30 pb30 pl30 pr30 ">
          <ul style="line-height:30px;">
        <li><a target="_blank" href="http://bbs.letv.com/thread-130599-1.html">熟练使用互联网电视 高清、3D大片任你看<i class="hot"></i></a></li>
    <li><a target="_blank" href="http://bbs.letv.com/thread-130599-1.html">如何使用乐视盒子观看本地视频<i class="new"></i></a></li>
    <li><a target="_blank" href=" http://bbs.letv.com/thread-118902-1.html">手把手教你用盒子链接WIFI</a></li>
    <li><a target="_blank" href="http://bbs.letv.com/thread-136092-1.html">使用截图工具进行抓取 反馈、评测轻松写</a></li>
    <li><a target="_blank" href="http://bbs.letv.com/thread-139089-1.html">乐视盒子也能玩win8？是的，你没看错！！！</a></li>
    <li><a target="_blank" href="http://bbs.letv.com/thread-137982-1.html">发帖编辑器使用教学 让你的帖子更具有吸引力</a></li>
    <li><a target="_blank" href="http://bbs.letv.com/thread-136593-1.html">掌握ADB简单命令 让你使用盒子更方便</a></li>
            </ul>
          <div class="more" style='font-size:14px;'><a target="_blank" href="http://bbs.letv.com/forum-184-1.html"> 去【乐迷学堂】知识库了解更多>></a></div>      
        </div>
        </div>

  <div class="wentilist inforlist mt10">
      <div style="border-bottom:1px solid #d5d5d5;margin:0 10px;border-radius: 0px;" class="hd pr20"><a href="#" class="right pr20 pt5 hidden">更多>></a><span class="font18">常见问题</span></div>
      <div class="pt20 pl50 pr50 pb20" style='zoom:1;'>
    <ul>
    <li><a target="_blank" href="/help/xsrm/zhmm.html">如何找回密码?  </a></li>
    <li><a target="_blank" href="/help/ddfw/tksm.html">退款说明 </a></li>
    <li><a target="_blank" href="/help/fpzd.html">开增值税发票需提供什么资料？ </a></li>
    <li><a target="_blank" href="/help/fpzd.html">换开发票</a></li>
    <li><a target="_blank" href="/help/psfwcx.html">超级电视配送范围查询</a></li>
    <li><a target="_blank" href="/help/wlps/cjdsps.html">超级电视安装说明 </a></li>
    <li><a target="_blank" href="/help/pswt/cjds.html">购买超级电视后何时可以配送？ </a></li>
    <li><a target="_blank" href="/help/bxzc/cjds.html">退换机政策</a></li>
    <li><a target="_blank" href="/help/bxzc/cjds.html">保修政策 </a></li>
    <li><a target="_blank" href="/help/bxzc/cjds.html">安装政策</a></li>
    <li><a target="_blank" href="/help/xxtyt.html">线下体验厅</a></li>
    <li><a target="_blank" href="/help/fwwd.html">线下服务中心</a></li>
      </ul>  
      <div class="clear"></div>
    </div>
    </div>
</div>
</div>
<!-- 评价部分 -->
<div class="tab_content ape_pj" id="pingjia" >
  <div class="center ">
  <div class="dcomment">
      <div class="comments_list pt20">
          <div class="mb20 pt20 clearfix">
              <div class="left comments_rate">
                  <div class="comments_rate_tb">
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                              <td width="37%" rowspan="3" align="center" valign="middle">
                                <span class="Arial red inline_block clearfix"><em class="font48 left"><?php if($num['p_num'] != 0 ): echo ($per['g_per']); else: ?>100<?php endif; ?> </em><em class="left font24">%</em></span><br />
                  <span class="font14 gray">好评度</span>
                              </td>
                              <td width="18%" align="center" valign="middle">
                                  <span class="font14 gray">好评</span>
                              </td>
                              <td width="45%" align="left" valign="middle">
                                  <div class="rate">
                                          <div class="rate_theme" style="width:<?php echo ($per['g_per']); ?>%;"></div>
                                  </div>
                              </td>
                          </tr>
                          <tr>
                              <td align="center" valign="middle">
                                  <span class="font14 gray">中评</span>
                              </td>
                              <td align="left" valign="middle">
                                  <div class="rate">
                                          <?php if($num['p_num'] != 0 ): ?><div class="rate_theme" style="width:<?php echo ($per['m_per']); ?>%;"></div><?php else: ?><div class="rate_theme" style="width:0%;"></div><?php endif; ?>
                                  </div>
                              </td>
                          </tr>
                          <tr>
                              <td align="center" valign="middle">
                                  <span class="font14 gray">差评</span>
                              </td>
                              <td align="left" valign="middle">
                                  <div class="rate">
                                          <?php if($num['p_num'] != 0 ): ?><div class="rate_theme" style="width:<?php echo ($per['l_per']); ?>%;"></div><?php else: ?><div class="rate_theme" style="width:0%;"></div><?php endif; ?>
                                  </div>
                              </td>
                          </tr>
                      </table>
                  </div>
              </div>
              <div class="left comments_subject">
                  <dl>
                      <dt><span class="font14 mb10">大家认为</span></dt>
                         
                        <dd class="mt5 clearfix">
                            <?php if(is_array($tags)): foreach($tags as $key=>$vo): ?><span><?php echo ($vo["tag"]); ?>(<em class="gray"><?php echo ($vo["tag_amount"]); ?></em>)</span><?php endforeach; endif; ?>
                        </dd>
                       
                  </dl>
              </div>
              <div class="left t_c comments_btn" id="op_button_a">
                  <a id="mypj" href=" javascript:void(0)" comid="<?php echo ($info[0]['goods_id']); ?>" onclick="return false"  class="red_bt_m block mb15" value="<?php echo U('Fit/addcomment',array('id'=>$res['id']));?>"><span class="white">我要评价</span></a>
                  <!-- <a id="mysd" href="javascript:void(0)"><span class="blue font14">发表晒单</span></a> -->
              </div>
          </div>
          <div class="content clear pt20">
              <div class="track_tit font16 clearfix" id="_tab_pj">
                  <a href="javascript:void(0);" class="cur" type="1">全部评价(<?php if($num['p_num'] != 0 ): echo ($num['p_num']); else: ?>0<?php endif; ?>)</a>
                  <a href="javascript:void(0);" type="2">好评(<?php if($num['p_num'] != 0 ): echo ($num['g_num']); else: ?>0<?php endif; ?>)</a>
                  <a href="javascript:void(0);" type="3">中评(<?php if($num['p_num'] != 0 ): echo ($num['m_num']); else: ?>0<?php endif; ?>)</a>
                  <a href="javascript:void(0);" type="4">差评(<?php if($num['p_num'] != 0 ): echo ($num['l_num']); else: ?>0<?php endif; ?>)</a>
                  <a href="javascript:void(0);" type="5">晒单(<?php if($num['s_num'] != 0 ): echo ($num['s_num']); else: ?>0<?php endif; ?>)</a>
              </div>
              <!--内容区 start-->
                <!-- <div id="initloading" class="line_t p50" style="display:none;text-align: center;"><img src="/object/Public/Picture/loading.gif"></div> -->
                <!--所有评价 内容 开始-->
                <div id="pj_content" class="line_t pl20 pr20 pb20" style="display:none;" class="info">
                    <div class="comments_item_bd pt40 pb40">
                        <div class="comments_content t_c font16">
                            暂无评价信息
                        </div>
                    </div>
                </div>
                <!--所有评价 内容 结束-->
                <!--晒单 内容 开始-->
                <div id="sd_content" class="line_t pl20 pr20 pb20" style="display:none;">
                    <div class="comments_item_bd pt40 pb40">
                        <div class="comments_content t_c font16">
                            暂无晒单信息
                        </div>
                    </div>  
                </div>
                <!--晒单 内容 结束-->
        <!--内容区 end-->
          </div>
      </div>
  </div>

  <div id="pj_content" class="line_t pl20 pr20 pb20" style="">

  <!-- ====================================================================================================== -->
  <span class="hidden" style="display:none">
  <li class="line_t comments_item clearfix cloneLi" style="display:none" >
            <!--新增用户ID 和 图片-->
            <div class="d_user" style="width:73px;height:100px;text-align:center;float:left;margin-top:30px;">
                                 <span class="user_pic"><img src="/object<?php echo ($vo["user_img"]); ?>" style="width:73px;height:73px;"></span>
                                 <span class="font14 gray" style="text-align:center"><?php echo ($vo["username"]); ?></span>
            </div>
            <div class="right comments_item_bd comment_right_sp" style="float:left;margin-left:18px;letter-spacing:0.1em">
              <div class="comments_content com_con" style="margin-top:20px;">
                <div class="clearfix" style="width:1050px;">
                  <em class="star left" ><i></i><i></i><i></i><i></i><i></i></em>                
                  <p class="right gray" style="float:right margin-right:30px;">
                    <a class="pr10 dark" commentid="40484" id="pj_detail" href="javascript:void(0)">发表于<span class="date" style="float:right;"><?php echo ($vo["ass_time"]); ?></span></a>
                  </p>
                </div>
                <p class="comments_con font14" style="margin-top:14px;">
                  <a commentid="40484" id="pj_detail" class="con" href="javascript:void(0)"> <?php echo ($vo["con"]); ?></a>
                </p>
                <div class="comments_pic pb10 clearfix">

                </div>
                  <div class="clearfix" style="margin-top:14px;text-align:center;">
                    <a commentid="40484" id="zan12" class="zan left" ok="" style="width:80px;height:25px;border:1px solid #DFDFDF;margin-left:10px;text-align;line-height:25px">赞(<span><?php echo ($vo["ok_amount"]); ?></span>)</a>
                    <a id="reply" class="reply left" href="javascript:void(0);" style="width:80px;height:25px;border:1px solid #DFDFDF;margin-left:10px;text-align;line-height:25px">回复(<span><?php echo ($vo["reply_amount"]); ?></span>)</a>
                    <div class="left ml10">
                        <div data="{'text':'不知道什么原因，官方买的配件既然不能用','desc':'不知道什么原因，官方买的配件既然不能用','url':'http://localhost/object/index.php/Home/Fit/detail/id/3.html?cpsid=u_p_PingL','pic':'http://img0.hdletv.com/parts/20141105/51590850876969696'}" class="bdshare_t bds_tools get-codes-bdshare" id="bdshare">
                        <a class="bds_qzone" title="分享到QQ空间" href="#"></a><a class="bds_tsina" title="分享到新浪微博" href="#"></a><a class="bds_tqq" title="分享到腾讯微博" href="#"></a><a class="bds_renren" title="分享到人人网" href="#"></a>
                      </div>
                      </div>
                  </div>
                  <div class="gf   f8_bg pl20 pr20 pt10 pb10 font14 mb10" style="width:1000px;margin-top:10px;">
                    <span class="red"></span><?php echo ($rvo["con"]); ?>
                  </div>
                  
              </div>
              <div class="reply_div" style="display:none;border:1px solid #DFDFDF;margin-bottom:15px;">
                <div class="f8_bg pt15 pl20 pr20 pb10">
                  <div class="comment_box_inner">
                    <textarea maxlength="50" value="" id="replyContent_1" class="text1"></textarea>
                  </div>
                  <div class="comment_box_tips" >
                    <input type="button" commentid="40484" reusername="1355xxx1230" reuserid="242097549" id="replyButton_1" class="white_bt_m mr15" value="发表回复" reid="">
                    您已输入<span class="red" >0</span>字，最多输入50字
                  </div>
                </div>
              </div>
            </div>
  </li>
        </span>
        <span style="display:none;">
          
                    <a commentid="41251" id="sd_detail" href="javascript:void(0)" class = "aimg"><img  style="width:120px;height:120px;" src="" alt=""></a>
                    <!-- <a commentid="41251" id="sd_detail" href="javascript:void(0)"><img style="" src="http://img2.hdletv.com//sd/20150202/59275238498848606" alt=""></a> -->
                
        </span>
        <span style="display:none;">
          <div class="comments_content reply_msg_div c_content" style="margin-bottom:0px;text-indent:15px;">
                    <p class="font14 gray hfz" style="margin-top:0px;"><?php echo ($rvo["con"]); ?></p>
                    <p class="gray hfs">
                      <span class="pr10 dark"><?php echo ($rvo["username"]); ?></span> 回复 
                      <span class="pr130"></span>  于
                      <span class="date"><?php echo ($rvo["ass_time"]); ?></span>
                    </p>
                  </div>
        </span>
<!-- ================================================================================================= -->
  <ul id="pj_content_ul_list">
  <?php if(is_array($info)): foreach($info as $key=>$vo): ?><!-- *************************************************************************************************--> 
  <li class="line_t comments_item clearfix" style="margin-bottom:13px;">
            <!--新增用户ID 和 图片-->
            <div class="d_user" style="width:73px;height:100px;text-align:center;float:left;margin-top:30px;">
                                 <span class="user_pic"><img src="/object<?php echo ($vo["user_img"]); ?>" style="width:73px;height:73px;"></span>
                                 <span class="font14 gray" style="text-align:center"><?php echo ($vo["username"]); ?></span>
            </div>
            <div class="right comments_item_bd comment_right_sp" style="float:left;margin-left:18px;letter-spacing:0.1em">
              <div class="comments_content" style="margin-top:20px;">
                <div class="clearfix" style="width:1050px;height:20px;line-height:20px;">
                  <em class="star left"><i class="on"></i><i class="on"></i><i class="on"></i><i class="on"></i><i class=""></i></em>                
                  <p class="right gray" style="float:right margin-right:30px;">
                    <a class="pr10 dark" commentid="40484" id="pj_detail" href="javascript:void(0)">发表于<span class="date" style="float:right;"><?php echo ($vo["ass_time"]); ?></span></a>
                  </p>
                </div>
                <p class="comments_con font14" style="margin-top:14px;">
                  <a commentid="40484" id="pj_detail" class="con" href="javascript:void(0)"> <?php echo ($vo["con"]); ?></a>
                </p>
                  <div class="clearfix" style="margin-top:14px;text-align:center;">
                    <a commentid="40484" id="zan12" class="zan left" ok="<?php echo ($vo["id"]); ?>" style="width:80px;height:25px;border:1px solid #DFDFDF;margin-left:10px;text-align;line-height:25px">赞(<span><?php echo ($vo["ok_amount"]); ?></span>)</a>
                    <a id="reply" class="reply left" href="javascript:void(0);" ok="<?php echo ($vo["id"]); ?>" style="width:80px;height:25px;border:1px solid #DFDFDF;margin-left:10px;text-align;line-height:25px">回复(<span><?php echo ($vo["reply_amount"]); ?></span>)</a>
                    <div class="left ml10">
                        <div data="{'text':'不知道什么原因，官方买的配件既然不能用','desc':'不知道什么原因，官方买的配件既然不能用','url':'http://localhost/object/index.php/Home/Fit/detail/id/3.html?cpsid=u_p_PingL','pic':'http://img0.hdletv.com/parts/20141105/51590850876969696'}" class="bdshare_t bds_tools get-codes-bdshare" id="bdshare">
                        <a class="bds_qzone" title="分享到QQ空间" href="#"></a><a class="bds_tsina" title="分享到新浪微博" href="#"></a><a class="bds_tqq" title="分享到腾讯微博" href="#"></a><a class="bds_renren" title="分享到人人网" href="#"></a>
                      </div>
                      </div>
                  </div>
                  <?php if(is_array($reply_info)): foreach($reply_info as $key=>$rvo): if($rvo["ass_id"] == $vo['id']): if($rvo["username"] == '官方回复：'): ?><div class="f8_bg pl20 pr20 pt10 pb10 font14 mb10" style="width:1000px;margin-top:10px;">
                    <span class="red"><?php echo ($rvo["username"]); ?></span><?php echo ($rvo["con"]); ?>
                  </div>
                  <?php else: ?> 
                  <div class="comments_content reply_msg_div c_content" style="margin-bottom:10px;text-indent:15px;"><p class="font14 gray" style="margin-top:10px;"><?php echo ($rvo["con"]); ?></p><p class="gray"><span class="pr10 dark"><?php echo ($rvo["username"]); ?></span> 回复 <span class="pr130"><?php echo ($vo["username"]); ?></span>  于<span class="date"><?php echo ($vo["ass_time"]); ?></span></p></div><?php endif; ?>
                  <?php else: endif; endforeach; endif; ?>
              </div>
              <div class="reply_div" style="display:none;border:1px solid #DFDFDF;margin-bottom:15px;">
                <div class="f8_bg pt15 pl20 pr20 pb10">
                  <div class="comment_box_inner">
                    <textarea maxlength="50" value="" id="replyContent_1" class="text1"></textarea>
                  </div>
                  <div class="comment_box_tips" >
                    <input type="button" commentid="40484" reusername="1355xxx1230" reuserid="242097549" id="replyButton_1" class="white_bt_m mr15" value="发表回复" reid="<?php echo ($vo["id"]); ?>">
                    您已输入<span class="red" >0</span>字，最多输入50字
                  </div>
                </div>
              </div>
            </div>
          </li>
  <!-- *************************************************************************************************--><?php endforeach; endif; ?>
        </ul>
        <div class="t_c pt20 pb20 pl90">
          <a id="view_more" href="javascript:void(0);"><span class="font16 gray">查看更多&gt;&gt;</span></a>
        </div>
  </div>
</div>
</div>
</div>
<script type="text/javascript" src="/object/Public/Scripts/pjsd.js"></script>
          <script type="text/javascript">
                $('#mypj').click(function(){
                  var v = $(this).attr('value');
                  $.get("<?php echo U('Fit/mypj');?>",{},function(msg){
                    if(msg=='0'){
                      location.href="<?php echo U('Login/index');?>";
                    }else{
                      location.href=v;
                    }
                  })
                })
                  /** 切换评价标签更新数据 */
                   $("#_tab_pj a").live("click",function(){
                    $(this).addClass("cur").siblings().removeClass();
                    //清空原来数据
                    $(this).parents('.dcomment').next().find('ul').empty();
                    $(this).parents('.dcomment').next().find('.comments_pic').empty();
                    $tt = $(this);
                    // ifLoading("show");
                    var v = $(this).attr("type");
                    var id = $(this).attr("goods_id");
                    $.get("<?php echo U('Fit/comment');?>",{type:v,id:goods_id},function(msg){
                        var info = msg['0'];
                        var re_info = msg['1'];

                        // console.log(re_info);
                        for (var i=0; i<info.length; i++){
                          var cloneLi = $('.cloneLi').eq(0).clone();
                          // cloneLi.removeAttr('id');

                          cloneLi.find('.d_user img').attr("src",'/object'+info[i]['user_img']);
                          cloneLi.find('.d_user span').eq(1).html(info[i]['username']);
                          cloneLi.find('.comment_right_sp span').eq(0).html(info[i]['ass_time']);
                          cloneLi.find('.con').html(info[i]['con']);
                          // console.log(info[i]['img']);
                          //循环输出评级等级星
                          for(var k=0;k<info[i]['grade'];k++){
                            cloneLi.find('i').eq(k).attr('class','on');
                          }
                          //循环图片遍历
                            for(var g=0; g<info[i]['img'].length; g++){
                              if(info[i]['img'][g]!==''){
                              var cloneImg = $('.aimg').eq(0).clone();
                              cloneImg.find('img').attr("src",'/object'+info[i]['img'][g]);
                              cloneLi.find('.comments_pic').append(cloneImg);
                             }
                          }
                          cloneLi.find('.zan').attr('ok',info[i]['id']);
                          cloneLi.find('.zan span').html(info[i]['ok_amount']);
                          cloneLi.find('.reply span').html(info[i]['reply_amount']);
                          cloneLi.find('.white_bt_m').attr('reid',info[i]['id']);

                              // console.log(info);主
                              // console.log(re_info);从
                          // for(var j=0;j<re_info.length;j++){
                          $('#pj_content_ul_list').append(cloneLi);
                          $('.cloneLi').show();
                          //判断回复是否为空
                          if(re_info !== null){
                            for(var j=0;j<re_info.length;j++){
                            if(re_info[j]['ass_id'] == info[i]['id']){
                                if(re_info[j]['username'] == '官方回复：'){
                                  
                                  cloneLi.find('.gf span').html(re_info[j]['username']+re_info[j]['con']);
                                }else{
                                  var replys = $('.c_content').eq(0).clone();
                                  replys.find('p').eq(0).html(re_info[j]['con']);
                                  replys.find('.hfs .dark').html(re_info[j]['username']);
                                  replys.find('.hfs .pr130').html(info[i]['username']);
                                  replys.find('.hfs  .date').html(re_info[j]['ass_time']); 
                                  
                                }
                                $('.cloneLi').last().find('.com_con').append(replys);
                            }
                          } 
                        } 
                      }
                   
                //点击赞按钮,判断用户是否登录,登录+1更新到数 据库
                
                $('.zan').click(function(){ 
                  //获取评价的id
                  var v = $(this).attr('ok');
                  // console.log(id);
                  var tt = $(this);
                  //发送ajax请求
                  $.get("<?php echo U('Fit/addzan');?>",{id:v},function(msg){
                      if(msg==''){
                         alert('登录之后才能评价');
                      }else if(msg =='-1'){
                        alert('您已经点过赞了');
                      }else{
                        tt.find("span").text(msg);
                      }  
                  });
                })
                // 点击回复按钮动画慢出,输入框
                $('.reply').click(function(){
                  // var v = $(this).attr('ok');
                  var th = $(this);
                  $.get("<?php echo U('Fit/reply');?>",function(msg){
                    if(msg !=='0'){
                      th.parents('.comments_content').siblings('.reply_div').show(200);
                      // $(this).parents('.comments_content').siblings('.reply_div').show(200);
                    }else{
                      location.href="<?php echo U('Login/index');?>"
                      // alert('登录之后才能回复');
                    }
                  })
                  // $(this).parents('.comments_content').siblings('.reply_div').show(200);
                })
               $('.text1').keyup(function(){
                  var len = $(this).val().length;
                    if(len >= 50){
                      alert('最多输入50字');
                      // $(this).val($(this).val().substring(0,50));
                    }
                  // var num = 50 - len;//还可输入多少字的值
                  $(this).parents('.reply_div').find('.red').text(len);
                })  
               //获取对评价回复的内容,将内容ajax传到后台
               var c_content = $('.c_content');
               $("input[type='button']").click(function(){
                  var v = $(this).attr("reid");
                  var c = $(this).parents('.reply_div').find('textarea').val();
                  if(c == ''){
                    alert('回复内容不能为空');
                  }else{
                    var cd_content = c_content.last().last().clone();
                  
                  $.get("<?php echo U('Fit/reply');?>",{id:v,con:c},function(msg){
                      // console.log(msg);
                      cd_content.find('p').eq(0).html(msg['con']);
                      cd_content.find('p span').eq(0).html(msg['username']);
                      cd_content.find('p span').eq(1).html(msg['name']);
                      cd_content.find('p span').eq(2).html(msg['add_time']);
                  })

                  $(this).parents('.reply_div').prev().append(cd_content);
                  $(this).parents('.reply_div').hide(200);
                  }
               })
                
                    })
               });
                //点击赞按钮,判断用户是否登录,登录+1更新到数 据库
                
                $('.zan').click(function(){ 
                  //获取评价的id
                  var v = $(this).attr('ok');
                  // console.log(id);
                  var tt = $(this);
                  //发送ajax请求
                  $.get("<?php echo U('Fit/addzan');?>",{id:v},function(msg){
                      if(msg==''){
                         alert('登录之后才能评价');
                      }else if(msg =='-1'){
                        alert('您已经点过赞了');
                      }else{
                        tt.find("span").text(msg);
                      }  
                  });
                })
                // 点击回复按钮动画慢出,输入框
                $('.reply').click(function(){
                  $.get("<?php echo U('Fit/reply');?>",function(msg){
                    if(msg !=='0'){
                      $(this).parents('.comments_content').siblings('.reply_div').show(200);
                    }else{
                      location.href="<?php echo U('Login/index');?>"
                      // alert('登录之后才能回复');
                    }
                  })
                  // $(this).parents('.comments_content').siblings('.reply_div').show(200);
                })
               $('.text1').keyup(function(){
                  var len = $(this).val().length;
                    if(len >= 50){
                      alert('最多输入50字');
                      // $(this).val($(this).val().substring(0,50));
                    }
                  // var num = 50 - len;//还可输入多少字的值
                  $(this).parents('.reply_div').find('.red').text(len);
                })  
               //获取对评价回复的内容,将内容ajax传到后台
               var c_content = $('.c_content');
               $("input[type='button']").click(function(){
                  var v = $(this).attr("reid");
                  var c = $(this).parents('.reply_div').find('textarea').val();
                  if(c == ''){
                    alert('回复内容不能为空');
                  }else{
                    var cd_content = c_content.last().last().clone();
                  
                  $.get("<?php echo U('Fit/reply');?>",{id:v,con:c},function(msg){
                      // console.log(msg);
                      cd_content.find('p').eq(0).html(msg['con']);
                      cd_content.find('p span').eq(0).html(msg['username']);
                      cd_content.find('p span').eq(1).html(msg['name']);
                      cd_content.find('p span').eq(2).html(msg['add_time']);
                  })

                  $(this).parents('.reply_div').prev().append(cd_content);
                  $(this).parents('.reply_div').hide(200);
                  }
               })
          </script>

<div style="z-index: 999; left: 368px; position: fixed; top: 161px; opacity: 1;" id="dkhalert2" class="TAN_g addCartResult hidden">
    <div class="TAN_gc1">
        <div class=" t_c">
      <div class="TAN_gcb font24 red pb20">当前商品为大客户采购专用商品，请注册大客户帐号后进行操作</div>
      <div style="width:115px;" class="redbt_l block_center mt10">
        <a class="inb04 block redbt_r pl30 pr30" value="" href="javascript:void(0)" id="wjPop-close">
        <span class="white">确定</span>
        </a>
      </div>
        </div>
        <div class="clear pb20"></div>
    </div>
</div>
<script type="text/javascript">
//全局变量
var globalVar={
    suitId:"408200000978",//套装id
    isSuitData:"0",//是否是套装 1:是 0：否
  mainPid:"408200000978",//套装里的主商品id
  bmpids:'',//必买商品参数列表
  hasPhotoList:4,//是否有图片列表
  stockstatus:2,//省份库存返回值(0:预购 1:现货 2:无货)
  isdkPro:"0",//是否是大客户商品
  pid:'408200000978'//套装id
};
//全局统计变量
var globalTongJi={
  wk_contentId:"product.tv.408200000978",//webtrek用到的contentId
  zp_pageId:"123",//晶赞用到的_setPageID
  zp_pageType:"productSalePage",//晶赞用到的_setPageType
  zp_params:['408200000978','49','【乐视遥控器】乐视电视 39键遥控器','0']//晶赞用到的_setParams
}
</script> 
<script type="text/javascript" src="/object/Public/Scripts/product_buy.js"></script>

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
    </div>-->
  </div>
  </a>
  <!-- 销量天王 -->
    <a href="http://bbs.letv.com/thread-458916-1.html" target="_blank">
    <div class="is_king ie6-hover border hand handle  show2 " id="king_div" object="#tw_div">
    <!--<div class="top_show" id="tw_div">
      <div class="arrow absolute"></div>
      <div class="red_bg absolute">销量天王</div>
    </div>-->
  </div>
  </a>
  <!-- 下载APP -->
    <div class="is_app ie6-hover border hand handle  show3 " id="app_div" object="#xz_div">
    <div class="app_show" id="xz_div">
      <div class="app_bg border absolute">
              <p class="pt5 pb5">手机下单更快捷</p>
              <p><a href="http://shop.letv.com/app/download.html?cps_id=yd_pc_yg_rk_pcfb_0_h" target="_blank"><img  alt=""  src="/object/Public/Picture/83830745ae60408eb717bc7f43d43dd0.gif" style=""/></a></p>
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
    </div>-->
  </div>
</div>

<div class="footer">
  <div class="white_bg pt40 pb30">
    <div class="center clearfix">
      
      <div class="help_list  left pt50">

      </div>
      <div class="service_online pt50 right">
        
      </div>
      <div class="clear"></div>
    </div>
  </div>
  <div class="copyright" style="display">
   
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
      <a href="#" class="inline_block"><img src="/object/Public/Picture/1c92246a25d54358b70ba90246b79769.gif" alt="" /></a>
    </div>
    <div class="pl90 pb30 pt15 weixin">
      <div class="clearfix">
        <div class="left pr40 line_r">
          <span class="font16 dark">乐视TV 官方微信</span><br />
          <img src="/object/Public/Picture/8f6fc0b9b53841588470c7086379d4a5.gif" alt="" />
        </div>
        <div class="left pl40">
          <span class="font16 dark">乐视商城 官方微信</span><br />
          <img src="/object/Public/Picture/1a1216ca8b8f447f8b9ac5971bada2e9.gif" alt="" />
        </div>
      </div>
      <div class="mt15 gray font12">打开微信，点击右上角的“魔法棒”，选择“扫一扫”功能，对准下方二维码即可。</div>
    </div>
  </div>
</div><!-- 统计代码start-->
<div style="display:none">
  <script type="text/javascript">
  var myTongJi={
    wk_contentId:"",//webtrek用到的contentId
    zp_pageId:"",//晶赞用到的_setPageID
    zp_pageType:"",//晶赞用到的_setPageType
    zp_params:[],//晶赞用到的_setParams
    zp_need:"1"
  }
  if(typeof(globalTongJi)!='undefined'){
    if(globalTongJi.wk_contentId){
            myTongJi.wk_contentId=globalTongJi.wk_contentId;
    }
        var zpqUrlPath = window.location.pathname;
        var zpqTitle = document.title;
        if(zpqUrlPath.indexOf("/help/")!=-1 && !globalTongJi.wk_contentId){
        myTongJi.zp_pageId="helpPage";
        }else{
          myTongJi.zp_pageId=globalTongJi.wk_contentId;
        }
    if(globalTongJi.zp_pageId){
      myTongJi.zp_pageId=globalTongJi.zp_pageId;
    }
    if(globalTongJi.zp_pageType){
      myTongJi.zp_pageType=globalTongJi.zp_pageType;
    }
    if(globalTongJi.zp_params){
      myTongJi.zp_params=globalTongJi.zp_params;
    }
    if(globalTongJi.zp_need){
      myTongJi.zp_need = globalTongJi.zp_need;
    }
    }else{        
        var zpqUrlPath = window.location.pathname;
        var zpqTitle = document.title;
      if(zpqUrlPath.indexOf("/help/")!=-1){
        myTongJi.zp_pageType="helpPage";
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
    contentId:myTongJi.wk_contentId
  };
  </script>
  <script type="text/javascript" src="/object/Public/Scripts/webtrekk_v3.js"></script>
  <!-- webtrek统计 end-->
  
    <!-- pv统计 start-->
  // <script type="text/javascript">
  //   var __INFO__ = {};

  //   var _siteid = '1';var _chlid = '16';var _clickTracker = false;
  //   (function (D){
  //          window.Stat = {P1: 4, P2: 41};
  //          var h = D.getElementsByTagName('head')[0],
  //          s = D.createElement('script');
  //          s.type = 'text/javascript';
  //          s.charset = 'utf-8';
  //          s.src = 'http://js.letvcdn.com/js/201409/16/leStats.js';
  //          h.firstChild ? h.insertBefore(s, h.firstChild) : h.appendChild(s);
  //       })(document);
      
  //     $(function(){
  //       var pvstatsTime = null;
      
  //       if(pvstatsTime){
  //           pvstatsTime = null;
  //       }else{
  //           pvstatsTime = setTimeout(hidePVStatsDiv,1000);
  //       }
        
  //       function hidePVStatsDiv(){
  //           if($("#rookieswf") && $("#rookieswf").length>0){
  //               $("#rookieswf").parent().hide();
  //           }else{
  //               pvstatsTime = setTimeout(hidePVStatsDiv,1000);
  //           }
  //       }
  //     }); 
  // </script>
  <!-- pv统计 end-->
  
  <!-- 晶赞统计代码  begin  -->
  <script type='text/javascript'>
        var _sparam=['_setParams'].concat(myTongJi.zp_params);
    var _zpq = _zpq || [];
    _zpq.push(['_setPageID',myTongJi.zp_pageId]);
    _zpq.push(['_setPageType', myTongJi.zp_pageType]);
    _zpq.push(_sparam);
    _zpq.push(['_setAccount','104']);
    (function() {
    if(myTongJi.zp_need && (myTongJi.zp_need == "1")){
      var zp = document.createElement('script'); zp.type = 'text/javascript'; zp.async = true;
      zp.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.zampda.net/s.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(zp, s);
    }
    })();
  </script>
  <!-- 晶赞统计代码  end  -->
</div>
<!-- 统计代码end--><script type="text/javascript">
  window._bd_share_config={
  "common": {
    "bdSnsKey": { 
    },
    "bdText" : "",  
    "bdDesc" : "",  
    "bdUrl" : "",   
    "bdPic" : "",
    "bdMini": "2",
    "bdMiniList": false,
    "bdStyle": "0",
    "bdSize": "32"  
  },
  "share": {  
  }
};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
</script>
 
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
<div id="flyitem" style="position: absolute; display: none; width: 40px; height: 40px;">
    <img style="width: 40px; height: 40px; border:3px solid #d80c18;" src="/object/Public/Picture/59fd699ed7494603b64701553ab9d4b5.gif">
</div>
</body>
<!-- 底部系统引用 勿动 -->
            <script type='text/javascript' src='/object/Public/Scripts/jquery.lazyload.js'></script>

            <script type='text/javascript' src='/object/Public/Scripts/zxvideo.js'></script>

            <script type='text/javascript' src='/object/Public/Scripts/enlarge_pic.js'></script>

            <script type='text/javascript' src='/object/Public/Scripts/jquery.jqzoom-core.js'></script>

            <script type='text/javascript' src='/object/Public/Scripts/sxf_scroll_pic.js'></script>

</html>
<!-- 系统引用 勿动 -->
<script type="text/javascript" id="bdshare_js" data="type=tools&uid=71" src="/object/Public/Scripts/bds_s_v2.js"></script>
<script type="text/javascript" id="bdshell_js" src="/object/Public/Scripts/shell_v2.js"></script>

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