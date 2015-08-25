<?php 

	header('content-type:text/html;charset=utf8');
	
	//定义当前项目的路径
	define('APP_PATH','./Application/');

	//开启调试模式
	define('APP_DEBUG',true);

	//引入thinkphp的入口文件
	require './ThinkPHP/ThinkPHP.php';
	
 ?>