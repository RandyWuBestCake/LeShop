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
    
<title>配件添加</title>

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
    <script type="text/javascript" charset="utf-8" src="/object/Public/ueditor/ueditor.all.min.js"> </script>
    <script language="javascript" type="text/javascript" src="/object/Public/date/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" charset="utf-8" src="/object/Public/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/object/Public/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/object/Public/date/My97DatePicker/WdatePicker.js"></script>
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>配件添加</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form action="<?php echo U('Fit/insert');?>" class="mws-form" method="post" enctype="multipart/form-data">
        <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">配件分类</label>
                    <div class="mws-form-item" style="width:600px;">
                        <select class="large" name='cate'>
                            <option value="0">请选择</option>
                            <?php if(is_array($cates)): foreach($cates as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
                        </select>
                    </div>
                </div> 
                <div class="mws-form-row">
                    <label class="mws-form-label">配件名称</label>
                    <div class="mws-form-item">
                        <!-- <span>※</span> -->
                        <input type="text" class="small" name='name'>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">配件价格</label>
                    <div class="mws-form-item">
                    <!-- <span>※</span> -->
                        <input type="text" class="small" name='price'>
                    </div>
                </div>

<!--                 <div class="mws-form-row">
                    <label class="mws-form-label">配件范畴</label>
                    <div class="mws-form-item" style="width:600px;">
                        <select class="large" name="status">
                            <option value="0">请选择</option>
                            <?php if(is_array($status)): foreach($status as $key=>$vo): ?><option value="<?php echo ($k); ?>"><?php echo ($vo); ?></option><?php endforeach; endif; ?>
                        </select>
                    </div>
                </div>  -->
                <div class="mws-form-row">
                    <label class="mws-form-label">配件简介</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='headline'>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">适用机型</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='fit'>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">配送区域</label>
                    <div class="mws-form-item" style="width:600px;">
                        <select class="large" name="sendarea">
                            <option value="0">请选择</option>
                            <?php if(is_array($province)): foreach($province as $k=>$vo): ?><option value="<?php echo ($k); ?>"><?php echo ($k); echo ($vo); ?></option><?php endforeach; endif; ?>
                        </select>
                        <span style="font-size:12px;">☆温馨提示：如果要添加的分类是最顶级分类,此处无须修改(状态保持在"请选择");☆</span>
                    </div>
                </div> 
                <!-- <div class="mws-form-row">
                    <label class="mws-form-label">商品库存数量</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='amount'>
                    </div>
                </div> -->
                <div class="mws-form-row">
                    <label class="mws-form-label">评价等级</label>
                    <div class="mws-form-item" style="width:600px;">
                        <select class="large" name="grade">
                            <option value="5">5星级</option>
                            <option value="4">4星级</option>
                            <option value="3">3星级</option>
                            <option value="2">2星级</option>
                            <option value="1">1星级</option>
                        </select>
                        <!-- <span style="font-size:12px;">☆温馨提示：如果要添加的分类是最顶级分类,此处无须修改(状态保持在"请选择");☆</span> -->
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">配件主图</label>
                    <div class="mws-form-item">
                        <input type="file" class="small" name='img'>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">商品介绍</label>
                    <div class="mws-form-item">
                    <script id="editor" type="text/plain" style="width:1024px;height:500px;" name="desc"></script>
                    <script type="text/javascript">
                        var ue = UE.getEditor('editor',{
                            initialFrameWidth:680,
                            initialFrameHeight:320
                        });
                    </script>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">参数规格</label>
                    <div class="mws-form-item">
                    <script id="editor_param" type="text/plain" style="width:1024px;height:500px;" name="param"></script>
                    <script type="text/javascript">
                        var ue = UE.getEditor('editor_param',{
                            initialFrameWidth:680,
                            initialFrameHeight:320
                        });
                    </script>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">修改时间</label>
                    <div class="mws-form-item">
                        <input type="text" class="small Wdate" name="addtime" onClick="WdatePicker()" >
                    </div>
                </div> 
        </div>
            <div class="mws-button-row">
                <input type="submit" class="btn btn-danger" value="点击添加">
                <input type="reset" class="btn " value="重置">
            </div>
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