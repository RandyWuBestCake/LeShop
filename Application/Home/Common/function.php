<?php 
// 根据传入表名 获取表中 id 和name 字段 并按照 $arr[id] = name 的格式组成新数组返回
// 用于 获取 分类数组 方便调用
function getAll($tbname,$id,$name){
    // 实例化模型
    $stmt = M($tbname);
    // 根据传入参数查询数据获得数组
    $row = $stmt->field("$id,$name")->select();
    // 遍历重组数组
    foreach ($row as $key => $value) {
        $res[$value["id"]]=$value[$name];
    }
    // 返回分类ID 和 分类名称构成的新数组
    return $res;
}

//根据菜单id 获取菜单
function getNav($id){
    $nav = M('nav'); //实例化模型
    $rows = $nav->field('title,url')->where("pid=0 and position=$id")->order("id")->select(); //查询菜单
     // foreach ($rows as $key => $value) { //遍历菜单算出分类ID (为了兼容其他人暂时这样解决,比如:输入菜单地址?categoryId=8,理想方案 添加菜单时 只输入分类ID即可) 
     //        preg_match("/.*categoryId=(\d+).*/isU",$value['url'],$cids);
     //        $rows[$key]['cid'] = $cids[1];
     //    }
    return $rows;
}

    //检测验证码
    function check_verify($code, $id = ''){    
        $verify = new \Think\Verify();    
        return $verify->check($code, $id);
    }


    //地区        
    function getAddress($addressid){
        //实例化模型
        $areasid=M('areasid');
        $diqu=$areasid->where("areaid='$addressid'")->find();
       
        return $diqu['diqu'];
    }

 ?>
