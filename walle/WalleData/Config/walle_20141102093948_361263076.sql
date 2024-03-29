/* This file is created by MySQLReback 2014-11-02 09:39:48 */
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
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 INSERT INTO `walle_action_log` VALUES ('74','35','用户登录！','1410916533','127.0.0.1','login'),('75','35','用户登录！','1410917622','127.0.0.1','login'),('76','35','用户登录！','1410917628','127.0.0.1','login'),('77','35','用户登录！','1411053999','127.0.0.1','login'),('78','35','用户登录！','1411264454','127.0.0.1','login'),('79','35','用户登录！','1411302176','127.0.0.1','login'),('80','35','用户登录！','1411366672','127.0.0.1','login'),('81','30','用户登录！','1411400189','127.0.0.1','login'),('82','35','用户登录！','1411632542','127.0.0.1','login'),('83','35','用户登录！','1411820100','127.0.0.1','login'),('84','35','用户登录！','1412040622','127.0.0.1','login'),('85','35','用户登录！','1412122277','127.0.0.1','login'),('86','35','用户登录！','1412153726','127.0.0.1','login'),('87','30','用户登录！','1412153977','127.0.0.1','login'),('88','35','用户登录！','1412154028','127.0.0.1','login'),('89','35','用户登录！','1412259890','127.0.0.1','login'),('90','35','用户登录！','1412321858','127.0.0.1','login'),('91','30','用户登录！','1412336756','127.0.0.1','login'),('92','30','用户登录！','1412337037','127.0.0.1','login'),('93','35','用户登录！','1412844919','127.0.0.1','login'),('94','35','用户登录！','1413255141','127.0.0.1','login'),('95','30','用户登录！','1413539831','127.0.0.1','login'),('96','30','用户登录！','1413965673','127.0.0.1','login'),('97','30','用户登录！','1413965708','127.0.0.1','login');/* MySQLReback Separation */
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
  `is_lock` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=477 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 INSERT INTO `walle_bill_data` VALUES ('164','生活工具','129.0','生活工具','2014-05-25 00:00:00','1412322317',null,'1','35','1',null,'0'),('165','充值饭卡','100.0','在饭堂充值饭卡100元','2014-05-28 00:00:00','1412322317',null,'1','35','1',null,'0'),('166','金芙13g纤麦巧克力','8.5','1包巧克力','2014-06-02 00:00:00','1412322317',null,'1','35','1',null,'0'),('167','34G迷你碗装海鲜面','2.5','1盒','2014-06-02 00:00:00','1412322317',null,'1','35','1',null,'0'),('168','41g公仔面迷你碗装牛肉面','2.5','1盒','2014-06-02 00:00:00','1412322317',null,'1','35','1',null,'0'),('169','康师傅面霸拉面五包入香牛肉味','17.5','1袋','2014-06-02 00:00:00','1412322317',null,'1','35','1',null,'0'),('170','375g洽洽早餐派香橙味','10.8','1袋','2014-06-02 00:00:00','1412322317',null,'1','35','1',null,'0'),('171','西瓜半边','6.0','平分一个西瓜','2014-06-02 00:00:00','1412322317',null,'1','35','1',null,'0'),('172','荔枝','4.0','平分一袋荔枝','2014-06-02 00:00:00','1412322317',null,'1','35','1',null,'0'),('173','没有记下的支出','156.0','2014-06-02之前的支出','2014-06-02 00:00:00','1412322317',null,'1','35','1',null,'0'),('174','充值饭卡','200.0','饭堂充值饭卡','2014-06-07 00:00:00','1412322317',null,'1','35','1',null,'0'),('175','银行取钱手续费','6.0','取200元扣6元手续费','2014-06-14 00:00:00','1412322317',null,'1','35','1',null,'0'),('176','交舍费','50.0','宿舍电费','2014-06-14 00:00:00','1412322317',null,'1','35','1',null,'0'),('177','充饭卡','200.0','充值饭卡200元','2014-06-18 00:00:00','1412322317',null,'1','35','1',null,'0'),('178','交班费','20.0','班费20元','2014-06-18 00:00:00','1412322317',null,'1','35','1',null,'0'),('179','理发','20.0','在学校理发','2014-06-19 00:00:00','1412322317',null,'1','35','1',null,'0'),('180','充值饭卡','200.0','综合楼充值饭卡200元','2014-06-27 00:00:00','1412322317',null,'1','35','1',null,'0'),('181','西瓜','3.0','哎。。','2014-06-27 00:00:00','1412322317',null,'1','35','1',null,'0'),('182','交舍费','20.0','舍费','2014-07-02 00:00:00','1412322317',null,'1','35','1',null,'0'),('183','蒙牛纯牛奶','6.0','两瓶2*3','2014-07-09 00:00:00','1412322317',null,'1','35','1',null,'0'),('184','明治牛奶巧克力24克','6.5','一小包6.5元，，贵','2014-07-09 00:00:00','1412322317',null,'1','35','1',null,'0'),('185','42g旺仔牛奶糖-巧克力味','6.0','3元一包*2','2014-07-09 00:00:00','1412322317',null,'1','35','1',null,'0'),('186','106g卡夫奥利奥缤纷双果','6.0','一盒','2014-07-09 00:00:00','1412322317',null,'1','35','1',null,'0'),('187','买师兄的凳子','23.0','学校买大三毕业师兄凳子','2014-07-09 00:00:00','1412322317',null,'1','35','1',null,'0'),('188','购买车票','85.0','学校购买直达阳江车票','2014-07-09 00:00:00','1412322317',null,'1','35','1',null,'0'),('189','充值话费','30.0','充值话费补记','2014-06-24 00:00:00','1412322317',null,'1','35','1',null,'0'),('190','充值Q币','40.0','充值QB40元','2014-06-28 00:00:00','1412322317',null,'1','35','1',null,'0'),('191','乐活吃饭','12.0','吃饭','2014-07-09 00:00:00','1412322317',null,'1','35','1',null,'0'),('192','文博鱿鱼卷','7.5','零食--文博鱿鱼卷一大袋','2014-07-09 00:00:00','1412322317',null,'1','35','1',null,'0'),('193','士力架35g花生夹心巧克力味','5.6','两小包*2.8','2014-07-09 00:00:00','1412322317',null,'1','35','1',null,'0'),('194','8313红莲牌雪白樟脑丸','3.0','樟脑丸，毁灭吧','2014-07-09 00:00:00','1412322317',null,'1','35','1',null,'0'),('195','家里寄来的钱','1000.0','从家里寄来的钱','2014-05-22 00:00:00','1412322441',null,'2','35','1',null,'0'),('196','家里寄来的钱','1000.0','从家里寄来的钱','2014-06-24 00:00:00','1412322441',null,'2','35','1',null,'0'),('259','购买路由器','54.4','为了WiFi','2014-07-23 00:00:00','1412322317',null,'1','35','1',null,'0'),('260','剪发','5.0','镇上剪发','2014-08-01 00:00:00','1412322317',null,'1','35','1',null,'0'),('262','50G米老头蛋黄卷','5.0','1包','2014-08-11 00:00:00','1412322317',null,'1','35','1',null,'0'),('263','0077樟脑丸','4.0','2*2.0 两包','2014-08-11 00:00:00','1412322317',null,'1','35','1',null,'0'),('264','台南核桃粉 牛奶+钙','28.0','1袋','2014-08-11 00:00:00','1412322317',null,'1','35','1',null,'0'),('265','袜子两双','5.0','镇上买，两双袜子','2014-08-11 00:00:00','1412322317',null,'1','35','1',null,'0'),('266','耳塞一副','30.0','手机店买的','2014-08-11 00:00:00','1412322317',null,'1','35','1',null,'0'),('267','买菜','8.8','苦瓜5.3和菜心3.5','2014-08-11 00:00:00','1412322317',null,'1','35','1',null,'0'),('269','妈妈给的','32.5','买东西剩的','2014-08-01 00:00:00','1412322441',null,'2','35','1',null,'0'),('270','付阉鸡钱','6.0','2只2*3','2014-08-12 00:00:00','1412322317',null,'1','35','1',null,'0'),('271','身份证照片','25.0','办理身份证照片（即拿）','2014-08-15 00:00:00','1412322317',null,'1','35','1',null,'0');/* MySQLReback Separation */
 INSERT INTO `walle_bill_data` VALUES ('272','办理身份证手续费','20.0','补办身份证手续费','2014-08-15 00:00:00','1412322317',null,'1','35','1',null,'0');/* MySQLReback Separation */
 INSERT INTO `walle_bill_data` VALUES ('273','乘坐公交车','3.0','坐车车费','2014-08-15 00:00:00','1412322317',null,'1','35','1',null,'0'),('274','充值自己手机话费','30.0','手机号13650962253','2014-08-10 00:00:00','1412322317',null,'1','35','1',null,'0'),('275','买矿泉水一瓶','2.0','电鱼路上买的','2014-08-15 00:00:00','1412322317',null,'1','35','1',null,'0'),('276','妈妈给的','100.0','照像等用的','2014-08-15 00:00:00','1412322441',null,'2','35','1',null,'0'),('277','在银行存款2W','20000.0','银行存款，含学费','2014-08-15 00:00:00','1412322441',null,'2','35','1',null,'0'),('278','家里给的','100.0','给吴家俊结婚礼钱','2014-08-20 00:00:00','1412322441',null,'2','35','1',null,'0'),('279','吴家俊结婚封礼','90.0','封100元返还10元礼钱','2014-08-20 00:00:00','1412322317',null,'1','35','1',null,'0'),('280','土豆购买电影','5.0','电影名称《美人鱼》','2014-08-19 00:00:00','1412322317',null,'1','35','1',null,'0'),('281','坏账（数据遗失）','177.1','遗失数据','2014-08-20 00:00:00','1412322441',null,'2','35','1',null,'0'),('287','家里给的','800.0','回校时给的','2014-08-25 00:00:00','1412322441',null,'2','35','1',null,'0'),('288','车费','18.0','上阳春的车费','2014-08-26 00:00:00','1412322317',null,'1','35','1',null,'0'),('289','车费','95.0','回华立学校包车车费','2014-08-26 00:00:00','1412322317',null,'1','35','1',null,'0'),('290','吃饭','12.0','乐活吃饭','2014-08-26 00:00:00','1412322317',null,'1','35','1',null,'0'),('291','车站买糖果','8.0','阳春车站买的','2014-08-26 00:00:00','1412322317',null,'1','35','1',null,'0'),('292','烤鸡腿','6.0','阳春华润万家买的','2014-08-26 00:00:00','1412322317',null,'1','35','1',null,'0'),('293','德芙摩卡棒仁巧克力碗装243g','40.0','阳春华润万家买的','2014-08-26 00:00:00','1412322317',null,'1','35','1',null,'0'),('294','伊利优酸乳（草莓味）250ml','1.6','渴了就买啊','2014-08-26 00:00:00','1412322317',null,'1','35','1',null,'0'),('295','帮史志宏冲话费','20.0','充值50欠他20返回30','2014-08-26 00:00:00','1412322317',null,'1','35','1',null,'0'),('296','交学校杂费','300.0','交坑爹杂费','2014-08-26 00:00:00','1412322317',null,'1','35','1',null,'0'),('297','V2239维达130抽超韧纸巾','17.8','没纸了','2014-08-27 00:00:00','1412322317',null,'1','35','1',null,'0'),('298','500g宏事达哆啦A梦铜锣烧红豆','11.8','买来吃的','2014-08-27 00:00:00','1412322317',null,'1','35','1',null,'0'),('299','玉丽牙刷','3.5','牙刷坏了','2014-08-27 00:00:00','1412322317',null,'1','35','1',null,'0'),('300','特大号袋子','0.5','装东西','2014-08-27 00:00:00','1412322317',null,'1','35','1',null,'0'),('301','1.36kg汰渍洗衣粉','10.8','洗衣服','2014-08-27 00:00:00','1412322317',null,'1','35','1',null,'0'),('302','小黑饼300G奶油','6.5','零食','2014-08-27 00:00:00','1412322317',null,'1','35','1',null,'0'),('303','400ml飘柔滋润去屑洗发水','24.8','洗头','2014-08-27 00:00:00','1412322317',null,'1','35','1',null,'0'),('304','100g永康葱油薄饼','4.0','2*2包','2014-08-27 00:00:00','1412322317',null,'1','35','1',null,'0'),('305','妙娇雨伞童巾','8.0','洗脸用的','2014-08-27 00:00:00','1412322317',null,'1','35','1',null,'0'),('306','720ml舒肤佳纯白清香沐浴露','32.8','洗澡用的','2014-08-27 00:00:00','1412322317',null,'1','35','1',null,'0'),('307','140g黑人水清新牙膏','11.8','刷牙','2014-08-27 00:00:00','1412322317',null,'1','35','1',null,'0'),('309','乐活吃饭','12.0','饭堂人多啊','2014-08-27 00:00:00','1412322317',null,'1','35','1',null,'0'),('310','充值饭卡','200.0','充值饭卡','2014-08-27 00:00:00','1412322317',null,'1','35','1',null,'0'),('311','宿舍叫外卖','11.0','饿了啊，叫了试试','2014-08-28 00:00:00','1412322317',null,'1','35','1',null,'0'),('312','学费','17930.0','银行扣除学费','2014-08-19 00:00:00','1412322317',null,'1','35','1',null,'0'),('313','乐活吃饭','12.0','中午外出吃饭','2014-09-01 00:00:00','1412322317',null,'1','35','1',null,'0'),('314','台灯','36.0','淘宝买的','2014-09-03 00:00:00','1412322317',null,'1','35','1',null,'0'),('315','乐活买零食','5.0','葱油饼','2014-09-03 00:00:00','1412322317',null,'1','35','1',null,'0'),('319','乐活吃饭','12.0','吃饭','2014-09-06 00:00:00','1412322317',null,'1','35','1',null,'0'),('320','0373家逸牙签','2.5','剔牙','2014-09-06 00:00:00','1412322317',null,'1','35','1',null,'0'),('321','2081牙签筒','1.5','装牙签','2014-09-06 00:00:00','1412322317',null,'1','35','1',null,'0'),('322','755正牛三插4米','28.5','插座','2014-09-06 00:00:00','1412322317',null,'1','35','1',null,'0'),('323','买练习本子','1.2','2*06','2014-09-06 00:00:00','1412322317',null,'1','35','1',null,'0'),('324','买糕点','5.0','学校超市买的','2014-09-05 00:00:00','1412322317',null,'1','35','1',null,'0'),('325','优乐美','5.0','学校买的','2014-09-05 00:00:00','1412322317',null,'1','35','1',null,'0');/* MySQLReback Separation */
 INSERT INTO `walle_bill_data` VALUES ('326','车费来回','8.0','去万达广场，去3，回来5','2014-09-07 00:00:00','1412322317',null,'1','35','1',null,'0');/* MySQLReback Separation */
 INSERT INTO `walle_bill_data` VALUES ('327','买香蕉','10.5','乐活买的','2014-09-07 00:00:00','1412322317',null,'1','35','1',null,'0'),('328','乐活中午吃饭','12.0','午饭时间','2014-09-07 00:00:00','1412322317',null,'1','35','1',null,'0'),('329','乐活吃晚饭','7.0','炒河粉一碟','2014-09-07 00:00:00','1412322317',null,'1','35','1',null,'0'),('330','夏桑菊颗粒10包','7.5','和海杰平分一袋','2014-09-06 00:00:00','1412322317',null,'1','35','1',null,'0'),('331','充值饭卡','300.0','饭卡没钱了','2014-09-09 00:00:00','1412322317',null,'1','35','1',null,'0'),('332','乐活吃晚饭','12.0','饿了','2014-09-09 00:00:00','1412322317',null,'1','35','1',null,'0'),('333','买笔记本','5.5','一个本子','2014-09-09 00:00:00','1412322317',null,'1','35','1',null,'0'),('334','文具','23.0','笔芯，一支笔，透明胶','2014-09-09 00:00:00','1412322317',null,'1','35','1',null,'0'),('335','交舍费','80.0','交舍费','2014-09-10 00:00:00','1412322317',null,'1','35','1',null,'0'),('336','车费','6.0','来回车费','2014-09-14 00:00:00','1412322317',null,'1','35','1',null,'0'),('337','羽毛球拍','79.9','打羽毛球','2014-09-14 00:00:00','1412322317',null,'1','35','1',null,'0'),('338','手机数据线','10.0','小米3数据线坏了','2014-09-14 00:00:00','1412322317',null,'1','35','1',null,'0'),('339','DLX液','44.0','网上购买','2014-09-14 00:00:00','1412322317',null,'1','35','1',null,'0'),('340','剪发','15.0','头发长了','2014-09-14 00:00:00','1412322317',null,'1','35','1',null,'0'),('341','交英语4级考试费','36.0','考四级','2014-09-13 00:00:00','1412322317',null,'1','35','1',null,'0'),('343','火龙果','1.8','吃的','2014-09-19 00:00:00','1412322317',null,'1','35','1',null,'0'),('344','公仔四连包牛肉面','9.5','吃的','2014-09-19 00:00:00','1412322317',null,'1','35','1',null,'0'),('345','鱿鱼丝','4.6','吃的','2014-09-19 00:00:00','1412322317',null,'1','35','1',null,'0'),('346','烤鱿鱼','5.0','吃的','2014-09-19 00:00:00','1412322317',null,'1','35','1',null,'0'),('347','乐活吃饭','12.0','饿了','2014-09-19 00:00:00','1412322317',null,'1','35','1',null,'0'),('348','交书费','200.0','上学期书费','2014-09-19 00:00:00','1412322317',null,'1','35','1',null,'0'),('349','中午吃饭','4.5','借别人的卡','2014-09-21 00:00:00','1412322317',null,'1','35','1',null,'0'),('350','充值饭卡','100.0','饭卡没钱','2014-09-28 00:00:00','1412322317',null,'1','35','1',null,'0'),('352','乐活吃饭','12.0','饿了啊','2014-10-01 00:00:00','1412322317',null,'1','35','1',null,'0'),('353','360g达利园法式软面包香橙味','10.7','当零食','2014-10-01 00:00:00','1412322317',null,'1','35','1',null,'0'),('354','280g银鹭好粥道椰奶燕麦粥','3.7','吃的','2014-10-01 00:00:00','1412322317',null,'1','35','1',null,'0'),('355','五连包康师傅经典香菇炖鸡','11.8','宵夜吃的','2014-10-01 00:00:00','1412322317',null,'1','35','1',null,'0'),('356','248g富新园加李皇','9.7','黑加仑','2014-10-01 00:00:00','1412322317',null,'1','35','1',null,'0'),('357','优乐美','4.0','1*四包','2014-10-01 00:00:00','1412322317',null,'1','35','1',null,'0'),('358','大号袋','0.3','袋子一个','2014-10-01 00:00:00','1412322317',null,'1','35','1',null,'0'),('359','香蕉','4.0','两条香蕉','2014-10-01 00:00:00','1412322317',null,'1','35','1',null,'0'),('360','小番茄','2.5','一小袋','2014-10-01 00:00:00','1412322317',null,'1','35','1',null,'0'),('361','充话费','30.0','没话费了','2014-10-01 00:00:00','1412322317',null,'1','35','1',null,'0'),('362','乐活吃饭','12.0','饿了啊','2014-10-02 00:00:00','1412322317',null,'1','35','1',null,'0'),('369','宿舍费用收缴','10000.0','舍费哦','2014-10-03 00:00:00','1412336344','1','3','35','1',null,'0'),('370','宿舍聚会','5000.0','舍费！！','2014-10-03 00:00:00','1412336357','0','3','35','1',null,'0'),('371','借给振杰','100.0','冲饭卡的钱','2014-10-03 00:00:00','1412337084','1','4','35','1',null,'0'),('381','乐活吃饭','12.0','中午吃饭','2014-10-04 00:00:00','1412426034',null,'1','35','1',null,'0'),('382','乐活吃午饭','12.0','有粥面子吃的','2014-10-05 00:00:00','1412488329',null,'1','35','1',null,'0'),('383','羽毛球手胶','16.8','4个，运费6元','2014-10-01 00:00:00','1412488425',null,'1','35','1',null,'0'),('385','出售剑灵游戏金币','70.0','卖了70，手续费10，真坑','2014-10-05 00:00:00','1412488528',null,'2','35','1',null,'0'),('386','卖剑灵金币手续费','10.0','那么贵的手续费。坑','2014-10-05 00:00:00','1412488560',null,'1','35','1',null,'0'),('387','羽毛球','39.6','两筒24只','2014-10-07 00:00:00','1412648072',null,'1','35','1',null,'0'),('388','我的第一笔资金','500000.0','我必须要赚到的第一笔大资金！','2018-10-11 00:00:00','1412674733',null,'5','35','1','杨东升','1'),('389','乐活吃饭','12.0','吃晚饭','2014-10-07 00:00:00','1412681017',null,'1','35','1',null,'0'),('390','还云帆30','30.0','吃饭的钱','2014-10-07 00:00:00','1412681059',null,'1','35','1',null,'0');/* MySQLReback Separation */
 INSERT INTO `walle_bill_data` VALUES ('391','夏桑菊颗粒','15.0','上火了','2014-10-07 00:00:00','1412681099',null,'1','35','1',null,'0');/* MySQLReback Separation */
 INSERT INTO `walle_bill_data` VALUES ('392','感冒药','25.0','预防一下','2014-10-07 00:00:00','1412681121',null,'1','35','1',null,'0'),('393','月存一百','100.0','每个月至少存入一百','2014-10-08 00:00:00','1412748713','388','6','35','1',null,'0'),('394','充饭卡','200.0','饭卡','2014-10-09 00:00:00','1412835861',null,'1','35','1',null,'0'),('395','买牛仔裤','48.6','淘宝买的，被坑了','2014-10-09 00:00:00','1412835906',null,'1','35','1',null,'0'),('396','清风纸巾12卷','17.5','没纸巾了','2014-10-08 00:00:00','1412837521',null,'1','35','1',null,'0'),('397','单晶冰糖','7.8','糖来的','2014-10-08 00:00:00','1412837639',null,'1','35','1',null,'0'),('398','购物袋子','0.2','装东西','2014-10-08 00:00:00','1412837658',null,'1','35','1',null,'0'),('399','乐活吃饭','12.0','饿了','2014-10-11 00:00:00','1413027248',null,'1','35','1',null,'0'),('400','买笔','5.0','之前的丢了','2014-10-11 00:00:00','1413027271',null,'1','35','1',null,'0'),('401','两个本子','3.0','当草稿','2014-10-11 00:00:00','1413027288',null,'1','35','1',null,'0'),('402','振杰','20.0','吃饭等的钱','2014-10-11 00:00:00','1413033253','0','4','35','1',null,'0'),('403','月存','100.0','每月存款一百','2014-10-11 00:00:00','1413040452','388','6','35','1',null,'0'),('408','大姐给的','500.0','大姐','2010-12-20 00:00:00','1413080988',null,'2','35','1',null,'0'),('409','家里给的','200.0','来自家里','2010-12-20 00:00:00','1413081022',null,'2','35','1',null,'0'),('410','家里','700.0','来自家里','2011-01-23 00:00:00','1413081056',null,'2','35','1',null,'0'),('411','家里','200.0','来自家里','2011-02-01 00:00:00','1413081119',null,'2','35','1',null,'0'),('412','家里','2000.0','开学总费用','2011-02-13 00:00:00','1413081168',null,'2','35','1',null,'0'),('413','家里','800.0','来自家里，时间不定','2011-03-01 00:00:00','1413081301',null,'2','35','1',null,'0'),('414','大姐','600.0','来自大姐，时间不定','2011-03-01 00:00:00','1413081339',null,'2','35','1',null,'0'),('415','来自家里','500.0','来自家里','2011-05-03 00:00:00','1413081410',null,'2','35','1',null,'0'),('416','家里','700.0','来自家里','2011-06-09 00:00:00','1413081444',null,'2','35','1',null,'0'),('417','大姐','300.0','来自大姐','2011-06-26 00:00:00','1413081473',null,'2','35','1',null,'0'),('418','家里','400.0','来自家里','2011-07-07 00:00:00','1413081531',null,'2','35','1',null,'0'),('419','大姐','50.0','大姐，帮我充话费','2011-07-09 00:00:00','1413081575',null,'2','35','1',null,'0'),('420','家里','1500.0','来自家里','2011-08-30 00:00:00','1413081651',null,'2','35','1',null,'0'),('421','个人工资','1300.0','做暑期工的工资','2011-09-01 00:00:00','1413081716',null,'2','35','1',null,'0'),('422','家里','100.0','来自家里','2011-10-02 00:00:00','1413081740',null,'2','35','1',null,'0'),('423','家里','500.0','来自家里','2011-10-07 00:00:00','1413081786',null,'2','35','1',null,'0'),('424','大姐','100.0','来自大姐','2011-10-04 00:00:00','1413081805',null,'2','35','1',null,'0'),('425','家里','200.0','来自家里，时间不定','2011-10-04 00:00:00','1413081865',null,'2','35','1',null,'0'),('426','大姐','2050.0','来自大姐，时间不定','2011-12-01 00:00:00','1413082005',null,'2','35','1',null,'0'),('427','家里','225.0','来自家里','2012-01-03 00:00:00','1413082043',null,'2','35','1',null,'0'),('428','家里','2200.0','来自家里，含学费','2012-02-05 00:00:00','1413082091',null,'2','35','1',null,'0'),('429','大姐','1000.0','来自大姐','2012-02-15 00:00:00','1413082113',null,'2','35','1',null,'0'),('430','家里','320.0','来自家里，时间不定','2012-05-01 00:00:00','1413082167',null,'2','35','1',null,'0'),('431','家里','500.0','来自家里','2012-05-21 00:00:00','1413082217',null,'2','35','1',null,'0'),('432','家里','1100.0','来自家里','2012-08-05 00:00:00','1413082237',null,'2','35','1',null,'0'),('433','家里','500.0','来自家里','2012-09-13 00:00:00','1413082261',null,'2','35','1',null,'0'),('434','家里','2000.0','来自家里，含学费','2012-09-02 00:00:00','1413082299',null,'2','35','1',null,'0'),('435','大姐','510.0','大姐结婚','2012-10-01 00:00:00','1413082339',null,'2','35','1',null,'0'),('436','家里','925.0','来自家里','2012-10-03 00:00:00','1413082380',null,'2','35','1',null,'0'),('437','家里','120.0','来自家里','2012-10-28 00:00:00','1413082401',null,'2','35','1',null,'0'),('438','家里给的','520.0','来自家里','2012-11-19 00:00:00','1413082426',null,'2','35','1',null,'0'),('439','家里','250.0','来自家里','2012-11-25 00:00:00','1413082460',null,'2','35','1',null,'0'),('440','家里','200.0','来自家里','2012-12-02 00:00:00','1413082480',null,'2','35','1',null,'0'),('441','家里','172.0','来自家里','2012-12-10 00:00:00','1413082500',null,'2','35','1',null,'0'),('442','家里','550.0','来自家里','2012-12-16 00:00:00','1413082531',null,'2','35','1',null,'0'),('443','家里给的','430.0','来自家里','2013-01-04 00:00:00','1413082597',null,'2','35','1',null,'0');/* MySQLReback Separation */
 INSERT INTO `walle_bill_data` VALUES ('444','家里','400.0','来自家里','2013-01-14 00:00:00','1413082614',null,'2','35','1',null,'0');/* MySQLReback Separation */
 INSERT INTO `walle_bill_data` VALUES ('445','家里','240.0','来自家里','2013-01-28 00:00:00','1413082639',null,'2','35','1',null,'0'),('446','红包','550.0','过年红包','2013-02-05 00:00:00','1413082700',null,'2','35','1',null,'0'),('447','家里','2500.0','来自家里，含学费，遗失了','2013-02-15 00:00:00','1413082756',null,'2','35','1',null,'0'),('448','家里','1280.0','来自家里','2013-03-04 00:00:00','1413082793',null,'2','35','1',null,'0'),('449','收手续费','0.7','帮别人充话费赚的','2013-03-07 00:00:00','1413082839',null,'2','35','1',null,'0'),('450','家里','320.0','来自家里','2013-03-12 00:00:00','1413082885',null,'2','35','1',null,'0'),('451','家里','555.0','来自家里','2013-03-31 00:00:00','1413082903',null,'2','35','1',null,'0'),('452','家里','200.0','来自家里','2013-04-05 00:00:00','1413082922',null,'2','35','1',null,'0'),('453','家里','300.0','来自家里','2013-04-13 00:00:00','1413082954',null,'2','35','1',null,'0'),('454','家里','520.0','来自家里','2013-05-01 00:00:00','1413082969',null,'2','35','1',null,'0'),('455','家里','430.0','来自家里','2013-05-12 00:00:00','1413082985',null,'2','35','1',null,'0'),('456','来自家里','22100.0','来自家里，含大学学费','2013-08-18 00:00:00','1413083048',null,'2','35','1',null,'0'),('457','家里','300.0','来自家里','2013-08-31 00:00:00','1413083064',null,'2','35','1',null,'0'),('458','大姐','100.0','来自大姐','2013-08-31 00:00:00','1413083088',null,'2','35','1',null,'0'),('459','家里','2000.0','来自家里','2013-10-01 00:00:00','1413083114',null,'2','35','1',null,'0'),('460','家里','2200.0','来自家里','2013-12-01 00:00:00','1413083133',null,'2','35','1',null,'0'),('461','旧数据未记录','58217.7','2013年之前的所有支出','2013-12-31 00:00:00','1413083390',null,'1','35','1',null,'0'),('462','传单打印','160.0','这个系统的传单印发','2014-10-12 00:00:00','1413172000',null,'1','35','1',null,'0'),('463','借海杰','110.0','交cad考试报名费','2014-10-14 00:00:00','1413217086','1','4','35','1',null,'0'),('464','发传单人工费用','33.0','帮忙派传单费用','2014-10-16 00:00:00','1413474167',null,'1','35','1',null,'0'),('465','借海杰吃饭','9.0','吃完饭','2014-10-17 00:00:00','1413539905','1','4','35','1',null,'0'),('466','借海杰吃饭','9.0','楼下打包','2014-10-18 00:00:00','1413627778','1','4','35','1',null,'0'),('467','买美体英雄联盟账号','10.0','1天时间','2014-10-18 00:00:00','1413627822',null,'1','35','1',null,'0'),('468','云帆','10.0','吃晚饭','2014-10-19 00:00:00','1413731468','0','4','35','1',null,'0'),('469','吃晚饭','10.0','叫外卖的','2014-10-19 00:00:00','1413731489',null,'1','35','1',null,'0'),('470','法式面包','8.0','没干粮了','2014-10-19 00:00:00','1413731514',null,'1','35','1',null,'0'),('471','充饭卡','50.0','中午充的','2014-10-20 00:00:00','1413818885',null,'1','35','1',null,'0'),('472','充饭卡','200.0','饭卡没钱了','2014-10-21 00:00:00','1413882888',null,'1','35','1',null,'0'),('473','买苹果','5.5','水果','2014-11-02 00:00:00','1414887564',null,'1','35','1',null,'0'),('474','东芝16g U盘','48.0','东芝16g U盘','2014-11-02 00:00:00','1414887672',null,'1','35','1',null,'0'),('475','来自家里','1000.0','家里给的','2014-11-02 00:00:00','1414887707',null,'2','35','1',null,'0'),('476','买了云帆的螺丝批','5.0','多类型的','2014-11-02 00:00:00','1414892368',null,'1','35','1',null,'0');/* MySQLReback Separation */
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
 INSERT INTO `walle_member` VALUES ('30','admin','892716279@qq.com','8cc5246161037643e0372d5f9f1f9884','0','1410429998','127.0.0.1',null,null,'1','1413965708'),('35','walle','654753115@qq.com','8cc5246161037643e0372d5f9f1f9884','1410440112','1410440112','127.0.0.1',null,null,'1','1414892328'),('36','qwert','654753115@qq.com','8cc5246161037643e0372d5f9f1f9884','0','1411390410','127.0.0.1',null,null,'1','1411390511');/* MySQLReback Separation */
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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 INSERT INTO `walle_nav` VALUES ('2','支出','Zhichu/index','1',null,'2','1410053604','1410428455','0','_self'),('6','首页','Index/index','1',null,'1','1410055147','1410056613','0','_self'),('9','收缴/分配','Shoujiao/index','0',null,'4','1410059470','1411820114','0','_self'),('10','借/还','Jiehuan/index','1',null,'5','1410061155','1411385338','0','_self'),('12',null,null,'1',null,'9','1410061206','1410061206','0','_self'),('13',null,null,'1',null,'9','1410061221','1410061221','0','_self'),('16',null,null,'0',null,'9','1410110412','1410110412','0','_self'),('17',null,null,'0',null,'9','1410110416','1410110416','0','_self'),('22','收入','Shouru/index','1',null,'3','1411302250','1411302250','0','_self'),('23','存款目标','Savemoney/index','1',null,'6','1411632661','1411632689','0','_self'),('24',null,null,'0',null,'10','1412750555','1412750555','0','_self'),('25',null,null,'0',null,'10','1412750562','1412750562','0','_self'),('26',null,null,'0',null,'10','1412750569','1412750569','0','_self'),('28',null,null,'0',null,'10','1412750584','1412750584','0','_self'),('29',null,null,'1',null,'11','1412750590','1412750590','0','_self'),('30',null,null,'1',null,'12','1412750595','1412750595','0','_self'),('31',null,null,'0',null,'10','1412750673','1412750673','0','_self'),('32',null,null,'0',null,'10','1412750680','1412750680','0','_self'),('33',null,null,'1',null,'10','1412772838','1412772838','0','_self'),('34',null,null,'1',null,'10','1412772843','1412772843','0','_self');/* MySQLReback Separation */
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='收支数据表';/* MySQLReback Separation */