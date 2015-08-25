<?php
return array(
	//'配置项'=>'配置值'
	// //数据库的相关配置
	// 'DB_TYPE'   => 'pdo', // 数据库类型
	// 'DB_USER'   => 'root', // 用户名
	// 'DB_PWD'    => '', // 密码
	// 'DB_PREFIX' => '', // 数据库表前缀 
	// 'DB_DSN'    => 'mysql:host=localhost;dbname=shopLetv;charset=UTF8',

	//数据库配置信息
	'DB_TYPE'   => 'mysql', // 数据库类型
	'DB_HOST'   => 'localhost', // 服务器地址
	'DB_NAME'   => 'shopletv', // 数据库名
	'DB_USER'   => 'root', // 用户名
	'DB_PWD'    => '', // 密码
	'DB_PORT'   => 3306, // 端口
	'DB_PREFIX' => '', // 数据库表前缀 
	'DB_CHARSET'=> 'utf8', // 字符集


	// 显示页面Trace信息
	'SHOW_PAGE_TRACE' =>true, 
            'DEFAULT_FILTER' =>  '', // 默认参数过滤方法 用于I函数...
    
            //网站配置
            'webTitle' => '乐商', //网站标题
            'nav'=>array( //菜单
                                                0=>'顶部左侧主菜单',
            			1=>'顶部右侧主菜单',
            			2=>'底部菜单',
            			3=>'Store菜单',
            		),
            'sild'=>array( //轮播
            			0=>'商城轮播',
            			1=>'Store轮播',
            			3=>'首页下滑广告',
            	),
            /**
		     * 网站独立配置
		     */
        'HTTP_KEYWORDS' => 'LAMP,PHP,PHP95,项目二,雄赳赳小组,仿乐视商城,乐商网',
        'HTTP_COPY' => '版权所有.雄赳赳小组 LAMP兄弟连的第二个项目,欢迎大家交流.',
        'HTTP_DESCRIPTION' => '欢迎使用乐商,这是雄赳赳小组在 LAMP兄弟连的第二个项目,欢迎大家交流.',
        'HTTP_LOGO' => '/object/Public/Logo/Logo.png',
		);