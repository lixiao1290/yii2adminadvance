/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : wechat_uniauto

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-12-18 12:38:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for auth_assignment
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_assignment
-- ----------------------------
INSERT INTO `auth_assignment` VALUES ('普通', '3', '1480570316');
INSERT INTO `auth_assignment` VALUES ('普通', '4', '1480570280');
INSERT INTO `auth_assignment` VALUES ('超级管理员', '1', '1467629090');

-- ----------------------------
-- Table structure for auth_item
-- ----------------------------
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`) USING BTREE,
  KEY `type` (`type`) USING BTREE,
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_item
-- ----------------------------
INSERT INTO `auth_item` VALUES ('/admin/assignment/assign', '2', '为管理员绑定角色或权限', null, null, '1467628930', '1467628930');
INSERT INTO `auth_item` VALUES ('/admin/assignment/index', '2', '展示分配页面，显示管理员列表，点击链接操作管理员权限角色', null, null, '1467628930', '1467628930');
INSERT INTO `auth_item` VALUES ('/admin/assignment/revoke', '2', '为管理员解绑角色、权限', null, null, '1467628930', '1467628930');
INSERT INTO `auth_item` VALUES ('/admin/assignment/view', '2', '显示管理员拥有权限及绑定的角色列表，可执行绑定解绑操作', null, null, '1467628930', '1467628930');
INSERT INTO `auth_item` VALUES ('/admin/default/index', '2', '后台管理系统文档', null, null, '1467628930', '1467628930');
INSERT INTO `auth_item` VALUES ('/admin/menu/create', '2', '添加菜单', null, null, '1467628930', '1467628930');
INSERT INTO `auth_item` VALUES ('/admin/menu/delete', '2', '删除菜单', null, null, '1467628930', '1467628930');
INSERT INTO `auth_item` VALUES ('/admin/menu/index', '2', '菜单列表', null, null, '1467628930', '1467628930');
INSERT INTO `auth_item` VALUES ('/admin/menu/update', '2', '修改菜单', null, null, '1467628930', '1467628930');
INSERT INTO `auth_item` VALUES ('/admin/menu/view', '2', '菜单展示', null, null, '1467628930', '1467628930');
INSERT INTO `auth_item` VALUES ('/admin/my-auth-items/create', '2', '创建操作', null, null, '1480646577', '1480646577');
INSERT INTO `auth_item` VALUES ('/admin/my-auth-items/delete', '2', null, null, null, '1480646577', '1480646577');
INSERT INTO `auth_item` VALUES ('/admin/my-auth-items/index', '2', '注释路由操作', null, null, '1480646577', '1480646577');
INSERT INTO `auth_item` VALUES ('/admin/my-auth-items/update', '2', '修改操作', null, null, '1480646577', '1480646577');
INSERT INTO `auth_item` VALUES ('/admin/my-auth-items/view', '2', '展示一个操作', null, null, '1480646577', '1480646577');
INSERT INTO `auth_item` VALUES ('/admin/permission/assign', '2', '为权限绑定权限或操作', null, null, '1467628930', '1467628930');
INSERT INTO `auth_item` VALUES ('/admin/permission/create', '2', '创建权限', null, null, '1467628930', '1467628930');
INSERT INTO `auth_item` VALUES ('/admin/permission/delete', '2', '删除权限', null, null, '1467628930', '1467628930');
INSERT INTO `auth_item` VALUES ('/admin/permission/index', '2', '权限列表', null, null, '1467628930', '1467628930');
INSERT INTO `auth_item` VALUES ('/admin/permission/remove', '2', '解除若干权限绑定', null, null, '1467628931', '1467628931');
INSERT INTO `auth_item` VALUES ('/admin/permission/update', '2', '修改权限', null, null, '1467628930', '1467628930');
INSERT INTO `auth_item` VALUES ('/admin/permission/view', '2', '展示权限详情页，可执行绑定操作权限或解绑', null, null, '1467628930', '1467628930');
INSERT INTO `auth_item` VALUES ('/admin/role/assign', '2', '为角色绑定角色、权限、操作', null, null, '1467628931', '1467628931');
INSERT INTO `auth_item` VALUES ('/admin/role/create', '2', '创建角色', null, null, '1467628931', '1467628931');
INSERT INTO `auth_item` VALUES ('/admin/role/delete', '2', '删除角色', null, null, '1467628931', '1467628931');
INSERT INTO `auth_item` VALUES ('/admin/role/index', '2', '角色列表', null, null, '1467628931', '1467628931');
INSERT INTO `auth_item` VALUES ('/admin/role/remove', '2', ' 为角色解绑角色、权限、操作。', null, null, '1467628931', '1467628931');
INSERT INTO `auth_item` VALUES ('/admin/role/update', '2', '更改角色', null, null, '1467628931', '1467628931');
INSERT INTO `auth_item` VALUES ('/admin/role/view', '2', '角色详情页面，可执行绑定解绑操作', null, null, '1467628931', '1467628931');
INSERT INTO `auth_item` VALUES ('/admin/route/assign', '2', '注册路由', null, null, '1467628931', '1467628931');
INSERT INTO `auth_item` VALUES ('/admin/route/create', '2', '创建路由', null, null, '1467628931', '1467628931');
INSERT INTO `auth_item` VALUES ('/admin/route/index', '2', '路由列表', null, null, '1467628931', '1467628931');
INSERT INTO `auth_item` VALUES ('/admin/route/refresh', '2', '刷新为被注册路由', null, null, '1467628931', '1467628931');
INSERT INTO `auth_item` VALUES ('/admin/route/remove', '2', '删除路由', null, null, '1467628931', '1467628931');
INSERT INTO `auth_item` VALUES ('/admin/rule/create', '2', '创建规则', null, null, '1467628932', '1467628932');
INSERT INTO `auth_item` VALUES ('/admin/rule/delete', '2', '移除规则', null, null, '1467628932', '1467628932');
INSERT INTO `auth_item` VALUES ('/admin/rule/index', '2', '规则列表', null, null, '1467628932', '1467628932');
INSERT INTO `auth_item` VALUES ('/admin/rule/update', '2', '修改规则', null, null, '1467628932', '1467628932');
INSERT INTO `auth_item` VALUES ('/admin/rule/view', '2', '展示规则详情', null, null, '1467628932', '1467628932');
INSERT INTO `auth_item` VALUES ('/admin/user/activate', '2', '修改管理员状态', null, null, '1467628933', '1467628933');
INSERT INTO `auth_item` VALUES ('/admin/user/change-password', '2', '修改管理员密码', null, null, '1467628933', '1467628933');
INSERT INTO `auth_item` VALUES ('/admin/user/delete', '2', '删除管理员', null, null, '1467628932', '1467628932');
INSERT INTO `auth_item` VALUES ('/admin/user/index', '2', '管理员列表', null, null, '1467628932', '1467628932');
INSERT INTO `auth_item` VALUES ('/admin/user/login', '2', '管理员登录', null, null, '1467628932', '1467628932');
INSERT INTO `auth_item` VALUES ('/admin/user/logout', '2', '管理员登出', null, null, '1467628932', '1467628932');
INSERT INTO `auth_item` VALUES ('/admin/user/request-password-reset', '2', '发送重置密码邮件', null, null, '1467628932', '1467628932');
INSERT INTO `auth_item` VALUES ('/admin/user/reset-password', '2', '重置密码', null, null, '1467628933', '1467628933');
INSERT INTO `auth_item` VALUES ('/admin/user/signup', '2', '注册管理员', null, null, '1467628932', '1467628932');
INSERT INTO `auth_item` VALUES ('/admin/user/view', '2', '管理员详情', null, null, '1467628932', '1467628932');
INSERT INTO `auth_item` VALUES ('/debug/default/db-explain', '2', '系统debg', null, null, '1467628933', '1467628933');
INSERT INTO `auth_item` VALUES ('/debug/default/download-mail', '2', '系统debg', null, null, '1467628933', '1467628933');
INSERT INTO `auth_item` VALUES ('/debug/default/index', '2', '系统debg', null, null, '1467628933', '1467628933');
INSERT INTO `auth_item` VALUES ('/debug/default/toolbar', '2', '系统debgtoolbar', null, null, '1467628933', '1467628933');
INSERT INTO `auth_item` VALUES ('/debug/default/view', '2', '系统debg', null, null, '1467628933', '1467628933');
INSERT INTO `auth_item` VALUES ('/gii/default/action', '2', 'gii工具', null, null, '1467628933', '1467628933');
INSERT INTO `auth_item` VALUES ('/gii/default/diff', '2', 'gii工具', null, null, '1467628933', '1467628933');
INSERT INTO `auth_item` VALUES ('/gii/default/index', '2', 'gii工具', null, null, '1467628933', '1467628933');
INSERT INTO `auth_item` VALUES ('/gii/default/preview', '2', 'gii工具', null, null, '1467628933', '1467628933');
INSERT INTO `auth_item` VALUES ('/gii/default/view', '2', 'gii工具', null, null, '1467628933', '1467628933');
INSERT INTO `auth_item` VALUES ('/illegal/index', '2', '机动车违法查询', null, null, '1478855410', '1478855410');
INSERT INTO `auth_item` VALUES ('/index/welcome', '2', '欢迎页', null, null, '1467885038', '1467885038');
INSERT INTO `auth_item` VALUES ('/integral/index', '2', '驾驶员记分', null, null, '1478855410', '1478855410');
INSERT INTO `auth_item` VALUES ('/minerealtime/index', '2', '实时路况', null, null, '1478855410', '1478855410');
INSERT INTO `auth_item` VALUES ('/my-auth-items/create', '2', '创建操作', null, null, '1480498959', '1480498959');
INSERT INTO `auth_item` VALUES ('/my-auth-items/delete', '2', '移除操作', null, null, '1480498959', '1480498959');
INSERT INTO `auth_item` VALUES ('/my-auth-items/index', '2', '所有操作列表', null, null, '1480498959', '1480498959');
INSERT INTO `auth_item` VALUES ('/my-auth-items/update', '2', '修改操作', null, null, '1480498959', '1480498959');
INSERT INTO `auth_item` VALUES ('/my-auth-items/updatea', '2', '修改操作注释', null, null, '1480558510', '1480558510');
INSERT INTO `auth_item` VALUES ('/my-auth-items/view', '2', '展示操作详情', null, null, '1480498959', '1480498959');
INSERT INTO `auth_item` VALUES ('/review/index', '2', '微信文章', null, null, '1478855410', '1478855410');
INSERT INTO `auth_item` VALUES ('/road/index', '2', '高速路况', null, null, '1478855410', '1478855410');
INSERT INTO `auth_item` VALUES ('/road/support', '2', '高速路况页面下拉提示框', null, null, '1478855410', '1478855410');
INSERT INTO `auth_item` VALUES ('/site/error', '2', '错误信息', null, null, '1467628933', '1467628933');
INSERT INTO `auth_item` VALUES ('/site/index', '2', '首页', null, null, '1467628933', '1467628933');
INSERT INTO `auth_item` VALUES ('/site/login', '2', '登录页', null, null, '1467628933', '1467628933');
INSERT INTO `auth_item` VALUES ('/site/logout', '2', '登出', null, null, '1467628933', '1467628933');
INSERT INTO `auth_item` VALUES ('/superb/index', '2', '微信往期文章', null, null, '1478855410', '1478855410');
INSERT INTO `auth_item` VALUES ('/superb/view', '2', '文章详情（已移除）', null, null, '1478855410', '1478855410');
INSERT INTO `auth_item` VALUES ('/test/details', '2', '测试详情', null, null, '1478855410', '1478855410');
INSERT INTO `auth_item` VALUES ('/test/index', '2', '测试首页', null, null, '1478855410', '1478855410');
INSERT INTO `auth_item` VALUES ('/test/valid', '2', '开始测试', null, null, '1478855410', '1478855410');
INSERT INTO `auth_item` VALUES ('/user/create', '2', '创建用户', null, null, '1467626433', '1467626433');
INSERT INTO `auth_item` VALUES ('/user/delete', '2', '删除用户', null, null, '1467626433', '1467626433');
INSERT INTO `auth_item` VALUES ('/user/index', '2', '用户首页', null, null, '1467626433', '1467626433');
INSERT INTO `auth_item` VALUES ('/user/list', '2', '用户列表', null, null, '1467684059', '1467684059');
INSERT INTO `auth_item` VALUES ('/user/update', '2', '修改用户', null, null, '1467626433', '1467626433');
INSERT INTO `auth_item` VALUES ('/user/view', '2', '用户详情', null, null, '1467626433', '1467626433');
INSERT INTO `auth_item` VALUES ('/violation/index', '2', '事故高发路段', null, null, '1478855410', '1478855410');
INSERT INTO `auth_item` VALUES ('/wechat-picmsg/create', '2', '图文回复创建', null, null, '1479191171', '1479191171');
INSERT INTO `auth_item` VALUES ('/wechat-picmsg/delete', '2', '图文回复删除', null, null, '1479189411', '1479189411');
INSERT INTO `auth_item` VALUES ('/wechat-picmsg/index', '2', '图文回复展示列表', null, null, '1479189411', '1479189411');
INSERT INTO `auth_item` VALUES ('/wechat-picmsg/update', '2', '修改图文回复', null, null, '1479189411', '1479189411');
INSERT INTO `auth_item` VALUES ('/wechat-picmsg/view', '2', '展示图文回复详情', null, null, '1479189411', '1479189411');
INSERT INTO `auth_item` VALUES ('/wechat/api/index', '2', '微信调用接口', null, null, '1478841084', '1478841084');
INSERT INTO `auth_item` VALUES ('/wechat/default/index', '2', '微信管理首页', null, null, '1478841084', '1478841084');
INSERT INTO `auth_item` VALUES ('/wechat/fans/delete', '2', '删除粉丝', null, null, '1478841084', '1478841084');
INSERT INTO `auth_item` VALUES ('/wechat/fans/index', '2', '粉丝列表', null, null, '1478841084', '1478841084');
INSERT INTO `auth_item` VALUES ('/wechat/fans/update', '2', '修改粉丝', null, null, '1478841084', '1478841084');
INSERT INTO `auth_item` VALUES ('/wechat/illegal/details', '2', '机动车违法查询详情', null, null, '1478841084', '1478841084');
INSERT INTO `auth_item` VALUES ('/wechat/illegal/index', '2', '机动车违法查询', null, null, '1478841084', '1478841084');
INSERT INTO `auth_item` VALUES ('/wechat/integral/details', '2', '驾驶人记分详情', null, null, '1478841085', '1478841085');
INSERT INTO `auth_item` VALUES ('/wechat/integral/index', '2', '驾驶人记分查询页', null, null, '1478841085', '1478841085');
INSERT INTO `auth_item` VALUES ('/wechat/menu/index', '2', '微信管理菜单', null, null, '1478841084', '1478841084');
INSERT INTO `auth_item` VALUES ('/wechat/module/index', '2', '微信模块', null, null, '1478841084', '1478841084');
INSERT INTO `auth_item` VALUES ('/wechat/module/install', '2', '安装微信模块', null, null, '1478841084', '1478841084');
INSERT INTO `auth_item` VALUES ('/wechat/module/uninstall', '2', '卸载微信模块', null, null, '1478841084', '1478841084');
INSERT INTO `auth_item` VALUES ('/wechat/process/fans/subscribe', '2', '公众号关注时触发', null, null, '1478841085', '1478841085');
INSERT INTO `auth_item` VALUES ('/wechat/process/fans/unsubscribe', '2', '公众号取消关注触发', null, null, '1478841085', '1478841085');
INSERT INTO `auth_item` VALUES ('/wechat/reply/create', '2', '自动回复创建', null, null, '1478841084', '1478841084');
INSERT INTO `auth_item` VALUES ('/wechat/reply/delete', '2', '删除自动回复', null, null, '1478841085', '1478841085');
INSERT INTO `auth_item` VALUES ('/wechat/reply/index', '2', '自动回复列表', null, null, '1478841084', '1478841084');
INSERT INTO `auth_item` VALUES ('/wechat/reply/update', '2', '修改关键字回复', null, null, '1478841084', '1478841084');
INSERT INTO `auth_item` VALUES ('/wechat/review/create', '2', '发表文章', null, null, '1478841085', '1478841085');
INSERT INTO `auth_item` VALUES ('/wechat/review/delete', '2', '删除文章', null, null, '1478841085', '1478841085');
INSERT INTO `auth_item` VALUES ('/wechat/review/index', '2', '文章列表、', null, null, '1478841085', '1478841085');
INSERT INTO `auth_item` VALUES ('/wechat/review/update', '2', '修改文章', null, null, '1478841085', '1478841085');
INSERT INTO `auth_item` VALUES ('/wechat/simulator/index', '2', '微信模拟', null, null, '1478841085', '1478841085');
INSERT INTO `auth_item` VALUES ('/wechat/violation/details', '2', '已废弃', null, null, '1478841085', '1478841085');
INSERT INTO `auth_item` VALUES ('/wechat/violation/index', '2', '已废弃', null, null, '1478841085', '1478841085');
INSERT INTO `auth_item` VALUES ('/wechat/wechat/create', '2', '添加公众号', null, null, '1478841085', '1478841085');
INSERT INTO `auth_item` VALUES ('/wechat/wechat/delete', '2', '删除公众号、', null, null, '1478841085', '1478841085');
INSERT INTO `auth_item` VALUES ('/wechat/wechat/index', '2', '公众号列表', null, null, '1478841085', '1478841085');
INSERT INTO `auth_item` VALUES ('/wechat/wechat/manage', '2', '选定管理公众号', null, null, '1478841085', '1478841085');
INSERT INTO `auth_item` VALUES ('/wechat/wechat/update', '2', '修改公众号', null, null, '1478841085', '1478841085');
INSERT INTO `auth_item` VALUES ('/wechat/wechat/upload', '2', '公众号上传头像', null, null, '1478841085', '1478841085');
INSERT INTO `auth_item` VALUES ('图文回复列表（往期也精彩）', '2', null, null, null, '1480475260', '1480475260');
INSERT INTO `auth_item` VALUES ('微信公众号列表', '2', '显示公众号列表', null, null, '1480471057', '1480471103');
INSERT INTO `auth_item` VALUES ('所有权限', '2', '可访问所有菜单', null, null, '1467628984', '1480482347');
INSERT INTO `auth_item` VALUES ('普通', '1', null, null, null, '1480570245', '1480570245');
INSERT INTO `auth_item` VALUES ('普通管理员', '1', '普通管理员', null, null, '1467626553', '1467626553');
INSERT INTO `auth_item` VALUES ('权限列表', '2', '显示所有权限', null, null, '1480484655', '1480484655');
INSERT INTO `auth_item` VALUES ('查看一条图文回复', '2', '点击查看一条图文回复。', null, null, '1480475320', '1480475320');
INSERT INTO `auth_item` VALUES ('查看某角色', '2', '可以分配角色权限', null, null, '1480475557', '1480475557');
INSERT INTO `auth_item` VALUES ('根权限', '2', null, null, null, '1480570018', '1480570228');
INSERT INTO `auth_item` VALUES ('添加微信公众号', '2', '添加微信公众号', null, null, '1480471236', '1480475080');
INSERT INTO `auth_item` VALUES ('角色列表', '2', '显示所有角色\r\n', null, null, '1480475412', '1480483144');
INSERT INTO `auth_item` VALUES ('超级管理员', '1', '超级管理员拥有最高级别系统权限', null, null, '1467629059', '1467629059');

-- ----------------------------
-- Table structure for auth_item_child
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`) USING BTREE,
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_item_child
-- ----------------------------
INSERT INTO `auth_item_child` VALUES ('所有权限', '/admin/assignment/assign');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/admin/assignment/index');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/admin/assignment/revoke');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/admin/assignment/view');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/admin/default/index');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/admin/menu/create');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/admin/menu/delete');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/admin/menu/index');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/admin/menu/update');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/admin/menu/view');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/admin/my-auth-items/create');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/admin/my-auth-items/delete');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/admin/my-auth-items/index');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/admin/my-auth-items/update');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/admin/my-auth-items/view');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/admin/permission/assign');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/admin/permission/create');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/admin/permission/delete');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/admin/permission/index');
INSERT INTO `auth_item_child` VALUES ('权限列表', '/admin/permission/index');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/admin/permission/remove');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/admin/permission/update');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/admin/permission/view');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/admin/role/assign');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/admin/role/create');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/admin/role/delete');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/admin/role/index');
INSERT INTO `auth_item_child` VALUES ('角色列表', '/admin/role/index');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/admin/role/remove');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/admin/role/update');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/admin/role/view');
INSERT INTO `auth_item_child` VALUES ('查看某角色', '/admin/role/view');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/admin/route/assign');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/admin/route/create');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/admin/route/index');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/admin/route/refresh');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/admin/route/remove');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/admin/rule/create');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/admin/rule/delete');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/admin/rule/index');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/admin/rule/update');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/admin/rule/view');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/admin/user/activate');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/admin/user/change-password');
INSERT INTO `auth_item_child` VALUES ('根权限', '/admin/user/change-password');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/admin/user/delete');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/admin/user/index');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/admin/user/login');
INSERT INTO `auth_item_child` VALUES ('根权限', '/admin/user/login');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/admin/user/logout');
INSERT INTO `auth_item_child` VALUES ('根权限', '/admin/user/logout');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/admin/user/request-password-reset');
INSERT INTO `auth_item_child` VALUES ('根权限', '/admin/user/request-password-reset');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/admin/user/reset-password');
INSERT INTO `auth_item_child` VALUES ('根权限', '/admin/user/reset-password');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/admin/user/signup');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/admin/user/view');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/debug/default/db-explain');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/debug/default/download-mail');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/debug/default/index');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/debug/default/toolbar');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/debug/default/view');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/gii/default/action');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/gii/default/diff');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/gii/default/index');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/gii/default/preview');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/gii/default/view');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/illegal/index');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/index/welcome');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/integral/index');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/minerealtime/index');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/my-auth-items/create');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/my-auth-items/delete');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/my-auth-items/index');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/my-auth-items/update');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/my-auth-items/updatea');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/my-auth-items/view');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/review/index');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/road/index');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/road/support');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/site/error');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/site/index');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/site/login');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/site/logout');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/superb/index');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/superb/view');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/test/details');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/test/index');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/test/valid');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/user/create');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/user/delete');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/user/index');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/user/list');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/user/update');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/user/view');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/violation/index');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/wechat-picmsg/create');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/wechat-picmsg/delete');
INSERT INTO `auth_item_child` VALUES ('图文回复列表（往期也精彩）', '/wechat-picmsg/index');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/wechat-picmsg/index');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/wechat-picmsg/update');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/wechat-picmsg/view');
INSERT INTO `auth_item_child` VALUES ('查看一条图文回复', '/wechat-picmsg/view');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/wechat/api/index');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/wechat/default/index');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/wechat/fans/delete');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/wechat/fans/index');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/wechat/fans/update');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/wechat/illegal/details');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/wechat/illegal/index');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/wechat/integral/details');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/wechat/integral/index');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/wechat/menu/index');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/wechat/module/index');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/wechat/module/install');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/wechat/module/uninstall');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/wechat/process/fans/subscribe');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/wechat/process/fans/unsubscribe');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/wechat/reply/create');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/wechat/reply/delete');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/wechat/reply/index');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/wechat/reply/update');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/wechat/review/create');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/wechat/review/delete');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/wechat/review/index');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/wechat/review/update');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/wechat/simulator/index');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/wechat/violation/details');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/wechat/violation/index');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/wechat/wechat/create');
INSERT INTO `auth_item_child` VALUES ('添加微信公众号', '/wechat/wechat/create');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/wechat/wechat/delete');
INSERT INTO `auth_item_child` VALUES ('微信公众号列表', '/wechat/wechat/index');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/wechat/wechat/index');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/wechat/wechat/manage');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/wechat/wechat/update');
INSERT INTO `auth_item_child` VALUES ('所有权限', '/wechat/wechat/upload');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '所有权限');
INSERT INTO `auth_item_child` VALUES ('普通', '根权限');

-- ----------------------------
-- Table structure for auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_rule
-- ----------------------------

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob,
  `icon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`) USING BTREE,
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('1', '管理员列表', '38', '/admin/user/index', null, 0x7B2269636F6E223A202266612066612D75736572227D, 'fa fa-dashboard');
INSERT INTO `menu` VALUES ('2', '系统', null, '/admin/default/index', '1', 0x7B2269636F6E223A202266612066612D64617368626F617264227D, 'fa fa-dashboard');
INSERT INTO `menu` VALUES ('3', '路由列表', '2', '/admin/route/index', '2', null, 'fa fa-dashboard');
INSERT INTO `menu` VALUES ('4', '菜单管理', '2', '/admin/menu/index', '7', null, 'fa fa-dashboard');
INSERT INTO `menu` VALUES ('5', '权限管理', '2', '/admin/permission/index', '3', null, 'fa fa-dashboard');
INSERT INTO `menu` VALUES ('6', '角色管理', '2', '/admin/role/index', '4', null, 'fa fa-dashboard');
INSERT INTO `menu` VALUES ('7', '分配权限', '2', '/admin/assignment/index', '5', null, 'fa fa-dashboard');
INSERT INTO `menu` VALUES ('9', '规则管理', '2', '/admin/rule/index', '6', 0x7B2269636F6E223A202266612066612D64617368626F617264227D, 'fa fa-dashboard');
INSERT INTO `menu` VALUES ('11', '微信', null, null, null, 0x7B2269636F6E223A202266612066612D7573657273227D, 'fa fa-dashboard');
INSERT INTO `menu` VALUES ('12', '公众号列表', '11', '/wechat/wechat/index', null, null, 'fa fa-dashboard');
INSERT INTO `menu` VALUES ('13', '机动车违法', '11', '/illegal/index', null, null, 'fa fa-dashboard');
INSERT INTO `menu` VALUES ('14', '驾驶证积分查询', '11', '/integral/index', null, null, 'fa fa-dashboard');
INSERT INTO `menu` VALUES ('16', '添加菜单', '2', '/admin/menu/create', null, null, 'fa fa-dashboard');
INSERT INTO `menu` VALUES ('19', '违章高发查询', '11', '/violation/index', null, null, 'fa fa-dashboard');
INSERT INTO `menu` VALUES ('20', '实时路况', '11', '/minerealtime/index', null, null, 'fa fa-dashboard');
INSERT INTO `menu` VALUES ('21', '精彩回顾', '11', '/superb/index', null, null, 'fa fa-dashboard');
INSERT INTO `menu` VALUES ('22', '高速路况', '11', '/road/index', null, null, 'fa fa-dashboard');
INSERT INTO `menu` VALUES ('25', '首页', null, '/site/index', null, null, 'fa fa-dashboard');
INSERT INTO `menu` VALUES ('26', '车主福利', '11', null, null, null, 'fa fa-dashboard');
INSERT INTO `menu` VALUES ('27', '自定义公众号菜单', '11', '/wechat/menu/index', null, null, 'fa fa-dashboard');
INSERT INTO `menu` VALUES ('28', '粉丝营销', '11', null, null, null, 'fa fa-dashboard');
INSERT INTO `menu` VALUES ('29', '粉丝列表', '28', '/wechat/fans/index', null, null, 'fa fa-dashboard');
INSERT INTO `menu` VALUES ('30', '微信图文回复', '11', '/wechat-picmsg/index', null, null, 'fa fa-dashboard');
INSERT INTO `menu` VALUES ('31', 'dfaf', null, null, null, null, 'fa fa-dashboard');
INSERT INTO `menu` VALUES ('32', '微信模拟器', '11', '/wechat/simulator/index', null, null, 'fa fa-dashboard');
INSERT INTO `menu` VALUES ('33', '回复管理', '11', '/wechat/reply/index', null, null, 'fa fa-dashboard');
INSERT INTO `menu` VALUES ('37', '修改密码', '38', '/admin/user/change-password', null, null, 'fa fa-dashboard');
INSERT INTO `menu` VALUES ('38', '管理员', null, null, null, null, 'fa fa-dashboard');
INSERT INTO `menu` VALUES ('39', '发布文章', '11', '/wechat/review/index', null, null, 'fa fa-dashboard');
INSERT INTO `menu` VALUES ('40', '模块管理', '11', '/wechat/module/index', null, null, 'fa fa-dashboard');
INSERT INTO `menu` VALUES ('42', '注释操作', '2', '/admin/my-auth-items/index', null, null, 'fa fa-dashboard');

-- ----------------------------
-- Table structure for migration
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8_bin NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO `migration` VALUES ('m000000_000000_base', '1469597962');
INSERT INTO `migration` VALUES ('m130524_201442_init', '1469598022');
INSERT INTO `migration` VALUES ('m150217_131752_initWechat', '1469598124');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', 'uYr4AAe4kYyalbfOem2C2ClkJP5DV4SS', '$2y$13$MgWW2or4bw6fHNBk11CMqe01NgNH0fulGspxpOrFgmHum.4xbm6uK', null, 'qiuchao@uniauto.me', '10', '1469607412', '1469607412');
INSERT INTO `user` VALUES ('2', 'qiuch87', '5UfFqObsVvKKPgIfuYdvzaE5qI9iCYDn', '$2y$13$/Nx3X.J1uB8c4Z6./4h3B.e66wIz5dZ5tW9OiQwfBtzznTqtXJUZi', null, 'qiuch87@163.com', '10', '1478155270', '1478155270');
INSERT INTO `user` VALUES ('3', 'admin3', '76ZDbX-Sed1R6ZJq3epUrrlccNdIbjWT', '$2y$13$ZBMLVRyr0svDkgGUJFMz2.DAVMFha.CN4oIQeALyMKsMBuvu7TT2K', 'nhLFobyFVPXDTi8wY6WO61DHqBWgbGrE_1480578989', 'lixiao.god@163.com', '10', '1480561368', '1480578989');
INSERT INTO `user` VALUES ('4', 'admin4', 'DAN2-FOOAU7Zs7DhF7QnmaUzfgT5CrCn', '$2y$13$4afXn1HugfymP/TWcq9Y0OMceHfc9ae07T0w6z8k79oNoBPBUqr/S', null, 'zhignerjgragrg@163.com', '10', '1480562671', '1480568922');

-- ----------------------------
-- Table structure for wechat
-- ----------------------------
DROP TABLE IF EXISTS `wechat`;
CREATE TABLE `wechat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '公众号名称',
  `token` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '微信服务访问验证token',
  `access_token` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '访问微信服务验证token',
  `account` varchar(30) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '微信号',
  `original` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '原始ID',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '公众号类型',
  `key` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '公众号的AppID',
  `secret` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '公众号的AppSecret',
  `encoding_aes_key` varchar(43) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '消息加密秘钥EncodingAesKey',
  `avatar` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '头像地址',
  `qrcode` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '二维码地址',
  `address` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '所在地址',
  `description` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '公众号简介',
  `username` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '微信官网登录名',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  `password` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '微信官网登录密码',
  `created_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`),
  KEY `key` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of wechat
-- ----------------------------
INSERT INTO `wechat` VALUES ('2', '测试公众号', 'uniauto', '', 'uniauto_wechat', ' gh_acf7a3d915f8', '0', 'wx8d962b858c0f54aa', 'a3a6d3867ec8029ed641091b888bdc3a', '1', '1', '1', '', '公众号测试', '', '1', '', '1478495922', '1478496161');
INSERT INTO `wechat` VALUES ('3', '1', '', '', '', '', '0', '', '', '', '', '', '', '111', '', '0', '', '1480215254', '1480215254');

-- ----------------------------
-- Table structure for wechat_fans
-- ----------------------------
DROP TABLE IF EXISTS `wechat_fans`;
CREATE TABLE `wechat_fans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '所属微信公众号ID',
  `open_id` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '微信ID',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '关注状态',
  `created_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '关注时间',
  `updated_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`),
  KEY `wid` (`wid`),
  KEY `open_id` (`open_id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of wechat_fans
-- ----------------------------
INSERT INTO `wechat_fans` VALUES ('1', '1', 'oGYVbwNQPwwJk_Rwb3VUtZZcfcXA', '0', '1469611417', '1469611417');
INSERT INTO `wechat_fans` VALUES ('2', '1', 'oGYVbwJvRhdPFC0vO3CREI54KIXE', '0', '1469611499', '1469611499');
INSERT INTO `wechat_fans` VALUES ('4', '1', 'oGYVbwKwLkuOTZFf5VmovXtglVSw', '0', '1469696494', '1469696494');
INSERT INTO `wechat_fans` VALUES ('5', '1', 'oGYVbwPo2r40exuVACzx0T8LaVMw', '0', '1469807454', '1469807454');
INSERT INTO `wechat_fans` VALUES ('6', '1', 'oGYVbwB6RzKT1658ME8XS04pOWI4', '-1', '1469842825', '1469842825');
INSERT INTO `wechat_fans` VALUES ('7', '1', 'oGYVbwLAg6_pNJ7j5TZWrahixkjY', '0', '1469852984', '1469852984');
INSERT INTO `wechat_fans` VALUES ('8', '1', 'oGYVbwApGg4uCQ2Yk3f87WSWUr9w', '0', '1470001929', '1470001929');
INSERT INTO `wechat_fans` VALUES ('9', '1', 'oGYVbwLXvzxZ8j1jPUnUKsBhw73I', '0', '1470031235', '1470031235');
INSERT INTO `wechat_fans` VALUES ('10', '1', 'oGYVbwPKF6M9G8O6pCPxBLfXp1ss', '0', '1470115923', '1470115923');
INSERT INTO `wechat_fans` VALUES ('11', '1', 'oGYVbwC70KXJlJOYv1pvIooSkDs0', '0', '1470133388', '1470133388');
INSERT INTO `wechat_fans` VALUES ('12', '1', 'oGYVbwJkfXglXNVebdZDl3YVfLjg', '0', '1470214252', '1470214252');
INSERT INTO `wechat_fans` VALUES ('13', '1', 'oGYVbwEu6DT5ZuW1mwIh3vq57N4M', '-1', '1470223849', '1470223849');
INSERT INTO `wechat_fans` VALUES ('14', '1', 'oGYVbwIOV_Z-eseEFUMc0U8uuvMI', '0', '1470311450', '1470311450');
INSERT INTO `wechat_fans` VALUES ('15', '1', 'oGYVbwNZ8TZl5tH5mNG7aw1HS38o', '0', '1470377846', '1470377846');
INSERT INTO `wechat_fans` VALUES ('16', '1', 'oGYVbwAO4enLfSSQzeWpodLUOCHA', '-1', '1470386431', '1470386431');
INSERT INTO `wechat_fans` VALUES ('17', '1', 'oGYVbwO-sp9rcRbha_X3iDQHrjoc', '0', '1470632713', '1470632713');
INSERT INTO `wechat_fans` VALUES ('18', '1', 'oGYVbwOw_k8Z8ksr7oXVyMyvnw4w', '-1', '1470700213', '1470700213');
INSERT INTO `wechat_fans` VALUES ('19', '1', 'oGYVbwHrdi0guUpY737-_0dMtSzQ', '0', '1470708953', '1470708953');
INSERT INTO `wechat_fans` VALUES ('20', '1', 'oGYVbwJE7ovajPh9xbm8IG6NYQQ8', '0', '1470709323', '1470709323');
INSERT INTO `wechat_fans` VALUES ('21', '1', 'oGYVbwI56qBlaxd3jttMJ2cDs-G4', '-1', '1470802771', '1470802771');
INSERT INTO `wechat_fans` VALUES ('22', '1', 'oGYVbwIrD0cinlq4ZOqWXUxDb_e4', '0', '1470828274', '1470828274');
INSERT INTO `wechat_fans` VALUES ('23', '1', 'oGYVbwOmqcn9AOE6DbKZzNpYnbIg', '0', '1470833819', '1470833819');
INSERT INTO `wechat_fans` VALUES ('24', '1', 'oGYVbwGm-uC3fiXsEeI2ooArSvo0', '0', '1470995459', '1470995459');
INSERT INTO `wechat_fans` VALUES ('25', '1', 'oGYVbwCBGhOdyXlXLEd_u5Vd5gcQ', '0', '1471504466', '1471504466');
INSERT INTO `wechat_fans` VALUES ('26', '1', 'oGYVbwMiM0YWCmnFs90ShCiIkKJc', '0', '1471871735', '1471871735');
INSERT INTO `wechat_fans` VALUES ('27', '1', 'oGYVbwKXwlypuGCKLzaI1kAAvLqM', '0', '1472028046', '1472028046');
INSERT INTO `wechat_fans` VALUES ('28', '1', 'oGYVbwB6ZC7d3aJPhyWyLpTLAY7Y', '0', '1472341770', '1472341770');
INSERT INTO `wechat_fans` VALUES ('29', '1', 'oGYVbwF153ws6-7ZdchEhp52KTak', '-1', '1472812052', '1472812052');
INSERT INTO `wechat_fans` VALUES ('30', '1', 'oGYVbwDO7QsRG4sEnpUm1K-3O2e4', '-1', '1473028363', '1473028363');
INSERT INTO `wechat_fans` VALUES ('31', '1', 'oGYVbwJKBvNbU20g8EEChRN0189A', '0', '1473060608', '1473060608');
INSERT INTO `wechat_fans` VALUES ('32', '1', 'oGYVbwE8TCnOhRoqk5S0ZFjst5xI', '0', '1473096953', '1473096953');
INSERT INTO `wechat_fans` VALUES ('33', '1', 'oGYVbwNkzNDV4nc0CNgtlm-Hqzck', '0', '1473305276', '1473305276');
INSERT INTO `wechat_fans` VALUES ('34', '1', 'oGYVbwJIGganrb_8BAoGoqjXHZ2s', '0', '1473306233', '1473306233');
INSERT INTO `wechat_fans` VALUES ('35', '1', 'oGYVbwAnFhwBenhLm8k9YcU1ltuw', '0', '1473412340', '1473412340');
INSERT INTO `wechat_fans` VALUES ('36', '1', 'oGYVbwA-vMX_qYWbHdwjBkQKIggs', '0', '1473468904', '1473468904');
INSERT INTO `wechat_fans` VALUES ('37', '1', 'oGYVbwO3HAXU7tSHyzhZJMcDnu5U', '0', '1473563250', '1473563250');
INSERT INTO `wechat_fans` VALUES ('38', '1', 'oGYVbwH_iDPsfAASdFvC9DJT1EwA', '-1', '1473587465', '1473587465');
INSERT INTO `wechat_fans` VALUES ('39', '1', 'oGYVbwGEpvg6h_tUrafh2BI_X7qc', '0', '1473729379', '1473729379');
INSERT INTO `wechat_fans` VALUES ('40', '1', 'oGYVbwHFLbAST8g_sknIgRkvpxOA', '0', '1473760846', '1473760846');
INSERT INTO `wechat_fans` VALUES ('41', '1', 'oGYVbwFRmBzMQ8kf57kPfVtHggo8', '0', '1473999665', '1473999665');
INSERT INTO `wechat_fans` VALUES ('42', '1', 'oGYVbwPm_A6n27g7Jzp3vSNbMLl0', '-1', '1474104076', '1474104076');
INSERT INTO `wechat_fans` VALUES ('43', '1', 'oGYVbwFSPzqztuR9nnGZTJtFssBU', '0', '1474248085', '1474248085');
INSERT INTO `wechat_fans` VALUES ('44', '1', 'oGYVbwHiSvQpwtGbthu-rYC6m33o', '0', '1474686774', '1474686774');
INSERT INTO `wechat_fans` VALUES ('45', '1', 'oGYVbwPsclkkZGUVHIcK_uxAqYpM', '-1', '1475414396', '1475414396');
INSERT INTO `wechat_fans` VALUES ('46', '1', 'oGYVbwNHfYQ72Vn__ZCXpYiWo-4w', '0', '1475545729', '1475545729');
INSERT INTO `wechat_fans` VALUES ('47', '1', 'oGYVbwOKDmRqh8yiV8IjkFgQ9Q_A', '0', '1475848642', '1475848642');
INSERT INTO `wechat_fans` VALUES ('48', '1', 'oGYVbwL_etzXslyzPoLtExrm9SOo', '0', '1475906826', '1475906826');
INSERT INTO `wechat_fans` VALUES ('49', '1', 'oGYVbwH9MCQNVH48SyPJ20qvYDII', '0', '1475907492', '1475907492');
INSERT INTO `wechat_fans` VALUES ('50', '1', 'oGYVbwEP07So7sgYlBIsF8T8PBVY', '0', '1476069952', '1476069952');
INSERT INTO `wechat_fans` VALUES ('51', '1', 'oGYVbwIJ8sxBWiZYDZCstHCME42E', '0', '1476073836', '1476073836');
INSERT INTO `wechat_fans` VALUES ('52', '1', 'oGYVbwHd09WQD3KJcaChOj_wSBNU', '0', '1476182756', '1476182756');
INSERT INTO `wechat_fans` VALUES ('53', '1', 'oGYVbwDNquJKDLNf8M6kF2ksUQg0', '0', '1476273043', '1476273043');
INSERT INTO `wechat_fans` VALUES ('54', '1', 'oGYVbwHv_StiNX0Zkza1lLPnSLTs', '-1', '1476283248', '1476283248');
INSERT INTO `wechat_fans` VALUES ('55', '1', 'oGYVbwOFpoTFZA5fwrKgBzZkP8M0', '0', '1476310459', '1476310459');
INSERT INTO `wechat_fans` VALUES ('56', '1', 'oGYVbwMZfQynwLWuqhtUy1Ez6iOA', '0', '1476433456', '1476433456');
INSERT INTO `wechat_fans` VALUES ('57', '1', 'oGYVbwI_HvrQAKlUwMVN-bsM8-ic', '0', '1476514940', '1476514940');
INSERT INTO `wechat_fans` VALUES ('58', '1', 'oGYVbwFSyLiNPv-jG0jHAw1qyTOw', '0', '1476609003', '1476609003');
INSERT INTO `wechat_fans` VALUES ('59', '1', 'oGYVbwI1ZZllj_zYE6VhVsOUxVIo', '0', '1476669618', '1476669618');
INSERT INTO `wechat_fans` VALUES ('60', '1', 'oGYVbwF-AupndyTb_BzC---_6bhs', '-1', '1476695783', '1476695783');
INSERT INTO `wechat_fans` VALUES ('61', '1', 'oGYVbwA-K0gw2Hi8LDaen6AHp4Wo', '-1', '1476758160', '1476758160');
INSERT INTO `wechat_fans` VALUES ('62', '1', 'oGYVbwLhSEgPa8nd2tmwdDp1MMiQ', '0', '1477119079', '1477119079');
INSERT INTO `wechat_fans` VALUES ('63', '2', 'otLPEuCplwZCSrRgIRSxUB6gmwIA', '0', '1478496473', '1478496473');
INSERT INTO `wechat_fans` VALUES ('64', '2', 'otLPEuJ7psfniJoL7PLxND8gb8EA', '0', '1478571513', '1478571513');
INSERT INTO `wechat_fans` VALUES ('65', '2', 'mengxianjushi', '0', '1480053573', '1480053573');

-- ----------------------------
-- Table structure for wechat_module
-- ----------------------------
DROP TABLE IF EXISTS `wechat_module`;
CREATE TABLE `wechat_module` (
  `id` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '模块ID',
  `name` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '模块名称',
  `type` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '模块类型',
  `category` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '模块类型',
  `version` varchar(10) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '模块版本',
  `ability` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '模块功能简述',
  `description` text COLLATE utf8_bin NOT NULL COMMENT '模块详细描述',
  `author` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '模块作者',
  `site` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '模块详情地址',
  `admin` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否有后台界面',
  `migration` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否有迁移数据',
  `reply_rule` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否启用回复规则',
  `created_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of wechat_module
-- ----------------------------

-- ----------------------------
-- Table structure for wechat_mp_user
-- ----------------------------
DROP TABLE IF EXISTS `wechat_mp_user`;
CREATE TABLE `wechat_mp_user` (
  `id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '粉丝ID',
  `nickname` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '昵称',
  `sex` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '性别',
  `city` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '所在城市',
  `country` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '所在省',
  `province` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '微信ID',
  `language` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '用户语言',
  `avatar` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '用户头像',
  `subscribe_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '关注时间',
  `union_id` varchar(30) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '用户头像',
  `remark` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '备注',
  `group_id` smallint(6) NOT NULL DEFAULT '0' COMMENT '分组ID',
  `updated_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of wechat_mp_user
-- ----------------------------
INSERT INTO `wechat_mp_user` VALUES ('63', '最具潜力80后', '1', '济南', '中国', '山东', 'zh_CN', 'http://wx.qlogo.cn/mmopen/VL114WJTDMd96vFnE2EXxguYUKkWB4nJKx4cDyVMovHzcdQc7H69WIbPSbJFVlya3hE1UFtXYcjBlibPibPnhIc30Qk6b9Oib99/0', '1463622818', 'oY_w7xDbgnAiNCDVn9ZpcZnm03uE', '', '0', '1478496474');
INSERT INTO `wechat_mp_user` VALUES ('64', '好.人', '1', '济南', '中国', '山东', 'zh_CN', 'http://wx.qlogo.cn/mmopen/VL114WJTDMeQ1s4FWC1LxU2Y8gx86LEOO0h7GnjvUQHZXO11mLO83iaiaIPkTOvNLKzCmVkcHn44kp3tAsibq4NjnYINAaicNoQz/0', '1478571515', 'oY_w7xOb2X8egzaJk3lKNC9dH7_Q', '', '0', '1478571513');

-- ----------------------------
-- Table structure for wechat_picmsg
-- ----------------------------
DROP TABLE IF EXISTS `wechat_picmsg`;
CREATE TABLE `wechat_picmsg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '标题',
  `image` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '图片',
  `isbig` int(11) DEFAULT '0' COMMENT '是否是第一',
  `groupid` varchar(100) COLLATE utf8_bin DEFAULT NULL COMMENT '分组',
  `wechat_id` int(11) DEFAULT NULL COMMENT '所属公众号id',
  `link` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `createtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of wechat_picmsg
-- ----------------------------
INSERT INTO `wechat_picmsg` VALUES ('110', '比阿特丽斯', '/public/image/1479697026/14796970261256.jpg', '1', '582d2a9679321', null, 'http://www.google.com', null);
INSERT INTO `wechat_picmsg` VALUES ('111', '良辰美景虚设', '/public/image/1479697026/14796970261244.jpg', '0', '582d2a9679321', null, 'http://www.google.com', null);
INSERT INTO `wechat_picmsg` VALUES ('112', '大江东去浪里个浪', '/public/image/1479697026/14796970267129.png', '0', '582d2a9679321', null, 'http://www.google.com', null);
INSERT INTO `wechat_picmsg` VALUES ('113', '比阿特丽斯', '/public/image/1479355035/14793550356742.jpg', '1', '582d2a9b3563f', null, 'http://www.google.com', null);
INSERT INTO `wechat_picmsg` VALUES ('114', '良辰美景虚设', '/public/image/1479355035/14793550355613.jpg', '0', '582d2a9b3563f', null, 'http://www.google.com', null);
INSERT INTO `wechat_picmsg` VALUES ('115', '大江东去浪里个浪', '/public/image/1479355035/14793550357273.jpg', '0', '582d2a9b3563f', null, 'http://www.google.com', null);
INSERT INTO `wechat_picmsg` VALUES ('116', '比阿特丽斯', '/public/image/1479355070/14793550705294.jpg', '1', '582d2abe40ddc', null, 'http://www.google.com', null);
INSERT INTO `wechat_picmsg` VALUES ('117', '良辰美景虚设', '/public/image/1479355070/14793550707642.jpg', '0', '582d2abe40ddc', null, 'http://www.google.com', null);
INSERT INTO `wechat_picmsg` VALUES ('118', '大江东去浪里个浪', '/public/image/1479355070/14793550707502.jpg', '0', '582d2abe40ddc', null, 'http://www.google.com', null);
INSERT INTO `wechat_picmsg` VALUES ('119', '比阿特丽斯', '/public/image/1479355073/14793550736688.jpg', '1', '582d2ac117a56', null, 'http://www.google.com', null);
INSERT INTO `wechat_picmsg` VALUES ('120', '良辰美景虚设', '/public/image/1479355073/14793550732779.jpg', '0', '582d2ac117a56', null, 'http://www.google.com', null);
INSERT INTO `wechat_picmsg` VALUES ('121', '大江东去浪里个浪', '/public/image/1479355073/14793550738595.jpg', '0', '582d2ac117a56', null, 'http://www.google.com', null);
INSERT INTO `wechat_picmsg` VALUES ('122', '比阿特丽斯', '/public/image/1479355075/14793550756138.jpg', '1', '582d2ac31191f', null, 'http://www.google.com', null);
INSERT INTO `wechat_picmsg` VALUES ('123', '良辰美景虚设', '/public/image/1479355075/14793550752639.jpg', '0', '582d2ac31191f', null, 'http://www.google.com', null);
INSERT INTO `wechat_picmsg` VALUES ('124', '大江东去浪里个浪', '/public/image/1479355075/14793550759810.jpg', '0', '582d2ac31191f', null, 'http://www.google.com', null);
INSERT INTO `wechat_picmsg` VALUES ('125', '比阿特丽斯feign', '/public/image/1479355079/14793550795943.jpg', '1', '582d2ac7e8f86', null, 'http://www.google.com', null);
INSERT INTO `wechat_picmsg` VALUES ('126', '良辰美景虚设iiiiiiiiiiiiiiiiiiiiiiiiiii', '/public/image/1479355079/14793550797992.jpg', '0', '582d2ac7e8f86', null, 'http://www.google.com', null);
INSERT INTO `wechat_picmsg` VALUES ('127', '大江东去浪里个浪eeeeee', '/public/image/1479355079/14793550797222.jpg', '0', '582d2ac7e8f86', null, 'http://www.google.com', null);
INSERT INTO `wechat_picmsg` VALUES ('128', '比阿特丽斯', '/public/image/1479355086/14793550862108.jpg', '1', '582d2acedf8bc', null, 'http://www.google.com', null);
INSERT INTO `wechat_picmsg` VALUES ('129', '良辰美景虚设', '/public/image/1479355086/14793550866643.jpg', '0', '582d2acedf8bc', null, 'http://www.google.com', null);
INSERT INTO `wechat_picmsg` VALUES ('130', '大江东去浪里个浪', '/public/image/1479355086/14793550867432.jpg', '0', '582d2acedf8bc', null, 'http://www.google.com', null);
INSERT INTO `wechat_picmsg` VALUES ('131', '第一智慧', '/public/image/1479369135/14793691357991.jpg', '1', '582d61afbd419', null, 'http://www.baidu.com', '1479369135');
INSERT INTO `wechat_picmsg` VALUES ('132', '第二领悟', '/public/image/1479369135/14793691355193.jpg', '0', '582d61afbd419', null, 'http://battlenet.com.cn', '1479369135');
INSERT INTO `wechat_picmsg` VALUES ('133', '大成', '/public/image/1479369135/14793691358889.jpg', '0', '582d61afbd419', null, 'http://www.sina.com', '1479369135');
INSERT INTO `wechat_picmsg` VALUES ('134', '像是', '/public/image/1479449935/14794499354058.jpg', '1', '582e9d4f1ed06', '2', 'http://www.google.com', '1479449934');
INSERT INTO `wechat_picmsg` VALUES ('135', '听海', '/public/image/1479449935/14794499356877.jpg', '0', '582e9d4f1ed06', '2', 'http://www.sina.com', '1479449934');
INSERT INTO `wechat_picmsg` VALUES ('136', '比阿特', '/public/image/1479450196/14794501967423.jpeg', '1', '582e9e540e31b', '2', 'http://battlenet.com.cn', '1479450195');
INSERT INTO `wechat_picmsg` VALUES ('137', '比阿特丽斯', '/public/image/1479450196/14794501961108.jpg', '0', '582e9e540e31b', '2', 'http://www.google', '1479450195');
INSERT INTO `wechat_picmsg` VALUES ('138', '大江东去浪里个浪', '/public/image/1479450196/14794501964544.jpg', '0', '582e9e540e31b', '2', 'http://www.google.com', '1479450195');
INSERT INTO `wechat_picmsg` VALUES ('141', '第一条', '/public/image/1479698626/14796986263983.jpeg', '1', '583268c2d26bd', '2', 'http://www.google.c', '1479698626');
INSERT INTO `wechat_picmsg` VALUES ('142', '比阿特', '/public/image/1479698626/14796986269342.jpg', '0', '583268c2d26bd', '2', 'http://www.google', '1479698626');
INSERT INTO `wechat_picmsg` VALUES ('143', '3', '/public/image/1479698626/14796986262068.jpg', '0', '583268c2d26bd', '2', 'http://www.google', '1479698626');
INSERT INTO `wechat_picmsg` VALUES ('144', '比阿特', '/public/image/1480388558/14803885589693.jpeg', '1', '583bc27f763d8', '2', 'http://www.baidu.com', '1480311422');
INSERT INTO `wechat_picmsg` VALUES ('145', '第二条', '/public/image/1480388544/14803885445118.png', '0', '583bc27f763d8', '2', 'http://battlenet.com.cn', '1480311422');
INSERT INTO `wechat_picmsg` VALUES ('146', '第三条', '/public/image/1480388544/14803885446482.jpg', '0', '583bc27f763d8', '2', 'http://www.sina.com', '1480311422');

-- ----------------------------
-- Table structure for wechat_reply_rule
-- ----------------------------
DROP TABLE IF EXISTS `wechat_reply_rule`;
CREATE TABLE `wechat_reply_rule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '所属微信公众号ID',
  `name` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '规则名称',
  `mid` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '处理的插件模块',
  `processor` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '处理类',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  `priority` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '优先级',
  `created_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`),
  KEY `wid` (`wid`),
  KEY `mid` (`mid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of wechat_reply_rule
-- ----------------------------
INSERT INTO `wechat_reply_rule` VALUES ('1', '1', '你好', '1', 'process', '1', '100', '1469669036', '1469758587');
INSERT INTO `wechat_reply_rule` VALUES ('2', '2', '3455', '1', 'process', '1', '0', '1478509953', '1478509953');
INSERT INTO `wechat_reply_rule` VALUES ('3', '2', 'demo', '1', 'process', '1', '0', '1478847148', '1478847148');
INSERT INTO `wechat_reply_rule` VALUES ('4', '2', '讲讲', '1', 'process', '1', '0', '1479108893', '1479108893');
INSERT INTO `wechat_reply_rule` VALUES ('5', '2', 'hello', '1', '/wechat/picword/hello', '1', '0', '1479433357', '1479433448');

-- ----------------------------
-- Table structure for wechat_reply_rule_keyword
-- ----------------------------
DROP TABLE IF EXISTS `wechat_reply_rule_keyword`;
CREATE TABLE `wechat_reply_rule_keyword` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '所属规则ID',
  `keyword` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '规则关键字',
  `type` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '关键字类型',
  `priority` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '优先级',
  `start_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '开始时间',
  `end_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '结束时间',
  `created_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`),
  KEY `keyword` (`keyword`),
  KEY `type` (`type`),
  KEY `start_at` (`start_at`),
  KEY `end_at` (`end_at`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of wechat_reply_rule_keyword
-- ----------------------------
INSERT INTO `wechat_reply_rule_keyword` VALUES ('1', '0', '', 'subscribe', '0', '0', '0', '0', '0');
INSERT INTO `wechat_reply_rule_keyword` VALUES ('2', '1', '你好', 'subscribe', '100', '1446220799', '1509379199', '1469669036', '1469758587');
INSERT INTO `wechat_reply_rule_keyword` VALUES ('3', '2', '1', 'match', '1', '0', '0', '1469755331', '1469755331');
INSERT INTO `wechat_reply_rule_keyword` VALUES ('4', '2', '3455', 'match', '0', '0', '0', '1478509953', '1478509953');
INSERT INTO `wechat_reply_rule_keyword` VALUES ('5', '3', '多发发', 'match', '0', '0', '0', '1478847148', '1478847148');
INSERT INTO `wechat_reply_rule_keyword` VALUES ('6', '4', '讲讲', 'match', '0', '0', '0', '1479108893', '1479108893');
INSERT INTO `wechat_reply_rule_keyword` VALUES ('7', '5', 'hello', 'match', '1', '1', '20', '1479433403', '1479433448');

-- ----------------------------
-- Table structure for wechat_review
-- ----------------------------
DROP TABLE IF EXISTS `wechat_review`;
CREATE TABLE `wechat_review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(155) COLLATE utf8_bin DEFAULT NULL,
  `content` varchar(355) COLLATE utf8_bin DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of wechat_review
-- ----------------------------
INSERT INTO `wechat_review` VALUES ('1', '大青', '黄柏', '2016-11-10 09:53:13', 'http://liosng.com/ing');
INSERT INTO `wechat_review` VALUES ('2', 'jiagna', 'ingja', '2016-11-15 01:33:47', 'https://www.baidu.com/link?url=MmvHFe4e8k0N-NlEzIsGSmlmIf5pnllkvbcbWN46wXC&wd=&eqid=c973b7af0000813f00000002582a5c0c');
INSERT INTO `wechat_review` VALUES ('3', '基恩噶看房了解', '好哦额那附近', '2016-11-21 02:23:21', 'https://www.baidu.com/link?url=MmvHFe4e8k0N-NlEzIsGSmlmIf5pnllkvbcbWN46wXC&wd=&eqid=c973b7af0000813f00000002582a5c0c');
INSERT INTO `wechat_review` VALUES ('4', 'a', '<p>fgjkalga</>', '2016-11-28 07:18:08', 'https://www.baidu.com/link?url=MmvHFe4e8k0N-NlEzIsGSmlmIf5pnllkvbcbWN46wXC&wd=&eqid=c973b7af0000813f00000002582a5c0c');

-- ----------------------------
-- Table structure for wechat_user
-- ----------------------------
DROP TABLE IF EXISTS `wechat_user`;
CREATE TABLE `wechat_user` (
  `id` int(11) NOT NULL,
  `openid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nickname` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '微信昵称',
  `sex` tinyint(4) NOT NULL COMMENT '性别',
  `headimgurl` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '头像',
  `country` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '国家',
  `province` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '省份',
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '城市',
  `access_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `refresh_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of wechat_user
-- ----------------------------
