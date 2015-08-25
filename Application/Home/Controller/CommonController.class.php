<?php
/** 
* 兄弟连项目二 乐视商城:前台公共模块
*  
* PHP version 5.4.16
* @author      黄明毅<970485070@qq.com> 
* @version     1.0
* @time          2015-01-27 9:44
*/ 
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller{
	public function _initialize(){
		session_start();
		if(!session('users')){
			$this->error('亲,请先登陆哟', U("Login/index"), 2);
		}
	}
}