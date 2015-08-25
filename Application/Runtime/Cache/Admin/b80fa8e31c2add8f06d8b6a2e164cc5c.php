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
    
<title>库存调节</title>

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
        <span>库存调节</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form action="<?php echo U('Amount/insert');?>" class="mws-form" method="post" enctype="multipart/form-data">
        <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">商品名称</label>
                    <div class="mws-form-item" style="width:600px;">
                        <select class="large" name='goods_id'>
                            <option value="0">请选择</option>
                            <?php if(is_array($Info)): foreach($Info as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["id"]); echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
                        </select>
                    </div>
                </div> 
                <div class="mws-form-row">
                    <label class="mws-form-label">实际库存数量</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='real_amount'>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">虚拟库存数量</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='sup_amount'>
                    </div>
                </div>
        </div>
         <script type="text/javascript" src="/object/Public/js/libs/jquery-1.8.3.js"></script>
                <script type="text/javascript">
                
                    //获取节点
                    $('select').change(function(){
                        var v = $(this).val();

                        $.get("<?php echo U('Amount/add');?>",{id:v},function(msg){
                            console.log(msg);
                            // $('input[name=unit_price]').val(msg['price']);
                            // alert(msg);
                            $('input[name=real_amount]').val(msg['real_amount']);
                            $('input[name=sup_amount]').val(msg['sup_amount']);
                        });
                    });
                </script>
            <div class="mws-button-row">
                <input type="submit" class="btn btn-danger" value="点击调节">
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