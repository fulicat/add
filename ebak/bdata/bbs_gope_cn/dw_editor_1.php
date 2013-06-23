<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `dw_editor`;");
E_C("CREATE TABLE `dw_editor` (
  `editor_id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `version` varchar(20) DEFAULT NULL,
  `author` varchar(20) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  `api` text,
  PRIMARY KEY (`editor_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=gbk");
E_D("replace into `dw_editor` values('1','sinaeditor','新浪编辑器','好用的新浪编辑器','1.0','新浪','2010-08-13','require_once(ROOT_PATH .\"/plugins/editor/sinaeditor/Editor.class.php\");\r\n\$editor=new sinaEditor(\$name);\r\n	\$editor->Value= \"\$value\";\r\n\r\n	\$editor->AutoSave=false;\r\n	echo \$editor->Create();');");

require("../../inc/footer.php");
?>