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

class GoodsController extends Controller
{

    public function allGoods()
    {
        //创建模型
        $cate = M('goods_cate');
        //查询数据库
        $res = $cate->where('pid=3')->select();
        // var_dump($res);

        foreach ($res as $k => $v) {
            //拼接处其path
            $path = $v['path'] . '-' . $v['id'];
            $good = $cate->field('id,pid,name')->where("path='$path'")->select();
            $goods[] = $good;
        }
        // var_dump($goods);
        $fit = $cate->where('pid=0')->select();
        unset($fit['0']);
        // var_dump($fit);

        foreach ($fit as $key => $value) {

            //拼接出其子类的path
            $path = $value['pid'] . '-' . $value['id'];
            $ene = $cate->field('pid,name,img')->where("path='$path'")->select();
            $fits[] = $ene;
        }
        // var_dump($res);
        // var_dump($goods);
        // var_dump($fits);

        //分配变量
        $this->assign('res', $res);
        $this->assign('goods', $goods);
        $this->assign('fit', $fit);
        $this->assign('fits', $fits);

        $this->display();
    }

    public function headline()
    {
        //创建模型
        $headline = M('goods_detail');
        //获取id
        $id = I('get.id');
        if ($id == '18') {

            //查询数据库
            $res = $headline->where('pid=' . $id)->find();
        } else {
            $pid = I('get.pid');
            $res = $headline->where('pid=' . $pid)->find();
        }
        //分配变量
        $this->assign('res', $res);
        // var_dump($res);
        $this->display();
    }

    public function capability()
    {
        //获取id
        $id = I('get.pid');
        // var_dump($id);
        // $id = '37';
        //创建模型
        $headline = M('goods_detail');

        //查询数据库
        $res = $headline->where('pid=' . $id)->find();

        // var_dump($res);
        //分配变量
        $this->assign('res', $res);
        // var_dump($res);
        $this->display();

    }

    public function design()
    {
        $this->capability();
    }

    public function letvUI()
    {
        $this->capability();
    }

    public function letvStore()
    {
        $this->capability();
    }

    public function param()
    {
        $this->capability();
    }

    public function compare()
    {
        $this->capability();
    }
}
