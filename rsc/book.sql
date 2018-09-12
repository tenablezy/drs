-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 11, 2013 at 09:48 AM
-- Server version: 5.5.32-0ubuntu0.13.04.1
-- PHP Version: 5.4.9-4ubuntu2.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dancer`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `sn` int(11) NOT NULL AUTO_INCREMENT,
  `time` text CHARACTER SET big5 NOT NULL,
  `day` text CHARACTER SET big5 NOT NULL,
  `studio` text CHARACTER SET big5 NOT NULL,
  `name` text CHARACTER SET big5 NOT NULL,
  `sub_name` text CHARACTER SET big5 NOT NULL,
  `teacher` text CHARACTER SET big5 NOT NULL,
  `comment` text CHARACTER SET big5 NOT NULL,
  `online` int(11) NOT NULL DEFAULT '0',
  UNIQUE KEY `sn` (`sn`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='課程' AUTO_INCREMENT=34 ;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`sn`, `time`, `day`, `studio`, `name`, `sub_name`, `teacher`, `comment`, `online`) VALUES
(2, 'c', '1', 'A', 'Waacking/Vague', '寶寶班', 'Alumi', 'N/A', 1),
(26, 'b', '6', 'A', 'Hip-Hop Jazz', '寶寶班', 'TWEETY', '', 1),
(27, 'b', '7', 'A', 'Contemporary', '寶寶班', 'SUNNY', '', 0),
(28, 'c', '3', 'A', 'Jazz', '寶寶班', '小美', 'test', 1),
(29, 'b', '6', 'B', 'Sexy Jazz', '寶寶班', '米妮', '', 1),
(30, 'b', '7', 'delete', 'Contemporary2', '寶寶班', 'SUNNY', '', 0),
(31, 'd', '1', 'delete', 'Popping', '茁壯班', '大霖', '', 1),
(32, 'd', '1', 'B', 'Poppin''', '茁壯班', '大霖', '', 1),
(33, 'd', '1', 'A', 'Girl''s style', '寶寶班', 'Panda', '', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
