CREATE TABLE IF NOT EXISTS `{payment}` (
  `id` mediumint(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `nid` varchar(100) DEFAULT NULL,
  `status` smallint(3) unsigned NOT NULL DEFAULT '0',
  `style` int(2) NOT NULL,
  `config` longtext,
  `fee` int(10) NOT NULL DEFAULT '0',
  `fee_type` int(2) NOT NULL,
  `max_money` int(10) NOT NULL,
  `max_fee` int(10) NOT NULL,
  `description` longtext,
  `order` smallint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM   ;

CREATE TABLE IF NOT EXISTS `{payment_type}` (
  `id` mediumint(9) NOT NULL auto_increment,
  `name` varchar(100) default NULL,
  `nid` varchar(100) default NULL,
  `type` varchar(30) NOT NULL default '',
  `description` longtext,
  `order` smallint(3) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM   ;

