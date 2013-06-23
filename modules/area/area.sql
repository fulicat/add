CREATE TABLE IF NOT EXISTS `{area}` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `nid` varchar(50) NOT NULL,
  `pid` int(11) NOT NULL,
  `domain` varchar(100) NOT NULL,
  `order` int(11) NOT NULL,
  PRIMARY KEY (`id`),
	KEY `nid` (`nid`),
	KEY `pid` (`pid`),
) ENGINE=MyISAM;

