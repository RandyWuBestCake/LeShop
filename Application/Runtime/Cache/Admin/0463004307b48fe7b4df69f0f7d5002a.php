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
    
    <title>资源标签(Tag)添加</title>

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
            <span>资源标签(Tag)添加 Store_goods_cate</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form action="<?php echo U('Store:tagDoAdd');?>" class="mws-form" method="post">
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">标签(Tag)标题</label>

                        <div class="mws-form-item">
                            <input type="text" class="medium" name="title">
                        </div>
                    </div>
                </div>
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">标签(Tag)简介</label>

                        <div class="mws-form-item">
                            <input type="text" class="medium" name="desc">
                        </div>
                    </div>
                </div>
                <div class="mws-button-row">
                    <input type="submit" class="btn btn-primary" value="添加">
                    <input type="reset" class="btn btn-danger" value="重置">
                </div>
            </form>
        </div>
    </div>
    <?php if($tags != null ): ?><div class="mws-panel grid_8">
            <div class="mws-panel-header">
                        <span>
                            <i class="icon-table"></i>标签列表 (双击修改)
                        </span>
            </div>
            <div class="dataTables_filter" id="DataTables_Table_1_filter"
                 style="background:#f2f2f2;padding: 10px 0px;;text-align:right;border:1px #666;box-shadow:4px 2px 2px #333">
                <label>搜索: <input type="text" id="search"></label>
            </div>
            <div class="mws-panel-body no-padding">
                <form action='<?php echo U("Store:tagDoDel");?>' method="post">
                    <table class="mws-table">
                        <tbody id='tagCon'>
                        <tr>
                            <?php if(is_array($tags)): foreach($tags as $k=>$vo): echo ($k%5==0?'
                        </tr>
                        <tr>':''); ?>
                            <td width="14px"><input type="checkbox" name="ids[]" value="<?php echo ($vo['id']); ?>"></td>
                            <td class="tag"><?php echo ($vo['title']); ?></td><?php endforeach; endif; ?>
                        </tr>
                        </tbody>
                        <tr>
                            <td colspan="2"><a href="javascript:" id="checkAll" class="btn btn-danger">全选</a> <input
                                    type="submit" class="btn btn-danger" value="删除">
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <script type="text/javascript" src="/object/Public/js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript">

            //双击class=tag的标签时触发
            $('.tag').dblclick(function () {
                var t = $(this).html(); //获取当前标签内容
                $(this).html("<input type='text' value='" + $(this).text() + "'>"); //使用input框替换(进入编辑状态)
                $('.tag input').select(); //选中内容 使input获取到焦点

                //当input失去焦点
                $('.tag input').blur(function () {
                    var input = $(this); //将当前对象复制给input变量
                    var id = input.parent().prev().children().val(); //获取对应的id(父级的相邻上一个的input的value)
                    var title = $(this).val(); //获取当前input的值

                    //发送ajax请求去修改数据库
                    $.post('<?php echo U("Store:tagAjaxEdit");?>', {id: id, title: title}, function (msg) {
                        if (msg == 0) { //如果修改成功
                            input.parent().html(input.val()); //使用当前值替换input
                        } else { //如果失败
                            input.parent().html(t); //使用原值替换input
                        }
                    });
                })
            });

            // //全选按钮
            // var i = 0; //声明一个标识确认是否全选状态
            // function checkAll(){
            //      i++;
            //      if(i%2){ //如果没选中则全选中
            //          $("input[type=checkbox]").prop("checked", true);
            //      }else{ //如果选中则取消全选
            //          $("input[type=checkbox]").prop("checked", false);
            //      }
            // }

            // 全选按钮
            $("#checkAll").toggle(function () {  //第一次点击 全部选中
                $("input[type=checkbox]").prop("checked", true);
            }, function () { //第二次点击 取消全选
                $("input[type=checkbox]").prop("checked", false);
            });

            //搜索框键盘事件
            $("#search").keyup(function () {
                var sstr = $(this).val();
                $.post('<?php echo U("Store:tagAjaxSearch");?>', {str: sstr}, function (msg) {
                    var str = '<tr>';
                    if (msg == 1) {
                        str = '<tr><td>您要找的结果未找到</td></tr>';
                    }
                    for (var i = 0; i < msg.length; i++) {
                        str += i % 5 == 0 ? '</tr><tr>' : '';
                        str += '<td width="14px"><input type="checkbox" name="ids[]" value="' + msg[i]['id'] + '"></td>';
                        str += '<td class="tag">' + msg[i]['title'] + '</td>';
                    }
                    ;
                    str += '</tr>';
                    $("#tagCon").html(str);
                }, 'json')
            })
        </script><?php endif; ?>


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