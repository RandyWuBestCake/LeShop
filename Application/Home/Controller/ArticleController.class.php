<?php
/** 
* 兄弟连项目二 乐视商城:问一问模块
*  
* PHP version 5.4.3
* @author      王丽娟<724243914@qq.com> 
* @version     1.0
* @time          2015-01-19 16:24
*/ 
namespace Home\Controller;
use Think\Controller;
class ArticleController extends Controller {
	public function index(){
		$art = M('article');
		$arts = $art->where("cid !=6")->select();
		//查询article_cate
     	$cate = M('article_cate');
     	$cates = $cate->select();
     	//遍历分类
		foreach($cates as $v){
			$c[$v['id']] = $v['name'];
			
		}
		$this->assign('arts',$arts);
		$this->assign('c',$c);
		$this->display();
		
	}

            public function gonggao(){
                $announcement = M("announcement");
                $id = I('get.id');
                $row = $announcement->where("id = $id")->find();
                $this->assign('arts',$row);
                $this->display('xiangqing');
            }

	public function xiangqing(){
		$id = I('get.id');//获取get值
		$art = M('article');
		$arts = $art->where("id=$id and cid !=6")->find();
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