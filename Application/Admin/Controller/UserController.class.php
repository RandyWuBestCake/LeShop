<?php
/**
 * 兄弟连项目二 乐视商城:前台用户模块
 *
 * PHP version 5.4.16
 * @author      黄明毅<970485070@qq.com>
 * @version     1.0
 * @time          2015-01-20 14:44
 */

namespace Admin\Controller;

use Think\Controller;

class UserController extends CommonController
{

    //显示用户添加页面
    public function add()
    {
        $this->display();
    }

    //添加用户方法
    public function insert()
    {
        //上传图片   实例化上传类
        $upload = new \Think\Upload();
        //rootPath这个路径必须手动创建
        $upload->rootPath = "./Public/Uploads/";
        //这一块只能设置一层目录
        $upload->savePath = "user_images/";
        $info = $upload->upload();
        $_POST['img'] = trim($upload->rootPath . $info['img']['savepath'] . $info['img']['savename'], '.');
        //处理密码字段
        $_POST['password'] = md5($_POST['password']);

        //创建模型
        $user = M('user');

        $user->create();
        if ($user->add()) {
            $this->success('用户添加成功', U('User/index'), 3);
        } else {
            $this->error('用户添加失败,', U('User/add'), 3);
        }
    }

    //用户列表功能
    public function index()
    {
        $user = M('user');
        //获取当前请求的页码
        $p = isset($_GET['p']) ? $_GET['p'] : 1;
        //获取每页显示的数量
        $num = isset($_COOKIE['num']) ? $_COOKIE['num'] : 10;
        setcookie('num', $num, time() + 3600, '/');
        //处理分页   计算当前用户表中的总数
        $count = $user->count();
        //实例化分页对象
        $page = new \Think\Page($count, $num);
        // 获取页码的html代码
        $show = $page->show();

        //连表查询
        $users = $user->field('user.*')->page($p, $num)->select();
        // var_dump($users); die;

        //分配变量
        $this->assign('users', $users);
        $this->assign('page', $show);
        $this->assign('num', $num);

        $this->display();
    }

    //改变显示条数的功能
    public function changeNum()
    {
        $num = $_GET['num'];
        setcookie('num', $num, time() + 3600, '/');
        echo 1;
    }

    //修改用户信息
    public function edit()
    {
        $user = M('user');
        //获取用户id
        $userId = I('get.id');
        //读取用户的相关信息
        $userInfo = $user->where("id=$userId")->find();

        //分配变量
        $this->assign('userInfo', $userInfo);

        $this->display();
    }

    //修改用户信息
    public function update()
    {
        // var_dump($_POST);die;
        $user = M('user');
        //处理密码字段
        // $_POST['password'] = md5($_POST['password']);
        if ($_FILES['img']['name'] != "") {
            //上传图片   实例化上传类
            $upload = new \Think\Upload();
            //rootPath这个路径必须手动创建
            $upload->rootPath = "./Public/Uploads/";
            //这一块只能设置一层目录
            $upload->savePath = "user_images/";
            $info = $upload->upload();
            $_POST['img'] = trim($upload->rootPath . $info['img']['savepath'] . $info['img']['savename'], '.');

            //删除原图
            $userInfo = $user->where("id={$_POST['id']}")->find();
            $img = './' . $userInfo['img'];
            @unlink($img);
        }

        //创建数据
        $user->create();
        //执行更新操作
        if ($user->save()) {
            $this->success('更新成功', U('User/index'), 3);
        } else {
            $this->error('更新失败', U('User/index'), 3);
        }
    }

    //删除用户
    public function delete()
    {
        $user = M('user');
        //获取用户id
        $id = I('get.id');
        if ($user->delete($id)) {
            $this->success('用户删除成功', U('User/index'), 3);
        } else {
            $this->error('用户删除失败', U('User/index'), 3);
        }
    }

}