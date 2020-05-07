/*
Navicat MySQL Data Transfer

Source Server         : study
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : test_niuniu

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2020-05-06 23:18:29
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for xj
-- ----------------------------
DROP TABLE IF EXISTS `xj`;
CREATE TABLE `xj` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `questiona` varchar(255) DEFAULT NULL,
  `questionb` varchar(255) DEFAULT NULL,
  `questionc` varchar(255) DEFAULT NULL,
  `questiond` varchar(255) DEFAULT NULL,
  `questione` varchar(255) DEFAULT NULL,
  `questionf` varchar(255) DEFAULT NULL,
  `questiong` varchar(255) DEFAULT NULL,
  `questionh` varchar(255) DEFAULT NULL,
  `questioni` text,
  `created` datetime DEFAULT '2000-01-01 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
