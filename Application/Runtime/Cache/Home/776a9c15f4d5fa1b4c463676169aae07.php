<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<link rel="stylesheet" type="text/css" href="/object/Public/css/Content/xiniu.css">
</head>
<script type="text/javascript" src="/object/Public/js/jquery-1.8.3.min.js"></script>
<body>
<div class="register-box">
    <!-- <a class="pop_head_btn_close" href=""></a>
  -->
    <div class="regi-tit1">
        <h2>重置密码</h2>
    </div>
    <div class="regi-cnt">
        <div class="regi-pass-tit">
            <h3>账户名称 : <?php echo ($username); ?></h3>
        </div>
        <div class="regi-pass-tit">
            <h3>邮箱帐号：<?php echo ($email); ?></h3>
        </div>
        <form id="loginForm" method="post" action="<?php echo U('Helpself:editPwd');?>">
            <input type="hidden" value="<?php echo ($verify); ?>" name="verify" id="verify">
            <ul class="login-form">
                <li class="login_form_input">
                    <input type="password" class="login-input" name="password" id="password" value=""
                           placeholder='新密码 6-16位字符'>
                </li>
                <li>
                    <div class="ywz_zhuce_huixian" id='pwdLevel_1'></div>
                    <div class="ywz_zhuce_huixian" id='pwdLevel_2'></div>
                    <div class="ywz_zhuce_huixian" id='pwdLevel_3'></div>
                </li>
                <li>
                    <div class="ywz_zhuce_hongxianwenzi"> 弱</div>
                    <div class="ywz_zhuce_hongxianwenzi"> 中</div>
                    <div class="ywz_zhuce_hongxianwenzi"> 强</div>
                </li>
                <li class="login_form_input" id="rpwd">
                    <input type="password" class="login-input" name="password2" id="password2" value=""
                           placeholder='确认密码'>
                </li>
                <li>
                    <a title="确定" id="submitPwd" class="regi-code phone-login regi-btn-no">确定</a>
                </li>
            </ul>
        </form>
    </div>

    <div class="regi-other">
        我知道密码了，
        <a class="blu" href="/?ver=2.0&amp;loginname=zlutao@qq.com">立即登录</a>
    </div>
</div>
<div style="z-index: 1900; display: none;" class="regi-tip"><i class="tip-larr"></i><i class="tip-error"></i><span
        class="red">请输入密码</span></div>
<script type="text/javascript" src="/object/Public/js/Scripts/xiniu.js"></script>
<script type="text/javascript">
    var bs = false;
    var js = 0;
    //email文本框 获取焦点
    $("#password").focus(function () {
        $('.regi-tip').hide();
    });
    //password 文本框丢失焦点事件
    $("#password").keyup(function () {
        checkPwd($(this));
    });

    $("#password2").keyup(function () {
        checkPwd($(this));
    });

    function checkPwd(t) {
        var ss = false;
        //获取输入的password2
        var password2 = $("#password2").val();
        var password = $("#password").val();
        // 获取提示框的左边栏位置
        var _left = t.parents('li').width() + t.offset().left;
        var _top = t.parents('li').offset().top;
        if (password == '') {
            $('.regi-tip').css('left', _left);
            $('.regi-tip').css('top', _top);
            $('.regi-tip').html('<i class="tip-larr"></i><i class="tip-warn"></i>请输入您要修改的密码,6-16位字符');
            $('.regi-tip').show();
            bs = false;
            editPwdHref(ss);
            return false;
        } else {
            var reg = /^\w{6,16}$/;
            if (!reg.test(password)) {
                $('.regi-tip').html('<i class="tip-larr"></i><i class="tip-warn"></i>请输入6-16位密码字符');
                $('.regi-tip').css('left', _left);
                $('.regi-tip').css('top', _top);
                $('.regi-tip').show();
                bs = false;
                editPwdHref(ss);
                return false;
            } else {
                bs = true;
            }
        }
        if (password2 != '') {
            // 假如 password2为空
            if (password2 != password) {
                $('.regi-tip').css('left', _left);
                $('.regi-tip').css('top', _top);
                $('.regi-tip').html('<i class="tip-larr"></i><i class="tip-warn"></i>两次输入的密码不一致');
                $('.regi-tip').show();
                $("#rpwd").find('i').removeClass('login-input-yes');
                editPwdHref(ss);
                return false;
            } else if (bs == false) {
                $('.regi-tip').css('left', _left);
                $('.regi-tip').css('top', _top);
                $('.regi-tip').html('<i class="tip-larr"></i><i class="tip-warn"></i>请确认密码规则/长度等是否正确');
                $('.regi-tip').show();
                $("#rpwd").find('i').removeClass('login-input-yes');
                editPwdHref(ss);
                return false;
            } else if (password == password2 || bs == true) {
                $('.regi-tip').hide();
                if (js == 0) {
                    $("#rpwd").append('<i class="login-input-yes"></i>');
                }
                js++;
                ss = true;
            }
        } else {
            editPwdHref(ss);
            return false;
        }
        editPwdHref(ss);
    }

    function editPwdHref(ss) {
        if (ss) {
            $("#submitPwd").removeClass('regi-btn-no');
            $("#submitPwd").attr('href', '<?php echo U("Helpself:editPwd");?>');
        } else {
            if (!$("#submitPwd").hasClass('regi-btn-no')) {
                $("#submitPwd").addClass('regi-btn-no');
                $("#submitPwd").removeAttr('href');
            }
        }
    }

    $("#submitPwd").click(function () {
        if (!$("#submitPwd").hasClass('regi-btn-no')) {
            $("form").submit()
            return false;
        }
    });
</script>
</body>
</html>