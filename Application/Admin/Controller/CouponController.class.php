<?php
/**
 * 兄弟连项目二 乐视商城:优惠卷模块
 *
 * PHP version 5.4.3
 * @author      跳梁者<zlutao@qq.com>
 * @version     1.0
 * @time          2015-01-18 16:24
 */

namespace Admin\Controller;

use Think\Controller;

class CouponController extends Controller
{
    //优惠卷默认页
    public function index()
    {

        $stmt = M('coupon_cate');// 实例化stmt对象
        $p = isset($_GET['p']) ? $_GET['p'] : '0'; //获取页码数
        // 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
        $rows = $stmt->page($p . ',5')->select();
        $this->assign('rows', $rows);// 赋值数据集
        $count = $stmt->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count, 5);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show();// 分页显示输出
        $this->assign('page', $show);// 赋值分页输出
        $rows = $stmt->select();
        $this->assign('rows', $rows);
        $this->display();
    }

    //优惠卷添活动加页
    public function add()
    {

        $this->display();
    }

    // 执行添加活动操作
    public function doadd()
    {
        //如果价格为空则最低门槛为0
        if (empty($_POST['min_price'])) {
            $_POST['min_price'] = 0;
        }
        // 检查价格格式
        if (!is_numeric($_POST['min_price'])) {
            $this->error('请检查最低使用价格');
        }
        // 检查标题是否为空
        if (empty($_POST['title'])) {
            $this->error('活动标题不能为空');
        }
        // 检查内容是否为空
        if (empty($_POST['con'])) {
            $this->error('活动简介不能为空');
        }
        // 检查时间格式 并转换为时间戳
        $time = preg_match("/^\d{4}-\d{2}-\d{2}$/", $_POST['expire_time']);
        if ($time) {
            $_POST['expire_time'] = strtotime($_POST['expire_time']);
        } else {
            $this->error('请检查到期时间格式');
        }
        //实例化模型 添加数据
        $stmt = M('coupon_cate');
        $stmt->create();
        if ($stmt->add()) {
            $this->success('添加成功', U('Coupon/index'), 3);
        } else {
            $this->error('未知错误');
        }
    }

    //修改数据
    public function edit()
    {
        //获取ID
        $id = I('get.id');
        //根据id获取信息 分配给前台
        $stmt = M('coupon_cate');
        $row = $stmt->where("id=$id")->find();
        $this->assign('row', $row);
        $this->display();
    }

    // 删除数据
    public function del()
    {
        //实例化模型
        $stmt = M('coupon_cate');
        //获取id 
        $id = I('get.id');
        //检测活动下是否有剩余优惠卷
        $c = M('coupon');
        $r = $c->where("cid = $id")->select();
        if ($r) {
            $this->error('活动下有优惠卷,请先清空');
        }
        // 删除数据
        if ($stmt->delete($id)) { //删除成功
            $this->success('删除成功', U('Coupon:index'), 3);
        } else { //删除失败
            $this->error('删除失败', U('Coupon:index'), 3);
        }
    }

    // 执行修改活动操作
    public function doedit()
    {
        //如果价格为空则最低门槛为0
        if (empty($_POST['min_price'])) {
            $_POST['min_price'] = 0;
        }
        // 检查价格格式
        if (!is_numeric($_POST['min_price'])) {
            $this->error('请检查最低使用价格');
        }
        // 检查标题是否为空
        if (empty($_POST['title'])) {
            $this->error('活动标题不能为空');
        }
        // 检查内容是否为空
        if (empty($_POST['con'])) {
            $this->error('活动简介不能为空');
        }
        // 检查时间格式 并转换为时间戳
        $time = preg_match("/^\d{4}-\d{2}-\d{2}$/", $_POST['expire_time']);
        if ($time) {
            $_POST['expire_time'] = strtotime($_POST['expire_time']);
        } else {
            $this->error('请检查到期时间格式');
        }
        //实例化模型 添加数据
        $stmt = M('coupon_cate');
        $stmt->create();
        if ($res = $stmt->save()) {
            $this->success('修改成功', U('Coupon/index'), 3);
        } else {
            if ($res == 0) $this->error('没有数据被更新');
            $this->error('未知错误');
        }
    }

    // 优惠卷生成页面
    public function create()
    {
        $stmt = M('coupon_cate');
        //获取活动id
        $cid = isset($_GET['id']) ? $_GET['id'] : '0';
        $rows = $stmt->field('id,title')->select();
        $this->assign('cid', $cid);
        $this->assign('rows', $rows);
        // var_dump($rows);die;
        $this->display();
    }

    //处理优惠卷生成
    public function docreate()
    {
        //判断生成数量
        if (!is_numeric($_POST['num'])) {
            $this->error('请检查生成数量');
        }
        //实例化模型 插入数据
        $stmt = M('coupon');
        // 遍历生成优惠卷
        $secrets = generate_promotion_code($_POST['num'], '');
        for ($i = 0; $i < $_POST['num']; $i++) {
            $secret = md5(microtime('true')) . $secrets[$i];
            $secret = str_shuffle($secret);
            $secret = strtoupper(substr($secret, 4, 16));
            $_POST['secret'] = $secret;
            // var_dump($_POST);die();
            $stmt->create();
            if (!$stmt->add()) {
                $this->error('未知错误');
            }
        }
        $this->success('生成成功', U('Coupon:index'), 3);
    }

    //优惠卷管理
    public function manage()
    {
        //获取分类id
        $cid = I('get.id');
        $p = isset($_GET['p']) ? $_GET['p'] : '0';
        $coupon = M('coupon'); // 实例化coupon对象
        // 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
        $rows = $coupon->field("coupon.*,coupon_cate.title as ctitle")->join("coupon_cate on coupon.cid=coupon_cate.id")->where("cid=$cid")->page($p . ',10')->select();
        $count = $coupon->where("cid=$cid")->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count, 10);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show();// 分页显示输出
        $this->assign('cid', $cid);
        $this->assign('rows', $rows);
        $this->assign('page', $show);// 赋值分页输出
        $this->display(); // 输出模板
    }
    /*
    //优惠卷列表
    public function lists(){
        //查询优惠活动
        $coupon = M('coupon_cate');
        $crows = $coupon->field('id,title')->select();
        // var_dump($crows);die;
        //查询每个活动下的优惠卷
        $stmt = M('coupon');
        foreach ($crows as $key => $value) {
            $cid = $value['id'];
            $title[] = $value['title'];
            $p = isset($_GET['p'])?$_GET['p']:'0';
            $rows[] = $stmt->where("cid=$cid")->page($p.',5')->select();
            $count = $stmt->where("cid=$cid")->count();
            $Page = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数
            $show [] = $Page->show();// 分页显示输出
        }         
        $this->assign('page',$show);// 赋值分页输出
        // var_dump($title);
        $this->assign('title',$title);
        $this->assign('rows',$rows);
        $this->display();
    }
    */

    // 优惠卷删除
    public function c_dodel()
    {
        //实例化模型
        $stmt = M('coupon');
        //获取id 
        $id = I('get.id');
        // 删除数据
        if ($stmt->delete($id)) { //删除成功
            $this->success('删除成功');
        } else { //删除失败
            $this->error('删除失败');
        }
    }

    // 清空某活动优惠卷
    public function clearCoupon()
    {
        //实例化模型
        $stmt = M('coupon');
        //获取id 
        $cid = I('get.cid');
        // 删除数据
        $res = $stmt->where("cid=$cid")->delete();
        // var_dump($res);die();
        if ($res) { //删除成功
            $this->success('清空成功', U('Coupon:index'), 3);
        } else { //删除失败
            $this->error('删除失败');
        }
    }

    //优惠码修改页
    public function c_edit()
    {
        $stmt = M('coupon_cate');
        //获取活动id
        $cid = isset($_GET['cid']) ? $_GET['cid'] : '0';
        $id = I('get.id');
        $rows = $stmt->field('id,title')->select();

        //获取要修改的优惠卷信息
        $coupon = M('coupon');
        $row = $coupon->where("id=$id")->find();
        //分配变量
        $this->assign('row', $row);
        $this->assign('cid', $cid);
        $this->assign('rows', $rows);
        // var_dump($rows);die;
        $this->display();
    }

    public function c_doedit()
    {
        // var_dump($_POST);
        //判断用户是否存在
        if ($_POST['uid']) {
            $user = M('user');
            $res = $user->field('id')->find($_POST['uid']);
            if (!$res) {
                $this->error('用户不存在');
            }
        }
        //判断订单是否存在
        if ($_POST['order_id']) {
            $order = M('goods_order');
            $res = $order->field('id')->find($_POST['order_id']);
            if (!$res) {
                $this->error('订单不存在');
            }
        }

        //保存数据
        $coupon = M("coupon");
        $coupon->create();
        if ($res = $coupon->save()) {
            $this->success("修改成功", U("coupon:manage", array('id' => $_POST['cid'])), 3);
        } else {
            if ($res == 0) {
                $this->error("没有数据被更新");
            }
            $this->error("未知错误");
        }
    }
}