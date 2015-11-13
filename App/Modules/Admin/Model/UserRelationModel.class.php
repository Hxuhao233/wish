<?php

Class UserRelationModel extends RelationModel{
	
	//定义主表名称
	Protected $tableName = 'user';
	
	//定义关联关系
	Protected $_link = array(
		'role' => array(
			'mapping_type' => MANY_TO_MANY,		//多对多
			'foreign_key' => 'user_id',			//主表外键
			'relation_key' => 'role_id',		//副表外键
			'relation_table' => 'role_user'	,	//中间表
			'mapping_fields' => 'id, name, remark'
		)
	
	);
}

?>