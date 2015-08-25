<?php
//声明变量调节器来对数字id进行处理
function getLevel($id)
{
    $level = M('level');
    $levelInfo = $level->where("id=$id")->find();
    return $levelInfo['level'];
}

//导航菜单
function getNavName($pid)
{
    if ($pid == 0) {
        return '顶级菜单';
    }
    $nav = M('nav');
    $navInfo = $nav->where("id=$pid")->find();

    return $navInfo['title'];
}

//声明变量调节器来对pid进行处理,用在Cate/index.html
function getCateName($pid)
{
    //判断如果pid=0,默认为顶级分类
    if ($pid == 0) {
        return '顶级分类';
    } else {
        //从数据库查询具体分类名称
        $cate = M('goods_cate');
        $cateInfo = $cate->where("id=$pid")->find();
        return $cateInfo['name'];
    }
}

//根据用户id获取用户名称
function getUser($id)
{
    //实例化模型
    $user = M('user');
    // 如果ID=0直接返回空
    if ($id == 0) return '';
    // 根据用户id获取用户名称
    $username = $user->field('username')->where("id=$id")->find();
    // 返回用户名
    return $username['username'];
}

// 获取资源商品无限极分类标签
function getStoreGoodsCate($pid)
{
    //查询商品分类
    $cate = M("store_goods_cate");
    $rows = $cate->field('id,title,concat(path,"-",id) as paths')->order('paths')->select();
    //遍历格式化分类标题 按照|--|-- 连接
    foreach ($rows as $key => $value) {
        $count = count(explode("-", $value['paths'])) - 1;
        $rows[$key]['title'] = str_repeat('|---', $count) . $value['title'];
    }
    // 返回分类信息
    return $rows;
}

// 根据传入表名 获取表中 id 和name 字段 并按照 $arr[id] = name 的格式组成新数组返回
// 用于 获取 分类数组 方便调用
function getAll($tbname, $id, $name)
{
    // 实例化模型
    $stmt = M($tbname);
    // 根据传入参数查询数据获得数组
    $row = $stmt->field("$id,$name")->select();
    // 遍历重组数组
    foreach ($row as $key => $value) {
        $res[$value["id"]] = $value[$name];
    }
    // 返回分类ID 和 分类名称构成的新数组
    return $res;
}

function getGoodsCate($id)
{
    //查询商品分类
    // var_dump($id);
    $cate = M("goods_cate");
    $cates = $cate->field('id,name')->where('id=' . $id)->select();
    $name = '';
    foreach ($cates as $key => $value) {
        // $count = count(explode("-",$value['paths']))-1;
        // $cates[$key]['name'] = str_repeat('|---',$count).$value['title'];
        $name = $value['name'];
        // echo $name;
    }
    return $name;
    // var_dump($name);
}

//获取发货城市
function sendArea($cate)
{
    //定义函数获取
    $province_arr = array('安徽', '北京', '重庆', '福建', '甘肃', '广东', '广西', '贵州', '海南', '河北', '黑龙江', '河南', '香港', '湖北', '湖南', '江苏', '江西', '吉林', '辽宁', '澳门', '内蒙古', '宁夏', '青海', '山东', '上海', '山西', '陕西', '四川', '台湾', '天津', '新疆', '西藏', '云南', '浙江', '海外');
    return $province_arr[$cate];
}

/**
 * 获取不重复的随机字符
 * @param int $no_of_codes //定义一个int类型的参数 用来确定生成多少个优惠码
 * @param array $exclude_codes_array //定义一个exclude_codes_array类型的数组
 * @param int $code_length //定义一个code_length的参数来确定优惠码的长度
 * @return array//返回数
 */
function generate_promotion_code($no_of_codes, $exclude_codes_array = '', $code_length = 4)
{
    $characters = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $promotion_codes = array();//这个数组用来接收生成的优惠码
    for ($j = 0; $j < $no_of_codes; $j++) {
        $code = "";
        for ($i = 0; $i < $code_length; $i++) {
            $code .= $characters[mt_rand(0, strlen($characters) - 1)];
        }
        //如果生成的4位随机数不再我们定义的$promotion_codes函数里面
        if (!in_array($code, $promotion_codes)) {
            if (is_array($exclude_codes_array))//
            {
                if (!in_array($code, $exclude_codes_array))//排除已经使用的优惠码
                {
                    $promotion_codes[$j] = $code; //将生成的新优惠码赋值给promotion_codes数组
                } else {
                    $j--;
                }
            } else {
                $promotion_codes[$j] = $code;//将优惠码赋值给数组
            }
        } else {
            $j--;
        }
    }
    return $promotion_codes;
}


?>