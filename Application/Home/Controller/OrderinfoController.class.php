<?php
/** 
* 兄弟连项目二 乐视商城:前台订单详情模块
*  
* PHP version 5.4.16
* @author      黄明毅<970485070@qq.com> 
* @version     1.0
* @time          2015-02-05 
*/ 
namespace Home\Controller;
use Think\Controller;
class OrderinfoController extends CommonController{
	public function index(){
            // var_dump($_SESSION); die;
		if(!empty($_GET['id'])){
		 	$id=$_GET['id'];
           	 	$ids = explode(',',$id); 
           	 	foreach ($ids as $v) {
              	 	$cart=$_SESSION['cart'][$v];
              	 	$carts[]=$cart;
            		}
            		//分配变量
            		 $this -> assign("carts",$carts);

            		 $consignee=M('consignee_info');
            		 //订单用户id
            		 $uid=$_SESSION['users']['id'];
            		 $consignees=$consignee->where("uid='$uid' ")->select();
            		//分配变量
            		 $this->assign('consignees',$consignees);

            		 //省
            		 $areasid=M('areasid');
            		 $sheng = $areasid->where("pID=1")->select();
            		 //分配变量
            		 $this->assign('sheng',$sheng);
 
            		 $this->display();
		}else{
			 $this->error('请选择要购买的商品');
		}
		
	}

	//新增地址
	public function add(){
            	       // var_dump($_POST); die;
            	       $uid=$_SESSION['users']['id'];

                    $province=$_POST['province'];
                    $city=$_POST['city'];
                    $county=$_POST['county'];

                    $addressid=$province.','.$city.','.$county;

                    $_POST['uid']=$uid;
                    $_POST['addressid']=$addressid;
                    $consignee=M('consignee_info');

                    $consignee->create();
                    if($consignee->add()){
                        $this->success('新增地址成功',U('Account/address'),1);
                    }else{
                        $this->error('新增地址失败,请稍后重试~',U('Account/address'),1);
                    }

                                       		
	}


	//下拉选项(市)
	public function city(){
		$id = I("get.id");
		$str = '<option value="0">请选择</option>';
		if($id!=0){
			$areasid=M('areasid');
            		$city = $areasid->where("pID='$id'")->select();
            		foreach ($city as $key => $value) {
            			$v = $value['areaid'];
            			$d = $value['diqu'];
            			$str.="<option value='$v'>$d</option>";
            		}
		}
		echo $str;
	}

	//下拉选项(县)
	public function county(){
		$id=I("get.id");
		$str = '<option value="0">请选择</option>';
		if($id!=0){
			$areasid=M('areasid');
            		$county = $areasid->where("pID='$id'")->select();
            		foreach ($county as $key => $value) {
            			$v = $value['areaid'];
            			$d = $value['diqu'];
            			$str.="<option value='$v'>$d</option>";
            		}
		}
		echo $str;
	}

    //添加订单
    public function addOrder(){
        //订单号
        $order_num = date('Ymd',time()).date('His',time());
        //把订单号存到session
        $_SESSION['order_num']=$order_num;
        $_POST['order_num']=$order_num;
        // 商品id
        $goods_id=$_GET['goodid'];

        $cun = $_SESSION['cart'];
        // var_dump($cun);die;
        $num = count($cun);
        foreach ($cun as $key=>$v) {
            // 商品id
            $_POST['goods_id'] = $v['id'];
            // 预定数量
            $_POST['order_amount'] = $v['num'];
            //单价
            $_POST['unit_price'] = $v['price'];
            //消费者用户id
            $_POST['user_id'] = $_SESSION['users']['id'];
            // 收货信息id
             $deliveryinfo_id=$_GET['addressid'];
            $_POST['deliveryinfo_id']=$deliveryinfo_id;
            //订单状态
            $_POST['order_status']=1;
            //添加订单时间
            $_POST['order_time'] = strtotime(date('Y-m-d H:i:s',time()));

            //创建模型
            $order = M('goods_order');

            $res = $order->create();
            if($order->add()){
                //成功返回0
                echo 0;
 //***************************更新数据库表库存**l刘健****************************************
            //创建模型
            $id = $_POST['goods_id'];
            $amount = M('fit_goods');
            //查询数据库
            $res = $amount->field('amount')->where("id='$id'")->find();
            $n_amount = $res['amount']-$_POST['order_amount'];
            //更新数据库
            $amount-> where("id='$id'")->setField('amount',$n_amount);
            //创建模型
            $g_amount = M('goods_amount');
            //查询数据库
            $info = $g_amount->field('real_amount')->where("goods_id='$id'")->find();
            $ng_amount = $info['real_amount']-$_POST['order_amount'];
            //更新数据库
            $e = $g_amount->where("goods_id='$id'")->setField('real_amount',$ng_amount);
//***************************更新数据库表库存******************************************

            }else{
                echo 1;
            }
        }
     
 }
    
    //订单支付页
    public function pay(){
        // var_dump($_SESSION); die;
         $data=$_SESSION['order_num'];
        
        $order_num=$_SESSION['order_num'];
        $consignee=M('consignee_info');
        $goods_order=M('goods_order');
        $rows = $goods_order->where("order_num='$order_num' ")->select();
        $addressid = $rows['0']['deliveryinfo_id'];
        $address=$consignee->where("id = '$addressid'")->find();
        $total = 0;
        foreach ($rows as $key => $value) {
            //计算总价
            $total += $value['unit_price']*$value['order_amount'];
            
        }
        //分配变量
        //订单号
        $this->assign('data',$data);
        //总价
        $this->assign('total',$total);
        //地址
        $this->assign('address',$address);

        $this->display();
    
    }

    //去支付
    public function pays(){
        //创建模型
        $order = M('goods_order');

        //订单号
        $order_num=$_SESSION['order_num'];
        //订单状态 
        $_POST['order_status']=2;

        $order->create();

        if($order->where("order_num='$order_num' ")->save()){
            unset($_SESSION['cart']);
            $this->success('支付成功~',U('Account/order'),3);
        }else{
            $this->error('支付失败,请稍后重试!',U('index/index'),3);
        }


    }

}