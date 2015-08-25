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
            var cates = <?php echo ($cates); ?>;
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


    <div id="mainBox">
        <h2 class="lm_title" id="playerM">
            <span class="font_yh"></span>
        </h2>
        <dl class="topicT">

        </dl>
        <div class="app_list_er margt10">
            <ul>

            </ul>
            <div id="pageBox" class="clear"></div>
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
    <script src="/object/Public/Scripts/topicdetail.js"></script>
    </body>
    </html>
    <script id="topicAppList_template" type="text/template">
        {{#subjectAppList}}
        <li>
            <a href="<?php echo U('Appstore:detail');?>?id={{appId}}" class="appImg"><img src="/object/Public/uploads/{{icon}}"/> </a>
            <span>
                <h3 class="font_yh"><a href="<?php echo U('Appstore:detail');?>?id={{appId}}" title="{{description}}">{{name}}</a>
                </h3>
                <div class="show">
                    <p class='score' title="{{avgRating}}分"><em style="width:{{avgRating}}%;"></em></p>
                    <ins>{{downloadCount}}次下载</ins>
                </div>
                <a href="javascript:;" id="{{appId}}" pn="{{packageName}}" class="pos_ts_bt hide">推送到TV</a>
            </span>
        </li>
        {{/subjectAppList}}
    </script>
    <script id="ztXq_template" type="text/template">
        <dt>
            <img src="/object/Public/uploads/{{picture}}"/>
        </dt>
        <dd>
            <h2 class="font_yh">{{name}}</h2>

            <p class="font_yh">{{description}}</p>
            <span>更新日期： {{updateTime}}</span>
        </dd>
    </script>