<?php
/** 
* 兄弟连项目二 乐视商城:比一比模块
*  
* PHP version 5.4.3
* @author      王丽娟<724243914@qq.com> 
* @version     1.0
* @time          2015-01-18 16:24
*/ 
namespace Home\Controller;
use Think\Controller;
class ProductController extends Controller {
	public function index(){
		$pro = M('product');
		//查询品牌为乐视的电视产品
		$pros = $pro->where("brand=1")->find();
		$pro_l=$pro->where("brand=1")->limit(10)->select();
		$lpros = $pro->where("brand != 1")->find();
		//查询电视品牌
		$brand =M('product_brand_con');
		$brands=$brand->select();
		$this->assign('brands',$brands);
		$this->assign('pros',$pros);
		$this->assign('lpros',$lpros);
		$this->assign('pro_l',$pro_l);
		$this->display();
		
	}
	//q详情页
	public function xiangqing(){
		$pro = M('product');
		//如果前台搜索框传来值就走此区间
		if(I('get.v')){
		$w = I('get.v');
		//模糊查找品牌名为$v的
		$pros = $pro->where("proname like '%$w%'")->find();}
		else{
			$w=I('get.id');
			$pros=$pro->where("id=$w")->find();
		}
		$this->assign('pros',$pros);
		//将tag值赋给$id 然后根据id查找tag值
		$id = $pros['tag'];
		$pscid = $pros['id'];
		$tag = M('product_tags');
		$tags = $tag->where("id=$id")->find();
		$tagid = $tags['tag'];
		$this->assign('bname',$bname);
		//查找出来所有标签type为0的标签
		$tagsed = $tag->where("type=0")->select();
		//将选中的标签发送
		$this->assign('tag',$tagid);
		$this->assign('tagsed',$tagsed);
		//查询品牌名字
		$id = $pros['brand'];
		$brand = M('product_brand_con');
		$brands = $brand->where("id=$id")->find();
		$bname = $brands['bname'];
		$this->assign('bname',$bname);
		//查询属性列表
		
		$spec = M('product_spec');
		$spe = M('product_spec_cate');
		//$id = I('get.id');
		$spes = $spe->where('pid=0')->select();//链表查询 左表中pid和右表中pid相等的
		//遍历查询结果
        foreach($spes as $v){
			 $s = $v['id'];
			 $spep[]= $spe->where("pid=$s")->select();//查询pid等于id的字段
			 //链表查询 左表中pid和右表中pid相等的
			 $spepr[] = $spe->field("product_spec_cate.name,product_spec.con,product_spec_cate.id")->join("left join product_spec on product_spec_cate.id=product_spec.pid and product_spec.pscid=$pscid")->where(" product_spec_cate.pid = $s")->order("product_spec_cate.id")->select();
			 $name[] = $v['name'];

		}
		//$a = $spepr[2][2]['con'];
		//分配一级分类值name
		$this->assign('name',$name);
		$this->assign('spepr',$spepr);
		//var_dump($spepr);
		$this->display();
	}
	
	public function lists(){
		//品牌标签表
		$pro = M('product_brand_con');
		//查询所有的品牌标签
		$pros = $pro->select();
		$this->assign('pros',$pros);
		$this->display();
	}
	//产品列表页ajax请求数据
	public function listblock(){
		$num =12;
		$p = isset($_GET['p']) ? $_GET['p'] : 1;
		//未传过来选中值时走此区间
		//M产品表
		$pro = M('product');
		session('where',"",3600);
		$count = $pro->count();//计算表中数据总数
		$pros = $pro->field('id,price,brand,resolution,size,tags,imgmain')->page($p,$num)->select();
		//点击品牌发送ajax查询
		if($_GET['bid']){
			$d=$_GET['bid'];
			$_SESSION['where']['brand']=$d;
			//如果只有品牌值拼接条件
			if(!isset($_SESSION['where']['price']) && !isset($_SESSION['where']['resolution'])){
				$w="brand=$d";
			}
			//有品牌有价格有分辨率时候
			if(!empty($_SESSION['where']['price']) && !empty($_SESSION['where']['resolution'])){
				$p=$_SESSION['where']['price'];
				$fbl=$_SESSION['where']['resolution'];
					if($p=='A'){
						switch ($fbl) {
				            case G:$w="brand=$d and price<'4000' and resolution='1366*768'";
				                  break;
				            case H://价格在4000-6000
				                  $w="brand=$d and price<'4000' and resolution='1920*1080'";
				                  break;
				            case I://价格在6000-8000
				                  $w="brand=$d and price<'4000' and resolution='3840*2160'";
				                  break;
				              } 
				    }
				    if($p=='B'){
						switch ($fbl) {
				            case G:
				            		$w="brand=$d and price between '4000' AND '6000' and resolution='1366*768'";
				                   break;
				            case H:
				                  $w="brand=$d and price between '4000' AND '6000' and resolution='1920*1080'";
				                  break;
				            case I:
				                 $w="brand=$d and price between '4000' AND '6000' and resolution='3840*2160'";
				                  break;
				              } 
				    }
				    if($p=='C'){
						switch ($fbl) {
				            case G:
				                  $w="brand=$d and price between '6000' AND '8000' and resolution='1366*768'";
				                  break;
				            case H:
				                  $w="brand=$d and price between '6000' AND '8000' and resolution='1920*1080'";
				                  break;
				            case I:
				                  $w="brand=$d and price between '6000' AND '8000' and resolution='3840*2160'";
				                  break;
				              } 
				    }
				    if($p=='D'){
						switch ($fbl) {
				            case G://价格在4000以下
				                 $w="brand=$d and price between '8000' AND '10000' and resolution='1366*768'";
				                  break;
				            case H://价格在4000-6000
				                  $w="brand=$d and price between '8000' AND '10000' and resolution='1920*1080'";
				                  break;
				            case I://价格在6000-8000
				                  $w="brand=$d and price between '8000' AND '10000' and resolution='3840*2160'";
				                  break;
				              } 
				    }
				    if($p=='E'){
						switch ($fbl) {
				            case G://价格在4000以下
				                  $w="brand=$d and price between '10000' AND '12000' and resolution='1366*768'";
				                  break;
				            case H://价格在4000-6000
				                  $w="brand=$d and price between '10000' AND '12000' and resolution='1920*1080'";
				                  break;
				            case I://价格在6000-8000
				                  $w="brand=$d and price between '10000' AND '12000' and resolution='3840*2160'";
				                  break;
				              } 
				    }
				    if($p=='F'){
						switch ($fbl) {
				            case G://价格在4000以下
				                  $w="brand=$d and price>'12000' and resolution='1366*768'";break;
				            case H://价格在4000-6000
				                  $w="brand=$d and price>'12000' and resolution='1920*1080'";break;
				            case I://价格在6000-8000
				                  $w="brand=$d and price>'12000' and resolution='3840*2160'";break;
				              } 
				    }
			}
			//有品牌无价格有分辨率
			if(!isset($_SESSION['where']['price']) && !empty($_SESSION['where']['resolution'])){
				$fbl=$_SESSION['where']['resolution'];
				switch ($fbl){
					case G: $w="brand=$d and resolution='1366*768'"; break;
					case H: $w="brand=$d and resolution='1920*1080'";break;
					case I: $w="brand=$d and resolution='3840*2160'";break;
				}

			}
			//有品牌有价格无分辨率
			if(!empty($_SESSION['where']['price']) && !isset($_SESSION['where']['resolution'])){
				$p=$_SESSION['where']['price'];
				switch($p) {
		            case A://价格在4000-6000
                  		  $w="brand=$d and price < '4000'";
                  		  break;
		            case B://价格在4000-6000
		                  $w="brand=$d and price between '4000' AND '6000'";
		                  break;
		            case C://价格在6000-8000
		                  $w="brand=$d and price between '6000' AND '8000'";
		                  break;
		            case D://价格在8000-10000
		                  $w="brand=$d and price between '8000' AND '10000'";
		                  break;
		            case E://价格在10000-12000
		                  $w="brand=$d and price between '10000' AND '12000'";
		                  break;
		            case F://价格在12000以上
		                  $w="brand=$d and price>'12000'";
		                  break;
		        }
			}
		}
		//点击价格发送过来的ajax走此区间
		if($_GET['price']){
			$p=$_GET['price'];
			$_SESSION['where']['price']=$p;
			//没有品牌,没有分辨率值时走此区间
			if(empty($_SESSION['where']['brand']) && empty($_SESSION['where']['resolution'])){
				switch($p) {
		            case A://价格在4000-6000
                  		$w="price <'4000'";
                  		break;
		            case B://价格在4000-6000
		                $w="price between '4000' AND '6000'";
		                 break;
		            case C://价格在6000-8000
		                  $w="price between '6000' AND '8000'";
		                  break;
		            case D://价格在8000-10000
		                  $w="price between '8000' AND '10000'";
		                  break;
		            case E://价格在10000-12000
		                  $w="price between '10000' AND '12000'";
		                  break;
		            case F://价格在12000以上
		                  $w="price>'12000'";
		                  break;
		        }

			}
			//有品牌值没有分辨率的时候走此区间
			if(!empty($_SESSION['where']['brand']) && empty($_SESSION['where']['resolution'])){
				$d=$_SESSION['where']['brand'];
				switch($p) {
		            case A://价格在4000-6000
                  		  $w="brand=$d and price < '4000'";
                  		  break;
		            case B://价格在4000-6000
		                  $w="brand=$d and price between '4000' AND '6000'";
		                  break;
		            case C://价格在6000-8000
		                  $w="brand=$d and price between '6000' AND '8000'";
		                  break;
		            case D://价格在8000-10000
		                  $w="brand=$d and price between '8000' AND '10000'";
		                  break;
		            case E://价格在10000-12000
		                  $w="brand=$d and price between '10000' AND '12000'";
		                  break;
		            case F://价格在12000以上
		                  $w="brand=$d and price>'12000'";
		                  break;
		        }
			}
		    //没有品牌有分辨率时候走此区间
		    if(!isset($_SESSION['where']['brand']) && !empty($_SESSION['where']['resolution'])){
				$fbl=$_SESSION['where']['resolution'];
					if($p=='A'){
						switch ($fbl) {
				            case G://分辨率在1366*768
				                  $w="price<'4000' and resolution='1366*768'";
				                  break;
				            case H://价格在4000-6000
				                  $w="price<'4000' and resolution='1920*1080'";
				                  break;
				            case I://价格在6000-8000
				                  $w="price<'4000' and resolution='3840*2160'";
				                  break;
				              } 
				    }
				    if($p=='B'){
						switch ($fbl) {
				            case G:
				                  $w="price between '4000' AND '6000' and resolution='1366*768'";
				                  break;
				            case H:
				                  $w="price between '4000' AND '6000' and resolution='1920*1080'";
				                  break;
				            case I:
				                  $w="price between '4000' AND '6000' and resolution='3840*2160'";
				                  break;
				              } 
				    }
				    if($p=='C'){
						switch ($fbl) {
				            case G:
				                  $w="price between '6000' AND '8000' and resolution='1366*768'";
				                  break;
				            case H:
				                  $w="price between '6000' AND '8000' and resolution='1920*1080'";
				                  break;
				            case I:
				                  $w="price between '6000' AND '8000' and resolution='3840*2160'";
				                  break;
				              } 
				    }
				    if($p=='D'){
						switch ($fbl) {
				            case G:
				                  $w="price between '8000' AND '10000' and resolution='1366*768'";
				                  break;
				            case H:
				                  $w="price between '8000' AND '10000' and resolution='1920*1080'";
				                  break;
				            case I:
				                  $w="price between '8000' AND '10000' and resolution='3840*2160'";
				                  break;}
				    }
				    if($p=='E'){
						switch ($fbl) {
				            case G:
				                  $w="price between '10000' AND '12000' and resolution='1366*768'";
				                  break;
				            case H:
				                  $w="price between '10000' AND '12000' and resolution='1920*1080'";
				                  break;
				            case I:
				                  $w="price between '10000' AND '12000' and resolution='3840*2160'";
				                  break;}
				    }
				    if($p=='F'){
						switch ($fbl) {
				            case G://分辨率在1366*768
				                  $w="price>'12000' and resolution='1366*768'";
				                  break;
				            case H://价格在4000-6000
				                  $w="price>'12000' and resolution='1920*1080'";
				                  break;
				            case I://价格在6000-8000
				                  $w="price>'12000' and resolution='3840*2160'";
				                  break;
				              } 
				    }
		    }
		    //有品牌有分辨率有价格
		    if(!empty($_SESSION['where']['price']) && !empty($_SESSION['where']['resolution'])){
				$d=$_SESSION['where']['brand'];
				$fbl=$_SESSION['where']['resolution'];
					if($p=='A'){
						switch ($fbl) {
				            case G:$w="brand=$d and price<'4000' and resolution='1366*768'";
				                  break;
				            case H://价格在4000-6000
				                  $w="brand=$d and price<'4000' and resolution='1920*1080'";
				                  break;
				            case I://价格在6000-8000
				                  $w="brand=$d and price<'4000' and resolution='3840*2160'";
				                  break;
				              } 
				    }
				    if($p=='B'){
						switch ($fbl) {
				            case G:
				            		$w="brand=$d and price between '4000' AND '6000' and resolution='1366*768'";
				                   break;
				            case H:
				                  $w="brand=$d and price between '4000' AND '6000' and resolution='1920*1080'";
				                  break;
				            case I:
				                 $w="brand=$d and price between '4000' AND '6000' and resolution='3840*2160'";
				                  break;
				              } 
				    }
				    if($p=='C'){
						switch ($fbl) {
				            case G:
				                  $w="brand=$d and price between '6000' AND '8000' and resolution='1366*768'";
				                  break;
				            case H:
				                  $w="brand=$d and price between '6000' AND '8000' and resolution='1920*1080'";
				                  break;
				            case I:
				                  $w="brand=$d and price between '6000' AND '8000' and resolution='3840*2160'";
				                  break;
				              } 
				    }
				    if($p=='D'){
						switch ($fbl) {
				            case G://价格在4000以下
				                 $w="brand=$d and price between '8000' AND '10000' and resolution='1366*768'";
				                  break;
				            case H://价格在4000-6000
				                  $w="brand=$d and price between '8000' AND '10000' and resolution='1920*1080'";
				                  break;
				            case I://价格在6000-8000
				                  $w="brand=$d and price between '8000' AND '10000' and resolution='3840*2160'";
				                  break;
				              } 
				    }
				    if($p=='E'){
						switch ($fbl) {
				            case G://价格在4000以下
				                  $w="brand=$d and price between '10000' AND '12000' and resolution='1366*768'";
				                  break;
				            case H://价格在4000-6000
				                  $w="brand=$d and price between '10000' AND '12000' and resolution='1920*1080'";
				                  break;
				            case I://价格在6000-8000
				                  $w="brand=$d and price between '10000' AND '12000' and resolution='3840*2160'";
				                  break;
				              } 
				    }
				    if($p=='F'){
						switch ($fbl) {
				            case G://价格在4000以下
				                  $w="brand=$d and price>'12000' and resolution='1366*768'";break;
				            case H://价格在4000-6000
				                  $w="brand=$d and price>'12000' and resolution='1920*1080'";break;
				            case I://价格在6000-8000
				                  $w="brand=$d and price>'12000' and resolution='3840*2160'";break;
				              } 
				    }
			}
		}
		//点击分辨率发送过来的ajax
		if($_GET['fbl']){
			$fbl=$_GET['fbl'];
			$_SESSION['where']['resolution']=$fbl;
			//只有分辨率时候
			if(!isset($_SESSION['where']['brand']) && !isset($_SESSION['where']['price'])){
				switch ($fbl) {
				            case G:$w="resolution='1366*768'";
				                  break;
				            case H://价格在4000-6000
				                  $w="resolution='1920*1080'";
				                  break;
				            case I://价格在6000-8000
				                  $w="resolution='3840*2160'";
				                  break;
				              }
			}
			//有品牌有价格有分辨率
			if(!empty($_SESSION['where']['price']) && !empty($_SESSION['where']['brand'])){
				$d=$_SESSION['where']['brand'];
				$p=$_SESSION['where']['price'];
					if($p=='A'){
						switch ($fbl) {
				            case G:$w="brand=$d and price<'4000' and resolution='1366*768'";
				                  break;
				            case H://价格在4000-6000
				                  $w="brand=$d and price<'4000' and resolution='1920*1080'";
				                  break;
				            case I://价格在6000-8000
				                  $w="brand=$d and price<'4000' and resolution='3840*2160'";
				                  break;
				              } 
				    }
				    if($p=='B'){
						switch ($fbl) {
				            case G:
				            		$w="brand=$d and price between '4000' AND '6000' and resolution='1366*768'";
				                   break;
				            case H:
				                  $w="brand=$d and price between '4000' AND '6000' and resolution='1920*1080'";
				                  break;
				            case I:
				                 $w="brand=$d and price between '4000' AND '6000' and resolution='3840*2160'";
				                  break;
				              } 
				    }
				    if($p=='C'){
						switch ($fbl) {
				            case G:
				                  $w="brand=$d and price between '6000' AND '8000' and resolution='1366*768'";
				                  break;
				            case H:
				                  $w="brand=$d and price between '6000' AND '8000' and resolution='1920*1080'";
				                  break;
				            case I:
				                  $w="brand=$d and price between '6000' AND '8000' and resolution='3840*2160'";
				                  break;
				              } 
				    }
				    if($p=='D'){
						switch ($fbl) {
				            case G://价格在4000以下
				                 $w="brand=$d and price between '8000' AND '10000' and resolution='1366*768'";
				                  break;
				            case H://价格在4000-6000
				                  $w="brand=$d and price between '8000' AND '10000' and resolution='1920*1080'";
				                  break;
				            case I://价格在6000-8000
				                  $w="brand=$d and price between '8000' AND '10000' and resolution='3840*2160'";
				                  break;
				              } 
				    }
				    if($p=='E'){
						switch ($fbl) {
				            case G://价格在4000以下
				                  $w="brand=$d and price between '10000' AND '12000' and resolution='1366*768'";
				                  break;
				            case H://价格在4000-6000
				                  $w="brand=$d and price between '10000' AND '12000' and resolution='1920*1080'";
				                  break;
				            case I://价格在6000-8000
				                  $w="brand=$d and price between '10000' AND '12000' and resolution='3840*2160'";
				                  break;
				              } 
				    }
				    if($p=='F'){
						switch ($fbl) {
				            case G://价格在4000以下
				                  $w="brand=$d and price>'12000' and resolution='1366*768'";break;
				            case H://价格在4000-6000
				                  $w="brand=$d and price>'12000' and resolution='1920*1080'";break;
				            case I://价格在6000-8000
				                  $w="brand=$d and price>'12000' and resolution='3840*2160'";break;
				              } 
				    }
			}
			//有品牌无价格有分辨率
			if(!isset($_SESSION['where']['price']) && !empty($_SESSION['where']['brand'])){
				$d=$_SESSION['where']['brand'];
				switch ($fbl){
					case G: $w="brand=$d and resolution='1366*768'"; break;
					case H: $w="brand=$d and resolution='1920*1080'";break;
					case I: $w="brand=$d and resolution='3840*2160'";break;
				}
			}
			//无品牌有价格有分辨率
			if(!isset($_SESSION['where']['brand']) && !empty($_SESSION['where']['price'])){
				$p=$_SESSION['where']['price'];
					if($p=='A'){
						switch ($fbl) {
				            case G://分辨率在1366*768
				                  $w="price<'4000' and resolution='1366*768'";
				                  break;
				            case H://价格在4000-6000
				                  $w="price<'4000' and resolution='1920*1080'";
				                  break;
				            case I://价格在6000-8000
				                  $w="price<'4000' and resolution='3840*2160'";
				                  break;
				              } 
				    }
				    if($p=='B'){
						switch ($fbl) {
				            case G:
				                  $w="price between '4000' AND '6000' and resolution='1366*768'";
				                  break;
				            case H:
				                  $w="price between '4000' AND '6000' and resolution='1920*1080'";
				                  break;
				            case I:
				                  $w="price between '4000' AND '6000' and resolution='3840*2160'";
				                  break;
				              } 
				    }
				    if($p=='C'){
						switch ($fbl) {
				            case G:
				                  $w="price between '6000' AND '8000' and resolution='1366*768'";
				                  break;
				            case H:
				                  $w="price between '6000' AND '8000' and resolution='1920*1080'";
				                  break;
				            case I:
				                  $w="price between '6000' AND '8000' and resolution='3840*2160'";
				                  break;
				              } 
				    }
				    if($p=='D'){
						switch ($fbl) {
				            case G:
				                  $w="price between '8000' AND '10000' and resolution='1366*768'";
				                  break;
				            case H:
				                  $w="price between '8000' AND '10000' and resolution='1920*1080'";
				                  break;
				            case I:
				                  $w="price between '8000' AND '10000' and resolution='3840*2160'";
				                  break;}
				    }
				    if($p=='E'){
						switch ($fbl) {
				            case G:
				                  $w="price between '10000' AND '12000' and resolution='1366*768'";
				                  break;
				            case H:
				                  $w="price between '10000' AND '12000' and resolution='1920*1080'";
				                  break;
				            case I:
				                  $w="price between '10000' AND '12000' and resolution='3840*2160'";
				                  break;}
				    }
				    if($p=='F'){
						switch ($fbl) {
				            case G://分辨率在1366*768
				                  $w="price>'12000' and resolution='1366*768'";
				                  break;
				            case H://价格在4000-6000
				                  $w="price>'12000' and resolution='1920*1080'";
				                  break;
				            case I://价格在6000-8000
				                  $w="price>'12000' and resolution='3840*2160'";
				                  break;
				              } 
				    }
			}
		}
		//点击品牌的全部
		if($_GET['nb']){
			$_SESSION['where']['brand']=null; 
			//无品牌有价格有分辨率
			if(!empty($_SESSION['where']['resolution']) && !empty($_SESSION['where']['price'])){
				$p=$_SESSION['where']['price'];
				$fbl=$_SESSION['where']['resolution'];
					if($p=='A'){
						switch ($fbl) {
				            case G://分辨率在1366*768
				                  $w="price<'4000' and resolution='1366*768'";
				                  break;
				            case H://价格在4000-6000
				                  $w="price<'4000' and resolution='1920*1080'";
				                  break;
				            case I://价格在6000-8000
				                  $w="price<'4000' and resolution='3840*2160'";
				                  break;
				              } 
				    }
				    if($p=='B'){
						switch ($fbl) {
				            case G:
				                  $w="price between '4000' AND '6000' and resolution='1366*768'";
				                  break;
				            case H:
				                  $w="price between '4000' AND '6000' and resolution='1920*1080'";
				                  break;
				            case I:
				                  $w="price between '4000' AND '6000' and resolution='3840*2160'";
				                  break;
				              } 
				    }
				    if($p=='C'){
						switch ($fbl) {
				            case G:
				                  $w="price between '6000' AND '8000' and resolution='1366*768'";
				                  break;
				            case H:
				                  $w="price between '6000' AND '8000' and resolution='1920*1080'";
				                  break;
				            case I:
				                  $w="price between '6000' AND '8000' and resolution='3840*2160'";
				                  break;
				              } 
				    }
				    if($p=='D'){
						switch ($fbl) {
				            case G:
				                  $w="price between '8000' AND '10000' and resolution='1366*768'";
				                  break;
				            case H:
				                  $w="price between '8000' AND '10000' and resolution='1920*1080'";
				                  break;
				            case I:
				                  $w="price between '8000' AND '10000' and resolution='3840*2160'";
				                  break;}
				    }
				    if($p=='E'){
						switch ($fbl) {
				            case G:
				                  $w="price between '10000' AND '12000' and resolution='1366*768'";
				                  break;
				            case H:
				                  $w="price between '10000' AND '12000' and resolution='1920*1080'";
				                  break;
				            case I:
				                  $w="price between '10000' AND '12000' and resolution='3840*2160'";
				                  break;}
				    }
				    if($p=='F'){
						switch ($fbl) {
				            case G://分辨率在1366*768
				                  $w="price>'12000' and resolution='1366*768'";
				                  break;
				            case H://价格在4000-6000
				                  $w="price>'12000' and resolution='1920*1080'";
				                  break;
				            case I://价格在6000-8000
				                  $w="price>'12000' and resolution='3840*2160'";
				                  break;
				              } 
				    }
		    }
			//无品有价格无分辨率
			if(empty($_SESSION['where']['brand']) && empty($_SESSION['where']['resolution'])){
				$p=$_SESSION['where']['price'];
				switch($p) {
		            case A://价格在4000-6000
                  		$w="price < '4000'";
                  	break;
		            case B://价格在4000-6000
		                $w="price between '4000' AND '6000'";
		                 break;
		            case C://价格在6000-8000
		                  $w="price between '6000' AND '8000'";
		                  break;
		            case D://价格在8000-10000
		                  $w="price between '8000' AND '10000'";
		                  break;
		            case E://价格在10000-12000
		                  $w="price between '10000' AND '12000'";
		                  break;
		            case F://价格在12000以上
		                  $w="price>'12000'";
		                  break;
		        }

			}
			//无品牌无价格有分辨率
			if(empty($_SESSION['where']['brand']) && empty($_SESSION['where']['price'])){
				$fbl=$_SESSION['where']['resolution'];
				switch ($fbl) {
				            case G:$w="resolution='1366*768'";
				                  break;
				            case H://价格在4000-6000
				                  $w="resolution='1920*1080'";
				                  break;
				            case I://价格在6000-8000
				                  $w="resolution='3840*2160'";
				                  break;
				              }
			}
			if(empty($_SESSION['where'])){
				$count = $pro->count();//计算表中数据总数
				$pros = $pro->field('id,price,brand,resolution,size,tags,imgmain')->page($p,$num)->select();
			}

		}
		//点击价格的全部
		if($_GET['np']){
			$_SESSION['where']['price']=null;
			//有品牌无价格有分辨率
			if(empty($_SESSION['where']['price']) && !empty($_SESSION['where']['brand'])){
				$d=$_SESSION['where']['brand'];
				$fbl=$_SESSION['where']['resolution'];
				switch ($fbl){
					case G: $w="brand=$d and resolution='1366*768'"; break;
					case H: $w="brand=$d and resolution='1920*1080'";break;
					case I: $w="brand=$d and resolution='3840*2160'";break;
				}
			}
			//有品牌无价格无分辨率
			if(empty($_SESSION['where']['price']) && empty($_SESSION['where']['resolution'])){
				$d=$_SESSION['where']['brand'];
				$w="brand=$d";
			}
			//无品牌无价格有分辨率
			if(empty($_SESSION['where']['brand']) && empty($_SESSION['where']['price'])){
				$fbl=$_SESSION['where']['resolution'];
				switch ($fbl) {
				            case G:$w="resolution='1366*768'";
				                  break;
				            case H://价格在4000-6000
				                  $w="resolution='1920*1080'";
				                  break;
				            case I://价格在6000-8000
				                  $w="resolution='3840*2160'";
				                  break;
				              }
			}
			if(empty($_SESSION['where'])){
				$count = $pro->count();//计算表中数据总数
				$pros = $pro->field('id,price,brand,resolution,size,tags,imgmain')->page($p,$num)->select();
			}
		}
		//点击分辨率的全部
		if($_GET['nr']){
			$_SESSION['where']['resolution']=null;
			//无分辨率有品牌有价格
			if(!empty($_SESSION['where']['price']) && !empty($_SESSION['where']['brand'])){
				$d=$_SESSION['where']['brand'];
				$p=$_SESSION['where']['price'];
				switch($p) {
		            case A://价格在4000-6000
                  		  $w="brand=$d and price < '4000'";
                  		  break;
		            case B://价格在4000-6000
		                  $w="brand=$d and price between '4000' AND '6000'";
		                  break;
		            case C://价格在6000-8000
		                  $w="brand=$d and price between '6000' AND '8000'";
		                  break;
		            case D://价格在8000-10000
		                  $w="brand=$d and price between '8000' AND '10000'";
		                  break;
		            case E://价格在10000-12000
		                  $w="brand=$d and price between '10000' AND '12000'";
		                  break;
		            case F://价格在12000以上
		                  $w="brand=$d and price>'12000'";
		                  break;
		        }
			}
			//无分辨率有品牌无价格
			if(empty($_SESSION['where']['price']) && empty($_SESSION['where']['resolution'])){
				$d=$_SESSION['where']['brand'];
				$w="brand=$d";
			}
			//无分辨率无品牌有价格
			if(empty($_SESSION['where']['brand']) && empty($_SESSION['where']['resolution'])){
				$p=$_SESSION['where']['price'];
				switch($p) {
		            case A://价格在4000-6000
                  		$w="price < '4000'";
                  	break;
		            case B://价格在4000-6000
		                $w="price between '4000' AND '6000'";
		                 break;
		            case C://价格在6000-8000
		                  $w="price between '6000' AND '8000'";
		                  break;
		            case D://价格在8000-10000
		                  $w="price between '8000' AND '10000'";
		                  break;
		            case E://价格在10000-12000
		                  $w="price between '10000' AND '12000'";
		                  break;
		            case F://价格在12000以上
		                  $w="price>'12000'";
		                  break;
		        }

			}
			if(empty($_SESSION['where'])){
				$count = $pro->count();//计算表中数据总数
				$pros = $pro->field('id,price,brand,resolution,size,tags,imgmain')->page($p,$num)->select();
			}
		}
		
		$count=$pro->field('id,price,brand,resolution,size,tags,imgmain')->where("$w")->count();//计算表中数据总数
		$pros = $pro->field('id,price,brand,resolution,size,tags,imgmain')->where("$w")->page($p,$num)->select();
		//初始化时候查询的数据
		if(!$_GET or (empty($_SESSION['where']))){
			$count = $pro->count();//计算表中数据总数
			$pros = $pro->field('id,price,brand,resolution,size,tags,imgmain')->page($p,$num)->select();
		}
		//var_dump($_SESSION['where']);
		
		$page = new \Think\Page($count,$num);//实例化分页对象
        $show = $page->show();// 获取页码的html代码
		
		//产品标签表
		$tag = M('product_tags');
		//查找type=1的标签
		$tags = $tag->field('id,tag')->where("type=1")->select();
		//将tags值分割称数组
		foreach($pros as $k=>$v){
			$pros[$k]['tags']=explode( ',', $v['tags'] );
		}
		//将id遍历为下标
		foreach($tags as $v){
			$t[$v['id']]=$v['tag'];
		}
		$this->assign('count',$count);
		$this->assign('page',$show);
		$this->assign('tags',$t);
		$this->assign('pros',$pros);
		$this->display();
		

	}
	//首页pk发送的ajax  查询出商品
	public function pkblock(){
		$id=I('get.id');
		$pro=M('product');
		$pros=$pro->where("id=$id")->find();
		$this->assign('pros',$pros);
		$this->display();
	}
	public function pkblock2(){
		$id=I('get.id');
		$pro=M('product');
		$lpros=$pro->where("brand=$id")->find();
		$this->assign('lpros',$lpros);
		$this->display();
		
	}
	public function pk2(){
		//接受前台发送的get值
		$id1=$_GET['id1'];
		$id2=$_GET['id2'];
		$pro = M('product');
		//根据id查出来要pk的商品
		$pro1 =$pro->where("id=$id1")->find();
		$pro2 =$pro->where("id=$id2")->find();
		$this->assign('pro1',$pro1);
		$this->assign('pro2',$pro2);
		//将查询到的tag赋值
		$tag1 = $pro1['tag'];
		$tag2 = $pro2['tag'];
		//M标签表
		$tag = M('product_tags');
		//将选中的标签查出来
		$tags1 = $tag->where("id=$tag1")->find();
		$tags2 = $tag->where("id=$tag2")->find();
		//将查出来的选择标签赋值给  
		$tagid1 = $tags1['tag'];
		$tagid2 = $tags2['tag'];
		//将标签值分配
		$this->assign('tags1',$tagid1);
		$this->assign('tags2',$tagid2);
		//查找出来所有标签type为0的标签
		$tagsed = $tag->where("type=0")->select();
		//将标签二维数组发送
		$this->assign('tagsed',$tagsed);
		//查询品牌名字
		$ids1 = $pro1['brand'];
		$ids2 = $pro2['brand'];
		//M品牌表
		$brand = M('product_brand_con');
		$brands1 = $brand->where("id=$ids1")->find();
		$brands2 = $brand->where("id=$ids2")->find();
		$bname1 = $brands1['bname'];
		$bname2 = $brands2['bname'];
		$this->assign('bname1',$bname1);
		$this->assign('bname2',$bname2);
		//查询属性列表
		$spec = M('product_spec');
		$spe = M('product_spec_cate');
		$spes = $spe->where('pid=0')->select();//链表查询 左表中pid和右表中pid相等的
		//遍历查询结果
		foreach($spes as $v){
			 $s = $v['id'];
			 $spep[]= $spe->where("pid=$s")->select();//查询pid等于id的字段
			 //链表查询 左表中id和右表中pid相等的
			 $spepr1[] = $spe->field("product_spec_cate.name,product_spec.con,product_spec_cate.id")->join("left join product_spec on product_spec_cate.id=product_spec.pid and product_spec.pscid=$id1")->where(" product_spec_cate.pid = $s")->order("product_spec_cate.id")->select();
			 $spepr2[] = $spe->field("product_spec_cate.name,product_spec.con,product_spec_cate.id")->join("left join product_spec on product_spec_cate.id=product_spec.pid and product_spec.pscid=$id2")->where(" product_spec_cate.pid = $s")->order("product_spec_cate.id")->select();
			 $name[] = $v['name'];
		}
		$this->assign('name',$name);
		$this->assign('spep',$spep);
		$this->assign('spepr1',$spepr1);
		$this->assign('spepr2',$spepr2);
		$this->display();

	}
	// public function listblocks(){
	// 	$num =12;
	// 	$p = isset($_GET['p']) ? $_GET['p'] : 1;
	// 	//未传过来选中值时走此区间
	// 	//M产品表
	// 	$pro = M('product');
	// 	//如果get传过来品牌的值就走if区间
	// 	if($_GET['brand']){
	// 		$b=$_GET['brand'];
	// 	//如果在选择品牌情况下又选择了价格走此区间
	// 		if($_GET['price']){
	// 			$price = $_GET['price'];
	// 			if($_GET['fbl']){
	// 				$fbl=$_GET['fbl'];
	// 				if($price=='A'){
	// 					switch ($fbl) {
	// 			            case G://分辨率在1366*768
	// 			                  $pros = $pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b and price<'4000' and resolution='1366*768'")->page($p,$num)->select();
	// 			                  $count=$pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b and price<'4000' and resolution='1366*768'")->count();
	// 			                  break;
	// 			            case H://价格在4000-6000
	// 			                  $pros = $pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b and price<'4000' and resolution='1920*1080'")->page($p,$num)->select();
	// 			                  $count=$pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b and price<'4000' and resolution='1920*1080'")->count();
	// 			                  break;
	// 			            case I://价格在6000-8000
	// 			                  $pros = $pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b and price<'4000' and resolution='3840*2160'")->page($p,$num)->select();
	// 			                  $count=$pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b and price<'4000' and resolution='3840*2160'")->count();
	// 			                  break;
	// 			              } 
	// 			    }
	// 			    if($price=='B'){
	// 					switch ($fbl) {
	// 			            case G:
	// 			                  $pros = $pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b and price between '4000' AND '6000' and resolution='1366*768'")->page($p,$num)->select();
	// 			                  $count=$pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b and price between '4000' AND '6000' and resolution='1366*768'")->count();
	// 			                  break;
	// 			            case H:
	// 			                  $pros = $pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b and price between '4000' AND '6000' and resolution='1920*1080'")->page($p,$num)->select();
	// 			                  $count=$pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b and price between '4000' AND '6000' and resolution='1920*1080'")->count();
	// 			                  break;
	// 			            case I:
	// 			                  $pros = $pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b and price between '4000' AND '6000' and resolution='3840*2160'")->page($p,$num)->select();
	// 			                  $count=$pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b and price between '4000' AND '6000' and resolution='3840*2160'")->count();
	// 			                  break;
	// 			              } 
	// 			    }
	// 			    if($price=='C'){
	// 					switch ($fbl) {
	// 			            case G:
	// 			                  $pros = $pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b and price between '6000' AND '8000' and resolution='1366*768'")->page($p,$num)->select();
	// 			                  $count=$pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b and price between '6000' AND '8000' and resolution='1366*768'")->count();
	// 			                  break;
	// 			            case H:
	// 			                  $pros = $pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b and price between '6000' AND '8000' and resolution='1920*1080'")->page($p,$num)->select();
	// 			                  $count=$pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b and price between '6000' AND '8000' and resolution='1920*1080'")->count();
	// 			                  break;
	// 			            case I:
	// 			                  $pros = $pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b and price between '6000' AND '8000' and resolution='3840*2160'")->page($p,$num)->select();
	// 			                  $count=$pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b and price between '6000' AND '8000' and resolution='3840*2160'")->count();
	// 			                  break;
	// 			              } 
	// 			    }
	// 			    if($price=='D'){
	// 					switch ($fbl) {
	// 			            case G://价格在4000以下
	// 			                  $pros = $pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b and price between '8000' AND '10000' and resolution='1366*768'")->page($p,$num)->select();
	// 	                  		  $count=$pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b and price between '8000' AND '10000' and resolution='1366*768'")->count();
	// 			                  break;
	// 			            case H://价格在4000-6000
	// 			                  $pros = $pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b and price between '8000' AND '10000' and resolution='1920*1080'")->page($p,$num)->select();
	// 	                  		  $count=$pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b and price between '8000' AND '10000' and resolution='1920*1080'")->count();
	// 			                  break;
	// 			            case I://价格在6000-8000
	// 			                  $pros = $pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b and price between '8000' AND '10000' and resolution='3840*2160'")->page($p,$num)->select();
	// 	                  		  $count=$pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b and price between '8000' AND '10000' and resolution='3840*2160'")->count();
	// 			                  break;
	// 			              } 
	// 			    }
	// 			    if($price=='E'){
	// 					switch ($fbl) {
	// 			            case G://价格在4000以下
	// 			                  $pros = $pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b and price between '10000' AND '12000' and resolution='1366*768'")->page($p,$num)->select();
	// 	                  		  $count=$pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b and price between '1000' AND '12000' and resolution='1366*768'")->count();
	// 			                  break;
	// 			            case H://价格在4000-6000
	// 			                  $pros = $pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b and price between '10000' AND '12000' and resolution='1920*1080'")->page($p,$num)->select();
	// 	                  		  $count=$pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b and price between '1000' AND '12000' and resolution='1920*1080'")->count();
	// 			                  break;
	// 			            case I://价格在6000-8000
	// 			                  $pros = $pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b and price between '10000' AND '12000' and resolution='3840*2160'")->page($p,$num)->select();
	// 	                  		  $count=$pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b and price between '1000' AND '12000' and resolution='3840*2160'")->count();
	// 			                  break;
	// 			              } 
	// 			    }
	// 			    if($price=='F'){
	// 					switch ($fbl) {
	// 			            case G://价格在4000以下
	// 			                  $pros = $pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b and price>'12000' and resolution='1366*768'")->page($p,$num)->select();
	// 	                  		  $count=$pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b and price>'12000'and resolution='1366*768'")->count();
	// 			                  break;
	// 			            case H://价格在4000-6000
	// 			                  $pros = $pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b and price>'12000' and resolution='1920*1080'")->page($p,$num)->select();
	// 	                  		  $count=$pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b and price>'12000' and resolution='1920*1080'")->count();
	// 			                  break;
	// 			            case I://价格在6000-8000
	// 			                  $pros = $pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b and price>'12000' and resolution='3840*2160'")->page($p,$num)->select();
	// 	                  		  $count=$pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b and price>'12000' and resolution='3840*2160'")->count();
	// 			                  break;
	// 			              } 
	// 			    }
					
	// 	        }else{
	// 			      //判断选择的价格区间
	// 	        switch ($price) {
	// 	            case A://价格在4000以下
	// 	                  $pros = $pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b and price<'4000'")->page($p,$num)->select();
	// 	                  $count=$pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b and price<'4000'")->count();
	// 	                  break;
	// 	            case B://价格在4000-6000
	// 	                  $pros = $pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b and price between '4000' AND '6000'")->page($p,$num)->select();
	// 	                  $count=$pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b and price between '4000' AND '6000'")->count();
	// 	                  break;
	// 	            case C://价格在6000-8000
	// 	                  $pros = $pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b and price between '6000' AND '8000'")->page($p,$num)->select();
	// 	                  $count=$pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b and price between '6000' AND '8000'")->count();
	// 	                  break;
	// 	            case D://价格在8000-10000
	// 	                  $pros = $pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b and price between '8000' AND '10000'")->page($p,$num)->select();
	// 	                  $count=$pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b and price between '8000' AND '10000'")->count();
	// 	                  break;
	// 	            case E://价格在10000-12000
	// 	                  $pros = $pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b and price between '10000' AND '12000'")->page($p,$num)->select();
	// 	                  $count=$pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b and price between '1000' AND '12000'")->count();
	// 	                  break;
	// 	            case F://价格在12000以上
	// 	                  $pros = $pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b and price>'12000'")->page($p,$num)->select();
	// 	                  $count=$pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b and price>'12000")->count();
	// 	                  break;}
	// 			}
	// 		}else{
	// 		$pros = $pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b")->page($p,$num)->select();
	// 		$count=$pro->field('id,price,brand,resolution,size,tags,imgmain')->where("brand=$b")->count();
	// 		}
	// 	}else{
	// 		$count = $pro->count();//计算表中数据总数
	// 		$pros = $pro->field('id,price,brand,resolution,size,tags,imgmain')->page($p,$num)->select();
	// 	}
		
	// 	$page = new \Think\Page($count,$num);//实例化分页对象
 //        $show = $page->show();// 获取页码的html代码
		
	// 	//产品标签表
	// 	$tag = M('product_tags');
	// 	//查找type=1的标签
	// 	$tags = $tag->field('id,tag')->where("type=1")->select();
	// 	//将tags值分割称数组
	// 	foreach($pros as $k=>$v){
	// 		$pros[$k]['tags']=explode( ',', $v['tags'] );
	// 	}
	// 	//将id遍历为下标
	// 	foreach($tags as $v){
	// 		$t[$v['id']]=$v['tag'];
	// 	}
	// 	$this->assign('count',$count);
	// 	$this->assign('page',$show);
	// 	$this->assign('tags',$t);
	// 	$this->assign('pros',$pros);
	// 	$this->display();
		

	// }

	
}