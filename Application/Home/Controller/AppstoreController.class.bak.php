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
    /**
     *资源商品详情页
     */
    public function detail()
    {
        // 获取商品id
        $id = isset($_GET['id']) ? $_GET['id'] : '0';
        //实例化模型
        $store_goods = M("store_goods");
        // 查询商品分类ID(导航菜单使用)
        $goods = $store_goods->field('cid')->find($id);
        $cid = $goods['cid'];
        //获取商城菜单
        $navs = getNav(2);
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
        // var_dump($id);die();
        // $id = 16; //测试用
        //实例化模型查询资源信息
        $store_goods = M("store_goods");
        $store_goods_reply = M("store_goods_reply");
        //获取本商品回复总数
        $reply_num = $store_goods_reply->where("sgid=$id")->count();
        $avgRating = $store_goods_reply->where("sgid = $id")->avg("lever");
        //根据id查询资源信息
        $goods = $store_goods->find($id);
        //组合返回数组
        $data['appId'] = $id; //返回资源ID
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
        $data['acountCount'] = $goods['acount']; //访问数量
        $data['commentTotal'] = $reply_num; //评论数量
        $data['appCategorys'] = array("name" => $goods['cid'], "id" => $goods['cid']); //所属分类
        $data['versionName'] = $goods['version']; //版本号
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
        $rows = $store_goods->limit(5)->select(); //查询5条记录
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
        //添加时间
        $_POST['create_time'] = time();
        //添加用户
        $uid = $_POST['uid'] = 1;
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
        // var_dump($_POST);     

        // echo '{"status":true,"avgRating":5.5,"total":88,"exist":false}';
    }

    /**
     * 分类页面
     */
    // 分类展示页面
    public function cate()
    {
        //获取分类
        $cid = I("get.categoryId");
        $navs = getNav(2);
        var_dump($cid);die();
        // var_dump($navs);
        $this->assign("navs", $navs);
        $this->assign('cid', $cid);
        $this->display();
    }

    //分类页面 ajax app获取处理
    public function cateApp()
    {
        $cid = I('get.categoryId');
        $order = I('get.order');
        // 获取页数
        $p = I('get.page');
        // 获取每页显示个数
        $num = I('get.pageSize');
        // 实例化模型
        $store_goods = M("store_goods");
        $store_goods_reply = M("store_goods_reply");
        $rows = $store_goods->where("cid=$cid")->page($p, $num)->order($order . ' desc')->select(); //查询5条记录
        // echo $store_goods->getLastSql();die;
        $total = $store_goods->where("cid=$cid")->count();
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
        $data['total'] = $total; //总数
        $data['categoryAppList'] = $con; //资源列表信息
        $this->ajaxReturn($data); //返回json数组
    }

    /**
     *    资源商店首页
     */
    // 模版首页
    public function index()
    {
        //获取商城菜单
        $navs = getNav(2);
        //分配变量(首页 cid设置为0)
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
            $row['appId'] = $value['id'];
            $res[] = $row;
        }
        $data['listTVClientVO'] = $res;
        // 返回json数组
        $this->ajaxReturn($data);
    }

    public function homeTags()
    {
        $s = '{"total":70,"operatingAppTagList":[{"tagId":113,"tagName":"海底世界"},{"tagId":112,"tagName":"圣诞快乐"},{"tagId":111,"tagName":"unity 3D游戏"},{"tagId":110,"tagName":"双十一购物节"},{"tagId":109,"tagName":"万圣节狂欢"},{"tagId":108,"tagName":"手柄大作"},{"tagId":107,"tagName":"快乐十一"},{"tagId":106,"tagName":"联众游戏"},{"tagId":105,"tagName":"热血男儿"},{"tagId":104,"tagName":"捕鱼达人全系列"},{"tagId":103,"tagName":"动游专区"},{"tagId":101,"tagName":"7月休闲游戏"},{"tagId":98,"tagName":"父亲节"},{"tagId":95,"tagName":"六一大礼包"},{"tagId":91,"tagName":"开心一笑"},{"tagId":90,"tagName":"唯动游戏精品"},{"tagId":88,"tagName":"同桌的你"},{"tagId":86,"tagName":"妈妈我爱你"},{"tagId":85,"tagName":"迎接夏天"},{"tagId":84,"tagName":"舌尖上的中国"},{"tagId":83,"tagName":"欢乐五一应用汇"},{"tagId":79,"tagName":"微博上市"},{"tagId":78,"tagName":"归来"},{"tagId":77,"tagName":"里约大冒险"},{"tagId":76,"tagName":"最权威 - 爱游戏大厅"},{"tagId":75,"tagName":"清明...有鬼"},{"tagId":74,"tagName":"春季游戏精品"},{"tagId":73,"tagName":"人生第一次"},{"tagId":72,"tagName":"欢乐315"},{"tagId":70,"tagName":"最强大脑"},{"tagId":69,"tagName":"半边天"},{"tagId":67,"tagName":"来自星星的应用"},{"tagId":66,"tagName":"不哭...战胜毒霾!"},{"tagId":64,"tagName":"温馨情人节"},{"tagId":63,"tagName":"春节大拜年"},{"tagId":62,"tagName":"橙视圈生活应用大全"},{"tagId":61,"tagName":"春运"},{"tagId":58,"tagName":"跨年最热应用"},{"tagId":56,"tagName":"年度游戏排行榜"},{"tagId":55,"tagName":"年度应用排行榜"},{"tagId":53,"tagName":"12月游戏大作"},{"tagId":52,"tagName":"购物助手"},{"tagId":51,"tagName":"宠物游戏"},{"tagId":49,"tagName":"铁皮人儿童故事集合"},{"tagId":48,"tagName":"惊悚！！！"},{"tagId":47,"tagName":"边锋棋牌"},{"tagId":46,"tagName":"麻将合集"},{"tagId":45,"tagName":"聪明宝贝"},{"tagId":44,"tagName":"Com2us游戏必备"},{"tagId":43,"tagName":"百度大全"},{"tagId":42,"tagName":"腾讯精选合辑"},{"tagId":38,"tagName":"女生最爱"},{"tagId":37,"tagName":"别人都在玩点啥"},{"tagId":36,"tagName":"一顶“三”"},{"tagId":32,"tagName":"发财之“到”"},{"tagId":28,"tagName":"童教必备"},{"tagId":27,"tagName":"文艺"},{"tagId":25,"tagName":"挑战高智商"},{"tagId":23,"tagName":"家居常备"},{"tagId":21,"tagName":"视觉上的射击"},{"tagId":20,"tagName":"舌尖上的必备"},{"tagId":19,"tagName":"斗地主"},{"tagId":15,"tagName":"青春pai"},{"tagId":14,"tagName":"“恋恋”看"},{"tagId":13,"tagName":"“巨”会玩"},{"tagId":9,"tagName":"职场好榜样"},{"tagId":6,"tagName":"赛车总动员"},{"tagId":5,"tagName":"休闲\"逸致\""},{"tagId":4,"tagName":"360度体感"},{"tagId":3,"tagName":"一起PK"}]}';
        echo $s;
    }

    public function homeNewReco()
    {
        $s = '{"total":25,"recommendList":[{"appId":114781,"name":"狂奔弗雷德","size":"90.00MB","apk":"http://g3.letv.cn/112/53/2/tvstore/0/file-center/app/2014/11/28/com.unitygames.runningfred-10-1417139538823.apk?tag=iptv&b=1800","icon":"http://i1.letvimg.com/iptv/201411/28/9843b0be-32bc-47a6-bf51-4def508cba30.png","avgRating":7.4,"deviceName":["游戏手柄"],"deviceDetail":[{"key":"hand-shank","name":"游戏手柄"}],"description":"Running Fred 狂奔的弗雷德是一款类似于Temple Run的3D跑酷类游戏，在游戏中，你需要操控Fred越过障碍，勇往直前，与Temple Run不同的，也是Fred游戏系列的最大亮点，就是血腥，Running Fred继承了前作Falling Fred相同的血腥元素，定能给你的跑酷游戏更添一份色彩。\r\n","downloadCount":30229,"createTime":"2014-11-28 09:47:37","packageName":"com.unitygames.runningfred","pic":"http://i0.letvimg.com/iptv/201412/16/e82167c0-ff2f-42e1-b440-5c70bf514887.jpg","superScriptInfo":{"name":null,"imgUrl":null},"recommend":"","appCategory":null},{"appId":114775,"name":"真实滑雪","size":"136.00MB","apk":"http://g3.letv.cn/121/36/32/tvstore/0/file-center/app/2014/11/26/com.unitygames.freeride-20-1416991378197.apk?tag=iptv&b=1800","icon":"http://i3.letvimg.com/iptv/201411/26/9b1275f8-9241-4afa-8e58-87f8c82f9d95.png","avgRating":8.7,"deviceName":["游戏手柄"],"deviceDetail":[{"key":"hand-shank","name":"游戏手柄"}],"description":"《真实滑雪》是一款画面十分优质的体育竞技类游戏，充分还原了花样滑雪比赛的场景体验，给玩家一种身临其境的感受，具体操作方式和高分获得的都有一定的技巧，。通过选择搭配适合自己的 滑雪装备，精进自己滑雪动作的触发时机，才能让自己不断的刷新自己成绩，乃至世界纪录。","downloadCount":14476,"createTime":"2014-11-26 16:36:29","packageName":"com.unitygames.freeride","pic":"http://i3.letvimg.com/iptv/201412/16/4fe852ad-71b4-4fd1-9695-51220744f3ed.jpg","superScriptInfo":{"name":null,"imgUrl":null},"recommend":"","appCategory":null},{"appId":112714,"name":"开心酷跑","size":"32.00MB","apk":"http://g3.letv.cn/76/17/2/tvstore/0/file-center/app/2014/07/29/com.trans.runcool-2-1406624753746.apk?tag=iptv&b=1800","icon":"http://i3.letvimg.com/iptv/201407/29/0376f109-331b-4e78-8612-2375f6ada93d.png","avgRating":7.3,"deviceName":["标配遥控器","空鼠遥控器","九键遥控器"],"deviceDetail":[{"key":"nine-keys","name":"九键遥控器"},{"key":"standard","name":"标配遥控器"},{"key":"mouse","name":"空鼠遥控器"}],"description":"《开心酷跑》是由品牌动漫开心宝贝授权的一款跑酷游戏，并与大电影2《启源星之战》同期上线。 游戏在经典跑酷游戏的玩法上进行创新，增加了大量的道具和设计精巧的关卡，让玩家越玩越爽快。集满能量槽后还能进行boss战，挑战动漫中登场的各种boss！ 伽罗复活,邪恶超人来袭,机车侠变身等特色元素悉数登场，超人们的世界由你来改变！","downloadCount":51152,"createTime":"2014-07-29 17:02:37","packageName":"com.trans.runcool","pic":"http://i1.letvimg.com/iptv/201407/29/e1f21ab9-03b3-4b3a-a9ba-19d8f7785f61.jpg","superScriptInfo":{"name":null,"imgUrl":null},"recommend":"","appCategory":null},{"appId":112972,"name":"愤怒的小鸟之星球大战2","size":"49.00MB","apk":"http://g3.letv.cn/45/46/24/tvstore/0/file-center/app/2014/08/07/com.rovio.angrybirdsstarwarsii.ads-1600-1407402959644.apk?tag=iptv&b=1800","icon":"http://i1.letvimg.com/iptv/201408/07/b80e308c-2be4-456c-af8d-3ee2507ecffe.png","avgRating":7.0,"deviceName":["空鼠遥控器"],"deviceDetail":[{"key":"mouse","name":"空鼠遥控器"}],"description":"《愤怒的小鸟：星球大战》是结合移动平台最热门游戏《愤怒的小鸟》和拥有极大影响力的影片《星球大战》为一体的最新系列作品。","downloadCount":82448,"createTime":"2014-08-07 17:12:30","packageName":"com.rovio.angrybirdsstarwarsii.ads","pic":"http://i0.letvimg.com/iptv/201408/07/ec7ec2cf-f2b7-4c8d-baf7-66bd2c7399c1.png","superScriptInfo":{"name":null,"imgUrl":null},"recommend":"","appCategory":null},{"appId":114059,"name":"博雅德州扑克","size":"10.00MB","apk":"http://g3.letv.cn/84/38/21/tvstore/0/file-center/app/2014/09/18/com.boyaa.simpletexascn.tv-11-1411028437416.apk?tag=iptv&b=1800","icon":"http://i2.letvimg.com/iptv/201409/18/22c6939b-be8b-4f6b-b1c9-80cb59ed2b84.png","avgRating":10.0,"deviceName":["标配遥控器","空鼠遥控器"],"deviceDetail":[{"key":"standard","name":"标配遥控器"},{"key":"mouse","name":"空鼠遥控器"}],"description":"博雅德州扑克，简单易上手，绝对奢华大气，紧张刺激，乃精英白领休闲必备：真实百万用户在线，让你PK爽到爆；简单快捷无需注册，下载即玩，技巧傍身即秒高富帅；完全免费，天天金币送不停，更有话费与实物奖励等你来拿；丰富玩法，社交竞技两不误，根本停不下来！","downloadCount":13011,"createTime":"2014-09-18 16:13:01","packageName":"com.boyaa.simpletexascn.tv","pic":"http://i1.letvimg.com/iptv/201409/18/6963d30f-55d8-4f8b-bc8e-93427616c423.jpg","superScriptInfo":{"name":null,"imgUrl":null},"recommend":"","appCategory":null},{"appId":114344,"name":"苏宁易购","size":"6.00MB","apk":"http://g3.letv.cn/84/11/60/tvstore/0/file-center/app/2014/09/29/com.suning.tv.ebuy-11-1411982736141.apk?tag=iptv&b=1800","icon":"http://i2.letvimg.com/iptv/201409/29/1471029c-1da0-4a15-b352-c5bd1c5ea04f.jpg","avgRating":2.0,"deviceName":["标配遥控器","空鼠遥控器"],"deviceDetail":[{"key":"standard","name":"标配遥控器"},{"key":"mouse","name":"空鼠遥控器"}],"description":"苏宁易购Android-TV是苏宁自主开发的一款安卓电视专用应用软件，可为用户提供基于苏宁易购主站的搜索、浏览、购买、支付等一站式购物体验，以及促销活动、虚拟商品、收藏夹、订单中心、物流追踪等特色服务。","downloadCount":5679,"createTime":"2014-09-29 17:23:32","packageName":"com.suning.tv.ebuy","pic":"http://i2.letvimg.com/iptv/201409/29/c417a88a-0471-4342-a224-b12373378043.png","superScriptInfo":{"name":null,"imgUrl":null},"recommend":"","appCategory":null},{"appId":111142,"name":"保卫萝卜2","size":"44.00MB","apk":"http://g3.letv.cn/46/4/102/tvstore/0/file-center/app/2014/02/18/com.carrot.iceworld-99-1392705638362.apk?tag=iptv&b=1800","icon":"http://i2.letvimg.com/iptv/201405/13/a0b761e1-454e-4e55-9bf1-2ebab2e78ac6.png","avgRating":8.0,"deviceName":["空鼠遥控器"],"deviceDetail":[{"key":"mouse","name":"空鼠遥控器"}],"description":"长居App Store亚洲各市场榜首的大热休闲策略游戏，官方移植，万众期待的保卫萝卜终于登上安卓舞台！！《保卫萝卜》（CarrotFantasy）是一款策略塔防游戏，纵穿天际、丛林、沙漠等多个冒险主题场景，加之挑战级的BOSS模式，通过建造防御塔来保卫一个可爱的萝卜。 ","downloadCount":151720,"createTime":"2014-02-18 14:36:18","packageName":"com.carrot.iceworld","pic":"http://i2.letvimg.com/iptv/201402/18/a98b1dd3-5aa1-41b6-a0ee-0bbf65787332.png","superScriptInfo":{"name":null,"imgUrl":null},"recommend":"超萌塔防神作","appCategory":null},{"appId":111286,"name":"宫爆老奶奶","size":"28.00MB","apk":"http://g3.letv.cn/47/47/15/tvstore/0/file-center/app/2014/03/04/com.bluefir.GrannySeason.HuanTV-10030-1393930836541.apk?tag=iptv&b=1800","icon":"http://i3.letvimg.com/iptv/201405/13/d951e49a-02ed-4532-a520-5f1b821c01fd.png","avgRating":7.7,"deviceName":["空鼠遥控器"],"deviceDetail":[{"key":"mouse","name":"空鼠遥控器"}],"description":"拿起你手中的遥控器移动屏幕中的老奶奶，拾取技能发动攻击！使用超过20种惊世骇俗的招数尽情凌辱可怜的死神，宣泄压力，幸福游戏！更有爽快的连招系统，诙谐的画面和刺激的音乐，击杀潮水般的死神，拾取滚滚而来的金币，hi到高潮！最大缺点，玩过就沉迷，外星人也不例外！请大家注意保护颈椎别耽误相亲大事！","downloadCount":49113,"createTime":"2014-03-04 18:56:12","packageName":"com.bluefir.GrannySeason.HuanTV","pic":"http://i3.letvimg.com/iptv/201403/04/a7460a75-d487-44a0-af62-80de05922cfb.jpg","superScriptInfo":{"name":null,"imgUrl":null},"recommend":"最潮老奶奶大虐死神","appCategory":null},{"appId":111285,"name":"欢乐赢三张","size":"6.00MB","apk":"http://g3.letv.cn/47/23/59/tvstore/0/file-center/app/2014/03/04/com.bohaoo.zhajinhua-142-1393922134384.apk?tag=iptv&b=1800","icon":"http://i2.letvimg.com/iptv/201403/04/cd214a78-79ba-4127-8d7b-b285eda51ef1.png","avgRating":6.9,"deviceName":[],"deviceDetail":[],"description":"顺子，金华，同花顺！美女和大亨对决，超强节奏，竞技体验！\r\n投注，加注，孤注一掷！不斗地主不打麻将，就是要“赢三张”！游戏画面精美，节奏快，一键登录，玩法简单，娱乐性强。民间高手和江湖侠客，考验智慧和胆识的机会来临。拼心理！拼智力！拼勇气！30秒决出胜负，1分钟成为王者！","downloadCount":9251,"createTime":"2014-03-04 16:30:39","packageName":"com.bohaoo.zhajinhua","pic":"http://i1.letvimg.com/iptv/201403/04/c337779c-9378-4df1-b9d3-ba00209d475e.png","superScriptInfo":{"name":null,"imgUrl":null},"recommend":"爽快版德州扑克","appCategory":null},{"appId":111034,"name":"大智慧","size":"3.00MB","apk":"http://g3.letv.cn/50/18/58/tvstore/file-center/app/2014/01/16/com.android.dazhihui-12-1389839136498.apk?tag=iptv&b=1800","icon":"http://i1.letvimg.com/iptv/201401/16/4474c57f-ae75-4dcf-b3a0-c63f30d0ae82.png","avgRating":5.2,"deviceName":["空鼠遥控器"],"deviceDetail":[{"key":"mouse","name":"空鼠遥控器"}],"description":"大智慧电视版软件全新优化升级！提供一站式炒股服务，除股票信息外，提供基金、债券、港股、全球指数等全市场行情；海量独家资讯、行业数据、机构研报、股票实时动态播报等；创新提出收费功能“免费”看，免费揭示主力动态、大资金进出。大智慧炒股软件凭借强大的炒股功能、流畅的操作体验、优质的客户服务成为行业翘楚！","downloadCount":13622,"createTime":"2014-01-16 09:31:14","packageName":"com.android.dazhihui","pic":"http://i1.letvimg.com/iptv/201401/16/7f4c13b0-a383-4fdf-8aa5-d00eeb14a421.png","superScriptInfo":{"name":null,"imgUrl":null},"recommend":"最权威炒股软件ＴＶ版","appCategory":null},{"appId":111121,"name":"仙魔奇侠OL","size":"18.00MB","apk":"http://g3.letv.cn/47/52/30/tvstore/0/file-center/app/2014/02/14/com.imodjoy7-86-1392355237733.apk?tag=iptv&b=1800","icon":"http://i2.letvimg.com/iptv/201402/14/d565b095-bbe0-482f-a86a-fdf0975760f7.png","avgRating":5.4,"deviceName":["空鼠遥控器"],"deviceDetail":[{"key":"mouse","name":"空鼠遥控器"}],"description":"《仙魔奇侠OL》是一款仙侠类MMORPG网游，目前逾500万的用户注册，万人同时在线！Android版仙魔奇侠：专为Android系统定制的系统UI，精致的横版视角，丰富的宠物和骑宠系统，丰富的成长体系，多样的战斗和社交系统…… 亲，赶快下载吧！让你体验便捷交友，结伴训宠，争夺仙境，抢占圣境，激战跨服的别样精彩！...\n特点：\n1.[画面超炫]世界中场景类型多变,景观唯美绚丽,多达上百张的游戏场景.\n2.[组队超爽]金木水火土5种职业的搭配,30多种队伍组合,50多种门派技能和上百种宠物技能的战术选择,组队PK超级爽.\n3.[互动性强]庞大便捷的即时聊天互动,方便迅速的对战系统使玩家随时体验到友情互助和紧张刺激.\n亲,赶快下载吧!让你体验便捷交友,结伴训宠,争夺仙境,抢占圣境,激战跨服的别样精彩!\n","downloadCount":5832,"createTime":"2014-02-14 13:14:53","packageName":"com.imodjoy7","pic":"http://i0.letvimg.com/iptv/201402/14/1c9af974-0f2b-4600-b2aa-4809896a421c.jpg","superScriptInfo":{"name":null,"imgUrl":null},"recommend":null,"appCategory":null},{"appId":110731,"name":"3D花园箱子","size":"8.00MB","apk":"http://g3.letv.cn/47/37/97/tvstore/file-center/app/2013/12/17/com.qiangfeng.kivano.sokobangarden-16-1387261235422.apk?tag=iptv&b=1800","icon":"http://i0.letvimg.com/iptv/201312/17/925585ef-2e78-4d27-98c9-bd8b109223e0.png","avgRating":7.7,"deviceName":["空鼠遥控器"],"deviceDetail":[{"key":"mouse","name":"空鼠遥控器"}],"description":"《花园推箱子3D（Sokoban Garden 3D）》是一款精美的3D版经典推箱子游戏，和我们可爱的七星瓢虫一起，将箱子推到指定的目的地。","downloadCount":6740,"createTime":"2013-12-17 14:17:55","packageName":"com.qiangfeng.kivano.sokobangarden","pic":"http://i0.letvimg.com/iptv/201312/17/1486b1b9-0927-44c2-a27d-6f6f68449395.jpg","superScriptInfo":{"name":null,"imgUrl":null},"recommend":null,"appCategory":null}]}';
        // echo $s;
        $p = I('get.page'); //获取页面id
        $size = I('get.pageSize'); //获取页面显示个数
        $new = M("store_goods");
        $rating = M('store_goods_reply');
        $rows = $new->page($p, $size)->order('dcount desc')->select();
        // $rows = list_sort_by($row,'dcount','desc');
        foreach ($rows as $key => $value) {
            // var_dump($value);
            preg_match('/.*src="(.*)".*/isU', $value['desc_img'], $desc_img);
            // var_dump($desc_img[1]);
            $row['pic'] = $desc_img[1];
            $id = $row['appId'] = $value['id'];
            $row['name'] = $value['title'];
            $row['apk'] = $value['down_url'];
            $row['description'] = $value['desc'];
            $row['downloadCount'] = $value['dcount'];
            $row['icon'] = $value['img'];
            $avgRating = $rating->where("sgid = $id")->avg("lever");
            $row['avgRating'] = $avgRating;
            $data[] = $row;
        }
        $datas['total'] = 30;
        $datas['recommendList'] = $data;
        $this->ajaxReturn($datas);
    }

    // 热门专题
    public function hotSubject()
    {
        $s = '{"total":25,"subjectList":[{"id":680,"name":"欢度十一","picUrl":"http://i0.letvimg.com/iptv/201409/30/ce0d0ce1-70f2-4742-a2f3-99622c8166df.jpg","description":"2014的十一长假马上就要来了！你是准备外出旅游玩“人山”和“人海”呢，还是呆在家中和超级电视一起宅呢？","appCount":25},{"id":598,"name":"letvstore带你一起观看世界杯","picUrl":"http://i2.letvimg.com/iptv/201406/16/ad326803-1a91-423e-8d81-13a308532ded.jpg","description":"在这个激情的夏季，Letvstore带你一起观看世界杯，拥有完全赛事录播；每日比赛的精彩集锦，让你了解赛况欣赏精彩进球。","appCount":9},{"id":570,"name":"卡拉OK","picUrl":"http://i1.letvimg.com/iptv/201406/06/c882d6f5-b9a8-4f84-8d92-90f8353bf207.jpg","description":"宁静舒缓、悠扬婉转、慷慨激昂，荡气回肠，卡拉OK给您花样繁多的听觉盛宴，新颖别致的音乐感受。与朋友欢聚一堂，随时随地变身K歌达人，与土豪一起唱歌。","appCount":7},{"id":549,"name":"6.1儿童节特别献礼","picUrl":"http://i0.letvimg.com/iptv/201405/29/e6a581c1-f5fa-476e-8ae3-13557398df88.jpg","description":"六一精彩应用装点幸福家庭","appCount":15}]}';
        echo $s;
    }

    // 分类app
    public function categoryApp()
    {
        $s = '{"total":160,"categoryAppList":[{"appId":115672,"name":"爱说不的调皮鬼","packageName":"com.tinmanarts.ISayNoTV","size":"40.00MB","apk":"http://g3.letv.cn/106/35/39/tvstore/0/file-center/app/2015/01/19/com.tinmanarts.ISayNoTV-8-1421658041428.apk?tag=iptv&b=1800","icon":"http://i1.letvimg.com/iptv/201501/19/384664bd-d12c-4923-9a9c-fe07f9918afe.png","avgRating":0.0,"deviceName":["标配遥控器"],"deviceDetail":[{"key":"standard","name":"标配遥控器"}],"description":"每次大声说“不”的时候,叫叫都觉得自己很神气。如果有一天,妈妈也开始说“不”了,那会怎样呢……","downloadCount":3612,"createTime":"2015-01-19 16:55:01","superScriptInfo":{"name":null,"imgUrl":null}},{"appId":115670,"name":"悠乐彩","packageName":"com.uusee.tv.lotteryticket","size":"4.00MB","apk":"http://g3.letv.cn/125/47/48/tvstore/0/file-center/app/2015/01/19/com.uusee.tv.lotteryticket-200-1421640971871.apk?tag=iptv&b=1800","icon":"http://i3.letvimg.com/iptv/201501/19/01414eab-eb96-486b-8ebb-84298722ab77.png","avgRating":0.0,"deviceName":["标配遥控器"],"deviceDetail":[{"key":"standard","name":"标配遥控器"}],"description":"2.0.0版本更新\n1.全新UI设计\n2.新增11选5高频彩\n3.新增微信支付、提现\n4.新增二维码登录、注册、找回密码\n","downloadCount":9185,"createTime":"2015-01-19 12:05:58","superScriptInfo":{"name":null,"imgUrl":null}},{"appId":115639,"name":"时光相册","packageName":"happydays.tianxun.com.happydays","size":"11.00MB","apk":"http://g3.letv.cn/120/52/35/tvstore/0/file-center/app/2015/01/14/happydays.tianxun.com.happydays-1-1421226036551.apk?tag=iptv&b=1800","icon":"http://i0.letvimg.com/iptv/201501/14/bde916f5-47a3-4dad-b1e8-b7f896cde94e.png","avgRating":10.0,"deviceName":["标配遥控器"],"deviceDetail":[{"key":"standard","name":"标配遥控器"}],"description":"  时光相册，一个可以保存你时光记忆的相册。 借助二维码将手机助手，微信，电视三端绑定，在手机端就可以轻轻松松向电视端上传，管理，分享你的的美图。让你的亲人和爱你的人随时了解你的近况，分享爱，尽在欢乐时光相册。","downloadCount":6289,"createTime":"2015-01-14 16:59:11","superScriptInfo":{"name":null,"imgUrl":null}},{"appId":115603,"name":"月亮的亲吻","packageName":"com.tinmanarts.CRmoonskissTV","size":"42.00MB","apk":"http://g3.letv.cn/124/44/62/tvstore/0/file-center/app/2015/01/08/com.tinmanarts.CRmoonskissTV-8-1420709177192.apk?tag=iptv&b=1800","icon":"http://i3.letvimg.com/iptv/201501/08/10ed4bb6-f688-4366-bf90-a28d16134712.png","avgRating":0.0,"deviceName":["标配遥控器","空鼠遥控器"],"deviceDetail":[{"key":"mouse","name":"空鼠遥控器"},{"key":"standard","name":"标配遥控器"}],"description":"我很喜欢月亮,因为有月亮的夜晚我就不会怕黑了。我决定去找到月亮,并给它一个亲吻。可是,月亮那么高,我能够给它一个吻吗……","downloadCount":5121,"createTime":"2015-01-08 17:20:44","superScriptInfo":{"name":null,"imgUrl":null}},{"appId":115602,"name":"我的妈妈是颗蛋","packageName":"com.tinmanarts.CRmymummyisaneggTV","size":"51.00MB","apk":"http://g3.letv.cn/109/15/2/tvstore/0/file-center/app/2015/01/08/com.tinmanarts.CRmymummyisaneggTV-8-1420706741016.apk?tag=iptv&b=1800","icon":"http://i2.letvimg.com/iptv/201501/08/ad9b1c96-76ef-466a-8a3b-8868452b8cc6.png","avgRating":0.0,"deviceName":["标配遥控器","空鼠遥控器"],"deviceDetail":[{"key":"mouse","name":"空鼠遥控器"},{"key":"standard","name":"标配遥控器"}],"description":"人家都说,我的妈妈是颗蛋。我决定离家出走,我要找到我的亲生妈妈。我的亲生妈妈会是谁呢?鸭子?老鹰?大雁……不过,我还是很想现在的妈妈,非常非常想。\n","downloadCount":1176,"createTime":"2015-01-08 16:44:10","superScriptInfo":{"name":null,"imgUrl":null}}],"subjectAppList":[{"appId":115672,"name":"爱说不的调皮鬼","packageName":"com.tinmanarts.ISayNoTV","size":"40.00MB","apk":"http://g3.letv.cn/106/35/39/tvstore/0/file-center/app/2015/01/19/com.tinmanarts.ISayNoTV-8-1421658041428.apk?tag=iptv&b=1800","icon":"http://i1.letvimg.com/iptv/201501/19/384664bd-d12c-4923-9a9c-fe07f9918afe.png","avgRating":0.0,"deviceName":["标配遥控器"],"deviceDetail":[{"key":"standard","name":"标配遥控器"}],"description":"每次大声说“不”的时候,叫叫都觉得自己很神气。如果有一天,妈妈也开始说“不”了,那会怎样呢……","downloadCount":3612,"createTime":"2015-01-19 16:55:01","superScriptInfo":{"name":null,"imgUrl":null}},{"appId":115670,"name":"悠乐彩","packageName":"com.uusee.tv.lotteryticket","size":"4.00MB","apk":"http://g3.letv.cn/125/47/48/tvstore/0/file-center/app/2015/01/19/com.uusee.tv.lotteryticket-200-1421640971871.apk?tag=iptv&b=1800","icon":"http://i3.letvimg.com/iptv/201501/19/01414eab-eb96-486b-8ebb-84298722ab77.png","avgRating":0.0,"deviceName":["标配遥控器"],"deviceDetail":[{"key":"standard","name":"标配遥控器"}],"description":"2.0.0版本更新\n1.全新UI设计\n2.新增11选5高频彩\n3.新增微信支付、提现\n4.新增二维码登录、注册、找回密码\n","downloadCount":9185,"createTime":"2015-01-19 12:05:58","superScriptInfo":{"name":null,"imgUrl":null}},{"appId":115639,"name":"时光相册","packageName":"happydays.tianxun.com.happydays","size":"11.00MB","apk":"http://g3.letv.cn/120/52/35/tvstore/0/file-center/app/2015/01/14/happydays.tianxun.com.happydays-1-1421226036551.apk?tag=iptv&b=1800","icon":"http://i0.letvimg.com/iptv/201501/14/bde916f5-47a3-4dad-b1e8-b7f896cde94e.png","avgRating":10.0,"deviceName":["标配遥控器"],"deviceDetail":[{"key":"standard","name":"标配遥控器"}],"description":"  时光相册，一个可以保存你时光记忆的相册。 借助二维码将手机助手，微信，电视三端绑定，在手机端就可以轻轻松松向电视端上传，管理，分享你的的美图。让你的亲人和爱你的人随时了解你的近况，分享爱，尽在欢乐时光相册。","downloadCount":6289,"createTime":"2015-01-14 16:59:11","superScriptInfo":{"name":null,"imgUrl":null}},{"appId":115603,"name":"月亮的亲吻","packageName":"com.tinmanarts.CRmoonskissTV","size":"42.00MB","apk":"http://g3.letv.cn/124/44/62/tvstore/0/file-center/app/2015/01/08/com.tinmanarts.CRmoonskissTV-8-1420709177192.apk?tag=iptv&b=1800","icon":"http://i3.letvimg.com/iptv/201501/08/10ed4bb6-f688-4366-bf90-a28d16134712.png","avgRating":0.0,"deviceName":["标配遥控器","空鼠遥控器"],"deviceDetail":[{"key":"mouse","name":"空鼠遥控器"},{"key":"standard","name":"标配遥控器"}],"description":"我很喜欢月亮,因为有月亮的夜晚我就不会怕黑了。我决定去找到月亮,并给它一个亲吻。可是,月亮那么高,我能够给它一个吻吗……","downloadCount":5121,"createTime":"2015-01-08 17:20:44","superScriptInfo":{"name":null,"imgUrl":null}},{"appId":115602,"name":"我的妈妈是颗蛋","packageName":"com.tinmanarts.CRmymummyisaneggTV","size":"51.00MB","apk":"http://g3.letv.cn/109/15/2/tvstore/0/file-center/app/2015/01/08/com.tinmanarts.CRmymummyisaneggTV-8-1420706741016.apk?tag=iptv&b=1800","icon":"http://i2.letvimg.com/iptv/201501/08/ad9b1c96-76ef-466a-8a3b-8868452b8cc6.png","avgRating":0.0,"deviceName":["标配遥控器","空鼠遥控器"],"deviceDetail":[{"key":"mouse","name":"空鼠遥控器"},{"key":"standard","name":"标配遥控器"}],"description":"人家都说,我的妈妈是颗蛋。我决定离家出走,我要找到我的亲生妈妈。我的亲生妈妈会是谁呢?鸭子?老鹰?大雁……不过,我还是很想现在的妈妈,非常非常想。\n","downloadCount":1176,"createTime":"2015-01-08 16:44:10","superScriptInfo":{"name":null,"imgUrl":null}}]}';
        echo $s;
    }
}