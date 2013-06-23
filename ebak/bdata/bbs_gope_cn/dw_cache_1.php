<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `dw_cache`;");
E_C("CREATE TABLE `dw_cache` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(20) DEFAULT NULL,
  `user_num` int(11) DEFAULT NULL,
  `user_online_num` int(11) DEFAULT '0',
  `user_online_time` varchar(30) DEFAULT NULL,
  `last_user` varchar(20) DEFAULT NULL,
  `bbs_first_visit` int(20) DEFAULT '0',
  `bbs_topics_num` int(11) DEFAULT NULL,
  `bbs_posts_num` int(11) DEFAULT NULL,
  `bbs_today_topics` int(11) DEFAULT NULL,
  `bbs_today_posts` int(11) DEFAULT NULL,
  `bbs_yesterday_topics` int(11) DEFAULT NULL,
  `bbs_yesterday_posts` int(11) DEFAULT NULL,
  `bbs_most_topics` int(11) DEFAULT NULL,
  `bbs_most_posts` int(11) DEFAULT NULL,
  `borrow_account` varchar(11) DEFAULT '0',
  `borrow_success` varchar(20) DEFAULT '0',
  `borrow_num` int(10) DEFAULT '0',
  `borrow_successnum` varchar(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=gbk");
E_D("replace into `dw_cache` values('3','2011-11-04','0','1','1320421489','0','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0','0','0','0');");
E_D("replace into `dw_cache` values('1','2011-11-03','7','2','1320334678','小贷','1320335229','11','11','0','0','0','0','0','0','0','0','0','0');");
E_D("replace into `dw_cache` values('2','2011-11-04','7','2','1320383769','小贷','1320389786','11','11','0','0','0','0','0','0','0','0','0','0');");
E_D("replace into `dw_cache` values('4','2011-11-05','8','48','1320508774','金兰芬扑面','1320472185','11','13','0','2','0','0','0','0','0','0','0','0');");
E_D("replace into `dw_cache` values('5','2011-11-06','10','9','1320570988','rekin','1320542941','12','14','1','1','0','2','0','2','0','0','0','0');");
E_D("replace into `dw_cache` values('6','2011-11-07','11','8','1320678251','killy','1320596624','12','15','0','0','1','1','1','2','0','0','0','0');");
E_D("replace into `dw_cache` values('7','2011-11-08','12','19','1320764960','mmiinn','1320681605','15','14','3','0','0','0','1','2','0','0','0','0');");
E_D("replace into `dw_cache` values('8','2011-11-09','12','7','1320813407','mmiinn','1320768384','18','18','3','1','3','0','3','2','0','0','0','0');");
E_D("replace into `dw_cache` values('9','2011-11-10','18','23','1320937703','jacky0663','1320854597','22','22','4','1','3','1','3','2','0','0','0','0');");
E_D("replace into `dw_cache` values('10','2011-11-11','21','9','1321006661','新思维小陈','1320942875','25','27','3','1','4','1','4','2','0','0','0','0');");
E_D("replace into `dw_cache` values('11','2011-11-12','21','30','1321110525','新思维小陈','1321030504','32','41','7','11','3','1','4','2','0','0','0','0');");
E_D("replace into `dw_cache` values('12','2011-11-13','22','9','1321185654','金兰芬小贷','1321113776','32','48','0','0','7','11','7','11','0','0','0','0');");
E_D("replace into `dw_cache` values('13','2011-11-14','22','9','1321282904','金兰芬小贷','1321200336','32','49','0','1','0','0','7','11','0','0','0','0');");
E_D("replace into `dw_cache` values('14','2011-11-14','22','9','1321282904','金兰芬小贷','1321200336','32','49','0','1','0','0','7','11','0','0','0','0');");
E_D("replace into `dw_cache` values('15','2011-11-15','22','9','1321286764','金兰芬小贷','1321286683','35','49','3','0','0','1','7','11','0','0','0','0');");
E_D("replace into `dw_cache` values('16','2011-11-16','22','139','1321458618','金兰芬小贷','1321372851','35','52','0','0','3','0','7','11','0','0','0','0');");
E_D("replace into `dw_cache` values('17','2011-11-17','23','25','1321508502','jacky0754','1321459223','38','52','3','0','0','0','7','11','0','0','0','0');");
E_D("replace into `dw_cache` values('18','2011-11-18','24','41','1321631619','chenshunfeng','1321545793','38','55','0','0','3','0','7','11','0','0','0','0');");
E_D("replace into `dw_cache` values('19','2011-11-19','26','33','1321632137','lotaies14','1321632020','38','55','0','0','0','0','7','11','0','0','0','0');");
E_D("replace into `dw_cache` values('20','2011-11-20','26','24','1321774055','lotaies14','1321723349','38','55','0','0','0','0','7','11','0','0','0','0');");
E_D("replace into `dw_cache` values('21','2011-11-21','26','46','1321887426','lotaies14','1321806189','38','55','0','0','0','0','7','11','0','0','0','0');");
E_D("replace into `dw_cache` values('22','2011-11-22','26','6','1321958986','lotaies14','1321891621','38','55','0','0','0','0','7','11','0','0','0','0');");
E_D("replace into `dw_cache` values('23','2011-11-23','26','6','1321989422','lotaies14','1321977657','38','55','0','0','0','0','7','11','0','0','0','0');");
E_D("replace into `dw_cache` values('24','2011-11-24','26','2','1322131129','lotaies14','1322131971','38','55','0','0','0','0','7','11','0','0','0','0');");
E_D("replace into `dw_cache` values('25','2011-11-25','26','5','1322168772','lotaies14','1322193958','38','55','0','0','0','0','7','11','0','0','0','0');");
E_D("replace into `dw_cache` values('26','2012-11-13','26','2','1352793727','lotaies14','1352793175','38','55','0','0','0','0','7','11','0','0','0','0');");
E_D("replace into `dw_cache` values('27','2012-12-20','26','2','1355991816','lotaies14','1355992205','38','55','0','0','0','0','7','11','0','0','0','0');");
E_D("replace into `dw_cache` values('28','2012-12-20','26','2','1355991816','lotaies14','1355992205','38','55','0','0','0','0','7','11','0','0','0','0');");

require("../../inc/footer.php");
?>