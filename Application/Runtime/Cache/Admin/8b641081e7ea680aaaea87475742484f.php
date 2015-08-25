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


    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">

        <!-- Necessary markup, do not remove -->
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">

            <!-- Inner Container Start -->
            <div class="container">
                <block name="con">
                    <div class="mws-panel grid_8">
                        <div class="mws-panel-header">
                            <span>产品添加</span>
                        </div>
                        <div class="mws-panel-body no-padding">
                            <form action="<?php echo U('Product/insert');?>" class="mws-form" method="post"
                                  enctype="multipart/form-data">
                                <div class="mws-form-inline">
                                    <div class="mws-form-row">
                                        <label class="mws-form-label">品牌</label>

                                        <div class="mws-form-item" style="width:150px">
                                            <select class="large" name="brand">
                                                <?php if(is_array($brands)): foreach($brands as $key=>$vo): ?><option value="<?php echo ($vo['id']); ?>"><?php echo ($vo['bname']); ?></option><?php endforeach; endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mws-form-row">
                                        <label class="mws-form-label">产品名</label>

                                        <div class="mws-form-item">
                                            <input type="text" class="small" name="proname">
                                        </div>
                                    </div>
                                    <div class="mws-form-row">
                                        <label class="mws-form-label">价格</label>

                                        <div class="mws-form-item">
                                            <input type="text" class="small" name="price">
                                        </div>
                                    </div>
                                    <div class="mws-form-row img">
                                        <label class="mws-form-label">主图</label>

                                        <div class="mws-form-item" style="width:300px">
                                            <input type="file" class="small" name="imgmain">
                                        </div>
                                    </div>
                                    <div class="mws-form-row img">
                                        <label class="mws-form-label">側面图</label>

                                        <div class="mws-form-item" style="width:300px">
                                            <input type="file" class="small" name="imgside">
                                        </div>
                                    </div>
                                    <div class="mws-form-row img">
                                        <label class="mws-form-label">背面图</label>

                                        <div class="mws-form-item" style="width:300px">
                                            <input type="file" class="small" name="imgback">
                                        </div>
                                    </div>
                                    <div class="mws-form-row">
                                        <label class="mws-form-label">音效系统</label>

                                        <div class="mws-form-item">
                                            <input type="text" class="small" name="sound_system">
                                        </div>
                                    </div>

                                    <div class="mws-form-row">
                                        <label class="mws-form-label">尺寸</label>

                                        <div class="mws-form-item">
                                            <input type="text" class="small" name="size">
                                        </div>
                                    </div>
                                    <div class="mws-form-row">
                                        <label class="mws-form-label">接口参数</label>

                                        <div class="mws-form-item">
                                            <input type="text" class="small" name="interface">
                                        </div>
                                    </div>
                                    <div class="mws-form-row">
                                        <label class="mws-form-label">分辨率</label>

                                        <div class="mws-form-item">
                                            <input type="text" class="small" name="resolution">
                                        </div>
                                    </div>
                                    <div class="mws-form-row">
                                        <label class="mws-form-label">整机重量</label>

                                        <div class="mws-form-item">
                                            <input type="text" class="small" name="weight">
                                        </div>
                                    </div>
                                    <div class="mws-form-row">
                                        <label class="mws-form-label">最佳观看距离</label>

                                        <div class="mws-form-item">
                                            <input type="text" class="small" name="view_distance">
                                        </div>
                                    </div>
                                    <div class="mws-form-row">
                                        <label class="mws-form-label">产品定位</label>

                                        <div class="mws-form-item">
                                            <input type="text" class="small" name="product_position">
                                        </div>
                                    </div>
                                    <div class="mws-form-row">
                                        <label class="mws-form-label">产品标签</label>

                                        <div class="mws-form-item clearfix" style="width:100px">
                                            <select class="large" name="tag">
                                                <?php if(is_array($tags)): foreach($tags as $key=>$vo): if(($vo['type']) == "0"): ?><option value="<?php echo ($vo['id']); ?>"><?php echo ($vo['tag']); ?></option><?php endif; endforeach; endif; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mws-form-row">
                                        <label class="mws-form-label">产品描述</label>

                                        <div class="mws-form-item clearfix">
                                            <ul class="mws-form-list inline">
                                                <?php if(is_array($tags)): foreach($tags as $key=>$vo): if(($vo['type']) == "1"): ?><li><input type="checkbox" name="tags[]" value="<?php echo ($vo['id']); ?>">
                                                            <label><?php echo ($vo['tag']); ?></label></li><?php endif; endforeach; endif; ?>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <div class="mws-button-row">
                                    <input type="submit" class="btn btn-danger" value="点击添加">
                                    <input type="reset" class="btn " value="重置">
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Panels End -->
                

            </div>
            <!-- Inner Container End -->


        </div>
        <!-- Main Container End -->

    </div>
</block>
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