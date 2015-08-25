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
            
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
<link rel="stylesheet" type="text/css" href="__ADMINCSS__/bootstrap.min.css" />
<script type="text/javascript" src="__ADMINJS__/jquery-1.4.2.min.js"></script>
 
<script type="text/javascript" src="__UPLOADIFY__/jquery.uploadify.min.js"></script>
<link rel="stylesheet" type="text/css" href="__UPLOADIFY__/uploadify.css" />
<script type="text/javascript" src="__ADMINJS__/uploadify.js"></script>

</head>
<body>
<div class="mws-panel grid_8 mws-collapsible">
        <div class="mws-panel-header">
            <span><i class="icon-table"></i>网站配置</span>
        </div>
<form action="/object/index.php/Admin/System/ModSysHandle" class="form" method="post" enctype="multipart/form-data">
   <div class="mws-panel-body no-padding">
            <table class="mws-table mws-datatable">
        <tr>
            <td align="right">网站LOGO：</td>
            <td ><img src="<?php echo ($logo); ?>" alt="" width=""/></td>
        </tr>
        <tr>
            <td align="right">LOGO上传</td>
            <td>
                <input type="file" id="face" name="face" />
            </td>
        </tr>
        <tr>
            <td align="right">网站关键字：</td>
            <td><input type="text" name="HTTP_KEYWORDS" value="<?php echo ($keywords); ?>" style="width:600px" /></td>
        </tr>
        <tr>
            <td align="right">网站版权：</td>
            <td><input type="text" name="HTTP_COPY" value="<?php echo ($copy); ?>" style="width:600px"></td>
        </tr>
        <tr>
            <td align="right">网站描述：</td>
            <td><input type="text" name="HTTP_DESCRIPTION" value="<?php echo ($description); ?>" style="width:600px"></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" value="保存提交" /></td>
        </tr>
    </table>
    </div>
    </form>
    </div>
    <!-- 'HTTP_KEYWORDS' => 'LAMP,PHP,PHP95,项目二,雄赳赳小组,仿乐视商城,乐商',
            'HTTP_COPY' => '版权所有雄赳赳小组 LAMP兄弟连的第二个项目,欢迎大家交流.',
            'HTTP_DESCRIPTION'=>'欢迎使用乐商,这是雄赳赳小组在 LAMP兄弟连的第二个项目,欢迎大家交流.', -->
</body>
</html>



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