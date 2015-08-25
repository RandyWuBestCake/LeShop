<?php
/**
 * 兄弟连项目二 乐视商城:服务条款模块
 *
 * PHP version 5.4.3
 * @author      跳梁者<zlutao@qq.com>
 * @version     1.0
 * @time          2015-01-17 23:46
 */
namespace Admin\Controller;

use Think\Controller;

class ServerController extends Controller
{
    // server首页
    public function index()
    {
        //查询server表如果有内容分配给前台展示
        $stmt = M('other');
        $row = $stmt->where('title="server"')->find();
        if ($row) {
            $res = $row['con'];
        } else {
            $res = '';
        }
        $this->assign('res', $res);
        $this->display();
    }

    //保存数据
    public function save()
    {
        //查询数据库 server表 如果有内容则更改 如果没有则添加
        $stmt = M('other');
        $res = $stmt->where('title="server"')->find();
        $_POST['id'] = 1;
        // var_dump($_POST);die();
        $stmt->create();
        if ($res) {
            $stmt->save();
            $this->success('修改成功', U("Server:index"), 4);
        } else {
            $stmt->add();
            $this->success('添加成功', U("Server:index"), 4);
        }
    }
}