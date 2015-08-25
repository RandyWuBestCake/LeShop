<?php
namespace Home\Controller;
use Think\Controller;
class PhonesController extends Controller {
    public function index(){
    	$cellphone = M('cellphone'); // 实例化User对象
    	$count  = $cellphone -> count();// 查询满足要求的总记录数
    	$Page   = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    	$show   = $Page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
    	$list = $cellphone -> order('id') -> limit($Page-> firstRow.','.$Page-> listRows)-> select();
    	$this->assign('list',$list);// 赋值数据集
    	$this->assign('show',$show);// 赋值分页输出
             $this->assign('num',$Page-> firstRow);
             // var_dump($Page-> firstRow);
    	$this -> display(); 
    }
    public function increase(){
    	$this -> display(); 
    }
    public function increaseSave(){
    	$cellphone = M("cellphone");
    	$cp = $cellphone -> where("id={$_GET['id']}") -> select();
    	$this -> assign("cp",$cp);
    	$this -> display(); 
    }
    public function undercarriage(){
    	$cellphone = M('cellphone'); // 实例化User对象
    	$count  = $cellphone-> where("status=1") -> count();// 查询满足要求的总记录数
    	$Page   = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    	$show   = $Page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
    	$list = $cellphone -> where("status=1") -> order('id') -> limit($Page-> firstRow.','.$Page-> listRows)-> select();
    	$this->assign('list',$list);// 赋值数据集
    	$this->assign('show',$show);// 赋值分页输出
    	$this -> display(); 
    }
    // 添加商品
    public function add(){
    	 $upload = new \Think\Upload();// 实例化上传类    
    	 $upload->maxSize   =     3145728 ;// 设置附件上传大小    
    	 $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型   
    	 $upload-> rootPath	=     "./Public";
    	 $upload->savePath  =     '/Uploads/'; // 设置附件上传目录    // 上传文件     
    	 $info   =   $upload->upload();    
    	 if(!$info) {// 上传错误提示错误信息        
    	 	$this->error($upload->getError());    
    	 }else{// 上传成功        
	    	$urlpic = $info['pic']['savepath'].$info['pic']['savename'];
	    	$urlgiftimg = $info['giftimg']['savepath'].$info['giftimg']['savename'];

	    	$user = M("cellphone");

	    	$data['model'] = $_POST['model'];
	    	$data['description'] = $_POST['description'];
	    	$data['pic'] = $urlpic;
	    	$data['network_type'] = $_POST['network_type'];
	    	$data['special_type'] = $_POST['special_type'];
	    	$data['oldprice'] = $_POST['oldprice'];
	    	$data['presentPrice'] = $_POST['presentPrice'];
	    	$data['count'] = $_POST['count'];
	    	$data['color'] = $_POST['color'];
	    	$data['title'] = $_POST['title'];
	    	$data['infrom'] = $_POST['infrom'];
	    	$data['giftimg'] = $urlgiftimg;
	    	$data['giftdescribe'] = $_POST['giftdescribe'];
	    	$data['giftnum'] = $_POST['giftnum'];
	    	$user -> create($data);
	    	// dump($data['giftimg']);
	    	// exit;
	    	$users = $user -> add();
	    	if($user){
	    		$this->success('添加完成');
	    	}else{
	    		$this -> error("添加失败");
	    	}
	    }
    }
    // 修改商品
    public function save(){
    	$upload = new \Think\Upload();// 实例化上传类    
    	 $upload->maxSize   =     3145728 ;// 设置附件上传大小    
    	 $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型   
    	 $upload-> rootPath	=     "./Public";
    	 $upload->savePath  =     '/Uploads/'; // 设置附件上传目录    // 上传文件     
    	 $info   =   $upload->upload();    
    	 if(!$info) {// 上传错误提示错误信息        
    	 	$this->error($upload->getError());    
    	 }else{// 上传成功        
	    	$urlpic = $info['pic']['savepath'].$info['pic']['savename'];
	    	$urlgiftimg = $info['giftimg']['savepath'].$info['giftimg']['savename'];

	    	$user = M("cellphone");

	    	$data['model'] = $_POST['model'];
	    	$data['description'] = $_POST['description'];
	    	$data['pic'] = $urlpic;
	    	$data['network_type'] = $_POST['network_type'];
	    	$data['special_type'] = $_POST['special_type'];
	    	$data['oldprice'] = $_POST['oldprice'];
	    	$data['presentPrice'] = $_POST['presentPrice'];
	    	$data['count'] = $_POST['count'];
	    	$data['color'] = $_POST['color'];
	    	$data['title'] = $_POST['title'];
	    	$data['infrom'] = $_POST['infrom'];
	    	$data['giftimg'] = $urlgiftimg;
	    	$data['giftdescribe'] = $_POST['giftdescribe'];
	    	$data['giftnum'] = $_POST['giftnum'];
	    	$user -> create($data);
	    	// dump($data['giftimg']);
	    	// exit;
	    	$users = $user ->where("id={$_POST['id']}")-> save();
	    	if($user){
	    		$this->success('添加完成');
	    	}else{
	    		$this -> error("添加失败");
	    	}
	    }
    }
    // 删除商品
    public function del(){
    	$cellphone = M("cellphone");
    	dump($cellphone);

    	exit;
    	$cp = $cellphone -> where("id={$_GET['id']}")-> delete(); 
    	if($cp){
    		$this -> success("删除成功！");
    	}else{
    		$this -> error("删除失败！");
    	}
    }
    // 下架商品
    public function dela(){
    	$cellphone = M("cellphone");
    	$data['status'] = 1;
	    $cellphone -> create($data);
    	$cp = $cellphone -> where("id={$_GET['id']}")-> save(); 
    	if($cp){
    		$this -> success("修改成功！");
    	}else{
    		$this -> error("修改失败！");
    	}
    }
    // 上架商品
    public function delb(){
    	$cellphone = M("cellphone");
    	$data['status'] = 0;
	    $cellphone -> create($data);
    	$cp = $cellphone -> where("id={$_GET['id']}")-> save(); 
    	if($cp){
    		$this -> success("修改成功！");
    	}else{
    		$this -> error("修改失败！");
    	}
    }
}