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


    <div class="banner_yu">
        <h2 class="lm_title"><span class="font_yh">小编推荐</span></h2>

        <div id="focusImg" class="margt10">
            <ul></ul>
            <a href="javascript:;" class="pre"></a>
            <a href="javascript:;" class="next"></a>
        </div>
    </div>
    <div class="tab_box">
        <h2 class="font_yh">发现</h2>

        <div class="tab_content">
            <ul></ul>
            <div class="loadMore clear"><a id="moreTab" href="javascript:;" class="width_s">全部</a></div>
        </div>
    </div>
    <div id="mainBox">
        <h2 class="lm_title margt10" id="playerM">
            <span class="font_yh">热门推荐</span>
            <ul class="right_tab font_yh">
                <li id="xb_tj" class="tab_on">小编推荐</li>
                <li id="new_tj">最近更新</li>
            </ul>
        </h2>
        <div class="app_box"></div>
        <div class="loadMore clear"><a id="loadHot" href="javascript:;" class="width_b">加载更多</a></div>
        <h2 class="lm_title">
            <span class="font_yh">热门专题</span>
            <a href="<?php echo U('Appstore:actList');?>" class="moreText"></a>
        </h2>

        <div class="zt_box">

        </div>
        <?php $i=0; ?>
        <?php if(is_array($catesArr)): foreach($catesArr as $ko=>$vo): ?><h2 class="lm_title clear">
                <span class="font_yh"><?php echo ($vo['title']); ?></span>
            </h2>
            <?php if(is_array($vo['cid'])): foreach($vo['cid'] as $k=>$v): ?><div class="app_list_box <?php echo ($k%4==0 ?'':'app_marginL'); ?>">
                    <h2 class="font_yh"><a href="<?php echo U('appstore:cate');?>?categoryId=<?php echo ($v); ?>">更多</a><?php echo ($vo['cateTitle'][$k]); ?>
                    </h2>
                    <ul id="class_<?php echo ($i); ?>"></ul>
                </div>
                <?php $i++; endforeach; endif; endforeach; endif; ?>
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
    <script src="/object/Public/Scripts/jquery-focusimg-yu-1.0.js"></script>
    <script src="/object/Public/Scripts/mustache.js"></script>
    <script src="/object/Public/Scripts/search.js"></script>
    <script src="/object/Public/Scripts/gotop.js"></script>
    <script src="/object/Public/Scripts/home.js"></script>
    <script src="/object/Public/Scripts/trunk8.js" type="text/javascript"></script>
    </body>
</html>
<script id="foucsImg_template" type="text/template">
    {{#listTVClientVO}}
    <li>
        <a href="{{url}}" title="{{imageTitle}}"><img src="/object/Public/uploads/{{imageUrl}}"/></a>
    </li>
    {{/listTVClientVO}}
</script>
<script id="homeTag_template" type="text/template">
    {{#operatingAppTagList}}
    <li><a href="<?php echo U('appstore:cate');?>?tagId={{tagId}}&{{tagName}}" title="{{desc}}">{{tagName}}</a></li>
    {{/operatingAppTagList}}
</script>
<script id="hotApp_template" type="text/template">
    {{#recommendList}}
    <dl>
        <dt>
            <img src="{{pic}}"/>
            //<!-- 右上角-->
        <div class='img_tab'><img src=''/></div>
        <div class='app_mark_w'></div>
        <div class='app_mark'>
            <h3>{{_description}}</h3>

            <p class='score' title="{{avgRating}}分"><em style="width:{{avgRating}}%;"></em></p>
            <span><a href='javascript:;' id="{{appId}}" pn="{{packageName}}" class='ts_bt'>推送到TV</a><a href='<?php echo U('Appstore:detail');?>?id={{appId}}' class='down_bt'>查看详情</a></span>
        </div>
        </dt>
        <dd>
            <p><a href="<?php echo U('Appstore:detail');?>?id={{appId}}"><img src="/object/Public/uploads/{{icon}}"/></a></p>
            <span><h3 class='font_yh'><a href="<?php echo U('Appstore:detail');?>?id={{appId}}">{{name}}</a></h3><ins>
                {{downloadCount}}人下载
            </ins></span>
            <!--<a href="{{appId}}" class='tab_pos'>生活</a>-->
        </dd>
    </dl>
    {{/recommendList}}
</script>
<script id="appClassList_template" type="text/template">
    {{#categoryAppList}}
    <li>
        <a href="<?php echo U('Appstore:detail');?>?id={{appId}}" class="appImg"><img src="/object/Public/uploads/{{icon}}"/> </a>
        <span>
            <h3 class="font_yh"><a href="<?php echo U('Appstore:detail');?>?id={{appId}}" class="appName">{{name}}</a></h3>
            <div class="show">
                <p class='score' title="{{avgRating}}分"><em style="width:{{avgRating}}%;"></em></p>
                <ins>{{downloadCount}}次下载</ins>
            </div>
            <a href="javascript:;" id="{{appId}}" pn="{{packageName}}" class="pos_ts_bt hide">推送到TV</a>
        </span>
    </li>
    {{/categoryAppList}}
</script>
<script id="homeZt_template" type="text/template">
    {{#subjectList}}
    <dl class="zt_marginL">
        <dt><a href="<?php echo U('Appstore:actDetail');?>?id={{id}}"><img src="/object/Public/uploads/{{picUrl}}"/></a></dt>
        <dd>
            <h3><!--<ins>73857人浏览</ins>--><span class="font_yh">共{{appCount}}款应用</span></h3>
        </dd>
    </dl>
    {{/subjectList}}
</script>