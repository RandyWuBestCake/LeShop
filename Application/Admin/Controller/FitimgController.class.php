<?php
/**
 * 兄弟连项目二 乐视商城:配件图片管理模块
 *
 * PHP version 5.4.16
 * @author      刘 健<1307668516@qq.com>
 * @version     2.0
 * @time          2015-01-20 23:02
 */
namespace Admin\Controller;
use Think\Controller;

class FitimgController extends Controller
{

    public function add()
    {
        //实例化fitController
        $fit = new FitController();
        //创建模型
        $f = M('fit_goods');
        $info = $f->select();
        // var_dump($info);
        //获取pid
        $fid = I('get.fid');
        //判断pid是否存在
        if (isset($fid)) {

            $this->assign(fid, $fid);
        } else {
            $this->assign(fid, '');
        }
        //分配变量
        $this->assign(info, $info);

        $this->display();
    }

    public function insert()
    {
        //获取pid的值
        $fid = I('post.fid');

        //创建模型
        $fit = M('fit_goods_images');
        if (!$fid) {
            $this->error('添加配件图显失败,请先选择配件名称', U('Fitimg/add'), 2);
            exit;
        }
        //上传图片进行判断,如果有图片上传,即在form表单传递过来有值,需要先上传文件后,然后再删除原来的文件
        //实例化上传类
        $upload = new \Think\Upload();
        //rootPath方法,路径必须手动创建
        $upload->rootPath = "./Public/Uploads/";
        //设置图片上传目录,只能设置一层目录
        $upload->savePath = "fit_goods_images/";
        //上传图片文件
        $info = $upload->upload();
        //整理字段img值,拼接图片路径编程规则:/Public/Uploads/goods_cate/2015-01-19/54bc80302291b.jpg
        $_POST['img'] = trim($upload->rootPath . $info['img']['savepath'] . $info['img']['savename'], '.');

        //创建数据
        // var_dump($_POST);
        $s = $fit->create();
        // var_dump($s);die;
        // 判断添加数据是否成功,并跳转重定向
        if ($fit->add()) {
            $this->success('添加配件图显成功', U('Fitimg/add', 'fid=' . $fid), 2);
        } else {
            $this->error('添加配件图显失败', U('Fitimg/add'), 2);
        }
    }

    public function index()
    {
        //创建模型
        $fit = M('fit_goods_images');
        //获取当前请求页码
        $p = isset($_GET['p']) ? $_GET['p'] : 1;
        //获取每页显示的数量
        $num = isset($_COOKIE['num']) ? $_COOKIE['num'] : 10;
        setcookie('num', $num, time() + 3600, '/');
        //处理分页请求
        //计算分类表中的总数
        $count = $fit->count();
        //实例化分页对象
        $page = new \Think\Page($count, $num);
        //获取页码的html代码
        $show = $page->show();

        //查询数据库
        $fits = $fit->page($p, $num)->select();
        // var_dump($fits);
        //使用fit_goods控制器
        $fitgoods = new FitController();
        //创建模型
        $fitgoods = M('fit_goods');
        //嵌套循环遍历
        foreach ($fits as $key => $value) {
            $fid = $value['fid'];
            //查询数据库
            $info = $fitgoods->field('name')->where('id=' . $fid)->find();
            foreach ($info as $key => $v) {
                // var_dump($v);
                $value['name'] = $v;
                $fitInfo[] = $value;
            }
        }
        // var_dump($fitInfo);
        //分配变量
        $this->assign(fitInfo, $fitInfo);
        $this->assign('page', $show);
        $this->assign('num', $num);

        $this->display();
    }

    public function delete()
    {
        //创建模型
        $fit = M('fit_goods_images');
        //获取id
        $id = I('get.id');
        //首先删除原图
        $img = $fit->field('img')->where('id=' . $id)->find();
        //拼装路径
        $info = '.' . $img['img'];
        // var_dump($info);die;
        unlink($info);
        if ($fit->delete($id)) {
            $this->success('配件图显配图删除成功', U('Fitimg/index'), 2);
        } else {
            $this->success('配件图显删除失败', U('Fitimg/index'), 2);
        }
    }
}

?>
