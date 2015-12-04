<?php
return array(

	/* set super admin */
	'SUPERADMIN' => 'admin' ,
	'ADMIN_PWD' =>'a654753115',

	/* 加密常量 */
	'WALLE' => 'mengxian',


	'URL_HTML_SUFFIX' => '', //去掉伪静态后缀名

	'LANG' => 'zh_cn',

	'SYSTEM_VERSION' => 'WallE_V1.0',
	
	
	/* RBAC 配置 */
	'RBAC_SUPERADMIN' => 'admin' , //超级管理员名称
	'ADMIN_AUTH_KEY' => 'superadmin' , //超级管理员识别
	'USER_AUTH_ON' => true , //是否开启验证
	'USER_AUTH_TYPE' => 1 , //( 1 登陆验证 ， 2 实时验证)
	'USER_AUTH_KEY' => 'uid' , //用户认证识别号
	'NOT_AUTH_CONTROLLER' => 'Index,Tour,Function,Billtype' , // 无需验证的控制器
	'NOT_AUTH_ACTION' =>'' , // 无需验证的方法
	'RBAC_ROLE_TABLE' => 'walle_role', //角色表名称
	'RBAC_USER_TABLE' => 'walle_role_user', //角色与用户的中间表
	'RBAC_ACCESS_TABLE' => 'walle_access', //权限表名称
	'RBAC_NODE_TABLE' => 'walle_node' , // 节点表名称

);