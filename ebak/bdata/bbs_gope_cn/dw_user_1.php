<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `dw_user`;");
E_C("CREATE TABLE `dw_user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `purview` varchar(100) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `paypassword` varchar(50) DEFAULT NULL,
  `islock` int(2) NOT NULL DEFAULT '0',
  `invite_userid` varchar(11) DEFAULT NULL COMMENT '邀请好友',
  `invite_money` varchar(10) DEFAULT '0' COMMENT '邀请注册提成',
  `real_status` varchar(2) DEFAULT NULL,
  `card_type` varchar(10) DEFAULT NULL,
  `card_id` varchar(50) DEFAULT NULL,
  `card_pic1` varchar(150) DEFAULT NULL,
  `card_pic2` varchar(150) DEFAULT NULL,
  `nation` varchar(10) DEFAULT NULL,
  `realname` varchar(20) DEFAULT '',
  `integral` varchar(10) DEFAULT NULL,
  `status` int(2) DEFAULT '0',
  `avatar_status` int(2) DEFAULT '0',
  `email_status` varchar(50) DEFAULT NULL,
  `phone_status` varchar(50) DEFAULT '0',
  `video_status` int(2) DEFAULT '0' COMMENT '视频认证',
  `scene_status` int(2) DEFAULT '0' COMMENT '现场认证',
  `email` varchar(30) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `litpic` varchar(250) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `qq` varchar(50) DEFAULT NULL,
  `wangwang` varchar(100) DEFAULT NULL,
  `question` varchar(10) DEFAULT NULL,
  `answer` varchar(100) DEFAULT NULL,
  `birthday` varchar(11) DEFAULT NULL,
  `province` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `area` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `remind` text COMMENT '提醒设置',
  `privacy` text COMMENT '隐私设置',
  `logintime` int(11) DEFAULT '0',
  `addtime` varchar(50) DEFAULT NULL,
  `addip` varchar(50) DEFAULT NULL,
  `uptime` varchar(50) DEFAULT NULL,
  `upip` varchar(50) DEFAULT NULL,
  `lasttime` varchar(50) DEFAULT NULL,
  `lastip` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  FULLTEXT KEY `purview` (`purview`)
) ENGINE=MyISAM AUTO_INCREMENT=108 DEFAULT CHARSET=gbk");
E_D("replace into `dw_user` values('1','1',NULL,NULL,'admin','310606aa9a0e4a8a3460b1c8f0c7a67a','09411566e37a9c7494caeb674e72e131','0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'0','0',NULL,'0','0','0','','0',NULL,'','','','',NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,'225',NULL,NULL,'1355995019','127.0.0.1','1355995052','127.0.0.1');");
E_D("replace into `dw_user` values('86','1',NULL,NULL,'lotaies','c2dfd5e1673eaa53ffc666dc62aa1472','09411566e37a9c7494caeb674e72e131','0',NULL,'0','1','1','445202198411080321','data/upfiles/images/2011-11/03/86_user_13203179235.jpg','data/upfiles/images/2011-11/03/86_user_13203179234.jpg','329','阿来',NULL,'1','0','1','1','1','1','149296621@qq.com','2',NULL,'','15914948451','104749323','',NULL,NULL,'468691200','2184','2389','2391','','a:21:{s:12:\"withdraw_yes\";a:3:{s:7:\"message\";s:1:\"1\";s:5:\"email\";s:1:\"1\";s:5:\"phone\";s:1:\"1\";}s:11:\"withdraw_no\";a:3:{s:7:\"message\";s:1:\"1\";s:5:\"email\";s:1:\"1\";s:5:\"phone\";s:1:\"1\";}s:8:\"recharge\";a:3:{s:7:\"message\";s:1:\"1\";s:5:\"email\";s:1:\"1\";s:5:\"phone\";s:1:\"1\";}s:11:\"margin_thaw\";a:3:{s:7:\"message\";s:1:\"1\";s:5:\"email\";s:1:\"1\";s:5:\"phone\";s:1:\"1\";}s:13:\"recharge_down\";a:3:{s:7:\"message\";s:1:\"1\";s:5:\"email\";s:1:\"1\";s:5:\"phone\";s:1:\"1\";}s:7:\"vip_yes\";a:3:{s:7:\"message\";s:1:\"1\";s:5:\"email\";s:1:\"1\";s:5:\"phone\";s:1:\"1\";}s:6:\"vip_no\";a:3:{s:7:\"message\";s:1:\"1\";s:5:\"email\";s:1:\"1\";s:5:\"phone\";s:1:\"1\";}s:10:\"borrow_msg\";a:3:{s:7:\"message\";s:1:\"1\";s:5:\"email\";s:1:\"1\";s:5:\"phone\";s:1:\"1\";}s:10:\"borrow_end\";a:3:{s:7:\"message\";s:1:\"1\";s:5:\"email\";s:1:\"1\";s:5:\"phone\";s:1:\"1\";}s:16:\"borrow_review_no\";a:3:{s:7:\"message\";s:1:\"1\";s:5:\"email\";s:1:\"1\";s:5:\"phone\";s:1:\"1\";}s:10:\"borrow_yes\";a:3:{s:7:\"message\";s:1:\"1\";s:5:\"email\";s:1:\"1\";s:5:\"phone\";s:1:\"1\";}s:9:\"borrow_no\";a:3:{s:7:\"message\";s:1:\"1\";s:5:\"email\";s:1:\"1\";s:5:\"phone\";s:1:\"1\";}s:11:\"borrow_join\";a:3:{s:7:\"message\";s:1:\"1\";s:5:\"email\";s:1:\"1\";s:5:\"phone\";s:1:\"1\";}s:17:\"borrow_review_yes\";a:3:{s:7:\"message\";s:1:\"1\";s:5:\"email\";s:1:\"1\";s:5:\"phone\";s:1:\"1\";}s:11:\"loan_update\";a:3:{s:7:\"message\";s:1:\"1\";s:5:\"email\";s:1:\"1\";s:5:\"phone\";s:1:\"1\";}s:8:\"loan_end\";a:3:{s:7:\"message\";s:1:\"1\";s:5:\"email\";s:1:\"1\";s:5:\"phone\";s:1:\"1\";}s:16:\"loan_yes_account\";a:3:{s:7:\"message\";s:1:\"1\";s:5:\"email\";s:1:\"1\";s:5:\"phone\";s:1:\"1\";}s:15:\"loan_no_account\";a:3:{s:7:\"message\";s:1:\"1\";s:5:\"email\";s:1:\"1\";s:5:\"phone\";s:1:\"1\";}s:8:\"loan_pay\";a:3:{s:7:\"message\";s:1:\"1\";s:5:\"email\";s:1:\"1\";s:5:\"phone\";s:1:\"1\";}s:13:\"loan_advanced\";a:3:{s:7:\"message\";s:1:\"1\";s:5:\"email\";s:1:\"1\";s:5:\"phone\";s:1:\"1\";}s:11:\"loan_assess\";a:3:{s:7:\"message\";s:1:\"1\";s:5:\"email\";s:1:\"1\";s:5:\"phone\";s:1:\"1\";}}',NULL,'116','1320307646','127.0.0.1','1322216122','58.253.140.148','1322222930','58.253.140.148');");
E_D("replace into `dw_user` values('87','3',NULL,NULL,'金兰芬阿来','c2dfd5e1673eaa53ffc666dc62aa1472',NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,'陈晓丰',NULL,'1','0',NULL,'0','0','0','admin@80cz.net','1',NULL,'8575174','15018226680','104749323','lotaies',NULL,NULL,'1984-12-21','2184','2389','2392','揭阳市东山区新阳路新河南二区B区104号',NULL,NULL,'0','1320321037','127.0.0.1','1320321037','127.0.0.1','1320321037','127.0.0.1');");
E_D("replace into `dw_user` values('85','2',NULL,NULL,'阿来','09411566e37a9c7494caeb674e72e131',NULL,'0','','0',NULL,'1','445201198412210013',NULL,NULL,NULL,'陈晓丰',NULL,'1','0','1','0','0','0','676668697@qq.com','1',NULL,'0663-8575174','15018226680','676668697','lotaies@163.com',NULL,NULL,'472406400','2184','2389','2391','广东省揭阳市东山区新河南二区',NULL,NULL,'0','1320299505','127.0.0.1','1320299505','127.0.0.1','1320299505','127.0.0.1');");
E_D("replace into `dw_user` values('84',NULL,NULL,NULL,'alai','09411566e37a9c7494caeb674e72e131',NULL,'0',NULL,'0',NULL,'1','445201198412210013',NULL,NULL,NULL,'陈晓丰',NULL,'1','0',NULL,'0','0','1','104749323@qq.com','1',NULL,'','','','',NULL,NULL,'472406400','2184','2389','2390','',NULL,NULL,'1','1320297068','127.0.0.1','1320297068','127.0.0.1','1320297084','127.0.0.1');");
E_D("replace into `dw_user` values('88','2',NULL,NULL,'小贷','09411566e37a9c7494caeb674e72e131','c2dfd5e1673eaa53ffc666dc62aa1472','0','','0','1','1','440525197411045317','data/upfiles/images/2011-11/03/88_user_13203309194.jpg','data/upfiles/images/2011-11/03/88_user_13203309193.jpg','329','潮商贷款',NULL,'0','0','1','0','0','0','lotaies@163.com','1',NULL,NULL,'','',NULL,NULL,NULL,'152726400','2184','2389','2390',NULL,NULL,NULL,'5','1320330271','127.0.0.1','1320387535','127.0.0.1','1320897486','27.47.118.133');");
E_D("replace into `dw_user` values('89','2',NULL,NULL,'金兰芬扑面','09411566e37a9c7494caeb674e72e131',NULL,'0','','0',NULL,'','',NULL,NULL,NULL,'林友',NULL,'0','0','1','0','0','0','dllotaies@163.com','',NULL,NULL,'','',NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,'1','1320387935','127.0.0.1','1320387935','127.0.0.1','1320388037','127.0.0.1');");
E_D("replace into `dw_user` values('63','1',NULL,NULL,'jiedai','dd839070937e095a568a44f85c930aab',NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,'点点',NULL,'1','0',NULL,'0','0','0','hezejiayuan@qq.com','0',NULL,'','','','',NULL,NULL,'','','','','',NULL,NULL,'66','1316758049','120.193.119.210','1320305006','127.0.0.1','1320305360','127.0.0.1');");
E_D("replace into `dw_user` values('90',NULL,NULL,NULL,'陈勇88','09411566e37a9c7494caeb674e72e131','09411566e37a9c7494caeb674e72e131','0',NULL,'0','1','1','445221198707074974','data/upfiles/images/2011-11/06/90_user_13205549396.jpg','data/upfiles/images/2011-11/06/90_user_13205549384.jpg','365','陈勇',NULL,'1','0','1','1','0','0','chenyong19870707@163.com','1',NULL,'','15018226681','104548758','',NULL,NULL,'552582000','2184','2389','2390','',NULL,NULL,'8','1320472268','27.47.105.90','1320933070','27.47.118.133','1321005666','27.47.118.133');");
E_D("replace into `dw_user` values('91','2',NULL,NULL,'rekin','2946d8c9d01b294f3b53dd10e2d26687',NULL,'0','','0','1','1','445202198207260018','data/upfiles/images/2011-11/05/91_user_13204810700.jpg','data/upfiles/images/2011-11/05/91_user_13204810706.jpg','329','郑锐生',NULL,'1','0','1','0','0','0','rekin0663@126.com','1',NULL,'','','','',NULL,NULL,'396460800','2184','2389','2391','',NULL,NULL,'4','1320480794','27.47.105.90','1320568564','116.19.41.8','1320589368','119.137.200.250');");
E_D("replace into `dw_user` values('92','2',NULL,NULL,'killy','09411566e37a9c7494caeb674e72e131',NULL,'0','','0','1','1','445202198703138521','data/upfiles/images/2011-11/06/92_user_13205555753.jpg','data/upfiles/images/2011-11/06/92_user_13205555751.jpg','329','廖晓漫',NULL,'0','1','1','0','0','0','xiaomang888888@163.com','2',NULL,NULL,'','',NULL,NULL,NULL,'542563200','','','',NULL,NULL,NULL,'1','1320555411','27.47.105.90','1320555411','27.47.105.90','1320555643','27.47.105.90');");
E_D("replace into `dw_user` values('93','2',NULL,NULL,'mmiinn','09411566e37a9c7494caeb674e72e131',NULL,'0','','0','1','1','441424197910012535',NULL,NULL,'329','苏小',NULL,'0','0','1','0','0','0','1094234802@qq.com','1',NULL,NULL,'','',NULL,NULL,NULL,'723398400','2184','2389','2391',NULL,NULL,NULL,'4','1320639805','120.83.112.144','1320729162','27.47.118.133','1320733512','27.47.118.133');");
E_D("replace into `dw_user` values('94',NULL,NULL,NULL,'huangxh','09411566e37a9c7494caeb674e72e131',NULL,'0',NULL,'0','1','1','445221197904064519','data/upfiles/images/2011-11/09/94_user_13208106069.jpg','data/upfiles/images/2011-11/09/94_user_13208106067.jpg','329','黄旭辉',NULL,'1','0','1','0','0','0','huangxuhuei1979@163.com','1',NULL,'','','','',NULL,NULL,'292176000','2184','2389','2392','',NULL,NULL,'3','1320810554','27.47.118.133','1320810765','27.47.118.133','1320810923','27.47.118.133');");
E_D("replace into `dw_user` values('95',NULL,NULL,NULL,'longsheng','09411566e37a9c7494caeb674e72e131',NULL,'0',NULL,'0','1','1','445221197702046515','data/upfiles/images/2011-11/09/95_user_13208112966.jpg','data/upfiles/images/2011-11/09/95_user_13208112964.jpg','329','陈龙生',NULL,'1','0','1','0','0','0','longsheng987456@163.com','1',NULL,'','','','',NULL,NULL,'247766400','2184','2389','2392','',NULL,NULL,'2','1320811164','27.47.118.133','1320811221','27.47.118.133','1320811386','27.47.118.133');");
E_D("replace into `dw_user` values('96','2',NULL,NULL,'xudong1980','09411566e37a9c7494caeb674e72e131',NULL,'0','','0','1','1','445221198005035612','data/upfiles/images/2011-11/09/96_user_13208120121.jpg','data/upfiles/images/2011-11/09/96_user_13208120126.jpg','329','吴旭东',NULL,'0','1','1','0','0','0','xudong19800503@163.com','1',NULL,NULL,'','',NULL,NULL,NULL,'1320768000','2184','2389','2392',NULL,NULL,NULL,'1','1320811912','27.47.118.133','1320811912','27.47.118.133','1320812074','27.47.118.133');");
E_D("replace into `dw_user` values('97','2',NULL,NULL,'yangweiqin','09411566e37a9c7494caeb674e72e131',NULL,'0','','0','1','1','445202199010282752','data/upfiles/images/2011-11/09/97_user_13208128247.jpg','data/upfiles/images/2011-11/09/97_user_13208128241.jpg','329','杨炜庆',NULL,'0','0','1','0','0','0','yangweiqin1990@163.com','1',NULL,'','','','',NULL,NULL,'1320681600','2184','2389','2392','',NULL,NULL,'2','1320812640','27.47.118.133','1320812699','27.47.118.133','1320812892','27.47.118.133');");
E_D("replace into `dw_user` values('98','2',NULL,NULL,'minmin','09411566e37a9c7494caeb674e72e131',NULL,'0','','0','1','1','445202198510062735','data/upfiles/images/2011-11/09/98_user_13208139997.jpg','data/upfiles/images/2011-11/09/98_user_13208139989.jpg','329','章顺鑫',NULL,'0','0','1','0','0','0','2274744235@qq.com','1',NULL,'','','2274744235','',NULL,NULL,'497376000','2184','2389','2391','',NULL,NULL,'9','1320813300','27.47.118.133','1321514832','120.84.100.162','1322191958','27.43.191.9');");
E_D("replace into `dw_user` values('99','2',NULL,NULL,'jacky0663','6507a12d7a8658f48750f21113774a9c','e90f64a91050687fa3083dc9fc691d2e','0','','0','1','1','445202199005022438',NULL,NULL,'329','张家阳',NULL,'0','1','1','13413982850','0','0','119916420@qq.com','1',NULL,'','','119916420','','7','广东省揭阳市','641574000','2184','2389','2391','',NULL,'a:9:{s:6:\"friend\";s:1:\"0\";s:14:\"friend_comment\";s:1:\"0\";s:11:\"borrow_list\";s:1:\"0\";s:8:\"loan_log\";s:1:\"0\";s:8:\"sent_msg\";s:1:\"0\";s:14:\"friend_request\";s:1:\"0\";s:10:\"look_black\";s:1:\"0\";s:16:\"allow_black_sent\";s:1:\"1\";s:19:\"allow_black_request\";s:1:\"1\";}','10','1320817387','113.117.47.122','1321427161','113.117.24.209','1321684309','113.117.46.56');");
E_D("replace into `dw_user` values('100','2',NULL,NULL,'平凡人生','76bc75d093441e05d75e8f73bca81a89',NULL,'0','','0','1','1','445281198404111033','data/upfiles/images/2011-11/10/100_user_13209146855.jpg','data/upfiles/images/2011-11/10/100_user_13209146855.jpg','329','黄伟强',NULL,'0','0','1','1','0','1','458705212@qq.com','1',NULL,'','13695126903','','',NULL,NULL,'450460800','2184','2389','2395','',NULL,NULL,'3','1320914329','27.47.118.133','1321452983','125.91.196.94','1321516219','125.91.196.94');");
E_D("replace into `dw_user` values('101','2',NULL,NULL,'俄狠幸福','09411566e37a9c7494caeb674e72e131',NULL,'0','','0',NULL,'','',NULL,NULL,NULL,'庄瑞钰',NULL,'0','0','1','0','0','0','1506477395@qq.com','',NULL,NULL,'','',NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,'1','1320924684','27.47.118.133','1320924684','27.47.118.133','1320924703','27.47.118.133');");
E_D("replace into `dw_user` values('102','2',NULL,NULL,'新思维小陈','67e07e90f6cf4e1db1c67bd478784100','422def6f63f53226325a9e4c317c0087','0','','0','1','1','350821198809175131','data/upfiles/images/2011-11/11/102_user_13209932957.jpg','data/upfiles/images/2011-11/11/102_user_13209932953.jpg','329','陈长华',NULL,'0','0','1','1','0','1','1056765934@qq.com','1',NULL,NULL,'13380594091','1056765934',NULL,'7','福建龙岩','905961600','2184','2389','2391',NULL,NULL,'a:9:{s:6:\"friend\";s:1:\"1\";s:14:\"friend_comment\";s:1:\"2\";s:11:\"borrow_list\";s:1:\"4\";s:8:\"loan_log\";s:1:\"0\";s:8:\"sent_msg\";s:1:\"0\";s:14:\"friend_request\";s:1:\"0\";s:10:\"look_black\";s:1:\"0\";s:16:\"allow_black_sent\";s:1:\"0\";s:19:\"allow_black_request\";s:1:\"0\";}','0','1320936612','116.19.47.24','1320936612','116.19.47.24','1320936612','116.19.47.24');");
E_D("replace into `dw_user` values('103','2',NULL,NULL,'金兰芬小贷','09411566e37a9c7494caeb674e72e131','09411566e37a9c7494caeb674e72e131','0','','0',NULL,'','',NULL,NULL,NULL,'好易贷',NULL,'0','0','1','0','0','0','2609546613@qq.com','',NULL,NULL,'','',NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,'1','1321112116','120.84.98.127','1321112116','120.84.98.127','1321247236','120.84.100.162');");
E_D("replace into `dw_user` values('104','2',NULL,NULL,'jacky0754','6507a12d7a8658f48750f21113774a9c',NULL,'0','','0',NULL,'','',NULL,NULL,NULL,'张家阳',NULL,'0','1','1','0','0','0','295944826@qq.com','',NULL,NULL,'','',NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,'0','1321427343','113.117.24.209','1321427343','113.117.24.209','1321427343','113.117.24.209');");
E_D("replace into `dw_user` values('105','2',NULL,NULL,'chenshunfeng','af42b44247ccf6189a1e53c0fae0de0b',NULL,'0','','0',NULL,'1','',NULL,NULL,NULL,'陈顺丰',NULL,'0','1','1','0','0','0','32969831@qq.com','1',NULL,'','','32969831','',NULL,NULL,'','','','','',NULL,NULL,'0','1321501556','121.11.108.47','1321501556','121.11.108.47','1321501556','121.11.108.47');");
E_D("replace into `dw_user` values('106','2',NULL,NULL,'爷有钱','09411566e37a9c7494caeb674e72e131',NULL,'0','','0',NULL,'','',NULL,NULL,NULL,'爷有钱',NULL,'0','0',NULL,'0','0','0','12580@qq.com','',NULL,NULL,'','',NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,'0','1321631408','120.84.100.162','1321631408','120.84.100.162','1321631408','120.84.100.162');");
E_D("replace into `dw_user` values('107','2',NULL,NULL,'lotaies14','09411566e37a9c7494caeb674e72e131',NULL,'0','','0',NULL,'','',NULL,NULL,NULL,'填写的',NULL,'0','0',NULL,'0','0','0','lotaies14@163.com','',NULL,NULL,'','',NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,'0','1321631569','120.84.100.162','1321631569','120.84.100.162','1321631569','120.84.100.162');");

require("../../inc/footer.php");
?>