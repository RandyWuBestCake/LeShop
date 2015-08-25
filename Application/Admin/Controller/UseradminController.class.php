<?php
/**
 * 兄弟连项目二 乐视商城:后台管理员模块
 *
 * PHP version 5.4.16
 * @author      黄明毅<970485070@qq.com>
 * @version     1.0
 * @time          2015-01-21 14:44
 */
namespace Admin\Controller;

use Think\Controller;

class UseradminController extends CommonController
{

    //管理员添加页面
    public function add()
    {
        $this->display();
    }

    //管理员添加
    public function insert()
    {
        //处理密码
        $_POST['password'] = md5($_POST['password']);
        //创建模型
        $admin_user = M('admin_user');

        $admin_user->create();
        if ($admin_user->add()) {
            $this->success('管理员添加成功', U('Useradmin/index'), 3);
        } else {
            $this->error('管理员添加失败', U('Useradmin/index'), 3);
        }
    }

    //管理员列表
    public function index()
    {
        //创建模型
        $admin_user = M('admin_user');
        //获取当前请求的页码
        $p = isset($_GET['p']) ? $_GET['p'] : 1;
        //获取每页显示的数量
        $num = isset($_COOKIE['num']) ? $_COOKIE['num'] : 10;
        setcookie('num', $num, time() + 3600, '/');
        //处理分页   计算当前用户表中的总数
        $count = $admin_user->count();
        //实例化分页对象
        $page = new \Think\Page($count, $num);
        // 获取页码的html代码
        $show = $page->show();

        $users = $admin_user->page($p, $num)->select();
        //分配变量
        $this->assign('users', $users);
        $this->assign('page', $show);
        $this->assign('num', $num);

        $this->display();
    }

    //修改管理员信息
    public function edit()
    {
        //创建模型
        $admin_user = M('admin_user');
        // 获取id
        $useradminId = I('get.id');
        //读取管理员相关信息
        $useradminInfo = $admin_user->where("id=$useradminId")->find();
        //分配变量
        $this->assign('useradminInfo', $useradminInfo);

        $this->display();
    }

    //修改管理员信息
    public function update()
    {
        // var_dump($_POST); die;
        $admin_user = M('admin_user');
        // 处理密码字段
        $_POST['password'] = md5($_POST['password']);
        $admin_user->create();
        //执行更新操作
        if ($admin_user->save()) {
            $this->success('更新成功', U('Useradmin/index'), 3);
        } else {
            $this->error('更新失败', U('Useradmin/index'), 3);
        }
    }

    //删除管理员
    public function delete()
    {
        $admin_user = M('admin_user');
        //获取id
        $id = I('get.id');
        if ($admin_user->delete($id)) {
            $this->success('管理员删除成功', U('Useradmin/index'), 3);
        } else {
            $this->error('管理员删除失败', U('Useradmin/index'), 3);
        }
    }

}