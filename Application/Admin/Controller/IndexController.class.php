<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController{
	//后台首页
    public function index(){

    	$this->display();
    }

    //后台欢迎页面
    // public function welcome(){
    // 	echo 'welcome to backend';
    // }
}