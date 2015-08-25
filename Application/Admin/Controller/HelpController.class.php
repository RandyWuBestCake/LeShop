<?php
/**
 * 兄弟连项目二 乐视商城:帮助中心模块
 *
 * PHP version 5.4.3
 * @author      跳梁者<zlutao@qq.com>
 * @version     1.0
 * @time          2015-01-17 23:52
 */
namespace Admin\Controller;

use Think\Controller;

class HelpController extends Controller
{
    //帮助中心首页
    public function index()
    {
        $stmt = M('help');
        $rows = $stmt->select();
        if (!$rows) {
            $rows = 0;
        }
        $this->assign('rows', $rows);
        $this->display();
    }

    // 添加数据
    public function add()
    {
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 3145728;// 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath = './Public/Uploads/'; // 设置附件上传根目录
        $upload->savePath = 'help/'; // 设置附件上传（子）目录
        // 上传文件 
        $info = $upload->upload();
        if (!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        } else {// 上传成功 获取上传文件信息
            $inf = $info['img']['savepath'] . $info['img']['savename']; //拼接地址
            $_POST['img'] = $inf; //将地址写入$_POST数组
        }
        //实例化模型 添加数据
        $stmt = M('help');
        $stmt->create();
        if ($stmt->add()) { //添加成功
            $this->success('添加成功', U('Help:index'), 3);
        } else { //添加失败
            $this->error('添加失败', U('Help:index'), 3);
        }
    }

    //修改数据
    public function edit()
    {
        //获取ID
        $id = I('get.id');
        //根据id获取信息 分配给前台
        $stmt = M('help');
        $row = $stmt->where("id=$id")->find();
        $this->assign('row', $row);
        $this->display();
    }

    // 保存修改数据
    public function save()
    {
        //实例化模型
        $stmt = M('help');
        $r = $stmt->where("id = {$_POST['id']}")->find();
        $img = $r['img'];
        // var_dump($img);die;
        //判断有无文件上传
        if ($_FILES['img']['error'] != 4) {
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize = 3145728;// 设置附件上传大小
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath = './Public/Uploads/'; // 设置附件上传根目录
            $upload->savePath = 'help/'; // 设置附件上传（子）目录
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
            $this->success('修改成功', U('Help:index'), 3);
        } else { //修改失败
            $this->error('修改失败', U('Help:index'), 3);
        }
    }

    // 删除数据
    public function del()
    {
        //实例化模型
        $stmt = M('help');
        //获取id 
        $id = I('get.id');
        $r = $stmt->where("id = $id")->find();
        $img = $r['img'];
        // 删除数据
        if ($stmt->delete($id)) { //删除成功
            $this->success('删除成功', U('Help:index'), 3);
            @unlink("./Public/Uploads/$img");
        } else { //删除失败
            $this->error('删除失败', U('Help:index'), 3);
        }
    }

}