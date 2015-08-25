<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo C('webTitle');?> Store</title>
    <meta name="Keywords" content="<?php echo C('keywords');?>">
    <meta name="description" content="<?php echo C('description');?>">
    <script type="text/javascript">
        var login_url = '<?php echo U("Home/Login/index");?>';
        var is_Login = '<?php echo U("Home/Appstore/isLogin");?>';
        var login_out = '<?php echo U("Home/Login/logout");?>';
    </script>
    
    <link href="/object/Public/Content/main-yu.css" rel="stylesheet">
    <script type="text/javascript">
        var cateApp = '<?php echo U("appstore:cateApp",array("order"=>"dcount","categoryId"=>$cid));?>';
        var zrApp = '<?php echo U("appstore:cateApp",array("order"=>"dcount","categoryId"=>$cid));?>';
        var zxApp = '<?php echo U("appstore:cateApp",array("order"=>"create_time","categoryId"=>$cid));?>';
        var hpApp = '<?php echo U("appstore:cateApp",array("order"=>"ccount","categoryId"=>$cid));?>';
        var zrtApp = '<?php echo U("appstore:cateApp",array("order"=>"dcount","tagId"=>$tid));?>';
        var zxtApp = '<?php echo U("appstore:cateApp",array("order"=>"create_time","tagId"=>$tid));?>';
        var hptApp = '<?php echo U("appstore:cateApp",array("order"=>"ccount","tagId"=>$tid));?>';
        var cateName = '<?php echo ($cateName?$cateName:"无此分类"); ?>';
    </script>

    <link rel="icon" href="/object/Public/images/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="/object/Public/images/favicon.ico" type="image/x-icon"/>
</head>

    <body>
    <div class="navBox">
        <h1><a href="<?php echo U('Appstore:index');?>"><img src="/object/Public/Picture/logo.png" alt="乐视"></a></h1>
        <ul>
                <li><a href="<?php echo U('Home/Appstore/Index');?>">首页</a></li>
                <?php if(is_array($navs)): foreach($navs as $key=>$vo): ?><li <?php echo ($vo['url']==$cid?"class='navCurrent'":''); ?>><a href="<?php echo U('Appstore/cate');?>?categoryId=<?php echo ($vo['url']); ?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; ?>
        </ul>
        <div class="topSearch">
            <input id="searchText" type="text" spellcheck="false" value="搜索应用/游戏">
            <a href="javascript:searchFn()" class="search_bt">搜索</a>
            <a href="javascript:login()" class="login_bt"></a>
        </div>
    </div>


    <body class="classBg">
    <div id="mainBox">
        <h2 class="lm_title margt10" id="playerM">
            <span class="font_yh"></span>
            <ul class="right_tab font_yh">
                <li class="tab_on" id="zrApp">最热</li>
                <li id="zxApp">最新</li>
                <li id="hpApp">好评</li>
            </ul>
        </h2>
        <div class="app_list_er">
            <ul>

            </ul>
            <div id="pageBox" class="clear"></div>
        </div>
    </div>


    <div class="foot">
        <ul class="footlink">
            <?php if(is_array($navs)): foreach($navs as $key=>$vo): ?><li><a href="<?php echo ($vo['url']); ?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; ?>
        </ul>
        <p class="cert">
            <a href="http://www.miibeian.gov.cn/" target="_blank">京ICP备00100100</a>
            <a target="_blank" href="http://www.miibeian.gov.cn/">京ICP证00100100号</a>
            <a target="_blank" href="#">网络视听许可证00100100号</a>
            <br>京公网安备：110105000744
            <a target="_blank" href="http://net.china.com.cn/index.htm">不良信息举报中心</a>
            <a target="_blank" href="#">网络文化经营许可证 文网文[2200]220号</a>
        </p>

        <p class="copyright">
            Copyright &copy; 2014-2015 LAMP 95（lamp95.com） All rights reserved.
        </p>
    </div>

<div id="appPlayer"><a href="<?php echo U('Index/index');?>" target="_blank"></a></div>

    <a href="javascript:;" id="goTop"></a>
    <script src="/object/Public/Scripts/jquery-1.11.0.min.js"></script>
    <script src="/object/Public/Scripts/appajaxpage.js"></script>
    <script src="/object/Public/Scripts/mustache.js"></script>
    <script src="/object/Public/Scripts/search.js"></script>
    <script src="/object/Public/Scripts/gotop.js"></script>
    <script src="/object/Public/Scripts/appclass.js"></script>
    </body>
    </html>
    <script id="appClassList_template" type="text/template">
        {{#categoryAppList}}
        <li>
            <a href="<?php echo U('Appstore:detail');?>?id={{appId}}" class="appImg"><img src="/object/Public/uploads/{{icon}}"/> </a>
        <span>
            <h3 class="font_yh"><a href="<?php echo U('Appstore:detail');?>?id={{appId}}">{{name}}</a></h3>
            <div class="show">
                <p class='score' title="{{avgRating}}分"><em style="width:{{avgRating}}%;"></em></p>
                <ins>{{downloadCount}}次下载</ins>
            </div>
            <a href="javascript:;" id="{{appId}}" pn="{{packageName}}" class="pos_ts_bt hide">推送到TV</a>
        </span>
        </li>
        {{/categoryAppList}}
    </script>
    <script id="tagAppClassList_template" type="text/template">
        {{#operatingAppList}}
        <li>
            <a href="<?php echo U('Appstore:detail');?>?id={{appId}}" class="appImg"><img src="/object/Public/uploads/{{icon}}"/> </a>
        <span>
            <h3 class="font_yh"><a href="<?php echo U('Appstore:detail');?>?id={{appId}}">{{name}}</a></h3>
            <div class="show">
                <p class='score' title="{{avgRating}}分"><em style="width:{{avgRating}}%;"></em></p>
                <ins>{{downloadCount}}次下载</ins>
            </div>
            <a href="javascript:;" id="{{appId}}" pn="{{packageName}}" class="pos_ts_bt hide">推送到TV</a>
        </span>
        </li>
        {{/operatingAppList}}
    </script>
    <script id="searchAppClassList_template" type="text/template">
        {{#searchResults}}
        <li>
            <a href="<?php echo U('Appstore:detail');?>?id={{appId}}" class="appImg"><img src="/object/Public/uploads/{{icon}}"/> </a>
        <span>
            <h3 class="font_yh"><a href="<?php echo U('Appstore:detail');?>?id={{appId}}">{{name}}</a></h3>
            <div class="show">
                <p class='score' title="{{avgRating}}分"><em style="width:{{avgRating}}%;"></em></p>
                <ins>{{downloadCount}}次下载</ins>
            </div>
            <a href="javascript:;" id="{{appId}}" pn="{{packageName}}" class="pos_ts_bt hide">推送到TV</a>
        </span>
        </li>
        {{/searchResults}}
    </script>