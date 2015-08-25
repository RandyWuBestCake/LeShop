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
    
    <title>订单列表及详情</title>

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
            
    <script type="text/javascript" charset="utf-8" src="/object/Public/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/object/Public/ueditor/ueditor.all.min.js"></script>
    <script language="javascript" type="text/javascript" src="/object/Public/date/My97DatePicker/WdatePicker.js"></script>
    <script type="text/javascript" charset="utf-8" src="/object/Public/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/object/Public/ueditor/ueditor.all.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/object/Public/date/My97DatePicker/WdatePicker.js"></script>
    <div class="mws-form-message error" style="display:none">
        This is an error message
    </div>
    <div class="mws-form-message success" style="display:none">
        This is a success message
    </div>

    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span><i class="icon-table"></i>订单列表及详情</span>
        </div>
        <div class="mws-panel-body no-padding">
            <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">
                <div id="DataTables_Table_1_length" class="dataTables_length"><label>显示<select
                        name="DataTables_Table_1_length" size="1" aria-controls="DataTables_Table_1">

                    <option value="10"
                    <?php if(($num) == "10"): ?>selected ="selected"<?php endif; ?>
                    >10</option>

                    <option value="25"
                    <?php if(($num) == "25"): ?>selected ="selected"<?php endif; ?>
                    >25</option>

                    <option value="50"
                    <?php if(($num) == "50"): ?>selected ="selected"<?php endif; ?>
                    >50</option>
                    <option value="100"
                    <?php if(($num) == "100"): ?>selected ="selected"<?php endif; ?>
                    >100</option></select> 条数据</label></div>
                <div class="dataTables_filter" id="DataTables_Table_1_filter"><label>Search: <input type="text"
                                                                                                    aria-controls="DataTables_Table_1"></label>
                </div>
                <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
                       aria-describedby="DataTables_Table_1_info">
                    <thead>
                    <tr role="row">
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width: 144px;" aria-sort="ascending"
                            aria-label="Rendering engine: activate to sort column descending">订单ID
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width: 189px;"
                            aria-label="Browser: activate to sort column ascending">订单号
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width: 177px;"
                            aria-label="Platform(s): activate to sort column ascending">订单时间
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width: 177px;"
                            aria-label="Platform(s): activate to sort column ascending">商品名称
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width: 177px;"
                            aria-label="Platform(s): activate to sort column ascending">订单状态
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width: 177px;"
                            aria-label="Platform(s): activate to sort column ascending">快递单号
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width: 87px;"
                            aria-label="CSS grade: activate to sort column ascending">详情
                        </th>
                    </tr>
                    </thead>
                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                    <?php if(is_array($orderInfo)): foreach($orderInfo as $key=>$vo): ?><tr class="<?php echo $key%2==0 ? " odd
                        " :"even"; ?>">
                        <td class=""><?php echo ($vo["id"]); ?></td>
                        <!-- 使用变量调节器来获取数据库内容 -->
                        <td class=" "><?php echo ($vo["order_num"]); ?></td>
                        <td class=" "><?php echo ($vo["order_time"]); ?></td>
                        <td class=" "><?php echo ($vo["name"]); ?></td>
                        <td class=" ">
                            <select class="large" name='order_status'>
                                <option value="0"
                                <?php if(($vo["order_status"]) == "0"): ?>selected ="selected"<?php endif; ?>
                                >请选择</option>
                                <option value="1"
                                <?php if(($vo["order_status"]) == "1"): ?>selected ="selected"<?php endif; ?>
                                >提交订单</option>
                                <option value="2"
                                <?php if(($vo["order_status"]) == "2"): ?>selected ="selected"<?php endif; ?>
                                >付款成功</option>
                                <option value="3"
                                <?php if(($vo["order_status"]) == "3"): ?>selected ="selected"<?php endif; ?>
                                >商品生产</option>
                                <option value="4"
                                <?php if(($vo["order_status"]) == "4"): ?>selected ="selected"<?php endif; ?>
                                >商品配货</option>
                                <option value="5"
                                <?php if(($vo["order_status"]) == "5"): ?>selected ="selected"<?php endif; ?>
                                >商品出库</option>
                                <option value="6"
                                <?php if(($vo["order_status"]) == "6"): ?>selected ="selected"<?php endif; ?>
                                >等待收货</option>
                                <option value="7"
                                <?php if(($vo["order_status"]) == "7"): ?>selected ="selected"<?php endif; ?>
                                >完成</option>
                            </select>
                        </td>
                        <td class=" "><?php echo ($vo["express_list_num"]); ?></td>
                        <td class=" ">
                            <a class="icon-attach" href="<?php echo U('Order/detail',array('id'=>$vo['id']));?>"><i
                                    class="icon-pencil"></i></a>
                        </td>
                        </tr><?php endforeach; endif; ?>
                    </tbody>
                </table>
                <style type="text/css">
                    #DataTables_Table_1_paginate a, #DataTables_Table_1_paginate span {
                        display: block;
                        float: left;
                        margin-right: 40px;
                        font-size: 16px;
                    }
                </style>
                <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
                    <?php echo ($page); ?>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="/object/Public/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript">

        $(function () {
            //绑定change事件修改  每页显示的数量
            $('select').change(function () {
                var num = $(this).val();
                $.get('/object/index.php/Admin/Order/changeNum', {num: num}, function () {
                    location.href = '/object/index.php/Admin/Order/index';
                });
            })

            $('.username,.email').dblclick(function (event) {
                //获取当前的值
                var v = $(this).text();
                //创建新节点
                var input = $('<input type="text" />');

                //清空内容
                $(this).empty();
                //插入input节点
                $(this).append(input);
                input.focus();
                //设置值
                input.val(v);
                input.select();

                //绑定丧失焦点事件
                input.blur(function () {
                    //获取当前input的值
                    var v = $(this).val();
                    //获取字段名
                    var name = $(this).parent().attr('class');
                    //获取tr父级元素
                    var id = $(this).parents('tr').find('td:first').text();
                    //获取当前的节点
                    var node = $(this);
                    //发送ajax修改用户信息
                    $.get('<?php echo U("User/ajaxUpdate");?>', {id: id, name: name, value: v}, function (msg) {
                        if (msg == 0) {
                            show('success', '用户更新成功', 3000);
                        } else {
                            show('error', '用户更新失败', 5000);
                        }
                        node.parent().html(v);
                    })
                })
            });

            //show('success','用户更新成功');
            //show('error','用户更新失败');
            function show(type, msg, timeout) {
                if (type == 'success') {
                    $('.success').html(msg);
                    $('.success').show();
                } else {
                    $('.error').html(msg);
                    $('.error').show();
                }
                setTimeout(function () {
                    $('.success,.error').fadeOut();
                }, timeout)
            }
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