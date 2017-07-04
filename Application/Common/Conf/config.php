<?php
return array(
'DB_TYPE'   => 'mysql', // 数据库类型
'DB_HOST'   => 'localhost', // 数据库连接地址
'DB_NAME'   => 'yogadatas', // 数据库名
'DB_USER'   => 'root', // 数据库用户名
'DB_PWD'    => '123456', // 数据库密码
'DB_PORT'   => 3306, // 数据库端口
'DB_PREFIX' => 'mr_', // 数据库前缀
'DB_CHARSET'=> 'utf8', // 数据库编码
'DB_DEBUG'  =>  TRUE, // 是否开启调试模式
'URL_CASE_INSENSITIVE'  =>  true,
'URL_MODEL'=>2,
'DB_LIKE_FIELDS'=>'news_title|news_content|news_flag|news_open',//自动模糊查询字段


		'URL_ROUTER_ON'   => true,
		'URL_ROUTE_RULES'=>array(
				'con/:n_id'=> 'Home/Index/news_content',//路由文章页
				'list/:c_id'=> 'Home/Index/news_list',//路由列表页
		),

/*
 * 关闭缓存
 */
'DB_FIELD_CACHE'=>true,
'HTML_CACHE_ON'=>true,
    'HTML_CACHE_TIME'   =>    60*60*24*10,   // 全局静态缓存有效期（秒）

		'SESSION_OPTIONS'         =>  array(
        'name'                =>  'BJYSESSION',                    //设置session名
        'expire'              =>  3600*24*15,                      //SESSION保存15天
        'use_trans_sid'       =>  1,                               //跨页传递
        'use_only_cookies'    =>  0,                               //是否只开启基于cookies的session的会话方式
    ),
);
