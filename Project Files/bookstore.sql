-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2016 at 07:50 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `book_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `b_id` int(4) NOT NULL AUTO_INCREMENT,
  `b_name` varchar(60) NOT NULL,
  `b_description` longtext NOT NULL,
  `b_author` varchar(40) NOT NULL,
  `b_isbn` varchar(10) NOT NULL,
  `b_price` int(5) NOT NULL,
  `b_img` longtext NOT NULL,
  PRIMARY KEY (`b_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`b_id`, `b_name`, `b_description`, `b_author`, `b_isbn`, `b_price`, `b_img`) VALUES
(1, 'Fangirl ', 'young adult book' 'Rainbow Rowell', '2015', '89564636', 200, 'images/fangirl.jpg'),
(2, 'Hunger games cathing fires ', 'young adult book' 'Suzan collins', '2012', '89564636', 200, 'images/hgcatching.jpg'),
(3, 'Harry potter and the cursed child ', 'young adult book' 'Rainbow Rowell', '2015', '89564636', 200, 'images/hpcursed.jpg'),
(4, 'Fangirl ', 'young adult book' 'Rainbow Rowell', '2015', '89564636', 200, 'images/fangirl.jpg');

-- --------------------------------------------------------

--


-- --------------------------------------------------------

--
-- Table structure for table `shipping_details`
--

CREATE TABLE IF NOT EXISTS `shipping_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL,
  `address` text NOT NULL,
  `postal_code` bigint(20) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `phone` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `shipping_details`
--

INSERT INTO `shipping_details` (`id`, `name`, `address`, `postal_code`, `city`, `state`, `phone`) VALUES
(1, 'sanjeev kumar', ' 141 delhi', 110009, 'delhi', 'delhi', 9015501897),
(2, 'sanjeev kumar', ' 141 delhi', 110009, 'delhi', 'delhi', 9015501897);

-- --------------------------------------------------------

--


--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `u_id` int(4) NOT NULL AUTO_INCREMENT,
  `u_fname` varchar(35) NOT NULL,
  `u_lname` varchar(25) NOT NULL,
  `u_pwd` varchar(20) NOT NULL,
  `u_gender` varchar(7) NOT NULL,
  `u_email` varchar(35) NOT NULL,
  `u_contact` varchar(12) NOT NULL,
  `u_city` varchar(20) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_fname`, `u_lname`, `u_pwd`, `u_gender`, `u_email`, `u_contact`, `u_city`) VALUES
(1, 'Hiren Bhaliya', 'Hiren', 'hiru', 'Male', 'hiru@gmail.com', '9925136522', 'Rajkot'),
(2, 'Shital', 'shital', 'shital', 'Female', 'shital@yahoo.com', '9985689856', 'Rajkot'),
(3, 'Lina', 'Lina123', '123', 'Female', 'lina123@gmail.com', '9456325663', 'Amreli'),
(4, 'admin', 'admin', 'admin123', 'Female', 'admin@gmail.com', '9859632561', 'Rajkot'),
(5, 'Kaushik', 'Darcy', '160160160', 'Male', 'darcy@gmail.com', '9016388880', 'Rajkot'),
(6, 'sanjeev', 'kumar', 'sanjeev', 'Male', 'sanjeevtech2@gmail.com', '9015501897', 'Ahmedabad');

--
-- Table structure for table `exchangebook`
--

CREATE TABLE IF NOT EXISTS `exchangebook` (
  `e_id` int(4) NOT NULL AUTO_INCREMENT,
  `e_name` varchar(60) NOT NULL,
  `e_description` longtext NOT NULL,
  `e_img` longtext NOT NULL,
  PRIMARY KEY (`e_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`b_id`, `b_name`, `b_description`, `b_img`) VALUES
(1, 'Fangirl ', 'young adult book', 'images/fangirl.jpg'),
(2, 'Hunger games cathing fires ', 'young adult book', 'images/hgcatching.jpg'),
(3, 'Harry potter and the cursed child ', 'young adult book', 'images/hpcursed.jpg'),
(4, 'Fangirl ', 'young adult book', 'images/fangirl.jpg');


--
--Orders tables
--


CREATE TABLE `orders` (
`o_id` int(11) NOT NULL,
`o_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
`o_name` varchar(255) NOT NULL,
`o_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `orders`
ADD PRIMARY KEY (`o_id`),
ADD KEY `name` (`o_name`),
ADD KEY `email` (`o_email`),
ADD KEY `o_date` (`o_date`);

ALTER TABLE `orders`
MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT;

--
--Orders books tables
--

CREATE TABLE `orders_books` (
`o_id` int(11) NOT NULL,
`b_id` int(11) NOT NULL,
`quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `orders_books`
ADD PRIMARY KEY (`o_id`,`b_id`);





 CREATE TABLE IF NOT EXISTS `readingcommunity` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `image` varchar(60) NOT NULL,
  `image_text` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
