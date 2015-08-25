<?php 
/** 
* 兄弟连项目二 乐视商城:配件评价管理模块
*  
* PHP version 5.4.16
* @author      刘 健<1307668516@qq.com> 
* @version     6.0
* @time          2015-02-03 19:35
*/ 
namespace Admin\Controller;
use Think\Controller;
class GoodsassessController extends Controller { 

	public function index(){

		//创建模型
		$ass = M('goods_assess');
		//获取当前请求页码
		$p = isset($_GET['p']) ?$_GET['p'] :1;
		//获取每页显示的数量
		$num = isset($_COOKIE['num'])? $_COOKIE['num']:10;
		setcookie('num',$num,time()+3600,'/');
		//处理分页请求
		$count = $ass->count();
		//实例化分页对象
		$page = new \Think\Page($count,$num);
		//获取页码的html代码
		$show = $page->show();
		//查询数据库
		$res = $ass->page($p,$num)->select();
		foreach ($res as $key => $value) {
			//处理评价时间的时间戳,转换成日期格式
			$ass_time = date('Y-m-d H:i:s',$value['ass_time']);
			$value['ass_time'] = $ass_time;
			$id = $value['goods_id'];
			$id_pre = substr($id,0,2);
			if($id_pre == 'g_'){
				$id = trim($id,'g_');
				$goods = M('goods_detail');
				$info = $goods->field('id,name,price,amount')->find($id);

			}else{	
				$fits = M('fit_goods');
				$info = $fits->field('id,name,price,amount')->find($id);
			}
			// var_dump($info);
			$uid = $value['user_id'];
			//根据user_id查询订单用户名**************************(此处现在是admin_user表,应该改成用户信息表)!!!******************
			//创建模型
			$c = M('user');
			$user = $c->field()->find($uid);
			$info = array_merge($user,$info);
			//销毁指定的元素
			unset($info['id']);
			//将所有的值合并成一个数组
			$info = array_merge($info,$value);
			//变为二维数组
			$infos[] = $info;
		}

		// var_dump($infos);
		//分配变量

		$this->assign('infos',$infos);
		$this->assign('page',$show);
		$this->assign('num',$num);
		$this->display();
	}
	public function edit(){
		//获取id
		$id = I('get.id');
		//创建模型
		$ass = M('goods_assess');
		//查询数据库
		$res = $ass->where('id='.$id)->find();

		//处理评价时间的时间戳,转换成日期格式
		$ass_time = date('Y-m-d H:i:s',$res['ass_time']);
		$res['ass_time'] = $ass_time;
		// var_dump($res);

		//处理获得的id字段
		$gid = $res['goods_id'];
		$id_pre = substr($gid,0,2);
		//查询商品详情和配件商品详情数据库
		if($id_pre == 'g_'){
			$id = trim($gid,'g_');
			$goods = M('goods_detail');
			$info = $goods->field('id,name,price,amount')->find($id);
		}else{	
			$id = $gid;
			$fits = M('fit_goods');
			$info = $fits->field('id,name,price,amount')->find($id);
		}
		
		$uid = $value['user_id'];
		//根据user_id查询订单用户名**************************(此处现在是admin_user表,应该改成用户信息表)!!!******************
		//创建模型
		$c = M('user');
		$user = $c->field()->find($uid);
		$info = array_merge($user,$info);

		//销毁指定的元素
		unset($info['id']);
		//将所有的值合并成一个数组
		$info = array_merge($info,$res);

		//处理img字段值图片路径
		$img = explode('#',$info['img']);


		//分配变量
		$this->assign(info,$info);
		$this->assign(img,$img);
		//根据订单号order_num来查询goods_order表,查询订单信息
		$order_num = $info['order_num'];
		//建立模型
		$order = M('goods_order');
		//查询数据库
		$orders = $order->field('deliveryinfo_id,paymode_id,express_list_num,coupon_type,coupon_info')->where("order_num='$order_num'")->find();
		//从数据库表consignee_info中查询订单收货信息
		$c = M('consignee_info');
		$cinfo = $c->field('name,fix_phone,mobile_phone,address,postal_code')->where('id='.$orders['deliveryinfo_id'])->find();
		//从数据库表payment_method查询订单支付信息
		$p = M('payment_method');
		$pinfo = $p->field('type')->find($orders['paymode_id']);

		// var_dump($orders);
		// var_dump($cinfo);
		// var_dump($pinfo);

		//分配变量
		$this->assign('cinfo',$cinfo);
		$this->assign('pinfo',$pinfo);
		$this->assign('orders',$orders);

		$this->display();
	}
	public function update(){
		//处理时间
		$_POST['ass_time'] = strtotime($_POST['ass_time']);
		// var_dump($time);
  		//创建模型
  		$assess = M('goods_assess');
		//通过id获取原图信息
		$id = I('post.id');
		//查询数据库,获取img字段信息
		$ini_img = $assess->field('img')->find($id);
		//当有新图片上传时候执行,原图删除
		if(!empty($ini_img)){
			// var_dump($ini_img);die;
			//处理原图信息,并拼装路径
			$ini_imgs = explode('#',$ini_img['img']);
			foreach($ini_imgs as $k=>$v){
				//遍历删除图片
				$ini_imginfo = '.'.$v;
				unlink($ini_imginfo);
			}
		}
		
		//处理图片信息
		//上传图片进行判断,如果有图片上传,即在form表单传递过来有值,需要先上传文件后,然后再删除原来的文件
 		//实例化上传类
 		$upload = new \Think\Upload();
 		//rootPath方法,路径必须手动创建
 		$upload->rootPath = "./Public/Uploads/";
 		//设置图片上传目录,只能设置一层目录
 		$upload->savePath = "goods_assess/";
 		//上传图片文件
 		 $info   =   $upload->upload();
 		 //整理字段img值,拼接图片路径编程规则:/Public/Uploads/goods_cate/2015-01-19/54bc80302291b.jpg
 		 foreach($info as $key=>$value){
 		 	$img[] = trim($upload->rootPath.$value['savepath'].$value['savename'],'.');
 		 }
  		$imgs = implode('#',$img);
  		$_POST['img'] = $imgs;
  		// var_dump($_POST);die;

  		$ass=$assess->create();
  		// var_dump($ass);die;
  		// 判断添加数据是否成功,并跳转重定向
		if($assess->save()){
			$this->success('评价修改成功',U('Goodsassess/index'),2);
		}else{
			$this->error('评价修改失败',U('Goodsassess/edit',array('id'=>$_POST['id'])),2);
		}
	}
	public function addtag(){

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

		//分配变量
		$Info = array_merge($goodsinfo,$fitsInfo);
		// var_dump($Info);
		$this->assign('Info',$Info);
		$this->display();
	}
	public function insert(){
		//接收传值
		
		$_POST['default_mark'] =1;
		//创建模型
		$tag = M('goods_assess_tag');
		//创建数据
		$tags = $tag->create();
		if($tag->add()){
			$this->success('添加默认标签成功',U('Goodsassess/taglist'),2);
		}else{
			$this->error('添加默认标签失败,请重新添加',U('Goodsassess/addtag'),2);
		}
	}
	public function taglist(){
		//创建模型
		$tag = M('goods_assess_tag');
		//获取当前请求页码
		$p = isset($_GET['p']) ?$_GET['p'] :1;
		//获取每页显示的数量
		$num = isset($_COOKIE['num'])? $_COOKIE['num']:10;
		setcookie('num',$num,time()+3600,'/');
		//处理分页请求
		$count = $tag->count();
		//实例化分页对象
		$page = new \Think\Page($count,$num);
		//获取页码的html代码
		$show = $page->show();
		//查询数据库
		$info = $tag->page($p,$num)->select();

		//创建模型
		
		foreach($info as $key=>$value){
			$id = $value['goods_id'];
			$pre = substr($id,0,2);
			if($pre == 'g_'){
				$goods = M('goods_detail');
				$gid = trim($id,'g_');

				//查询数据库
				$res = $goods->field('name')->find($gid);

			}else{
				$fits = M('fit_goods');
				$res = $fits->field('name')->find($id);
			}
			$value['goods_name'] = $res['name'];
			$infos[] = $value;
		}
		// var_dump($infos);
		//分配变量
		$this->assign('infos',$infos);
		$this->assign('page',$show);
		$this->display();
	}
	public function modify(){
		//获取id
		$id = $_GET['id'];
		//创建模型
		$tag = M('goods_assess_tag');
		//查询数据库
		$info = $tag->find($id);
		// var_dump($info);
		//分配变量
		$this->assign('info',$info);

		$this->display();
	}
	public function updatetag(){
		//获取id
		$id = $_POST['id'];
		//创建数据模型
		$tag = M('goods_assess_tag');
		//创建数据
		unset($_POST['id']);
		$res = $tag-> where('id='.$id)->setField($_POST);

		//更新数据库
		if($res == 1){
			$this->success('设置标签成功',U('Goodsassess/taglist'),2);
		}else{
			$this->error('设置标签失败,请重新设置',U('Goodsassess/modify'),2);
		}
	}
}