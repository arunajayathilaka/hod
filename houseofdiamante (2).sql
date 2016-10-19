-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2016 at 12:35 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `houseofdiamante`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_name` varchar(200) NOT NULL,
  `username` varchar(250) NOT NULL,
  `image_url` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title_name`, `username`, `image_url`) VALUES
(1, 'beautiful ring', 'thila', 'img/photohub images/trend1.jpg'),
(2, 'eligent earings', 'seo', 'img/photohub images/earing1.jpg'),
(3, 'fabulous ring', 'guru', 'img/photohub images/jewel1.jpg'),
(4, 'necklaces', 'tharu1991', 'img/photohub images/trend2.jpg'),
(5, 'bangels', 'eranga123', 'img/photohub images/jewel2.jpg'),
(6, 'beautiful jewel', 'random', 'img/photohub images/trend3.jpg'),
(7, 'ring design', 'thila', 'img/photohub images/ring2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `articles_haha`
--

CREATE TABLE IF NOT EXISTS `articles_haha` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(100) NOT NULL,
  `article_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `articles_haha`
--

INSERT INTO `articles_haha` (`id`, `user`, `article_id`) VALUES
(1, 'mythree', 2),
(2, 'mythree', 1),
(3, 'mythree', 3),
(4, 'mythree', 4),
(5, 'mythree', 5),
(6, 'mythree', 7),
(7, 'mythree', 6),
(8, 'thila', 4),
(9, 'thila', 1),
(10, 'thila', 2);

-- --------------------------------------------------------

--
-- Table structure for table `articles_likes`
--

CREATE TABLE IF NOT EXISTS `articles_likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(20) NOT NULL,
  `article_id` int(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `articles_likes`
--

INSERT INTO `articles_likes` (`id`, `user`, `article_id`) VALUES
(13, 'mythree', 3),
(14, 'mythree', 4),
(15, 'mythree', 5),
(47, 'mythree', 1),
(48, 'mythree', 2),
(49, 'mythree', 6),
(50, 'mythree', 7),
(52, 'thila', 1),
(57, 'thila', 5),
(61, 'thila', 6),
(66, 'thila', 2);

-- --------------------------------------------------------

--
-- Table structure for table `articles_love`
--

CREATE TABLE IF NOT EXISTS `articles_love` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(100) NOT NULL,
  `article_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `articles_love`
--

INSERT INTO `articles_love` (`id`, `user`, `article_id`) VALUES
(4, 'mythree', 3),
(6, 'mythree', 2),
(7, 'mythree', 4),
(14, 'mythree', 7),
(15, 'mythree', 6),
(16, 'mythree', 1),
(17, 'mythree', 5),
(18, 'thila', 1),
(19, 'thila', 2),
(28, 'thila', 6);

-- --------------------------------------------------------

--
-- Table structure for table `centercut`
--

CREATE TABLE IF NOT EXISTS `centercut` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cut_name` varchar(250) NOT NULL,
  `image_url` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `centercut`
--

INSERT INTO `centercut` (`id`, `cut_name`, `image_url`) VALUES
(1, 'oval', 'img/center cut/oval.png'),
(2, 'heart', 'img/center cut/heart.png'),
(3, 'square', 'img/center cut/square.png');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` varchar(100) NOT NULL,
  `receiver` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `updated_date` date NOT NULL,
  `updated_time` time NOT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`msg_id`, `sender`, `receiver`, `message`, `updated_date`, `updated_time`) VALUES
(21, 'mythree', 'mallika', 'hello sir,can you help me??', '0000-00-00', '00:00:00'),
(22, 'mythree', 'mallika', 'hello', '0000-00-00', '00:00:00'),
(23, 'mallika', 'mythree', 'yes sir,i can....', '0000-00-00', '00:00:00'),
(24, 'mythree', 'mallika', 'can i have quotation?', '0000-00-00', '00:00:00'),
(25, 'mythree', 'mallika', 'reply me', '0000-00-00', '00:00:00'),
(26, 'mythree', 'mallika', '???', '0000-00-00', '00:00:00'),
(27, 'mallika', 'mythree', 'okay.. for which model send me pic of it', '0000-00-00', '00:00:00'),
(28, 'mythree', 'mallika', 'okkkk sir', '0000-00-00', '00:00:00'),
(29, 'mythree', 'mallika', 'here', '0000-00-00', '00:00:00'),
(30, 'mythree', 'mallika', '>>>>>>', '0000-00-00', '00:00:00'),
(31, 'mythree', 'mallika', '<<<<<<<<<', '0000-00-00', '00:00:00'),
(32, 'mythree', 'mallika', 'gfhfg', '2016-08-30', '03:04:11'),
(33, 'mythree', 'mallika', 'ger', '2016-08-30', '03:05:07'),
(34, 'mythree', 'mallika', 'swwwww', '2016-08-30', '03:58:44'),
(35, 'mythree', 'mallika', 'gj', '2016-09-13', '03:49:08'),
(36, 'thila', 'mallika', 'hi', '2016-09-13', '08:38:10'),
(37, 'thila', 'mallika', 'hello', '2016-09-14', '08:04:41'),
(38, 'thila', 'mallika', 'gh', '2016-09-14', '08:34:53');

-- --------------------------------------------------------

--
-- Table structure for table `customerlogin`
--

CREATE TABLE IF NOT EXISTS `customerlogin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL,
  `image_url` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `customerlogin`
--

INSERT INTO `customerlogin` (`id`, `username`, `email`, `password`, `image_url`) VALUES
(1, 'mythree', 'mythree@gmail.com', 'mythree', 'http://placehold.it/50x50'),
(2, 'arunadj', 'arunadilshanjayathilake@yahoo.', '123', 'http://placehold.it/50x50'),
(3, 'thila', 'thila@yahoo.com', 'thila', 'http://placehold.it/50x50'),
(6, 'dad', 'dad@yahoo.com', 'df3939f119', 'http://placehold.it/50x50');

-- --------------------------------------------------------

--
-- Table structure for table `gem`
--

CREATE TABLE IF NOT EXISTS `gem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gem_name` varchar(250) NOT NULL,
  `model_name` varchar(250) NOT NULL,
  `gem_dec` varchar(500) NOT NULL,
  `image_url` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `gem`
--

INSERT INTO `gem` (`id`, `gem_name`, `model_name`, `gem_dec`, `image_url`) VALUES
(1, 'Saphire', 'edit_gem_blue', 'Trace amounts of elements such as iron, titanium, chromium, copper, or magnesium can give corundum respectively blue, yellow, purple, orange, or green color. Chromium impurities in corundum yield pink or red tint, the latter being called ruby. Commonly, sapphires are worn in jewelry.', 'img/gem/sapahire.png'),
(4, 'Ruby', 'edit_gem_red', '"A ruby is a pink to blood-red colored gemstone, a variety of the mineral corundum (aluminium oxide). The red color is caused mainly by the presence of the element chromium. Its name comes from ruber, Latin for red. Other varieties of gem-quality corundum are called sapphires."\r\n', 'img/gem/ruby.png');

-- --------------------------------------------------------

--
-- Table structure for table `metal`
--

CREATE TABLE IF NOT EXISTS `metal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `metal_name` varchar(250) NOT NULL,
  `model_name` varchar(250) NOT NULL,
  `image_url` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `metal`
--

INSERT INTO `metal` (`id`, `metal_name`, `model_name`, `image_url`) VALUES
(1, 'gold', 'edit_ring_Gold', 'img/metal/Gold.png'),
(2, 'silver', 'edit_ring_Silver', 'img/metal/silver.jpg'),
(3, 'rose', 'edit_ring_Rose', 'img/metal/rose.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `not_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `vendor` varchar(15) NOT NULL,
  `customer` varchar(15) NOT NULL,
  `view` varchar(10) NOT NULL,
  PRIMARY KEY (`not_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`not_id`, `date`, `vendor`, `customer`, `view`) VALUES
(1, '2016-09-07', 'swarnamahal', 'Tharindu', 'yes'),
(2, '2016-09-12', 'Nileka', 'Aruna', 'no'),
(3, '2016-09-14', 'vogue', 'Tharindu', 'yes'),
(4, '2016-09-21', 'manoma', 'Tharindu', 'yes'),
(5, '2016-09-20', 'mallika', 'Tharindu', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `product_items`
--

CREATE TABLE IF NOT EXISTS `product_items` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  `product_type` varchar(100) NOT NULL,
  `product_dec` varchar(250) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `image_url` varchar(250) NOT NULL,
  `vendor_username` varchar(100) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `product_items`
--

INSERT INTO `product_items` (`item_id`, `product_name`, `product_type`, `product_dec`, `product_price`, `image_url`, `vendor_username`) VALUES
(1, 'white ring', 'ring', 'This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '$64.99', 'img/vendor images/mallika/ring3.jpg', 'mallika'),
(2, 'gold neckles', 'neckles', 'gnxfgjxxnnvbxn', '$64.99', 'img/vendor images/mallika/necklace1.jpg', 'mallika'),
(3, 'silver ring', 'earings', 'sdrawetgdbcvx', '$64.99', 'img/vendor images/neha/ring1.jpg', 'Neha Jewellery'),
(4, 'necklace with<br> pearl', 'necklace', 'good looking', '$30.00', 'img/vendor images/neha/necklace2.jpg', 'Neha Jewellery'),
(5, 'Gold necklace', 'necklace', 'eligent one', '$35.00', 'img/vendor images/cjs/necklace3.jpg', 'cjs'),
(6, 'gold earings', 'earings', 'nice looking', '$20.00', 'img/vendor images/cjs/earing2.jpg', 'cjs'),
(7, 'silver ring with<br> diamond', 'ring', 'eligent and beautiful ring', '$69.00', 'img/vendor images/kendra/ring2.jpg', 'kendra scot'),
(8, 'gold ring with<br> diamond', 'ring', 'nice looking for ladies', '$56.00', 'img/vendor images/kendra/ring4.jpg', 'kendra scot');

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

CREATE TABLE IF NOT EXISTS `quotation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(250) NOT NULL,
  `mobile_num` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `ring_size` varchar(250) NOT NULL,
  `carrot_w` varchar(250) NOT NULL,
  `metal` varchar(250) NOT NULL,
  `gemstone` varchar(250) NOT NULL,
  `center_cut` varchar(250) NOT NULL,
  `image_url` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `quotation`
--

INSERT INTO `quotation` (`id`, `full_name`, `mobile_num`, `email`, `ring_size`, `carrot_w`, `metal`, `gemstone`, `center_cut`, `image_url`) VALUES
(2, 'kl', 'jkhkl', 'glg', '14ct', 'Size 5', 'kjhlk', 'jhjkh', 'jhljhl', 'img/quotation/WIN_20160107_230133.JPG'),
(3, 'dfgdf', 'ssdh', 'fdhdf', '14ct', 'Size 5', 'Gold', 'red', 'heart', 'img/ring type/type1.png');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE IF NOT EXISTS `rating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(100) NOT NULL,
  `vendor_username` varchar(100) NOT NULL,
  `rate` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `user`, `vendor_username`, `rate`) VALUES
(1, 'mythree', 'mallika', 3),
(2, 'mythree', 'kendra scot', 4),
(3, '', 'mallika', 4),
(4, 'mythree', 'Neha Jewellery', 5),
(5, 'thila', 'cjs', 4),
(6, '', 'kendra scot', 3),
(7, '', 'cjs', 4);

-- --------------------------------------------------------

--
-- Table structure for table `ringtype`
--

CREATE TABLE IF NOT EXISTS `ringtype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(250) NOT NULL,
  `gem_n` varchar(250) NOT NULL,
  `image_url` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ringtype`
--

INSERT INTO `ringtype` (`id`, `type_name`, `gem_n`, `image_url`) VALUES
(1, 'type1', '1', 'img/ring type/type1.png'),
(2, 'type2', '2', 'img/ring type/type2.png');

-- --------------------------------------------------------

--
-- Table structure for table `temp_customerlogin`
--

CREATE TABLE IF NOT EXISTS `temp_customerlogin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `confirm_code` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `temp_customerlogin`
--

INSERT INTO `temp_customerlogin` (`id`, `confirm_code`, `username`, `email`, `password`) VALUES
(1, '4ee87bf8bc6dde8b0d88373edbb2c73c', 'arunadj', 'arunadilshanjayathilake@yahoo.com', '123'),
(2, 'a28bc4e0ef7e991224f5ce6b16f0797d', 'thila', 'thila@yahoo.com', 'thila'),
(3, '308833b636d84078b97d8ca84c14f116', 'jhbuhb', 'jhbujhb', '92163508c0b18e75db11');

-- --------------------------------------------------------

--
-- Table structure for table `venderdetail`
--

CREATE TABLE IF NOT EXISTS `venderdetail` (
  `vId` int(11) NOT NULL,
  `vName` int(11) NOT NULL,
  `vPassword` int(11) NOT NULL,
  `vAddress` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE IF NOT EXISTS `vendor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_name` varchar(250) NOT NULL,
  `vendor_email` varchar(250) NOT NULL,
  `vendor_username` varchar(250) NOT NULL,
  `vendor_password` varchar(250) NOT NULL,
  `image_url` varchar(250) NOT NULL,
  `telephone` int(10) NOT NULL,
  `vAddress` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `vendor_name`, `vendor_email`, `vendor_username`, `vendor_password`, `image_url`, `telephone`, `vAddress`) VALUES
(1, 'jkh', 'cjl@yahoo.com', 'cji210', 'cjl', '', 0, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
