-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2016 at 09:24 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc_report_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `rss_links`
--

CREATE TABLE IF NOT EXISTS `rss_links` (
  `ID` int(11) NOT NULL,
  `rss_link` varchar(250) NOT NULL,
  `menu_name` varchar(250) NOT NULL,
  `posts_per_page` int(11) NOT NULL,
  `used_tags_rss` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rss_links`
--

INSERT INTO `rss_links` (`ID`, `rss_link`, `menu_name`, `posts_per_page`, `used_tags_rss`) VALUES
(3, 'http://dantri.com.vn/trangchu.rss', 'Dân trí - Trang chủ', 9, 'description'),
(4, 'http://dantri.com.vn/suc-khoe.rss', 'Sức khỏe', 10, 'title|description'),
(5, 'http://dantri.com.vn/xa-hoi.rss', 'Xã hội', 5, 'title|description'),
(6, 'http://dantri.com.vn/giai-tri.rss', 'Giải trí', 5, 'title|description'),
(7, 'http://dantri.com.vn/giao-duc-khuyen-hoc.rss', 'Giáo dục', 10, 'title|description|link|pubDate'),
(8, 'http://vietnamnet.vn/rss/cong-nghe.rss', 'Công nghệ', 5, 'title|description|link|pubDate');

-- --------------------------------------------------------

--
-- Table structure for table `tag_rss`
--

CREATE TABLE IF NOT EXISTS `tag_rss` (
  `ID` int(11) NOT NULL,
  `tag_name` varchar(50) NOT NULL,
  `display_name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tag_rss`
--

INSERT INTO `tag_rss` (`ID`, `tag_name`, `display_name`) VALUES
(1, 'title', 'Thẻ title'),
(4, 'description', 'Thẻ description'),
(5, 'link', 'Thẻ link'),
(6, 'pubDate', 'Thẻ publish date');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `pword` varchar(40) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `infos` text
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `username`, `pword`, `level`, `infos`) VALUES
(1, 'Admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 10, 'abc'),
(2, 'Test_User', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 'abc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rss_links`
--
ALTER TABLE `rss_links`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tag_rss`
--
ALTER TABLE `tag_rss`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rss_links`
--
ALTER TABLE `rss_links`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tag_rss`
--
ALTER TABLE `tag_rss`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
