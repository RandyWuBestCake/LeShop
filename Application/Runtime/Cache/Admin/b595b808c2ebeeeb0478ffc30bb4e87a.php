<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Plugin Stylesheets first to ease overrides -->
<link rel="stylesheet" type="text/css" href="/object/Public/plugins/colorpicker/colorpicker.css" media="screen">
<link rel="stylesheet" type="text/css" href="/object/Public/custom-plugins/wizard/wizard.css" media="screen">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/object/Public/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/object/Public/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/object/Public/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/object/Public/css/mws-style.css" media="screen">
<link rel="stylesheet" type="text/css" href="/object/Public/css/icons/icol16.css" media="screen">
<link rel="stylesheet" type="text/css" href="/object/Public/css/icons/icol32.css" media="screen">

<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="/object/Public/css/demo.css" media="screen">

<!-- jQuery-UI Stylesheet -->
<link rel="stylesheet" type="text/css" href="/object/Public/jui/css/jquery.ui.all.css" media="screen">
<link rel="stylesheet" type="text/css" href="/object/Public/jui/jquery-ui.custom.css" media="screen">

<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="/object/Public/css/mws-theme.css" media="screen">
<link rel="stylesheet" type="text/css" href="/object/Public/css/themer.css" media="screen">

<title><?php echo C("webTitle");?> 后台管理首页</title>
<style type="text/css">
    iframe{width:1000px;height:800px;}
    

</style>
</head>

<body>
	<!-- Header -->
	<div id="mws-header" class="clearfix">
    
    	<!-- Logo Container -->
    	<div id="mws-logo-container">
        
        	<!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
        	<div id="mws-logo-wrap">
            	   <img src="/object/Public/images/mws-logo.png" alt="mws admin">
            </div>
        </div>
        
        <!-- User Tools (notifications, logout, profile, change password) -->
        <div id="mws-user-tools" class="clearfix">
        
        	<!-- Notifications -->
        	<div id="mws-user-notif" class="mws-dropdown-menu">
            	<a href="#" data-toggle="dropdown" class="mws-dropdown-trigger"><i class="icon-exclamation-sign"></i></a>
                
                <!-- Unread notification count -->
                <span class="mws-dropdown-notif">35</span>
                
                <!-- Notifications dropdown -->
                <div class="mws-dropdown-box">
                	<div class="mws-dropdown-content">
                        <ul class="mws-notifications">
                        	<li class="read">
                            	<a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="read">
                            	<a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="unread">
                            	<a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="unread">
                            	<a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="mws-dropdown-viewall">
	                        <a href="#">View All Notifications</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Messages -->
            <div id="mws-user-message" class="mws-dropdown-menu">
            	<a href="#" data-toggle="dropdown" class="mws-dropdown-trigger"><i class="icon-envelope"></i></a>
                
                <!-- Unred messages count -->
                <span class="mws-dropdown-notif">35</span>
                
                <!-- Messages dropdown -->
                <div class="mws-dropdown-box">
                	<div class="mws-dropdown-content">
                        <ul class="mws-messages">
                        	<li class="read">
                            	<a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="read">
                            	<a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="unread">
                            	<a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="unread">
                            	<a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="mws-dropdown-viewall">
	                        <a href="#">View All Messages</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- User Information and functions section -->
            <div id="mws-user-info" class="mws-inset">
            
            	<!-- User Photo -->
            	<div id="mws-user-photo">
                	<img src="/object/Public/example/profile.jpg" alt="User Photo">
                </div>
             
                <!-- Username and Functions -->
                <div id="mws-user-functions">
                    <div id="mws-username">
                           管理员<?php echo ($_SESSION['user']['username']); ?>,你好!
                    </div>
                    <ul>
                    	
                        <li><a href="#">修改密码</a></li>
                        <li><a href="<?php echo U('Login/logout');?>">退出登录</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">
    
    	<!-- Necessary markup, do not remove -->
		<div id="mws-sidebar-stitch"></div>
		<div id="mws-sidebar-bg"></div>
        
        <!-- Sidebar Wrapper -->
        <div id="mws-sidebar">
        
            <!-- Hidden Nav Collapse Button -->
            <div id="mws-nav-collapse">
                <span></span>
                <span></span>
                <span></span>
            </div>
            
        	<!-- Searchbox -->
        	<div id="mws-searchbox" class="mws-inset">
            	<form action="typography.html">
                	<input type="text" class="mws-search-input" placeholder="Search...">
                    <button type="submit" class="mws-search-submit"><i class="icon-search"></i></button>
                </form>
            </div>
            
            <!-- Main Navigation -->
            <div id="mws-navigation">
                <ul>

                	 <li >
                        <a href="#"><i class="icon-list"></i> 后台用户管理</a>
                        <ul class="closed">
                            <li><a href="<?php echo U('Useradmin/add');?>" target="frame">管理员添加</a></li>
                            <li><a href="<?php echo U('Useradmin/index');?>" target="frame">管理员列表</a></li>
                        </ul>
                    </li>
                    
                    <li >
                        <a href="#"><i class="icon-list"></i> 前台用户管理</a>
                        <ul class="closed">
                            <li><a href="<?php echo U('User/add');?>" target="frame">用户添加</a></li>
                            <li><a href="<?php echo U('User/index');?>" target="frame">用户列表</a></li>
                        </ul>
                    </li>
                    <li >
                        <a href="#"><i class="icon-list"></i> 乐商首页管理</a>
                        <ul class="closed">
                            <li><a href="<?php echo U('LeIndex/add');?>" target="frame">板块添加</a></li>
                            <li><a href="<?php echo U('Leindex/index');?>" target="frame">板块列表</a></li>
                        </ul>
                    </li>
                    <li >
                        <a href="#"><i class="icon-list"></i> 导航菜单管理</a>
                        <ul class="closed">
                            <li><a href="<?php echo U('Nav/add');?>" target="frame">菜单添加</a></li>
                            <li><a href="<?php echo U('Nav/index');?>" target="frame">菜单列表</a></li>
                        </ul>
                    </li>
                    <li >
                        <a href="#"><i class="icon-list"></i>轮播管理</a>
                        <ul class="closed">
                            <li><a href="<?php echo U('HomeSild/lists');?>" target="frame">轮播列表</a></li>
                            <li><a href="<?php echo U('HomeSild/add');?>" target="frame">添加轮播</a></li>

                        </ul>
                    </li>
                    <li >
                        <a href="#"><i class="icon-list"></i> 分类管理</a>
                        <ul class="closed">
                            <li><a href="<?php echo U('Cate/add');?>" target="frame">分类添加</a></li>
                            <li><a href="<?php echo U('Cate/index');?>" target="frame">分类列表</a></li>
                        </ul>
                    </li>
                    <li >
                        <a href="#"><i class="icon-list"></i> 商品管理</a>
                        <ul class="closed">
                            <li><a href="<?php echo U('Goods/add');?>" target="frame">商品添加</a></li>
                            <li><a href="<?php echo U('Goods/index');?>" target="frame">商品列表</a></li>
                        </ul>
                    </li>
                    <li >
                        <a href="#"><i class="icon-list"></i> 配件管理</a>
                        <ul class="closed">
                            <li><a href="<?php echo U('Fit/add');?>" target="frame">配件添加</a></li>
                            <li><a href="<?php echo U('Fit/index');?>" target="frame">配件列表</a></li>
                            <li><a href="<?php echo U('Fitimg/add');?>" target="frame">配件详情图片添加</a></li>
                            <li><a href="<?php echo U('Fitimg/index');?>" target="frame">配件详情图片列表</a></li>
                        </ul>
                    </li>
                    <li >
                        <a href="#"><i class="icon-list"></i> 库存管理</a>
                        <ul class="closed">
                            <li><a href="<?php echo U('Amount/add');?>" target="frame">库存添加与调节</a></li>
                            <li><a href="<?php echo U('Amount/index');?>" target="frame">库存列表</a></li>
                        </ul>
                    </li>
                    <li >
                        <a href="#"><i class="icon-list"></i> 订单管理</a>
                        <ul class="closed">
                            <li><a href="<?php echo U('Order/add');?>" target="frame">订单添加</a></li>
                            <li><a href="<?php echo U('Order/index');?>" target="frame">订单列表及详情</a></li>
                        </ul>
                    </li>
                    <li >
                        <a href="#"><i class="icon-list"></i> 订单评价管理</a>
                        <ul class="closed">
                            <!-- <li><a href="<?php echo U('Fitassess/add');?>" target="frame">评价订单</a></li> -->
                            <li><a href="<?php echo U('Goodsassess/index');?>" target="frame">商品和配件评价管理</a></li>
                            <li><a href="<?php echo U('Goodsassess/addtag');?>" target="frame">评价标签设置</a></li>
                            <li><a href="<?php echo U('Goodsassess/taglist');?>" target="frame">评价标签列表</a></li>
                        </ul>
                    </li>
                    <li >
                        <a href="#"><i class="icon-list"></i> 比一比管理</a>
                        <ul class="closed">
                            <li><a href="<?php echo U('Product/add');?>" target="frame">产品添加</a></li>
                            <li><a href="<?php echo U('Product/index');?>" target="frame">产品列表</a></li>
                        </ul>
                    </li>
                    <li >
                        <a href="#"><i class="icon-list"></i> 看一看首页管理</a>
                        <ul class="closed">
                            <li><a href="<?php echo U('Look/index');?>" target="frame">首页banner管理</a></li>
                        </ul>
                    </li>
                    <li >
                        <a href="#"><i class="icon-list"></i> 文章管理</a>
                        <ul class="closed">
                            <li><a href="<?php echo U('Article/add');?>" target="frame">文章添加</a></li>
                            <li><a href="<?php echo U('Article/index');?>" target="frame">文章列表</a></li>
                        </ul>
                    </li> 
                      
                    <li><a href="<?php echo U('Store/index');?>" target="frame"><i class="icon-list"></i>Store 首页设置</a></li>                 
                     <li >
                        <a href="#"><i class="icon-list"></i>Store 资源管理</a>
                        <ul class="closed">
                            <li><a href="<?php echo U('Store/lists');?>" target="frame">资源列表</a></li>
                            <li><a href="<?php echo U('Store/add');?>" target="frame">资源添加</a></li>
                            <!-- <li><a href="<?php echo U('Store/tagLists');?>" target="frame">资源标签Tag列表</a></li> -->
                            <li><a href="<?php echo U('Store/tagAdd');?>" target="frame">资源标签Tag添加</a></li>
                            <li><a href="<?php echo U('Store/cate_list');?>" target="frame">资源分类列表</a></li>
                            <li><a href="<?php echo U('Store/cate_add');?>" target="frame">资源分类添加</a></li>
                            <li><a href="<?php echo U('Store/control_device');?>" target="frame">操控设备管理</a></li>
                        </ul>
                    </li>
                     <li >
                        <a href="#"><i class="icon-list"></i>Store 活动管理</a>
                        <ul class="closed">
                            <li><a href="<?php echo U('StoreAct/lists');?>" target="frame">活动列表</a></li>
                            <li><a href="<?php echo U('StoreAct/add');?>" target="frame">活动添加</a></li>
                        </ul>
                    </li>
                    <li >
                        <a href="<?php echo U('Server/index');?>" target="frame"><i class="icon-edit"></i> 服务条款</a>                       
                    </li>
                    <li >
                        <a href="<?php echo U('Help/index');?>" target="frame"><i class="icon-edit"></i> 帮助中心</a>                       
                    </li>
                    <li >
                        <a href="#"><i class="icon-list"></i>优惠卷</a>
                        <ul class="closed">
                            <li><a href="<?php echo U('Coupon/index');?>" target="frame">优惠卷活动列表</a></li>
                            <li><a href="<?php echo U('Coupon/add');?>" target="frame">优惠活动添加</a></li>
                        </ul>
                    </li>
                    <li >
                        <a href="#"><i class="icon-list"></i> 首页公告管理</a>
                        <ul class="closed">
                            <li><a href="<?php echo U('Announcement/add');?>" target="frame">首页公告添加</a></li>
                            <li><a href="<?php echo U('Announcement/index');?>" target="frame">首页公告列表</a></li>
                        </ul>
                    </li>
                     <li >
                        <a href="#"><i class="icon-list"></i> 友情链接管理</a>
                        <ul class="closed">
                            <li><a href="<?php echo U('Links/add');?>" target="frame">友情链接添加</a></li>
                            <li><a href="<?php echo U('Links/index');?>" target="frame">友情链接列表</a></li>
                        </ul>
                    </li>
                </ul>
            </div>         
        </div>
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
        
        	<!-- Inner Container Start -->
            <div class="container">
            
            <iframe id="iframe" src="<?php echo U('System/index');?>" frameborder="0" name="frame"></iframe>    
                <!-- Panels End -->
            </div>
            <!-- Inner Container End -->
                       
            
            
        </div>
        <!-- Main Container End -->
        
    </div>

    <!-- JavaScript Plugins -->
    <script src="/object/Public/js/libs/jquery-1.8.3.min.js"></script>
    <script src="/object/Public/js/libs/jquery.mousewheel.min.js"></script>
    <script src="/object/Public/js/libs/jquery.placeholder.min.js"></script>
    <script src="/object/Public/custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="/object/Public/jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="/object/Public/jui/jquery-ui.custom.min.js"></script>
    <script src="/object/Public/jui/js/jquery.ui.touch-punch.js"></script>

    <!-- Plugin Scripts -->
    <script src="/object/Public/plugins/datatables/jquery.dataTables.min.js"></script>
    <!--[if lt IE 9]>
    <script src="/object/Public/js/libs/excanvas.min.js"></script>
    <![endif]-->
    <script src="/object/Public/plugins/flot/jquery.flot.min.js"></script>
    <script src="/object/Public/plugins/flot/plugins/jquery.flot.tooltip.min.js"></script>
    <script src="/object/Public/plugins/flot/plugins/jquery.flot.pie.min.js"></script>
    <script src="/object/Public/plugins/flot/plugins/jquery.flot.stack.min.js"></script>
    <script src="/object/Public/plugins/flot/plugins/jquery.flot.resize.min.js"></script>
    <script src="/object/Public/plugins/colorpicker/colorpicker-min.js"></script>
    <script src="/object/Public/plugins/validate/jquery.validate-min.js"></script>
    <script src="/object/Public/custom-plugins/wizard/wizard.min.js"></script>

    <!-- Core Script -->
    <script src="/object/Public/bootstrap/js/bootstrap.min.js"></script>
    <script src="/object/Public/js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="/object/Public/js/core/themer.js"></script>
    <!-- Demo Scripts (remove if not needed) -->
    <script src="/object/Public/js/demo/demo.dashboard.js"></script>
    <!--<script type="text/javascript">
        $(document).scroll(function(){
               var _h = $("#mws-navigation").height();
               console.log(_h);
               $("#iframe").height(_h);
        })
    </script>-->
</body>
</html>