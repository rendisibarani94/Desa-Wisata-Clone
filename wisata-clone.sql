/*
 Navicat Premium Data Transfer

 Source Server         : Database(MSI)
 Source Server Type    : MySQL
 Source Server Version : 100428 (10.4.28-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : wisata_jangga_dolok

 Target Server Type    : MySQL
 Target Server Version : 100428 (10.4.28-MariaDB)
 File Encoding         : 65001

 Date: 02/06/2024 19:33:55
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for atraksi_wisata
-- ----------------------------
DROP TABLE IF EXISTS `atraksi_wisata`;
CREATE TABLE `atraksi_wisata`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `namaAtraksi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `deskripsiSingkat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `isiAtraksi` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `tarif` double NULL DEFAULT NULL,
  `lokasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jadwalAtraksi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `isDeleted` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of atraksi_wisata
-- ----------------------------

-- ----------------------------
-- Table structure for bank
-- ----------------------------
DROP TABLE IF EXISTS `bank`;
CREATE TABLE `bank`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_fasilitas` int NULL DEFAULT 4,
  `namaBank` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lokasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `waktuOperasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jamBuka` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jamTutup` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `deskripsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `isiKonten` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `isDeleted` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fl_fasilitas_bank`(`id_fasilitas` ASC) USING BTREE,
  CONSTRAINT `fl_fasilitas_bank` FOREIGN KEY (`id_fasilitas`) REFERENCES `fasilitas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of bank
-- ----------------------------

-- ----------------------------
-- Table structure for berita_wisata
-- ----------------------------
DROP TABLE IF EXISTS `berita_wisata`;
CREATE TABLE `berita_wisata`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `penulis` int NULL DEFAULT NULL,
  `judulBerita` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggalBerita` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `deskripsi` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `isiBerita` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `isDeleted` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_penulis_berita_wisata`(`penulis` ASC) USING BTREE,
  CONSTRAINT `fk_penulis_berita_wisata` FOREIGN KEY (`penulis`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of berita_wisata
-- ----------------------------

-- ----------------------------
-- Table structure for fasilitas
-- ----------------------------
DROP TABLE IF EXISTS `fasilitas`;
CREATE TABLE `fasilitas`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `namaFasilitas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `isDeleted` tinyint NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of fasilitas
-- ----------------------------
INSERT INTO `fasilitas` VALUES (1, 'Penginapan', 0);
INSERT INTO `fasilitas` VALUES (2, 'Fasilitas Kesehatan', 0);
INSERT INTO `fasilitas` VALUES (3, 'Rumah Makan', 0);
INSERT INTO `fasilitas` VALUES (4, 'Bank', 0);
INSERT INTO `fasilitas` VALUES (5, 'Rumah Ibadah', 0);

-- ----------------------------
-- Table structure for fasilitas_kesehatan
-- ----------------------------
DROP TABLE IF EXISTS `fasilitas_kesehatan`;
CREATE TABLE `fasilitas_kesehatan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_fasilitas` int NULL DEFAULT 2,
  `namaFasilitasKesehatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lokasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `waktuOperasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jamBuka` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jamTutup` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `deskripsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `isiKonten` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `isDeleted` tinyint NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_fasilitas_fasilitasKesehatan`(`id_fasilitas` ASC) USING BTREE,
  CONSTRAINT `fk_fasilitas_fasilitasKesehatan` FOREIGN KEY (`id_fasilitas`) REFERENCES `fasilitas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of fasilitas_kesehatan
-- ----------------------------

-- ----------------------------
-- Table structure for kategori_objek_wisata
-- ----------------------------
DROP TABLE IF EXISTS `kategori_objek_wisata`;
CREATE TABLE `kategori_objek_wisata`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of kategori_objek_wisata
-- ----------------------------
INSERT INTO `kategori_objek_wisata` VALUES (1, 'Wisata Alam');
INSERT INTO `kategori_objek_wisata` VALUES (2, 'Wisata Budaya');
INSERT INTO `kategori_objek_wisata` VALUES (3, 'Wisata Kreatif');

-- ----------------------------
-- Table structure for kategori_umkm
-- ----------------------------
DROP TABLE IF EXISTS `kategori_umkm`;
CREATE TABLE `kategori_umkm`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `kategoriUMKM` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `isDeleted` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of kategori_umkm
-- ----------------------------
INSERT INTO `kategori_umkm` VALUES (1, 'Makanan', 0);
INSERT INTO `kategori_umkm` VALUES (2, 'Sovenir', 0);
INSERT INTO `kategori_umkm` VALUES (3, 'Pakaian', 0);

-- ----------------------------
-- Table structure for objek_wisata
-- ----------------------------
DROP TABLE IF EXISTS `objek_wisata`;
CREATE TABLE `objek_wisata`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `idKategoriWisata` int NULL DEFAULT NULL,
  `namaObjekWisata` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lokasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `deskripsi` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `waktuOperasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jamBuka` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jamTutup` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kontak` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `statusDelete` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_katogori_FK`(`idKategoriWisata` ASC) USING BTREE,
  CONSTRAINT `id_katogori_FK` FOREIGN KEY (`idKategoriWisata`) REFERENCES `kategori_objek_wisata` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of objek_wisata
-- ----------------------------

-- ----------------------------
-- Table structure for paket_wisata
-- ----------------------------
DROP TABLE IF EXISTS `paket_wisata`;
CREATE TABLE `paket_wisata`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `namaPaket` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `harga` double NULL DEFAULT NULL,
  `durasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lokasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `waktuTersedia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `deskripsi` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `rute` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `akomodasi` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `syaratKetentuan` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `namaKontak` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kontak` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `gambar1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `gambar2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `gambar3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `gambar4` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `gambar5` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `isDeleted` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of paket_wisata
-- ----------------------------

-- ----------------------------
-- Table structure for penginapan
-- ----------------------------
DROP TABLE IF EXISTS `penginapan`;
CREATE TABLE `penginapan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_fasilitas` int NULL DEFAULT NULL,
  `namaPenginapan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `harga` double NULL DEFAULT NULL,
  `deskripsi` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `lokasi` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `kontak` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `wifi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `toilet` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ac` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `breakfast` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `contactPerson` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `cleaningService` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `gambar1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `gambar2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `gambar3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `gambar4` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `gambar5` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `isDeleted` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_fasilitas_penginapan`(`id_fasilitas` ASC) USING BTREE,
  CONSTRAINT `fk_fasilitas_penginapan` FOREIGN KEY (`id_fasilitas`) REFERENCES `fasilitas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of penginapan
-- ----------------------------

-- ----------------------------
-- Table structure for produk_umkm
-- ----------------------------
DROP TABLE IF EXISTS `produk_umkm`;
CREATE TABLE `produk_umkm`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_kategori_umkm` int NULL DEFAULT NULL,
  `namaProduk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `harga` double NULL DEFAULT NULL,
  `namaQuantity` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kontak` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `namaKontak` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `deskripsi` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `isDeleted` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_umkm_produkUmkm`(`id_kategori_umkm` ASC) USING BTREE,
  CONSTRAINT `fk_umkm_produkUmkm` FOREIGN KEY (`id_kategori_umkm`) REFERENCES `kategori_umkm` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of produk_umkm
-- ----------------------------

-- ----------------------------
-- Table structure for profil
-- ----------------------------
DROP TABLE IF EXISTS `profil`;
CREATE TABLE `profil`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `deskripsi` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `sejarah` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updateAt` timestamp NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of profil
-- ----------------------------

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES (1, 'Admin');

-- ----------------------------
-- Table structure for rumah_ibadah
-- ----------------------------
DROP TABLE IF EXISTS `rumah_ibadah`;
CREATE TABLE `rumah_ibadah`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_fasilitas` int NULL DEFAULT 5,
  `namaRumahIbadah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lokasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jadwalIbadah` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `deskripsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `isiKonten` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `isDeleted` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_fasilitas_rumahIbadah`(`id_fasilitas` ASC) USING BTREE,
  CONSTRAINT `fk_fasilitas_rumahIbadah` FOREIGN KEY (`id_fasilitas`) REFERENCES `fasilitas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of rumah_ibadah
-- ----------------------------

-- ----------------------------
-- Table structure for rumah_makan
-- ----------------------------
DROP TABLE IF EXISTS `rumah_makan`;
CREATE TABLE `rumah_makan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_fasilitas` int NULL DEFAULT 3,
  `namaRumahMakan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lokasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `waktuOperasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jamBuka` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jamTutup` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `deskripsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `isiKonten` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `isDeleted` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_fasilitas_rumahMakan`(`id_fasilitas` ASC) USING BTREE,
  CONSTRAINT `fk_fasilitas_rumahMakan` FOREIGN KEY (`id_fasilitas`) REFERENCES `fasilitas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of rumah_makan
-- ----------------------------

-- ----------------------------
-- Table structure for testimoni
-- ----------------------------
DROP TABLE IF EXISTS `testimoni`;
CREATE TABLE `testimoni`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `testimoni` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `isDeleted` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of testimoni
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isDeleted` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE,
  INDEX `fk_role_users`(`role` ASC) USING BTREE,
  CONSTRAINT `fk_role_users` FOREIGN KEY (`role`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Rendi Jonathan Sibarani', 'rendisibarani94@gmail.com', 1, '0000-00-00 00:00:00', '$10$EwrqC7eefx2malFg0roC5e7glEd4KLUrPwWCb5xX..mRQbfUqPJPC', 'Vk7TGSbtXWd5d3Ei0UyQvcIIiyS0syWgVJGt6M1NkmmWvT4CtDdKrHjncqDJ', '2024-04-02 02:35:37', '2024-04-02 02:35:37', 0);

SET FOREIGN_KEY_CHECKS = 1;
