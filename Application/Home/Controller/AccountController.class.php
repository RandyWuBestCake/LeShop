<?php
/**
 * 项目二 之前端:个人信息也页面
 *
 * PHP version 5.4.3
 * @author      跳梁者<zlutao@qq.com>
 * @version     1.0
 * @time          2015-02-05 14:43
 */
namespace Home\Controller;

use Think\Controller;

class AccountController extends Controller
{   

    // 订单页面
    public function order()
    {   
         //判断用户是否登录
        $uid = $_SESSION['users']['id'];
        if(!$uid){
            $this->error("请先登录", U("Login/index"), 3);
        }
        $p = I('get.p',1);
        //获取用户ID
        $uid = $_SESSION['users']['id'];
        // 实例化订单模型
        $goods_order = M('goods_order');
        $fit_goods = M('fit_goods');
        $consignee_info = M('consignee_info');
        $user = M('user');
        //查询当前用户订单信息
        $rows = $goods_order->where("user_id = $uid")->page($p,5)->select(); //获取用户订单数据
        $count      = $goods_order->where("user_id = $uid")->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
        //遍历用户订单数据 获得用户地址等信息
        foreach ($rows as $v) {
            $gid =  $v['goods_id'];
            $uid =  $v['user_id'];
            $grow = $fit_goods->where("id =$gid")->find();
            $urow = $consignee_info->where("uid =$uid")->find();
            $grows[] = $grow;
            $urows[] = $urow;
        }

        //订单状态 初始化
        $status = array(
            '1'=>"提交订单",
            '2'=>"付款成功",
            '3'=>"商品生产",
            '4'=>"商品配货",
            '5'=>"商品出库",
            '6'=>"等待收货",
            '7'=>"完成",
        );
        //分配变量
        $this->assign("page",$show);
        $this->assign("rows",$rows);
        $this->assign("grows",$grows);
        $this->assign("urows",$urows);
        $this->assign("status",$status);
        // 解析模版
        $this->display();
    }

    // ajax绑定验证码处理页面
    public function bindCoupon()
    {   
        //判断是否ajax请求
        if(!IS_AJAX){
            $this->error("非法请求", U("Login/index"), 3);
        }
         //判断用户是否登录
        $uid = $_SESSION['users']['id'];
        if(!$uid){
            echo 1;
            return false;
        }
        //获取优惠码
        $code = I('post.code');
        // 实例化模型
        $coupon = M("coupon");
        // 获取优惠码数据
        $row = $coupon->where("secret = '$code' and uid='0'")->find();
        //如果不存在 返回2
        if(!$row){ 
            echo 2;
            return false;
        }
        //格式化数据
        $data['id'] = $row['id'];
        $data['uid'] = $uid;
        //保存数据
        $res = $coupon->data($data)->save(); 
        if($res){ //成功返回0
            echo 0;
        }else{ //失败返回3
            echo 3;
        }
    }

    // 优惠卷信息页面
    public function coupons()
    {
         //判断用户是否登录
        $uid = $_SESSION['users']['id'];
        if(!$uid){
            $this->error("请先登录", U("Login/index"), 3);
        }
        // 获取当前页数
        $p = isset($_GET['p'])?$_GET['p']:1;
        // 实例化模型
        $coupon = M('coupon');

       /* 
       // 获取优惠信息 带分页
        $rows = $coupon->join("LEFT join coupon_cate on coupon.cid = coupon_cate.id")->where("coupon.uid = $uid")->page($p.',5')->select();
        $count      = $coupon->where("coupon.uid = $uid")->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
        $this->assign('page',$show);// 赋值分页输出
        */

        // 获取优惠信息
        $rows = $coupon->join("LEFT join coupon_cate on coupon.cid = coupon_cate.id")->where("coupon.uid = $uid")->select();
        if(!$rows){ //如果结果为空 给个空数组
            $rows = array();
        }
        $time = time();
        foreach ($rows as $key => $value) {
            if($value['is_used']==1){
                $uRows[] = $rows[$key];
                continue;
            }else if($value['expire_time'] < $time){
                $expRows[] = $rows[$key];
                continue;
            }else if($value['is_used']==0){
                $nuRows[] = $rows[$key];
            }
        }
        //分配变量
        $this->assign("uRows",$uRows);
        $this->assign("expRows",$expRows);
        $this->assign("nuRows",$nuRows);
        // 解析模版
        $this->display();
    }

    //个人信息修改页
    public function personalInfo()
    {
        //判断用户是否登录
        $uid = $_SESSION['users']['id'];
        if(!$uid){
            $this->error("请先登录", U("Login/index"), 3);
        }
        //实例化模型
        $user = M('user');
        //查询用户信息
        $row = $user->where("id = $uid")->find();
        //分配变量
        $this->assign("row",$row);
        //显示模版
        $this->display();
    }

    // 个人信息修改数据处理页
    public function editPersonalInfo()
    {
        //实例化模型
        $user = M("user");
        //获取用户id
        $id  = $_POST['id'];
        if($_FILES['img']['error']!=4){
            //获取原头像
            $img = $user->where("id=$id")->getField('img');
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  =      './Public/uploads/'; // 设置附件上传目录
            $upload->savePath  =      'personal/'; // 设置附件上传目录
            // 上传文件 
            $info   =   $upload->upload();
            if(!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            }else{// 上传成功
                @unlink('/Public/uploads/'.$img);
                $_POST['img'] ='/Public/uploads/'.$info['img']['savepath'].$info['img']['savename'];
            }
        }
        //格式化数据
        $user->create();
        //保存数据
        if($row = $user->save()){  //保存成功
            $this->success("修改成功");
        }else{ //保存失败
            if($row==0){
                $this->error("没有选项被修改");
            }
            $this->error("修改失败");
        }
    }

    //收货地址显示页
    public function address()
    {
        //判断用户是否登录
        $uid = $_SESSION['users']['id'];
        if (!$uid) {
            $this->error("请先登录", U("Login/index"), 3);
        }
        //实例化模型
        $consignee_info = M('consignee_info');
        //查询数据
        $row = $consignee_info->where("uid=$uid")->select();
        //分配变量
        $this->assign('row', $row);
        //显示模版
        $this->display();
    }

    //删除地址
    public function dodel()
    {
        $id = I('get.id');
        // 验证用户是否登录
        $uid = $_SESSION['users']['id'];
        if (!$uid) {
            die('非法操作');
        }
        //验证地址是否属于用户
        //实例化模型
        $consignee_info = M('consignee_info');
        //获取用户要修改的地址信息
        $row = $consignee_info->where("id=$id")->find();
        if (!$row) {
            die('权限不足');
        }
        $row = $consignee_info->delete($id);
        if ($row) { //成功返回用户地址数
            $res = $consignee_info->where("uid=$uid")->count();
            echo $res;
        } else { //失败返回0
            echo 0;
        }
    }

    // 添加地址
    public function addAddress()
    {
        // 验证用户是否登录
        $uid = $_SESSION['users']['id'];
        if (!$uid) {
            die('非法操作');
        }
        //实例化模型
        $consignee_info = M('consignee_info');
        $num = $consignee_info->where("uid = $uid")->count();
        if ($num >= 5) {
            $this->error('您创建的地址个数以超上限 请先删除不用的地址');
        }
        unset($_POST['id']);
        //组合省市区 选择框数值
        $_POST['addressid'] = $_POST['province_id'] . ',' . $_POST['city_id'] . ',' . $_POST['district_id'];
        //添加用户id
        $_POST['uid'] = $uid;
        //初始化数据
        $consignee_info->create();
        //如果勾选了默认地址 将数据库中此用户的默认地址清空
        if ($_POST['default'] == 1) {
            $consignee_info->where("uid = '$uid'")->setField('default', '0');
        }
        //添加数据
        if ($res = $consignee_info->add()) {
            $this->success('添加成功');
        } else {
            if ($res == 0) {
                $this->error('没有选项被添加');
            } else {
                $this->error('添加失败');
            }
        }
    }

    // 地址修改后的数据提交处理页面
    public function editAddress()
    {
        // 验证用户是否登录
        $uid = $_SESSION['users']['id'];
        if (!$uid) {
            die('非法操作');
        }
        //组合省市区 选择框数值
        $_POST['addressid'] = $_POST['province_id'] . ',' . $_POST['city_id'] . ',' . $_POST['district_id'];
        //添加用户id
        $_POST['uid'] = $uid;
        //实例化模型
        $consignee_info = M('consignee_info');
        //初始化数据
        $consignee_info->create();
        //如果勾选了默认地址 将数据库中此用户的默认地址清空
        if ($_POST['default'] == 1) {
            $consignee_info->where("uid = '$uid'")->setField('default', '0');
        }
        //添加数据
        if ($res = $consignee_info->save()) {
            $this->success('修改成功');
        } else {
            if ($res == 0) {
                $this->error('没有选项被修改');
            } else {
                $this->error('修改失败');
            }
        }
    }

    //地址修改ajax响应信息
    public function addressAjax()
    {
        // 获取用户登录id
        $sid = $_SESSION['users']['id'];
        // 获取用户要修改的地址id
        $id = I('get.id');
        // 如果未登录返回错误提示
        if (!$sid) {
            echo '1';
            return false;
        }
        //实例化模型
        $consignee_info = M('consignee_info');
        $areasid = M('areasid');
        //获取用户要修改的地址信息
        $row = $consignee_info->where("id=$id")->find();
        $url = U("account:editAddress");
        if (!empty($id) && $sid != $row['uid']) {
            die('权限不足');
        } else {
            if (empty($id)) {
                $url = U("account:addAddress");
            }
        }
        //拆解省市级三级地址
        $aid = explode(',', $row['addressid']);
        $shengId = $aid[0];
        $shiId = $aid[1];
        $quId = $aid[2];
        //查询对应的信息数组
        $shengarr = $areasid->where("pid = 1")->select();
        $shiarr = $areasid->where("pid = $shengId")->select();
        $quarr = $areasid->where("pid = $shiId")->select();
        //遍历组装 省市区 三级的select选项的option
        $qu = $shi = $sheng = '<option value="0">请选择</option>';
        foreach ($shengarr as $key => $value) {
            if ($shengId == $value['areaid']) {
                $areaid = $value['areaid'] . "' selected='selected";
            } else {
                $areaid = $value['areaid'];
            }
            $diqu = $value['diqu'];
            $sheng .= "<option value='$areaid'>$diqu</option>";
        }

        foreach ($shiarr as $key => $value) {
            if ($shiId == $value['areaid']) {
                $areaid = $value['areaid'] . "' selected='selected";
            } else {
                $areaid = $value['areaid'];
            }
            $diqu = $value['diqu'];
            $shi .= "<option value='$areaid'>$diqu</option>";
        }

        foreach ($quarr as $key => $value) {
            if ($quId == $value['areaid']) {
                $areaid = $value['areaid'] . "' selected='selected";
            } else {
                $areaid = $value['areaid'];
            }
            $diqu = $value['diqu'];
            $qu .= "<option value='$areaid'>$diqu</option>";
        }
        if ($row['default'] == 1) {
            $checked = "checked";
        } else {
            $checked = "";
        }
        //组装用户修改的内容和样式
        $s = '<div id="editAddress" style="border-color: rgb(216, 12, 24); display: block;" class="border pb20 mb20 font14 hidden showEditAddrInfo"><!--此为点击“新增收货地址”按钮后需要填写的信息-->
<form action="' . $url . '" method="post">
<div class="title line_b">
  <div class="left">
	<div class="font14 left pl10">家里</div>
	<div class="font14 left pl10 red hidden editingShow">请先保存正在编辑的地址信息</div>
  </div>
  <div class="clear"></div>
 </div>
 <div class="user_edit_addr pt20 pl20 pr20">
	<dl>
	 <dt><span class="red">* </span>收货人姓名：</dt>
	 <dd>
		<input type="text" maxlength="30" id="receiver" name="name" value="' . $row['name'] . '" wjvalidaddress="false"><br>
		<div class="message">
		<span id="receiverError" class="red pl10" style="display: none;">请填写正确的姓名</span>
		<span id="receiverEmptyError" class="red pl10" style="display: none;">请填写姓名</span>
		</div>
	 </dd>
	 </dl>
	 <dl>
	 <dt><span class="red">* </span>省份：</dt>
	 <dd>
	 <select class="select_s" maxlength="30" name="province_id" id="province" wjvalidaddress="false">
	 ' . $sheng . '
	</select>
     <select class="select_s" maxlength="30" name="city_id" id="city" wjvalidaddress="false">
     ' . $shi . '
     </select>
      <select class="" maxlength="30" name="district_id" id="district" wjvalidaddress="false">
      ' . $qu . '
      </select>
      <div class="message">
		<span id="regionError" class="red pl10" style="display: none;">地区填写不完整 </span>
		<span class="red pl10 hidden" id="regionArriveError">
		您所选地区暂不在配送范围内。请确认收货地址，<a target="_blank" href="/help/psfwcx.html"><span class="blue">查看可配送地区&gt;&gt;</span></a>或<a target="_blank" href="/help/kffeedback.html"><span class="blue">留下您的收货信息&gt;&gt;</span></a>，可送达后第一时间告知。
		</span>
	  </div>
      </dd>
	</dl>
	<dl>
	 <dt><span class="red">* </span>详细地址：</dt>
	 <dd>
	 <span class=""><input type="text" maxlength="50" id="detailAddr" name="address" value="' . $row['address'] . '" style="width:395px;" wjvalidaddress="false"></span><br>
	 <div class="message">
	 <span id="detailAddrError" class="red pl10" style="display: none;">请填写正确的地址</span><span id="detailAddrEmptyError" class="red pl10" style="display: none;">请填写地址</span>
	 </div>
	 </dd>
	</dl>
	<dl>
	 <dt><span class="red">* </span>手机号码：</dt>
	 <dd>
	 <input type="text" maxlength="30" id="mobile" name="mobile_phone" value="' . $row['mobile_phone'] . '" wjvalidaddress="false"> 或者 固定电话：                                                                                              <input type="text" maxlength="30" id="phone" name="fix_phone" wjvalidaddress="false"  value="' . $row['fix_phone'] . '"><br>
	 <div style="width:250px;height:20px" class="message left">
	 <span id="mobileError" class="red pl10" style="display: none;">手机号码填写不正确</span>
	 <span id="mobileEmptyError" class="red pl10" style="display: none;">请填写手机号码</span>
	 </div>
	 <div class="message left">
	 <span id="phoneError" class="red pl10" style="display: none;" >固定电话填写不正确</span>
	 </div>
	 </dd>
	</dl>
	<dl>
	 <dt><span class="red">* </span>邮政编码：</dt>
	 <dd>
	 <input type="text" maxlength="30" id="post" name="postal_code" value="' . $row['postal_code'] . '" wjvalidaddress="false">
	 <span id="referPostCode" class="gray pl10 pr10"></span>
	 <a onclick="showSelectPostCode();" class="hidden" id="useThisPostDiv" href="javascript:void(0);"><span class="blue">使用此邮编</span></a><br>
	 <div class="message">
	 <span id="postError" class="red pl10" style="display: none;">邮政编码填写不正确</span>
	 <span id="postEmptyError" class="red pl10" style="display: none;">请填写邮政编码</span>
	 </div>
	 </dd>
	</dl>
	<dl>
     <dd style="padding-left:100px; *padding-left:90px;">
	 <span id="setDefaultAddr">
       <input type="checkbox" style="margin-right:10px; border:none;" name="default" ' . $checked . ' value="1">设为默认地址
	 </span>
	 </dd>
	</dl>
	<div class="clear"></div>
 </div>
 <div class="pl50">
 <div class="input_addr pl80">
   <div id="addrSubmit"><div class="red_bt_ss left t_c hand"><span class="white">
    <input type="hidden" name="id" value="' . $id . '">
   <input type="submit" value="保存" class="red_bt_ss left t_c hand"></span></div></div>
   <a onclick="hideNewAddress();" href="javascript:void(0)"><div class="gray_bt_ss left t_c ml20"><span class="">取消</span></div></a>
   <div class="clear"></div>
 </div>
 </div>
 </form>
 </div>';
        echo $s;
    }

    // 输出省市区 ajax请求所需地址信息
    public function ssqAjax()
    {
        $id = I('get.id');
        $m = M("areasid");
        $rows = $m->where("pid = $id")->select();
        $zone = '<option value="0">请选择</option>';
        foreach ($rows as $key => $value) {
            $areaid = $value['areaid'];
            $diqu = $value['diqu'];
            $zone .= "<option value='$areaid'>$diqu</option>";
        }
        echo $zone;
    }


}