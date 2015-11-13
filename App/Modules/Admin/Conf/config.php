<?php
//后台配置文件
return array(
	//超级管理员
	'RBAC_SUPERADMIN' => 'admin',
	'ADMIN_AUTH_KEY' => 'superadmin',	//超级管理员识别

	'USER_AUTH_ON' => true,				//开启验证
	'USER_AUTH_TPPE' => 1,				//验证类型(1:登录验证 2:实时验证)
	'USER_AUTH_KEY' => 'uid',			//用户认证识别号
	'NOT_AUTH_MODULE' => 'Index',			//无需认证的控制器
	'NOT_AUTH_ACTION' => 'addUserhandle,addNodehandle,addRolehandle',			//无需认证的方法
	'RBAC_ROLE_TABLE' => 'role',	 	//角色表名称
	'RBAC_USER_TABLE' => 'role_user',	//角色与用户的中间表
	'BRAC_ACCESS_TABLE' => 'access',	//权限表名称
	'BRAC_NODE_TABLE' => 'node',		//节点表名称
	
	'TMPL_PARSE_STRING' => array(
		'__PUBLIC__' => __ROOT__ . '/' . APP_NAME . '/Modules/'.GROUP_NAME.'/Tpl/Public',
	),
	'URL_HTML_SUFFIX' => '',
	//'SHOW_PAGE_TRACE' => true
);


?>