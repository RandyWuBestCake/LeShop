<?php
/**
 * 兄弟连项目二 乐视商城:无限分类管理模块
 *
 * PHP version 5.4.16
 * @author      刘 健<1307668516@qq.com>
 * @version     2.0
 * @time          2015-01-19 16:02
 */
namespace Admin\Controller;
use Think\Controller;

class CateController extends Controller
{

    // 分类添加方法
    public function add()
    {
        // 创建分类模型
        $cate = M('goods_cate');
        //从数据库读取所有的分类
        $cates = $cate->field('id,name,pid,concat(path,"-",id) as paths')->order('paths')->select();
        // var_dump($cates);die();
        foreach ($cates as $key => $value) {
            $num = count(explode('-', $value['paths'])) - 2;
            $cates[$key]['name'] = str_repeat('|-----', $num) . $value['name'];
        }
        //分配变量
        $this->assign('cates', $cates);
        $this->display();
    }

    //数据插入方法
    public function insert()
    {
        //创建分类模型
        $cate = M('goods_cate');
        //添加分类判定是否是顶级分类
        if ($_POST['pid'] == 0) {
            // 如果是顶级分类,父级分类pid为0;分类path为0'
            $_POST['pid'] = 0;
            $_POST['path'] = 0;
        } else {
            // 如果不是顶级分类,则创建path的值
            $parentCate = $cate->where("id={$_POST['pid']}")->find();
            $_POST['path'] = $parentCate['path'] . "-" . $parentCate['id'];
        }
        //上传图片进行判断,如果有图片上传,即在form表单传递过来有值,需要先上传文件后,然后再删除原来的文件
        //实例化上传类
        $upload = new \Think\Upload();
        //rootPath方法,路径必须手动创建
        $upload->rootPath = "./Public/Uploads/";
        //设置图片上传目录,只能设置一层目录
        $upload->savePath = "goods_cate/";
        //上传图片文件
        $info = $upload->upload();
        //整理字段img值,拼接图片路径编程规则:/Public/Uploads/goods_cate/2015-01-19/54bc80302291b.jpg
        $_POST['img'] = trim($upload->rootPath . $info['img']['savepath'] . $info['img']['savename'], '.');
        //创建数据
        // var_dump($_POST);die;
        $s = $cate->create();
        // var_dump($s);die;
        // 判断添加数据是否成功,并跳转重定向
        if ($cate->add()) {
            $this->success('添加分类成功', U('Cate/add'), 3);
        } else {
            $this->error('添加分类失败', U('Cate/add'), 3);
        }
    }

    public function index()
    {
        //创建模型
        $cate = M('goods_cate');
        //获取当前请求的页码
        $p = isset($_GET['p']) ? $_GET['p'] : 1;
        //获取每页显示的数量
        $num = isset($_COOKIE['num']) ? $_COOKIE['num'] : 10;
        setcookie('num', $num, time() + 3600, '/');
        //处理分页请求
        //计算分类表中的总数
        $count = $cate->count();
        //实例化分页对象
        $page = new \Think\Page($count, $num);
        //获取页码的html代码
        $show = $page->show();

        //从数据库读取所有的分类
        $cates = $cate->field('id,name,pid,concat(path,"-",id) as paths,img')->order('paths')->page($p, $num)->select();
        // var_dump($cates);die();
        foreach ($cates as $key => $value) {
            $num = count(explode('-', $value['paths'])) - 2;
            $cates[$key]['name'] = str_repeat('|-----', $num) . $value['name'];
        }
        //分配变量
        $this->assign('cates', $cates);
        $this->assign('page', $show);
        $this->assign('num', $num);

        $this->display();
    }

    //改变显示条数的功能
    public function changeNum()
    {
        $num = $_GET['num'];
        setcookie('num', $num, time() + 3600, '/');
        echo 1;
    }

    //修改分类方法
    public function edit()
    {
        //创建模型
        $cate = M('goods_cate');
        $id = I('get.id');
        //查询数据库
        $cateInfo = $cate->where("id=$id")->find();
        //读取所有的分类
        $cates = $this->getCates();

        //分配变量
        $this->assign('cates', $cates);
        $this->assign('cateInfo', $cateInfo);

        // var_dump($cateInfo);
        // var_dump($cates);die();
        $this->display();
    }

    //获取所有的分类
    public function getCates($page)
    {

        $cate = M('goods_cate');
        if ($page == 1) {
            $cates = $cate->field('id,name,pid,concat(path,"-",id) as paths')->order('paths')->page($p, $num)->select();
        } else {
            $cates = $cate->field('id,name,pid,concat(path,"-",id) as paths')->order('paths')->select();
        }
        // var_dump($cates);die();
        foreach ($cates as $key => $value) {
            $num = count(explode('-', $value['paths'])) - 2;
            $cates[$key]['name'] = str_repeat('|-----', $num) . $value['name'];
        }
        //返回变量
        return $cates;
    }

    //更新修改后的数据库
    public function update()
    {
        //创建分类模型
        $cate = M('goods_cate');
        //添加分类判定是否是顶级分类
        if ($_POST['pid'] == 0) {
            // 如果是顶级分类,父级分类pid为0;分类path为0'
            $_POST['pid'] = 0;
            $_POST['path'] = 0;
        } else {
            // 如果不是顶级分类,则创建path的值
            $parentCate = $cate->where("id={$_POST['pid']}")->find();
            $_POST['path'] = $parentCate['path'] . "-" . $parentCate['id'];
        }
        // 上传图片
        //上传图片进行判断,如果有图片上传,即在form表单传递过来有值,需要先上传文件后,然后再删除原来的文件
        if ($_FILES['img']['name'] != "") {
            //实例化上传类
            $upload = new \Think\Upload();
            //rootPath方法,路径必须手动创建
            $upload->rootPath = "./Public/Uploads/";
            //设置图片上传目录,只能设置一层目录
            $upload->savePath = "goods_cate/";
            //上传图片文件
            $info = $upload->upload();
            //整理字段img值,拼接图片路径编程规则:/Public/Uploads/goods_cate/2015-01-19/54bc80302291b.jpg
            $_POST['img'] = trim($upload->rootPath . $info['img']['savepath'] . $info['img']['savename'], '.');
            //删除原来的主图
            $cateInfo = $cate->where("id={$_POST['id']}")->find();
            //拼装原图路径
            $img = '.' . $cateInfo['img'];
            // var_dump($img);die;
            //执行删除
            unlink($img);
        }
        //创建数据
        // var_dump($_POST);
        $s = $cate->create();
        // 判断添加数据是否成功,并跳转重定向
        if ($cate->save()) {
            $this->success('更新成功', U('Cate/index'), 3);
        } else {
            $this->error('更新失败', U('Cate/edit'), 3);
        }
    }

    //删除分类数据
    public function delete()
    {

        $cate = M('goods_cate');
        $id = I('get.id');
        //获取要删除的分类数据
        $cates = $cate->where("id=$id")->find();
        $paths = $cates['path'] . '-' . $cates['id'];
        //拼装分类原图路径
        $img = '.' . $cates['img'];
        // $cate->where("path like '$paths%'")->select();
        // echo $cate->getLastSql();
        // die();
        //删除顶级分类主图
        unlink($img);
        // 获取子类的原图
        $imgs = $cate->field('img')->where("path like '$paths%'")->select();
        //遍历删除原图
        foreach ($imgs as $key => $value) {
            $imgs = '.' . $value['img'];
            unlink($imgs);
        }
        //删除数据库中的顶级分类数据
        $parentdelInfo = $cate->where("id=$id")->delete();
        //删除父级分类下的子分类
        $delInfo = $cate->where("path like '$paths%'")->delete();
        if ($parentdelInfo || $delInfo) {
            $this->success('删除成功', U('Cate/index'), 3);
        } else {
            $this->error('删除失败', U('Cate/index'), 3);
        }
    }
}

?>
