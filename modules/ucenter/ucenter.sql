
DROP TABLE IF EXISTS `{ucenter}`;
CREATE TABLE IF NOT EXISTS `{ucenter}` (
	`user_id` INT NOT NULL,
	`uc_user_id` INT NOT NULL,
  PRIMARY KEY (`user_id`)) ENGINE=MyISAM;