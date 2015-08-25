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
    
    <title>订单详情及评价</title>

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
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span>订单详情及评价</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form action="<?php echo U('Goodsassess/update');?>" class="mws-form" method="post" enctype="multipart/form-data">
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">订单ID</label>

                        <div class="mws-form-item">
                            <!-- <span>※</span> -->
                            <input type="text" class="small" name='id' value="<?php echo ($info['id']); ?>" readonly>
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">订单号</label>

                        <div class="mws-form-item">
                            <!-- <span>※</span> -->
                            <input type="text" class="small" name='order_num' value="<?php echo ($info['order_num']); ?>" readonly>
                        </div>
                    </div>
                    <hr style="border:1px dashed #CCCCCC;height:1px"/>
                    <hr style="border:1px dashed #CCCCCC;height:1px"/>
                    <span style="display:block;width:150px;height:45px;font-size:18px;font-weight:bold;color:#345">评价详情>>>>>>></span>

                    <div class="mws-form-row">
                        <label class="mws-form-label">评价时间</label>

                        <div class="mws-form-item">
                            <input type="text" class="small" name='ass_time' value="<?php echo ($info['ass_time']); ?>">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">评价内容</label>

                        <div class="mws-form-item">
                            <!-- <span>※</span> -->
                            <script id="editor" type="text/plain" style="width:1024px;height:500px;" name="con">
                                <?php echo ($info['con']); ?>
                            </script>
                            <script type="text/javascript">
                                var ue = UE.getEditor('editor', {
                                    initialFrameWidth: 680,
                                    initialFrameHeight: 320
                                });
                            </script>
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">评价等级</label>

                        <div class="mws-form-item">
                            <input type="text" class="small" name='grade' value="<?php echo ($info['grade']); ?>">星级
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">晒单图</label>

                        <div class="mws-form-item">
                            <!-- <span>※</span> -->
                            <!-- ****************************晒单图引用地址************************* -->
                            <img src="/object<?php echo ($img['0']); ?>" alt="" width="250px" height="150px" border="1px solid red"
                                 name="img0">
                            <input type="file" class="small" name='img0'>
                            <br>
                            <img src="/object<?php echo ($img['1']); ?>" alt="" width="250px" height="150px" border="1px solid red"
                                 name="img1">
                            <input type="file" class="small" name='img1'>
                            <br>
                            <img src="/object<?php echo ($img['2']); ?>" alt="" width="250px" height="150px" border="1px solid red"
                                 name="img2">
                            <input type="file" class="small" name='img2'>
                            <!-- ****************************晒单图引用地址************************* -->
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">"赞"数量</label>

                        <div class="mws-form-item">
                            <!-- <span>※</span> -->
                            <input type="text" class="small" name='ok_amount' value="<?php echo ($info['ok_amount']); ?>">个
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">评价状态</label>

                        <div class="mws-form-item">
                            <!-- <span>※</span> -->
                            <input type="radio" name="status" value="0"
                            <?php if(($info['status']) == "0"): ?>checked = "checked"<?php endif; ?>
                            >前台显示开启
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="status" value="1"
                            <?php if(($info['status']) == "1"): ?>checked = "checked"<?php endif; ?>
                            >前台显示屏蔽
                            <!-- <input type="text" class="small" name='order_amount' value="<?php echo ($info['status']); ?>"> -->
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">处理人</label>

                        <div class="mws-form-item">
                            <input type="text" class="small" name='manager' readonly>
                        </div>
                    </div>
                    <div class="mws-button-row">
                        <input type="hidden" name="id" value="<?php echo ($info['id']); ?>">
                        <input type="submit" class="btn btn-danger" value="点击修改">
                        <!-- <input type="reset" class="btn " value="重置"> -->
                    </div>
            </form>
            <!--                 <hr style="border:1px dashed #CCCCCC;height:1px" /> -->
            <hr style="border:1px dashed #CCCCCC;height:1px"/>
            <span style="display:block;width:150px;height:45px;font-size:18px;font-weight:bold;color:#345;">订单详情>>>>>>></span>

            <div class="mws-form-row">
                <label class="mws-form-label">订单商品名称</label>

                <div class="mws-form-item">
                    <!-- <span>※</span> -->
                    <input type="text" class="small" name='order_time' value="<?php echo ($info['name']); ?>" readonly>
                </div>
            </div>
            <div class="mws-form-row">
                <label class="mws-form-label">商品单价</label>

                <div class="mws-form-item">
                    <!-- <span>※</span> -->
                    <input type="text" class="small" name='order_amount' value="<?php echo ($info['price']); ?>" readonly>
                </div>
            </div>
            <div class="mws-form-row">
                <label class="mws-form-label">预定数量</label>

                <div class="mws-form-item">
                    <!-- <span>※</span> -->
                    <input type="text" class="small" name='order_amount' value="<?php echo ($orderInfo['order_amount']); ?>" readonly>
                </div>
            </div>
            <div class="mws-form-row">
                <label class="mws-form-label">订单用户名</label>

                <div class="mws-form-item">
                    <!-- <span>※</span> -->
                    <input type="text" class="small" name='order_amount' value="<?php echo ($info['amount']); ?>" readonly>
                </div>
            </div>

            <hr style="border:1px dashed #CCCCCC;height:1px"/>
            <hr style="border:1px dashed #CCCCCC;height:1px"/>
            <span style="display:block;width:150px;height:45px;font-size:18px;font-weight:bold;color:#345;">配送详情>>>>>>></span>
            <!-- 收货信息,配送信息 -->
            <div class="mws-form-row">
                <label class="mws-form-label">配送信息</label>

                <div class="mws-form-item">
                    <input type="text" class="small" name='deliveryinfo' value="快递配送（配送费:￥0.00" readonly>
                </div>
            </div>
            <!--                 <div class="mws-form-row">
                                <label class="mws-form-label">收货人</label>
                                <div class="mws-form-item">
                                    <input type="text" class="small" name='deliveryinfo_id'>
                                </div>
                            </div> -->
            <div class="mws-form-row">
                <label class="mws-form-label">收货人姓名</label>

                <div class="mws-form-item">
                    <input type="text" class="small" name='name' value="<?php echo ($cinfo['name']); ?>" readonly>
                </div>
            </div>
            <div class="mws-form-row">
                <label class="mws-form-label">固定电话</label>

                <div class="mws-form-item">
                    <input type="text" class="small" name='fix_phone' value="<?php echo ($cinfo['fix_phone']); ?>" readonly>
                </div>
            </div>
            <div class="mws-form-row">
                <label class="mws-form-label">移动电话</label>

                <div class="mws-form-item">
                    <input type="text" class="small" name='mobile_phone' value="<?php echo ($cinfo['mobile_phone']); ?>" readonly="">
                </div>
            </div>
            <div class="mws-form-row">
                <label class="mws-form-label">收货地址</label>

                <div class="mws-form-item">
                    <input type="text" class="small" name='address' value="<?php echo ($cinfo['address']); ?>" readonly="">
                </div>
            </div>
            <div class="mws-form-row">
                <label class="mws-form-label">邮政编码</label>

                <div class="mws-form-item">
                    <input type="text" class="small" name='postal_code' value="<?php echo ($cinfo['postal_code']); ?>" readonly="">
                </div>
            </div>
            <hr style="border:1px dashed #CCCCCC;height:1px"/>
            <hr style="border:1px dashed #CCCCCC;height:1px"/>
            <span style="display:block;width:150px;height:45px;font-size:18px;font-weight:bold;color:#345;">支付详情>>>>>>></span>
            <!-- 支付方式 -->
            <div class="mws-form-row">
                <label class="mws-form-label">支付类型</label>

                <div class="mws-form-item">
                    <input type="text" class="small" name='deliveryinfo_id' value="<?php echo ($pinfo['type']); ?>" readonly="">
                </div>
            </div>
            <div class="mws-form-row">
                <label class="mws-form-label">发票类型</label>

                <div class="mws-form-item">
                    <input type="text" class="small" name='receipt_type' value="普通发票" readonly>
                </div>
            </div>
            <div class="mws-form-row">
                <label class="mws-form-label">订单状态</label>
                <!--                     <div class="mws-form-item" style="width:600px;">
                                        <select class="large" name='order_status'>
                                            <option value="0" <?php if(($orderInfo['order_status']) == "0"): ?>selected ="selected"<?php endif; ?>>请选择</option>
                                            <option value="1" <?php if(($$orderInfo['order_status']) == "1"): ?>selected ="selected"<?php endif; ?>>提交订单</option>
                                            <option value="2" <?php if(($orderInfo['order_status']) == "2"): ?>selected ="selected"<?php endif; ?>>付款成功</option>
                                            <option value="3" <?php if(($$orderInfo['order_status']) == "3"): ?>selected ="selected"<?php endif; ?>>商品生产</option>
                                            <option value="4" <?php if(($orderInfo['order_status']) == "4"): ?>selected ="selected"<?php endif; ?>>商品配货</option>
                                            <option value="5" <?php if(($$orderInfo['order_status']) == "5"): ?>selected ="selected"<?php endif; ?>>商品出库</option>
                                            <option value="6" <?php if(($$orderInfo['order_status']) == "6"): ?>selected ="selected"<?php endif; ?>>等待收货</option>
                                            <option value="7" <?php if(($$orderInfo['order_status']) == "7"): ?>selected ="selected"<?php endif; ?>>完成</option>
                                        </select>
                                    </div>
                                </div>  -->

                <div class="mws-form-row">
                    <label class="mws-form-label">快递单号</label>

                    <div class="mws-form-item">
                        <input type="text" class="small" name='express_list_num' readonly>
                    </div>
                </div>
                <hr style="border:1px dashed #CCCCCC;height:1px"/>
                <hr style="border:1px dashed #CCCCCC;height:1px"/>
                <span style="display:block;width:150px;height:45px;font-size:18px;font-weight:bold;color:#345;">优惠详情>>>>>>></span>

                <div class="mws-form-row">
                    <label class="mws-form-label">优惠类型</label>

                    <div class="mws-form-item">
                        <input type="text" class="small" name='coupon_type' value="优惠码" readonly>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">优惠信息</label>

                    <div class="mws-form-item">
                        <input type="text" class="small" name='coupon_info' value="<?php echo ($orders['coupon_info']); ?>" readonly>
                    </div>
                </div>

            </div>

        </div>
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