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
    
    <link rel="stylesheet" href="/object/Public/Content/appdetail.css">
    <script type="text/javascript">
        var get_detail = '<?php echo U("Appstore:get_detail",array("id"=>$id));?>';
        var get_comment = '<?php echo U("Appstore:get_comment",array("id"=>$id));?>';
        var get_relativeApp = '<?php echo U("Appstore:get_relativeApp",array("id"=>$id));?>';
        var get_newApp = '<?php echo U("Appstore:get_newApp",array("id"=>$id));?>';
        var add_comment = '<?php echo U("Appstore:add_comment");?>';
        var login_url = '<?php echo U("Home/Login/index");?>';
        var is_Login = '<?php echo U("Home/Appstore/isLogin");?>';
        var appId = <?php echo ($id); ?>;
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


    <body>
    <div class="appHead" id="appHead">
        <div class="headContent"></div>
        <script type="text/template" id="appHead_template">
            <div class="appIcon">
                <img src="/object/Public/Uploads/{{icon}}" alt="{{name}}">
            </div>
            <h2>{{name}}</h2>
            <p class="control">操控设备
                {{#deviceDetail}}
                <span class="c1 {{key}}" title="{{name}}"></span>
                {{/deviceDetail}}
            </p>
            <p class="intro textclip">{{_description}}</p>
        </script>
        <script type="text/template" id="appMain_template">
            <!--<div class="addFavor"></div>-->
            <div class="screenShots">
                <div class="box">
                    {{#images}}
                    <img src="{{.}}" alt="{{name}} screenshots">
                    {{/images}}
                </div>
            </div>
            <div class="appInfo">
                <div class="btnGroup">
                    <button class="pushTV" appid="{{appId}}">推送到TV</button>
                    <a href="{{downloadUrl}}" class="download">下载</a>
                </div>
                <ul class="count">
                    <li><i>{{_acountCount}}</i>浏览</li>
                    <li><i>{{_downloadCount}}</i>下载</li>
                    <li><i>{{commentTotal}}</i>评论</li>
                </ul>
                <ul class="checked">
                    <li><span class="icon1"></span>免费应用</li>
                    <li><span class="icon2"></span>数字签名与官方版本一致</li>
                    <li><span class="icon3"></span>已通过安全扫描</li>
                    <li><span class="icon4"></span>应用未检查到广告模块</li>
                </ul>
            </div>
        </script>
    </div>

    <div class="appMain" id="appMain"></div>
    <div class="content">
        <div class="cLeft">
            <script type="text/template" id="appDetail_template">
                <h2>应用详情</h2>
                <p class="info">评&nbsp;&nbsp;分：<span class="star"><em style="width:{{_avgRating}}%;"></em></span>&nbsp;&nbsp;&nbsp;开
                    发 者：{{developerName}}&nbsp;&nbsp;版本：{{versionName}}（{{createTime}}）&nbsp;&nbsp;大小：{{size}}M
                    <br>适合平台：{{androidVersions}}&nbsp;&nbsp;分&nbsp;&nbsp;类：{{#appCategorys}}<a href="<?php echo U("appstore/cate");?>?categoryId={{id}}">{{name}}</a>
                    {{/appCategorys}}&nbsp;&nbsp;<br>标&nbsp;&nbsp;签(Tag)：{{#tagList}}<a href="<?php echo U("appstore/cate");?>?tagId={{id}}&{{name}}">{{name}}</a>
                    {{/tagList}}
                </p>
                <p class="intro">{{description}}</p>
                <div class="bdsharebuttonbox"><span>分享应用</span> <a href="#" class="bds_qzone" data-cmd="qzone"
                                                                   title="分享到QQ空间"></a><a href="#" class="bds_tsina"
                                                                                          data-cmd="tsina"
                                                                                          title="分享到新浪微博"></a><a
                        href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_weixin"
                                                                                       data-cmd="weixin"
                                                                                       title="分享到微信"></a><a href="#"
                                                                                                            class="bds_renren"
                                                                                                            data-cmd="renren"
                                                                                                            title="分享到人人网"></a>
                </div>
                <h3>用户评论<span>（{{commentTotal}}条）</span></h3>
            </script>
            <div class="appDetail" id="appDetail">
                <h2>应用详情</h2>

                <p class="info">评&nbsp;&nbsp;分：
          <span class="star">
            <em></em>
          </span>&nbsp;&nbsp;开 发 者：&nbsp;&nbsp;版本：&nbsp;&nbsp;大小：- MB
                    <br>适合平台：&nbsp;&nbsp;分&nbsp;&nbsp;类：
                </p>

                <p class="intro"></p>

                <h3>用户评论<span>（- 条）</span></h3>
            </div>
            <div class="comment">
                <div class="commentBox">
                    <div class="avatar"><img src="/object/Public/Picture/bg-avatar.png"><span id="userName">游客</span></div>
                    <div class="text">
                        <p>客官，打个分吧 <span class="markStar" rating="10"><span class="on"></span><span
                                class="on"></span><span class="on"></span><span class="on"></span><span
                                class="on"></span></span></p>
                        <textarea spellcheck="false"></textarea>

                        <div class="placeholder">孔子曰：“吐槽140字以内，有益身体健康”</div>
                        <div class="confirm"><span id="cmtCaution"></span>
                            <button type="submit">提交</button>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/template" id="record_template">
                {{#appCommentList}}
                <div class="record">
                    <div class="avatar"><img src="/object/Public/Picture/bg-avatar.png"></div>
                    <div class="right">
                        <div class="user">
                            <span class="name">{{userName}}</span><span class="date">{{createTime}}</span>
                            <br><span class="star"><em style="width:{{_rating}}%;"></em></span>
                        </div>
                        <p>&nbsp;{{content}}</p>
                    </div>
                </div>
                {{/appCommentList}}
            </script>
            <div class="loadRecord">
                <button id="loadMore">加载更多 <img src="/object/Public/Picture/icon-loadmore.png"></button>
            </div>
        </div>
        <div class="cRight">
            <div class="recommend" id="relative">
                <h3>相关推荐</h3>
                <script type="text/template" id="relative_template">
                    {{#recommendList}}
                    <ul class="app">
                        <li class="icon"><a href="<?php echo U('Appstore/detail');?>?id={{appId}}" title="{{name}}"><img
                                src="/object/Public/Uploads/{{icon}}" alt="{{name}}"></a></li>
                        <li class="data"><a href="<?php echo U('Appstore/detail');?>?id={{appId}}" class="name textclip"
                                            title="{{name}}">{{name}}</a><span class="star"><em
                                style="width:{{avgRating}}%;"></em></span><span class="num">{{downloadCount}}次下载</span>
                        </li>
                        <li class="push">
                            <button appid="{{appId}}">推送到TV</button>
                        </li>
                    </ul>
                    {{/recommendList}}
                </script>
            </div>
            <div class="latest recommend">
                <h3>最新上架</h3>
                <script type="text/template" id="latest_template">
                    {{#newestAppList}}
                    <ul class="app">
                        <li class="icon"><a href="<?php echo U('Appstore/detail');?>?id={{appId}}" title="{{name}}"><img
                                src="/object/Public/Uploads/{{icon}}" alt="{{name}}"></a></li>
                        <li class="data"><a href="<?php echo U('Appstore/detail');?>?id={{appId}}" class="name textclip"
                                            title="{{name}}">{{name}}</a><span class="star"><em
                                style="width:{{avgRating}}%;"></em></span><span class="num">{{downloadCount}}次下载</span>
                        </li>
                        <li class="push">
                            <button appid="{{appId}}">推送到TV</button>
                        </li>
                    </ul>
                    {{/newestAppList}}
                </script>
            </div>
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

    <div class="dialog">
        <div class="close"><span class="icon"></span></div>
        <div class="push ok center">
            <h3><span class="icon"></span>推送成功</h3>

            <p>应用已成功推送至TV，请在电视端使用！</p>

            <p><img src="/object/Public/Picture/icon-pushok.png" alt="推送成功"></p>
        </div>
        <div class="push false center">
            <h3><span class="icon"></span>推送失败</h3>

            <p>对不起，可能是网络或者未登录导致</p>
        </div>
        <div class="addfavor ok center">
            <h3><span class="icon"></span>收藏成功</h3>

            <p>内容</p>
        </div>
        <div class="addfavor false center">
            <h3><span class="icon"></span>收藏失败</h3>

            <p>对不起，可能是网络或者未登录导致</p>
        </div>
    </div>
    <div class="mask"></div>
    <!-- 浮动跳转菜单 -->
    <a href="javascript:;" id="goTop"></a>
    <script src="/object/Public/Scripts/jquery-1.11.0.min.js" type="text/javascript"></script>
    <script src="/object/Public/Scripts/mustache.js" type="text/javascript"></script>
    <script src="/object/Public/Scripts/appdetail.js" type="text/javascript"></script>
    <script src="/object/Public/Scripts/search.js"></script>
    <script src="/object/Public/Scripts/loginstatus.js"></script>
    <script src="/object/Public/Scripts/floatmenu.js"></script>
    <script type="text/javascript">
        // var params = window.location.search.split("=");
        // var appId = params[1].split("&")[0];
        // var appCommentUrl = './get_comment';
    </script>
    </body>

    </html>