<?php
/**
 * 兄弟连项目二 乐视商城:比一比中列表模块
 *
 * PHP version 5.4.3
 * @author      王丽娟<724243914@qq.com>
 * @version     1.0
 * @time          2015-01-19 23:00
 */
namespace Admin\Controller;

use Think\Controller;

class SpecController extends Controller{
    public function index(){
        $spec = M('product_spec');
        $spe = M('product_spec_cate');
        $id = I('get.id');
        $spes = $spe->where('pid=0')->select();//链表查询 左表中pid和右表中pid相等的
        //遍历查询结果
        foreach ($spes as $v) {
            $s = $v['id'];
            $spep[] = $spe->where("pid=$s")->select();//查询pid等于id的字段
            //链表查询 左表中pid和右表中pid相等的
            $spepr[] = $spe->field("product_spec_cate.name,product_spec.con,product_spec_cate.id")->join("left join product_spec on product_spec_cate.id=product_spec.pid and product_spec.pscid=$id")->where(" product_spec_cate.pid = $s")->order("product_spec_cate.id")->select();
            $name[] = $v['name'];

        }
        $a = $spepr[2][2]['con'];
        //分配一级分类值name
        $this->assign('name', $name);
        $this->assign('spepr', $spepr);
        //如果a存在值渲染模板index 否则渲染add
        if (!$a) {
            $this->assign('spep', $spep);
            $this->assign('pscid', $pid);
            $this->display('add');
        } else {
            $this->display();
        }
    }

    public function edit()
    {
        $id = I('get.id');
        $spec = M('product_spec');
        $spe = M('product_spec_cate');
        //查询pid=0的一级分类
        $spes = $spe->where('pid=0')->select();
        foreach ($spes as $v) {
            $s = $v['id'];
            //查询pid等于id的字段
            $spep = $spe->where("pid=$s")->select();
            //链表查询 左表中pid和右表中pid相等的
            $spepr[] = $spe->field("product_spec_cate.name,product_spec.con,product_spec.id")->join("left join product_spec on product_spec_cate.id=product_spec.pid and product_spec.pscid=$id")->where(" product_spec_cate.pid = $s")->order("product_spec_cate.id")->select();
            $name[] = $v['name'];
        }
        //分配一级分类值name
        $this->assign('name', $name);
        $this->assign('spepr', $spepr);
        $this->display();
    }

    public function updete()
    {
        $spec = M('product_spec');
        //遍历POST传过来的值
        foreach ($_POST as $k => $v) {
                $data['id'] = $k;
                $data['con'] = $v;
                //用data方法过滤字段连贯更新字段值
                $spec->data($data);
                $spec->save();
         }  
            if (!$spec->save()) {
                $this->success('修改成功', U('Product/index'), 3);
            } else {
                $this->error('修改失败', U('Product/index'), 3);
            } 
    
        
    }

    public function add()
    {
        $spec = M('product_spec');
        $pscid = $_POST['pscid'];
        //遍历POST数组
        foreach ($_POST as $k => $v) {
            //下标不是pscid的走if区间
            if ($k != 'pscid') {
                $data['pid'] = $k;
                $data['con'] = $v;
                $data['pscid'] = $pscid;
                //用data方法过滤字段并连贯添加值
                $a = $spec->data($data)->add();
            }
        }
        if ($a) {
            $this->success('添加成功', U('Product/index'), 3);
        } else {
            $this->error('添加失败', U('Product/index'), 3);
        }
    }
}