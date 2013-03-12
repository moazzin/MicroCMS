-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2013 at 11:11 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_microcms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_content`
--

CREATE TABLE IF NOT EXISTS `tbl_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caption` varchar(100) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `collapsed` bit(1) NOT NULL DEFAULT b'0',
  `page_html_id` varchar(50) NOT NULL,
  `last_update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `parent` int(11) DEFAULT NULL,
  `visible` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `page_html_id` (`page_html_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_content`
--

INSERT INTO `tbl_content` VALUES(1, 'پست الکترونیکی', 'info@moazzin.ir', '0', 'contact_page', '2013-03-09 07:18:18', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE IF NOT EXISTS `tbl_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caption` varchar(100) NOT NULL,
  `page_html_id` varchar(50) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `visible` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `page_html_id` (`page_html_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` VALUES(1, 'منو', 'menu_page', NULL, '0');
INSERT INTO `tbl_menu` VALUES(2, 'تماس', 'contact_page', NULL, '1');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_content`
--
ALTER TABLE `tbl_content`
  ADD CONSTRAINT `tbl_content_ibfk_2` FOREIGN KEY (`page_html_id`) REFERENCES `tbl_menu` (`page_html_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
