-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2017 at 09:22 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `houseofdiamante`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(25) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_email` varchar(30) NOT NULL,
  `telephone` int(25) NOT NULL,
  `username` varchar(20) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `telephone`, `username`, `Password`) VALUES
(1, 'Aruna', 'aruna@gmail.com', 646564646, 'aruna', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title_name` varchar(200) NOT NULL,
  `username` varchar(250) NOT NULL,
  `image_url` varchar(250) NOT NULL,
  `likes` int(11) NOT NULL,
  `loves` int(11) NOT NULL,
  `hahas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title_name`, `username`, `image_url`, `likes`, `loves`, `hahas`) VALUES
(1, 'beautiful ring', 'thila', 'img/photohub images/trend1.jpg', 1, 1, 1),
(2, 'eligent earings', 'seo', 'img/photohub images/earing1.jpg', 1, 1, 1),
(3, 'fabulous ring', 'guru', 'img/photohub images/jewel1.jpg', 1, 1, 1),
(4, 'necklaces', 'tharu1991', 'img/photohub images/trend2.jpg', 1, 1, 1),
(5, 'bangels', 'eranga123', 'img/photohub images/jewel2.jpg', 1, 1, 1),
(6, 'beautiful jewel', 'random', 'img/photohub images/trend3.jpg', 1, 0, 0),
(7, 'ring design', 'thila', 'img/photohub images/ring2.jpg', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `articles_haha`
--

CREATE TABLE `articles_haha` (
  `id` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `article_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `articles_like`
--

CREATE TABLE `articles_like` (
  `id` int(11) NOT NULL,
  `user` varchar(250) NOT NULL,
  `type` varchar(50) NOT NULL,
  `article_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles_like`
--

INSERT INTO `articles_like` (`id`, `user`, `type`, `article_id`) VALUES
(22, 'mythree', 'like', 1),
(23, 'mythree', 'love', 1),
(24, 'mythree', 'haha', 4),
(26, 'mythree', 'haha', 1),
(27, 'mythree', 'like', 2),
(28, 'mythree', 'love', 2),
(29, 'mythree', 'haha', 2),
(30, 'mythree', 'like', 3),
(31, 'mythree', 'love', 3),
(32, 'mythree', 'haha', 3),
(33, 'mythree', 'like', 4),
(34, 'mythree', 'love', 4),
(35, 'mythree', 'like', 5),
(36, 'mythree', 'love', 5),
(37, 'mythree', 'haha', 5),
(38, 'mythree', 'like', 6);

--
-- Triggers `articles_like`
--
DELIMITER $$
CREATE TRIGGER `trig2` AFTER INSERT ON `articles_like` FOR EACH ROW BEGIN
    IF NEW.type = 'like' THEN
        UPDATE articles
        SET likes = likes+1
        WHERE articles.id = NEW.article_id;
    END IF;
    IF NEW.type = 'love' THEN
        UPDATE articles
        SET loves = loves+1
        WHERE articles.id = NEW.article_id;
    END IF;
    IF NEW.type = 'haha' THEN
        UPDATE articles
        SET hahas = hahas+1
        WHERE articles.id = NEW.article_id;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `articles_likes`
--

CREATE TABLE `articles_likes` (
  `id` int(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  `article_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `articles_love` (
  `id` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `article_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `centercut` (
  `id` int(11) NOT NULL,
  `cut_name` varchar(250) NOT NULL,
  `image_url` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `chat` (
  `msg_id` int(11) NOT NULL,
  `sender` varchar(100) NOT NULL,
  `receiver` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `updated_date` date NOT NULL,
  `updated_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`msg_id`, `sender`, `receiver`, `message`, `updated_date`, `updated_time`) VALUES
(21, 'mythree', 'cjs', 'hello sir,can you help me??', '0000-00-00', '00:00:00'),
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

CREATE TABLE `customerlogin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL,
  `image_url` varchar(250) NOT NULL,
  `pro_pic` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customerlogin`
--

INSERT INTO `customerlogin` (`id`, `username`, `email`, `password`, `image_url`, `pro_pic`) VALUES
(1, 'mythree', 'mythree@gmail.com', 'mythree', 'http://placehold.it/50x50', 'img/no_user.jpg'),
(2, 'arunadj', 'arunadilshanjayathilake@yahoo.', '123', 'http://placehold.it/50x50', 'img/no_user.jpg'),
(3, 'thila', 'thila@yahoo.com', 'thila', 'http://placehold.it/50x50', 'img/no_user.jpg'),
(6, 'dad', 'dad@yahoo.com', 'df3939f119', 'http://placehold.it/50x50', 'img/no_user.jpg'),
(7, 'jaya', 'jaya@gmail.com', 'ce9689abde', 'http://placehold.it/50x50', 'img/no_user.jpg'),
(8, 'Tharindu', 'tharindu.ishanka1994@gmail.com', '123', '', 'http://placehold.it/50x50');

-- --------------------------------------------------------

--
-- Table structure for table `dolist`
--

CREATE TABLE `dolist` (
  `doId` int(11) NOT NULL,
  `task` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dolist`
--

INSERT INTO `dolist` (`doId`, `task`) VALUES
(1, 'drink coffee'),
(2, 'go go go');

-- --------------------------------------------------------

--
-- Table structure for table `gem`
--

CREATE TABLE `gem` (
  `id` int(11) NOT NULL,
  `gem_name` varchar(250) NOT NULL,
  `model_name` varchar(250) NOT NULL,
  `gem_dec` varchar(500) NOT NULL,
  `image_url` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `metal` (
  `id` int(11) NOT NULL,
  `metal_name` varchar(250) NOT NULL,
  `model_name` varchar(250) NOT NULL,
  `image_url` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `notification` (
  `not_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `vendor` varchar(15) NOT NULL,
  `customer` varchar(15) NOT NULL,
  `view` varchar(10) NOT NULL,
  `jewel_type` varchar(250) NOT NULL,
  `size` decimal(10,0) NOT NULL,
  `metal` varchar(255) NOT NULL,
  `diamond` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`not_id`, `date`, `vendor`, `customer`, `view`, `jewel_type`, `size`, `metal`, `diamond`, `price`) VALUES
(1, '2016-09-07', 'swarnamahal', 'Tharindu', 'yes', '', '25', 'Gold', 'Rose', '35000'),
(2, '2016-09-12', 'Nileka', 'Aruna', 'no', '', '0', '', '', '0'),
(3, '2016-09-14', 'vogue', 'Tharindu', 'yes', '', '0', 'Silver', 'Rose', '1000'),
(4, '2016-09-21', 'manoma', 'Tharindu', 'yes', '', '0', 'silver', 'rose', '1200'),
(5, '2016-09-20', 'mallika', 'Tharindu', 'yes', '', '0', 'gold', 'rose', '0');

-- --------------------------------------------------------

--
-- Table structure for table `product_items`
--

CREATE TABLE `product_items` (
  `item_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_type` varchar(100) NOT NULL,
  `product_dec` varchar(250) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `image_url` varchar(250) NOT NULL,
  `vendor_username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_items`
--

INSERT INTO `product_items` (`item_id`, `product_name`, `product_type`, `product_dec`, `product_price`, `image_url`, `vendor_username`) VALUES
(1, 'white ring', 'ring', 'This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '$64.99', 'img/vendor images/mallika/ring3.jpg', 'mallika'),
(2, 'gold neckles', 'neckles', 'gnxfgjxxnnvbxn', '$64.99', 'img/vendor images/mallika/necklace1.jpg', 'mallika'),
(3, 'silver ring', 'ring', 'sdrawetgdbcvx', '$64.99', 'img/vendor images/neha/ring1.jpg', 'Neha Jewellery'),
(4, 'necklace with<br> pearl', 'neckles', 'good looking', '$30.00', 'img/vendor images/neha/necklace2.jpg', 'Neha Jewellery'),
(5, 'Gold necklace', 'neckles', 'eligent one', '$35.00', 'img/vendor images/cjs/necklace3.jpg', 'cjs'),
(6, 'gold earings', 'earings', 'nice looking', '$20.00', 'img/vendor images/cjs/earing2.jpg', 'cjs'),
(7, 'silver ring with<br> diamond', 'ring', 'eligent and beautiful ring', '$69.00', 'img/vendor images/kendra/ring2.jpg', 'kendra scot'),
(8, 'gold ring with<br> diamond', 'ring', 'nice looking for ladies', '$56.00', 'img/vendor images/kendra/ring4.jpg', 'kendra scot');

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

CREATE TABLE `quotation` (
  `id` int(11) NOT NULL,
  `full_name` varchar(250) NOT NULL,
  `mobile_num` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `ring_size` varchar(250) NOT NULL,
  `carrot_w` varchar(250) NOT NULL,
  `metal` varchar(250) NOT NULL,
  `gemstone` varchar(250) NOT NULL,
  `center_cut` varchar(250) NOT NULL,
  `image_url` varchar(250) NOT NULL,
  `vendor` varchar(30) NOT NULL,
  `view` varchar(20) NOT NULL DEFAULT 'no',
  `item_type` varchar(40) NOT NULL DEFAULT 'ring'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quotation`
--

INSERT INTO `quotation` (`id`, `full_name`, `mobile_num`, `email`, `ring_size`, `carrot_w`, `metal`, `gemstone`, `center_cut`, `image_url`, `vendor`, `view`, `item_type`) VALUES
(3, 'dfgdf', 'ssdh', 'fdhdf', '14ct', 'Size 5', 'Gold', 'red', 'heart', 'img/ring type/type1.png', 'cjs', 'yes', 'ring'),
(4, 'sgsgg', 'dsg', 'gsd', '14ct', 'Size 5', 'Gold', 'blue', 'oval', 'img/ring type/type1.png', 'mallika', 'no', 'ring');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `vendor_username` varchar(100) NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `user`, `vendor_username`, `rate`) VALUES
(1, 'mythree', 'mallika', 3),
(2, 'mythree', 'kendra scot', 4),
(3, '', 'mallika', 4),
(4, 'mythree', 'Neha Jewellery', 3),
(5, 'thila', 'cjs', 4),
(6, '', 'kendra scot', 3),
(7, '', 'cjs', 4);

-- --------------------------------------------------------

--
-- Table structure for table `ringtype`
--

CREATE TABLE `ringtype` (
  `id` int(11) NOT NULL,
  `type_name` varchar(250) NOT NULL,
  `gem_n` varchar(250) NOT NULL,
  `image_url` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `temp_customerlogin` (
  `id` int(11) NOT NULL,
  `confirm_code` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_customerlogin`
--

INSERT INTO `temp_customerlogin` (`id`, `confirm_code`, `username`, `email`, `password`) VALUES
(1, '4ee87bf8bc6dde8b0d88373edbb2c73c', 'arunadj', 'arunadilshanjayathilake@yahoo.com', '123'),
(2, 'a28bc4e0ef7e991224f5ce6b16f0797d', 'thila', 'thila@yahoo.com', 'thila'),
(3, '308833b636d84078b97d8ca84c14f116', 'jhbuhb', 'jhbujhb', '92163508c0b18e75db11'),
(4, '08d288990ac012f103ed3be9e5338495', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `venderdetail`
--

CREATE TABLE `venderdetail` (
  `vId` int(11) NOT NULL,
  `vName` int(11) NOT NULL,
  `vPassword` int(11) NOT NULL,
  `vAddress` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `vendor_name` varchar(250) NOT NULL,
  `vendor_email` varchar(250) NOT NULL,
  `vendor_username` varchar(250) NOT NULL,
  `vendor_password` varchar(250) NOT NULL,
  `image_url` varchar(250) NOT NULL,
  `telephone` int(10) NOT NULL,
  `vAddress` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `vendor_name`, `vendor_email`, `vendor_username`, `vendor_password`, `image_url`, `telephone`, `vAddress`) VALUES
(2, 'mallika', 'ml@gmail.com', 'mallika', 'mala', '', 34225368, 'N0.45/7,Malwatta junction,Uggalboda'),
(3, 'cjs', 'cjs@gmail.com', 'user1', 'cjs', 'img/vendor images/', 7123564, 'N0.34,ef,dcsghf');

-- --------------------------------------------------------

--
-- Table structure for table `vr`
--

CREATE TABLE `vr` (
  `image_id` int(11) NOT NULL,
  `vendor_name` varchar(25) NOT NULL,
  `image` varchar(256) NOT NULL,
  `product_type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vr`
--

INSERT INTO `vr` (`image_id`, `vendor_name`, `image`, `product_type`) VALUES
(1, 'Kendra Scott', 'img\\vr\\neck1.png', 'Necklace'),
(2, 'Neha jewellary', 'img\\vr\\neck2.png', 'Necklace'),
(3, 'Neha jewellary', 'img\\vr\\neck3.png', 'Necklace'),
(4, 'Kendra Scott', 'img/vr/neck4.png', 'Necklace');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles_haha`
--
ALTER TABLE `articles_haha`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles_like`
--
ALTER TABLE `articles_like`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles_likes`
--
ALTER TABLE `articles_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles_love`
--
ALTER TABLE `articles_love`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `centercut`
--
ALTER TABLE `centercut`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `customerlogin`
--
ALTER TABLE `customerlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dolist`
--
ALTER TABLE `dolist`
  ADD PRIMARY KEY (`doId`);

--
-- Indexes for table `gem`
--
ALTER TABLE `gem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metal`
--
ALTER TABLE `metal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`not_id`);

--
-- Indexes for table `product_items`
--
ALTER TABLE `product_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `quotation`
--
ALTER TABLE `quotation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ringtype`
--
ALTER TABLE `ringtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_customerlogin`
--
ALTER TABLE `temp_customerlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vr`
--
ALTER TABLE `vr`
  ADD PRIMARY KEY (`image_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `articles_haha`
--
ALTER TABLE `articles_haha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `articles_like`
--
ALTER TABLE `articles_like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `articles_likes`
--
ALTER TABLE `articles_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `articles_love`
--
ALTER TABLE `articles_love`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `centercut`
--
ALTER TABLE `centercut`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `customerlogin`
--
ALTER TABLE `customerlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `dolist`
--
ALTER TABLE `dolist`
  MODIFY `doId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `gem`
--
ALTER TABLE `gem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `metal`
--
ALTER TABLE `metal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `product_items`
--
ALTER TABLE `product_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `quotation`
--
ALTER TABLE `quotation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ringtype`
--
ALTER TABLE `ringtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `temp_customerlogin`
--
ALTER TABLE `temp_customerlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `vr`
--
ALTER TABLE `vr`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
