<?php
/** 
* 兄弟连项目二 乐视商城:问一问模块
*  
* PHP version 5.4.3
* @author      王丽娟<724243914@qq.com> 
* @version     1.0
* @time          2015-01-19 16:24
*/ 
namespace Admin\Controller;
use Think\Controller;
class ArticleController extends Controller {
	//文章列表页
	public function index(){
		$art = M('article');
        //获取当前请求的页码
        $p = isset($_GET['p']) ? $_GET['p'] : 1;
        //获取每页显示的数量
        $num = 10;
        $count = $art->count();//计算当前表中的总数
        $page = new \Think\Page($count,$num);//实例化分页对象
        $show = $page->show();// 获取页码的html代码
        //查询文章列表的id 分类id 标题 访问量 创建时间 标签 img主图
     	$arts = $art->field("id,cid,title,acount,create_time,tags,img")->page($p,$num)->select();
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
	//添加文章
	public function add(){
		$art = M('article_cate');
		//查询文章分类表中字段
		$arts = $art->select();
		//查询标签表
		$tag = M('article_tags');
		$tags = $tag->select();
		$this->assign('tags',$tags);
		$this->assign('arts',$arts);
		$this->display();
	}
	public function insert(){
		$art = M('article');
		//上传图片
		$upload = new \Think\Upload();// 实例化上传类
		$upload->rootPath = "./Public/uploads/";//rootPath这个路径必须手动创建
		$upload->savePath = "look_images/";//这一块只能设置一层目录
		$info   =   $upload->upload();
	
		$_POST['img']  = trim($upload->rootPath.$info['img']['savepath'].$info['img']['savename'],'.') ;//   /Public/Uploads/look_images/2015-01-16/54b8b47234b95.jpg
		//设置文章创建时间戳
		date_default_timezone_set("PRC");
		$_POST['create_time'] = strtotime(date('Y-m-d'));
		$art->create();
		if($art->add()){
     		$this->success('添加成功',U('Article/add'),3);
		}else{
			$this->error('添加失败',U('Article/add'),3);
     	}
	}
	//修改
	public function edit(){
		$id = I('get.id');
		//读图商品信息
		$art = M('article');
		$arts = $art->where("id=$id")->find();
		//查询标签表
		$tag = M('article_tags');
		$tags = $tag->select();
		//查询分类表
		$cate = M('article_cate');
		$cates = $cate->select();

		//分配变量
		$this->assign('arts',$arts);
		$this->assign('tags',$tags);
		$this->assign('cates',$cates);
		$this->display();

	} 
	//更新
	public function updete(){
		$art = M('article');
		if($_FILES['img']['name'] != ""){
			$upload = new \Think\Upload();// 实例化上传类
			$upload->rootPath = "./Public/Uploads/";//rootPath这个路径必须手动创建
			$upload->savePath = "look_images/";//这一块只能设置一层目录
			$info   =   $upload->upload();
			$_POST['img']  = trim($upload->rootPath.$info['img']['savepath'].$info['img']['savename'],'.') ;
			//删除原图
			$ar = $art->where("id={$_POST['id']}")->find();
			$img = '.'.$ar['img'];
			@unlink($img);
		}
		$art->create();
		if($art->save()){//添加成功
			$this->success('更新商品成功',U('Article/index'),4);
		}else{//添加失败
			$this->error('商品更新失败',U('Article/index'),4);
		}
	}
	public function delete(){
		$art = M('article');
		$id = I('get.id');
		$arts = $art->where("id=$id")->find();
		$img = '.'.$arts['img'];
		@unlink($img);
		if($art->delete($id)){
			$this->success('商品删除成功',U('Article/index'),3);
		}else{
			$this->error('商品删除失败',U('Article/index'),3);
		}
	}
}