<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `dw_bbs_credits`;");
E_C("CREATE TABLE `dw_bbs_credits` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `creditscode` char(45) DEFAULT NULL,
  `creditsname` char(45) DEFAULT NULL,
  `postvar` int(11) DEFAULT '0',
  `replyvar` int(11) DEFAULT '0',
  `goodvar` int(11) DEFAULT '0',
  `uploadvar` int(11) DEFAULT '0',
  `downvar` int(11) DEFAULT '0',
  `votevar` int(11) DEFAULT '0',
  `isuse` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=gbk ROW_FORMAT=FIXED");
E_D("replace into `dw_bbs_credits` values('1','credits1','½ðÇ®','5','1','10','1','0','1','1');");
E_D("replace into `dw_bbs_credits` values('2','credits2','÷ÈÁ¦','3','1','10','112','21','1','1');");
E_D("replace into `dw_bbs_credits` values('3','credits3','ÍþÍû','223','23','1012','312','2','1','1');");
E_D("replace into `dw_bbs_credits` values('4','credits4','1231','0','0','0','0','0','0','0');");
E_D("replace into `dw_bbs_credits` values('5','credits5','','0','0','0','0','0','0','0');");
E_D("replace into `dw_bbs_credits` values('6','credits6','','0','0','0','0','0','0','0');");
E_D("replace into `dw_bbs_credits` values('7','credits7','','0','0','0','0','0','0','1');");
E_D("replace into `dw_bbs_credits` values('8','credits8','','0','0','0','0','0','0','0');");

require("../../inc/footer.php");
?>