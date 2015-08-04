
CREATE DATABASE `ephpdb` /*!40100 DEFAULT CHARACTER SET utf8 */;

CREATE TABLE `secrets` (
  `client_id` varchar(256) NOT NULL,
  `client_secret` varchar(256) NOT NULL,
  `appname` varchar(45) DEFAULT NULL,
  `id` int(5) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

CREATE TABLE `shop_registation` (
  `id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `slogan` varchar(256) DEFAULT NULL,
  `store_front_url` varchar(512) DEFAULT NULL,
  `mbo_url` varchar(512) DEFAULT NULL,
  `registered_on` timestamp NULL DEFAULT NULL,
  `name_registration` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `fax` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `shops` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(256) NOT NULL,
  `api_url` varchar(512) NOT NULL,
  `return_url` varchar(512) NOT NULL,
  `access_token` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;

