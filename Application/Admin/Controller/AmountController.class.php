<?php 
/** 
* 兄弟连项目二 乐视商城:库存管理模块
*  
* PHP version 5.4.16
* @author      刘 健<1307668516@qq.com> 
* @version     1.0
* @time          2015-02-01 0:00
*/ 
namespace Admin\Controller;
use Think\Controller;
class AmountController extends Controller { 

		public function add(){

		if (isset($_GET['id'])){
			$id = $_GET['id'];

			$id_pre = substr($id,0,2);
			// if($id_pre == 'g_'){
			// 	$id = trim($id,'g_');
			// }
			$amount = M('goods_amount');
			//在数据库表中查询数量
			$res = $amount->where("goods_id='$id'")->find();
			if(!$res){
				$res = array('goods_id'=>"$id",'real_amount'=>0,'sup_amount'=>0);
			}
			// $price = $res['price'];
			// $amount = $res['amount'];
			$this->ajaxReturn($res);

			$id_pre = substr($id,0,2);
			if($id_pre == 'g_'){
				$id = trim($id,'g_');
			}
		}

		//查询商品名称
		$goods = new GoodsController();
		$goods = M('goods_detail');
		$goodsInfo = $goods->field('id,name,price')->select();
		//遍历数组为商品的id加上前缀
		foreach ($goodsInfo as $key => $value) {
			$value['id'] = 'g_'.$value['id'];
			$goodsinfo[] = $value;
		}
		
		$fit = new FitController();
		$fits = M('fit_goods');
		$fitsInfo = $fits->field('id,name,price')->select();

		$Info = array_merge($goodsinfo,$fitsInfo);
		// var_dump($Info);

		
		//分配变量
		$this->assign('order_num',$order_num);
		$this->assign('Info',$Info);

		$this->display();
	}

	public function insert(){

		//获取商品id
		$id = $_POST['goods_id'];

		$real_amount = $_POST['real_amount']+$_POST['sup_amount'];
		$id_pre = substr($id,0,2);
			if($id_pre == 'g_'){
				$id = trim($id,'g_');
				$goods = M('goods_detail');
				$res = $goods->field('amount')->find($id);
				$id = 'g_'.$id;
			}else{
				$fits = M('fit_goods');
				$res = $fits->field('amount')->find($id);
			}
		//修改库存前,要判断商品的预定的订单数量;修改数量不可小于订单数量

		//查询商品详情表中的数量与实际数量对比,实际数量应该相等,如果不相等,调节原表中的实际库存数量
		if($res['amount'] !== $real_amount){
			$id_pre = substr($id,0,2);
			if($id_pre == 'g_'){
				$id = trim($id,'g_');
				$goods = M('goods_detail');
				$info = $goods->where("id = '$id'")->setField('amount',$real_amount);
			}else{
				$fits = M('fit_goods');
				//只更新字段amount
				$info = $fits->where("id = '$id'")->setField('amount',$real_amount);
			}
		}
		//提交时间
		$_POST['alter_time'] = strtotime(date('Y-m-d H:i:s',time()));
		//创建模型
		$amount = M('goods_amount');
		$id = $_POST['goods_id'];
		//查询数据库,在数据插入之前将原来的数据删除
		$infos = $amount->where("goods_id='$id'")->select();
		if(isset($infos)){
			$amount->where("goods_id='$id'")->delete();
		}
		//创建数据
		$amount->create();

		if($amount->add()){
			
			$this->success('调节库存成功',U('Amount/index'),'2');

		}else{

			$this->error('调节库存成功',U('Amount/add'),'2');
		}
	}
	public function index(){
		//创建模型
		$amount = M('goods_amount');
		//获取当前请求页码
		$p = isset($_GET['p']) ?$_GET['p'] :1;
		//获取每页显示的数量
		$num = isset($_COOKIE['num'])? $_COOKIE['num']:10;
		setcookie('num',$num,time()+3600,'/');
		//处理分页请求
		$count = $amount->count();
		//实例化分页对象
		$page = new \Think\Page($count,$num);
		//获取页码的html代码
		$show = $page->show();

		//查询数据库中的数据
		$info = $amount->page($p,$num)->select();
		foreach($info as $key=>$value){
			$id = $value['goods_id'];
			$id_pre = substr($id,0,2);

			if($id_pre == 'g_'){
				$id = trim($id,'g_');
				$goods = M('goods_detail');
				$res = $goods->field('name')->find($id);

			}else{
				$fits = M('fit_goods');
				$res = $fits->field('name')->find($id);

			}
			//处理时间数据
			$time = date('Y-m-d H:i:s',$value['alter_time']);
			$value['alter_time'] = $time;
			$value['name'] = $res['name'];
			$infos[] = $value;
		}
		//分配变量
		$this->assign('infos',$infos);
		$this->assign('page',$show);
		$this->display();
	}
	public function edit(){
		//获取id
		$id = I('get.id');
		//查询数据库
		$amount = M('goods_amount');
		$info = $amount->find($id);
		$id = $info['goods_id'];
		$id_pre = substr($id,0,2);

		if($id_pre == 'g_'){
			$id = trim($id,'g_');
			$goods = M('goods_detail');
			$res = $goods->field('name')->find($id);

		}else{
			$fits = M('fit_goods');
			$res = $fits->field('name')->find($id);

		}
		$infos = array_merge($res,$info);

		//分配变量
		$this->assign('infos',$infos);
		$this->display();
	}
}