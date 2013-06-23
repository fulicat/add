<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('latin1');
E_D("DROP TABLE IF EXISTS `dw_user_typechange`;");
E_C("CREATE TABLE `dw_user_typechange` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `username` varchar(50) NOT NULL DEFAULT '',
  `status` int(2) NOT NULL DEFAULT '0',
  `old_type` varchar(10) NOT NULL DEFAULT '',
  `new_type` varchar(10) NOT NULL DEFAULT '',
  `content` varchar(255) NOT NULL DEFAULT '',
  `addtime` varchar(20) NOT NULL DEFAULT '',
  `addip` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1");

require("../../inc/footer.php");
?>