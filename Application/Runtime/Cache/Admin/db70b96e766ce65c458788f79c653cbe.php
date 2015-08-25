<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if lt IE 7]>
<html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>
<html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>
<html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en"><!--<![endif]-->
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
    
    <title>活动列表</title>
    <style type="text/css">
        tr td div a {
            padding: 0 10px;
            color: #999;
        }

        span {
            margin: 10px;
        }
    </style>

    <style type="text/css">

        #mws-container {
            margin: 0px;
        }
    </style>
</head>

<body>

<!-- Themer (Remove if not needed) -->

<!-- Themer End -->


<!-- Start Main Wrapper -->
<div id="mws-wrapper">

    <!-- Necessary markup, do not remove -->
    <!-- Main Container Start -->
    <div id="mws-container" class="clearfix">

        <!-- Inner Container Start -->
        <div class="container">
            
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span>添加活动商品</span>
        </div>
        <div class="mws-panel-body">
            <div>
                <table class="mws-table">
                    <thead>
                    <tr>
                        <th width="40px">活动ID</th>
                        <th width="120px">活动标题</th>
                        <th width="300px">活动简介</th>
                        <th width="120px;">活动图片</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?php echo ($act['id']); ?></td>
                        <td><?php echo ($act['title']); ?></td>
                        <td><?php echo ($act['desc']); ?></td>
                        <td><img width="120px" src="/object/Public/uploads/<?php echo ($act['img']); ?>"></td>
                    </tr>
                    <tr>
                        <td colspan="8" style="text-align:right;"><?php echo ($page); ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div style="box-shadow:2px 2px 2px #333">
                <br>
                <h4>活动已有商品</h4>
                <?php if(is_array($goods)): foreach($goods as $k=>$vo): ?><span data-gid="<?php echo ($k); ?>"><?php echo ($vo); ?></span><?php endforeach; endif; ?>
                <h4>新增以下商品</h4>

                <div id="goodsList" style="padding:20px;border:2px dashed #333"></div>
                <h4>删除以下商品</h4>

                <div id="delList" style="padding:20px;border:2px dashed #333"></div>
                <form action="<?php echo U('StoreAct:goodsDoAdd');?>" method="post">
                    <input type="hidden" value="" name="gid">
                    <input type="hidden" value="" name="fgid">
                    <input type="hidden" value="<?php echo ($act['id']); ?>" name="aid">
                    <input type="submit" value="确认修改" class="btn btn-primary" style="margin:20px;">
                </form>
            </div>
        </div>
    </div>
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span>全部商品</span>
        </div>
        <div class="dataTables_filter" id="DataTables_Table_1_filter"
             style="background:#f2f2f2;padding: 10px 0px;;text-align:right;border:1px #666;box-shadow:4px 2px 2px #333">
            <label>搜索: <input type="text" id="search"></label>
        </div>
        <div class="mws-panel-body">
            <div id="list" class="mws-form-row"></div>
        </div>
    </div>
    <script type="text/javascript" src="/object/Public/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript">
        var id = '<?php echo ($ids); ?>'; //获取已活动存在的资源数组
        var ids = id.split(','); //转换为数组
        // ajax请求函数 url 要请求的地址
        function ajaxGoods(url) {
            $.get(url, '', function (msg) { //get方式请求
                $("#list").html(msg); //将返回的数据插入 #list标签
                //绑定分页的点击方法
                $("#page").find('a').click(function () {
                    ajaxGoods($(this).attr('href')); //递归调用发送ajax 调用分页指向的页面(用于绑定新页面的jq事件)
                    return false; //阻止a标签默认跳转事件
                });
                //绑定多选框事件(用于检测用户的添加删除操作)
                $("input:checkbox").change(function () {
                    var zgarr = $("input[name='gid']").val(); //用户要添加的商品ID
                    var zarr = zgarr.split(','); //转为数组
                    var garr = $("input[name='fgid']").val(); //用户要删除的商品ID
                    var arr = garr.split(','); //转为数组
                    var n = $(this).val(); //获取当前选择框的id值(数据库中商品ID)
                    var v = $(this).parent().next().html();   //获取当前选择框对应的文本
                    if ($(this).attr("checked")) { //如果被选中
                        v = "<span tid='" + n + "'>" + v + "</span>";  //组合文本样式
                        //判断当前文章是否已存在数据库
                        if ($.inArray(n, ids) >= 0) {  //如果文章已存在数据库
                            v = $("#goodsList").html(); //保持 要添加的文章提示框 不变
                            var o = arr.splice($.inArray(n, arr), 1); //删除用户要删除的商品ID数组中对应的值(用于用户反复点击操作)
                            if (o >= 0) { //如果删除成功
                                $("input[name='fgid']").val(arr); //将新值返回给要删除的商品ID存储input容器
                            }
                        } else { //如果文章不存在数据库
                            if ($("input[name='gid']").val() != '' && $.inArray(n, zarr) < 0) { //并且添加商品的存储容器不为空 并且 当前不存在容器数组中
                                v = $("#goodsList").html() + v; //提示文本框 追加当前选择文章标题
                                n = $("input[name='gid']").val() + ',' + n; //将当前文章ID加入存储数组使用 逗号分割
                            } else if ($.inArray(n, zarr) >= 0) { //如果当前文章ID已存在容器数组中
                                n = $("input[name='gid']").val(); //ID数组保持原样
                                v = $("#goodsList").html() + v; // //提示文本框 追加当前选择文章标题
                            }
                            $("input[name='gid']").val(n); //插入存储数组
                        }
                        $("#goodsList").html(v); //插入提示信息
                        $("span[did=" + $(this).val() + "]").remove();   //将要删除的提示框中对应的标题取消显示
                    } else { //如果没有被选中
                        v = "<span did='" + n + "'>" + v + "</span>";  //组合文本样式
                        //判断商品是否已存在数据库中
                        if ($.inArray(n, ids) >= 0) { //如果文章已存在数据库中
                            v = $("#delList").html() + v; //追加提示信息
                            if ($.inArray(n, arr) < 0) { //如果ID不存在 要删除的储存容器中
                                if ($("input[name='fgid']").val() != '') { // 如果存储容器不为空
                                    $("input[name='fgid']").val($("input[name='fgid']").val() + ',' + n); //以逗号,分割追加
                                } else { //如果存储容器为空
                                    $("input[name='fgid']").val(n); //直接添加
                                }
                            }
                        } else { //如果文章未存在数据库中
                            v = $("#delList").html(); //提示信息保持原样
                            var o = zarr.splice($.inArray(n, zarr), 1); //删除用户要增加的文章ID容器中对应值
                            if (o >= 0) { //如果删除成功
                                $("input[name='gid']").val(zarr); //将新数据赋给增加文章存储容器
                            }
                        }
                        $("span[tid=" + n + "]").remove(); //将要增加区域的提示信息删除
                        $("#delList").html(v); //更新要删除区域的提示列表
                    }
                });
                //绑定每个checkbox 的选择状态
                $("input:checkbox").each(function () {  //遍历当前页checkbox
                    if ($.inArray($(this).val(), ids) >= 0) { //如果文章存在数据库中
                        $(this).prop("checked", true); //更新其状态为选中
                    }
                });
            })
        }
        // 首次加载发送ajax请求
        ajaxGoods('<?php echo U("StoreAct/goods");?>');
        //绑定搜索框 键盘时间
        $("#search").keyup(function () {
            var sstr = $(this).val();
            ajaxGoods('<?php echo U("StoreAct/goods");?>' + '?search=' + sstr);
        })
    </script>


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

<script src="/object/Public/js/demo/demo.widget.js"></script>
<!-- Demo Scripts (remove if not needed) -->
<script src="/object/Public/js/demo/demo.dashboard.js"></script>

</body>
</html>