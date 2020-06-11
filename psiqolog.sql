/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50723
 Source Host           : localhost:3306
 Source Schema         : psiqolog

 Target Server Type    : MySQL
 Target Server Version : 50723
 File Encoding         : 65001

 Date: 24/09/2019 16:17:17
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for locals
-- ----------------------------
DROP TABLE IF EXISTS `locals`;
CREATE TABLE `locals`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` char(36) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `local` varchar(191) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `original_name` varchar(191) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `latin_name` varchar(191) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `is_active` int(1) NULL DEFAULT NULL,
  `is_default` int(1) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for media
-- ----------------------------
DROP TABLE IF EXISTS `media`;
CREATE TABLE `media`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` char(36) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `media` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for media_to_any
-- ----------------------------
DROP TABLE IF EXISTS `media_to_any`;
CREATE TABLE `media_to_any`  (
  `id` int(11) NOT NULL,
  `media_uuid` char(36) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `row_uuid` char(36) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `is_main` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` char(36) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0',
  `sort` int(11) NULL DEFAULT NULL,
  `target` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `parent_id` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES (3, 'e05d9f37-f040-4593-9413-cb1f13a24084', 0, '_top', 'POST', NULL, '2019-08-27 08:40:04', '2019-08-27 08:40:04');
INSERT INTO `menu` VALUES (4, '76e263eb-aed1-4c9c-9c98-2248cc8ef52f', 0, '_top', 'POST', NULL, '2019-08-27 08:40:13', '2019-08-27 08:40:13');

-- ----------------------------
-- Table structure for menu_to_anys
-- ----------------------------
DROP TABLE IF EXISTS `menu_to_anys`;
CREATE TABLE `menu_to_anys`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_uuid` char(36) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `row_uuid` char(36) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for menu_translations
-- ----------------------------
DROP TABLE IF EXISTS `menu_translations`;
CREATE TABLE `menu_translations`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `locale` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `menu_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `menu_id`(`menu_id`) USING BTREE,
  CONSTRAINT `menu_translations_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menu_translations
-- ----------------------------
INSERT INTO `menu_translations` VALUES (2, 'rrrr', 'ka', 3);
INSERT INTO `menu_translations` VALUES (3, 'rrrr', 'ka', 4);

-- ----------------------------
-- Table structure for perceft_compare_test
-- ----------------------------
DROP TABLE IF EXISTS `perceft_compare_test`;
CREATE TABLE `perceft_compare_test`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` char(36) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `raodenoba` int(11) NULL DEFAULT NULL,
  `swori` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of perceft_compare_test
-- ----------------------------
INSERT INTO `perceft_compare_test` VALUES (3, '1775df3c-ff30-4135-ad2e-f91edd634f8f', 150, 50, '2019-09-04 13:24:35', '2019-09-04 13:24:35');

-- ----------------------------
-- Table structure for perceft_compare_test_parts
-- ----------------------------
DROP TABLE IF EXISTS `perceft_compare_test_parts`;
CREATE TABLE `perceft_compare_test_parts`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` char(36) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `persbig` varbinary(255) NULL DEFAULT NULL,
  `perssmol` varbinary(255) NULL DEFAULT NULL,
  `persbigpass` varbinary(255) NULL DEFAULT NULL,
  `created_at` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `updated_at` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 151 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of perceft_compare_test_parts
-- ----------------------------
INSERT INTO `perceft_compare_test_parts` VALUES (1, '2009b4aa-ea7f-476d-99de-2a74c2336b61', 0x74, 0x54, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (2, '1de7129d-c7a0-441c-a243-5b73b542e99f', 0x78, 0x58, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (3, '217d508b-0597-4869-a833-6dd6887713f3', 0x69, 0x49, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (4, '0139dfd9-8741-462d-92fc-887889236160', 0x48, 0x68, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (5, '07267737-792c-479f-a22e-158f6ad020b1', 0x77, 0x57, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (6, '216fdc5b-d257-43fc-9814-f930d0838138', 0x7A, 0x5A, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (7, 'ea007369-bb38-4804-be5b-640c9501614f', 0x67, 0x47, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (8, 'c135f4f9-976c-4b12-90e9-8ceeb116a763', 0x5A, 0x7A, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (9, 'e85a751a-f84d-494d-819f-890df62a96fc', 0x4F, 0x6F, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (10, '6ca5f179-7f52-45e4-a4ef-3c0e60467f07', 0x63, 0x43, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (11, '7356d449-b3a1-497f-948b-cd7e42677caf', 0x57, 0x77, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (12, 'c5873ff9-b41e-41c3-8a61-36a1c1236d44', 0x5A, 0x7A, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (13, 'e7eb8c9f-5d58-46c0-a839-494d6ef52618', 0x75, 0x55, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (14, '8c3c5a37-b2f8-41da-8637-fe340c5a85d0', 0x65, 0x45, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (15, '66973012-41a6-40a8-89aa-74ef3a9a2163', 0x52, 0x72, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (16, '41f40e82-6205-491e-87e3-b25f0e2ed4b7', 0x77, 0x57, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (17, '75859c56-c4c2-4a2b-ba46-db7ed1abee34', 0x50, 0x70, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (18, '4bbf3203-c8a7-4f99-a7c9-b59d4d6ebeb7', 0x77, 0x57, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (19, 'd03562fb-9b51-4b25-b26c-f71da7dd1947', 0x76, 0x56, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (20, '8ddf5f85-0011-421c-990d-41d2deeb933b', 0x42, 0x62, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (21, 'd274a2da-16c4-4d3a-bea2-0d1b873332c7', 0x6B, 0x4B, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (22, '416aec3e-bac4-4fb9-8a4a-8a416d30ee33', 0x51, 0x71, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (23, '726b7a1c-9bcd-434c-822e-a3e88b21dc87', 0x68, 0x48, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (24, '11ed24e7-c187-4791-aa08-5613c40b8aa3', 0x78, 0x58, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (25, '7f9b1e38-29ee-464f-a516-b2292e45413a', 0x42, 0x62, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (26, '2d36a8f8-4c0a-4f9a-a085-70c1607686a5', 0x7A, 0x7A, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (27, '23e66c00-15e0-46f5-9510-35a906b20518', 0x77, 0x77, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (28, '25568b46-6528-4b60-afe2-72a523b9eefb', 0x44, 0x44, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (29, '36f38f1d-f9ac-4460-ae13-657782ce5c4f', 0x70, 0x70, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (30, '6bde05c0-554b-49b9-93a5-35e4f7856f9f', 0x79, 0x79, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (31, '707853a8-aff2-43e8-a7c3-6d9e599ad5bc', 0x48, 0x48, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (32, '9ad0eba9-5f06-4854-93a1-d978f878f9d2', 0x67, 0x67, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (33, 'a1790c6c-723f-42bb-bbbb-a6286966bdc2', 0x7A, 0x7A, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (34, '9c3b6ed3-4d6e-4192-9fe5-ebc0d772a9ca', 0x48, 0x48, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (35, '7c7777a1-b04a-419a-b00e-659de3fbee78', 0x66, 0x66, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (36, '0a0308b5-a7b9-49a0-8a10-f94410cd9905', 0x6D, 0x6D, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (37, 'd075992b-9884-446f-b961-51a75d0de963', 0x63, 0x63, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (38, '75f8f559-3c52-4db5-baba-531cebcad3b9', 0x56, 0x56, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (39, '41f9bca9-0750-4740-b81b-e89aa78d41fe', 0x69, 0x69, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (40, '3cabc612-336c-4f28-9596-826ffa203163', 0x45, 0x45, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (41, '06d572d0-d142-4c92-9d96-64e56399153b', 0x6A, 0x6A, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (42, '3e7791be-a149-4243-978a-fb84b2e4ef49', 0x51, 0x51, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (43, 'd99650ad-c8e5-4cc0-bff3-1fab4d89fbb1', 0x7A, 0x7A, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (44, 'c36e9e96-a74f-42f5-a745-91182df175fc', 0x6B, 0x6B, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (45, '2294f6b6-a57e-4569-8b8a-3d8225dfe8b6', 0x6A, 0x6A, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (46, '2dabd267-e362-4501-88af-cd6ef78bf9f5', 0x77, 0x77, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (47, 'f48f3fb5-858b-4816-92f6-f310291d8531', 0x5A, 0x5A, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (48, '39096f67-c4ae-47db-8bc5-2fab1ff25a68', 0x6D, 0x6D, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (49, '44582a44-9375-4c2f-bb70-3829aacc417f', 0x6D, 0x6D, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (50, '5620490b-1da5-4399-a0ed-c978eeffa51e', 0x71, 0x71, 0x74727565, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (51, '1cfe6928-3851-434b-bd69-b8527d8ca57c', 0x73, 0x4F, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (52, 'ec0b2f26-02c6-4dbc-9795-0243a3e52874', 0x56, 0x4B, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (53, 'c490f410-7a0f-43a4-ba87-9beaf04c7770', 0x44, 0x53, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (54, '666b882c-2770-4803-84e2-38e2b037a611', 0x41, 0x63, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (55, '2b59c07c-b08a-4666-8490-347670bce467', 0x70, 0x79, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (56, '2b1094d4-601e-4562-a433-c84b49a000cf', 0x47, 0x69, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (57, '96965df3-4962-4f57-bcdf-d5dfb9ebf47d', 0x63, 0x47, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (58, '8e41487b-8303-45c9-bd4f-9c3148ef872b', 0x4B, 0x4E, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (59, 'e5e20b65-5f03-4b15-8965-2c57d678093a', 0x43, 0x4D, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (60, '7051b039-7c97-4cec-94a2-39ff2df05ef6', 0x74, 0x51, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (61, 'f6702b40-0807-48f3-9c20-93ddaad04755', 0x64, 0x43, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (62, '78e78489-aaf7-4dfa-9128-c578443cbddf', 0x78, 0x75, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (63, '01120047-0301-4af7-b652-135f26a0cfd5', 0x58, 0x66, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (64, 'fb923e72-10aa-4be3-8042-1a14437551e4', 0x43, 0x51, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (65, '2a8d7cff-bd97-40aa-9454-a2e301df3c3b', 0x4F, 0x46, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (66, '2901ab47-e18b-421e-8456-598fe53fa16b', 0x57, 0x56, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (67, '29361ddf-ddbb-410b-ae5a-898ed1a99ec9', 0x42, 0x75, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (68, 'b9f7601c-9daa-4eff-ac22-effaf55d13ab', 0x61, 0x7A, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (69, 'b45a1c0f-895b-47ef-9cac-8d1c3782a38a', 0x45, 0x6D, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (70, '40a3b0a3-0870-411c-8773-64b1da21a4bd', 0x41, 0x64, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (71, '246242c0-8bfb-45d0-adca-368eaddf16e8', 0x48, 0x53, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (72, '2ca57050-5c71-4d0b-bc6c-21b32f14b5ab', 0x5A, 0x71, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (73, '2907015b-eb3c-4206-b0ff-735d805329d8', 0x6C, 0x4F, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (74, 'a1403f73-fe8b-4570-9671-86d8d0482339', 0x57, 0x4F, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (75, 'd947aebb-af65-461b-8dc2-4456cf63ad9f', 0x6F, 0x44, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (76, '9d11e624-73f1-46b5-a196-2c996525874c', 0x53, 0x41, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (77, '95463472-7692-440c-85e2-ae3be9586dd6', 0x76, 0x41, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (78, 'bd60bc1a-19f3-4e91-bbbe-a7440cce1cfc', 0x71, 0x73, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (79, 'cf25727e-286b-452a-b4e3-ef60f4e2807a', 0x6C, 0x44, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (80, 'a14b42a8-0829-4c1a-8ac2-0f2d63fe2c16', 0x6F, 0x68, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (81, 'c78ebb08-0ada-471b-9038-b0068c1ea1ff', 0x77, 0x66, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (82, '7c3ffdea-ae5a-431c-9a6a-dec29a4fbab1', 0x4C, 0x41, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (83, 'b38c2763-0ece-49bf-af42-6ad52d94d789', 0x44, 0x7A, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (84, '76ab5095-cc48-4864-8eee-481acecea48b', 0x63, 0x6F, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (85, 'e8f93906-2875-4501-b0d8-77ea0994ff7e', 0x58, 0x4D, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (86, '42a8cac2-48f2-4949-ae35-998d9dfc07e7', 0x6B, 0x5A, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (87, 'aecc2fa0-35ca-496b-8189-412189909f24', 0x52, 0x6E, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (88, '00242811-79ac-49c9-adab-f545080cc34c', 0x73, 0x78, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (89, '6a056813-485d-42f4-831b-3c271e7ec965', 0x62, 0x53, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (90, 'f2462d53-a1c4-4238-802a-ebf0625030d8', 0x74, 0x70, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (91, '27a14c9e-6b38-426b-abe0-82763e9a138d', 0x78, 0x48, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (92, '8151c8a9-a738-48c6-b09a-2bb5ff9a64b7', 0x62, 0x4F, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (93, 'fd4a465a-87ba-4cbe-8d19-ff7f41823626', 0x4B, 0x6F, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (94, '5e515990-d260-496f-9b40-f44d98e76700', 0x59, 0x69, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (95, 'c95bfd22-7646-4221-a8ab-eaed0615c761', 0x4E, 0x7A, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (96, '5d12d898-2863-4451-a5a6-ee2ea08580b2', 0x44, 0x6D, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (97, '7651cdd8-fd6c-48c7-bf1e-659cdfcbd31c', 0x62, 0x41, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (98, '37487e98-9157-4b2c-a307-82e1effcbcfa', 0x42, 0x48, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (99, '5e406dec-80c5-4971-b61d-1459fc97f453', 0x4B, 0x4C, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (100, 'e8c49d62-8baa-489f-803c-508466d277e5', 0x41, 0x53, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (101, '55086ca1-74e2-4324-addc-729724d04684', 0x64, 0x71, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (102, '007c3e0f-0783-408b-81ec-c14043b6edcf', 0x65, 0x51, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (103, '3f0bc420-713a-49d3-9976-6f351162364d', 0x65, 0x6B, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (104, '1bb97e4e-491c-4c47-9a13-559d77ff58a1', 0x77, 0x53, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (105, 'a8864861-629e-45f7-9229-564db43f6545', 0x56, 0x77, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (106, 'a413b5ed-7d05-4d9f-a0b9-f2ed09da0a47', 0x78, 0x49, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (107, 'e43d8766-e813-4b9b-8f0b-e60818e3c34a', 0x6C, 0x56, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (108, '160b7d78-cc9d-45e6-a224-a0a1f3023667', 0x57, 0x59, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (109, '2983d01d-a2f7-451c-ae0c-f34b19a7f0dd', 0x4A, 0x67, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (110, '5a2b2ce3-d9b9-4f77-ae79-f9ac7b66fceb', 0x4E, 0x51, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (111, '79131b36-3947-44d6-98ac-e174aca2800b', 0x45, 0x55, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (112, '9cc49e9a-296f-4231-a636-66100ea0a770', 0x64, 0x52, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (113, '4366ab9a-8e99-49d2-abb9-679cf48246cb', 0x57, 0x45, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (114, '6b906cd1-3ac2-43c7-8760-1a6ab1ad113d', 0x4E, 0x41, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (115, 'a0212c7a-5f09-40b9-b662-610aa99209ee', 0x7A, 0x71, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (116, '8d48bcb5-9e55-43f8-a7b5-09adbb005bc5', 0x6A, 0x52, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (117, '9bc78031-b8de-4d46-a264-b44e745533d8', 0x59, 0x6C, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (118, '53a978b0-bf3b-4cfc-87be-8ead38840a39', 0x4D, 0x6F, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (119, 'ee80250e-1719-4c5d-b390-d75c036312b1', 0x77, 0x56, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (120, '8a7d48f0-6a15-4171-b186-fa8b1c9c666a', 0x73, 0x56, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (121, '1de4d97d-e1a5-4020-852a-a812f12ff113', 0x67, 0x62, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (122, '389fa277-d2aa-4ba0-8750-86b0885fa662', 0x72, 0x44, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (123, '7ecbfcff-6783-494c-a3de-56998953137f', 0x59, 0x74, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (124, 'bdabcbff-df17-49ad-a43f-68dc85f60026', 0x4D, 0x71, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (125, 'cd276ac1-e378-4f62-92cb-bcbc08c75da8', 0x59, 0x4B, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (126, 'e2d3dd90-d5ba-4e29-9830-03a157501975', 0x70, 0x79, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (127, 'cf498886-0fd4-47fd-92c4-7a363889efcd', 0x57, 0x4A, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (128, 'dd5b0c54-024d-43f5-ba09-45ef56f0e8ba', 0x63, 0x79, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (129, '7fea2955-3349-496a-8ac8-5fd08bc82e0e', 0x6F, 0x4D, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (130, '03e22c78-9829-41d9-9580-bc560362d1db', 0x6C, 0x46, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (131, '45c9fb1c-e18e-4311-abf6-a5771ceeb3cf', 0x5A, 0x4E, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (132, 'd3635341-dab0-4ece-9add-319fa5eee93a', 0x56, 0x47, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (133, 'f3bbe490-ec1a-411e-9f19-860ac83f19f9', 0x4E, 0x75, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (134, 'a78f8b1c-45f0-4d5c-bf86-0c3dfe9f70cd', 0x47, 0x75, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (135, '914f490b-7b76-415f-b6ba-dc1fa80f676c', 0x77, 0x79, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (136, 'aca95860-aeb2-41fb-b8cb-0f3a42ccb51f', 0x78, 0x6A, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (137, '0a8bcad3-eaa2-473d-b585-6c33012d4dc0', 0x7A, 0x4A, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (138, '119617e3-dee4-40ee-bd5a-1de9b2a67f95', 0x7A, 0x52, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (139, '254e7d64-c354-490d-89e7-4252fa173c7d', 0x48, 0x67, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (140, '7b28b8e8-0850-41a2-8608-9552e0b8dfca', 0x64, 0x42, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (141, '74ca70dc-7d0f-428c-aba6-cb861b471e87', 0x41, 0x67, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (142, '3a17987a-e776-421b-94cf-5c9f8533ab59', 0x44, 0x56, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (143, '4534dfe9-599d-4cbe-96c7-9f53add25a2b', 0x51, 0x75, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (144, 'fdcc24cd-57c8-4501-8458-49c4f548de5e', 0x52, 0x66, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (145, '53559418-31a0-4963-a44b-41da135b0fed', 0x70, 0x65, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (146, '470a687b-1c19-47ec-b043-376d810c9e3e', 0x55, 0x4B, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (147, '3eafee36-3722-472c-b4ab-06b94304faaf', 0x58, 0x50, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (148, 'd66531fd-2b1e-4e27-9a75-d6c97303159f', 0x55, 0x59, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (149, '958cbe84-df1a-47ef-b754-a4a684aa9817', 0x70, 0x78, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');
INSERT INTO `perceft_compare_test_parts` VALUES (150, '1dde484c-2bd8-467e-8725-7b4a6dbe4ce6', 0x44, 0x59, 0x66616C7365, '2019-09-04 13:57:22', '2019-09-04 13:57:22');

-- ----------------------------
-- Table structure for perceft_compare_test_to_any
-- ----------------------------
DROP TABLE IF EXISTS `perceft_compare_test_to_any`;
CREATE TABLE `perceft_compare_test_to_any`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `perceft_compare_test_uuid` char(36) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `row_uuid` char(36) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 151 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of perceft_compare_test_to_any
-- ----------------------------
INSERT INTO `perceft_compare_test_to_any` VALUES (1, '2009b4aa-ea7f-476d-99de-2a74c2336b61', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (2, '1de7129d-c7a0-441c-a243-5b73b542e99f', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (3, '217d508b-0597-4869-a833-6dd6887713f3', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (4, '0139dfd9-8741-462d-92fc-887889236160', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (5, '07267737-792c-479f-a22e-158f6ad020b1', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (6, '216fdc5b-d257-43fc-9814-f930d0838138', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (7, 'ea007369-bb38-4804-be5b-640c9501614f', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (8, 'c135f4f9-976c-4b12-90e9-8ceeb116a763', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (9, 'e85a751a-f84d-494d-819f-890df62a96fc', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (10, '6ca5f179-7f52-45e4-a4ef-3c0e60467f07', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (11, '7356d449-b3a1-497f-948b-cd7e42677caf', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (12, 'c5873ff9-b41e-41c3-8a61-36a1c1236d44', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (13, 'e7eb8c9f-5d58-46c0-a839-494d6ef52618', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (14, '8c3c5a37-b2f8-41da-8637-fe340c5a85d0', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (15, '66973012-41a6-40a8-89aa-74ef3a9a2163', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (16, '41f40e82-6205-491e-87e3-b25f0e2ed4b7', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (17, '75859c56-c4c2-4a2b-ba46-db7ed1abee34', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (18, '4bbf3203-c8a7-4f99-a7c9-b59d4d6ebeb7', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (19, 'd03562fb-9b51-4b25-b26c-f71da7dd1947', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (20, '8ddf5f85-0011-421c-990d-41d2deeb933b', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (21, 'd274a2da-16c4-4d3a-bea2-0d1b873332c7', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (22, '416aec3e-bac4-4fb9-8a4a-8a416d30ee33', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (23, '726b7a1c-9bcd-434c-822e-a3e88b21dc87', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (24, '11ed24e7-c187-4791-aa08-5613c40b8aa3', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (25, '7f9b1e38-29ee-464f-a516-b2292e45413a', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (26, '2d36a8f8-4c0a-4f9a-a085-70c1607686a5', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (27, '23e66c00-15e0-46f5-9510-35a906b20518', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (28, '25568b46-6528-4b60-afe2-72a523b9eefb', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (29, '36f38f1d-f9ac-4460-ae13-657782ce5c4f', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (30, '6bde05c0-554b-49b9-93a5-35e4f7856f9f', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (31, '707853a8-aff2-43e8-a7c3-6d9e599ad5bc', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (32, '9ad0eba9-5f06-4854-93a1-d978f878f9d2', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (33, 'a1790c6c-723f-42bb-bbbb-a6286966bdc2', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (34, '9c3b6ed3-4d6e-4192-9fe5-ebc0d772a9ca', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (35, '7c7777a1-b04a-419a-b00e-659de3fbee78', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (36, '0a0308b5-a7b9-49a0-8a10-f94410cd9905', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (37, 'd075992b-9884-446f-b961-51a75d0de963', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (38, '75f8f559-3c52-4db5-baba-531cebcad3b9', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (39, '41f9bca9-0750-4740-b81b-e89aa78d41fe', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (40, '3cabc612-336c-4f28-9596-826ffa203163', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (41, '06d572d0-d142-4c92-9d96-64e56399153b', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (42, '3e7791be-a149-4243-978a-fb84b2e4ef49', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (43, 'd99650ad-c8e5-4cc0-bff3-1fab4d89fbb1', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (44, 'c36e9e96-a74f-42f5-a745-91182df175fc', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (45, '2294f6b6-a57e-4569-8b8a-3d8225dfe8b6', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (46, '2dabd267-e362-4501-88af-cd6ef78bf9f5', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (47, 'f48f3fb5-858b-4816-92f6-f310291d8531', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (48, '39096f67-c4ae-47db-8bc5-2fab1ff25a68', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (49, '44582a44-9375-4c2f-bb70-3829aacc417f', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (50, '5620490b-1da5-4399-a0ed-c978eeffa51e', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (51, '1cfe6928-3851-434b-bd69-b8527d8ca57c', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (52, 'ec0b2f26-02c6-4dbc-9795-0243a3e52874', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (53, 'c490f410-7a0f-43a4-ba87-9beaf04c7770', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (54, '666b882c-2770-4803-84e2-38e2b037a611', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (55, '2b59c07c-b08a-4666-8490-347670bce467', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (56, '2b1094d4-601e-4562-a433-c84b49a000cf', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (57, '96965df3-4962-4f57-bcdf-d5dfb9ebf47d', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (58, '8e41487b-8303-45c9-bd4f-9c3148ef872b', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (59, 'e5e20b65-5f03-4b15-8965-2c57d678093a', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (60, '7051b039-7c97-4cec-94a2-39ff2df05ef6', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (61, 'f6702b40-0807-48f3-9c20-93ddaad04755', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (62, '78e78489-aaf7-4dfa-9128-c578443cbddf', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (63, '01120047-0301-4af7-b652-135f26a0cfd5', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (64, 'fb923e72-10aa-4be3-8042-1a14437551e4', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (65, '2a8d7cff-bd97-40aa-9454-a2e301df3c3b', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (66, '2901ab47-e18b-421e-8456-598fe53fa16b', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (67, '29361ddf-ddbb-410b-ae5a-898ed1a99ec9', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (68, 'b9f7601c-9daa-4eff-ac22-effaf55d13ab', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (69, 'b45a1c0f-895b-47ef-9cac-8d1c3782a38a', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (70, '40a3b0a3-0870-411c-8773-64b1da21a4bd', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (71, '246242c0-8bfb-45d0-adca-368eaddf16e8', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (72, '2ca57050-5c71-4d0b-bc6c-21b32f14b5ab', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (73, '2907015b-eb3c-4206-b0ff-735d805329d8', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (74, 'a1403f73-fe8b-4570-9671-86d8d0482339', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (75, 'd947aebb-af65-461b-8dc2-4456cf63ad9f', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (76, '9d11e624-73f1-46b5-a196-2c996525874c', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (77, '95463472-7692-440c-85e2-ae3be9586dd6', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (78, 'bd60bc1a-19f3-4e91-bbbe-a7440cce1cfc', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (79, 'cf25727e-286b-452a-b4e3-ef60f4e2807a', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (80, 'a14b42a8-0829-4c1a-8ac2-0f2d63fe2c16', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (81, 'c78ebb08-0ada-471b-9038-b0068c1ea1ff', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (82, '7c3ffdea-ae5a-431c-9a6a-dec29a4fbab1', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (83, 'b38c2763-0ece-49bf-af42-6ad52d94d789', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (84, '76ab5095-cc48-4864-8eee-481acecea48b', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (85, 'e8f93906-2875-4501-b0d8-77ea0994ff7e', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (86, '42a8cac2-48f2-4949-ae35-998d9dfc07e7', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (87, 'aecc2fa0-35ca-496b-8189-412189909f24', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (88, '00242811-79ac-49c9-adab-f545080cc34c', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (89, '6a056813-485d-42f4-831b-3c271e7ec965', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (90, 'f2462d53-a1c4-4238-802a-ebf0625030d8', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (91, '27a14c9e-6b38-426b-abe0-82763e9a138d', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (92, '8151c8a9-a738-48c6-b09a-2bb5ff9a64b7', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (93, 'fd4a465a-87ba-4cbe-8d19-ff7f41823626', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (94, '5e515990-d260-496f-9b40-f44d98e76700', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (95, 'c95bfd22-7646-4221-a8ab-eaed0615c761', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (96, '5d12d898-2863-4451-a5a6-ee2ea08580b2', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (97, '7651cdd8-fd6c-48c7-bf1e-659cdfcbd31c', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (98, '37487e98-9157-4b2c-a307-82e1effcbcfa', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (99, '5e406dec-80c5-4971-b61d-1459fc97f453', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (100, 'e8c49d62-8baa-489f-803c-508466d277e5', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (101, '55086ca1-74e2-4324-addc-729724d04684', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (102, '007c3e0f-0783-408b-81ec-c14043b6edcf', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (103, '3f0bc420-713a-49d3-9976-6f351162364d', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (104, '1bb97e4e-491c-4c47-9a13-559d77ff58a1', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (105, 'a8864861-629e-45f7-9229-564db43f6545', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (106, 'a413b5ed-7d05-4d9f-a0b9-f2ed09da0a47', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (107, 'e43d8766-e813-4b9b-8f0b-e60818e3c34a', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (108, '160b7d78-cc9d-45e6-a224-a0a1f3023667', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (109, '2983d01d-a2f7-451c-ae0c-f34b19a7f0dd', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (110, '5a2b2ce3-d9b9-4f77-ae79-f9ac7b66fceb', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (111, '79131b36-3947-44d6-98ac-e174aca2800b', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (112, '9cc49e9a-296f-4231-a636-66100ea0a770', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (113, '4366ab9a-8e99-49d2-abb9-679cf48246cb', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (114, '6b906cd1-3ac2-43c7-8760-1a6ab1ad113d', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (115, 'a0212c7a-5f09-40b9-b662-610aa99209ee', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (116, '8d48bcb5-9e55-43f8-a7b5-09adbb005bc5', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (117, '9bc78031-b8de-4d46-a264-b44e745533d8', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (118, '53a978b0-bf3b-4cfc-87be-8ead38840a39', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (119, 'ee80250e-1719-4c5d-b390-d75c036312b1', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (120, '8a7d48f0-6a15-4171-b186-fa8b1c9c666a', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (121, '1de4d97d-e1a5-4020-852a-a812f12ff113', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (122, '389fa277-d2aa-4ba0-8750-86b0885fa662', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (123, '7ecbfcff-6783-494c-a3de-56998953137f', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (124, 'bdabcbff-df17-49ad-a43f-68dc85f60026', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (125, 'cd276ac1-e378-4f62-92cb-bcbc08c75da8', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (126, 'e2d3dd90-d5ba-4e29-9830-03a157501975', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (127, 'cf498886-0fd4-47fd-92c4-7a363889efcd', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (128, 'dd5b0c54-024d-43f5-ba09-45ef56f0e8ba', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (129, '7fea2955-3349-496a-8ac8-5fd08bc82e0e', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (130, '03e22c78-9829-41d9-9580-bc560362d1db', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (131, '45c9fb1c-e18e-4311-abf6-a5771ceeb3cf', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (132, 'd3635341-dab0-4ece-9add-319fa5eee93a', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (133, 'f3bbe490-ec1a-411e-9f19-860ac83f19f9', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (134, 'a78f8b1c-45f0-4d5c-bf86-0c3dfe9f70cd', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (135, '914f490b-7b76-415f-b6ba-dc1fa80f676c', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (136, 'aca95860-aeb2-41fb-b8cb-0f3a42ccb51f', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (137, '0a8bcad3-eaa2-473d-b585-6c33012d4dc0', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (138, '119617e3-dee4-40ee-bd5a-1de9b2a67f95', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (139, '254e7d64-c354-490d-89e7-4252fa173c7d', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (140, '7b28b8e8-0850-41a2-8608-9552e0b8dfca', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (141, '74ca70dc-7d0f-428c-aba6-cb861b471e87', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (142, '3a17987a-e776-421b-94cf-5c9f8533ab59', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (143, '4534dfe9-599d-4cbe-96c7-9f53add25a2b', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (144, 'fdcc24cd-57c8-4501-8458-49c4f548de5e', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (145, '53559418-31a0-4963-a44b-41da135b0fed', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (146, '470a687b-1c19-47ec-b043-376d810c9e3e', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (147, '3eafee36-3722-472c-b4ab-06b94304faaf', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (148, 'd66531fd-2b1e-4e27-9a75-d6c97303159f', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (149, '958cbe84-df1a-47ef-b754-a4a684aa9817', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `perceft_compare_test_to_any` VALUES (150, '1dde484c-2bd8-467e-8725-7b4a6dbe4ce6', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);

-- ----------------------------
-- Table structure for perceft_compare_test_translations
-- ----------------------------
DROP TABLE IF EXISTS `perceft_compare_test_translations`;
CREATE TABLE `perceft_compare_test_translations`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `desc` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `locale` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `perceft_compare_test_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of perceft_compare_test_translations
-- ----------------------------
INSERT INTO `perceft_compare_test_translations` VALUES (1, 'ერცეფტული შედარება', 'ერცეფტული შედარება მოკლე აღწერილობა', 'ka', 3);

-- ----------------------------
-- Table structure for post
-- ----------------------------
DROP TABLE IF EXISTS `post`;
CREATE TABLE `post`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` char(36) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `is_active` int(11) NULL DEFAULT NULL,
  `is_featured` int(11) NULL DEFAULT NULL,
  `is_comment_on` int(11) NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `motc` int(11) NULL DEFAULT NULL,
  `full` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for post_translations
-- ----------------------------
DROP TABLE IF EXISTS `post_translations`;
CREATE TABLE `post_translations`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `meta_title` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `meta_description` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `og_title` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `og_description` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `slug` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `locale` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for register_user
-- ----------------------------
DROP TABLE IF EXISTS `register_user`;
CREATE TABLE `register_user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` char(36) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of register_user
-- ----------------------------
INSERT INTO `register_user` VALUES (4, 'a044e6cc-b8c8-4b76-9b46-5dd1d7f150c2', 'kaxagabunia', '$2y$10$e6OlSmt4qRjCLj/aiuWQfOOSrHarS./TtHFn6ZUmNg6Oq6dwn.h8a', 1, '2019-09-23 17:15:31', '2019-09-23 17:15:31');

-- ----------------------------
-- Table structure for register_user_to_any
-- ----------------------------
DROP TABLE IF EXISTS `register_user_to_any`;
CREATE TABLE `register_user_to_any`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `register_user_uuid` char(36) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `row_uuid` char(36) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `rype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of register_user_to_any
-- ----------------------------
INSERT INTO `register_user_to_any` VALUES (2, 'a044e6cc-b8c8-4b76-9b46-5dd1d7f150c2', '0e284572-653f-42ee-8bfe-f87fcbcf7740', NULL);
INSERT INTO `register_user_to_any` VALUES (4, 'a044e6cc-b8c8-4b76-9b46-5dd1d7f150c2', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `register_user_to_any` VALUES (6, 'a044e6cc-b8c8-4b76-9b46-5dd1d7f150c2', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `register_user_to_any` VALUES (7, 'a044e6cc-b8c8-4b76-9b46-5dd1d7f150c2', 'c473f5ac-86f3-414f-89eb-c14052a7db59', NULL);

-- ----------------------------
-- Table structure for register_user_translations
-- ----------------------------
DROP TABLE IF EXISTS `register_user_translations`;
CREATE TABLE `register_user_translations`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `lname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `register_user_id` int(11) NOT NULL,
  `locale` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of register_user_translations
-- ----------------------------
INSERT INTO `register_user_translations` VALUES (4, 'kakha', 'mghebrishvili', 'kaxam1@gmail.com', 4, 'ka');

-- ----------------------------
-- Table structure for selection_test
-- ----------------------------
DROP TABLE IF EXISTS `selection_test`;
CREATE TABLE `selection_test`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` char(36) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `row` int(11) NULL DEFAULT NULL,
  `first` int(11) NULL DEFAULT NULL,
  `time` int(11) NULL DEFAULT NULL,
  `timetest` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of selection_test
-- ----------------------------
INSERT INTO `selection_test` VALUES (1, 'c473f5ac-86f3-414f-89eb-c14052a7db59', 150, 50, 100, 1000, '2019-09-16 13:01:55', '2019-09-16 13:01:55');

-- ----------------------------
-- Table structure for selection_test_parts
-- ----------------------------
DROP TABLE IF EXISTS `selection_test_parts`;
CREATE TABLE `selection_test_parts`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` char(36) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `variant` int(11) NULL DEFAULT NULL,
  `dashoreba` int(11) NULL DEFAULT NULL,
  `pirveliaso` int(11) NULL DEFAULT NULL,
  `meoreaso` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for selection_test_to_any
-- ----------------------------
DROP TABLE IF EXISTS `selection_test_to_any`;
CREATE TABLE `selection_test_to_any`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` char(36) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `selection_test_uuid` char(36) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `row_uuid` char(36) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for selection_test_translations
-- ----------------------------
DROP TABLE IF EXISTS `selection_test_translations`;
CREATE TABLE `selection_test_translations`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `desc` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `locale` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `selection_test_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of selection_test_translations
-- ----------------------------
INSERT INTO `selection_test_translations` VALUES (1, 'სელექციური ყურადღება', 'სელექციური ყურადღება მოკლე აღწერილობა', 'ka', 1);

-- ----------------------------
-- Table structure for signal_detec_test
-- ----------------------------
DROP TABLE IF EXISTS `signal_detec_test`;
CREATE TABLE `signal_detec_test`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` char(36) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `time` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `row` int(11) NOT NULL,
  `true` int(11) NULL DEFAULT NULL,
  `false` int(11) NULL DEFAULT NULL,
  `chdilistart` int(11) NULL DEFAULT NULL,
  `chdilifinish` int(11) NULL DEFAULT NULL,
  `sworipasx_raod` int(11) NULL DEFAULT NULL,
  `timetest` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of signal_detec_test
-- ----------------------------
INSERT INTO `signal_detec_test` VALUES (1, '0e284572-653f-42ee-8bfe-f87fcbcf7740', '100', 150, 100, 50, 50, 70, 3, '1000', '2019-09-17 12:59:32', '2019-09-17 12:59:32');

-- ----------------------------
-- Table structure for signal_detec_test_parts
-- ----------------------------
DROP TABLE IF EXISTS `signal_detec_test_parts`;
CREATE TABLE `signal_detec_test_parts`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` char(36) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `Correct` int(11) NULL DEFAULT NULL,
  `Wrong` int(11) NULL DEFAULT NULL,
  `procenti` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `arrangement` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `Quantity` int(11) NULL DEFAULT NULL,
  `created_at` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `updated_at` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 907 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of signal_detec_test_parts
-- ----------------------------
INSERT INTO `signal_detec_test_parts` VALUES (757, '02887a7a-b789-4b10-acb5-a3ad92600747', 2, 51, 'false', '2', 17, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (758, 'c67219a6-461d-4460-ad43-818abd391375', 2, 62, 'false', '4', 21, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (759, '10af398d-28c1-4a77-9115-74ceb8b248f2', 1, 62, 'false', '2', 27, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (760, '433d3812-0d27-41f7-9b93-48d072667c4a', 2, 59, 'false', '5', 26, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (761, '85723ea8-a271-416b-9600-ffa680f226d5', 1, 65, 'false', '2', 18, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (762, '9ba7fcff-544c-4dad-824f-a76de4623486', 1, 68, 'false', '5', 20, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (763, 'e000fda4-dc1b-410d-9d8d-02833a95661c', 2, 62, 'false', '1', 20, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (764, '4315d264-0a36-4fc6-8dd8-24902307e1cf', 1, 51, 'false', '2', 22, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (765, 'a4eee528-8174-4d09-a3fc-d2529b959df8', 2, 48, 'false', '6', 17, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (766, '28675cb3-0f4a-4ce3-ab37-8e32be265091', 2, 51, 'false', '1', 17, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (767, '26892409-a2ec-48ba-9f57-126098d84fbe', 2, 63, 'false', '6', 18, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (768, 'ef5cc581-55e8-418e-89e2-612d9a168732', 1, 60, 'false', '3', 23, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (769, '4ad6dee2-985f-49cd-a6a1-703b4fab279b', 1, 53, 'false', '1', 23, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (770, '3930b45a-cabe-41bc-b0ad-865d77ce1956', 2, 54, 'false', '1', 20, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (771, '4ea5d45f-7dfd-4340-a945-9ec7307abb73', 1, 68, 'false', '3', 23, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (772, '59b8edd7-60d9-48f0-b124-553c7e410573', 1, 65, 'false', '1', 21, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (773, 'e5aa1616-0f35-4a61-ad6a-c7a308cbfa02', 2, 56, 'false', '4', 22, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (774, '6d706135-601d-4f46-8c8d-b5cd1a66f90c', 2, 64, 'false', '3', 26, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (775, '506b3f31-f310-424d-99a9-38246158a9bd', 1, 50, 'false', '6', 16, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (776, '9f966e2a-9458-4432-abf9-45498c270f87', 2, 65, 'false', '5', 22, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (777, 'bb93db12-35d3-4894-a38e-5b7fa81153c5', 2, 53, 'false', '1', 21, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (778, 'f4864439-a8c4-4e2e-96b7-c16e3fb1abcd', 2, 56, 'false', '5', 25, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (779, 'e123ea6c-b212-4c3c-b847-213b4089e92f', 2, 60, 'false', '1', 27, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (780, '5a2438c3-ed5d-4cc7-a642-60ccb7ce5489', 1, 62, 'false', '3', 27, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (781, '181d5a58-80f7-4c39-b063-be412e0cc762', 1, 56, 'false', '4', 22, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (782, '7d79cb38-7ce8-4507-8558-5f455e132333', 1, 52, 'false', '5', 20, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (783, '86e16d9c-9d8d-4155-9d15-3dbeb3ad585a', 2, 67, 'false', '5', 21, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (784, '0a5417ff-047e-4c34-b1d7-ee563257e776', 2, 64, 'false', '3', 24, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (785, '3f6054d7-0eaa-4018-944d-47bd51fad36b', 1, 59, 'false', '1', 27, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (786, '473240cd-c8b1-424d-a80d-5dc57420a716', 1, 53, 'false', '5', 23, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (787, 'bfa3ba80-d148-472f-ac16-547f9294aea2', 2, 60, 'false', '6', 26, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (788, '4e9b328c-b28e-40dc-b6f5-e56460cae9f5', 1, 57, 'false', '2', 22, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (789, '95e7f176-265d-41d6-963e-bd7533a5a6aa', 1, 50, 'false', '5', 17, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (790, '35ffbda1-368a-4b01-9240-a810a717a2bf', 1, 55, 'false', '5', 21, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (791, '6d134fc1-9e0b-425d-bb67-121113784571', 1, 59, 'false', '2', 26, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (792, '72521cad-267d-4049-8807-2a4f18560c79', 2, 48, 'false', '4', 17, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (793, '8ab8375a-002e-4ec9-9222-7b2bf3a98b73', 2, 48, 'false', '2', 22, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (794, '694f6627-38fc-4b8c-a9b9-119d37749eea', 2, 53, 'false', '4', 24, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (795, 'bb959071-efc6-4765-a227-5d171cfab42b', 1, 61, 'false', '4', 24, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (796, 'be6e62a9-4852-4c7d-81a2-ecd6cb18e235', 1, 51, 'false', '2', 16, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (797, 'f2c6d0ae-af1d-4068-9996-50404418422b', 2, 64, 'false', '5', 20, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (798, '23845aa9-dd3b-47a5-b976-f03a45ab1cc2', 2, 65, 'false', '4', 25, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (799, '1918c124-321a-4236-8605-7401f6a4b6ce', 2, 62, 'false', '2', 20, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (800, '39698d12-d022-44d1-85fa-2019c3c04c43', 1, 66, 'false', '6', 19, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (801, '301beb5f-253d-4af2-ac11-4abaef1f86fd', 1, 58, 'false', '5', 23, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (802, '969d8ae6-075d-4093-b32c-bb282f48de98', 1, 65, 'false', '4', 23, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (803, 'd94e876e-58d4-4f29-a545-bea1cfea8c85', 1, 54, 'false', '1', 19, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (804, 'eab518da-1276-4f8d-9574-28e0c3009795', 1, 51, 'false', '2', 21, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (805, '2e506095-18e8-43dc-bb3e-fc8c1c9e76c0', 2, 63, 'false', '4', 20, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (806, '381b55bf-0a54-47eb-b12c-4f61fab97204', 1, 55, 'false', '6', 22, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (807, '00389698-4544-4e44-bf14-768588d1c95f', 2, 67, 'false', '4', 22, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (808, '87b01470-e4fe-4b9f-a9dc-c1c9f8301c84', 2, 68, 'false', '6', 22, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (809, '7caf159f-d8df-4c95-a28c-3e42d5b34fb0', 2, 52, 'false', '4', 19, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (810, '1ee77f54-4740-4def-b7cd-da55cb5aac7a', 1, 56, 'false', '4', 26, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (811, 'eb5c2446-3d86-464e-ae26-1d0960d6d786', 2, 52, 'false', '2', 22, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (812, 'fd9cb278-c7b1-40d5-9d8b-f268598e995f', 2, 49, 'false', '4', 19, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (813, '5f0e8b72-ac2d-47e4-8f4f-35837ec77985', 2, 49, 'false', '3', 20, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (814, '286c4322-7791-4519-b652-f6d0bc015ccc', 2, 67, 'false', '1', 22, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (815, '709f6fbf-6a6d-4cc5-a6de-5e03e2c10b19', 2, 54, 'false', '1', 26, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (816, '5602be2e-84d1-4d42-9ec9-e567c8fcaae8', 2, 51, 'false', '3', 17, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (817, 'e09d6e31-9563-429b-958c-d922f443aeb8', 2, 62, 'false', '6', 26, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (818, '3ab3757b-877f-439e-822e-124e41e1f1db', 2, 52, 'false', '6', 22, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (819, '10d5231a-02f9-4cf5-b92b-aca1ba7307b5', 1, 67, 'false', '2', 23, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (820, 'cba179bc-413b-4087-a548-b55e2c814b1a', 1, 54, 'false', '2', 20, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (821, '4f28881f-8a23-4a7e-b283-5db297999dbb', 1, 69, 'false', '4', 19, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (822, 'a2e8d5ad-7332-4778-ac93-27ab18e6e7a6', 1, 51, 'false', '6', 19, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (823, '68446d1f-9d45-4d3c-99a0-d9f3165be288', 1, 56, 'false', '5', 25, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (824, 'c768e5f8-2917-4554-bcea-3256fae144fc', 2, 63, 'false', '2', 25, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (825, '1dd75d16-413e-4fbf-8ee1-fa9184daf938', 1, 64, 'false', '1', 24, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (826, '19d9462d-2d82-43ca-a41f-c85c7b83c169', 1, 68, 'false', '2', 21, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (827, '89c9df7b-6679-4037-8272-c4ca4ead893f', 2, 55, 'false', '4', 26, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (828, '30494ad0-7d3e-45a9-a0ed-e929698b7ac4', 2, 58, 'false', '4', 25, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (829, '551a5e17-d0ab-4d24-b422-50379bb0dca0', 1, 66, 'false', '4', 22, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (830, 'b44ba04d-13a8-41f8-a0db-3e83df18e330', 1, 62, 'false', '2', 27, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (831, 'a34bedc2-882f-4c0a-9ed2-345819b11a3c', 2, 66, 'false', '5', 25, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (832, '44e98e57-85fb-4b16-bfff-0e5ee5f41313', 2, 65, 'false', '1', 23, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (833, '8e6b1fb7-26c6-478f-b463-f26b0b528296', 2, 55, 'false', '2', 26, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (834, '108f969e-b879-467a-948d-8a9f5a9177d3', 2, 65, 'false', '3', 26, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (835, '69ccf9b0-c9f6-4b35-8989-0be36dc02514', 1, 68, 'false', '4', 18, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (836, 'a96e7a9f-98c0-48ac-90a8-f38bfca00a6c', 1, 58, 'false', '5', 27, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (837, 'ebd53dca-3005-40f3-896b-2772b8c640bb', 2, 65, 'false', '2', 26, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (838, '3619de45-4d05-4f07-9528-803fe4e6942c', 2, 55, 'false', '6', 24, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (839, 'f9ca1a5c-652c-4f09-9e46-e70a76cc320d', 1, 55, 'false', '1', 26, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (840, '29e1ecd2-56c1-4a80-9da2-7bfe958ca9d5', 2, 55, 'false', '6', 25, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (841, 'b1be0e93-564e-4e4d-9421-04458a6dfc99', 1, 52, 'false', '4', 21, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (842, '7a163710-748f-4d14-b625-f9498ca44cd2', 2, 61, 'false', '2', 26, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (843, 'e0f80d43-a6ec-49ad-849a-3c9f8f6106b1', 1, 69, 'false', '1', 18, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (844, 'baffb439-1a99-43ea-84d1-7c830f0828b1', 1, 66, 'false', '3', 22, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (845, 'a5f12868-6311-4c55-9cb4-292fc3d95eca', 1, 65, 'false', '3', 21, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (846, '721d12a6-5865-4fe6-a785-a9e75f8aad0d', 2, 65, 'false', '5', 23, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (847, '540d89a2-3368-4f99-b31f-8737c0587a17', 2, 54, 'false', '5', 26, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (848, '116cdb2f-3d94-447c-9d60-874aeb24c1a6', 1, 49, 'false', '6', 18, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (849, '9cdd8f56-0829-4a16-b872-89ab0e46ff73', 1, 61, 'false', '5', 25, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (850, 'fbd68d80-761e-4379-b121-bf87e9359d44', 2, 48, 'false', '1', 19, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (851, '2a71d66c-15c4-4ce7-a941-fcbd8e258643', 1, 57, 'false', '4', 27, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (852, 'bd7b6325-3c74-4106-8abb-ffcff643e166', 1, 57, 'false', '3', 24, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (853, 'c8be726c-13c2-493b-870c-328afceb7825', 2, 56, 'false', '6', 26, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (854, '60f41779-b0f9-4c99-9ec9-da03d1d6a4f7', 2, 48, 'false', '6', 20, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (855, '53524eeb-8b92-4684-9533-7216dfe7ef28', 2, 52, 'false', '1', 20, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (856, '162f320b-0e7e-4cb5-a9b4-42a1ed7b9a5c', 1, 55, 'false', '6', 27, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (857, 'd063b430-e13d-48a6-a2ec-c69d9913c733', 0, 54, 'false', '1', 25, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (858, '5165a509-00a0-42ac-a33c-4493c6d4475c', 0, 66, 'false', '2', 21, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (859, 'fafbe7b3-ae0a-4198-a4bd-72b061872e87', 0, 70, 'false', '4', 25, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (860, 'c12833ac-7a6a-4b55-af4f-27b5734f821b', 0, 59, 'false', '3', 27, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (861, '659673ba-b7ae-4400-b7b9-fad2213ce9ad', 0, 66, 'false', '3', 25, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (862, 'a4d63a7f-0887-4bea-ba43-5d30710badcc', 0, 59, 'false', '1', 27, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (863, '3fe69648-1e9b-4edd-9573-d4c37c474868', 0, 68, 'false', '1', 21, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (864, '967b8894-8b1e-4115-ac15-40487d115894', 0, 63, 'false', '1', 25, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (865, 'b737cfdb-db5d-47d6-af28-c51bfeebd2fc', 0, 62, 'false', '3', 22, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (866, '7df10e9f-4089-4ff5-ad08-03e20af71f83', 0, 56, 'false', '3', 21, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (867, 'a531a607-4ee9-482c-9bce-4bfa6be25f72', 0, 68, 'false', '6', 22, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (868, '8c59ca3b-983f-4945-b480-90ba899a0e1a', 0, 57, 'false', '5', 21, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (869, '7ebaa22d-0bdb-4ed2-9f46-0cdc54ddd460', 0, 61, 'false', '1', 26, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (870, '69ae65f4-ef39-48ca-8fe2-25ea0de2df03', 0, 69, 'false', '3', 19, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (871, 'd2c06beb-c78d-4961-8c3d-34d75400e32c', 0, 63, 'false', '5', 24, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (872, '86d879ed-761a-4872-a3db-f85bf6769980', 0, 67, 'false', '6', 24, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (873, 'a75a233a-0c2c-45e6-900d-221894e88a36', 0, 59, 'false', '4', 27, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (874, 'c65b667d-77fc-4ec2-8896-bd34b392b33d', 0, 56, 'false', '1', 21, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (875, '03a3cca7-b4b7-44a0-bf92-13b35ff3a2d2', 0, 67, 'false', '4', 19, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (876, '469aec79-3f02-45f3-9ef2-6f1ca1c58150', 0, 59, 'false', '5', 23, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (877, 'd51b3a6c-1e8f-4b9a-9a2b-af826e429f9a', 0, 69, 'false', '6', 22, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (878, '2de06ee7-301d-47f5-a0bf-49bc45cc8e21', 0, 68, 'false', '5', 20, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (879, 'ee4b0438-5899-4ff1-8f97-94b9ceba2319', 0, 62, 'false', '4', 21, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (880, 'c1c16c36-5b57-44e4-940a-3bbe81053a6a', 0, 63, 'false', '4', 27, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (881, '27a6c8b2-ad8f-4c43-8834-dccdb763b3d3', 0, 70, 'false', '5', 26, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (882, '54c0a83b-fc3b-4005-ad3e-cb85789ce5fe', 0, 59, 'false', '3', 27, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (883, '3741e83f-b2f9-4ff7-b9ea-6c6930bb5456', 0, 50, 'false', '3', 22, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (884, 'c42b9226-b505-4602-ae28-fe4659fe9a63', 0, 60, 'false', '2', 27, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (885, 'e19a416a-48f0-46e5-a5b1-b9ba08ea5998', 0, 57, 'false', '4', 26, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (886, '7613dd7f-afc5-458c-b601-b86b50956185', 0, 55, 'false', '5', 21, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (887, 'c6249608-e1fa-446a-a687-df976650eb76', 0, 65, 'false', '1', 20, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (888, '2d316a9b-258c-4aa7-a929-f28b388d2ee5', 0, 52, 'false', '5', 16, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (889, '55db1437-d750-4642-b4df-6e8f46c90d6a', 0, 61, 'false', '3', 27, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (890, '4e47e7b4-0ec3-4e5d-b286-2453b73407ca', 0, 64, 'false', '6', 20, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (891, 'd291b558-4c07-4538-bc60-93bd6663b619', 0, 53, 'false', '4', 20, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (892, '852af4f5-3c56-4879-8804-6c502dca03c9', 0, 52, 'false', '4', 19, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (893, '2f20d71f-6c95-4f2b-8edf-6cbf64b91474', 0, 53, 'false', '1', 21, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (894, 'afdd33a4-315e-42f6-ba3c-4c8e982977f5', 0, 67, 'false', '1', 23, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (895, '507f51ba-602a-4721-9993-0eb5fc96dad8', 0, 63, 'false', '1', 24, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (896, 'c9103c29-662c-4fb1-ba11-bebf70bdbf5f', 0, 60, 'false', '2', 24, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (897, 'd9a99db3-544e-4e35-9d70-eb86438c986c', 0, 64, 'false', '3', 24, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (898, 'f6d3dd9e-50b2-496c-815e-224df158ad05', 0, 52, 'false', '3', 20, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (899, '286511a0-4215-4e78-95c0-91acb22ae4a8', 0, 50, 'false', '5', 18, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (900, '37ddc164-5417-4935-8c1d-15a39b8a9cba', 0, 70, 'false', '6', 26, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (901, '35b742ef-e08f-4801-8ace-597bb40161d9', 0, 69, 'false', '4', 21, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (902, 'db00dac2-f6da-4fd3-9fd7-8b65c2219a63', 0, 63, 'false', '5', 20, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (903, 'bfc830bc-f0cd-4506-b1d6-5fa96f100dda', 0, 57, 'false', '1', 26, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (904, '9b07844f-89c0-4ce0-8018-2ab34a5e3db8', 0, 68, 'false', '1', 21, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (905, '4265373a-9b9e-4a95-a65a-60ef6bc961f1', 0, 52, 'false', '2', 19, '2019-09-17 09:00:08', '2019-09-17 09:00:08');
INSERT INTO `signal_detec_test_parts` VALUES (906, '30719521-c69c-491b-a7ac-3bcb0bb32fc8', 0, 62, 'false', '3', 26, '2019-09-17 09:00:08', '2019-09-17 09:00:08');

-- ----------------------------
-- Table structure for signal_detec_test_to_any
-- ----------------------------
DROP TABLE IF EXISTS `signal_detec_test_to_any`;
CREATE TABLE `signal_detec_test_to_any`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` char(36) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `Signal_detec_test_uuid` char(36) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `row_uuid` char(36) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `type` varbinary(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 902 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of signal_detec_test_to_any
-- ----------------------------
INSERT INTO `signal_detec_test_to_any` VALUES (752, '9af8309c-6d52-45c6-828a-e26bd765550b', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '02887a7a-b789-4b10-acb5-a3ad92600747', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (753, 'a3425c11-b148-4088-a61a-355b8d478cad', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'c67219a6-461d-4460-ad43-818abd391375', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (754, 'e2990b94-5852-45e5-a435-8f18c67847e9', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '10af398d-28c1-4a77-9115-74ceb8b248f2', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (755, 'c9498260-d1a3-4f6b-9ae6-5f070052e7ee', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '433d3812-0d27-41f7-9b93-48d072667c4a', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (756, 'd8e4e344-f656-4c4e-957a-d5559820c8c4', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '85723ea8-a271-416b-9600-ffa680f226d5', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (757, '9693c512-65ab-4acb-8f93-adacab39fe3b', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '9ba7fcff-544c-4dad-824f-a76de4623486', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (758, 'f8789f29-1d46-4881-8c76-04b87450cc08', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'e000fda4-dc1b-410d-9d8d-02833a95661c', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (759, 'b05758c3-c1de-46de-896f-26e179e651e8', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '4315d264-0a36-4fc6-8dd8-24902307e1cf', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (760, '3a1d9cab-e90a-4a4e-be82-d931da3a6034', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'a4eee528-8174-4d09-a3fc-d2529b959df8', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (761, '71c4fc17-cbd9-410c-826b-86a33ca13786', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '28675cb3-0f4a-4ce3-ab37-8e32be265091', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (762, 'ef75a530-a4ae-4efc-99b0-8b8e1e7fe470', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '26892409-a2ec-48ba-9f57-126098d84fbe', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (763, '3e1918ee-cbbd-46e6-9764-573edbcd41db', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'ef5cc581-55e8-418e-89e2-612d9a168732', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (764, 'cd6e2233-918a-41c9-8ea5-55da8b083545', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '4ad6dee2-985f-49cd-a6a1-703b4fab279b', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (765, 'fb692bc7-21a7-4af6-a478-dff0d1dd573c', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '3930b45a-cabe-41bc-b0ad-865d77ce1956', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (766, '4733a27f-edfc-4be7-88eb-f885bcba51f8', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '4ea5d45f-7dfd-4340-a945-9ec7307abb73', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (767, '2f05b1f2-6922-4a51-bf53-bf5f6be04dcc', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '59b8edd7-60d9-48f0-b124-553c7e410573', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (768, 'df7a122b-234f-497a-a59c-6048a6229849', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'e5aa1616-0f35-4a61-ad6a-c7a308cbfa02', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (769, 'a9f4582d-62bb-4981-adb8-c37f4affc913', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '6d706135-601d-4f46-8c8d-b5cd1a66f90c', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (770, 'f00b07ce-6a77-4770-ad8b-5231dbe8a58f', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '506b3f31-f310-424d-99a9-38246158a9bd', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (771, '1f78a0ba-8663-4abf-94b6-15a4d242df7d', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '9f966e2a-9458-4432-abf9-45498c270f87', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (772, '1e88c831-ff9d-43c9-9e3e-05dddda08242', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'bb93db12-35d3-4894-a38e-5b7fa81153c5', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (773, 'fbaf521a-d2f9-4b11-8586-7c7add191fb3', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'f4864439-a8c4-4e2e-96b7-c16e3fb1abcd', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (774, '2add3af3-24a7-4987-819c-e444a8c51d5f', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'e123ea6c-b212-4c3c-b847-213b4089e92f', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (775, 'e4af7fd1-2620-4f9b-aa6a-b4a9cbd97c7a', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '5a2438c3-ed5d-4cc7-a642-60ccb7ce5489', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (776, '0eb79220-82a2-4639-b574-a5db4d880e49', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '181d5a58-80f7-4c39-b063-be412e0cc762', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (777, '01b28781-89d5-40a1-9dfa-5b30622cc250', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '7d79cb38-7ce8-4507-8558-5f455e132333', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (778, '71581f7a-0a11-4508-84b2-6e2ee93a447c', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '86e16d9c-9d8d-4155-9d15-3dbeb3ad585a', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (779, 'e4a72cd6-21b3-4a65-95c0-43bf6c32c152', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '0a5417ff-047e-4c34-b1d7-ee563257e776', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (780, '75ea2629-af97-4f72-8479-dfda01a5e9dd', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '3f6054d7-0eaa-4018-944d-47bd51fad36b', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (781, 'ec2509e7-fba1-4f88-ac96-8d5bbef2627d', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '473240cd-c8b1-424d-a80d-5dc57420a716', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (782, 'e2a342d2-1599-4b2e-abd4-f2600121a738', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'bfa3ba80-d148-472f-ac16-547f9294aea2', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (783, '526e49c1-3c0e-4b55-898b-a989bfb3ee9e', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '4e9b328c-b28e-40dc-b6f5-e56460cae9f5', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (784, '02492e12-7ad9-4aa0-80ef-edfe99799639', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '95e7f176-265d-41d6-963e-bd7533a5a6aa', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (785, 'a01e5eea-1810-4783-8037-259592657645', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '35ffbda1-368a-4b01-9240-a810a717a2bf', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (786, 'c2701a7e-7ce4-4eb1-a580-038b9f99cb65', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '6d134fc1-9e0b-425d-bb67-121113784571', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (787, '396ae3a6-86db-4b18-81eb-106f6486e4a5', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '72521cad-267d-4049-8807-2a4f18560c79', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (788, '8e2f4bd7-8402-4169-9916-8de76fb22fd6', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '8ab8375a-002e-4ec9-9222-7b2bf3a98b73', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (789, 'ad0257fe-bea7-4973-9a39-a244d8cff34a', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '694f6627-38fc-4b8c-a9b9-119d37749eea', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (790, '57622280-3022-4d61-9b05-61fe80e54f63', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'bb959071-efc6-4765-a227-5d171cfab42b', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (791, 'fe173d5d-5651-4541-813d-375b06a4e32b', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'be6e62a9-4852-4c7d-81a2-ecd6cb18e235', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (792, '71994332-9991-4dfb-ad20-6f3a0cf20046', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'f2c6d0ae-af1d-4068-9996-50404418422b', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (793, 'c935b0ac-326d-4202-b681-cefd1a1eaacb', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '23845aa9-dd3b-47a5-b976-f03a45ab1cc2', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (794, 'dce5e165-a5ad-4c8f-bbd5-77a185a0f741', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '1918c124-321a-4236-8605-7401f6a4b6ce', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (795, '3d77ed69-79d5-430d-9906-87243487fe2e', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '39698d12-d022-44d1-85fa-2019c3c04c43', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (796, '4aa78ca4-b130-4e06-88bd-7607bd206a82', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '301beb5f-253d-4af2-ac11-4abaef1f86fd', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (797, 'e570585e-1213-4282-9604-f694df724311', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '969d8ae6-075d-4093-b32c-bb282f48de98', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (798, '30233a4e-dcd8-4f7d-a0bc-a116c563e399', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'd94e876e-58d4-4f29-a545-bea1cfea8c85', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (799, 'f9d376ed-1eea-444f-afee-e12f94678159', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'eab518da-1276-4f8d-9574-28e0c3009795', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (800, 'f04bd3f1-61b6-4c68-885f-1555991b5b26', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '2e506095-18e8-43dc-bb3e-fc8c1c9e76c0', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (801, 'bd058993-e51c-4239-b0cc-e595c3c6b430', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '381b55bf-0a54-47eb-b12c-4f61fab97204', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (802, 'ba1b18b4-07b5-445e-aad9-27604553b480', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '00389698-4544-4e44-bf14-768588d1c95f', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (803, '48668fcf-c128-4601-bf29-c860da447589', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '87b01470-e4fe-4b9f-a9dc-c1c9f8301c84', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (804, 'c436126d-c545-491a-8f44-a9bf2f69b4f6', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '7caf159f-d8df-4c95-a28c-3e42d5b34fb0', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (805, '617c91a7-0a45-4312-abb3-ca30371999d0', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '1ee77f54-4740-4def-b7cd-da55cb5aac7a', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (806, '184e3d03-e111-423f-a502-68289abcbe68', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'eb5c2446-3d86-464e-ae26-1d0960d6d786', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (807, 'c1c8043d-d933-4494-887b-d438744bb1a9', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'fd9cb278-c7b1-40d5-9d8b-f268598e995f', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (808, 'f7515d3f-f9d9-4c38-a72e-d5c730d2831f', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '5f0e8b72-ac2d-47e4-8f4f-35837ec77985', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (809, 'f47fed03-858e-45ed-a3f3-facb572e9427', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '286c4322-7791-4519-b652-f6d0bc015ccc', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (810, '54bf1324-808d-43c7-b44c-3eafbbb3b765', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '709f6fbf-6a6d-4cc5-a6de-5e03e2c10b19', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (811, '258c26b5-1f62-48f6-8d6b-424a29824738', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '5602be2e-84d1-4d42-9ec9-e567c8fcaae8', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (812, '38bc06c8-e10c-4675-92d7-22cf02c06c2d', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'e09d6e31-9563-429b-958c-d922f443aeb8', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (813, '36015d8b-f37c-4d8c-a85f-1d835bb7a3f9', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '3ab3757b-877f-439e-822e-124e41e1f1db', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (814, '9720ee61-a46d-43f8-b7b7-aadb3889b8a6', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '10d5231a-02f9-4cf5-b92b-aca1ba7307b5', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (815, '8a2865c7-f5b0-4b50-9035-a5bda4e5aaa2', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'cba179bc-413b-4087-a548-b55e2c814b1a', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (816, 'e92a91d0-e1ba-4d1d-94da-782233c2c44e', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '4f28881f-8a23-4a7e-b283-5db297999dbb', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (817, '9399e0f5-a7b5-45e1-848c-438125e47827', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'a2e8d5ad-7332-4778-ac93-27ab18e6e7a6', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (818, '475f47d3-6def-45d6-9708-a682acb92876', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '68446d1f-9d45-4d3c-99a0-d9f3165be288', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (819, '56d4dd8f-4b86-483a-8283-f82357756c67', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'c768e5f8-2917-4554-bcea-3256fae144fc', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (820, '07f37596-372f-4126-a09f-3b60d28bb7fa', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '1dd75d16-413e-4fbf-8ee1-fa9184daf938', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (821, '37394fdc-ddee-4508-835e-8539bd73980f', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '19d9462d-2d82-43ca-a41f-c85c7b83c169', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (822, '38782a51-7765-40ae-b394-7437249dea51', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '89c9df7b-6679-4037-8272-c4ca4ead893f', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (823, '6e9a9182-ff18-4ca6-bed9-acea6773fbd3', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '30494ad0-7d3e-45a9-a0ed-e929698b7ac4', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (824, 'bac1fa2c-de30-4caf-b8c9-b3d140c4ea61', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '551a5e17-d0ab-4d24-b422-50379bb0dca0', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (825, '8907d951-2050-4d9f-828b-800b9862d0b7', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'b44ba04d-13a8-41f8-a0db-3e83df18e330', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (826, '2bdaff01-e122-466c-95e1-239f7d4bf4d1', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'a34bedc2-882f-4c0a-9ed2-345819b11a3c', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (827, 'de329c9c-4224-4654-b8f9-b2eef6162e1b', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '44e98e57-85fb-4b16-bfff-0e5ee5f41313', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (828, 'c08235af-7d61-4092-8e51-9ff0c431785c', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '8e6b1fb7-26c6-478f-b463-f26b0b528296', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (829, '0494e8b2-65dd-4b72-a1a9-9778830fbfbe', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '108f969e-b879-467a-948d-8a9f5a9177d3', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (830, '987fa387-f2ff-4aa1-ad90-de3bde6cc2fc', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '69ccf9b0-c9f6-4b35-8989-0be36dc02514', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (831, 'e471ad5f-c47f-4c5d-aa14-3742ff42c9fe', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'a96e7a9f-98c0-48ac-90a8-f38bfca00a6c', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (832, 'd80b856f-8a1a-499a-8ee1-20d16f4f6631', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'ebd53dca-3005-40f3-896b-2772b8c640bb', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (833, 'edf57822-b04b-4a3c-a1c6-62711d2af443', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '3619de45-4d05-4f07-9528-803fe4e6942c', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (834, '42bf1b79-2fea-4f1b-88b1-f8ff5c8793ed', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'f9ca1a5c-652c-4f09-9e46-e70a76cc320d', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (835, 'a97268f0-ceff-4245-9482-17e5511dcb0e', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '29e1ecd2-56c1-4a80-9da2-7bfe958ca9d5', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (836, '3cb36da0-0f8e-4a43-a8f6-02dc2c2206ba', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'b1be0e93-564e-4e4d-9421-04458a6dfc99', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (837, '35dc677a-c22a-4e2c-bc6b-e240d7f0513c', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '7a163710-748f-4d14-b625-f9498ca44cd2', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (838, 'e339400f-eff2-422f-bf7e-10da0eca9233', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'e0f80d43-a6ec-49ad-849a-3c9f8f6106b1', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (839, 'ba22cd6e-48ca-4b47-9ab7-3c9ac61f45a9', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'baffb439-1a99-43ea-84d1-7c830f0828b1', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (840, 'bd64965d-98ec-4601-b55c-1fe74602072b', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'a5f12868-6311-4c55-9cb4-292fc3d95eca', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (841, '77e227e1-867b-46ab-92fe-d8fd2869cb16', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '721d12a6-5865-4fe6-a785-a9e75f8aad0d', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (842, 'cbd5114f-2fa5-4c2e-970f-e72ab4b76cae', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '540d89a2-3368-4f99-b31f-8737c0587a17', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (843, 'e2e96aa9-8dee-4fc0-98e8-bddcee105686', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '116cdb2f-3d94-447c-9d60-874aeb24c1a6', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (844, 'cc9b2a0e-bb75-4ade-b68b-15bea4180a1f', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '9cdd8f56-0829-4a16-b872-89ab0e46ff73', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (845, '3a4bde7a-7f81-4837-81ec-32e8b3748a89', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'fbd68d80-761e-4379-b121-bf87e9359d44', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (846, '363ffeea-7c4e-4bff-84ef-e0074175456f', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '2a71d66c-15c4-4ce7-a941-fcbd8e258643', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (847, '11edf459-6dd0-40f7-9b73-adfcb1f1aad7', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'bd7b6325-3c74-4106-8abb-ffcff643e166', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (848, 'bcb84be4-f4bf-4328-a542-34e4940357d2', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'c8be726c-13c2-493b-870c-328afceb7825', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (849, '543e8f4a-b310-45c6-ad07-11ff684eb1dc', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '60f41779-b0f9-4c99-9ec9-da03d1d6a4f7', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (850, '06cb17f5-d67d-41e9-a97f-4d3ead8e0082', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '53524eeb-8b92-4684-9533-7216dfe7ef28', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (851, '29f5e79b-0400-49ad-86f3-f81b6c890599', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '162f320b-0e7e-4cb5-a9b4-42a1ed7b9a5c', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (852, '0281789e-2067-4ca2-b1bc-14cf391a75b1', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'd063b430-e13d-48a6-a2ec-c69d9913c733', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (853, 'aa7a263d-3287-4803-82b6-b1f3a45b290a', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '5165a509-00a0-42ac-a33c-4493c6d4475c', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (854, '85a4899b-f418-4014-9fff-fc1ffb22f9df', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'fafbe7b3-ae0a-4198-a4bd-72b061872e87', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (855, '8afd0ef0-3139-4538-800e-0b91c3d9a142', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'c12833ac-7a6a-4b55-af4f-27b5734f821b', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (856, '300cc9fe-aad4-44ac-8c7f-c8325ff4d9a3', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '659673ba-b7ae-4400-b7b9-fad2213ce9ad', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (857, '623e4fa4-98e9-487f-8d98-a8bca91d0875', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'a4d63a7f-0887-4bea-ba43-5d30710badcc', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (858, '9028de53-0ade-4837-8d13-86f737dba9c0', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '3fe69648-1e9b-4edd-9573-d4c37c474868', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (859, 'd44a8ed8-fab7-4d89-a3f2-b47c8a9e7a92', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '967b8894-8b1e-4115-ac15-40487d115894', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (860, 'cb2daba4-6479-4bb1-a88c-8848be63c768', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'b737cfdb-db5d-47d6-af28-c51bfeebd2fc', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (861, '6773364b-521f-415c-aca2-5a4648c6496e', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '7df10e9f-4089-4ff5-ad08-03e20af71f83', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (862, '5dcdcbef-42b9-4a46-9e49-ee6fc6c2e4f9', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'a531a607-4ee9-482c-9bce-4bfa6be25f72', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (863, '5dffb072-73bf-43e0-8946-7fef24941273', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '8c59ca3b-983f-4945-b480-90ba899a0e1a', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (864, 'bca58740-dabe-4b47-b488-1e5f0badc09b', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '7ebaa22d-0bdb-4ed2-9f46-0cdc54ddd460', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (865, '423c9c27-1754-4667-b47f-bc2ee09a05a7', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '69ae65f4-ef39-48ca-8fe2-25ea0de2df03', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (866, 'c85bfe90-4d30-401b-89f7-b27a3408ecb3', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'd2c06beb-c78d-4961-8c3d-34d75400e32c', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (867, '7cec1fc8-d39e-4699-ac38-482e92ec72c5', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '86d879ed-761a-4872-a3db-f85bf6769980', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (868, '9c0d08a6-a718-4730-9a83-7a328cea077c', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'a75a233a-0c2c-45e6-900d-221894e88a36', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (869, '374646ea-e43f-436b-bfa6-a401315f9f15', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'c65b667d-77fc-4ec2-8896-bd34b392b33d', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (870, '0092c912-94b6-4c65-b6c9-cadf0517606b', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '03a3cca7-b4b7-44a0-bf92-13b35ff3a2d2', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (871, '2e73c96c-1e9b-4ed7-b4af-4513916994b5', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '469aec79-3f02-45f3-9ef2-6f1ca1c58150', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (872, '27918518-fb6c-4c37-8513-4170b2f97d1e', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'd51b3a6c-1e8f-4b9a-9a2b-af826e429f9a', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (873, '85944703-2da1-4be6-8a24-a5bca43e1a2e', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '2de06ee7-301d-47f5-a0bf-49bc45cc8e21', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (874, '3c611987-d10a-4b94-a1f4-a4bd62c019aa', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'ee4b0438-5899-4ff1-8f97-94b9ceba2319', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (875, '0cefca4d-ff1e-4e97-90e9-27d5f3d8fc2b', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'c1c16c36-5b57-44e4-940a-3bbe81053a6a', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (876, 'e029518b-661a-45cc-b6a1-c7e541e6797f', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '27a6c8b2-ad8f-4c43-8834-dccdb763b3d3', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (877, '9d98d500-6faa-4ec0-aa95-0c13bfc0e550', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '54c0a83b-fc3b-4005-ad3e-cb85789ce5fe', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (878, 'bde1d3dc-6aea-4b18-a90a-af39180b42fb', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '3741e83f-b2f9-4ff7-b9ea-6c6930bb5456', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (879, '30ab4769-2d14-4bbf-858d-462c0d267f47', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'c42b9226-b505-4602-ae28-fe4659fe9a63', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (880, 'bdf26ba1-a93e-4ed7-a5db-86f4fa0c0316', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'e19a416a-48f0-46e5-a5b1-b9ba08ea5998', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (881, '9e47c203-e3fa-4117-8840-a86aaa8d8409', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '7613dd7f-afc5-458c-b601-b86b50956185', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (882, '150ba4eb-f305-4a05-8c85-3a84ac5a5bcb', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'c6249608-e1fa-446a-a687-df976650eb76', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (883, '31f78b0c-47af-4466-8864-8da578c01dd4', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '2d316a9b-258c-4aa7-a929-f28b388d2ee5', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (884, 'a446ad75-46dc-484e-9d4f-bee62f628b73', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '55db1437-d750-4642-b4df-6e8f46c90d6a', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (885, '64acb016-5126-47d4-922a-e10dc27ff23f', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '4e47e7b4-0ec3-4e5d-b286-2453b73407ca', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (886, 'ec2d6e4a-ab9d-4368-87c7-3724c81932b4', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'd291b558-4c07-4538-bc60-93bd6663b619', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (887, 'f0111a76-1638-4c88-9c30-3807a419d732', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '852af4f5-3c56-4879-8804-6c502dca03c9', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (888, '5d7e5e58-98c6-4ab8-ad65-9e6b756bc53d', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '2f20d71f-6c95-4f2b-8edf-6cbf64b91474', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (889, '0bb88edf-fde9-4f74-a7fa-cd2b3137e636', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'afdd33a4-315e-42f6-ba3c-4c8e982977f5', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (890, '9695ebf0-10d5-4026-91ed-585de6afd0fe', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '507f51ba-602a-4721-9993-0eb5fc96dad8', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (891, '70a42ac7-96e0-4100-b322-5c1879482de5', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'c9103c29-662c-4fb1-ba11-bebf70bdbf5f', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (892, 'cd100043-b5b8-4740-a6b7-e849b1acf251', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'd9a99db3-544e-4e35-9d70-eb86438c986c', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (893, 'fb189751-e7b3-49b7-990f-1f73a6d7d1fa', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'f6d3dd9e-50b2-496c-815e-224df158ad05', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (894, 'c5609821-a91d-41b4-8807-5113816764c0', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '286511a0-4215-4e78-95c0-91acb22ae4a8', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (895, 'af400a70-b290-4674-bd31-e09d1b863389', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '37ddc164-5417-4935-8c1d-15a39b8a9cba', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (896, '59a81c8d-fce1-4f88-9175-eec87b48e097', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '35b742ef-e08f-4801-8ace-597bb40161d9', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (897, '6512e7eb-4f86-4a4a-93be-79214e83a809', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'db00dac2-f6da-4fd3-9fd7-8b65c2219a63', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (898, '53e0802a-2a3f-43fa-b562-83d217abdbfa', '0e284572-653f-42ee-8bfe-f87fcbcf7740', 'bfc830bc-f0cd-4506-b1d6-5fa96f100dda', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (899, '616469d2-6873-4420-bcdc-8a8fa84167a4', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '9b07844f-89c0-4ce0-8018-2ab34a5e3db8', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (900, '912d21b6-b934-469d-b970-bb91b8190165', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '4265373a-9b9e-4a95-a65a-60ef6bc961f1', NULL);
INSERT INTO `signal_detec_test_to_any` VALUES (901, 'eddf9a2a-7f0f-4b00-99b1-ed93577c4d3c', '0e284572-653f-42ee-8bfe-f87fcbcf7740', '30719521-c69c-491b-a7ac-3bcb0bb32fc8', NULL);

-- ----------------------------
-- Table structure for signal_detec_test_translations
-- ----------------------------
DROP TABLE IF EXISTS `signal_detec_test_translations`;
CREATE TABLE `signal_detec_test_translations`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `desc` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `locale` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `Signal_detec_test_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of signal_detec_test_translations
-- ----------------------------
INSERT INTO `signal_detec_test_translations` VALUES (1, 'first', 'first desc', 'ka', '1');

-- ----------------------------
-- Table structure for strup_efeqt_test
-- ----------------------------
DROP TABLE IF EXISTS `strup_efeqt_test`;
CREATE TABLE `strup_efeqt_test`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` char(36) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `raodenoba` int(11) NULL DEFAULT NULL,
  `swori` int(11) NULL DEFAULT NULL,
  `neitraluri` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of strup_efeqt_test
-- ----------------------------
INSERT INTO `strup_efeqt_test` VALUES (2, '746d0933-5849-4d47-bcf5-91af7c01d0fe', 150, 50, 50, '2019-09-06 10:35:36', '2019-09-06 10:35:36');

-- ----------------------------
-- Table structure for strup_efeqt_test_parts
-- ----------------------------
DROP TABLE IF EXISTS `strup_efeqt_test_parts`;
CREATE TABLE `strup_efeqt_test_parts`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` char(36) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `color` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `text` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `kebord` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 151 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of strup_efeqt_test_parts
-- ----------------------------
INSERT INTO `strup_efeqt_test_parts` VALUES (1, '3996e354-e57e-444d-999f-7794ee2114a2', '#ffff00', 'ყვითელი', 'y', '2019-09-06 12:34:36', '2019-09-06 12:34:36');
INSERT INTO `strup_efeqt_test_parts` VALUES (2, 'e5dda1b5-7f2f-40d9-b8e0-78d2ec068421', '#ff0000', 'წითელი', 'w', '2019-09-06 12:34:36', '2019-09-06 12:34:36');
INSERT INTO `strup_efeqt_test_parts` VALUES (3, '69f6e25c-c178-4654-8a3e-62abed6635ac', '#0000ff', 'ლურჯი', 'l', '2019-09-06 12:34:36', '2019-09-06 12:34:36');
INSERT INTO `strup_efeqt_test_parts` VALUES (4, 'f5210dad-c6ce-47a6-ad1a-ccccc515a4ff', '#009933', 'მწვანე', 'm', '2019-09-06 12:34:36', '2019-09-06 12:34:36');
INSERT INTO `strup_efeqt_test_parts` VALUES (5, '4fc23a9b-234d-4cc3-b1de-2bfe595ff088', '#009933', 'მწვანე', 'm', '2019-09-06 12:34:36', '2019-09-06 12:34:36');
INSERT INTO `strup_efeqt_test_parts` VALUES (6, 'edf06064-7f15-49cd-a4e1-27ab6330f2ba', '#ff0000', 'წითელი', 'w', '2019-09-06 12:34:36', '2019-09-06 12:34:36');
INSERT INTO `strup_efeqt_test_parts` VALUES (7, 'd5b4cfe4-302c-434f-8c13-54d0dad270cc', '#009933', 'მწვანე', 'm', '2019-09-06 12:34:36', '2019-09-06 12:34:36');
INSERT INTO `strup_efeqt_test_parts` VALUES (8, 'f137a526-837d-432f-a559-0ca740584544', '#ffff00', 'ყვითელი', 'y', '2019-09-06 12:34:36', '2019-09-06 12:34:36');
INSERT INTO `strup_efeqt_test_parts` VALUES (9, '5caabb69-c000-40aa-ad56-246fc2896cca', '#ff0000', 'წითელი', 'w', '2019-09-06 12:34:36', '2019-09-06 12:34:36');
INSERT INTO `strup_efeqt_test_parts` VALUES (10, 'bd87c763-7805-4259-bf03-0ac4d1ea1d1a', '#ff0000', 'წითელი', 'w', '2019-09-06 12:34:36', '2019-09-06 12:34:36');
INSERT INTO `strup_efeqt_test_parts` VALUES (11, '78d98e05-08c1-42f7-ad82-b210b386391b', '#ffff00', 'ყვითელი', 'y', '2019-09-06 12:34:36', '2019-09-06 12:34:36');
INSERT INTO `strup_efeqt_test_parts` VALUES (12, '83b6d9a2-750b-46e7-99bb-17aeb976db7f', '#0000ff', 'ლურჯი', 'l', '2019-09-06 12:34:36', '2019-09-06 12:34:36');
INSERT INTO `strup_efeqt_test_parts` VALUES (13, 'bccf7c66-c9b3-4f25-8602-1cbb3cf9b974', '#009933', 'მწვანე', 'm', '2019-09-06 12:34:36', '2019-09-06 12:34:36');
INSERT INTO `strup_efeqt_test_parts` VALUES (14, 'e1542f69-f7ef-43db-a19b-6cd469bce121', '#ffff00', 'ყვითელი', 'y', '2019-09-06 12:34:36', '2019-09-06 12:34:36');
INSERT INTO `strup_efeqt_test_parts` VALUES (15, 'ac2216bb-a7bf-425d-8557-b4ff041ca94c', '#0000ff', 'ლურჯი', 'l', '2019-09-06 12:34:36', '2019-09-06 12:34:36');
INSERT INTO `strup_efeqt_test_parts` VALUES (16, '4c4843a8-8305-419e-b3dd-32e5debdcbdb', '#009933', 'მწვანე', 'm', '2019-09-06 12:34:36', '2019-09-06 12:34:36');
INSERT INTO `strup_efeqt_test_parts` VALUES (17, '19b02d1b-dbcf-487a-9f94-5948f3294ac1', '#009933', 'მწვანე', 'm', '2019-09-06 12:34:36', '2019-09-06 12:34:36');
INSERT INTO `strup_efeqt_test_parts` VALUES (18, 'a5513dc1-2ae2-4f78-8b0a-00d68de4e03a', '#ff0000', 'წითელი', 'w', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (19, 'e4a89866-3a2b-479b-80ef-549fa4a601ac', '#0000ff', 'ლურჯი', 'l', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (20, '2e5f7e5a-5488-4aac-b198-7ea9d7d0a0c5', '#ff0000', 'წითელი', 'w', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (21, '4f8ee8d5-9756-4da8-b123-1ab95eb21a6b', '#ffff00', 'ყვითელი', 'y', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (22, 'eef9dea6-d90c-427e-8040-5f5897eb3319', '#ffff00', 'ყვითელი', 'y', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (23, '15127c72-b569-49a7-a246-8e32f9f58504', '#009933', 'მწვანე', 'm', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (24, '9d39e959-69e9-4167-80db-7a50828142aa', '#0000ff', 'ლურჯი', 'l', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (25, '5d9a174e-48e8-4583-8a9c-3dbc5d84f0d5', '#ffff00', 'ყვითელი', 'y', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (26, '7e5eb7fc-1d2d-44fb-a8fd-72a7105c647f', '#ff0000', 'წითელი', 'w', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (27, 'dc004b78-d920-4aaf-ad36-acc1bc92bc06', '#ffff00', 'ყვითელი', 'y', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (28, 'f6d3e049-c06b-49c8-9693-4de0eb1f98d7', '#0000ff', 'ლურჯი', 'l', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (29, 'd001398c-9ae3-4033-ab47-bc58638cdedc', '#ffff00', 'ყვითელი', 'y', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (30, 'de749b74-cb66-4a9c-b8fc-d90193fc21e9', '#ff0000', 'წითელი', 'w', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (31, 'c047ca2a-4081-498b-90a6-efdde2d93dba', '#ff0000', 'წითელი', 'w', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (32, 'b9337b38-a059-4aca-8a48-8790370d81f2', '#009933', 'მწვანე', 'm', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (33, 'c29aed0a-c189-4598-aaa8-fe841b8becbd', '#009933', 'მწვანე', 'm', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (34, 'b3f8688f-f2cc-4a30-be2a-d1825729d09f', '#ff0000', 'წითელი', 'w', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (35, '2c0fef29-70d8-4c80-b349-2b69204f4c44', '#009933', 'მწვანე', 'm', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (36, '3749590b-4a07-4a0b-83c0-ec7f2ca4b990', '#009933', 'მწვანე', 'm', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (37, '43ad6b18-60ba-4bbf-a09a-ba4d2bcfe4c6', '#0000ff', 'ლურჯი', 'l', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (38, '92398a13-6992-4a5f-8528-a71b9e2ed92d', '#ffff00', 'ყვითელი', 'y', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (39, 'efa05dc9-48d6-4313-bfab-7e468f782d0a', '#ffff00', 'ყვითელი', 'y', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (40, '08af5a55-534b-48fa-b81a-110afac5f5c1', '#ffff00', 'ყვითელი', 'y', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (41, '4f4f5340-0494-4057-af2e-086f889b98b0', '#009933', 'მწვანე', 'm', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (42, 'cb4c2619-f32d-4bb6-8b1a-0c3b0c0167d5', '#ffff00', 'ყვითელი', 'y', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (43, '03649072-91fe-4669-99cb-77a64afb36a5', '#009933', 'მწვანე', 'm', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (44, '1d871ec4-6030-4990-b3a6-314c4438e8ec', '#ff0000', 'წითელი', 'w', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (45, '1aef8e9d-f589-4810-9f5c-88baaf7060d7', '#009933', 'მწვანე', 'm', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (46, 'ad1ebf26-b3c5-42c3-a593-a357a4a0c458', '#0000ff', 'ლურჯი', 'l', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (47, '2cd32e98-f489-4dcb-8a67-71ce161f5e06', '#0000ff', 'ლურჯი', 'l', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (48, '96f725bc-bd86-4d06-adaf-ee44be3e28bd', '#009933', 'მწვანე', 'm', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (49, '03944857-9a48-427f-8093-b55ac1147941', '#009933', 'მწვანე', 'm', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (50, 'd80e936f-61d3-4be5-be4b-4db3379f8bd5', '#009933', 'მწვანე', 'm', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (51, '8c68b8f4-1eb2-44f0-a290-5fc9b68d2140', '#ffff00', 'სკამი', 'y', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (52, '83def758-f5ee-4b4f-9296-288d95f02254', '#0000ff', 'ჩანთა', 'l', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (53, '00cc63b2-74ea-4072-89e1-96e3d17877f1', '#ff0000', 'ბროშურა', 'w', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (54, '751936b7-4540-4f82-9cbc-d3075e99083d', '#0000ff', 'შუშა', 'l', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (55, '4ba34a7e-5b90-4a5a-9713-66c730387376', '#009933', 'ბურთი', 'm', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (56, '35d4cd34-7e0e-4763-bcf8-8cee32b434d9', '#009933', 'თასმა', 'm', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (57, '12f777c2-e06e-4ae1-96ec-74679d4d0161', '#0000ff', 'ზღვა', 'l', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (58, '93d615c6-505a-4aa5-add9-41d9cf93c41a', '#ffff00', 'ჯოხი', 'y', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (59, '749395e0-3a13-4d3f-a2c7-ed953212dcb8', '#ffff00', 'აგური', 'y', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (60, '83c5c460-0a50-4ef6-9541-bf961f3fbf2b', '#ff0000', 'გასაღები', 'w', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (61, 'a4d28db9-005e-42d3-bc8a-7ea68cf0bf9c', '#ff0000', 'ბადე', 'w', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (62, '1830a5bc-9d37-4847-81ad-7681469da9d3', '#ff0000', 'დოქი', 'w', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (63, 'b659e901-8149-4828-aef0-58c9a50de3d2', '#009933', 'სათვალე', 'm', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (64, '41f958a4-2970-4bd3-9608-eac4951a88a5', '#ffff00', 'მაისური', 'y', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (65, '8852700d-245b-4b07-b534-cfdee5aa6449', '#009933', 'კიბე', 'm', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (66, '68e3c1c1-d520-4570-97bb-8d1a9c7bcbce', '#009933', 'გასაღები', 'm', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (67, '98068084-f65e-41d8-a5c1-1ed5a15f183b', '#009933', 'იატაკი', 'm', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (68, 'df606769-2d1d-4ebb-9db2-d7326e342600', '#ff0000', 'შარვალი', 'w', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (69, '8ab82c8c-e112-4a9c-b518-a043a0ca212d', '#ffff00', 'კარი', 'y', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (70, 'dbe3d25d-1de5-4dac-b62a-e102401a9f65', '#009933', 'პიჯაკი', 'm', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (71, '18007e2f-f045-451a-8237-d7c91e93609f', '#ff0000', 'ბორბალი', 'w', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (72, '6a579dfc-aaae-4a6a-851b-782b7f2ec582', '#0000ff', 'ჯოხი', 'l', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (73, 'f1006e11-68b1-4dee-84ff-c62cec9431d8', '#009933', 'გასაღები', 'm', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (74, 'd97d352c-7c53-4418-a451-087a6f042b1a', '#ffff00', 'ბურთი', 'y', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (75, 'f16d35b3-f64d-4893-94c2-3d44e8823717', '#009933', 'ბურთი', 'm', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (76, 'e4a63e9e-c825-475e-8631-f4be35737cc5', '#0000ff', 'ბოძი', 'l', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (77, '6aee1dbf-74db-48f9-b8a8-a18db07b75ed', '#ff0000', 'ლარნაკი', 'w', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (78, 'bb17fa60-7500-4f55-bd38-78e564e8b0ee', '#ff0000', 'სკამი', 'w', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (79, '486a253c-8d3a-4b83-98cb-bb7ef530ef61', '#ff0000', 'კარი', 'w', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (80, '51da1c27-aab1-42d0-9224-9954b3e250f0', '#009933', 'კალამი', 'm', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (81, 'fdcd4513-2152-4dee-9ec8-5da095218d83', '#009933', 'სკამი', 'm', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (82, 'aaee213a-150b-4009-bfab-9dcca9cc6e38', '#0000ff', 'სათვალე', 'l', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (83, 'c6e3596c-b114-457d-b72d-4be9c819c62b', '#0000ff', 'ქვა', 'l', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (84, 'e9e840fc-08e9-4543-9d88-29bacd74ad87', '#009933', 'ქოლგა', 'm', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (85, 'ac077e77-9774-498d-9d0b-7ce284472cfb', '#009933', 'ქვა', 'm', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (86, '0610c176-a305-4aa7-a967-37a490b772f8', '#ff0000', 'კალამი', 'w', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (87, '07ed82ce-758a-4bc0-b86a-0f1cb198b12a', '#ff0000', 'საინი', 'w', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (88, '663c8c09-1cd8-4cdf-b18e-1ede4130a456', '#ff0000', 'მაისური', 'w', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (89, 'e3427312-bd55-4643-acfe-70a8247e6916', '#ff0000', 'ღილი', 'w', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (90, '07791df5-5f6a-4c94-adfc-8c07e5d2f025', '#ff0000', 'გასაღები', 'w', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (91, 'f9d53c5a-a73c-4270-b7cb-b6efef9ec74a', '#ffff00', 'ბურთი', 'y', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (92, '9532c3d7-1cae-4e61-b2cf-c418cc5aacc7', '#ff0000', 'გაზეთი', 'w', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (93, '14360474-5a84-4c58-8fb0-51b2da2821aa', '#0000ff', 'ჩანთა', 'l', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (94, '3c61a16a-8dd6-4a87-8b62-164c3d86d4a0', '#009933', 'დოქი', 'm', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (95, '136bd56e-4937-4ffb-95ff-50cf6e2dcdb5', '#ffff00', 'გემი', 'y', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (96, 'e4604503-d303-4678-8c21-4b475f1f307b', '#0000ff', 'ბორბალი', 'l', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (97, 'b890d26a-f02e-4d1a-8b21-e38803e679bb', '#ffff00', 'აბრა', 'y', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (98, 'fdd39fb4-a1a0-4f1d-9028-539644b8bdf4', '#0000ff', 'ჭერი', 'l', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (99, '9ba3e94d-e02d-4e4d-a430-653fba653dae', '#ff0000', 'ბოძი', 'w', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (100, 'd8e60a39-774f-45d7-b4fd-f0231d2a9563', '#009933', 'ბადე', 'm', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (101, '6ca96ab8-904a-4c07-9307-bfb7f9009441', '#ffff00', 'მწვანე', 'y', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (102, 'b87cfeae-da8a-4383-b282-ada6a0151f06', '#009933', 'ყვითელი', 'm', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (103, 'c75193d6-0276-4953-aa98-6b90ac321f14', '#0000ff', 'ყვითელი', 'l', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (104, '5c4f0dc3-fca6-4d94-963a-343015a5fa1f', '#0000ff', 'მწვანე', 'l', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (105, 'b2440499-43f8-45e2-bf6e-c880204af113', '#009933', 'ყვითელი', 'm', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (106, '7b0b6f41-cfbd-4629-8371-5202a879c190', '#ffff00', 'მწვანე', 'y', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (107, 'ec4dc717-bbc7-48d7-92c1-c9fcaa9cd5b0', '#ffff00', 'მწვანე', 'y', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (108, '4fdfcf9e-4320-4439-8a8b-ec335823544f', '#009933', 'ყვითელი', 'm', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (109, '078c22a3-d3ef-44cd-b7a1-d388da1189f5', '#0000ff', 'მწვანე', 'l', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (110, 'ca09bddd-9473-46af-a1f3-695f758efd4f', '#009933', 'ყვითელი', 'm', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (111, '36091e28-1da3-4774-b360-391c4f2a631f', '#ffff00', 'მწვანე', 'y', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (112, '8887502b-de9a-4d4a-8e57-05ed1febaaab', '#009933', 'ყვითელი', 'm', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (113, 'a87d2770-05bd-4530-ba89-cf83d928c279', '#009933', 'ლურჯი', 'm', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (114, '86e5cb6e-2be8-4f4f-bc1e-01d0dbe0dbcb', '#009933', 'ყვითელი', 'm', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (115, '0f129ae8-5c1f-4bd6-a103-81b2453dd6e0', '#009933', 'ყვითელი', 'm', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (116, 'b3c45523-eaab-49ba-80b8-78f2d997be95', '#009933', 'ყვითელი', 'm', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (117, 'd2c417a7-7172-443e-b08e-17b35c8ab273', '#ffff00', 'წითელი', 'y', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (118, '083c8d5b-f69f-4a79-9a19-43d14ae9fd7e', '#ff0000', 'ლურჯი', 'w', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (119, '8d2c4549-5b75-41e4-aa06-dc554f9967c3', '#0000ff', 'მწვანე', 'l', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (120, '531b673b-b6cd-44f1-866b-7b70b5915d77', '#ff0000', 'ლურჯი', 'w', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (121, '6147b303-8cc7-44d2-a05e-ec60cc8b8fa8', '#ffff00', 'მწვანე', 'y', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (122, '7bc1303e-7e72-4007-96a9-85b1ee391c51', '#0000ff', 'მწვანე', 'l', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (123, '99e19f29-2f90-4df4-83ed-993c96ab6ab4', '#0000ff', 'მწვანე', 'l', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (124, 'de66b39d-301e-44d8-a7b4-4c4179437b74', '#009933', 'ყვითელი', 'm', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (125, '85eb1735-9621-45fe-bb5b-f74be648327d', '#0000ff', 'მწვანე', 'l', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (126, '48cb708d-6cbc-42b1-8555-3702c53343f4', '#ffff00', 'მწვანე', 'y', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (127, 'bd3d31e9-cfad-4091-a4cc-6f86a36c860b', '#ffff00', 'მწვანე', 'y', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (128, 'cdbc2b83-e306-4f76-8342-63d1cfe65271', '#ffff00', 'ლურჯი', 'y', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (129, 'd64ea0a0-46f1-42e2-90b1-1faec36d57ae', '#ff0000', 'მწვანე', 'w', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (130, '399c0634-e5fb-4ca0-a67a-f081e9df7ed4', '#ff0000', 'ლურჯი', 'w', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (131, 'd117b060-79e9-4007-8d6f-434918564f44', '#ffff00', 'მწვანე', 'y', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (132, '437d18a8-7f2e-4565-b310-844f5571393e', '#ff0000', 'ლურჯი', 'w', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (133, 'de494282-23d5-4ce5-90d0-c9d052faf99d', '#0000ff', 'მწვანე', 'l', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (134, 'c2917648-2f49-4073-8fe6-079e67bf2b86', '#0000ff', 'მწვანე', 'l', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (135, 'af8d0b76-3afc-48f6-9ded-6ff0b96407d0', '#ff0000', 'ლურჯი', 'w', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (136, '2b9a89a3-3458-432c-86bb-03f9604b1449', '#ff0000', 'ლურჯი', 'w', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (137, 'e2e7c72f-d69f-4349-a02b-681734c5d9aa', '#0000ff', 'მწვანე', 'l', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (138, '42016b1a-07d1-4392-9b5d-2ab02cb51bb3', '#009933', 'ყვითელი', 'm', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (139, '0ed77367-d1eb-4314-b77a-6cb94b935ddb', '#0000ff', 'წითელი', 'l', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (140, '9538d885-8af0-4fbb-8266-935813e3099e', '#ff0000', 'ლურჯი', 'w', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (141, 'f0400653-ba1f-4acd-b25a-df2b7bfea999', '#ff0000', 'ყვითელი', 'w', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (142, 'cc56de04-fd91-42fd-b9d5-abee773d829f', '#ffff00', 'ლურჯი', 'y', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (143, '4dbd5c5d-7e94-4d3e-8f25-cf15fc52bf9b', '#ff0000', 'მწვანე', 'w', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (144, '39ccfdc0-e29e-487d-bdfd-ea866979247c', '#0000ff', 'მწვანე', 'l', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (145, '5c9aad29-13f6-4ead-a80a-3691f1739d64', '#ffff00', 'მწვანე', 'y', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (146, '1ba19f34-ce2a-4074-ad45-50d8cb9afac7', '#0000ff', 'მწვანე', 'l', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (147, '36ab93b4-0c74-43a9-b84d-b20df7b7d3ba', '#0000ff', 'მწვანე', 'l', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (148, '8ceabcdf-e5cb-446a-ae0e-24e224a43e36', '#ffff00', 'წითელი', 'y', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (149, '8f3a1549-4f04-4f43-b74b-55bfd2e8bd4e', '#0000ff', 'ყვითელი', 'l', '2019-09-06 12:34:37', '2019-09-06 12:34:37');
INSERT INTO `strup_efeqt_test_parts` VALUES (150, '3cd03977-2c29-41e5-a4c3-ec05a38c49c4', '#ffff00', 'ლურჯი', 'y', '2019-09-06 12:34:37', '2019-09-06 12:34:37');

-- ----------------------------
-- Table structure for strup_efeqt_test_to_any
-- ----------------------------
DROP TABLE IF EXISTS `strup_efeqt_test_to_any`;
CREATE TABLE `strup_efeqt_test_to_any`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `strup_efeqt_test_uuid` char(36) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `row_uuid` char(36) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 301 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of strup_efeqt_test_to_any
-- ----------------------------
INSERT INTO `strup_efeqt_test_to_any` VALUES (151, '3996e354-e57e-444d-999f-7794ee2114a2', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (152, 'e5dda1b5-7f2f-40d9-b8e0-78d2ec068421', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (153, '69f6e25c-c178-4654-8a3e-62abed6635ac', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (154, 'f5210dad-c6ce-47a6-ad1a-ccccc515a4ff', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (155, '4fc23a9b-234d-4cc3-b1de-2bfe595ff088', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (156, 'edf06064-7f15-49cd-a4e1-27ab6330f2ba', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (157, 'd5b4cfe4-302c-434f-8c13-54d0dad270cc', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (158, 'f137a526-837d-432f-a559-0ca740584544', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (159, '5caabb69-c000-40aa-ad56-246fc2896cca', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (160, 'bd87c763-7805-4259-bf03-0ac4d1ea1d1a', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (161, '78d98e05-08c1-42f7-ad82-b210b386391b', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (162, '83b6d9a2-750b-46e7-99bb-17aeb976db7f', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (163, 'bccf7c66-c9b3-4f25-8602-1cbb3cf9b974', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (164, 'e1542f69-f7ef-43db-a19b-6cd469bce121', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (165, 'ac2216bb-a7bf-425d-8557-b4ff041ca94c', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (166, '4c4843a8-8305-419e-b3dd-32e5debdcbdb', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (167, '19b02d1b-dbcf-487a-9f94-5948f3294ac1', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (168, 'a5513dc1-2ae2-4f78-8b0a-00d68de4e03a', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (169, 'e4a89866-3a2b-479b-80ef-549fa4a601ac', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (170, '2e5f7e5a-5488-4aac-b198-7ea9d7d0a0c5', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (171, '4f8ee8d5-9756-4da8-b123-1ab95eb21a6b', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (172, 'eef9dea6-d90c-427e-8040-5f5897eb3319', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (173, '15127c72-b569-49a7-a246-8e32f9f58504', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (174, '9d39e959-69e9-4167-80db-7a50828142aa', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (175, '5d9a174e-48e8-4583-8a9c-3dbc5d84f0d5', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (176, '7e5eb7fc-1d2d-44fb-a8fd-72a7105c647f', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (177, 'dc004b78-d920-4aaf-ad36-acc1bc92bc06', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (178, 'f6d3e049-c06b-49c8-9693-4de0eb1f98d7', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (179, 'd001398c-9ae3-4033-ab47-bc58638cdedc', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (180, 'de749b74-cb66-4a9c-b8fc-d90193fc21e9', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (181, 'c047ca2a-4081-498b-90a6-efdde2d93dba', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (182, 'b9337b38-a059-4aca-8a48-8790370d81f2', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (183, 'c29aed0a-c189-4598-aaa8-fe841b8becbd', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (184, 'b3f8688f-f2cc-4a30-be2a-d1825729d09f', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (185, '2c0fef29-70d8-4c80-b349-2b69204f4c44', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (186, '3749590b-4a07-4a0b-83c0-ec7f2ca4b990', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (187, '43ad6b18-60ba-4bbf-a09a-ba4d2bcfe4c6', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (188, '92398a13-6992-4a5f-8528-a71b9e2ed92d', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (189, 'efa05dc9-48d6-4313-bfab-7e468f782d0a', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (190, '08af5a55-534b-48fa-b81a-110afac5f5c1', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (191, '4f4f5340-0494-4057-af2e-086f889b98b0', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (192, 'cb4c2619-f32d-4bb6-8b1a-0c3b0c0167d5', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (193, '03649072-91fe-4669-99cb-77a64afb36a5', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (194, '1d871ec4-6030-4990-b3a6-314c4438e8ec', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (195, '1aef8e9d-f589-4810-9f5c-88baaf7060d7', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (196, 'ad1ebf26-b3c5-42c3-a593-a357a4a0c458', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (197, '2cd32e98-f489-4dcb-8a67-71ce161f5e06', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (198, '96f725bc-bd86-4d06-adaf-ee44be3e28bd', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (199, '03944857-9a48-427f-8093-b55ac1147941', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (200, 'd80e936f-61d3-4be5-be4b-4db3379f8bd5', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (201, '8c68b8f4-1eb2-44f0-a290-5fc9b68d2140', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (202, '83def758-f5ee-4b4f-9296-288d95f02254', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (203, '00cc63b2-74ea-4072-89e1-96e3d17877f1', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (204, '751936b7-4540-4f82-9cbc-d3075e99083d', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (205, '4ba34a7e-5b90-4a5a-9713-66c730387376', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (206, '35d4cd34-7e0e-4763-bcf8-8cee32b434d9', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (207, '12f777c2-e06e-4ae1-96ec-74679d4d0161', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (208, '93d615c6-505a-4aa5-add9-41d9cf93c41a', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (209, '749395e0-3a13-4d3f-a2c7-ed953212dcb8', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (210, '83c5c460-0a50-4ef6-9541-bf961f3fbf2b', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (211, 'a4d28db9-005e-42d3-bc8a-7ea68cf0bf9c', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (212, '1830a5bc-9d37-4847-81ad-7681469da9d3', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (213, 'b659e901-8149-4828-aef0-58c9a50de3d2', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (214, '41f958a4-2970-4bd3-9608-eac4951a88a5', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (215, '8852700d-245b-4b07-b534-cfdee5aa6449', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (216, '68e3c1c1-d520-4570-97bb-8d1a9c7bcbce', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (217, '98068084-f65e-41d8-a5c1-1ed5a15f183b', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (218, 'df606769-2d1d-4ebb-9db2-d7326e342600', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (219, '8ab82c8c-e112-4a9c-b518-a043a0ca212d', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (220, 'dbe3d25d-1de5-4dac-b62a-e102401a9f65', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (221, '18007e2f-f045-451a-8237-d7c91e93609f', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (222, '6a579dfc-aaae-4a6a-851b-782b7f2ec582', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (223, 'f1006e11-68b1-4dee-84ff-c62cec9431d8', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (224, 'd97d352c-7c53-4418-a451-087a6f042b1a', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (225, 'f16d35b3-f64d-4893-94c2-3d44e8823717', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (226, 'e4a63e9e-c825-475e-8631-f4be35737cc5', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (227, '6aee1dbf-74db-48f9-b8a8-a18db07b75ed', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (228, 'bb17fa60-7500-4f55-bd38-78e564e8b0ee', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (229, '486a253c-8d3a-4b83-98cb-bb7ef530ef61', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (230, '51da1c27-aab1-42d0-9224-9954b3e250f0', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (231, 'fdcd4513-2152-4dee-9ec8-5da095218d83', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (232, 'aaee213a-150b-4009-bfab-9dcca9cc6e38', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (233, 'c6e3596c-b114-457d-b72d-4be9c819c62b', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (234, 'e9e840fc-08e9-4543-9d88-29bacd74ad87', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (235, 'ac077e77-9774-498d-9d0b-7ce284472cfb', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (236, '0610c176-a305-4aa7-a967-37a490b772f8', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (237, '07ed82ce-758a-4bc0-b86a-0f1cb198b12a', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (238, '663c8c09-1cd8-4cdf-b18e-1ede4130a456', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (239, 'e3427312-bd55-4643-acfe-70a8247e6916', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (240, '07791df5-5f6a-4c94-adfc-8c07e5d2f025', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (241, 'f9d53c5a-a73c-4270-b7cb-b6efef9ec74a', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (242, '9532c3d7-1cae-4e61-b2cf-c418cc5aacc7', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (243, '14360474-5a84-4c58-8fb0-51b2da2821aa', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (244, '3c61a16a-8dd6-4a87-8b62-164c3d86d4a0', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (245, '136bd56e-4937-4ffb-95ff-50cf6e2dcdb5', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (246, 'e4604503-d303-4678-8c21-4b475f1f307b', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (247, 'b890d26a-f02e-4d1a-8b21-e38803e679bb', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (248, 'fdd39fb4-a1a0-4f1d-9028-539644b8bdf4', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (249, '9ba3e94d-e02d-4e4d-a430-653fba653dae', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (250, 'd8e60a39-774f-45d7-b4fd-f0231d2a9563', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (251, '6ca96ab8-904a-4c07-9307-bfb7f9009441', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (252, 'b87cfeae-da8a-4383-b282-ada6a0151f06', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (253, 'c75193d6-0276-4953-aa98-6b90ac321f14', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (254, '5c4f0dc3-fca6-4d94-963a-343015a5fa1f', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (255, 'b2440499-43f8-45e2-bf6e-c880204af113', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (256, '7b0b6f41-cfbd-4629-8371-5202a879c190', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (257, 'ec4dc717-bbc7-48d7-92c1-c9fcaa9cd5b0', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (258, '4fdfcf9e-4320-4439-8a8b-ec335823544f', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (259, '078c22a3-d3ef-44cd-b7a1-d388da1189f5', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (260, 'ca09bddd-9473-46af-a1f3-695f758efd4f', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (261, '36091e28-1da3-4774-b360-391c4f2a631f', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (262, '8887502b-de9a-4d4a-8e57-05ed1febaaab', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (263, 'a87d2770-05bd-4530-ba89-cf83d928c279', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (264, '86e5cb6e-2be8-4f4f-bc1e-01d0dbe0dbcb', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (265, '0f129ae8-5c1f-4bd6-a103-81b2453dd6e0', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (266, 'b3c45523-eaab-49ba-80b8-78f2d997be95', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (267, 'd2c417a7-7172-443e-b08e-17b35c8ab273', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (268, '083c8d5b-f69f-4a79-9a19-43d14ae9fd7e', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (269, '8d2c4549-5b75-41e4-aa06-dc554f9967c3', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (270, '531b673b-b6cd-44f1-866b-7b70b5915d77', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (271, '6147b303-8cc7-44d2-a05e-ec60cc8b8fa8', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (272, '7bc1303e-7e72-4007-96a9-85b1ee391c51', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (273, '99e19f29-2f90-4df4-83ed-993c96ab6ab4', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (274, 'de66b39d-301e-44d8-a7b4-4c4179437b74', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (275, '85eb1735-9621-45fe-bb5b-f74be648327d', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (276, '48cb708d-6cbc-42b1-8555-3702c53343f4', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (277, 'bd3d31e9-cfad-4091-a4cc-6f86a36c860b', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (278, 'cdbc2b83-e306-4f76-8342-63d1cfe65271', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (279, 'd64ea0a0-46f1-42e2-90b1-1faec36d57ae', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (280, '399c0634-e5fb-4ca0-a67a-f081e9df7ed4', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (281, 'd117b060-79e9-4007-8d6f-434918564f44', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (282, '437d18a8-7f2e-4565-b310-844f5571393e', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (283, 'de494282-23d5-4ce5-90d0-c9d052faf99d', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (284, 'c2917648-2f49-4073-8fe6-079e67bf2b86', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (285, 'af8d0b76-3afc-48f6-9ded-6ff0b96407d0', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (286, '2b9a89a3-3458-432c-86bb-03f9604b1449', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (287, 'e2e7c72f-d69f-4349-a02b-681734c5d9aa', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (288, '42016b1a-07d1-4392-9b5d-2ab02cb51bb3', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (289, '0ed77367-d1eb-4314-b77a-6cb94b935ddb', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (290, '9538d885-8af0-4fbb-8266-935813e3099e', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (291, 'f0400653-ba1f-4acd-b25a-df2b7bfea999', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (292, 'cc56de04-fd91-42fd-b9d5-abee773d829f', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (293, '4dbd5c5d-7e94-4d3e-8f25-cf15fc52bf9b', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (294, '39ccfdc0-e29e-487d-bdfd-ea866979247c', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (295, '5c9aad29-13f6-4ead-a80a-3691f1739d64', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (296, '1ba19f34-ce2a-4074-ad45-50d8cb9afac7', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (297, '36ab93b4-0c74-43a9-b84d-b20df7b7d3ba', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (298, '8ceabcdf-e5cb-446a-ae0e-24e224a43e36', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (299, '8f3a1549-4f04-4f43-b74b-55bfd2e8bd4e', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `strup_efeqt_test_to_any` VALUES (300, '3cd03977-2c29-41e5-a4c3-ec05a38c49c4', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);

-- ----------------------------
-- Table structure for strup_efeqt_test_translations
-- ----------------------------
DROP TABLE IF EXISTS `strup_efeqt_test_translations`;
CREATE TABLE `strup_efeqt_test_translations`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `desc` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `locale` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `strup_efeqt_test_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of strup_efeqt_test_translations
-- ----------------------------
INSERT INTO `strup_efeqt_test_translations` VALUES (2, 'სტრუპის ეფექტი', 'სტრუპის ეფექტი მოკლე აღწერილობა', 'ka', 2);

-- ----------------------------
-- Table structure for tests
-- ----------------------------
DROP TABLE IF EXISTS `tests`;
CREATE TABLE `tests`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `uuid` char(36) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tests
-- ----------------------------
INSERT INTO `tests` VALUES (2, 'signal', '65dbc9d8-912f-4bcf-a302-c4f490249d1b', '2019-08-30 10:35:46', '2019-08-30 10:35:46');
INSERT INTO `tests` VALUES (6, 'perceft', '2e8f08fc-8663-453a-92db-39384063eeb5', '2019-09-04 08:49:14', '2019-09-04 08:49:14');
INSERT INTO `tests` VALUES (8, 'strup', '33042654-9555-4971-91c0-10cdbc30a34a', '2019-09-06 10:24:32', '2019-09-06 10:24:32');
INSERT INTO `tests` VALUES (9, 'selection', '848b5a84-3101-4097-a8c3-9c7eee3aaa53', '2019-09-16 12:53:15', '2019-09-16 12:53:15');

-- ----------------------------
-- Table structure for tests_to_any
-- ----------------------------
DROP TABLE IF EXISTS `tests_to_any`;
CREATE TABLE `tests_to_any`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_uuid` char(36) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `row_uuid` char(36) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tests_to_any
-- ----------------------------
INSERT INTO `tests_to_any` VALUES (1, '65dbc9d8-912f-4bcf-a302-c4f490249d1b', '0e284572-653f-42ee-8bfe-f87fcbcf7740', NULL);
INSERT INTO `tests_to_any` VALUES (5, '2e8f08fc-8663-453a-92db-39384063eeb5', '1775df3c-ff30-4135-ad2e-f91edd634f8f', NULL);
INSERT INTO `tests_to_any` VALUES (7, '33042654-9555-4971-91c0-10cdbc30a34a', '746d0933-5849-4d47-bcf5-91af7c01d0fe', NULL);
INSERT INTO `tests_to_any` VALUES (8, '848b5a84-3101-4097-a8c3-9c7eee3aaa53', 'c473f5ac-86f3-414f-89eb-c14052a7db59', NULL);

-- ----------------------------
-- Table structure for tests_translations
-- ----------------------------
DROP TABLE IF EXISTS `tests_translations`;
CREATE TABLE `tests_translations`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `locale` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tests_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tests_translations
-- ----------------------------
INSERT INTO `tests_translations` VALUES (1, 'სიგნალის შემჩნევის ექსპერიმენტი', 'ka', 2);
INSERT INTO `tests_translations` VALUES (4, 'პერცეფტული შედარება', 'ka', 6);
INSERT INTO `tests_translations` VALUES (6, 'სტრუპის ეფექტი', 'ka', 8);
INSERT INTO `tests_translations` VALUES (7, 'სელექციური ყურადღება', 'ka', 9);

-- ----------------------------
-- Table structure for translation
-- ----------------------------
DROP TABLE IF EXISTS `translation`;
CREATE TABLE `translation`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of translation
-- ----------------------------
INSERT INTO `translation` VALUES (2, 'rrr', '2019-08-27 09:05:42', '2019-08-27 09:05:42');

-- ----------------------------
-- Table structure for translation_translations
-- ----------------------------
DROP TABLE IF EXISTS `translation_translations`;
CREATE TABLE `translation_translations`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `locale` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `translation_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of translation_translations
-- ----------------------------
INSERT INTO `translation_translations` VALUES (1, 'rrrr', 'ka', 2);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` char(36) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `remember_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ip` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'a044e6cc-b8c8-4b76-9b46-5dd1d7f150c2', 'kakha', 'kaxam1@gmail.com', NULL, '$2y$10$e6OlSmt4qRjCLj/aiuWQfOOSrHarS./TtHFn6ZUmNg6Oq6dwn.h8a', 'yEBAwuZISzcSWQjJjf2aqJ8dSd09KD5txm3KQzKaHYHQutqENN2zELYC68pt', '*', '2019-09-23 12:06:38', '2019-09-23 12:06:38', '1');

SET FOREIGN_KEY_CHECKS = 1;
