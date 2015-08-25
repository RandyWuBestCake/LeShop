<?php
/**
 * 兄弟连项目二 乐视商城:导航菜单模块
 *
 * PHP version 5.4.16
 * @author      黄明毅<970485070@qq.com>
 * @version     1.0
 * @time          2015-01-22 21:44
 */
namespace Admin\Controller;

use Think\Controller;

class NavController extends CommonController
{
    //导航菜单添加页面
    public function add()
    {
        //创建模型
        $nav = M('nav');
        //读取所有分类
        $navs = $nav->field('id,title,pid,path,concat(path,"-",id) as paths')->order('paths')->select();
        // var_dump($navs); die;
        foreach ($navs as $key => $value) {
            $num = count(explode('-', $value['path'])) - 1;
            $navs[$key]['title'] = str_repeat('|------', $num) . $value['title'];
        }
        //读取菜单配置
        $nav = C('nav');
        // var_dump($nav);
        //分配变量
        $this->assign('navs', $navs);
        $this->assign('nav', $nav);
        $this->display();
    }


    //导航菜单添加
    public function insert()
    {
        // var_dump($_POST); die;
        //创建模型
        $nav = M('nav');
        //添加顶级菜单
        if ($_POST['pid'] == 0) {
            $_POST['pid'] = 0;
            $_POST['path'] = 0;
        } else {//添加子集菜单
            //创建path的值
            $parentNav = $nav->where("id={$_POST['pid']}")->find();
            $_POST['path'] = $parentNav['path'] . "-" . $parentNav['id'];
        }
        //创建数据
        $nav->create();
        if ($nav->add()) {
            $this->success('添加成功', U('Nav/index'), 3);
        } else {
            $this->error('添加失败', U('Nav/add'), 3);
        }
    }

    //导航菜单列表
    public function index()
    {
        //创建模型
        $nav = M('nav');
        //读取所有菜单
        $navs = $nav->field('id,title,pid,path,url,position,concat(path,"-",id) as paths')->order('paths')->select();
        foreach ($navs as $key => $value) {
            $num = count(explode('-', $value['path'])) - 1;
            $navs[$key]['title'] = str_repeat('|------', $num) . $value['title'];
        }
        //读取菜单配置
        $nav = C('nav');
        // var_dump($nav);
        //分配变量
        $this->assign('nav', $nav);
        //分配变量
        $this->assign('navs', $navs);

        $this->display();
    }

    //导航菜单修改页面
    public function edit()
    {
        //获取id
        $id = I('get.id');
        //创建模型
        $nav = M('nav');
        $navInfo = $nav->where("id=$id")->find();
        // var_dump($navInfo); die;
        //读取所有的菜单
        $navs = $this->getNavs();

        //读取菜单配置
        $nav = C('nav');
        // var_dump($nav);
        //分配变量
        $this->assign('nav', $nav);
        //分配变量
        $this->assign('navs', $navs);
        $this->assign('navInfo', $navInfo);

        $this->display();
    }

    //读取所有菜单
    private function getNavs()
    {
        $nav = M('nav');
        $navs = $nav->field('id,title,pid,path,url,position,concat(path,"-",id) as paths')->order('paths')->select();
        foreach ($navs as $key => $value) {
            $num = count(explode('-', $value['path'])) - 1;
            $navs[$key]['title'] = str_repeat('|------', $num) . $value['title'];
        }
        //分配变量
        return $navs;
    }

    //导航菜单修改
    public function update()
    {
        //创建模型
        $nav = M('nav');
        //添加顶级菜单
        if ($_POST['pid'] == 0) {
            $_POST['pid'] = 0;
            $_POST['path'] = 0;
        } else {//添加子集菜单
            //创建path的值
            $parentNav = $nav->where("id={$_POST['pid']}")->find();
            $_POST['path'] = $parentNav['path'] . "-" . $parentNav['id'];
        }
        //创建数据
        $nav->create();
        // var_dump($nav->create());  die;
        if ($nav->save()) {
            $this->success('更新成功', U('Nav/index'), 3);
        } else {
            $this->error('更新失败', U('Nav/index'), 3);
        }
    }

    //导航菜单删除
    public function delete()
    {
        $nav = M('nav');
        $id = I('get.id');
        $n = $this->delRev($id);
    }

    public function delRev($id)
    {
        $nav = M('nav');
        $navs = $nav->where("id=$id")->find();
        $paths = $navs['path'] . '-' . $navs['id'];
        $nav->where("id=$id")->delete();
        $nav->where("path like '$paths%'")->delete();
        $this->success('导航菜单删除成功', U('Nav/index'), 3);
    }

}