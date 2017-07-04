/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : yogadatas

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-07-04 11:10:53
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for mr_active
-- ----------------------------
DROP TABLE IF EXISTS `mr_active`;
CREATE TABLE `mr_active` (
  `ad_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '//活动编号',
  `ad_author` int(10) NOT NULL COMMENT '//活动发起人',
  `ad_title` varchar(255) NOT NULL COMMENT '//活动标题',
  `ad_num` int(50) DEFAULT '0' COMMENT '//活动报名人数',
  `ad_adress` varchar(255) NOT NULL COMMENT '//活动详细地址',
  `ad_type` varchar(50) NOT NULL COMMENT '//活动类型编号',
  `ad_content` longtext COMMENT '//活动内容或详情',
  `ad_person` varchar(20) NOT NULL COMMENT '//活动联系人',
  `ad_tel` varchar(20) NOT NULL COMMENT '//活动联系方式',
  `ad_maxnum` int(10) NOT NULL DEFAULT '100' COMMENT '//最大报名数',
  `ad_photo` varchar(255) DEFAULT NULL COMMENT '//活动封面',
  `ad_pay` int(10) NOT NULL DEFAULT '0' COMMENT '//报名费用',
  `ad_payname` varchar(50) DEFAULT '' COMMENT '//费用名称',
  `ad_addtime` int(11) NOT NULL COMMENT '//添加时间',
  `ad_closingtime` int(11) NOT NULL COMMENT '//截止报名时间',
  `ad_starttime` int(11) NOT NULL COMMENT '//活动开始时间',
  `ad_lastchangetime` datetime NOT NULL COMMENT '//最后一次修改时间',
  `ad_changeadmin` int(10) NOT NULL COMMENT '//最后一次修改的管理员',
  `ad_stoptime` int(11) NOT NULL COMMENT '//结束时间',
  `ad_readnum` int(50) NOT NULL DEFAULT '0' COMMENT '//浏览数',
  `ad_agreenum` int(50) NOT NULL DEFAULT '0' COMMENT '//点赞数',
  `ad_savenum` int(50) NOT NULL DEFAULT '0' COMMENT '//收藏数',
  `ad_open` int(1) NOT NULL DEFAULT '0' COMMENT '//是否开启',
  `ad_valid` int(1) NOT NULL DEFAULT '1' COMMENT '//过期状态',
  `ad_top` int(1) NOT NULL DEFAULT '0' COMMENT '//置顶显示',
  `ad_columnid` int(1) NOT NULL DEFAULT '1' COMMENT '//活动归属（基于那些课程开展的活动，空则无限制）',
  `ad_say` varchar(255) NOT NULL COMMENT '//活动简介',
  `ad_is` int(1) NOT NULL DEFAULT '1' COMMENT '//活动标示，特殊作用',
  `ad_city` int(11) NOT NULL COMMENT '//所属城市',
  `ad_sea` int(1) NOT NULL DEFAULT '0' COMMENT '//境内境外',
  `ad_back` int(11) NOT NULL DEFAULT '0' COMMENT '1表示放入回收站的活动',
  `ad_toptime` int(11) NOT NULL COMMENT '//置顶过期时间',
  PRIMARY KEY (`ad_id`),
  KEY `fk_1` (`ad_type`) USING BTREE,
  KEY `fk_2` (`ad_author`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of mr_active
-- ----------------------------
INSERT INTO `mr_active` VALUES ('34', '1', '全国各区团练时间表', '0', 'X市X区X路X号 详见表单', 'p', '23', '详见表单', '详见表单', '0', '/uploads/2016-11-05/581d502bbd813.jpg', '0', '', '1478316075', '1514649600', '1451577600', '2016-11-09 13:10:41', '1', '1514649600', '260', '4', '0', '1', '2', '0', '1', '全国各区团练时间表', '1', '0', '0', '0', '1478927441');
INSERT INTO `mr_active` VALUES ('35', '1', '恰逢新年时，踏上心之旅——与古儒吉一起辞旧迎新', '0', 'XX市XX区XX路XX号', 'p', '39', 'XXX', '11111111111', '0', '/uploads/2016-12-04/58440a90dc5e0.jpg', '0', '', '1480854160', '1484409600', '1485187200', '2016-12-04 20:22:40', '1', '1486569600', '3', '0', '0', '1', '1', '0', '1', '与古儒吉一起辞旧迎新，度过一个难忘的春节。', '1', '0', '0', '1', '1481113360');
INSERT INTO `mr_active` VALUES ('36', '1', '恰逢新年时，踏上心之旅——与古儒吉一起辞旧迎新', '0', 'XX市XX区XX路XX号', 'p', '40', 'XXX', '11111111111', '0', '/uploads/2016-12-04/58440bb1a614e.jpg', '0', '', '1480854449', '1484409600', '1485187200', '2016-12-04 21:41:22', '1', '1486569600', '14', '0', '0', '1', '1', '0', '1', '与古儒吉一起辞旧迎新，度过一个难忘的春节。', '1', '0', '0', '0', '1481118082');

-- ----------------------------
-- Table structure for mr_active_register
-- ----------------------------
DROP TABLE IF EXISTS `mr_active_register`;
CREATE TABLE `mr_active_register` (
  `ar_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '//活动报名表编号',
  `ar_name` varchar(20) NOT NULL COMMENT '//报名人的姓名',
  `ar_tel` varchar(50) NOT NULL COMMENT '//联系方式',
  `ar_birthday` datetime NOT NULL COMMENT '//出生日期',
  `ar_sex` int(1) NOT NULL COMMENT '//性别',
  `ar_more` varchar(255) NOT NULL DEFAULT '' COMMENT '//是否参加过生活艺术的其他课程',
  `ar_email` varchar(100) NOT NULL DEFAULT '' COMMENT '//邮箱',
  `ar_activeid` int(10) NOT NULL COMMENT '//关联活动',
  `ar_userid` int(10) NOT NULL COMMENT '//关联用户',
  `ar_addtime` datetime NOT NULL COMMENT '//添加时间',
  `ar_open` int(1) NOT NULL DEFAULT '0' COMMENT '//审核通过',
  `ar_say` text CHARACTER SET utf8 COMMENT '//备注',
  PRIMARY KEY (`ar_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of mr_active_register
-- ----------------------------
INSERT INTO `mr_active_register` VALUES ('1', '王晋', '18721667531', '2016-11-03 14:08:47', '1', '', '972270516@qq.com', '30', '1', '2016-11-03 14:09:15', '0', null);

-- ----------------------------
-- Table structure for mr_admin
-- ----------------------------
DROP TABLE IF EXISTS `mr_admin`;
CREATE TABLE `mr_admin` (
  `admin_id` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT '管理员ID',
  `admin_username` varchar(20) NOT NULL COMMENT '管理员用户名',
  `admin_pwd` varchar(70) NOT NULL COMMENT '管理员密码',
  `admin_email` varchar(30) NOT NULL COMMENT '邮箱',
  `admin_realname` varchar(10) DEFAULT NULL COMMENT '真实姓名',
  `admin_tel` varchar(30) DEFAULT NULL COMMENT '电话号码',
  `admin_hits` int(8) NOT NULL DEFAULT '1' COMMENT '登陆次数',
  `admin_ip` varchar(20) DEFAULT NULL COMMENT 'IP地址',
  `admin_addtime` int(11) NOT NULL COMMENT '添加时间',
  `admin_mdemail` varchar(50) NOT NULL DEFAULT '0' COMMENT '传递修改密码参数加密',
  `admin_open` tinyint(2) NOT NULL DEFAULT '0' COMMENT '审核状态',
  PRIMARY KEY (`admin_id`),
  KEY `admin_username` (`admin_username`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mr_admin
-- ----------------------------
INSERT INTO `mr_admin` VALUES ('1', 'slackck', 'e10adc3949ba59abbe56e057f20f883e', '972270516@qq.com', 'slackck', '15959715286', '291', '127.0.0.1', '112222233', 'bb838bff2c2120b9237cac812c1019f8', '1');
INSERT INTO `mr_admin` VALUES ('2', 'xiaoli', 'e10adc3949ba59abbe56e057f20f883e', '274476526@qq.com', '李', '15959715286', '30', '127.0.0.1', '1446683501', '', '1');

-- ----------------------------
-- Table structure for mr_auth_group
-- ----------------------------
DROP TABLE IF EXISTS `mr_auth_group`;
CREATE TABLE `mr_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` longtext NOT NULL,
  `addtime` int(11) NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mr_auth_group
-- ----------------------------
INSERT INTO `mr_auth_group` VALUES ('1', '超级管理员', '1', '1,2,6,105,10,106,19,107,43,122,180,124,125,123,3,5,126,127,128,4,129,15,16,119,144,120,146,121,145,18,108,152,114,113,112,109,110,111,40,41,42,7,8,12,139,11,136,154,137,138,135,25,140,141,142,9,13,157,158,159,160,155,14,156,184,185,188,189,190,191,193,186,192,187,194,195,196,197,198,201,202,203,204,206,199,205,200,207,208,209,27,29,37,161,163,164,162,38,167,182,168,169,165,166,35,36,39,28,31,32,33,34,44,45,170,171,172,173,174,175,46,176,183,177,178,179,48,49,', '1212451252');
INSERT INTO `mr_auth_group` VALUES ('2', '管理员', '1', '1,15,16,120,146,40,41,7,8,12,139,11,136,154,137,138,135,25,140,141,142,9,13,157,158,159,160,155,14,156,184,185,188,189,190,191,193,186,192,187,194,195,196,197,198,201,202,203,204,206,199,205,200,207,208,209,29,37,161,163,164,162,38,167,182,168,169,165,166,35,36,39,31,32,33,34,44,45,170,171,172,173,174,175,46,176,183,177,178,179,48,49,22,23,24,210,211,212,213,214,215,216,217,218,219,220,221,222,223,224,225,226,227,228,184,185,186,187,188,189,190,191,192,193,194,195,196,197,198,199,200,201,202,203,204,205,206,207,208,209,231,232,233,234', '1212451252');

-- ----------------------------
-- Table structure for mr_auth_group_access
-- ----------------------------
DROP TABLE IF EXISTS `mr_auth_group_access`;
CREATE TABLE `mr_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mr_auth_group_access
-- ----------------------------
INSERT INTO `mr_auth_group_access` VALUES ('1', '1');
INSERT INTO `mr_auth_group_access` VALUES ('2', '2');
INSERT INTO `mr_auth_group_access` VALUES ('5', '1');

-- ----------------------------
-- Table structure for mr_auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `mr_auth_rule`;
CREATE TABLE `mr_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `authopen` tinyint(2) NOT NULL DEFAULT '1',
  `css` varchar(20) DEFAULT NULL COMMENT '样式',
  `condition` char(100) DEFAULT '',
  `pid` int(5) NOT NULL DEFAULT '0' COMMENT '父栏目ID',
  `sort` int(11) DEFAULT '0' COMMENT '排序',
  `addtime` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `zt` int(1) DEFAULT NULL,
  `menustatus` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=235 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mr_auth_rule
-- ----------------------------
INSERT INTO `mr_auth_rule` VALUES ('1', 'Sys', '系统设置', '1', '1', '0', 'fa-cogs', '', '0', '0', '1446535750', '1', '1');
INSERT INTO `mr_auth_rule` VALUES ('2', 'Sys/sys', '系统参数设置', '1', '0', '0', '', '', '1', '0', '1446535789', '1', '1');
INSERT INTO `mr_auth_rule` VALUES ('3', 'Sys/database', '数据备份/下载', '1', '0', '0', '', '', '1', '0', '1446535805', '0', '0');
INSERT INTO `mr_auth_rule` VALUES ('4', 'Sys/import', '数据库下载', '1', '1', '0', '', '', '3', '10', '1446535750', '1', '1');
INSERT INTO `mr_auth_rule` VALUES ('5', 'Sys/database', '数据库备份', '1', '1', '0', '', '', '3', '1', '1446535834', '1', '1');
INSERT INTO `mr_auth_rule` VALUES ('6', 'Sys/sys', '站点设置', '1', '1', '0', '', '', '2', '0', '1446535843', '1', '1');
INSERT INTO `mr_auth_rule` VALUES ('7', 'News', '应用管理', '1', '1', '0', 'fa-folder', '', '0', '1', '1446535875', '1', '1');
INSERT INTO `mr_auth_rule` VALUES ('8', 'News/news_list', '活动操作', '1', '1', '1', '', '', '7', '0', '1446535875', '1', '1');
INSERT INTO `mr_auth_rule` VALUES ('9', 'News/news_column', '栏目管理', '1', '0', '0', '', '', '7', '0', '1446535750', '1', '1');
INSERT INTO `mr_auth_rule` VALUES ('10', 'Sys/wesys', '微信设置', '1', '1', '0', '', '', '2', '0', '1446535750', '0', '0');
INSERT INTO `mr_auth_rule` VALUES ('11', 'News/news_list', '活动列表', '1', '1', '1', '', '', '8', '1', '1446535750', '1', '1');
INSERT INTO `mr_auth_rule` VALUES ('12', 'News/news_listadd', '添加活动', '1', '1', '1', '', '', '8', '2', '1446535750', '1', '1');
INSERT INTO `mr_auth_rule` VALUES ('13', 'News/news_column', '栏目列表', '1', '1', '0', '', '', '9', '0', '1446535750', '1', '1');
INSERT INTO `mr_auth_rule` VALUES ('14', 'News/news_columnadd', '添加栏目', '1', '1', '0', '', '', '9', '0', '1446535750', '1', '1');
INSERT INTO `mr_auth_rule` VALUES ('15', 'Sys/admin_list', '管理员管理', '1', '1', '0', '', '', '1', '0', '1446535750', '1', '1');
INSERT INTO `mr_auth_rule` VALUES ('16', 'Sys/admin_list', '管理员列表', '1', '1', '0', '', '', '15', '0', '1446535750', '1', '1');
INSERT INTO `mr_auth_rule` VALUES ('17', 'Sys/admin_group', '用户组列表', '1', '1', '1', '', '', '15', '0', '1446535750', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('18', 'Sys/admin_rule', '权限管理', '1', '1', '1', '', '', '15', '1', '1446535750', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('19', 'Sys/emailsys', '邮件设置', '1', '1', '0', '', '', '2', '0', '1446535750', '1', '1');
INSERT INTO `mr_auth_rule` VALUES ('22', 'Help', '帮助中心', '1', '1', '1', 'fa-cogs', '', '0', '500', '1446711367', '1', '1');
INSERT INTO `mr_auth_rule` VALUES ('23', 'Help/soft', '软件下载', '1', '1', '1', '', '', '22', '50', '1446711421', '0', '1');
INSERT INTO `mr_auth_rule` VALUES ('24', 'Help/soft', '软件下载', '1', '1', '1', '', '', '23', '50', '1446711448', '0', '1');
INSERT INTO `mr_auth_rule` VALUES ('25', 'News/news_back', '回收站', '1', '1', '1', '', '', '8', '3', '1447039310', '1', '1');
INSERT INTO `mr_auth_rule` VALUES ('26', 'Sys/pay', '支付配置', '1', '1', '0', '', '', '2', '50', '1447231369', '0', '1');
INSERT INTO `mr_auth_rule` VALUES ('27', 'Member', '会员管理', '1', '1', '1', 'fa-users', '', '0', '50', '1447231507', '0', '0');
INSERT INTO `mr_auth_rule` VALUES ('28', 'Plug', '插件功能', '1', '1', '0', 'fa-plug', '', '0', '400', '1447231590', '1', '1');
INSERT INTO `mr_auth_rule` VALUES ('29', 'Member/member_list', '会员列表', '1', '1', '0', '', '', '27', '10', '1447232085', '1', '1');
INSERT INTO `mr_auth_rule` VALUES ('31', 'Plug/plug_link_list', '友情链接', '1', '0', '0', '', '', '28', '50', '1447232183', '0', '1');
INSERT INTO `mr_auth_rule` VALUES ('32', 'Plug/plug_link_list', '链接列表', '1', '1', '0', '', '', '31', '50', '1447639935', '0', '1');
INSERT INTO `mr_auth_rule` VALUES ('33', 'Plug/plug_link_add', '添加链接', '1', '1', '0', '', '', '31', '50', '1447639950', '0', '1');
INSERT INTO `mr_auth_rule` VALUES ('34', 'Plug/plug_linktype_list', '所属栏目', '1', '1', '0', '', '', '31', '50', '1447640839', '0', '1');
INSERT INTO `mr_auth_rule` VALUES ('35', 'We', '微信基本功能', '1', '0', '0', 'fa-weixin', '', '0', '150', '1447842435', '0', '1');
INSERT INTO `mr_auth_rule` VALUES ('36', 'We/we_menu', '自定义菜单', '1', '1', '0', '', '', '35', '50', '1447842477', '0', '1');
INSERT INTO `mr_auth_rule` VALUES ('44', 'Plug/plug_ad_list', '广告管理(暂支持更换banner)', '1', '1', '0', '', '', '28', '50', '1450314265', '1', '1');
INSERT INTO `mr_auth_rule` VALUES ('37', 'Member/member_list', '会员列表', '1', '1', '0', '', '', '29', '50', '1448413219', '1', '1');
INSERT INTO `mr_auth_rule` VALUES ('38', 'Member/member_group', '会员组', '1', '1', '0', '', '', '29', '50', '1448413248', '1', '1');
INSERT INTO `mr_auth_rule` VALUES ('39', 'We/we_menu', '自定义菜单', '1', '1', '0', '', '', '36', '50', '1448501584', '0', '1');
INSERT INTO `mr_auth_rule` VALUES ('40', 'Sys/excel_export', '报名表导出', '1', '1', '0', '', '', '1', '50', '1448613588', '0', '1');
INSERT INTO `mr_auth_rule` VALUES ('41', 'Sys/excel_import', 'Excel导入', '1', '1', '0', '', '', '40', '50', '1448613614', '0', '0');
INSERT INTO `mr_auth_rule` VALUES ('42', 'Sys/excel_export', '报名表导出', '1', '1', '0', '', '', '40', '50', '1448613651', '0', '1');
INSERT INTO `mr_auth_rule` VALUES ('43', 'Sys/source', '来源管理', '1', '1', '0', '', '', '2', '50', '1448940532', '1', '1');
INSERT INTO `mr_auth_rule` VALUES ('45', 'Plug/plug_ad_list', '广告设置', '1', '1', '0', '', '', '44', '50', '1450314297', '1', '1');
INSERT INTO `mr_auth_rule` VALUES ('46', 'Plug/plug_adtype_list', '广告位设置', '1', '1', '0', '', '', '44', '50', '1450314324', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('48', 'Plug/plug_sug_list', '留言插件', '1', '0', '0', '', '', '28', '50', '1451267354', '0', '1');
INSERT INTO `mr_auth_rule` VALUES ('49', 'Plug/plug_sug_list', '留言管理', '1', '1', '0', '', '', '48', '50', '1451267369', '0', '1');
INSERT INTO `mr_auth_rule` VALUES ('105', 'Sys/runsys', '操作-保存', '1', '1', '0', '', '', '6', '50', '1461036331', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('106', 'Sys/runwesys', '操作-保存', '1', '1', '0', '', '', '10', '50', '1461037680', '0', '0');
INSERT INTO `mr_auth_rule` VALUES ('107', 'Sys/runemail', '操作-保存', '1', '1', '0', '', '', '19', '50', '1461039346', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('108', 'Sys/admin_rule_add', '操作-添加', '1', '1', '0', '', '', '18', '0', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('109', 'Sys/admin_rule_state', '操作-状态', '1', '1', '0', '', '', '18', '5', '1461550949', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('110', 'Sys/admin_rule_tz', '操作-验证', '1', '1', '0', '', '', '18', '6', '1461551129', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('111', 'Sys/ruleorder', '操作-排序', '1', '1', '0', '', '', '18', '7', '1461551263', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('112', 'Sys/admin_rule_del', '操作-删除', '1', '1', '0', '', '', '18', '4', '1461551536', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('113', 'Sys/admin_rule_runedit', '操作-改存', '1', '1', '0', '', '', '18', '3', '1461551855', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('114', 'Sys/admin_rule_edit', '操作-修改', '1', '1', '0', '', '', '18', '2', '1461551913', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('115', 'Sys/admin_group_runadd', '操作-添存', '1', '1', '0', '', '', '17', '2', '1461552280', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('116', 'Sys/admin_group_edit', '操作-修改', '1', '1', '0', '', '', '17', '3', '1461552326', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('117', 'Sys/admin_group_del', '操作-删除', '1', '1', '0', '', '', '17', '30', '1461552349', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('118', 'Sys/admin_group_access', '操作-权限', '1', '1', '0', '', '', '17', '40', '1461552404', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('119', 'Sys/admin_list_add', '操作-添加', '1', '1', '0', '', '', '16', '0', '1461553162', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('120', 'Sys/admin_list_edit', '操作-修改', '1', '1', '0', '', '', '16', '2', '1461554130', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('121', 'Sys/admin_list_del', '操作-删除', '1', '1', '0', '', '', '16', '4', '1461554152', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('122', 'Sys/source_runadd', '操作-添加', '1', '1', '0', '', '', '43', '10', '1461036331', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('123', 'Sys/source_order', '操作-排序', '1', '1', '0', '', '', '43', '50', '1461037680', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('124', 'Sys/source_runedit', '操作-改存', '1', '1', '0', '', '', '43', '30', '1461039346', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('125', 'Sys/source_del', '操作-删除', '1', '1', '0', '', '', '43', '40', '146103934', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('126', 'Sys/export', '操作-备份', '1', '1', '0', '', '', '5', '1', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('127', 'Sys/optimize', '操作-优化', '1', '1', '0', '', '', '5', '1', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('128', 'Sys/repair', '操作-修复', '1', '1', '0', '', '', '5', '1', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('129', 'Sys/del', '操作-删除', '1', '1', '0', '', '', '4', '1', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('130', 'Sys/bxgs_state', '操作-状态', '1', '1', '0', '', '', '67', '5', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('131', 'Sys/bxgs_edit', '操作-修改', '1', '1', '0', '', '', '67', '1', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('132', 'Sys/bxgs_runedit', '操作-改存', '1', '1', '0', '', '', '67', '2', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('135', 'News/news_list_state', '操作-状态', '1', '1', '0', '', '', '11', '4', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('134', 'Sys/myinfo_runedit', '个人资料修改', '1', '1', '0', '', '', '68', '1', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('136', 'News/news_list_edit', '操作-修改', '1', '1', '1', '', '', '11', '0', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('137', 'News/news_list_del', '操作-删除', '1', '1', '0', '', '', '11', '2', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('138', 'News/news_list_alldel', '操作-批删', '1', '1', '0', '', '', '11', '3', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('139', 'News/news_runadd', '操作-保存', '1', '1', '1', '', '', '12', '1', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('140', 'News/news_back_open', '操作-还原', '1', '1', '0', '', '', '25', '1', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('141', 'News/news_back_del', '操作-彻删', '1', '1', '0', '', '', '25', '1', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('142', 'News/news_back_alldel', '操作-批删', '1', '1', '0', '', '', '25', '1', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('155', 'News/leftnavorder', '操作-排序', '1', '1', '0', '', '', '13', '5', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('147', 'Sys/admin_group_runadd', '操作-添存', '1', '1', '0', '', '', '17', '50', '1461812136', null, '0');
INSERT INTO `mr_auth_rule` VALUES ('144', 'Sys/admin_list_runadd', '操作-添存', '1', '1', '0', '', '', '16', '1', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('145', 'Sys/admin_list_state', '操作-状态', '1', '1', '0', '', '', '16', '5', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('146', 'Sys/admin_list_runedit', '操作-改存', '1', '1', '0', '', '', '16', '3', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('148', 'Sys/admin_group_add', '操作-添加', '1', '1', '0', '', '', '17', '50', '1461812245', null, '0');
INSERT INTO `mr_auth_rule` VALUES ('149', 'Sys/admin_group_add', '操作-添加', '1', '1', '0', '', '', '17', '1', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('150', 'Sys/admin_group_runedit', '操作-改存', '1', '1', '0', '', '', '17', '4', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('151', 'Sys/admin_group_runaccess', '操作-权存', '1', '1', '0', '', '', '17', '50', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('152', 'Sys/admin_rule_add', '操作-添存', '1', '1', '0', '', '', '18', '1', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('153', 'Sys/bxgs_runadd', '操作-添存', '1', '1', '0', '', '', '66', '1', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('154', 'News/news_runedit', '操作-改存', '1', '1', '0', '', '', '11', '1', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('156', 'News/runnews_columnadd', '操作-添存', '1', '1', '0', '', '', '14', '1', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('157', 'News/news_columnedit', '操作-修改', '1', '1', '0', '', '', '13', '1', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('158', 'News/runnews_columnedit', '操作-改存', '1', '1', '0', '', '', '13', '2', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('159', 'News/news_columndel', '操作-删除', '1', '1', '0', '', '', '13', '3', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('160', 'News/column_state', '操作-状态', '1', '1', '0', '', '', '13', '4', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('161', 'Member/member_list_state', '操作-状态', '1', '1', '0', '', '', '37', '10', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('162', 'Member/member_list_del', '操作-删除', '1', '1', '0', '', '', '37', '40', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('163', 'Member/member_list_edit', '操作-审核', '1', '1', '0', '', '', '37', '20', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('164', 'Member/member_list_runedit', '操作-保存', '1', '1', '0', '', '', '37', '30', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('165', 'Member/member_group_state', '操作-状态', '1', '1', '0', '', '', '38', '40', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('166', 'Member/member_group_order', '操作-排序', '1', '1', '0', '', '', '38', '50', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('167', 'Member/member_group_runadd', '操作-添加', '1', '1', '0', '', '', '38', '10', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('168', 'Member/member_group_runedit', '操作-改存', '1', '1', '0', '', '', '38', '20', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('169', 'Member/member_group_del', '操作-删除', '1', '1', '0', '', '', '38', '30', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('170', 'Plug/plug_ad_runadd', '操作-添加', '1', '1', '0', '', '', '45', '10', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('171', 'Plug/plug_ad_edit', '操作-修改', '1', '1', '0', '', '', '45', '20', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('172', 'Plug/plug_ad_runedit', '操作-改存', '1', '1', '0', '', '', '45', '30', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('173', 'Plug/plug_ad_del', '操作-删除', '1', '1', '0', '', '', '45', '40', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('174', 'Plug/plug_ad_order', '操作-排序', '1', '1', '0', '', '', '45', '50', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('175', 'Plug/plug_ad_state', '操作-状态', '1', '1', '0', '', '', '45', '60', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('176', 'Plug/plug_adtype_runadd', '操作-添加', '1', '1', '0', '', '', '46', '10', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('177', 'Plug/plug_adtype_runedit', '操作-改存', '1', '1', '0', '', '', '46', '20', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('178', 'Plug/plug_adtype_del', '操作-删除', '1', '0', '0', '', '', '46', '30', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('179', 'Plug/plug_adtype_order', '操作-排序', '1', '1', '0', '', '', '46', '40', '1461550835', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('180', 'Sys/source_edit', '操作-修改', '1', '1', '0', '', '', '43', '20', '1461832933', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('181', 'Sys/admin_group_state', '操作-状态', '1', '1', '0', '', '', '17', '50', '1461834340', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('182', 'Member/member_group_edit', '操作-修改', '1', '1', '0', '', '', '38', '15', '1461834780', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('183', 'Plug/plug_adtype_edit', '操作-修改', '1', '1', '0', '', '', '46', '15', '1461834988', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('184', 'News/class_list', '课程操作', '1', '1', '1', ' ', '', '7', '0', '1446535750', '1', '1');
INSERT INTO `mr_auth_rule` VALUES ('185', 'News/class_list', '课程列表', '1', '1', '1', ' ', '', '184', '1', '1446535750', '1', '1');
INSERT INTO `mr_auth_rule` VALUES ('186', 'News/class_listadd', '添加课程', '1', '1', '1', ' ', '', '184', '2', '1446535750', '1', '1');
INSERT INTO `mr_auth_rule` VALUES ('187', 'News/class_back', '回收站', '1', '1', '0', ' ', '', '184', '3', '1446535750', '1', '1');
INSERT INTO `mr_auth_rule` VALUES ('188', 'News/class_list_state', '操作-状态', '1', '1', '0', ' ', '', '185', '0', '1446535750', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('189', 'News/class_list_edit', '操作-修改', '1', '1', '1', ' ', '', '185', '0', '1446535750', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('190', 'News/class_list_del', '操作-删除', '1', '1', '0', ' ', '', '185', '0', '1446535750', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('191', 'News/class_list_alldel', '操作-批删', '1', '1', '0', ' ', '', '185', '0', '1446535750', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('192', 'News/class_runadd', '操作-保存', '1', '1', '1', ' ', '', '186', '0', '1446535750', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('193', 'News/class_runedit', '操作-改存', '1', '1', '0', ' ', '', '185', '0', '1446535750', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('194', 'News/class_back_open', '操作-还原', '1', '1', '0', ' ', '', '187', '0', '1446535750', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('195', 'News/class_back_del', '操作-彻删', '1', '1', '0', ' ', '', '187', '0', '1446535750', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('196', 'News/class_back_alldel', '操作-批删', '1', '1', '0', ' ', '', '187', '0', '1446535750', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('197', 'News/knows_list', '知识操作', '1', '1', '1', null, '', '7', '0', '1446535750', '1', '1');
INSERT INTO `mr_auth_rule` VALUES ('198', 'News/knows_list', '知识列表', '1', '1', '1', null, '', '197', '0', '1446535750', '1', '1');
INSERT INTO `mr_auth_rule` VALUES ('199', 'News/knows_listadd', '添加知识', '1', '1', '1', null, '', '197', '0', '1446535750', '1', '1');
INSERT INTO `mr_auth_rule` VALUES ('200', 'News/knows_back', '回收站', '1', '1', '0', null, '', '197', '0', '1446535750', '1', '1');
INSERT INTO `mr_auth_rule` VALUES ('201', 'News/knows_list_state', '操作-状态', '1', '1', '0', null, '', '198', '0', '1446535750', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('202', 'News/knows_list_edit', '操作-修改', '1', '1', '1', null, '', '198', '0', '1446535750', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('203', 'News/knows_list_del', '操作-删除', '1', '1', '0', null, '', '198', '0', '1446535750', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('204', 'News/knows_list_alldel', '操作-批删', '1', '1', '0', null, '', '198', '0', '1446535750', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('205', 'News/knows_runadd', '操作-保存', '1', '1', '1', null, '', '199', '0', '1446535750', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('206', 'News/knows_list_runedit', '操作-改存', '1', '1', '0', null, '', '198', '0', '1446535750', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('207', 'News/knows_back_open', '操作-还原', '1', '1', '0', null, '', '200', '0', '1446535750', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('208', 'News/knows_back_del', '操作-彻删', '1', '1', '0', null, '', '200', '0', '1446535750', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('209', 'News/knows_back_alldel', '操作-批删', '1', '1', '0', null, '', '200', '0', '1446535750', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('210', 'News/active_register_list', '活动报名查看', '1', '1', '0', null, '', '11', '0', '1446535750', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('211', 'News/active_register_list', '活动报名列表', '1', '1', '0', '', '', '210', '0', '1446535750', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('212', 'News/class_register_list', '课程报名查看', '1', '1', '0', '', '', '185', '0', '1446535750', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('213', 'News/class_register_list', '课程报名列表', '1', '1', '0', '', '', '212', '0', '1446535750', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('214', 'News/active_register_listedit', '操作-修改', '1', '1', '0', '', '', '211', '0', '1446535750', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('215', 'News/active_register_runedit', '操作-改存', '1', '1', '0', '', '', '211', '0', '1446535750', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('216', 'News/active_register_del', '操作-撤删', '1', '1', '0', '', '', '211', '0', '1446535750', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('217', 'News/active_register_alldel', '操作-批删', '1', '1', '0', '', '', '211', '0', '1446535750', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('218', 'News/active_list_state', '操作-状态', '1', '1', '0', '', '', '211', '0', '1446535750', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('219', 'News/class_register_runedit', '操作-改存', '1', '1', '0', '', '', '213', '0', '1446535750', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('220', 'News/class_register_del', '操作-撤删', '1', '1', '0', '', '', '213', '0', '1446535750', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('221', 'News/class_register_alldel', '操作-批删', '1', '1', '0', '', '', '213', '0', '1446535750', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('222', 'News/class_register_listedit', '操作-修改', '1', '1', '0', null, '', '213', '0', '1446535750', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('223', 'News/classregister_list_state', '操作-状态', '1', '1', '0', '', '', '213', '0', '1446535750', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('224', 'News/save_copy', '复制活动内容', '1', '1', '1', null, '', '11', '0', '1446535750', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('225', 'News/save_copy', '复制课程内容', '1', '1', '1', '', '', '185', '0', '1446535750', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('226', 'News/activeById', '查看活动详情', '1', '1', '1', null, '', '11', '0', '1446535750', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('227', 'News/classById', '查看课程详情', '1', '1', '1', '', '', '185', '0', '1446535750', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('228', 'News/knowsById', '查看知识详情', '1', '1', '1', '', '', '197', '0', '1446535750', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('229', 'Sys/excel_runexport', '活动报名导出', '1', '1', '1', null, '', '42', '0', '1446535750', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('230', 'Sys/excel_runexport_class', '课程报名导出', '1', '1', '1', '', '', '42', '0', '1446535750', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('231', 'Mobile/active_register_list', '手机活动报名查看', '1', '1', '0', '', '', '11', '0', '1446535750', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('232', 'Mobile/class_register_list', '手机课程报名查看', '1', '1', '0', null, '', '185', '0', '1446535750', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('233', 'Mobile/classregister_list_state', '手机课程报名状态修改', '1', '1', '0', '', '', '213', '0', '1446535750', '1', '0');
INSERT INTO `mr_auth_rule` VALUES ('234', 'Mobile/register_list_state', '手机活动报名状态修改', '1', '1', '0', '', '', '211', '0', '1446535750', '1', '0');

-- ----------------------------
-- Table structure for mr_city
-- ----------------------------
DROP TABLE IF EXISTS `mr_city`;
CREATE TABLE `mr_city` (
  `id` int(11) NOT NULL,
  `cityname` varchar(50) NOT NULL,
  `pid` int(11) NOT NULL,
  `zipcode` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mr_city
-- ----------------------------
INSERT INTO `mr_city` VALUES ('1', '北京市', '1', '100000');
INSERT INTO `mr_city` VALUES ('2', '天津市', '2', '100000');
INSERT INTO `mr_city` VALUES ('3', '石家庄市', '3', '050000');
INSERT INTO `mr_city` VALUES ('4', '唐山市', '3', '063000');
INSERT INTO `mr_city` VALUES ('5', '秦皇岛市', '3', '066000');
INSERT INTO `mr_city` VALUES ('6', '邯郸市', '3', '056000');
INSERT INTO `mr_city` VALUES ('7', '邢台市', '3', '054000');
INSERT INTO `mr_city` VALUES ('8', '保定市', '3', '071000');
INSERT INTO `mr_city` VALUES ('9', '张家口市', '3', '075000');
INSERT INTO `mr_city` VALUES ('10', '承德市', '3', '067000');
INSERT INTO `mr_city` VALUES ('11', '沧州市', '3', '061000');
INSERT INTO `mr_city` VALUES ('12', '廊坊市', '3', '065000');
INSERT INTO `mr_city` VALUES ('13', '衡水市', '3', '053000');
INSERT INTO `mr_city` VALUES ('14', '太原市', '4', '030000');
INSERT INTO `mr_city` VALUES ('15', '大同市', '4', '037000');
INSERT INTO `mr_city` VALUES ('16', '阳泉市', '4', '045000');
INSERT INTO `mr_city` VALUES ('17', '长治市', '4', '046000');
INSERT INTO `mr_city` VALUES ('18', '晋城市', '4', '048000');
INSERT INTO `mr_city` VALUES ('19', '朔州市', '4', '036000');
INSERT INTO `mr_city` VALUES ('20', '晋中市', '4', '030600');
INSERT INTO `mr_city` VALUES ('21', '运城市', '4', '044000');
INSERT INTO `mr_city` VALUES ('22', '忻州市', '4', '034000');
INSERT INTO `mr_city` VALUES ('23', '临汾市', '4', '041000');
INSERT INTO `mr_city` VALUES ('24', '吕梁市', '4', '030500');
INSERT INTO `mr_city` VALUES ('25', '呼和浩特市', '5', '010000');
INSERT INTO `mr_city` VALUES ('26', '包头市', '5', '014000');
INSERT INTO `mr_city` VALUES ('27', '乌海市', '5', '016000');
INSERT INTO `mr_city` VALUES ('28', '赤峰市', '5', '024000');
INSERT INTO `mr_city` VALUES ('29', '通辽市', '5', '028000');
INSERT INTO `mr_city` VALUES ('30', '鄂尔多斯市', '5', '010300');
INSERT INTO `mr_city` VALUES ('31', '呼伦贝尔市', '5', '021000');
INSERT INTO `mr_city` VALUES ('32', '巴彦淖尔市', '5', '014400');
INSERT INTO `mr_city` VALUES ('33', '乌兰察布市', '5', '011800');
INSERT INTO `mr_city` VALUES ('34', '兴安盟', '5', '137500');
INSERT INTO `mr_city` VALUES ('35', '锡林郭勒盟', '5', '011100');
INSERT INTO `mr_city` VALUES ('36', '阿拉善盟', '5', '016000');
INSERT INTO `mr_city` VALUES ('37', '沈阳市', '6', '110000');
INSERT INTO `mr_city` VALUES ('38', '大连市', '6', '116000');
INSERT INTO `mr_city` VALUES ('39', '鞍山市', '6', '114000');
INSERT INTO `mr_city` VALUES ('40', '抚顺市', '6', '113000');
INSERT INTO `mr_city` VALUES ('41', '本溪市', '6', '117000');
INSERT INTO `mr_city` VALUES ('42', '丹东市', '6', '118000');
INSERT INTO `mr_city` VALUES ('43', '锦州市', '6', '121000');
INSERT INTO `mr_city` VALUES ('44', '营口市', '6', '115000');
INSERT INTO `mr_city` VALUES ('45', '阜新市', '6', '123000');
INSERT INTO `mr_city` VALUES ('46', '辽阳市', '6', '111000');
INSERT INTO `mr_city` VALUES ('47', '盘锦市', '6', '124000');
INSERT INTO `mr_city` VALUES ('48', '铁岭市', '6', '112000');
INSERT INTO `mr_city` VALUES ('49', '朝阳市', '6', '122000');
INSERT INTO `mr_city` VALUES ('50', '葫芦岛市', '6', '125000');
INSERT INTO `mr_city` VALUES ('51', '长春市', '7', '130000');
INSERT INTO `mr_city` VALUES ('52', '吉林市', '7', '132000');
INSERT INTO `mr_city` VALUES ('53', '四平市', '7', '136000');
INSERT INTO `mr_city` VALUES ('54', '辽源市', '7', '136200');
INSERT INTO `mr_city` VALUES ('55', '通化市', '7', '134000');
INSERT INTO `mr_city` VALUES ('56', '白山市', '7', '134300');
INSERT INTO `mr_city` VALUES ('57', '松原市', '7', '131100');
INSERT INTO `mr_city` VALUES ('58', '白城市', '7', '137000');
INSERT INTO `mr_city` VALUES ('59', '延边朝鲜族自治州', '7', '133000');
INSERT INTO `mr_city` VALUES ('60', '哈尔滨市', '8', '150000');
INSERT INTO `mr_city` VALUES ('61', '齐齐哈尔市', '8', '161000');
INSERT INTO `mr_city` VALUES ('62', '鸡西市', '8', '158100');
INSERT INTO `mr_city` VALUES ('63', '鹤岗市', '8', '154100');
INSERT INTO `mr_city` VALUES ('64', '双鸭山市', '8', '155100');
INSERT INTO `mr_city` VALUES ('65', '大庆市', '8', '163000');
INSERT INTO `mr_city` VALUES ('66', '伊春市', '8', '152300');
INSERT INTO `mr_city` VALUES ('67', '佳木斯市', '8', '154000');
INSERT INTO `mr_city` VALUES ('68', '七台河市', '8', '154600');
INSERT INTO `mr_city` VALUES ('69', '牡丹江市', '8', '157000');
INSERT INTO `mr_city` VALUES ('70', '黑河市', '8', '164300');
INSERT INTO `mr_city` VALUES ('71', '绥化市', '8', '152000');
INSERT INTO `mr_city` VALUES ('72', '大兴安岭地区', '8', '165000');
INSERT INTO `mr_city` VALUES ('73', '上海市', '9', '200000');
INSERT INTO `mr_city` VALUES ('74', '南京市', '10', '210000');
INSERT INTO `mr_city` VALUES ('75', '无锡市', '10', '214000');
INSERT INTO `mr_city` VALUES ('76', '徐州市', '10', '221000');
INSERT INTO `mr_city` VALUES ('77', '常州市', '10', '213000');
INSERT INTO `mr_city` VALUES ('78', '苏州市', '10', '215000');
INSERT INTO `mr_city` VALUES ('79', '南通市', '10', '226000');
INSERT INTO `mr_city` VALUES ('80', '连云港市', '10', '222000');
INSERT INTO `mr_city` VALUES ('81', '淮安市', '10', '223200');
INSERT INTO `mr_city` VALUES ('82', '盐城市', '10', '224000');
INSERT INTO `mr_city` VALUES ('83', '扬州市', '10', '225000');
INSERT INTO `mr_city` VALUES ('84', '镇江市', '10', '212000');
INSERT INTO `mr_city` VALUES ('85', '泰州市', '10', '225300');
INSERT INTO `mr_city` VALUES ('86', '宿迁市', '10', '223800');
INSERT INTO `mr_city` VALUES ('87', '杭州市', '11', '310000');
INSERT INTO `mr_city` VALUES ('88', '宁波市', '11', '315000');
INSERT INTO `mr_city` VALUES ('89', '温州市', '11', '325000');
INSERT INTO `mr_city` VALUES ('90', '嘉兴市', '11', '314000');
INSERT INTO `mr_city` VALUES ('91', '湖州市', '11', '313000');
INSERT INTO `mr_city` VALUES ('92', '绍兴市', '11', '312000');
INSERT INTO `mr_city` VALUES ('93', '金华市', '11', '321000');
INSERT INTO `mr_city` VALUES ('94', '衢州市', '11', '324000');
INSERT INTO `mr_city` VALUES ('95', '舟山市', '11', '316000');
INSERT INTO `mr_city` VALUES ('96', '台州市', '11', '318000');
INSERT INTO `mr_city` VALUES ('97', '丽水市', '11', '323000');
INSERT INTO `mr_city` VALUES ('98', '合肥市', '12', '230000');
INSERT INTO `mr_city` VALUES ('99', '芜湖市', '12', '241000');
INSERT INTO `mr_city` VALUES ('100', '蚌埠市', '12', '233000');
INSERT INTO `mr_city` VALUES ('101', '淮南市', '12', '232000');
INSERT INTO `mr_city` VALUES ('102', '马鞍山市', '12', '243000');
INSERT INTO `mr_city` VALUES ('103', '淮北市', '12', '235000');
INSERT INTO `mr_city` VALUES ('104', '铜陵市', '12', '244000');
INSERT INTO `mr_city` VALUES ('105', '安庆市', '12', '246000');
INSERT INTO `mr_city` VALUES ('106', '黄山市', '12', '242700');
INSERT INTO `mr_city` VALUES ('107', '滁州市', '12', '239000');
INSERT INTO `mr_city` VALUES ('108', '阜阳市', '12', '236100');
INSERT INTO `mr_city` VALUES ('109', '宿州市', '12', '234100');
INSERT INTO `mr_city` VALUES ('110', '巢湖市', '12', '238000');
INSERT INTO `mr_city` VALUES ('111', '六安市', '12', '237000');
INSERT INTO `mr_city` VALUES ('112', '亳州市', '12', '236800');
INSERT INTO `mr_city` VALUES ('113', '池州市', '12', '247100');
INSERT INTO `mr_city` VALUES ('114', '宣城市', '12', '366000');
INSERT INTO `mr_city` VALUES ('115', '福州市', '13', '350000');
INSERT INTO `mr_city` VALUES ('116', '厦门市', '13', '361000');
INSERT INTO `mr_city` VALUES ('117', '莆田市', '13', '351100');
INSERT INTO `mr_city` VALUES ('118', '三明市', '13', '365000');
INSERT INTO `mr_city` VALUES ('119', '泉州市', '13', '362000');
INSERT INTO `mr_city` VALUES ('120', '漳州市', '13', '363000');
INSERT INTO `mr_city` VALUES ('121', '南平市', '13', '353000');
INSERT INTO `mr_city` VALUES ('122', '龙岩市', '13', '364000');
INSERT INTO `mr_city` VALUES ('123', '宁德市', '13', '352100');
INSERT INTO `mr_city` VALUES ('124', '南昌市', '14', '330000');
INSERT INTO `mr_city` VALUES ('125', '景德镇市', '14', '333000');
INSERT INTO `mr_city` VALUES ('126', '萍乡市', '14', '337000');
INSERT INTO `mr_city` VALUES ('127', '九江市', '14', '332000');
INSERT INTO `mr_city` VALUES ('128', '新余市', '14', '338000');
INSERT INTO `mr_city` VALUES ('129', '鹰潭市', '14', '335000');
INSERT INTO `mr_city` VALUES ('130', '赣州市', '14', '341000');
INSERT INTO `mr_city` VALUES ('131', '吉安市', '14', '343000');
INSERT INTO `mr_city` VALUES ('132', '宜春市', '14', '336000');
INSERT INTO `mr_city` VALUES ('133', '抚州市', '14', '332900');
INSERT INTO `mr_city` VALUES ('134', '上饶市', '14', '334000');
INSERT INTO `mr_city` VALUES ('135', '济南市', '15', '250000');
INSERT INTO `mr_city` VALUES ('136', '青岛市', '15', '266000');
INSERT INTO `mr_city` VALUES ('137', '淄博市', '15', '255000');
INSERT INTO `mr_city` VALUES ('138', '枣庄市', '15', '277100');
INSERT INTO `mr_city` VALUES ('139', '东营市', '15', '257000');
INSERT INTO `mr_city` VALUES ('140', '烟台市', '15', '264000');
INSERT INTO `mr_city` VALUES ('141', '潍坊市', '15', '261000');
INSERT INTO `mr_city` VALUES ('142', '济宁市', '15', '272100');
INSERT INTO `mr_city` VALUES ('143', '泰安市', '15', '271000');
INSERT INTO `mr_city` VALUES ('144', '威海市', '15', '265700');
INSERT INTO `mr_city` VALUES ('145', '日照市', '15', '276800');
INSERT INTO `mr_city` VALUES ('146', '莱芜市', '15', '271100');
INSERT INTO `mr_city` VALUES ('147', '临沂市', '15', '276000');
INSERT INTO `mr_city` VALUES ('148', '德州市', '15', '253000');
INSERT INTO `mr_city` VALUES ('149', '聊城市', '15', '252000');
INSERT INTO `mr_city` VALUES ('150', '滨州市', '15', '256600');
INSERT INTO `mr_city` VALUES ('151', '荷泽市', '15', '255000');
INSERT INTO `mr_city` VALUES ('152', '郑州市', '16', '450000');
INSERT INTO `mr_city` VALUES ('153', '开封市', '16', '475000');
INSERT INTO `mr_city` VALUES ('154', '洛阳市', '16', '471000');
INSERT INTO `mr_city` VALUES ('155', '平顶山市', '16', '467000');
INSERT INTO `mr_city` VALUES ('156', '安阳市', '16', '454900');
INSERT INTO `mr_city` VALUES ('157', '鹤壁市', '16', '456600');
INSERT INTO `mr_city` VALUES ('158', '新乡市', '16', '453000');
INSERT INTO `mr_city` VALUES ('159', '焦作市', '16', '454100');
INSERT INTO `mr_city` VALUES ('160', '濮阳市', '16', '457000');
INSERT INTO `mr_city` VALUES ('161', '许昌市', '16', '461000');
INSERT INTO `mr_city` VALUES ('162', '漯河市', '16', '462000');
INSERT INTO `mr_city` VALUES ('163', '三门峡市', '16', '472000');
INSERT INTO `mr_city` VALUES ('164', '南阳市', '16', '473000');
INSERT INTO `mr_city` VALUES ('165', '商丘市', '16', '476000');
INSERT INTO `mr_city` VALUES ('166', '信阳市', '16', '464000');
INSERT INTO `mr_city` VALUES ('167', '周口市', '16', '466000');
INSERT INTO `mr_city` VALUES ('168', '驻马店市', '16', '463000');
INSERT INTO `mr_city` VALUES ('169', '武汉市', '17', '430000');
INSERT INTO `mr_city` VALUES ('170', '黄石市', '17', '435000');
INSERT INTO `mr_city` VALUES ('171', '十堰市', '17', '442000');
INSERT INTO `mr_city` VALUES ('172', '宜昌市', '17', '443000');
INSERT INTO `mr_city` VALUES ('173', '襄樊市', '17', '441000');
INSERT INTO `mr_city` VALUES ('174', '鄂州市', '17', '436000');
INSERT INTO `mr_city` VALUES ('175', '荆门市', '17', '448000');
INSERT INTO `mr_city` VALUES ('176', '孝感市', '17', '432100');
INSERT INTO `mr_city` VALUES ('177', '荆州市', '17', '434000');
INSERT INTO `mr_city` VALUES ('178', '黄冈市', '17', '438000');
INSERT INTO `mr_city` VALUES ('179', '咸宁市', '17', '437000');
INSERT INTO `mr_city` VALUES ('180', '随州市', '17', '441300');
INSERT INTO `mr_city` VALUES ('181', '恩施土家族苗族自治州', '17', '445000');
INSERT INTO `mr_city` VALUES ('182', '神农架', '17', '442400');
INSERT INTO `mr_city` VALUES ('183', '长沙市', '18', '410000');
INSERT INTO `mr_city` VALUES ('184', '株洲市', '18', '412000');
INSERT INTO `mr_city` VALUES ('185', '湘潭市', '18', '411100');
INSERT INTO `mr_city` VALUES ('186', '衡阳市', '18', '421000');
INSERT INTO `mr_city` VALUES ('187', '邵阳市', '18', '422000');
INSERT INTO `mr_city` VALUES ('188', '岳阳市', '18', '414000');
INSERT INTO `mr_city` VALUES ('189', '常德市', '18', '415000');
INSERT INTO `mr_city` VALUES ('190', '张家界市', '18', '427000');
INSERT INTO `mr_city` VALUES ('191', '益阳市', '18', '413000');
INSERT INTO `mr_city` VALUES ('192', '郴州市', '18', '423000');
INSERT INTO `mr_city` VALUES ('193', '永州市', '18', '425000');
INSERT INTO `mr_city` VALUES ('194', '怀化市', '18', '418000');
INSERT INTO `mr_city` VALUES ('195', '娄底市', '18', '417000');
INSERT INTO `mr_city` VALUES ('196', '湘西土家族苗族自治州', '18', '416000');
INSERT INTO `mr_city` VALUES ('197', '广州市', '19', '510000');
INSERT INTO `mr_city` VALUES ('198', '韶关市', '19', '521000');
INSERT INTO `mr_city` VALUES ('199', '深圳市', '19', '518000');
INSERT INTO `mr_city` VALUES ('200', '珠海市', '19', '519000');
INSERT INTO `mr_city` VALUES ('201', '汕头市', '19', '515000');
INSERT INTO `mr_city` VALUES ('202', '佛山市', '19', '528000');
INSERT INTO `mr_city` VALUES ('203', '江门市', '19', '529000');
INSERT INTO `mr_city` VALUES ('204', '湛江市', '19', '524000');
INSERT INTO `mr_city` VALUES ('205', '茂名市', '19', '525000');
INSERT INTO `mr_city` VALUES ('206', '肇庆市', '19', '526000');
INSERT INTO `mr_city` VALUES ('207', '惠州市', '19', '516000');
INSERT INTO `mr_city` VALUES ('208', '梅州市', '19', '514000');
INSERT INTO `mr_city` VALUES ('209', '汕尾市', '19', '516600');
INSERT INTO `mr_city` VALUES ('210', '河源市', '19', '517000');
INSERT INTO `mr_city` VALUES ('211', '阳江市', '19', '529500');
INSERT INTO `mr_city` VALUES ('212', '清远市', '19', '511500');
INSERT INTO `mr_city` VALUES ('213', '东莞市', '19', '511700');
INSERT INTO `mr_city` VALUES ('214', '中山市', '19', '528400');
INSERT INTO `mr_city` VALUES ('215', '潮州市', '19', '515600');
INSERT INTO `mr_city` VALUES ('216', '揭阳市', '19', '522000');
INSERT INTO `mr_city` VALUES ('217', '云浮市', '19', '527300');
INSERT INTO `mr_city` VALUES ('218', '南宁市', '20', '530000');
INSERT INTO `mr_city` VALUES ('219', '柳州市', '20', '545000');
INSERT INTO `mr_city` VALUES ('220', '桂林市', '20', '541000');
INSERT INTO `mr_city` VALUES ('221', '梧州市', '20', '543000');
INSERT INTO `mr_city` VALUES ('222', '北海市', '20', '536000');
INSERT INTO `mr_city` VALUES ('223', '防城港市', '20', '538000');
INSERT INTO `mr_city` VALUES ('224', '钦州市', '20', '535000');
INSERT INTO `mr_city` VALUES ('225', '贵港市', '20', '537100');
INSERT INTO `mr_city` VALUES ('226', '玉林市', '20', '537000');
INSERT INTO `mr_city` VALUES ('227', '百色市', '20', '533000');
INSERT INTO `mr_city` VALUES ('228', '贺州市', '20', '542800');
INSERT INTO `mr_city` VALUES ('229', '河池市', '20', '547000');
INSERT INTO `mr_city` VALUES ('230', '来宾市', '20', '546100');
INSERT INTO `mr_city` VALUES ('231', '崇左市', '20', '532200');
INSERT INTO `mr_city` VALUES ('232', '海口市', '21', '570000');
INSERT INTO `mr_city` VALUES ('233', '三亚市', '21', '572000');
INSERT INTO `mr_city` VALUES ('234', '重庆市', '22', '400000');
INSERT INTO `mr_city` VALUES ('235', '成都市', '23', '610000');
INSERT INTO `mr_city` VALUES ('236', '自贡市', '23', '643000');
INSERT INTO `mr_city` VALUES ('237', '攀枝花市', '23', '617000');
INSERT INTO `mr_city` VALUES ('238', '泸州市', '23', '646100');
INSERT INTO `mr_city` VALUES ('239', '德阳市', '23', '618000');
INSERT INTO `mr_city` VALUES ('240', '绵阳市', '23', '621000');
INSERT INTO `mr_city` VALUES ('241', '广元市', '23', '628000');
INSERT INTO `mr_city` VALUES ('242', '遂宁市', '23', '629000');
INSERT INTO `mr_city` VALUES ('243', '内江市', '23', '641000');
INSERT INTO `mr_city` VALUES ('244', '乐山市', '23', '614000');
INSERT INTO `mr_city` VALUES ('245', '南充市', '23', '637000');
INSERT INTO `mr_city` VALUES ('246', '眉山市', '23', '612100');
INSERT INTO `mr_city` VALUES ('247', '宜宾市', '23', '644000');
INSERT INTO `mr_city` VALUES ('248', '广安市', '23', '638000');
INSERT INTO `mr_city` VALUES ('249', '达州市', '23', '635000');
INSERT INTO `mr_city` VALUES ('250', '雅安市', '23', '625000');
INSERT INTO `mr_city` VALUES ('251', '巴中市', '23', '635500');
INSERT INTO `mr_city` VALUES ('252', '资阳市', '23', '641300');
INSERT INTO `mr_city` VALUES ('253', '阿坝藏族羌族自治州', '23', '624600');
INSERT INTO `mr_city` VALUES ('254', '甘孜藏族自治州', '23', '626000');
INSERT INTO `mr_city` VALUES ('255', '凉山彝族自治州', '23', '615000');
INSERT INTO `mr_city` VALUES ('256', '贵阳市', '24', '55000');
INSERT INTO `mr_city` VALUES ('257', '六盘水市', '24', '553000');
INSERT INTO `mr_city` VALUES ('258', '遵义市', '24', '563000');
INSERT INTO `mr_city` VALUES ('259', '安顺市', '24', '561000');
INSERT INTO `mr_city` VALUES ('260', '铜仁地区', '24', '554300');
INSERT INTO `mr_city` VALUES ('261', '黔西南布依族苗族自治州', '24', '551500');
INSERT INTO `mr_city` VALUES ('262', '毕节地区', '24', '551700');
INSERT INTO `mr_city` VALUES ('263', '黔东南苗族侗族自治州', '24', '551500');
INSERT INTO `mr_city` VALUES ('264', '黔南布依族苗族自治州', '24', '550100');
INSERT INTO `mr_city` VALUES ('265', '昆明市', '25', '650000');
INSERT INTO `mr_city` VALUES ('266', '曲靖市', '25', '655000');
INSERT INTO `mr_city` VALUES ('267', '玉溪市', '25', '653100');
INSERT INTO `mr_city` VALUES ('268', '保山市', '25', '678000');
INSERT INTO `mr_city` VALUES ('269', '昭通市', '25', '657000');
INSERT INTO `mr_city` VALUES ('270', '丽江市', '25', '674100');
INSERT INTO `mr_city` VALUES ('271', '思茅市', '25', '665000');
INSERT INTO `mr_city` VALUES ('272', '临沧市', '25', '677000');
INSERT INTO `mr_city` VALUES ('273', '楚雄彝族自治州', '25', '675000');
INSERT INTO `mr_city` VALUES ('274', '红河哈尼族彝族自治州', '25', '654400');
INSERT INTO `mr_city` VALUES ('275', '文山壮族苗族自治州', '25', '663000');
INSERT INTO `mr_city` VALUES ('276', '西双版纳傣族自治州', '25', '666200');
INSERT INTO `mr_city` VALUES ('277', '大理白族自治州', '25', '671000');
INSERT INTO `mr_city` VALUES ('278', '德宏傣族景颇族自治州', '25', '678400');
INSERT INTO `mr_city` VALUES ('279', '怒江傈僳族自治州', '25', '671400');
INSERT INTO `mr_city` VALUES ('280', '迪庆藏族自治州', '25', '674400');
INSERT INTO `mr_city` VALUES ('281', '拉萨市', '26', '850000');
INSERT INTO `mr_city` VALUES ('282', '昌都地区', '26', '854000');
INSERT INTO `mr_city` VALUES ('283', '山南地区', '26', '856000');
INSERT INTO `mr_city` VALUES ('284', '日喀则地区', '26', '857000');
INSERT INTO `mr_city` VALUES ('285', '那曲地区', '26', '852000');
INSERT INTO `mr_city` VALUES ('286', '阿里地区', '26', '859100');
INSERT INTO `mr_city` VALUES ('287', '林芝地区', '26', '860100');
INSERT INTO `mr_city` VALUES ('288', '西安市', '27', '710000');
INSERT INTO `mr_city` VALUES ('289', '铜川市', '27', '727000');
INSERT INTO `mr_city` VALUES ('290', '宝鸡市', '27', '721000');
INSERT INTO `mr_city` VALUES ('291', '咸阳市', '27', '712000');
INSERT INTO `mr_city` VALUES ('292', '渭南市', '27', '714000');
INSERT INTO `mr_city` VALUES ('293', '延安市', '27', '716000');
INSERT INTO `mr_city` VALUES ('294', '汉中市', '27', '723000');
INSERT INTO `mr_city` VALUES ('295', '榆林市', '27', '719000');
INSERT INTO `mr_city` VALUES ('296', '安康市', '27', '725000');
INSERT INTO `mr_city` VALUES ('297', '商洛市', '27', '711500');
INSERT INTO `mr_city` VALUES ('298', '兰州市', '28', '730000');
INSERT INTO `mr_city` VALUES ('299', '嘉峪关市', '28', '735100');
INSERT INTO `mr_city` VALUES ('300', '金昌市', '28', '737100');
INSERT INTO `mr_city` VALUES ('301', '白银市', '28', '730900');
INSERT INTO `mr_city` VALUES ('302', '天水市', '28', '741000');
INSERT INTO `mr_city` VALUES ('303', '武威市', '28', '733000');
INSERT INTO `mr_city` VALUES ('304', '张掖市', '28', '734000');
INSERT INTO `mr_city` VALUES ('305', '平凉市', '28', '744000');
INSERT INTO `mr_city` VALUES ('306', '酒泉市', '28', '735000');
INSERT INTO `mr_city` VALUES ('307', '庆阳市', '28', '744500');
INSERT INTO `mr_city` VALUES ('308', '定西市', '28', '743000');
INSERT INTO `mr_city` VALUES ('309', '陇南市', '28', '742100');
INSERT INTO `mr_city` VALUES ('310', '临夏回族自治州', '28', '731100');
INSERT INTO `mr_city` VALUES ('311', '甘南藏族自治州', '28', '747000');
INSERT INTO `mr_city` VALUES ('312', '西宁市', '29', '810000');
INSERT INTO `mr_city` VALUES ('313', '海东地区', '29', '810600');
INSERT INTO `mr_city` VALUES ('314', '海北藏族自治州', '29', '810300');
INSERT INTO `mr_city` VALUES ('315', '黄南藏族自治州', '29', '811300');
INSERT INTO `mr_city` VALUES ('316', '海南藏族自治州', '29', '813000');
INSERT INTO `mr_city` VALUES ('317', '果洛藏族自治州', '29', '814000');
INSERT INTO `mr_city` VALUES ('318', '玉树藏族自治州', '29', '815000');
INSERT INTO `mr_city` VALUES ('319', '海西蒙古族藏族自治州', '29', '817000');
INSERT INTO `mr_city` VALUES ('320', '银川市', '30', '750000');
INSERT INTO `mr_city` VALUES ('321', '石嘴山市', '30', '753000');
INSERT INTO `mr_city` VALUES ('322', '吴忠市', '30', '751100');
INSERT INTO `mr_city` VALUES ('323', '固原市', '30', '756000');
INSERT INTO `mr_city` VALUES ('324', '中卫市', '30', '751700');
INSERT INTO `mr_city` VALUES ('325', '乌鲁木齐市', '31', '830000');
INSERT INTO `mr_city` VALUES ('326', '克拉玛依市', '31', '834000');
INSERT INTO `mr_city` VALUES ('327', '吐鲁番地区', '31', '838000');
INSERT INTO `mr_city` VALUES ('328', '哈密地区', '31', '839000');
INSERT INTO `mr_city` VALUES ('329', '昌吉回族自治州', '31', '831100');
INSERT INTO `mr_city` VALUES ('330', '博尔塔拉蒙古自治州', '31', '833400');
INSERT INTO `mr_city` VALUES ('331', '巴音郭楞蒙古自治州', '31', '841000');
INSERT INTO `mr_city` VALUES ('332', '阿克苏地区', '31', '843000');
INSERT INTO `mr_city` VALUES ('333', '克孜勒苏柯尔克孜自治州', '31', '835600');
INSERT INTO `mr_city` VALUES ('334', '喀什地区', '31', '844000');
INSERT INTO `mr_city` VALUES ('335', '和田地区', '31', '848000');
INSERT INTO `mr_city` VALUES ('336', '伊犁哈萨克自治州', '31', '833200');
INSERT INTO `mr_city` VALUES ('337', '塔城地区', '31', '834700');
INSERT INTO `mr_city` VALUES ('338', '阿勒泰地区', '31', '836500');
INSERT INTO `mr_city` VALUES ('339', '石河子市', '31', '832000');
INSERT INTO `mr_city` VALUES ('340', '阿拉尔市', '31', '843300');
INSERT INTO `mr_city` VALUES ('341', '图木舒克市', '31', '843900');
INSERT INTO `mr_city` VALUES ('342', '五家渠市', '31', '831300');
INSERT INTO `mr_city` VALUES ('343', '香港特别行政区', '32', '000000');
INSERT INTO `mr_city` VALUES ('344', '澳门特别行政区', '33', '000000');
INSERT INTO `mr_city` VALUES ('345', '台湾省', '34', '000000');

-- ----------------------------
-- Table structure for mr_class
-- ----------------------------
DROP TABLE IF EXISTS `mr_class`;
CREATE TABLE `mr_class` (
  `mc_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '//课程id',
  `mc_title` varchar(100) NOT NULL COMMENT '//课程名称',
  `mc_idnum` varchar(50) NOT NULL COMMENT '//课程编号',
  `mc_author` int(10) NOT NULL COMMENT '//课程发布人',
  `mc_teacher` varchar(255) NOT NULL COMMENT '//课程老师',
  `mc_starttime` int(11) NOT NULL,
  `mc_addnum` int(10) NOT NULL DEFAULT '0' COMMENT '//当前报名人数',
  `mc_maxnum` int(10) NOT NULL COMMENT '//最大报名人数',
  `mc_readnum` int(10) NOT NULL DEFAULT '0' COMMENT '//浏览量',
  `mc_savenum` int(10) NOT NULL DEFAULT '0' COMMENT '//收藏数',
  `mc_agreenum` int(10) NOT NULL DEFAULT '0' COMMENT '//点赞数',
  `mc_pay` int(10) NOT NULL DEFAULT '0' COMMENT '//报名费用',
  `mc_type` int(10) NOT NULL COMMENT '//课程类型',
  `mc_addtime` int(11) NOT NULL,
  `mc_top` int(1) NOT NULL DEFAULT '0' COMMENT '//置顶',
  `mc_is` int(1) NOT NULL DEFAULT '2' COMMENT '//特殊标示',
  `mc_say` varchar(255) NOT NULL,
  `mc_stoptime` int(11) NOT NULL COMMENT '//结束时间',
  `mc_photo` varchar(255) NOT NULL DEFAULT '',
  `mc_open` int(11) NOT NULL DEFAULT '0' COMMENT '//禁用',
  `mc_back` int(1) NOT NULL DEFAULT '0' COMMENT '//1 代表进入回收站',
  `mc_vaid` int(1) NOT NULL DEFAULT '2' COMMENT '//过期状态',
  `mc_worker` varchar(255) DEFAULT NULL COMMENT '//参与义工',
  `mc_changeadmin` int(10) NOT NULL COMMENT '//修改管理员',
  `mc_lastchangetime` int(11) NOT NULL COMMENT '//最后修改时间',
  `mc_toptime` int(11) NOT NULL COMMENT '//置顶过期时间',
  `mc_num` int(10) NOT NULL DEFAULT '0' COMMENT '//课程报名人数',
  `mc_adress` varchar(255) NOT NULL COMMENT '//课程地址',
  `mc_content` int(10) DEFAULT NULL COMMENT '//课程内容',
  `mc_person` varchar(20) NOT NULL COMMENT '//课程联系人',
  `mc_tel` varchar(50) NOT NULL COMMENT '//课程咨询联系方式',
  `mc_closingtime` int(11) NOT NULL COMMENT '//截止报名时间',
  `mc_valid` int(1) NOT NULL DEFAULT '2' COMMENT '//当前状态',
  `mc_sea` int(11) NOT NULL DEFAULT '0' COMMENT '//境内境外',
  `mc_city` varchar(20) NOT NULL DEFAULT '' COMMENT '//隶属城市',
  `mc_payname` varchar(255) NOT NULL DEFAULT '' COMMENT '//费用描述',
  PRIMARY KEY (`mc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mr_class
-- ----------------------------
INSERT INTO `mr_class` VALUES ('1', '三天的呼吸课程再度驾到', 'HP3-CD-2016-0009', '1', '杨清', '1474560000', '0', '0', '44', '2', '2', '0', '1', '1475041822', '0', '2', '时下最in、风靡全球的自我投资项目——「快乐学」！', '1474732800', '/uploads/2016-09-21/57e1fdf291a8c.jpg', '1', '0', '2', ' 李林17828025816 小月18980049278', '1', '2016', '1475474265', '0', '成都市青羊大道97号', '5', '杨清', '13910907675', '1474473600', '1', '0', '成都', '');
INSERT INTO `mr_class` VALUES ('2', '北京·中秋快乐课程邀请函', 'HP3-BJ-2016-0098', '1', '张爱玲', '1473868800', '0', '0', '40', '1', '2', '0', '1', '1475040248', '0', '2', '生活的艺术快乐课程（HAPPINESS PROGRAM），它将带你与最真实的自己连接，找到内在快乐的', '1474041600', '/uploads/2016-09-21/57e213edc296c.jpg', '1', '0', '2', ' 林蕾/13810493561  IRIS/15160021121', '1', '2016', '1475474019', '0', '北京市太阳宫丰和园15号', '7', '张爱玲', '13501207917', '1473782400', '1', '0', '北京', '');
INSERT INTO `mr_class` VALUES ('3', ' 六天快乐课程@上海', 'HP3-SH-2016-0207', '1', 'frank', '1474300800', '0', '0', '44', '0', '2', '0', '1', '1474522274', '0', '2', '生活的艺术上海9月课表', '1474732800', '/uploads/2016-09-21/57e216a6b6d15.jpg', '1', '0', '2', 'frank', '1', '2016', '1474781474', '0', '上海市浦东新区浦西中心', '8', 'frank', '18616696490', '1474732800', '1', '0', '上海', '');
INSERT INTO `mr_class` VALUES ('4', '生活的艺术, 静默之旅, 11/25-29 @ 上海', 'AD-SH-2016-0002', '1', 'Myra', '1480003200', '0', '0', '210', '1', '3', '0', '7', '1475042238', '0', '2', '&quot;我们过度使用我们的心智、理智、记忆， 因此全面性的维修有其必要，保养是必须的，我们的身体需要。', '1480348800', '/uploads/2016-09-27/57ea6b7e749c0.jpg', '1', '0', '2', '高莱：18717777579      Ivy：15151650415', '1', '2016', '1475396654', '0', '上海市市郊，待确定', '10', 'Eden', '15800750982', '1479916800', '1', '0', '上海', '');
INSERT INTO `mr_class` VALUES ('5', '9月30-10月2日@上海【生活的艺术】快乐课程', 'HP3-SH-2016-0208', '1', '庄琛', '1475231400', '0', '0', '44', '0', '1', '0', '1', '1475041961', '0', '2', '课程核心内容是一系列可以带回家的瑜伽呼吸技巧', '1475395200', '/uploads/2016-09-28/57eb531c4ccd5.jpg', '1', '0', '2', '庄琛：180-1941-9803   朱顗婷：138-1611-2003', '1', '2016', '1475474340', '0', '上海市天山路600弄1号', '12', '庄琛', '180-1941-9803', '1475078400', '1', '0', '上海', '');
INSERT INTO `mr_class` VALUES ('6', '10月14-16日@北京【生活的艺术】快乐课程', 'HP3-BJ-2016-0099', '1', '婷婷', '1476374400', '0', '0', '194', '2', '3', '0', '1', '1475044487', '0', '2', '课程核心内容是一系列可以带回家的瑜伽呼吸技巧——很快消除你的压力和提升你的能量，带你回到清明和正面的', '1476547200', '/uploads/2016-09-28/57eb5b58d1b9c.jpg', '1', '0', '2', '婷婷：138-1077-5664 小健子138-0128-5496', '1', '2016', '1475473557', '0', '北京市太阳宫丰和园15号院', '13', '婷婷', '138-1077-5664', '1476288000', '1', '0', '北京', '');
INSERT INTO `mr_class` VALUES ('7', ' 金秋十月，能量储备，欢迎进入10/5-7的AOL快乐课程之旅！', 'HP3-SH-2016-0209', '1', ' 郭茅', '1475596800', '0', '0', '285', '1', '1', '0', '1', '1475211436', '0', '2', '抓紧今年最后一个长假， 为自己的精力加满油哦！ 时下风靡全球的自我投资项目——「快乐学」！', '1475769600', '/uploads/2016-09-30/57edf0ac27211.jpg', '1', '0', '2', ' 郭茅：18601799310', '1', '2016', '1476695997', '2', '上海市长宁区天山路600弄同达创业大厦1407室（芙蓉江路路口），地铁2号线娄山关路站4号口出，步行约5-10分钟', '14', ' 郭茅', '18601799310', '1475510400', '1', '0', '上海', '');
INSERT INTO `mr_class` VALUES ('17', '一段由外向内的旅程---完美瑜伽 I @浦西10/18-22 ', 'SSY1-SH-2016-0005', '1', 'Eden Qin', '1476720000', '0', '20', '395', '0', '1', '0', '2', '1476329221', '0', '2', '瑜伽的目的不仅是维持良好的体态，更是要去经验无限与永恒，通过完美瑜伽你就可以和更高的意识做连接。', '1477121400', '/uploads/2016-10-13/57ff034beff0b.jpg', '1', '0', '2', 'Eden Qin', '1', '2016', '1476595173', '0', '上海市长宁区天山路600弄（芙蓉江路口）同达创业大厦1407室。', '19', 'Eden Qin', '18621561693', '1476720000', '1', '0', '上海', '');
INSERT INTO `mr_class` VALUES ('20', '12月9-11日@北京快乐课程 庆祝圆满，快乐100！', 'HP3-BJ-2016-0112', '6', '王宏娟，田田', '1481212800', '0', '0', '231', '0', '0', '0', '1', '1478099395', '0', '2', '课程核心内容是一系列可以带回家的瑜伽呼吸技巧', '1481385600', '/uploads/2016-11-02/581a01c37bb71.jpg', '1', '0', '2', '张玲18911190700，王颖健13801285496，贝贝18301587881，夏春13811275819，陈雪松13651251599', '1', '2016', '1479208193', '0', '北京市太阳宫丰和园小区15号会所曼殊瑜伽馆', '22', '孙杰', '15810531170', '1481212800', '1', '0', '北京', '');
INSERT INTO `mr_class` VALUES ('21', '11月18-11月20日@呼和浩特【生活的艺术】快乐课程', 'HP3-BJ-2016-0109', '1', 'soko', '1479398400', '0', '0', '3', '0', '0', '0', '1', '1478421845', '0', '2', '课程核心内容是一系列可以带回家的瑜伽呼吸技巧', '1479571200', '/uploads/2016-11-06/581eed55cc741.jpg', '1', '0', '2', '斯日.呼日娃', '1', '1490848857', '1491108057', '0', '呼和浩特市天和大厦舞林大会', '24', '晓兰.呼日娃', '18647156733', '1479484800', '1', '0', '北京', '');
INSERT INTO `mr_class` VALUES ('22', '11月18-11月20日@呼和浩特【生活的艺术】快乐课程', 'HP3-HHHT-2016-0007', '6', 'soko 15248175406', '1479398400', '0', '0', '359', '0', '2', '0', '1', '1478427850', '0', '2', '课程核心内容是一系列可以带回家的瑜伽呼吸技巧', '1479571200', '/uploads/2016-11-06/581f04ca24ac0.jpg', '1', '0', '2', '斯日.呼日娃', '6', '2016', '1478876262', '0', '呼和浩特市天和大厦舞林大会', '25', '晓兰.呼日娃', '18647156733', '1479484800', '1', '0', '呼和浩特', '');
INSERT INTO `mr_class` VALUES ('23', '11月25-11月27日@深圳【生活的艺术】快乐课程', 'HP3-S-2016-0009', '4', '潘世宏', '1480003200', '0', '20', '36', '0', '0', '0', '1', '1478618040', '0', '2', '课程核心内容是一系列可以带回家的瑜伽呼吸技巧', '1480176000', '/uploads/2016-11-08/5821ebb8574ab.jpg', '1', '0', '2', '刘剑英、杨洁、张俊、崔艳', '1', '2016', '1478878431', '0', '深圳市福田区燕南路桑达工业区404栋215-219 彩夕培训（地铁蛇口线--燕南站A出口，罗宝线--科学馆站B出口；龙岗线--通新岭站A出口）', '26', '潘世宏', '13008869396', '1480003200', '1', '0', '深圳', '');
INSERT INTO `mr_class` VALUES ('24', '11月25-11月27日@长沙【生活的艺术】快乐课程', 'HP3-CS-2016-0003', '7', '杨丽', '1480003200', '0', '0', '32', '0', '1', '0', '1', '1478668975', '0', '2', '课程核心内容是一系列可以带回家的瑜伽呼吸技巧', '1480176000', '/uploads/2016-11-09/5822b2af01a4c.jpg', '1', '0', '2', '朱玲、林小冰', '7', '2016', '1478928575', '0', '湖南省长沙市天心区书院南路与南湖路交汇处外国生活体验馆C座柏林公寓1107室陋室铭专业瑜伽馆', '27', '朱玲', '18684821468', '1480003200', '1', '0', '长沙', '');
INSERT INTO `mr_class` VALUES ('25', '生活的艺术, 静默之旅, 12/14-18 @ 上海高级课+三摩地', 'AD-SH-2016-0011', '4', 'Rohini', '1481644800', '0', '150', '435', '0', '0', '0', '7', '1478926093', '0', '2', '回归内在的心灵之旅。', '1481990400', '/uploads/2016-11-12/58269f0dadd70.jpg', '1', '0', '2', '林秀萍 15151650415，Louise 15800750982', '1', '2016', '1479283055', '2', '上海市青浦区外青松公路7188号，上海凯博休闲农庄（高速青浦城区出口）Tel:59710077', '28', 'Eden', '18621561693', '1481644800', '1', '0', '上海', '');
INSERT INTO `mr_class` VALUES ('26', 'admin', 'HP3-SH-2016-0210', '6', 'admin', '1480435200', '0', '0', '0', '0', '0', '0', '1', '1479177439', '0', '2', '123', '1480694400', '/uploads/2016-11-15/582a74df9fa30.png', '0', '1', '2', 'admin', '6', '2016', '1479436639', '0', '上海市', '29', 'admin', '12345676790', '1480348800', '1', '0', '上海', '');
INSERT INTO `mr_class` VALUES ('27', '11月25-11月27日@长沙【生活的艺术】快乐课程', 'HP3-SH-2016-0211', '6', 'test', '1480608000', '0', '15', '0', '0', '0', '0', '1', '1479177802', '0', '2', '课程核心内容是一系列可以带回家的瑜伽呼吸技巧', '1480780800', '/uploads/2016-11-15/582a764ac3db3.jpg', '0', '1', '2', 'test', '6', '2016', '1479437002', '0', '上海市长宁区兴义路8号', '30', 'test', '11111111111', '1480608000', '1', '0', '上海', '');
INSERT INTO `mr_class` VALUES ('28', '11月25-11月27日@长沙【生活的艺术】快乐课程', 'HP3-SH-2016-0212', '6', 'test', '1480608000', '0', '15', '0', '0', '0', '0', '1', '1479177803', '0', '2', '课程核心内容是一系列可以带回家的瑜伽呼吸技巧', '1480780800', '/uploads/2016-11-15/582a764b35086.jpg', '0', '1', '2', 'test', '6', '2016', '1479437003', '0', '上海市长宁区兴义路8号', '31', 'test', '11111111111', '1480608000', '1', '0', '上海', '');
INSERT INTO `mr_class` VALUES ('29', '生活的艺术, 静默之旅, 12/14-18 @ 上海高级课+三摩地', 'AD-SH-2016-0012', '6', 'admin', '1474214400', '0', '0', '0', '0', '0', '0', '7', '1479178047', '0', '2', '回归内在的心灵之旅。', '1474560000', '/uploads/2016-11-15/582a773fb53ae.png', '0', '1', '2', 'admin', '6', '2016', '1479437247', '0', '上海市', '32', 'admin', '12045', '1473782400', '1', '0', '上海', '');
INSERT INTO `mr_class` VALUES ('30', 'test', 'HP3-SH-2016-0213', '1', 'test', '1480608000', '0', '15', '0', '0', '0', '0', '1', '1479189350', '0', '2', '123', '1480780800', '/uploads/2016-11-15/582aa36655a59.jpg', '0', '1', '2', 'test', '1', '1479189350', '1479448550', '0', '武汉市武昌区宝通寺路百瑞景二期西区9栋1单元602 楚甲食尚', '33', 'test', '11111111111', '1480608000', '1', '0', '上海', '');
INSERT INTO `mr_class` VALUES ('31', 'admin', 'HP3-BJ-2016-0113', '1', 'admin', '1479139200', '0', '15', '0', '0', '0', '0', '1', '1479202836', '0', '2', 'text', '1479571200', '/uploads/2016-11-15/582ad814e8c48.png', '0', '1', '2', 'admin', '1', '1479276435', '1479535635', '0', '上海市', '34', 'admin', 'admin', '1479052800', '1', '0', '北京', '');
INSERT INTO `mr_class` VALUES ('32', '12月2日-12月4日@武汉【生活的艺术】快乐课程', 'HP3-WH-2016-0001', '6', '杨丽', '1480608000', '0', '15', '30', '0', '0', '0', '1', '1479278349', '0', '2', '课程核心内容是一系列可以带回家的瑜伽呼吸技巧', '1480780800', '/uploads/2016-11-16/582bff0dd5b42.jpg', '1', '0', '2', '郭梦莹 13545271950', '6', '1479278604', '1479537804', '0', '武汉市武昌区宝通寺路百瑞景二期西区9栋1单元602 楚甲食尚', '35', '郭梦莹', '13545271950', '1480608000', '1', '0', '武汉', '');
INSERT INTO `mr_class` VALUES ('33', '12月2日-12月4日@西安【生活的艺术】快乐课程', 'HP3-XA-2016-0002', '7', '施飞', '1480608000', '0', '0', '9', '0', '0', '0', '1', '1480052322', '0', '2', '课程核心内容是一系列可以带回家的瑜伽呼吸技巧。', '1480780800', '/uploads/2016-11-25/5837ce62d0fcd.jpg', '1', '0', '2', '蒋丹 15129252286', '7', '1480052322', '1480311522', '0', '西安市北郊凤城二路文景路十字 海景国际C2-711-712', '36', '蒋丹', '15129252286', '1480608000', '1', '0', '西安', '');
INSERT INTO `mr_class` VALUES ('34', '11月18-11月20日@呼和浩特【生活的艺术】快乐课程2', 'HP3-S-2017-00001', '1', 'asd', '1462536000', '0', '2', '1', '0', '0', '0', '1', '1490846339', '0', '2', '课程核心内容是一系列可以带回家的瑜伽呼吸技巧', '1465210800', '/uploads/2017-03-30/58dc82832c5d6.jpg', '1', '0', '2', 'asd', '1', '1490853653', '1491112853', '0', '上海市黄浦区', '47', 'asd', '18721667531', '1467936000', '1', '0', '上海市', '');
INSERT INTO `mr_class` VALUES ('35', '11月18-11月20日@呼和浩特【生活的艺术】快乐课程2', 'HP3-SHSYPQ-2017-00001', '1', '阿萨德', '1462536000', '0', '2', '1', '0', '0', '0', '1', '1490853715', '0', '2', '课程核心内容是一系列可以带回家的瑜伽呼吸技巧', '1465210800', '/uploads/2017-03-30/58dc9f53adbcf.jpg', '1', '0', '2', '阿萨德', '1', '1490853942', '1491113142', '0', '上海市黄浦区', '48', '撒的', '18721667531', '1467936000', '1', '0', '上海市杨浦区', '');

-- ----------------------------
-- Table structure for mr_class_code
-- ----------------------------
DROP TABLE IF EXISTS `mr_class_code`;
CREATE TABLE `mr_class_code` (
  `co_id` int(11) NOT NULL AUTO_INCREMENT,
  `co_cityname` varchar(255) NOT NULL COMMENT '//城市名称',
  `co_num` int(11) NOT NULL DEFAULT '0' COMMENT '//初始值',
  `co_codenum` int(11) NOT NULL COMMENT '//课程类型',
  PRIMARY KEY (`co_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mr_class_code
-- ----------------------------
INSERT INTO `mr_class_code` VALUES ('8', '上海', '209', '1');
INSERT INTO `mr_class_code` VALUES ('9', '上海', '6', '2');
INSERT INTO `mr_class_code` VALUES ('10', '上海', '3', '3');
INSERT INTO `mr_class_code` VALUES ('11', '上海', '12', '7');
INSERT INTO `mr_class_code` VALUES ('12', '上海', '1', '9');
INSERT INTO `mr_class_code` VALUES ('13', '昆山', '2', '1');
INSERT INTO `mr_class_code` VALUES ('14', '苏州', '5', '1');
INSERT INTO `mr_class_code` VALUES ('15', '常州', '14', '1');
INSERT INTO `mr_class_code` VALUES ('16', '常州', '2', '2');
INSERT INTO `mr_class_code` VALUES ('17', '常州', '2', '3');
INSERT INTO `mr_class_code` VALUES ('18', '南京', '8', '1');
INSERT INTO `mr_class_code` VALUES ('19', '杭州', '57', '1');
INSERT INTO `mr_class_code` VALUES ('20', '杭州', '13', '2');
INSERT INTO `mr_class_code` VALUES ('21', '宁波', '4', '1');
INSERT INTO `mr_class_code` VALUES ('22', '厦门', '14', '1');
INSERT INTO `mr_class_code` VALUES ('23', '广州', '13', '1');
INSERT INTO `mr_class_code` VALUES ('24', '广州', '2', '2');
INSERT INTO `mr_class_code` VALUES ('25', '深圳', '10', '1');
INSERT INTO `mr_class_code` VALUES ('26', '深圳', '1', '2');
INSERT INTO `mr_class_code` VALUES ('27', '深圳', '3', '3');
INSERT INTO `mr_class_code` VALUES ('28', '汕头', '2', '1');
INSERT INTO `mr_class_code` VALUES ('29', '海口', '1', '1');
INSERT INTO `mr_class_code` VALUES ('30', '海口', '2', '2');
INSERT INTO `mr_class_code` VALUES ('31', '北京', '112', '1');
INSERT INTO `mr_class_code` VALUES ('32', '北京', '3', '2');
INSERT INTO `mr_class_code` VALUES ('33', '北京', '3', '3');
INSERT INTO `mr_class_code` VALUES ('34', '呼和浩特', '7', '1');
INSERT INTO `mr_class_code` VALUES ('35', '呼和浩特', '2', '3');
INSERT INTO `mr_class_code` VALUES ('36', '成都', '9', '1');
INSERT INTO `mr_class_code` VALUES ('37', '成都', '1', '2');
INSERT INTO `mr_class_code` VALUES ('38', '成都', '1', '3');
INSERT INTO `mr_class_code` VALUES ('39', '长沙', '3', '1');
INSERT INTO `mr_class_code` VALUES ('40', '西安', '2', '1');
INSERT INTO `mr_class_code` VALUES ('41', '武汉', '1', '1');
INSERT INTO `mr_class_code` VALUES ('42', '市', '1', '1');
INSERT INTO `mr_class_code` VALUES ('43', '上海市杨浦区', '1', '1');

-- ----------------------------
-- Table structure for mr_class_register
-- ----------------------------
DROP TABLE IF EXISTS `mr_class_register`;
CREATE TABLE `mr_class_register` (
  `cr_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '//课程报名表编号',
  `cr_name` varchar(40) NOT NULL COMMENT '//姓名',
  `cr_tel` varchar(40) NOT NULL COMMENT '联系方式',
  `cr_birthday` date NOT NULL COMMENT '//出生日期',
  `cr_country` varchar(100) NOT NULL COMMENT '//护照/国家',
  `cr_more` varchar(255) NOT NULL DEFAULT '' COMMENT '//是否参加过生活艺术的其他课程',
  `cr_hometype` varchar(50) NOT NULL DEFAULT '' COMMENT '//所需房型 ',
  `cr_email` varchar(100) NOT NULL COMMENT '//邮箱',
  `cr_address` varchar(255) NOT NULL COMMENT '//地址',
  `cr_sex` int(1) NOT NULL COMMENT '// 0=女',
  `cr_classid` int(10) NOT NULL COMMENT '//关联课程ID',
  `cr_health` varchar(255) NOT NULL DEFAULT '' COMMENT '//疾病',
  `cr_drug` varchar(255) NOT NULL DEFAULT '' COMMENT '//药品名称',
  `cr_userid` int(10) NOT NULL COMMENT '//关联用户',
  `cr_addtime` datetime NOT NULL COMMENT '//添加时间',
  `cr_open` int(1) NOT NULL DEFAULT '0' COMMENT '//审核',
  `cr_say` text,
  PRIMARY KEY (`cr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of mr_class_register
-- ----------------------------
INSERT INTO `mr_class_register` VALUES ('1', '12', '2323', '2016-09-14', '23', '32', '', '232', '23', '1', '2', '', '', '10', '2016-09-14 11:05:53', '0', '23');

-- ----------------------------
-- Table structure for mr_class_type
-- ----------------------------
DROP TABLE IF EXISTS `mr_class_type`;
CREATE TABLE `mr_class_type` (
  `ct_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '//编号',
  `ct_name` varchar(100) NOT NULL COMMENT '//课程编号',
  `ct_englishname` varchar(200) NOT NULL COMMENT '//英文名称',
  `ct_diyflag` varchar(50) NOT NULL COMMENT '//课程适用人群',
  `ct_type` varchar(50) NOT NULL COMMENT '//课程类型',
  `ct_type_one` varchar(50) NOT NULL COMMENT '//个人/企业',
  `ct_dm` varchar(20) NOT NULL COMMENT '//课程代码编号',
  `ct_photo` varchar(255) NOT NULL DEFAULT '' COMMENT '//图片',
  `ct_say` varchar(100) NOT NULL DEFAULT '' COMMENT '//简介',
  `ct_top` int(1) NOT NULL DEFAULT '0' COMMENT '//置顶',
  `ct_url` varchar(255) NOT NULL DEFAULT '',
  `ct_classname` varchar(255) NOT NULL DEFAULT '' COMMENT '//类名',
  PRIMARY KEY (`ct_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of mr_class_type
-- ----------------------------
INSERT INTO `mr_class_type` VALUES ('1', '快乐课程', 'Happiness Program(6 days)', 'p', 'g', 'c', 'HP3', '/yoga/img/sub001.jpg', '释放内在的自由，恢复与生俱足的快乐韵律', '1', 'Class/courseIntroduce3', 'course-type-lt delPadd');
INSERT INTO `mr_class_type` VALUES ('2', '完美瑜伽', 'SSY1', 'p', 'g', 'c', 'SSY1', '/yoga/img/sub002.jpg', '纯正与可靠的瑜伽形式，一套完整的瑜伽科学。', '1', 'Class/courseIntroduce', 'course-type-md delPadd');
INSERT INTO `mr_class_type` VALUES ('3', '三摩地静心', 'SahajSamadi', 'p', 'g', 'c', 'SMD', '/yoga/img/sub003.jpg', '让您的意识去体验自己本性的深度静谧', '1', 'Class/courseIntroduce2', 'delPadd');
INSERT INTO `mr_class_type` VALUES ('4', '儿童课程', 'Art Excel', 'c', 'g', 'c', 'AEXC', '', '', '0', '', '');
INSERT INTO `mr_class_type` VALUES ('5', '青少年课程', 'Art YES', 'c', 'g', 'c', 'AYES', '', '', '0', '', '');
INSERT INTO `mr_class_type` VALUES ('6', '阿育吠陀烹饪', 'Ayurveda cooking course', 'p', 'g', 'c', 'AYUC', '', '', '0', '', '');
INSERT INTO `mr_class_type` VALUES ('7', '高级课', 'Advanced Course ( Part 2 )', 'p', 'g', 'g', 'AD', '', '', '0', '', '');
INSERT INTO `mr_class_type` VALUES ('8', '突破个人极限', 'do something now', 'p', 'g', 'g', 'DSN', '', '', '0', '', '');
INSERT INTO `mr_class_type` VALUES ('9', '预备师资', 'PreTTC', 'p', 'g', 'g', 'PTTC', '', '', '0', '', '');
INSERT INTO `mr_class_type` VALUES ('10', '祝福课', 'Blessing', 'p', 'g', 'g', 'BLES', '', '', '0', '', '');
INSERT INTO `mr_class_type` VALUES ('11', '前世今生', 'EP', 'p', 'g', 'g', 'EP', '', '', '0', '', '');
INSERT INTO `mr_class_type` VALUES ('12', '志愿者培训', 'Volunteer Traiining Program', 'p', 'g', 'g', 'VTP', '', '', '0', '', '');
INSERT INTO `mr_class_type` VALUES ('13', '企业课程', 'for all levels of participants ', 'p,f', 'q', 'q', 'APEX', '', '', '0', '', '');
INSERT INTO `mr_class_type` VALUES ('14', '企业领导课程', 'for senior management', 'p,f', 'q', 'q', 'TLEX', '', '', '0', '', '');

-- ----------------------------
-- Table structure for mr_column
-- ----------------------------
DROP TABLE IF EXISTS `mr_column`;
CREATE TABLE `mr_column` (
  `c_id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `c_name` varchar(36) NOT NULL,
  `c_enname` varchar(50) NOT NULL DEFAULT '' COMMENT '英文标题',
  `c_photo` varchar(255) NOT NULL DEFAULT '' COMMENT '//logo路径',
  PRIMARY KEY (`c_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mr_column
-- ----------------------------
INSERT INTO `mr_column` VALUES ('1', '活动', 'active', '');
INSERT INTO `mr_column` VALUES ('2', '课程', 'class', '');
INSERT INTO `mr_column` VALUES ('3', '知识', 'knows', '');

-- ----------------------------
-- Table structure for mr_district
-- ----------------------------
DROP TABLE IF EXISTS `mr_district`;
CREATE TABLE `mr_district` (
  `id` int(11) NOT NULL,
  `disrictname` varchar(50) NOT NULL,
  `cid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mr_district
-- ----------------------------
INSERT INTO `mr_district` VALUES ('1', '东城区', '1');
INSERT INTO `mr_district` VALUES ('2', '西城区', '1');
INSERT INTO `mr_district` VALUES ('3', '崇文区', '1');
INSERT INTO `mr_district` VALUES ('4', '宣武区', '1');
INSERT INTO `mr_district` VALUES ('5', '朝阳区', '1');
INSERT INTO `mr_district` VALUES ('6', '丰台区', '1');
INSERT INTO `mr_district` VALUES ('7', '石景山区', '1');
INSERT INTO `mr_district` VALUES ('8', '海淀区', '1');
INSERT INTO `mr_district` VALUES ('9', '门头沟区', '1');
INSERT INTO `mr_district` VALUES ('10', '房山区', '1');
INSERT INTO `mr_district` VALUES ('11', '通州区', '1');
INSERT INTO `mr_district` VALUES ('12', '顺义区', '1');
INSERT INTO `mr_district` VALUES ('13', '昌平区', '1');
INSERT INTO `mr_district` VALUES ('14', '大兴区', '1');
INSERT INTO `mr_district` VALUES ('15', '怀柔区', '1');
INSERT INTO `mr_district` VALUES ('16', '平谷区', '1');
INSERT INTO `mr_district` VALUES ('17', '密云县', '1');
INSERT INTO `mr_district` VALUES ('18', '延庆县', '1');
INSERT INTO `mr_district` VALUES ('19', '和平区', '2');
INSERT INTO `mr_district` VALUES ('20', '河东区', '2');
INSERT INTO `mr_district` VALUES ('21', '河西区', '2');
INSERT INTO `mr_district` VALUES ('22', '南开区', '2');
INSERT INTO `mr_district` VALUES ('23', '河北区', '2');
INSERT INTO `mr_district` VALUES ('24', '红桥区', '2');
INSERT INTO `mr_district` VALUES ('25', '塘沽区', '2');
INSERT INTO `mr_district` VALUES ('26', '汉沽区', '2');
INSERT INTO `mr_district` VALUES ('27', '大港区', '2');
INSERT INTO `mr_district` VALUES ('28', '东丽区', '2');
INSERT INTO `mr_district` VALUES ('29', '西青区', '2');
INSERT INTO `mr_district` VALUES ('30', '津南区', '2');
INSERT INTO `mr_district` VALUES ('31', '北辰区', '2');
INSERT INTO `mr_district` VALUES ('32', '武清区', '2');
INSERT INTO `mr_district` VALUES ('33', '宝坻区', '2');
INSERT INTO `mr_district` VALUES ('34', '宁河县', '2');
INSERT INTO `mr_district` VALUES ('35', '静海县', '2');
INSERT INTO `mr_district` VALUES ('36', '蓟县', '2');
INSERT INTO `mr_district` VALUES ('37', '长安区', '3');
INSERT INTO `mr_district` VALUES ('38', '桥东区', '3');
INSERT INTO `mr_district` VALUES ('39', '桥西区', '3');
INSERT INTO `mr_district` VALUES ('40', '新华区', '3');
INSERT INTO `mr_district` VALUES ('41', '井陉矿区', '3');
INSERT INTO `mr_district` VALUES ('42', '裕华区', '3');
INSERT INTO `mr_district` VALUES ('43', '井陉县', '3');
INSERT INTO `mr_district` VALUES ('44', '正定县', '3');
INSERT INTO `mr_district` VALUES ('45', '栾城县', '3');
INSERT INTO `mr_district` VALUES ('46', '行唐县', '3');
INSERT INTO `mr_district` VALUES ('47', '灵寿县', '3');
INSERT INTO `mr_district` VALUES ('48', '高邑县', '3');
INSERT INTO `mr_district` VALUES ('49', '深泽县', '3');
INSERT INTO `mr_district` VALUES ('50', '赞皇县', '3');
INSERT INTO `mr_district` VALUES ('51', '无极县', '3');
INSERT INTO `mr_district` VALUES ('52', '平山县', '3');
INSERT INTO `mr_district` VALUES ('53', '元氏县', '3');
INSERT INTO `mr_district` VALUES ('54', '赵县', '3');
INSERT INTO `mr_district` VALUES ('55', '辛集市', '3');
INSERT INTO `mr_district` VALUES ('56', '藁城市', '3');
INSERT INTO `mr_district` VALUES ('57', '晋州市', '3');
INSERT INTO `mr_district` VALUES ('58', '新乐市', '3');
INSERT INTO `mr_district` VALUES ('59', '鹿泉市', '3');
INSERT INTO `mr_district` VALUES ('60', '路南区', '4');
INSERT INTO `mr_district` VALUES ('61', '路北区', '4');
INSERT INTO `mr_district` VALUES ('62', '古冶区', '4');
INSERT INTO `mr_district` VALUES ('63', '开平区', '4');
INSERT INTO `mr_district` VALUES ('64', '丰南区', '4');
INSERT INTO `mr_district` VALUES ('65', '丰润区', '4');
INSERT INTO `mr_district` VALUES ('66', '滦县', '4');
INSERT INTO `mr_district` VALUES ('67', '滦南县', '4');
INSERT INTO `mr_district` VALUES ('68', '乐亭县', '4');
INSERT INTO `mr_district` VALUES ('69', '迁西县', '4');
INSERT INTO `mr_district` VALUES ('70', '玉田县', '4');
INSERT INTO `mr_district` VALUES ('71', '唐海县', '4');
INSERT INTO `mr_district` VALUES ('72', '遵化市', '4');
INSERT INTO `mr_district` VALUES ('73', '迁安市', '4');
INSERT INTO `mr_district` VALUES ('74', '海港区', '5');
INSERT INTO `mr_district` VALUES ('75', '山海关区', '5');
INSERT INTO `mr_district` VALUES ('76', '北戴河区', '5');
INSERT INTO `mr_district` VALUES ('77', '青龙满族自治县', '5');
INSERT INTO `mr_district` VALUES ('78', '昌黎县', '5');
INSERT INTO `mr_district` VALUES ('79', '抚宁县', '5');
INSERT INTO `mr_district` VALUES ('80', '卢龙县', '5');
INSERT INTO `mr_district` VALUES ('81', '邯山区', '6');
INSERT INTO `mr_district` VALUES ('82', '丛台区', '6');
INSERT INTO `mr_district` VALUES ('83', '复兴区', '6');
INSERT INTO `mr_district` VALUES ('84', '峰峰矿区', '6');
INSERT INTO `mr_district` VALUES ('85', '邯郸县', '6');
INSERT INTO `mr_district` VALUES ('86', '临漳县', '6');
INSERT INTO `mr_district` VALUES ('87', '成安县', '6');
INSERT INTO `mr_district` VALUES ('88', '大名县', '6');
INSERT INTO `mr_district` VALUES ('89', '涉县', '6');
INSERT INTO `mr_district` VALUES ('90', '磁县', '6');
INSERT INTO `mr_district` VALUES ('91', '肥乡县', '6');
INSERT INTO `mr_district` VALUES ('92', '永年县', '6');
INSERT INTO `mr_district` VALUES ('93', '邱县', '6');
INSERT INTO `mr_district` VALUES ('94', '鸡泽县', '6');
INSERT INTO `mr_district` VALUES ('95', '广平县', '6');
INSERT INTO `mr_district` VALUES ('96', '馆陶县', '6');
INSERT INTO `mr_district` VALUES ('97', '魏县', '6');
INSERT INTO `mr_district` VALUES ('98', '曲周县', '6');
INSERT INTO `mr_district` VALUES ('99', '武安市', '6');
INSERT INTO `mr_district` VALUES ('100', '桥东区', '7');
INSERT INTO `mr_district` VALUES ('101', '桥西区', '7');
INSERT INTO `mr_district` VALUES ('102', '邢台县', '7');
INSERT INTO `mr_district` VALUES ('103', '临城县', '7');
INSERT INTO `mr_district` VALUES ('104', '内丘县', '7');
INSERT INTO `mr_district` VALUES ('105', '柏乡县', '7');
INSERT INTO `mr_district` VALUES ('106', '隆尧县', '7');
INSERT INTO `mr_district` VALUES ('107', '任县', '7');
INSERT INTO `mr_district` VALUES ('108', '南和县', '7');
INSERT INTO `mr_district` VALUES ('109', '宁晋县', '7');
INSERT INTO `mr_district` VALUES ('110', '巨鹿县', '7');
INSERT INTO `mr_district` VALUES ('111', '新河县', '7');
INSERT INTO `mr_district` VALUES ('112', '广宗县', '7');
INSERT INTO `mr_district` VALUES ('113', '平乡县', '7');
INSERT INTO `mr_district` VALUES ('114', '威县', '7');
INSERT INTO `mr_district` VALUES ('115', '清河县', '7');
INSERT INTO `mr_district` VALUES ('116', '临西县', '7');
INSERT INTO `mr_district` VALUES ('117', '南宫市', '7');
INSERT INTO `mr_district` VALUES ('118', '沙河市', '7');
INSERT INTO `mr_district` VALUES ('119', '新市区', '8');
INSERT INTO `mr_district` VALUES ('120', '北市区', '8');
INSERT INTO `mr_district` VALUES ('121', '南市区', '8');
INSERT INTO `mr_district` VALUES ('122', '满城县', '8');
INSERT INTO `mr_district` VALUES ('123', '清苑县', '8');
INSERT INTO `mr_district` VALUES ('124', '涞水县', '8');
INSERT INTO `mr_district` VALUES ('125', '阜平县', '8');
INSERT INTO `mr_district` VALUES ('126', '徐水县', '8');
INSERT INTO `mr_district` VALUES ('127', '定兴县', '8');
INSERT INTO `mr_district` VALUES ('128', '唐县', '8');
INSERT INTO `mr_district` VALUES ('129', '高阳县', '8');
INSERT INTO `mr_district` VALUES ('130', '容城县', '8');
INSERT INTO `mr_district` VALUES ('131', '涞源县', '8');
INSERT INTO `mr_district` VALUES ('132', '望都县', '8');
INSERT INTO `mr_district` VALUES ('133', '安新县', '8');
INSERT INTO `mr_district` VALUES ('134', '易县', '8');
INSERT INTO `mr_district` VALUES ('135', '曲阳县', '8');
INSERT INTO `mr_district` VALUES ('136', '蠡县', '8');
INSERT INTO `mr_district` VALUES ('137', '顺平县', '8');
INSERT INTO `mr_district` VALUES ('138', '博野县', '8');
INSERT INTO `mr_district` VALUES ('139', '雄县', '8');
INSERT INTO `mr_district` VALUES ('140', '涿州市', '8');
INSERT INTO `mr_district` VALUES ('141', '定州市', '8');
INSERT INTO `mr_district` VALUES ('142', '安国市', '8');
INSERT INTO `mr_district` VALUES ('143', '高碑店市', '8');
INSERT INTO `mr_district` VALUES ('144', '桥东区', '9');
INSERT INTO `mr_district` VALUES ('145', '桥西区', '9');
INSERT INTO `mr_district` VALUES ('146', '宣化区', '9');
INSERT INTO `mr_district` VALUES ('147', '下花园区', '9');
INSERT INTO `mr_district` VALUES ('148', '宣化县', '9');
INSERT INTO `mr_district` VALUES ('149', '张北县', '9');
INSERT INTO `mr_district` VALUES ('150', '康保县', '9');
INSERT INTO `mr_district` VALUES ('151', '沽源县', '9');
INSERT INTO `mr_district` VALUES ('152', '尚义县', '9');
INSERT INTO `mr_district` VALUES ('153', '蔚县', '9');
INSERT INTO `mr_district` VALUES ('154', '阳原县', '9');
INSERT INTO `mr_district` VALUES ('155', '怀安县', '9');
INSERT INTO `mr_district` VALUES ('156', '万全县', '9');
INSERT INTO `mr_district` VALUES ('157', '怀来县', '9');
INSERT INTO `mr_district` VALUES ('158', '涿鹿县', '9');
INSERT INTO `mr_district` VALUES ('159', '赤城县', '9');
INSERT INTO `mr_district` VALUES ('160', '崇礼县', '9');
INSERT INTO `mr_district` VALUES ('161', '双桥区', '10');
INSERT INTO `mr_district` VALUES ('162', '双滦区', '10');
INSERT INTO `mr_district` VALUES ('163', '鹰手营子矿区', '10');
INSERT INTO `mr_district` VALUES ('164', '承德县', '10');
INSERT INTO `mr_district` VALUES ('165', '兴隆县', '10');
INSERT INTO `mr_district` VALUES ('166', '平泉县', '10');
INSERT INTO `mr_district` VALUES ('167', '滦平县', '10');
INSERT INTO `mr_district` VALUES ('168', '隆化县', '10');
INSERT INTO `mr_district` VALUES ('169', '丰宁满族自治县', '10');
INSERT INTO `mr_district` VALUES ('170', '宽城满族自治县', '10');
INSERT INTO `mr_district` VALUES ('171', '围场满族蒙古族自治县', '10');
INSERT INTO `mr_district` VALUES ('172', '新华区', '11');
INSERT INTO `mr_district` VALUES ('173', '运河区', '11');
INSERT INTO `mr_district` VALUES ('174', '沧县', '11');
INSERT INTO `mr_district` VALUES ('175', '青县', '11');
INSERT INTO `mr_district` VALUES ('176', '东光县', '11');
INSERT INTO `mr_district` VALUES ('177', '海兴县', '11');
INSERT INTO `mr_district` VALUES ('178', '盐山县', '11');
INSERT INTO `mr_district` VALUES ('179', '肃宁县', '11');
INSERT INTO `mr_district` VALUES ('180', '南皮县', '11');
INSERT INTO `mr_district` VALUES ('181', '吴桥县', '11');
INSERT INTO `mr_district` VALUES ('182', '献县', '11');
INSERT INTO `mr_district` VALUES ('183', '孟村回族自治县', '11');
INSERT INTO `mr_district` VALUES ('184', '泊头市', '11');
INSERT INTO `mr_district` VALUES ('185', '任丘市', '11');
INSERT INTO `mr_district` VALUES ('186', '黄骅市', '11');
INSERT INTO `mr_district` VALUES ('187', '河间市', '11');
INSERT INTO `mr_district` VALUES ('188', '安次区', '12');
INSERT INTO `mr_district` VALUES ('189', '广阳区', '12');
INSERT INTO `mr_district` VALUES ('190', '固安县', '12');
INSERT INTO `mr_district` VALUES ('191', '永清县', '12');
INSERT INTO `mr_district` VALUES ('192', '香河县', '12');
INSERT INTO `mr_district` VALUES ('193', '大城县', '12');
INSERT INTO `mr_district` VALUES ('194', '文安县', '12');
INSERT INTO `mr_district` VALUES ('195', '大厂回族自治县', '12');
INSERT INTO `mr_district` VALUES ('196', '霸州市', '12');
INSERT INTO `mr_district` VALUES ('197', '三河市', '12');
INSERT INTO `mr_district` VALUES ('198', '桃城区', '13');
INSERT INTO `mr_district` VALUES ('199', '枣强县', '13');
INSERT INTO `mr_district` VALUES ('200', '武邑县', '13');
INSERT INTO `mr_district` VALUES ('201', '武强县', '13');
INSERT INTO `mr_district` VALUES ('202', '饶阳县', '13');
INSERT INTO `mr_district` VALUES ('203', '安平县', '13');
INSERT INTO `mr_district` VALUES ('204', '故城县', '13');
INSERT INTO `mr_district` VALUES ('205', '景县', '13');
INSERT INTO `mr_district` VALUES ('206', '阜城县', '13');
INSERT INTO `mr_district` VALUES ('207', '冀州市', '13');
INSERT INTO `mr_district` VALUES ('208', '深州市', '13');
INSERT INTO `mr_district` VALUES ('209', '小店区', '14');
INSERT INTO `mr_district` VALUES ('210', '迎泽区', '14');
INSERT INTO `mr_district` VALUES ('211', '杏花岭区', '14');
INSERT INTO `mr_district` VALUES ('212', '尖草坪区', '14');
INSERT INTO `mr_district` VALUES ('213', '万柏林区', '14');
INSERT INTO `mr_district` VALUES ('214', '晋源区', '14');
INSERT INTO `mr_district` VALUES ('215', '清徐县', '14');
INSERT INTO `mr_district` VALUES ('216', '阳曲县', '14');
INSERT INTO `mr_district` VALUES ('217', '娄烦县', '14');
INSERT INTO `mr_district` VALUES ('218', '古交市', '14');
INSERT INTO `mr_district` VALUES ('219', '城区', '15');
INSERT INTO `mr_district` VALUES ('220', '矿区', '15');
INSERT INTO `mr_district` VALUES ('221', '南郊区', '15');
INSERT INTO `mr_district` VALUES ('222', '新荣区', '15');
INSERT INTO `mr_district` VALUES ('223', '阳高县', '15');
INSERT INTO `mr_district` VALUES ('224', '天镇县', '15');
INSERT INTO `mr_district` VALUES ('225', '广灵县', '15');
INSERT INTO `mr_district` VALUES ('226', '灵丘县', '15');
INSERT INTO `mr_district` VALUES ('227', '浑源县', '15');
INSERT INTO `mr_district` VALUES ('228', '左云县', '15');
INSERT INTO `mr_district` VALUES ('229', '大同县', '15');
INSERT INTO `mr_district` VALUES ('230', '城区', '16');
INSERT INTO `mr_district` VALUES ('231', '矿区', '16');
INSERT INTO `mr_district` VALUES ('232', '郊区', '16');
INSERT INTO `mr_district` VALUES ('233', '平定县', '16');
INSERT INTO `mr_district` VALUES ('234', '盂县', '16');
INSERT INTO `mr_district` VALUES ('235', '城区', '17');
INSERT INTO `mr_district` VALUES ('236', '郊区', '17');
INSERT INTO `mr_district` VALUES ('237', '长治县', '17');
INSERT INTO `mr_district` VALUES ('238', '襄垣县', '17');
INSERT INTO `mr_district` VALUES ('239', '屯留县', '17');
INSERT INTO `mr_district` VALUES ('240', '平顺县', '17');
INSERT INTO `mr_district` VALUES ('241', '黎城县', '17');
INSERT INTO `mr_district` VALUES ('242', '壶关县', '17');
INSERT INTO `mr_district` VALUES ('243', '长子县', '17');
INSERT INTO `mr_district` VALUES ('244', '武乡县', '17');
INSERT INTO `mr_district` VALUES ('245', '沁县', '17');
INSERT INTO `mr_district` VALUES ('246', '沁源县', '17');
INSERT INTO `mr_district` VALUES ('247', '潞城市', '17');
INSERT INTO `mr_district` VALUES ('248', '城区', '18');
INSERT INTO `mr_district` VALUES ('249', '沁水县', '18');
INSERT INTO `mr_district` VALUES ('250', '阳城县', '18');
INSERT INTO `mr_district` VALUES ('251', '陵川县', '18');
INSERT INTO `mr_district` VALUES ('252', '泽州县', '18');
INSERT INTO `mr_district` VALUES ('253', '高平市', '18');
INSERT INTO `mr_district` VALUES ('254', '朔城区', '19');
INSERT INTO `mr_district` VALUES ('255', '平鲁区', '19');
INSERT INTO `mr_district` VALUES ('256', '山阴县', '19');
INSERT INTO `mr_district` VALUES ('257', '应县', '19');
INSERT INTO `mr_district` VALUES ('258', '右玉县', '19');
INSERT INTO `mr_district` VALUES ('259', '怀仁县', '19');
INSERT INTO `mr_district` VALUES ('260', '榆次区', '20');
INSERT INTO `mr_district` VALUES ('261', '榆社县', '20');
INSERT INTO `mr_district` VALUES ('262', '左权县', '20');
INSERT INTO `mr_district` VALUES ('263', '和顺县', '20');
INSERT INTO `mr_district` VALUES ('264', '昔阳县', '20');
INSERT INTO `mr_district` VALUES ('265', '寿阳县', '20');
INSERT INTO `mr_district` VALUES ('266', '太谷县', '20');
INSERT INTO `mr_district` VALUES ('267', '祁县', '20');
INSERT INTO `mr_district` VALUES ('268', '平遥县', '20');
INSERT INTO `mr_district` VALUES ('269', '灵石县', '20');
INSERT INTO `mr_district` VALUES ('270', '介休市', '20');
INSERT INTO `mr_district` VALUES ('271', '盐湖区', '21');
INSERT INTO `mr_district` VALUES ('272', '临猗县', '21');
INSERT INTO `mr_district` VALUES ('273', '万荣县', '21');
INSERT INTO `mr_district` VALUES ('274', '闻喜县', '21');
INSERT INTO `mr_district` VALUES ('275', '稷山县', '21');
INSERT INTO `mr_district` VALUES ('276', '新绛县', '21');
INSERT INTO `mr_district` VALUES ('277', '绛县', '21');
INSERT INTO `mr_district` VALUES ('278', '垣曲县', '21');
INSERT INTO `mr_district` VALUES ('279', '夏县', '21');
INSERT INTO `mr_district` VALUES ('280', '平陆县', '21');
INSERT INTO `mr_district` VALUES ('281', '芮城县', '21');
INSERT INTO `mr_district` VALUES ('282', '永济市', '21');
INSERT INTO `mr_district` VALUES ('283', '河津市', '21');
INSERT INTO `mr_district` VALUES ('284', '忻府区', '22');
INSERT INTO `mr_district` VALUES ('285', '定襄县', '22');
INSERT INTO `mr_district` VALUES ('286', '五台县', '22');
INSERT INTO `mr_district` VALUES ('287', '代县', '22');
INSERT INTO `mr_district` VALUES ('288', '繁峙县', '22');
INSERT INTO `mr_district` VALUES ('289', '宁武县', '22');
INSERT INTO `mr_district` VALUES ('290', '静乐县', '22');
INSERT INTO `mr_district` VALUES ('291', '神池县', '22');
INSERT INTO `mr_district` VALUES ('292', '五寨县', '22');
INSERT INTO `mr_district` VALUES ('293', '岢岚县', '22');
INSERT INTO `mr_district` VALUES ('294', '河曲县', '22');
INSERT INTO `mr_district` VALUES ('295', '保德县', '22');
INSERT INTO `mr_district` VALUES ('296', '偏关县', '22');
INSERT INTO `mr_district` VALUES ('297', '原平市', '22');
INSERT INTO `mr_district` VALUES ('298', '尧都区', '23');
INSERT INTO `mr_district` VALUES ('299', '曲沃县', '23');
INSERT INTO `mr_district` VALUES ('300', '翼城县', '23');
INSERT INTO `mr_district` VALUES ('301', '襄汾县', '23');
INSERT INTO `mr_district` VALUES ('302', '洪洞县', '23');
INSERT INTO `mr_district` VALUES ('303', '古县', '23');
INSERT INTO `mr_district` VALUES ('304', '安泽县', '23');
INSERT INTO `mr_district` VALUES ('305', '浮山县', '23');
INSERT INTO `mr_district` VALUES ('306', '吉县', '23');
INSERT INTO `mr_district` VALUES ('307', '乡宁县', '23');
INSERT INTO `mr_district` VALUES ('308', '大宁县', '23');
INSERT INTO `mr_district` VALUES ('309', '隰县', '23');
INSERT INTO `mr_district` VALUES ('310', '永和县', '23');
INSERT INTO `mr_district` VALUES ('311', '蒲县', '23');
INSERT INTO `mr_district` VALUES ('312', '汾西县', '23');
INSERT INTO `mr_district` VALUES ('313', '侯马市', '23');
INSERT INTO `mr_district` VALUES ('314', '霍州市', '23');
INSERT INTO `mr_district` VALUES ('315', '离石区', '24');
INSERT INTO `mr_district` VALUES ('316', '文水县', '24');
INSERT INTO `mr_district` VALUES ('317', '交城县', '24');
INSERT INTO `mr_district` VALUES ('318', '兴县', '24');
INSERT INTO `mr_district` VALUES ('319', '临县', '24');
INSERT INTO `mr_district` VALUES ('320', '柳林县', '24');
INSERT INTO `mr_district` VALUES ('321', '石楼县', '24');
INSERT INTO `mr_district` VALUES ('322', '岚县', '24');
INSERT INTO `mr_district` VALUES ('323', '方山县', '24');
INSERT INTO `mr_district` VALUES ('324', '中阳县', '24');
INSERT INTO `mr_district` VALUES ('325', '交口县', '24');
INSERT INTO `mr_district` VALUES ('326', '孝义市', '24');
INSERT INTO `mr_district` VALUES ('327', '汾阳市', '24');
INSERT INTO `mr_district` VALUES ('328', '新城区', '25');
INSERT INTO `mr_district` VALUES ('329', '回民区', '25');
INSERT INTO `mr_district` VALUES ('330', '玉泉区', '25');
INSERT INTO `mr_district` VALUES ('331', '赛罕区', '25');
INSERT INTO `mr_district` VALUES ('332', '土默特左旗', '25');
INSERT INTO `mr_district` VALUES ('333', '托克托县', '25');
INSERT INTO `mr_district` VALUES ('334', '和林格尔县', '25');
INSERT INTO `mr_district` VALUES ('335', '清水河县', '25');
INSERT INTO `mr_district` VALUES ('336', '武川县', '25');
INSERT INTO `mr_district` VALUES ('337', '东河区', '26');
INSERT INTO `mr_district` VALUES ('338', '昆都仑区', '26');
INSERT INTO `mr_district` VALUES ('339', '青山区', '26');
INSERT INTO `mr_district` VALUES ('340', '石拐区', '26');
INSERT INTO `mr_district` VALUES ('341', '白云矿区', '26');
INSERT INTO `mr_district` VALUES ('342', '九原区', '26');
INSERT INTO `mr_district` VALUES ('343', '土默特右旗', '26');
INSERT INTO `mr_district` VALUES ('344', '固阳县', '26');
INSERT INTO `mr_district` VALUES ('345', '达尔罕茂明安联合旗', '26');
INSERT INTO `mr_district` VALUES ('346', '海勃湾区', '27');
INSERT INTO `mr_district` VALUES ('347', '海南区', '27');
INSERT INTO `mr_district` VALUES ('348', '乌达区', '27');
INSERT INTO `mr_district` VALUES ('349', '红山区', '28');
INSERT INTO `mr_district` VALUES ('350', '元宝山区', '28');
INSERT INTO `mr_district` VALUES ('351', '松山区', '28');
INSERT INTO `mr_district` VALUES ('352', '阿鲁科尔沁旗', '28');
INSERT INTO `mr_district` VALUES ('353', '巴林左旗', '28');
INSERT INTO `mr_district` VALUES ('354', '巴林右旗', '28');
INSERT INTO `mr_district` VALUES ('355', '林西县', '28');
INSERT INTO `mr_district` VALUES ('356', '克什克腾旗', '28');
INSERT INTO `mr_district` VALUES ('357', '翁牛特旗', '28');
INSERT INTO `mr_district` VALUES ('358', '喀喇沁旗', '28');
INSERT INTO `mr_district` VALUES ('359', '宁城县', '28');
INSERT INTO `mr_district` VALUES ('360', '敖汉旗', '28');
INSERT INTO `mr_district` VALUES ('361', '科尔沁区', '29');
INSERT INTO `mr_district` VALUES ('362', '科尔沁左翼中旗', '29');
INSERT INTO `mr_district` VALUES ('363', '科尔沁左翼后旗', '29');
INSERT INTO `mr_district` VALUES ('364', '开鲁县', '29');
INSERT INTO `mr_district` VALUES ('365', '库伦旗', '29');
INSERT INTO `mr_district` VALUES ('366', '奈曼旗', '29');
INSERT INTO `mr_district` VALUES ('367', '扎鲁特旗', '29');
INSERT INTO `mr_district` VALUES ('368', '霍林郭勒市', '29');
INSERT INTO `mr_district` VALUES ('369', '东胜区', '30');
INSERT INTO `mr_district` VALUES ('370', '达拉特旗', '30');
INSERT INTO `mr_district` VALUES ('371', '准格尔旗', '30');
INSERT INTO `mr_district` VALUES ('372', '鄂托克前旗', '30');
INSERT INTO `mr_district` VALUES ('373', '鄂托克旗', '30');
INSERT INTO `mr_district` VALUES ('374', '杭锦旗', '30');
INSERT INTO `mr_district` VALUES ('375', '乌审旗', '30');
INSERT INTO `mr_district` VALUES ('376', '伊金霍洛旗', '30');
INSERT INTO `mr_district` VALUES ('377', '海拉尔区', '31');
INSERT INTO `mr_district` VALUES ('378', '阿荣旗', '31');
INSERT INTO `mr_district` VALUES ('379', '莫力达瓦达斡尔族自治旗', '31');
INSERT INTO `mr_district` VALUES ('380', '鄂伦春自治旗', '31');
INSERT INTO `mr_district` VALUES ('381', '鄂温克族自治旗', '31');
INSERT INTO `mr_district` VALUES ('382', '陈巴尔虎旗', '31');
INSERT INTO `mr_district` VALUES ('383', '新巴尔虎左旗', '31');
INSERT INTO `mr_district` VALUES ('384', '新巴尔虎右旗', '31');
INSERT INTO `mr_district` VALUES ('385', '满洲里市', '31');
INSERT INTO `mr_district` VALUES ('386', '牙克石市', '31');
INSERT INTO `mr_district` VALUES ('387', '扎兰屯市', '31');
INSERT INTO `mr_district` VALUES ('388', '额尔古纳市', '31');
INSERT INTO `mr_district` VALUES ('389', '根河市', '31');
INSERT INTO `mr_district` VALUES ('390', '临河区', '32');
INSERT INTO `mr_district` VALUES ('391', '五原县', '32');
INSERT INTO `mr_district` VALUES ('392', '磴口县', '32');
INSERT INTO `mr_district` VALUES ('393', '乌拉特前旗', '32');
INSERT INTO `mr_district` VALUES ('394', '乌拉特中旗', '32');
INSERT INTO `mr_district` VALUES ('395', '乌拉特后旗', '32');
INSERT INTO `mr_district` VALUES ('396', '杭锦后旗', '32');
INSERT INTO `mr_district` VALUES ('397', '集宁区', '33');
INSERT INTO `mr_district` VALUES ('398', '卓资县', '33');
INSERT INTO `mr_district` VALUES ('399', '化德县', '33');
INSERT INTO `mr_district` VALUES ('400', '商都县', '33');
INSERT INTO `mr_district` VALUES ('401', '兴和县', '33');
INSERT INTO `mr_district` VALUES ('402', '凉城县', '33');
INSERT INTO `mr_district` VALUES ('403', '察哈尔右翼前旗', '33');
INSERT INTO `mr_district` VALUES ('404', '察哈尔右翼中旗', '33');
INSERT INTO `mr_district` VALUES ('405', '察哈尔右翼后旗', '33');
INSERT INTO `mr_district` VALUES ('406', '四子王旗', '33');
INSERT INTO `mr_district` VALUES ('407', '丰镇市', '33');
INSERT INTO `mr_district` VALUES ('408', '乌兰浩特市', '34');
INSERT INTO `mr_district` VALUES ('409', '阿尔山市', '34');
INSERT INTO `mr_district` VALUES ('410', '科尔沁右翼前旗', '34');
INSERT INTO `mr_district` VALUES ('411', '科尔沁右翼中旗', '34');
INSERT INTO `mr_district` VALUES ('412', '扎赉特旗', '34');
INSERT INTO `mr_district` VALUES ('413', '突泉县', '34');
INSERT INTO `mr_district` VALUES ('414', '二连浩特市', '35');
INSERT INTO `mr_district` VALUES ('415', '锡林浩特市', '35');
INSERT INTO `mr_district` VALUES ('416', '阿巴嘎旗', '35');
INSERT INTO `mr_district` VALUES ('417', '苏尼特左旗', '35');
INSERT INTO `mr_district` VALUES ('418', '苏尼特右旗', '35');
INSERT INTO `mr_district` VALUES ('419', '东乌珠穆沁旗', '35');
INSERT INTO `mr_district` VALUES ('420', '西乌珠穆沁旗', '35');
INSERT INTO `mr_district` VALUES ('421', '太仆寺旗', '35');
INSERT INTO `mr_district` VALUES ('422', '镶黄旗', '35');
INSERT INTO `mr_district` VALUES ('423', '正镶白旗', '35');
INSERT INTO `mr_district` VALUES ('424', '正蓝旗', '35');
INSERT INTO `mr_district` VALUES ('425', '多伦县', '35');
INSERT INTO `mr_district` VALUES ('426', '阿拉善左旗', '36');
INSERT INTO `mr_district` VALUES ('427', '阿拉善右旗', '36');
INSERT INTO `mr_district` VALUES ('428', '额济纳旗', '36');
INSERT INTO `mr_district` VALUES ('429', '和平区', '37');
INSERT INTO `mr_district` VALUES ('430', '沈河区', '37');
INSERT INTO `mr_district` VALUES ('431', '大东区', '37');
INSERT INTO `mr_district` VALUES ('432', '皇姑区', '37');
INSERT INTO `mr_district` VALUES ('433', '铁西区', '37');
INSERT INTO `mr_district` VALUES ('434', '苏家屯区', '37');
INSERT INTO `mr_district` VALUES ('435', '东陵区', '37');
INSERT INTO `mr_district` VALUES ('436', '新城子区', '37');
INSERT INTO `mr_district` VALUES ('437', '于洪区', '37');
INSERT INTO `mr_district` VALUES ('438', '辽中县', '37');
INSERT INTO `mr_district` VALUES ('439', '康平县', '37');
INSERT INTO `mr_district` VALUES ('440', '法库县', '37');
INSERT INTO `mr_district` VALUES ('441', '新民市', '37');
INSERT INTO `mr_district` VALUES ('442', '中山区', '38');
INSERT INTO `mr_district` VALUES ('443', '西岗区', '38');
INSERT INTO `mr_district` VALUES ('444', '沙河口区', '38');
INSERT INTO `mr_district` VALUES ('445', '甘井子区', '38');
INSERT INTO `mr_district` VALUES ('446', '旅顺口区', '38');
INSERT INTO `mr_district` VALUES ('447', '金州区', '38');
INSERT INTO `mr_district` VALUES ('448', '长海县', '38');
INSERT INTO `mr_district` VALUES ('449', '瓦房店市', '38');
INSERT INTO `mr_district` VALUES ('450', '普兰店市', '38');
INSERT INTO `mr_district` VALUES ('451', '庄河市', '38');
INSERT INTO `mr_district` VALUES ('452', '铁东区', '39');
INSERT INTO `mr_district` VALUES ('453', '铁西区', '39');
INSERT INTO `mr_district` VALUES ('454', '立山区', '39');
INSERT INTO `mr_district` VALUES ('455', '千山区', '39');
INSERT INTO `mr_district` VALUES ('456', '台安县', '39');
INSERT INTO `mr_district` VALUES ('457', '岫岩满族自治县', '39');
INSERT INTO `mr_district` VALUES ('458', '海城市', '39');
INSERT INTO `mr_district` VALUES ('459', '新抚区', '40');
INSERT INTO `mr_district` VALUES ('460', '东洲区', '40');
INSERT INTO `mr_district` VALUES ('461', '望花区', '40');
INSERT INTO `mr_district` VALUES ('462', '顺城区', '40');
INSERT INTO `mr_district` VALUES ('463', '抚顺县', '40');
INSERT INTO `mr_district` VALUES ('464', '新宾满族自治县', '40');
INSERT INTO `mr_district` VALUES ('465', '清原满族自治县', '40');
INSERT INTO `mr_district` VALUES ('466', '平山区', '41');
INSERT INTO `mr_district` VALUES ('467', '溪湖区', '41');
INSERT INTO `mr_district` VALUES ('468', '明山区', '41');
INSERT INTO `mr_district` VALUES ('469', '南芬区', '41');
INSERT INTO `mr_district` VALUES ('470', '本溪满族自治县', '41');
INSERT INTO `mr_district` VALUES ('471', '桓仁满族自治县', '41');
INSERT INTO `mr_district` VALUES ('472', '元宝区', '42');
INSERT INTO `mr_district` VALUES ('473', '振兴区', '42');
INSERT INTO `mr_district` VALUES ('474', '振安区', '42');
INSERT INTO `mr_district` VALUES ('475', '宽甸满族自治县', '42');
INSERT INTO `mr_district` VALUES ('476', '东港市', '42');
INSERT INTO `mr_district` VALUES ('477', '凤城市', '42');
INSERT INTO `mr_district` VALUES ('478', '古塔区', '43');
INSERT INTO `mr_district` VALUES ('479', '凌河区', '43');
INSERT INTO `mr_district` VALUES ('480', '太和区', '43');
INSERT INTO `mr_district` VALUES ('481', '黑山县', '43');
INSERT INTO `mr_district` VALUES ('482', '义县', '43');
INSERT INTO `mr_district` VALUES ('483', '凌海市', '43');
INSERT INTO `mr_district` VALUES ('484', '北宁市', '43');
INSERT INTO `mr_district` VALUES ('485', '站前区', '44');
INSERT INTO `mr_district` VALUES ('486', '西市区', '44');
INSERT INTO `mr_district` VALUES ('487', '鲅鱼圈区', '44');
INSERT INTO `mr_district` VALUES ('488', '老边区', '44');
INSERT INTO `mr_district` VALUES ('489', '盖州市', '44');
INSERT INTO `mr_district` VALUES ('490', '大石桥市', '44');
INSERT INTO `mr_district` VALUES ('491', '海州区', '45');
INSERT INTO `mr_district` VALUES ('492', '新邱区', '45');
INSERT INTO `mr_district` VALUES ('493', '太平区', '45');
INSERT INTO `mr_district` VALUES ('494', '清河门区', '45');
INSERT INTO `mr_district` VALUES ('495', '细河区', '45');
INSERT INTO `mr_district` VALUES ('496', '阜新蒙古族自治县', '45');
INSERT INTO `mr_district` VALUES ('497', '彰武县', '45');
INSERT INTO `mr_district` VALUES ('498', '白塔区', '46');
INSERT INTO `mr_district` VALUES ('499', '文圣区', '46');
INSERT INTO `mr_district` VALUES ('500', '宏伟区', '46');
INSERT INTO `mr_district` VALUES ('501', '弓长岭区', '46');
INSERT INTO `mr_district` VALUES ('502', '太子河区', '46');
INSERT INTO `mr_district` VALUES ('503', '辽阳县', '46');
INSERT INTO `mr_district` VALUES ('504', '灯塔市', '46');
INSERT INTO `mr_district` VALUES ('505', '双台子区', '47');
INSERT INTO `mr_district` VALUES ('506', '兴隆台区', '47');
INSERT INTO `mr_district` VALUES ('507', '大洼县', '47');
INSERT INTO `mr_district` VALUES ('508', '盘山县', '47');
INSERT INTO `mr_district` VALUES ('509', '银州区', '48');
INSERT INTO `mr_district` VALUES ('510', '清河区', '48');
INSERT INTO `mr_district` VALUES ('511', '铁岭县', '48');
INSERT INTO `mr_district` VALUES ('512', '西丰县', '48');
INSERT INTO `mr_district` VALUES ('513', '昌图县', '48');
INSERT INTO `mr_district` VALUES ('514', '调兵山市', '48');
INSERT INTO `mr_district` VALUES ('515', '开原市', '48');
INSERT INTO `mr_district` VALUES ('516', '双塔区', '49');
INSERT INTO `mr_district` VALUES ('517', '龙城区', '49');
INSERT INTO `mr_district` VALUES ('518', '朝阳县', '49');
INSERT INTO `mr_district` VALUES ('519', '建平县', '49');
INSERT INTO `mr_district` VALUES ('520', '喀喇沁左翼蒙古族自治县', '49');
INSERT INTO `mr_district` VALUES ('521', '北票市', '49');
INSERT INTO `mr_district` VALUES ('522', '凌源市', '49');
INSERT INTO `mr_district` VALUES ('523', '连山区', '50');
INSERT INTO `mr_district` VALUES ('524', '龙港区', '50');
INSERT INTO `mr_district` VALUES ('525', '南票区', '50');
INSERT INTO `mr_district` VALUES ('526', '绥中县', '50');
INSERT INTO `mr_district` VALUES ('527', '建昌县', '50');
INSERT INTO `mr_district` VALUES ('528', '兴城市', '50');
INSERT INTO `mr_district` VALUES ('529', '南关区', '51');
INSERT INTO `mr_district` VALUES ('530', '宽城区', '51');
INSERT INTO `mr_district` VALUES ('531', '朝阳区', '51');
INSERT INTO `mr_district` VALUES ('532', '二道区', '51');
INSERT INTO `mr_district` VALUES ('533', '绿园区', '51');
INSERT INTO `mr_district` VALUES ('534', '双阳区', '51');
INSERT INTO `mr_district` VALUES ('535', '农安县', '51');
INSERT INTO `mr_district` VALUES ('536', '九台市', '51');
INSERT INTO `mr_district` VALUES ('537', '榆树市', '51');
INSERT INTO `mr_district` VALUES ('538', '德惠市', '51');
INSERT INTO `mr_district` VALUES ('539', '昌邑区', '52');
INSERT INTO `mr_district` VALUES ('540', '龙潭区', '52');
INSERT INTO `mr_district` VALUES ('541', '船营区', '52');
INSERT INTO `mr_district` VALUES ('542', '丰满区', '52');
INSERT INTO `mr_district` VALUES ('543', '永吉县', '52');
INSERT INTO `mr_district` VALUES ('544', '蛟河市', '52');
INSERT INTO `mr_district` VALUES ('545', '桦甸市', '52');
INSERT INTO `mr_district` VALUES ('546', '舒兰市', '52');
INSERT INTO `mr_district` VALUES ('547', '磐石市', '52');
INSERT INTO `mr_district` VALUES ('548', '铁西区', '53');
INSERT INTO `mr_district` VALUES ('549', '铁东区', '53');
INSERT INTO `mr_district` VALUES ('550', '梨树县', '53');
INSERT INTO `mr_district` VALUES ('551', '伊通满族自治县', '53');
INSERT INTO `mr_district` VALUES ('552', '公主岭市', '53');
INSERT INTO `mr_district` VALUES ('553', '双辽市', '53');
INSERT INTO `mr_district` VALUES ('554', '龙山区', '54');
INSERT INTO `mr_district` VALUES ('555', '西安区', '54');
INSERT INTO `mr_district` VALUES ('556', '东丰县', '54');
INSERT INTO `mr_district` VALUES ('557', '东辽县', '54');
INSERT INTO `mr_district` VALUES ('558', '东昌区', '55');
INSERT INTO `mr_district` VALUES ('559', '二道江区', '55');
INSERT INTO `mr_district` VALUES ('560', '通化县', '55');
INSERT INTO `mr_district` VALUES ('561', '辉南县', '55');
INSERT INTO `mr_district` VALUES ('562', '柳河县', '55');
INSERT INTO `mr_district` VALUES ('563', '梅河口市', '55');
INSERT INTO `mr_district` VALUES ('564', '集安市', '55');
INSERT INTO `mr_district` VALUES ('565', '八道江区', '56');
INSERT INTO `mr_district` VALUES ('566', '抚松县', '56');
INSERT INTO `mr_district` VALUES ('567', '靖宇县', '56');
INSERT INTO `mr_district` VALUES ('568', '长白朝鲜族自治县', '56');
INSERT INTO `mr_district` VALUES ('569', '江源县', '56');
INSERT INTO `mr_district` VALUES ('570', '临江市', '56');
INSERT INTO `mr_district` VALUES ('571', '宁江区', '57');
INSERT INTO `mr_district` VALUES ('572', '前郭尔罗斯蒙古族自治县', '57');
INSERT INTO `mr_district` VALUES ('573', '长岭县', '57');
INSERT INTO `mr_district` VALUES ('574', '乾安县', '57');
INSERT INTO `mr_district` VALUES ('575', '扶余县', '57');
INSERT INTO `mr_district` VALUES ('576', '洮北区', '58');
INSERT INTO `mr_district` VALUES ('577', '镇赉县', '58');
INSERT INTO `mr_district` VALUES ('578', '通榆县', '58');
INSERT INTO `mr_district` VALUES ('579', '洮南市', '58');
INSERT INTO `mr_district` VALUES ('580', '大安市', '58');
INSERT INTO `mr_district` VALUES ('581', '延吉市', '59');
INSERT INTO `mr_district` VALUES ('582', '图们市', '59');
INSERT INTO `mr_district` VALUES ('583', '敦化市', '59');
INSERT INTO `mr_district` VALUES ('584', '珲春市', '59');
INSERT INTO `mr_district` VALUES ('585', '龙井市', '59');
INSERT INTO `mr_district` VALUES ('586', '和龙市', '59');
INSERT INTO `mr_district` VALUES ('587', '汪清县', '59');
INSERT INTO `mr_district` VALUES ('588', '安图县', '59');
INSERT INTO `mr_district` VALUES ('589', '道里区', '60');
INSERT INTO `mr_district` VALUES ('590', '南岗区', '60');
INSERT INTO `mr_district` VALUES ('591', '道外区', '60');
INSERT INTO `mr_district` VALUES ('592', '香坊区', '60');
INSERT INTO `mr_district` VALUES ('593', '动力区', '60');
INSERT INTO `mr_district` VALUES ('594', '平房区', '60');
INSERT INTO `mr_district` VALUES ('595', '松北区', '60');
INSERT INTO `mr_district` VALUES ('596', '呼兰区', '60');
INSERT INTO `mr_district` VALUES ('597', '依兰县', '60');
INSERT INTO `mr_district` VALUES ('598', '方正县', '60');
INSERT INTO `mr_district` VALUES ('599', '宾县', '60');
INSERT INTO `mr_district` VALUES ('600', '巴彦县', '60');
INSERT INTO `mr_district` VALUES ('601', '木兰县', '60');
INSERT INTO `mr_district` VALUES ('602', '通河县', '60');
INSERT INTO `mr_district` VALUES ('603', '延寿县', '60');
INSERT INTO `mr_district` VALUES ('604', '阿城市', '60');
INSERT INTO `mr_district` VALUES ('605', '双城市', '60');
INSERT INTO `mr_district` VALUES ('606', '尚志市', '60');
INSERT INTO `mr_district` VALUES ('607', '五常市', '60');
INSERT INTO `mr_district` VALUES ('608', '龙沙区', '61');
INSERT INTO `mr_district` VALUES ('609', '建华区', '61');
INSERT INTO `mr_district` VALUES ('610', '铁锋区', '61');
INSERT INTO `mr_district` VALUES ('611', '昂昂溪区', '61');
INSERT INTO `mr_district` VALUES ('612', '富拉尔基区', '61');
INSERT INTO `mr_district` VALUES ('613', '碾子山区', '61');
INSERT INTO `mr_district` VALUES ('614', '梅里斯达斡尔族区', '61');
INSERT INTO `mr_district` VALUES ('615', '龙江县', '61');
INSERT INTO `mr_district` VALUES ('616', '依安县', '61');
INSERT INTO `mr_district` VALUES ('617', '泰来县', '61');
INSERT INTO `mr_district` VALUES ('618', '甘南县', '61');
INSERT INTO `mr_district` VALUES ('619', '富裕县', '61');
INSERT INTO `mr_district` VALUES ('620', '克山县', '61');
INSERT INTO `mr_district` VALUES ('621', '克东县', '61');
INSERT INTO `mr_district` VALUES ('622', '拜泉县', '61');
INSERT INTO `mr_district` VALUES ('623', '讷河市', '61');
INSERT INTO `mr_district` VALUES ('624', '鸡冠区', '62');
INSERT INTO `mr_district` VALUES ('625', '恒山区', '62');
INSERT INTO `mr_district` VALUES ('626', '滴道区', '62');
INSERT INTO `mr_district` VALUES ('627', '梨树区', '62');
INSERT INTO `mr_district` VALUES ('628', '城子河区', '62');
INSERT INTO `mr_district` VALUES ('629', '麻山区', '62');
INSERT INTO `mr_district` VALUES ('630', '鸡东县', '62');
INSERT INTO `mr_district` VALUES ('631', '虎林市', '62');
INSERT INTO `mr_district` VALUES ('632', '密山市', '62');
INSERT INTO `mr_district` VALUES ('633', '向阳区', '63');
INSERT INTO `mr_district` VALUES ('634', '工农区', '63');
INSERT INTO `mr_district` VALUES ('635', '南山区', '63');
INSERT INTO `mr_district` VALUES ('636', '兴安区', '63');
INSERT INTO `mr_district` VALUES ('637', '东山区', '63');
INSERT INTO `mr_district` VALUES ('638', '兴山区', '63');
INSERT INTO `mr_district` VALUES ('639', '萝北县', '63');
INSERT INTO `mr_district` VALUES ('640', '绥滨县', '63');
INSERT INTO `mr_district` VALUES ('641', '尖山区', '64');
INSERT INTO `mr_district` VALUES ('642', '岭东区', '64');
INSERT INTO `mr_district` VALUES ('643', '四方台区', '64');
INSERT INTO `mr_district` VALUES ('644', '宝山区', '64');
INSERT INTO `mr_district` VALUES ('645', '集贤县', '64');
INSERT INTO `mr_district` VALUES ('646', '友谊县', '64');
INSERT INTO `mr_district` VALUES ('647', '宝清县', '64');
INSERT INTO `mr_district` VALUES ('648', '饶河县', '64');
INSERT INTO `mr_district` VALUES ('649', '萨尔图区', '65');
INSERT INTO `mr_district` VALUES ('650', '龙凤区', '65');
INSERT INTO `mr_district` VALUES ('651', '让胡路区', '65');
INSERT INTO `mr_district` VALUES ('652', '红岗区', '65');
INSERT INTO `mr_district` VALUES ('653', '大同区', '65');
INSERT INTO `mr_district` VALUES ('654', '肇州县', '65');
INSERT INTO `mr_district` VALUES ('655', '肇源县', '65');
INSERT INTO `mr_district` VALUES ('656', '林甸县', '65');
INSERT INTO `mr_district` VALUES ('657', '杜尔伯特蒙古族自治县', '65');
INSERT INTO `mr_district` VALUES ('658', '伊春区', '66');
INSERT INTO `mr_district` VALUES ('659', '南岔区', '66');
INSERT INTO `mr_district` VALUES ('660', '友好区', '66');
INSERT INTO `mr_district` VALUES ('661', '西林区', '66');
INSERT INTO `mr_district` VALUES ('662', '翠峦区', '66');
INSERT INTO `mr_district` VALUES ('663', '新青区', '66');
INSERT INTO `mr_district` VALUES ('664', '美溪区', '66');
INSERT INTO `mr_district` VALUES ('665', '金山屯区', '66');
INSERT INTO `mr_district` VALUES ('666', '五营区', '66');
INSERT INTO `mr_district` VALUES ('667', '乌马河区', '66');
INSERT INTO `mr_district` VALUES ('668', '汤旺河区', '66');
INSERT INTO `mr_district` VALUES ('669', '带岭区', '66');
INSERT INTO `mr_district` VALUES ('670', '乌伊岭区', '66');
INSERT INTO `mr_district` VALUES ('671', '红星区', '66');
INSERT INTO `mr_district` VALUES ('672', '上甘岭区', '66');
INSERT INTO `mr_district` VALUES ('673', '嘉荫县', '66');
INSERT INTO `mr_district` VALUES ('674', '铁力市', '66');
INSERT INTO `mr_district` VALUES ('675', '永红区', '67');
INSERT INTO `mr_district` VALUES ('676', '向阳区', '67');
INSERT INTO `mr_district` VALUES ('677', '前进区', '67');
INSERT INTO `mr_district` VALUES ('678', '东风区', '67');
INSERT INTO `mr_district` VALUES ('679', '郊区', '67');
INSERT INTO `mr_district` VALUES ('680', '桦南县', '67');
INSERT INTO `mr_district` VALUES ('681', '桦川县', '67');
INSERT INTO `mr_district` VALUES ('682', '汤原县', '67');
INSERT INTO `mr_district` VALUES ('683', '抚远县', '67');
INSERT INTO `mr_district` VALUES ('684', '同江市', '67');
INSERT INTO `mr_district` VALUES ('685', '富锦市', '67');
INSERT INTO `mr_district` VALUES ('686', '新兴区', '68');
INSERT INTO `mr_district` VALUES ('687', '桃山区', '68');
INSERT INTO `mr_district` VALUES ('688', '茄子河区', '68');
INSERT INTO `mr_district` VALUES ('689', '勃利县', '68');
INSERT INTO `mr_district` VALUES ('690', '东安区', '69');
INSERT INTO `mr_district` VALUES ('691', '阳明区', '69');
INSERT INTO `mr_district` VALUES ('692', '爱民区', '69');
INSERT INTO `mr_district` VALUES ('693', '西安区', '69');
INSERT INTO `mr_district` VALUES ('694', '东宁县', '69');
INSERT INTO `mr_district` VALUES ('695', '林口县', '69');
INSERT INTO `mr_district` VALUES ('696', '绥芬河市', '69');
INSERT INTO `mr_district` VALUES ('697', '海林市', '69');
INSERT INTO `mr_district` VALUES ('698', '宁安市', '69');
INSERT INTO `mr_district` VALUES ('699', '穆棱市', '69');
INSERT INTO `mr_district` VALUES ('700', '爱辉区', '70');
INSERT INTO `mr_district` VALUES ('701', '嫩江县', '70');
INSERT INTO `mr_district` VALUES ('702', '逊克县', '70');
INSERT INTO `mr_district` VALUES ('703', '孙吴县', '70');
INSERT INTO `mr_district` VALUES ('704', '北安市', '70');
INSERT INTO `mr_district` VALUES ('705', '五大连池市', '70');
INSERT INTO `mr_district` VALUES ('706', '北林区', '71');
INSERT INTO `mr_district` VALUES ('707', '望奎县', '71');
INSERT INTO `mr_district` VALUES ('708', '兰西县', '71');
INSERT INTO `mr_district` VALUES ('709', '青冈县', '71');
INSERT INTO `mr_district` VALUES ('710', '庆安县', '71');
INSERT INTO `mr_district` VALUES ('711', '明水县', '71');
INSERT INTO `mr_district` VALUES ('712', '绥棱县', '71');
INSERT INTO `mr_district` VALUES ('713', '安达市', '71');
INSERT INTO `mr_district` VALUES ('714', '肇东市', '71');
INSERT INTO `mr_district` VALUES ('715', '海伦市', '71');
INSERT INTO `mr_district` VALUES ('716', '呼玛县', '72');
INSERT INTO `mr_district` VALUES ('717', '塔河县', '72');
INSERT INTO `mr_district` VALUES ('718', '漠河县', '72');
INSERT INTO `mr_district` VALUES ('719', '黄浦区', '73');
INSERT INTO `mr_district` VALUES ('720', '卢湾区', '73');
INSERT INTO `mr_district` VALUES ('721', '徐汇区', '73');
INSERT INTO `mr_district` VALUES ('722', '长宁区', '73');
INSERT INTO `mr_district` VALUES ('723', '静安区', '73');
INSERT INTO `mr_district` VALUES ('724', '普陀区', '73');
INSERT INTO `mr_district` VALUES ('725', '闸北区', '73');
INSERT INTO `mr_district` VALUES ('726', '虹口区', '73');
INSERT INTO `mr_district` VALUES ('727', '杨浦区', '73');
INSERT INTO `mr_district` VALUES ('728', '闵行区', '73');
INSERT INTO `mr_district` VALUES ('729', '宝山区', '73');
INSERT INTO `mr_district` VALUES ('730', '嘉定区', '73');
INSERT INTO `mr_district` VALUES ('731', '浦东新区', '73');
INSERT INTO `mr_district` VALUES ('732', '金山区', '73');
INSERT INTO `mr_district` VALUES ('733', '松江区', '73');
INSERT INTO `mr_district` VALUES ('734', '青浦区', '73');
INSERT INTO `mr_district` VALUES ('735', '南汇区', '73');
INSERT INTO `mr_district` VALUES ('736', '奉贤区', '73');
INSERT INTO `mr_district` VALUES ('737', '崇明县', '73');
INSERT INTO `mr_district` VALUES ('738', '玄武区', '74');
INSERT INTO `mr_district` VALUES ('739', '白下区', '74');
INSERT INTO `mr_district` VALUES ('740', '秦淮区', '74');
INSERT INTO `mr_district` VALUES ('741', '建邺区', '74');
INSERT INTO `mr_district` VALUES ('742', '鼓楼区', '74');
INSERT INTO `mr_district` VALUES ('743', '下关区', '74');
INSERT INTO `mr_district` VALUES ('744', '浦口区', '74');
INSERT INTO `mr_district` VALUES ('745', '栖霞区', '74');
INSERT INTO `mr_district` VALUES ('746', '雨花台区', '74');
INSERT INTO `mr_district` VALUES ('747', '江宁区', '74');
INSERT INTO `mr_district` VALUES ('748', '六合区', '74');
INSERT INTO `mr_district` VALUES ('749', '溧水县', '74');
INSERT INTO `mr_district` VALUES ('750', '高淳县', '74');
INSERT INTO `mr_district` VALUES ('751', '崇安区', '75');
INSERT INTO `mr_district` VALUES ('752', '南长区', '75');
INSERT INTO `mr_district` VALUES ('753', '北塘区', '75');
INSERT INTO `mr_district` VALUES ('754', '锡山区', '75');
INSERT INTO `mr_district` VALUES ('755', '惠山区', '75');
INSERT INTO `mr_district` VALUES ('756', '滨湖区', '75');
INSERT INTO `mr_district` VALUES ('757', '江阴市', '75');
INSERT INTO `mr_district` VALUES ('758', '宜兴市', '75');
INSERT INTO `mr_district` VALUES ('759', '鼓楼区', '76');
INSERT INTO `mr_district` VALUES ('760', '云龙区', '76');
INSERT INTO `mr_district` VALUES ('761', '九里区', '76');
INSERT INTO `mr_district` VALUES ('762', '贾汪区', '76');
INSERT INTO `mr_district` VALUES ('763', '泉山区', '76');
INSERT INTO `mr_district` VALUES ('764', '丰县', '76');
INSERT INTO `mr_district` VALUES ('765', '沛县', '76');
INSERT INTO `mr_district` VALUES ('766', '铜山县', '76');
INSERT INTO `mr_district` VALUES ('767', '睢宁县', '76');
INSERT INTO `mr_district` VALUES ('768', '新沂市', '76');
INSERT INTO `mr_district` VALUES ('769', '邳州市', '76');
INSERT INTO `mr_district` VALUES ('770', '天宁区', '77');
INSERT INTO `mr_district` VALUES ('771', '钟楼区', '77');
INSERT INTO `mr_district` VALUES ('772', '戚墅堰区', '77');
INSERT INTO `mr_district` VALUES ('773', '新北区', '77');
INSERT INTO `mr_district` VALUES ('774', '武进区', '77');
INSERT INTO `mr_district` VALUES ('775', '溧阳市', '77');
INSERT INTO `mr_district` VALUES ('776', '金坛市', '77');
INSERT INTO `mr_district` VALUES ('777', '沧浪区', '78');
INSERT INTO `mr_district` VALUES ('778', '平江区', '78');
INSERT INTO `mr_district` VALUES ('779', '金阊区', '78');
INSERT INTO `mr_district` VALUES ('780', '虎丘区', '78');
INSERT INTO `mr_district` VALUES ('781', '吴中区', '78');
INSERT INTO `mr_district` VALUES ('782', '相城区', '78');
INSERT INTO `mr_district` VALUES ('783', '常熟市', '78');
INSERT INTO `mr_district` VALUES ('784', '张家港市', '78');
INSERT INTO `mr_district` VALUES ('785', '昆山市', '78');
INSERT INTO `mr_district` VALUES ('786', '吴江市', '78');
INSERT INTO `mr_district` VALUES ('787', '太仓市', '78');
INSERT INTO `mr_district` VALUES ('788', '崇川区', '79');
INSERT INTO `mr_district` VALUES ('789', '港闸区', '79');
INSERT INTO `mr_district` VALUES ('790', '海安县', '79');
INSERT INTO `mr_district` VALUES ('791', '如东县', '79');
INSERT INTO `mr_district` VALUES ('792', '启东市', '79');
INSERT INTO `mr_district` VALUES ('793', '如皋市', '79');
INSERT INTO `mr_district` VALUES ('794', '通州市', '79');
INSERT INTO `mr_district` VALUES ('795', '海门市', '79');
INSERT INTO `mr_district` VALUES ('796', '连云区', '80');
INSERT INTO `mr_district` VALUES ('797', '新浦区', '80');
INSERT INTO `mr_district` VALUES ('798', '海州区', '80');
INSERT INTO `mr_district` VALUES ('799', '赣榆县', '80');
INSERT INTO `mr_district` VALUES ('800', '东海县', '80');
INSERT INTO `mr_district` VALUES ('801', '灌云县', '80');
INSERT INTO `mr_district` VALUES ('802', '灌南县', '80');
INSERT INTO `mr_district` VALUES ('803', '清河区', '81');
INSERT INTO `mr_district` VALUES ('804', '楚州区', '81');
INSERT INTO `mr_district` VALUES ('805', '淮阴区', '81');
INSERT INTO `mr_district` VALUES ('806', '清浦区', '81');
INSERT INTO `mr_district` VALUES ('807', '涟水县', '81');
INSERT INTO `mr_district` VALUES ('808', '洪泽县', '81');
INSERT INTO `mr_district` VALUES ('809', '盱眙县', '81');
INSERT INTO `mr_district` VALUES ('810', '金湖县', '81');
INSERT INTO `mr_district` VALUES ('811', '亭湖区', '82');
INSERT INTO `mr_district` VALUES ('812', '盐都区', '82');
INSERT INTO `mr_district` VALUES ('813', '响水县', '82');
INSERT INTO `mr_district` VALUES ('814', '滨海县', '82');
INSERT INTO `mr_district` VALUES ('815', '阜宁县', '82');
INSERT INTO `mr_district` VALUES ('816', '射阳县', '82');
INSERT INTO `mr_district` VALUES ('817', '建湖县', '82');
INSERT INTO `mr_district` VALUES ('818', '东台市', '82');
INSERT INTO `mr_district` VALUES ('819', '大丰市', '82');
INSERT INTO `mr_district` VALUES ('820', '广陵区', '83');
INSERT INTO `mr_district` VALUES ('821', '邗江区', '83');
INSERT INTO `mr_district` VALUES ('822', '维扬区', '83');
INSERT INTO `mr_district` VALUES ('823', '宝应县', '83');
INSERT INTO `mr_district` VALUES ('824', '仪征市', '83');
INSERT INTO `mr_district` VALUES ('825', '高邮市', '83');
INSERT INTO `mr_district` VALUES ('826', '江都市', '83');
INSERT INTO `mr_district` VALUES ('827', '京口区', '84');
INSERT INTO `mr_district` VALUES ('828', '润州区', '84');
INSERT INTO `mr_district` VALUES ('829', '丹徒区', '84');
INSERT INTO `mr_district` VALUES ('830', '丹阳市', '84');
INSERT INTO `mr_district` VALUES ('831', '扬中市', '84');
INSERT INTO `mr_district` VALUES ('832', '句容市', '84');
INSERT INTO `mr_district` VALUES ('833', '海陵区', '85');
INSERT INTO `mr_district` VALUES ('834', '高港区', '85');
INSERT INTO `mr_district` VALUES ('835', '兴化市', '85');
INSERT INTO `mr_district` VALUES ('836', '靖江市', '85');
INSERT INTO `mr_district` VALUES ('837', '泰兴市', '85');
INSERT INTO `mr_district` VALUES ('838', '姜堰市', '85');
INSERT INTO `mr_district` VALUES ('839', '宿城区', '86');
INSERT INTO `mr_district` VALUES ('840', '宿豫区', '86');
INSERT INTO `mr_district` VALUES ('841', '沭阳县', '86');
INSERT INTO `mr_district` VALUES ('842', '泗阳县', '86');
INSERT INTO `mr_district` VALUES ('843', '泗洪县', '86');
INSERT INTO `mr_district` VALUES ('844', '上城区', '87');
INSERT INTO `mr_district` VALUES ('845', '下城区', '87');
INSERT INTO `mr_district` VALUES ('846', '江干区', '87');
INSERT INTO `mr_district` VALUES ('847', '拱墅区', '87');
INSERT INTO `mr_district` VALUES ('848', '西湖区', '87');
INSERT INTO `mr_district` VALUES ('849', '滨江区', '87');
INSERT INTO `mr_district` VALUES ('850', '萧山区', '87');
INSERT INTO `mr_district` VALUES ('851', '余杭区', '87');
INSERT INTO `mr_district` VALUES ('852', '桐庐县', '87');
INSERT INTO `mr_district` VALUES ('853', '淳安县', '87');
INSERT INTO `mr_district` VALUES ('854', '建德市', '87');
INSERT INTO `mr_district` VALUES ('855', '富阳市', '87');
INSERT INTO `mr_district` VALUES ('856', '临安市', '87');
INSERT INTO `mr_district` VALUES ('857', '海曙区', '88');
INSERT INTO `mr_district` VALUES ('858', '江东区', '88');
INSERT INTO `mr_district` VALUES ('859', '江北区', '88');
INSERT INTO `mr_district` VALUES ('860', '北仑区', '88');
INSERT INTO `mr_district` VALUES ('861', '镇海区', '88');
INSERT INTO `mr_district` VALUES ('862', '鄞州区', '88');
INSERT INTO `mr_district` VALUES ('863', '象山县', '88');
INSERT INTO `mr_district` VALUES ('864', '宁海县', '88');
INSERT INTO `mr_district` VALUES ('865', '余姚市', '88');
INSERT INTO `mr_district` VALUES ('866', '慈溪市', '88');
INSERT INTO `mr_district` VALUES ('867', '奉化市', '88');
INSERT INTO `mr_district` VALUES ('868', '鹿城区', '89');
INSERT INTO `mr_district` VALUES ('869', '龙湾区', '89');
INSERT INTO `mr_district` VALUES ('870', '瓯海区', '89');
INSERT INTO `mr_district` VALUES ('871', '洞头县', '89');
INSERT INTO `mr_district` VALUES ('872', '永嘉县', '89');
INSERT INTO `mr_district` VALUES ('873', '平阳县', '89');
INSERT INTO `mr_district` VALUES ('874', '苍南县', '89');
INSERT INTO `mr_district` VALUES ('875', '文成县', '89');
INSERT INTO `mr_district` VALUES ('876', '泰顺县', '89');
INSERT INTO `mr_district` VALUES ('877', '瑞安市', '89');
INSERT INTO `mr_district` VALUES ('878', '乐清市', '89');
INSERT INTO `mr_district` VALUES ('879', '秀城区', '90');
INSERT INTO `mr_district` VALUES ('880', '秀洲区', '90');
INSERT INTO `mr_district` VALUES ('881', '嘉善县', '90');
INSERT INTO `mr_district` VALUES ('882', '海盐县', '90');
INSERT INTO `mr_district` VALUES ('883', '海宁市', '90');
INSERT INTO `mr_district` VALUES ('884', '平湖市', '90');
INSERT INTO `mr_district` VALUES ('885', '桐乡市', '90');
INSERT INTO `mr_district` VALUES ('886', '吴兴区', '91');
INSERT INTO `mr_district` VALUES ('887', '南浔区', '91');
INSERT INTO `mr_district` VALUES ('888', '德清县', '91');
INSERT INTO `mr_district` VALUES ('889', '长兴县', '91');
INSERT INTO `mr_district` VALUES ('890', '安吉县', '91');
INSERT INTO `mr_district` VALUES ('891', '越城区', '92');
INSERT INTO `mr_district` VALUES ('892', '绍兴县', '92');
INSERT INTO `mr_district` VALUES ('893', '新昌县', '92');
INSERT INTO `mr_district` VALUES ('894', '诸暨市', '92');
INSERT INTO `mr_district` VALUES ('895', '上虞市', '92');
INSERT INTO `mr_district` VALUES ('896', '嵊州市', '92');
INSERT INTO `mr_district` VALUES ('897', '婺城区', '93');
INSERT INTO `mr_district` VALUES ('898', '金东区', '93');
INSERT INTO `mr_district` VALUES ('899', '武义县', '93');
INSERT INTO `mr_district` VALUES ('900', '浦江县', '93');
INSERT INTO `mr_district` VALUES ('901', '磐安县', '93');
INSERT INTO `mr_district` VALUES ('902', '兰溪市', '93');
INSERT INTO `mr_district` VALUES ('903', '义乌市', '93');
INSERT INTO `mr_district` VALUES ('904', '东阳市', '93');
INSERT INTO `mr_district` VALUES ('905', '永康市', '93');
INSERT INTO `mr_district` VALUES ('906', '柯城区', '94');
INSERT INTO `mr_district` VALUES ('907', '衢江区', '94');
INSERT INTO `mr_district` VALUES ('908', '常山县', '94');
INSERT INTO `mr_district` VALUES ('909', '开化县', '94');
INSERT INTO `mr_district` VALUES ('910', '龙游县', '94');
INSERT INTO `mr_district` VALUES ('911', '江山市', '94');
INSERT INTO `mr_district` VALUES ('912', '定海区', '95');
INSERT INTO `mr_district` VALUES ('913', '普陀区', '95');
INSERT INTO `mr_district` VALUES ('914', '岱山县', '95');
INSERT INTO `mr_district` VALUES ('915', '嵊泗县', '95');
INSERT INTO `mr_district` VALUES ('916', '椒江区', '96');
INSERT INTO `mr_district` VALUES ('917', '黄岩区', '96');
INSERT INTO `mr_district` VALUES ('918', '路桥区', '96');
INSERT INTO `mr_district` VALUES ('919', '玉环县', '96');
INSERT INTO `mr_district` VALUES ('920', '三门县', '96');
INSERT INTO `mr_district` VALUES ('921', '天台县', '96');
INSERT INTO `mr_district` VALUES ('922', '仙居县', '96');
INSERT INTO `mr_district` VALUES ('923', '温岭市', '96');
INSERT INTO `mr_district` VALUES ('924', '临海市', '96');
INSERT INTO `mr_district` VALUES ('925', '莲都区', '97');
INSERT INTO `mr_district` VALUES ('926', '青田县', '97');
INSERT INTO `mr_district` VALUES ('927', '缙云县', '97');
INSERT INTO `mr_district` VALUES ('928', '遂昌县', '97');
INSERT INTO `mr_district` VALUES ('929', '松阳县', '97');
INSERT INTO `mr_district` VALUES ('930', '云和县', '97');
INSERT INTO `mr_district` VALUES ('931', '庆元县', '97');
INSERT INTO `mr_district` VALUES ('932', '景宁畲族自治县', '97');
INSERT INTO `mr_district` VALUES ('933', '龙泉市', '97');
INSERT INTO `mr_district` VALUES ('934', '瑶海区', '98');
INSERT INTO `mr_district` VALUES ('935', '庐阳区', '98');
INSERT INTO `mr_district` VALUES ('936', '蜀山区', '98');
INSERT INTO `mr_district` VALUES ('937', '包河区', '98');
INSERT INTO `mr_district` VALUES ('938', '长丰县', '98');
INSERT INTO `mr_district` VALUES ('939', '肥东县', '98');
INSERT INTO `mr_district` VALUES ('940', '肥西县', '98');
INSERT INTO `mr_district` VALUES ('941', '镜湖区', '99');
INSERT INTO `mr_district` VALUES ('942', '马塘区', '99');
INSERT INTO `mr_district` VALUES ('943', '新芜区', '99');
INSERT INTO `mr_district` VALUES ('944', '鸠江区', '99');
INSERT INTO `mr_district` VALUES ('945', '芜湖县', '99');
INSERT INTO `mr_district` VALUES ('946', '繁昌县', '99');
INSERT INTO `mr_district` VALUES ('947', '南陵县', '99');
INSERT INTO `mr_district` VALUES ('948', '龙子湖区', '100');
INSERT INTO `mr_district` VALUES ('949', '蚌山区', '100');
INSERT INTO `mr_district` VALUES ('950', '禹会区', '100');
INSERT INTO `mr_district` VALUES ('951', '淮上区', '100');
INSERT INTO `mr_district` VALUES ('952', '怀远县', '100');
INSERT INTO `mr_district` VALUES ('953', '五河县', '100');
INSERT INTO `mr_district` VALUES ('954', '固镇县', '100');
INSERT INTO `mr_district` VALUES ('955', '大通区', '101');
INSERT INTO `mr_district` VALUES ('956', '田家庵区', '101');
INSERT INTO `mr_district` VALUES ('957', '谢家集区', '101');
INSERT INTO `mr_district` VALUES ('958', '八公山区', '101');
INSERT INTO `mr_district` VALUES ('959', '潘集区', '101');
INSERT INTO `mr_district` VALUES ('960', '凤台县', '101');
INSERT INTO `mr_district` VALUES ('961', '金家庄区', '102');
INSERT INTO `mr_district` VALUES ('962', '花山区', '102');
INSERT INTO `mr_district` VALUES ('963', '雨山区', '102');
INSERT INTO `mr_district` VALUES ('964', '当涂县', '102');
INSERT INTO `mr_district` VALUES ('965', '杜集区', '103');
INSERT INTO `mr_district` VALUES ('966', '相山区', '103');
INSERT INTO `mr_district` VALUES ('967', '烈山区', '103');
INSERT INTO `mr_district` VALUES ('968', '濉溪县', '103');
INSERT INTO `mr_district` VALUES ('969', '铜官山区', '104');
INSERT INTO `mr_district` VALUES ('970', '狮子山区', '104');
INSERT INTO `mr_district` VALUES ('971', '郊区', '104');
INSERT INTO `mr_district` VALUES ('972', '铜陵县', '104');
INSERT INTO `mr_district` VALUES ('973', '迎江区', '105');
INSERT INTO `mr_district` VALUES ('974', '大观区', '105');
INSERT INTO `mr_district` VALUES ('975', '郊区', '105');
INSERT INTO `mr_district` VALUES ('976', '怀宁县', '105');
INSERT INTO `mr_district` VALUES ('977', '枞阳县', '105');
INSERT INTO `mr_district` VALUES ('978', '潜山县', '105');
INSERT INTO `mr_district` VALUES ('979', '太湖县', '105');
INSERT INTO `mr_district` VALUES ('980', '宿松县', '105');
INSERT INTO `mr_district` VALUES ('981', '望江县', '105');
INSERT INTO `mr_district` VALUES ('982', '岳西县', '105');
INSERT INTO `mr_district` VALUES ('983', '桐城市', '105');
INSERT INTO `mr_district` VALUES ('984', '屯溪区', '106');
INSERT INTO `mr_district` VALUES ('985', '黄山区', '106');
INSERT INTO `mr_district` VALUES ('986', '徽州区', '106');
INSERT INTO `mr_district` VALUES ('987', '歙县', '106');
INSERT INTO `mr_district` VALUES ('988', '休宁县', '106');
INSERT INTO `mr_district` VALUES ('989', '黟县', '106');
INSERT INTO `mr_district` VALUES ('990', '祁门县', '106');
INSERT INTO `mr_district` VALUES ('991', '琅琊区', '107');
INSERT INTO `mr_district` VALUES ('992', '南谯区', '107');
INSERT INTO `mr_district` VALUES ('993', '来安县', '107');
INSERT INTO `mr_district` VALUES ('994', '全椒县', '107');
INSERT INTO `mr_district` VALUES ('995', '定远县', '107');
INSERT INTO `mr_district` VALUES ('996', '凤阳县', '107');
INSERT INTO `mr_district` VALUES ('997', '天长市', '107');
INSERT INTO `mr_district` VALUES ('998', '明光市', '107');
INSERT INTO `mr_district` VALUES ('999', '颍州区', '108');
INSERT INTO `mr_district` VALUES ('1000', '颍东区', '108');
INSERT INTO `mr_district` VALUES ('1001', '颍泉区', '108');
INSERT INTO `mr_district` VALUES ('1002', '临泉县', '108');
INSERT INTO `mr_district` VALUES ('1003', '太和县', '108');
INSERT INTO `mr_district` VALUES ('1004', '阜南县', '108');
INSERT INTO `mr_district` VALUES ('1005', '颍上县', '108');
INSERT INTO `mr_district` VALUES ('1006', '界首市', '108');
INSERT INTO `mr_district` VALUES ('1007', '埇桥区', '109');
INSERT INTO `mr_district` VALUES ('1008', '砀山县', '109');
INSERT INTO `mr_district` VALUES ('1009', '萧县', '109');
INSERT INTO `mr_district` VALUES ('1010', '灵璧县', '109');
INSERT INTO `mr_district` VALUES ('1011', '泗县', '109');
INSERT INTO `mr_district` VALUES ('1012', '居巢区', '110');
INSERT INTO `mr_district` VALUES ('1013', '庐江县', '110');
INSERT INTO `mr_district` VALUES ('1014', '无为县', '110');
INSERT INTO `mr_district` VALUES ('1015', '含山县', '110');
INSERT INTO `mr_district` VALUES ('1016', '和县', '110');
INSERT INTO `mr_district` VALUES ('1017', '金安区', '111');
INSERT INTO `mr_district` VALUES ('1018', '裕安区', '111');
INSERT INTO `mr_district` VALUES ('1019', '寿县', '111');
INSERT INTO `mr_district` VALUES ('1020', '霍邱县', '111');
INSERT INTO `mr_district` VALUES ('1021', '舒城县', '111');
INSERT INTO `mr_district` VALUES ('1022', '金寨县', '111');
INSERT INTO `mr_district` VALUES ('1023', '霍山县', '111');
INSERT INTO `mr_district` VALUES ('1024', '谯城区', '112');
INSERT INTO `mr_district` VALUES ('1025', '涡阳县', '112');
INSERT INTO `mr_district` VALUES ('1026', '蒙城县', '112');
INSERT INTO `mr_district` VALUES ('1027', '利辛县', '112');
INSERT INTO `mr_district` VALUES ('1028', '贵池区', '113');
INSERT INTO `mr_district` VALUES ('1029', '东至县', '113');
INSERT INTO `mr_district` VALUES ('1030', '石台县', '113');
INSERT INTO `mr_district` VALUES ('1031', '青阳县', '113');
INSERT INTO `mr_district` VALUES ('1032', '宣州区', '114');
INSERT INTO `mr_district` VALUES ('1033', '郎溪县', '114');
INSERT INTO `mr_district` VALUES ('1034', '广德县', '114');
INSERT INTO `mr_district` VALUES ('1035', '泾县', '114');
INSERT INTO `mr_district` VALUES ('1036', '绩溪县', '114');
INSERT INTO `mr_district` VALUES ('1037', '旌德县', '114');
INSERT INTO `mr_district` VALUES ('1038', '宁国市', '114');
INSERT INTO `mr_district` VALUES ('1039', '鼓楼区', '115');
INSERT INTO `mr_district` VALUES ('1040', '台江区', '115');
INSERT INTO `mr_district` VALUES ('1041', '仓山区', '115');
INSERT INTO `mr_district` VALUES ('1042', '马尾区', '115');
INSERT INTO `mr_district` VALUES ('1043', '晋安区', '115');
INSERT INTO `mr_district` VALUES ('1044', '闽侯县', '115');
INSERT INTO `mr_district` VALUES ('1045', '连江县', '115');
INSERT INTO `mr_district` VALUES ('1046', '罗源县', '115');
INSERT INTO `mr_district` VALUES ('1047', '闽清县', '115');
INSERT INTO `mr_district` VALUES ('1048', '永泰县', '115');
INSERT INTO `mr_district` VALUES ('1049', '平潭县', '115');
INSERT INTO `mr_district` VALUES ('1050', '福清市', '115');
INSERT INTO `mr_district` VALUES ('1051', '长乐市', '115');
INSERT INTO `mr_district` VALUES ('1052', '思明区', '116');
INSERT INTO `mr_district` VALUES ('1053', '海沧区', '116');
INSERT INTO `mr_district` VALUES ('1054', '湖里区', '116');
INSERT INTO `mr_district` VALUES ('1055', '集美区', '116');
INSERT INTO `mr_district` VALUES ('1056', '同安区', '116');
INSERT INTO `mr_district` VALUES ('1057', '翔安区', '116');
INSERT INTO `mr_district` VALUES ('1058', '城厢区', '117');
INSERT INTO `mr_district` VALUES ('1059', '涵江区', '117');
INSERT INTO `mr_district` VALUES ('1060', '荔城区', '117');
INSERT INTO `mr_district` VALUES ('1061', '秀屿区', '117');
INSERT INTO `mr_district` VALUES ('1062', '仙游县', '117');
INSERT INTO `mr_district` VALUES ('1063', '梅列区', '118');
INSERT INTO `mr_district` VALUES ('1064', '三元区', '118');
INSERT INTO `mr_district` VALUES ('1065', '明溪县', '118');
INSERT INTO `mr_district` VALUES ('1066', '清流县', '118');
INSERT INTO `mr_district` VALUES ('1067', '宁化县', '118');
INSERT INTO `mr_district` VALUES ('1068', '大田县', '118');
INSERT INTO `mr_district` VALUES ('1069', '尤溪县', '118');
INSERT INTO `mr_district` VALUES ('1070', '沙县', '118');
INSERT INTO `mr_district` VALUES ('1071', '将乐县', '118');
INSERT INTO `mr_district` VALUES ('1072', '泰宁县', '118');
INSERT INTO `mr_district` VALUES ('1073', '建宁县', '118');
INSERT INTO `mr_district` VALUES ('1074', '永安市', '118');
INSERT INTO `mr_district` VALUES ('1075', '鲤城区', '119');
INSERT INTO `mr_district` VALUES ('1076', '丰泽区', '119');
INSERT INTO `mr_district` VALUES ('1077', '洛江区', '119');
INSERT INTO `mr_district` VALUES ('1078', '泉港区', '119');
INSERT INTO `mr_district` VALUES ('1079', '惠安县', '119');
INSERT INTO `mr_district` VALUES ('1080', '安溪县', '119');
INSERT INTO `mr_district` VALUES ('1081', '永春县', '119');
INSERT INTO `mr_district` VALUES ('1082', '德化县', '119');
INSERT INTO `mr_district` VALUES ('1083', '金门县', '119');
INSERT INTO `mr_district` VALUES ('1084', '石狮市', '119');
INSERT INTO `mr_district` VALUES ('1085', '晋江市', '119');
INSERT INTO `mr_district` VALUES ('1086', '南安市', '119');
INSERT INTO `mr_district` VALUES ('1087', '芗城区', '120');
INSERT INTO `mr_district` VALUES ('1088', '龙文区', '120');
INSERT INTO `mr_district` VALUES ('1089', '云霄县', '120');
INSERT INTO `mr_district` VALUES ('1090', '漳浦县', '120');
INSERT INTO `mr_district` VALUES ('1091', '诏安县', '120');
INSERT INTO `mr_district` VALUES ('1092', '长泰县', '120');
INSERT INTO `mr_district` VALUES ('1093', '东山县', '120');
INSERT INTO `mr_district` VALUES ('1094', '南靖县', '120');
INSERT INTO `mr_district` VALUES ('1095', '平和县', '120');
INSERT INTO `mr_district` VALUES ('1096', '华安县', '120');
INSERT INTO `mr_district` VALUES ('1097', '龙海市', '120');
INSERT INTO `mr_district` VALUES ('1098', '延平区', '121');
INSERT INTO `mr_district` VALUES ('1099', '顺昌县', '121');
INSERT INTO `mr_district` VALUES ('1100', '浦城县', '121');
INSERT INTO `mr_district` VALUES ('1101', '光泽县', '121');
INSERT INTO `mr_district` VALUES ('1102', '松溪县', '121');
INSERT INTO `mr_district` VALUES ('1103', '政和县', '121');
INSERT INTO `mr_district` VALUES ('1104', '邵武市', '121');
INSERT INTO `mr_district` VALUES ('1105', '武夷山市', '121');
INSERT INTO `mr_district` VALUES ('1106', '建瓯市', '121');
INSERT INTO `mr_district` VALUES ('1107', '建阳市', '121');
INSERT INTO `mr_district` VALUES ('1108', '新罗区', '122');
INSERT INTO `mr_district` VALUES ('1109', '长汀县', '122');
INSERT INTO `mr_district` VALUES ('1110', '永定县', '122');
INSERT INTO `mr_district` VALUES ('1111', '上杭县', '122');
INSERT INTO `mr_district` VALUES ('1112', '武平县', '122');
INSERT INTO `mr_district` VALUES ('1113', '连城县', '122');
INSERT INTO `mr_district` VALUES ('1114', '漳平市', '122');
INSERT INTO `mr_district` VALUES ('1115', '蕉城区', '123');
INSERT INTO `mr_district` VALUES ('1116', '霞浦县', '123');
INSERT INTO `mr_district` VALUES ('1117', '古田县', '123');
INSERT INTO `mr_district` VALUES ('1118', '屏南县', '123');
INSERT INTO `mr_district` VALUES ('1119', '寿宁县', '123');
INSERT INTO `mr_district` VALUES ('1120', '周宁县', '123');
INSERT INTO `mr_district` VALUES ('1121', '柘荣县', '123');
INSERT INTO `mr_district` VALUES ('1122', '福安市', '123');
INSERT INTO `mr_district` VALUES ('1123', '福鼎市', '123');
INSERT INTO `mr_district` VALUES ('1124', '东湖区', '124');
INSERT INTO `mr_district` VALUES ('1125', '西湖区', '124');
INSERT INTO `mr_district` VALUES ('1126', '青云谱区', '124');
INSERT INTO `mr_district` VALUES ('1127', '湾里区', '124');
INSERT INTO `mr_district` VALUES ('1128', '青山湖区', '124');
INSERT INTO `mr_district` VALUES ('1129', '南昌县', '124');
INSERT INTO `mr_district` VALUES ('1130', '新建县', '124');
INSERT INTO `mr_district` VALUES ('1131', '安义县', '124');
INSERT INTO `mr_district` VALUES ('1132', '进贤县', '124');
INSERT INTO `mr_district` VALUES ('1133', '昌江区', '125');
INSERT INTO `mr_district` VALUES ('1134', '珠山区', '125');
INSERT INTO `mr_district` VALUES ('1135', '浮梁县', '125');
INSERT INTO `mr_district` VALUES ('1136', '乐平市', '125');
INSERT INTO `mr_district` VALUES ('1137', '安源区', '126');
INSERT INTO `mr_district` VALUES ('1138', '湘东区', '126');
INSERT INTO `mr_district` VALUES ('1139', '莲花县', '126');
INSERT INTO `mr_district` VALUES ('1140', '上栗县', '126');
INSERT INTO `mr_district` VALUES ('1141', '芦溪县', '126');
INSERT INTO `mr_district` VALUES ('1142', '庐山区', '127');
INSERT INTO `mr_district` VALUES ('1143', '浔阳区', '127');
INSERT INTO `mr_district` VALUES ('1144', '九江县', '127');
INSERT INTO `mr_district` VALUES ('1145', '武宁县', '127');
INSERT INTO `mr_district` VALUES ('1146', '修水县', '127');
INSERT INTO `mr_district` VALUES ('1147', '永修县', '127');
INSERT INTO `mr_district` VALUES ('1148', '德安县', '127');
INSERT INTO `mr_district` VALUES ('1149', '星子县', '127');
INSERT INTO `mr_district` VALUES ('1150', '都昌县', '127');
INSERT INTO `mr_district` VALUES ('1151', '湖口县', '127');
INSERT INTO `mr_district` VALUES ('1152', '彭泽县', '127');
INSERT INTO `mr_district` VALUES ('1153', '瑞昌市', '127');
INSERT INTO `mr_district` VALUES ('1154', '渝水区', '128');
INSERT INTO `mr_district` VALUES ('1155', '分宜县', '128');
INSERT INTO `mr_district` VALUES ('1156', '月湖区', '129');
INSERT INTO `mr_district` VALUES ('1157', '余江县', '129');
INSERT INTO `mr_district` VALUES ('1158', '贵溪市', '129');
INSERT INTO `mr_district` VALUES ('1159', '章贡区', '130');
INSERT INTO `mr_district` VALUES ('1160', '赣县', '130');
INSERT INTO `mr_district` VALUES ('1161', '信丰县', '130');
INSERT INTO `mr_district` VALUES ('1162', '大余县', '130');
INSERT INTO `mr_district` VALUES ('1163', '上犹县', '130');
INSERT INTO `mr_district` VALUES ('1164', '崇义县', '130');
INSERT INTO `mr_district` VALUES ('1165', '安远县', '130');
INSERT INTO `mr_district` VALUES ('1166', '龙南县', '130');
INSERT INTO `mr_district` VALUES ('1167', '定南县', '130');
INSERT INTO `mr_district` VALUES ('1168', '全南县', '130');
INSERT INTO `mr_district` VALUES ('1169', '宁都县', '130');
INSERT INTO `mr_district` VALUES ('1170', '于都县', '130');
INSERT INTO `mr_district` VALUES ('1171', '兴国县', '130');
INSERT INTO `mr_district` VALUES ('1172', '会昌县', '130');
INSERT INTO `mr_district` VALUES ('1173', '寻乌县', '130');
INSERT INTO `mr_district` VALUES ('1174', '石城县', '130');
INSERT INTO `mr_district` VALUES ('1175', '瑞金市', '130');
INSERT INTO `mr_district` VALUES ('1176', '南康市', '130');
INSERT INTO `mr_district` VALUES ('1177', '吉州区', '131');
INSERT INTO `mr_district` VALUES ('1178', '青原区', '131');
INSERT INTO `mr_district` VALUES ('1179', '吉安县', '131');
INSERT INTO `mr_district` VALUES ('1180', '吉水县', '131');
INSERT INTO `mr_district` VALUES ('1181', '峡江县', '131');
INSERT INTO `mr_district` VALUES ('1182', '新干县', '131');
INSERT INTO `mr_district` VALUES ('1183', '永丰县', '131');
INSERT INTO `mr_district` VALUES ('1184', '泰和县', '131');
INSERT INTO `mr_district` VALUES ('1185', '遂川县', '131');
INSERT INTO `mr_district` VALUES ('1186', '万安县', '131');
INSERT INTO `mr_district` VALUES ('1187', '安福县', '131');
INSERT INTO `mr_district` VALUES ('1188', '永新县', '131');
INSERT INTO `mr_district` VALUES ('1189', '井冈山市', '131');
INSERT INTO `mr_district` VALUES ('1190', '袁州区', '132');
INSERT INTO `mr_district` VALUES ('1191', '奉新县', '132');
INSERT INTO `mr_district` VALUES ('1192', '万载县', '132');
INSERT INTO `mr_district` VALUES ('1193', '上高县', '132');
INSERT INTO `mr_district` VALUES ('1194', '宜丰县', '132');
INSERT INTO `mr_district` VALUES ('1195', '靖安县', '132');
INSERT INTO `mr_district` VALUES ('1196', '铜鼓县', '132');
INSERT INTO `mr_district` VALUES ('1197', '丰城市', '132');
INSERT INTO `mr_district` VALUES ('1198', '樟树市', '132');
INSERT INTO `mr_district` VALUES ('1199', '高安市', '132');
INSERT INTO `mr_district` VALUES ('1200', '临川区', '133');
INSERT INTO `mr_district` VALUES ('1201', '南城县', '133');
INSERT INTO `mr_district` VALUES ('1202', '黎川县', '133');
INSERT INTO `mr_district` VALUES ('1203', '南丰县', '133');
INSERT INTO `mr_district` VALUES ('1204', '崇仁县', '133');
INSERT INTO `mr_district` VALUES ('1205', '乐安县', '133');
INSERT INTO `mr_district` VALUES ('1206', '宜黄县', '133');
INSERT INTO `mr_district` VALUES ('1207', '金溪县', '133');
INSERT INTO `mr_district` VALUES ('1208', '资溪县', '133');
INSERT INTO `mr_district` VALUES ('1209', '东乡县', '133');
INSERT INTO `mr_district` VALUES ('1210', '广昌县', '133');
INSERT INTO `mr_district` VALUES ('1211', '信州区', '134');
INSERT INTO `mr_district` VALUES ('1212', '上饶县', '134');
INSERT INTO `mr_district` VALUES ('1213', '广丰县', '134');
INSERT INTO `mr_district` VALUES ('1214', '玉山县', '134');
INSERT INTO `mr_district` VALUES ('1215', '铅山县', '134');
INSERT INTO `mr_district` VALUES ('1216', '横峰县', '134');
INSERT INTO `mr_district` VALUES ('1217', '弋阳县', '134');
INSERT INTO `mr_district` VALUES ('1218', '余干县', '134');
INSERT INTO `mr_district` VALUES ('1219', '鄱阳县', '134');
INSERT INTO `mr_district` VALUES ('1220', '万年县', '134');
INSERT INTO `mr_district` VALUES ('1221', '婺源县', '134');
INSERT INTO `mr_district` VALUES ('1222', '德兴市', '134');
INSERT INTO `mr_district` VALUES ('1223', '历下区', '135');
INSERT INTO `mr_district` VALUES ('1224', '市中区', '135');
INSERT INTO `mr_district` VALUES ('1225', '槐荫区', '135');
INSERT INTO `mr_district` VALUES ('1226', '天桥区', '135');
INSERT INTO `mr_district` VALUES ('1227', '历城区', '135');
INSERT INTO `mr_district` VALUES ('1228', '长清区', '135');
INSERT INTO `mr_district` VALUES ('1229', '平阴县', '135');
INSERT INTO `mr_district` VALUES ('1230', '济阳县', '135');
INSERT INTO `mr_district` VALUES ('1231', '商河县', '135');
INSERT INTO `mr_district` VALUES ('1232', '章丘市', '135');
INSERT INTO `mr_district` VALUES ('1233', '市南区', '136');
INSERT INTO `mr_district` VALUES ('1234', '市北区', '136');
INSERT INTO `mr_district` VALUES ('1235', '四方区', '136');
INSERT INTO `mr_district` VALUES ('1236', '黄岛区', '136');
INSERT INTO `mr_district` VALUES ('1237', '崂山区', '136');
INSERT INTO `mr_district` VALUES ('1238', '李沧区', '136');
INSERT INTO `mr_district` VALUES ('1239', '城阳区', '136');
INSERT INTO `mr_district` VALUES ('1240', '胶州市', '136');
INSERT INTO `mr_district` VALUES ('1241', '即墨市', '136');
INSERT INTO `mr_district` VALUES ('1242', '平度市', '136');
INSERT INTO `mr_district` VALUES ('1243', '胶南市', '136');
INSERT INTO `mr_district` VALUES ('1244', '莱西市', '136');
INSERT INTO `mr_district` VALUES ('1245', '淄川区', '137');
INSERT INTO `mr_district` VALUES ('1246', '张店区', '137');
INSERT INTO `mr_district` VALUES ('1247', '博山区', '137');
INSERT INTO `mr_district` VALUES ('1248', '临淄区', '137');
INSERT INTO `mr_district` VALUES ('1249', '周村区', '137');
INSERT INTO `mr_district` VALUES ('1250', '桓台县', '137');
INSERT INTO `mr_district` VALUES ('1251', '高青县', '137');
INSERT INTO `mr_district` VALUES ('1252', '沂源县', '137');
INSERT INTO `mr_district` VALUES ('1253', '市中区', '138');
INSERT INTO `mr_district` VALUES ('1254', '薛城区', '138');
INSERT INTO `mr_district` VALUES ('1255', '峄城区', '138');
INSERT INTO `mr_district` VALUES ('1256', '台儿庄区', '138');
INSERT INTO `mr_district` VALUES ('1257', '山亭区', '138');
INSERT INTO `mr_district` VALUES ('1258', '滕州市', '138');
INSERT INTO `mr_district` VALUES ('1259', '东营区', '139');
INSERT INTO `mr_district` VALUES ('1260', '河口区', '139');
INSERT INTO `mr_district` VALUES ('1261', '垦利县', '139');
INSERT INTO `mr_district` VALUES ('1262', '利津县', '139');
INSERT INTO `mr_district` VALUES ('1263', '广饶县', '139');
INSERT INTO `mr_district` VALUES ('1264', '芝罘区', '140');
INSERT INTO `mr_district` VALUES ('1265', '福山区', '140');
INSERT INTO `mr_district` VALUES ('1266', '牟平区', '140');
INSERT INTO `mr_district` VALUES ('1267', '莱山区', '140');
INSERT INTO `mr_district` VALUES ('1268', '长岛县', '140');
INSERT INTO `mr_district` VALUES ('1269', '龙口市', '140');
INSERT INTO `mr_district` VALUES ('1270', '莱阳市', '140');
INSERT INTO `mr_district` VALUES ('1271', '莱州市', '140');
INSERT INTO `mr_district` VALUES ('1272', '蓬莱市', '140');
INSERT INTO `mr_district` VALUES ('1273', '招远市', '140');
INSERT INTO `mr_district` VALUES ('1274', '栖霞市', '140');
INSERT INTO `mr_district` VALUES ('1275', '海阳市', '140');
INSERT INTO `mr_district` VALUES ('1276', '潍城区', '141');
INSERT INTO `mr_district` VALUES ('1277', '寒亭区', '141');
INSERT INTO `mr_district` VALUES ('1278', '坊子区', '141');
INSERT INTO `mr_district` VALUES ('1279', '奎文区', '141');
INSERT INTO `mr_district` VALUES ('1280', '临朐县', '141');
INSERT INTO `mr_district` VALUES ('1281', '昌乐县', '141');
INSERT INTO `mr_district` VALUES ('1282', '青州市', '141');
INSERT INTO `mr_district` VALUES ('1283', '诸城市', '141');
INSERT INTO `mr_district` VALUES ('1284', '寿光市', '141');
INSERT INTO `mr_district` VALUES ('1285', '安丘市', '141');
INSERT INTO `mr_district` VALUES ('1286', '高密市', '141');
INSERT INTO `mr_district` VALUES ('1287', '昌邑市', '141');
INSERT INTO `mr_district` VALUES ('1288', '市中区', '142');
INSERT INTO `mr_district` VALUES ('1289', '任城区', '142');
INSERT INTO `mr_district` VALUES ('1290', '微山县', '142');
INSERT INTO `mr_district` VALUES ('1291', '鱼台县', '142');
INSERT INTO `mr_district` VALUES ('1292', '金乡县', '142');
INSERT INTO `mr_district` VALUES ('1293', '嘉祥县', '142');
INSERT INTO `mr_district` VALUES ('1294', '汶上县', '142');
INSERT INTO `mr_district` VALUES ('1295', '泗水县', '142');
INSERT INTO `mr_district` VALUES ('1296', '梁山县', '142');
INSERT INTO `mr_district` VALUES ('1297', '曲阜市', '142');
INSERT INTO `mr_district` VALUES ('1298', '兖州市', '142');
INSERT INTO `mr_district` VALUES ('1299', '邹城市', '142');
INSERT INTO `mr_district` VALUES ('1300', '泰山区', '143');
INSERT INTO `mr_district` VALUES ('1301', '岱岳区', '143');
INSERT INTO `mr_district` VALUES ('1302', '宁阳县', '143');
INSERT INTO `mr_district` VALUES ('1303', '东平县', '143');
INSERT INTO `mr_district` VALUES ('1304', '新泰市', '143');
INSERT INTO `mr_district` VALUES ('1305', '肥城市', '143');
INSERT INTO `mr_district` VALUES ('1306', '环翠区', '144');
INSERT INTO `mr_district` VALUES ('1307', '文登市', '144');
INSERT INTO `mr_district` VALUES ('1308', '荣成市', '144');
INSERT INTO `mr_district` VALUES ('1309', '乳山市', '144');
INSERT INTO `mr_district` VALUES ('1310', '东港区', '145');
INSERT INTO `mr_district` VALUES ('1311', '岚山区', '145');
INSERT INTO `mr_district` VALUES ('1312', '五莲县', '145');
INSERT INTO `mr_district` VALUES ('1313', '莒县', '145');
INSERT INTO `mr_district` VALUES ('1314', '莱城区', '146');
INSERT INTO `mr_district` VALUES ('1315', '钢城区', '146');
INSERT INTO `mr_district` VALUES ('1316', '兰山区', '147');
INSERT INTO `mr_district` VALUES ('1317', '罗庄区', '147');
INSERT INTO `mr_district` VALUES ('1318', '河东区', '147');
INSERT INTO `mr_district` VALUES ('1319', '沂南县', '147');
INSERT INTO `mr_district` VALUES ('1320', '郯城县', '147');
INSERT INTO `mr_district` VALUES ('1321', '沂水县', '147');
INSERT INTO `mr_district` VALUES ('1322', '苍山县', '147');
INSERT INTO `mr_district` VALUES ('1323', '费县', '147');
INSERT INTO `mr_district` VALUES ('1324', '平邑县', '147');
INSERT INTO `mr_district` VALUES ('1325', '莒南县', '147');
INSERT INTO `mr_district` VALUES ('1326', '蒙阴县', '147');
INSERT INTO `mr_district` VALUES ('1327', '临沭县', '147');
INSERT INTO `mr_district` VALUES ('1328', '德城区', '148');
INSERT INTO `mr_district` VALUES ('1329', '陵县', '148');
INSERT INTO `mr_district` VALUES ('1330', '宁津县', '148');
INSERT INTO `mr_district` VALUES ('1331', '庆云县', '148');
INSERT INTO `mr_district` VALUES ('1332', '临邑县', '148');
INSERT INTO `mr_district` VALUES ('1333', '齐河县', '148');
INSERT INTO `mr_district` VALUES ('1334', '平原县', '148');
INSERT INTO `mr_district` VALUES ('1335', '夏津县', '148');
INSERT INTO `mr_district` VALUES ('1336', '武城县', '148');
INSERT INTO `mr_district` VALUES ('1337', '乐陵市', '148');
INSERT INTO `mr_district` VALUES ('1338', '禹城市', '148');
INSERT INTO `mr_district` VALUES ('1339', '东昌府区', '149');
INSERT INTO `mr_district` VALUES ('1340', '阳谷县', '149');
INSERT INTO `mr_district` VALUES ('1341', '莘县', '149');
INSERT INTO `mr_district` VALUES ('1342', '茌平县', '149');
INSERT INTO `mr_district` VALUES ('1343', '东阿县', '149');
INSERT INTO `mr_district` VALUES ('1344', '冠县', '149');
INSERT INTO `mr_district` VALUES ('1345', '高唐县', '149');
INSERT INTO `mr_district` VALUES ('1346', '临清市', '149');
INSERT INTO `mr_district` VALUES ('1347', '滨城区', '150');
INSERT INTO `mr_district` VALUES ('1348', '惠民县', '150');
INSERT INTO `mr_district` VALUES ('1349', '阳信县', '150');
INSERT INTO `mr_district` VALUES ('1350', '无棣县', '150');
INSERT INTO `mr_district` VALUES ('1351', '沾化县', '150');
INSERT INTO `mr_district` VALUES ('1352', '博兴县', '150');
INSERT INTO `mr_district` VALUES ('1353', '邹平县', '150');
INSERT INTO `mr_district` VALUES ('1354', '牡丹区', '151');
INSERT INTO `mr_district` VALUES ('1355', '曹县', '151');
INSERT INTO `mr_district` VALUES ('1356', '单县', '151');
INSERT INTO `mr_district` VALUES ('1357', '成武县', '151');
INSERT INTO `mr_district` VALUES ('1358', '巨野县', '151');
INSERT INTO `mr_district` VALUES ('1359', '郓城县', '151');
INSERT INTO `mr_district` VALUES ('1360', '鄄城县', '151');
INSERT INTO `mr_district` VALUES ('1361', '定陶县', '151');
INSERT INTO `mr_district` VALUES ('1362', '东明县', '151');
INSERT INTO `mr_district` VALUES ('1363', '中原区', '152');
INSERT INTO `mr_district` VALUES ('1364', '二七区', '152');
INSERT INTO `mr_district` VALUES ('1365', '管城回族区', '152');
INSERT INTO `mr_district` VALUES ('1366', '金水区', '152');
INSERT INTO `mr_district` VALUES ('1367', '上街区', '152');
INSERT INTO `mr_district` VALUES ('1368', '惠济区', '152');
INSERT INTO `mr_district` VALUES ('1369', '中牟县', '152');
INSERT INTO `mr_district` VALUES ('1370', '巩义市', '152');
INSERT INTO `mr_district` VALUES ('1371', '荥阳市', '152');
INSERT INTO `mr_district` VALUES ('1372', '新密市', '152');
INSERT INTO `mr_district` VALUES ('1373', '新郑市', '152');
INSERT INTO `mr_district` VALUES ('1374', '登封市', '152');
INSERT INTO `mr_district` VALUES ('1375', '龙亭区', '153');
INSERT INTO `mr_district` VALUES ('1376', '顺河回族区', '153');
INSERT INTO `mr_district` VALUES ('1377', '鼓楼区', '153');
INSERT INTO `mr_district` VALUES ('1378', '南关区', '153');
INSERT INTO `mr_district` VALUES ('1379', '郊区', '153');
INSERT INTO `mr_district` VALUES ('1380', '杞县', '153');
INSERT INTO `mr_district` VALUES ('1381', '通许县', '153');
INSERT INTO `mr_district` VALUES ('1382', '尉氏县', '153');
INSERT INTO `mr_district` VALUES ('1383', '开封县', '153');
INSERT INTO `mr_district` VALUES ('1384', '兰考县', '153');
INSERT INTO `mr_district` VALUES ('1385', '老城区', '154');
INSERT INTO `mr_district` VALUES ('1386', '西工区', '154');
INSERT INTO `mr_district` VALUES ('1387', '廛河回族区', '154');
INSERT INTO `mr_district` VALUES ('1388', '涧西区', '154');
INSERT INTO `mr_district` VALUES ('1389', '吉利区', '154');
INSERT INTO `mr_district` VALUES ('1390', '洛龙区', '154');
INSERT INTO `mr_district` VALUES ('1391', '孟津县', '154');
INSERT INTO `mr_district` VALUES ('1392', '新安县', '154');
INSERT INTO `mr_district` VALUES ('1393', '栾川县', '154');
INSERT INTO `mr_district` VALUES ('1394', '嵩县', '154');
INSERT INTO `mr_district` VALUES ('1395', '汝阳县', '154');
INSERT INTO `mr_district` VALUES ('1396', '宜阳县', '154');
INSERT INTO `mr_district` VALUES ('1397', '洛宁县', '154');
INSERT INTO `mr_district` VALUES ('1398', '伊川县', '154');
INSERT INTO `mr_district` VALUES ('1399', '偃师市', '154');
INSERT INTO `mr_district` VALUES ('1400', '新华区', '155');
INSERT INTO `mr_district` VALUES ('1401', '卫东区', '155');
INSERT INTO `mr_district` VALUES ('1402', '石龙区', '155');
INSERT INTO `mr_district` VALUES ('1403', '湛河区', '155');
INSERT INTO `mr_district` VALUES ('1404', '宝丰县', '155');
INSERT INTO `mr_district` VALUES ('1405', '叶县', '155');
INSERT INTO `mr_district` VALUES ('1406', '鲁山县', '155');
INSERT INTO `mr_district` VALUES ('1407', '郏县', '155');
INSERT INTO `mr_district` VALUES ('1408', '舞钢市', '155');
INSERT INTO `mr_district` VALUES ('1409', '汝州市', '155');
INSERT INTO `mr_district` VALUES ('1410', '文峰区', '156');
INSERT INTO `mr_district` VALUES ('1411', '北关区', '156');
INSERT INTO `mr_district` VALUES ('1412', '殷都区', '156');
INSERT INTO `mr_district` VALUES ('1413', '龙安区', '156');
INSERT INTO `mr_district` VALUES ('1414', '安阳县', '156');
INSERT INTO `mr_district` VALUES ('1415', '汤阴县', '156');
INSERT INTO `mr_district` VALUES ('1416', '滑县', '156');
INSERT INTO `mr_district` VALUES ('1417', '内黄县', '156');
INSERT INTO `mr_district` VALUES ('1418', '林州市', '156');
INSERT INTO `mr_district` VALUES ('1419', '鹤山区', '157');
INSERT INTO `mr_district` VALUES ('1420', '山城区', '157');
INSERT INTO `mr_district` VALUES ('1421', '淇滨区', '157');
INSERT INTO `mr_district` VALUES ('1422', '浚县', '157');
INSERT INTO `mr_district` VALUES ('1423', '淇县', '157');
INSERT INTO `mr_district` VALUES ('1424', '红旗区', '158');
INSERT INTO `mr_district` VALUES ('1425', '卫滨区', '158');
INSERT INTO `mr_district` VALUES ('1426', '凤泉区', '158');
INSERT INTO `mr_district` VALUES ('1427', '牧野区', '158');
INSERT INTO `mr_district` VALUES ('1428', '新乡县', '158');
INSERT INTO `mr_district` VALUES ('1429', '获嘉县', '158');
INSERT INTO `mr_district` VALUES ('1430', '原阳县', '158');
INSERT INTO `mr_district` VALUES ('1431', '延津县', '158');
INSERT INTO `mr_district` VALUES ('1432', '封丘县', '158');
INSERT INTO `mr_district` VALUES ('1433', '长垣县', '158');
INSERT INTO `mr_district` VALUES ('1434', '卫辉市', '158');
INSERT INTO `mr_district` VALUES ('1435', '辉县市', '158');
INSERT INTO `mr_district` VALUES ('1436', '解放区', '159');
INSERT INTO `mr_district` VALUES ('1437', '中站区', '159');
INSERT INTO `mr_district` VALUES ('1438', '马村区', '159');
INSERT INTO `mr_district` VALUES ('1439', '山阳区', '159');
INSERT INTO `mr_district` VALUES ('1440', '修武县', '159');
INSERT INTO `mr_district` VALUES ('1441', '博爱县', '159');
INSERT INTO `mr_district` VALUES ('1442', '武陟县', '159');
INSERT INTO `mr_district` VALUES ('1443', '温县', '159');
INSERT INTO `mr_district` VALUES ('1444', '济源市', '159');
INSERT INTO `mr_district` VALUES ('1445', '沁阳市', '159');
INSERT INTO `mr_district` VALUES ('1446', '孟州市', '159');
INSERT INTO `mr_district` VALUES ('1447', '华龙区', '160');
INSERT INTO `mr_district` VALUES ('1448', '清丰县', '160');
INSERT INTO `mr_district` VALUES ('1449', '南乐县', '160');
INSERT INTO `mr_district` VALUES ('1450', '范县', '160');
INSERT INTO `mr_district` VALUES ('1451', '台前县', '160');
INSERT INTO `mr_district` VALUES ('1452', '濮阳县', '160');
INSERT INTO `mr_district` VALUES ('1453', '魏都区', '161');
INSERT INTO `mr_district` VALUES ('1454', '许昌县', '161');
INSERT INTO `mr_district` VALUES ('1455', '鄢陵县', '161');
INSERT INTO `mr_district` VALUES ('1456', '襄城县', '161');
INSERT INTO `mr_district` VALUES ('1457', '禹州市', '161');
INSERT INTO `mr_district` VALUES ('1458', '长葛市', '161');
INSERT INTO `mr_district` VALUES ('1459', '源汇区', '162');
INSERT INTO `mr_district` VALUES ('1460', '郾城区', '162');
INSERT INTO `mr_district` VALUES ('1461', '召陵区', '162');
INSERT INTO `mr_district` VALUES ('1462', '舞阳县', '162');
INSERT INTO `mr_district` VALUES ('1463', '临颍县', '162');
INSERT INTO `mr_district` VALUES ('1464', '市辖区', '163');
INSERT INTO `mr_district` VALUES ('1465', '湖滨区', '163');
INSERT INTO `mr_district` VALUES ('1466', '渑池县', '163');
INSERT INTO `mr_district` VALUES ('1467', '陕县', '163');
INSERT INTO `mr_district` VALUES ('1468', '卢氏县', '163');
INSERT INTO `mr_district` VALUES ('1469', '义马市', '163');
INSERT INTO `mr_district` VALUES ('1470', '灵宝市', '163');
INSERT INTO `mr_district` VALUES ('1471', '宛城区', '164');
INSERT INTO `mr_district` VALUES ('1472', '卧龙区', '164');
INSERT INTO `mr_district` VALUES ('1473', '南召县', '164');
INSERT INTO `mr_district` VALUES ('1474', '方城县', '164');
INSERT INTO `mr_district` VALUES ('1475', '西峡县', '164');
INSERT INTO `mr_district` VALUES ('1476', '镇平县', '164');
INSERT INTO `mr_district` VALUES ('1477', '内乡县', '164');
INSERT INTO `mr_district` VALUES ('1478', '淅川县', '164');
INSERT INTO `mr_district` VALUES ('1479', '社旗县', '164');
INSERT INTO `mr_district` VALUES ('1480', '唐河县', '164');
INSERT INTO `mr_district` VALUES ('1481', '新野县', '164');
INSERT INTO `mr_district` VALUES ('1482', '桐柏县', '164');
INSERT INTO `mr_district` VALUES ('1483', '邓州市', '164');
INSERT INTO `mr_district` VALUES ('1484', '梁园区', '165');
INSERT INTO `mr_district` VALUES ('1485', '睢阳区', '165');
INSERT INTO `mr_district` VALUES ('1486', '民权县', '165');
INSERT INTO `mr_district` VALUES ('1487', '睢县', '165');
INSERT INTO `mr_district` VALUES ('1488', '宁陵县', '165');
INSERT INTO `mr_district` VALUES ('1489', '柘城县', '165');
INSERT INTO `mr_district` VALUES ('1490', '虞城县', '165');
INSERT INTO `mr_district` VALUES ('1491', '夏邑县', '165');
INSERT INTO `mr_district` VALUES ('1492', '永城市', '165');
INSERT INTO `mr_district` VALUES ('1493', '浉河区', '166');
INSERT INTO `mr_district` VALUES ('1494', '平桥区', '166');
INSERT INTO `mr_district` VALUES ('1495', '罗山县', '166');
INSERT INTO `mr_district` VALUES ('1496', '光山县', '166');
INSERT INTO `mr_district` VALUES ('1497', '新县', '166');
INSERT INTO `mr_district` VALUES ('1498', '商城县', '166');
INSERT INTO `mr_district` VALUES ('1499', '固始县', '166');
INSERT INTO `mr_district` VALUES ('1500', '潢川县', '166');
INSERT INTO `mr_district` VALUES ('1501', '淮滨县', '166');
INSERT INTO `mr_district` VALUES ('1502', '息县', '166');
INSERT INTO `mr_district` VALUES ('1503', '川汇区', '167');
INSERT INTO `mr_district` VALUES ('1504', '扶沟县', '167');
INSERT INTO `mr_district` VALUES ('1505', '西华县', '167');
INSERT INTO `mr_district` VALUES ('1506', '商水县', '167');
INSERT INTO `mr_district` VALUES ('1507', '沈丘县', '167');
INSERT INTO `mr_district` VALUES ('1508', '郸城县', '167');
INSERT INTO `mr_district` VALUES ('1509', '淮阳县', '167');
INSERT INTO `mr_district` VALUES ('1510', '太康县', '167');
INSERT INTO `mr_district` VALUES ('1511', '鹿邑县', '167');
INSERT INTO `mr_district` VALUES ('1512', '项城市', '167');
INSERT INTO `mr_district` VALUES ('1513', '驿城区', '168');
INSERT INTO `mr_district` VALUES ('1514', '西平县', '168');
INSERT INTO `mr_district` VALUES ('1515', '上蔡县', '168');
INSERT INTO `mr_district` VALUES ('1516', '平舆县', '168');
INSERT INTO `mr_district` VALUES ('1517', '正阳县', '168');
INSERT INTO `mr_district` VALUES ('1518', '确山县', '168');
INSERT INTO `mr_district` VALUES ('1519', '泌阳县', '168');
INSERT INTO `mr_district` VALUES ('1520', '汝南县', '168');
INSERT INTO `mr_district` VALUES ('1521', '遂平县', '168');
INSERT INTO `mr_district` VALUES ('1522', '新蔡县', '168');
INSERT INTO `mr_district` VALUES ('1523', '江岸区', '169');
INSERT INTO `mr_district` VALUES ('1524', '江汉区', '169');
INSERT INTO `mr_district` VALUES ('1525', '硚口区', '169');
INSERT INTO `mr_district` VALUES ('1526', '汉阳区', '169');
INSERT INTO `mr_district` VALUES ('1527', '武昌区', '169');
INSERT INTO `mr_district` VALUES ('1528', '青山区', '169');
INSERT INTO `mr_district` VALUES ('1529', '洪山区', '169');
INSERT INTO `mr_district` VALUES ('1530', '东西湖区', '169');
INSERT INTO `mr_district` VALUES ('1531', '汉南区', '169');
INSERT INTO `mr_district` VALUES ('1532', '蔡甸区', '169');
INSERT INTO `mr_district` VALUES ('1533', '江夏区', '169');
INSERT INTO `mr_district` VALUES ('1534', '黄陂区', '169');
INSERT INTO `mr_district` VALUES ('1535', '新洲区', '169');
INSERT INTO `mr_district` VALUES ('1536', '黄石港区', '170');
INSERT INTO `mr_district` VALUES ('1537', '西塞山区', '170');
INSERT INTO `mr_district` VALUES ('1538', '下陆区', '170');
INSERT INTO `mr_district` VALUES ('1539', '铁山区', '170');
INSERT INTO `mr_district` VALUES ('1540', '阳新县', '170');
INSERT INTO `mr_district` VALUES ('1541', '大冶市', '170');
INSERT INTO `mr_district` VALUES ('1542', '茅箭区', '171');
INSERT INTO `mr_district` VALUES ('1543', '张湾区', '171');
INSERT INTO `mr_district` VALUES ('1544', '郧县', '171');
INSERT INTO `mr_district` VALUES ('1545', '郧西县', '171');
INSERT INTO `mr_district` VALUES ('1546', '竹山县', '171');
INSERT INTO `mr_district` VALUES ('1547', '竹溪县', '171');
INSERT INTO `mr_district` VALUES ('1548', '房县', '171');
INSERT INTO `mr_district` VALUES ('1549', '丹江口市', '171');
INSERT INTO `mr_district` VALUES ('1550', '西陵区', '172');
INSERT INTO `mr_district` VALUES ('1551', '伍家岗区', '172');
INSERT INTO `mr_district` VALUES ('1552', '点军区', '172');
INSERT INTO `mr_district` VALUES ('1553', '猇亭区', '172');
INSERT INTO `mr_district` VALUES ('1554', '夷陵区', '172');
INSERT INTO `mr_district` VALUES ('1555', '远安县', '172');
INSERT INTO `mr_district` VALUES ('1556', '兴山县', '172');
INSERT INTO `mr_district` VALUES ('1557', '秭归县', '172');
INSERT INTO `mr_district` VALUES ('1558', '长阳土家族自治县', '172');
INSERT INTO `mr_district` VALUES ('1559', '五峰土家族自治县', '172');
INSERT INTO `mr_district` VALUES ('1560', '宜都市', '172');
INSERT INTO `mr_district` VALUES ('1561', '当阳市', '172');
INSERT INTO `mr_district` VALUES ('1562', '枝江市', '172');
INSERT INTO `mr_district` VALUES ('1563', '襄城区', '173');
INSERT INTO `mr_district` VALUES ('1564', '樊城区', '173');
INSERT INTO `mr_district` VALUES ('1565', '襄阳区', '173');
INSERT INTO `mr_district` VALUES ('1566', '南漳县', '173');
INSERT INTO `mr_district` VALUES ('1567', '谷城县', '173');
INSERT INTO `mr_district` VALUES ('1568', '保康县', '173');
INSERT INTO `mr_district` VALUES ('1569', '老河口市', '173');
INSERT INTO `mr_district` VALUES ('1570', '枣阳市', '173');
INSERT INTO `mr_district` VALUES ('1571', '宜城市', '173');
INSERT INTO `mr_district` VALUES ('1572', '梁子湖区', '174');
INSERT INTO `mr_district` VALUES ('1573', '华容区', '174');
INSERT INTO `mr_district` VALUES ('1574', '鄂城区', '174');
INSERT INTO `mr_district` VALUES ('1575', '东宝区', '175');
INSERT INTO `mr_district` VALUES ('1576', '掇刀区', '175');
INSERT INTO `mr_district` VALUES ('1577', '京山县', '175');
INSERT INTO `mr_district` VALUES ('1578', '沙洋县', '175');
INSERT INTO `mr_district` VALUES ('1579', '钟祥市', '175');
INSERT INTO `mr_district` VALUES ('1580', '孝南区', '176');
INSERT INTO `mr_district` VALUES ('1581', '孝昌县', '176');
INSERT INTO `mr_district` VALUES ('1582', '大悟县', '176');
INSERT INTO `mr_district` VALUES ('1583', '云梦县', '176');
INSERT INTO `mr_district` VALUES ('1584', '应城市', '176');
INSERT INTO `mr_district` VALUES ('1585', '安陆市', '176');
INSERT INTO `mr_district` VALUES ('1586', '汉川市', '176');
INSERT INTO `mr_district` VALUES ('1587', '沙市区', '177');
INSERT INTO `mr_district` VALUES ('1588', '荆州区', '177');
INSERT INTO `mr_district` VALUES ('1589', '公安县', '177');
INSERT INTO `mr_district` VALUES ('1590', '监利县', '177');
INSERT INTO `mr_district` VALUES ('1591', '江陵县', '177');
INSERT INTO `mr_district` VALUES ('1592', '石首市', '177');
INSERT INTO `mr_district` VALUES ('1593', '洪湖市', '177');
INSERT INTO `mr_district` VALUES ('1594', '松滋市', '177');
INSERT INTO `mr_district` VALUES ('1595', '黄州区', '178');
INSERT INTO `mr_district` VALUES ('1596', '团风县', '178');
INSERT INTO `mr_district` VALUES ('1597', '红安县', '178');
INSERT INTO `mr_district` VALUES ('1598', '罗田县', '178');
INSERT INTO `mr_district` VALUES ('1599', '英山县', '178');
INSERT INTO `mr_district` VALUES ('1600', '浠水县', '178');
INSERT INTO `mr_district` VALUES ('1601', '蕲春县', '178');
INSERT INTO `mr_district` VALUES ('1602', '黄梅县', '178');
INSERT INTO `mr_district` VALUES ('1603', '麻城市', '178');
INSERT INTO `mr_district` VALUES ('1604', '武穴市', '178');
INSERT INTO `mr_district` VALUES ('1605', '咸安区', '179');
INSERT INTO `mr_district` VALUES ('1606', '嘉鱼县', '179');
INSERT INTO `mr_district` VALUES ('1607', '通城县', '179');
INSERT INTO `mr_district` VALUES ('1608', '崇阳县', '179');
INSERT INTO `mr_district` VALUES ('1609', '通山县', '179');
INSERT INTO `mr_district` VALUES ('1610', '赤壁市', '179');
INSERT INTO `mr_district` VALUES ('1611', '曾都区', '180');
INSERT INTO `mr_district` VALUES ('1612', '广水市', '180');
INSERT INTO `mr_district` VALUES ('1613', '恩施市', '181');
INSERT INTO `mr_district` VALUES ('1614', '利川市', '181');
INSERT INTO `mr_district` VALUES ('1615', '建始县', '181');
INSERT INTO `mr_district` VALUES ('1616', '巴东县', '181');
INSERT INTO `mr_district` VALUES ('1617', '宣恩县', '181');
INSERT INTO `mr_district` VALUES ('1618', '咸丰县', '181');
INSERT INTO `mr_district` VALUES ('1619', '来凤县', '181');
INSERT INTO `mr_district` VALUES ('1620', '鹤峰县', '181');
INSERT INTO `mr_district` VALUES ('1621', '仙桃市', '182');
INSERT INTO `mr_district` VALUES ('1622', '潜江市', '182');
INSERT INTO `mr_district` VALUES ('1623', '天门市', '182');
INSERT INTO `mr_district` VALUES ('1624', '神农架林区', '182');
INSERT INTO `mr_district` VALUES ('1625', '芙蓉区', '183');
INSERT INTO `mr_district` VALUES ('1626', '天心区', '183');
INSERT INTO `mr_district` VALUES ('1627', '岳麓区', '183');
INSERT INTO `mr_district` VALUES ('1628', '开福区', '183');
INSERT INTO `mr_district` VALUES ('1629', '雨花区', '183');
INSERT INTO `mr_district` VALUES ('1630', '长沙县', '183');
INSERT INTO `mr_district` VALUES ('1631', '望城县', '183');
INSERT INTO `mr_district` VALUES ('1632', '宁乡县', '183');
INSERT INTO `mr_district` VALUES ('1633', '浏阳市', '183');
INSERT INTO `mr_district` VALUES ('1634', '荷塘区', '184');
INSERT INTO `mr_district` VALUES ('1635', '芦淞区', '184');
INSERT INTO `mr_district` VALUES ('1636', '石峰区', '184');
INSERT INTO `mr_district` VALUES ('1637', '天元区', '184');
INSERT INTO `mr_district` VALUES ('1638', '株洲县', '184');
INSERT INTO `mr_district` VALUES ('1639', '攸县', '184');
INSERT INTO `mr_district` VALUES ('1640', '茶陵县', '184');
INSERT INTO `mr_district` VALUES ('1641', '炎陵县', '184');
INSERT INTO `mr_district` VALUES ('1642', '醴陵市', '184');
INSERT INTO `mr_district` VALUES ('1643', '雨湖区', '185');
INSERT INTO `mr_district` VALUES ('1644', '岳塘区', '185');
INSERT INTO `mr_district` VALUES ('1645', '湘潭县', '185');
INSERT INTO `mr_district` VALUES ('1646', '湘乡市', '185');
INSERT INTO `mr_district` VALUES ('1647', '韶山市', '185');
INSERT INTO `mr_district` VALUES ('1648', '珠晖区', '186');
INSERT INTO `mr_district` VALUES ('1649', '雁峰区', '186');
INSERT INTO `mr_district` VALUES ('1650', '石鼓区', '186');
INSERT INTO `mr_district` VALUES ('1651', '蒸湘区', '186');
INSERT INTO `mr_district` VALUES ('1652', '南岳区', '186');
INSERT INTO `mr_district` VALUES ('1653', '衡阳县', '186');
INSERT INTO `mr_district` VALUES ('1654', '衡南县', '186');
INSERT INTO `mr_district` VALUES ('1655', '衡山县', '186');
INSERT INTO `mr_district` VALUES ('1656', '衡东县', '186');
INSERT INTO `mr_district` VALUES ('1657', '祁东县', '186');
INSERT INTO `mr_district` VALUES ('1658', '耒阳市', '186');
INSERT INTO `mr_district` VALUES ('1659', '常宁市', '186');
INSERT INTO `mr_district` VALUES ('1660', '双清区', '187');
INSERT INTO `mr_district` VALUES ('1661', '大祥区', '187');
INSERT INTO `mr_district` VALUES ('1662', '北塔区', '187');
INSERT INTO `mr_district` VALUES ('1663', '邵东县', '187');
INSERT INTO `mr_district` VALUES ('1664', '新邵县', '187');
INSERT INTO `mr_district` VALUES ('1665', '邵阳县', '187');
INSERT INTO `mr_district` VALUES ('1666', '隆回县', '187');
INSERT INTO `mr_district` VALUES ('1667', '洞口县', '187');
INSERT INTO `mr_district` VALUES ('1668', '绥宁县', '187');
INSERT INTO `mr_district` VALUES ('1669', '新宁县', '187');
INSERT INTO `mr_district` VALUES ('1670', '城步苗族自治县', '187');
INSERT INTO `mr_district` VALUES ('1671', '武冈市', '187');
INSERT INTO `mr_district` VALUES ('1672', '岳阳楼区', '188');
INSERT INTO `mr_district` VALUES ('1673', '云溪区', '188');
INSERT INTO `mr_district` VALUES ('1674', '君山区', '188');
INSERT INTO `mr_district` VALUES ('1675', '岳阳县', '188');
INSERT INTO `mr_district` VALUES ('1676', '华容县', '188');
INSERT INTO `mr_district` VALUES ('1677', '湘阴县', '188');
INSERT INTO `mr_district` VALUES ('1678', '平江县', '188');
INSERT INTO `mr_district` VALUES ('1679', '汨罗市', '188');
INSERT INTO `mr_district` VALUES ('1680', '临湘市', '188');
INSERT INTO `mr_district` VALUES ('1681', '武陵区', '189');
INSERT INTO `mr_district` VALUES ('1682', '鼎城区', '189');
INSERT INTO `mr_district` VALUES ('1683', '安乡县', '189');
INSERT INTO `mr_district` VALUES ('1684', '汉寿县', '189');
INSERT INTO `mr_district` VALUES ('1685', '澧县', '189');
INSERT INTO `mr_district` VALUES ('1686', '临澧县', '189');
INSERT INTO `mr_district` VALUES ('1687', '桃源县', '189');
INSERT INTO `mr_district` VALUES ('1688', '石门县', '189');
INSERT INTO `mr_district` VALUES ('1689', '津市市', '189');
INSERT INTO `mr_district` VALUES ('1690', '永定区', '190');
INSERT INTO `mr_district` VALUES ('1691', '武陵源区', '190');
INSERT INTO `mr_district` VALUES ('1692', '慈利县', '190');
INSERT INTO `mr_district` VALUES ('1693', '桑植县', '190');
INSERT INTO `mr_district` VALUES ('1694', '资阳区', '191');
INSERT INTO `mr_district` VALUES ('1695', '赫山区', '191');
INSERT INTO `mr_district` VALUES ('1696', '南县', '191');
INSERT INTO `mr_district` VALUES ('1697', '桃江县', '191');
INSERT INTO `mr_district` VALUES ('1698', '安化县', '191');
INSERT INTO `mr_district` VALUES ('1699', '沅江市', '191');
INSERT INTO `mr_district` VALUES ('1700', '北湖区', '192');
INSERT INTO `mr_district` VALUES ('1701', '苏仙区', '192');
INSERT INTO `mr_district` VALUES ('1702', '桂阳县', '192');
INSERT INTO `mr_district` VALUES ('1703', '宜章县', '192');
INSERT INTO `mr_district` VALUES ('1704', '永兴县', '192');
INSERT INTO `mr_district` VALUES ('1705', '嘉禾县', '192');
INSERT INTO `mr_district` VALUES ('1706', '临武县', '192');
INSERT INTO `mr_district` VALUES ('1707', '汝城县', '192');
INSERT INTO `mr_district` VALUES ('1708', '桂东县', '192');
INSERT INTO `mr_district` VALUES ('1709', '安仁县', '192');
INSERT INTO `mr_district` VALUES ('1710', '资兴市', '192');
INSERT INTO `mr_district` VALUES ('1711', '芝山区', '193');
INSERT INTO `mr_district` VALUES ('1712', '冷水滩区', '193');
INSERT INTO `mr_district` VALUES ('1713', '祁阳县', '193');
INSERT INTO `mr_district` VALUES ('1714', '东安县', '193');
INSERT INTO `mr_district` VALUES ('1715', '双牌县', '193');
INSERT INTO `mr_district` VALUES ('1716', '道县', '193');
INSERT INTO `mr_district` VALUES ('1717', '江永县', '193');
INSERT INTO `mr_district` VALUES ('1718', '宁远县', '193');
INSERT INTO `mr_district` VALUES ('1719', '蓝山县', '193');
INSERT INTO `mr_district` VALUES ('1720', '新田县', '193');
INSERT INTO `mr_district` VALUES ('1721', '江华瑶族自治县', '193');
INSERT INTO `mr_district` VALUES ('1722', '鹤城区', '194');
INSERT INTO `mr_district` VALUES ('1723', '中方县', '194');
INSERT INTO `mr_district` VALUES ('1724', '沅陵县', '194');
INSERT INTO `mr_district` VALUES ('1725', '辰溪县', '194');
INSERT INTO `mr_district` VALUES ('1726', '溆浦县', '194');
INSERT INTO `mr_district` VALUES ('1727', '会同县', '194');
INSERT INTO `mr_district` VALUES ('1728', '麻阳苗族自治县', '194');
INSERT INTO `mr_district` VALUES ('1729', '新晃侗族自治县', '194');
INSERT INTO `mr_district` VALUES ('1730', '芷江侗族自治县', '194');
INSERT INTO `mr_district` VALUES ('1731', '靖州苗族侗族自治县', '194');
INSERT INTO `mr_district` VALUES ('1732', '通道侗族自治县', '194');
INSERT INTO `mr_district` VALUES ('1733', '洪江市', '194');
INSERT INTO `mr_district` VALUES ('1734', '娄星区', '195');
INSERT INTO `mr_district` VALUES ('1735', '双峰县', '195');
INSERT INTO `mr_district` VALUES ('1736', '新化县', '195');
INSERT INTO `mr_district` VALUES ('1737', '冷水江市', '195');
INSERT INTO `mr_district` VALUES ('1738', '涟源市', '195');
INSERT INTO `mr_district` VALUES ('1739', '吉首市', '196');
INSERT INTO `mr_district` VALUES ('1740', '泸溪县', '196');
INSERT INTO `mr_district` VALUES ('1741', '凤凰县', '196');
INSERT INTO `mr_district` VALUES ('1742', '花垣县', '196');
INSERT INTO `mr_district` VALUES ('1743', '保靖县', '196');
INSERT INTO `mr_district` VALUES ('1744', '古丈县', '196');
INSERT INTO `mr_district` VALUES ('1745', '永顺县', '196');
INSERT INTO `mr_district` VALUES ('1746', '龙山县', '196');
INSERT INTO `mr_district` VALUES ('1747', '东山区', '197');
INSERT INTO `mr_district` VALUES ('1748', '荔湾区', '197');
INSERT INTO `mr_district` VALUES ('1749', '越秀区', '197');
INSERT INTO `mr_district` VALUES ('1750', '海珠区', '197');
INSERT INTO `mr_district` VALUES ('1751', '天河区', '197');
INSERT INTO `mr_district` VALUES ('1752', '芳村区', '197');
INSERT INTO `mr_district` VALUES ('1753', '白云区', '197');
INSERT INTO `mr_district` VALUES ('1754', '黄埔区', '197');
INSERT INTO `mr_district` VALUES ('1755', '番禺区', '197');
INSERT INTO `mr_district` VALUES ('1756', '花都区', '197');
INSERT INTO `mr_district` VALUES ('1757', '增城市', '197');
INSERT INTO `mr_district` VALUES ('1758', '从化市', '197');
INSERT INTO `mr_district` VALUES ('1759', '武江区', '198');
INSERT INTO `mr_district` VALUES ('1760', '浈江区', '198');
INSERT INTO `mr_district` VALUES ('1761', '曲江区', '198');
INSERT INTO `mr_district` VALUES ('1762', '始兴县', '198');
INSERT INTO `mr_district` VALUES ('1763', '仁化县', '198');
INSERT INTO `mr_district` VALUES ('1764', '翁源县', '198');
INSERT INTO `mr_district` VALUES ('1765', '乳源瑶族自治县', '198');
INSERT INTO `mr_district` VALUES ('1766', '新丰县', '198');
INSERT INTO `mr_district` VALUES ('1767', '乐昌市', '198');
INSERT INTO `mr_district` VALUES ('1768', '南雄市', '198');
INSERT INTO `mr_district` VALUES ('1769', '罗湖区', '199');
INSERT INTO `mr_district` VALUES ('1770', '福田区', '199');
INSERT INTO `mr_district` VALUES ('1771', '南山区', '199');
INSERT INTO `mr_district` VALUES ('1772', '宝安区', '199');
INSERT INTO `mr_district` VALUES ('1773', '龙岗区', '199');
INSERT INTO `mr_district` VALUES ('1774', '盐田区', '199');
INSERT INTO `mr_district` VALUES ('1775', '香洲区', '200');
INSERT INTO `mr_district` VALUES ('1776', '斗门区', '200');
INSERT INTO `mr_district` VALUES ('1777', '金湾区', '200');
INSERT INTO `mr_district` VALUES ('1778', '龙湖区', '201');
INSERT INTO `mr_district` VALUES ('1779', '金平区', '201');
INSERT INTO `mr_district` VALUES ('1780', '濠江区', '201');
INSERT INTO `mr_district` VALUES ('1781', '潮阳区', '201');
INSERT INTO `mr_district` VALUES ('1782', '潮南区', '201');
INSERT INTO `mr_district` VALUES ('1783', '澄海区', '201');
INSERT INTO `mr_district` VALUES ('1784', '南澳县', '201');
INSERT INTO `mr_district` VALUES ('1785', '禅城区', '202');
INSERT INTO `mr_district` VALUES ('1786', '南海区', '202');
INSERT INTO `mr_district` VALUES ('1787', '顺德区', '202');
INSERT INTO `mr_district` VALUES ('1788', '三水区', '202');
INSERT INTO `mr_district` VALUES ('1789', '高明区', '202');
INSERT INTO `mr_district` VALUES ('1790', '蓬江区', '203');
INSERT INTO `mr_district` VALUES ('1791', '江海区', '203');
INSERT INTO `mr_district` VALUES ('1792', '新会区', '203');
INSERT INTO `mr_district` VALUES ('1793', '台山市', '203');
INSERT INTO `mr_district` VALUES ('1794', '开平市', '203');
INSERT INTO `mr_district` VALUES ('1795', '鹤山市', '203');
INSERT INTO `mr_district` VALUES ('1796', '恩平市', '203');
INSERT INTO `mr_district` VALUES ('1797', '赤坎区', '204');
INSERT INTO `mr_district` VALUES ('1798', '霞山区', '204');
INSERT INTO `mr_district` VALUES ('1799', '坡头区', '204');
INSERT INTO `mr_district` VALUES ('1800', '麻章区', '204');
INSERT INTO `mr_district` VALUES ('1801', '遂溪县', '204');
INSERT INTO `mr_district` VALUES ('1802', '徐闻县', '204');
INSERT INTO `mr_district` VALUES ('1803', '廉江市', '204');
INSERT INTO `mr_district` VALUES ('1804', '雷州市', '204');
INSERT INTO `mr_district` VALUES ('1805', '吴川市', '204');
INSERT INTO `mr_district` VALUES ('1806', '茂南区', '205');
INSERT INTO `mr_district` VALUES ('1807', '茂港区', '205');
INSERT INTO `mr_district` VALUES ('1808', '电白县', '205');
INSERT INTO `mr_district` VALUES ('1809', '高州市', '205');
INSERT INTO `mr_district` VALUES ('1810', '化州市', '205');
INSERT INTO `mr_district` VALUES ('1811', '信宜市', '205');
INSERT INTO `mr_district` VALUES ('1812', '端州区', '206');
INSERT INTO `mr_district` VALUES ('1813', '鼎湖区', '206');
INSERT INTO `mr_district` VALUES ('1814', '广宁县', '206');
INSERT INTO `mr_district` VALUES ('1815', '怀集县', '206');
INSERT INTO `mr_district` VALUES ('1816', '封开县', '206');
INSERT INTO `mr_district` VALUES ('1817', '德庆县', '206');
INSERT INTO `mr_district` VALUES ('1818', '高要市', '206');
INSERT INTO `mr_district` VALUES ('1819', '四会市', '206');
INSERT INTO `mr_district` VALUES ('1820', '惠城区', '207');
INSERT INTO `mr_district` VALUES ('1821', '惠阳区', '207');
INSERT INTO `mr_district` VALUES ('1822', '博罗县', '207');
INSERT INTO `mr_district` VALUES ('1823', '惠东县', '207');
INSERT INTO `mr_district` VALUES ('1824', '龙门县', '207');
INSERT INTO `mr_district` VALUES ('1825', '梅江区', '208');
INSERT INTO `mr_district` VALUES ('1826', '梅县', '208');
INSERT INTO `mr_district` VALUES ('1827', '大埔县', '208');
INSERT INTO `mr_district` VALUES ('1828', '丰顺县', '208');
INSERT INTO `mr_district` VALUES ('1829', '五华县', '208');
INSERT INTO `mr_district` VALUES ('1830', '平远县', '208');
INSERT INTO `mr_district` VALUES ('1831', '蕉岭县', '208');
INSERT INTO `mr_district` VALUES ('1832', '兴宁市', '208');
INSERT INTO `mr_district` VALUES ('1833', '城区', '209');
INSERT INTO `mr_district` VALUES ('1834', '海丰县', '209');
INSERT INTO `mr_district` VALUES ('1835', '陆河县', '209');
INSERT INTO `mr_district` VALUES ('1836', '陆丰市', '209');
INSERT INTO `mr_district` VALUES ('1837', '源城区', '210');
INSERT INTO `mr_district` VALUES ('1838', '紫金县', '210');
INSERT INTO `mr_district` VALUES ('1839', '龙川县', '210');
INSERT INTO `mr_district` VALUES ('1840', '连平县', '210');
INSERT INTO `mr_district` VALUES ('1841', '和平县', '210');
INSERT INTO `mr_district` VALUES ('1842', '东源县', '210');
INSERT INTO `mr_district` VALUES ('1843', '江城区', '211');
INSERT INTO `mr_district` VALUES ('1844', '阳西县', '211');
INSERT INTO `mr_district` VALUES ('1845', '阳东县', '211');
INSERT INTO `mr_district` VALUES ('1846', '阳春市', '211');
INSERT INTO `mr_district` VALUES ('1847', '清城区', '212');
INSERT INTO `mr_district` VALUES ('1848', '佛冈县', '212');
INSERT INTO `mr_district` VALUES ('1849', '阳山县', '212');
INSERT INTO `mr_district` VALUES ('1850', '连山壮族瑶族自治县', '212');
INSERT INTO `mr_district` VALUES ('1851', '连南瑶族自治县', '212');
INSERT INTO `mr_district` VALUES ('1852', '清新县', '212');
INSERT INTO `mr_district` VALUES ('1853', '英德市', '212');
INSERT INTO `mr_district` VALUES ('1854', '连州市', '212');
INSERT INTO `mr_district` VALUES ('1855', '湘桥区', '215');
INSERT INTO `mr_district` VALUES ('1856', '潮安县', '215');
INSERT INTO `mr_district` VALUES ('1857', '饶平县', '215');
INSERT INTO `mr_district` VALUES ('1858', '榕城区', '216');
INSERT INTO `mr_district` VALUES ('1859', '揭东县', '216');
INSERT INTO `mr_district` VALUES ('1860', '揭西县', '216');
INSERT INTO `mr_district` VALUES ('1861', '惠来县', '216');
INSERT INTO `mr_district` VALUES ('1862', '普宁市', '216');
INSERT INTO `mr_district` VALUES ('1863', '云城区', '217');
INSERT INTO `mr_district` VALUES ('1864', '新兴县', '217');
INSERT INTO `mr_district` VALUES ('1865', '郁南县', '217');
INSERT INTO `mr_district` VALUES ('1866', '云安县', '217');
INSERT INTO `mr_district` VALUES ('1867', '罗定市', '217');
INSERT INTO `mr_district` VALUES ('1868', '兴宁区', '218');
INSERT INTO `mr_district` VALUES ('1869', '青秀区', '218');
INSERT INTO `mr_district` VALUES ('1870', '江南区', '218');
INSERT INTO `mr_district` VALUES ('1871', '西乡塘区', '218');
INSERT INTO `mr_district` VALUES ('1872', '良庆区', '218');
INSERT INTO `mr_district` VALUES ('1873', '邕宁区', '218');
INSERT INTO `mr_district` VALUES ('1874', '武鸣县', '218');
INSERT INTO `mr_district` VALUES ('1875', '隆安县', '218');
INSERT INTO `mr_district` VALUES ('1876', '马山县', '218');
INSERT INTO `mr_district` VALUES ('1877', '上林县', '218');
INSERT INTO `mr_district` VALUES ('1878', '宾阳县', '218');
INSERT INTO `mr_district` VALUES ('1879', '横县', '218');
INSERT INTO `mr_district` VALUES ('1880', '城中区', '219');
INSERT INTO `mr_district` VALUES ('1881', '鱼峰区', '219');
INSERT INTO `mr_district` VALUES ('1882', '柳南区', '219');
INSERT INTO `mr_district` VALUES ('1883', '柳北区', '219');
INSERT INTO `mr_district` VALUES ('1884', '柳江县', '219');
INSERT INTO `mr_district` VALUES ('1885', '柳城县', '219');
INSERT INTO `mr_district` VALUES ('1886', '鹿寨县', '219');
INSERT INTO `mr_district` VALUES ('1887', '融安县', '219');
INSERT INTO `mr_district` VALUES ('1888', '融水苗族自治县', '219');
INSERT INTO `mr_district` VALUES ('1889', '三江侗族自治县', '219');
INSERT INTO `mr_district` VALUES ('1890', '秀峰区', '220');
INSERT INTO `mr_district` VALUES ('1891', '叠彩区', '220');
INSERT INTO `mr_district` VALUES ('1892', '象山区', '220');
INSERT INTO `mr_district` VALUES ('1893', '七星区', '220');
INSERT INTO `mr_district` VALUES ('1894', '雁山区', '220');
INSERT INTO `mr_district` VALUES ('1895', '阳朔县', '220');
INSERT INTO `mr_district` VALUES ('1896', '临桂县', '220');
INSERT INTO `mr_district` VALUES ('1897', '灵川县', '220');
INSERT INTO `mr_district` VALUES ('1898', '全州县', '220');
INSERT INTO `mr_district` VALUES ('1899', '兴安县', '220');
INSERT INTO `mr_district` VALUES ('1900', '永福县', '220');
INSERT INTO `mr_district` VALUES ('1901', '灌阳县', '220');
INSERT INTO `mr_district` VALUES ('1902', '龙胜各族自治县', '220');
INSERT INTO `mr_district` VALUES ('1903', '资源县', '220');
INSERT INTO `mr_district` VALUES ('1904', '平乐县', '220');
INSERT INTO `mr_district` VALUES ('1905', '荔蒲县', '220');
INSERT INTO `mr_district` VALUES ('1906', '恭城瑶族自治县', '220');
INSERT INTO `mr_district` VALUES ('1907', '万秀区', '221');
INSERT INTO `mr_district` VALUES ('1908', '蝶山区', '221');
INSERT INTO `mr_district` VALUES ('1909', '长洲区', '221');
INSERT INTO `mr_district` VALUES ('1910', '苍梧县', '221');
INSERT INTO `mr_district` VALUES ('1911', '藤县', '221');
INSERT INTO `mr_district` VALUES ('1912', '蒙山县', '221');
INSERT INTO `mr_district` VALUES ('1913', '岑溪市', '221');
INSERT INTO `mr_district` VALUES ('1914', '海城区', '222');
INSERT INTO `mr_district` VALUES ('1915', '银海区', '222');
INSERT INTO `mr_district` VALUES ('1916', '铁山港区', '222');
INSERT INTO `mr_district` VALUES ('1917', '合浦县', '222');
INSERT INTO `mr_district` VALUES ('1918', '港口区', '223');
INSERT INTO `mr_district` VALUES ('1919', '防城区', '223');
INSERT INTO `mr_district` VALUES ('1920', '上思县', '223');
INSERT INTO `mr_district` VALUES ('1921', '东兴市', '223');
INSERT INTO `mr_district` VALUES ('1922', '钦南区', '224');
INSERT INTO `mr_district` VALUES ('1923', '钦北区', '224');
INSERT INTO `mr_district` VALUES ('1924', '灵山县', '224');
INSERT INTO `mr_district` VALUES ('1925', '浦北县', '224');
INSERT INTO `mr_district` VALUES ('1926', '港北区', '225');
INSERT INTO `mr_district` VALUES ('1927', '港南区', '225');
INSERT INTO `mr_district` VALUES ('1928', '覃塘区', '225');
INSERT INTO `mr_district` VALUES ('1929', '平南县', '225');
INSERT INTO `mr_district` VALUES ('1930', '桂平市', '225');
INSERT INTO `mr_district` VALUES ('1931', '玉州区', '226');
INSERT INTO `mr_district` VALUES ('1932', '容县', '226');
INSERT INTO `mr_district` VALUES ('1933', '陆川县', '226');
INSERT INTO `mr_district` VALUES ('1934', '博白县', '226');
INSERT INTO `mr_district` VALUES ('1935', '兴业县', '226');
INSERT INTO `mr_district` VALUES ('1936', '北流市', '226');
INSERT INTO `mr_district` VALUES ('1937', '右江区', '227');
INSERT INTO `mr_district` VALUES ('1938', '田阳县', '227');
INSERT INTO `mr_district` VALUES ('1939', '田东县', '227');
INSERT INTO `mr_district` VALUES ('1940', '平果县', '227');
INSERT INTO `mr_district` VALUES ('1941', '德保县', '227');
INSERT INTO `mr_district` VALUES ('1942', '靖西县', '227');
INSERT INTO `mr_district` VALUES ('1943', '那坡县', '227');
INSERT INTO `mr_district` VALUES ('1944', '凌云县', '227');
INSERT INTO `mr_district` VALUES ('1945', '乐业县', '227');
INSERT INTO `mr_district` VALUES ('1946', '田林县', '227');
INSERT INTO `mr_district` VALUES ('1947', '西林县', '227');
INSERT INTO `mr_district` VALUES ('1948', '隆林各族自治县', '227');
INSERT INTO `mr_district` VALUES ('1949', '八步区', '228');
INSERT INTO `mr_district` VALUES ('1950', '昭平县', '228');
INSERT INTO `mr_district` VALUES ('1951', '钟山县', '228');
INSERT INTO `mr_district` VALUES ('1952', '富川瑶族自治县', '228');
INSERT INTO `mr_district` VALUES ('1953', '金城江区', '229');
INSERT INTO `mr_district` VALUES ('1954', '南丹县', '229');
INSERT INTO `mr_district` VALUES ('1955', '天峨县', '229');
INSERT INTO `mr_district` VALUES ('1956', '凤山县', '229');
INSERT INTO `mr_district` VALUES ('1957', '东兰县', '229');
INSERT INTO `mr_district` VALUES ('1958', '罗城仫佬族自治县', '229');
INSERT INTO `mr_district` VALUES ('1959', '环江毛南族自治县', '229');
INSERT INTO `mr_district` VALUES ('1960', '巴马瑶族自治县', '229');
INSERT INTO `mr_district` VALUES ('1961', '都安瑶族自治县', '229');
INSERT INTO `mr_district` VALUES ('1962', '大化瑶族自治县', '229');
INSERT INTO `mr_district` VALUES ('1963', '宜州市', '229');
INSERT INTO `mr_district` VALUES ('1964', '兴宾区', '230');
INSERT INTO `mr_district` VALUES ('1965', '忻城县', '230');
INSERT INTO `mr_district` VALUES ('1966', '象州县', '230');
INSERT INTO `mr_district` VALUES ('1967', '武宣县', '230');
INSERT INTO `mr_district` VALUES ('1968', '金秀瑶族自治县', '230');
INSERT INTO `mr_district` VALUES ('1969', '合山市', '230');
INSERT INTO `mr_district` VALUES ('1970', '江洲区', '231');
INSERT INTO `mr_district` VALUES ('1971', '扶绥县', '231');
INSERT INTO `mr_district` VALUES ('1972', '宁明县', '231');
INSERT INTO `mr_district` VALUES ('1973', '龙州县', '231');
INSERT INTO `mr_district` VALUES ('1974', '大新县', '231');
INSERT INTO `mr_district` VALUES ('1975', '天等县', '231');
INSERT INTO `mr_district` VALUES ('1976', '凭祥市', '231');
INSERT INTO `mr_district` VALUES ('1977', '秀英区', '232');
INSERT INTO `mr_district` VALUES ('1978', '龙华区', '232');
INSERT INTO `mr_district` VALUES ('1979', '琼山区', '232');
INSERT INTO `mr_district` VALUES ('1980', '美兰区', '232');
INSERT INTO `mr_district` VALUES ('1981', '五指山市', '233');
INSERT INTO `mr_district` VALUES ('1982', '琼海市', '233');
INSERT INTO `mr_district` VALUES ('1983', '儋州市', '233');
INSERT INTO `mr_district` VALUES ('1984', '文昌市', '233');
INSERT INTO `mr_district` VALUES ('1985', '万宁市', '233');
INSERT INTO `mr_district` VALUES ('1986', '东方市', '233');
INSERT INTO `mr_district` VALUES ('1987', '定安县', '233');
INSERT INTO `mr_district` VALUES ('1988', '屯昌县', '233');
INSERT INTO `mr_district` VALUES ('1989', '澄迈县', '233');
INSERT INTO `mr_district` VALUES ('1990', '临高县', '233');
INSERT INTO `mr_district` VALUES ('1991', '白沙黎族自治县', '233');
INSERT INTO `mr_district` VALUES ('1992', '昌江黎族自治县', '233');
INSERT INTO `mr_district` VALUES ('1993', '乐东黎族自治县', '233');
INSERT INTO `mr_district` VALUES ('1994', '陵水黎族自治县', '233');
INSERT INTO `mr_district` VALUES ('1995', '保亭黎族苗族自治县', '233');
INSERT INTO `mr_district` VALUES ('1996', '琼中黎族苗族自治县', '233');
INSERT INTO `mr_district` VALUES ('1997', '西沙群岛', '233');
INSERT INTO `mr_district` VALUES ('1998', '南沙群岛', '233');
INSERT INTO `mr_district` VALUES ('1999', '中沙群岛的岛礁及其海域', '233');
INSERT INTO `mr_district` VALUES ('2000', '万州区', '234');
INSERT INTO `mr_district` VALUES ('2001', '涪陵区', '234');
INSERT INTO `mr_district` VALUES ('2002', '渝中区', '234');
INSERT INTO `mr_district` VALUES ('2003', '大渡口区', '234');
INSERT INTO `mr_district` VALUES ('2004', '江北区', '234');
INSERT INTO `mr_district` VALUES ('2005', '沙坪坝区', '234');
INSERT INTO `mr_district` VALUES ('2006', '九龙坡区', '234');
INSERT INTO `mr_district` VALUES ('2007', '南岸区', '234');
INSERT INTO `mr_district` VALUES ('2008', '北碚区', '234');
INSERT INTO `mr_district` VALUES ('2009', '万盛区', '234');
INSERT INTO `mr_district` VALUES ('2010', '双桥区', '234');
INSERT INTO `mr_district` VALUES ('2011', '渝北区', '234');
INSERT INTO `mr_district` VALUES ('2012', '巴南区', '234');
INSERT INTO `mr_district` VALUES ('2013', '黔江区', '234');
INSERT INTO `mr_district` VALUES ('2014', '长寿区', '234');
INSERT INTO `mr_district` VALUES ('2015', '綦江县', '234');
INSERT INTO `mr_district` VALUES ('2016', '潼南县', '234');
INSERT INTO `mr_district` VALUES ('2017', '铜梁县', '234');
INSERT INTO `mr_district` VALUES ('2018', '大足县', '234');
INSERT INTO `mr_district` VALUES ('2019', '荣昌县', '234');
INSERT INTO `mr_district` VALUES ('2020', '璧山县', '234');
INSERT INTO `mr_district` VALUES ('2021', '梁平县', '234');
INSERT INTO `mr_district` VALUES ('2022', '城口县', '234');
INSERT INTO `mr_district` VALUES ('2023', '丰都县', '234');
INSERT INTO `mr_district` VALUES ('2024', '垫江县', '234');
INSERT INTO `mr_district` VALUES ('2025', '武隆县', '234');
INSERT INTO `mr_district` VALUES ('2026', '忠县', '234');
INSERT INTO `mr_district` VALUES ('2027', '开县', '234');
INSERT INTO `mr_district` VALUES ('2028', '云阳县', '234');
INSERT INTO `mr_district` VALUES ('2029', '奉节县', '234');
INSERT INTO `mr_district` VALUES ('2030', '巫山县', '234');
INSERT INTO `mr_district` VALUES ('2031', '巫溪县', '234');
INSERT INTO `mr_district` VALUES ('2032', '石柱土家族自治县', '234');
INSERT INTO `mr_district` VALUES ('2033', '秀山土家族苗族自治县', '234');
INSERT INTO `mr_district` VALUES ('2034', '酉阳土家族苗族自治县', '234');
INSERT INTO `mr_district` VALUES ('2035', '彭水苗族土家族自治县', '234');
INSERT INTO `mr_district` VALUES ('2036', '江津市', '234');
INSERT INTO `mr_district` VALUES ('2037', '合川市', '234');
INSERT INTO `mr_district` VALUES ('2038', '永川市', '234');
INSERT INTO `mr_district` VALUES ('2039', '南川市', '234');
INSERT INTO `mr_district` VALUES ('2040', '锦江区', '235');
INSERT INTO `mr_district` VALUES ('2041', '青羊区', '235');
INSERT INTO `mr_district` VALUES ('2042', '金牛区', '235');
INSERT INTO `mr_district` VALUES ('2043', '武侯区', '235');
INSERT INTO `mr_district` VALUES ('2044', '成华区', '235');
INSERT INTO `mr_district` VALUES ('2045', '龙泉驿区', '235');
INSERT INTO `mr_district` VALUES ('2046', '青白江区', '235');
INSERT INTO `mr_district` VALUES ('2047', '新都区', '235');
INSERT INTO `mr_district` VALUES ('2048', '温江区', '235');
INSERT INTO `mr_district` VALUES ('2049', '金堂县', '235');
INSERT INTO `mr_district` VALUES ('2050', '双流县', '235');
INSERT INTO `mr_district` VALUES ('2051', '郫县', '235');
INSERT INTO `mr_district` VALUES ('2052', '大邑县', '235');
INSERT INTO `mr_district` VALUES ('2053', '蒲江县', '235');
INSERT INTO `mr_district` VALUES ('2054', '新津县', '235');
INSERT INTO `mr_district` VALUES ('2055', '都江堰市', '235');
INSERT INTO `mr_district` VALUES ('2056', '彭州市', '235');
INSERT INTO `mr_district` VALUES ('2057', '邛崃市', '235');
INSERT INTO `mr_district` VALUES ('2058', '崇州市', '235');
INSERT INTO `mr_district` VALUES ('2059', '自流井区', '236');
INSERT INTO `mr_district` VALUES ('2060', '贡井区', '236');
INSERT INTO `mr_district` VALUES ('2061', '大安区', '236');
INSERT INTO `mr_district` VALUES ('2062', '沿滩区', '236');
INSERT INTO `mr_district` VALUES ('2063', '荣县', '236');
INSERT INTO `mr_district` VALUES ('2064', '富顺县', '236');
INSERT INTO `mr_district` VALUES ('2065', '东区', '237');
INSERT INTO `mr_district` VALUES ('2066', '西区', '237');
INSERT INTO `mr_district` VALUES ('2067', '仁和区', '237');
INSERT INTO `mr_district` VALUES ('2068', '米易县', '237');
INSERT INTO `mr_district` VALUES ('2069', '盐边县', '237');
INSERT INTO `mr_district` VALUES ('2070', '江阳区', '238');
INSERT INTO `mr_district` VALUES ('2071', '纳溪区', '238');
INSERT INTO `mr_district` VALUES ('2072', '龙马潭区', '238');
INSERT INTO `mr_district` VALUES ('2073', '泸县', '238');
INSERT INTO `mr_district` VALUES ('2074', '合江县', '238');
INSERT INTO `mr_district` VALUES ('2075', '叙永县', '238');
INSERT INTO `mr_district` VALUES ('2076', '古蔺县', '238');
INSERT INTO `mr_district` VALUES ('2077', '旌阳区', '239');
INSERT INTO `mr_district` VALUES ('2078', '中江县', '239');
INSERT INTO `mr_district` VALUES ('2079', '罗江县', '239');
INSERT INTO `mr_district` VALUES ('2080', '广汉市', '239');
INSERT INTO `mr_district` VALUES ('2081', '什邡市', '239');
INSERT INTO `mr_district` VALUES ('2082', '绵竹市', '239');
INSERT INTO `mr_district` VALUES ('2083', '涪城区', '240');
INSERT INTO `mr_district` VALUES ('2084', '游仙区', '240');
INSERT INTO `mr_district` VALUES ('2085', '三台县', '240');
INSERT INTO `mr_district` VALUES ('2086', '盐亭县', '240');
INSERT INTO `mr_district` VALUES ('2087', '安县', '240');
INSERT INTO `mr_district` VALUES ('2088', '梓潼县', '240');
INSERT INTO `mr_district` VALUES ('2089', '北川羌族自治县', '240');
INSERT INTO `mr_district` VALUES ('2090', '平武县', '240');
INSERT INTO `mr_district` VALUES ('2091', '江油市', '240');
INSERT INTO `mr_district` VALUES ('2092', '市中区', '241');
INSERT INTO `mr_district` VALUES ('2093', '元坝区', '241');
INSERT INTO `mr_district` VALUES ('2094', '朝天区', '241');
INSERT INTO `mr_district` VALUES ('2095', '旺苍县', '241');
INSERT INTO `mr_district` VALUES ('2096', '青川县', '241');
INSERT INTO `mr_district` VALUES ('2097', '剑阁县', '241');
INSERT INTO `mr_district` VALUES ('2098', '苍溪县', '241');
INSERT INTO `mr_district` VALUES ('2099', '船山区', '242');
INSERT INTO `mr_district` VALUES ('2100', '安居区', '242');
INSERT INTO `mr_district` VALUES ('2101', '蓬溪县', '242');
INSERT INTO `mr_district` VALUES ('2102', '射洪县', '242');
INSERT INTO `mr_district` VALUES ('2103', '大英县', '242');
INSERT INTO `mr_district` VALUES ('2104', '市中区', '243');
INSERT INTO `mr_district` VALUES ('2105', '东兴区', '243');
INSERT INTO `mr_district` VALUES ('2106', '威远县', '243');
INSERT INTO `mr_district` VALUES ('2107', '资中县', '243');
INSERT INTO `mr_district` VALUES ('2108', '隆昌县', '243');
INSERT INTO `mr_district` VALUES ('2109', '市中区', '244');
INSERT INTO `mr_district` VALUES ('2110', '沙湾区', '244');
INSERT INTO `mr_district` VALUES ('2111', '五通桥区', '244');
INSERT INTO `mr_district` VALUES ('2112', '金口河区', '244');
INSERT INTO `mr_district` VALUES ('2113', '犍为县', '244');
INSERT INTO `mr_district` VALUES ('2114', '井研县', '244');
INSERT INTO `mr_district` VALUES ('2115', '夹江县', '244');
INSERT INTO `mr_district` VALUES ('2116', '沐川县', '244');
INSERT INTO `mr_district` VALUES ('2117', '峨边彝族自治县', '244');
INSERT INTO `mr_district` VALUES ('2118', '马边彝族自治县', '244');
INSERT INTO `mr_district` VALUES ('2119', '峨眉山市', '244');
INSERT INTO `mr_district` VALUES ('2120', '顺庆区', '245');
INSERT INTO `mr_district` VALUES ('2121', '高坪区', '245');
INSERT INTO `mr_district` VALUES ('2122', '嘉陵区', '245');
INSERT INTO `mr_district` VALUES ('2123', '南部县', '245');
INSERT INTO `mr_district` VALUES ('2124', '营山县', '245');
INSERT INTO `mr_district` VALUES ('2125', '蓬安县', '245');
INSERT INTO `mr_district` VALUES ('2126', '仪陇县', '245');
INSERT INTO `mr_district` VALUES ('2127', '西充县', '245');
INSERT INTO `mr_district` VALUES ('2128', '阆中市', '245');
INSERT INTO `mr_district` VALUES ('2129', '东坡区', '246');
INSERT INTO `mr_district` VALUES ('2130', '仁寿县', '246');
INSERT INTO `mr_district` VALUES ('2131', '彭山县', '246');
INSERT INTO `mr_district` VALUES ('2132', '洪雅县', '246');
INSERT INTO `mr_district` VALUES ('2133', '丹棱县', '246');
INSERT INTO `mr_district` VALUES ('2134', '青神县', '246');
INSERT INTO `mr_district` VALUES ('2135', '翠屏区', '247');
INSERT INTO `mr_district` VALUES ('2136', '宜宾县', '247');
INSERT INTO `mr_district` VALUES ('2137', '南溪县', '247');
INSERT INTO `mr_district` VALUES ('2138', '江安县', '247');
INSERT INTO `mr_district` VALUES ('2139', '长宁县', '247');
INSERT INTO `mr_district` VALUES ('2140', '高县', '247');
INSERT INTO `mr_district` VALUES ('2141', '珙县', '247');
INSERT INTO `mr_district` VALUES ('2142', '筠连县', '247');
INSERT INTO `mr_district` VALUES ('2143', '兴文县', '247');
INSERT INTO `mr_district` VALUES ('2144', '屏山县', '247');
INSERT INTO `mr_district` VALUES ('2145', '广安区', '248');
INSERT INTO `mr_district` VALUES ('2146', '岳池县', '248');
INSERT INTO `mr_district` VALUES ('2147', '武胜县', '248');
INSERT INTO `mr_district` VALUES ('2148', '邻水县', '248');
INSERT INTO `mr_district` VALUES ('2149', '华蓥市', '248');
INSERT INTO `mr_district` VALUES ('2150', '通川区', '249');
INSERT INTO `mr_district` VALUES ('2151', '达县', '249');
INSERT INTO `mr_district` VALUES ('2152', '宣汉县', '249');
INSERT INTO `mr_district` VALUES ('2153', '开江县', '249');
INSERT INTO `mr_district` VALUES ('2154', '大竹县', '249');
INSERT INTO `mr_district` VALUES ('2155', '渠县', '249');
INSERT INTO `mr_district` VALUES ('2156', '万源市', '249');
INSERT INTO `mr_district` VALUES ('2157', '雨城区', '250');
INSERT INTO `mr_district` VALUES ('2158', '名山县', '250');
INSERT INTO `mr_district` VALUES ('2159', '荥经县', '250');
INSERT INTO `mr_district` VALUES ('2160', '汉源县', '250');
INSERT INTO `mr_district` VALUES ('2161', '石棉县', '250');
INSERT INTO `mr_district` VALUES ('2162', '天全县', '250');
INSERT INTO `mr_district` VALUES ('2163', '芦山县', '250');
INSERT INTO `mr_district` VALUES ('2164', '宝兴县', '250');
INSERT INTO `mr_district` VALUES ('2165', '巴州区', '251');
INSERT INTO `mr_district` VALUES ('2166', '通江县', '251');
INSERT INTO `mr_district` VALUES ('2167', '南江县', '251');
INSERT INTO `mr_district` VALUES ('2168', '平昌县', '251');
INSERT INTO `mr_district` VALUES ('2169', '雁江区', '252');
INSERT INTO `mr_district` VALUES ('2170', '安岳县', '252');
INSERT INTO `mr_district` VALUES ('2171', '乐至县', '252');
INSERT INTO `mr_district` VALUES ('2172', '简阳市', '252');
INSERT INTO `mr_district` VALUES ('2173', '汶川县', '253');
INSERT INTO `mr_district` VALUES ('2174', '理县', '253');
INSERT INTO `mr_district` VALUES ('2175', '茂县', '253');
INSERT INTO `mr_district` VALUES ('2176', '松潘县', '253');
INSERT INTO `mr_district` VALUES ('2177', '九寨沟县', '253');
INSERT INTO `mr_district` VALUES ('2178', '金川县', '253');
INSERT INTO `mr_district` VALUES ('2179', '小金县', '253');
INSERT INTO `mr_district` VALUES ('2180', '黑水县', '253');
INSERT INTO `mr_district` VALUES ('2181', '马尔康县', '253');
INSERT INTO `mr_district` VALUES ('2182', '壤塘县', '253');
INSERT INTO `mr_district` VALUES ('2183', '阿坝县', '253');
INSERT INTO `mr_district` VALUES ('2184', '若尔盖县', '253');
INSERT INTO `mr_district` VALUES ('2185', '红原县', '253');
INSERT INTO `mr_district` VALUES ('2186', '康定县', '254');
INSERT INTO `mr_district` VALUES ('2187', '泸定县', '254');
INSERT INTO `mr_district` VALUES ('2188', '丹巴县', '254');
INSERT INTO `mr_district` VALUES ('2189', '九龙县', '254');
INSERT INTO `mr_district` VALUES ('2190', '雅江县', '254');
INSERT INTO `mr_district` VALUES ('2191', '道孚县', '254');
INSERT INTO `mr_district` VALUES ('2192', '炉霍县', '254');
INSERT INTO `mr_district` VALUES ('2193', '甘孜县', '254');
INSERT INTO `mr_district` VALUES ('2194', '新龙县', '254');
INSERT INTO `mr_district` VALUES ('2195', '德格县', '254');
INSERT INTO `mr_district` VALUES ('2196', '白玉县', '254');
INSERT INTO `mr_district` VALUES ('2197', '石渠县', '254');
INSERT INTO `mr_district` VALUES ('2198', '色达县', '254');
INSERT INTO `mr_district` VALUES ('2199', '理塘县', '254');
INSERT INTO `mr_district` VALUES ('2200', '巴塘县', '254');
INSERT INTO `mr_district` VALUES ('2201', '乡城县', '254');
INSERT INTO `mr_district` VALUES ('2202', '稻城县', '254');
INSERT INTO `mr_district` VALUES ('2203', '得荣县', '254');
INSERT INTO `mr_district` VALUES ('2204', '西昌市', '255');
INSERT INTO `mr_district` VALUES ('2205', '木里藏族自治县', '255');
INSERT INTO `mr_district` VALUES ('2206', '盐源县', '255');
INSERT INTO `mr_district` VALUES ('2207', '德昌县', '255');
INSERT INTO `mr_district` VALUES ('2208', '会理县', '255');
INSERT INTO `mr_district` VALUES ('2209', '会东县', '255');
INSERT INTO `mr_district` VALUES ('2210', '宁南县', '255');
INSERT INTO `mr_district` VALUES ('2211', '普格县', '255');
INSERT INTO `mr_district` VALUES ('2212', '布拖县', '255');
INSERT INTO `mr_district` VALUES ('2213', '金阳县', '255');
INSERT INTO `mr_district` VALUES ('2214', '昭觉县', '255');
INSERT INTO `mr_district` VALUES ('2215', '喜德县', '255');
INSERT INTO `mr_district` VALUES ('2216', '冕宁县', '255');
INSERT INTO `mr_district` VALUES ('2217', '越西县', '255');
INSERT INTO `mr_district` VALUES ('2218', '甘洛县', '255');
INSERT INTO `mr_district` VALUES ('2219', '美姑县', '255');
INSERT INTO `mr_district` VALUES ('2220', '雷波县', '255');
INSERT INTO `mr_district` VALUES ('2221', '南明区', '256');
INSERT INTO `mr_district` VALUES ('2222', '云岩区', '256');
INSERT INTO `mr_district` VALUES ('2223', '花溪区', '256');
INSERT INTO `mr_district` VALUES ('2224', '乌当区', '256');
INSERT INTO `mr_district` VALUES ('2225', '白云区', '256');
INSERT INTO `mr_district` VALUES ('2226', '小河区', '256');
INSERT INTO `mr_district` VALUES ('2227', '开阳县', '256');
INSERT INTO `mr_district` VALUES ('2228', '息烽县', '256');
INSERT INTO `mr_district` VALUES ('2229', '修文县', '256');
INSERT INTO `mr_district` VALUES ('2230', '清镇市', '256');
INSERT INTO `mr_district` VALUES ('2231', '钟山区', '257');
INSERT INTO `mr_district` VALUES ('2232', '六枝特区', '257');
INSERT INTO `mr_district` VALUES ('2233', '水城县', '257');
INSERT INTO `mr_district` VALUES ('2234', '盘县', '257');
INSERT INTO `mr_district` VALUES ('2235', '红花岗区', '258');
INSERT INTO `mr_district` VALUES ('2236', '汇川区', '258');
INSERT INTO `mr_district` VALUES ('2237', '遵义县', '258');
INSERT INTO `mr_district` VALUES ('2238', '桐梓县', '258');
INSERT INTO `mr_district` VALUES ('2239', '绥阳县', '258');
INSERT INTO `mr_district` VALUES ('2240', '正安县', '258');
INSERT INTO `mr_district` VALUES ('2241', '道真仡佬族苗族自治县', '258');
INSERT INTO `mr_district` VALUES ('2242', '务川仡佬族苗族自治县', '258');
INSERT INTO `mr_district` VALUES ('2243', '凤冈县', '258');
INSERT INTO `mr_district` VALUES ('2244', '湄潭县', '258');
INSERT INTO `mr_district` VALUES ('2245', '余庆县', '258');
INSERT INTO `mr_district` VALUES ('2246', '习水县', '258');
INSERT INTO `mr_district` VALUES ('2247', '赤水市', '258');
INSERT INTO `mr_district` VALUES ('2248', '仁怀市', '258');
INSERT INTO `mr_district` VALUES ('2249', '西秀区', '259');
INSERT INTO `mr_district` VALUES ('2250', '平坝县', '259');
INSERT INTO `mr_district` VALUES ('2251', '普定县', '259');
INSERT INTO `mr_district` VALUES ('2252', '镇宁布依族苗族自治县', '259');
INSERT INTO `mr_district` VALUES ('2253', '关岭布依族苗族自治县', '259');
INSERT INTO `mr_district` VALUES ('2254', '紫云苗族布依族自治县', '259');
INSERT INTO `mr_district` VALUES ('2255', '铜仁市', '260');
INSERT INTO `mr_district` VALUES ('2256', '江口县', '260');
INSERT INTO `mr_district` VALUES ('2257', '玉屏侗族自治县', '260');
INSERT INTO `mr_district` VALUES ('2258', '石阡县', '260');
INSERT INTO `mr_district` VALUES ('2259', '思南县', '260');
INSERT INTO `mr_district` VALUES ('2260', '印江土家族苗族自治县', '260');
INSERT INTO `mr_district` VALUES ('2261', '德江县', '260');
INSERT INTO `mr_district` VALUES ('2262', '沿河土家族自治县', '260');
INSERT INTO `mr_district` VALUES ('2263', '松桃苗族自治县', '260');
INSERT INTO `mr_district` VALUES ('2264', '万山特区', '260');
INSERT INTO `mr_district` VALUES ('2265', '兴义市', '261');
INSERT INTO `mr_district` VALUES ('2266', '兴仁县', '261');
INSERT INTO `mr_district` VALUES ('2267', '普安县', '261');
INSERT INTO `mr_district` VALUES ('2268', '晴隆县', '261');
INSERT INTO `mr_district` VALUES ('2269', '贞丰县', '261');
INSERT INTO `mr_district` VALUES ('2270', '望谟县', '261');
INSERT INTO `mr_district` VALUES ('2271', '册亨县', '261');
INSERT INTO `mr_district` VALUES ('2272', '安龙县', '261');
INSERT INTO `mr_district` VALUES ('2273', '毕节市', '262');
INSERT INTO `mr_district` VALUES ('2274', '大方县', '262');
INSERT INTO `mr_district` VALUES ('2275', '黔西县', '262');
INSERT INTO `mr_district` VALUES ('2276', '金沙县', '262');
INSERT INTO `mr_district` VALUES ('2277', '织金县', '262');
INSERT INTO `mr_district` VALUES ('2278', '纳雍县', '262');
INSERT INTO `mr_district` VALUES ('2279', '威宁彝族回族苗族自治县', '262');
INSERT INTO `mr_district` VALUES ('2280', '赫章县', '262');
INSERT INTO `mr_district` VALUES ('2281', '凯里市', '263');
INSERT INTO `mr_district` VALUES ('2282', '黄平县', '263');
INSERT INTO `mr_district` VALUES ('2283', '施秉县', '263');
INSERT INTO `mr_district` VALUES ('2284', '三穗县', '263');
INSERT INTO `mr_district` VALUES ('2285', '镇远县', '263');
INSERT INTO `mr_district` VALUES ('2286', '岑巩县', '263');
INSERT INTO `mr_district` VALUES ('2287', '天柱县', '263');
INSERT INTO `mr_district` VALUES ('2288', '锦屏县', '263');
INSERT INTO `mr_district` VALUES ('2289', '剑河县', '263');
INSERT INTO `mr_district` VALUES ('2290', '台江县', '263');
INSERT INTO `mr_district` VALUES ('2291', '黎平县', '263');
INSERT INTO `mr_district` VALUES ('2292', '榕江县', '263');
INSERT INTO `mr_district` VALUES ('2293', '从江县', '263');
INSERT INTO `mr_district` VALUES ('2294', '雷山县', '263');
INSERT INTO `mr_district` VALUES ('2295', '麻江县', '263');
INSERT INTO `mr_district` VALUES ('2296', '丹寨县', '263');
INSERT INTO `mr_district` VALUES ('2297', '都匀市', '264');
INSERT INTO `mr_district` VALUES ('2298', '福泉市', '264');
INSERT INTO `mr_district` VALUES ('2299', '荔波县', '264');
INSERT INTO `mr_district` VALUES ('2300', '贵定县', '264');
INSERT INTO `mr_district` VALUES ('2301', '瓮安县', '264');
INSERT INTO `mr_district` VALUES ('2302', '独山县', '264');
INSERT INTO `mr_district` VALUES ('2303', '平塘县', '264');
INSERT INTO `mr_district` VALUES ('2304', '罗甸县', '264');
INSERT INTO `mr_district` VALUES ('2305', '长顺县', '264');
INSERT INTO `mr_district` VALUES ('2306', '龙里县', '264');
INSERT INTO `mr_district` VALUES ('2307', '惠水县', '264');
INSERT INTO `mr_district` VALUES ('2308', '三都水族自治县', '264');
INSERT INTO `mr_district` VALUES ('2309', '五华区', '265');
INSERT INTO `mr_district` VALUES ('2310', '盘龙区', '265');
INSERT INTO `mr_district` VALUES ('2311', '官渡区', '265');
INSERT INTO `mr_district` VALUES ('2312', '西山区', '265');
INSERT INTO `mr_district` VALUES ('2313', '东川区', '265');
INSERT INTO `mr_district` VALUES ('2314', '呈贡县', '265');
INSERT INTO `mr_district` VALUES ('2315', '晋宁县', '265');
INSERT INTO `mr_district` VALUES ('2316', '富民县', '265');
INSERT INTO `mr_district` VALUES ('2317', '宜良县', '265');
INSERT INTO `mr_district` VALUES ('2318', '石林彝族自治县', '265');
INSERT INTO `mr_district` VALUES ('2319', '嵩明县', '265');
INSERT INTO `mr_district` VALUES ('2320', '禄劝彝族苗族自治县', '265');
INSERT INTO `mr_district` VALUES ('2321', '寻甸回族彝族自治县', '265');
INSERT INTO `mr_district` VALUES ('2322', '安宁市', '265');
INSERT INTO `mr_district` VALUES ('2323', '麒麟区', '266');
INSERT INTO `mr_district` VALUES ('2324', '马龙县', '266');
INSERT INTO `mr_district` VALUES ('2325', '陆良县', '266');
INSERT INTO `mr_district` VALUES ('2326', '师宗县', '266');
INSERT INTO `mr_district` VALUES ('2327', '罗平县', '266');
INSERT INTO `mr_district` VALUES ('2328', '富源县', '266');
INSERT INTO `mr_district` VALUES ('2329', '会泽县', '266');
INSERT INTO `mr_district` VALUES ('2330', '沾益县', '266');
INSERT INTO `mr_district` VALUES ('2331', '宣威市', '266');
INSERT INTO `mr_district` VALUES ('2332', '红塔区', '267');
INSERT INTO `mr_district` VALUES ('2333', '江川县', '267');
INSERT INTO `mr_district` VALUES ('2334', '澄江县', '267');
INSERT INTO `mr_district` VALUES ('2335', '通海县', '267');
INSERT INTO `mr_district` VALUES ('2336', '华宁县', '267');
INSERT INTO `mr_district` VALUES ('2337', '易门县', '267');
INSERT INTO `mr_district` VALUES ('2338', '峨山彝族自治县', '267');
INSERT INTO `mr_district` VALUES ('2339', '新平彝族傣族自治县', '267');
INSERT INTO `mr_district` VALUES ('2340', '元江哈尼族彝族傣族自治县', '267');
INSERT INTO `mr_district` VALUES ('2341', '隆阳区', '268');
INSERT INTO `mr_district` VALUES ('2342', '施甸县', '268');
INSERT INTO `mr_district` VALUES ('2343', '腾冲县', '268');
INSERT INTO `mr_district` VALUES ('2344', '龙陵县', '268');
INSERT INTO `mr_district` VALUES ('2345', '昌宁县', '268');
INSERT INTO `mr_district` VALUES ('2346', '昭阳区', '269');
INSERT INTO `mr_district` VALUES ('2347', '鲁甸县', '269');
INSERT INTO `mr_district` VALUES ('2348', '巧家县', '269');
INSERT INTO `mr_district` VALUES ('2349', '盐津县', '269');
INSERT INTO `mr_district` VALUES ('2350', '大关县', '269');
INSERT INTO `mr_district` VALUES ('2351', '永善县', '269');
INSERT INTO `mr_district` VALUES ('2352', '绥江县', '269');
INSERT INTO `mr_district` VALUES ('2353', '镇雄县', '269');
INSERT INTO `mr_district` VALUES ('2354', '彝良县', '269');
INSERT INTO `mr_district` VALUES ('2355', '威信县', '269');
INSERT INTO `mr_district` VALUES ('2356', '水富县', '269');
INSERT INTO `mr_district` VALUES ('2357', '古城区', '270');
INSERT INTO `mr_district` VALUES ('2358', '玉龙纳西族自治县', '270');
INSERT INTO `mr_district` VALUES ('2359', '永胜县', '270');
INSERT INTO `mr_district` VALUES ('2360', '华坪县', '270');
INSERT INTO `mr_district` VALUES ('2361', '宁蒗彝族自治县', '270');
INSERT INTO `mr_district` VALUES ('2362', '翠云区', '271');
INSERT INTO `mr_district` VALUES ('2363', '普洱哈尼族彝族自治县', '271');
INSERT INTO `mr_district` VALUES ('2364', '墨江哈尼族自治县', '271');
INSERT INTO `mr_district` VALUES ('2365', '景东彝族自治县', '271');
INSERT INTO `mr_district` VALUES ('2366', '景谷傣族彝族自治县', '271');
INSERT INTO `mr_district` VALUES ('2367', '镇沅彝族哈尼族拉祜族自治县', '271');
INSERT INTO `mr_district` VALUES ('2368', '江城哈尼族彝族自治县', '271');
INSERT INTO `mr_district` VALUES ('2369', '孟连傣族拉祜族佤族自治县', '271');
INSERT INTO `mr_district` VALUES ('2370', '澜沧拉祜族自治县', '271');
INSERT INTO `mr_district` VALUES ('2371', '西盟佤族自治县', '271');
INSERT INTO `mr_district` VALUES ('2372', '临翔区', '272');
INSERT INTO `mr_district` VALUES ('2373', '凤庆县', '272');
INSERT INTO `mr_district` VALUES ('2374', '云县', '272');
INSERT INTO `mr_district` VALUES ('2375', '永德县', '272');
INSERT INTO `mr_district` VALUES ('2376', '镇康县', '272');
INSERT INTO `mr_district` VALUES ('2377', '双江拉祜族佤族布朗族傣族自治县', '272');
INSERT INTO `mr_district` VALUES ('2378', '耿马傣族佤族自治县', '272');
INSERT INTO `mr_district` VALUES ('2379', '沧源佤族自治县', '272');
INSERT INTO `mr_district` VALUES ('2380', '楚雄市', '273');
INSERT INTO `mr_district` VALUES ('2381', '双柏县', '273');
INSERT INTO `mr_district` VALUES ('2382', '牟定县', '273');
INSERT INTO `mr_district` VALUES ('2383', '南华县', '273');
INSERT INTO `mr_district` VALUES ('2384', '姚安县', '273');
INSERT INTO `mr_district` VALUES ('2385', '大姚县', '273');
INSERT INTO `mr_district` VALUES ('2386', '永仁县', '273');
INSERT INTO `mr_district` VALUES ('2387', '元谋县', '273');
INSERT INTO `mr_district` VALUES ('2388', '武定县', '273');
INSERT INTO `mr_district` VALUES ('2389', '禄丰县', '273');
INSERT INTO `mr_district` VALUES ('2390', '个旧市', '274');
INSERT INTO `mr_district` VALUES ('2391', '开远市', '274');
INSERT INTO `mr_district` VALUES ('2392', '蒙自县', '274');
INSERT INTO `mr_district` VALUES ('2393', '屏边苗族自治县', '274');
INSERT INTO `mr_district` VALUES ('2394', '建水县', '274');
INSERT INTO `mr_district` VALUES ('2395', '石屏县', '274');
INSERT INTO `mr_district` VALUES ('2396', '弥勒县', '274');
INSERT INTO `mr_district` VALUES ('2397', '泸西县', '274');
INSERT INTO `mr_district` VALUES ('2398', '元阳县', '274');
INSERT INTO `mr_district` VALUES ('2399', '红河县', '274');
INSERT INTO `mr_district` VALUES ('2400', '金平苗族瑶族傣族自治县', '274');
INSERT INTO `mr_district` VALUES ('2401', '绿春县', '274');
INSERT INTO `mr_district` VALUES ('2402', '河口瑶族自治县', '274');
INSERT INTO `mr_district` VALUES ('2403', '文山县', '275');
INSERT INTO `mr_district` VALUES ('2404', '砚山县', '275');
INSERT INTO `mr_district` VALUES ('2405', '西畴县', '275');
INSERT INTO `mr_district` VALUES ('2406', '麻栗坡县', '275');
INSERT INTO `mr_district` VALUES ('2407', '马关县', '275');
INSERT INTO `mr_district` VALUES ('2408', '丘北县', '275');
INSERT INTO `mr_district` VALUES ('2409', '广南县', '275');
INSERT INTO `mr_district` VALUES ('2410', '富宁县', '275');
INSERT INTO `mr_district` VALUES ('2411', '景洪市', '276');
INSERT INTO `mr_district` VALUES ('2412', '勐海县', '276');
INSERT INTO `mr_district` VALUES ('2413', '勐腊县', '276');
INSERT INTO `mr_district` VALUES ('2414', '大理市', '277');
INSERT INTO `mr_district` VALUES ('2415', '漾濞彝族自治县', '277');
INSERT INTO `mr_district` VALUES ('2416', '祥云县', '277');
INSERT INTO `mr_district` VALUES ('2417', '宾川县', '277');
INSERT INTO `mr_district` VALUES ('2418', '弥渡县', '277');
INSERT INTO `mr_district` VALUES ('2419', '南涧彝族自治县', '277');
INSERT INTO `mr_district` VALUES ('2420', '巍山彝族回族自治县', '277');
INSERT INTO `mr_district` VALUES ('2421', '永平县', '277');
INSERT INTO `mr_district` VALUES ('2422', '云龙县', '277');
INSERT INTO `mr_district` VALUES ('2423', '洱源县', '277');
INSERT INTO `mr_district` VALUES ('2424', '剑川县', '277');
INSERT INTO `mr_district` VALUES ('2425', '鹤庆县', '277');
INSERT INTO `mr_district` VALUES ('2426', '瑞丽市', '278');
INSERT INTO `mr_district` VALUES ('2427', '潞西市', '278');
INSERT INTO `mr_district` VALUES ('2428', '梁河县', '278');
INSERT INTO `mr_district` VALUES ('2429', '盈江县', '278');
INSERT INTO `mr_district` VALUES ('2430', '陇川县', '278');
INSERT INTO `mr_district` VALUES ('2431', '泸水县', '279');
INSERT INTO `mr_district` VALUES ('2432', '福贡县', '279');
INSERT INTO `mr_district` VALUES ('2433', '贡山独龙族怒族自治县', '279');
INSERT INTO `mr_district` VALUES ('2434', '兰坪白族普米族自治县', '279');
INSERT INTO `mr_district` VALUES ('2435', '香格里拉县', '280');
INSERT INTO `mr_district` VALUES ('2436', '德钦县', '280');
INSERT INTO `mr_district` VALUES ('2437', '维西傈僳族自治县', '280');
INSERT INTO `mr_district` VALUES ('2438', '城关区', '281');
INSERT INTO `mr_district` VALUES ('2439', '林周县', '281');
INSERT INTO `mr_district` VALUES ('2440', '当雄县', '281');
INSERT INTO `mr_district` VALUES ('2441', '尼木县', '281');
INSERT INTO `mr_district` VALUES ('2442', '曲水县', '281');
INSERT INTO `mr_district` VALUES ('2443', '堆龙德庆县', '281');
INSERT INTO `mr_district` VALUES ('2444', '达孜县', '281');
INSERT INTO `mr_district` VALUES ('2445', '墨竹工卡县', '281');
INSERT INTO `mr_district` VALUES ('2446', '昌都县', '282');
INSERT INTO `mr_district` VALUES ('2447', '江达县', '282');
INSERT INTO `mr_district` VALUES ('2448', '贡觉县', '282');
INSERT INTO `mr_district` VALUES ('2449', '类乌齐县', '282');
INSERT INTO `mr_district` VALUES ('2450', '丁青县', '282');
INSERT INTO `mr_district` VALUES ('2451', '察雅县', '282');
INSERT INTO `mr_district` VALUES ('2452', '八宿县', '282');
INSERT INTO `mr_district` VALUES ('2453', '左贡县', '282');
INSERT INTO `mr_district` VALUES ('2454', '芒康县', '282');
INSERT INTO `mr_district` VALUES ('2455', '洛隆县', '282');
INSERT INTO `mr_district` VALUES ('2456', '边坝县', '282');
INSERT INTO `mr_district` VALUES ('2457', '乃东县', '283');
INSERT INTO `mr_district` VALUES ('2458', '扎囊县', '283');
INSERT INTO `mr_district` VALUES ('2459', '贡嘎县', '283');
INSERT INTO `mr_district` VALUES ('2460', '桑日县', '283');
INSERT INTO `mr_district` VALUES ('2461', '琼结县', '283');
INSERT INTO `mr_district` VALUES ('2462', '曲松县', '283');
INSERT INTO `mr_district` VALUES ('2463', '措美县', '283');
INSERT INTO `mr_district` VALUES ('2464', '洛扎县', '283');
INSERT INTO `mr_district` VALUES ('2465', '加查县', '283');
INSERT INTO `mr_district` VALUES ('2466', '隆子县', '283');
INSERT INTO `mr_district` VALUES ('2467', '错那县', '283');
INSERT INTO `mr_district` VALUES ('2468', '浪卡子县', '283');
INSERT INTO `mr_district` VALUES ('2469', '日喀则市', '284');
INSERT INTO `mr_district` VALUES ('2470', '南木林县', '284');
INSERT INTO `mr_district` VALUES ('2471', '江孜县', '284');
INSERT INTO `mr_district` VALUES ('2472', '定日县', '284');
INSERT INTO `mr_district` VALUES ('2473', '萨迦县', '284');
INSERT INTO `mr_district` VALUES ('2474', '拉孜县', '284');
INSERT INTO `mr_district` VALUES ('2475', '昂仁县', '284');
INSERT INTO `mr_district` VALUES ('2476', '谢通门县', '284');
INSERT INTO `mr_district` VALUES ('2477', '白朗县', '284');
INSERT INTO `mr_district` VALUES ('2478', '仁布县', '284');
INSERT INTO `mr_district` VALUES ('2479', '康马县', '284');
INSERT INTO `mr_district` VALUES ('2480', '定结县', '284');
INSERT INTO `mr_district` VALUES ('2481', '仲巴县', '284');
INSERT INTO `mr_district` VALUES ('2482', '亚东县', '284');
INSERT INTO `mr_district` VALUES ('2483', '吉隆县', '284');
INSERT INTO `mr_district` VALUES ('2484', '聂拉木县', '284');
INSERT INTO `mr_district` VALUES ('2485', '萨嘎县', '284');
INSERT INTO `mr_district` VALUES ('2486', '岗巴县', '284');
INSERT INTO `mr_district` VALUES ('2487', '那曲县', '285');
INSERT INTO `mr_district` VALUES ('2488', '嘉黎县', '285');
INSERT INTO `mr_district` VALUES ('2489', '比如县', '285');
INSERT INTO `mr_district` VALUES ('2490', '聂荣县', '285');
INSERT INTO `mr_district` VALUES ('2491', '安多县', '285');
INSERT INTO `mr_district` VALUES ('2492', '申扎县', '285');
INSERT INTO `mr_district` VALUES ('2493', '索县', '285');
INSERT INTO `mr_district` VALUES ('2494', '班戈县', '285');
INSERT INTO `mr_district` VALUES ('2495', '巴青县', '285');
INSERT INTO `mr_district` VALUES ('2496', '尼玛县', '285');
INSERT INTO `mr_district` VALUES ('2497', '普兰县', '286');
INSERT INTO `mr_district` VALUES ('2498', '札达县', '286');
INSERT INTO `mr_district` VALUES ('2499', '噶尔县', '286');
INSERT INTO `mr_district` VALUES ('2500', '日土县', '286');
INSERT INTO `mr_district` VALUES ('2501', '革吉县', '286');
INSERT INTO `mr_district` VALUES ('2502', '改则县', '286');
INSERT INTO `mr_district` VALUES ('2503', '措勤县', '286');
INSERT INTO `mr_district` VALUES ('2504', '林芝县', '287');
INSERT INTO `mr_district` VALUES ('2505', '工布江达县', '287');
INSERT INTO `mr_district` VALUES ('2506', '米林县', '287');
INSERT INTO `mr_district` VALUES ('2507', '墨脱县', '287');
INSERT INTO `mr_district` VALUES ('2508', '波密县', '287');
INSERT INTO `mr_district` VALUES ('2509', '察隅县', '287');
INSERT INTO `mr_district` VALUES ('2510', '朗县', '287');
INSERT INTO `mr_district` VALUES ('2511', '新城区', '288');
INSERT INTO `mr_district` VALUES ('2512', '碑林区', '288');
INSERT INTO `mr_district` VALUES ('2513', '莲湖区', '288');
INSERT INTO `mr_district` VALUES ('2514', '灞桥区', '288');
INSERT INTO `mr_district` VALUES ('2515', '未央区', '288');
INSERT INTO `mr_district` VALUES ('2516', '雁塔区', '288');
INSERT INTO `mr_district` VALUES ('2517', '阎良区', '288');
INSERT INTO `mr_district` VALUES ('2518', '临潼区', '288');
INSERT INTO `mr_district` VALUES ('2519', '长安区', '288');
INSERT INTO `mr_district` VALUES ('2520', '蓝田县', '288');
INSERT INTO `mr_district` VALUES ('2521', '周至县', '288');
INSERT INTO `mr_district` VALUES ('2522', '户县', '288');
INSERT INTO `mr_district` VALUES ('2523', '高陵县', '288');
INSERT INTO `mr_district` VALUES ('2524', '王益区', '289');
INSERT INTO `mr_district` VALUES ('2525', '印台区', '289');
INSERT INTO `mr_district` VALUES ('2526', '耀州区', '289');
INSERT INTO `mr_district` VALUES ('2527', '宜君县', '289');
INSERT INTO `mr_district` VALUES ('2528', '渭滨区', '290');
INSERT INTO `mr_district` VALUES ('2529', '金台区', '290');
INSERT INTO `mr_district` VALUES ('2530', '陈仓区', '290');
INSERT INTO `mr_district` VALUES ('2531', '凤翔县', '290');
INSERT INTO `mr_district` VALUES ('2532', '岐山县', '290');
INSERT INTO `mr_district` VALUES ('2533', '扶风县', '290');
INSERT INTO `mr_district` VALUES ('2534', '眉县', '290');
INSERT INTO `mr_district` VALUES ('2535', '陇县', '290');
INSERT INTO `mr_district` VALUES ('2536', '千阳县', '290');
INSERT INTO `mr_district` VALUES ('2537', '麟游县', '290');
INSERT INTO `mr_district` VALUES ('2538', '凤县', '290');
INSERT INTO `mr_district` VALUES ('2539', '太白县', '290');
INSERT INTO `mr_district` VALUES ('2540', '秦都区', '291');
INSERT INTO `mr_district` VALUES ('2541', '杨凌区', '291');
INSERT INTO `mr_district` VALUES ('2542', '渭城区', '291');
INSERT INTO `mr_district` VALUES ('2543', '三原县', '291');
INSERT INTO `mr_district` VALUES ('2544', '泾阳县', '291');
INSERT INTO `mr_district` VALUES ('2545', '乾县', '291');
INSERT INTO `mr_district` VALUES ('2546', '礼泉县', '291');
INSERT INTO `mr_district` VALUES ('2547', '永寿县', '291');
INSERT INTO `mr_district` VALUES ('2548', '彬县', '291');
INSERT INTO `mr_district` VALUES ('2549', '长武县', '291');
INSERT INTO `mr_district` VALUES ('2550', '旬邑县', '291');
INSERT INTO `mr_district` VALUES ('2551', '淳化县', '291');
INSERT INTO `mr_district` VALUES ('2552', '武功县', '291');
INSERT INTO `mr_district` VALUES ('2553', '兴平市', '291');
INSERT INTO `mr_district` VALUES ('2554', '临渭区', '292');
INSERT INTO `mr_district` VALUES ('2555', '华县', '292');
INSERT INTO `mr_district` VALUES ('2556', '潼关县', '292');
INSERT INTO `mr_district` VALUES ('2557', '大荔县', '292');
INSERT INTO `mr_district` VALUES ('2558', '合阳县', '292');
INSERT INTO `mr_district` VALUES ('2559', '澄城县', '292');
INSERT INTO `mr_district` VALUES ('2560', '蒲城县', '292');
INSERT INTO `mr_district` VALUES ('2561', '白水县', '292');
INSERT INTO `mr_district` VALUES ('2562', '富平县', '292');
INSERT INTO `mr_district` VALUES ('2563', '韩城市', '292');
INSERT INTO `mr_district` VALUES ('2564', '华阴市', '292');
INSERT INTO `mr_district` VALUES ('2565', '宝塔区', '293');
INSERT INTO `mr_district` VALUES ('2566', '延长县', '293');
INSERT INTO `mr_district` VALUES ('2567', '延川县', '293');
INSERT INTO `mr_district` VALUES ('2568', '子长县', '293');
INSERT INTO `mr_district` VALUES ('2569', '安塞县', '293');
INSERT INTO `mr_district` VALUES ('2570', '志丹县', '293');
INSERT INTO `mr_district` VALUES ('2571', '吴旗县', '293');
INSERT INTO `mr_district` VALUES ('2572', '甘泉县', '293');
INSERT INTO `mr_district` VALUES ('2573', '富县', '293');
INSERT INTO `mr_district` VALUES ('2574', '洛川县', '293');
INSERT INTO `mr_district` VALUES ('2575', '宜川县', '293');
INSERT INTO `mr_district` VALUES ('2576', '黄龙县', '293');
INSERT INTO `mr_district` VALUES ('2577', '黄陵县', '293');
INSERT INTO `mr_district` VALUES ('2578', '汉台区', '294');
INSERT INTO `mr_district` VALUES ('2579', '南郑县', '294');
INSERT INTO `mr_district` VALUES ('2580', '城固县', '294');
INSERT INTO `mr_district` VALUES ('2581', '洋县', '294');
INSERT INTO `mr_district` VALUES ('2582', '西乡县', '294');
INSERT INTO `mr_district` VALUES ('2583', '勉县', '294');
INSERT INTO `mr_district` VALUES ('2584', '宁强县', '294');
INSERT INTO `mr_district` VALUES ('2585', '略阳县', '294');
INSERT INTO `mr_district` VALUES ('2586', '镇巴县', '294');
INSERT INTO `mr_district` VALUES ('2587', '留坝县', '294');
INSERT INTO `mr_district` VALUES ('2588', '佛坪县', '294');
INSERT INTO `mr_district` VALUES ('2589', '榆阳区', '295');
INSERT INTO `mr_district` VALUES ('2590', '神木县', '295');
INSERT INTO `mr_district` VALUES ('2591', '府谷县', '295');
INSERT INTO `mr_district` VALUES ('2592', '横山县', '295');
INSERT INTO `mr_district` VALUES ('2593', '靖边县', '295');
INSERT INTO `mr_district` VALUES ('2594', '定边县', '295');
INSERT INTO `mr_district` VALUES ('2595', '绥德县', '295');
INSERT INTO `mr_district` VALUES ('2596', '米脂县', '295');
INSERT INTO `mr_district` VALUES ('2597', '佳县', '295');
INSERT INTO `mr_district` VALUES ('2598', '吴堡县', '295');
INSERT INTO `mr_district` VALUES ('2599', '清涧县', '295');
INSERT INTO `mr_district` VALUES ('2600', '子洲县', '295');
INSERT INTO `mr_district` VALUES ('2601', '汉滨区', '296');
INSERT INTO `mr_district` VALUES ('2602', '汉阴县', '296');
INSERT INTO `mr_district` VALUES ('2603', '石泉县', '296');
INSERT INTO `mr_district` VALUES ('2604', '宁陕县', '296');
INSERT INTO `mr_district` VALUES ('2605', '紫阳县', '296');
INSERT INTO `mr_district` VALUES ('2606', '岚皋县', '296');
INSERT INTO `mr_district` VALUES ('2607', '平利县', '296');
INSERT INTO `mr_district` VALUES ('2608', '镇坪县', '296');
INSERT INTO `mr_district` VALUES ('2609', '旬阳县', '296');
INSERT INTO `mr_district` VALUES ('2610', '白河县', '296');
INSERT INTO `mr_district` VALUES ('2611', '商州区', '297');
INSERT INTO `mr_district` VALUES ('2612', '洛南县', '297');
INSERT INTO `mr_district` VALUES ('2613', '丹凤县', '297');
INSERT INTO `mr_district` VALUES ('2614', '商南县', '297');
INSERT INTO `mr_district` VALUES ('2615', '山阳县', '297');
INSERT INTO `mr_district` VALUES ('2616', '镇安县', '297');
INSERT INTO `mr_district` VALUES ('2617', '柞水县', '297');
INSERT INTO `mr_district` VALUES ('2618', '城关区', '298');
INSERT INTO `mr_district` VALUES ('2619', '七里河区', '298');
INSERT INTO `mr_district` VALUES ('2620', '西固区', '298');
INSERT INTO `mr_district` VALUES ('2621', '安宁区', '298');
INSERT INTO `mr_district` VALUES ('2622', '红古区', '298');
INSERT INTO `mr_district` VALUES ('2623', '永登县', '298');
INSERT INTO `mr_district` VALUES ('2624', '皋兰县', '298');
INSERT INTO `mr_district` VALUES ('2625', '榆中县', '298');
INSERT INTO `mr_district` VALUES ('2626', '金川区', '300');
INSERT INTO `mr_district` VALUES ('2627', '永昌县', '300');
INSERT INTO `mr_district` VALUES ('2628', '白银区', '301');
INSERT INTO `mr_district` VALUES ('2629', '平川区', '301');
INSERT INTO `mr_district` VALUES ('2630', '靖远县', '301');
INSERT INTO `mr_district` VALUES ('2631', '会宁县', '301');
INSERT INTO `mr_district` VALUES ('2632', '景泰县', '301');
INSERT INTO `mr_district` VALUES ('2633', '秦城区', '302');
INSERT INTO `mr_district` VALUES ('2634', '北道区', '302');
INSERT INTO `mr_district` VALUES ('2635', '清水县', '302');
INSERT INTO `mr_district` VALUES ('2636', '秦安县', '302');
INSERT INTO `mr_district` VALUES ('2637', '甘谷县', '302');
INSERT INTO `mr_district` VALUES ('2638', '武山县', '302');
INSERT INTO `mr_district` VALUES ('2639', '张家川回族自治县', '302');
INSERT INTO `mr_district` VALUES ('2640', '凉州区', '303');
INSERT INTO `mr_district` VALUES ('2641', '民勤县', '303');
INSERT INTO `mr_district` VALUES ('2642', '古浪县', '303');
INSERT INTO `mr_district` VALUES ('2643', '天祝藏族自治县', '303');
INSERT INTO `mr_district` VALUES ('2644', '甘州区', '304');
INSERT INTO `mr_district` VALUES ('2645', '肃南裕固族自治县', '304');
INSERT INTO `mr_district` VALUES ('2646', '民乐县', '304');
INSERT INTO `mr_district` VALUES ('2647', '临泽县', '304');
INSERT INTO `mr_district` VALUES ('2648', '高台县', '304');
INSERT INTO `mr_district` VALUES ('2649', '山丹县', '304');
INSERT INTO `mr_district` VALUES ('2650', '崆峒区', '305');
INSERT INTO `mr_district` VALUES ('2651', '泾川县', '305');
INSERT INTO `mr_district` VALUES ('2652', '灵台县', '305');
INSERT INTO `mr_district` VALUES ('2653', '崇信县', '305');
INSERT INTO `mr_district` VALUES ('2654', '华亭县', '305');
INSERT INTO `mr_district` VALUES ('2655', '庄浪县', '305');
INSERT INTO `mr_district` VALUES ('2656', '静宁县', '305');
INSERT INTO `mr_district` VALUES ('2657', '肃州区', '306');
INSERT INTO `mr_district` VALUES ('2658', '金塔县', '306');
INSERT INTO `mr_district` VALUES ('2659', '安西县', '306');
INSERT INTO `mr_district` VALUES ('2660', '肃北蒙古族自治县', '306');
INSERT INTO `mr_district` VALUES ('2661', '阿克塞哈萨克族自治县', '306');
INSERT INTO `mr_district` VALUES ('2662', '玉门市', '306');
INSERT INTO `mr_district` VALUES ('2663', '敦煌市', '306');
INSERT INTO `mr_district` VALUES ('2664', '西峰区', '307');
INSERT INTO `mr_district` VALUES ('2665', '庆城县', '307');
INSERT INTO `mr_district` VALUES ('2666', '环县', '307');
INSERT INTO `mr_district` VALUES ('2667', '华池县', '307');
INSERT INTO `mr_district` VALUES ('2668', '合水县', '307');
INSERT INTO `mr_district` VALUES ('2669', '正宁县', '307');
INSERT INTO `mr_district` VALUES ('2670', '宁县', '307');
INSERT INTO `mr_district` VALUES ('2671', '镇原县', '307');
INSERT INTO `mr_district` VALUES ('2672', '安定区', '308');
INSERT INTO `mr_district` VALUES ('2673', '通渭县', '308');
INSERT INTO `mr_district` VALUES ('2674', '陇西县', '308');
INSERT INTO `mr_district` VALUES ('2675', '渭源县', '308');
INSERT INTO `mr_district` VALUES ('2676', '临洮县', '308');
INSERT INTO `mr_district` VALUES ('2677', '漳县', '308');
INSERT INTO `mr_district` VALUES ('2678', '岷县', '308');
INSERT INTO `mr_district` VALUES ('2679', '武都区', '309');
INSERT INTO `mr_district` VALUES ('2680', '成县', '309');
INSERT INTO `mr_district` VALUES ('2681', '文县', '309');
INSERT INTO `mr_district` VALUES ('2682', '宕昌县', '309');
INSERT INTO `mr_district` VALUES ('2683', '康县', '309');
INSERT INTO `mr_district` VALUES ('2684', '西和县', '309');
INSERT INTO `mr_district` VALUES ('2685', '礼县', '309');
INSERT INTO `mr_district` VALUES ('2686', '徽县', '309');
INSERT INTO `mr_district` VALUES ('2687', '两当县', '309');
INSERT INTO `mr_district` VALUES ('2688', '临夏市', '310');
INSERT INTO `mr_district` VALUES ('2689', '临夏县', '310');
INSERT INTO `mr_district` VALUES ('2690', '康乐县', '310');
INSERT INTO `mr_district` VALUES ('2691', '永靖县', '310');
INSERT INTO `mr_district` VALUES ('2692', '广河县', '310');
INSERT INTO `mr_district` VALUES ('2693', '和政县', '310');
INSERT INTO `mr_district` VALUES ('2694', '东乡族自治县', '310');
INSERT INTO `mr_district` VALUES ('2695', '积石山保安族东乡族撒拉族自治县', '310');
INSERT INTO `mr_district` VALUES ('2696', '合作市', '311');
INSERT INTO `mr_district` VALUES ('2697', '临潭县', '311');
INSERT INTO `mr_district` VALUES ('2698', '卓尼县', '311');
INSERT INTO `mr_district` VALUES ('2699', '舟曲县', '311');
INSERT INTO `mr_district` VALUES ('2700', '迭部县', '311');
INSERT INTO `mr_district` VALUES ('2701', '玛曲县', '311');
INSERT INTO `mr_district` VALUES ('2702', '碌曲县', '311');
INSERT INTO `mr_district` VALUES ('2703', '夏河县', '311');
INSERT INTO `mr_district` VALUES ('2704', '城东区', '312');
INSERT INTO `mr_district` VALUES ('2705', '城中区', '312');
INSERT INTO `mr_district` VALUES ('2706', '城西区', '312');
INSERT INTO `mr_district` VALUES ('2707', '城北区', '312');
INSERT INTO `mr_district` VALUES ('2708', '大通回族土族自治县', '312');
INSERT INTO `mr_district` VALUES ('2709', '湟中县', '312');
INSERT INTO `mr_district` VALUES ('2710', '湟源县', '312');
INSERT INTO `mr_district` VALUES ('2711', '平安县', '313');
INSERT INTO `mr_district` VALUES ('2712', '民和回族土族自治县', '313');
INSERT INTO `mr_district` VALUES ('2713', '乐都县', '313');
INSERT INTO `mr_district` VALUES ('2714', '互助土族自治县', '313');
INSERT INTO `mr_district` VALUES ('2715', '化隆回族自治县', '313');
INSERT INTO `mr_district` VALUES ('2716', '循化撒拉族自治县', '313');
INSERT INTO `mr_district` VALUES ('2717', '门源回族自治县', '314');
INSERT INTO `mr_district` VALUES ('2718', '祁连县', '314');
INSERT INTO `mr_district` VALUES ('2719', '海晏县', '314');
INSERT INTO `mr_district` VALUES ('2720', '刚察县', '314');
INSERT INTO `mr_district` VALUES ('2721', '同仁县', '315');
INSERT INTO `mr_district` VALUES ('2722', '尖扎县', '315');
INSERT INTO `mr_district` VALUES ('2723', '泽库县', '315');
INSERT INTO `mr_district` VALUES ('2724', '河南蒙古族自治县', '315');
INSERT INTO `mr_district` VALUES ('2725', '共和县', '316');
INSERT INTO `mr_district` VALUES ('2726', '同德县', '316');
INSERT INTO `mr_district` VALUES ('2727', '贵德县', '316');
INSERT INTO `mr_district` VALUES ('2728', '兴海县', '316');
INSERT INTO `mr_district` VALUES ('2729', '贵南县', '316');
INSERT INTO `mr_district` VALUES ('2730', '玛沁县', '317');
INSERT INTO `mr_district` VALUES ('2731', '班玛县', '317');
INSERT INTO `mr_district` VALUES ('2732', '甘德县', '317');
INSERT INTO `mr_district` VALUES ('2733', '达日县', '317');
INSERT INTO `mr_district` VALUES ('2734', '久治县', '317');
INSERT INTO `mr_district` VALUES ('2735', '玛多县', '317');
INSERT INTO `mr_district` VALUES ('2736', '玉树县', '318');
INSERT INTO `mr_district` VALUES ('2737', '杂多县', '318');
INSERT INTO `mr_district` VALUES ('2738', '称多县', '318');
INSERT INTO `mr_district` VALUES ('2739', '治多县', '318');
INSERT INTO `mr_district` VALUES ('2740', '囊谦县', '318');
INSERT INTO `mr_district` VALUES ('2741', '曲麻莱县', '318');
INSERT INTO `mr_district` VALUES ('2742', '格尔木市', '319');
INSERT INTO `mr_district` VALUES ('2743', '德令哈市', '319');
INSERT INTO `mr_district` VALUES ('2744', '乌兰县', '319');
INSERT INTO `mr_district` VALUES ('2745', '都兰县', '319');
INSERT INTO `mr_district` VALUES ('2746', '天峻县', '319');
INSERT INTO `mr_district` VALUES ('2747', '兴庆区', '320');
INSERT INTO `mr_district` VALUES ('2748', '西夏区', '320');
INSERT INTO `mr_district` VALUES ('2749', '金凤区', '320');
INSERT INTO `mr_district` VALUES ('2750', '永宁县', '320');
INSERT INTO `mr_district` VALUES ('2751', '贺兰县', '320');
INSERT INTO `mr_district` VALUES ('2752', '灵武市', '320');
INSERT INTO `mr_district` VALUES ('2753', '大武口区', '321');
INSERT INTO `mr_district` VALUES ('2754', '惠农区', '321');
INSERT INTO `mr_district` VALUES ('2755', '平罗县', '321');
INSERT INTO `mr_district` VALUES ('2756', '利通区', '322');
INSERT INTO `mr_district` VALUES ('2757', '盐池县', '322');
INSERT INTO `mr_district` VALUES ('2758', '同心县', '322');
INSERT INTO `mr_district` VALUES ('2759', '青铜峡市', '322');
INSERT INTO `mr_district` VALUES ('2760', '原州区', '323');
INSERT INTO `mr_district` VALUES ('2761', '西吉县', '323');
INSERT INTO `mr_district` VALUES ('2762', '隆德县', '323');
INSERT INTO `mr_district` VALUES ('2763', '泾源县', '323');
INSERT INTO `mr_district` VALUES ('2764', '彭阳县', '323');
INSERT INTO `mr_district` VALUES ('2765', '沙坡头区', '324');
INSERT INTO `mr_district` VALUES ('2766', '中宁县', '324');
INSERT INTO `mr_district` VALUES ('2767', '海原县', '324');
INSERT INTO `mr_district` VALUES ('2768', '天山区', '325');
INSERT INTO `mr_district` VALUES ('2769', '沙依巴克区', '325');
INSERT INTO `mr_district` VALUES ('2770', '新市区', '325');
INSERT INTO `mr_district` VALUES ('2771', '水磨沟区', '325');
INSERT INTO `mr_district` VALUES ('2772', '头屯河区', '325');
INSERT INTO `mr_district` VALUES ('2773', '达坂城区', '325');
INSERT INTO `mr_district` VALUES ('2774', '东山区', '325');
INSERT INTO `mr_district` VALUES ('2775', '乌鲁木齐县', '325');
INSERT INTO `mr_district` VALUES ('2776', '独山子区', '326');
INSERT INTO `mr_district` VALUES ('2777', '克拉玛依区', '326');
INSERT INTO `mr_district` VALUES ('2778', '白碱滩区', '326');
INSERT INTO `mr_district` VALUES ('2779', '乌尔禾区', '326');
INSERT INTO `mr_district` VALUES ('2780', '吐鲁番市', '327');
INSERT INTO `mr_district` VALUES ('2781', '鄯善县', '327');
INSERT INTO `mr_district` VALUES ('2782', '托克逊县', '327');
INSERT INTO `mr_district` VALUES ('2783', '哈密市', '328');
INSERT INTO `mr_district` VALUES ('2784', '巴里坤哈萨克自治县', '328');
INSERT INTO `mr_district` VALUES ('2785', '伊吾县', '328');
INSERT INTO `mr_district` VALUES ('2786', '昌吉市', '329');
INSERT INTO `mr_district` VALUES ('2787', '阜康市', '329');
INSERT INTO `mr_district` VALUES ('2788', '米泉市', '329');
INSERT INTO `mr_district` VALUES ('2789', '呼图壁县', '329');
INSERT INTO `mr_district` VALUES ('2790', '玛纳斯县', '329');
INSERT INTO `mr_district` VALUES ('2791', '奇台县', '329');
INSERT INTO `mr_district` VALUES ('2792', '吉木萨尔县', '329');
INSERT INTO `mr_district` VALUES ('2793', '木垒哈萨克自治县', '329');
INSERT INTO `mr_district` VALUES ('2794', '博乐市', '330');
INSERT INTO `mr_district` VALUES ('2795', '精河县', '330');
INSERT INTO `mr_district` VALUES ('2796', '温泉县', '330');
INSERT INTO `mr_district` VALUES ('2797', '库尔勒市', '331');
INSERT INTO `mr_district` VALUES ('2798', '轮台县', '331');
INSERT INTO `mr_district` VALUES ('2799', '尉犁县', '331');
INSERT INTO `mr_district` VALUES ('2800', '若羌县', '331');
INSERT INTO `mr_district` VALUES ('2801', '且末县', '331');
INSERT INTO `mr_district` VALUES ('2802', '焉耆回族自治县', '331');
INSERT INTO `mr_district` VALUES ('2803', '和静县', '331');
INSERT INTO `mr_district` VALUES ('2804', '和硕县', '331');
INSERT INTO `mr_district` VALUES ('2805', '博湖县', '331');
INSERT INTO `mr_district` VALUES ('2806', '阿克苏市', '332');
INSERT INTO `mr_district` VALUES ('2807', '温宿县', '332');
INSERT INTO `mr_district` VALUES ('2808', '库车县', '332');
INSERT INTO `mr_district` VALUES ('2809', '沙雅县', '332');
INSERT INTO `mr_district` VALUES ('2810', '新和县', '332');
INSERT INTO `mr_district` VALUES ('2811', '拜城县', '332');
INSERT INTO `mr_district` VALUES ('2812', '乌什县', '332');
INSERT INTO `mr_district` VALUES ('2813', '阿瓦提县', '332');
INSERT INTO `mr_district` VALUES ('2814', '柯坪县', '332');
INSERT INTO `mr_district` VALUES ('2815', '阿图什市', '333');
INSERT INTO `mr_district` VALUES ('2816', '阿克陶县', '333');
INSERT INTO `mr_district` VALUES ('2817', '阿合奇县', '333');
INSERT INTO `mr_district` VALUES ('2818', '乌恰县', '333');
INSERT INTO `mr_district` VALUES ('2819', '喀什市', '334');
INSERT INTO `mr_district` VALUES ('2820', '疏附县', '334');
INSERT INTO `mr_district` VALUES ('2821', '疏勒县', '334');
INSERT INTO `mr_district` VALUES ('2822', '英吉沙县', '334');
INSERT INTO `mr_district` VALUES ('2823', '泽普县', '334');
INSERT INTO `mr_district` VALUES ('2824', '莎车县', '334');
INSERT INTO `mr_district` VALUES ('2825', '叶城县', '334');
INSERT INTO `mr_district` VALUES ('2826', '麦盖提县', '334');
INSERT INTO `mr_district` VALUES ('2827', '岳普湖县', '334');
INSERT INTO `mr_district` VALUES ('2828', '伽师县', '334');
INSERT INTO `mr_district` VALUES ('2829', '巴楚县', '334');
INSERT INTO `mr_district` VALUES ('2830', '塔什库尔干塔吉克自治县', '334');
INSERT INTO `mr_district` VALUES ('2831', '和田市', '335');
INSERT INTO `mr_district` VALUES ('2832', '和田县', '335');
INSERT INTO `mr_district` VALUES ('2833', '墨玉县', '335');
INSERT INTO `mr_district` VALUES ('2834', '皮山县', '335');
INSERT INTO `mr_district` VALUES ('2835', '洛浦县', '335');
INSERT INTO `mr_district` VALUES ('2836', '策勒县', '335');
INSERT INTO `mr_district` VALUES ('2837', '于田县', '335');
INSERT INTO `mr_district` VALUES ('2838', '民丰县', '335');
INSERT INTO `mr_district` VALUES ('2839', '伊宁市', '336');
INSERT INTO `mr_district` VALUES ('2840', '奎屯市', '336');
INSERT INTO `mr_district` VALUES ('2841', '伊宁县', '336');
INSERT INTO `mr_district` VALUES ('2842', '察布查尔锡伯自治县', '336');
INSERT INTO `mr_district` VALUES ('2843', '霍城县', '336');
INSERT INTO `mr_district` VALUES ('2844', '巩留县', '336');
INSERT INTO `mr_district` VALUES ('2845', '新源县', '336');
INSERT INTO `mr_district` VALUES ('2846', '昭苏县', '336');
INSERT INTO `mr_district` VALUES ('2847', '特克斯县', '336');
INSERT INTO `mr_district` VALUES ('2848', '尼勒克县', '336');
INSERT INTO `mr_district` VALUES ('2849', '塔城市', '337');
INSERT INTO `mr_district` VALUES ('2850', '乌苏市', '337');
INSERT INTO `mr_district` VALUES ('2851', '额敏县', '337');
INSERT INTO `mr_district` VALUES ('2852', '沙湾县', '337');
INSERT INTO `mr_district` VALUES ('2853', '托里县', '337');
INSERT INTO `mr_district` VALUES ('2854', '裕民县', '337');
INSERT INTO `mr_district` VALUES ('2855', '和布克赛尔蒙古自治县', '337');
INSERT INTO `mr_district` VALUES ('2856', '阿勒泰市', '338');
INSERT INTO `mr_district` VALUES ('2857', '布尔津县', '338');
INSERT INTO `mr_district` VALUES ('2858', '富蕴县', '338');
INSERT INTO `mr_district` VALUES ('2859', '福海县', '338');
INSERT INTO `mr_district` VALUES ('2860', '哈巴河县', '338');
INSERT INTO `mr_district` VALUES ('2861', '青河县', '338');
INSERT INTO `mr_district` VALUES ('2862', '吉木乃县', '338');

-- ----------------------------
-- Table structure for mr_diyflag
-- ----------------------------
DROP TABLE IF EXISTS `mr_diyflag`;
CREATE TABLE `mr_diyflag` (
  `diyflag_id` int(2) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `diyflag_value` char(2) NOT NULL COMMENT '值',
  `diyflag_name` char(10) NOT NULL COMMENT '名称',
  `diyflag_order` int(11) NOT NULL COMMENT '排序',
  `diyflag_color` varchar(255) DEFAULT NULL COMMENT '//显示颜色',
  PRIMARY KEY (`diyflag_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mr_diyflag
-- ----------------------------
INSERT INTO `mr_diyflag` VALUES ('1', 'c', '儿童/青少年', '0', '#060');
INSERT INTO `mr_diyflag` VALUES ('2', 'p', '成人', '0', '#09F');
INSERT INTO `mr_diyflag` VALUES ('3', 'f', '企业', '0', '#000');

-- ----------------------------
-- Table structure for mr_diyflag_one
-- ----------------------------
DROP TABLE IF EXISTS `mr_diyflag_one`;
CREATE TABLE `mr_diyflag_one` (
  `mt_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '//隶属编号',
  `mt_name` varchar(20) NOT NULL COMMENT '//隶属名称',
  `mt_value` varchar(10) NOT NULL COMMENT '//值',
  PRIMARY KEY (`mt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mr_diyflag_one
-- ----------------------------
INSERT INTO `mr_diyflag_one` VALUES ('1', '个人', 'g');
INSERT INTO `mr_diyflag_one` VALUES ('2', '企业', 'q');

-- ----------------------------
-- Table structure for mr_diyflag_two
-- ----------------------------
DROP TABLE IF EXISTS `mr_diyflag_two`;
CREATE TABLE `mr_diyflag_two` (
  `dt_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '//课程类型编号',
  `dt_name` varchar(50) NOT NULL COMMENT '//课程类型名称',
  `dt_value` varchar(20) NOT NULL COMMENT '//值',
  PRIMARY KEY (`dt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mr_diyflag_two
-- ----------------------------
INSERT INTO `mr_diyflag_two` VALUES ('1', '初级课程', 'c');
INSERT INTO `mr_diyflag_two` VALUES ('2', '企业课程', 'q');
INSERT INTO `mr_diyflag_two` VALUES ('3', '高级课程', 'g');

-- ----------------------------
-- Table structure for mr_knows
-- ----------------------------
DROP TABLE IF EXISTS `mr_knows`;
CREATE TABLE `mr_knows` (
  `ms_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '//知识编号',
  `ms_author` int(10) NOT NULL COMMENT '//知识发起人',
  `ms_title` varchar(255) NOT NULL COMMENT '//知识标题',
  `ms_type` int(2) NOT NULL DEFAULT '3' COMMENT '//知识类型id',
  `ms_content` longtext COMMENT '//知识内容或详情',
  `ms_photo` varchar(255) NOT NULL COMMENT '//知识封面',
  `ms_addtime` int(11) NOT NULL COMMENT '//添加时间',
  `ms_lastchangetime` datetime NOT NULL COMMENT '//最后一次修改时间',
  `ms_changeadmin` int(10) NOT NULL COMMENT '//最后一次修改的管理员',
  `ms_readnum` int(50) NOT NULL DEFAULT '0' COMMENT '//浏览数',
  `ms_agreenum` int(50) NOT NULL DEFAULT '0' COMMENT '//点赞数',
  `ms_savenum` int(50) NOT NULL DEFAULT '0' COMMENT '//收藏数',
  `ms_open` int(1) NOT NULL DEFAULT '0' COMMENT '//是否开启',
  `ms_top` int(1) NOT NULL DEFAULT '0' COMMENT '//置顶显示',
  `ms_say` varchar(255) NOT NULL COMMENT '//知识简介',
  `ms_is` int(1) NOT NULL DEFAULT '3' COMMENT '//知识标示，特殊作用',
  `ms_back` int(11) NOT NULL DEFAULT '0' COMMENT '1表示放入回收站的活动',
  `ms_toptime` int(11) NOT NULL COMMENT '//置顶过期时间',
  `ms_starttime` int(11) NOT NULL DEFAULT '0',
  `ms_stoptime` int(11) NOT NULL DEFAULT '0',
  `ms_valid` int(1) NOT NULL DEFAULT '1' COMMENT '//状态',
  PRIMARY KEY (`ms_id`),
  KEY `fk_1` (`ms_type`) USING BTREE,
  KEY `fk_2` (`ms_author`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of mr_knows
-- ----------------------------
INSERT INTO `mr_knows` VALUES ('28', '1', '让知识测试', '3', '&lt;p style=&quot;text-align: center;&quot;&gt;&lt;img src=&quot;/ueditor/php/upload/image/20161115/1479199576121999.png&quot; title=&quot;1479199576121999.png&quot; alt=&quot;3baa802.png&quot; width=&quot;582&quot; height=&quot;330&quot; style=&quot;width: 582px; height: 330px;&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/ueditor/php/upload/image/20161125/1480057513481009.jpg&quot; title=&quot;1480057513481009.jpg&quot; alt=&quot;002-1.jpg&quot; width=&quot;779&quot; height=&quot;2629&quot; style=&quot;width: 779px; height: 2629px;&quot;/&gt;&lt;/p&gt;&lt;span class=&quot;edui-editor-imagescale-hand1&quot; style=&quot;box-sizing: border-box; position: absolute; width: 6px; height: 6px; overflow: hidden; font-size: 0px; display: block; cursor: n-resize; top: 0px; margin-top: -4px; left: 448px; margin-left: -4px; color: rgb(57, 57, 57); font-family: &amp;quot;Microsoft Yahei&amp;quot;; background-color: rgb(60, 157, 208);&quot;&gt;&lt;/span&gt;&lt;p&gt;知识测试知识测试知识测试知识测试&lt;/p&gt;', '/uploads/2016-09-06/57ce3f4babc37.png', '1473150812', '2016-11-25 15:05:39', '1', '4', '0', '1', '1', '0', '知识测试知识测试知识测试知识测试知识测试', '3', '0', '1480316739', '0', '0', '1');
INSERT INTO `mr_knows` VALUES ('29', '1', '23423423423', '3', '&lt;p&gt;asdasd&lt;/p&gt;', '/uploads/2016-11-15/582acd06ad378.png', '1479200006', '2016-11-15 16:53:26', '1', '2', '0', '0', '1', '0', 'sdasdas', '3', '0', '1479459206', '0', '0', '1');
INSERT INTO `mr_knows` VALUES ('30', '1', 'asdasdasd', '3', '&lt;p&gt;asdasd&lt;/p&gt;', '/uploads/2016-11-15/582acd74b1ed5.png', '1479200116', '2016-11-15 16:55:16', '1', '0', '0', '0', '0', '0', 'asd', '3', '0', '1479459316', '0', '0', '1');

-- ----------------------------
-- Table structure for mr_knows_type
-- ----------------------------
DROP TABLE IF EXISTS `mr_knows_type`;
CREATE TABLE `mr_knows_type` (
  `kt_id` int(10) NOT NULL COMMENT '//知识标签 id',
  `kt_name` varchar(20) NOT NULL COMMENT '//知识标签名称',
  `kt_photo` varchar(255) NOT NULL DEFAULT '' COMMENT '//标签图片url',
  PRIMARY KEY (`kt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of mr_knows_type
-- ----------------------------
INSERT INTO `mr_knows_type` VALUES ('1', '纯文字', '');
INSERT INTO `mr_knows_type` VALUES ('2', '图文', '');
INSERT INTO `mr_knows_type` VALUES ('3', '视频', '');

-- ----------------------------
-- Table structure for mr_member_group
-- ----------------------------
DROP TABLE IF EXISTS `mr_member_group`;
CREATE TABLE `mr_member_group` (
  `member_group_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '会员组ID',
  `member_group_name` varchar(30) NOT NULL COMMENT '会员组名',
  `member_group_open` int(11) NOT NULL DEFAULT '0' COMMENT '会员组是否开放',
  `member_group_toplimit` int(11) NOT NULL DEFAULT '0' COMMENT '积分上限',
  `member_group_bomlimit` int(11) NOT NULL DEFAULT '0' COMMENT '积分下限',
  `member_group_order` int(11) NOT NULL COMMENT '排序',
  PRIMARY KEY (`member_group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mr_member_group
-- ----------------------------
INSERT INTO `mr_member_group` VALUES ('1', '用户', '1', '0', '0', '50');

-- ----------------------------
-- Table structure for mr_member_list
-- ----------------------------
DROP TABLE IF EXISTS `mr_member_list`;
CREATE TABLE `mr_member_list` (
  `member_list_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_list_weid` int(11) NOT NULL DEFAULT '0' COMMENT '对应微信会员ID',
  `member_list_username` varchar(30) NOT NULL DEFAULT '' COMMENT '登录用户名',
  `member_list_pwd` char(32) NOT NULL DEFAULT '' COMMENT '登录密码',
  `member_list_groupid` tinyint(2) NOT NULL COMMENT '所属会员组',
  `member_list_petname` varchar(30) NOT NULL DEFAULT '' COMMENT '昵称',
  `member_list_province` int(6) NOT NULL COMMENT '城市',
  `member_list_city` int(6) NOT NULL COMMENT '市县',
  `member_list_sex` tinyint(2) NOT NULL COMMENT '1=男  2=女',
  `member_list_headpic` varchar(200) NOT NULL DEFAULT '' COMMENT '会员头像路径',
  `member_list_tel` varchar(20) NOT NULL COMMENT '手机',
  `member_list_email` varchar(50) NOT NULL DEFAULT '' COMMENT '邮箱',
  `member_list_open` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态',
  `member_list_addtime` int(11) NOT NULL COMMENT '添加时间戳',
  PRIMARY KEY (`member_list_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mr_member_list
-- ----------------------------
INSERT INTO `mr_member_list` VALUES ('1', '0', '王晋', 'e10adc3949ba59abbe56e057f20f883e', '1', 'wj啊啊', '19', '197', '1', '/uploads/2016-09-09/57d2470e5f58d.png', '18721667531', '972270516@qq.com', '1', '123123231');
INSERT INTO `mr_member_list` VALUES ('6', '0', 'wushaohua', '202cb962ac59075b964b07152d234b70', '1', 'wsh', '1', '1', '1', '/yoga/img/male.png', '15000663392', '675580180@qq.com', '1', '1472611591');
INSERT INTO `mr_member_list` VALUES ('5', '0', 'frank', '1ef46338873c2c6a545ce3a4f455b16f', '1', '111', '1', '1', '1', '/yoga/img/male.png', '18616696490', 'ql.zhang@meetuuu.com', '1', '1472610436');

-- ----------------------------
-- Table structure for mr_news
-- ----------------------------
DROP TABLE IF EXISTS `mr_news`;
CREATE TABLE `mr_news` (
  `n_id` int(36) NOT NULL AUTO_INCREMENT,
  `news_title` varchar(255) NOT NULL COMMENT '文章标题',
  `news_titleshort` varchar(100) DEFAULT NULL COMMENT '简短标题',
  `news_columnid` int(11) NOT NULL,
  `news_columnviceid` int(11) DEFAULT NULL COMMENT '副栏目ID',
  `news_key` varchar(100) NOT NULL COMMENT '文章关键字',
  `news_tag` varchar(50) NOT NULL DEFAULT '' COMMENT '文章标签',
  `news_auto` varchar(20) NOT NULL COMMENT '作者',
  `news_adminid` int(11) NOT NULL COMMENT '所属管理员',
  `news_source` varchar(20) NOT NULL DEFAULT '未知' COMMENT '来源',
  `news_content` longtext NOT NULL COMMENT '新闻内容',
  `news_scontent` varchar(100) NOT NULL DEFAULT '',
  `news_hits` int(11) NOT NULL DEFAULT '200' COMMENT '点击率',
  `news_img` varchar(100) DEFAULT '' COMMENT '大图地址',
  `news_pic_type` tinyint(2) NOT NULL COMMENT '1=普通模式 2=腾讯模式',
  `news_pic_allurl` varchar(255) DEFAULT '' COMMENT '多图路径',
  `news_pic_content` longtext NOT NULL COMMENT '多图对应文字说明',
  `news_time` int(11) NOT NULL,
  `news_flag` set('h','c','f','a','s','p','j','d') NOT NULL DEFAULT '' COMMENT '文章属性',
  `news_zaddress` varchar(100) NOT NULL DEFAULT '' COMMENT '跳转地址',
  `news_back` int(2) NOT NULL DEFAULT '0' COMMENT '是否为回收站',
  `news_open` varchar(2) DEFAULT '0' COMMENT '0代表审核不通过 1代表审核通过',
  `news_lvtype` tinyint(2) NOT NULL DEFAULT '0' COMMENT '旅游类型1=行程 2=攻略',
  PRIMARY KEY (`n_id`),
  KEY `news_titleshort` (`news_titleshort`),
  KEY `news_title` (`news_title`),
  KEY `news_columnid` (`news_columnid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mr_news
-- ----------------------------

-- ----------------------------
-- Table structure for mr_news_content
-- ----------------------------
DROP TABLE IF EXISTS `mr_news_content`;
CREATE TABLE `mr_news_content` (
  `news_content_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_content_nid` int(11) NOT NULL COMMENT '对应文章ID',
  `news_content_body` longtext NOT NULL COMMENT '内容主体',
  `news_content_rid` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`news_content_id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mr_news_content
-- ----------------------------
INSERT INTO `mr_news_content` VALUES ('45', '23', '&lt;p&gt;阿萨德&lt;/p&gt;', '1');
INSERT INTO `mr_news_content` VALUES ('46', '24', '&lt;p&gt;阿萨德&lt;/p&gt;', '1');
INSERT INTO `mr_news_content` VALUES ('8', '3', '&lt;p&gt;&lt;img src=&quot;http://img.baidu.com/hi/ldw/w_0003.gif&quot;/&gt;&lt;img src=&quot;http://img.baidu.com/hi/tsj/t_0028.gif&quot;/&gt;&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0013.gif&quot;/&gt;sadsad&lt;/p&gt;', '1');
INSERT INTO `mr_news_content` VALUES ('6', '8', '&lt;p&gt;按时打算阿萨德啥的按时&lt;/p&gt;', '1');
INSERT INTO `mr_news_content` VALUES ('7', '9', '&lt;p&gt;阿萨德按时打&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0013.gif&quot;/&gt;&lt;/p&gt;', '1');
INSERT INTO `mr_news_content` VALUES ('9', '11', '&lt;p&gt;阿萨德按时打&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0013.gif&quot;/&gt;&lt;/p&gt;', '1');
INSERT INTO `mr_news_content` VALUES ('10', '12', '&lt;p&gt;阿萨德按时打&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0013.gif&quot;/&gt;&lt;/p&gt;', '1');
INSERT INTO `mr_news_content` VALUES ('11', '13', '&lt;p&gt;&lt;img src=&quot;/ueditor/php/upload/image/20160805/1470365284694877.jpg&quot; title=&quot;1470365284694877.jpg&quot; alt=&quot;404.jpg&quot;/&gt;&lt;/p&gt;&lt;p&gt;阿速达按时段&lt;/p&gt;', '1');
INSERT INTO `mr_news_content` VALUES ('15', '17', '&lt;p&gt;阿萨德的方法反反复复反复反复反复反复反复反复反复反复反复反复反复反复反复反复反复反复反复反复反复反复反复&lt;/p&gt;', '1');
INSERT INTO `mr_news_content` VALUES ('17', '19', '&lt;p&gt;&lt;img src=&quot;/ueditor/php/upload/image/20160805/1470376619138467.jpg&quot; title=&quot;1470376619138467.jpg&quot; alt=&quot;girl.jpg&quot;/&gt;&lt;/p&gt;&lt;p&gt;啊实打实的阿阿斯顿按时阿萨德按时&lt;/p&gt;', '1');
INSERT INTO `mr_news_content` VALUES ('18', '20', '&lt;p&gt;按时打算打算打算三大&lt;/p&gt;', '1');
INSERT INTO `mr_news_content` VALUES ('20', '22', '&lt;p&gt;&lt;video class=&quot;edui-upload-video  vjs-default-skin video-js&quot; controls=&quot;&quot; preload=&quot;none&quot; width=&quot;420&quot; height=&quot;280&quot; src=&quot;/yoga/Public/upload/video/20160810/1470803750804307.mp4&quot; data-setup=&quot;{}&quot;&gt;&lt;source src=&quot;/yoga/Public/upload/video/20160810/1470803750804307.mp4&quot; type=&quot;video/mp4&quot;/&gt;&lt;/video&gt;&lt;/p&gt;', '1');
INSERT INTO `mr_news_content` VALUES ('21', '21', '&lt;p&gt;&lt;video class=&quot;edui-upload-video  vjs-default-skin video-js&quot; controls=&quot;&quot; preload=&quot;none&quot; width=&quot;420&quot; height=&quot;280&quot; src=&quot;/yoga/Public/upload/video/20160811/1470901769447616.mp4&quot; data-setup=&quot;{}&quot;&gt;&lt;source src=&quot;/yoga/Public/upload/video/20160811/1470901769447616.mp4&quot; type=&quot;video/mp4&quot;/&gt;&lt;/video&gt;&lt;/p&gt;', '1');
INSERT INTO `mr_news_content` VALUES ('22', '22', '&lt;p style=&quot;text-align:center&quot;&gt;&lt;video class=&quot;edui-upload-video  vjs-default-skin  video-js&quot; controls=&quot;&quot; preload=&quot;auto&quot; width=&quot;420&quot; height=&quot;280&quot; src=&quot;/yoga/Public/upload/video/20160811/1470905984107949.mp4&quot; data-setup=&quot;{}&quot; style=&quot;display:inline-block;&quot;&gt;&lt;source src=&quot;/yoga/Public/upload/video/20160811/1470905984107949.mp4&quot; type=&quot;video/mp4&quot;/&gt;&lt;/video&gt;&lt;/p&gt;&lt;p&gt;阿萨德阿萨德是撒旦阿萨德啊阿萨德&amp;nbsp;&lt;/p&gt;', '1');
INSERT INTO `mr_news_content` VALUES ('23', '23', '&lt;p style=&quot;text-align: center;&quot;&gt;&lt;video class=&quot;edui-upload-video  vjs-default-skin   video-js&quot; controls=&quot;&quot; preload=&quot;auto&quot; width=&quot;420&quot; height=&quot;280&quot; src=&quot;/yoga/Public/upload/video/20160811/1470908848675168.mp4&quot; data-setup=&quot;{}&quot; style=&quot;display:inline-block;&quot;&gt;&lt;source src=&quot;/yoga/Public/upload/video/20160811/1470908848675168.mp4&quot; type=&quot;video/mp4&quot;/&gt;&lt;/video&gt;&lt;/p&gt;&lt;p&gt;哈哈哈哈哈aaaa&lt;/p&gt;', '1');
INSERT INTO `mr_news_content` VALUES ('24', '21', '&lt;p style=&quot;text-align: center;&quot;&gt;&lt;video class=&quot;edui-upload-video  vjs-default-skin  video-js&quot; controls=&quot;&quot; preload=&quot;none&quot; width=&quot;420&quot; height=&quot;280&quot; src=&quot;/yoga/Public/upload/video/20160811/1470909313185337.mp4&quot; data-setup=&quot;{}&quot; style=&quot;display:inline-block;&quot;&gt;&lt;source src=&quot;/yoga/Public/upload/video/20160811/1470909313185337.mp4&quot; type=&quot;video/mp4&quot;/&gt;&lt;/video&gt;aa&lt;/p&gt;', '1');
INSERT INTO `mr_news_content` VALUES ('25', '25', '&lt;p style=&quot;text-align: center;&quot;&gt;&lt;video class=&quot;edui-upload-video  vjs-default-skin                              video-js&quot; controls=&quot;&quot; preload=&quot;auto&quot; width=&quot;419&quot; height=&quot;258&quot; src=&quot;/yoga/Public/upload/video/20160812/1470994683723665.mp4&quot; data-setup=&quot;{}&quot; style=&quot;display:inline-block;&quot;&gt;&lt;source src=&quot;/yoga/Public/upload/video/20160812/1470994683723665.mp4&quot; type=&quot;video/mp4&quot;/&gt;&lt;/video&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;23我 是是阿萨德阿萨德 &amp;nbsp;按时 &amp;nbsp;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;安徽大数据大神快来决定 阿萨德&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;asldw nas,dnsa daksd &lt;span style=&quot;color: rgb(255, 0, 0);&quot;&gt;asjdl asd asd asjdlkasd aslkd&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(255, 0, 0);&quot;&gt;&lt;br/&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(255, 0, 0);&quot;&gt;&lt;br/&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(255, 0, 0);&quot;&gt;sajdlk aaa&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/ueditor/php/upload/image/20160812/1470994742230220.png&quot; title=&quot;1470994742230220.png&quot; alt=&quot;section1.png&quot; width=&quot;729&quot; height=&quot;218&quot; style=&quot;width: 729px; height: 218px;&quot;/&gt;&lt;img src=&quot;/ueditor/php/upload/image/20160826/1472204573101899.png&quot; title=&quot;1472204573101899.png&quot; alt=&quot;section2.png&quot; width=&quot;436&quot; height=&quot;249&quot; style=&quot;width: 436px; height: 249px;&quot;/&gt;&lt;/p&gt;', '1');
INSERT INTO `mr_news_content` VALUES ('26', '26', '&lt;p style=&quot;text-align: center;&quot;&gt;&lt;video class=&quot;edui-upload-video  vjs-default-skin  video-js&quot; controls=&quot;&quot; preload=&quot;none&quot; width=&quot;420&quot; height=&quot;280&quot; src=&quot;/yoga/Public/upload/video/20160815/1471245478367147.mp4&quot; data-setup=&quot;{}&quot; style=&quot;display:inline-block;&quot;&gt;&lt;source src=&quot;/yoga/Public/upload/video/20160815/1471245478367147.mp4&quot; type=&quot;video/mp4&quot;/&gt;&lt;/video&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;按时打算阿萨德按时阿萨德&lt;/p&gt;', '1');
INSERT INTO `mr_news_content` VALUES ('40', '30', '&lt;p&gt;232323&lt;/p&gt;', '1');
INSERT INTO `mr_news_content` VALUES ('42', '20', '&lt;p&gt;asd&lt;/p&gt;', '1');
INSERT INTO `mr_news_content` VALUES ('43', '21', '&lt;p&gt;asd&lt;/p&gt;', '1');
INSERT INTO `mr_news_content` VALUES ('44', '22', '&lt;p&gt;阿萨德&lt;/p&gt;', '1');
INSERT INTO `mr_news_content` VALUES ('30', '27', '&lt;p&gt;知识知识知识知识知识知识知识知识知识知识知识知识知识知识知识&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0013.gif&quot;/&gt;&lt;/p&gt;', '1');
INSERT INTO `mr_news_content` VALUES ('41', '19', '&lt;p&gt;&lt;img src=&quot;/ueditor/php/upload/image/20161115/1479180042219332.png&quot; title=&quot;1479180042219332.png&quot; alt=&quot;3baa802.png&quot;/&gt;阿萨德按时打&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0013.gif&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', '1');
INSERT INTO `mr_news_content` VALUES ('33', '29', '&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;&lt;strong style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; color: rgb(255, 0, 0);&quot;&gt;●成功不能带来快乐，快乐才是成功的关键，--艾伯特．史怀哲Albert Schweitzer，诺贝尔和平奖得主&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;&lt;strong style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; color: rgb(255, 0, 0);&quot;&gt;●哈佛著名心理学者、幸福课设计者肖恩·埃科尔认为--“先有快乐，然后才有成功，快乐是最强的生产力与竞争力”。&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;&lt;strong style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; color: rgb(255, 0, 0);&quot;&gt;&lt;br style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;/&gt;&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;肖恩·埃科尔这一观念绝不是空穴来风和心灵鸡汤，来自48个国家、275 000人、225个子课题的数据有力证明，快乐可以给组织与个人带来巨大变革：组织生产力平均提高31%，企业的客户满意度平均提高12%，工作效率提高16%，工作投入程度高出32%，工作满意度高出46%。此外，更快乐的员工甚至因更多走进领导的办公室进行积极沟通，而多赢得588美金的薪酬！&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;img data-s=&quot;300,640&quot; data-type=&quot;png&quot; data-src=&quot;http://mmbiz.qpic.cn/mmbiz/Zco8br2Ax93DCR61uEDibnLZIHEAZU4SX3qJic4pRuibWhXY0zh4wLQb7wZEib23ib03LOK3OK8ib3R4PTT0gGYkHapw/0?wx_fmt=png&quot; data-ratio=&quot;0.4701195219123506&quot; data-w=&quot;&quot; _width=&quot;auto&quot; src=&quot;http://mmbiz.qpic.cn/mmbiz/Zco8br2Ax93DCR61uEDibnLZIHEAZU4SX3qJic4pRuibWhXY0zh4wLQb7wZEib23ib03LOK3OK8ib3R4PTT0gGYkHapw/640?wx_fmt=png&amp;tp=webp&amp;wxfrom=5&amp;wx_lazy=1&quot; style=&quot;margin: 0px; padding: 0px; height: auto !important; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; width: auto !important; visibility: visible !important;&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;“生活的艺术”初级课程又名“快乐课程（HAPPINESS PROGRAM）”，它将带你重新与最真实的自己连接，找到内在快乐的源泉，不再纠结，不再等待，不再向外寻找，轻而易举，现在就快乐。&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; color: rgb(255, 0, 0);&quot;&gt;&lt;strong style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;br style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;/&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; color: rgb(255, 0, 0);&quot;&gt;&lt;strong style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;【 净化呼吸是什么? 】&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; color: rgb(255, 0, 0);&quot;&gt;&lt;strong style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;回归自性的韵律&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; color: rgb(255, 0, 0);&quot;&gt;●&lt;/span&gt; 净化呼吸法蕴含呼吸自然而特定的韵律，可以协调身、心与情绪，消除压力、疲劳以及诸如愤怒、挫折和忧郁等负面情绪，让人平静安详，精力充沛，既放松，又能专注注意力。它能清除每日及常年累积的压力，使整个身体系统获得协调。&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; color: rgb(255, 0, 0);&quot;&gt;●&lt;/span&gt; 研究报告显示，泌乳激（Prolactin）—— 一种幸福荷尔蒙在首次的净化呼吸法过程中会明显增加。&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; color: rgb(255, 0, 0);&quot;&gt;● &lt;/span&gt;挪威奥斯陆大学研究发现：「这是非常不简单的。只是在短短的两个小时里，基因表现模式就能产生如此多的转变。」&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; color: rgb(255, 0, 0);&quot;&gt;●&lt;/span&gt;「我们内在需要做清洁净化的过程。我们在睡眠中消除了疲惫，但是深沉的压力仍旧在我们体内，净化呼吸法清洁净化体内的系统。呼吸蕴藏着天大的奥秘。」&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;img data-s=&quot;300,640&quot; data-type=&quot;jpeg&quot; data-src=&quot;http://mmbiz.qpic.cn/mmbiz/Zco8br2Ax93DCR61uEDibnLZIHEAZU4SXibHbxdicrQK5feP2htwBxsmFEXNaXw6EK0MRaZdC9SJyrpictlHyXUWEg/0?wx_fmt=jpeg&quot; data-ratio=&quot;0.4701195219123506&quot; data-w=&quot;&quot; _width=&quot;auto&quot; src=&quot;http://mmbiz.qpic.cn/mmbiz/Zco8br2Ax93DCR61uEDibnLZIHEAZU4SXibHbxdicrQK5feP2htwBxsmFEXNaXw6EK0MRaZdC9SJyrpictlHyXUWEg/640?wx_fmt=jpeg&amp;tp=webp&amp;wxfrom=5&amp;wx_lazy=1&quot; style=&quot;margin: 0px; padding: 0px; height: auto !important; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; width: auto !important; visibility: visible !important;&quot;/&gt;&lt;br style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;&lt;strong style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; color: rgb(255, 0, 0);&quot;&gt;&lt;br style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;/&gt;&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;&lt;strong style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; color: rgb(255, 0, 0);&quot;&gt;【 学员分享 】&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;「一直在寻找这样的滋养内心的训练课程，终于找到了！六天来，身体和心灵都感受到一些变化，身体更敏感更轻松，心情很愉悦，尤其难得的是认识了在传播爱和体验爱的你们！」～心理咨询师&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;「很多惊喜，很多收获。呼吸法很实用，而且方便练习。在六天课程里，我清楚体会了身体、精神和能量状态的提升。在寻找最好的自己的旅程上，这六天的经历美好，启迪，受益，获得了很多的礼物，思考和体验。」～培训教练&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;「整个课程过程收获到了很多的爱与鼓励，信心与勇气。课程的组织和安排具有人性，无论是理念还是方法都具有启发性。老师们真诚恳切，把学生们的心理打开，在这个过程中体会了前所未有的放松和释怀，非常棒的体验。」～大学教师&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;「非常感谢我的同事说服我参加这个课程，让我不仅学习了呼吸和健康的知识，更让我认识到了从前不多认识的对事物和人的接受，相信这会让我今后处理事情时更能把握自己，最重要的接受事物的存在是合理的！」～投资业&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;「在瑜伽的路上，越走越来向瑜伽的外表；通过六天的课程我知道了用净化呼吸法让自己的心完全的静下来，跟自己相处，通过净化呼吸找到真正的瑜伽，内在和外在的结合。」～瑜伽老师&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;「人生是一场修行，脚步越快，我们错过的风景就越多。是时候慢下脚步，让我们的灵魂跟上，在一呼一吸之间，体会生活的艺术。在静坐冥想之时，发现生命的智慧。在这里，教会我的，远比想象的更多。谢谢我遇见所有的美好，祝福大家！」～编剧&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;img data-src=&quot;http://mmbiz.qpic.cn/mmbiz/Zco8br2Ax93DCR61uEDibnLZIHEAZU4SX4libroiaRsAI9Biavz4H8NTqhia9iav6ibmECJIjRCfPoIKKZmPpWOYDfodg/0?wx_fmt=jpeg&quot; data-type=&quot;jpeg&quot; data-s=&quot;300,640&quot; data-ratio=&quot;0.3729166666666667&quot; data-w=&quot;480&quot; _width=&quot;auto&quot; src=&quot;http://mmbiz.qpic.cn/mmbiz/Zco8br2Ax93DCR61uEDibnLZIHEAZU4SX4libroiaRsAI9Biavz4H8NTqhia9iav6ibmECJIjRCfPoIKKZmPpWOYDfodg/640?wx_fmt=jpeg&amp;tp=webp&amp;wxfrom=5&amp;wx_lazy=1&quot; style=&quot;margin: 0px; padding: 0px; height: auto !important; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; width: auto !important; visibility: visible !important;&quot;/&gt;&lt;br style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; color: rgb(255, 0, 0);&quot;&gt;&lt;strong style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;br style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;/&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; color: rgb(255, 0, 0);&quot;&gt;&lt;strong style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;【 课程内容 】&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; color: rgb(255, 0, 0);&quot;&gt;1、调身瑜珈 ：&lt;/span&gt;简易而特殊的伸展运动，配合特殊的呼吸技术，帮助人们进入深度的静心与松弛状态，可获得深度的休息，有效消除紧张、压力，并使筋骨活化、能量增强、通体舒泰。&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; color: rgb(255, 0, 0);&quot;&gt;2、调息法：&lt;/span&gt;不同呼吸法的教授。拓展肺部潜能，增进生命能量的摄取，开拓青春与活力的源泉，促进身体健康﹑使头脑清晰﹑敏锐，精神专注集中，记忆能力增强。&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; color: rgb(255, 0, 0);&quot;&gt;3、净化呼吸：&lt;/span&gt;意指透过净化的行为带来对自己正确的认知。简单易学，可活化体内每个细胞，消除身心疾病的成因，促进自体免疫能力的增强与自我疗愈能力的发挥，对于各种情绪障碍的排除功效尤其卓著。其对于心性的安定，常令初学者在短期习练后即可促进心性的成长与爱心的开拓。&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; color: rgb(255, 0, 0);&quot;&gt;4、静心技术&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; color: rgb(255, 0, 0);&quot;&gt;5、人际互动技术&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; color: rgb(255, 0, 0);&quot;&gt;6、古老而实用的生命智慧&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; color: rgb(255, 0, 0);&quot;&gt;&lt;img data-s=&quot;300,640&quot; data-type=&quot;jpeg&quot; data-src=&quot;http://mmbiz.qpic.cn/mmbiz/Zco8br2Ax93DCR61uEDibnLZIHEAZU4SXoj0zRwGfu8PmmEY5ef58mEg0g8Gos9avnKxwhrWSPBSicu0CXnC4CWg/0?wx_fmt=jpeg&quot; data-ratio=&quot;0.6294820717131474&quot; data-w=&quot;&quot; _width=&quot;auto&quot; src=&quot;http://mmbiz.qpic.cn/mmbiz/Zco8br2Ax93DCR61uEDibnLZIHEAZU4SXoj0zRwGfu8PmmEY5ef58mEg0g8Gos9avnKxwhrWSPBSicu0CXnC4CWg/640?wx_fmt=jpeg&amp;tp=webp&amp;wxfrom=5&amp;wx_lazy=1&quot; style=&quot;margin: 0px; padding: 0px; height: auto !important; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; width: auto !important; visibility: visible !important;&quot;/&gt;&lt;br style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;/&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; color: rgb(255, 0, 0);&quot;&gt;&lt;strong style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;br style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;/&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; color: rgb(255, 0, 0);&quot;&gt;&lt;strong style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;【 生活的艺术 】&lt;/strong&gt;&lt;/span&gt;课程及其净化呼吸法广泛效益已引起各国及世界卫生组织(WHO)的肯定（国际生活的艺术基金会为WHO制定21世纪人类健康准则的咨询顾问），与美国卫生署的赞助研究。 独立的研究报告显示净化呼吸的重大作用：&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;· &amp;nbsp;清除体内累积的毒素，活化细胞&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;· &amp;nbsp;消除紧张压力以及衍生的酸痛与不适现象&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;· &amp;nbsp;强化免疫能力、激发人体自愈疾病的能力&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;· &amp;nbsp;促进神经系统的放松与平衡运作&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;· &amp;nbsp;安定心神、提高记忆力与创造力&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;· &amp;nbsp;转变消极与否定的心态模式，创造积极快乐的人生观&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;· &amp;nbsp;稳定情绪、提升个人成长、促进良好的人际关系&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;· &amp;nbsp;拥有健康、活力、自信、热忱和喜悦&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; color: rgb(255, 0, 0);&quot;&gt;不需要任何基础&lt;/span&gt;，你将在课上学习一套简单的方法，让你可以每天或有需要的时候在家练习，以此活化能量、消除压力、提升快乐指数。课程效益：身心获得和谐、稳定的生命体验，体会到生命源泉的活力，课程中教授的技术易学易练，学习后每日数分钟的练习，即足以维持并增强效益。&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; color: rgb(255, 0, 0);&quot;&gt;&lt;strong style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;br style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;/&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; color: rgb(255, 0, 0);&quot;&gt;&lt;strong style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;适合人群： 18岁以上成人&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;img data-s=&quot;300,640&quot; data-type=&quot;jpeg&quot; data-src=&quot;http://mmbiz.qpic.cn/mmbiz/Zco8br2Ax93DCR61uEDibnLZIHEAZU4SXicticX1DpEIQWSbBasG8CR8QiatgpLf8zLWqgibdXl1kODUXkuckSmLR0A/0?wx_fmt=jpeg&quot; data-ratio=&quot;0.6992031872509961&quot; data-w=&quot;&quot; _width=&quot;auto&quot; src=&quot;http://mmbiz.qpic.cn/mmbiz/Zco8br2Ax93DCR61uEDibnLZIHEAZU4SXicticX1DpEIQWSbBasG8CR8QiatgpLf8zLWqgibdXl1kODUXkuckSmLR0A/640?wx_fmt=jpeg&amp;tp=webp&amp;wxfrom=5&amp;wx_lazy=1&quot; style=&quot;margin: 0px; padding: 0px; height: auto !important; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; width: auto !important; visibility: visible !important;&quot;/&gt;&lt;br style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;&lt;strong style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; color: rgb(255, 0, 0);&quot;&gt;【课程时间】&lt;/strong&gt;&lt;br style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; color: rgb(255, 0, 0);&quot;&gt;&lt;strong style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;pre class=&quot;&quot; ng-bind-html=&quot;message.MMActualContent&quot; style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; color: rgb(62, 62, 62); font-family: inherit; font-size: 14px; white-space: pre-wrap; word-break: initial; line-height: 22.4px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(178, 226, 129);&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; font-size: 16px;&quot;&gt;8月28日：19:00pm—22:00pm（连续三天）&lt;br style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;/&gt;8月29日：11:00am—15:30pm&lt;br style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;/&gt;8月30日：11:00am—16:30pm&lt;/span&gt;&lt;/pre&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; color: rgb(255, 0, 0);&quot;&gt;&lt;strong style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;【课程费用】&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; color: rgb(255, 0, 0);&quot;&gt;&lt;strong style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;pre class=&quot;&quot; ng-bind-html=&quot;message.MMActualContent&quot; style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; color: rgb(62, 62, 62); font-family: inherit; font-size: 14px; white-space: pre-wrap; word-break: initial; line-height: 22.4px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(178, 226, 129);&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; font-size: 16px;&quot;&gt;● 新生：2100元。&lt;br style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;/&gt;&lt;/span&gt;&lt;/pre&gt;&lt;pre class=&quot;&quot; ng-bind-html=&quot;message.MMActualContent&quot; style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; color: rgb(62, 62, 62); font-family: inherit; font-size: 14px; white-space: pre-wrap; word-break: initial; line-height: 22.4px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(178, 226, 129);&quot;&gt;●&amp;nbsp;新生早鸟价：1900元。（8/25前报名并汇全额款)&lt;/pre&gt;&lt;pre class=&quot;&quot; ng-bind-html=&quot;message.MMActualContent&quot; style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; color: rgb(62, 62, 62); font-family: inherit; font-size: 14px; white-space: pre-wrap; word-break: initial; line-height: 22.4px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(178, 226, 129);&quot;&gt;●&amp;nbsp;复训：300&amp;nbsp;元&lt;/pre&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; color: rgb(255, 0, 0);&quot;&gt;&lt;strong style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;【 课程地点 】&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; color: rgb(255, 0, 0);&quot;&gt;&lt;strong style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;br style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;/&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;pre class=&quot;&quot; ng-bind-html=&quot;message.MMActualContent&quot; style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; color: rgb(62, 62, 62); font-family: inherit; font-size: 14px; white-space: pre-wrap; word-break: initial; line-height: 22.4px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(178, 226, 129);&quot;&gt;长宁区天山路600弄（芙蓉江路口）同达创业大厦1407室。&lt;/pre&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; color: rgb(255, 0, 0);&quot;&gt;&lt;strong style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;br style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;/&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; color: rgb(255, 0, 0);&quot;&gt;&lt;strong style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;【 交通路线 】&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; color: rgb(255, 0, 0);&quot;&gt;&lt;strong style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;br style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;/&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;pre class=&quot;&quot; ng-bind-html=&quot;message.MMActualContent&quot; style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; color: rgb(62, 62, 62); font-family: inherit; font-size: 14px; white-space: pre-wrap; word-break: initial; line-height: 22.4px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(178, 226, 129);&quot;&gt;地铁二号线娄山关路站、4号出口出站后右转沿天山路直行约十分钟，到芙蓉江路口就到了，底楼是中国工商银行和兴业银行&amp;nbsp;。&lt;/pre&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; color: rgb(255, 0, 0);&quot;&gt;&lt;strong style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;【 报名方式 】&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; color: rgb(255, 0, 0);&quot;&gt;&lt;strong style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;br style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;/&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;pre class=&quot;&quot; ng-bind-html=&quot;message.MMActualContent&quot; style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; color: rgb(62, 62, 62); font-family: inherit; font-size: 14px; white-space: pre-wrap; word-break: initial; line-height: 22.4px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(178, 226, 129);&quot;&gt;请编辑短信【快乐课程＋姓名＋电话】至：1521-676-8928&lt;/pre&gt;&lt;p&gt;&lt;span style=&quot;margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; font-size: 16px;&quot;&gt;&lt;br/&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', '1');
INSERT INTO `mr_news_content` VALUES ('34', '28', '&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;line-height: 1.6&quot;&gt;&amp;nbsp;生命是一场庆典~欢庆我的存在，欢庆我的呼吸，欢庆我的笑容，欢庆我的童颜童语！&lt;/span&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px;margin-bottom: 0px;padding: 0px;max-width: 100%;clear: both;min-height: 1em;white-space: pre-wrap;color: rgb(62, 62, 62);font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif;line-height: 23.2727px;box-sizing: border-box !important;word-wrap: break-word !important;background-color: rgb(255, 255, 255)&quot;&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/p&gt;&lt;h2 class=&quot;&quot; style=&quot;margin: 0px 0px 14px;padding: 0px 0px 10px;font-weight: 400;font-size: 24px;max-width: 100%;color: rgb(62, 62, 62);font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif;white-space: normal;line-height: 1.4;border-bottom-width: 1px;border-bottom-style: solid;border-bottom-color: rgb(231, 231, 235);box-sizing: border-box !important;word-wrap: break-word !important;background-color: rgb(255, 255, 255)&quot;&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/h2&gt;&lt;p style=&quot;margin-top: 0px;margin-bottom: 0px;padding: 0px;max-width: 100%;clear: both;min-height: 1em;white-space: pre-wrap;color: rgb(62, 62, 62);font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif;line-height: 23.2727px;box-sizing: border-box !important;word-wrap: break-word !important;background-color: rgb(255, 255, 255)&quot;&gt;&lt;br/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;strong style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;&gt;&lt;span sans-serif=&quot;sans-serif&quot; font-sizept=&quot;font-size:14.0pt&quot; style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(192, 0, 0);background-color: yellow&quot;&gt;课程内容：&lt;/span&gt;&lt;/strong&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;strong style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;&gt;&lt;span sans-serif=&quot;sans-serif&quot; font-sizept=&quot;font-size:14.0pt&quot; style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(192, 0, 0)&quot;&gt;•&lt;/span&gt;&lt;/strong&gt;&lt;span sans-serif=&quot;sans-serif&quot; font-sizept=&quot;font-size:14.0pt&quot; style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(0, 32, 96)&quot;&gt;藉由呼吸法帮助孩童释放压力、克服如恐惧、愤怒、不安、羞怯、挫折等种种不良情绪。&lt;/span&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;strong style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;&gt;&lt;span sans-serif=&quot;sans-serif&quot; font-sizept=&quot;font-size:14.0pt&quot; style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(192, 0, 0)&quot;&gt;•&lt;/span&gt;&lt;/strong&gt;&lt;span sans-serif=&quot;sans-serif&quot; font-sizept=&quot;font-size:14.0pt&quot; style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(0, 32, 96)&quot;&gt;身体的舒展，促进骨骼的健康生长&lt;/span&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;strong style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;&gt;&lt;span sans-serif=&quot;sans-serif&quot; font-sizept=&quot;font-size:14.0pt&quot; style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(192, 0, 0)&quot;&gt;•&lt;/span&gt;&lt;/strong&gt;&lt;span sans-serif=&quot;sans-serif&quot; font-sizept=&quot;font-size:14.0pt&quot; style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(0, 32, 96)&quot;&gt;有趣的游戏、各种好玩的活动过程，扩展感知与专注力、与5把生活金钥匙&lt;/span&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;strong style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;&gt;&lt;span sans-serif=&quot;sans-serif&quot; font-sizept=&quot;font-size:14.0pt&quot; style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(192, 0, 0)&quot;&gt;•&lt;/span&gt;&lt;span sans-serif=&quot;sans-serif&quot; font-sizept=&quot;font-size:14.0pt&quot; style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;&gt;&lt;span style=&quot;color:#002060;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;&gt;梵文的唱诵，拓展身心的觉知，爱自己，分享爱。&lt;/span&gt;&lt;/span&gt;&lt;/strong&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px;margin-bottom: 0px;padding: 0px;max-width: 100%;clear: both;min-height: 1em;white-space: pre-wrap;color: rgb(62, 62, 62);font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif;line-height: 23.2727px;box-sizing: border-box !important;word-wrap: break-word !important;background-color: rgb(255, 255, 255)&quot;&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px;margin-bottom: 0px;padding: 0px;max-width: 100%;clear: both;min-height: 1em;white-space: pre-wrap;color: rgb(62, 62, 62);font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif;line-height: 23.2727px;box-sizing: border-box !important;word-wrap: break-word !important;background-color: rgb(255, 255, 255)&quot;&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br style=&quot;color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; text-align: center; white-space: pre-wrap; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;strong style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;&gt;&lt;span sans-serif=&quot;sans-serif&quot; font-sizept=&quot;font-size:14.0pt&quot; style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(192, 0, 0);background-color: yellow&quot;&gt;课程效益：&lt;/span&gt;&lt;/strong&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;strong style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;&gt;&lt;span sans-serif=&quot;sans-serif&quot; font-sizept=&quot;font-size:14.0pt&quot; style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(192, 0, 0)&quot;&gt;•绽放身心&lt;/span&gt;&lt;/strong&gt;&lt;span sans-serif=&quot;sans-serif&quot; font-sizept=&quot;font-size:14.0pt&quot; style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(0, 32, 96)&quot;&gt;，提升专注力&lt;/span&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;strong style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;&gt;&lt;span sans-serif=&quot;sans-serif&quot; font-sizept=&quot;font-size:14.0pt&quot; style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(192, 0, 0)&quot;&gt;•&lt;/span&gt;&lt;/strong&gt;&lt;span sans-serif=&quot;sans-serif&quot; font-sizept=&quot;font-size:14.0pt&quot; style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(0, 32, 96)&quot;&gt;清除负面情绪，促进融洽共处&lt;/span&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;strong style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;&gt;&lt;span sans-serif=&quot;sans-serif&quot; font-sizept=&quot;font-size:14.0pt&quot; style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(192, 0, 0)&quot;&gt;•&lt;/span&gt;&lt;/strong&gt;&lt;span sans-serif=&quot;sans-serif&quot; font-sizept=&quot;font-size:14.0pt&quot; style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(0, 32, 96)&quot;&gt;改善健康状况，迸发能量及活力&lt;/span&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;strong style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;&gt;&lt;span sans-serif=&quot;sans-serif&quot; font-sizept=&quot;font-size:14.0pt&quot; style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(192, 0, 0)&quot;&gt;•&lt;/span&gt;&lt;/strong&gt;&lt;span sans-serif=&quot;sans-serif&quot; font-sizept=&quot;font-size:14.0pt&quot; style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(0, 32, 96)&quot;&gt;发挥想象与创造力&lt;/span&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;strong style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;&gt;&lt;span sans-serif=&quot;sans-serif&quot; font-sizept=&quot;font-size:14.0pt&quot; style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(192, 0, 0)&quot;&gt;•乐观&lt;/span&gt;&lt;/strong&gt;&lt;span sans-serif=&quot;sans-serif&quot; font-sizept=&quot;font-size:14.0pt&quot; style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(0, 32, 96)&quot;&gt;面对挑战&lt;/span&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;strong style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;&gt;&lt;span sans-serif=&quot;sans-serif&quot; font-sizept=&quot;font-size:14.0pt&quot; style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(192, 0, 0);background-color: yellow&quot;&gt;课程时间：&lt;/span&gt;&lt;/strong&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px;margin-bottom: 0px;padding: 0px;max-width: 100%;clear: both;min-height: 1em;white-space: pre-wrap;color: rgb(62, 62, 62);font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif;line-height: 23.2727px;box-sizing: border-box !important;word-wrap: break-word !important;background-color: rgb(255, 255, 255)&quot;&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span sans-serif=&quot;sans-serif&quot; font-sizept=&quot;font-size:14.0pt&quot; style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(0, 32, 96)&quot;&gt;8月26日-8月29日&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span sans-serif=&quot;sans-serif&quot; font-sizept=&quot;font-size:14.0pt&quot; style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(0, 32, 96)&quot;&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(0, 32, 96)&quot;&gt;8月26日: &amp;nbsp;13:00PM-16:15PM&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(0, 32, 96)&quot;&gt;8月27日: &amp;nbsp;&lt;span style=&quot;;padding: 0px;max-width: 100%;line-height: 25.6px;box-sizing: border-box !important;word-wrap: break-word !important&quot;&gt;11:00AM-15:00PM&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(0, 32, 96)&quot;&gt;8月28日: &amp;nbsp;13:00PM-16:15PM&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(0, 32, 96)&quot;&gt;8月29日: &amp;nbsp;11:00PM-16:15PM&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px;margin-bottom: 0px;padding: 0px;max-width: 100%;clear: both;min-height: 1em;white-space: pre-wrap;color: rgb(62, 62, 62);font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif;line-height: 23.2727px;box-sizing: border-box !important;word-wrap: break-word !important;background-color: rgb(255, 255, 255)&quot;&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;strong style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;&gt;&lt;span sans-serif=&quot;sans-serif&quot; font-sizept=&quot;font-size:14.0pt&quot; style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(192, 0, 0);background-color: yellow&quot;&gt;课程费用：&lt;/span&gt;&lt;/strong&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span sans-serif=&quot;sans-serif&quot; font-sizept=&quot;font-size:14.0pt&quot; style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(0, 32, 96)&quot;&gt;生活的&lt;/span&gt;&lt;span sans-serif=&quot;sans-serif&quot; font-sizept=&quot;font-size:14.0pt&quot; style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(0, 32, 96)&quot;&gt;艺术&lt;/span&gt;&lt;span sans-serif=&quot;sans-serif&quot; font-sizept=&quot;font-size:14.0pt&quot; style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(0, 32, 96)&quot;&gt;學員的小孩与复训： &lt;span style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;&gt;900&lt;/span&gt;元&lt;/span&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span sans-serif=&quot;sans-serif&quot; font-sizept=&quot;font-size:14.0pt&quot; style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(0, 32, 96)&quot;&gt;非&lt;/span&gt;&lt;span sans-serif=&quot;sans-serif&quot; font-sizept=&quot;font-size:14.0pt&quot; style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(0, 32, 96)&quot;&gt;生活的艺术学员的小孩：&lt;/span&gt; &lt;span sans-serif=&quot;sans-serif&quot; font-sizept=&quot;font-size:14.0pt&quot; style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(0, 32, 96)&quot;&gt;1000&lt;/span&gt;&lt;span sans-serif=&quot;sans-serif&quot; font-sizept=&quot;font-size:14.0pt&quot; style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(0, 32, 96)&quot;&gt;元&lt;/span&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px;margin-bottom: 0px;padding: 0px;max-width: 100%;clear: both;min-height: 1em;white-space: pre-wrap;color: rgb(62, 62, 62);font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif;line-height: 23.2727px;box-sizing: border-box !important;word-wrap: break-word !important;background-color: rgb(255, 255, 255)&quot;&gt;&lt;br/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;strong style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;&gt;&lt;span sans-serif=&quot;sans-serif&quot; font-sizept=&quot;font-size:14.0pt&quot; style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(192, 0, 0);background-color: yellow&quot;&gt;报名方式：&lt;/span&gt;&lt;/strong&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px;margin-bottom: 0px;padding: 0px;max-width: 100%;clear: both;min-height: 1em;white-space: pre-wrap;color: rgb(62, 62, 62);font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif;line-height: 25.6px;box-sizing: border-box !important;word-wrap: break-word !important;background-color: rgb(255, 255, 255)&quot;&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span sans-serif=&quot;sans-serif&quot; font-sizept=&quot;font-size:14.0pt&quot; style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(192, 0, 0)&quot;&gt;请编辑短信：&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span sans-serif=&quot;sans-serif&quot; font-sizept=&quot;font-size:14.0pt&quot; style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(192, 0, 0)&quot;&gt;儿童&lt;/span&gt;&lt;span sans-serif=&quot;sans-serif&quot; font-sizept=&quot;font-size:14.0pt&quot; style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(192, 0, 0)&quot;&gt;課程＋家长姓名＋儿童姓名 （小孩性别，年龄）+ 家长电话&lt;/span&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span sans-serif=&quot;sans-serif&quot; font-sizept=&quot;font-size:14.0pt&quot; style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(192, 0, 0)&quot;&gt;发送至： 13818072305&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span sans-serif=&quot;sans-serif&quot; font-sizept=&quot;font-size:14.0pt&quot; style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(192, 0, 0)&quot;&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;color:#c00000;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;&gt;您若是从外地带孩子过来上课，请注明一下，谢谢。&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;strong style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;&gt;&lt;span sans-serif=&quot;sans-serif&quot; font-sizept=&quot;font-size:14.0pt&quot; style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(192, 0, 0);background-color: yellow&quot;&gt;汇款帐号：&lt;/span&gt;&lt;/strong&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;span style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;line-height: 25.6px;font-size: 14px&quot;&gt;生活艺术瑜伽文化传播（厦门）有限公司&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;账号：414370294985&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;开户行：中国银行厦门分行江头支行&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;支付宝：&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;中国银行&amp;nbsp;&amp;nbsp;xm_aol@163.com&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/span&gt;&lt;strong style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;line-height: 25.6px;white-space: normal&quot;&gt;&lt;span style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;font-size: 14px&quot;&gt;（请于汇款时备注写明“aesh001+家长姓名+儿童姓名”，並于完成汇款后短信通知报名电话）&lt;/span&gt;&lt;/strong&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px;margin-bottom: 0px;padding: 0px;max-width: 100%;clear: both;min-height: 1em;white-space: pre-wrap;color: rgb(62, 62, 62);font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif;line-height: 23.2727px;box-sizing: border-box !important;word-wrap: break-word !important;background-color: rgb(255, 255, 255)&quot;&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px;margin-bottom: 0px;padding: 0px;max-width: 100%;clear: both;min-height: 1em;white-space: pre-wrap;color: rgb(62, 62, 62);font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif;line-height: 23.2727px;box-sizing: border-box !important;word-wrap: break-word !important;background-color: rgb(255, 255, 255)&quot;&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;strong style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;&gt;&lt;span sans-serif=&quot;sans-serif&quot; font-sizept=&quot;font-size:14.0pt&quot; style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(192, 0, 0);background-color: yellow&quot;&gt;课程地点：&lt;/span&gt;&lt;/strong&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(0, 32, 96)&quot;&gt;长宁区天山路&lt;/span&gt;&lt;span style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(0, 32, 96)&quot;&gt;600&lt;/span&gt;&lt;span style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(0, 32, 96)&quot;&gt;弄（芙蓉江路口）同达创业大厦&lt;/span&gt;&lt;span style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(0, 32, 96)&quot;&gt;1407&lt;/span&gt;&lt;span style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(0, 32, 96)&quot;&gt;室。&lt;/span&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;strong style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;&gt;&lt;span sans-serif=&quot;sans-serif&quot; font-sizept=&quot;font-size:14.0pt&quot; style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(192, 0, 0);background-color: yellow&quot;&gt;交通路线：&lt;/span&gt;&lt;/strong&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(0, 32, 96)&quot;&gt;地铁二号线娄山关路站、&lt;/span&gt;&lt;span style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(0, 32, 96)&quot;&gt;4&lt;/span&gt;&lt;span style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(0, 32, 96)&quot;&gt;号出口出站后右转沿天山路直行约十分钟，到芙蓉江路口就到了，底楼是中国工商银行和兴业银行。&lt;/span&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;strong style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;&gt;&lt;span sans-serif=&quot;sans-serif&quot; font-sizept=&quot;font-size:14.0pt&quot; style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(192, 0, 0);background-color: yellow&quot;&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px;margin-bottom: 0px;padding: 0px;max-width: 100%;clear: both;min-height: 1em;white-space: pre-wrap;color: rgb(62, 62, 62);font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif;line-height: 23.2727px;box-sizing: border-box !important;word-wrap: break-word !important;background-color: rgb(255, 255, 255)&quot;&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span sans-serif=&quot;sans-serif&quot; font-sizept=&quot;font-size:14.0pt&quot; style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(0, 32, 96)&quot;&gt;————————————————————&lt;/span&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;strong style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;&gt;&lt;span sans-serif=&quot;sans-serif&quot; font-sizept=&quot;font-size:14.0pt&quot; style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(192, 0, 0);background-color: yellow&quot;&gt;更多资讯可以通过以下网址：&lt;/span&gt;&lt;/strong&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span sans-serif=&quot;sans-serif&quot; font-sizept=&quot;font-size:14.0pt&quot; style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(0, 32, 96)&quot;&gt;抚育天使（中文字幕）&lt;/span&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;span style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(0, 32, 96)&quot;&gt;http://www.tudou.com/programs/view/4BwW8KsxHT8/&lt;/span&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span sans-serif=&quot;sans-serif&quot; font-sizept=&quot;font-size:14.0pt&quot; style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(0, 32, 96)&quot;&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span sans-serif=&quot;sans-serif&quot; font-sizept=&quot;font-size:14.0pt&quot; style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(0, 32, 96)&quot;&gt;YES! &lt;/span&gt;&lt;span sans-serif=&quot;sans-serif&quot; font-sizept=&quot;font-size:14.0pt&quot; style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(0, 32, 96)&quot;&gt;青少年課程學員分享（中文字幕）&lt;/span&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(0, 32, 96)&quot;&gt;http://www.tudou.com/programs/view/U2hZhPKZoK0/&lt;/span&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span sans-serif=&quot;sans-serif&quot; font-sizept=&quot;font-size:14.0pt&quot; style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(0, 32, 96)&quot;&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span sans-serif=&quot;sans-serif&quot; font-sizept=&quot;font-size:14.0pt&quot; style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(0, 32, 96)&quot;&gt;“呼吸的科学“动画视频（中文字幕）&lt;/span&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(0, 32, 96)&quot;&gt;http://www.tudou.com/programs/view/18718T4deaU/&lt;/span&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(0, 32, 96)&quot;&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(0, 32, 96)&quot;&gt;生活的艺术全球官网（英文）&lt;/span&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;color: rgb(0, 32, 96)&quot;&gt;http://www.artofliving.org&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px;margin-bottom: 0px;padding: 0px;max-width: 100%;clear: both;min-height: 1em;white-space: pre-wrap;color: rgb(62, 62, 62);font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif;line-height: 23.2727px;box-sizing: border-box !important;word-wrap: break-word !important;background-color: rgb(255, 255, 255)&quot;&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;img data-s=&quot;300,640&quot; data-type=&quot;jpeg&quot; data-ratio=&quot;1.1225296442687747&quot; data-w=&quot;253&quot; width=&quot;auto&quot; data-src=&quot;http://mmbiz.qpic.cn/mmbiz/Zco8br2Ax90OOxJRVukRSpmPY58WzVjBjRYH0BIhvU593AgnLWGXSnCTIroJcpbXmVg1YLUApr4bZvEbcmbdyQ/640?wx_fmt=jpeg&quot; _width=&quot;auto&quot; src=&quot;http://mmbiz.qpic.cn/mmbiz/Zco8br2Ax90OOxJRVukRSpmPY58WzVjBjRYH0BIhvU593AgnLWGXSnCTIroJcpbXmVg1YLUApr4bZvEbcmbdyQ/640?wx_fmt=jpeg&amp;tp=webp&amp;wxfrom=5&amp;wx_lazy=1&quot; style=&quot;;padding: 0px;height: auto !important;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;visibility: visible !important;width: auto !important&quot;/&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px;margin-bottom: 0px;padding: 0px;max-width: 100%;clear: both;min-height: 1em;white-space: pre-wrap;color: rgb(62, 62, 62);font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif;line-height: 23.2727px;box-sizing: border-box !important;word-wrap: break-word !important;background-color: rgb(255, 255, 255)&quot;&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;font-family: 宋体&quot;&gt;欢迎订阅“&lt;/span&gt;AOL&lt;span style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;font-family: 宋体&quot;&gt;生活的艺术上海中心&lt;/span&gt;&lt;span style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;font-family: 宋体&quot;&gt;微信号”&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;font-family: 宋体&quot;&gt;请点击右上，查看官方账号，点击“关注”&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;font-family: 宋体&quot;&gt;或分享到朋友圈。&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;font-family: Calibri, sans-serif;font-size: 14px&quot;&gt;~一起&lt;/span&gt;&lt;span style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;font-family: 宋体;font-size: 14px&quot;&gt;分享喜悦、智慧与正能量~&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px;margin-bottom: 0px;padding: 0px;max-width: 100%;clear: both;min-height: 1em;white-space: pre-wrap;color: rgb(62, 62, 62);font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif;line-height: 23.2727px;box-sizing: border-box !important;word-wrap: break-word !important;background-color: rgb(255, 255, 255)&quot;&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;去年的课程分享~&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;img data-s=&quot;300,640&quot; data-type=&quot;jpeg&quot; data-src=&quot;http://mmbiz.qpic.cn/mmbiz/Zco8br2Ax93DCR61uEDibnLZIHEAZU4SXwps8BM8DJwAnUfI4Uxr1yM9icNcG0PIAT5Blnmmtg5COD9atoTlib2qw/0?wx_fmt=jpeg&quot; data-ratio=&quot;0.6672661870503597&quot; data-w=&quot;&quot; src=&quot;http://mmbiz.qpic.cn/mmbiz/Zco8br2Ax93DCR61uEDibnLZIHEAZU4SXwps8BM8DJwAnUfI4Uxr1yM9icNcG0PIAT5Blnmmtg5COD9atoTlib2qw/640?wx_fmt=jpeg&amp;tp=webp&amp;wxfrom=5&amp;wx_lazy=1&quot; style=&quot;;padding: 0px;height: auto !important;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;width: auto !important;visibility: visible !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;img data-s=&quot;300,640&quot; data-type=&quot;jpeg&quot; data-src=&quot;http://mmbiz.qpic.cn/mmbiz/Zco8br2Ax93DCR61uEDibnLZIHEAZU4SX51hPWdIWfkA8Q5iaHhEwsibz4Y9e7UDc4icZFw1BtBwl4R0w9SLticmQDw/0?wx_fmt=jpeg&quot; data-ratio=&quot;1.5&quot; data-w=&quot;&quot; src=&quot;http://mmbiz.qpic.cn/mmbiz/Zco8br2Ax93DCR61uEDibnLZIHEAZU4SX51hPWdIWfkA8Q5iaHhEwsibz4Y9e7UDc4icZFw1BtBwl4R0w9SLticmQDw/640?wx_fmt=jpeg&amp;tp=webp&amp;wxfrom=5&amp;wx_lazy=1&quot; style=&quot;;padding: 0px;height: auto !important;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;width: auto !important;visibility: visible !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px;margin-bottom: 0px;padding: 0px;max-width: 100%;clear: both;min-height: 1em;white-space: pre-wrap;color: rgb(62, 62, 62);font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif;line-height: 23.2727px;box-sizing: border-box !important;word-wrap: break-word !important;background-color: rgb(255, 255, 255)&quot;&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;img data-s=&quot;300,640&quot; data-type=&quot;jpeg&quot; data-src=&quot;http://mmbiz.qpic.cn/mmbiz/Zco8br2Ax93DCR61uEDibnLZIHEAZU4SXBOFZBGT8gWo41hoUAZWu8QiaQgN7iaibcArxxZdNULBcayBZQo3CXfXgg/0?wx_fmt=jpeg&quot; data-ratio=&quot;0.6672661870503597&quot; data-w=&quot;&quot; src=&quot;http://mmbiz.qpic.cn/mmbiz/Zco8br2Ax93DCR61uEDibnLZIHEAZU4SXBOFZBGT8gWo41hoUAZWu8QiaQgN7iaibcArxxZdNULBcayBZQo3CXfXgg/640?wx_fmt=jpeg&amp;tp=webp&amp;wxfrom=5&amp;wx_lazy=1&quot; style=&quot;;padding: 0px;height: 447.068px !important;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;width: 670px !important;visibility: visible !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;img data-s=&quot;300,640&quot; data-type=&quot;jpeg&quot; data-src=&quot;http://mmbiz.qpic.cn/mmbiz/Zco8br2Ax93DCR61uEDibnLZIHEAZU4SX54bkm9UoVa3FG9ojPabDTGjYzgMPMXytu8QbrOvekHSib6P86ibHlyMw/0?wx_fmt=jpeg&quot; data-ratio=&quot;0.6672661870503597&quot; data-w=&quot;&quot; src=&quot;http://mmbiz.qpic.cn/mmbiz/Zco8br2Ax93DCR61uEDibnLZIHEAZU4SX54bkm9UoVa3FG9ojPabDTGjYzgMPMXytu8QbrOvekHSib6P86ibHlyMw/640?wx_fmt=jpeg&amp;tp=webp&amp;wxfrom=5&amp;wx_lazy=1&quot; style=&quot;;padding: 0px;height: auto !important;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;width: auto !important;visibility: visible !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px;margin-bottom: 0px;padding: 0px;max-width: 100%;clear: both;min-height: 1em;white-space: pre-wrap;color: rgb(62, 62, 62);font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif;line-height: 23.2727px;box-sizing: border-box !important;word-wrap: break-word !important;background-color: rgb(255, 255, 255)&quot;&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;img data-s=&quot;300,640&quot; data-type=&quot;jpeg&quot; data-src=&quot;http://mmbiz.qpic.cn/mmbiz/Zco8br2Ax93DCR61uEDibnLZIHEAZU4SXb8y3JqwwjZVtEp01DUFmFRG0uXY01comRqibJQcbM6MfG9TlJPAwoeA/0?wx_fmt=jpeg&quot; data-ratio=&quot;0.6672661870503597&quot; data-w=&quot;&quot; src=&quot;http://mmbiz.qpic.cn/mmbiz/Zco8br2Ax93DCR61uEDibnLZIHEAZU4SXb8y3JqwwjZVtEp01DUFmFRG0uXY01comRqibJQcbM6MfG9TlJPAwoeA/640?wx_fmt=jpeg&amp;tp=webp&amp;wxfrom=5&amp;wx_lazy=1&quot; style=&quot;;padding: 0px;height: 447.068px !important;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;width: 670px !important;visibility: visible !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;img data-s=&quot;300,640&quot; data-type=&quot;jpeg&quot; data-src=&quot;http://mmbiz.qpic.cn/mmbiz/Zco8br2Ax93DCR61uEDibnLZIHEAZU4SXCPmGk3HicoqDPG8WiabiaDQI8hFeU8RO0mTEzRwdkQDoDQIPHXlicHCTZA/0?wx_fmt=jpeg&quot; data-ratio=&quot;0.6672661870503597&quot; data-w=&quot;&quot; src=&quot;http://mmbiz.qpic.cn/mmbiz/Zco8br2Ax93DCR61uEDibnLZIHEAZU4SXCPmGk3HicoqDPG8WiabiaDQI8hFeU8RO0mTEzRwdkQDoDQIPHXlicHCTZA/640?wx_fmt=jpeg&amp;tp=webp&amp;wxfrom=5&amp;wx_lazy=1&quot; style=&quot;;padding: 0px;height: auto !important;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;width: auto !important;visibility: visible !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;img data-s=&quot;300,640&quot; data-type=&quot;jpeg&quot; data-src=&quot;http://mmbiz.qpic.cn/mmbiz/Zco8br2Ax93DCR61uEDibnLZIHEAZU4SXAMG2jMFG63bkvcM07dsr1u1RIbNEibsUuWHGgjL13TWib9BYQicIZHvlA/0?wx_fmt=jpeg&quot; data-ratio=&quot;0.6672661870503597&quot; data-w=&quot;&quot; src=&quot;http://mmbiz.qpic.cn/mmbiz/Zco8br2Ax93DCR61uEDibnLZIHEAZU4SXAMG2jMFG63bkvcM07dsr1u1RIbNEibsUuWHGgjL13TWib9BYQicIZHvlA/640?wx_fmt=jpeg&amp;tp=webp&amp;wxfrom=5&amp;wx_lazy=1&quot; style=&quot;;padding: 0px;height: auto !important;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;width: auto !important;visibility: visible !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;img data-s=&quot;300,640&quot; data-type=&quot;jpeg&quot; data-src=&quot;http://mmbiz.qpic.cn/mmbiz/Zco8br2Ax93DCR61uEDibnLZIHEAZU4SXIlictvnVIE46wEdfht5gqr4mHSxRfPKJ2SLC1iczjY7pEeIDAEf6l4pw/0?wx_fmt=jpeg&quot; data-ratio=&quot;0.6672661870503597&quot; data-w=&quot;&quot; src=&quot;http://mmbiz.qpic.cn/mmbiz/Zco8br2Ax93DCR61uEDibnLZIHEAZU4SXIlictvnVIE46wEdfht5gqr4mHSxRfPKJ2SLC1iczjY7pEeIDAEf6l4pw/640?wx_fmt=jpeg&amp;tp=webp&amp;wxfrom=5&amp;wx_lazy=1&quot; style=&quot;;padding: 0px;height: auto !important;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;width: auto !important;visibility: visible !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; color: rgb(62, 62, 62); font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important; text-align: center; background-color: rgb(255, 255, 255);&quot;&gt;&lt;img data-s=&quot;300,640&quot; data-type=&quot;jpeg&quot; data-src=&quot;http://mmbiz.qpic.cn/mmbiz/Zco8br2Ax93DCR61uEDibnLZIHEAZU4SX08Tmuk349VtiaFoBnlkd9NWupvrow1V9JpwrNZzJBv8zkUWsdgzZFIA/0?wx_fmt=jpeg&quot; data-ratio=&quot;0.6672661870503597&quot; data-w=&quot;&quot; src=&quot;http://mmbiz.qpic.cn/mmbiz/Zco8br2Ax93DCR61uEDibnLZIHEAZU4SX08Tmuk349VtiaFoBnlkd9NWupvrow1V9JpwrNZzJBv8zkUWsdgzZFIA/640?wx_fmt=jpeg&amp;tp=webp&amp;wxfrom=5&amp;wx_lazy=1&quot; style=&quot;;padding: 0px;height: auto !important;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important;width: auto !important;visibility: visible !important&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px;margin-bottom: 0px;padding: 0px;max-width: 100%;clear: both;min-height: 1em;white-space: pre-wrap;color: rgb(62, 62, 62);font-family: &amp;#39;Helvetica Neue&amp;#39;, Helvetica, &amp;#39;Hiragino Sans GB&amp;#39;, &amp;#39;Microsoft YaHei&amp;#39;, Arial, sans-serif;line-height: 23.2727px;box-sizing: border-box !important;word-wrap: break-word !important;background-color: rgb(255, 255, 255)&quot;&gt;&lt;br style=&quot;;padding: 0px;max-width: 100%;box-sizing: border-box !important;word-wrap: break-word !important&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', '1');
INSERT INTO `mr_news_content` VALUES ('35', '29', '&lt;p style=&quot;margin-top: 0px; margin-bottom: 15px; padding: 0px; word-break: break-all; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; overflow: hidden; line-height: 25px; font-size: 16px; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; word-break: break-all; max-width: 100%; font-size: 14px; font-family: 寰蒋闆呴粦, 榛戜綋; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;此时我跪着的双腿有着强烈的疼痛感，在老师带领下短促呼吸，双手也开始感觉麻木。我嗓子很干，由于频繁地深呼吸，我的脉搏也开始加快，疼痛感占据了我的所有感受，脑子一片空白。“在这个过程中，每个人的反应都会不一样，不需要去关注别人的反应，你只需要闭着眼，认真对待自己就好。呼吸法的目的就是体验本我。我们通过呼吸不停地把体内的毒素排出来，才能看到本我。”瑜伽老师阿密特·科兰纳（Amit Khorana）这样解释道。而1993年就进入这家净心所的瑜伽导师斯瓦米基（Swamiji）则解释得更加深入：“在你做完净化呼吸法之后，你会觉得你是完全清醒的，你的脑子是完全空白的，但你很专注、完全放松、思绪不乱，这种空白的状态就是我们希望达到的。”aa&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 10px; padding: 0px; word-break: break-all; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; overflow: hidden; line-height: 25px; font-size: 16px; text-align: center; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; word-break: break-all; max-width: 100%; font-size: 14px; font-family: 寰蒋闆呴粦, 榛戜綋; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;img data-w=&quot;534&quot; data-ratio=&quot;1.4981273408239701&quot; data-s=&quot;300,640&quot; data-type=&quot;jpeg&quot; src=&quot;http://read.html5.qq.com/image?src=forum&amp;q=5&amp;r=0&amp;imgflag=7&amp;imageUrl=http://mmbiz.qpic.cn/mmbiz/c2Sib3Mp7pON0iaEicGWDJ3KzgpJZy1p7ESu9ALNUn0ria3HhGmd0A6KD2GAqImjk5eURXdRYGLhGGrKeRLnHk86aw/0?wx_fmt=jpeg&quot; style=&quot;margin: 0px auto; padding: 0px; word-break: break-all; border: none; display: block; max-width: 100%; height: auto !important; box-sizing: border-box !important; word-wrap: break-word !important;&quot;/&gt;&lt;br style=&quot;margin: 0px; padding: 0px; word-break: break-all; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;/&gt;&lt;span style=&quot;margin: 0px; padding: 0px; word-break: break-all; max-width: 100%; font-size: 12px; color: rgb(136, 136, 136); box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;印度瑜伽大师若威·香卡的弟子斯瓦米基（摄影：张星云）&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 15px; padding: 0px; word-break: break-all; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; overflow: hidden; line-height: 25px; font-size: 16px; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; word-break: break-all; max-width: 100%; font-size: 14px; font-family: 寰蒋闆呴粦, 榛戜綋; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;这是我在“生活的艺术基金会”净修所的第三天，也是整套基础课程的最后一天。我们每天在瑜伽老师的带领下学习瑜伽体位法、净化呼吸法和静坐冥想，这三个部分视为整个一套过程。初级课程持续三天，其间在净修所里不能喝咖啡或茶，不能抽烟喝酒，而每顿饭也只能吃净修所食堂里的素餐。素餐只提供最基本的能量和营养，在印度传统医学阿育吠陀中，水果和蔬菜是悦性食物，可以让人保持清醒，而肉类则是惰性食物，多吃只会加重自己的身体负担。而当夜幕降临，大家去静修中心集体唱歌，是为唱场。&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 15px; padding: 0px; word-break: break-all; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; overflow: hidden; line-height: 25px; font-size: 16px; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; word-break: break-all; max-width: 100%; font-size: 14px; font-family: 寰蒋闆呴粦, 榛戜綋; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;在这所净心所里，瑜伽正在寻找它的现代化意义。1981年印度瑜伽大师诗丽·诗丽·若威·香卡（Sri Sri Ravi Shankar）创立了生活的艺术基金会，并在班加罗尔20公里外的郊区购置了一片土地，专门用来教授别人他自创的“净化呼吸法”。此后基金会以非政府组织的身份示人，先在欧洲风靡流行起来，随后印度国内的学员也越来越多。1996年更是获准成为联合国非政府组织，从创立之初至今的35年间，生活的艺术基金会总共在155个国家授过课。&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 10px; padding: 0px; word-break: break-all; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; overflow: hidden; line-height: 25px; font-size: 16px; text-align: center; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; word-break: break-all; max-width: 100%; font-size: 14px; font-family: 寰蒋闆呴粦, 榛戜綋; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;img data-w=&quot;&quot; data-ratio=&quot;0.6672661870503597&quot; data-s=&quot;300,640&quot; data-type=&quot;jpeg&quot; src=&quot;http://read.html5.qq.com/image?src=forum&amp;q=5&amp;r=0&amp;imgflag=7&amp;imageUrl=http://mmbiz.qpic.cn/mmbiz/c2Sib3Mp7pON0iaEicGWDJ3KzgpJZy1p7ESF1ruvwxnTluJy6kc3ql7svqP2e8k7Tgeu43BFgXFicS6YXRSX1L2oHA/0?wx_fmt=jpeg&quot; style=&quot;margin: 0px auto; padding: 0px; word-break: break-all; border: none; display: block; max-width: 100%; height: auto !important; box-sizing: border-box !important; word-wrap: break-word !important;&quot;/&gt;&lt;br style=&quot;margin: 0px; padding: 0px; word-break: break-all; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;/&gt;&lt;span style=&quot;margin: 0px; padding: 0px; word-break: break-all; max-width: 100%; font-size: 12px; color: rgb(136, 136, 136); box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;印度瑜伽大师诗丽·诗丽·若威·香卡&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 15px; padding: 0px; word-break: break-all; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; overflow: hidden; line-height: 25px; font-size: 16px; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; word-break: break-all; max-width: 100%; font-size: 14px; font-family: 寰蒋闆呴粦, 榛戜綋; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;在印度文化中，有信奉上师（Guru）的传统。印度的每一个家庭都有会为自己“点亮人生”的上师。这种文化传统也使得印度出现了大量上师，每个自立上师的人都会从瑜伽、《吠陀经》等印度古典文化中寻找自己的解释并创立特殊的技法，而一众学员或者信徒则会追随这位上师，并学习其独创的修行技法。&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 15px; padding: 0px; word-break: break-all; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; overflow: hidden; line-height: 25px; font-size: 16px; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; word-break: break-all; max-width: 100%; font-size: 14px; font-family: 寰蒋闆呴粦, 榛戜綋; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;生活的艺术净心所的瑜伽导师斯瓦米基1993年开始师从若威·香卡。他还记得90年代初的时候，净修所的老师和学生基本都是美国人、德国人和法国人，班加罗尔净修所远离瑜伽圣地瑞诗凯诗（Rishikesh），更像是一座孤岛。“那时候印度学员很少，但到了90年代末，印度人开始有了生活上的压力，越来越多的人加入生活的艺术。”如今他以若威·香卡主要弟子的身份培养了很多瑜伽老师，也是生活的艺术基金会中几个主要基金的董事。&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 15px; padding: 0px; word-break: break-all; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; overflow: hidden; line-height: 25px; font-size: 16px; text-align: center; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; word-break: break-all; max-width: 100%; font-size: 14px; font-family: 寰蒋闆呴粦, 榛戜綋; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;img data-w=&quot;468&quot; data-ratio=&quot;0.6666666666666666&quot; data-s=&quot;300,640&quot; data-type=&quot;jpeg&quot; src=&quot;http://read.html5.qq.com/image?src=forum&amp;q=5&amp;r=0&amp;imgflag=7&amp;imageUrl=http://mmbiz.qpic.cn/mmbiz/c2Sib3Mp7pON0iaEicGWDJ3KzgpJZy1p7ESctv1NWfMqicy9dCpe0EfULfGHzjV4ibjibHnu1vvOGb2olyK5ITWJDtBg/0?wx_fmt=jpeg&quot; style=&quot;margin: 0px auto; padding: 0px; word-break: break-all; border: none; display: block; max-width: 100%; height: auto !important; box-sizing: border-box !important; word-wrap: break-word !important;&quot;/&gt;&lt;br style=&quot;margin: 0px; padding: 0px; word-break: break-all; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;/&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 15px; padding: 0px; word-break: break-all; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; overflow: hidden; line-height: 25px; font-size: 16px; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; word-break: break-all; max-width: 100%; font-size: 14px; font-family: 寰蒋闆呴粦, 榛戜綋; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;“生活的艺术”不仅仅止步于灵修，它始终跟随时代的步伐。瑞士人克里斯托弗·格雷泽（Christoph Glaser）就是基金会的义工，从24岁至今，他练了16年瑜伽和净化呼吸法。格雷泽觉得瑜伽和静心在西方人的价值观中随着时间的变化而变化，一直贴合着西方流行元素，从最早的嬉皮文化，到健身减肥，现在则转化为一种流行的减压方式。“我们现在的生活节奏太快了，通过手机和网络的资讯不断进入你的生活，如果没有平静的一面，你迟早会疯掉。”格雷泽如今是基金会欧洲企业教学主管，专门给世界各地的企业和政府部门人员教授瑜伽和净化呼吸法。“生活的艺术基金会从无到有已经35年了，其中大部分工作人员是义工，很多企业就很好奇我们是怎样管理的。于是我们就把这个理念变成了一门课程，专门将管理和领导方式教给企业或者政府部门。我在微软授课的时候，就发现很多员工会受到外界影响，虽然员工身体坐在办公室，但他的心早就到别处去了，而企业还要为他的思绪缥缈付工资，这对很多企业来说很不值，我们的课程帮助员工静下心来。”&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 15px; padding: 0px; word-break: break-all; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; overflow: hidden; line-height: 25px; font-size: 16px; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; word-break: break-all; max-width: 100%; font-size: 14px; font-family: 寰蒋闆呴粦, 榛戜綋; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;印度现总理莫迪也是生活的艺术基金会创始人若威·香卡的学生。“我在2000年认识他的，他来上过几次我们的课，所以他现在成了瑜伽爱好者。”若威·香卡在接受本刊采访时如是说道。莫迪也曾对美国有线电视新闻网说过，自己每天5点起床，夜里只睡很短的时间，他从早到晚精力充沛的秘密，就是瑜伽和调息。&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 10px; padding: 0px; word-break: break-all; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; overflow: hidden; line-height: 25px; font-size: 16px; text-align: center; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; word-break: break-all; max-width: 100%; font-size: 14px; font-family: 寰蒋闆呴粦, 榛戜綋; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;img data-w=&quot;&quot; data-ratio=&quot;0.6672661870503597&quot; data-s=&quot;300,640&quot; data-type=&quot;jpeg&quot; src=&quot;http://read.html5.qq.com/image?src=forum&amp;q=5&amp;r=0&amp;imgflag=7&amp;imageUrl=http://mmbiz.qpic.cn/mmbiz/c2Sib3Mp7pON0iaEicGWDJ3KzgpJZy1p7ESjdWJiceIf586Ucppj7mhcDicGRlzReqB5ISADtTQSW6r8uRVeUWIeDnQ/0?wx_fmt=jpeg&quot; style=&quot;margin: 0px auto; padding: 0px; word-break: break-all; border: none; display: block; max-width: 100%; height: auto !important; box-sizing: border-box !important; word-wrap: break-word !important;&quot;/&gt;&lt;br style=&quot;margin: 0px; padding: 0px; word-break: break-all; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;/&gt;&lt;span style=&quot;margin: 0px; padding: 0px; word-break: break-all; max-width: 100%; font-size: 12px; color: rgb(136, 136, 136); box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;2015年6月21日，为纪念国际瑜伽日，印度总理莫迪和瑜伽爱好者们在首都德里的国王大道一起练习瑜伽&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 15px; padding: 0px; word-break: break-all; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; overflow: hidden; line-height: 25px; font-size: 16px; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; word-break: break-all; max-width: 100%; font-size: 14px; font-family: 寰蒋闆呴粦, 榛戜綋; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;按照生活的艺术基金会的说法，净修所从不涉及政治。但在2014年印度大选中，若威·香卡曾公开表示要把选票投给不贪腐的官员，由于若威·香卡的学生众多，他的一句话也具有很大的影响力。而在莫迪当选总理之后，更是重新调整内阁结构，专门成立了与其他内阁部长级别相同的瑜伽部，任命前旅游部长什里帕德·耶索·奈克为部长，专门负责推广阿育吠陀和瑜伽。而莫迪自己的推特和微博账号则经常转发瑜伽的体位法和呼吸法专业知识，俨然成了半个“营销账号”。世界各国都能感受到莫迪正在通过推广印度传统文化进行软实力的输出。&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 15px; padding: 0px; word-break: break-all; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; overflow: hidden; line-height: 25px; font-size: 16px; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; word-break: break-all; max-width: 100%; font-size: 14px; font-family: 寰蒋闆呴粦, 榛戜綋; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;奈克部长认为流传到海外的瑜伽已经变质，被物化成健美操一般，而真正的瑜伽是一种健康的生活方式，是对人们起居、生活、交友、工作的补充。莫迪希望把这些正统的瑜伽文化重新传到欧美国家，设立关于瑜伽质量保证的检测机构，若威·香卡出任这一机构的主席，莫迪表示全世界所有的瑜伽老师都需要通过这一检测机构评审，获得相应的证明。此外自从2014年底联合国通过决议设立国际瑜伽日以来，生活的艺术基金会就为莫迪政府在2015年6月21日第一届国际瑜伽日的各项活动做准备，基金会通过它在世界各地的联络关系举办推广活动。&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 15px; padding: 0px; word-break: break-all; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; overflow: hidden; line-height: 25px; font-size: 16px; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; word-break: break-all; max-width: 100%; font-size: 14px; font-family: 寰蒋闆呴粦, 榛戜綋; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;img data-w=&quot;&quot; data-ratio=&quot;0.6672661870503597&quot; data-s=&quot;300,640&quot; data-type=&quot;jpeg&quot; src=&quot;http://read.html5.qq.com/image?src=forum&amp;q=5&amp;r=0&amp;imgflag=7&amp;imageUrl=http://mmbiz.qpic.cn/mmbiz/c2Sib3Mp7pON0iaEicGWDJ3KzgpJZy1p7ESZvccNp5X9VBuTxa1fZiaA7d0BOmLFHvg7kkM8GlXsW7I6Or8Z5fhVuw/0?wx_fmt=jpeg&quot; style=&quot;margin: 0px auto; padding: 0px; word-break: break-all; border: none; display: block; max-width: 100%; height: auto !important; box-sizing: border-box !important; word-wrap: break-word !important;&quot;/&gt;&lt;br style=&quot;margin: 0px; padding: 0px; word-break: break-all; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;/&gt;去年6月13日，“生活的艺术”中国分部专门组织学员在北京郊区的箭扣长城和上海东方明珠集体做瑜伽，随后在6月21日国际瑜伽日当天，又在北京大学组织了500人的瑜伽集体活动。“在印度领事馆的牵线下，我们决定在中国的一些地标性建筑或机构集体做瑜伽体位法中的拜日式，因为这组动作大家都会做。”胡雯如此回忆道，她是中国第一批“生活的艺术”学员，现在则是中国地区的主要负责人。她50岁左右，但相貌年轻，她很谦虚地把这些归结于常年做瑜伽和呼吸法练习。&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 15px; padding: 0px; word-break: break-all; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; overflow: hidden; line-height: 25px; font-size: 16px; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; word-break: break-all; max-width: 100%; font-size: 14px; font-family: 寰蒋闆呴粦, 榛戜綋; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;近5年随着瑜伽在全球的风靡，以及莫迪政府输出软实力的野心，生活的艺术净心所曾经与世隔绝的环境被打破了。今年3月11日，生活的艺术基金会举办了为期3天的世界文化节，来自世界的350万人参加，2.8万平方米的表演舞台则成为世界最大的舞台，文化节场地总共占地4平方公里。这是一个庞大而充满野心的工程，“生活的艺术”从宁静的班加罗尔郊区进入首都德里，就像挤入了德里拥堵的马路一样，使得人们寸步不得前行。灵性与现代社会、政治，还有太多无法共融的地方。&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 15px; padding: 0px; word-break: break-all; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; overflow: hidden; line-height: 25px; font-size: 16px; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; word-break: break-all; max-width: 100%; font-size: 14px; font-family: 寰蒋闆呴粦, 榛戜綋; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;img data-w=&quot;&quot; data-ratio=&quot;0.564748201438849&quot; data-s=&quot;300,640&quot; data-type=&quot;jpeg&quot; src=&quot;http://read.html5.qq.com/image?src=forum&amp;q=5&amp;r=0&amp;imgflag=7&amp;imageUrl=http://mmbiz.qpic.cn/mmbiz/c2Sib3Mp7pON0iaEicGWDJ3KzgpJZy1p7ES7nzUo7wpiawlxiaJGUpCpW4OmnAIzaLvEONcZCGzXYcG9xxuWTKUDh5g/0?wx_fmt=jpeg&quot; style=&quot;margin: 0px auto; padding: 0px; word-break: break-all; border: none; display: block; max-width: 100%; height: auto !important; box-sizing: border-box !important; word-wrap: break-word !important;&quot;/&gt;&lt;br style=&quot;margin: 0px; padding: 0px; word-break: break-all; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;/&gt;整个大会场地外围堵满了车。进来后发现文化节场地是片一望无际的土坡，用木架和绿塑料布围起的停车场，大巴车运着盛装的印度演员。安检是用木板和棕色胶带简易弄成的，用简易脚手架和绿色塑料布搭起来的临时高层看台据称装下了来自150个国家的人。刚涂完漆的空石膏柱子还躺在地上。若威·香卡和莫迪在开幕式上分别讲话，随后在像春节联欢晚会一样的集体舞蹈中，大雨如期而至，荒土地变成了泥地。然而临时看台并没有遮阳避雨的屋顶，雷声轰鸣的同时，是观众们在看台上兴奋的欢呼声。&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 15px; padding: 0px; word-break: break-all; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; overflow: hidden; line-height: 25px; font-size: 16px; text-align: justify; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; word-break: break-all; max-width: 100%; font-size: 14px; font-family: 寰蒋闆呴粦, 榛戜綋; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;莫迪的文化复兴之路远没有那么顺利。就在开幕式之后的第二天早晨，印度各家报纸的头版都报道了世界文化节，但主要内容是印度国家绿色法庭（National Green Tribunal）认为生活的艺术基金会为了举办此次世界文化节，在亚穆纳河畔地区搭建的临时设施破坏了原本的自然植被、沼泽和芦苇，因此对基金会开出了5000万卢比的罚单，要求基金会恢复河滩地的原貌。此外，印度中央公共工程部（Central Public Works Departement）也告诉德里警方，世界文化节的主舞台结构并不安全。现实是残酷的，印度人在拥有丰富精神的同时，物质却是极度匮乏，莫迪的印度文化复兴还将遇到很多艰难险阻。&lt;/span&gt;&lt;span style=&quot;margin: 0px; padding: 0px; word-break: break-all; max-width: 100%; font-size: 15px; font-family: 寰蒋闆呴粦, 榛戜綋; line-height: 24px; color: rgb(136, 136, 136); box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;br style=&quot;margin: 0px; padding: 0px; word-break: break-all; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;/&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 15px; padding: 0px; word-break: break-all; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; overflow: hidden; line-height: 25px; font-size: 16px; text-align: justify; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; word-break: break-all; max-width: 100%; font-size: 15px; font-family: 寰蒋闆呴粦, 榛戜綋; line-height: 24px; color: rgb(136, 136, 136); box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;（部分&lt;/span&gt;&lt;span style=&quot;margin: 0px; padding: 0px; word-break: break-all; max-width: 100%; font-size: 15px; font-family: 寰蒋闆呴粦, 榛戜綋; color: rgb(136, 136, 136); line-height: 25.6px; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;图片来自网络）&lt;/span&gt;&lt;/p&gt;&lt;fieldset class=&quot;tn-Powered-by-XIUMI&quot; style=&quot;margin: 0.8em 1em; padding: 0px; word-break: break-all; border: 0px; max-width: 100%; min-width: 0px; line-height: 23.2727px; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;section class=&quot;tn-Powered-by-XIUMI&quot; style=&quot;margin: 0px; padding: 3px; word-break: break-all; max-width: 100%; border: 3px solid black; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;section class=&quot;tn-Powered-by-XIUMI&quot; style=&quot;margin: 0px; padding: 10px; word-break: break-all; max-width: 100%; border: 1px solid rgb(128, 128, 128); font-size: 1.2em; line-height: 1.4; font-family: inherit; text-align: center; text-decoration: inherit; color: rgb(51, 51, 51); box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 15px; padding: 0px; word-break: break-all; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; overflow: hidden; line-height: 25px; font-size: 14px; color: rgb(73, 73, 73); box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; word-break: break-all; max-width: 100%; font-size: 16px; font-family: 宋体; color: rgb(63, 63, 63); line-height: 23.8095px; text-indent: 40px; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;⊙ &lt;span style=&quot;margin: 0px; padding: 0px; word-break: break-all; max-width: 100%; font-family: 寰蒋闆呴粦, 榛戜綋; line-height: 23.8095px; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;文章选自《三联生活周刊》总第881期，&lt;span style=&quot;margin: 0px; padding: 0px; word-break: break-all; max-width: 100%; line-height: 23.8095px; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;版权归本刊所有，&lt;/span&gt;&lt;span style=&quot;margin: 0px; padding: 0px; word-break: break-all; max-width: 100%; line-height: 23.8095px; color: rgb(192, 80, 77); box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;请勿转载，&lt;/span&gt;&lt;span style=&quot;margin: 0px; padding: 0px; word-break: break-all; max-width: 100%; line-height: 23.8095px; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;侵权必究。&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 15px; padding: 0px; word-break: break-all; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; overflow: hidden; line-height: 25px; font-size: 14px; color: rgb(73, 73, 73); box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; word-break: break-all; max-width: 100%; font-size: 16px; font-family: 宋体; color: rgb(63, 63, 63); line-height: 23.8095px; text-indent: 40px; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; word-break: break-all; max-width: 100%; font-family: 寰蒋闆呴粦, 榛戜綋; line-height: 23.8095px; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; word-break: break-all; max-width: 100%; line-height: 23.8095px; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;img data-w=&quot;640&quot; data-ratio=&quot;1.2859375&quot; data-s=&quot;300,640&quot; data-type=&quot;jpeg&quot; src=&quot;http://read.html5.qq.com/image?src=forum&amp;q=5&amp;r=0&amp;imgflag=7&amp;imageUrl=http://mmbiz.qpic.cn/mmbiz/c2Sib3Mp7pOPCZ9bnLZC0sgYybo4KLF5Tib4ib1z2th9cnVUQYlsQzDy2hsuTvBQKu6MMsWfgCdlCcNgjGF8VWfibA/640?wx_fmt=jpeg&quot; style=&quot;margin: 0px auto; padding: 0px; word-break: break-all; border: none; display: block; max-width: 100%; height: auto !important; box-sizing: border-box !important; word-wrap: break-word !important; width: auto !important; visibility: visible !important;&quot;/&gt;&lt;br style=&quot;margin: 0px; padding: 0px; word-break: break-all; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;/&gt;&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;/section&gt;&lt;/section&gt;&lt;/fieldset&gt;&lt;fieldset class=&quot;tn-Powered-by-XIUMI&quot; style=&quot;margin: 96px 16px 16px; padding: 0px; word-break: break-all; border: 1px solid rgb(160, 160, 160); max-width: 100%; min-width: 0px; font-family: inherit; text-align: center; border-radius: 8px; font-weight: bold; text-decoration: inherit; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;section class=&quot;tn-Powered-by-XIUMI&quot; style=&quot;margin: -3.3em auto 0px; padding: 0px; word-break: break-all; max-width: 100%; width: 6.5em; height: 6.5em; border-radius: 50%; border: 2px solid rgb(160, 160, 160); box-shadow: rgb(201, 201, 201) 0px 2px 2px 2px; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;section class=&quot;tn-Powered-by-XIUMI&quot; style=&quot;margin: 0px; padding: 0px; word-break: break-all; max-width: 100%; width: 113px; height: 113px; border-radius: 100%; box-sizing: border-box !important; word-wrap: break-word !important; background-image: url(&amp;quot;http://mmbiz.qpic.cn/mmbiz/c2Sib3Mp7pOOedR6eia5WBOWNUBmLGuBnLNQicvO9RvAF4LVBKWPM11IKnd5I63lMpnteYNsu2boFDLib4vaicA3Zxg/0?wx_fmt=jpeg&amp;quot;); background-size: cover; background-position: 50% 50%; background-repeat: no-repeat;&quot;&gt;&lt;/section&gt;&lt;/section&gt;&lt;section class=&quot;tn-Powered-by-XIUMI&quot; style=&quot;margin: 8px 8px 3px; padding: 0px; word-break: break-all; max-width: 100%; line-height: 1.4; font-family: inherit; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 15px; padding: 0px; word-break: break-all; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; overflow: hidden; line-height: 25px; font-size: 16px; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; word-break: break-all; max-width: 100%; font-size: 14px; font-family: 寰蒋闆呴粦, 榛戜綋; font-weight: 300; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;三联生活周刊&lt;/span&gt;&lt;/p&gt;&lt;/section&gt;&lt;section class=&quot;tn-Powered-by-XIUMI&quot; style=&quot;margin: 0px 8px; padding: 0px; word-break: break-all; max-width: 100%; line-height: 1.4; font-size: 0.7em; font-family: inherit; font-weight: inherit; text-align: inherit; text-decoration: inherit; color: rgb(160, 160, 160); box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 15px; padding: 0px; word-break: break-all; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; overflow: hidden; line-height: 25px; font-size: 16px; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; word-break: break-all; max-width: 100%; font-size: 14px; font-family: 寰蒋闆呴粦, 榛戜綋; font-weight: 300; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;一本杂志和他倡导的生活&lt;/span&gt;&lt;/p&gt;&lt;/section&gt;&lt;section class=&quot;tn-Powered-by-XIUMI&quot; style=&quot;margin: 16px; padding: 0px; word-break: break-all; max-width: 100%; border-top-width: 1px; border-top-style: solid; border-color: rgb(160, 160, 160); box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;/section&gt;&lt;section class=&quot;tn-Powered-by-XIUMI&quot; style=&quot;margin: 8px; padding: 0px; word-break: break-all; max-width: 100%; line-height: 1.4; font-weight: inherit; font-size: 0.7em; font-family: inherit; text-align: inherit; text-decoration: inherit; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 15px; padding: 0px; word-break: break-all; max-width: 100%; clear: both; min-height: 1em; white-space: pre-wrap; overflow: hidden; line-height: 25px; font-size: 16px; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; word-break: break-all; max-width: 100%; font-size: 14px; font-family: 寰蒋闆呴粦, 榛戜綋; font-weight: 300; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;长按二维码 即&lt;span class=&quot;tn-Powered-by-XIUMI&quot; style=&quot;margin: 0px; padding: 0px; word-break: break-all; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;&gt;刻&lt;/span&gt;关注&lt;br style=&quot;margin: 0px; padding: 0px; word-break: break-all; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;&quot;/&gt;&lt;/span&gt;&lt;img data-s=&quot;300,640&quot; data-type=&quot;jpeg&quot; data-ratio=&quot;1&quot; data-w=&quot;430&quot; width=&quot;auto&quot; src=&quot;http://read.html5.qq.com/image?src=forum&amp;q=5&amp;r=0&amp;imgflag=7&amp;imageUrl=http://mmbiz.qpic.cn/mmbiz/c2Sib3Mp7pOOKicIfBoOueVWAzB49vvbDft5DibmRQvJxyHrBKLQcJP9Tec2eWVxj0BkAB8TQZyI9Iv7CkxanbXMQ/640?wx_fmt=jpeg&quot; style=&quot;margin: 0px auto; padding: 0px; word-break: break-all; border: none; display: block; max-width: 100%; height: auto !important; box-sizing: border-box !important; word-wrap: break-word !important; width: auto !important; visibility: visible !important;&quot;/&gt;&lt;/p&gt;&lt;/section&gt;&lt;/fieldset&gt;&lt;p&gt;&lt;a href=&quot;http://www.anyv.net/index.php/article-334596#&quot; class=&quot;bds_more&quot; data-cmd=&quot;more&quot; style=&quot;margin: 0px; padding: 0px; word-break: break-all; color: rgb(96, 127, 166); text-decoration: none;&quot;&gt;分享到：&lt;/a&gt;&lt;a href=&quot;http://www.anyv.net/index.php/article-334596#&quot; class=&quot;bds_weixin&quot; data-cmd=&quot;weixin&quot; title=&quot;分享到微信&quot; style=&quot;margin: 0px; padding: 0px; word-break: break-all; color: rgb(96, 127, 166); text-decoration: none;&quot;&gt;微信&lt;/a&gt;&lt;a href=&quot;http://www.anyv.net/index.php/article-334596#&quot; class=&quot;bds_sqq&quot; data-cmd=&quot;sqq&quot; title=&quot;分享到QQ好友&quot; style=&quot;margin: 0px; padding: 0px; word-break: break-all; color: rgb(96, 127, 166); text-decoration: none;&quot;&gt;QQ好友&lt;/a&gt;&lt;a href=&quot;http://www.anyv.net/index.php/article-334596#&quot; class=&quot;bds_qzone&quot; data-cmd=&quot;qzone&quot; title=&quot;分享到QQ空间&quot; style=&quot;margin: 0px; padding: 0px; word-break: break-all; color: rgb(96, 127, 166); text-decoration: none;&quot;&gt;空间&lt;/a&gt;&lt;a href=&quot;http://www.anyv.net/index.php/article-334596#&quot; class=&quot;bds_tsina&quot; data-cmd=&quot;tsina&quot; title=&quot;分享到新浪微博&quot; style=&quot;margin: 0px; padding: 0px; word-break: break-all; color: rgb(96, 127, 166); text-decoration: none;&quot;&gt;新浪微博&lt;/a&gt;&lt;a href=&quot;http://www.anyv.net/index.php/article-334596#&quot; class=&quot;bds_tqq&quot; data-cmd=&quot;tqq&quot; title=&quot;分享到腾讯微博&quot; style=&quot;margin: 0px; padding: 0px; word-break: break-all; color: rgb(96, 127, 166); text-decoration: none;&quot;&gt;腾讯微博&lt;/a&gt;&lt;a href=&quot;http://www.anyv.net/index.php/article-334596#&quot; class=&quot;bds_renren&quot; data-cmd=&quot;renren&quot; title=&quot;分享到人人网&quot; style=&quot;margin: 0px; padding: 0px; word-break: break-all; color: rgb(96, 127, 166); text-decoration: none;&quot;&gt;人人&lt;/a&gt;&lt;a href=&quot;http://www.anyv.net/index.php/article-334596#&quot; class=&quot;bds_tqf&quot; data-cmd=&quot;tqf&quot; title=&quot;分享到腾讯朋友&quot; style=&quot;margin: 0px; padding: 0px; word-break: break-all; color: rgb(96, 127, 166); text-decoration: none;&quot;&gt;腾讯朋友&lt;/a&gt;&lt;a href=&quot;http://www.anyv.net/index.php/article-334596#&quot; class=&quot;bds_douban&quot; data-cmd=&quot;douban&quot; title=&quot;分享到豆瓣网&quot; style=&quot;margin: 0px; padding: 0px; word-break: break-all; color: rgb(96, 127, 166); text-decoration: none;&quot;&gt;豆瓣&lt;/a&gt;&lt;a href=&quot;http://www.anyv.net/index.php/article-334596#&quot; class=&quot;bds_bdhome&quot; data-cmd=&quot;bdhome&quot; title=&quot;分享到百度新首页&quot; style=&quot;margin: 0px; padding: 0px; word-break: break-all; color: rgb(96, 127, 166); text-decoration: none;&quot;&gt;百度首页&lt;/a&gt;&lt;a href=&quot;http://www.anyv.net/index.php/article-334596#&quot; class=&quot;bds_bdysc&quot; data-cmd=&quot;bdysc&quot; title=&quot;分享到百度云收藏&quot; style=&quot;margin: 0px; padding: 0px; word-break: break-all; color: rgb(96, 127, 166); text-decoration: none;&quot;&gt;百度收藏&lt;/a&gt;&lt;a href=&quot;http://www.anyv.net/index.php/article-334596#&quot; class=&quot;bds_ty&quot; data-cmd=&quot;ty&quot; title=&quot;分享到天涯社区&quot; style=&quot;margin: 0px; padding: 0px; word-break: break-all; color: rgb(96, 127, 166); text-decoration: none;&quot;&gt;天涯社区&lt;/a&gt;&lt;a href=&quot;http://www.anyv.net/index.php/article-334596#&quot; class=&quot;bds_mshare&quot; data-cmd=&quot;mshare&quot; title=&quot;分享到一键分享&quot; style=&quot;margin: 0px; padding: 0px; word-break: break-all; color: rgb(96, 127, 166); text-decoration: none;&quot;&gt;一键分享&lt;/a&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;a href=&quot;https://www.baidu.com/s?wd=4%E5%8F%B7%E7%BA%BF&amp;rsv_spt=1&amp;rsv_iqid=0xa70479de00025c3f&amp;issp=1&amp;f=8&amp;rsv_bp=1&amp;rsv_idx=2&amp;ie=utf-8&amp;rqlang=cn&amp;tn=baiduhome_pg&amp;rsv_enter=0&amp;oq=10%E5%8F%B7%E7%BA%BF&amp;rsv_t=7c99o7GqbirsjevwkYMR78NTkh6igLmdHXe6h%2Foq9QVdG8JJz%2BiAFwx0XAYlmC03C5Ph&amp;rsv_pq=d210f9d400016709&amp;rsv_sug3=44&amp;rsv_sug1=40&amp;rsv_sug7=100&amp;rsv_sug2=0&amp;inputT=230&amp;rsv_sug4=230&quot; _src=&quot;https://www.baidu.com/s?wd=4%E5%8F%B7%E7%BA%BF&amp;rsv_spt=1&amp;rsv_iqid=0xa70479de00025c3f&amp;issp=1&amp;f=8&amp;rsv_bp=1&amp;rsv_idx=2&amp;ie=utf-8&amp;rqlang=cn&amp;tn=baiduhome_pg&amp;rsv_enter=0&amp;oq=10%E5%8F%B7%E7%BA%BF&amp;rsv_t=7c99o7GqbirsjevwkYMR78NTkh6igLmdHXe6h%2Foq9QVdG8JJz%2BiAFwx0XAYlmC03C5Ph&amp;rsv_pq=d210f9d400016709&amp;rsv_sug3=44&amp;rsv_sug1=40&amp;rsv_sug7=100&amp;rsv_sug2=0&amp;inputT=230&amp;rsv_sug4=230&quot;&gt;https://www.baidu.com/s?wd=4%E5%8F%B7%E7%BA%BF&amp;amp;rsv_spt=1&amp;amp;rsv_iqid=0xa70479de00025c3f&amp;amp;issp=1&amp;amp;f=8&amp;amp;rsv_bp=1&amp;amp;rsv_idx=2&amp;amp;ie=utf-8&amp;amp;rqlang=cn&amp;amp;tn=baiduhome_pg&amp;amp;rsv_enter=0&amp;amp;oq=10%E5%8F%B7%E7%BA%BF&amp;amp;rsv_t=7c99o7GqbirsjevwkYMR78NTkh6igLmdHXe6h%2Foq9QVdG8JJz%2BiAFwx0XAYlmC03C5Ph&amp;amp;rsv_pq=d210f9d400016709&amp;amp;rsv_sug3=44&amp;amp;rsv_sug1=40&amp;amp;rsv_sug7=100&amp;amp;rsv_sug2=0&amp;amp;inputT=230&amp;amp;rsv_sug4=230&lt;/a&gt; &lt;/p&gt;&lt;p style=&quot;text-align: center;&quot;&gt;&lt;br/&gt;&lt;video class=&quot;edui-upload-video  vjs-default-skin  video-js&quot; controls=&quot;&quot; preload=&quot;none&quot; width=&quot;420&quot; height=&quot;280&quot; src=&quot;/yoga/Public/upload/video/20160908/1473306091117343.mp4&quot; data-setup=&quot;{}&quot; style=&quot;display:inline-block;&quot;&gt;&lt;source src=&quot;/yoga/Public/upload/video/20160908/1473306091117343.mp4&quot; type=&quot;video/mp4&quot;/&gt;&lt;/video&gt;&lt;/p&gt;', '1');
INSERT INTO `mr_news_content` VALUES ('39', '2', '&lt;p&gt;收到&lt;/p&gt;', '1');
INSERT INTO `mr_news_content` VALUES ('47', '34', '&lt;section class=&quot;_135editor&quot; data-tools=&quot;135编辑器&quot; data-id=&quot;86456&quot; style=&quot;font-family: 微软雅黑; white-space: normal; border: 0px none; padding: 0px; position: relative; box-sizing: border-box;&quot;&gt;&lt;section class=&quot;layout&quot; style=&quot;margin: 5px auto;&quot;&gt;&lt;section style=&quot;height: 1em;&quot;&gt;&lt;section style=&quot;height: 16px; width: 1.5em; float: right; border-top: 0.15em solid rgb(198, 198, 199); border-right: 0.15em solid rgb(198, 198, 199); border-bottom-color: rgb(198, 198, 199); border-left-color: rgb(198, 198, 199); box-sizing: border-box;&quot;&gt;&lt;/section&gt;&lt;/section&gt;&lt;section data-bgless=&quot;lighten&quot; data-bglessp=&quot;15%&quot; style=&quot;margin: -0.9em 0.1em; padding: 0.8em; box-sizing: border-box; color: rgb(131, 87, 87); background-color: rgb(247, 247, 248);&quot;&gt;&lt;section class=&quot;135brush&quot; style=&quot;color: rgb(51, 51, 51); font-size: 1em; line-height: 1.4; word-break: break-all; word-wrap: break-word;&quot;&gt;&lt;p&gt;完美瑜伽是生活的艺术创始人古儒吉（Sri Sri Ravi Shankar) 发展而成，并由他指导下的资深教师在世界各地授课推广，深受广大学员欢迎。&lt;/p&gt;&lt;/section&gt;&lt;/section&gt;&lt;section style=&quot;height: 1em; box-sizing: border-box;&quot;&gt;&lt;section style=&quot;height: 16px; width: 1.5em; float: left; border-bottom: 0.15em solid rgb(198, 198, 199); border-top-color: rgb(198, 198, 199); border-right-color: rgb(198, 198, 199); border-left: 0.15em solid rgb(198, 198, 199); box-sizing: border-box;&quot;&gt;&lt;/section&gt;&lt;section style=&quot;height: 16px; width: 1.5em; float: right; border-bottom: 0.15em solid rgb(198, 198, 199); border-top-color: rgb(198, 198, 199); border-right: 0.15em solid rgb(198, 198, 199); border-left-color: rgb(198, 198, 199); box-sizing: border-box;&quot;&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;section class=&quot;_135editor&quot; data-tools=&quot;135编辑器&quot; data-id=&quot;86516&quot; style=&quot;font-family: 微软雅黑; white-space: normal; border: 0px none; padding: 0px; box-sizing: border-box; position: relative;&quot;&gt;&lt;section style=&quot;border-bottom: 1px solid rgb(221, 221, 221); margin: 0px auto 10px; box-sizing: border-box;&quot;&gt;&lt;p class=&quot;135brush&quot; data-brushtype=&quot;text&quot; style=&quot;margin-top: 0px; margin-bottom: -1px; padding: 0px 5px 6px; border-bottom: 2px solid rgb(239, 112, 96); display: inline-block; line-height: 1.1; font-size: 18px;&quot;&gt;&lt;strong&gt;课程效益&lt;/strong&gt;&lt;/p&gt;&lt;/section&gt;&lt;/section&gt;&lt;p&gt;&lt;/p&gt;&lt;ul class=&quot; list-paddingleft-2&quot; style=&quot;width: 847.4px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; font-family: 微软雅黑; white-space: normal;&quot;&gt;&lt;li&gt;&lt;p&gt;完整的瑜伽：不是强调高难度动作的瑜伽训练、不是只注重身体忽略身心平衡的瑜伽。&amp;nbsp;完美瑜伽有完整的瑜伽哲学与理论基础，采身心灵整体平衡性训练、注重呼吸的运用与觉知的开展&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;简单、易学、有趣、欢愉：让瑜伽的学习成为一件欢愉的事，而非仰之弥高，望不可及的学习方式&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;体验瑜珈真髓：有效带领，让任何初学者，都能在初学阶段即享受瑜伽所带来的松弛效果，并体会身心合一的瑜珈真髓&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;正确且规律地练习，将为你带来健康和快乐，并为你打下基础，以便接受完美瑜伽高级课程&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;可在家自行规律练习的瑜伽&lt;/p&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;section class=&quot;_135editor&quot; data-tools=&quot;135编辑器&quot; data-id=&quot;86516&quot; style=&quot;font-family: 微软雅黑; white-space: normal; border: 0px none; padding: 0px; box-sizing: border-box; position: relative;&quot;&gt;&lt;section style=&quot;border-bottom: 1px solid rgb(221, 221, 221); margin: 0px auto 10px; box-sizing: border-box;&quot;&gt;&lt;p class=&quot;135brush&quot; data-brushtype=&quot;text&quot; style=&quot;margin-top: 0px; margin-bottom: -1px; padding: 0px 5px 6px; border-bottom: 2px solid rgb(239, 112, 96); display: inline-block; line-height: 1.1; font-size: 18px;&quot;&gt;&lt;strong&gt;课程特色&lt;/strong&gt;&lt;/p&gt;&lt;/section&gt;&lt;/section&gt;&lt;p&gt;&lt;/p&gt;&lt;ul class=&quot; list-paddingleft-2&quot; style=&quot;width: 847.4px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; font-family: 微软雅黑; white-space: normal;&quot;&gt;&lt;li&gt;&lt;p&gt;並非只是肢体的运动&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;着重瑜伽内涵的训练胜于姿势的完美&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;能量的开展，可体验身体、心智与灵性等不同层次的内在&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;结合生活的艺术课程，让生命绽放，活出无限的潜能&lt;/p&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;section class=&quot;_135editor&quot; data-tools=&quot;135编辑器&quot; data-id=&quot;86516&quot; style=&quot;font-family: 微软雅黑; white-space: normal; border: 0px none; padding: 0px; position: relative; box-sizing: border-box;&quot;&gt;&lt;section style=&quot;border-bottom: 1px solid rgb(221, 221, 221); margin: 0px auto 10px; box-sizing: border-box;&quot;&gt;&lt;p class=&quot;135brush&quot; data-brushtype=&quot;text&quot; style=&quot;margin-top: 0px; margin-bottom: -1px; padding: 0px 5px 6px; border-bottom: 2px solid rgb(239, 112, 96); display: inline-block; line-height: 1.1; font-size: 18px;&quot;&gt;&lt;strong&gt;课程时间&lt;/strong&gt;&lt;/p&gt;&lt;/section&gt;&lt;/section&gt;&lt;p&gt;&lt;/p&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;连续5天课程&lt;/p&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;4月16日 19:00-21:30&lt;/p&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;4月17日 19:00-21:30&lt;/p&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;4月18日 19:00-21:30&lt;/p&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;4月19日 19:00-21:30&lt;/p&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;4月20日 19:00-21:30&lt;/p&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;section class=&quot;_135editor&quot; data-tools=&quot;135编辑器&quot; data-id=&quot;86516&quot; style=&quot;font-family: 微软雅黑; white-space: normal; border: 0px none; padding: 0px; box-sizing: border-box;&quot;&gt;&lt;section style=&quot;border-bottom: 1px solid rgb(221, 221, 221); margin: 0px auto 10px; box-sizing: border-box;&quot;&gt;&lt;p class=&quot;135brush&quot; data-brushtype=&quot;text&quot; style=&quot;margin-top: 0px; margin-bottom: -1px; padding: 0px 5px 6px; border-bottom: 2px solid rgb(239, 112, 96); display: inline-block; line-height: 1.1; font-size: 18px;&quot;&gt;&lt;strong&gt;课程地点&lt;/strong&gt;&lt;/p&gt;&lt;/section&gt;&lt;/section&gt;&lt;p&gt;&lt;span style=&quot;font-family: 微软雅黑;&quot;&gt;海南省海口市琼山区凤翔路华荣府小区B2_1501号。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;&lt;span style=&quot;font-family: 微软雅黑;&quot;&gt;海南省海口市琼山区凤翔路华荣府小区B2_1501号。&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;&lt;span style=&quot;font-family: 微软雅黑;&quot;&gt;&lt;br/&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;section class=&quot;_135editor&quot; data-tools=&quot;135编辑器&quot; data-id=&quot;86516&quot; style=&quot;font-family: 微软雅黑; white-space: normal; border: 0px none; padding: 0px; position: relative; box-sizing: border-box;&quot;&gt;&lt;section style=&quot;border-bottom: 1px solid rgb(221, 221, 221); margin: 0px auto 10px; box-sizing: border-box;&quot;&gt;&lt;p class=&quot;135brush&quot; data-brushtype=&quot;text&quot; style=&quot;margin-top: 0px; margin-bottom: -1px; padding: 0px 5px 6px; border-bottom: 2px solid rgb(239, 112, 96); display: inline-block; line-height: 1.1; font-size: 18px;&quot;&gt;&lt;strong&gt;课程费用&lt;/strong&gt;&lt;/p&gt;&lt;/section&gt;&lt;/section&gt;&lt;p&gt;&lt;/p&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;&lt;span style=&quot;white-space: pre-wrap; line-height: inherit;&quot;&gt;提前报名并完成汇款，优惠价：800元 &lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;课程当天现金付款，原价1000元&lt;/p&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;复训价：300元&lt;/p&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;section class=&quot;_135editor&quot; data-tools=&quot;135编辑器&quot; data-id=&quot;86516&quot; style=&quot;font-family: 微软雅黑; white-space: normal; border: 0px none; padding: 0px; position: relative; box-sizing: border-box;&quot;&gt;&lt;section style=&quot;border-bottom: 1px solid rgb(221, 221, 221); margin: 0px auto 10px; box-sizing: border-box;&quot;&gt;&lt;p class=&quot;135brush&quot; data-brushtype=&quot;text&quot; style=&quot;margin-top: 0px; margin-bottom: -1px; padding: 0px 5px 6px; border-bottom: 2px solid rgb(239, 112, 96); display: inline-block; line-height: 1.1; font-size: 18px;&quot;&gt;&lt;strong&gt;付款方式&lt;/strong&gt;&lt;/p&gt;&lt;/section&gt;&lt;/section&gt;&lt;p&gt;&lt;/p&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;汇款账号:户名：生活艺术瑜伽文化传播（厦门）有限公司&lt;/p&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;账号：414370294985&lt;/p&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;开户行：中国银行厦门分行江头支行 &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;/p&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;支付宝：xm_aol@163.com&lt;/p&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;转款时，请注明名字+Ssyahk003，汇款后请通知义工。&lt;/p&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;section class=&quot;_135editor&quot; data-tools=&quot;135编辑器&quot; data-id=&quot;86516&quot; style=&quot;font-family: 微软雅黑; white-space: normal; border: 0px none; padding: 0px; position: relative; box-sizing: border-box;&quot;&gt;&lt;section style=&quot;border-bottom: 1px solid rgb(221, 221, 221); margin: 0px auto 10px; box-sizing: border-box;&quot;&gt;&lt;p class=&quot;135brush&quot; data-brushtype=&quot;text&quot; style=&quot;margin-top: 0px; margin-bottom: -1px; padding: 0px 5px 6px; border-bottom: 2px solid rgb(239, 112, 96); display: inline-block; line-height: 1.1; font-size: 18px;&quot;&gt;&lt;strong&gt;报名联系&lt;/strong&gt;&lt;/p&gt;&lt;/section&gt;&lt;/section&gt;&lt;p&gt;&lt;/p&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;shanti：13876268493&lt;/p&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;section class=&quot;_135editor&quot; data-tools=&quot;135编辑器&quot; data-id=&quot;86516&quot; style=&quot;font-family: 微软雅黑; white-space: normal; border: 0px none; padding: 0px; box-sizing: border-box;&quot;&gt;&lt;section style=&quot;border-bottom: 1px solid rgb(221, 221, 221); margin: 0px auto 10px; box-sizing: border-box;&quot;&gt;&lt;p class=&quot;135brush&quot; data-brushtype=&quot;text&quot; style=&quot;margin-top: 0px; margin-bottom: -1px; padding: 0px 5px 6px; border-bottom: 2px solid rgb(239, 112, 96); display: inline-block; line-height: 1.1; font-size: 18px;&quot;&gt;&lt;strong&gt;注意事项&lt;/strong&gt;&lt;/p&gt;&lt;/section&gt;&lt;/section&gt;&lt;p&gt;&lt;/p&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;1.&lt;span style=&quot;line-height: inherit;&quot;&gt;此课程为连续5天课程，请安排好时间，勿迟到早退及缺课&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;&lt;span style=&quot;line-height: inherit;&quot;&gt;2.请穿着宽松衣服参加课程&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;&lt;span style=&quot;line-height: inherit;&quot;&gt;3.请自带水杯，课程期间建议充分饮水&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', '1');
INSERT INTO `mr_news_content` VALUES ('48', '35', '&lt;section class=&quot;_135editor&quot; data-tools=&quot;135编辑器&quot; data-id=&quot;86456&quot; style=&quot;font-family: 微软雅黑; white-space: normal; border: 0px none; padding: 0px; position: relative; box-sizing: border-box;&quot;&gt;&lt;section class=&quot;layout&quot; style=&quot;margin: 5px auto;&quot;&gt;&lt;section style=&quot;height: 1em;&quot;&gt;&lt;section style=&quot;height: 16px; width: 1.5em; float: right; border-top: 0.15em solid rgb(198, 198, 199); border-right: 0.15em solid rgb(198, 198, 199); border-bottom-color: rgb(198, 198, 199); border-left-color: rgb(198, 198, 199); box-sizing: border-box;&quot;&gt;&lt;/section&gt;&lt;/section&gt;&lt;section data-bgless=&quot;lighten&quot; data-bglessp=&quot;15%&quot; style=&quot;margin: -0.9em 0.1em; padding: 0.8em; box-sizing: border-box; color: rgb(131, 87, 87); background-color: rgb(247, 247, 248);&quot;&gt;&lt;section class=&quot;135brush&quot; style=&quot;color: rgb(51, 51, 51); font-size: 1em; line-height: 1.4; word-break: break-all; word-wrap: break-word;&quot;&gt;&lt;p&gt;完美瑜伽是生活的艺术创始人古儒吉（Sri Sri Ravi Shankar) 发展而成，并由他指导下的资深教师在世界各地授课推广，深受广大学员欢迎。&lt;/p&gt;&lt;/section&gt;&lt;/section&gt;&lt;section style=&quot;height: 1em; box-sizing: border-box;&quot;&gt;&lt;section style=&quot;height: 16px; width: 1.5em; float: left; border-bottom: 0.15em solid rgb(198, 198, 199); border-top-color: rgb(198, 198, 199); border-right-color: rgb(198, 198, 199); border-left: 0.15em solid rgb(198, 198, 199); box-sizing: border-box;&quot;&gt;&lt;/section&gt;&lt;section style=&quot;height: 16px; width: 1.5em; float: right; border-bottom: 0.15em solid rgb(198, 198, 199); border-top-color: rgb(198, 198, 199); border-right: 0.15em solid rgb(198, 198, 199); border-left-color: rgb(198, 198, 199); box-sizing: border-box;&quot;&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;section class=&quot;_135editor&quot; data-tools=&quot;135编辑器&quot; data-id=&quot;86516&quot; style=&quot;font-family: 微软雅黑; white-space: normal; border: 0px none; padding: 0px; box-sizing: border-box; position: relative;&quot;&gt;&lt;section style=&quot;border-bottom: 1px solid rgb(221, 221, 221); margin: 0px auto 10px; box-sizing: border-box;&quot;&gt;&lt;p class=&quot;135brush&quot; data-brushtype=&quot;text&quot; style=&quot;margin-top: 0px; margin-bottom: -1px; padding: 0px 5px 6px; border-bottom: 2px solid rgb(239, 112, 96); display: inline-block; line-height: 1.1; font-size: 18px;&quot;&gt;&lt;strong&gt;课程效益&lt;/strong&gt;&lt;/p&gt;&lt;/section&gt;&lt;/section&gt;&lt;/p&gt;&lt;ul class=&quot; list-paddingleft-2&quot; style=&quot;width: 847.4px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; font-family: 微软雅黑; white-space: normal;&quot;&gt;&lt;li&gt;&lt;p&gt;完整的瑜伽：不是强调高难度动作的瑜伽训练、不是只注重身体忽略身心平衡的瑜伽。&amp;nbsp;完美瑜伽有完整的瑜伽哲学与理论基础，采身心灵整体平衡性训练、注重呼吸的运用与觉知的开展&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;简单、易学、有趣、欢愉：让瑜伽的学习成为一件欢愉的事，而非仰之弥高，望不可及的学习方式&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;体验瑜珈真髓：有效带领，让任何初学者，都能在初学阶段即享受瑜伽所带来的松弛效果，并体会身心合一的瑜珈真髓&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;正确且规律地练习，将为你带来健康和快乐，并为你打下基础，以便接受完美瑜伽高级课程&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;可在家自行规律练习的瑜伽&lt;/p&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;section class=&quot;_135editor&quot; data-tools=&quot;135编辑器&quot; data-id=&quot;86516&quot; style=&quot;font-family: 微软雅黑; white-space: normal; border: 0px none; padding: 0px; box-sizing: border-box; position: relative;&quot;&gt;&lt;section style=&quot;border-bottom: 1px solid rgb(221, 221, 221); margin: 0px auto 10px; box-sizing: border-box;&quot;&gt;&lt;p class=&quot;135brush&quot; data-brushtype=&quot;text&quot; style=&quot;margin-top: 0px; margin-bottom: -1px; padding: 0px 5px 6px; border-bottom: 2px solid rgb(239, 112, 96); display: inline-block; line-height: 1.1; font-size: 18px;&quot;&gt;&lt;strong&gt;课程特色&lt;/strong&gt;&lt;/p&gt;&lt;/section&gt;&lt;/section&gt;&lt;/p&gt;&lt;ul class=&quot; list-paddingleft-2&quot; style=&quot;width: 847.4px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; font-family: 微软雅黑; white-space: normal;&quot;&gt;&lt;li&gt;&lt;p&gt;並非只是肢体的运动&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;着重瑜伽内涵的训练胜于姿势的完美&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;能量的开展，可体验身体、心智与灵性等不同层次的内在&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;结合生活的艺术课程，让生命绽放，活出无限的潜能&lt;/p&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;section class=&quot;_135editor&quot; data-tools=&quot;135编辑器&quot; data-id=&quot;86516&quot; style=&quot;font-family: 微软雅黑; white-space: normal; border: 0px none; padding: 0px; position: relative; box-sizing: border-box;&quot;&gt;&lt;section style=&quot;border-bottom: 1px solid rgb(221, 221, 221); margin: 0px auto 10px; box-sizing: border-box;&quot;&gt;&lt;p class=&quot;135brush&quot; data-brushtype=&quot;text&quot; style=&quot;margin-top: 0px; margin-bottom: -1px; padding: 0px 5px 6px; border-bottom: 2px solid rgb(239, 112, 96); display: inline-block; line-height: 1.1; font-size: 18px;&quot;&gt;&lt;strong&gt;课程时间&lt;/strong&gt;&lt;/p&gt;&lt;/section&gt;&lt;/section&gt;&lt;/p&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;连续5天课程&lt;/p&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;4月16日 19:00-21:30&lt;/p&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;4月17日 19:00-21:30&lt;/p&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;4月18日 19:00-21:30&lt;/p&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;4月19日 19:00-21:30&lt;/p&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;4月20日 19:00-21:30&lt;/p&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;section class=&quot;_135editor&quot; data-tools=&quot;135编辑器&quot; data-id=&quot;86516&quot; style=&quot;font-family: 微软雅黑; white-space: normal; border: 0px none; padding: 0px; box-sizing: border-box;&quot;&gt;&lt;section style=&quot;border-bottom: 1px solid rgb(221, 221, 221); margin: 0px auto 10px; box-sizing: border-box;&quot;&gt;&lt;p class=&quot;135brush&quot; data-brushtype=&quot;text&quot; style=&quot;margin-top: 0px; margin-bottom: -1px; padding: 0px 5px 6px; border-bottom: 2px solid rgb(239, 112, 96); display: inline-block; line-height: 1.1; font-size: 18px;&quot;&gt;&lt;strong&gt;课程地点&lt;/strong&gt;&lt;/p&gt;&lt;/section&gt;&lt;/section&gt;&lt;span style=&quot;font-family: 微软雅黑;&quot;&gt;海南省海口市琼山区凤翔路华荣府小区B2_1501号。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-family: 微软雅黑;&quot;&gt;阿萨德撒大所多按时&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;section class=&quot;_135editor&quot; data-tools=&quot;135编辑器&quot; data-id=&quot;86516&quot; style=&quot;font-family: 微软雅黑; white-space: normal; border: 0px none; padding: 0px; position: relative; box-sizing: border-box;&quot;&gt;&lt;section style=&quot;border-bottom: 1px solid rgb(221, 221, 221); margin: 0px auto 10px; box-sizing: border-box;&quot;&gt;&lt;p class=&quot;135brush&quot; data-brushtype=&quot;text&quot; style=&quot;margin-top: 0px; margin-bottom: -1px; padding: 0px 5px 6px; border-bottom: 2px solid rgb(239, 112, 96); display: inline-block; line-height: 1.1; font-size: 18px;&quot;&gt;&lt;strong&gt;课程费用&lt;/strong&gt;&lt;/p&gt;&lt;/section&gt;&lt;/section&gt;&lt;/p&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;&lt;span style=&quot;white-space: pre-wrap; line-height: inherit;&quot;&gt;提前报名并完成汇款，优惠价：800元 &lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;课程当天现金付款，原价1000元&lt;/p&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;复训价：300元&lt;/p&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;section class=&quot;_135editor&quot; data-tools=&quot;135编辑器&quot; data-id=&quot;86516&quot; style=&quot;font-family: 微软雅黑; white-space: normal; border: 0px none; padding: 0px; position: relative; box-sizing: border-box;&quot;&gt;&lt;section style=&quot;border-bottom: 1px solid rgb(221, 221, 221); margin: 0px auto 10px; box-sizing: border-box;&quot;&gt;&lt;p class=&quot;135brush&quot; data-brushtype=&quot;text&quot; style=&quot;margin-top: 0px; margin-bottom: -1px; padding: 0px 5px 6px; border-bottom: 2px solid rgb(239, 112, 96); display: inline-block; line-height: 1.1; font-size: 18px;&quot;&gt;&lt;strong&gt;付款方式&lt;/strong&gt;&lt;/p&gt;&lt;/section&gt;&lt;/section&gt;&lt;/p&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;汇款账号:户名：生活艺术瑜伽文化传播（厦门）有限公司&lt;/p&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;账号：414370294985&lt;/p&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;开户行：中国银行厦门分行江头支行 &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;/p&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;支付宝：xm_aol@163.com&lt;/p&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;转款时，请注明名字+Ssyahk003，汇款后请通知义工。&lt;/p&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;section class=&quot;_135editor&quot; data-tools=&quot;135编辑器&quot; data-id=&quot;86516&quot; style=&quot;font-family: 微软雅黑; white-space: normal; border: 0px none; padding: 0px; position: relative; box-sizing: border-box;&quot;&gt;&lt;section style=&quot;border-bottom: 1px solid rgb(221, 221, 221); margin: 0px auto 10px; box-sizing: border-box;&quot;&gt;&lt;p class=&quot;135brush&quot; data-brushtype=&quot;text&quot; style=&quot;margin-top: 0px; margin-bottom: -1px; padding: 0px 5px 6px; border-bottom: 2px solid rgb(239, 112, 96); display: inline-block; line-height: 1.1; font-size: 18px;&quot;&gt;&lt;strong&gt;报名联系&lt;/strong&gt;&lt;/p&gt;&lt;/section&gt;&lt;/section&gt;&lt;/p&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;shanti：13876268493&lt;/p&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;section class=&quot;_135editor&quot; data-tools=&quot;135编辑器&quot; data-id=&quot;86516&quot; style=&quot;font-family: 微软雅黑; white-space: normal; border: 0px none; padding: 0px; box-sizing: border-box;&quot;&gt;&lt;section style=&quot;border-bottom: 1px solid rgb(221, 221, 221); margin: 0px auto 10px; box-sizing: border-box;&quot;&gt;&lt;p class=&quot;135brush&quot; data-brushtype=&quot;text&quot; style=&quot;margin-top: 0px; margin-bottom: -1px; padding: 0px 5px 6px; border-bottom: 2px solid rgb(239, 112, 96); display: inline-block; line-height: 1.1; font-size: 18px;&quot;&gt;&lt;strong&gt;注意事项&lt;/strong&gt;&lt;/p&gt;&lt;/section&gt;&lt;/section&gt;&lt;/p&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;1.&lt;span style=&quot;line-height: inherit;&quot;&gt;此课程为连续5天课程，请安排好时间，勿迟到早退及缺课&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;&lt;span style=&quot;line-height: inherit;&quot;&gt;2.请穿着宽松衣服参加课程&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;font-family: 微软雅黑; white-space: normal;&quot;&gt;&lt;span style=&quot;line-height: inherit;&quot;&gt;3.请自带水杯，课程期间建议充分饮水&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', '1');

-- ----------------------------
-- Table structure for mr_pay_alipay
-- ----------------------------
DROP TABLE IF EXISTS `mr_pay_alipay`;
CREATE TABLE `mr_pay_alipay` (
  `pay_alipay_id` int(11) NOT NULL AUTO_INCREMENT,
  `pay_alipay_name` varchar(100) NOT NULL COMMENT '支付名称',
  `pay_alipay_des` varchar(255) NOT NULL COMMENT '支付描述',
  `pay_alipay_account` varchar(200) NOT NULL COMMENT '支付宝帐户',
  `pay_alipay_code` varchar(200) NOT NULL COMMENT '交易安全校验码',
  `pay_alipay_partnerid` varchar(200) NOT NULL COMMENT '合作者身份ID',
  `pay_alipay_type` tinyint(2) NOT NULL COMMENT '类型',
  PRIMARY KEY (`pay_alipay_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mr_pay_alipay
-- ----------------------------
INSERT INTO `mr_pay_alipay` VALUES ('1', '1', '3', '3', '3', '3', '1');

-- ----------------------------
-- Table structure for mr_plug_ad
-- ----------------------------
DROP TABLE IF EXISTS `mr_plug_ad`;
CREATE TABLE `mr_plug_ad` (
  `plug_ad_id` int(11) NOT NULL AUTO_INCREMENT,
  `plug_ad_name` varchar(50) NOT NULL DEFAULT '' COMMENT '广告名称',
  `plug_ad_adtypeid` tinyint(5) NOT NULL COMMENT '所属位置',
  `plug_ad_checkid` tinyint(2) NOT NULL COMMENT '1=图片 2=JS',
  `plug_ad_js` varchar(255) NOT NULL COMMENT 'JS代码',
  `plug_ad_pic` varchar(200) NOT NULL DEFAULT '' COMMENT '广告图片URL',
  `plug_ad_url` varchar(200) DEFAULT '' COMMENT '广告链接',
  `plug_ad_addtime` int(11) NOT NULL COMMENT '添加时间',
  `plug_ad_order` int(11) NOT NULL COMMENT '排序',
  `plug_ad_open` tinyint(2) NOT NULL COMMENT '1=审核  0=未审核',
  `plug_ad_depid` int(5) DEFAULT NULL COMMENT '广告投放单位或个人',
  `plug_ad_butt` int(5) DEFAULT NULL COMMENT '广告内部对接人员（自己的员工）',
  PRIMARY KEY (`plug_ad_id`),
  KEY `plug_ad_adtypeid` (`plug_ad_adtypeid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mr_plug_ad
-- ----------------------------
INSERT INTO `mr_plug_ad` VALUES ('1', 'banner1', '1', '1', '', '/uploads/Ad/2016-09-14/57d8d7425a5ae.jpg', '', '1473828674', '50', '1', null, null);
INSERT INTO `mr_plug_ad` VALUES ('2', 'banner1', '1', '1', '', '/uploads/Ad/2016-09-14/57d8f77920e7d.jpg', '', '1473836921', '49', '1', null, null);

-- ----------------------------
-- Table structure for mr_plug_adtype
-- ----------------------------
DROP TABLE IF EXISTS `mr_plug_adtype`;
CREATE TABLE `mr_plug_adtype` (
  `plug_adtype_id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `plug_adtype_name` varchar(50) NOT NULL DEFAULT '' COMMENT '广告位名称',
  `plug_adtype_order` int(11) NOT NULL COMMENT '广告位排序',
  PRIMARY KEY (`plug_adtype_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mr_plug_adtype
-- ----------------------------
INSERT INTO `mr_plug_adtype` VALUES ('1', '首页图片轮播', '50');

-- ----------------------------
-- Table structure for mr_plug_link
-- ----------------------------
DROP TABLE IF EXISTS `mr_plug_link`;
CREATE TABLE `mr_plug_link` (
  `plug_link_id` int(5) NOT NULL AUTO_INCREMENT,
  `plug_link_name` varchar(50) NOT NULL COMMENT '链接名称',
  `plug_link_url` varchar(200) NOT NULL COMMENT '链接URL',
  `plug_link_typeid` tinyint(4) DEFAULT NULL COMMENT '所属栏目ID',
  `plug_link_qq` varchar(20) NOT NULL COMMENT '联系QQ',
  `plug_link_order` varchar(10) NOT NULL DEFAULT '50' COMMENT '排序',
  `plug_link_addtime` int(11) NOT NULL COMMENT '添加时间',
  `plug_link_open` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0禁用1启用',
  PRIMARY KEY (`plug_link_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mr_plug_link
-- ----------------------------

-- ----------------------------
-- Table structure for mr_plug_linktype
-- ----------------------------
DROP TABLE IF EXISTS `mr_plug_linktype`;
CREATE TABLE `mr_plug_linktype` (
  `plug_linktype_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `plug_linktype_name` varchar(30) NOT NULL COMMENT '所属栏目名称',
  `plug_linktype_order` varchar(10) NOT NULL COMMENT '排序',
  PRIMARY KEY (`plug_linktype_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mr_plug_linktype
-- ----------------------------

-- ----------------------------
-- Table structure for mr_plug_sug
-- ----------------------------
DROP TABLE IF EXISTS `mr_plug_sug`;
CREATE TABLE `mr_plug_sug` (
  `plug_sug_id` int(11) NOT NULL AUTO_INCREMENT,
  `plug_sug_title` varchar(200) NOT NULL DEFAULT '' COMMENT '留言标题',
  `plug_sug_email` varchar(50) NOT NULL DEFAULT '' COMMENT '留言邮箱',
  `plug_sug_addtime` int(11) NOT NULL COMMENT '留言时间',
  `plug_sug_open` tinyint(2) NOT NULL DEFAULT '0' COMMENT '1=审核 0=不审核',
  `plug_sug_ip` varchar(50) NOT NULL DEFAULT '' COMMENT '留言者IP',
  `plug_sug_content` longtext NOT NULL COMMENT '留言内容',
  PRIMARY KEY (`plug_sug_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mr_plug_sug
-- ----------------------------

-- ----------------------------
-- Table structure for mr_province
-- ----------------------------
DROP TABLE IF EXISTS `mr_province`;
CREATE TABLE `mr_province` (
  `provinceid` bigint(20) NOT NULL,
  `provincename` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`provinceid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mr_province
-- ----------------------------
INSERT INTO `mr_province` VALUES ('1', '北京市');
INSERT INTO `mr_province` VALUES ('2', '天津市');
INSERT INTO `mr_province` VALUES ('3', '河北省');
INSERT INTO `mr_province` VALUES ('4', '山西省');
INSERT INTO `mr_province` VALUES ('5', '内蒙古自治区');
INSERT INTO `mr_province` VALUES ('6', '辽宁省');
INSERT INTO `mr_province` VALUES ('7', '吉林省');
INSERT INTO `mr_province` VALUES ('8', '黑龙江省');
INSERT INTO `mr_province` VALUES ('9', '上海市');
INSERT INTO `mr_province` VALUES ('10', '江苏省');
INSERT INTO `mr_province` VALUES ('11', '浙江省');
INSERT INTO `mr_province` VALUES ('12', '安徽省');
INSERT INTO `mr_province` VALUES ('13', '福建省');
INSERT INTO `mr_province` VALUES ('14', '江西省');
INSERT INTO `mr_province` VALUES ('15', '山东省');
INSERT INTO `mr_province` VALUES ('16', '河南省');
INSERT INTO `mr_province` VALUES ('17', '湖北省');
INSERT INTO `mr_province` VALUES ('18', '湖南省');
INSERT INTO `mr_province` VALUES ('19', '广东省');
INSERT INTO `mr_province` VALUES ('20', '广西壮族自治区');
INSERT INTO `mr_province` VALUES ('21', '海南省');
INSERT INTO `mr_province` VALUES ('22', '重庆市');
INSERT INTO `mr_province` VALUES ('23', '四川省');
INSERT INTO `mr_province` VALUES ('24', '贵州省');
INSERT INTO `mr_province` VALUES ('25', '云南省');
INSERT INTO `mr_province` VALUES ('26', '西藏自治区');
INSERT INTO `mr_province` VALUES ('27', '陕西省');
INSERT INTO `mr_province` VALUES ('28', '甘肃省');
INSERT INTO `mr_province` VALUES ('29', '青海省');
INSERT INTO `mr_province` VALUES ('30', '宁夏回族自治区');
INSERT INTO `mr_province` VALUES ('31', '新疆维吾尔自治区');
INSERT INTO `mr_province` VALUES ('32', '香港特别行政区');
INSERT INTO `mr_province` VALUES ('33', '澳门特别行政区');
INSERT INTO `mr_province` VALUES ('34', '台湾省');

-- ----------------------------
-- Table structure for mr_save
-- ----------------------------
DROP TABLE IF EXISTS `mr_save`;
CREATE TABLE `mr_save` (
  `rs_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '//收藏ID',
  `rs_saveid` int(10) NOT NULL COMMENT '//收藏的活动ID',
  `rs_userid` int(10) NOT NULL,
  `rs_addtime` datetime NOT NULL COMMENT '//收藏时间',
  `rs_savetype` int(1) NOT NULL COMMENT '//收藏的类型',
  PRIMARY KEY (`rs_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of mr_save
-- ----------------------------
INSERT INTO `mr_save` VALUES ('9', '28', '1', '2016-09-08 16:15:01', '3');

-- ----------------------------
-- Table structure for mr_source
-- ----------------------------
DROP TABLE IF EXISTS `mr_source`;
CREATE TABLE `mr_source` (
  `source_id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `source_name` varchar(30) NOT NULL,
  `source_order` int(11) NOT NULL,
  PRIMARY KEY (`source_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mr_source
-- ----------------------------
INSERT INTO `mr_source` VALUES ('1', '本站原创', '50');
INSERT INTO `mr_source` VALUES ('2', '转载', '50');
INSERT INTO `mr_source` VALUES ('3', 'slackck', '50');

-- ----------------------------
-- Table structure for mr_sys
-- ----------------------------
DROP TABLE IF EXISTS `mr_sys`;
CREATE TABLE `mr_sys` (
  `sys_id` int(36) unsigned NOT NULL,
  `sys_name` char(36) NOT NULL DEFAULT '',
  `sys_url` varchar(36) NOT NULL DEFAULT '',
  `sys_title` varchar(200) NOT NULL,
  `sys_key` varchar(200) NOT NULL,
  `sys_des` varchar(200) NOT NULL,
  `email_open` tinyint(2) NOT NULL COMMENT '邮箱发送是否开启',
  `email_name` varchar(50) NOT NULL COMMENT '发送邮箱账号',
  `email_pwd` varchar(50) NOT NULL COMMENT '发送邮箱密码',
  `email_smtpname` varchar(50) NOT NULL COMMENT 'smtp服务器账号',
  `email_emname` varchar(30) NOT NULL COMMENT '邮件名',
  `email_rename` varchar(30) NOT NULL COMMENT '发件人姓名',
  `wesys_name` varchar(30) NOT NULL COMMENT '微信名称',
  `wesys_number` varchar(30) NOT NULL COMMENT '微信号',
  `wesys_id` varchar(20) NOT NULL COMMENT '微信原始ID',
  `wesys_type` tinyint(2) NOT NULL COMMENT '1=订阅号 2=服务号',
  `wesys_appid` varchar(30) NOT NULL COMMENT '微信appid',
  `wesys_appsecret` varchar(50) NOT NULL COMMENT '微信AppSecret',
  `wesys_token` varchar(50) NOT NULL COMMENT '微信token',
  PRIMARY KEY (`sys_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mr_sys
-- ----------------------------
INSERT INTO `mr_sys` VALUES ('1', 'slackck管理系统', 'http://www.slackck.com', 'slackck管理系统', 'slackck管理系统', 'slackck管理系统', '1', '876902658@qq.com', 'maggie198586', 'smtp.qq.com', '876902658', '网站管理员', '护士之家', 'lyzj99', 'dkfje11235_b', '4', 'wx3e5b1606b21cc3bb', '9225a5a6d2da8f0571cdb41353bebcd7', 'weixin');

-- ----------------------------
-- Table structure for mr_teacher
-- ----------------------------
DROP TABLE IF EXISTS `mr_teacher`;
CREATE TABLE `mr_teacher` (
  `rt_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '//老师编号',
  `rt_name` varchar(20) NOT NULL,
  `rt_tel` varchar(20) NOT NULL COMMENT '//老师联系方式',
  PRIMARY KEY (`rt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10003 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of mr_teacher
-- ----------------------------
INSERT INTO `mr_teacher` VALUES ('10001', '李老师', '2123123132');
INSERT INTO `mr_teacher` VALUES ('10002', '张老师', '13212313');

-- ----------------------------
-- Table structure for mr_we_menu
-- ----------------------------
DROP TABLE IF EXISTS `mr_we_menu`;
CREATE TABLE `mr_we_menu` (
  `we_menu_id` tinyint(11) NOT NULL AUTO_INCREMENT,
  `we_menu_name` varchar(20) NOT NULL COMMENT '菜单名称',
  `we_menu_leftid` int(11) NOT NULL COMMENT '菜单上级ID',
  `we_menu_type` tinyint(2) NOT NULL COMMENT '菜单类型',
  `we_menu_typeval` varchar(200) NOT NULL COMMENT '菜单类型值',
  `we_menu_open` tinyint(2) NOT NULL DEFAULT '0' COMMENT '是否显示',
  `we_menu_order` int(11) NOT NULL DEFAULT '50' COMMENT '排序',
  PRIMARY KEY (`we_menu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mr_we_menu
-- ----------------------------
INSERT INTO `mr_we_menu` VALUES ('1', '菜单1', '0', '1', '', '1', '0');
INSERT INTO `mr_we_menu` VALUES ('2', '公司简介', '1', '2', 'http://www.thinkphp.cn/', '1', '50');
INSERT INTO `mr_we_menu` VALUES ('4', '菜单二', '0', '1', '', '1', '50');
INSERT INTO `mr_we_menu` VALUES ('5', '菜单三', '0', '1', '', '1', '50');
INSERT INTO `mr_we_menu` VALUES ('6', '二级菜单', '4', '1', '', '1', '50');
INSERT INTO `mr_we_menu` VALUES ('7', '三级菜单', '5', '1', '', '1', '50');
INSERT INTO `mr_we_menu` VALUES ('8', '联系我们', '1', '1', '', '1', '50');

-- ----------------------------
-- Table structure for mr_we_userlist
-- ----------------------------
DROP TABLE IF EXISTS `mr_we_userlist`;
CREATE TABLE `mr_we_userlist` (
  `we_userlist_id` int(11) NOT NULL AUTO_INCREMENT,
  `we_userlist_openid` varchar(100) NOT NULL DEFAULT '',
  `we_userlist_nickname` varchar(100) NOT NULL DEFAULT '',
  `we_userlist_addtime` int(11) NOT NULL,
  PRIMARY KEY (`we_userlist_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mr_we_userlist
-- ----------------------------

-- ----------------------------
-- Table structure for mr_we_vote
-- ----------------------------
DROP TABLE IF EXISTS `mr_we_vote`;
CREATE TABLE `mr_we_vote` (
  `we_vote_id` int(11) NOT NULL AUTO_INCREMENT,
  `we_vote_openid` varchar(50) NOT NULL,
  `we_vote_driverid` int(11) NOT NULL,
  PRIMARY KEY (`we_vote_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mr_we_vote
-- ----------------------------
