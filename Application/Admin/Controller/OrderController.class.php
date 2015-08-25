<?php
/**
 * 兄弟连项目二 乐视商城:配件订单管理模块
 *
 * PHP version 5.4.16
 * @author      刘 健<1307668516@qq.com>
 * @version     3.0
 * @time          2015-01-22 13:35
 */
namespace Admin\Controller;

use Think\Controller;

class OrderController extends Controller
{

    public function add()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $id_pre = substr($id, 0, 2);
            if ($id_pre == 'g_') {
                $id = trim($id, 'g_');
                $goods = M('goods_detail');
                $res = $goods->field('price,amount')->find($id);
            } else {
                $fits = M('fit_goods');
                $res = $fits->field('price,amount')->find($id);
            }
            // $price = $res['price'];
            // $amount = $res['amount'];
            $this->ajaxReturn($res);
        }
        //随机生成订单号规则
        $order_num = 'D' . date('Ymd', time()) . date('His', time());
        //查询商品名称
        $goods = new GoodsController();
        $goods = M('goods_detail');
        $goodsInfo = $goods->field('id,name,price')->select();
        //遍历数组为商品的id加上前缀
        foreach ($goodsInfo as $key => $value) {
            $value['id'] = 'g_' . $value['id'];
            $goodsinfo[] = $value;
        }
        $fit = new FitController();
        $fits = M('fit_goods');
        $fitsInfo = $fits->field('id,name,price')->select();
        $Info = array_merge($goodsinfo, $fitsInfo);
        // var_dump($Info);
        //接收ajax传过来的值

        //分配变量
        $this->assign(order_num, $order_num);
        $this->assign(Info, $Info);
        $this->display();
    }

    public function insert()
    {

        //提交时间
        $_POST['order_time'] = strtotime(date('Y-m-d H:i:s', time()));

        //创建模型
        $order = M('goods_order');

        //创建数据
        $res = $order->create();

        if ($order->add()) {

            $this->success('添加自定义订单成功', U('Order/index'), '2');

        } else {

            $this->error('添加自定义订单成功', U('Order/add'), '2');
        }
    }

    public function index()
    {
        //创建模型
        $order = M('goods_order');
        //查询数据库
        // $Info = $order->select();
        // ->field('id,order_num,order_time,goods_id,order_status,express_list_num')
        //获取当前请求页码
        $p = isset($_GET['p']) ? $_GET['p'] : 1;
        //获取每页显示的数量
        $num = isset($_COOKIE['num']) ? $_COOKIE['num'] : 10;
        setcookie('num', $num, time() + 3600, '/');
        //处理分页请求
        $count = $order->count();
        //实例化分页对象
        $page = new \Think\Page($count, $num);
        //获取页码的html代码
        $show = $page->show();
        //从数据库读取所有的数据
        // $cates = $fit->field('id,name,pid,concat(path,"-",id) as paths,img')->order('paths')->page($p,$num)->select();
        $Info = $order->page($p, $num)->select();
        // echo $order->getLastSql();
        foreach ($Info as $key => $value) {
            //处理时间数据
            $value['order_time'] = date('Y-m-d H:i:s', $value['order_time']);
            $id = $value['goods_id'];
            $id_pre = substr($id, 0, 2);
            if ($id_pre == 'g_') {
                $id = trim($id, 'g_');
                $goods = M('goods_detail');
                $res = $goods->field('name,price,amount')->find($id);
            } else {
                $fits = M('fit_goods');
                $res = $fits->field('name,price,amount')->find($id);
            }

            $info[] = array_merge($value, $res);
        }
        // var_dump($info);
        //分配变量
        $this->assign('orderInfo', $info);
        $this->assign('page', $show);
        $this->assign('num', $num);

        $this->display();
    }

    public function detail()
    {

        //获取id
        $id = I('get.id');

        //创建模型
        $order = M('goods_order');
        //查询数据库
        $Info = $order->where('id=' . $id)->find();


        //处理时间数据
        $Info['order_time'] = date('Y-m-d H:i:s', $Info['order_time']);
        $id = $Info['goods_id'];
        $id_pre = substr($id, 0, 2);
        if ($id_pre == 'g_') {
            $id = trim($id, 'g_');
            $goods = M('goods_detail');
            $res = $goods->field('name,price,amount')->find($id);
        } else {
            $fits = M('fit_goods');
            $res = $fits->field('name,price,amount')->find($id);

        }
        $info = array_merge($res, $Info);

        //查询商品名称
        $goods = new GoodsController();
        $goods = M('goods_detail');
        $goodsInfo = $goods->field('id,name,price')->select();
        //遍历数组为商品的id加上前缀
        foreach ($goodsInfo as $key => $value) {
            $value['id'] = 'g_' . $value['id'];
            $goodsinfo[] = $value;
        }
        $fit = new FitController();
        $fits = M('fit_goods');
        $fitsInfo = $fits->field('id,name,price')->select();
        $res2 = array_merge($goodsinfo, $fitsInfo);
        // var_dump($res2);die;
        //查询用户名
        $user = new UserController();
        $users = M('admin_user');
        $userInfo = $users->field('username')->where('id=' . $info['user_id'])->find();
        if (!empty($userInfo)) {
            $info2 = array_merge($info, $userInfo);
        } else {
            $info2 = $info;
        }

        // var_dump($info2);die;
        //查询收货信息
        $con = M('consignee_info');
        $conInfo = $con->where('id=' . $info2['deliveryinfo_id'])->find();

        //查询支付信息
        $pays = M('payment_method');
        $payInfo = $pays->where('id=' . $info2['paymode_id'])->find();
        // var_dump($payInfo);
        // var_dump($conInfo);
        // var_dump($res2);
        // var_dump($info);

        // $admin = new LoginController();

        // var_dump($_session);
        // var_dump($info);
        //分配变量
        $this->assign('info', $info2);
        $this->assign('orderInfo', $info);
        $this->assign('res', $res2);
        $this->assign('con', $conInfo);
        $this->assign('pay', $payInfo);
        $this->display();
    }

    public function update()
    {
        //获取订单号
        $id = I('get.id');
        $num = I('get.order_num');
        //创建模型
        $order = M('goods_order');
        //创建数据
        $orders = $order->create();
        // $order->save($num);
        // echo $order->getLastSql();
        // var_dump($orders);die;
        if ($order->save()) {
            $this->success('修改订单成功', U('Order/index'), '2');
        } else {
            $this->error('修改订单失败', U('Order/index'), '2');
        }
    }
}