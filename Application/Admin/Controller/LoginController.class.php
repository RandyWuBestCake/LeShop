<?php
/**
 * 兄弟连项目二 乐视商城:后台登陆模块
 *
 * PHP version 5.4.16
 * @author      黄明毅<970485070@qq.com>
 * @version     1.0
 * @time          2015-01-21 14:44
 */

namespace Admin\Controller;

use Think\Controller;

class LoginController extends Controller
{
    //登录页面
    public function login()
    {
        $this->display();
    }

    //登录操作
    public function logining()
    {
        //获取用户信息
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        //创建模型
        $admin_user = M('admin_user');
        $info = $admin_user->where("username='$username' and password='$password'")->find();
        if (!$info) {
            $this->error('权限不够或用户名密码错误！请重新登录', '', 3);
        } else {
            //把信息存入session
            session_start();
            session('user', array('username' => $username, 'id' => $info['id']));
            $this->success('登录成功~', U('Index/index'), 1);
        }
    }

    //退出登录
    public function logout()
    {
        session('user', null);
        // setcookie('PHPSESSID',null,0,'/');
        // session_destroy();

        $this->success('您已经安全退出网站~', U('Login/login'), 1);
    }
}