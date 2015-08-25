<?php
/**
 * 兄弟连项目二 乐视商城:资源商店
 *
 * PHP version 5.4.3
 * @author      跳梁者<zlutao@qq.com>
 * @version     1.0
 * @time          2015-01-19 10:37
 *  2015-01-26 之后 方法名统一为驼峰命名
 */
namespace Admin\Controller;

use Think\Controller;

class StoreController extends Controller
{
    /**
     * Store 首页设置
     */
    public function index()
    {
        //实例化模型
        $indexCate = M('other');
        //查询参数是否存在
        $res = $indexCate->where('title = "storeIndexCate"')->find();
        if ($res) { //如果存在
            $row = $res['con']; //获取内容
        } else { //如果不存在
            $row = ''; //是指内容为空
        }
        // 分配变量
        $this->assign('row', $row);
        //显示模版
        $this->display();
    }

// {'0':['title':'应用设置','cid':[1,2,3,4,5,6],'num':[3,3,3,3,3,3]],'1':['title':'应用设置','cid':[1,2,3,4,5,6],'num':[3,3,3,3,3,3]]}
    public function indexSave()
    {
        //获取内容
        $str = trim($_POST['category']);
        //格式化数据
        $data['con'] = $str;
        //实例化模型
        $indexCate = M('other');
        //查询参数是否存在
        $res = $indexCate->where('title = "storeIndexCate"')->find();
        if ($res) { //如果存在
            $r1 = $indexCate->where('title = "storeIndexCate"')->data($data)->save(); //执行保存
            if ($r1) { //保存成功
                $this->success("设置成功");
            } else { //保存失败
                $this->success('设置失败');
            }
        } else { //如果不存在
            $r2 = $indexCate->where('title = "storeIndexCate"')->data($data)->add(); //执行添加
            if ($r2) { //添加成功
                $this->success("设置成功");
            } else { //添加失败
                $this->success('设置失败');
            }
        }
    }

    /**
     *  Store 资源管理 菜单选项和功能
     */
    // 资源分类列表页面
    public function cate_list()
    {
        // 获取分类id和title的数组
        $cates = getAll("store_goods_cate", 'id', 'title');
        //查询分类信息
        $cate = M("store_goods_cate");
        $rows = $cate->select();
        //分配变量
        $this->assign("rows", $rows);
        $this->assign("cates", $cates);
        // var_dump($cates);die;
        // 解析模版
        $this->display();
    }

    // 分类添加页面
    public function cate_add()
    {
        //按照path排序获取分类标题和ID
        $rows = getStoreGoodsCate();
        // echo $cate->getLastSql();die();
        // var_dump($rows);die();
        // 分配变量
        $this->assign("rows", $rows);
        // 解析模版
        $this->display();
    }

    //处理分类添加
    public function cate_doadd()
    {
        //    
        $cate = M('store_goods_cate');
        if ($_POST['pid'] != 0) {
            $pid = $_POST['pid'];
            $p = $cate->where("id=$pid")->find();
            // echo $cate->getLastSql();
            // var_dump($p);die();
            $_POST['path'] = $p['path'] . '-' . $p['id'];
            // var_dump($_POST);    die();
        } else {
            $_POST['path'] = '0';
        }
        $cate->create();
        if ($cate->add()) {
            $this->success('添加成功');
        }
    }

    //分类修改页面
    public function cate_edit()
    {
        // 获取id
        $id = I('get.id');
        //实例化模型
        $cate = M('store_goods_cate');
        //获取要修改的分类信息
        $row = $cate->where("id=$id")->find();
        //按照path排序获取分类标题和ID
        $rows = getStoreGoodsCate();
        $this->assign('rows', $rows);
        $this->assign('row', $row);
        $this->display();
    }

    //处理分类修改数据
    public function cate_doedit()
    {

        // 接受pid
        $pid = I('post.pid');
        //查询父级 path
        $cate = M('store_goods_cate');
        $p = $cate->where("id=$pid")->find();
        // 组合新的path
        $_POST['path'] = $p['path'] . '-' . $p['id'];
        $cate->create();
        if ($res = $cate->save()) {
            $this->success('修改成功', U('Store:cate_list'), 3);
        } else {
            if ($res == 0) {
                $this->error('没有选项被修改');
            }
            $this->error('未知错误');
        }
    }

    // 分类删除功能
    public function cate_dodel()
    {
        //实例化模型
        $stmt = M('store_goods_cate');
        //获取id 
        $id = I('get.id');
        //检测分类下是否有剩余商品
        $c = M('store_goods');
        $r = $c->where("cid = $id")->select();
        if ($r) {
            $this->error('分类下有商品,请先清空');
        }
        // 删除数据
        if ($stmt->delete($id)) { //删除成功
            $this->success('删除成功');
        } else { //删除失败
            $this->error('删除失败');
        }
    }

    // 资源列表页面
    public function lists()
    {
        // 获取分类id和title的数组
        $cates = getAll("store_goods_cate", 'id', 'title');
        $p = isset($_GET['p']) ? $_GET['p'] : '0';
        $store_goods = M('store_goods'); // 实例化store_goods对象
        // 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
        $rows = $store_goods->page($p . ',10')->select();
        $count = $store_goods->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count, 10);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show();// 分页显示输出
        $this->assign('rows', $rows);
        $this->assign('cates', $cates);
        $this->assign('page', $show);// 赋值分页输出
        $this->display(); // 输出模板
    }

    //资源添加页面
    public function add()
    {
        //获取操控设备数组
        $control_device = getAll('store_goods_control_device', 'id', 'name');
        //按照path排序获取分类标题和ID
        $rows = getStoreGoodsCate();
        // 实例化模型
        $store_goods_tag = M('store_goods_tag');
        // 获取标签
        $tags = $store_goods_tag->select();
        // 分配变量
        $this->assign('tags', $tags);
        // echo $cate->getLastSql();die();
        // var_dump($rows);die();
        // 分配变量
        $this->assign('control_device', $control_device);
        $this->assign("rows", $rows);
        // 解析模版
        $this->display();
    }

    // 处理资源添加页面
    public function doadd()
    {

        //当有图标被上传时
        if ($_FILES['img']['error'] != 4) {
            // 上传图标
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize = 3145728;// 设置附件上传大小
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath = './Public/Uploads/'; // 设置附件上传根目录
            $upload->savePath = 'store_goods/'; // 设置附件上传（子）目录
            // 上传文件 
            $info = $upload->upload();
            if (!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            } else {// 上传成功
                $_POST['img'] = $info['img']['savepath'] . $info['img']['savename'];
            }
        }
        $_POST['create_time'] = time();
        //实例化模型
        $goods = M('store_goods');
        //添加数据
        $goods->create();
        if ($res = $goods->add()) {
            //添加成功 则处理 tag 关联tag
            //获取tags标签
            $tags = explode(',', $_POST['tags']);
            $tagsAdd = explode(',', $_POST['tagsAdd']);
            // 循环遍历
            foreach ($tags as $key => $value) {
                //检测过滤空字段
                if (!empty($value)) {
                    $ArrTag[] = trim($value);
                }
            }
            // 循环遍历
            foreach ($tagsAdd as $key => $value) {
                //检测过滤空字段
                if (!empty($value)) {
                    $ArrTagAdd[] = trim($value);
                }
            }

            //实例化分类,分类关系模型
            $store_goods_tag = M('store_goods_tag');
            $store_goods_tag_relate = M('store_goods_tag_relate');

            //   检测标签
            //   $ArrTag 为用户选择的系统标签id数组
            //   $ArrTagAdd 为用户新输入 将要插入数据库的标签title数组

            //按照用户输入标签查询数据库
            $map['title'] = array('in', $ArrTagAdd);
            $tagRes = $store_goods_tag->field('id,title')->where($map)->select();
            //如果有返回数据 则说明和系统已有标签重复 重新组装数组
            if ($tagRes) {
                foreach ($tagRes as $key => $value) { //遍历结果
                    if (!in_array($value['id'], $ArrTag)) { //查询结果与用户输入标签是否匹配
                        array_push($ArrTag, $value['id']); //如果匹配 id放入 $arrTag
                        $filterArr[] = $value['title']; //值放入过滤数组
                    }
                }
                $ArrTagAdd = array_diff($ArrTagAdd, $filterArr); //过滤用户输入标签
            }
            foreach ($ArrTag as $key => $value) { //将系统已有标签与商品进行关联
                $data['tid'] = $value;
                $data['gid'] = $res;
                $store_goods_tag_relate->data($data)->add();
            }
            foreach ($ArrTagAdd as $key => $value) { //添加用户自定义标签并进行关联
                $tdata['title'] = $value;
                $tres = $store_goods_tag->data($tdata)->add();
                $data['tid'] = $tres;
                $data['gid'] = $res;
                $store_goods_tag_relate->data($data)->add();
            }
            $this->success('添加成功');
        } else {
            $this->error("添加失败");
        }
    }

    // 资源修改页面
    public function edit()
    {
        //获取操控设备数组
        $control_device = getAll('store_goods_control_device', 'id', 'name');
        //按照path排序获取分类标题和ID
        $rows = getStoreGoodsCate();
        //获取要修改的资源id
        $id = I("get.id");
        // 实例化模型
        $goods = M("store_goods");
        $tags = M("store_goods_tag");
        $tagsRelate = M("store_goods_tag_relate");
        // 获取标签
        $tagss = $tags->select();
        // 分配变量
        $this->assign('tags', $tagss);
        // 获取要修改的资源信息
        $row = $goods->find($id);
        //获取资源商品的tag
        $tids = $tagsRelate->field('tid')->where("gid = $id")->getField('tid', true);
        $map['id'] = array('in', $tids);
        $tagRes = $tags->where($map)->getField('title', true);
        $tagRes = implode(',', $tagRes);
        // 分配变量
        $this->assign('control_device', $control_device);
        $this->assign('tids', $tids);
        $this->assign('tagRes', $tagRes);
        $this->assign('rows', $rows);
        $this->assign('row', $row);
        // var_dump($row);die;
        // 解析模版
        $this->display();
    }

    // 处理资源修改页面
    public function doedit()
    {
        //实例化模型
        $goods = M('store_goods');
        $store_goods_tag = M('store_goods_tag');
        $store_goods_tag_relate = M('store_goods_tag_relate');

        //获取资源信息
        $r = $goods->where("id = {$_POST['id']}")->find();
        //获取资源的图片地址
        $img = $r['img'];
        //当有图标被上传时
        if ($_FILES['img']['error'] != 4) {
            // 上传图标
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize = 3145728;// 设置附件上传大小
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath = './Public/Uploads/'; // 设置附件上传根目录
            $upload->savePath = 'store_goods/'; // 设置附件上传（子）目录
            // 上传文件 
            $info = $upload->upload();
            if (!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            } else {// 上传成功
                $_POST['img'] = $info['img']['savepath'] . $info['img']['savename'];
                @unlink("./Public/Uploads/$img");
            }
        }

        //处理标签
        //获取tag标签值
        $tag = I('post.tag');
        $tagArr = explode(',', $tag);
        //去掉重复字段
        $tagArr = array_unique($tagArr);
        foreach ($tagArr as $key => $value) {
            $v = trim($value); //过滤元素中空格
            if (!empty($v)) {
                $tagsArr[] = $v;//过滤用户误操作产生的空字段
            }
        }
        //设置查询条件
        $map['title'] = array('in', $tagsArr);
        // 查询tag标签在数据库中是否已存在
        $tagRes = $store_goods_tag->where($map)->getField('id,title', true);
        $tids = array_keys($tagRes);
        $tags = array_diff($tagsArr, $tagRes);
        // 将系统没有的tags 插入tag表
        foreach ($tags as $value) {
            $data['title'] = $value; //初始化数据
            $tid = $store_goods_tag->data($data)->add();//插入获取返回id
            array_push($tids, $tid); //将id组装入系统已定义tag id数组
        }
        // 查询关联是否已存在
        //初始化查询数据
        $tmap['tid'] = array('in', $tids);
        $tmap['gid'] = $_POST['id'];
        //查询
        $tagRelateRes = $store_goods_tag_relate->field('tid')->where($tmap)->getField('tid', true);
        // 如果不存在 结果为空数组
        if ($tagRelateRes == null) {
            $tagRelateRes = array();
        }
        //获取和已存在结果的差集
        $tagsRelate = array_diff($tids, $tagRelateRes);
        //将不存在记录 插入关系表
        foreach ($tagsRelate as $value) {
            $rdata['tid'] = $value; //初始化数据
            $rdata['gid'] = $_POST['id'];//初始化数据
            $store_goods_tag_relate->data($rdata)->add(); //插入数据
        }
        //将新值付给文章tags标签
        $_POST['tags'] = implode(',', $tids);

        //修改数据
        $goods->create();
        if ($res = $goods->save()) {

            $this->success('修改成功', U("Store:lists"), 3);
        } else {
            if ($res == 0) {
                $this->error("没有选项被修改");
            }
            $this->error("修改失败");
        }
    }

    // 资源删除出来
    public function dodel()
    {
        //实例化模型
        $stmt = M('store_goods');
        //获取id 
        $id = I('get.id');
        //查询当前资源下是否有回复
        $reply = M('store_goods_reply');
        $rr = $reply->where("sgid = $id")->select();
        if ($rr) $this->error("资源商品下有未删除评论,请先清空");
        $r = $stmt->where("id = $id")->find();
        $img = $r['img'];
        // 删除数据
        if ($stmt->delete($id)) { //删除成功
            $this->success('删除成功');
            @unlink("./Public/Uploads/$img");
        } else { //删除失败
            $this->error('删除失败');
        }
    }

    // 操控设备管理页面
    public function control_device()
    {
        $stmt = M('store_goods_control_device');
        $rows = $stmt->select();
        if (!$rows) {
            $rows = 0;
        }
        $this->assign('rows', $rows);
        $this->display();
    }

    // 添加操控设备管理数据
    public function cd_doadd()
    {
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 3145728;// 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath = './Public/Uploads/'; // 设置附件上传根目录
        $upload->savePath = 'store_goods/'; // 设置附件上传（子）目录
        // 上传文件 
        $info = $upload->upload();
        if (!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        } else {// 上传成功 获取上传文件信息
            $inf = $info['icon']['savepath'] . $info['icon']['savename']; //拼接地址
            $_POST['icon'] = $inf; //将地址写入$_POST数组
        }
        // var_dump($_POST);die;
        //实例化模型 添加数据
        $stmt = M('store_goods_control_device');
        $stmt->create();
        if ($stmt->add()) { //添加成功
            $this->success('添加成功');
        } else { //添加失败
            $this->error('添加失败');
        }
    }

    // 操控设备修改页面
    public function cd_edit()
    {
        //获取ID
        $id = I('get.id');
        //根据id获取信息 分配给前台
        $stmt = M('store_goods_control_device');
        $row = $stmt->where("id=$id")->find();
        $this->assign('row', $row);
        $this->display();
    }

    // 执行设备修改保存
    public function cd_save()
    {
        //实例化模型
        $stmt = M('store_goods_control_device');
        $r = $stmt->where("id = {$_POST['id']}")->find();
        $icon = $r['icon'];
        // var_dump($icon);die;
        //判断有无文件上传
        if ($_FILES['icon']['error'] != 4) {
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize = 3145728;// 设置附件上传大小
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath = './Public/Uploads/'; // 设置附件上传根目录
            $upload->savePath = 'store_goods/'; // 设置附件上传（子）目录
            // 上传文件 
            $info = $upload->upload();
            if (!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            } else {// 上传成功 获取上传文件信息
                $inf = $info['icon']['savepath'] . $info['icon']['savename']; //拼接地址
                $_POST['icon'] = $inf; //将地址写入$_POST数组
                @unlink("./Public/Uploads/$icon");
            }
        }
        // 添加数据
        $stmt->create();
        if ($stmt->save()) { //修改成功
            $this->success('修改成功', U("Store:control_device"), 3);
        } else { //修改失败
            $this->error('修改失败');
        }
    }

    // 操控设备删除处理
    // 删除数据
    public function cd_dodel()
    {
        //实例化模型
        $stmt = M('store_goods_control_device');
        //获取id 
        $id = I('get.id');
        $r = $stmt->where("id = $id")->find();
        $icon = $r['icon'];
        // 删除数据
        if ($stmt->delete($id)) { //删除成功
            $this->success('删除成功');
            @unlink("./Public/Uploads/$icon");
        } else { //删除失败
            $this->error('删除失败');
        }
    }

    //单个分类下资源商品列表
    public function cate_goods_list()
    {
        //获取分类ID
        $cid = I('get.cid');
        // 获取分类id和title的数组
        $cates = getAll("store_goods_cate", 'id', 'title');
        $p = isset($_GET['p']) ? $_GET['p'] : '0';
        $store_goods = M('store_goods'); // 实例化store_goods对象
        // 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
        $rows = $store_goods->page($p . ',5')->where("cid=$cid")->select();
        $count = $store_goods->where("cid=$cid")->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count, 5);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show();// 分页显示输出
        $this->assign('rows', $rows);
        $this->assign('cid', $cid);
        $this->assign('cates', $cates);
        $this->assign('page', $show);// 赋值分页输出
        $this->display(); // 输出模板
    }

    // 清空单个分类下的资源商品
    public function clearCate()
    {
        //实例化模型
        $stmt = M('store_goods');
        //获取id 
        $cid = I('get.cid');
        // 删除数据
        $res = $stmt->where("cid=$cid")->delete();
        if ($res) { //删除成功
            $this->success('清空成功', U('Store:cate_list'), 3);
        } else { //删除失败
            $this->error('删除失败');
        }
    }

    /**
     *  商品回复管理
     */
    // 回复管理页面
    public function reply()
    {
        $id = I("get.id"); //获取评价所属文章id
        $stmt = M("store_goods_reply");// 实例化store_goods_reply对象
        $p = isset($_GET['p']) ? $_GET['p'] : '0'; //获取分页
        // 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
        $rows = $stmt->where("sgid = $id")->page($p . ',10')->select();
        $count = $stmt->where("sgid = $id")->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count, 10);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show();// 分页显示输出
        $this->assign('rows', $rows);
        $this->assign('id', $id);
        $this->assign('page', $show);// 赋值分页输出
        $this->display(); // 输出模板

    }

    // 商品回复修改页面
    public function reply_edit()
    {
        //获取ID
        $id = I('get.id');
        //根据id获取信息 分配给前台
        $stmt = M('store_goods_reply');
        $row = $stmt->where("id=$id")->find();
        $this->assign('row', $row);
        $this->display();
    }

    // 商品回复删除处理
    // 删除数据
    public function reply_dodel()
    {
        //实例化模型
        $stmt = M('store_goods_reply');
        //获取id 
        $id = I('get.id');
        // 删除数据
        if ($stmt->delete($id)) { //删除成功
            $this->success('删除成功');
        } else { //删除失败
            $this->error('删除失败');
        }
    }

    // 商品回复修改保存
    public function reply_save()
    {
        //实例化模型
        $stmt = M('store_goods_reply');
        // 保存数据
        $stmt->create();
        if ($res = $stmt->save()) { //保存成功
            $this->success('保存成功');
        } else { //保存失败
            if ($res == 0) {
                $this->error('没有选项被修改');
            }
            $this->error('保存失败');
        }
    }

    // 清空单个资源下的全部回复
    public function clearReply()
    {
        //实例化模型
        $stmt = M('store_goods_reply');
        //获取id 
        $id = I('get.id');
        // 删除数据
        $res = $stmt->where("sgid=$id")->delete();
        if ($res) { //删除成功
            $this->success('清空成功', U('Store:lists'), 3);
        } else { //删除失败
            if ($res == 0) {
                $this->error('我勒个去~都没数据了 还删 删 删毛啊');
            }
            $this->error('删除失败');
        }
    }

    /**
     * 标签添加页面
     * 以下方法名统一为驼峰命名 //2015-01-26
     */
    //标签添加页
    public function tagAdd()
    {
        // 实例化模型
        $store_goods_tag = M('store_goods_tag');
        // 获取标签
        $tags = $store_goods_tag->select();
        // 分配变量
        $this->assign('tags', $tags);
        // 解析模版
        $this->display();
    }

    // 标签添加处理页
    public function tagDoAdd()
    {
        //实例化模型
        $store_goods_tag = M('store_goods_tag');
        // 初始化提交来的数组
        $store_goods_tag->create();
        // 判断
        $title = trim($_POST['title']);
        if (empty($title)) { //标题为空
            $this->error("Tag标题不能为空");
        }
        $checkTitle = $store_goods_tag->where("title='$title'")->select();
        if ($checkTitle) { //标题重复
            $this->error('标签重复,请重新添加');
        }
        //添加数据
        if ($store_goods_tag->add()) {
            $this->success('添加成功');
        } else {
            $this->error("添加失败");
        }
    }

    // 双击标签修改ajax处理页面
    public function tagAjaxEdit()
    {
        //获取要修改的字段ID
        $id = I('post.id');
        //获取要改为的标题
        $title = $_POST['title'] = trim(I('post.title'));
        //实例化模型     
        $store_goods_tag = M('store_goods_tag');
        //格式化数据
        $store_goods_tag->create();
        //执行修改操作
        $res = $store_goods_tag->save();
        if ($res) { //修改成功 返回0
            echo 0;
        } else { //修改失败 返回1
            echo 1;
        }
    }

    // 标签删除处理
    public function tagDoDel()
    {
        // var_dump($_POST);
        // 实例化模型
        $store_goods_tag = M('store_goods_tag');
        //获取要删除的ID
        $ids = I('post.ids');
        if (empty($ids)) {
            $this->error('请选择要删除的标签');
        }
        // 格式化Id数组
        $ids = implode(',', $ids);
        // 执行删除操作
        $res = $store_goods_tag->delete($ids);
        if ($res) {
            $this->success('删除成功');
        } else {
            $this->error('删除失败');
        }
    }

    // ajax搜索
    public function tagAjaxSearch()
    {
        //获取要查询的字符串
        $str = trim(I('post.str'));
        //实例化模型     
        $store_goods_tag = M('store_goods_tag');
        //查询数据操作
        $res = $store_goods_tag->field('id,title')->where("title like '%$str%'")->select();
        if ($res) { //修改成功 返回0
            echo json_encode($res);
        } else { //修改失败 返回1
            echo 1;
        }
    }
}

?>