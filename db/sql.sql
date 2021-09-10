/*
 Navicat Premium Data Transfer

 Source Server         : LOCALHOST
 Source Server Type    : MySQL
 Source Server Version : 100420
 Source Host           : localhost:3306
 Source Schema         : db_project

 Target Server Type    : MySQL
 Target Server Version : 100420
 File Encoding         : 65001

 Date: 10/09/2021 23:01:07
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for m_alat_berat
-- ----------------------------
DROP TABLE IF EXISTS `m_alat_berat`;
CREATE TABLE `m_alat_berat`  (
  `ALATBERAT_ID` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `NAME` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `STATUS` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `JENIS_ID` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ALATBERAT_ID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_alat_berat
-- ----------------------------
INSERT INTO `m_alat_berat` VALUES ('TD76', 'Mitsubishi Abc', 'A', 'D001');

-- ----------------------------
-- Table structure for m_blok
-- ----------------------------
DROP TABLE IF EXISTS `m_blok`;
CREATE TABLE `m_blok`  (
  `BLOK_ID` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `BLOK_NAME` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `LONGTITUDE` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `LATITUDE` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `STATUS` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `PIT_ID` bigint(20) NULL DEFAULT NULL,
  PRIMARY KEY (`BLOK_ID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_blok
-- ----------------------------
INSERT INTO `m_blok` VALUES ('AL31', 'AL31', '-7.123041239', '-4.3123123', 'A', 1);

-- ----------------------------
-- Table structure for m_group_privilege
-- ----------------------------
DROP TABLE IF EXISTS `m_group_privilege`;
CREATE TABLE `m_group_privilege`  (
  `GROUP_ID` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `GROUP_NAME` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`GROUP_ID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of m_group_privilege
-- ----------------------------
INSERT INTO `m_group_privilege` VALUES ('applicationmgr', 'Application Manager');
INSERT INTO `m_group_privilege` VALUES ('surveyor', 'Team Surveyor');
INSERT INTO `m_group_privilege` VALUES ('sysadmin', 'System Administrator');

-- ----------------------------
-- Table structure for m_jabatan
-- ----------------------------
DROP TABLE IF EXISTS `m_jabatan`;
CREATE TABLE `m_jabatan`  (
  `KODE_JABATAN` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `NAMA_JABATAN` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`KODE_JABATAN`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_jabatan
-- ----------------------------
INSERT INTO `m_jabatan` VALUES ('MGR', 'Manager');
INSERT INTO `m_jabatan` VALUES ('STF', 'Staff');

-- ----------------------------
-- Table structure for m_jenis_alat_berat
-- ----------------------------
DROP TABLE IF EXISTS `m_jenis_alat_berat`;
CREATE TABLE `m_jenis_alat_berat`  (
  `JENIS_ID` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `NAMA` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`JENIS_ID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_jenis_alat_berat
-- ----------------------------
INSERT INTO `m_jenis_alat_berat` VALUES ('D001', 'Dump Truck');
INSERT INTO `m_jenis_alat_berat` VALUES ('D002', 'Drilling');

-- ----------------------------
-- Table structure for m_list_group_privilege
-- ----------------------------
DROP TABLE IF EXISTS `m_list_group_privilege`;
CREATE TABLE `m_list_group_privilege`  (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `GROUP_ID` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `PRIVILEGE_ID` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 41 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of m_list_group_privilege
-- ----------------------------
INSERT INTO `m_list_group_privilege` VALUES (1, 'sysadmin', 'dashboard');
INSERT INTO `m_list_group_privilege` VALUES (2, 'sysadmin', 'privilege_setting');
INSERT INTO `m_list_group_privilege` VALUES (3, 'sysadmin', 'user_privilege_setting');
INSERT INTO `m_list_group_privilege` VALUES (5, 'staff', 'dashboard');
INSERT INTO `m_list_group_privilege` VALUES (28, 'pm', 'create_project');
INSERT INTO `m_list_group_privilege` VALUES (29, 'pm', 'dashboard');
INSERT INTO `m_list_group_privilege` VALUES (30, 'pm', 'view_project');
INSERT INTO `m_list_group_privilege` VALUES (31, 'surveyor3', 'create_mine_location');
INSERT INTO `m_list_group_privilege` VALUES (32, 'surveyor3', 'create_project');
INSERT INTO `m_list_group_privilege` VALUES (33, 'surveyor', 'create_mine_location');
INSERT INTO `m_list_group_privilege` VALUES (34, 'surveyor', 'dashboard');
INSERT INTO `m_list_group_privilege` VALUES (35, 'surveyor', 'initiate_drilling');
INSERT INTO `m_list_group_privilege` VALUES (36, 'surveyor', 'view_project');
INSERT INTO `m_list_group_privilege` VALUES (37, 'applicationmgr', 'alatberat_setting');
INSERT INTO `m_list_group_privilege` VALUES (38, 'applicationmgr', 'blok_setting');
INSERT INTO `m_list_group_privilege` VALUES (39, 'applicationmgr', 'operator_setting');
INSERT INTO `m_list_group_privilege` VALUES (40, 'applicationmgr', 'pit_setting');

-- ----------------------------
-- Table structure for m_operator
-- ----------------------------
DROP TABLE IF EXISTS `m_operator`;
CREATE TABLE `m_operator`  (
  `OPERATOR_ID` int(11) NOT NULL,
  `OPERATOR_NAME` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `STATUS` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`OPERATOR_ID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_operator
-- ----------------------------
INSERT INTO `m_operator` VALUES (1, 'Handoko', 'A');

-- ----------------------------
-- Table structure for m_pit
-- ----------------------------
DROP TABLE IF EXISTS `m_pit`;
CREATE TABLE `m_pit`  (
  `PIT_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `PIT_NAME` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `STATUS` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`PIT_ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_pit
-- ----------------------------
INSERT INTO `m_pit` VALUES (1, 'Kemuning', 'A');
INSERT INTO `m_pit` VALUES (2, 'Sijebi', 'A');

-- ----------------------------
-- Table structure for m_privilege
-- ----------------------------
DROP TABLE IF EXISTS `m_privilege`;
CREATE TABLE `m_privilege`  (
  `PRIVILEGE_ID` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `STATUS` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `PRIVILEGE_NAME` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`PRIVILEGE_ID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of m_privilege
-- ----------------------------
INSERT INTO `m_privilege` VALUES ('alatberat_setting', 'A', 'Alat Berat Setting');
INSERT INTO `m_privilege` VALUES ('blok_setting', 'A', 'Blok Setting');
INSERT INTO `m_privilege` VALUES ('dashboard', 'A', 'Dashboard');
INSERT INTO `m_privilege` VALUES ('initiate_drilling', 'A', 'Initiate Drilling');
INSERT INTO `m_privilege` VALUES ('operator_setting', 'A', 'Operator Setting');
INSERT INTO `m_privilege` VALUES ('pit_setting', 'A', 'Pit Setting');
INSERT INTO `m_privilege` VALUES ('privilege_setting', 'A', 'Privilege Setting');
INSERT INTO `m_privilege` VALUES ('user_privilege_setting', 'A', 'User Privilege Setting');

-- ----------------------------
-- Table structure for m_shift
-- ----------------------------
DROP TABLE IF EXISTS `m_shift`;
CREATE TABLE `m_shift`  (
  `SHIFT_ID` bigint(20) NOT NULL,
  `SHIFT_NAME` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `START_TIME` time(0) NULL DEFAULT NULL,
  `END_TIME` time(0) NULL DEFAULT NULL,
  PRIMARY KEY (`SHIFT_ID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_shift
-- ----------------------------
INSERT INTO `m_shift` VALUES (1, 'DAY SHIFT', '08:00:00', '16:00:00');

-- ----------------------------
-- Table structure for m_user_account
-- ----------------------------
DROP TABLE IF EXISTS `m_user_account`;
CREATE TABLE `m_user_account`  (
  `USER_NAME` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `PASSWORD` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `LAST_LOGIN` datetime(0) NULL DEFAULT NULL,
  `CREATED_DATE` date NULL DEFAULT NULL,
  `IS_FIRST_LOGIN` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of m_user_account
-- ----------------------------
INSERT INTO `m_user_account` VALUES ('cyberneoo', 'c7bd20063b0f48959e8fb86e5f425daa', '2021-07-27 20:06:25', '2021-07-12', 'N');
INSERT INTO `m_user_account` VALUES ('manager', 'c7bd20063b0f48959e8fb86e5f425daa', '2021-07-18 21:50:30', '2021-07-13', 'N');
INSERT INTO `m_user_account` VALUES ('admin', 'c7bd20063b0f48959e8fb86e5f425daa', NULL, NULL, 'N');
INSERT INTO `m_user_account` VALUES ('antonhutagalung', '0192023a7bbd73250516f069df18b500', NULL, '2021-08-08', 'N');
INSERT INTO `m_user_account` VALUES ('budihandoko', 'ac1dc97ca57b61992b6dfa1d52bbc4de', NULL, '2021-08-08', 'Y');
INSERT INTO `m_user_account` VALUES ('nanda', '0192023a7bbd73250516f069df18b500', NULL, '2021-09-10', 'Y');
INSERT INTO `m_user_account` VALUES ('appmanager', '0192023a7bbd73250516f069df18b500', NULL, '2021-09-10', 'N');

-- ----------------------------
-- Table structure for m_user_data
-- ----------------------------
DROP TABLE IF EXISTS `m_user_data`;
CREATE TABLE `m_user_data`  (
  `NIP` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `NAMA` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `KODE_JABATAN` varchar(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `USER_NAME` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of m_user_data
-- ----------------------------
INSERT INTO `m_user_data` VALUES ('123123123', 'Christopher', 'MGR', 'cyberneoo');
INSERT INTO `m_user_data` VALUES ('5454512535153', 'Julianus', 'MGR', 'manager');
INSERT INTO `m_user_data` VALUES ('45519992', 'Agung', 'STF', 'admin');
INSERT INTO `m_user_data` VALUES ('123455354', 'Anton Hutagalung S.Si', 'STF', 'antonhutagalung');
INSERT INTO `m_user_data` VALUES ('33528192617', 'Budi Handoko', 'MGR', 'budihandoko');
INSERT INTO `m_user_data` VALUES ('123123123123', 'Nanda', 'MGR', 'nanda');
INSERT INTO `m_user_data` VALUES ('0412304123', 'Christopher', 'MGR', 'appmanager');

-- ----------------------------
-- Table structure for m_user_privilege
-- ----------------------------
DROP TABLE IF EXISTS `m_user_privilege`;
CREATE TABLE `m_user_privilege`  (
  `USER_NAME` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `GROUP_ID` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of m_user_privilege
-- ----------------------------
INSERT INTO `m_user_privilege` VALUES ('cyberneoo', 'surveyor');
INSERT INTO `m_user_privilege` VALUES ('manager', 'applicationmgr');
INSERT INTO `m_user_privilege` VALUES ('admin', 'sysadmin');
INSERT INTO `m_user_privilege` VALUES ('antonhutagalung', 'surveyor');
INSERT INTO `m_user_privilege` VALUES ('budihandoko', 'sysadmin');
INSERT INTO `m_user_privilege` VALUES ('nanda', 'sysadmin');
INSERT INTO `m_user_privilege` VALUES ('appmanager', 'applicationmgr');

SET FOREIGN_KEY_CHECKS = 1;
