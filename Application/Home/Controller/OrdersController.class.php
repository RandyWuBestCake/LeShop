<?php
/**
 * 兄弟连项目二 乐视商城:前台我的订单模块
 *
 * PHP version 5.4.16
 * @author      黄明毅<970485070@qq.com>
 * @version     1.0
 * @time          2015-02-04
 */
namespace Home\Controller;

use Think\Controller;

class OrdersController extends Controller
{
    //我的订单页
    public function index()
    {

        $this->display();
    }
}