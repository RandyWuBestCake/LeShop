<?php
/**
 * 兄弟连项目二 乐视商城:首页轮播
 *
 * PHP version 5.4.3
 * @author      跳梁者<zlutao@qq.com>
 * @version     1.0
 * @time          2015-01-23 12:37
 */
namespace Admin\Controller;

use Think\Controller;

class HomeSildController extends CommonController
{
    // 后台轮播首页
    public function lists()
    {
        // 获取当前页面ID
        $p = isset($_GET['p']) ? $_GET['p'] : '1';
        // 实例化模型
        $stmt = M('home_sild');
        //查询数据
        $positions = $stmt->field('position')->group('position')->select(); //先按组查询出所属页面
        foreach ($positions as $key => $value) { //遍历每个页面的数据
            $position = $value['position'];
            $row = $stmt->where("display=1 and position=$position")->order("level desc")->page($p . ',5')->select(); //数据集
            $count = $stmt->where("display=1 and position=$position")->count(); //查询总记录数
            $Page = new \Think\Page($count, 5);// 实例化分页类 传入总记录数和每页显示的记录数
            $show[] = $Page->show();// 分页显示输出

            if ($row) {
                $rows[] = $row;
            }
        }


        $sild = C("sild");//获取所属位置数组
        //分配变量
        $this->assign('sild', $sild);
        $this->assign('rows', $rows);
        $this->assign('show', $show);
        $this->display();
    }

    // 数据添加页面
    public function add()
    {
        $sild = C("sild");//获取所属位置数组
        //分配变量
        $this->assign('sild', $sild);
        $this->display();
    }

    // 添加数据
    public function sildDoAdd()
    {
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 3145728;// 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath = './Public/Uploads/'; // 设置附件上传根目录
        $upload->savePath = 'sild/'; // 设置附件上传（子）目录
        // 上传文件 
        $info = $upload->upload();
        if (!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        } else {// 上传成功 获取上传文件信息
            $inf = $info['img']['savepath'] . $info['img']['savename']; //拼接地址
            $_POST['img'] = $inf; //将地址写入$_POST数组
        }
        //实例化模型 添加数据
        $stmt = M('home_sild');
        $stmt->create();
        if ($stmt->add()) { //添加成功
            $this->success('添加成功');
        } else { //添加失败
            @unlink('./Public/Uploads/' . $inf); //删除图片
            $this->error('添加失败');
        }
    }

    // 删除数据
    public function dodel()
    {
        //实例化模型
        $stmt = M('home_sild');
        //获取id 
        $id = I('get.id');
        $r = $stmt->where("id = $id")->find();
        $img = $r['img'];
        // 删除数据
        if ($stmt->delete($id)) { //删除成功
            $this->success('删除成功');
            @unlink("./Public/Uploads/$img");
        } else { //删除失败
            $this->error('删除失败');
        }
    }

    //修改数据页面
    public function edit()
    {
        //获取ID
        $id = I('get.id');
        //根据id获取信息 分配给前台
        $stmt = M('home_sild');
        $row = $stmt->where("id=$id")->find();
        $sild = C("sild");//获取所属位置数组
        //分配变量
        $this->assign('sild', $sild);
        $this->assign('row', $row);
        $this->display();
    }

    // 保存修改数据
    public function doedit()
    {
        //实例化模型
        $stmt = M('home_sild');
        $r = $stmt->where("id = {$_POST['id']}")->find();
        $img = $r['img'];
        // var_dump($img);die;
        //判断有无文件上传
        if ($_FILES['img']['error'] != 4) {
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize = 3145728;// 设置附件上传大小
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath = './Public/Uploads/'; // 设置附件上传根目录
            $upload->savePath = 'sild/'; // 设置附件上传（子）目录
            // 上传文件 
            $info = $upload->upload();
            if (!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            } else {// 上传成功 获取上传文件信息
                $inf = $info['img']['savepath'] . $info['img']['savename']; //拼接地址
                $_POST['img'] = $inf; //将地址写入$_POST数组
                @unlink("./Public/Uploads/$img"); //删除原图
            }
        }
        // 添加数据
        $stmt->create();
        if ($stmt->save()) { //修改成功
            $this->success('修改成功', U('HomeSild:lists'), 3);
        } else { //修改失败
            $this->error('修改失败', U('HomeSild:lists'), 3);
        }
    }
}