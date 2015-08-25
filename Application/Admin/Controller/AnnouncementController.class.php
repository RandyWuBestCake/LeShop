<?php
/**
 * 兄弟连项目二 乐视商城:首页公告模块
 *
 * PHP version 5.4.16
 * @author      黄明毅<970485070@qq.com>
 * @version     1.0
 * @time          2015-01-19 16:44
 */
namespace Admin\Controller;

use Think\Controller;

class AnnouncementController extends CommonController
{

    //首页公告添加页面
    public function add()
    {
        $this->display();
    }

    //首页公告添加
    public function insert()
    {
        //处理时间	    将字符串转化成时间戳
        $_POST['create_time'] = strtotime($_POST['create_time']);

        //创建模型
        $announcement = M('announcement');
        $announcement->create();
        if ($announcement->add()) {
            //添加成功
            $this->success('添加首页公告成功', U('Announcement/index'), 3);
        } else {
            //添加失败
            $this->error('添加首页公告失败', U('Announcement/index'), 3);
        }
    }

    //首页公告列表
    public function index()
    {
        //创建模型
        $announcement = M('announcement');
        //获取当前请求的页码
        $p = isset($_GET['p']) ? $_GET['p'] : 1;
        //获取每页显示的数量
        $num = isset($_COOKIE['num']) ? $_COOKIE['num'] : 10;
        setcookie('num', $num, time() + 3600, '/');
        //处理分页,计算当前用户表中的总数
        $count = $announcement->count();
        //实例化分页对象
        $page = new \Think\Page($count, $num);
        // 获取页码的html代码
        $show = $page->show();

        $announcements = $announcement->page($p, $num)->select();
        // var_dump($announcements); die;

        //分配变量
        $this->assign('announcements', $announcements);
        $this->assign('page', $show);
        $this->assign('num', $num);


        $this->display();
    }

    //首页公告修改显示页面
    public function edit()
    {
        //创建模型
        $announcement = M('announcement');
        //获取id
        $announcementId = I('get.id');
        //读取首页公告相关信息
        $announcementInfo = $announcement->where("id=$announcementId")->find();


        //分配变量
        $this->assign('announcementInfo', $announcementInfo);
        $this->display();
    }

    //首页公告修改
    public function update()
    {
        $announcement = M('announcement');
        //处理时间	    将字符串转化成时间戳
        $_POST['create_time'] = strtotime($_POST['create_time']);
        //创建数据
        $announcement->create();
        //执行更新操作
        if ($announcement->save()) {
            $this->success('更新成功', U('Announcement/index'), 3);
        } else {
            $this->error('更新失败', U('Announcement/index'), 3);
        }
    }

    //删除首页公告
    public function delete()
    {
        $announcement = M('announcement');
        //获取id
        $id = I('get.id');
        if ($announcement->delete($id)) {
            $this->success('首页公告删除成功', U('Announcement/index'), 3);
        } else {
            $this->error('首页公告删除失败', U('Announcement/index'), 3);
        }
    }
}