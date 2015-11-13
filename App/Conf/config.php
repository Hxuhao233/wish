<?php
return array(
	//'配置项'=>'配置值'
	
	//开启分组
	'APP_GROUP_LIST' => 'Index,Admin',
	'DEFAULT_GROUP' => 'Index, addUserHandle',
	'APP_GROUP_MODE' => 1,	//独立分组
	'APP_GROUP_PATH' => 'Modules',
	
	//数据库连接参数
	'DB_HOST' => '127.0.0.1',
	'DB_USER' => 'root',
	'DB_PWD' => '',
	'DB_NAME' => 'hd_think',
	'DB_PREFIX' => '',
	
	//点语法解析
	'TMPL_VAR_IDENTIFY' => 'array',
	
	'TMPL_FILE_DEPR' => '_', //简化目录 控制器_函数
	
	//默认过滤函数
	'DEFAULT_FILTER' => 'htmlspecialchars',
	
	//自定义SESSION 数据库存储
	'SESSION_TYPE' => 'db',
);
?>