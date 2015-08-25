<?php
/** 
* 兄弟连项目二 乐视商城:前台购物车模块
*  
* PHP version 5.4.16
* @author      黄明毅<970485070@qq.com> 
* @version     1.0
* @time          2015-01-30 
*/ 
namespace Home\Controller;
use Think\Controller;
class CartController extends CommonController {

	//购物车显示页面
	public function index(){
		 $data=$_SESSION['cart'];

		 //分配变量
		$this->assign('data',$data);
		$this->display();

	}

	//加入购物车
	public function addCart(){

		$num=$_GET['cart_amount'];
		$id=$_GET['goods_id'];
    $goods_id[] = $id;
		$goods=M('fit_goods');
		$rows=$goods->where("id='$id'")->select();
		// var_dump($rows);die;
		foreach ($rows as $key => $v) {
             $nums = $v['amount'];
       	}
       	if($num>$nums){
            $this->error('抱歉库存不足请购买其他商品');
        	}

        	//判断加入购物车的$id 是否存在,存在++ 不存在则重新加入 
        	if(isset($id)){
	            	if(isset($_SESSION['cart'][$id])){
	                $_SESSION['cart'][$id]['num']++;
                  //ajax返回值到detail页面,判断顶部右端的消息是否增加
                  $this->ajaxReturn('1');
	                $this->success("加入购物车成功",U("Cart/index"));
	            	}else{ 
	                 $data = $goods->where("id='$id'")-> find();
	                $_SESSION['cart'][$id] = $data;
	                $_SESSION['cart'][$id]['num'] = $num;
	                $this -> success("加入购物车成功~", U("Cart/index"));
	            	}
	        
	       }else{
	            $this->error("加入购物车失败");
	       }
	}

	//购物车中 ，数值--
     	public function decr(){
       	$id = $_POST['id'];
       	if($_SESSION['cart'][$id]['num'] > 1){
       	$_SESSION['cart'][$id]['num']--;
       }
       $this -> ajaxReturn($_SESSION['cart'][$id]['num']);
    	}
    	//购物车中 ，数值++
  	public function incr(){
       	$id = $_POST['id'];
       	$_SESSION['cart'][$id]['num']++;
       	$this -> ajaxReturn($_SESSION['cart'][$id]['num']);
    	}

    	// 购物车删除单个商品
    	public function del(){
      		$id = $_GET['id'];
       	unset($_SESSION['cart'][$id]);
       	$this -> success("删除物品成功", U("Cart/index"));
    	}

    	//购物车删除选中商品
    	public function delete(){    		
    		$id=$_POST['id'];
    		foreach ($id as $v) {
		unset($_SESSION['cart'][$v]);		
		}
    		return 0;
    	}

    	//清空购物车
    	public function clear(){
       	unset($_SESSION['cart']);
       	$this->success("清空购物车成功",U("Index/index"));
    	}
}