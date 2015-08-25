<?php
/** 
* 兄弟连项目二 乐视商城:看一看模块
*  
* PHP version 5.4.3
* @author      王丽娟<724243914@qq.com> 
* @version     1.0
* @time          2015-01-19 16:24
*/ 
namespace Admin\Controller;
use Think\Controller;
class LookController extends Controller {
	public function index(){
		$art = M('article');
        //查询文章列表的id 分类id 标题 访问量 创建时间 标签 img主图
       	$arts = $art->field("id,cid,title,acount,create_time,tags,img,type")->where("tags>0")->order('create_time desc')->select();
     	//查询tags表
     	$tag = M('article_tags');
     	$tags = $tag->select();
     	//查询article_cate
     	$cate = M('article_cate');
     	$cates = $cate->select();
     	//将时间格式化
		//分配变量
     	//遍历分类
		foreach($cates as $v){
			$c[$v['id']] = $v['name'];
			
		}
		//遍历标签
		foreach($tags as $s){
			$t[$s['id']] = $s['tag'];
		}
        $this->assign('arts',$arts);
		$this->assign('t',$t);
		$this->assign('c',$c);
        $this->assign('page',$show);
        $this->assign('num',$num);
     	$this->display();
	}
    public function updete(){
        $art = M('article');
        //将type=1的值查询出来
        $artd = $art->where('type=1')->select();
        foreach($artd as $k=>$v){
            $v['type']='0';
            //将type等于1的值全部改成0
            $artsd = $art->save($v);
        }
        foreach($_POST as $v){
            $data['type']=1;
            $id = $v;
            //将前台提交的id分别将type值改变成1
            $arts=$art->where("id=$id")->save($data);
        }
    }
}