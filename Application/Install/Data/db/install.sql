/* This file is created by MySQLReback 2014-10-05 00:41:04 */
 /* 创建表结构 `walle_access`  */
 DROP TABLE IF EXISTS `walle_access`;/* MySQLReback Separation */ CREATE TABLE `walle_access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `node_id` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) NOT NULL,
  `module` varchar(50) DEFAULT NULL,
  KEY `groupId` (`role_id`),
  KEY `nodeId` (`node_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `walle_action_log`  */
 DROP TABLE IF EXISTS `walle_action_log`;/* MySQLReback Separation */ CREATE TABLE `walle_action_log` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `action` varchar(30) NOT NULL,
  `create_time` int(11) NOT NULL,
  `ip` varchar(25) NOT NULL,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 INSERT INTO `walle_action_log` VALUES ('74','35','用户登录！','1410916533','127.0.0.1','login'),('75','35','用户登录！','1410917622','127.0.0.1','login'),('76','35','用户登录！','1410917628','127.0.0.1','login'),('77','35','用户登录！','1411053999','127.0.0.1','login'),('78','35','用户登录！','1411264454','127.0.0.1','login'),('79','35','用户登录！','1411302176','127.0.0.1','login'),('80','35','用户登录！','1411366672','127.0.0.1','login'),('81','30','用户登录！','1411400189','127.0.0.1','login'),('82','35','用户登录！','1411632542','127.0.0.1','login'),('83','35','用户登录！','1411820100','127.0.0.1','login'),('84','35','用户登录！','1412040622','127.0.0.1','login'),('85','35','用户登录！','1412122277','127.0.0.1','login'),('86','35','用户登录！','1412153726','127.0.0.1','login'),('87','30','用户登录！','1412153977','127.0.0.1','login'),('88','35','用户登录！','1412154028','127.0.0.1','login'),('89','35','用户登录！','1412259890','127.0.0.1','login'),('90','35','用户登录！','1412321858','127.0.0.1','login'),('91','30','用户登录！','1412336756','127.0.0.1','login'),('92','30','用户登录！','1412337037','127.0.0.1','login');/* MySQLReback Separation */
 /* 创建表结构 `walle_admin`  */
 DROP TABLE IF EXISTS `walle_admin`;/* MySQLReback Separation */ CREATE TABLE `walle_admin` (
  `uid` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `email` varchar(32) NOT NULL,
  `title` varchar(40) NOT NULL,
  `password` varchar(32) NOT NULL,
  `reg_time` int(10) NOT NULL,
  `reg_ip` varchar(20) NOT NULL,
  `last_login_time` int(11) NOT NULL,
  `status` int(3) NOT NULL,
  `role_id` int(3) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 INSERT INTO `walle_admin` VALUES ('9','admin','654753115@qq.com',null,'8cc5246161037643e0372d5f9f1f9884','1409447411','127.0.0.1','1410428633','1','2'),('10','walle','a654753115@qq.com',null,'8cc5246161037643e0372d5f9f1f9884','1409447435','127.0.0.1','1410428374','1','2');/* MySQLReback Separation */
 /* 创建表结构 `walle_bill_data`  */
 DROP TABLE IF EXISTS `walle_bill_data`;/* MySQLReback Separation */ CREATE TABLE `walle_bill_data` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  `value` double(11,1) NOT NULL,
  `content` varchar(225) NOT NULL,
  `time` datetime NOT NULL,
  `create_time` int(10) NOT NULL,
  `extra` varchar(50) NOT NULL,
  `type_id` int(3) NOT NULL,
  `uid` int(10) NOT NULL,
  `status` int(3) NOT NULL,
  `remark` text NOT NULL,
  `is_lock` tinyint(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `walle_bill_data_type`  */
 DROP TABLE IF EXISTS `walle_bill_data_type`;/* MySQLReback Separation */ CREATE TABLE `walle_bill_data_type` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `type_id` int(3) NOT NULL,
  `name` varchar(20) NOT NULL,
  `title` varchar(20) NOT NULL,
  `create_time` int(10) NOT NULL,
  `remark` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 INSERT INTO `walle_bill_data_type` VALUES ('1','1','zhichu','支出','0',null),('2','2','shouru','收入','0',null),('4','3','shoujiaoandzhichu','收缴/支出','0',null),('5','4','bandr','借/还','0',null),('6','5','target','目标','0',null),('7','6','target_save','目标存款','0',null),('9','0','extra','收缴/分配=>分配','0',null),('10','1','extra 字段','收缴/分配=>收缴','0',null),('11','1','borrow','借还=>借','0',null),('12','0','return','借还=>还','0',null);/* MySQLReback Separation */
 /* 创建表结构 `walle_bill_user_config`  */
 DROP TABLE IF EXISTS `walle_bill_user_config`;/* MySQLReback Separation */ CREATE TABLE `walle_bill_user_config` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `create_time` int(10) NOT NULL,
  `uid` int(10) NOT NULL,
  `status` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `walle_config`  */
 DROP TABLE IF EXISTS `walle_config`;/* MySQLReback Separation */ CREATE TABLE `walle_config` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `title` varchar(30) NOT NULL,
  `create_time` int(10) NOT NULL,
  `belong` varchar(30) NOT NULL,
  `remark` varchar(30) NOT NULL,
  `type` varchar(15) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1300 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 INSERT INTO `walle_config` VALUES ('502','site_logo',null,'1409484716',null,null,'base','/walle/Uploads/Picture/logo/2014-08-31/540307ac73168.ico'),('545','pic_height','缩略图高度','1409489160',null,null,'show_config','600'),('546','pic_width','缩略图宽度','1409489231',null,null,'show_config','6100'),('1285','site_name',null,'1410251241',null,null,'base','WallE'),('1286','site_title',null,'1410251241',null,null,'base','我的个人内容管理系统'),('1287','site_keywords',null,'1410251241',null,null,'base','我的个人内容管理系统'),('1288','site_description',null,'1410251241',null,null,'base','我的个人内容管理系统'),('1289','site_icp',null,'1410251241',null,null,'base','粤字 ICP 654753115 号'),('1290','site_phone',null,'1410251241',null,null,'base','13650962253'),('1291','site_email',null,'1410251241',null,null,'base','654753115@qq.com'),('1292','site_qq',null,'1410251241',null,null,'base','654753115'),('1293','site_template',null,'1410251241',null,null,'base','default'),('1294','site_off_on',null,'1410251241',null,null,'base','on'),('1295','site_login',null,'1410251241',null,null,'base','on'),('1296','site_content',null,'1410251241',null,null,'base','我的个人内容管理系统'),('1297','site_map',null,'1410251241',null,null,'base','off'),('1298','site_verify',null,'1410251241',null,null,'base','off'),('1299','site_url_rewrite',null,'1410251241',null,null,'base','off');/* MySQLReback Separation */
 /* 创建表结构 `walle_member`  */
 DROP TABLE IF EXISTS `walle_member`;/* MySQLReback Separation */ CREATE TABLE `walle_member` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `reg_id` int(10) NOT NULL,
  `reg_time` int(10) NOT NULL,
  `reg_ip` varchar(25) NOT NULL,
  `descript` varchar(50) NOT NULL,
  `remark` varchar(50) NOT NULL,
  `status` int(3) NOT NULL,
  `last_login_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 INSERT INTO `walle_member` VALUES ('30','admin','892716279@qq.com','8cc5246161037643e0372d5f9f1f9884','0','1410429998','127.0.0.1',null,null,'1','1412337037'),('35','walle','654753115@qq.com','8cc5246161037643e0372d5f9f1f9884','1410440112','1410440112','127.0.0.1',null,null,'1','1412440739'),('36','qwert','654753115@qq.com','8cc5246161037643e0372d5f9f1f9884','0','1411390410','127.0.0.1',null,null,'1','1411390511');/* MySQLReback Separation */
 /* 创建表结构 `walle_nav`  */
 DROP TABLE IF EXISTS `walle_nav`;/* MySQLReback Separation */ CREATE TABLE `walle_nav` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `url` text NOT NULL,
  `status` int(3) NOT NULL,
  `remark` varchar(225) NOT NULL,
  `sort` int(3) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `type` int(3) NOT NULL,
  `target` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 INSERT INTO `walle_nav` VALUES ('2','支出','Zhichu/index','1',null,'2','1410053604','1410428455','0','_self'),('6','首页','Index/index','1',null,'1','1410055147','1410056613','0','_self'),('9','收缴/分配','Shoujiao/index','1',null,'4','1410059470','1411820114','0','_self'),('10','借/还','Jiehuan/index','1',null,'5','1410061155','1411385338','0','_self'),('12',null,null,'1',null,'9','1410061206','1410061206','0','_self'),('13',null,null,'0',null,'9','1410061221','1410061221','0','_self'),('16',null,null,'0',null,'9','1410110412','1410110412','0','_self'),('17',null,null,'0',null,'9','1410110416','1410110416','0','_self'),('22','收入','Shouru/index','1',null,'3','1411302250','1411302250','0','_self'),('23','存款目标','Savemoney/index','1',null,'6','1411632661','1411632689','0','_self'),('24',null,null,'0',null,'10','1412750555','1412750555','0','_self'),('25',null,null,'0',null,'10','1412750562','1412750562','0','_self'),('26',null,null,'0',null,'10','1412750569','1412750569','0','_self'),('28',null,null,'0',null,'10','1412750584','1412750584','0','_self'),('29',null,null,'1',null,'11','1412750590','1412750590','0','_self'),('30',null,null,'1',null,'12','1412750595','1412750595','0','_self'),('31',null,null,'0',null,'10','1412750673','1412750673','0','_self'),('32',null,null,'0',null,'10','1412750680','1412750680','0','_self'),('33',null,null,'1',null,'10','1412772838','1412772838','0','_self'),('34',null,null,'1',null,'10','1412772843','1412772843','0','_self');/* MySQLReback Separation */
 /* 创建表结构 `walle_node`  */
 DROP TABLE IF EXISTS `walle_node`;/* MySQLReback Separation */ CREATE TABLE `walle_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `sort` smallint(6) unsigned DEFAULT NULL,
  `pid` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `level` (`level`),
  KEY `pid` (`pid`),
  KEY `status` (`status`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 INSERT INTO `walle_node` VALUES ('1','Admin','后台应用','1',null,'1','0','1'),('2','Config','配置中心','1',null,'1','1','2'),('3','Nav','导航设置','1',null,'1','1','2'),('4','nav','导航列表','1',null,'1','3','3');/* MySQLReback Separation */
 /* 创建表结构 `walle_role`  */
 DROP TABLE IF EXISTS `walle_role`;/* MySQLReback Separation */ CREATE TABLE `walle_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `pid` smallint(6) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 INSERT INTO `walle_role` VALUES ('1','Member','会员',null,'1',null);/* MySQLReback Separation */
 /* 创建表结构 `walle_role_user`  */
 DROP TABLE IF EXISTS `walle_role_user`;/* MySQLReback Separation */ CREATE TABLE `walle_role_user` (
  `role_id` mediumint(9) unsigned DEFAULT NULL,
  `user_id` char(32) DEFAULT NULL,
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 INSERT INTO `walle_role_user` VALUES ('1','35'),('1','36');/* MySQLReback Separation */
 /* 创建表结构 `walle_tp_data`  */
 DROP TABLE IF EXISTS `walle_tp_data`;/* MySQLReback Separation */ CREATE TABLE `walle_tp_data` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `name` varchar(32) NOT NULL COMMENT '账单名称',
  `price` varchar(10) NOT NULL COMMENT '多少钱',
  `time` date NOT NULL COMMENT '账单时间',
  `content` varchar(64) NOT NULL COMMENT '说明',
  `type` varchar(20) NOT NULL COMMENT '账单类型',
  `person_uid` varchar(20) NOT NULL DEFAULT '1' COMMENT '账单所属人uid',
  `status` varchar(10) NOT NULL COMMENT '账单状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=363 DEFAULT CHARSET=utf8 COMMENT='收支数据表';/* MySQLReback Separation */
 