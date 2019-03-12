-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3307
-- Generation Time: Oct 31, 2018 at 10:09 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `thestudent`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `adminid` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `admintype` varchar(35) NOT NULL,
  `admin_name` varchar(35) NOT NULL,
  `admin_mail` varchar(50) NOT NULL,
  `admin_mobile` varchar(12) NOT NULL,
  PRIMARY KEY (`admintype`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `password`, `admintype`, `admin_name`, `admin_mail`, `admin_mobile`) VALUES
('admin', 'admin', 'main', 'bhanu prasadh', 'tinkubhanu216@gmail.com', '7095107867'),
('1234', '1234', 'Science and Technology', 'bha', 'gfvch', '1653135'),
('telugu', 'telugu', 'Telugu', 'john', 'john@gmail.com', '9876543210');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `username` varchar(35) DEFAULT NULL,
  `userid` varchar(15) DEFAULT NULL,
  `yeardept` varchar(20) NOT NULL,
  `usertype` varchar(25) NOT NULL,
  `contenttype` varchar(35) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `filename` varchar(100) NOT NULL,
  `imgname` varchar(100) NOT NULL,
  `artid` varchar(10) NOT NULL,
  PRIMARY KEY (`artid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `astatus`
--

CREATE TABLE IF NOT EXISTS `astatus` (
  `artid` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`artid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `astatus`
--

INSERT INTO `astatus` (`artid`, `status`) VALUES
('7xPEAE', 'accepted'),
('gSAkq7', 'accepted'),
('HAqKjk', 'accepted'),
('mD6xPs', 'accepted'),
('QDP1Un', 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `name` varchar(20) NOT NULL,
  `text` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`name`, `text`) VALUES
('bhanu', 'hegyd;d'),
('bhj', 'gvj');

-- --------------------------------------------------------

--
-- Table structure for table `filename`
--

CREATE TABLE IF NOT EXISTS `filename` (
  `name` varchar(10) NOT NULL,
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `filename`
--

INSERT INTO `filename` (`name`) VALUES
('New Text D');

-- --------------------------------------------------------

--
-- Table structure for table `login1`
--

CREATE TABLE IF NOT EXISTS `login1` (
  `userid` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `username` varchar(35) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login1`
--

INSERT INTO `login1` (`userid`, `password`, `username`) VALUES
('admin', 'admin', 'bhanu prasadh'),
('bablu123', 'Babulal.,@123', 'babulal'),
('bhanu13', 'Bhanu@216', 'bhanu'),
('nari123', 'Nari.,@123', 'narendar');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE IF NOT EXISTS `notices` (
  `noticeno` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` varchar(300) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`noticeno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ranking`
--

CREATE TABLE IF NOT EXISTS `ranking` (
  `artid` varchar(10) NOT NULL,
  `views` int(30) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`artid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ranking`
--

INSERT INTO `ranking` (`artid`, `views`, `time`) VALUES
('7xPEAE', 1, '2018-10-07 15:20:51'),
('gSAkq7', 14, '2018-10-07 15:47:48'),
('mD6xPs', 0, '2018-10-07 15:24:44'),
('QDP1Un', 0, '2018-10-07 15:45:28');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `name` varchar(35) NOT NULL,
  `id` varchar(15) NOT NULL,
  `father name` varchar(35) NOT NULL,
  `collegetype` varchar(20) NOT NULL,
  `college name` varchar(50) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(35) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `id`, `father name`, `collegetype`, `college name`, `gender`, `mobile`, `email`) VALUES
('babulal', 'bablu123', 'ghansya', 'rgukt', 'rgukt basar', 'male', '9876543211', 'babulalamgothu001@gmail.com'),
('dcfhdvf', 'bahnu123', 'laxman', 'rgukt', 'rgukt', 'male', '4567878', 'bhanu@gmail.com'),
('bhanu', 'bhanu13', 'bhmbsdjh g', 'rgukt', 'rgukt basar', 'male', '7099876543', 'bhanu@gmail.com'),
('narendar', 'nari123', 'shanker', 'rgukt', 'rgukt basar', 'male', '9876543210', 'narendarmekala1997@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
