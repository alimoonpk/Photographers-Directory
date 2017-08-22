-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2017 at 07:38 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `photographers`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Wedding'),
(2, 'Birthday Party'),
(3, 'Picnic'),
(4, 'Concert'),
(5, 'Exhibitions'),
(6, 'Festivals'),
(7, 'Events');

-- --------------------------------------------------------

--
-- Table structure for table `photographerdata`
--

CREATE TABLE IF NOT EXISTS `photographerdata` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `datetime` varchar(200) NOT NULL,
  `studioname` varchar(200) NOT NULL,
  `personname` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `overview` varchar(3000) NOT NULL,
  `pricingpp` int(100) NOT NULL,
  `pricingph` int(100) NOT NULL,
  `cell` varchar(100) NOT NULL,
  `web` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pic1` varchar(200) NOT NULL,
  `pic2` varchar(200) NOT NULL,
  `pic3` varchar(200) NOT NULL,
  `pic4` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `photographerdata`
--

INSERT INTO `photographerdata` (`id`, `datetime`, `studioname`, `personname`, `category`, `overview`, `pricingpp`, `pricingph`, `cell`, `web`, `email`, `pic1`, `pic2`, `pic3`, `pic4`) VALUES
(1, 'August-21-2017 11:14:53', 'Furqan Studio', 'Furqan Patel', 'Wedding', 'Provide Best Photographers In The Town And Available For Any Type Of Event.\r\n\r\nAvailable At Reasonable Cost .', 1, 50, '0331-5247922', 'www.furqan.com', 'furqan@gmail.com', 'category-box-02.jpg', 'category-box-01.jpg', 'category-box-03.jpg', 'category-box-04.jpg'),
(6, 'August-21-2017 11:35:28', 'Asad Raza Studio', 'Asad Raza', 'Concert', 'Asad Raza Studio.\r\n\r\nMy best studio.\r\n\r\nProvide Best Photographers In The Town And Available For Any Type Of Event.\r\n\r\nAvailable At Reasonable Cost .', 5, 100, '0305-2254782', 'www.asad.com', 'asad@gmail.com', 'blog-compact-post-02.jpg', 'blog-compact-post-01.jpg', 'blog-compact-post-03.jpg', 'blog-post-01.jpg'),
(7, 'August-21-2017 12:30:34', 'AB Lakhani', 'Lakhani', 'Birthday Party', 'AB Lakhani Studio \r\nAB Lakhani\r\nAB Lakhani\r\n\r\nProvide Best Photographers In The Town And Available For Any Type Of Event.\r\n\r\nAvailable At Reasonable Cost .', 3, 30, '0351-1758925', 'www.lakhani.com', 'lakhani@gmail.com', 'bp1.jpg', 'bp2.jpg', 'Capture.jpg', 'category-box-01-c.jpg'),
(8, 'August-21-2017 12:32:51', 'Saad Studio', 'Saad', 'Wedding', 'Saad Studio\r\n\r\nProvide Best Photographers In The Town And Available For Any Type Of Event.\r\n\r\nAvailable At Reasonable Cost by Saad.', 50, 250, '0315-2547821', 'www.saad.com', 'saad@gmail.com', 'category-box-01.jpg', 'category-box-02.jpg', 'category-box-03.jpg', 'category-box-04.jpg'),
(9, 'August-21-2017 13:06:24', 'AR Studio', 'AR Rehman', 'Concert', 'AR Rehman\r\n\r\nAR Rehman Photography\r\n\r\nAvailable At Reasonable Cost .', 100, 1000, '0312-5147813', 'www.ar.com', 'ar@gmail.com', 'blog-post-01.jpg', 'blog-post-02.jpg', 'blog-post-03.jpg', 'category-box-02.jpg'),
(10, 'August-21-2017 13:08:05', 'Jia Studio', 'Jia', 'Birthday Party', 'Photography by Jia Top Rated', 15, 120, '0335-2514785', 'www.jia.com', 'jia@jia.com', 'category-box-03.jpg', 'category-box-04.jpg', 'category-box-05.jpg', 'category-box-05.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `username`, `password`) VALUES
(1, 'ali', 'moon');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `datetime` varchar(200) NOT NULL,
  `name` varchar(100) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `rating` int(10) NOT NULL,
  `photographer_id` int(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `photographer_id` (`photographer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `datetime`, `name`, `comment`, `rating`, `photographer_id`) VALUES
(2, 'August-21-2017 16:39:04', 'Ali', 'Great Jia', 5, 10),
(4, 'August-21-2017 16:41:14', 'John', 'Awesome Jia', 4, 10),
(5, 'August-21-2017 16:42:20', 'Ali', 'nice ar', 3, 9),
(6, 'August-21-2017 16:42:53', 'Asad', 'Good aR', 5, 9),
(7, 'August-21-2017 16:50:17', 'Patel', 'Dear AR Studio, your techniques for taking photos in the recent wedding are really Awesome. Your result impress me and photos are really outstanding.', 5, 9),
(8, 'August-21-2017 16:50:43', 'Raza', 'Dear AR Studio your Photographers came recently in my Son''s Birthday Party. I''ve received Photographs and they are excellent.', 4, 9),
(9, 'August-21-2017 17:41:36', 'Raza', 'awesome asad', 5, 8);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `Foregin Key to Photographer` FOREIGN KEY (`photographer_id`) REFERENCES `photographerdata` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
