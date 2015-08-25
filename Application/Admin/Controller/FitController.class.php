<?php 
/** 
* 兄弟连项目二 乐视商城:配件管理模块
*  
* PHP version 5.4.16
* @author      刘 健<1307668516@qq.com> 
* @version     3.0
* @time          2015-01-20 14:02
*/ 
namespace Admin\Controller;
use Think\Controller;
class FitController extends Controller { 
	//显示用户添加页面
	public function add(){
		//定义区域数组
		$province_arr = array('北京','重庆','福建','甘肃','广东','广西','贵州','海南','河北','安徽','黑龙江','河南','香港','湖北','湖南','江苏','江西','吉林','辽宁','澳门','内蒙古','宁夏','青海','山东','上海','山西','陕西','四川','台湾','天津','新疆','西藏','云南','浙江','海外');
		//调用getCates方法
		$cate = new CateController();
		//创建模型
		$c = M('goods_cate');
		$cates = $cate->getCates();
		//获取配件的分类

		//分配变量
		$this->assign('province',$province_arr);
		$this->assign('cates',$cates);

		$this->display();
	}
		public function insert(){
		//创建模型
		$fit = M('fit_goods');

 		//上传图片进行判断,如果有图片上传,即在form表单传递过来有值,需要先上传文件后,然后再删除原来的文件
 		//实例化上传类
 		$upload = new \Think\Upload();
 		//rootPath方法,路径必须手动创建
 		$upload->rootPath = "./Public/Uploads/";
 		//设置图片上传目录,只能设置一层目录
 		$upload->savePath = "fit_goods/";
 		//上传图片文件
 		 $info   =   $upload->upload();
 		 //整理字段img值,拼接图片路径编程规则:/Public/Uploads/goods_cate/2015-01-19/54bc80302291b.jpg
 		 $_POST['img'] = trim($upload->rootPath.$info['img']['savepath'].$info['img']['savename'],'.');
 		 //处理添加时间
 		 $_POST['addtime'] = strtotime($_POST['addtime']);

		//创建数据
		// var_dump($_POST);die;
		$s=$fit->create();
		// 判断添加数据是否成功,并跳转重定向
		if($fit->add()){
			$this->success('添加配件成功',U('Fit/index'),3);
		}else{
			$this->error('添加配件失败',U('Fit/add'),3);
		}
	}
	public function index(){
		
		//调用getCates方法
		//创建模型
		$fit = M('fit_goods');
		//获取当前请求页码
		$p = isset($_GET['p']) ?$_GET['p'] :1;
		//获取每页显示的数量
		$num = isset($_COOKIE['num'])? $_COOKIE['num']:10;
		setcookie('num',$num,time()+3600,'/');
		//处理分页请求
		//计算分类表中的总数
		$count = $fit->count();
		//实例化分页对象
		$page = new \Think\Page($count,$num);
		//获取页码的html代码
		$show = $page->show();
		//从数据库读取所有的数据
		// $cates = $fit->field('id,name,pid,concat(path,"-",id) as paths,img')->order('paths')->page($p,$num)->select();
		$fits = $fit->page($p,$num)->select();
		// var_dump($cates);die();
		foreach($fits as $key=>$value){
			$num = count(explode('-',$value['paths']))-2;
			$cates[$key]['name'] = str_repeat('|-----',$num).$value['name'];	
		}
		//分配变量
		$this->assign('fits',$fits);
		$this->assign('province','$province_arr');
		$this->assign('page',$show);
		$this->assign('num',$num);

		$this->display();
	}
	public function edit(){
		//定义区域数组
		$province_arr = array('安徽','北京','重庆','福建','甘肃','广东','广西','贵州','海南','河北','黑龙江','河南','香港','湖北','湖南','江苏','江西','吉林','辽宁','澳门','内蒙古','宁夏','青海','山东','上海','山西','陕西','四川','台湾','天津','新疆','西藏','云南','浙江','海外');
		//获取id
		$id = I('get.id');
		//创建模型
		$fit = M('fit_goods');
		//实例化商品分类对象
		$cate = new CateController();
		$cates = $cate->getCates();
		//从数据库查询数据
		$fitInfo = $fit->where('id='.$id)->find();
		// var_dump($fitInfo);
		//分配变量
		$this->assign('fitInfo',$fitInfo);
		$this->assign('cates',$cates);
		$this->assign('province',$province_arr);
		// var_dump($cates);
		$this->display();
	}
	public function update(){
		//获取id
		$id = I('post.id');
		//创建模型
		$fit = M('fit_goods');
		// 上传图片
 		//上传图片进行判断,如果有图片上传,即在form表单传递过来有值,需要先上传文件后,然后再删除原来的文件
 		if($_FILES['img']['name'] != ""){
 		//实例化上传类
 		$upload = new \Think\Upload();
 		//rootPath方法,路径必须手动创建
 		$upload->rootPath = "./Public/Uploads/";
 		//设置图片上传目录,只能设置一层目录
 		$upload->savePath = "fit_goods/";
 		//上传图片文件
 		 $info   =   $upload->upload();
 		 //整理字段img值,拼接图片路径编程规则:/Public/Uploads/goods_cate/2015-01-19/54bc80302291b.jpg
 		 $_POST['img'] = trim($upload->rootPath.$info['img']['savepath'].$info['img']['savename'],'.');
 		 //删除原来的主图
 		 $fitInfo = $fit->where("id={$_POST['id']}")->find();
 		 //拼装原图路径
 		 $img = '.'.$fitInfo['img'];
  		 // var_dump($img);die;
  		 //执行删除
 		 unlink($img);
 		}
		//处理时间数据
		$_POST['addtime'] = strtotime($_POST['addtime']);
		// var_dump($_POST);die;
		//创建数据
		$fitInfo = $fit->create();
		// var_dump($fitInfo);die;
		if($fit->save()){
			$this->success('配件修改成功',U('Fit/index'),2);
		}else{
			$this->success('配件修改失败',U('Fit/edit'),2);
		}
	}
	public function delete(){
		//获取id
		$id = I('get.id');
		//创建模型
		$fit = M('fit_goods');
		//删除原图
		$info=$fit->where('id='.$id)->find();
		// var_dump($info['img']);
		//原图路径
		$img = $info['img'];
		unlink($img);
		if($fit->delete($id)){
			$this->success('配件删除成功',U('Fit/index'),2);
		}else{
			$this->success('配件删除失败',U('Fit/index'),2);
		}
	}
}
 ?>