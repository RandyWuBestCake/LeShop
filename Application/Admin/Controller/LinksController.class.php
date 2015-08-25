<?php
/**
 * 兄弟连项目二 乐视商城:后台友情链接模块
 *
 * PHP version 5.4.16
 * @author      黄明毅<970485070@qq.com>
 * @version     1.0
 * @time          2015-01-19 11:44
 */
namespace Admin\Controller;

use Think\Controller;

class LinksController extends CommonController
{
    //友情链接添加显示页面
    public function add()
    {
        $this->display();
    }

    //添加友情链接方法
    public function insert()
    {
        //创建模型
        $frind_link = M('frind_link');
        $frind_link->create();

        if ($frind_link->add()) {
            $this->success('友情链接添加成功', U('Links/index'), 3);
        } else {
            $this->error('友情链接添加失败', U('Links/index'), 3);
        }
    }

    //友情链接列表
    public function index()
    {
        $frind_link = M('frind_link');
        //获取当前请求的页码
        $p = isset($_GET['p']) ? $_GET['p'] : 1;
        //获取每页显示的数量
        $num = isset($_COOKIE['num']) ? $_COOKIE['num'] : 10;
        setcookie('num', $num, time() + 3600, '/');
        //处理分页,计算当前用户表中的总数
        $count = $frind_link->count();
        //实例化分页对象
        $page = new \Think\Page($count, $num);
        // 获取页码的html代码
        $show = $page->show();

        $links = $frind_link->page($p, $num)->select();
        //分配变量
        $this->assign('links', $links);
        $this->assign('page', $show);
        $this->assign('num', $num);

        $this->display();
    }


    //友情链接修改显示页面
    public function edit()
    {
        $frind_link = M('frind_link');
        //获取修改的id
        $linkId = I('get.id');
        //读取友情链接的相关信息
        $linkInfo = $frind_link->where("id=$linkId")->find();
        //分配变量
        $this->assign('linkInfo', $linkInfo);

        $this->display();
    }

    //友情链接修改
    public function update()
    {
        $frind_link = M('frind_link');
        //创建数据
        $frind_link->create();
        //执行更新操作
        if ($frind_link->save()) {
            $this->success('更新成功', U('Links/index'), 3);
        } else {
            $this->error('更新失败', U('Links/index'), 3);
        }
    }

    //友情链接删除
    public function delete()
    {
        $frind_link = M('frind_link');
        //获取id
        $id = I('get.id');
        //删除操作
        if ($frind_link->delete($id)) {
            $this->success('友情链接删除成功', U('Links/index'), 3);
        } else {
            $this->error('友情链接删除失败', U('Links/index'), 3);
        }
    }
}