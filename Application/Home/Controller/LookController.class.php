<?php
/** 
* 兄弟连项目二 乐视商城:看一看模块
*  
* PHP version 5.4.3
* @author      王丽娟<724243914@qq.com> 
* @version     1.0
* @time          2015-01-27 16:24
*/ 
namespace Home\Controller;
use Think\Controller;
class LookController extends Controller {
	//看一看首页
	public function index(){
		$art = M('article');
		//将所有类型为看一看的查出来
		$arts = $art->where("cid=6")->select();
		//查询tags表
     	$tag = M('article_tags');
     	$tags = $tag->select();
		//遍历标签
		foreach($tags as $s){
			$t[$s['id']] = $s['tag'];
		}
		//将type等于1的查出来
		$ban = $art->where("type=1")->select();
		//分配变量
		$this->assign('arts',$arts);
		$this->assign('t',$t);
		$this->assign('ban',$ban);
		$this->display();
	}

	//瀑布流查询数据
	public function datas(){
		$num = I('get.num');
		$p = I('get.p');
		//查询标签
		$tag = M('article_tags');
     	$tags = $tag->select();
		//遍历标签
		foreach($tags as $s){
			$t[$s['id']] = $s['tag'];
		}
		$art = M('article');
		$arts = $art->where("cid=6")->page($p,$num)->select();
		foreach($arts as $k=>$v){
			$arts[$k]['con']=strip_tags(mb_substr($v['con'],0,strpos($v['con'],'</p>')));
			$arts[$k]['tags']=$t[$v['tags']];
		}
		$this->ajaxreturn($arts);
	}

	//时光轴
	public function timeline(){
		$this->display();
		
	}

	//热播
	public function hot(){
		$art = M('article');
		//将所有类型为看一看的查出来查出最新更新的五条
		$arts = $art->where("cid=6")->order('create_time desc')->limit(0,5)->select();
		//查询出最新更新的标签为电影的三个文章
		$num = $art->where("cid=6 and tags=11")->order('create_time desc')->limit(0,3)->select();
		//截取文章中指定内容
		foreach($num as $k=>$v){
			$num[$k]['con']=mb_substr($v['con'],strpos($v['con'],'<p><span'),mb_strrpos($v['con'],'<strong>','utf-8'));
			
		}
		//查询标枪tags值在数组中的信息每个标签最多10条
		$arr = array(5,6,7,8,11);
		foreach($arr as $k=>$v){
			$rank[] = $art->where("cid=6 and tags=$v")->limit(4)->select();
		}
		//查询tags表
     	$tag = M('article_tags');
     	$tags = $tag->select();
		//遍历标签
		foreach($tags as $s){
			$t[$s['id']] = $s['tag'];
		}
	
		$this->assign('t',$t);
		$this->assign('rank',$rank);
		$this->assign('arts',$arts);
		$this->assign('num',$num);
		$this->display();
	}
	//时光轴ajax请求
	public function timeblock(){
		$num =isset($_GET['num']) ? $_GET['num'] : 2;
		$p = isset($_GET['p']) ? $_GET['p'] : 1;
		$art = M('article');
		$times = $art->field('create_time')->where("cid=6")->group('create_time')->page($p,$num)->select();
		foreach($times as $k=>$v){
			$timeline[]=$v['create_time'];
			$arts[] = $art->where("cid=6 and create_time= '".$v['create_time']."'")->select();
		}

		$this->assign('arts',$arts);
		$this->assign('timeline',$timeline);
		$this->display();
		
	}
	//看一看详情页
	public function xiangqing(){
		$id = I('get.id');//获取get值
		$art = M('article');
		$arts = $art->where("id=$id and cid=6")->find();
		$bn=$art->where("cid !=6")->limit(0,5)->select();
		$bn2=$art->where("cid !=6")->limit(5,5)->select();

		//查询tags表
     	$tag = M('article_tags');
     	$tags = $tag->select();
     	//查询article_cate
     	$cate = M('article_cate');
     	$cates = $cate->select();
     	//遍历分类
		foreach($cates as $v){
			$c[$v['id']] = $v['name'];
			
		}
		//遍历标签
		foreach($tags as $s){
			$t[$s['id']] = $s['tag'];
		}
		$this->assign('bn',$bn);
		$this->assign('bn2',$bn2);
		
		$this->assign('arts',$arts);
		$this->assign('c',$c);
		$this->assign('t',$t);
		$this->display();
	}
	
	
}


?>