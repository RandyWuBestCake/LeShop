<?php
/** 
* 兄弟连项目二 乐视商城:商品列表及商品详情,配件列表,配件详情
*  
* PHP version 5.4.16
* @author      刘 健<1307668516@qq.com> 
* @version     1.0
* @time          2015-01-28 21:35
*/ 
namespace Home\Controller;
use Think\Controller;
class FitController extends Controller {

	public function FitList(){
		//创建模型
			$cate = M('goods_cate');
			//查询数据库
			$cates1 = $cate->where("path like '0-30'")->select();
			$cates2 = $cate->where("path like '0-30-%'")->select();
			// var_dump($cates1);
			// var_dump($cates2);

			//创建模型
			$fit = M('fit_goods');
			//查询数据库
			$res = $fit->field('id,name,price,img,grade,amount')->page($_GET['p'].',12')->select();
			// var_dump($res);
			//分页引用
			$count      = $fit->where()->count();

			$Page       = new \Think\Page($count,12);
			$show       = $Page->show();// 分页显示输出
			//创建模型
			$ass = M('goods_assess');
			//遍历
			foreach($res as $key=>$value){
				// var_dump($value['id']);
				$goods_id = $value['id'];
				//查询数据库
				$info = $ass->query("select count(*) from goods_assess where goods_id ='$goods_id'");

				//评价人数
				$value['num'] = $info['0']['count(*)'];
				$infos[] = $value;
			}	
			// var_dump($infos);
			$count = count($infos);

			//分配变量
			$this->assign('infos',$infos);
			$this->assign('count',$count);
			$this->assign('cates1',$cates1);
			$this->assign('cates2',$cates2);
			$this->assign('count',$count);
			$this->assign('page',$show);// 赋值分页输出
			
		
		$this->display();
	}
	public function FitListblock(){

			//创建模型
			$cate = M('goods_cate');
			//接收ajax传递过来的值id和path
			$id = $_GET['id'];
			$path = $_GET['path'];
			$p = $_GET['price'];
			// var_dump($id);
			// var_dump($p);
			// session_Start();
			// $_SESSION["Cate"]=$id;
			setCookie('Cate',$id,time()+3600);
			if(!empty($_COOKIE['Cate'])){
	          $id = $_COOKIE['Cate'];
	        }
	        // var_dump($id);
			//查询数据库
			$ids = $cate->field('id')->where('pid='.$id)->select();
			// var_dump($ids);
			//创建模型
			$fit = M('fit_goods');
			foreach($ids as $k=>$v){
				$cate = $v['id'];
				//查询配件详情数据库fit_goods
				if(!isset($p) && empty($p)){
					$res = $fit->field('id,name,price,img,grade')->where('cate='.$cate)->page($_GET['p'].',12')->select();
				}
				if($p==0){
					$res = $fit->field('id,name,price,img,grade')->where('cate='.$cate)->order('price')->page($_GET['p'].',12')->select();
					// echo $fit->getLastSql();
					
				}
				if($p==1){
					// var_dump($cate);
					// var_dump($p);
					$res = $fit->field('id,name,price,img,grade')->where('cate='.$cate)->order('price desc')->page($_GET['p'].',12')->select();
				}
				// var_dump($res);	
				//创建模型
				$ass = M('goods_assess');
				// var_dump($res);
				//遍历
				foreach($res as $key=>$value){
					// var_dump($value['id']);
					$goods_id = $value['id'];
					// var_dump($value);
					//查询数据库
					$info = $ass->query("select count(*) from goods_assess where goods_id ='$goods_id'");

					//评价人数
					$value['num'] = $info['0']['count(*)'];
					$infos[] = $value;
				}
			}
			if($p ==0){
			$n =count($infos);
				//echo $n;
			for($h=0;$h<$n-1;$h++){//外层循环n-1 
				for($i=0;$i<$n-$h-1;$i++){  
				if($infos[$i]['price']>$infos[$i+1]['price']){//判断数组大小，颠倒位置 
				  $kong=$infos[$i+1];  
				  $infos[$i+1]=$infos[$i]; 
				  $infos[$i]=$kong; 
				     } 
				  }
				}
			}
			
			$count = count($infos);
			$this->assign('infos',$infos);
			$this->assign('count',$count);
			$this->display();
	}
	public function block(){

			$cate = $_GET['id'];
			// //创建模型
			// $cate = M('goods_cate');
			// //查询数据库
			// $ids = $cate->field('id')->where('pid='.$id)->select();
			// // var_dump($ids);
			//创建模型
			$fit = M('fit_goods');
			$res = $fit->field('id,name,price,img,grade')->where('cate='.$cate)->page($_GET['p'].',12')->select();
			// var_dump($res);	
			//创建模型
			$ass = M('goods_assess');
			//遍历
			foreach($res as $key=>$value){
				// var_dump($value['id']);
				$goods_id = $value['id'];
				//查询数据库
				$info = $ass->query("select count(*) from goods_assess where goods_id ='$goods_id'");

				//评价人数
				$value['num'] = $info['0']['count(*)'];
				$infos[] = $value;
			}	
			$count = count($infos);
			$this->assign('infos',$infos);
			$this->assign('count',$count);
			$this->display();
	}
	public function newblock(){

			//创建模型
			$fit = M('fit_goods');
			//查询配件详情数据库fit_goods
			$res = $fit->field('id,name,price,img,grade')->order('addtime desc')->page($_GET['p'].',12')->select();

			//创建模型
			$ass = M('goods_assess');
			//遍历
			foreach($res as $key=>$value){
				// var_dump($value['id']);
				$goods_id = $value['id'];
				//查询数据库
				$info = $ass->query("select count(*) from goods_assess where goods_id ='$goods_id'");

				//评价人数
				$value['num'] = $info['0']['count(*)'];
				$infos[] = $value;
			}	
			// var_dump($infos);
			$count = count($infos);
			$this->assign('infos',$infos);
			$this->assign('count',$count);
			$this->display();
	}
	public function newdefault(){
		//创建模型
			$fit = M('fit_goods');
			//查询配件详情数据库fit_goods
			$res = $fit->field('id,name,price,img,grade')->page($_GET['p'].',12')->select();

			//创建模型
			$ass = M('goods_assess');
			//遍历
			foreach($res as $key=>$value){
				// var_dump($value['id']);
				$goods_id = $value['id'];
				//查询数据库
				$info = $ass->query("select count(*) from goods_assess where goods_id ='$goods_id'");

				//评价人数
				$value['num'] = $info['0']['count(*)'];
				$infos[] = $value;
			}	
			// var_dump($infos);
			$count = count($infos);
			$this->assign('infos',$infos);
			$this->assign('count',$count);
			$this->display('block');
	}
	public function by(){
			//创建模型
			$fit = M('fit_goods');
			$get = $_GET['price'];
			
			if($get=='0'){
				$sql = '';
			}else{
				$sql = ' desc';
			}
			//查询配件详情数据库fit_goods
			$res = $fit->field('id,name,price,img,grade')->order('price'.$sql)->page($_GET['p'].',12')->select();

			//创建模型
			$ass = M('goods_assess');
			//遍历
			foreach($res as $key=>$value){
				// var_dump($value['id']);
				$goods_id = $value['id'];
				//查询数据库
				$info = $ass->query("select count(*) from goods_assess where goods_id ='$goods_id'");

				//评价人数
				$value['num'] = $info['0']['count(*)'];
				$infos[] = $value;
			}	
			// var_dump($infos);
			$count = count($infos);
			$this->assign('infos',$infos);
			$this->assign('count',$count);
			$this->display('block');
	}
	public function detail(){
		//定义区域数组
		$province_arr = array('北京','重庆','福建','甘肃','广东','广西','贵州','海南','河北','安徽','黑龙江','河南','香港','湖北','湖南','江苏','江西','吉林','辽宁','澳门','内蒙古','宁夏','青海','山东','上海','山西','陕西','四川','台湾','天津','新疆','西藏','云南','浙江','海外');
		//获取id
		$id = I('get.id');
		//创建模型
		$fit = M('fit_goods');
		//数据库查询数据
		$res = $fit->where('id='.$id)->find();
		//创建模型
		$img = M('fit_goods_images');
		//数据库查询
		$image = $img->field('img')->where("fid=".$id)->select();
		// var_dump($image);

		//创建评价模型
		$ass = M('goods_assess');

		//查询该配件的评价详情
		$infos = $ass->query("select * from goods_assess where goods_id ='$id'");
		// var_dump($infos);
		//创建用户模型
		$user = M('user');
		//创建评价回复模型
		$com  = M('goods_assess_reply');
		//定义计数变量
		$g_num = 0;
		$m_num = 0;
		$l_num = 0;
		//接收ajax传递过来的判断变量
		// $type = 2;
		$type = $_GET['type'];
		// var_dump($type);
		foreach ($infos as $key => $value) {
			if($type==2 && $value['grade']<=3){
				unset($infos[$key]);
				// unset($value);
				
			}else if($type==3 && $value['grade']<=1 && $value['grade']>3){
				unset($infos[$key]);
			}else if($type==4 && $value['grade']>1){
				unset($infos[$key]);
			}
		}
		//遍历数据
		foreach($infos as $key=>$value){
			if($value['status'] == 0){
				//处理评价人数分类
			if($value['grade']>3){
				//好评计数
				$g_num++;
				$good = $value;
			}else if($value['grade']>1){
				//中评计数
				$m_num++;
				$middle = $value;
			}else if($value['grade']<=1){
				//差评计数
				$l_num++;
				$low = $value;
			}
			if($value['img'] !==''){
					$s_num++;
					$s = $value;
			}
			//处理用户数据
			$users = $user->field('username,img as user_img')->where('id='.$value['user_id'])->find();
			//判断用户头像是否存在
			if(!$users['user_img']){
				$users['user_img'] = '/Public/Uploads/user_images/user_detault.png';
			}
			$value = array_merge($value,$users);

			//处理回复的个数
			$reply = $com->where('ass_id='.$value['id'])->select();//查询评价回复表中所有的内容
			// var_dump($reply);die;
			$reply_amount = count($reply);
			$value['reply_amount'] = $reply_amount;
			foreach($reply as $kk=>$vv){
				// 判断用户回复表中的uid是否存在
				if(!$vv['uid']){
					$vv['username'] = '官方回复：';
				}else{
					$u = $user->field('username')->where('id='.$vv['uid'])->find();
					$vv['username'] = $u['username'];
				}
				//处理时间数据
				$time = date('Y-m-d H:i:s',$vv['ass_time']);
				$vv['ass_time'] = $time;
				$reply_info[] = $vv;
					}

				//处理时间数据
				$t = date('Y-m-d H:i:s',$value['ass_time']);
				$value['ass_time'] = $t;
				//处理晒单图片数据
				$img = explode('#',$value['img']);
				$value['img'] = $img;
				$info[] = $value;
				}

				//评价人数
				$p_num = $g_num + $m_num + $l_num;
				$num = array('p_num'=>$p_num,'g_num'=>$g_num,'m_num'=>$m_num,'l_num'=>$l_num,'s_num'=>$s_num);
				//计算好评度
				if($p_num == 0){
					$g_per = 100;
					$m_per = 0;
					$l_per = 0;
				}else{
					$g_per = round($g_num/$p_num*100);
					$m_per = round($m_num/$p_num*100);
					$l_per = round($l_num/$p_num*100);
				}
				$per = array('g_per'=>$g_per,'m_per'=>$m_per,'l_per'=>$l_per);
				

				//分配变量
				$this->assign('num',$num);
				$this->assign('per',$per);
				$this->assign('info',$info);
				$this->assign('reply_info',$reply_info);
			}
			//根据商品id,从数据库表goods_assess_tag中查询标签信息
			//创建模型
			$tag = M('goods_assess_tag');
			//查询数据库
			$tags = $tag->where('goods_id='.$id)->select();
			// var_dump($tags);
			foreach($tags as $key=>$value){
				// 屏蔽状态是1的标签,拒绝显示
				if($value['status']==1){
					unset($tags['$key']);
				}
			}
			// var_dump($res);
			// var_dump($tags);
		//分配变量
		$this->assign('image',$image);
		$this->assign('province',$province_arr);
		$this->assign('res',$res);
		$this->assign('tags',$tags);
		$this->display();

	}
	public function comment(){
		//定义区域数组
		$province_arr = array('北京','重庆','福建','甘肃','广东','广西','贵州','海南','河北','安徽','黑龙江','河南','香港','湖北','湖南','江苏','江西','吉林','辽宁','澳门','内蒙古','宁夏','青海','山东','上海','山西','陕西','四川','台湾','天津','新疆','西藏','云南','浙江','海外');
		//获取id
		$id = I('get.id');
		//创建模型
		$fit = M('fit_goods');
		//数据库查询数据
		$res = $fit->where('id='.$id)->find();
		//创建模型
		$img = M('fit_goods_images');
		//数据库查询
		$image = $img->field('img')->where("fid=".$id)->select();
		// var_dump($image);

		//创建评价模型
		$ass = M('goods_assess');

		//查询该配件的评价详情
		$infos = $ass->query("select * from goods_assess where goods_id ='$id'");
		// var_dump($infos);
		//创建用户模型
		$user = M('user');
		//创建评价回复模型
		$com  = M('goods_assess_reply');
		//接收ajax传递过来的判断变量
		// $type = 2;
		$type = $_GET['type'];
		// var_dump($infos);
		// var_dump($type);
		foreach ($infos as $key => $value) {

			if($type == 2){
				if($value['grade']<=3){
					unset($infos[$key]);
				}
			}
			if($type ==3){
				if($value['grade']<=1 or $value['grade']>3){
					unset($infos[$key]);
				}
			}
			if($type == 4){
				if($value['grade']>1){
					unset($infos[$key]);
				}
			}
			if($type == 5){
				if(($value['img'] =='')){
					unset($infos[$key]);
				}
			}
		}
		//遍历数据
		foreach($infos as $key=>$value){
			//处理晒单图片数据
			// if(strpos($value['img'],'#')){
				$img = explode('#',$value['img']);
				$value['img'] = $img;
				// var_dump($value['img']);
			// }
			if($value['status'] == 0){
				//处理评价人数分类
				if($value['grade']>3){
					//好评计数
					$g_num++;
					$good = $value;
				}else if($value['grade']>1){
					//中评计数
					$m_num++;
					$middle = $value;
				}else if($value['grade']<=1){
					//差评计数
					$l_num++;
					$low = $value;
				}
				if($value['img'] !== ''){
					$s_num++;
					$s = $value;
				}
			//处理用户数据
			$users = $user->field('username,img as user_img')->where('id='.$value['user_id'])->find();
			//判断用户头像是否存在
			if(!$users['user_img']){
				$users['user_img'] = '/Public/Uploads/user_images/user_detault.png';
			}
			$value = array_merge($value,$users);
			// var_dump($value['id']);
			//处理回复的个数
			$reply = $com->where('ass_id='.$value['id'])->select();//查询评价回复表中所有的内容
			// echo $com->getLastSql();
			// var_dump($reply);
			$reply_amount = count($reply);
			$value['reply_amount'] = $reply_amount;

			foreach($reply as $kk=>$vv){
				// 判断用户回复表中的uid是否存在
				if(!$vv['uid']){
					$vv['username'] = '官方回复：';
				}else{
					$u = $user->field('username')->where('id='.$vv['uid'])->find();
					$vv['username'] = $u['username'];
				}
				//处理时间数据
				$time = date('Y-m-d H:i:s',$vv['add_time']);
				$vv['ass_time'] = $time;
				$reply_info[] = $vv;
			}

				//处理时间数据
				$t = date('Y-m-d H:i:s',$value['ass_time']);
				//处理键值,与评论表中的字段区别
				// $value['rid'] = $value['id'];

				$value['ass_time'] = $t;
				// $value['rcon'] = $value['con'];
				// $value['rusername'] = $value['username'];
				$info[] = $value;
				}

				//定义计数变量
				$m_num = 0;
				$l_num = 0;
				$s_num = 0;
				
				//评价人数
				$p_num = $g_num + $m_num + $l_num;
				$num = array('p_num'=>$p_num,'g_num'=>$g_num,'m_num'=>$m_num,'l_num'=>$l_num);
				//计算好评度
				if($p_num == 0){
					$g_per = 100;
					$m_per = 0;
					$l_per = 0;
				}else{
					$g_per = round($g_num/$p_num*100);
					$m_per = round($m_num/$p_num*100);
					$l_per = round($l_num/$p_num*100);
				}
				$per = array('g_per'=>$g_per,'m_per'=>$m_per,'l_per'=>$l_per);
				// var_dump($image);
				// 查询数据
				//分配变量
				$this->assign('res',$res);
				$this->assign('image',$image);
				$this->assign('province',$province_arr);
				$this->assign('num',$num);
				$this->assign('per',$per);
				$this->assign('info',$info);
				$this->assign('reply_info',$reply_info);
				// var_dump($info);	
			}
					$mix = array('0'=>$info,'1'=>$reply_info);
					$this->ajaxReturn($mix);
	}		
	public function addzan(){
		//判断用户是否登录,如果没登陆 直接在后台判断无返回值,则弹出登录提示
		session_start();
		$username = $_SESSION['users']['username'];
		$userid = $_SESSION['users']['id'];
		$id = $_GET['id'];
		$ok_amount = '';
		if(isset($username) && !empty($username)){
			// 创建模型
			$ok = M('ok_amount');
			// 查询数据库看是否点过赞
			$info = $ok->where("ass_id='$id' and user_id='$userid'")->find();

			if(!isset($info) && empty($info)){
				//创建模型
				$ass = M('goods_assess');
				//查询数据库
				$res = $ass->field('ok_amount')->find($id);
				$ok_amount = $res['ok_amount'] + 1;
				//将新得到的amount插入数据库表中
				$ass-> where('id='.$id)->setField('ok_amount',$ok_amount);
				//更新数据库表ok_amount
				
				//评价id
				$data['ass_id'] = $id;
				$data['user_id']=$userid;
				$ok->data($data)->add();
				//点赞成功返回
				$this->ajaxReturn($ok_amount);
			}else{
				//已经点过赞返回-1
				$this->ajaxReturn('-1');
				// echo 1;return false;
			}
			
		}
		// var_dump($res);
		//ajax返回数据到前台页面
		$this->ajaxReturn($ok_amount);
		
	}
	public function add_reply(){
		//判断用户是否登录,如果没登陆 直接在后台判断无返回值,则弹出登录提示
		session_start();
		$username = $_SESSION['users']['username'];
		$id = $_GET['id'];
		$this->ajaxReturn($username);
	}
	public function reply(){
		session_start();

		$uid = $_SESSION['users']['id'];
		if(isset($uid) && !empty($uid)){
			// 获取id
			$goods = M("goods_assess_reply"); 
			$data['ass_id'] = $_GET['id'];

			$data['uid'] = $uid;
			$data['con'] = $_GET['con'];
			$data['add_time'] = time();	
	       		$goods->create($data);
	       	if(isset($data['con']) && !empty($data['con'])){
	       		$id = $goods->add();
	       	}
			//查询数据库
			$res = $goods->find($id);
			$res['username'] = $_SESSION['users']['username'];
			$res['add_time'] = date('Y-m-d H:i:s',$res['add_time']);
			$id = $data['ass_id'];
			//创建模型
			$ass = M('goods_assess');
			//查询数据库获取用户id
			$a = $ass->field('user_id')->find($id);
			//创建模型
			$user = M('user');
			//查询数据库
			$users = $user->field('username')->find($a['user_id']);
			$res['name']=$users['username'];
			// var_dump($res);
			$this->ajaxReturn($res);	
		}else{
			$this->ajaxReturn('0');
		}
			
	}
	public function addcomment(){

		//获取订单号和商品id
		$ordernum = $_GET['order_num'];
		$id = $_GET['id'];
		// $id = '13';
		//创建模型
		$fit = M('fit_goods');
		//数据库查询数据
		$res = $fit->where('id='.$id)->find();
		//创建评价模型
		$ass = M('goods_assess');
		//创建订单模型
		$order = M('goods_order');
		//查询数据库
		$info =$order->field('order_time,unit_price,order_time')->where("order_num='$ordernum'")->find();

		//处理时间数据
		$time = date('Y年m月d日',$info['order_time']);
		//创建评价标签模型
		$gass=M('goods_assess_tag');
		//查询数据库
		$tags = $gass->where('goods_id='.$id)->select();
		foreach($tags as $key=>$value){
			if($value['status']==1){
				unset($value);
			}
			if($value !==null){
				$arr[] = $value;
			}
		}
		$tags = $arr;

		//查询该配件的评价详情
		$infos = $ass->query("select * from goods_assess where goods_id ='$id'");
		// var_dump($infos);
		//创建用户模型
		$user = M('user');
		//创建评价回复模型
		$com  = M('goods_assess_reply');
		//定义计数变量
		$g_num = 0;
		$m_num = 0;
		$l_num = 0;
		//遍历数据
		foreach($infos as $key=>$value){
			if($value['status'] == 0){
				//处理评价人数分类
			if($value['grade']>3){
				//好评计数
				$g_num++;
				$good = $value;
			}else if($value['grade']>1){
				//中评计数
				$m_num++;
				$middle = $value;
			}else if($value['grade']<=1){
				//差评计数
				$l_num++;
				$low = $value;
			}
			if($value['img'] !==''){
					$s_num++;
					$s = $value;
			}
		}
	}
		//评价人数
				$p_num = $g_num + $m_num + $l_num;
				$num = array('p_num'=>$p_num,'g_num'=>$g_num,'m_num'=>$m_num,'l_num'=>$l_num,'s_num'=>$s_num);
				//计算好评度
				if($p_num == 0){
					$g_per = 100;
					$m_per = 0;
					$l_per = 0;
				}else{
					$g_per = round($g_num/$p_num*100);
					$m_per = round($m_num/$p_num*100);
					$l_per = round($l_num/$p_num*100);
				}
				$per = array('g_per'=>$g_per,'m_per'=>$m_per,'l_per'=>$l_per);

		//分配变量
		$this->assign('res',$res);
		$this->assign('per',$per);
		$this->assign('num',$num);
		$this->assign('info',$info);
		$this->assign('tags',$tags);
		$this->assign('time',$time);
		$this->assign('ordernum',$ordernum);
		$this->assign('orderid',$id);
		$this->display();
	}
	public function updatecomment(){
		//创建评价模型
		$ass = M('goods_assess');
		//接收ajax传输过来的参数值
		$goods_id = $_GET['goods_id'];
		$order_num = $_GET['order_num'];
		// var_dump($_GET);
		//查询数据库,是否已经存在该订单的该商品信息
		$info = $ass->field('goods_id')->where("goods_id='$goods_id' and order_num='$order_num'")->select();
		// echo $ass->getLastSql();
		if(isset($info) && !empty($info)){
			return false;
		}else{
			//获取登录用户id
			session_start();
			$uid = $_SESSION['users']['id'];
			//处理时间数据
			$_GET['ass_time'] =time();
			//将变量值放到数组中
			$_GET['user_id'] = $uid;
			//默认发表评价待审核
			$_GET['status']=1;
			// var_dump($_GET);die;
			$_POST = $_GET;
			//创建评价模型
			$ass = M('goods_assess');
			//创建数据
			$res = $ass->create();
			// var_dump($res);
			//插入数据库
			$ass_id = $ass->add();
			//数据库更新后,再根据等级数据变化算出实时的等级插入到数据库表fit_goods中
			$grades = $ass->field('grade')->where('goods_id='.$goods_id)->select();

			foreach($grades as $key=>$value){
				$arr[] = $value['grade'];
			}
			$usum = array_sum($arr);
			$num = count($arr);
			$sum = 5*$num;
			$ngrade=ceil($usum/$sum*5);
			//将新的ngrade的值插入到数据库fit_goods
			$fit = M('fit_goods');
			$fit->where("id='$goods_id'")->setField('grade',$ngrade);
			// echo $fit->getLastSql();
			$this->ajaxReturn($ass_id);
			
		}
	}
	public function addpic(){
		$id = $_POST['goods_id'];
  		$num = $_POST['order_num'];
  		$ass = M('goods_assess');
  		// // 查询数据库
  		// $assess = $ass->field('img')->where("goods_id='$id' and order_num='$num'")->find();
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

	  		$id = $_POST['goods_id'];
	  		$num = $_POST['order_num'];
	  		$ass = M('goods_assess');
	 		$info = $ass->where("goods_id='$id' and order_num='$num'")->setField('img',$imgs);

			if($info=='1'){
				$this->success('亲,晒单成功...请随意挑选您所需要的商品',U('Fit/FitList'),1);
			}else{
				$this->error('sorry,亲~您已经晒单过了;Because:单个订单的一类物品只能晒单一次',U('Fit/FitList'),1);
			}
	}
	public function addtag(){
		//获取ajax传过来的值
		// var_dump($_GET);
		//查询数据库中tag_id的值,判定是否已经选择了标签
		$id = $_GET['tag_id'];
		$order_num = $_GET['order_num'];
		$goods_id = $_GET['goods_id'];
		//创建评价模型
		$ass = M('goods_assess');
		$tag_id = $ass->field('tag_id')->where("order_num='$order_num' and goods_id='$goods_id'")->find();
		if($tag_id['tag_id']==0){
			//更新数据库
			$info = $ass->where("order_num='$order_num' and goods_id='$goods_id'")->setField('tag_id',$id);
			//创建模型
			$tag = M('goods_assess_tag');
			//查询数据库
			$tags = $tag->field('tag_amount')->find($id);

			$tag_num = $tags['tag_amount']+1;
			if(isset($tag_num)){
				//更新数据库
				$res = $tag->where("id='$id'")->setField('tag_amount',$tag_num);
					
					$this->ajaxReturn($tag_num);
			}
		}else{
			$msg = "0";
			$this->ajaxReturn($msg);
		}
	}
	public function rebuy(){
		$id = I('get.id');
		// var_dump($_GET);die;
		$this->redirect('Fit/detail', array('id' => $id), 2, '亲,正在跳转到商品购买页面...');
	}
	public function maxNum(){
		//获取ajax传值
		$num = I('get.num');
		$fnum = $num+1;
		$goods_id = I('get.goods_id');
		//创建模型,查询库存
		$amount = M('goods_amount');
		$amounts = $amount->field('real_amount,sup_amount')->where("goods_id='$goods_id'")->find();
		$nums = array_sum($amounts);
		if($fnum<=$nums){
			$mix_nums = array('amounts'=>$nums,'num'=>$fnum);
			$this->ajaxReturn($mix_nums);
		}else{
			$mix_nums = array('amounts'=>$nums,'num'=>$num);
			$this->ajaxReturn($mix_nums);
		}
	}
	public function dmaxNum(){
		$num = I('get.num');
		$goods_id = I('get.goods_id');
		//创建模型,查询库存
		$amount = M('goods_amount');
		$amounts = $amount->field('real_amount,sup_amount')->where("goods_id='$goods_id'")->find();
		$nums = array_sum($amounts);
		// $mix_nums = array('amounts'=>$nums,'num'=>$num);
		$this->ajaxReturn($nums);
	}
	public function mypj(){
		session_start();
		$users = $_SESSION['users'];
		if(isset($users) && !empty($users)){
			$this->ajaxReturn('1');
		}else{
			$this->ajaxReturn('0');
		}
	}
}
