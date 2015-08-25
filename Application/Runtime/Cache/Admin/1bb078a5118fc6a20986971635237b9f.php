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
    
    <title>资源添加</title>

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
            <span>资源添加 Store_goods</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form action="<?php echo U('Store:doadd');?>" class="mws-form" method="post" enctype="multipart/form-data">
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">标题</label>

                        <div class="mws-form-item">
                            <input type="text" class="medium" name="title">
                        </div>
                    </div>
                </div>
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">简介</label>

                        <div class="mws-form-item">
                            <textarea name="desc" cols="60"></textarea>
                        </div>
                    </div>
                </div>
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">所属分类</label>

                        <div class="mws-form-item">
                            <select name="cid">
                                <option value='0'>顶级分类</option>
                                <?php if(is_array($rows)): foreach($rows as $key=>$vo): ?><option value='<?php echo ($vo[' id
                                    ']); ?>'><?php echo ($vo['title']); ?></option><?php endforeach; endif; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">图标文件
                        </label>

                        <div class="mws-form-item small">
                            <input type="file" name="img">
                        </div>
                    </div>
                </div>
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">操控设备</label>

                        <div class="mws-form-item">
                            <select name="control_device">
                                <option value='0'>请选择操控设备</option>
                                <?php if(is_array($control_device)): foreach($control_device as $k=>$vo): ?><option value='<?php echo ($k); ?>'><?php echo ($vo); ?></option><?php endforeach; endif; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">描述图片
                        </label>

                        <div class="mws-form-item">
                            <script id="container" name="desc_img" type="text/plain"></script>
                        </div>
                    </div>
                </div>
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">开发者</label>

                        <div class="mws-form-item">
                            <input type="text" class="medium" name="author">
                        </div>
                    </div>
                </div>
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">版本号</label>

                        <div class="mws-form-item">
                            <input type="text" class="medium" name="version">
                        </div>
                    </div>
                </div>
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">大小</label>

                        <div class="mws-form-item">
                            <input type="text" class="small" name="size" style="width:100px"> 单位M
                        </div>
                    </div>
                </div>
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">适用平台</label>

                        <div class="mws-form-item">
                            <input type="text" class="medium" name="fix_os"> 多个使用英文逗号(,)分割
                        </div>
                    </div>
                </div>
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">浏览数</label>

                        <div class="mws-form-item">
                            <input type="text" class="small" name="acount" style="width:100px"> 次
                        </div>
                    </div>
                </div>
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">下载数</label>

                        <div class="mws-form-item">
                            <input type="text" class="small" name="dcount" style="width:100px"> 次
                        </div>
                    </div>
                </div>
                <!--  <div class="mws-form-inline">
                     <div class="mws-form-row">
                         <label class="mws-form-label">评论数</label>
                         <div class="mws-form-item">
                            <input type="text" class="small" name="size" style="width:100px">  次
                         </div>
                     </div>
                 </div> -->
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">标签</label>

                        <div class="mws-form-item small">
                            <input type="text" class="small" style="width:60%"> <span id="tagAdd"
                                                                                      class="btn btn-primary">添加</span>
                            <input type="hidden" class="small" name="tags">
                            <input type="hidden" class="small" name="tagsAdd">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <div class="mws-form-item mws-form-message info"
                             style="display:none;box-shadow:5px 5px 5px #333;width:300px;">
                            <span style="font-size:14px;font-weight:700;margin:20px 0;">[已选择标签]</span><br/>

                            <div id="tagShow"></div>
                            <span style="font-size:14px;font-weight:700;margin:20px 0;">[已添加标签]</span><br/>

                            <div id="tagAddShow"></div>
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <div class="mws-form-item">
                            <table>
                                <tr>
                                    <?php if(is_array($goods)): foreach($goods as $k=>$vo): echo ($k%5==0?'
                                </tr>
                                <tr>':''); ?>
                                    <td width="14px"><input type="checkbox" name="ids[]" value="<?php echo ($vo['id']); ?>"></td>
                                    <td class="tag"><?php echo ($vo['title']); ?></td><?php endforeach; endif; ?>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">下载连接</label>

                        <div class="mws-form-item">
                            <input type="text" class="medium" name="down_url" value="http://">格式http://url
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
    <!-- 配置文件 -->
    <script type="text/javascript" src="/object/Public/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="/object/Public/ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/object/Public/ueditor/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">

        var ue = UE.getEditor('container', {
            toolbars: [
                ['source', 'simpleupload', 'insertimage']
            ],
            initialFrameWidth: 600,
            initialFrameHeight: 300
        });

        $('input[type=checkbox]').change(function () {
            // if($(this).attr('checked')){
            //     $("#tagShow").append($(this).val()+',');
            // }
            check();
        })
        $('#tagAdd').click(function () {
            var a = $("input[name='tagsAdd']").val();
            var v = $(this).prev().val();
            if ($(this).prev().val() != '') {
                var reg = new RegExp(',' + v + ',');
                /**
                 //检测标签是否已经添加
                 if(!reg.test(','+a)){
                    $(".tag").each(function(){
                        if(v == $(this).html()){
                            alert("标签已存在");
                            v='';
                        }
                    });
                        if(v!=''){
                            a += v+',';
                            $("#tagAddShow").append(v+' || ');
                            $('.mws-form-message').slideDown();
                        }
                    }
                 */
                if (!reg.test(',' + a)) {
                    a += v + ',';
                    $("#tagAddShow").append(v + ' || ');
                    $('.mws-form-message').slideDown();
                } else {

                }

                $("input[name='tagsAdd']").val(a);
            }
        });

        function check() {
            var text = '';
            var tval = '';
            $("input:checkbox").each(function () {
                if ($(this).attr("checked")) {
                    text += $(this).val() + ',';
                    tval += ' ' + $(this).parent().next().html() + '  ||  ';
                }
            })
            if (text) {
                $('.mws-form-message').slideDown();
                var a = $("input[name='tagsAdd']").val();
                str = a.split(',');
                var s = '';
                for (var i = 0; i < str.length - 1; i++) {
                    s += str[i] + ' || ';
                }
                ;
                $("#tagAddShow").html(s);
            } else {
                $('.mws-form-message').slideUp();
            }
            $("#tagShow").html(tval);
            $("input[name=tags]").val(text);
        }
        check();
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