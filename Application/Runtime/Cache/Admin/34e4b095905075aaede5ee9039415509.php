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
    
        <title>用户添加</title>
    
    <style type="text/css">

        #mws-container {
            margin: 0px;
        }

        .mws-form-row {
            margin-top: -10px;
        }

        .mws-form-label {
        }
    </style>
</head>

<body>

<!-- Themer (Remove if not needed) -->

<!-- Themer End -->


    <div class="mws-panel grid_8 mws-collapsible">
        <div class="mws-panel-header">
            <span><i class="icon-table"></i>产品列表</span>
        </div>
        <div class="mws-panel-body no-padding">
            <table class="mws-table mws-datatable">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>品牌</th>
                    <th>产品称</th>
                    <th>价格</th>
                    <th>音效系统</th>
                    <th>尺寸</th>
                    <th>接口参数</th>
                    <th>商品属性</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>

                <?php if(is_array($pros)): foreach($pros as $key=>$vo): ?><tr>
                        <td><?php echo ($vo['id']); ?></td>

                        <td><?php echo ($data[$vo['brand']]); ?></td>

                        <td><?php echo ($vo['proname']); ?></td>
                        <td><?php echo ($vo['price']); ?></td>
                        <td><?php echo ($vo['sound_system']); ?></td>
                        <td><?php echo ($vo['size']); ?></td>
                        <td><?php echo ($vo['interface']); ?></td>
                        <td><a href="<?php echo U('Spec/index',array('id'=>$vo['id']));?>" class="btn btn-small"><font color="red">查看属性</font></a>
                        </td>
                        <td>
                                        <span class="btn-group">
                                            <a href="<?php echo U('Product/edit',array('id'=>$vo['id']));?>" class="btn btn-small"><i
                                                    class="icon-pencil"></i></a>
                                            <a href="<?php echo u('Product/delete',array('id'=>$vo['id']));?>"
                                               class="btn btn-small"><i class="icon-trash"></i></a>
                                        </span>
                        </td>
                    </tr><?php endforeach; endif; ?>
                </tbody>
            </table>
            <style type="text/css">

                #DataTables_Table_1_paginate a, #DataTables_Table_1_paginate span {
                    display: block;
                    float: left;
                    margin-right: 30px;
                    font-size: 16px;
                }
            </style>
            <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
                <?php echo ($page); ?>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="/object/Public/js/jquery-1.8.3.min.js"></script>

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

</body>
</html>