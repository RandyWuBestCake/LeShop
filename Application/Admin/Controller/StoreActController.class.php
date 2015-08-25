<?php
/**
 * 兄弟连项目二 乐视商城: appstore活动页面
 *
 * PHP version 5.4.3
 * @author      跳梁者<zlutao@qq.com>
 * @version     1.0
 * @time          2015-01-28 14:05
 */
namespace Admin\Controller;

use Think\Controller;

class StoreActController extends CommonController
{
    //活动列表展示页面
    public function lists()
    {
        //获取分页信息
        $p = isset($_GET['p']) ? $_GET['p'] : '0';
        $store_goods_activity = M('store_goods_activity'); // 实例化store_goods_activity对象
        // 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
        $rows = $store_goods_activity->page($p . ',10')->select();
        $count = $store_goods_activity->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count, 10);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show();// 分页显示输出
        $this->assign('rows', $rows);
        $this->assign('cates', $cates);
        $this->assign('page', $show);// 赋值分页输出
        $this->display(); // 输出模板
    }

    // 活动添加页面
    public function add()
    {
        $this->display();
    }

    // 处理活动添加数据
    public function doAdd()
    {
        //检查图片文件是否上传成功
        if ($_FILES['img']['error'] != 0) { //未成功则返回提示
            $this->error('请检查活动图片是否选择,<br>推荐大小375X160Px<br>2M以内<br>常用图片格式');
        }
        $upload = new \Think\Upload();// 实例化上传类    
        $upload->maxSize = 2045728;// 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath = './Public/Uploads/'; // 设置附件上传根目录
        $upload->savePath = 'store_goods/act/'; // 设置附件上传（子）目录
        // 上传文件     
        $info = $upload->upload();
        if (!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        } else {// 上传成功
            $_POST['img'] = $info['img']['savepath'] . $info['img']['savename'];
        }
        $_POST['create_time'] = time();
        //实例化模型
        $store_goods_activity = M('store_goods_activity');
        // 格式化数据
        $store_goods_activity->create();
        if ($res = $store_goods_activity->add()) { //添加成功
            $this->success('添加成功');
        } else {
            $this->error('添加失败');
        }
    }

    // 活动修改页面
    public function edit()
    {
        //获取要修改的ID
        $id = I("get.id");
        // 实例化模型
        $store_goods_activity = M("store_goods_activity");
        // 获取图片地址
        $act = $store_goods_activity->where("id = $id")->find();
        // 分配变量
        $this->assign('act', $act);
        // 显示模版
        $this->display();
    }

    // 活动修改数据处理
    public function doEdit()
    {
        //实例化模型
        $store_goods_activity = M('store_goods_activity');
        //检查是否有图片文件上传
        if ($_FILES['img']['error'] != 4) {
            //活动iD
            $id = $_POST['id'];
            // 活动图片
            $img = $store_goods_activity->field('img')->where("id = $id")->getField('img');
            $upload = new \Think\Upload();// 实例化上传类    
            $upload->maxSize = 2045728;// 设置附件上传大小
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath = './Public/Uploads/'; // 设置附件上传根目录
            $upload->savePath = 'store_goods/act/'; // 设置附件上传（子）目录
            // 上传文件     
            $info = $upload->upload();
            if (!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            } else {// 上传成功
                $_POST['img'] = $info['img']['savepath'] . $info['img']['savename'];//拼装路径
                @unlink('./Public/Uploads/' . $img); //删除原图
            }
        }
        $time = $_POST['time'];
        $_POST['create_time'] = strtotime($time);
        // 格式化数据
        $store_goods_activity->create();
        if ($res = $store_goods_activity->save()) { //保存成功
            $this->success('保存成功');
        } else {
            if ($res == 0) {
                $this->error('没有选项被修改');
            }
            $this->error('保存失败');
        }
    }

    // 处理删除数据
    public function doDel()
    {

    }

    // 添加活动商品
    public function goodsAdd()
    {
        //获取要修改的ID
        $id = I("get.id");
        // 实例化模型
        $store_goods_activity = M("store_goods_activity");
        $store_goods_activity_relate = M("store_goods_activity_relate");
        // 获取活动信息
        $act = $store_goods_activity->where("id = $id")->find();
        // 获取活动下的商品
        $goods = $store_goods_activity_relate->join('left join store_goods as a on store_goods_activity_relate.gid =a.id ')->where("aid = $id")->getField('store_goods_activity_relate.gid,a.title', true);
        $ids = array_keys($goods);
        // 分配变量
        $this->assign('goods', $goods);
        $this->assign('act', $act);
        $this->assign('ids', implode(',', $ids));
        // 显示模版
        $this->display();
    }

    // 活动商品添加
    public function goodsDoAdd()
    {
        // 获取当前活动ID
        $aid = $_POST['aid'];
        // 判断 如果用户没有进行修改 直接提示
        if ($_POST['gid'] == '' && $_POST['fgid'] == '') {
            $this->error('没有要修改的选项');
        }
        //判断 如果用户只进行了删除操作调用对应函数处理
        if ($_POST['gid'] == '' && $_POST['fgid'] != '') {
            $fgids = explode(',', $_POST['fgid']); //要删除的关系ID
            $fgids = array_unique($fgids);//去重
            $delRalate = $this->delRalate($fgids, $aid); //删除
            if ($delRalate) {
                $this->success('删除成功');
            } else {
                $this->error('删除失败');
            }
        }
        //判断 如果用户只进行了添加操作调用对应函数处理
        if ($_POST['gid'] != '' && $_POST['fgid'] == '') {
            $gids = explode(',', $_POST['gid']); //要添加的关系ID
            $gids = array_unique($gids);//去重
            $addRalate = $this->addRalate($gids, $aid);//添加
            if ($addRalate) {
                $this->success('添加成功');
            } else {
                $this->error('添加失败');
            }
        }
        //判断 如果用户同时进行了添加 删除操作调用对应函数处理
        if ($_POST['gid'] != '' && $_POST['fgid'] != '') {
            $fgids = explode(',', $_POST['fgid']); //要删除的关系ID
            $fgids = array_unique($fgids);//去重
            $delRalate = $this->delRalate($fgids, $aid); //删除
            $gids = explode(',', $_POST['gid']); //要添加的关系ID
            $gids = array_unique($gids);//去重
            $addRalate = $this->addRalate($gids, $aid);//添加
            if ($delRalate && $addRalate) {
                $this->success('修改成功');
            } else if ($delRalate) {
                $this->error('删除成功但,添加失败');
            } else if ($addRalate) {
                $this->error('添加成功但,删除失败');
            } else {
                $this->error('未知错误');
            }
        }
    }

    //私有方法 处理商品活动批量添加
    // @param  array $gids  格式 array(0=>商品id[,1=>商品id]);
    // @param  num $aid  活动ID
    private function addRalate($gids, $aid)
    {
        // 实例化模型
        $store_goods_activity_relate = M('store_goods_activity_relate');
        //获取当前活动下商品ID数组
        $ids = $store_goods_activity_relate->where("aid = $aid")->getField('gid', true);
        $ids = $ids ? $ids : []; //如果为空则赋值为空数组
        $diff = array_diff($gids, $ids); //获取与用户要添加的数组的差值得到 要新加入数据库中的元素
        foreach ($diff as $key => $value) { //遍历元素格式化数组 方便批量添加 格式为array(0=>array('id'=>1,'gid'=>2)[,1=>array('id'=>2,'gid'=>2)])
            $data['gid'] = $value;
            $data['aid'] = $_POST['aid'];
            $datas[] = $data;
        }
        $res = $store_goods_activity_relate->addAll($datas); //进行批量添加
        return $res; //返回结果
    }

    //私有方法 处理商品活动批量删除
    // @param  array $fgids  格式 array(0=>商品id[,1=>商品id]);
    // @param  num $aid  活动ID
    private function delRalate($fgids, $aid)
    {
        // 实例化模型
        $store_goods_activity_relate = M('store_goods_activity_relate');
        //获取当前活动下商品ID数组
        $ids = $store_goods_activity_relate->where("aid = $aid")->getField('gid', true);
        $ids = $ids ? $ids : []; //如果结果为空 赋值为空数组
        $intersect = array_intersect($fgids, $ids); //与用户要删除的数组进行交集操作
        $data['gid'] = array('in', $intersect); //格式化查询条件
        $data['aid'] = $aid; //格式化查询条件
        $res = $store_goods_activity_relate->where($data)->delete(); //执行批量删除
        return $res; //返回结果
    }

    // ajax按照页面返回当前分页的商品 每页个数25个
    public function goods()
    {
        //判断搜索字段是否存在
        if (isset($_GET['search'])) { //如果是搜索请求
            $where = 'title like "%' . $_GET['search'] . '%"'; //模糊搜索标题
        } else {
            $where = ''; //条件是空
        }
        // 获取当前页码
        $p = isset($_GET['p']) ? $_GET['p'] : 1;
        // 实例化模型
        $store_goods = M("store_goods");
        $count = $store_goods->where($where)->count(); // 获取商品的总记录数
        $Page = new \Think\Page($count, 25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $goods = $store_goods->where($where)->page($p, 25)->select();
        if ($goods == null) {
            die("<pre><h4>资源未找到</h4></pre>");
        }
        $show = $Page->show();// 分页显示输出
        // 分配变量
        $this->assign('page', $show);// 赋值分页输出
        $this->assign('goods', $goods);
        // 显示模版
        $this->display();
    }
}
