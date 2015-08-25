<?php
/**
 * 兄弟连项目二 乐视商城:前台注册模块
 *
 * PHP version 5.4.16
 * @author      黄明毅<970485070@qq.com>
 * @version     1.0
 * @time          2015-01-28
 */
namespace Home\Controller;

use Think\Controller;

class RegisterController extends Controller
{
    //显示注册页面
    public function index()
    {
        $this->display();
    }

    //ajax进行用户名验证
    public function ajaxuser()
    {
        $user = M('user');
        $username['username'] = I('get.username');

        $res = $user->where($username)->select();
        $this->ajaxReturn($res);
    }

    //生成验证码
    public function verify()
    {
        $config = array(
            'fontSize' => 20,    // 验证码字体大小
            'length' => 4,     // 验证码位数
            'imageW' => 150,
            'imageH' => 50,
            'useNoise' => false, // 关闭验证码杂点
        );
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }

    //验证码验证
    public function check_verify($code, $id = '')
    {
        $verify = new \Think\Verify();
        $res = $verify->check($code, $id);
        $this->ajaxReturn($res);
    }


    //添加用户
    public function adduser()
    {
        //处理密码
        $_POST['password'] = md5($_POST['pwd']);
        // var_dump($_POST);die;
        //创建模型
        $user = M('user');
        $user->create();
        if ($user->add()) {
            $this->success('恭喜您注册成功,请从新登录~', U('Login/index'), 2);
        } else {
            $this->error('注册失败,请稍后重试~', U('Register/index'), 2);
        }

    }
}