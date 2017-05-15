-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 10, 2013 at 11:11 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `note`
--

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE IF NOT EXISTS `note` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`id`, `title`, `description`, `created`) VALUES
(1, 'HEllo', 'Test', '2013-01-10 17:13:15'),
(2, 'King', 'KIng', '2013-01-10 17:16:00'),
(3, 'hi', 'sokang\r\n', '2013-01-10 17:45:20'),
(4, 'king', 'ddd', '2013-01-10 17:45:31'),
(5, 'fasdfafasd', 'asdfaasdfsdfasdfasdfsdf\r\nsd\r\nfsd\r\nfa\r\nsdf\r\nasdf\r\nas\r\ndfs\r\ndf\r\nsaf\r\ns\r\ndf\r\nsaf\r\nas\r\nfas\r\nf\r\nas\r\nfsa\r\ndf\r\nsd', '2013-01-10 17:45:54'),
(6, 'adsfasf', 'afasdfasdfs', '2013-01-10 17:46:22'),
(7, 'kimsoursdd', 'adfsfsdf', '2013-01-10 17:46:37'),
(8, '', '', '2013-01-10 18:04:27'),
(9, '', '', '2013-01-10 18:04:30'),
(10, '', '', '2013-01-10 18:04:34'),
(11, '', '', '2013-01-10 18:04:37'),
(12, '', '', '2013-01-10 18:04:41'),
(13, '', '', '2013-01-10 18:04:44'),
(14, '', '', '2013-01-10 18:04:47'),
(15, '', '', '2013-01-10 18:04:50'),
(16, '', '', '2013-01-10 18:04:54'),
(17, '', '', '2013-01-10 18:04:57'),
(18, '', '', '2013-01-10 18:05:00'),
(19, '', '', '2013-01-10 18:05:04');
