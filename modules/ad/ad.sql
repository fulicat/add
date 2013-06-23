CREATE TABLE IF NOT EXISTS `{ad}` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nid` varchar(20) NOT NULL,
  `order` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `litpic` varchar(100) NOT NULL,
  `timelimit` int(2) NOT NULL DEFAULT '0',
  `firsttime` varchar(20) NOT NULL DEFAULT '',
  `endtime` varchar(20) NOT NULL DEFAULT '',
  `content` text NOT NULL DEFAULT '',
  `endcontent` text NOT NULL DEFAULT '',
  `addtime` varchar(50) NOT NULL,
  `addip` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

