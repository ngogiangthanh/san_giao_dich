-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2017 at 01:33 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `san_giao_dich`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `category_select`()
BEGIN
	SELECT
	*
	FROM
	linh_vuc
	ORDER BY
		linh_vuc.THU_TU asc;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `category_update`(IN `id` int, IN `ten_linh_vuc` varchar(200), IN `mo_ta` text, IN `url_thumb` varchar(100), IN `url_menu` varchar(20), IN `thu_tu` tinyint(4), IN `hien_thi` bit)
BEGIN
	#Routine body goes here...
	UPDATE linh_vuc 
			SET linh_vuc.TEN_LINH_VUC = COALESCE(`ten_linh_vuc` ,linh_vuc.TEN_LINH_VUC),
					linh_vuc.MO_TA_LINH_VUC = COALESCE(`mo_ta` ,linh_vuc.MO_TA_LINH_VUC),
					linh_vuc.URL_THUMNAIL = COALESCE(`url_thumb` ,linh_vuc.URL_THUMNAIL),
					linh_vuc.URL_MENU = COALESCE(`url_menu` ,linh_vuc.URL_MENU),
					linh_vuc.THU_TU = COALESCE(`thu_tu` ,linh_vuc.THU_TU),
					linh_vuc.HIEN_THI = COALESCE(`hien_thi` ,linh_vuc.HIEN_THI)
			WHERE linh_vuc.ID = `id`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `contact_select`(IN `key` varchar(256),IN `trang_thai` tinyint,IN `da_xem` tinyint, IN `quan_trong` tinyint, IN `spam` tinyint, IN `rac` tinyint, IN `offset` int, IN `limit` int)
BEGIN
		SELECT
		lien_he.ID,
		lien_he.ID_PHAN_HOI,
		lien_he.ID_NGUOI_LIEN_HE,
		lien_he.HO_TEN,
		lien_he.EMAIL,
		lien_he.TIEU_DE,
		lien_he.QUAN_TRONG,
		lien_he.DU_LIEU_LIEN_HE,
		lien_he.TRANG_THAI,
		lien_he.THOI_DIEM_CAP_NHAT,
		lien_he.DA_XEM,
		nguoi_dung.HO_TEN AS HO_TEN_PHAN_HOI
		FROM
		lien_he
		LEFT OUTER JOIN nguoi_dung ON lien_he.ID_NGUOI_LIEN_HE = nguoi_dung.ID
		WHERE
			(lien_he.TIEU_DE LIKE CONCAT('%',`key` ,'%') OR `key` IS NULL) AND
			(lien_he.TRANG_THAI = `trang_thai` OR `trang_thai` IS NULL) AND
			(lien_he.DA_XEM = `da_xem` OR `da_xem` IS NULL) AND
			(lien_he.QUAN_TRONG = `quan_trong` OR `quan_trong` IS NULL) AND
			(lien_he.SPAM = `spam` OR `spam` IS NULL) AND
			(lien_he.RAC = `rac` OR `rac` IS NULL)
		ORDER BY
			lien_he.THOI_DIEM_CAP_NHAT DESC
		LIMIT 
		`offset` , `limit`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `contact_select_one`(IN `id` int)
BEGIN
		SELECT
		lien_he.ID,
		lien_he.ID_NGUOI_LIEN_HE,
		lien_he.ID_PHAN_HOI,
		lien_he.EMAIL,
		lien_he.TIEU_DE,
		lien_he.QUAN_TRONG,
		lien_he.DU_LIEU_LIEN_HE,
		lien_he.TRANG_THAI,
		lien_he.THOI_DIEM_CAP_NHAT,
		lien_he.DA_XEM,
		lien_he.HO_TEN,
		nguoi_dung.HO_TEN AS HO_TEN_PHAN_HOI,
		nguoi_dung.URL_DAI_DIEN
		FROM
		lien_he
		LEFT OUTER JOIN nguoi_dung ON lien_he.ID_NGUOI_LIEN_HE = nguoi_dung.ID
		WHERE
			lien_he.ID = `id`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `contact_update`(IN `id` int, IN `id_phan_hoi` int, IN `ho_ten` varchar(200), IN `email` varchar(256), IN `tieu_de` varchar(256), IN `du_lieu_lien_he` varchar(128), IN `trang_thai` tinyint, IN `da_xem` tinyint, IN `quan_trong` tinyint, IN `spam` tinyint, IN `rac` tinyint)
BEGIN
	#Routine body goes here...
	UPDATE lien_he 
			SET lien_he.ID_PHAN_HOI = COALESCE(`id_phan_hoi` ,lien_he.ID_PHAN_HOI),
					lien_he.HO_TEN = COALESCE(`ho_ten` ,lien_he.HO_TEN),
					lien_he.EMAIL = COALESCE(`email` ,lien_he.EMAIL),
					lien_he.TIEU_DE = COALESCE(`tieu_de` ,lien_he.TIEU_DE),
					lien_he.DU_LIEU_LIEN_HE = COALESCE(`du_lieu_lien_he` ,lien_he.DU_LIEU_LIEN_HE),
					lien_he.TRANG_THAI = COALESCE(`trang_thai` ,lien_he.TRANG_THAI),
					lien_he.DA_XEM = COALESCE(`da_xem` ,lien_he.DA_XEM),
					lien_he.QUAN_TRONG = COALESCE(`quan_trong` ,lien_he.QUAN_TRONG),
					lien_he.SPAM = COALESCE(`spam` ,lien_he.SPAM),
					lien_he.RAC = COALESCE(`rac` ,lien_he.RAC)
			WHERE lien_he.ID = `id`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `info_select`(IN `loai_tt` tinyint(4))
BEGIN
	SELECT
	*
	FROM
	thong_tin_to_chuc
	WHERE
		(thong_tin_to_chuc.LOAI_THONG_TIN = `loai_tt` OR `loai_tt` IS NULL);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `info_update`(IN `id` int, IN `noi_dung` text, IN `id_user` int)
BEGIN
	#Routine body goes here...
	UPDATE thong_tin_to_chuc 
			SET thong_tin_to_chuc.THONG_TIN_TO_CHUC = `noi_dung`,
					thong_tin_to_chuc.ID_NGUOI_DUNG = `id_user`
			WHERE thong_tin_to_chuc.ID = `id`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `user_add`(IN `url_dai_dien` varchar(200),IN `ho_ten` varchar(200),IN `gioi_tinh` tinyint,IN `dia_chi` varchar(200),IN `email` varchar(256),IN `sdt` char(20),IN `tk` varchar(128),IN `mk` varchar(128),IN `quyen_han` tinyint,IN `trang_thai` tinyint)
BEGIN
	#Routine body goes here...
	INSERT INTO nguoi_dung(URL_DAI_DIEN,HO_TEN,GIOI_TINH,DIA_CHI,EMAIL,SDT,TAI_KHOAN,MAT_KHAU,QUYEN_HAN,TRANG_THAI) VALUES (`url_dai_dien`, `ho_ten`, `gioi_tinh`, `dia_chi`, `email`, `sdt`, `tk`, `mk`, `quyen_han`, `trang_thai`);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `user_delete`(IN `id` int)
BEGIN
	#Routine body goes here...
	DECLARE cannot_delete_user CONDITION for 1451;
	DECLARE CONTINUE HANDLER FOR cannot_delete_user 
			UPDATE nguoi_dung 
			SET nguoi_dung.TRANG_THAI = 2
			WHERE nguoi_dung.ID = `id`;
	DELETE FROM nguoi_dung WHERE nguoi_dung.id = `id`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `user_insert`(IN `url_dai_dien` varchar(200),IN `ngay_sinh` date, IN `ho_ten` varchar(200),IN `gioi_tinh` tinyint,IN `dia_chi` varchar(200),IN `email` varchar(256),IN `sdt` char(20),IN `tk` varchar(128),IN `mk` varchar(128),IN `mk_goc` varchar(128),IN `quyen_han` tinyint,IN `trang_thai` tinyint, IN `cau_noi` varchar(1024))
BEGIN
	#Routine body goes here...
	INSERT INTO nguoi_dung(URL_DAI_DIEN, HO_TEN, NGAY_SINH, GIOI_TINH, DIA_CHI, EMAIL, SDT, TAI_KHOAN, MAT_KHAU, MAT_KHAU_GOC, QUYEN_HAN, TRANG_THAI, CAU_NOI)
			VALUES (COALESCE(`url_dai_dien`,'./uploads/images/avatar/default.png'),
					COALESCE(`ho_ten`,'Không tên'),
					`ngay_sinh`,
					`gioi_tinh`,
					`dia_chi`,
					`email`,
					`sdt`,
					`tk`,
					`mk`,
					`mk_goc`,
					COALESCE(`quyen_han`,1),
					`trang_thai`,
					`cau_noi`);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `user_login`(IN `username` varchar(128),IN `password` varchar(128))
BEGIN
	SELECT * FROM nguoi_dung 
												WHERE nguoi_dung.TAI_KHOAN = `username` 
															AND nguoi_dung.MAT_KHAU = `password`
															AND nguoi_dung.TRANG_THAI = 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `user_select`(IN `key` varchar(128), IN `offset` int, IN `limit` int)
BEGIN
	SELECT 
		*
	FROM
		nguoi_dung
	WHERE
		(nguoi_dung.TAI_KHOAN LIKE CONCAT('%',`key` ,'%') OR `key` IS NULL) OR
		(nguoi_dung.HO_TEN LIKE CONCAT('%',`key` ,'%') OR `key` IS NULL)
	ORDER BY
		nguoi_dung.QUYEN_HAN DESC,
		nguoi_dung.TRANG_THAI ASC,
		nguoi_dung.ID ASC
	LIMIT 
		`offset` , `limit` ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `user_select_lastest`()
BEGIN
	SELECT 
		*
	FROM
		nguoi_dung
	ORDER BY
		nguoi_dung.THOI_DIEM_TAO DESC
	LIMIT 
		0 , 8;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `user_update`(IN `id` int,IN `url_dai_dien` varchar(200),IN `ngay_sinh` date, IN `ho_ten` varchar(200),IN `gioi_tinh` tinyint,IN `dia_chi` varchar(200),IN `email` varchar(256),IN `sdt` char(20),IN `tk` varchar(128),IN `mk` varchar(128),IN `mk_goc` varchar(128),IN `quyen_han` tinyint,IN `trang_thai` tinyint, IN `cau_noi` varchar(1024))
BEGIN
	#Routine body goes here...
	UPDATE nguoi_dung 
			SET nguoi_dung.URL_DAI_DIEN = COALESCE(`url_dai_dien`,nguoi_dung.URL_DAI_DIEN),
					nguoi_dung.HO_TEN = COALESCE(`ho_ten`,nguoi_dung.HO_TEN),
					nguoi_dung.NGAY_SINH = COALESCE(`ngay_sinh`,nguoi_dung.NGAY_SINH),
					nguoi_dung.GIOI_TINH = COALESCE(`gioi_tinh`,nguoi_dung.GIOI_TINH),
					nguoi_dung.DIA_CHI = COALESCE(`dia_chi`,nguoi_dung.DIA_CHI),
					nguoi_dung.EMAIL = COALESCE(`email`,nguoi_dung.EMAIL),
					nguoi_dung.SDT = COALESCE(`sdt`,nguoi_dung.SDT),
					nguoi_dung.TAI_KHOAN = COALESCE(`tk`,nguoi_dung.TAI_KHOAN),
					nguoi_dung.MAT_KHAU = COALESCE(`mk`,nguoi_dung.MAT_KHAU),
					nguoi_dung.MAT_KHAU_GOC = COALESCE(`mk_goc`,nguoi_dung.MAT_KHAU_GOC),
					nguoi_dung.QUYEN_HAN = COALESCE(`quyen_han`,nguoi_dung.QUYEN_HAN),
					nguoi_dung.TRANG_THAI = COALESCE(`trang_thai`,nguoi_dung.TRANG_THAI),
					nguoi_dung.CAU_NOI = COALESCE(`cau_noi`,nguoi_dung.CAU_NOI)
			WHERE nguoi_dung.ID = `id`;
END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `contact_count`(`key` varchar(256), `trang_thai` tinyint, `da_xem` tinyint, `quan_trong` tinyint, `spam` tinyint, `rac` tinyint) RETURNS int(11)
BEGIN
	DECLARE ts_lh int; 	
	SET ts_lh = 0;
	SELECT 
		COUNT(*) INTO ts_lh
	FROM
		lien_he
	WHERE
			(lien_he.TIEU_DE LIKE CONCAT('%',`key` ,'%') OR `key` IS NULL) AND
			(lien_he.TRANG_THAI = `trang_thai` OR `trang_thai` IS NULL) AND
			(lien_he.DA_XEM = `da_xem` OR `da_xem` IS NULL) AND
			(lien_he.QUAN_TRONG = `quan_trong` OR `quan_trong` IS NULL) AND
			(lien_he.SPAM = `spam` OR `spam` IS NULL) AND
			(lien_he.RAC = `rac` OR `rac` IS NULL);

	return ts_lh;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `idea_count`() RETURNS int(11)
BEGIN
	DECLARE ts_y_tuong int; 	
	SET ts_y_tuong = 0;
	SELECT 
		COUNT(*) INTO ts_y_tuong
	FROM
		y_tuong;

	return ts_y_tuong;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `solution_count`() RETURNS int(11)
BEGIN
	DECLARE ts_van_de int; 	
	SET ts_van_de = 0;
	SELECT 
		COUNT(*) INTO ts_van_de
	FROM
		van_de;

	return ts_van_de;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `user_count`(`key` varchar(128)) RETURNS int(11)
BEGIN
	DECLARE ts_nguoi_dung int; 	
	SET ts_nguoi_dung = 0;

	SELECT 
		COUNT(*) INTO ts_nguoi_dung
	FROM
		nguoi_dung
	WHERE
		(nguoi_dung.TAI_KHOAN LIKE CONCAT('%',`key` ,'%') OR `key` IS NULL) OR
		(nguoi_dung.HO_TEN LIKE CONCAT('%',`key` ,'%') OR `key` IS NULL);

	RETURN ts_nguoi_dung;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bau_chon_phan_hoi`
--

CREATE TABLE IF NOT EXISTS `bau_chon_phan_hoi` (
  `ID` int(10) unsigned NOT NULL,
  `BAU_CHON` bit(1) NOT NULL,
  `ID_NGUOI_DUNG` int(11) NOT NULL,
  `ID_PHAN_HOI` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bau_chon_phan_hoi`
--

INSERT INTO `bau_chon_phan_hoi` (`ID`, `BAU_CHON`, `ID_NGUOI_DUNG`, `ID_PHAN_HOI`) VALUES
(1, b'1', 1, 5),
(2, b'1', 3, 5),
(3, b'1', 5, 1),
(4, b'1', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bau_chon_tra_loi`
--

CREATE TABLE IF NOT EXISTS `bau_chon_tra_loi` (
  `ID` int(10) unsigned NOT NULL,
  `BAU_CHON` bit(1) NOT NULL,
  `ID_NGUOI_DUNG` int(11) NOT NULL,
  `ID_TRA_LOI` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bau_chon_tra_loi`
--

INSERT INTO `bau_chon_tra_loi` (`ID`, `BAU_CHON`, `ID_NGUOI_DUNG`, `ID_TRA_LOI`) VALUES
(1, b'0', 1, 1),
(2, b'1', 3, 1),
(4, b'1', 4, 1),
(5, b'1', 1, 2),
(6, b'1', 7, 2),
(7, b'1', 8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ds_theo_doi`
--

CREATE TABLE IF NOT EXISTS `ds_theo_doi` (
  `ID` int(10) unsigned NOT NULL,
  `ID_VAN_DE` int(11) DEFAULT NULL,
  `ID_Y_TUONG` int(11) DEFAULT NULL,
  `ID_NGUOI_DUNG` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ds_theo_doi`
--

INSERT INTO `ds_theo_doi` (`ID`, `ID_VAN_DE`, `ID_Y_TUONG`, `ID_NGUOI_DUNG`) VALUES
(1, 1, 2, 3),
(2, 2, 3, 3),
(3, 1, NULL, 4),
(4, 4, 1, 5),
(5, 2, NULL, 4),
(7, 9, NULL, 6),
(11, 4, 7, 3);

-- --------------------------------------------------------

--
-- Table structure for table `lien_he`
--

CREATE TABLE IF NOT EXISTS `lien_he` (
  `ID` int(11) NOT NULL,
  `ID_PHAN_HOI` text,
  `ID_NGUOI_LIEN_HE` int(11) DEFAULT NULL,
  `HO_TEN` varchar(200) NOT NULL,
  `EMAIL` varchar(256) NOT NULL,
  `TIEU_DE` varchar(256) NOT NULL,
  `DU_LIEU_LIEN_HE` varchar(128) NOT NULL,
  `TRANG_THAI` tinyint(4) NOT NULL DEFAULT '1',
  `THOI_DIEM_CAP_NHAT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `DA_XEM` tinyint(4) NOT NULL DEFAULT '2',
  `QUAN_TRONG` tinyint(4) NOT NULL DEFAULT '2',
  `SPAM` tinyint(4) DEFAULT '2',
  `RAC` tinyint(4) NOT NULL DEFAULT '2'
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lien_he`
--

INSERT INTO `lien_he` (`ID`, `ID_PHAN_HOI`, `ID_NGUOI_LIEN_HE`, `HO_TEN`, `EMAIL`, `TIEU_DE`, `DU_LIEU_LIEN_HE`, `TRANG_THAI`, `THOI_DIEM_CAP_NHAT`, `DA_XEM`, `QUAN_TRONG`, `SPAM`, `RAC`) VALUES
(1, '1_Ngô Giang Thanh ++./uploads/images/avatar/ngogiangthanh.jpg[]3_anonymous1 ++./uploads/images/avatar/anonymous1.jpg', 4, 'Anonymous 1', 'anonymous1@gmail.com', 'Liên hệ số 1 tiêu đề hơi bị dài luôn đó nhá!', './backend/data/1.txt', 4, '2017-04-22 10:59:49', 2, 2, 2, 1),
(2, '1_Ngô Giang Thanh ++./uploads/images/avatar/ngogiangthanh.jpg', 4, 'Anonymous 2', 'anonymous2@gmail.com', 'Liên hệ số 2 tiêu đề hơi bị dài luôn đó nhá!', './backend/data/2.txt', 4, '2017-04-22 10:50:44', 2, 2, 2, 1),
(3, '1_Ngô Giang Thanh ++./uploads/images/avatar/ngogiangthanh.jpg', 4, 'Anonymous 2', 'anonymous2@gmail.com', 'Liên hệ số 3 tiêu đề hơi bị dài luôn đó nhá!', './backend/data/3.txt', 4, '2017-04-22 10:50:49', 2, 2, 2, 1),
(4, '1_Ngô Giang Thanh ++./uploads/images/avatar/ngogiangthanh.jpg', 6, 'Anonymous 3', 'anonymous3@gmail.com', 'Liên hệ số 4 tiêu đề hơi bị dài luôn đó nhá!', './backend/data/4.txt', 4, '2017-04-22 10:50:49', 2, 2, 2, 1),
(5, '1_Ngô Giang Thanh ++./uploads/images/avatar/ngogiangthanh.jpg', 7, 'Anonymous 4', 'anonymous4@gmail.com', 'Liên hệ số 5 tiêu đề hơi bị dài luôn đó nhá!', './backend/data/5.txt', 4, '2017-04-22 10:50:50', 2, 2, 2, 1),
(6, '1_Ngô Giang Thanh ++./uploads/images/avatar/ngogiangthanh.jpg', 7, 'Anonymous 5', 'anonymous5@gmail.com', 'Liên hệ số 6 tiêu đề hơi bị dài luôn đó nhá!', './backend/data/6.txt', 4, '2017-04-22 10:50:50', 2, 2, 2, 1),
(7, '1_Ngô Giang Thanh ++./uploads/images/avatar/ngogiangthanh.jpg', 8, 'Anonymous 5', 'anonymous5@gmail.com', 'Liên hệ số 7 tiêu đề hơi bị dài luôn đó nhá!', './backend/data/7.txt', 3, '2017-04-22 10:50:51', 2, 1, 2, 2),
(8, '1_Ngô Giang Thanh ++./uploads/images/avatar/ngogiangthanh.jpg', 9, 'Anonymous 6', 'anonymous6@gmail.com', 'Liên hệ số 8 tiêu đề hơi bị dài luôn đó nhá!', './backend/data/8.txt', 4, '2017-04-22 10:50:51', 2, 2, 2, 1),
(9, '1_Ngô Giang Thanh ++./uploads/images/avatar/ngogiangthanh.jpg', 10, 'Anonymous 7', 'anonymous7@gmail.com', 'Liên hệ số 9 tiêu đề hơi bị dài luôn đó nhá!', './backend/data/9.txt', 2, '2017-04-22 10:50:51', 2, 1, 2, 2),
(10, '1_Ngô Giang Thanh ++./uploads/images/avatar/ngogiangthanh.jpg', 11, 'Anonymous 8', 'anonymous8@gmail.com', 'Liên hệ số 10 tiêu đề hơi bị dài luôn đó nhá!', './backend/data/10.txt', 4, '2017-04-22 10:50:52', 2, 2, 2, 1),
(11, '1_Ngô Giang Thanh ++./uploads/images/avatar/ngogiangthanh.jpg', 12, 'Anonymous 9', 'anonymous9@gmail.com', 'Liên hệ số 11 tiêu đề hơi bị dài luôn đó nhá!', './backend/data/11.txt', 4, '2017-04-22 10:50:58', 2, 2, 2, 1),
(12, '1_Ngô Giang Thanh ++./uploads/images/avatar/ngogiangthanh.jpg', 12, 'Anonymous 10', 'anonymous10@gmail.com', 'Liên hệ số 12 tiêu đề hơi bị dài luôn đó nhá!', './backend/data/12.txt', 4, '2017-04-22 10:50:57', 2, 2, 2, 1),
(13, '1_Ngô Giang Thanh ++./uploads/images/avatar/ngogiangthanh.jpg', NULL, 'guest 1', 'guest1@gmail.com', 'Liên hệ số 13 tiêu đề hơi bị dài luôn đó nhá!', './backend/data/13.txt', 3, '2017-04-22 10:50:57', 2, 2, 2, 2),
(14, '1_Ngô Giang Thanh ++./uploads/images/avatar/ngogiangthanh.jpg', 13, 'Anonymous 11', 'anonymous11@gmail.com', 'Liên hệ số 14 tiêu đề hơi bị dài luôn đó nhá!', './backend/data/14.txt', 1, '2017-04-22 10:50:56', 2, 2, 2, 2),
(15, '1_Ngô Giang Thanh ++./uploads/images/avatar/ngogiangthanh.jpg', NULL, 'guest 2', 'guest2@gmail.com', 'Liên hệ số 15 tiêu đề hơi bị dài luôn đó nhá!', './backend/data/15.txt', 4, '2017-04-22 10:50:56', 2, 2, 2, 1),
(16, '1_Ngô Giang Thanh ++./uploads/images/avatar/ngogiangthanh.jpg', 14, 'Anonymous 12', 'anonymous12@gmail.com', 'Liên hệ số 16 tiêu đề hơi bị dài luôn đó nhá!', './backend/data/16.txt', 1, '2017-04-22 11:27:28', 2, 1, 2, 2),
(17, '1_Ngô Giang Thanh ++./uploads/images/avatar/ngogiangthanh.jpg', 15, 'Anonymous 13', 'anonymous13@gmail.com', 'Liên hệ số 17 tiêu đề hơi bị dài luôn đó nhá!', './backend/data/17.txt', 4, '2017-04-22 11:27:31', 2, 2, 2, 1),
(18, '1_Ngô Giang Thanh ++./uploads/images/avatar/ngogiangthanh.jpg', NULL, 'guest 3', 'guest3@gmail.com', 'Liên hệ số 18 tiêu đề hơi bị dài luôn đó nhá!', './backend/data/18.txt', 4, '2017-04-22 11:27:32', 2, 2, 2, 1),
(19, '1_Ngô Giang Thanh ++./uploads/images/avatar/ngogiangthanh.jpg', NULL, 'Anonymous 14', 'anonymous14@gmail.com', 'Liên hệ số 19 tiêu đề hơi bị dài luôn đó nhá!', './backend/data/19.txt', 4, '2017-04-22 11:27:33', 2, 2, 2, 1),
(20, '1_Ngô Giang Thanh ++./uploads/images/avatar/ngogiangthanh.jpg', 17, 'Anonymous 15', 'anonymous15@gmail.com', 'Liên hệ số 20 tiêu đề hơi bị dài luôn đó nhá!', './backend/data/20.txt', 1, '2017-04-22 10:50:53', 2, 2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `linh_vuc`
--

CREATE TABLE IF NOT EXISTS `linh_vuc` (
  `ID` int(11) NOT NULL,
  `TEN_LINH_VUC` varchar(200) NOT NULL DEFAULT 'Tên lĩnh vực',
  `MO_TA_LINH_VUC` text NOT NULL,
  `URL_THUMNAIL` varchar(100) NOT NULL DEFAULT 'default.png',
  `URL_MENU` varchar(20) NOT NULL,
  `THU_TU` tinyint(4) NOT NULL,
  `HIEN_THI` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `linh_vuc`
--

INSERT INTO `linh_vuc` (`ID`, `TEN_LINH_VUC`, `MO_TA_LINH_VUC`, `URL_THUMNAIL`, `URL_MENU`, `THU_TU`, `HIEN_THI`) VALUES
(1, 'Công nghệ Thông tin', 'Các ý tưởng khởi nghiệp thuộc lĩnh vực Công nghệ Thông tin', './uploads/images/category/it-solution.jpg', 'it-solution', 1, b'1'),
(2, 'Công nghệ thực phẩm', 'Các ý tưởng khởi nghiệp thuộc lĩnh vực Công nghệ Thực phẩm', './uploads/images/category/food-technology.jpg', 'food-technology', 2, b'1'),
(3, 'Giải pháp kinh doanh', 'Các ý tưởng khởi nghiệp thuộc lĩnh vực Giải pháp kinh Doanh', './uploads/images/category/business-solution.jpg', 'business-solution', 3, b'1'),
(4, 'Tên lĩnh vực demo', 'Các ý tưởng khởi nghiệp lĩnh vực demo', './uploads/images/category/default.jpg', 'demo-solution', 4, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `nguoi_dung`
--

CREATE TABLE IF NOT EXISTS `nguoi_dung` (
  `ID` int(11) NOT NULL,
  `URL_DAI_DIEN` varchar(200) DEFAULT './uploads/images/avatar/default.png',
  `HO_TEN` varchar(200) NOT NULL DEFAULT 'Ẩn danh',
  `NGAY_SINH` date NOT NULL DEFAULT '1992-01-01',
  `GIOI_TINH` tinyint(4) NOT NULL DEFAULT '3',
  `EMAIL` varchar(256) NOT NULL DEFAULT 'Không email',
  `DIA_CHI` varchar(200) NOT NULL DEFAULT 'Không địa chỉ',
  `SDT` char(20) NOT NULL DEFAULT 'Không sđt',
  `TAI_KHOAN` varchar(128) NOT NULL,
  `MAT_KHAU` varchar(128) NOT NULL,
  `MAT_KHAU_GOC` varchar(128) NOT NULL,
  `QUYEN_HAN` tinyint(4) NOT NULL DEFAULT '1',
  `TRANG_THAI` tinyint(4) NOT NULL DEFAULT '3',
  `THOI_DIEM_TAO` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CAU_NOI` varchar(1024) NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nguoi_dung`
--

INSERT INTO `nguoi_dung` (`ID`, `URL_DAI_DIEN`, `HO_TEN`, `NGAY_SINH`, `GIOI_TINH`, `EMAIL`, `DIA_CHI`, `SDT`, `TAI_KHOAN`, `MAT_KHAU`, `MAT_KHAU_GOC`, `QUYEN_HAN`, `TRANG_THAI`, `THOI_DIEM_TAO`, `CAU_NOI`) VALUES
(1, './uploads/images/avatar/ngogiangthanh.jpg', 'Ngô Giang Thanh', '1992-02-08', 1, 'thanhthanh1516@gmail.com', '132/28, đường 3 tháng 2, p. Hưng Lợi, q. Ninh Kiều, tp. Cần Thơ', '0946344233', 'ngogiangthanh', '3709a5fc9f1dc01159794fe0f31d8d33', '16753491516', 2, 1, '2017-03-01 19:22:30', 'Người không vì mình trời chu đất diệt'),
(3, './uploads/images/avatar/anonymous1.jpg', 'anonymous1', '1992-01-01', 3, 'Không email', 'Không địa chỉ', 'Không sđt', 'anonymous1', '35705de1978a792d689f6725d5926225', '1675349', 2, 1, '2017-03-02 19:22:35', 'Cùng nhau chia sẽ, lâu lâu mới hiểu'),
(4, './uploads/images/avatar/anonymous2.jpg', 'anonymous2', '1992-02-11', 3, 'Không email', 'Không địa chỉ', 'Không sđt', 'anonymous2', '35705de1978a792d689f6725d5926225', '1675349', 1, 1, '2017-03-03 09:22:35', 'Cùng nhau chia sẽ, lâu lâu mới hiểu'),
(5, './uploads/images/avatar/default.png', 'anonymous3', '1992-03-01', 3, 'Không email', 'Không địa chỉ', 'Không sđt', 'anonymous3', '35705de1978a792d689f6725d5926225', '1675349', 1, 2, '2017-03-03 19:22:35', 'Cùng nhau chia sẽ, lâu lâu mới hiểu'),
(6, './uploads/images/avatar/default.png', 'anonymous4', '1992-04-01', 3, 'Không email', 'Không địa chỉ', 'Không sđt', 'anonymous4', '35705de1978a792d689f6725d5926225', '1675349', 1, 2, '2017-03-04 19:22:35', 'Cùng nhau chia sẽ, lâu lâu mới hiểu'),
(7, './uploads/images/avatar/default.png', 'anonymous5', '1992-05-01', 3, 'Không email', 'Không địa chỉ', 'Không sđt', 'anonymous5', '35705de1978a792d689f6725d5926225', '1675349', 1, 3, '2017-03-05 19:22:35', 'Cùng nhau chia sẽ, lâu lâu mới hiểu'),
(8, './uploads/images/avatar/anonymous6.jpg', 'anonymous6', '1992-01-01', 3, 'Không email', 'Không địa chỉ', 'Không sđt', 'anonymous6', '35705de1978a792d689f6725d5926225', '1675349', 1, 3, '2017-03-06 19:22:35', 'Cùng nhau chia sẽ, lâu lâu mới hiểu'),
(9, './uploads/images/avatar/anonymous7.jpg', 'anonymous7', '1992-01-01', 3, 'Không email', 'Không địa chỉ', 'Không sđt', 'anonymous7', '35705de1978a792d689f6725d5926225', '1675349', 1, 2, '2017-03-07 09:22:35', 'Cùng nhau chia sẽ, lâu lâu mới hiểu'),
(10, './uploads/images/avatar/anonymous8.jpg', 'anonymous8', '1992-01-01', 3, 'Không email', 'Không địa chỉ', 'Không sđt', 'anonymous8', '35705de1978a792d689f6725d5926225', '1675349', 1, 3, '2017-03-07 19:22:35', 'Cùng nhau chia sẽ, lâu lâu mới hiểu'),
(11, './uploads/images/avatar/anonymous09.jpg', 'anonymous9', '1992-01-01', 3, 'Không email', 'Không địa chỉ', 'Không sđt', 'anonymous9', '35705de1978a792d689f6725d5926225', '1675349', 1, 1, '2017-03-08 19:22:35', 'Cùng nhau chia sẽ, lâu lâu mới hiểu'),
(12, './uploads/images/avatar/anonymous10.jpg', 'anonymous10', '1992-01-01', 3, 'Không email', 'Không địa chỉ', 'Không sđt', 'anonymous10', '35705de1978a792d689f6725d5926225', '1675349', 1, 3, '2017-03-10 17:22:35', 'Cùng nhau chia sẽ, lâu lâu mới hiểu'),
(13, './uploads/images/avatar/anonymous11.jpg', 'anonymous11', '1992-01-01', 3, 'Không email', 'Không địa chỉ', 'Không sđt', 'anonymous11', '35705de1978a792d689f6725d5926225', '1675349', 1, 3, '2017-03-10 18:22:35', 'Cùng nhau chia sẽ, lâu lâu mới hiểu'),
(14, './uploads/images/avatar/anonymous12.jpg', 'anonymous12', '1992-01-01', 3, 'Không email', 'Không địa chỉ', 'Không sđt', 'anonymous12', '35705de1978a792d689f6725d5926225', '1675349', 1, 1, '2017-03-10 19:22:35', 'Cùng nhau chia sẽ, lâu lâu mới hiểu'),
(15, './uploads/images/avatar/anonymous13.jpg', 'anonymous13', '1992-01-03', 2, 'anonymous13@gmail.com', 'Không địa chỉ', 'Không sđt', 'anonymous13', '35705de1978a792d689f6725d5926225', '1675349', 1, 1, '2017-03-10 19:42:35', 'Cùng nhau chia sẽ, lâu lâu mới hiểu'),
(17, './uploads/images/avatar/anonymous15.jpg', 'anonymous15', '1992-01-01', 3, 'Không email', 'Không địa chỉ', 'Không sđt', 'anonymous15', '35705de1978a792d689f6725d5926225', '1675349', 1, 1, '2017-03-25 08:22:35', 'Cùng nhau chia sẽ, lâu lâu mới hiểu'),
(18, './uploads/images/avatar/anonymous16.jpg', 'NGUYỄN THANH QUY', '1992-01-01', 1, 'Không email', 'Không địa chỉ', 'Không sđt', 'anonymous16', '35705de1978a792d689f6725d5926225', '1675349', 1, 3, '2017-03-26 09:22:35', 'Cùng nhau chia sẽ, lâu lâu mới hiểu'),
(23, './uploads/images/avatar/dsfdsf.jpg', 'gsdf', '2017-03-03', 1, 'thanhthanh1516@gmail.com', 'fdsfds', 'fsdfdsfdsfsd', 'dsfdsf', 'f35e1aa017bc04bd1fb020a96ef543ba', 'oxnwxw29', 1, 1, '2017-03-28 17:03:10', 'fdsfds');

-- --------------------------------------------------------

--
-- Table structure for table `phan_hoi`
--

CREATE TABLE IF NOT EXISTS `phan_hoi` (
  `ID` int(11) NOT NULL,
  `ID_Y_TUONG` int(11) NOT NULL,
  `ID_NGUOI_DUNG` int(11) NOT NULL,
  `NOI_DUNG_PHAN_HOI` text NOT NULL,
  `DANH_GIA` tinyint(4) NOT NULL DEFAULT '1',
  `THOI_DIEM_DANG` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `THOI_DIEM_CHINH_SUA` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `QUYEN_XEM` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phan_hoi`
--

INSERT INTO `phan_hoi` (`ID`, `ID_Y_TUONG`, `ID_NGUOI_DUNG`, `NOI_DUNG_PHAN_HOI`, `DANH_GIA`, `THOI_DIEM_DANG`, `THOI_DIEM_CHINH_SUA`, `QUYEN_XEM`) VALUES
(1, 1, 3, 'Phản hồi 1', 5, '2017-03-24 09:31:24', '0000-00-00 00:00:00', 1),
(2, 1, 4, 'Phản hồi 2', 4, '2017-03-24 09:31:37', '0000-00-00 00:00:00', 1),
(3, 3, 8, 'Phản hồi 3', 1, '2017-03-24 09:32:15', '2017-03-24 02:32:28', 2),
(4, 3, 5, 'Phản hồi 4', 2, '2017-03-24 09:32:56', '0000-00-00 00:00:00', 1),
(5, 2, 1, 'Phản hồi 5', 5, '2017-03-24 09:33:24', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `ID` int(11) NOT NULL,
  `TEN_TAGS` varchar(200) NOT NULL,
  `TUAN_SUAT` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`ID`, `TEN_TAGS`, `TUAN_SUAT`) VALUES
(1, 'công nghệ thông tin', 11),
(2, 'công nghệ thông minh', 11),
(3, 'công nghệ thực phẩm', 10),
(4, 'thực phẩm sạch', 10),
(5, 'giải pháp kinh doanh', 10),
(6, 'kinh doanh số', 18),
(7, 'vấn đề số', 9),
(8, 'giải pháp số', 9),
(9, 'vấn đề kinh doanh', 8);

-- --------------------------------------------------------

--
-- Table structure for table `thong_tin_to_chuc`
--

CREATE TABLE IF NOT EXISTS `thong_tin_to_chuc` (
  `ID` int(10) unsigned NOT NULL,
  `THONG_TIN_TO_CHUC` text NOT NULL,
  `LOAI_THONG_TIN` tinyint(4) NOT NULL,
  `THOI_DIEM_CAP_NHAT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ID_NGUOI_DUNG` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thong_tin_to_chuc`
--

INSERT INTO `thong_tin_to_chuc` (`ID`, `THONG_TIN_TO_CHUC`, `LOAI_THONG_TIN`, `THOI_DIEM_CAP_NHAT`, `ID_NGUOI_DUNG`) VALUES
(1, '<h1>Tìm thấy nhiều vật dụng của bé gái người Việt bị sát hại ở Nhật</h1>\r\n\r\n<p>Cặp sách và một số vật dụng khác mà bé Lê Thị Nhật Linh mang theo vào ngày bị bắt cóc đã được tìm thấy ven sông Tone thuộc tỉnh Ibaraki hôm 28/3.</p>\r\n\r\n<p>Báo <em>Mainichi </em>cho biết ba của bé Linh đã xác nhận đây chính là chiếc cặp của con gái anh. Sông Tone thuộc thành phố Bando, tỉnh Ibaraki. Nơi này cách điểm phát hiện thi thể bé Linh ở con kênh tại Abiko, tỉnh Chiba, khoảng 10 km về hướng tây bắc.</p>\r\n\r\n<table align="center">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt="Tim thay nhieu vat dung cua be gai nguoi Viet bi sat hai o Nhat hinh anh 1" src="http://znews-photo.d.za.zdn.vn/w660/Uploaded/zugtwi/2017_03_29/nhat1_mcww.jpg" style="height:521px; width:1024px" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Cảnh sát Nhật Bản tại hiện trường tìm thấy thi thể bé Linh. Ảnh: <em>ANN</em>.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Bên cạnh đó, tại bãi cỏ cách điểm tìm thấy cặp của bé Linh khoảng 500 m, cảnh sát cũng phát hiện một bộ quần áo bé gái giống với trang phục mà nạn nhân đã mặc đến trường trong ngày cô bé bị bắt cóc. Cảnh sát đang xác minh liệu bộ đồ này có phải chính là của bé Linh hay không, cũng như khả năng hung thủ đang cố tình phi tang bằng chứng liên quan đến vụ án.</p>\r\n\r\n<p>Đến nay chưa có người nào cung cấp thông tin cho cảnh sát về đối tượng khả nghi có hành động như ném quần áo hoặc vật dụng xuống sông. Trong diễn biến khác, cảnh sát Chiba cho biết có nhiều tin nhắn bí ẩn trên mạng hé mở về địa điểm phát hiện thi thể bé Linh.</p>\r\n\r\n<p>"Ai đó đã đăng tin nhắn này lên mạng vào 21h ngày 24/3 (hơn 12 tiếng sau khi bé Linh mất tích - PV), nói rằng &#39;Khi trời ấm hơn, hãy tìm kiếm ở con kênh xem có thi thể cô gái nào không&#39;", một cảnh sát kể lại với <em>Kyodo</em>.</p>\r\n\r\n<p>Một tin nhắn khác nói rõ ràng hơn: "Hãy tìm kiếm ở con kênh". Một tiếng sau, cảnh sát phát hiện thi thể bé Linh tại con kênh ở Abiko.</p>\r\n\r\n<p>Khoảng 8h40 ngày 24/3, không thấy cháu Linh đến trường, giáo viên thông báo cho gia đình. Tìm kiếm xung quanh khu vực trường không thấy cháu, bố bé gái trình báo cảnh sát Abiko, Nhật Bản. Sáng sớm 26/3, thi thể cháu bé được tìm thấy cạnh bãi cỏ bên con sông tại thành phố Abiko, tỉnh Chiba, cách nhà bé khoảng 10 km.</p>\r\n\r\n<p>Qua khám nghiệm, cảnh sát ước tính bé Linh có thể bị sát hại vào khoảng từ sáng 24/3 đến đêm 25/3. Không loại trừ khả năng em bị giết ngay sau khi bị bắt cóc, lúc đang trên đường tới trường vào thứ sáu tuần trước. Nguyên nhân gây tử vong của bé là do bị siết cổ. Cơ thể của nạn nhân có dấu hiệu bị xâm hại tình dục.</p>\r\n\r\n<p>Cái chết của bé Nhật Linh gây chấn động đối với người dân địa phương ở tỉnh Chiba và truyền thông Nhật Bản. Bộ Ngoại giao Việt Nam đã chỉ đạo đại sứ quán tại Nhật Bản khẩn trương làm việc với các cơ quan chức năng sở tại yêu cầu phía Nhật Bản xác định nguyên nhân tử vong, điều tra, truy bắt hung thủ và xét xử nghiêm theo đúng các quy định pháp luật.</p>\r\n\r\n<p><strong>Mương nước nơi tìm thấy xác bé gái Việt bị giết hại ở Nhật</strong> Thi thể bé Lê Thị Nhật Linh được tìm thấy tại một mương thoát nước cách nhà khoảng 10 km trong tình trạng không quần áo và có dấu hiệu bị xâm hại tình dục trước khi chết.</p>\r\n', 1, '2017-03-29 07:49:01', 3),
(2, '<p>VCCI CẦN THƠ</p>\r\n\r\n<p>Điện thoại: (0710) 3 824918</p>\r\n\r\n<p>Fax: (0710) 3 824169</p>\r\n\r\n<p>Email: contact@vccimekong.com.vn</p>\r\n\r\n<p>Địa chỉ: 12 Hòa Bình, Q. Ninh Kiều, Tp Cần Thơ</p>\r\n', 3, '2017-03-29 09:11:21', 1),
(3, './uploads/images/org_logo.png', 4, '2017-03-30 10:06:18', 1),
(4, 'Mẫu tin về cuộc thi 1', 6, '2017-03-29 07:47:52', 1),
(5, 'Mẫu tin về cuộc thi 2', 6, '2017-03-29 07:47:44', 1),
(6, 'AIzaSyDPIECBsdxF1HplLrJzEm0oB0PiMVhfGLg[]VCCI Cần Thơ', 2, '2017-03-30 10:11:04', 1),
(7, './uploads/images/org_logo.ico', 5, '2017-03-30 10:10:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tra_loi`
--

CREATE TABLE IF NOT EXISTS `tra_loi` (
  `ID` int(11) NOT NULL,
  `ID_NGUOI_DUNG` int(11) NOT NULL,
  `ID_VAN_DE` int(11) NOT NULL,
  `NOI_DUNG` text NOT NULL,
  `DANH_GIA` tinyint(4) NOT NULL DEFAULT '1',
  `THOI_DIEM_DANG` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `THOI_DIEM_CHINH_SUA` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `QUYEN_XEM` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tra_loi`
--

INSERT INTO `tra_loi` (`ID`, `ID_NGUOI_DUNG`, `ID_VAN_DE`, `NOI_DUNG`, `DANH_GIA`, `THOI_DIEM_DANG`, `THOI_DIEM_CHINH_SUA`, `QUYEN_XEM`) VALUES
(1, 8, 1, 'Trả lời vấn đề 1', 5, '2017-03-24 09:34:22', '0000-00-00 00:00:00', 1),
(2, 9, 1, 'Trả lời vấn đề 2', 1, '2017-03-24 09:35:47', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `van_de`
--

CREATE TABLE IF NOT EXISTS `van_de` (
  `ID` int(11) NOT NULL,
  `ID_NGUOI_DUNG` int(11) NOT NULL,
  `URL_THUMBNAIL` varchar(200) NOT NULL DEFAULT 'default.jpg',
  `TIEU_DE_VAN_DE` varchar(256) NOT NULL,
  `MO_TA_VAN_DE` text NOT NULL,
  `TAGS` varchar(500) DEFAULT NULL,
  `TRANG_THAI` tinyint(4) NOT NULL DEFAULT '1',
  `LUOT_XEM` int(11) NOT NULL DEFAULT '1',
  `TRUNG_BINH_DANH_GIA` float NOT NULL DEFAULT '0',
  `THOI_DIEM_DANG` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `THOI_DIEM_CHINH_SUA` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `van_de`
--

INSERT INTO `van_de` (`ID`, `ID_NGUOI_DUNG`, `URL_THUMBNAIL`, `TIEU_DE_VAN_DE`, `MO_TA_VAN_DE`, `TAGS`, `TRANG_THAI`, `LUOT_XEM`, `TRUNG_BINH_DANH_GIA`, `THOI_DIEM_DANG`, `THOI_DIEM_CHINH_SUA`) VALUES
(1, 1, 'default.jpg', 'Tiêu đề vấn đề cần tìm kiếm giải pháp thứ 1', 'Mô tả vấn đề cần tìm kiếm giải pháp thứ 1', 'vấn đề số, giải pháp số', 1, 1, 3, '2017-03-22 20:42:05', '2017-03-24 02:35:57'),
(2, 3, 'default.jpg', 'Tiêu đề vấn đề cần tìm kiếm giải pháp thứ 2', 'Mô tả vấn đề cần tìm kiếm giải pháp thứ 2', 'vấn đề kinh doanh, kinh doanh số', 1, 1, 0, '2017-03-22 20:42:14', '2017-03-22 14:47:06'),
(3, 4, 'default.jpg', 'Tiêu đề vấn đề cần tìm kiếm giải pháp thứ 3', 'Mô tả vấn đề cần tìm kiếm giải pháp thứ 3', 'vấn đề số, giải pháp số', 1, 1, 0, '2017-03-22 20:42:20', '2017-03-22 14:46:52'),
(4, 1, 'default.jpg', 'Tiêu đề vấn đề cần tìm kiếm giải pháp thứ 4', 'Mô tả vấn đề cần tìm kiếm giải pháp thứ 4', 'vấn đề kinh doanh, kinh doanh số', 2, 1, 0, '2017-03-22 20:42:30', '2017-03-22 14:47:45'),
(6, 5, 'default.jpg', 'Tiêu đề vấn đề cần tìm kiếm giải pháp thứ 5', 'Mô tả vấn đề cần tìm kiếm giải pháp thứ 5', 'vấn đề số, giải pháp số', 1, 1, 0, '2017-03-22 20:57:22', '2017-03-22 14:47:18'),
(7, 7, 'default.jpg', 'Tiêu đề vấn đề cần tìm kiếm giải pháp thứ 6', 'Mô tả vấn đề cần tìm kiếm giải pháp thứ 6', 'vấn đề kinh doanh, kinh doanh số', 1, 1, 0, '2017-03-22 20:57:24', '2017-03-22 14:47:18'),
(8, 11, 'default.jpg', 'Tiêu đề vấn đề cần tìm kiếm giải pháp thứ 7', 'Mô tả vấn đề cần tìm kiếm giải pháp thứ 7', 'vấn đề số, giải pháp số', 1, 1, 0, '2017-03-22 20:57:25', '2017-03-22 14:47:18'),
(9, 1, 'default.jpg', 'Tiêu đề vấn đề cần tìm kiếm giải pháp thứ 8', 'Mô tả vấn đề cần tìm kiếm giải pháp thứ 8', 'vấn đề kinh doanh, kinh doanh số', 2, 1, 0, '2017-03-22 20:57:25', '2017-03-22 14:47:39'),
(11, 1, 'default.jpg', 'Tiêu đề vấn đề cần tìm kiếm giải pháp thứ 9', 'Mô tả vấn đề cần tìm kiếm giải pháp thứ 9', 'vấn đề số, giải pháp số', 1, 1, 0, '2017-03-22 20:57:28', '2017-03-22 14:47:21'),
(12, 11, 'default.jpg', 'Tiêu đề vấn đề cần tìm kiếm giải pháp thứ 10', 'Mô tả vấn đề cần tìm kiếm giải pháp thứ 10', 'vấn đề kinh doanh, kinh doanh số', 1, 1, 0, '2017-03-22 20:57:29', '2017-03-22 14:47:21'),
(13, 12, 'default.jpg', 'Tiêu đề vấn đề cần tìm kiếm giải pháp thứ 11', 'Mô tả vấn đề cần tìm kiếm giải pháp thứ 11', 'vấn đề số, giải pháp số', 1, 1, 0, '2017-03-22 20:57:30', '2017-03-22 14:47:21'),
(14, 1, 'default.jpg', 'Tiêu đề vấn đề cần tìm kiếm giải pháp thứ 12', 'Mô tả vấn đề cần tìm kiếm giải pháp thứ 12', 'vấn đề kinh doanh, kinh doanh số', 1, 1, 0, '2017-03-22 20:57:31', '2017-03-22 14:47:21'),
(15, 3, 'default.jpg', 'Tiêu đề vấn đề cần tìm kiếm giải pháp thứ 13', 'Mô tả vấn đề cần tìm kiếm giải pháp thứ 13', 'vấn đề số, giải pháp số', 2, 1, 0, '2017-03-22 20:57:32', '2017-03-22 14:47:41'),
(16, 4, 'default.jpg', 'Tiêu đề vấn đề cần tìm kiếm giải pháp thứ 14', 'Mô tả vấn đề cần tìm kiếm giải pháp thứ 14', 'vấn đề kinh doanh, kinh doanh số', 1, 1, 0, '2017-03-22 20:57:34', '2017-03-22 14:47:23'),
(17, 7, 'default.jpg', 'Tiêu đề vấn đề cần tìm kiếm giải pháp thứ 15', 'Mô tả vấn đề cần tìm kiếm giải pháp thứ 15', 'vấn đề số, giải pháp số', 1, 1, 0, '2017-03-22 20:58:56', '2017-03-22 14:47:23'),
(18, 5, 'default.jpg', 'Tiêu đề vấn đề cần tìm kiếm giải pháp thứ 16', 'Mô tả vấn đề cần tìm kiếm giải pháp thứ 16', 'vấn đề kinh doanh, kinh doanh số', 3, 1, 0, '2017-03-22 20:58:57', '2017-03-22 14:47:43'),
(19, 8, 'default.jpg', 'Tiêu đề vấn đề cần tìm kiếm giải pháp thứ 17', 'Mô tả vấn đề cần tìm kiếm giải pháp thứ 17', 'vấn đề số, giải pháp số', 1, 1, 0, '2017-03-22 20:58:57', '2017-03-22 15:01:31');

-- --------------------------------------------------------

--
-- Table structure for table `y_tuong`
--

CREATE TABLE IF NOT EXISTS `y_tuong` (
  `ID` int(11) NOT NULL,
  `ID_LINH_VUC` int(11) NOT NULL,
  `ID_NGUOI_DUNG` int(11) NOT NULL,
  `URL_THUMBNAIL` varchar(200) NOT NULL DEFAULT 'default.jpg',
  `THONG_TIN_TAC_GIA` varchar(512) NOT NULL,
  `TEN_Y_TUONG` varchar(256) NOT NULL,
  `TOM_TAT` text NOT NULL,
  `CHI_TIET_Y_TUONG` text NOT NULL,
  `URL_FILE` varchar(200) NOT NULL,
  `TAGS` varchar(500) NOT NULL,
  `TRANG_THAI` tinyint(4) NOT NULL DEFAULT '1',
  `LUOT_XEM` int(11) NOT NULL DEFAULT '1',
  `TRUNG_BINH_DANH_GIA` float NOT NULL DEFAULT '0',
  `THOI_DIEM_DANG` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `THOI_DIEM_CHINH_SUA` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `y_tuong`
--

INSERT INTO `y_tuong` (`ID`, `ID_LINH_VUC`, `ID_NGUOI_DUNG`, `URL_THUMBNAIL`, `THONG_TIN_TAC_GIA`, `TEN_Y_TUONG`, `TOM_TAT`, `CHI_TIET_Y_TUONG`, `URL_FILE`, `TAGS`, `TRANG_THAI`, `LUOT_XEM`, `TRUNG_BINH_DANH_GIA`, `THOI_DIEM_DANG`, `THOI_DIEM_CHINH_SUA`) VALUES
(1, 1, 1, 'default.jpg', 'Tác giả 1', 'Tên ý tưởng thứ 1', 'Đây là phần Tóm tắt nội dung ý tưởng thứ 1', 'Đây là phần chi tiết kỹ thuật của ý tưởng thứ 1', '', 'công nghệ thông tin, công nghệ thông minh', 1, 1, 4.5, '2017-03-22 20:43:00', '2017-03-24 02:31:56'),
(2, 2, 1, 'default.jpg', 'Tác giả 2, tác giả 2''', 'Tên ý tưởng thứ 2', 'Đây là phần Tóm tắt nội dung ý tưởng thứ 2', 'Đây là phần chi tiết kỹ thuật của ý tưởng thứ 2', '', 'giải pháp kinh doanh, kinh doanh số', 1, 1, 5, '2017-03-22 20:43:44', '2017-03-24 02:33:31'),
(3, 3, 1, 'default.jpg', 'Tác giả 3', 'Tên ý tưởng thứ 3', 'Đây là phần Tóm tắt nội dung ý tưởng thứ 3', 'Đây là phần chi tiết kỹ thuật của ý tưởng thứ 3', '', 'công nghệ thực phẩm, thực phẩm sạch', 1, 1, 1.5, '2017-03-22 20:43:54', '2017-03-24 02:33:35'),
(4, 1, 1, 'default.jpg', 'Tác giả 4', 'Tên ý tưởng thứ 4', 'Đây là phần Tóm tắt nội dung ý tưởng thứ 4', 'Đây là phần chi tiết kỹ thuật của ý tưởng thứ 4', '', 'công nghệ thông tin, công nghệ thông minh', 1, 1, 0, '2017-03-22 20:43:59', '2017-03-22 14:40:18'),
(5, 2, 1, 'default.jpg', 'Tác giả 5', 'Tên ý tưởng thứ 5', 'Đây là phần Tóm tắt nội dung ý tưởng thứ 5', 'Đây là phần chi tiết kỹ thuật của ý tưởng thứ 5', '', 'giải pháp kinh doanh, kinh doanh số', 3, 1, 0, '2017-03-22 20:44:03', '2017-03-22 14:40:18'),
(6, 3, 1, 'default.jpg', 'Tác giả 6', 'Tên ý tưởng thứ 6', 'Đây là phần Tóm tắt nội dung ý tưởng thứ 6', 'Đây là phần chi tiết kỹ thuật của ý tưởng thứ 6', '', 'công nghệ thực phẩm, thực phẩm sạch', 1, 1, 0, '2017-03-22 20:44:07', '2017-03-22 14:40:18'),
(7, 1, 1, 'default.jpg', 'Tác giả 7, Tác giả 7'', Tác giả 7''''', 'Tên ý tưởng thứ 7', 'Đây là phần Tóm tắt nội dung ý tưởng thứ 7', 'Đây là phần chi tiết kỹ thuật của ý tưởng thứ 7', '', 'công nghệ thông tin, công nghệ thông minh', 1, 1, 0, '2017-03-22 20:44:11', '2017-03-22 14:40:21'),
(8, 2, 1, 'default.jpg', 'Tác giả 8', 'Tên ý tưởng thứ 8', 'Đây là phần Tóm tắt nội dung ý tưởng thứ 8', 'Đây là phần chi tiết kỹ thuật của ý tưởng thứ 8', '', 'giải pháp kinh doanh, kinh doanh số', 1, 1, 0, '2017-03-22 20:44:17', '2017-03-22 14:40:21'),
(9, 3, 1, 'default.jpg', 'Tác giả 9', 'Tên ý tưởng thứ 9', 'Đây là phần Tóm tắt nội dung ý tưởng thứ 9', 'Đây là phần chi tiết kỹ thuật của ý tưởng thứ 9', '', 'công nghệ thực phẩm, thực phẩm sạch', 3, 1, 0, '2017-03-22 20:44:19', '2017-03-22 14:40:21'),
(10, 1, 1, 'default.jpg', 'Tác giả 10', 'Tên ý tưởng thứ 10', 'Đây là phần Tóm tắt nội dung ý tưởng thứ 10', 'Đây là phần chi tiết kỹ thuật của ý tưởng thứ 10', '', 'công nghệ thông tin, công nghệ thông minh', 1, 1, 0, '2017-03-22 20:44:23', '2017-03-22 14:40:24'),
(11, 2, 1, 'default.jpg', 'Tác giả 11', 'Tên ý tưởng thứ 11', 'Đây là phần Tóm tắt nội dung ý tưởng thứ 11', 'Đây là phần chi tiết kỹ thuật của ý tưởng thứ 11', '', 'giải pháp kinh doanh, kinh doanh số', 1, 1, 0, '2017-03-22 20:44:27', '2017-03-22 14:40:24'),
(12, 3, 1, 'default.jpg', 'Tác giả 12', 'Tên ý tưởng thứ 12', 'Đây là phần Tóm tắt nội dung ý tưởng thứ 12', 'Đây là phần chi tiết kỹ thuật của ý tưởng thứ 12', '', 'công nghệ thực phẩm, thực phẩm sạch', 2, 1, 0, '2017-03-22 20:44:30', '2017-03-22 14:40:24'),
(14, 1, 1, 'default.jpg', 'Tác giả 13, Tác giả 13'', Tác giả 13''''', 'Tên ý tưởng thứ 13', 'Đây là phần Tóm tắt nội dung ý tưởng thứ 13', 'Đây là phần chi tiết kỹ thuật của ý tưởng thứ 13', '', 'công nghệ thông tin, công nghệ thông minh', 1, 1, 0, '2017-03-22 20:44:34', '2017-03-22 14:40:26'),
(15, 2, 1, 'default.jpg', 'Tác giả 14', 'Tên ý tưởng thứ 14', 'Đây là phần Tóm tắt nội dung ý tưởng thứ 14', 'Đây là phần chi tiết kỹ thuật của ý tưởng thứ 14', '', 'giải pháp kinh doanh, kinh doanh số', 1, 1, 0, '2017-03-22 20:44:37', '2017-03-22 14:40:26'),
(16, 3, 1, 'default.jpg', 'Tác giả 15', 'Tên ý tưởng thứ 15', 'Đây là phần Tóm tắt nội dung ý tưởng thứ 15', 'Đây là phần chi tiết kỹ thuật của ý tưởng thứ 15', '', 'công nghệ thực phẩm, thực phẩm sạch', 1, 1, 0, '2017-03-22 20:44:39', '2017-03-22 14:40:26'),
(18, 1, 1, 'default.jpg', 'Tác giả 16', 'Tên ý tưởng thứ 16', 'Đây là phần Tóm tắt nội dung ý tưởng thứ 16', 'Đây là phần chi tiết kỹ thuật của ý tưởng thứ 16', '', 'công nghệ thông tin, công nghệ thông minh', 1, 1, 0, '2017-03-22 20:44:59', '2017-03-22 14:40:29'),
(19, 2, 1, 'default.jpg', 'Tác giả 17', 'Tên ý tưởng thứ 17', 'Đây là phần Tóm tắt nội dung ý tưởng thứ 17', 'Đây là phần chi tiết kỹ thuật của ý tưởng thứ 17', '', 'giải pháp kinh doanh, kinh doanh số', 1, 1, 0, '2017-03-22 20:45:03', '2017-03-22 14:40:29'),
(20, 3, 1, 'default.jpg', 'Tác giả 18', 'Tên ý tưởng thứ 18', 'Đây là phần Tóm tắt nội dung ý tưởng thứ 18', 'Đây là phần chi tiết kỹ thuật của ý tưởng thứ 18', '', 'công nghệ thực phẩm, thực phẩm sạch', 1, 1, 0, '2017-03-22 20:45:05', '2017-03-22 14:40:29'),
(21, 1, 1, 'default.jpg', 'Tác giả 19,Tác giả 19'',Tác giả 19''''', 'Tên ý tưởng thứ 19', 'Đây là phần Tóm tắt nội dung ý tưởng thứ 19', 'Đây là phần chi tiết kỹ thuật của ý tưởng thứ 19', '', 'công nghệ thông tin, công nghệ thông minh', 1, 1, 0, '2017-03-22 20:45:08', '2017-03-22 14:40:33'),
(22, 2, 1, 'default.jpg', 'Tác giả 20', 'Tên ý tưởng thứ 20', 'Đây là phần Tóm tắt nội dung ý tưởng thứ 20', 'Đây là phần chi tiết kỹ thuật của ý tưởng thứ 20', '', 'giải pháp kinh doanh, kinh doanh số', 1, 1, 0, '2017-03-22 20:45:12', '2017-03-22 14:40:33'),
(23, 3, 1, 'default.jpg', 'Tác giả 21', 'Tên ý tưởng thứ 21', 'Đây là phần Tóm tắt nội dung ý tưởng thứ 21', 'Đây là phần chi tiết kỹ thuật của ý tưởng thứ 21', '', 'công nghệ thực phẩm, thực phẩm sạch', 1, 1, 0, '2017-03-22 20:45:14', '2017-03-22 14:40:33'),
(24, 1, 1, 'default.jpg', 'Tác giả 22', 'Tên ý tưởng thứ 22', 'Đây là phần Tóm tắt nội dung ý tưởng thứ 22', 'Đây là phần chi tiết kỹ thuật của ý tưởng thứ 22', '', 'công nghệ thông tin, công nghệ thông minh', 3, 1, 0, '2017-03-22 20:45:16', '2017-03-22 14:40:35'),
(25, 2, 1, 'default.jpg', 'Tác giả 23,Tác giả 23''', 'Tên ý tưởng thứ 23', 'Đây là phần Tóm tắt nội dung ý tưởng thứ 23', 'Đây là phần chi tiết kỹ thuật của ý tưởng thứ 23', '', 'giải pháp kinh doanh, kinh doanh số', 1, 1, 0, '2017-03-22 20:45:18', '2017-03-22 14:40:35'),
(26, 3, 1, 'default.jpg', 'Tác giả 24', 'Tên ý tưởng thứ 24', 'Đây là phần Tóm tắt nội dung ý tưởng thứ 24', 'Đây là phần chi tiết kỹ thuật của ý tưởng thứ 24', '', 'công nghệ thực phẩm, thực phẩm sạch', 1, 1, 0, '2017-03-22 20:45:21', '2017-03-22 14:40:35'),
(27, 1, 1, 'default.jpg', 'Tác giả 25', 'Tên ý tưởng thứ 25', 'Đây là phần Tóm tắt nội dung ý tưởng thứ 25', 'Đây là phần chi tiết kỹ thuật của ý tưởng thứ 25', '', 'công nghệ thông tin, công nghệ thông minh', 1, 1, 0, '2017-03-22 20:45:23', '2017-03-22 14:40:38'),
(28, 2, 1, 'default.jpg', 'Tác giả 26', 'Tên ý tưởng thứ 26', 'Đây là phần Tóm tắt nội dung ý tưởng thứ 26', 'Đây là phần chi tiết kỹ thuật của ý tưởng thứ 26', '', 'giải pháp kinh doanh, kinh doanh số', 2, 1, 0, '2017-03-22 20:45:25', '2017-03-22 14:40:38'),
(29, 3, 1, 'default.jpg', 'Tác giả 27,Tác giả 27'',Tác giả 27''''', 'Tên ý tưởng thứ 27', 'Đây là phần Tóm tắt nội dung ý tưởng thứ 27', 'Đây là phần chi tiết kỹ thuật của ý tưởng thứ 27', '', 'công nghệ thực phẩm, thực phẩm sạch', 1, 1, 0, '2017-03-22 20:45:27', '2017-03-22 14:40:38'),
(30, 1, 1, 'default.jpg', 'Tác giả 28', 'Tên ý tưởng thứ 28', 'Đây là phần Tóm tắt nội dung ý tưởng thứ 28', 'Đây là phần chi tiết kỹ thuật của ý tưởng thứ 28', '', 'công nghệ thông tin, công nghệ thông minh', 1, 1, 0, '2017-03-22 20:45:29', '2017-03-22 14:40:40'),
(31, 2, 1, 'default.jpg', 'Tác giả 29', 'Tên ý tưởng thứ 29', 'Đây là phần Tóm tắt nội dung ý tưởng thứ 29', 'Đây là phần chi tiết kỹ thuật của ý tưởng thứ 29', '', 'giải pháp kinh doanh, kinh doanh số', 2, 1, 0, '2017-03-22 20:45:32', '2017-03-22 14:40:40'),
(32, 3, 1, 'default.jpg', 'Tác giả 30', 'Tên ý tưởng thứ 30', 'Đây là phần Tóm tắt nội dung ý tưởng thứ 30', 'Đây là phần chi tiết kỹ thuật của ý tưởng thứ 30', '', 'công nghệ thực phẩm, thực phẩm sạch', 1, 1, 0, '2017-03-22 20:45:34', '2017-03-22 14:40:40'),
(33, 1, 1, 'default.jpg', 'Tác giả 31', 'Tên ý tưởng thứ 31', 'Đây là phần Tóm tắt nội dung ý tưởng thứ 31', 'Đây là phần chi tiết kỹ thuật của ý tưởng thứ 31', '', 'công nghệ thông tin, công nghệ thông minh', 1, 1, 0, '2017-03-22 20:45:37', '2017-03-22 14:40:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bau_chon_phan_hoi`
--
ALTER TABLE `bau_chon_phan_hoi`
  ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `UNIQUE_BAU_CHON_PHAN_HOI` (`ID_NGUOI_DUNG`,`ID_PHAN_HOI`) USING BTREE, ADD KEY `FK_PHAN_HOI_PH` (`ID_PHAN_HOI`);

--
-- Indexes for table `bau_chon_tra_loi`
--
ALTER TABLE `bau_chon_tra_loi`
  ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `UNIQUE_BAU_CHON_TRA_LOI` (`ID_NGUOI_DUNG`,`ID_TRA_LOI`) USING BTREE, ADD KEY `FK_TRA_LOI_TL` (`ID_TRA_LOI`);

--
-- Indexes for table `ds_theo_doi`
--
ALTER TABLE `ds_theo_doi`
  ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `UNIQUE_THEO_DOI_Y_TUONG` (`ID_Y_TUONG`,`ID_NGUOI_DUNG`), ADD UNIQUE KEY `UNIQUE_THEO_DOI_VAN_DE` (`ID_VAN_DE`,`ID_NGUOI_DUNG`), ADD KEY `FK_NGUOI_DUNG_THEO_DOI` (`ID_NGUOI_DUNG`);

--
-- Indexes for table `lien_he`
--
ALTER TABLE `lien_he`
  ADD PRIMARY KEY (`ID`), ADD KEY `NGUOI_LIEN_HE_NGUOI_DUNG` (`ID_NGUOI_LIEN_HE`);

--
-- Indexes for table `linh_vuc`
--
ALTER TABLE `linh_vuc`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `UNIQUE_NGUOI_DUNG` (`TAI_KHOAN`);

--
-- Indexes for table `phan_hoi`
--
ALTER TABLE `phan_hoi`
  ADD PRIMARY KEY (`ID`), ADD KEY `FK_GUI_PHAN_HOI__ANH_GIA` (`ID_NGUOI_DUNG`), ADD KEY `FK_Y_TUONG_CO_PHAN_HOI` (`ID_Y_TUONG`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `UNIQUE_TAGS` (`TEN_TAGS`) USING BTREE;

--
-- Indexes for table `thong_tin_to_chuc`
--
ALTER TABLE `thong_tin_to_chuc`
  ADD PRIMARY KEY (`ID`), ADD KEY `FK_TT_TO_CHUC_NGUOI_DUNG` (`ID_NGUOI_DUNG`);

--
-- Indexes for table `tra_loi`
--
ALTER TABLE `tra_loi`
  ADD PRIMARY KEY (`ID`), ADD KEY `FK_GUI_TRA_LOI` (`ID_NGUOI_DUNG`), ADD KEY `FK_TRA_LOI_CHO_VAN_DE` (`ID_VAN_DE`);

--
-- Indexes for table `van_de`
--
ALTER TABLE `van_de`
  ADD PRIMARY KEY (`ID`), ADD KEY `FK_DANG_TIM_GIAI_PHAP` (`ID_NGUOI_DUNG`);

--
-- Indexes for table `y_tuong`
--
ALTER TABLE `y_tuong`
  ADD PRIMARY KEY (`ID`), ADD KEY `FK_DANG_Y_TUONG` (`ID_NGUOI_DUNG`), ADD KEY `FK_THUOC_LINH_VUC` (`ID_LINH_VUC`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bau_chon_phan_hoi`
--
ALTER TABLE `bau_chon_phan_hoi`
  MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `bau_chon_tra_loi`
--
ALTER TABLE `bau_chon_tra_loi`
  MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ds_theo_doi`
--
ALTER TABLE `ds_theo_doi`
  MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `lien_he`
--
ALTER TABLE `lien_he`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `linh_vuc`
--
ALTER TABLE `linh_vuc`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `phan_hoi`
--
ALTER TABLE `phan_hoi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `thong_tin_to_chuc`
--
ALTER TABLE `thong_tin_to_chuc`
  MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tra_loi`
--
ALTER TABLE `tra_loi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `van_de`
--
ALTER TABLE `van_de`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `y_tuong`
--
ALTER TABLE `y_tuong`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bau_chon_phan_hoi`
--
ALTER TABLE `bau_chon_phan_hoi`
ADD CONSTRAINT `FK_NGUOI_DUNG_PH` FOREIGN KEY (`ID_NGUOI_DUNG`) REFERENCES `nguoi_dung` (`ID`),
ADD CONSTRAINT `FK_PHAN_HOI_PH` FOREIGN KEY (`ID_PHAN_HOI`) REFERENCES `phan_hoi` (`ID`);

--
-- Constraints for table `bau_chon_tra_loi`
--
ALTER TABLE `bau_chon_tra_loi`
ADD CONSTRAINT `FK_NGUOI_DUNG_TL` FOREIGN KEY (`ID_NGUOI_DUNG`) REFERENCES `nguoi_dung` (`ID`),
ADD CONSTRAINT `FK_TRA_LOI_TL` FOREIGN KEY (`ID_TRA_LOI`) REFERENCES `tra_loi` (`ID`);

--
-- Constraints for table `ds_theo_doi`
--
ALTER TABLE `ds_theo_doi`
ADD CONSTRAINT `FK_NGUOI_DUNG_THEO_DOI` FOREIGN KEY (`ID_NGUOI_DUNG`) REFERENCES `nguoi_dung` (`ID`),
ADD CONSTRAINT `FK_VAN_DE_THEO_DOI` FOREIGN KEY (`ID_VAN_DE`) REFERENCES `van_de` (`ID`),
ADD CONSTRAINT `FK_Y_TUONG_THEO_DOI` FOREIGN KEY (`ID_Y_TUONG`) REFERENCES `y_tuong` (`ID`);

--
-- Constraints for table `lien_he`
--
ALTER TABLE `lien_he`
ADD CONSTRAINT `NGUOI_LIEN_HE_NGUOI_DUNG` FOREIGN KEY (`ID_NGUOI_LIEN_HE`) REFERENCES `nguoi_dung` (`ID`);

--
-- Constraints for table `phan_hoi`
--
ALTER TABLE `phan_hoi`
ADD CONSTRAINT `FK_GUI_PHAN_HOI__ANH_GIA` FOREIGN KEY (`ID_NGUOI_DUNG`) REFERENCES `nguoi_dung` (`ID`),
ADD CONSTRAINT `FK_Y_TUONG_CO_PHAN_HOI` FOREIGN KEY (`ID_Y_TUONG`) REFERENCES `y_tuong` (`ID`);

--
-- Constraints for table `thong_tin_to_chuc`
--
ALTER TABLE `thong_tin_to_chuc`
ADD CONSTRAINT `FK_TT_TO_CHUC_NGUOI_DUNG` FOREIGN KEY (`ID_NGUOI_DUNG`) REFERENCES `nguoi_dung` (`ID`);

--
-- Constraints for table `tra_loi`
--
ALTER TABLE `tra_loi`
ADD CONSTRAINT `FK_GUI_TRA_LOI` FOREIGN KEY (`ID_NGUOI_DUNG`) REFERENCES `nguoi_dung` (`ID`),
ADD CONSTRAINT `FK_TRA_LOI_CHO_VAN_DE` FOREIGN KEY (`ID_VAN_DE`) REFERENCES `van_de` (`ID`);

--
-- Constraints for table `van_de`
--
ALTER TABLE `van_de`
ADD CONSTRAINT `FK_DANG_TIM_GIAI_PHAP` FOREIGN KEY (`ID_NGUOI_DUNG`) REFERENCES `nguoi_dung` (`ID`);

--
-- Constraints for table `y_tuong`
--
ALTER TABLE `y_tuong`
ADD CONSTRAINT `FK_DANG_Y_TUONG` FOREIGN KEY (`ID_NGUOI_DUNG`) REFERENCES `nguoi_dung` (`ID`),
ADD CONSTRAINT `FK_THUOC_LINH_VUC` FOREIGN KEY (`ID_LINH_VUC`) REFERENCES `linh_vuc` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
