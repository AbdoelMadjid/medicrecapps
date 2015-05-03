/*
Navicat MySQL Data Transfer

Source Server         : mysql_lawas
Source Server Version : 50133
Source Host           : localhost:3306
Source Database       : fkg

Target Server Type    : MYSQL
Target Server Version : 50133
File Encoding         : 65001

Date: 2015-05-03 17:55:14
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `odontogram`
-- ----------------------------
DROP TABLE IF EXISTS `odontogram`;
CREATE TABLE `odontogram` (
  `id_odontogram` int(10) NOT NULL AUTO_INCREMENT,
  `nama_odontogram` varchar(125) DEFAULT NULL,
  `url_foto` varchar(125) DEFAULT NULL,
  PRIMARY KEY (`id_odontogram`),
  KEY `id_odontogram` (`id_odontogram`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of odontogram
-- ----------------------------

-- ----------------------------
-- Table structure for `odontogram_pasien`
-- ----------------------------
DROP TABLE IF EXISTS `odontogram_pasien`;
CREATE TABLE `odontogram_pasien` (
  `id_odontogram_pasien` int(10) NOT NULL DEFAULT '0',
  `id_pasien` int(10) DEFAULT NULL,
  `id_odontogram` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_odontogram_pasien`),
  KEY `fk_id_odontogram` (`id_odontogram`),
  KEY `fk_id_pasein` (`id_pasien`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of odontogram_pasien
-- ----------------------------

-- ----------------------------
-- Table structure for `pasien`
-- ----------------------------
DROP TABLE IF EXISTS `pasien`;
CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pasien` varchar(125) DEFAULT NULL,
  `usia_pasien` varchar(125) DEFAULT NULL,
  `tanggal_lahir` varchar(125) DEFAULT NULL,
  `alamat_pasien` text,
  `kewarganegaraan` varchar(125) DEFAULT NULL,
  `url_foto` varchar(125) DEFAULT NULL,
  PRIMARY KEY (`id_pasien`),
  KEY `id_pasien` (`id_pasien`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pasien
-- ----------------------------
INSERT INTO `pasien` VALUES ('1', 'Faiz Fanani', '12', '2015-05-13', 'Jalan asem payung no.8', 'Indoensia', 'img/fotopasien/12f718f.jpg');

-- ----------------------------
-- Table structure for `rekam_medik`
-- ----------------------------
DROP TABLE IF EXISTS `rekam_medik`;
CREATE TABLE `rekam_medik` (
  `id_rk_medik` int(10) NOT NULL AUTO_INCREMENT,
  `nama_penyakit` varchar(135) DEFAULT NULL,
  `id_pasien` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_rk_medik`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of rekam_medik
-- ----------------------------

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(125) DEFAULT NULL,
  `nama_panggilan` varchar(125) DEFAULT NULL,
  `alamat` text,
  `email` varchar(125) DEFAULT NULL,
  `username` varchar(125) DEFAULT NULL,
  `password` varchar(125) DEFAULT NULL,
  `role` int(125) NOT NULL,
  `url_foto` varchar(125) DEFAULT NULL,
  `gelar` varchar(125) DEFAULT NULL,
  `kewarganegaraan` varchar(125) DEFAULT NULL,
  `status` int(125) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('30', 'Idam Pradana Mahmudah', null, null, null, 'admin', '21232f297a57a5a743894a0e4a801fc3', '3', 'img/fotouser/default.jpg', null, null, '1');
INSERT INTO `user` VALUES ('26', 'Faiz Fanani', null, null, null, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2', 'img/fotouser/Never-Give-Up-Wallpaper.jpg', null, null, '1');
