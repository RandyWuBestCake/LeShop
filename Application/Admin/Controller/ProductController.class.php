<?php
/** 
* 兄弟连项目二 乐视商城:比一比模块
*  
* PHP version 5.4.3
* @author      王丽娟<724243914@qq.com> 
* @version     1.0
* @time          2015-01-18 16:24
*/ 
namespace Admin\Controller;
use Think\Controller;
class ProductController extends Controller {
	//产品列表
     public function Index(){
     	$pro = M('product');
          $brand = M('product_brand_con');
          $brands = $brand->select();
          //获取当前请求的页码
          $p = isset($_GET['p']) ? $_GET['p'] : 1;
          //获取每页显示的数量
          $num = 10;
          $count = $pro->count();//计算当前表中的总数
          $page = new \Think\Page($count,$num);//实例化分页对象
          $show = $page->show();// 获取页码的html代码
     	$pros = $pro->field('id,price,interface,brand,sound_system,size,proname')->page($p,$num)->select();
          foreach($brands as $k=>$v){
               $data[$v['id']] = $v['bname'];
          }
          $this->assign('data',$data);
     	$this->assign('pros',$pros);//分配变量
          $this->assign('page',$show);
          $this->assign('num',$num);
     	$this->display();
     }
     //产品添加
     public function add(){
     	$pro = M('product_tags');
          $brand = M('product_brand_con');
          $brands=$brand->select();
     	$pros = $pro->select();//查询tag字段
          $this->assign('brands',$brands);
          $this->assign('tags',$pros);
     	$this->display();
     }
     //将产品更新至数据库
     public function insert(){
          $_POST['tags'] = implode(',', $_POST['tags']);
          $pro = M('product'); 
          $upload = new \Think\Upload();// 实例化上传类
          $upload->rootPath = "./Public/uploads/";//rootPath这个路径必须手动创建
          $upload->savePath = "product_images/";//这一块只能设置一层目录
          $info   =   $upload->upload();
          
          $_POST['imgmain']  = trim($upload->rootPath.$info['imgmain']['savepath'].$info['imgmain']['savename'],'.') ;
          $_POST['imgside']  = trim($upload->rootPath.$info['imgside']['savepath'].$info['imgside']['savename'],'.') ;
          $_POST['imgback']  = trim($upload->rootPath.$info['imgback']['savepath'].$info['imgback']['savename'],'.') ;
         
          $pro->create();
     	if($pro->add()){
     		$this->success('添加成功',U('Product/add'),3);
		}else{
			$this->error('添加失败',U('Product/add'),3);
     	}
          
     }
     //修改产品
     public function edit(){
          $pro = M('product');
          //接受id
          $id = I('get.id');
          //查询出要修改的值
          $pros = $pro->where("id=$id")->find();
          $tagsId = $pros['tag'];
          $brand = M('product_brand_con');
          $brands = $brand->select();
          var_dump($brands);
          $this->assign('brands',$brands);
          $this->assign('tagsId',$tagsId);
          $this->assign('pros',$pros);
          $tag = M('product_tags');
          //查询产品tag表中的数据
          $tags = $tag->select();
          $this->assign('tags',$tags);
          $this->display();
     }
     //更新数据
     public function updete(){
          $pro = M('product');
          $pro->create();//过滤字段
          if($pro->save()){
               $this->success('更新成功',U('Product/index'),3);
          }else{
               $this->error('更新失败',U('Product/index'),3);
          }
     }
     //删除数据
     public function delete(){
          $pro = M('Product');
          $id = I('get.id');//获取get值
          if($pro->delete($id)){
               $this->success('用户删除成功',U('Product/index'),3);
          }else{
               $this->error('用户删除失败',U('Product/index'),3);
          }
     }
}