<?php
namespace Admin\Model;
use Think\Model\RelationModel;
/**
 * 用户与角色关联模型
 */
class UserRelationModel extends RelationModel {

	protected $tableName = 'member'; //定义主表名称

	//定义关联模型
	public $_link = array(
		'role' =>array(
			'mapping_type' => self::MANY_TO_MANY, // 多对多关系
			'foreign_key' => 'user_id' ,	// 主表id名称
			'relation_foreign_key' => 'role_id', // 副表名称
			'relation_table' => 'walle_role_user', // 关联副表

			)
		);
}

?>