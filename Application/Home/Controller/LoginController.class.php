<?php
/**
 * 兄弟连项目二 乐视商城:前台登陆模块
 *
 * PHP version 5.4.16
 * @author      黄明毅<970485070@qq.com>
 * @version     1.0
 * @time          2015-01-27 9:44
 */
namespace Home\Controller;

use Think\Controller;

class LoginController extends Controller
{
    // 显示登录页面
    public function index()
    {
        $u = isset($_GET['next_url']) ? '?next_url=' . $_GET['next_url'] : '';
        $this->assign('u', $u);
        $this->display();
    }

    //产生验证码
    public function createVcode()
    {
        $config = array(
            'fontSize' => 20,    // 验证码字体大小
            'length' => 4,     // 验证码位数
            'useNoise' => false, // 关闭验证码杂点
            'imageW' => 150,
            'imageH' => 50,

        );
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }

    //登录操作
    public function login()
    {
        // var_dump($_POST);
        //检测验证码
        if (!check_verify($_POST['code'])) $this->error('您输入的验证码有误！请从新登录', U('Login/index'), 2);
        // 获取用户信息
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        //创建模型
        $user = M('user');
        $info = $user->where("username='$username' and password = '$password'")->find();
        if (!$info) {
            $this->error('用户名或者密码错误！请从新登录', '', 2);
        } else {
            //写入session
            session_start();
            session('users', array('username' => $username, 'id' => $info['id']));
            if (isset($_GET['next_url'])) {
                $this->success('登陆成功~', $_GET['next_url'], 1);
            } else {
                $this->success('登陆成功~', U('Index/index'), 1);
            }
        }
    }

    //退出登录
    public function logout()
    {
        session('users', null);
        // setcookie('PHPSESSID',null,0,'/');
        // session_destroy();

        $this->success('您已经安全退出网站~', U('Index/index'), 1);
    }

}