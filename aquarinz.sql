/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : aquarinz

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-04-17 08:20:22
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'juntun', 'junjun@gmail.com', '$2y$10$pchbTUw4nUtCSpRZgzMALe4Lsiryfr72Bb5iNQ9e/Cri1v3va6rFu', null, null, '2017-04-02 13:55:53', '2017-04-02 13:55:53');
INSERT INTO `users` VALUES ('2', 'edfsdf', 'dsfsdfsdf@gmail.com', '$2y$10$qoc0l7.yerehQdRZGDc9BOSPfvFxdzcWUMSnkyfdiiO48clZob0aS', null, 'Mjl4HmasXAWbztUhAUcHnMrtQeKubmeKhfHelnnODWeekNpbI4fdweTcleeA', '2017-04-02 15:17:58', '2017-04-02 15:17:58');
INSERT INTO `users` VALUES ('3', 'jannn', 'huhu@gmail.com', '$2y$10$QLPRT5Gg6eVl5gdKE6aL..g3r2YrGfdCf1cSKoncWBBFbTFdLnbyy', null, 'R51nOeEfZY5dT5kLFzgPi8dEXoCacdHgifa3gNpnLmJBAmXtQKfilru0bg6U', '2017-04-03 13:35:42', '2017-04-03 13:35:42');
INSERT INTO `users` VALUES ('4', 'jan', 'jansus2121@live.com', '$2y$10$ezIfvkNQHu58Xkl6xsXKwO3upsr6D1IiFtKQX3422oGIK4zymB/gO', null, 'Oqdp4ymfiPxdUKObrkiLY9Xp9Twwi6utZ81jq2GMMjixLBJbG4Mz58sCkHTU', '2017-04-04 08:41:58', '2017-04-04 08:41:58');
INSERT INTO `users` VALUES ('5', 'jijjij', 'jiji@lasd.com', '$2y$10$7ujv1HEwpwQa4lcANCq.4.1mBr2OZsalSdvxhVvP3SNxeMwHpnepe', null, 'o0EuYY1XjfmAEz8Y3nHvjoreBiPCX2NH7sZ117KukKlhUC9BK6a9e5vEkNil', '2017-04-04 08:51:32', '2017-04-04 08:51:32');
INSERT INTO `users` VALUES ('6', 'yuyuy', 'uyuyu@gmail.com', '$2y$10$494nEFQKdkG/BZw0brUaCu3h7hRlZn0uyNTtG1pVCoEvGrqdbYewK', null, 'XzhzfUCwGPoNT9bGoJKjDcfAzj9M3L8BY7f1YnFwcLhKmpoP7WStPsM2Ouv4', '2017-04-04 09:16:37', '2017-04-04 09:16:37');
INSERT INTO `users` VALUES ('7', 'syaza izzati', 'syazati95@gmail.com', '$2y$10$y2.9rBaOVCXhS9TVfv2yvOxU2HSRHj1Lvi0/sVazCSwA3HtPaucOy', '1', 'mxRrL6Vi5F9SFIisoUl6EHkl74TxqxHC4GY0oDudydoP7SypgSBC7qFSPKDY', '2017-04-16 16:25:17', '2017-04-16 16:25:17');
