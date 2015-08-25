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
    
    <title>用户修改</title>

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
            <span>用户修改</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form action="<?php echo U('User/update');?>" class="mws-form" method="post" enctype="multipart/form-data">
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">用户名</label>

                        <div class="mws-form-item">
                            <input type="text" class="small" name='username' value="<?php echo ($userInfo['username']); ?>">
                        </div>
                    </div>

                    <!-- <div class="mws-form-row">
                       <label class="mws-form-label">密码</label>
                       <div class="mws-form-item">
                           <input type="password" class="small" name="password" value="<?php echo ($userInfo['password']); ?>">
                       </div>
                   </div> -->

                    <div class="mws-form-row">
                        <label class="mws-form-label">用户状态</label>

                        <div class="mws-form-item clearfix">
                            <ul class="mws-form-list inline">
                                <li>
                                    <input type="radio" name="status" value="1"
                                    <?php if(($userInfo['status']) == "1"): ?>checked = "checked"<?php endif; ?>
                                    > <label>允许登录</label></li>
                                <li><input type="radio" name="status" value="0"
                                    <?php if(($userInfo['status']) == "0"): ?>checked = "checked"<?php endif; ?>
                                    > <label>禁止登录</label></li>
                            </ul>
                        </div>
                    </div>

                    <div class="mws-form-row">
                        <label class="mws-form-label">昵称</label>

                        <div class="mws-form-item">
                            <input type="text" class="small" name="nickname" value="<?php echo ($userInfo['nickname']); ?>">
                        </div>
                    </div>

                    <div class="mws-form-row">
                        <label class="mws-form-label">性别</label>

                        <div class="mws-form-item clearfix">
                            <ul class="mws-form-list inline">
                                <li>
                                    <input type="radio" name="sex" value="1"
                                    <?php if(($userInfo['sex']) == "1"): ?>checked = "checked"<?php endif; ?>
                                    > <label>男</label></li>
                                <li><input type="radio" name="sex" value="0"
                                    <?php if(($userInfo['sex']) == "0"): ?>checked = "checked"<?php endif; ?>
                                    > <label>女</label></li>
                            </ul>
                        </div>
                    </div>

                    <div class="mws-form-row">
                        <label class="mws-form-label">等级</label>

                        <div class="mws-form-item">
                            <input type="text" class="small" name="level" value="<?php echo ($userInfo['level']); ?>">
                        </div>
                    </div>

                    <div class="mws-form-row">
                        <label class="mws-form-label">邮箱</label>

                        <div class="mws-form-item">
                            <input type="text" class="small" name="email" value="<?php echo ($userInfo['email']); ?>">
                        </div>
                    </div>

                    <div class="mws-form-row">
                        <label class="mws-form-label">手机号</label>

                        <div class="mws-form-item">
                            <input type="text" class="small" name="tel" value="<?php echo ($userInfo['tel']); ?>">
                        </div>
                    </div>

                    <div class="mws-form-row">
                        <label class="mws-form-label">头像</label>

                        <div class="mws-form-item">
                            <img src="/object<?php echo ($userInfo['img']); ?>" alt="" width="200">
                            <input type="file" class="small" name="img">
                        </div>
                    </div>


                    <div class="mws-form-row">
                        <label class="mws-form-label">地址</label>

                        <div class="mws-form-item">
                            <input type="text" class="small" name="address" value="<?php echo ($userInfo['address']); ?>">
                        </div>
                    </div>


                </div>
                <div class="mws-button-row">
                    <input type="hidden" name="id" value="<?php echo ($userInfo['id']); ?>">
                    <input type="submit" class="btn btn-danger" value="点击修改">
                    <input type="reset" class="btn " value="重置">
                </div>
            </form>
        </div>
    </div>



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