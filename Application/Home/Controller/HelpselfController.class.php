<?php
/**
 * 兄弟连项目二 乐视商城:前台 自助服务
 *
 * PHP version 5.4.3
 * @author      跳梁者<zlutao@qq.com>
 * @version     1.0
 * @time          2015-01-29 19:10
 */
namespace Home\Controller;

use Think\Controller;

class HelpselfController extends Controller
{
    // 自助服务页
    public function index()
    {
        // var_dump($_SESSION);
        // 实例化模型
        $help = M('help');
        // 获取信息记录
        $helpInfo = $help->select();
        if ($helpInfo) { //如果有记录
            $this->assign('helpInfo', $helpInfo); //分配变量
        } else { //如果没有
            $this->error('暂无帮助信息,管理员在努力建设中'); //提示错误信息
        }
        //友情链接模型
        $frind_link = M('frind_link');
        // 查询可显示的友情链接
        $links = $frind_link->where('display=1')->select();
        //分配变量
        $this->assign('links', $links);
        //解析模版
        $this->display();
    }

    //找回密码页面
    public function findPassword()
    {
        //分配变量
        $this->assign('vcode', $vcode);
        //解析模版
        $this->display();
    }

    //验证码图片页
    public function vcode()
    {
        //设置参数
        $config = array(
            'fontSize' => '30', //字符大小
            'imageW' => '210', //长度
            'imageH' => '70', //高度
            'length' => '4' //个数
        );
        // 生成验证码        
        $Verify = new \Think\Verify($config);
        //输出验证码
        $vcode = $Verify->entry();
    }

    //发送邮件
    private function mailTo($email)
    {
        $user = M("user");
        $userInfo = $user->field('id,username,password')->where("email = '$email'")->find();
        $string = md5($userInfo['username'] . '+' . $userInfo['password']);
        $str = base64_encode($userInfo['username'] . '#>.<#' . $string);
        $id = $userInfo['id'];
        //完善后数据库读取
        $url = 'http://127.0.0.1/object/index.php/home/Helpself/resetpwd/verify/' . $str;
        // $con = '<style class="fox_global_style"> div.fox_html_content { line-height: 1.5;} /* 一些默认样式 */ blockquote { margin-Top: 0px; margin-Bottom: 0px; margin-Left: 0.5em } ol, ul { margin-Top: 0px; margin-Bottom: 0px; list-style-position: inside; } p { margin-Top: 0px; margin-Bottom: 0px } </style><title>用户中心</title><h2 style="margi-top:35px;margin-left:25px;"><img src="http://i1.letvimg.com/img/201403/07/1512/logo.png"></h2><p style="margin-left:25px;font-size:14px; color:#444444; font-family:"微软雅黑";">点击按钮去重置密码：</p><p style="margin:20px 0 20px 25px;"><a href="'.$url.'" style="display:block; width:180px; height:43px; overflow:hidden; font-family:"微软雅黑"; line-height:43px; text-align:center; font-size:16px; background-color:#419ce3; border:1px solid #419ce3; color:#ffffff;text-decoration:none;" title="重置密码">重置密码</a></p><p style="margin-left:25px;font-size:14px; color:#444444; font-family:"微软雅黑";">或点击链接：<a href="'.$url.'" style="color:#529bef; font-size:14px; text-decoration:underline;">'.$url.'</a></p><p style="margin-left:25px;font-size:14px; color:#444444; font-family:"微软雅黑";">非常感谢您对我们的关心和支持！如有任何疑问,欢迎您随时<a href="http://aboutus.letv.com/contact/index.html" target="_blank" style="color:#529bef;">联系我们</a></p><p style="margin-left:25px;color:#c6c6c6; font-family:"微软雅黑"; font-size:14px;">这是一封自动发送的邮件,请不要直接回复</p><br><br><img style="display: none" src="http://scu.sohu.com/track/open.do?p=eyJlbWFpbF9pZCI6ICIxNDIyNjA4MzYzMjc2XzE0MTEzXzY3NThfMTUwMC5zYy0xMF8xMF8xMjdfMTA1LWluYm91bmQwJHpsdXRhb0BxcS5jb20iLCAiY2F0ZWdvcnlfaWQiOiA2Mjk3MiwgInVzZXJfaWQiOiAxNDExMywgInNpZ24iOiAiZTUyNDM4NTU1N2I0YmYwZmUwMmM1ZmI2Mjc0NTkyMDYiLCAibGFiZWwiOiAwfQ%3D%3D">';
        $con = '<style class="fox_global_style"> div.fox_html_content { line-height: 1.5;} /* 一些默认样式 */ blockquote { margin-Top: 0px; margin-Bottom: 0px; margin-Left: 0.5em } ol, ul { margin-Top: 0px; margin-Bottom: 0px; list-style-position: inside; } p { margin-Top: 0px; margin-Bottom: 0px } </style><table style="-webkit-font-smoothing: antialiased;font-family:"微软雅黑", "Helvetica Neue", sans-serif, SimHei;padding:35px 50px;margin: 25px auto; background:rgb(247,246, 242); border-radius:5px" border="0" cellspacing="0" cellpadding="0" width="640" align="center"> <tbody> <tr> <td style="color:#000;"> </td> </tr> <tr><td style="padding:0 20px"><hr style="border:none;border-top:1px solid #ccc;"></td></tr> <tr> <td style="padding: 20px 20px 20px 20px;"> Hi ' . $userInfo['username'] . ', </td> </tr> <tr> <td valign="middle" style="line-height:24px;padding: 15px 20px;"> 感谢您的支持! <br> 请点击以下链接修改您的密码： </td> </tr> <tr> <td style="height: 50px;color: white;" valign="middle"> <div style="padding:10px 20px;border-radius:5px;background: rgb(64, 69, 77);margin-left:20px;margin-right:20px"> <a style="word-break:break-all;line-height:23px;color:white;font-size:15px;text-decoration:none;" href="' . $url . '">' . $url . '</a> </div> </td> </tr> <tr> <td style="padding: 20px 20px 20px 20px"> 请勿回复此邮件，如果有疑问，请联系我们：<a style="color:#5083c0;text-decoration:none" href="mailto:admin@lamp95.com">support@lamp95.com</a> </td> </tr> <tr> <td style="padding: 20px 20px 20px 20px"> - LAMP 95 团队 </td> </tr> <tr>     <td style="padding:0 20px;"><hr style="border:none;border-top:1px solid #ccc;"></td> </tr> <tr> <td style="padding:0 20px;font-size:9pt; color:#b5b0b0"> <span style="float:left;">如果您想起了您的登录密码，请忽略此邮件。</span></td> </tr> </tbody> </table>';
        // var_dump($userInfo);die;
        $mail = new \Org\Util\PHPMailer;
        $mail->IsSMTP();
        $mail->CharSet = 'UTF-8'; //设置邮件的字符编码，这很重要，不然中文乱码
        $mail->SMTPAuth = true; //开启认证
        $mail->Port = '25';
        $mail->Host = 'smtp.163.com';
        $mail->Username = 'olutao@163.com';
        $mail->Password = 'lutao1234';
        // $mail->AddReplyTo('liruibin@aliyun.com');//回复地址
        $mail->From = 'olutao@163.com';
        $mail->FromName = '乐商';
        $mail->AddAddress("$email");
        $mail->Subject = '密码找回';
        $mail->Body = "$con";
        $mail->WordWrap = 80; // 设置每行字符串的长度
        $mail->IsHTML(true);
        $res = $mail->Send();
        if (!$res) {
            echo 3;
        } else {
            echo 0;
        }
    }

    //检测email是否存在
    public function checkEmail()
    {
        //检测 POST数组email字段是否存在
        if (!isset($_POST['email'])) { //不存在返回错误
            $this->error('未知错误');
        } else { //如果存在
            $email = $_POST['email']; //获取email
            $userInfo = M('user');//实例化模型
            $res = $userInfo->where("email='$email'")->getField('id');//根据传过来的email查询数据
            if (!$res) { //无数据 返回1
                echo 1;
            } else { //有数据 返回0
                session_start();
                session('findUid', $res);
                echo 0;
            }
        }
    }

    public function sendMail()
    {
        //检测验证码
        $vcode = I("post.vcode");
        $verify = new \Think\Verify();
        if (!$verify->check($vcode)) { //如果不匹配 返回1
            echo 1;
            return;
        }
        //检测 POST数组email字段是否存在
        if (!isset($_POST['email'])) { //不存在返回错误
            $this->error('未知错误');
        } else { //如果存在
            $email = $_POST['email']; //获取email
            $userInfo = M('user');//实例化模型
            $res = $userInfo->where("email='$email'")->getField('id');//根据传过来的email查询数据
            if (!$res) { //无数据 返回1
                echo 2;
            } else { //有数据 返回0
                $res = $this->mailTo($email);
                echo $res;
            }
        }
    }

    //邮件发送成功页面
    public function backpwdemail()
    {
        $email = I('get.email'); //获取email 
        $emailExt = substr($email, strpos($email, '@') + 1); //获取邮箱后缀
        //分配变量
        $this->assign('email', $email);
        $this->assign('emailExt', $emailExt);
        // 解析模版
        $this->display();
    }

    //用户重置密码页面
    public function resetpwd()
    {
        $str = base64_decode($_GET['verify']); //获取传来的验证代码 并反解
        $arr = explode('#>.<#', $str); //分割反解后字符串
        $username = $arr['0']; //获取到用户名
        $user = M('user'); //实例化模型
        $userInfo = $user->field('id,username,password,email')->where("username = '$username'")->find(); //根据用户名查询数据
        if ($userInfo) { // 如果有数据
            $string = md5($userInfo['username'] . '+' . $userInfo['password']); //获取数据库中的MD5加密值
            if ($string == $arr['1']) { //与用户传来的 进行对比 如果为真
                $this->assign('username', $userInfo['username']);  //分配变量
                $this->assign('email', $userInfo['email']);  //分配变量
                $this->assign('verify', $_GET['verify']);
                $this->display(); //显示模版
            } else { //如果不相当 错误提示
                echo "<script>alert('对不起连接以失效')</script>";
                echo "<script>window.location.href='../../'</script>";
            }
        }
    }

    // 密码重置处理程序
    public function editPwd()
    {
        //判断用户密码是相等 否则错误提示
        if ($_POST['password'] != $_POST['password2'] || empty($_POST['password']) || empty($_POST['password2'])) {
            $this->error('请检测用户密码');
        }
        $verify = $_POST['verify']; //获取验证字符串
        $arr = explode('#>.<#', base64_decode($verify)); //反解拆分
        $username = $arr['0']; //得到用户名
        $user = M('user'); //实例化模型
        $userInfo = $user->field('id,username,password,email')->where("username = '$username'")->find();  //根据用户名查询
        if ($userInfo) {  //如果数据存在
            $string = md5($userInfo['username'] . '+' . $userInfo['password']); //获取数据库中的MD5加密值
            if ($string == $arr['1']) { //与用户传来的 进行对比 如果为真
                $data['id'] = $userInfo['id'];
                $data['password'] = md5($_POST['password']);
                $res = $user->data($data)->save();
                if ($res) {
                    $this->success('密码修改成功', U('Home/index/index'), 3);
                } else {
                    if ($res == 0) {
                        $this->error('密码无需修改');
                    }
                    $this->error('密码重置失败');
                }
            } else {
                $this->error('请确认连接有效');
            }
        } else {
            $this->error('错误号:2000-请联系管理员');
        }
    }
}