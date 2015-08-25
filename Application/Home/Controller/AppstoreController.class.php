<?php
/**
 * 兄弟连项目二 乐视商城:前台资源商品 详情页面 资源商店首页
 *
 * PHP version 5.4.3
 * @author      跳梁者<zlutao@qq.com>
 * @version     1.0
 * @time          2015-01-20 17:20
 */
namespace Home\Controller;

use Think\Controller;

class AppstoreController extends Controller
{
    //判断是否登录
    public function isLogin()
    {
        session_start();
        $id = $_SESSION['users']['id'];
        $username = $_SESSION['users']['username'];
        if (!$id) {
            return false;
        } else {
            $data['status'] = 1;
            $data['bean']['ssouid'] = $id;
            $data['bean']['username'] = $username;
            $this->ajaxReturn($data);
        }
    }

    /**
     *******************************************************************
     * 资源商品详情页面
     ********************************************************************
     */
    public function detail()
    {
        // var_dump($_SESSION);
        // 获取商品id
        $id = isset($_GET['id']) ? $_GET['id'] : '0';
        //实例化模型
        $store_goods = M("store_goods");
        // 查询商品分类ID(导航菜单使用)
        $goods = $store_goods->field('cid')->find($id);
        $cid = $goods['cid'];
        //获取商城菜单
        $navs = getNav(3);
        //分配变量
        $this->assign("navs", $navs);
        $this->assign('cid', $cid);
        $this->assign("id", $id);
        //显示模版
        $this->display();
    }

    //处理 资源详情的ajax 请求
    public function get_detail()
    {
        // 获取资源商品id
        $id = I('get.id');
        //实例化模型查询资源信息
        $store_goods = M("store_goods");
        $store_goods_reply = M("store_goods_reply");
        $store_goods_cate = M("store_goods_cate");
        $store_goods_tag = M("store_goods_tag");
        $store_goods_tag_relate = M("store_goods_tag_relate");
        //获取本商品回复总数
        $reply_num = $store_goods_reply->where("sgid=$id")->count();
        // 获取商品回复评价等级
        $avgRating = $store_goods_reply->where("sgid = $id")->avg("lever");
        //根据id查询资源信息
        $goods = $store_goods->find($id);
        //获取商品分类名
        $cid = $goods['cid'];
        $cate = $store_goods_cate->where("id=$cid")->getField('title');
        // 获取商品tag标签
        $tids = $store_goods_tag_relate->where("gid=$id")->getField('tid', true);
        $tags = $store_goods_tag->where(array('id' => array('in', $tids)))->getField('id,title', true);
        if ($tags) {
            foreach ($tags as $key => $value) {
                $row['name'] = $value;
                $row['id'] = $key;
                $rows[] = $row;
            }
            $data['tagList'] = $rows;
        } else {
            $data['tagList'] = [];
        }
        //组合返回数组
        $d['id'] = $data['appId'] = $id; //返回资源ID
        $data['size'] = $goods['size'];//返回资源大小
        $data['icon'] = $goods['img'];//返回资源图标
        $data['name'] = $goods['title'];//返回资源名称
        preg_match_all('/.*src="(.*)".*/isU', $goods['desc_img'], $imgs);//匹配数据库中的描述图片
        $data['images'] = $imgs[1]; //图片地址(绝对路径 )
        $data['description'] = $goods['desc']; //简介
        $data['downloadCount'] = $goods['dcount'];//下载数量
        $data['avgRating'] = $avgRating;//当前评论平均值
        $data['downloadUrl'] = $goods['down_url'];//下载连接
        $data['deviceName'] = $goods['author']; //操控设备
        $data['deviceDetail'] = $goods['author']; //操控设备详情
        $data['developerName'] = $goods['author']; //开发者名称
        $d['acount'] = $data['acountCount'] = $goods['acount'] + 1; //访问数量+1
        $store_goods->data($d)->save();// 更新数据库中的访问数量
        $data['commentTotal'] = $reply_num; //评论数量
        $data['appCategorys'] = array("name" => $cate, "id" => $goods['cid']); //所属分类
        $data['versionName'] = $goods['version']; //版本号
        $data['createTime'] = date("Y-m-d", $goods['create_time']); //创建时间
        $data['androidVersions'] = $goods['fix_os']; //适合平台
        $this->ajaxReturn($data); //返回资源的json数据
    }

    //处理评论的ajax 请求
    public function get_comment()
    {
        // 获取资源商品id
        $id = I('get.id');
        // $id = 16; //测试用
        $p = isset($_GET['p']) ? $_GET['p'] : '0';

        //实例化模型
        $store_goods_reply = M("store_goods_reply");
        //获取本商品回复总数
        $rows = $store_goods_reply->where("sgid=$id")->page($p, 5)->select();
        if (!$rows) {
            $data['total'] = 0;
            $data['appCommentList'] = ''; //组合要返回的数据
            $this->ajaxReturn($data);
        }
        // var_dump($rows);
        $reply_num = $store_goods_reply->where("sgid=$id")->count();
        $data['total'] = $reply_num;
        //实例化模型
        $user = M('user');
        // 返回用户名
        foreach ($rows as $key => $value) {
            // 根据用户id获取用户名称
            $id = $value['uid'];
            $username = $user->field('username')->where("id=$id")->find();
            // $con_arr = $con[];
            $con_arr['userName'] = $username['username']; //用户名
            $con_arr['content'] = $value['con']; //评论内容
            $con_arr['rating'] = $value['lever']; //评价星级
            $con_arr['createTime'] = date('Y-m-d H:i:s', $value['create_time']); //评价时间
            $con[] = $con_arr; //组合list
        }
        $data['appCommentList'] = $con; //组合要返回的数据
        $this->ajaxReturn($data); //返回json数据
    }

    //处理相关APP的ajax请求
    public function get_relativeApp()
    {

        // 实例化模型
        $store_goods = M("store_goods");
        $store_goods_reply = M("store_goods_reply");
        //获取商品id
        $gid = I('get.id');
        //获取分类ID
        $cid = $store_goods->where("id=$gid")->getField('cid');
        //判断并初始化 查询条件
        if (!$cid) { //如果不存在 为空
            $c = '';
        } else { //如果存在按cid 查询
            $c = 'cid=' . $cid;
        }
        $rows = $store_goods->where($c)->limit(5)->select(); //查询5条记录
        foreach ($rows as $key => $value) { //循环记录组成list
            $list['appId'] = $value['id']; //资源id
            $list['name'] = $value['title']; //资源标题
            $list['size'] = $value['size']; //资源大小
            $list['icon'] = $value['img']; //资源图标
            $id = $value['id']; //获取ID
            $row = $store_goods_reply->field("AVG(lever) as level")->where("sgid=$id")->select(); //根据ID获取评论平均值
            $list['avgRating'] = $row[0]['level']; //资源评论平均值
            $list['downloadCount'] = $value['dcount']; //资源下载数
            // var_dump($value);
            $con[] = $list; //合成数组
        }
        $data['total'] = 5; //总数
        $data['recommendList'] = $con; //资源列表信息
        $this->ajaxReturn($data); //返回json数组
    }

    // 处理最新APP的ajax请求
    public function get_newApp()
    {
        // 实例化模型
        $store_goods = M("store_goods");
        $store_goods_reply = M("store_goods_reply");
        $rows = $store_goods->limit(5, 5)->select(); //查询5条记录
        foreach ($rows as $key => $value) { //循环记录组成list
            $list['appId'] = $value['id']; //资源id
            $list['name'] = $value['title']; //资源标题
            $list['size'] = $value['size']; //资源大小
            $list['icon'] = $value['img']; //资源图标
            $id = $value['id']; //获取ID
            $row = $store_goods_reply->field("AVG(lever) as level")->where("sgid=$id")->select(); //根据ID获取评论平均值
            $list['avgRating'] = $row[0]['level']; //资源评论平均值
            $list['downloadCount'] = $value['dcount']; //资源下载数
            // var_dump($value);
            $con[] = $list; //合成数组
        }
        $data['total'] = 5; //总数
        $data['newestAppList'] = $con; //资源列表信息
        $this->ajaxReturn($data); //返回json数组
    }

    public function add_comment()
    {
        //获取session中用户ID
        $uid = $_SESSION['users']['id'];
        //添加时间
        $_POST['create_time'] = time();
        //添加用户
        $_POST['uid'] = $uid;
        if ($uid == null) {
            return false;
        }
        //获取资源商品id
        $sgid = $_POST['sgid'];
        // 实例化模型
        $comment = M("store_goods_reply");
        // 判断用户是否已经评论
        $num = $comment->where("sgid=$sgid and uid=$uid")->select();
        $data['exist'] = false;
        $data['status'] = false;
        if ($num) {
            $data['exist'] = true;
        } else {
            //插入数据
            $comment->create();
            if ($comment->add()) {
                $data['status'] = true;
            }
        }
        $this->ajaxReturn($data);
    }

    /**
     *******************************************************************
     * 资源商品分类页面
     ********************************************************************
     */

    // 分类展示页面
    public function cate()
    {
        //获取分类
        $cid = isset($_GET['categoryId']) ? $_GET['categoryId'] : -1;
        //获取tagId
        $tid = isset($_GET['tagId']) ? $_GET['tagId'] : '';
        //获取导航菜单
        $navs = getNav(3);
        // 判断如果是分类
        if ($cid != -1) {
            // 实例化模型
            $cate = M('store_goods_cate');
            // 获取分类名称
            $cateName = $cate->where("id=$cid")->getField('title');
        }
        //分配变量
        $this->assign("cateName", $cateName);
        $this->assign("navs", $navs);
        $this->assign('cid', $cid);
        $this->assign('tid', $tid);
        //载入模版
        $this->display();
    }

    //分类页面 ajax app获取处理
    public function cateApp()
    {
        // 实例化模型
        $tags = M('store_goods_tag');
        $tagsRalate = M('store_goods_tag_relate');
        // 判断请求类型 分类 || tag 设置相关查询&&返回条件
        if (isset($_GET['categoryId'])) {
            $ref = "cid = " . $_GET['categoryId'];
            $name = 'categoryAppList';
        } else if (isset($_GET['tagId'])) {
            $tid = $_GET['tagId'];
            $ids = $tagsRalate->where("tid = $tid")->getField('gid', true);
            $ref['id'] = array('in', $ids);
            $name = 'operatingAppList';
        } else if (isset($_GET['query'])) {
            $ref = "title like '%" . $_GET['query'] . "%'";
            $name = 'searchResults';
        }
        //获取排序方式
        if (isset($_GET['order'])) {
            $order = $_GET['order'] . ' desc';
        } else {
            $order = '';
        }
        // 获取页数
        $p = I('get.page');
        // 获取每页显示个数
        $num = I('get.pageSize');
        // 实例化模型
        $store_goods = M("store_goods");
        $store_goods_reply = M("store_goods_reply");
        $rows = $store_goods->where($ref)->page($p, $num)->order($order)->select(); //查询5条记录
        // echo $store_goods->getLastSql();die;
        $total = $store_goods->where($ref)->count();
        foreach ($rows as $key => $value) { //循环记录组成list
            $list['appId'] = $value['id']; //资源id
            $list['name'] = $value['title']; //资源标题
            $list['size'] = $value['size']; //资源大小
            $list['icon'] = $value['img']; //资源图标
            $id = $value['id']; //获取ID
            $row = $store_goods_reply->field("AVG(lever) as level")->where("sgid=$id")->select(); //根据ID获取评论平均值
            $list['avgRating'] = $row[0]['level']; //资源评论平均值
            $list['downloadCount'] = $value['dcount']; //资源下载数
            // var_dump($value);
            $con[] = $list; //合成数组
        }
        if ($total != 0) {
            $data['total'] = $total; //总数
            $data[$name] = $con; //资源列表信息
        } else {
            $data['total'] = 1; //总数
            $data[$name] = []; //资源列表信息
        }

        $this->ajaxReturn($data); //返回json数组
    }

    /**
     *******************************************************************
     * Store 首页
     ********************************************************************
     */
    // 模版首页
    public function index()
    {
        //获取商城菜单
        $navs = getNav(3);
        //实例化模型
        $other = M('other');
        // 获取首页要显示的分类设置
        $cates = $other->where("title = 'storeIndexCate'")->getField('con');
        // var_dump($cates);
        //分配变量(首页 cid设置为0)
        $catesArr = json_decode($cates, true);
        $this->assign('cates', $cates);
        $this->assign('catesArr', $catesArr);
        $this->assign('cid', 0);
        $this->assign("navs", $navs);
        //显示模版
        $this->display();
    }

    // 首页轮播模块
    public function homeSild()
    {
        $p = I('get.page'); //获取页面id
        $size = I('get.pageSize'); //获取页面显示个数
        $sild = M("home_sild"); //实例化模型
        $rows = $sild->where("position=1 and display=1")->page($p, $size)->select(); //按条件查询数据
        $num = count($rows); //获取查询到的数据个数
        $data['count'] = $num; //组装返回的json数组
        foreach ($rows as $key => $value) { //遍历获取到的数据
            //组装返回的json数组
            $row['imageUrl'] = $value['img'];
            $row['imageTitle'] = $value['title'];
            $row['url'] = $value['url'];
            $row['appId'] = $value['id'];
            $res[] = $row;
        }
        $data['listTVClientVO'] = $res;
        // 返回json数组
        $this->ajaxReturn($data);
    }

    // 首页标签模块
    public function homeTags()
    {
        // 实例化模型
        $tags = M('store_goods_tag');
        //查询数据
        $rows = $tags->select();
        //获得数量
        $total = count($rows);
        foreach ($rows as $key => $value) { //循环数据 组成数组
            $row['tagId'] = $value['id'];
            $row['tagName'] = $value['title'];
            $row['desc'] = $value['desc'];
            $data[] = $row;
        }
        $datas['total'] = $total;
        $datas['operatingAppTagList'] = $data;
        // 返回json数组
        $this->ajaxReturn($datas);
    }

    public function homeNewReco()
    {
        $p = I('get.page'); //获取页面id
        $size = I('get.pageSize'); //获取页面显示个数
        $new = M("store_goods");//实例化商品模型
        $rating = M('store_goods_reply');//实例化商品回复模型
        $rows = $new->page($p, $size)->order('dcount desc')->select();//按下载数量查询商品信息
        foreach ($rows as $key => $value) { //遍历信息组合返回json信息
            //匹配描述图片 获取第一张图片作为展示图片
            preg_match('/.*src="(.*)".*/isU', $value['desc_img'], $desc_img);
            $row['pic'] = $desc_img[1];
            // 获取商品ID
            $id = $row['appId'] = $value['id'];
            // 商品标题
            $row['name'] = $value['title'];
            // 商品下载地址
            $row['apk'] = $value['down_url'];
            // 商品描述信息
            $row['description'] = $value['desc'];
            // 商品下载数量
            $row['downloadCount'] = $value['dcount'];
            // 商品ICON图标
            $row['icon'] = $value['img'];
            // 商品回复评价分值
            $avgRating = $rating->where("sgid = $id")->avg("lever");
            $row['avgRating'] = $avgRating;
            $data[] = $row;
        }
        //显示商品数量
        $datas['total'] = 30;
        // 推荐列表整合数组
        $datas['recommendList'] = $data;
        // 返回json信息
        $this->ajaxReturn($datas);
    }

    public function newestAppList()
    {
        $p = I('get.page'); //获取页面id
        $size = I('get.pageSize'); //获取页面显示个数
        $new = M("store_goods");//实例化商品模型
        $rating = M('store_goods_reply');//实例化商品回复模型
        $rows = $new->page($p, $size)->order('create_time desc')->select();//按创建时间查询商品信息
        foreach ($rows as $key => $value) { //遍历信息组合返回json信息
            //匹配描述图片 获取第一张图片作为展示图片
            preg_match('/.*src="(.*)".*/isU', $value['desc_img'], $desc_img);
            $row['pic'] = $desc_img[1];
            // 获取商品ID
            $id = $row['appId'] = $value['id'];
            // 商品标题
            $row['name'] = $value['title'];
            // 商品下载地址
            $row['apk'] = $value['down_url'];
            // 商品描述信息
            $row['description'] = $value['desc'];
            // 商品下载数量
            $row['downloadCount'] = $value['dcount'];
            // 商品ICON图标
            $row['icon'] = $value['img'];
            // 商品回复评价分值
            $avgRating = $rating->where("sgid = $id")->avg("lever");
            $row['avgRating'] = $avgRating;
            $data[] = $row;
        }
        //显示商品数量
        $datas['total'] = 30;
        // 推荐列表整合数组
        $datas['newestAppList'] = $data;
        // 返回json信息
        $this->ajaxReturn($datas);
    }

    // 热门专题
    public function hotSubject()
    {
        // 实例化模型
        $store_goods_activity = M('store_goods_activity');
        $store_goods_activity_relate = M('store_goods_activity_relate');
        $rows = $store_goods_activity->order('create_time desc')->select();
        $total = count($rows);
        foreach ($rows as $key => $value) {
            $aid = $row['id'] = $value['id'];
            $row['name'] = $value['title'];
            $row['picUrl'] = $value['img'];
            $row['description'] = $value['desc'];
            $row['appCount'] = $store_goods_activity_relate->where("aid = $aid")->count();
            $data[] = $row;
        }
        $datas['total'] = $total;
        $datas['subjectList'] = $data;
        // var_dump($datas);
        $this->ajaxReturn($datas);
    }

    // 分类app
    public function categoryApp()
    {
        $cid = I('get.cid');//获取分类ID
        $num = isset($_GET['pageSize']) ? I('get.pageSize') : 5;//获取app个数 默认5个
        $new = M("store_goods");//实例化商品模型
        $rating = M('store_goods_reply');//实例化商品回复模型
        $rows = $new->where("cid = $cid")->limit($num)->select();//获取5条当前分类商品信息
        $num = count($rows);
        foreach ($rows as $key => $value) { //遍历信息组合返回json信息
            //匹配描述图片 获取第一张图片作为展示图片
            preg_match('/.*src="(.*)".*/isU', $value['desc_img'], $desc_img);
            $row['pic'] = $desc_img[1];
            // 获取商品ID
            $id = $row['appId'] = $value['id'];
            // 商品标题
            $row['name'] = $value['title'];
            // 商品下载地址
            $row['apk'] = $value['down_url'];
            // 商品描述信息
            $row['description'] = $value['desc'];
            // 商品下载数量
            $row['downloadCount'] = $value['dcount'];
            // 商品ICON图标
            $row['icon'] = $value['img'];
            // 商品回复评价分值
            $avgRating = $rating->where("sgid = $id")->avg("lever");
            $row['avgRating'] = $avgRating;
            $data[] = $row;
        }
        //显示商品数量
        $datas['total'] = $num;
        // 分类APP列表整合数组
        $datas['categoryAppList'] = $data;
        // 返回json信息
        $this->ajaxReturn($datas);
    }

    /**
     *******************************************************************
     * 活动详情页面
     ********************************************************************
     */

    //活动详情页
    public function actDetail()
    {
        // 分配菜单
        $navs = getNav(3);
        $this->assign('cid', -1); //分配cid 取消菜单的选中状态
        $this->assign('navs', $navs);
        // 解析模版
        $this->display();
    }

    // 活动详情的ajax请求页面
    public function ajaxActDetail()
    {
        // 获取活动ID
        $aid = I('get.subjectID');
        // 创建模型
        $store_goods_activity = M('store_goods_activity');
        // 查询数据
        $row = $store_goods_activity->where("id=$aid")->find();
        // 组合要返回的数据
        $data['name'] = $row['title'];
        $data['description'] = $row['desc'];
        $data['picture'] = $row['img'];
        $data['updateTime'] = date('Y-m-d', $row['create_time']);
        // 返回json数组
        $this->ajaxReturn($data);
    }

    // 活动中商品列表的ajax请求页面
    public function ajaxActApp()
    {
        // 获取活动id
        $aid = I('get.subjectID');
        // 获取页数
        $p = I('get.page');
        // 获取每页显示个数
        $num = I('get.pageSize');
        // 实例化模型
        $store_goods = M("store_goods");
        $store_goods_reply = M("store_goods_reply");
        $store_goods_activity_relate = M("store_goods_activity_relate");
        //查询活动下的商品id
        $ids = $store_goods_activity_relate->where("aid = $aid")->getField('gid', true);
        // 格式化查询条件
        $map['id'] = array('in', $ids);
        $rows = $store_goods->where($map)->page($p, $num)->select(); //查询活动下的商品信息
        // echo $store_goods->getLastSql();die;
        $total = $store_goods->where($map)->count(); //获取活动下商品总数
        foreach ($rows as $key => $value) { //循环记录组成list
            $list['appId'] = $value['id']; //资源id
            $list['name'] = $value['title']; //资源标题
            $list['size'] = $value['size']; //资源大小
            $list['icon'] = $value['img']; //资源图标
            $id = $value['id']; //获取ID
            $row = $store_goods_reply->field("AVG(lever) as level")->where("sgid=$id")->select(); //根据ID获取评论平均值
            $list['avgRating'] = $row[0]['level']; //资源评论平均值
            $list['downloadCount'] = $value['dcount']; //资源下载数
            // var_dump($value);
            $con[] = $list; //合成数组
        }
        if ($total != 0) {
            $data['total'] = $total; //总数
            $data['subjectAppList'] = $con; //资源列表信息
        } else {
            $data['total'] = 1; //总数
            $data['subjectAppList'] = []; //资源列表信息
        }
        $this->ajaxReturn($data); //返回json数组
    }

    /**
     *******************************************************************
     * 活动列表页面
     ********************************************************************
     */
    //活动列表页
    public function actList()
    {
        // 分配菜单
        $navs = getNav(3);
        $this->assign('cid', -1); //分配cid 取消菜单的选中状态
        $this->assign('navs', $navs);
        // 解析模版
        $this->display();
    }
}