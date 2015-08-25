<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>用户中心</title>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <link rel="Shortcut Icon" href="/object/Public/images/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="/object/Public/css/Content/top.css"/>
    <link rel="stylesheet" type="text/css" href="/object/Public/css/Content/register.css">
</head>
<script type="text/javascript" src="/object/Public/js/jquery-1.8.3.min.js"></script>
<body>
<div class="register-box">
    <a class="pop_head_btn_close" href="<?php echo U('Home/Index/index');?>"></a>

    <div class="regi-tit1">
        <h2>找回密码</h2>
    </div>
    <div class="regi-cnt">
        <div class="regi-pass-tit">
            <h3>邮箱注册用户：</h3>
        </div>
        <input type="hidden" name="emailPreInput" value="" id="emailPreInput"/>
        <input type="hidden" name="next_action" value="" id="next_action"/>
        <ul class="login-form">
            <li class="login_form_input">
                <input type="text" tabindex="1" value="" id="email" name="email" class="login-input" placeholder="邮箱"/>
            </li>
            <li id="codeItem">
            <span class="login_form_input pwd_find">
              <input type="text" tabindex="2" class="login-input login-inputS" name="regcode" placeholder="验证码"
                     maxlength="4" id="verifycode"/> <i class="login-input-num"></i>
            </span>
                <a href="javascript:;" class="login-verification j-change-code" title="看不清？点击换一张">
                    <img class="j-code-btn" onclick="this.src='<?php echo U('Helpself/vcode');?>?p='+Math.random()"
                         k-name="send-stat" k-data="yanzhengma" src="<?php echo U('Helpself/vcode');?>" id="getRegCode"/>
                </a>
            </li>
            <li class="li03">
                <a class="regi-code phone-login regi-btn-no" tabindex="3" id="submitReg" title="发送找回密码邮件">发送找回密码邮件</a>
            </li>
        </ul>
        <div style="width:0px;height:1px;overflow:hidden;">
            <input type="submit" value="tj" name="oj9s30k"/>
        </div>
        <div class="Line"></div>
    </div>
    <div class="regi-other">
        我知道密码了，
        <a href="/?ver=2.0" class="blu">立即登录</a>
    </div>
</div>

<div style="z-index: 1900; display: none; height:20px;top: 140px;" class="regi-tip">
    <i class="tip-larr"></i>
    <i class="tip-warn"></i>此邮箱尚未注册，<a href="javascript:;" class="blu" k-name="jihuo">点此注册</a>
</div>

<script type="text/javascript">
    //email文本框 获取焦点
    $("#email").focus(function () {
        $('.regi-tip').hide();
    });
    //email 文本框丢失焦点事件
    $("#email").blur(function () {
        //获取输入的email
        var email = $(this).val();
        //获取当前对象
        var t = $(this);
        // 获取提示框的左边栏位置
        var _left = t.offset().left + t.parents('ul').width();
        // 假如 email为空
        if (email == '') {
            $('.regi-tip').css('left', _left);
            $('.regi-tip').html('<i class="tip-larr"></i><i class="tip-warn"></i>请输入邮箱地址');
            $('.regi-tip').show();
            return false;
        } else {
            var reg = /^[\w-\.]+@[\w-]+(\.\w+){1,3}$/;
            if (!reg.test(email)) {
                $('.regi-tip').html('<i class="tip-larr"></i><i class="tip-warn"></i>请输入正确的邮箱地址');
                $('.regi-tip').css('left', _left);
                $('.regi-tip').show();
                return false;
            }
        }
        $.post('<?php echo U("Helpself:checkEmail");?>', {email: email}, function (msg) {
            if (msg != 0) {
                $('.regi-tip').html('<i class="tip-larr"></i><i class="tip-warn"></i>此邮箱尚未注册，<a href="javascript:;" class="blu" k-name="jihuo">点此注册</a>');
                $('.regi-tip').css('left', _left);
                $('.regi-tip').show();
            } else {
                $('.regi-tip').hide();
            }
        });
    });

    $("#verifycode").keyup(function () {
        sendMailHref();
    });

    $("#submitReg").click(function () {
        if (!$("#submitReg").hasClass('regi-btn-no')) {
            $.post('<?php echo U("Helpself:sendMail");?>', {
                email: $("#email").val(),
                vcode: $("#verifycode").val()
            }, function (msg) {
                if (msg == 1) {
                    alert('验证码错误');
                    $('#getRegCode').attr('src', '<?php echo U('Helpself:vcode');?>?p=' + Math.random()
                )
                } else if (msg == 2) {
                    alert('邮箱不存在');
                    $('#getRegCode').attr('src', '<?php echo U('Helpself:vcode');?>?p=' + Math.random()
                )
                } else if (msg == 3) {
                    alert('邮件发送失败,请稍后再试');
                    $('#getRegCode').attr('src', '<?php echo U('Helpself:vcode');?>?p=' + Math.random()
                )
                } else if (msg == 0) {
                    window.location.href = "<?php echo U('Helpself:backpwdemail');?>?email=" + $("#email").val();
                }
            });
        }
        return false;
    });

    sendMailHref();

    function sendMailHref() {
        if ($("#verifycode").val().length == 4) {
            $("#submitReg").removeClass('regi-btn-no');
            $("#submitReg").attr('href', '<?php echo U("Helpself:sendMail");?>');
        } else {
            if (!$("#submitReg").hasClass('regi-btn-no')) {
                $("#submitReg").addClass('regi-btn-no');
                $("#submitReg").removeAttr('href');
            }
        }
    }


    $(window).resize(function () {
        var t = $('#email');
        var _left = t.offset().left + t.parents('ul').width();
        $('.regi-tip').css('left', _left);
    });
</script>
</body>
</html>