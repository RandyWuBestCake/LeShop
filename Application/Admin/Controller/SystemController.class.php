<?php
/** 
* 兄弟连项目二 乐视商城:网站配置模块
*  
* PHP version 5.4.3
* @author      王丽娟<724243914@qq.com> 
* @version     1.0
* @time          2015-02-08 16:24
*/ 
namespace Admin\Controller;
use Think\Controller;
Class SystemController extends Controller{

    Public function index(){   
        $this->keywords = C('HTTP_KEYWORDS');//关键字
        $this->copy = C('HTTP_COPY');//版权
        $this->description = C('HTTP_DESCRIPTION');//网站描述
        $this->logo = C('HTTP_LOGO');//网站LOGO
        $this->open = C('HTTP_ON');//网站开关
        $this->display(); 
    }
    /**
     * [处理系统配置文件修改]
     */
    Public function ModSysHandle(){
        
        $upload = new \Think\Upload();// 实例化上传类
        $upload->rootPath = "./Public/";//rootPath这个路径必须手动创建
        $upload->savePath = "Logo/";//这一块只能设置一层目录
        $info   =   $upload->upload();
        if($info) {
            // 上传成功 获取上传文件信息
            $image = new \Think\Image(); 
            $image->open('./Public/'.$info['face']['savepath'].$info['face']['savename']);// 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg
            $image->thumb(230, 45)->save('./Public/Logo/Logo.png');
        }
        $post = $_POST;
        $str=file_get_contents('Application/Common/Conf/config.php');//将配置文件中内容读出

        foreach($post as $key=>$val){

            if(in_array($key, array_keys(C()))){//判断键值是否存在于配置文件中
                $zz[]="/'{$key}'\s*.*?,\\n/i";
                $rep[]="'{$key}' => '{$val}',\n";
            }
        }   

         $str=preg_replace($zz,$rep,$str);//在str中匹配  然后替换
        //将修改后的文件重新写入到配置文件中
        if(file_put_contents('Application/Common/Conf/config.php',$str)){
                //$this->success('修改成功',U('System/index'),3);
               $this->success('修改成功');
          }
    }


}