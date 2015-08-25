<?php
/**
 * 兄弟连项目二 乐视商城:后台公共模块
 *
 * PHP version 5.4.16
 * @author      黄明毅<970485070@qq.com>
 * @version     1.0
 * @time          2015-01-21 14:44
 */
namespace Admin\Controller;

use Think\Controller;

class CommonController extends Controller
{

    public function _initialize()
    {
        session_start();
        if (!session('user')) {
            $this->error('亲,请先登录~~', U("Login/login"), 3);
        }
    }
}