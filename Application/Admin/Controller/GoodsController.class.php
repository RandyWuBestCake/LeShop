<?php
/**
 * 兄弟连项目二 乐视商城:商品管理模块
 *
 * PHP version 5.4.16
 * @author      刘 健<1307668516@qq.com>
 * @version     2.0
 * @time          2015-01-19 16:02
 */
namespace Admin\Controller;

use Think\Controller;

class GoodsController extends Controller
{
    //商品添加方法
    public function add()
    {
        //获取所有的商品分类代码
        //实例化商品分类对象
        $cate = new CateController();
        $cates = $cate->getCates(1);

        //分配变量
        $this->assign('cates', $cates);

        $this->display();
    }

    public function insert()
    {
        //获取商品名称
        $name = $_POST['name'];
        //将字符串转化成时间戳
        $_POST['addtime'] = strtotime($_POST['addtime']);
        //创建模型
        $goods = M('goods_detail');
        //商品套餐价格
        $price = $_POST['hwprice'] + $_POST['letvfee'] + $_POST['servicebagprice'];
        $_POST['price'] = $price;
        //创建数据
        $goods->create();
        $id = $goods->add();
        if ($id) {
            //添加成功
            $this->success('添加商品描述成功', U('Goods/capability', array('id' => $id)), 2);
        } else {
            $this->error('添加商品描述失败', U('Goods/add'), 2);
        }
    }

    public function capability()
    {
        $id = I('get.id');
        //创建模型
        $goods = M('goods_detail');
        //查询数据库商品的性能数据
        $goodsInfo = $goods->field('id,name,capability')->where('id=' . $id)->find();
        //分配变量
        $this->assign('goodsInfo', $goodsInfo);

        $this->display();
    }

    public function updatecapability()
    {

        $id = I('post.id');
        //创建模型
        $goods = M('goods_detail');
        //创建数据
        $goods->create();
        if ($goods->save()) {
            //添加成功
            $this->success('修改性能成功', U('Goods/design', array('id' => $id)), 2);
        } else {
            $this->error('修改性能失败', U('Goods/design', array('id' => $id)), 2);
        }
    }

    public function design()
    {
        $id = I('get.id');
        //创建模型
        $goods = M('goods_detail');
        //查询数据库商品的性能数据
        $goodsInfo = $goods->field('id,name,design')->where('id=' . $id)->find();
        //分配变量
        $this->assign('goodsInfo', $goodsInfo);

        $this->display();
    }

    public function updatedesign()
    {

        $id = I('post.id');
        //创建模型
        $goods = M('goods_detail');
        //创建数据
        $goods->create();
        if ($goods->save()) {
            //添加成功
            $this->success('修改性能成功', U('Goods/LetvUI', array('id' => $id)), 2);
        } else {
            $this->error('修改性能失败', U('Goods/LetvUI', array('id' => $id)), 2);
        }
    }

    public function LetvUI()
    {
        $id = I('get.id');
        //创建模型
        $goods = M('goods_detail');
        //查询数据库商品的性能数据
        $goodsInfo = $goods->field('id,name,letvUI')->where('id=' . $id)->find();
        //分配变量
        $this->assign('goodsInfo', $goodsInfo);

        $this->display();
    }

    public function updateLetvUI()
    {

        $id = I('post.id');

        //创建模型
        $goods = M('goods_detail');
        //创建数据
        $info = $goods->create();
        if ($goods->save()) {
            //添加成功
            $this->success('修改LetvUI成功', U('Goods/LetvStore', array('id' => $id)), 2);
        } else {
            $this->error('修改LetvUI失败', U('Goods/LetvStore', array('id' => $id)), 2);
        }
    }

    public function LetvStore()
    {
        $id = I('get.id');
        //创建模型
        $goods = M('goods_detail');
        //查询数据库商品的性能数据
        $goodsInfo = $goods->field('id,name,letvStore')->where('id=' . $id)->find();
        //分配变量
        $this->assign('goodsInfo', $goodsInfo);

        $this->display();
    }

    public function updateLetvStore()
    {

        $id = I('post.id');
        //创建模型
        $goods = M('goods_detail');
        //创建数据
        $goods->create();
        if ($goods->save()) {
            //添加成功
            $this->success('修改LetvStore成功', U('Goods/param', array('id' => $id)), 2);
        } else {
            $this->error('修改LetvStore失败', U('Goods/param', array('id' => $id)), 2);
        }
    }

    public function param()
    {
        $id = I('get.id');
        //创建模型
        $goods = M('goods_detail');
        //查询数据库商品的性能数据
        $goodsInfo = $goods->field('id,name,param')->where('id=' . $id)->find();
        //分配变量
        $this->assign('goodsInfo', $goodsInfo);

        $this->display();
    }

    public function updateparam()
    {

        $id = I('post.id');
        //创建模型
        $goods = M('goods_detail');
        //创建数据
        $goods->create();
        if ($goods->save()) {
            //添加成功
            $this->success('修改param成功', U('Goods/compare', array('id' => $id)), 2);
        } else {
            $this->error('修改param失败', U('Goods/compare', array('id' => $id)), 2);
        }
    }

    public function compare()
    {
        $id = I('get.id');
        //创建模型
        $goods = M('goods_detail');
        //查询数据库商品的性能数据
        $goodsInfo = $goods->field('id,name,compare')->where('id=' . $id)->find();
        //分配变量
        $this->assign('goodsInfo', $goodsInfo);

        $this->display();
    }

    public function updatecompare()
    {

        $id = I('post.id');
        //创建模型
        $goods = M('goods_detail');
        //创建数据
        $goods->create();
        if ($goods->save()) {
            //添加成功
            $this->success('恭喜!修改compare成功,并完成了所有的商品信息添加或修改!', U('Goods/index', array('id' => $id)), 2);
        } else {
            $this->error('抱歉,修改compare失败!', U('Goods/index', array('id' => $id)), 2);
        }
    }

    public function index()
    {
        //创建模型
        $goods = M('goods_detail');
        //获取当前请求的页码
        $p = isset($_GET['p']) ? $_GET['p'] : 1;
        //获取每页显示的数量
        $num = isset($_COOKIE['num']) ? $_COOKIE['num'] : 10;
        setcookie('num', $num, time() + 3600, '/');

        //处理分页请求
        //计算商品表中的总数
        $count = $goods->count();

        //实例化分页对象
        $page = new \Think\Page($count, $num);
        //获取页码的html代码
        $show = $page->show();

        //查询数据库
        $goodsInfo = $goods->field('id,pid,name,hwprice,hw,letvfee,expiry,servicebagprice,servicebag,headline,param,compare,addtime')->select();

        //分配变量
        $this->assign('goodsInfo', $goodsInfo);
        $this->assign('page', $show);
        $this->display();
    }

    public function edit()
    {
        $id = I('get.id');
        //创建模型
        $goods = M('goods_detail');
        //实例化商品分类对象
        $cate = new CateController();
        $cates = $cate->getCates();
        // var_dump($cates);
        //查询数据库
        $goodsInfo = $goods->field('id,pid,name,topic,hwprice,hw,letvfee,expiry,servicebagprice,servicebag,headline,addtime')->where('id=' . $id)->find();
        // var_dump($goodsInfo);
        //分配变量
        $this->assign('cates', $cates);
        $this->assign('goodsInfo', $goodsInfo);
        $this->display();
    }

    public function update()
    {
        $id = I('post.id');
        //创建模型
        $goods = M('goods_detail');
        //处理时间字段值
        $_POST['addtime'] = strtotime($_POST['addtime']);
        //创建数据
        $goods->create();
        if ($goods->save()) {
            //添加成功
            $this->success('修改商品描述成功', U('Goods/capability', array('id' => $id)), 2);
        } else {
            $this->error('修改商品描述失败', U('Goods/capability', array('id' => $id)), 2);
        }
    }

    public function delete()
    {
        $id = I('get.id');
        //创建模型
        $goods = M('goods_detail');
        //执行删除
        if ($goods->delete($id)) {
            $this->success('删除商品成功', U('Goods/index'), 2);
        } else {
            $this->error('删除商品失败', U('Goods/index'), 2);
        }
    }
}

?>