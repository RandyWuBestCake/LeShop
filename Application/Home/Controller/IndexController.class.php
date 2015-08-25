<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
        //首页轮播图模型
        $stmt = M('home_sild');
        //查询出轮播图片
        $stmts = $stmt->where('position = 0')->select();
        $this->assign('stmts', $stmts);

        //友情链接模型
        $frind_link = M('frind_link');
        // 查询可显示的友情链接
        $links = $frind_link->where('display=1')->select();
        //分配变量
        $this->assign('links', $links);

        //首页公告模型
        $announcement = M('announcement');
        //查询前6条公告
        $announcements = $announcement->limit(6)->select();
        //分配变量
        $this->assign('announcements', $announcements);

        //首页下滑广告
        $adv=$stmt->where('position = 3')->order('id desc')->limit(1)->find();
        //分配变量
        $this->assign('adv',$adv);

        //左侧问一问 看一看 链接
        $art = M('article');
        $arts=$art->where("cid=6")->order('id desc')->limit(4)->select();
        $arts1=$art->where("cid != 6")->order('id desc')->limit(8)->select();
        //分配变量
        $this->assign('arts',$arts);
        $this->assign('arts1',$arts1);
        //Tv板块
        $tv=$art->where("cid=6")->order('id desc')->limit(8)->select();
        $this->assign('tv',$tv);

        $this->display();
    }

    // 首页轮播数据
    public function sildJson()
    {
        //实例化模型
        $sild = M('home_sild');
        //获取商城首页轮播图
        $rows = $sild->where('display=1 and position=0')->limit(6)->select();
        //遍历组装数组
        foreach ($rows as $k => $v) {
            $row['AD_BG'] = $v['img'];
            $row['AD_SOURCE_URL'] = $v['url'];
            $row['AD_SCHEDULE_NAME'] = $v['title'];
            $data[] = $row;
        }
        $datas['maxnum'] = count($rows);
        $datas['status'] = 1;
        $datas['message'] = 'ad success';
        $datas['result'] = $data;
        //返回json信息
        $this->ajaxReturn($datas);
    }
}