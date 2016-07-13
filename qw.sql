/*
Navicat MySQL Data Transfer

Source Server         : localhost myphp
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : qw

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2016-07-01 09:40:59
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `qi_brand`
-- ----------------------------
DROP TABLE IF EXISTS `qi_brand`;
CREATE TABLE `qi_brand` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `remark` varchar(200) DEFAULT NULL,
  `date_add` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_edit` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qi_brand
-- ----------------------------
INSERT INTO `qi_brand` VALUES ('1', '苹果', '乔布斯的苹果', '2016-05-16 11:01:13', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_brand` VALUES ('2', '小米', '雷军的小米', '2016-05-16 11:01:59', '0000-00-00 00:00:00', '1');

-- ----------------------------
-- Table structure for `qi_film`
-- ----------------------------
DROP TABLE IF EXISTS `qi_film`;
CREATE TABLE `qi_film` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1电影2电视剧',
  `name_ch` varchar(50) NOT NULL,
  `name_en` varchar(50) DEFAULT NULL,
  `name_other` varchar(200) DEFAULT NULL,
  `name_mark` varchar(50) DEFAULT NULL,
  `day_ch` date NOT NULL DEFAULT '0000-00-00',
  `day` date NOT NULL DEFAULT '0000-00-00',
  `place` int(20) NOT NULL DEFAULT '0',
  `year` int(20) NOT NULL DEFAULT '0',
  `language` varchar(20) DEFAULT NULL,
  `imdb` varchar(20) DEFAULT NULL,
  `imdb_score` decimal(3,1) NOT NULL DEFAULT '0.0',
  `douban` varchar(20) DEFAULT NULL,
  `douban_score` decimal(3,1) NOT NULL DEFAULT '0.0',
  `photo0` varchar(50) DEFAULT NULL,
  `photo1` varchar(50) DEFAULT NULL,
  `photo2` varchar(50) DEFAULT NULL,
  `photo3` varchar(50) DEFAULT NULL,
  `photo4` varchar(50) DEFAULT NULL,
  `date_add` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_edit` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(1) DEFAULT '0' COMMENT '0普通1正在放映2火热',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10002 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qi_film
-- ----------------------------
INSERT INTO `qi_film` VALUES ('10000', '1', '大话西游之月光宝盒', ' A Chinese Odyssey Part One - Pandora\'s Box', '西游记101回月光宝盒 / 齐天大圣东游记 / 大话东游之一/西遊記第壹佰零壹回之月光寶盒', '111111', '2015-10-24', '1995-01-02', '39', '78', '粤语', 'tt0112778', '7.9', '1299398', '8.9', 'bbd52f7ac79db6de9a59e845f892e3fc.jpg', 'a6f684abbd0d21e66d671e2d0efb0861.jpg', '', '', '', '2015-11-27 00:00:00', '2015-11-28 00:00:00', '0');
INSERT INTO `qi_film` VALUES ('10001', '1', '大话西游之大圣娶亲', 'A Chinese Odyssey Part Two - Cinderella', '西游记完结篇仙履奇缘 / 西遊記大結局之仙履奇緣/齐天大圣西游记 / 大话东游之二 / ', '', '2014-10-24', '1995-02-04', '39', '78', '粤语', 'tt0114996', '8.1', '1292213', '9.1', '39dfb9b73a5dd7c3d0db4ef0bfc84951.jpg', 'ee0c1c7bfb5fa35a364974d3478821c9.jpg', 'df641221a5dbb634f0e3a2ebc93240ed.jpg', '', '', '2015-11-27 00:00:00', '2015-11-28 00:00:00', '0');

-- ----------------------------
-- Table structure for `qi_film_content`
-- ----------------------------
DROP TABLE IF EXISTS `qi_film_content`;
CREATE TABLE `qi_film_content` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `film_id` int(20) NOT NULL DEFAULT '0',
  `content` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`,`film_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qi_film_content
-- ----------------------------
INSERT INTO `qi_film_content` VALUES ('1', '10000', '孙悟空（周星驰）护送唐三藏（罗家英）去西天取经路上，与牛魔王合谋欲杀害唐三藏，并偷走了月光宝盒，此举使观音萌生将其铲除心思，经唐三藏请求，孙悟空被判五百年后重新投胎做人赎其罪孽。 \n　　五百年后孙悟空化身强盗头头至尊宝。当遇见预谋吃唐僧肉的妖怪姐妹蜘蛛精春三十娘（蓝洁瑛）和白骨精白晶晶（莫文蔚）时，因为五百年前孙悟空曾与白晶晶有过一段恋情，至尊宝与她一见钟情，但因菩提老祖将二人妖怪身份相告，至尊宝仍带领众强盗开始与二妖展开周旋，过程中，白晶晶为救至尊宝打伤春三十娘，自己也中毒受伤，为了救白晶晶，至尊宝去找春三十娘，遭白晶晶误会，绝望自杀，至尊宝开始用月光宝盒以期使时光倒流。');
INSERT INTO `qi_film_content` VALUES ('2', '10001', '至尊宝（周星驰）被月光宝盒带回到五百年前，遇见紫霞仙子（朱茵），被对方打上烙印成为对方的人，并发觉自己已变成孙悟空。 \n　　紫霞与青霞（朱茵）本是如来佛祖座前日月神灯的灯芯（白天是紫霞，晚上是青霞），二人虽然同一肉身却仇恨颇深，因此紫霞立下誓言，谁能拔出她手中的紫青宝剑，谁就是她的意中人。紫青宝剑被至尊宝于不经意间拔出，紫霞决定以身相许，却遭一心记挂白晶晶（莫文蔚）的至尊宝拒绝。后牛魔王救下迷失在沙漠中的紫霞，并逼紫霞与他成婚，关键时刻，至尊宝现身。');

-- ----------------------------
-- Table structure for `qi_format`
-- ----------------------------
DROP TABLE IF EXISTS `qi_format`;
CREATE TABLE `qi_format` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `remark` varchar(200) DEFAULT NULL,
  `date_add` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_edit` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qi_format
-- ----------------------------
INSERT INTO `qi_format` VALUES ('1', '颜色', '保留规格', '2016-05-16 15:00:57', '2016-05-17 09:51:34', '1');
INSERT INTO `qi_format` VALUES ('2', '尺寸', '1', '2016-05-17 09:47:45', '2016-06-17 15:33:27', '1');
INSERT INTO `qi_format` VALUES ('3', '内存', '', '2016-05-17 10:13:28', '2016-06-17 10:00:12', '1');

-- ----------------------------
-- Table structure for `qi_format_value`
-- ----------------------------
DROP TABLE IF EXISTS `qi_format_value`;
CREATE TABLE `qi_format_value` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `remark` varchar(20) DEFAULT NULL,
  `format_id` int(20) NOT NULL DEFAULT '0',
  `date_add` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_edit` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qi_format_value
-- ----------------------------
INSERT INTO `qi_format_value` VALUES ('1', '乳白色', '255,251,240', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('2', '白色', '255,255,255', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('3', '米白色', '238,222,176', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('4', '浅灰色', '228,228,228', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('5', '深灰色', '102,102,102', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('6', '灰色', '128,128,128', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('7', '银色', '192,192,192', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('8', '黑色', '0,0,0', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('9', '桔红色', '255,117,0', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('10', '玫红色', '223,27,118', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('11', '粉红色', '255,182,193', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('12', '红色', '255,0,0', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('13', '藕色', '238,208,216', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('14', '西瓜红', '240,86,84', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('15', '酒红色', '153,0,0', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('16', '卡其色', '195,176,145', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('17', '姜黄色', '255,199,115', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('18', '明黄色', '255,255,1', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('19', '杏色', '247,238,214', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('20', '柠檬黄', '255, 236, 67', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('21', '桔色', '255,165,0', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('22', '浅黄色', '250,255,114', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('23', '荧光黄', '234,255,86', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('24', '金色', '255,215,0', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('25', '香槟色', '255,249,177', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('26', '黄色', '255,255,0', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('27', '军绿色', '93,118,42', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('28', '墨绿色', '66,204,33', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('29', '浅绿色', '152,251,152', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('30', '绿色', '0,128,0', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('31', '翠绿色', '10,163,68', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('32', '荧光绿', '35,250,7', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('33', '青色', '0,224,158', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('34', '天蓝色', '68,206,246', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('35', '孔雀蓝', '0,164,197', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('36', '宝蓝色', '75,92,196', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('37', '浅蓝色', '210,240,244', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('38', '深蓝色', '4,22,144', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('39', '湖蓝色', '48,223,243', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('40', '蓝色', '0,0,254', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('41', '藏青色', '46,78,126', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('42', '浅紫色', '237,224,230', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('43', '深紫色', '67,6,83', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('44', '紫红色', '139,0,98', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('45', '紫罗兰', '183,172,228', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('46', '紫色', '128,0,128', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('47', '咖啡色', '96,57,18', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('48', '巧克力色', '96,57,18', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('49', '栗色', '96,40,30', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('50', '浅棕色', '179,92,68', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('51', '深卡其布色', '189,183,107', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('52', '深棕色', '124,75,0', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('53', '褐色', '133,91,0', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('54', '驼色', '168,132,98', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('55', '花色', '255,255,255', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('56', '透明', '255,255,255', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('57', 'S', null, '2', '2016-06-17 09:59:39', '2016-06-17 15:33:27', '1');
INSERT INTO `qi_format_value` VALUES ('58', 'M', null, '2', '2016-06-17 09:59:52', '2016-06-17 15:33:27', '1');
INSERT INTO `qi_format_value` VALUES ('59', 'L', null, '2', '2016-06-17 09:59:52', '2016-06-17 15:33:27', '1');
INSERT INTO `qi_format_value` VALUES ('60', 'XL', null, '2', '2016-06-17 09:59:52', '2016-06-17 15:33:27', '1');
INSERT INTO `qi_format_value` VALUES ('61', '1G', null, '3', '2016-06-17 10:00:12', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('62', '2G', null, '3', '2016-06-17 10:00:12', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('63', '4G', null, '3', '2016-06-17 10:00:12', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('64', '8G', null, '3', '2016-06-17 10:00:12', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_format_value` VALUES ('65', '均码', null, '2', '2016-06-17 15:33:27', '0000-00-00 00:00:00', '1');

-- ----------------------------
-- Table structure for `qi_goods`
-- ----------------------------
DROP TABLE IF EXISTS `qi_goods`;
CREATE TABLE `qi_goods` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `goods_no` varchar(50) NOT NULL DEFAULT '0',
  `type_id` int(20) NOT NULL DEFAULT '0',
  `money_in` decimal(10,2) NOT NULL DEFAULT '0.00',
  `money_out` decimal(10,2) NOT NULL DEFAULT '0.00',
  `date_add` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_edit` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_status` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(1) NOT NULL DEFAULT '2' COMMENT '1上架2下架',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qi_goods
-- ----------------------------
INSERT INTO `qi_goods` VALUES ('1', '丝袜10', 'g1231231231', '2', '10.00', '15.00', '2016-06-21 16:39:05', '2016-06-27 10:33:06', '2016-06-21 16:40:48', '1');

-- ----------------------------
-- Table structure for `qi_goods_amount`
-- ----------------------------
DROP TABLE IF EXISTS `qi_goods_amount`;
CREATE TABLE `qi_goods_amount` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `goods_id` int(20) NOT NULL DEFAULT '0',
  `format1` int(20) NOT NULL DEFAULT '0',
  `format2` int(20) NOT NULL DEFAULT '0',
  `format3` int(20) NOT NULL DEFAULT '0',
  `format4` int(20) NOT NULL DEFAULT '0',
  `format5` int(20) NOT NULL DEFAULT '0',
  `format1_remark` varchar(20) DEFAULT NULL,
  `format2_remark` varchar(20) DEFAULT NULL,
  `format3_remark` varchar(20) DEFAULT NULL,
  `format4_remark` varchar(20) DEFAULT NULL,
  `format5_remark` varchar(20) DEFAULT NULL,
  `amount` int(20) NOT NULL,
  `money` decimal(10,2) NOT NULL DEFAULT '0.00',
  `date_add` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_edit` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qi_goods_amount
-- ----------------------------
INSERT INTO `qi_goods_amount` VALUES ('1', '1', '8', '57', '0', '0', '0', null, null, null, null, null, '101', '20.00', '2016-06-21 16:39:05', '2016-06-27 10:33:06', '1');
INSERT INTO `qi_goods_amount` VALUES ('2', '1', '8', '58', '0', '0', '0', null, null, null, null, null, '150', '20.00', '2016-06-21 16:39:05', '2016-06-27 10:33:06', '1');
INSERT INTO `qi_goods_amount` VALUES ('3', '1', '56', '57', '0', '0', '0', null, null, null, null, null, '200', '21.00', '2016-06-21 16:39:05', '2016-06-27 10:33:06', '1');
INSERT INTO `qi_goods_amount` VALUES ('4', '1', '56', '58', '0', '0', '0', null, null, null, null, null, '210', '21.00', '2016-06-21 16:39:05', '2016-06-27 10:33:06', '1');
INSERT INTO `qi_goods_amount` VALUES ('9', '1', '8', '59', '0', '0', '0', null, null, null, null, null, '11', '10.00', '2016-06-22 17:28:01', '2016-06-27 10:33:06', '1');
INSERT INTO `qi_goods_amount` VALUES ('10', '1', '56', '59', '0', '0', '0', null, null, null, null, null, '123', '10.00', '2016-06-22 17:28:01', '2016-06-27 10:33:06', '1');

-- ----------------------------
-- Table structure for `qi_goods_detail`
-- ----------------------------
DROP TABLE IF EXISTS `qi_goods_detail`;
CREATE TABLE `qi_goods_detail` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `goods_id` int(20) NOT NULL DEFAULT '0',
  `detail` varchar(2000) NOT NULL DEFAULT '',
  `date_add` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_edit` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qi_goods_detail
-- ----------------------------
INSERT INTO `qi_goods_detail` VALUES ('1', '1', '<p>撒旦法发达傻店范德萨发大法师地方</p><p>撒旦法放大师傅12</p>', '2016-06-21 16:39:05', '2016-06-27 10:33:06', '1');

-- ----------------------------
-- Table structure for `qi_goods_type`
-- ----------------------------
DROP TABLE IF EXISTS `qi_goods_type`;
CREATE TABLE `qi_goods_type` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '',
  `format1` int(20) NOT NULL DEFAULT '0' COMMENT '规格',
  `format2` int(20) NOT NULL DEFAULT '0',
  `format3` int(20) NOT NULL DEFAULT '0',
  `format4` int(20) NOT NULL DEFAULT '0',
  `format5` int(20) NOT NULL DEFAULT '0',
  `date_add` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_edit` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qi_goods_type
-- ----------------------------
INSERT INTO `qi_goods_type` VALUES ('1', '打底裤', '1', '2', '0', '0', '0', '2015-12-21 20:46:47', '2016-06-16 10:35:30', '1');
INSERT INTO `qi_goods_type` VALUES ('2', '丝袜', '1', '2', '0', '0', '0', '2015-12-21 20:47:25', '2016-06-16 14:23:45', '1');
INSERT INTO `qi_goods_type` VALUES ('3', '手机', '1', '2', '3', '0', '0', '2016-06-16 10:37:04', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_goods_type` VALUES ('4', '其他', '1', '0', '0', '0', '0', '2016-06-16 14:23:56', '2016-06-21 13:51:23', '1');

-- ----------------------------
-- Table structure for `qi_log`
-- ----------------------------
DROP TABLE IF EXISTS `qi_log`;
CREATE TABLE `qi_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT '日志记录人',
  `log_info` varchar(255) DEFAULT NULL,
  `ip_address` varchar(32) DEFAULT NULL,
  `date_add` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qi_log
-- ----------------------------
INSERT INTO `qi_log` VALUES ('1', '100', '登录成功', '127.0.0.1', '2015-11-12 07:06:41');
INSERT INTO `qi_log` VALUES ('2', '100', '登录成功', '127.0.0.1', '2015-11-12 07:09:27');
INSERT INTO `qi_log` VALUES ('3', '100', '登录成功', '127.0.0.1', '2015-11-12 07:11:47');
INSERT INTO `qi_log` VALUES ('4', '100', '登录成功', '127.0.0.1', '2015-11-12 07:12:13');
INSERT INTO `qi_log` VALUES ('5', '100', '登录成功', '127.0.0.1', '2015-11-12 14:12:56');
INSERT INTO `qi_log` VALUES ('6', '100', '登录成功', '127.0.0.1', '2015-11-13 08:41:58');
INSERT INTO `qi_log` VALUES ('7', '105', '登录成功', '127.0.0.1', '2015-11-13 10:21:09');
INSERT INTO `qi_log` VALUES ('8', '104', '登录成功', '127.0.0.1', '2015-11-13 10:23:39');
INSERT INTO `qi_log` VALUES ('9', '101', '登录成功', '127.0.0.1', '2015-11-13 10:27:48');
INSERT INTO `qi_log` VALUES ('10', '100', '登录成功', '127.0.0.1', '2015-11-13 10:35:46');
INSERT INTO `qi_log` VALUES ('11', '101', '登录成功', '127.0.0.1', '2015-11-13 10:49:27');
INSERT INTO `qi_log` VALUES ('12', '100', '登录成功', '127.0.0.1', '2015-11-13 11:01:12');
INSERT INTO `qi_log` VALUES ('13', '101', '登录成功', '127.0.0.1', '2015-11-13 11:02:15');
INSERT INTO `qi_log` VALUES ('14', '100', '登录成功', '127.0.0.1', '2015-11-13 13:35:02');
INSERT INTO `qi_log` VALUES ('15', '101', '登录成功', '127.0.0.1', '2015-11-13 13:35:32');
INSERT INTO `qi_log` VALUES ('16', '100', '登录成功', '127.0.0.1', '2015-11-13 13:43:39');
INSERT INTO `qi_log` VALUES ('17', '105', '登录成功', '127.0.0.1', '2015-11-13 13:45:02');
INSERT INTO `qi_log` VALUES ('18', '101', '登录成功', '127.0.0.1', '2015-11-13 13:45:27');
INSERT INTO `qi_log` VALUES ('19', '100', '登录成功', '127.0.0.1', '2015-11-13 13:46:35');
INSERT INTO `qi_log` VALUES ('20', '101', '登录成功', '127.0.0.1', '2015-11-13 13:48:09');
INSERT INTO `qi_log` VALUES ('21', '100', '登录成功', '127.0.0.1', '2015-11-13 13:48:52');
INSERT INTO `qi_log` VALUES ('22', '100', '登录成功', '127.0.0.1', '2015-11-13 13:49:38');
INSERT INTO `qi_log` VALUES ('23', '100', '登录成功', '127.0.0.1', '2015-11-13 13:50:06');
INSERT INTO `qi_log` VALUES ('24', '101', '登录成功', '127.0.0.1', '2015-11-13 13:51:20');
INSERT INTO `qi_log` VALUES ('25', '100', '登录成功', '127.0.0.1', '2015-11-13 13:51:40');
INSERT INTO `qi_log` VALUES ('26', '100', '登录成功', '127.0.0.1', '2015-11-13 13:51:53');
INSERT INTO `qi_log` VALUES ('27', '100', '登录成功', '127.0.0.1', '2015-11-13 13:52:30');
INSERT INTO `qi_log` VALUES ('28', '101', '登录成功', '127.0.0.1', '2015-11-13 13:52:43');
INSERT INTO `qi_log` VALUES ('29', '100', '登录成功', '127.0.0.1', '2015-11-13 13:53:13');
INSERT INTO `qi_log` VALUES ('30', '101', '登录成功', '127.0.0.1', '2015-11-13 13:53:29');
INSERT INTO `qi_log` VALUES ('31', '105', '登录成功', '127.0.0.1', '2015-11-13 13:53:47');
INSERT INTO `qi_log` VALUES ('32', '100', '登录成功', '127.0.0.1', '2015-11-13 13:54:00');
INSERT INTO `qi_log` VALUES ('33', '100', '登录成功', '127.0.0.1', '2015-11-13 16:24:25');
INSERT INTO `qi_log` VALUES ('34', '100', '登录成功', '127.0.0.1', '2015-11-13 16:24:45');
INSERT INTO `qi_log` VALUES ('35', '100', '登录成功', '127.0.0.1', '2015-11-14 08:28:19');
INSERT INTO `qi_log` VALUES ('36', '100', '登录成功', '127.0.0.1', '2015-11-14 14:34:37');
INSERT INTO `qi_log` VALUES ('37', '100', '登录成功', '127.0.0.1', '2015-11-14 15:01:08');
INSERT INTO `qi_log` VALUES ('38', '100', '登录成功', '127.0.0.1', '2015-11-14 15:02:01');
INSERT INTO `qi_log` VALUES ('39', '100', '登录成功', '127.0.0.1', '2015-11-15 08:47:57');
INSERT INTO `qi_log` VALUES ('40', '100', '登录成功', '127.0.0.1', '2015-11-15 12:34:19');
INSERT INTO `qi_log` VALUES ('41', '100', '登录成功', '127.0.0.1', '2015-11-15 15:44:45');
INSERT INTO `qi_log` VALUES ('42', '100', '登录成功', '127.0.0.1', '2015-11-16 08:39:29');
INSERT INTO `qi_log` VALUES ('43', '100', '登录成功', '127.0.0.1', '2015-11-16 13:24:06');
INSERT INTO `qi_log` VALUES ('44', '100', '登录成功', '127.0.0.1', '2015-11-17 10:00:44');
INSERT INTO `qi_log` VALUES ('45', '100', '登录成功', '127.0.0.1', '2015-11-17 15:45:02');
INSERT INTO `qi_log` VALUES ('46', '100', '登录成功', '127.0.0.1', '2015-11-18 09:00:58');
INSERT INTO `qi_log` VALUES ('47', '100', '登录成功', '127.0.0.1', '2015-11-18 13:13:23');
INSERT INTO `qi_log` VALUES ('48', '100', '登录成功', '127.0.0.1', '2015-11-19 11:26:01');
INSERT INTO `qi_log` VALUES ('49', '100', '登录成功', '127.0.0.1', '2015-11-20 08:46:13');
INSERT INTO `qi_log` VALUES ('50', '100', '登录成功', '127.0.0.1', '2015-11-23 08:56:50');
INSERT INTO `qi_log` VALUES ('51', '100', '登录成功', '127.0.0.1', '2015-11-23 09:09:33');
INSERT INTO `qi_log` VALUES ('52', '100', '登录成功', '127.0.0.1', '2015-11-23 09:09:36');
INSERT INTO `qi_log` VALUES ('53', '100', '登录成功', '127.0.0.1', '2015-11-23 09:21:48');
INSERT INTO `qi_log` VALUES ('54', '100', '登录成功', '127.0.0.1', '2015-11-23 09:43:57');
INSERT INTO `qi_log` VALUES ('55', '100', '登录成功', '127.0.0.1', '2015-11-23 10:05:26');
INSERT INTO `qi_log` VALUES ('56', '100', '登录成功', '127.0.0.1', '2015-11-23 10:07:24');
INSERT INTO `qi_log` VALUES ('57', '100', '登录成功', '127.0.0.1', '2015-11-23 10:15:37');
INSERT INTO `qi_log` VALUES ('58', '100', '登录成功', '127.0.0.1', '2015-11-23 10:16:18');
INSERT INTO `qi_log` VALUES ('59', '100', '登录成功', '127.0.0.1', '2015-11-23 10:27:51');
INSERT INTO `qi_log` VALUES ('60', '100', '登录成功', '127.0.0.1', '2015-11-23 13:24:31');
INSERT INTO `qi_log` VALUES ('61', '100', '登录成功', '127.0.0.1', '2015-11-24 09:00:14');
INSERT INTO `qi_log` VALUES ('62', '100', '登录成功', '127.0.0.1', '2015-11-24 17:16:17');
INSERT INTO `qi_log` VALUES ('63', '100', '登录成功', '127.0.0.1', '2015-11-25 08:34:40');
INSERT INTO `qi_log` VALUES ('64', '100', '登录成功', '127.0.0.1', '2015-11-26 01:37:06');
INSERT INTO `qi_log` VALUES ('65', '100', '登录成功', '127.0.0.1', '2015-11-26 01:43:20');
INSERT INTO `qi_log` VALUES ('66', '100', '登录成功', '127.0.0.1', '2015-11-27 01:39:43');
INSERT INTO `qi_log` VALUES ('67', '100', '登录成功', '127.0.0.1', '2015-11-27 20:23:41');
INSERT INTO `qi_log` VALUES ('68', '100', '登录成功', '127.0.0.1', '2015-11-27 22:07:10');
INSERT INTO `qi_log` VALUES ('69', '100', '登录成功', '127.0.0.1', '2015-11-28 18:20:47');
INSERT INTO `qi_log` VALUES ('70', '100', '登录成功', '127.0.0.1', '2015-11-28 19:06:11');
INSERT INTO `qi_log` VALUES ('71', '100', '登录成功', '127.0.0.1', '2015-12-01 19:21:57');
INSERT INTO `qi_log` VALUES ('72', '100', '登录成功', '127.0.0.1', '2015-12-01 20:42:18');
INSERT INTO `qi_log` VALUES ('73', '100', '登录成功', '127.0.0.1', '2015-12-02 01:52:18');
INSERT INTO `qi_log` VALUES ('74', '100', '登录成功', '127.0.0.1', '2015-12-02 00:00:00');
INSERT INTO `qi_log` VALUES ('75', '100', '登录成功', '127.0.0.1', '2015-12-05 00:00:00');
INSERT INTO `qi_log` VALUES ('76', '100', '登录成功', '127.0.0.1', '2015-12-07 00:00:00');
INSERT INTO `qi_log` VALUES ('77', '100', '登录成功', '127.0.0.1', '2015-12-07 00:00:00');
INSERT INTO `qi_log` VALUES ('78', '100', '登录成功', '127.0.0.1', '2015-12-07 00:00:00');
INSERT INTO `qi_log` VALUES ('79', '100', '登录成功', '127.0.0.1', '2015-12-07 00:00:00');
INSERT INTO `qi_log` VALUES ('80', '100', '登录成功', '127.0.0.1', '2015-12-08 00:00:00');
INSERT INTO `qi_log` VALUES ('81', '100', '登录成功', '127.0.0.1', '2015-12-08 10:14:13');
INSERT INTO `qi_log` VALUES ('82', '100', '登录成功', '127.0.0.1', '2015-12-08 10:31:50');
INSERT INTO `qi_log` VALUES ('83', '102', '登录成功', '127.0.0.1', '2015-12-08 10:36:28');
INSERT INTO `qi_log` VALUES ('84', '100', '登录成功', '127.0.0.1', '2015-12-08 10:36:53');
INSERT INTO `qi_log` VALUES ('85', '100', '登录成功', '218.90.129.206', '2015-12-08 18:07:23');
INSERT INTO `qi_log` VALUES ('86', '100', '登录成功', '221.178.182.20', '2015-12-08 19:52:44');
INSERT INTO `qi_log` VALUES ('87', '100', '登录成功', '221.178.182.52', '2015-12-08 20:39:00');
INSERT INTO `qi_log` VALUES ('88', '100', '登录成功', '221.178.182.8', '2015-12-08 20:39:51');
INSERT INTO `qi_log` VALUES ('89', '100', '登录成功', '221.178.182.42', '2015-12-10 20:08:46');
INSERT INTO `qi_log` VALUES ('90', '100', '登录成功', '221.178.182.43', '2015-12-13 09:50:43');
INSERT INTO `qi_log` VALUES ('91', '100', '登录成功', '127.0.0.1', '2015-12-13 14:37:18');
INSERT INTO `qi_log` VALUES ('92', '100', '登录成功', '127.0.0.1', '2015-12-20 08:22:39');
INSERT INTO `qi_log` VALUES ('93', '100', '登录成功', '127.0.0.1', '2015-12-20 12:21:33');
INSERT INTO `qi_log` VALUES ('94', '100', '登录成功', '127.0.0.1', '2015-12-20 19:57:45');
INSERT INTO `qi_log` VALUES ('95', '100', '登录成功', '127.0.0.1', '2015-12-21 20:34:13');
INSERT INTO `qi_log` VALUES ('96', '100', '登录成功', '127.0.0.1', '2015-12-21 22:02:22');
INSERT INTO `qi_log` VALUES ('97', '100', '登录成功', '127.0.0.1', '2015-12-22 20:19:34');
INSERT INTO `qi_log` VALUES ('98', '100', '登录成功', '127.0.0.1', '2015-12-23 10:43:30');
INSERT INTO `qi_log` VALUES ('99', '100', '登录成功', '127.0.0.1', '2015-12-24 10:33:33');
INSERT INTO `qi_log` VALUES ('100', '100', '登录成功', '127.0.0.1', '2016-05-10 10:12:22');
INSERT INTO `qi_log` VALUES ('101', '100', '登录成功', '127.0.0.1', '2016-05-12 11:14:28');
INSERT INTO `qi_log` VALUES ('102', '100', '登录成功', '127.0.0.1', '2016-05-16 10:08:04');
INSERT INTO `qi_log` VALUES ('103', '100', '登录成功', '127.0.0.1', '2016-05-16 13:44:02');
INSERT INTO `qi_log` VALUES ('104', '100', '登录成功', '127.0.0.1', '2016-05-17 09:06:56');
INSERT INTO `qi_log` VALUES ('105', '100', '登录成功', '127.0.0.1', '2016-05-17 14:32:36');
INSERT INTO `qi_log` VALUES ('106', '100', '登录成功', '127.0.0.1', '2016-05-30 09:19:51');
INSERT INTO `qi_log` VALUES ('107', '100', '登录成功', '127.0.0.1', '2016-06-15 09:01:59');
INSERT INTO `qi_log` VALUES ('108', '100', '登录成功', '127.0.0.1', '2016-06-16 08:57:13');
INSERT INTO `qi_log` VALUES ('109', '100', '登录成功', '127.0.0.1', '2016-06-16 14:22:06');
INSERT INTO `qi_log` VALUES ('110', '100', '登录成功', '127.0.0.1', '2016-06-17 09:58:49');
INSERT INTO `qi_log` VALUES ('111', '100', '登录成功', '127.0.0.1', '2016-06-17 14:04:17');
INSERT INTO `qi_log` VALUES ('112', '100', '登录成功', '127.0.0.1', '2016-06-21 09:10:51');
INSERT INTO `qi_log` VALUES ('113', '100', '登录成功', '127.0.0.1', '2016-06-21 13:30:08');
INSERT INTO `qi_log` VALUES ('114', '100', '登录成功', '127.0.0.1', '2016-06-22 09:30:54');
INSERT INTO `qi_log` VALUES ('115', '100', '登录成功', '127.0.0.1', '2016-06-22 15:03:42');
INSERT INTO `qi_log` VALUES ('116', '100', '登录成功', '127.0.0.1', '2016-06-24 08:59:02');
INSERT INTO `qi_log` VALUES ('117', '100', '登录成功', '127.0.0.1', '2016-06-27 09:20:27');
INSERT INTO `qi_log` VALUES ('118', '100', '登录成功', '127.0.0.1', '2016-06-27 14:08:19');
INSERT INTO `qi_log` VALUES ('119', '100', '登录成功', '127.0.0.1', '2016-06-28 08:55:55');
INSERT INTO `qi_log` VALUES ('120', '100', '登录成功', '127.0.0.1', '2016-06-30 09:10:21');

-- ----------------------------
-- Table structure for `qi_member`
-- ----------------------------
DROP TABLE IF EXISTS `qi_member`;
CREATE TABLE `qi_member` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name_real` varchar(20) NOT NULL COMMENT '姓名',
  `name_nick` varchar(20) NOT NULL COMMENT '昵称',
  `password` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL DEFAULT '0',
  `email` varchar(50) NOT NULL DEFAULT '0',
  `weixin` varchar(50) NOT NULL COMMENT '微信号',
  `weixin_id` varchar(50) NOT NULL COMMENT '微信openid',
  `qq` varchar(50) NOT NULL,
  `email_check` tinyint(1) NOT NULL DEFAULT '0' COMMENT '邮箱验证',
  `integral` int(20) NOT NULL DEFAULT '0' COMMENT '积分',
  `sex` tinyint(1) NOT NULL DEFAULT '0' COMMENT '性别',
  `birthday` date NOT NULL DEFAULT '0000-00-00' COMMENT '生日',
  `headpic` varchar(100) NOT NULL,
  `date_add` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_edit` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qi_member
-- ----------------------------
INSERT INTO `qi_member` VALUES ('1', 'jin', '1234', 'edbbf7a5afd220a65983229ed6496ed9', '13665119187', '723528197@qq.com', '', '', '', '1', '0', '2', '2015-03-03', '', '2015-12-23 14:51:03', '2016-06-24 13:19:55', '1');

-- ----------------------------
-- Table structure for `qi_member_address`
-- ----------------------------
DROP TABLE IF EXISTS `qi_member_address`;
CREATE TABLE `qi_member_address` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `member_id` int(20) NOT NULL,
  `province` int(20) NOT NULL DEFAULT '0' COMMENT '省',
  `city` int(20) NOT NULL DEFAULT '0' COMMENT '市',
  `district` int(20) NOT NULL DEFAULT '0' COMMENT '区',
  `detail` varchar(200) NOT NULL COMMENT '详细地址',
  `phone` varchar(20) NOT NULL DEFAULT '0' COMMENT '联系电话',
  `person` varchar(20) NOT NULL COMMENT '联系人',
  `date_add` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_edit` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qi_member_address
-- ----------------------------

-- ----------------------------
-- Table structure for `qi_menu`
-- ----------------------------
DROP TABLE IF EXISTS `qi_menu`;
CREATE TABLE `qi_menu` (
  `menu_id` int(20) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(50) NOT NULL,
  `controller` varchar(50) NOT NULL,
  `method` varchar(50) NOT NULL,
  `parent_id` int(20) NOT NULL DEFAULT '0',
  `admin` tinyint(2) NOT NULL DEFAULT '0',
  `deep` tinyint(2) NOT NULL DEFAULT '0',
  `weights` int(10) NOT NULL DEFAULT '0',
  `status` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qi_menu
-- ----------------------------
INSERT INTO `qi_menu` VALUES ('1', '系统管理', 'setting', 'setting_base', '0', '1', '1', '0', '1');
INSERT INTO `qi_menu` VALUES ('2', '系统设置', 'setting', 'setting_base', '1', '1', '2', '0', '1');
INSERT INTO `qi_menu` VALUES ('3', '基本设置', 'setting', 'setting_base', '2', '1', '3', '0', '1');
INSERT INTO `qi_menu` VALUES ('4', '管理员管理', 'user', 'my_list', '0', '1', '1', '0', '1');
INSERT INTO `qi_menu` VALUES ('5', '管理员管理', 'user', 'my_list', '4', '1', '2', '0', '1');
INSERT INTO `qi_menu` VALUES ('6', '管理员管理', 'user', 'my_list', '5', '1', '3', '0', '1');
INSERT INTO `qi_menu` VALUES ('7', '权限管理', 'role', 'my_list', '4', '1', '2', '0', '1');
INSERT INTO `qi_menu` VALUES ('8', '角色管理', 'role', 'my_list', '7', '1', '3', '0', '1');
INSERT INTO `qi_menu` VALUES ('20', '日志管理', 'log', 'my_list', '1', '1', '2', '0', '1');
INSERT INTO `qi_menu` VALUES ('21', '日志管理', 'log', 'my_list', '20', '1', '3', '0', '1');
INSERT INTO `qi_menu` VALUES ('26', '影视管理', 'film', 'my_list', '0', '1', '1', '0', '1');
INSERT INTO `qi_menu` VALUES ('27', '影视管理', 'film', 'my_list', '26', '1', '2', '0', '1');
INSERT INTO `qi_menu` VALUES ('28', '影视管理', 'film', 'my_list', '27', '1', '3', '0', '1');
INSERT INTO `qi_menu` VALUES ('29', '标签管理', 'tag', 'my_list', '26', '1', '2', '0', '1');
INSERT INTO `qi_menu` VALUES ('30', '标签管理', 'tag', 'my_list', '29', '1', '3', '0', '1');
INSERT INTO `qi_menu` VALUES ('31', '标签类型', 'tag_type', 'my_list', '29', '1', '3', '0', '1');
INSERT INTO `qi_menu` VALUES ('32', '影人管理', 'worker', 'my_list', '26', '1', '2', '0', '1');
INSERT INTO `qi_menu` VALUES ('33', '影人管理', 'worker', 'my_list', '32', '1', '3', '0', '1');
INSERT INTO `qi_menu` VALUES ('34', '会员管理', 'member', 'my_list', '0', '1', '1', '0', '1');
INSERT INTO `qi_menu` VALUES ('35', '会员管理', 'member', 'my_list', '34', '1', '2', '0', '1');
INSERT INTO `qi_menu` VALUES ('36', '会员管理', 'member', 'my_list', '35', '1', '3', '0', '1');
INSERT INTO `qi_menu` VALUES ('37', '订单管理', 'order', 'my_list', '0', '1', '1', '0', '1');
INSERT INTO `qi_menu` VALUES ('38', '商品管理', 'goods', 'my_list', '0', '1', '1', '0', '1');
INSERT INTO `qi_menu` VALUES ('39', '商品管理', 'goods', 'my_list', '38', '1', '2', '0', '1');
INSERT INTO `qi_menu` VALUES ('40', '商品管理', 'goods', 'my_list', '39', '1', '3', '0', '1');
INSERT INTO `qi_menu` VALUES ('41', '商品设置', 'brand', 'my_list', '38', '1', '2', '0', '1');
INSERT INTO `qi_menu` VALUES ('42', '品牌管理', 'brand', 'my_list', '41', '1', '3', '0', '1');
INSERT INTO `qi_menu` VALUES ('43', '类型管理', 'goods_type', 'my_list', '41', '1', '3', '0', '1');
INSERT INTO `qi_menu` VALUES ('44', '规格管理', 'format', 'my_list', '41', '1', '3', '0', '1');
INSERT INTO `qi_menu` VALUES ('45', '订单管理', 'order', 'my_list', '37', '1', '2', '0', '1');
INSERT INTO `qi_menu` VALUES ('46', '订单管理', 'order', 'my_list', '45', '1', '3', '0', '1');

-- ----------------------------
-- Table structure for `qi_order`
-- ----------------------------
DROP TABLE IF EXISTS `qi_order`;
CREATE TABLE `qi_order` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `order_no` varchar(20) NOT NULL DEFAULT '0',
  `member_id` int(20) NOT NULL DEFAULT '0',
  `money_goods` decimal(10,2) NOT NULL DEFAULT '0.00',
  `money_preferential` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '优惠',
  `money_shipping` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '配送费用',
  `money_end` decimal(10,2) NOT NULL DEFAULT '0.00',
  `payment_id` int(20) NOT NULL DEFAULT '0' COMMENT '支付方式',
  `shipping_id` int(20) NOT NULL COMMENT '配送方式',
  `accept_name` varchar(20) NOT NULL DEFAULT '',
  `accept_province` int(20) NOT NULL DEFAULT '0',
  `accept_city` int(20) NOT NULL DEFAULT '0',
  `accept_district` int(20) NOT NULL DEFAULT '0',
  `accept_detail` varchar(200) NOT NULL DEFAULT '',
  `accept_phone` varchar(20) NOT NULL DEFAULT '0',
  `remark` varchar(50) NOT NULL COMMENT '备注',
  `date_add` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_edit` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_pay` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '支付日期',
  `date_send` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '发货日期',
  `date_end` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '结束日期',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0订单取消1订单提交2付款成功3已经发货4订单完成',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qi_order
-- ----------------------------
INSERT INTO `qi_order` VALUES ('1', 'o12312312312', '1', '20.00', '0.00', '0.00', '20.00', '1', '0', 'jin1', '0', '0', '0', '霞客苑1201', '13665119187', '周末在家', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2');

-- ----------------------------
-- Table structure for `qi_order_goods`
-- ----------------------------
DROP TABLE IF EXISTS `qi_order_goods`;
CREATE TABLE `qi_order_goods` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `order_id` int(20) NOT NULL DEFAULT '0',
  `goods_id` int(20) NOT NULL DEFAULT '0',
  `amount_id` int(20) NOT NULL DEFAULT '0' COMMENT '规格库存id',
  `goods_name` varchar(100) NOT NULL,
  `goods_no` varchar(50) NOT NULL,
  `amount` int(20) NOT NULL DEFAULT '0' COMMENT '数量',
  `money` decimal(10,2) NOT NULL DEFAULT '0.00',
  `date_add` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_edit` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qi_order_goods
-- ----------------------------
INSERT INTO `qi_order_goods` VALUES ('1', '1', '1', '10', '丝袜10', 'g1231231231', '2', '10.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');

-- ----------------------------
-- Table structure for `qi_payment`
-- ----------------------------
DROP TABLE IF EXISTS `qi_payment`;
CREATE TABLE `qi_payment` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '',
  `detail` varchar(500) NOT NULL DEFAULT '',
  `date_add` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_edit` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qi_payment
-- ----------------------------
INSERT INTO `qi_payment` VALUES ('1', '支付宝', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_payment` VALUES ('2', '微信支付', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');

-- ----------------------------
-- Table structure for `qi_role`
-- ----------------------------
DROP TABLE IF EXISTS `qi_role`;
CREATE TABLE `qi_role` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `remark` varchar(50) DEFAULT NULL,
  `parent_id` int(20) DEFAULT '0',
  `date_add` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_edit` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(2) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qi_role
-- ----------------------------
INSERT INTO `qi_role` VALUES ('1', '超级管理员', '超级管理员', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_role` VALUES ('2', '总管理员', '普通管理员', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');
INSERT INTO `qi_role` VALUES ('3', '普通管理员', '普通管理员1', '2', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');

-- ----------------------------
-- Table structure for `qi_role_access`
-- ----------------------------
DROP TABLE IF EXISTS `qi_role_access`;
CREATE TABLE `qi_role_access` (
  `access_id` int(20) NOT NULL AUTO_INCREMENT,
  `role_id` int(20) NOT NULL DEFAULT '0',
  `node_id` int(20) NOT NULL DEFAULT '0',
  `status` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`access_id`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qi_role_access
-- ----------------------------
INSERT INTO `qi_role_access` VALUES ('86', '2', '1', '1');
INSERT INTO `qi_role_access` VALUES ('87', '2', '2', '1');
INSERT INTO `qi_role_access` VALUES ('88', '2', '3', '1');
INSERT INTO `qi_role_access` VALUES ('89', '2', '4', '1');
INSERT INTO `qi_role_access` VALUES ('90', '2', '5', '1');
INSERT INTO `qi_role_access` VALUES ('91', '2', '6', '1');
INSERT INTO `qi_role_access` VALUES ('92', '2', '7', '1');
INSERT INTO `qi_role_access` VALUES ('93', '2', '8', '1');
INSERT INTO `qi_role_access` VALUES ('94', '2', '14', '1');
INSERT INTO `qi_role_access` VALUES ('95', '2', '15', '1');
INSERT INTO `qi_role_access` VALUES ('96', '2', '9', '1');
INSERT INTO `qi_role_access` VALUES ('97', '2', '10', '1');
INSERT INTO `qi_role_access` VALUES ('98', '2', '11', '1');
INSERT INTO `qi_role_access` VALUES ('99', '3', '1', '1');
INSERT INTO `qi_role_access` VALUES ('100', '3', '2', '1');
INSERT INTO `qi_role_access` VALUES ('101', '3', '3', '1');
INSERT INTO `qi_role_access` VALUES ('102', '3', '4', '1');
INSERT INTO `qi_role_access` VALUES ('103', '3', '5', '1');
INSERT INTO `qi_role_access` VALUES ('104', '3', '6', '1');
INSERT INTO `qi_role_access` VALUES ('105', '3', '7', '1');
INSERT INTO `qi_role_access` VALUES ('106', '3', '8', '1');
INSERT INTO `qi_role_access` VALUES ('107', '3', '9', '1');
INSERT INTO `qi_role_access` VALUES ('108', '3', '10', '1');
INSERT INTO `qi_role_access` VALUES ('109', '3', '11', '1');
INSERT INTO `qi_role_access` VALUES ('110', '3', '12', '1');
INSERT INTO `qi_role_access` VALUES ('111', '3', '13', '1');
INSERT INTO `qi_role_access` VALUES ('112', '3', '17', '1');
INSERT INTO `qi_role_access` VALUES ('113', '3', '18', '1');
INSERT INTO `qi_role_access` VALUES ('114', '3', '19', '1');
INSERT INTO `qi_role_access` VALUES ('115', '4', '1', '1');
INSERT INTO `qi_role_access` VALUES ('116', '4', '2', '1');
INSERT INTO `qi_role_access` VALUES ('117', '4', '3', '1');
INSERT INTO `qi_role_access` VALUES ('118', '4', '9', '1');
INSERT INTO `qi_role_access` VALUES ('119', '4', '10', '1');
INSERT INTO `qi_role_access` VALUES ('120', '4', '11', '1');

-- ----------------------------
-- Table structure for `qi_role_node`
-- ----------------------------
DROP TABLE IF EXISTS `qi_role_node`;
CREATE TABLE `qi_role_node` (
  `node_id` int(20) NOT NULL AUTO_INCREMENT,
  `node_name` varchar(50) NOT NULL,
  `show_name` varchar(50) NOT NULL,
  `parent_id` int(20) NOT NULL DEFAULT '0',
  `menu_id` int(20) NOT NULL DEFAULT '0',
  `weights` int(10) NOT NULL DEFAULT '0',
  `status` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`node_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qi_role_node
-- ----------------------------
INSERT INTO `qi_role_node` VALUES ('1', 'setting', '系统管理', '0', '1', '0', '1');
INSERT INTO `qi_role_node` VALUES ('2', 'setting2', '系统设置', '1', '2', '0', '1');
INSERT INTO `qi_role_node` VALUES ('3', 'setting3', '基本设置', '2', '3', '0', '1');
INSERT INTO `qi_role_node` VALUES ('4', 'user', '管理员管理', '0', '4', '0', '1');
INSERT INTO `qi_role_node` VALUES ('5', 'user2', '管理员管理', '4', '5', '0', '1');
INSERT INTO `qi_role_node` VALUES ('6', 'user3', '管理员管理', '5', '6', '0', '1');

-- ----------------------------
-- Table structure for `qi_sessions`
-- ----------------------------
DROP TABLE IF EXISTS `qi_sessions`;
CREATE TABLE `qi_sessions` (
  `session_id` varchar(50) NOT NULL DEFAULT '',
  `ip_address` varchar(50) DEFAULT NULL,
  `user_agent` varchar(500) DEFAULT NULL,
  `last_activity` int(20) DEFAULT NULL,
  `user_data` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qi_sessions
-- ----------------------------
INSERT INTO `qi_sessions` VALUES ('0169568f152bad0c38991731b3b1855e', '101.226.66.177', 'Mozilla/5.0 (Linux; U; Android 4.4.2; zh-cn; GT-I9500 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 MQ', '1449663201', '');
INSERT INTO `qi_sessions` VALUES ('019b52105f8635291762a6dad12154bd', '101.226.33.205', 'Mozilla/5.0 (Linux; U; Android 4.4.2; zh-cn; GT-I9500 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 MQ', '1449569296', '');
INSERT INTO `qi_sessions` VALUES ('0582fbe435a5bc3ad582b56b19d13384', '101.226.33.217', 'Mozilla/5.0 (Linux; U; Android 4.4.2; zh-cn; GT-I9500 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 MQ', '1449578380', '');
INSERT INTO `qi_sessions` VALUES ('05f5bef88ac54b8a5b273a1d853f9b97', '180.153.214.197', 'Mozilla/5.0 (Linux; U; Android 4.4.2; zh-cn; GT-I9500 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 MQ', '1449575564', '');
INSERT INTO `qi_sessions` VALUES ('08ac4cb5300da1fefe42953885914f1e', '192.99.9.164', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', '1449602864', '');
INSERT INTO `qi_sessions` VALUES ('09aa80a9b8813dbb35fb7cc2c18b33f7', '221.178.182.186', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36', '1449577133', '');
INSERT INTO `qi_sessions` VALUES ('0dbe3034a5515f230e08170ca65fab89', '101.226.33.227', 'Mozilla/5.0 (Linux; U; Android 4.4.2; zh-cn; GT-I9500 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 MQ', '1449569250', '');
INSERT INTO `qi_sessions` VALUES ('15902642dc6a2fe596b822d2fc6194db', '101.226.66.173', 'Mozilla/5.0 (Linux; U; Android 4.4.2; zh-cn; GT-I9500 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 MQ', '1449569248', '');
INSERT INTO `qi_sessions` VALUES ('1606ebf70d7411118bc3fb57c743f19e', '119.147.146.192', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95  Safari/537.36', '1449578289', '');
INSERT INTO `qi_sessions` VALUES ('16ff0fb9f141ecdac7b79faec99a29f5', '180.153.206.22', 'Mozilla/5.0 (Linux; U; Android 4.4.2; zh-cn; GT-I9500 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 MQ', '1449569249', '');
INSERT INTO `qi_sessions` VALUES ('18e425724717e4d907e2d46f49be2010', '101.226.66.177', 'Mozilla/5.0 (Linux; U; Android 4.4.2; zh-cn; GT-I9500 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 MQ', '1449569256', '');
INSERT INTO `qi_sessions` VALUES ('1b046758b9efb04f0a84d8ce95a81afa', '101.226.33.206', 'Mozilla/5.0 (Linux; U; Android 4.4.2; zh-cn; GT-I9500 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 MQ', '1449569244', '');
INSERT INTO `qi_sessions` VALUES ('1d147ad82a4ab291c2b8d57a91142caf', '112.64.235.90', 'Mozilla/5.0 (Linux; U; Android 4.4.2; zh-cn; GT-I9500 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 MQ', '1449575572', '');
INSERT INTO `qi_sessions` VALUES ('2626335aa61d49ecb62b5234a1b339a1', '180.153.205.253', 'Mozilla/5.0 (Linux; U; Android 4.4.2; zh-cn; GT-I9500 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 MQ', '1449577057', '');
INSERT INTO `qi_sessions` VALUES ('26bb28e58867789654df06247ec1dff9', '112.64.235.251', 'Mozilla/5.0 (Linux; U; Android 4.4.2; zh-cn; GT-I9500 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 MQ', '1449569247', '');
INSERT INTO `qi_sessions` VALUES ('2f483a18df61ffe416a5e2db442b694f', '112.64.235.251', 'Mozilla/5.0 (Linux; U; Android 4.4.2; zh-cn; GT-I9500 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 MQ', '1449578337', '');
INSERT INTO `qi_sessions` VALUES ('34a0a86b40e34336f32b3434904725f5', '202.173.11.239', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; zh-CN; rv:1.9.1.2)', '1449583273', '');
INSERT INTO `qi_sessions` VALUES ('3dc3ae2544639a63d0a1251f6bae9842', '180.153.214.190', 'Mozilla/5.0 (Linux; U; Android 4.4.2; zh-cn; GT-I9500 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 MQ', '1449577056', '');
INSERT INTO `qi_sessions` VALUES ('422554b8d3123a4905274b12afd1c1df', '180.153.214.192', 'Mozilla/5.0 (Linux; U; Android 4.4.2; zh-cn; GT-I9500 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 MQ', '1449569290', '');
INSERT INTO `qi_sessions` VALUES ('42a95278e09c40473a5109a9cd958bc7', '221.178.182.180', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36', '1449577127', '');
INSERT INTO `qi_sessions` VALUES ('452acf17ec02e4db314d389017f0ab9b', '101.226.66.174', 'Mozilla/5.0 (Linux; U; Android 4.4.2; zh-cn; GT-I9500 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 MQ', '1449577705', '');
INSERT INTO `qi_sessions` VALUES ('464ed148130e40a9d4037a09546a4a37', '180.153.163.190', 'Mozilla/5.0 (Linux; U; Android 4.4.2; zh-cn; GT-I9500 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 MQ', '1449577281', '');
INSERT INTO `qi_sessions` VALUES ('46d5a10f1e21742c0362c421ae44a944', '218.90.129.206', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:42.0) Gecko/20100101 Firefox/42.0', '1449569238', 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"this_user\";a:10:{s:2:\"id\";s:3:\"100\";s:4:\"name\";s:5:\"admin\";s:9:\"name_real\";s:9:\"Ming.King\";s:8:\"password\";s:32:\"edbbf7a5afd220a65983229ed6496ed9\";s:5:\"phone\";s:11:\"13665119187\";s:5:\"email\";s:16:\"723528197@qq.com\";s:4:\"role\";s:1:\"1\";s:8:\"date_add\";s:19:\"2015-11-05 00:00:00\";s:14:\"password_times\";s:1:\"0\";s:6:\"status\";s:1:\"1\";}}');
INSERT INTO `qi_sessions` VALUES ('47fc9aef8ae5194b17c6fe0e5facd6b2', '180.153.214.181', 'Mozilla/5.0 (Linux; U; Android 4.4.2; zh-cn; GT-I9500 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 MQ', '1449577133', '');
INSERT INTO `qi_sessions` VALUES ('487e2353f2788ab9fc4cdbae075aacb2', '180.153.163.190', 'Mozilla/5.0 (Linux; U; Android 4.4.2; zh-cn; GT-I9500 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 MQ', '1449578382', '');
INSERT INTO `qi_sessions` VALUES ('5f090bde250b7ca3848e3677e2250189', '180.153.205.252', 'Mozilla/5.0 (Linux; U; Android 4.4.2; zh-cn; GT-I9500 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 MQ', '1449575575', '');
INSERT INTO `qi_sessions` VALUES ('616a4d0d6fe51dbef93fd04b2a9ad077', '180.153.206.25', 'Mozilla/5.0 (Linux; U; Android 4.4.2; zh-cn; GT-I9500 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 MQ', '1449569290', '');
INSERT INTO `qi_sessions` VALUES ('655204bc95ae90e4a597959c307a3fa8', '180.153.214.188', 'Mozilla/5.0 (Linux; U; Android 4.4.2; zh-cn; GT-I9500 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 MQ', '1449638287', '');
INSERT INTO `qi_sessions` VALUES ('76ef9e75fad69f544a6d63e3827958e9', '101.226.51.230', 'Mozilla/5.0 (Linux; U; Android 4.4.2; zh-cn; GT-I9500 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 MQ', '1449575875', '');
INSERT INTO `qi_sessions` VALUES ('78461dabae5cfd149b301718d1aa0c25', '101.226.33.225', 'Mozilla/5.0 (Linux; U; Android 4.4.2; zh-cn; GT-I9500 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 MQ', '1449569248', '');
INSERT INTO `qi_sessions` VALUES ('79ca547294c8c17b30c41d46aded798c', '101.226.33.225', 'Mozilla/5.0 (Linux; U; Android 4.4.2; zh-cn; GT-I9500 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 MQ', '1449577115', '');
INSERT INTO `qi_sessions` VALUES ('7b827ebbae9dbc4e28acae1098f1ab68', '101.226.33.223', 'Mozilla/5.0 (Linux; U; Android 4.4.2; zh-cn; GT-I9500 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 MQ', '1449569288', '');
INSERT INTO `qi_sessions` VALUES ('7bb04e3a378ddf440f9f91492fbdd885', '101.226.66.174', 'Mozilla/5.0 (Linux; U; Android 4.4.2; zh-cn; GT-I9500 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 MQ', '1449577481', '');
INSERT INTO `qi_sessions` VALUES ('7e6304b3ed5e7fb82dac383adcc02f62', '218.90.129.206', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:42.0) Gecko/20100101 Firefox/42.0', '1449663081', '');
INSERT INTO `qi_sessions` VALUES ('86f6603cdaac44638af4b4b8df111ea4', '218.241.98.202', 'libwww-perl/5.834', '1449584528', '');
INSERT INTO `qi_sessions` VALUES ('884385ddde7264b8d45f4a4c1fd66b35', '180.153.214.199', 'Mozilla/5.0 (Linux; U; Android 4.4.2; zh-cn; GT-I9500 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 MQ', '1449569289', '');
INSERT INTO `qi_sessions` VALUES ('8950797ccee15f716fe4af1c431542e7', '119.147.146.192', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95  Safari/537.36', '1449578289', '');
INSERT INTO `qi_sessions` VALUES ('8a7adfcf198d0a848cbb983ae075f000', '101.226.33.227', 'Mozilla/5.0 (Linux; U; Android 4.4.2; zh-cn; GT-I9500 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 MQ', '1449578336', '');
INSERT INTO `qi_sessions` VALUES ('8bfb9df2f32efa56aa659df5f63137b5', '101.226.66.180', 'Mozilla/5.0 (Linux; U; Android 4.4.2; zh-cn; GT-I9500 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 MQ', '1449575874', '');
INSERT INTO `qi_sessions` VALUES ('9767884f03955a7a7c2c807c435d383c', '180.153.214.192', 'Mozilla/5.0 (Linux; U; Android 4.4.2; zh-cn; GT-I9500 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 MQ', '1449569260', '');
INSERT INTO `qi_sessions` VALUES ('9dec029678d66fa1fdb662b083eaa78f', '180.153.214.200', 'Mozilla/5.0 (Linux; U; Android 4.4.2; zh-cn; GT-I9500 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 MQ', '1449578383', '');
INSERT INTO `qi_sessions` VALUES ('a41f573c37ad2d5064988c8ad5ba20b0', '101.226.66.174', 'Mozilla/5.0 (Linux; U; Android 4.4.2; zh-cn; GT-I9500 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 MQ', '1449576005', '');
INSERT INTO `qi_sessions` VALUES ('a42bd2bc24991bd0b00b2a50b4f08228', '118.114.245.37', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36', '1449638286', '');
INSERT INTO `qi_sessions` VALUES ('af3360bb8a87f79b2a1774c9f690aac1', '180.153.211.190', 'Mozilla/5.0 (Linux; U; Android 4.4.2; zh-cn; GT-I9500 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 MQ', '1449578340', '');
INSERT INTO `qi_sessions` VALUES ('bf3bc1c3d0765258ff472fe09f342f89', '218.90.129.206', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36', '1449640646', '');
INSERT INTO `qi_sessions` VALUES ('cb51ea034fcd6e7efd997fdb2e68ca9f', '221.178.182.172', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36', '1449575262', '');
INSERT INTO `qi_sessions` VALUES ('cbdf6ac4d0400ca1a878b7f7d34c4f6d', '101.226.33.217', 'Mozilla/5.0 (Linux; U; Android 4.4.2; zh-cn; GT-I9500 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 MQ', '1449576006', '');
INSERT INTO `qi_sessions` VALUES ('d43ba3c2289bb64276cc1ff12c3b840d', '101.226.65.105', 'Mozilla/5.0 (Linux; U; Android 4.4.2; zh-cn; GT-I9500 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 MQ', '1449578383', '');
INSERT INTO `qi_sessions` VALUES ('e1541386843a46b42f9e20296b5ddba8', '182.118.26.198', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; Trident/5.0); 360Spider', '1449637823', '');
INSERT INTO `qi_sessions` VALUES ('e77526739ef654cd0f0b8cfb66c42fe2', '101.226.33.217', 'Mozilla/5.0 (Linux; U; Android 4.4.2; zh-cn; GT-I9500 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 MQ', '1449577133', '');
INSERT INTO `qi_sessions` VALUES ('f015ae35cae3b6b41cccb73a484d4ea0', '180.153.206.36', 'Mozilla/5.0 (Linux; U; Android 4.4.2; zh-cn; GT-I9500 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 MQ', '1449569267', '');
INSERT INTO `qi_sessions` VALUES ('f0c5d2bfa538559f1293e194df58d14b', '180.153.163.187', 'Mozilla/5.0 (Linux; U; Android 4.4.2; zh-cn; GT-I9500 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 MQ', '1449577279', '');
INSERT INTO `qi_sessions` VALUES ('f4039f2191926d4ed7f8000a721ec9e7', '101.226.33.225', 'Mozilla/5.0 (Linux; U; Android 4.4.2; zh-cn; GT-I9500 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 MQ', '1449569246', '');
INSERT INTO `qi_sessions` VALUES ('f5b6210e902fcf345b2afb8ee751fa1d', '101.226.33.205', 'Mozilla/5.0 (Linux; U; Android 4.4.2; zh-cn; GT-I9500 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 MQ', '1449575880', '');
INSERT INTO `qi_sessions` VALUES ('f991f1d6eeb25c5b936e485ddd63cca2', '112.64.235.252', 'Mozilla/5.0 (Linux; U; Android 4.4.2; zh-cn; GT-I9500 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 MQ', '1449569297', '');
INSERT INTO `qi_sessions` VALUES ('fa05c791032e9d66e19307e1511ce182', '180.153.206.32', 'Mozilla/5.0 (Linux; U; Android 4.4.2; zh-cn; GT-I9500 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 MQ', '1449576005', '');
INSERT INTO `qi_sessions` VALUES ('faddd960f857455d8963cd101803d21e', '119.147.146.192', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95  Safari/537.36', '1449578289', '');
INSERT INTO `qi_sessions` VALUES ('fb35521cf19f6106489a2bbe14895e7f', '218.205.17.165', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36', '1449578388', 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"this_user\";a:10:{s:2:\"id\";s:3:\"100\";s:4:\"name\";s:5:\"admin\";s:9:\"name_real\";s:9:\"Ming.King\";s:8:\"password\";s:32:\"edbbf7a5afd220a65983229ed6496ed9\";s:5:\"phone\";s:11:\"13665119187\";s:5:\"email\";s:16:\"723528197@qq.com\";s:4:\"role\";s:1:\"1\";s:8:\"date_add\";s:19:\"2015-11-05 00:00:00\";s:14:\"password_times\";s:1:\"0\";s:6:\"status\";s:1:\"1\";}}');

-- ----------------------------
-- Table structure for `qi_sessions1`
-- ----------------------------
DROP TABLE IF EXISTS `qi_sessions1`;
CREATE TABLE `qi_sessions1` (
  `id` varchar(50) NOT NULL DEFAULT '',
  `ip_address` varchar(50) DEFAULT NULL,
  `user_agent` varchar(500) DEFAULT NULL,
  `last_activity` int(20) DEFAULT NULL,
  `user_data` varchar(500) DEFAULT NULL,
  `data` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qi_sessions1
-- ----------------------------

-- ----------------------------
-- Table structure for `qi_setting`
-- ----------------------------
DROP TABLE IF EXISTS `qi_setting`;
CREATE TABLE `qi_setting` (
  `s_key` varchar(50) NOT NULL DEFAULT '',
  `s_value` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`s_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qi_setting
-- ----------------------------
INSERT INTO `qi_setting` VALUES ('card_addnum', '1');
INSERT INTO `qi_setting` VALUES ('card_error_times', '3');
INSERT INTO `qi_setting` VALUES ('card_number', '59');
INSERT INTO `qi_setting` VALUES ('card_prefix', '239651008000');
INSERT INTO `qi_setting` VALUES ('logo_name', '0b7f193892747ae81766728ca1838a1b.png');
INSERT INTO `qi_setting` VALUES ('page_number', '10');
INSERT INTO `qi_setting` VALUES ('station_name', '7蓝');
INSERT INTO `qi_setting` VALUES ('user_error_times', '5');
INSERT INTO `qi_setting` VALUES ('use_captcha', '0');

-- ----------------------------
-- Table structure for `qi_shipping`
-- ----------------------------
DROP TABLE IF EXISTS `qi_shipping`;
CREATE TABLE `qi_shipping` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `detail` varchar(500) NOT NULL,
  `date_add` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_edit` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qi_shipping
-- ----------------------------
INSERT INTO `qi_shipping` VALUES ('1', '免邮', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');

-- ----------------------------
-- Table structure for `qi_tag`
-- ----------------------------
DROP TABLE IF EXISTS `qi_tag`;
CREATE TABLE `qi_tag` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `type` int(20) DEFAULT NULL,
  `ob` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qi_tag
-- ----------------------------
INSERT INTO `qi_tag` VALUES ('1', '喜剧', '1', '0');
INSERT INTO `qi_tag` VALUES ('2', '科幻', '1', '0');
INSERT INTO `qi_tag` VALUES ('3', '魔幻', '1', '0');
INSERT INTO `qi_tag` VALUES ('4', '奇幻', '1', '0');
INSERT INTO `qi_tag` VALUES ('5', '冒险', '1', '0');
INSERT INTO `qi_tag` VALUES ('6', '动作', '1', '0');
INSERT INTO `qi_tag` VALUES ('7', '恐怖', '1', '0');
INSERT INTO `qi_tag` VALUES ('8', '悬疑', '1', '0');
INSERT INTO `qi_tag` VALUES ('9', '战争', '1', '0');
INSERT INTO `qi_tag` VALUES ('10', '犯罪', '1', '0');
INSERT INTO `qi_tag` VALUES ('11', '西部', '1', '0');
INSERT INTO `qi_tag` VALUES ('12', '文艺', '1', '0');
INSERT INTO `qi_tag` VALUES ('13', '剧情', '1', '0');
INSERT INTO `qi_tag` VALUES ('14', '歌舞', '1', '0');
INSERT INTO `qi_tag` VALUES ('15', '青春', '1', '0');
INSERT INTO `qi_tag` VALUES ('16', '音乐', '1', '0');
INSERT INTO `qi_tag` VALUES ('17', '爱情', '1', '0');
INSERT INTO `qi_tag` VALUES ('18', '情色', '1', '0');
INSERT INTO `qi_tag` VALUES ('19', '体育', '1', '0');
INSERT INTO `qi_tag` VALUES ('20', '历史', '1', '0');
INSERT INTO `qi_tag` VALUES ('21', '传记', '1', '0');
INSERT INTO `qi_tag` VALUES ('22', '记录', '1', '0');
INSERT INTO `qi_tag` VALUES ('23', '动画', '1', '0');
INSERT INTO `qi_tag` VALUES ('24', '家庭', '1', '0');
INSERT INTO `qi_tag` VALUES ('25', '儿童', '1', '0');
INSERT INTO `qi_tag` VALUES ('37', '美国', '2', '97');
INSERT INTO `qi_tag` VALUES ('38', '日本', '2', '96');
INSERT INTO `qi_tag` VALUES ('39', '中国香港', '2', '99');
INSERT INTO `qi_tag` VALUES ('40', '英国', '2', '95');
INSERT INTO `qi_tag` VALUES ('41', '中国大陆', '2', '100');
INSERT INTO `qi_tag` VALUES ('42', '法国', '2', '94');
INSERT INTO `qi_tag` VALUES ('43', '韩国', '2', '95');
INSERT INTO `qi_tag` VALUES ('44', '中国台湾', '2', '98');
INSERT INTO `qi_tag` VALUES ('45', '德国', '2', '93');
INSERT INTO `qi_tag` VALUES ('46', '意大利', '2', '0');
INSERT INTO `qi_tag` VALUES ('48', '泰国', '2', '0');
INSERT INTO `qi_tag` VALUES ('49', '印度', '2', '0');
INSERT INTO `qi_tag` VALUES ('50', '西班牙', '2', '0');
INSERT INTO `qi_tag` VALUES ('51', '加拿大', '2', '0');
INSERT INTO `qi_tag` VALUES ('52', '澳大利亚', '2', '0');
INSERT INTO `qi_tag` VALUES ('53', '俄罗斯', '2', '92');
INSERT INTO `qi_tag` VALUES ('54', '伊朗', '2', '0');
INSERT INTO `qi_tag` VALUES ('55', '瑞典', '2', '0');
INSERT INTO `qi_tag` VALUES ('56', '巴西', '2', '0');
INSERT INTO `qi_tag` VALUES ('57', '爱尔兰', '2', '0');
INSERT INTO `qi_tag` VALUES ('58', '波兰', '2', '0');
INSERT INTO `qi_tag` VALUES ('59', '丹麦', '2', '0');
INSERT INTO `qi_tag` VALUES ('60', '捷克', '2', '0');
INSERT INTO `qi_tag` VALUES ('61', '阿根廷', '2', '0');
INSERT INTO `qi_tag` VALUES ('62', '比利时', '2', '0');
INSERT INTO `qi_tag` VALUES ('63', '墨西哥', '2', '0');
INSERT INTO `qi_tag` VALUES ('64', '奥地利', '2', '0');
INSERT INTO `qi_tag` VALUES ('65', '荷兰', '2', '0');
INSERT INTO `qi_tag` VALUES ('66', '新西兰', '2', '0');
INSERT INTO `qi_tag` VALUES ('67', '土耳其', '2', '0');
INSERT INTO `qi_tag` VALUES ('68', '匈牙利', '2', '0');
INSERT INTO `qi_tag` VALUES ('69', '以色列', '2', '0');
INSERT INTO `qi_tag` VALUES ('70', '新加坡', '2', '0');
INSERT INTO `qi_tag` VALUES ('71', '1988', '3', '0');
INSERT INTO `qi_tag` VALUES ('72', '1989', '3', '0');
INSERT INTO `qi_tag` VALUES ('73', '1990', '3', '0');
INSERT INTO `qi_tag` VALUES ('74', '1991', '3', '0');
INSERT INTO `qi_tag` VALUES ('75', '1992', '3', '0');
INSERT INTO `qi_tag` VALUES ('76', '1993', '3', '0');
INSERT INTO `qi_tag` VALUES ('77', '1994', '3', '0');
INSERT INTO `qi_tag` VALUES ('78', '1995', '3', '0');
INSERT INTO `qi_tag` VALUES ('79', '1996', '3', '0');
INSERT INTO `qi_tag` VALUES ('80', '1997', '3', '0');
INSERT INTO `qi_tag` VALUES ('81', '1998', '3', '0');
INSERT INTO `qi_tag` VALUES ('82', '1999', '3', '0');
INSERT INTO `qi_tag` VALUES ('83', '2000', '3', '0');
INSERT INTO `qi_tag` VALUES ('84', '2001', '3', '0');
INSERT INTO `qi_tag` VALUES ('85', '2002', '3', '0');
INSERT INTO `qi_tag` VALUES ('86', '2003', '3', '0');
INSERT INTO `qi_tag` VALUES ('87', '2004', '3', '0');
INSERT INTO `qi_tag` VALUES ('88', '2005', '3', '0');
INSERT INTO `qi_tag` VALUES ('89', '2006', '3', '0');
INSERT INTO `qi_tag` VALUES ('90', '2007', '3', '0');
INSERT INTO `qi_tag` VALUES ('91', '2008', '3', '0');
INSERT INTO `qi_tag` VALUES ('92', '2009', '3', '0');
INSERT INTO `qi_tag` VALUES ('93', '2010', '3', '0');
INSERT INTO `qi_tag` VALUES ('94', '2011', '3', '0');
INSERT INTO `qi_tag` VALUES ('95', '2012', '3', '0');
INSERT INTO `qi_tag` VALUES ('96', '2013', '3', '0');
INSERT INTO `qi_tag` VALUES ('97', '2014', '3', '0');
INSERT INTO `qi_tag` VALUES ('98', '2015', '3', '0');

-- ----------------------------
-- Table structure for `qi_tag_link`
-- ----------------------------
DROP TABLE IF EXISTS `qi_tag_link`;
CREATE TABLE `qi_tag_link` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `film_id` int(20) NOT NULL,
  `tag_id` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qi_tag_link
-- ----------------------------
INSERT INTO `qi_tag_link` VALUES ('64', '10000', '17');
INSERT INTO `qi_tag_link` VALUES ('65', '10000', '6');
INSERT INTO `qi_tag_link` VALUES ('66', '10000', '4');
INSERT INTO `qi_tag_link` VALUES ('67', '10000', '1');
INSERT INTO `qi_tag_link` VALUES ('68', '10001', '17');
INSERT INTO `qi_tag_link` VALUES ('69', '10001', '6');
INSERT INTO `qi_tag_link` VALUES ('70', '10001', '4');
INSERT INTO `qi_tag_link` VALUES ('71', '10001', '1');

-- ----------------------------
-- Table structure for `qi_tag_type`
-- ----------------------------
DROP TABLE IF EXISTS `qi_tag_type`;
CREATE TABLE `qi_tag_type` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qi_tag_type
-- ----------------------------
INSERT INTO `qi_tag_type` VALUES ('1', '类型');
INSERT INTO `qi_tag_type` VALUES ('2', '地区');
INSERT INTO `qi_tag_type` VALUES ('3', '年代');

-- ----------------------------
-- Table structure for `qi_user`
-- ----------------------------
DROP TABLE IF EXISTS `qi_user`;
CREATE TABLE `qi_user` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `name_real` varchar(20) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `role` int(20) DEFAULT '0',
  `date_add` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_edit` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `password_times` tinyint(2) NOT NULL DEFAULT '0' COMMENT '密码错误尝试次数',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1有效，2锁定，3注销',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qi_user
-- ----------------------------
INSERT INTO `qi_user` VALUES ('100', 'admin', 'Ming.King', 'edbbf7a5afd220a65983229ed6496ed9', '13665119187', '723528197@qq.com', '1', '2015-11-05 00:00:00', '2015-12-08 10:35:56', '0', '1');
INSERT INTO `qi_user` VALUES ('102', 'jojo', 'jojo1', 'edbbf7a5afd220a65983229ed6496ed9', '', '', '2', '0000-00-00 00:00:00', '2015-12-08 10:36:46', '0', '1');
INSERT INTO `qi_user` VALUES ('103', 'fan', 'fan1', 'edbbf7a5afd220a65983229ed6496ed9', '', '', '2', '2015-12-08 10:11:57', '2015-12-08 18:07:53', '0', '1');

-- ----------------------------
-- Table structure for `qi_worker`
-- ----------------------------
DROP TABLE IF EXISTS `qi_worker`;
CREATE TABLE `qi_worker` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name_ch` varchar(50) NOT NULL,
  `name_en` varchar(50) DEFAULT NULL,
  `name_other` varchar(100) DEFAULT NULL,
  `director` tinyint(1) NOT NULL DEFAULT '0' COMMENT '导演',
  `screenwriter` tinyint(1) NOT NULL DEFAULT '0' COMMENT '编剧',
  `moviemaker` tinyint(1) NOT NULL DEFAULT '0' COMMENT '制片人',
  `actor` tinyint(1) NOT NULL DEFAULT '0' COMMENT '演员',
  `sex` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1:男，2:女',
  `constellation` varchar(10) NOT NULL DEFAULT '0' COMMENT '星座',
  `birthday` date NOT NULL DEFAULT '0000-00-00',
  `birthplace` varchar(50) NOT NULL DEFAULT '0',
  `place` int(20) NOT NULL DEFAULT '0',
  `imdb` varchar(20) NOT NULL DEFAULT '0',
  `photo` varchar(50) DEFAULT NULL,
  `date_add` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_edit` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10001 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qi_worker
-- ----------------------------
INSERT INTO `qi_worker` VALUES ('10000', '周星驰', 'Stephen Chow', '', '1', '1', '1', '1', '1', '巨蟹座', '1962-06-22', '香港', '39', 'nm0159507', '7dcc1b44d5346b8ec576a87d08929364.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `qi_worker_content`
-- ----------------------------
DROP TABLE IF EXISTS `qi_worker_content`;
CREATE TABLE `qi_worker_content` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `worker_id` int(20) NOT NULL DEFAULT '0',
  `content` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`,`worker_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qi_worker_content
-- ----------------------------
INSERT INTO `qi_worker_content` VALUES ('2', '10000', '周星驰（1962年6月22日— ），生于香港，英文名Stephen Chow，著名演员，兼导演、编剧、电影监制以及电影制作人。曾主演《九品芝麻官》、《长江七号》等多部喜剧影片。捧红过张柏芝、张雨绮等影星。曾获1998年国际杰人会港澳杰人之星奖。其与成龙和周润发并称“双周一成”，意为香港电影票房的保证。');

-- ----------------------------
-- Table structure for `qi_worker_link`
-- ----------------------------
DROP TABLE IF EXISTS `qi_worker_link`;
CREATE TABLE `qi_worker_link` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `film_id` int(20) NOT NULL,
  `worker_id` int(20) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1导演2编剧3制片人4演员',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qi_worker_link
-- ----------------------------
