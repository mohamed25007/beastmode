-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 18, 2014 at 02:18 PM
-- Server version: 5.5.40-36.1
-- PHP Version: 5.4.23

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aptools_site`
--
CREATE DATABASE `aptools_site` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `aptools_site`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `CatID` int(11) NOT NULL AUTO_INCREMENT,
  `CatName` varchar(30) NOT NULL,
  PRIMARY KEY (`CatID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CatID`, `CatName`) VALUES
(4, 'Tools');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `title` varchar(3) NOT NULL,
  `firstName` varchar(15) NOT NULL,
  `lastName` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phoneNumber` int(11) NOT NULL,
  `addressLine1` varchar(30) NOT NULL,
  `addressLine2` varchar(30) NOT NULL,
  `addressCity` varchar(15) NOT NULL,
  `addressPostal` varchar(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `manufactures`
--

CREATE TABLE IF NOT EXISTS `manufactures` (
  `ManufactureID` int(11) NOT NULL AUTO_INCREMENT,
  `ManufactureName` varchar(30) NOT NULL,
  PRIMARY KEY (`ManufactureID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `manufactures`
--

INSERT INTO `manufactures` (`ManufactureID`, `ManufactureName`) VALUES
(3, 'STANLEY'),
(4, 'KUNYS'),
(5, 'M/TOWN'),
(6, 'RST'),
(7, 'BLUE SPOT'),
(8, 'FAI/FULL'),
(9, 'LIGHTHOUSE'),
(10, 'SCAN'),
(11, 'STABILA'),
(12, 'R/NECK');

-- --------------------------------------------------------

--
-- Table structure for table `productimages`
--

CREATE TABLE IF NOT EXISTS `productimages` (
  `PicID` int(11) NOT NULL AUTO_INCREMENT,
  `ProdID` int(11) NOT NULL,
  `imageName` varchar(50) NOT NULL,
  PRIMARY KEY (`PicID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `productimages`
--

INSERT INTO `productimages` (`PicID`, `ProdID`, `imageName`) VALUES
(1, 1, '1404221386_1403994461p1.png'),
(2, 2, '1404290764_p1.jpg'),
(3, 2, '1404290764_p1.png'),
(4, 2, '1404290764_p2.jpg'),
(5, 2, '1404290764_p3.jpg'),
(6, 4, '1411823027_new-mythic-07624 (1).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `productorders`
--

CREATE TABLE IF NOT EXISTS `productorders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productIDArray` text NOT NULL,
  `productQuantityArray` text NOT NULL,
  `customerID` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `authorisationString` text NOT NULL,
  `totalPrice` decimal(10,2) NOT NULL,
  `statusID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `productorders`
--

INSERT INTO `productorders` (`id`, `productIDArray`, `productQuantityArray`, `customerID`, `date`, `time`, `authorisationString`, `totalPrice`, `statusID`) VALUES
(1, '', 'Test Tool(1),', 0, '2014-07-01', '08:31:18', '', '125.00', 0),
(2, '', 'Test(2),', 0, '2014-07-02', '02:47:01', '', '26.00', 0),
(3, '', 'Test(3),', 0, '2014-07-02', '03:19:25', '', '39.00', 0),
(4, '', 'Test(1),', 0, '2014-07-02', '03:25:38', '', '13.00', 0),
(5, '', 'Test(1),', 0, '2014-07-02', '03:27:18', '', '13.00', 0),
(6, '', 'Test(1),', 0, '2014-07-02', '03:30:36', '', '13.00', 0),
(7, '', 'Test(1),', 0, '2014-07-02', '03:33:30', '', '13.00', 3),
(8, '', 'Test(1),', 0, '2014-07-02', '03:38:10', '', '13.00', 1),
(9, '', 'Test(1),', 0, '2014-07-02', '03:43:50', '', '13.00', 0),
(10, '', 'Test(2),', 0, '2014-07-02', '03:44:41', '', '26.00', 0),
(11, '', 'Test(1),', 0, '2014-07-02', '12:30:52', '', '13.00', 0),
(12, '', 'Test(1),', 0, '2014-07-02', '12:50:03', '', '13.00', 0),
(13, '', 'Test(1),', 0, '2014-07-02', '12:58:22', '', '13.00', 0),
(14, '', 'Test(1),', 0, '2014-07-07', '05:34:48', '', '13.00', 0),
(15, '', 'Test2(1),', 0, '2014-09-02', '16:41:24', '', '24.00', 0),
(16, '', 'Test(1),', 0, '2014-09-02', '16:43:03', '', '13.00', 0),
(17, '', 'Test(1),', 0, '2014-09-02', '16:44:41', '', '13.00', 0),
(18, '', 'Test2(1),', 0, '2014-09-05', '13:24:56', '', '24.00', 0),
(19, '', '1992B (5) KNIFE BLADES H/D(1),', 0, '2014-09-27', '08:36:26', '', '2.95', 0),
(20, '', 'aa(1),', 0, '2014-10-21', '12:20:45', '', '3.00', 0),
(21, '', 'Fatmax S/Driver Pozi pz3 x 150(1),', 0, '2014-11-15', '12:41:54', '', '7.92', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `special` int(11) NOT NULL,
  `description` text NOT NULL,
  `delivery_charges` double NOT NULL,
  `categoryID` int(11) NOT NULL,
  `manufactureId` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `specification` text NOT NULL,
  `pictureArrayID` int(11) NOT NULL,
  `recomended` tinyint(1) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=375 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_id`, `name`, `special`, `description`, `delivery_charges`, `categoryID`, `manufactureId`, `price`, `specification`, `pictureArrayID`, `recomended`, `image`) VALUES
(2, 'STA010150', 'SM Snap off Blade Knife 9mm', 0, '', 0, 4, 3, '2.50', ' ', 0, 0, ''),
(3, 'STA010151', 'SM Snap off Blade Knife 18mm', 0, ' ', 0, 4, 3, '3.50', ' ', 0, 0, ''),
(4, 'STA010486', 'Fatmax Snap off Knife 25mm', 0, ' ', 0, 4, 3, '19.95', ' ', 0, 0, ''),
(5, 'STA011300', 'Snap off Blades (10) 9mm', 0, '', 0, 4, 3, '3.95', '', 0, 0, ''),
(6, 'STA011301', 'Snap off Blades (10) 18mm', 0, ' ', 0, 4, 3, '5.95', ' ', 0, 0, ''),
(7, 'STA011325', 'Snap off Blades (10) 25mm', 0, ' ', 0, 4, 3, '6.95', ' ', 0, 0, ''),
(8, 'STA011921', '1992b (5) Knife Blades H/D', 0, ' ', 0, 4, 3, '1.95', ' ', 0, 0, ''),
(9, 'STA011983', '1996B (5) Knife Blades Hooked', 0, ' ', 0, 4, 3, '2.75', ' ', 0, 0, ''),
(10, 'STA211921', '1992 Knife Blades H/D (card 10', 0, ' ', 0, 4, 3, '3.75', ' ', 0, 0, ''),
(11, 'STA210099', 'Original Retractable Blade Kni', 0, ' ', 0, 4, 3, '7.95', ' ', 0, 0, ''),
(12, 'STA10499', 'Retractable Blade Knife', 0, ' ', 0, 4, 3, '0.00', ' ', 0, 0, ''),
(13, 'STA910813', 'Sport Quickslide Utility Knife', 0, ' ', 0, 4, 3, '19.95', ' ', 0, 0, ''),
(14, 'STA910810', 'Quickslide Pocket Utility Knif', 0, ' ', 0, 4, 3, '12.95', ' ', 0, 0, ''),
(15, 'STA510778', 'Fatmax Retractable Knife', 0, ' ', 0, 4, 3, '14.95', ' ', 0, 0, ''),
(16, 'STA010825', 'Fatmax Retractable Folding Kni', 0, ' ', 0, 4, 3, '14.95', ' ', 0, 0, ''),
(17, 'STA510818', 'Fatmax XL Fixed Blade Knide', 0, ' ', 0, 4, 3, '19.95', ' ', 0, 0, ''),
(18, 'STA510819', 'Fatmax XL Retractable Knife', 0, ' ', 0, 4, 3, '21.95', ' ', 0, 0, ''),
(19, 'STA511700', 'Fatmax Utility Blades (5)', 0, ' ', 0, 4, 3, '2.95', ' ', 0, 0, ''),
(20, 'STA611700', 'Fatmax Utility Blades (10)', 0, ' ', 0, 4, 3, '3.95', ' ', 0, 0, ''),
(21, 'STA811921', 'Blade Dispenser', 0, ' ', 0, 4, 3, '21.11', ' ', 0, 0, ''),
(22, 'STA198456', 'Instant Change Knife', 0, ' ', 0, 4, 3, '14.95', ' ', 0, 0, ''),
(23, 'STA211800', 'Carbide Knife BLADES (10)', 0, ' ', 0, 4, 3, '7.35', ' ', 0, 0, ''),
(24, 'STA010481', 'Fatmax Snap off Knife 18mm', 0, ' ', 0, 4, 3, '10.95', ' ', 0, 0, ''),
(25, 'STA10028', 'Fatmax Knife Holster', 0, ' ', 0, 4, 3, '6.95', ' ', 0, 0, ''),
(26, 'STA014206', 'Fatmax Xtreme Aviation Snip St', 0, ' ', 0, 4, 3, '21.95', ' ', 0, 0, ''),
(27, 'STA214563', 'Aviation Snip - Straight Cut', 0, ' ', 0, 4, 3, '19.95', ' ', 0, 0, ''),
(28, 'STA315905', 'Junior Blades (card 5)', 0, ' ', 0, 4, 3, '2.95', ' ', 0, 0, ''),
(29, 'STA120090', 'Heavy-Duty Handsaw 20in', 0, ' ', 0, 4, 3, '8.50', ' ', 0, 0, ''),
(30, 'STA120600', 'Clamping Mitre Box and Saw', 0, ' ', 0, 4, 3, '19.95', ' ', 0, 0, ''),
(31, 'STA015104', 'Fatmax Coping Saw (4.3/4in fra', 0, ' ', 0, 4, 3, '10.11', ' ', 0, 0, ''),
(32, 'STA015218', 'Junior Hacksaw 150mm', 0, ' ', 0, 4, 3, '6.95', ' ', 0, 0, ''),
(33, 'STA015906', 'Hss Moly Hacksaw Blades (2)', 0, ' ', 0, 4, 3, '5.95', ' ', 0, 0, ''),
(34, 'STA115122', 'Enclosed Grip Hacksaw 300mm', 0, ' ', 0, 4, 3, '9.95', ' ', 0, 0, ''),
(35, 'STA020559', 'Fatmax Folding Jab Saw', 0, ' ', 0, 4, 3, '21.95', ' ', 0, 0, ''),
(36, 'STA016067', 'Fmht0-16067 Side Strike Chisel', 0, ' ', 0, 4, 3, '18.95', ' ', 0, 0, ''),
(37, 'STA016870', 'D/Grip Chisel Strike Cap 6mm', 0, ' ', 0, 4, 3, '9.95', ' ', 0, 0, ''),
(38, 'STA16873', 'D/Grip Chisel Strike Cap 12mm', 0, ' ', 0, 4, 3, '10.95', ' ', 0, 0, ''),
(39, 'STA016877', 'D/Grip Chisel Strike Cap 18mm', 0, ' ', 0, 4, 3, '11.95', ' ', 0, 0, ''),
(40, 'STA016879', 'D/Grip Chisel Strike Cap 22mm', 0, ' ', 0, 4, 3, '13.95', ' ', 0, 0, ''),
(41, 'STA016880', 'D/Grip Chisel Strike Cap 25mm', 0, ' ', 0, 4, 3, '14.95', ' ', 0, 0, ''),
(42, 'STA016881', 'D/Grip Chisel Strike Cap 32mm', 0, ' ', 0, 4, 3, '17.95', ' ', 0, 0, ''),
(43, 'STA028590', '5930c Window Scraper 170mm', 0, ' ', 0, 4, 3, '2.95', ' ', 0, 0, ''),
(44, 'STA030656N', 'New Pocket Tape 8M/26Ft', 0, ' ', 0, 4, 3, '9.95', ' ', 0, 0, ''),
(45, 'STA030656N', 'New Pocket Tape 5M/16Ft', 0, ' ', 0, 4, 3, '6.95', ' ', 0, 0, ''),
(46, 'STA033553', 'Powerlock Tape Armor 5m/16Ft', 0, ' ', 0, 4, 3, '6.95', ' ', 0, 0, ''),
(47, 'STA033526', 'Powerlock Tape Armor 8m/26Ft', 0, ' ', 0, 4, 3, '18.95', ' ', 0, 0, ''),
(48, 'STA033719', 'Fatmax Tape 5m/16ft', 0, ' ', 0, 4, 3, '12.95', ' ', 0, 0, ''),
(49, 'STA033720', 'Fatmax Tape 5m', 0, ' ', 0, 4, 3, '21.95', ' ', 0, 0, ''),
(50, 'STA033726', 'Fatmax Tape 8m/26ft', 0, ' ', 0, 4, 3, '21.95', ' ', 0, 0, ''),
(51, 'STA033728', 'Fatmax Tape 8m', 0, ' ', 0, 4, 3, '21.95', ' ', 0, 0, ''),
(52, 'STA033805', 'Fatmax Tape 10m/32ft', 0, ' ', 0, 4, 3, '28.95', ' ', 0, 0, ''),
(53, 'STA033864', 'Fatmax HT Tape 5m Magnetic', 0, ' ', 0, 4, 3, '25.95', ' ', 0, 0, ''),
(54, 'STA033868', 'Fatmax HT Tape 8m Magnetic', 0, ' ', 0, 4, 3, '28.95', ' ', 0, 0, ''),
(55, 'STA533886', 'Fatmax XL Tape 5m/16ft Silver', 0, ' ', 0, 4, 3, '25.95', ' ', 0, 0, ''),
(56, 'STA033887', 'Fatmax XL Tape 5m Silver', 0, ' ', 0, 4, 3, '25.95', ' ', 0, 0, ''),
(57, 'STA5533891', 'Fatmax XL Tape 8m/26ft Silver', 0, ' ', 0, 4, 3, '28.95', ' ', 0, 0, ''),
(58, 'STA033892', 'Fatmax XL Tape 8m Silver', 0, ' ', 0, 4, 3, '28.95', ' ', 0, 0, ''),
(59, 'STA034132', 'Fatmax Long Tape 30m/100ft', 0, ' ', 0, 4, 3, '28.58', ' ', 0, 0, ''),
(60, 'STA234791', 'Open Reel F/Glass Tape 30m/100', 0, ' ', 0, 4, 3, '21.83', ' ', 0, 0, ''),
(61, 'STA047443', 'Chalk Line 30m Blue Chalk/Leve', 0, '', 0, 4, 3, '11.95', '', 0, 0, ''),
(62, 'STA047465', 'Power Winder Chalk Line Cha/Le', 0, ' ', 0, 4, 3, '19.95', ' ', 0, 0, ''),
(63, 'STA047140', 'Fatmax Chalk Line 30m', 0, ' ', 0, 4, 3, '11.95', ' ', 0, 0, ''),
(64, 'STA047100', 'Metal Chalk Line 30m', 0, '', 0, 4, 3, '0.00', '', 0, 0, ''),
(65, 'STA147403', 'Chalk Refill 113g Blue', 0, ' ', 0, 4, 3, '3.95', ' ', 0, 0, ''),
(66, 'STA147404', 'Chalk Refill 113g Red', 0, ' ', 0, 4, 3, '3.95', ' ', 0, 0, ''),
(67, 'STA058930', 'Dynagrip Nail Punch Set 3pc', 0, ' ', 0, 4, 3, '13.95', ' ', 0, 0, ''),
(68, 'STA062571', 'Fatmax S/Driver Pozi pz2 x 250', 0, ' ', 0, 4, 3, '7.92', ' ', 0, 0, ''),
(69, 'STA064983', 'Fatmax S/Driver Para 3.5mm x 7', 0, ' ', 0, 4, 3, '3.96', ' ', 0, 0, ''),
(70, 'STA065016', 'Fatmax S/Driver Flared 4.0mm x', 0, 'STANLEY', 0, 4, 3, '4.95', '', 0, 0, ''),
(71, 'STA065017', 'Fatmax S/Driver Flared 4.0mm x', 0, '', 0, 4, 3, '0.00', '', 0, 0, ''),
(72, 'STA065098', 'Fatmax S/Driver Flared 5.5mm x', 0, ' ', 0, 4, 3, '5.35', ' ', 0, 0, ''),
(73, 'STA065138', 'Fatmax S/Driver Flared 8.0mm x', 0, ' ', 0, 4, 3, '8.95', ' ', 0, 0, ''),
(74, 'STA065139', 'Fatmax S/Driver Flared 10.0mm ', 0, ' ', 0, 4, 3, '9.95', ' ', 0, 0, ''),
(75, 'STA065207', 'Fatmax S/Driver Philips ph1 x ', 0, ' ', 0, 4, 3, '5.29', ' ', 0, 0, ''),
(76, 'STA065209', 'Fatmax S/Driver Philips ph2 x ', 0, ' ', 0, 4, 3, '7.26', ' ', 0, 0, ''),
(77, 'STA065335', 'Fatmax S/Driver Pozi pz1 x 100', 0, ' ', 0, 4, 3, '5.95', ' ', 0, 0, ''),
(78, 'STA065337', 'Fatmax S/Driver pozi pz2 x 125', 0, ' ', 0, 4, 3, '6.61', ' ', 0, 0, ''),
(79, 'STA065338', 'Fatmax S/Driver Pozi pz3 x 150', 0, ' ', 0, 4, 3, '7.92', ' ', 0, 0, ''),
(80, 'STA065409', 'Fatmax S/Driver Pozi pz2 x 30m', 0, ' ', 0, 4, 3, '5.95', ' ', 0, 0, ''),
(81, 'STA065438', 'Fatmax S/Driver Set ph/pz/fl/p', 0, ' ', 0, 4, 3, '24.95', ' ', 0, 0, ''),
(82, 'STA066119', 'VDE Voltage Tester S?Driver c/', 0, ' ', 0, 4, 3, '8.95', ' ', 0, 0, ''),
(83, 'STA066358', 'Multibit Stubby S/Driver & Bit', 0, ' ', 0, 4, 3, '16.95', ' ', 0, 0, ''),
(84, 'STA068010', 'Multibit Ratchet S/Driver & Bi', 0, '', 0, 4, 3, '8.95', ' ', 0, 0, ''),
(85, 'STA598001', 'Cushion Grip S/Driver Set 6pc', 0, ' ', 0, 4, 3, '10.87', ' ', 0, 0, ''),
(86, 'STA194550', 'CUSHION Grip S/Driver Set 16p', 0, ' ', 0, 4, 3, '26.95', ' ', 0, 0, ''),
(87, 'STA065443', 'Fatmax S/Driver Set Insul 6pc ', 0, ' ', 0, 4, 3, '25.95', ' ', 0, 0, ''),
(88, 'STA065441', 'Fatmax S/Driver Set Insul 6pc ', 0, ' ', 0, 4, 3, '25.95', ' ', 0, 0, ''),
(89, 'STA168738', '7pc Insert Bit Set (pz/sl)', 0, ' ', 0, 4, 3, '11.95', ' ', 0, 0, ''),
(90, 'STA070445', 'Pipe Cutter', 0, ' ', 0, 4, 3, '15.95', ' ', 0, 0, ''),
(91, 'STA070446', 'Pipe Cutter', 0, ' ', 0, 4, 3, '18.95', ' ', 0, 0, ''),
(92, 'STA070448', 'Adj Pipe Cutter', 0, ' ', 0, 4, 3, '16.95', ' ', 0, 0, ''),
(93, 'STA070454', 'Basin Wrench fixed', 0, ' ', 0, 4, 3, '14.95', ' ', 0, 0, ''),
(94, 'STA084648', 'Fatmax Groove Joint Plier 101n', 0, ' ', 0, 4, 3, '20.67', ' ', 0, 0, ''),
(95, 'STA089867', 'Fatmax Dia Cut Plier 190mm', 0, ' ', 0, 4, 3, '18.53', ' ', 0, 0, ''),
(97, 'STA084646', 'Fatmax Plier 8in', 0, ' ', 0, 4, 3, '16.71', ' ', 0, 0, ''),
(98, 'STA089867', 'Fatmax Comb Plier 185mm', 0, ' ', 0, 4, 3, '15.87', ' ', 0, 0, ''),
(99, 'STA089870', 'Fatma Long Nose Plier 200mm', 0, '', 0, 4, 3, '0.00', '', 0, 0, ''),
(100, 'STA089875', 'Fatmax End Cut Plier 150mm', 0, ' ', 0, 4, 3, '19.95', ' ', 0, 0, ''),
(101, 'STA084812', 'Loking Pliers 7in Curved Jaw', 0, ' ', 0, 4, 3, '15.95', ' ', 0, 0, ''),
(102, 'STA084812', 'Locking Pliers 6in Long Nose', 0, ' ', 0, 4, 3, '17.95', ' ', 0, 0, ''),
(103, 'STA090947', 'Adjustable Wrench 150mm', 0, ' ', 0, 4, 3, '12.95', ' ', 0, 0, ''),
(104, 'STA090948', 'Adjustable Wrench 200mm', 0, ' ', 0, 4, 3, '14.95', ' ', 0, 0, ''),
(105, 'STA090949', 'Adustable Wrench 250mm', 0, ' ', 0, 4, 3, '16.95', ' ', 0, 0, ''),
(106, 'STA090950', 'Adustable Wrench 300mm', 0, ' ', 0, 4, 3, '18.95', ' ', 0, 0, ''),
(107, 'STA085610', 'Locking ADJ Wrench 10in ', 0, ' ', 0, 4, 3, '21.95', ' ', 0, 0, ''),
(108, 'STA0TR250', 'Heavy-Duty Staple/Brad Gun', 0, '', 0, 4, 3, '0.00', '', 0, 0, ''),
(109, 'STA0TRA704T', 'Heavy-Duty Staple 6mm', 0, ' ', 0, 4, 3, '2.95', ' ', 0, 0, ''),
(110, 'STA0TRA705T', 'Heavy-Duty Staple 8mm', 0, ' ', 0, 4, 3, '3.50', ' ', 0, 0, ''),
(111, 'STA0TRA706T', 'Heavy-Duty Staple 10mm', 0, '', 0, 4, 3, '3.95', '', 0, 0, ''),
(112, 'STA0TRA708T', 'Heavy-Duty Staple 12mm', 0, ' ', 0, 4, 3, '4.50', ' ', 0, 0, ''),
(113, 'STA0TRA709T', 'Heavy-Duty Staple 14mm', 0, ' ', 0, 4, 3, '4.95', ' ', 0, 0, ''),
(114, 'STA0SWKBN05', 'Brad Nail 12mm (1000)', 0, ' ', 0, 4, 3, '5.95', ' ', 0, 0, ''),
(115, 'STA0SWKBN06', 'Brad Nail 15mm (1000)', 0, ' ', 0, 4, 3, '6.25', ' ', 0, 0, ''),
(116, 'STA142234', '2 Series Level 60cm 3 Vial', 0, ' ', 0, 4, 3, '21.95', ' ', 0, 0, ''),
(117, 'STA142257', '2 Series 120cm 3 Vial', 0, ' ', 0, 4, 3, '29.95', ' ', 0, 0, ''),
(118, 'STA143524', 'Fatmax Level 60cm', 0, ' ', 0, 4, 3, '29.95', ' ', 0, 0, ''),
(119, 'STA143548', 'Fatmax Level 120cm', 0, ' ', 0, 4, 3, '33.95', ' ', 0, 0, ''),
(120, 'STA143572', 'Fatmax Level 180cm', 0, ' ', 0, 4, 3, '69.95', ' ', 0, 0, ''),
(121, 'STA043624', 'Fatmax Xtreme Box Level 60cm', 0, ' ', 0, 4, 3, '29.95', ' ', 0, 0, ''),
(122, '', 'Fatmax Xtreme Box Level 120cm', 0, ' ', 0, 4, 3, '39.95', ' ', 0, 0, ''),
(123, 'STA047316', 'Black Fine Tip Permanent Marke', 0, ' ', 0, 4, 3, '2.95', ' ', 0, 0, ''),
(124, 'STA147329', 'Mini Fine Tip Pen (tub 72)', 0, ' ', 0, 4, 3, '0.95', ' ', 0, 0, ''),
(125, 'STA151167', 'Fatmax Xtreme Frame Hammer 22.', 0, ' ', 0, 4, 3, '39.95', ' ', 0, 0, ''),
(126, 'STA151164', 'Fatmax Xtreme Curve Claw Hamme', 0, '', 0, 4, 3, '32.95', '', 0, 0, ''),
(127, 'STA151165', 'Fatmax Xtreme Rip Claw Hammer ', 0, '', 0, 4, 3, '32.44', '', 0, 0, ''),
(128, 'STA151177', 'Fatmax Xtreme Frame Hammer 22.', 0, ' ', 0, 4, 3, '42.95', ' ', 0, 0, ''),
(129, 'STA151623', 'F/Glass Crvd Claw Hammer 20oz', 0, ' ', 0, 4, 3, '12.95', ' ', 0, 0, ''),
(130, 'STA151529', 'F/Glass Crvd Claw Hammer 16oz', 0, ' ', 0, 4, 3, '9.95', ' ', 0, 0, ''),
(131, 'STA151628', 'Fatmax AVX Curve Claw Hammer 1', 0, ' ', 0, 4, 3, '24.95', ' ', 0, 0, ''),
(132, 'STA151123', 'FM XT Hi Velocity RC Framing H', 0, ' ', 0, 4, 3, '41.95', ' ', 0, 0, ''),
(133, 'STA554015', 'Stanley Anti Vibe Drywall Hamm', 0, ' ', 0, 4, 3, '24.95', ' ', 0, 0, ''),
(134, 'STA154022', 'Stanley Anti Vibe Drywall Hamm', 0, ' ', 0, 4, 3, '32.95', ' ', 0, 0, ''),
(135, 'XMS12FGHAM', 'HI-Vis Green Fibreglass Hammer', 0, ' ', 0, 4, 3, '9.95', ' ', 0, 0, ''),
(136, 'STA155515', 'Wonder Bar 340mm / 13in', 0, ' ', 0, 4, 3, '12.95', ' ', 0, 0, ''),
(137, 'STA193601', 'Tool Roll 12 pocket', 0, ' ', 0, 4, 3, '11.95', ' ', 0, 0, ''),
(138, 'STA196181', 'Tool Pouch', 0, ' ', 0, 4, 3, '13.95', ' ', 0, 0, ''),
(139, 'STA196178', 'Tool Apron', 0, ' ', 0, 4, 3, '21.95', ' ', 0, 0, ''),
(140, 'STA194896', 'Fatmax XL Tape Holder', 0, ' ', 0, 4, 3, '0.00', ' ', 0, 0, ''),
(141, 'STA194745', 'Sortmaster Organiser', 0, ' ', 0, 4, 3, '9.77', ' ', 0, 0, ''),
(142, 'STA179215', 'Fatmax Backpack On Wheels', 0, ' ', 0, 4, 3, '51.95', ' ', 0, 0, ''),
(143, 'STA195611', 'Fatmax Tool Backpack', 0, ' ', 0, 4, 3, '57.51', ' ', 0, 0, ''),
(144, 'STA195620', 'Galvanised Metal Toolbox 26in', 0, ' ', 0, 4, 3, '28.26', ' ', 0, 0, ''),
(145, 'STA194749', 'Fatmax Waterproof Toolbox 23"', 0, ' ', 0, 4, 3, '27.95', ' ', 0, 0, ''),
(146, 'STA193950', 'Fatmax Technician Bag 18"', 0, ' ', 0, 4, 3, '32.95', ' ', 0, 0, ''),
(147, 'STA192219', '19in Toolbox Plus Bonus Box', 0, ' ', 0, 4, 3, '19.95', ' ', 0, 0, ''),
(148, 'STA197514', '24in Toolbox With Tote Tray Or', 0, ' ', 0, 4, 3, '32.95', ' ', 0, 0, ''),
(149, 'STA170316', '19in Toolbox One Touch Latch W', 0, ' ', 0, 4, 3, '29.95', ' ', 0, 0, ''),
(150, 'STA192749', 'Professional Deep Organiser', 0, ' ', 0, 4, 3, '19.95', ' ', 0, 0, ''),
(151, 'STA197483', 'Sortmaster Junior Organiser', 0, ' ', 0, 4, 3, '11.95', ' ', 0, 0, ''),
(152, 'STA197515', 'Soft Bag 18" Wheeled', 0, ' ', 0, 4, 3, '49.95', ' ', 0, 0, ''),
(153, 'STA193951', 'Fatmax Tote Bag 18in', 0, ' ', 0, 4, 3, '36.95', ' ', 0, 0, ''),
(154, 'STA192902', 'Professional Mobile Tool Chest', 0, ' ', 0, 4, 3, '39.95', ' ', 0, 0, ''),
(155, 'STA145013', 'Folding Square', 0, ' ', 0, 4, 3, '39.95', ' ', 0, 0, ''),
(156, 'STA046702', 'Rosewood Sliding Bevel 9"', 0, ' ', 0, 4, 3, '19.95', ' ', 0, 0, ''),
(157, 'STA243600', 'Carpenters Square 24in/600mm', 0, ' ', 0, 4, 3, '33.95', ' ', 0, 0, ''),
(158, 'STA246028', 'Die Cast Comb Square 12in/300m', 0, ' ', 0, 4, 3, '19.95', ' ', 0, 0, ''),
(159, 'STA246500', 'Try & Mitre Square 20mm', 0, ' ', 0, 4, 3, '7.95', ' ', 0, 0, ''),
(160, 'STA046151', '1912 Comb Square 30mm/12in', 0, ' ', 0, 4, 3, '22.95', ' ', 0, 0, ''),
(161, 'STA521398', 'Surform Blade 140mm - Fine Cut', 0, ' ', 0, 4, 3, '3.95', ' ', 0, 0, ''),
(162, 'STA521104', 'Moulded Body Surform Block Pla', 0, ' ', 0, 4, 3, '6.95', ' ', 0, 0, ''),
(163, 'STA521399', 'Metal Body Surform Block Pane', 0, '', 0, 4, 3, '11.95', '£', 0, 0, ''),
(164, 'STA521122AV', 'Long Handle Surform', 0, ' ', 0, 4, 3, '21.95', ' ', 0, 0, ''),
(165, 'STA783123', 'Fatmax Auto Trigger Clamp 15cm', 0, ' ', 0, 4, 3, '26.95', ' ', 0, 0, ''),
(166, 'STA18290', 'Cold CHisel 7/8in x 8in', 0, ' ', 0, 4, 3, '7.95', ' ', 0, 0, ''),
(167, 'STA18291', 'Cold Chisel 11in x 12in', 0, ' ', 0, 4, 3, '10.95', ' ', 0, 0, ''),
(168, 'STA418298', 'Cold Chisel Kit 3pc', 0, ' ', 0, 4, 3, '12.95', ' ', 0, 0, ''),
(169, 'STA156001', 'Anti Vibe Club Hummer 3Ib', 0, ' ', 0, 4, 3, '26.95', ' ', 0, 0, ''),
(170, 'STA154924', 'Graphite Club Hammer 1500g', 0, ' ', 0, 4, 3, '23.95', ' ', 0, 0, ''),
(171, 'STASTRTS6S9', 'Roller Set (6 x 9in) Sleeves F', 0, ' ', 0, 4, 3, '9.95', ' ', 0, 0, ''),
(172, 'STASTRTS23P', 'Stanley 23pc Decorating Painti', 0, ' ', 0, 4, 3, '14.95', ' ', 0, 0, ''),
(173, 'STASTRSGX0Q', 'Stanley 9" Roller Plus 2 Sleev', 0, ' ', 0, 4, 3, '7.95', ' ', 0, 0, ''),
(174, 'STASTRMS1LL', 'Stanley Strmsill Roller Kit 4"', 0, ' ', 0, 4, 3, '4.95', ' ', 0, 0, ''),
(175, 'STA005927', 'Hand Sander 230mm x 80mm', 0, ' ', 0, 4, 3, '11.95', ' ', 0, 0, ''),
(176, 'STA418226', 'Punch Set', 0, ' ', 0, 4, 3, '19.95', ' ', 0, 0, ''),
(177, 'STA194658', 'Microtough Socket Set 50pc 1/4', 0, ' ', 0, 4, 3, '0.00', ' ', 0, 0, ''),
(178, 'STA489907', 'Ratcheting Wrench Set 6pc', 0, ' ', 0, 4, 3, '32.95', ' ', 0, 0, ''),
(179, 'STA6MR100', 'All Steel Riveter', 0, ' ', 0, 4, 3, '25.95', ' ', 0, 0, ''),
(180, 'KUN2030L', 'Latex Dip Work Gloves', 0, '', 0, 4, 4, '2.68', '', 0, 0, ''),
(181, 'KUNAP1200', 'Leather Carpenter Apron', 0, ' ', 0, 4, 4, '31.16', ' ', 0, 0, ''),
(182, 'KUNAP1300', 'Leather Carpenter Apron', 0, '', 0, 4, 4, '19.16', '', 0, 0, ''),
(184, 'KUNAP1429', 'Siearra 12 Pocket Apron', 0, '', 0, 4, 4, '34.95', '', 0, 0, ''),
(185, 'KUNAP622', 'Leather Carp Split Grain Apron', 0, '', 0, 4, 4, '54.34', '', 0, 0, ''),
(186, 'KUNEL5623', 'Padded Comfort Belt', 0, '', 0, 4, 4, '29.98', '', 0, 0, ''),
(188, 'KUNEL892', 'Back Support With Braces', 0, '', 0, 4, 4, '28.95', '', 0, 0, ''),
(189, 'KUNHM1218', 'Large Tape Holder-Fabric', 0, '', 0, 4, 4, '11.95', '', 0, 0, ''),
(190, 'KUNHM219', 'Leather Swing Hammer Holder', 0, '', 0, 4, 4, '10.95', '', 0, 0, ''),
(191, 'KUNHM220', 'Leather Snap in Hammer Holder', 0, '', 0, 4, 4, '12.95', '', 0, 0, ''),
(192, 'KUNS5023', 'Cordless Drill Holder', 0, '', 0, 4, 4, '19.04', '', 0, 0, ''),
(193, 'KUNSP15CR', 'Cearpenters Tool Braces 15in W', 0, '', 0, 4, 4, '19.95', '', 0, 0, ''),
(194, 'KUNSP15N', 'Navy Braces 2in Wide', 0, '', 0, 4, 4, '19.95', '', 0, 0, ''),
(195, 'KUNEL901', 'Top Grain Leather Belt 2"', 0, '', 0, 4, 4, '19.95', '', 0, 0, ''),
(196, 'KUN51625', 'Padded Comfort Belt 5" Wide', 0, '', 0, 4, 4, '28.95', '', 0, 0, ''),
(197, 'KUNHM1214', 'Top Grain Leather Tape Holder', 0, '', 0, 4, 4, '10.95', '', 0, 0, ''),
(198, 'KUNAP1836', '5pkt Framers Nail/Tool Pouch', 0, '', 0, 4, 4, '27.95', '', 0, 0, ''),
(199, 'KUNSG5021', 'Impact Driver Holster', 0, '', 0, 4, 4, '17.95', '', 0, 0, ''),
(200, 'KUNPL767', 'Plier/Tool Holder', 0, '', 0, 4, 4, '7.95', '', 0, 0, ''),
(201, 'KUNP15PT', 'Painter Braces 2" Wide', 0, '', 0, 4, 4, '19.95', '', 0, 0, ''),
(202, 'KUNLYBRACES', 'Tan FLY Braces 2" Wide', 0, '', 0, 4, 4, '19.95', '', 0, 0, ''),
(203, 'KUNPL21', 'Utility Knife & Plier Holder', 0, '', 0, 4, 4, '7.95', '', 0, 0, ''),
(204, 'XXXFLOATX09', 'Fine Red Rubber Float 9in', 0, '', 0, 4, 5, '17.95', '', 0, 0, ''),
(205, 'M/T3411D', 'Brick trowel 11in Durasoft Han', 0, ' ', 0, 4, 5, '36.95', ' ', 0, 0, ''),
(206, 'M/T1911D', 'Brick Trowel Red Durasoft Hand', 0, ' ', 0, 4, 5, '0.00', ' ', 0, 0, ''),
(207, 'M/TMXS1H', 'Finishing Trowel 11x4.1/2', 0, ' ', 0, 4, 5, '39.95', ' ', 0, 0, ''),
(208, 'M/TMXS77D', 'Cement Trowel 18in Durasoft', 0, ' ', 0, 4, 5, '42.95', ' ', 0, 0, ''),
(209, 'M/TMX14', 'Concete Groover 6in x 31in', 0, ' ', 0, 4, 5, '15.95', ' ', 0, 0, ''),
(210, 'M/TMXS1SS', 'S/Steel Trowel 11x4.1/2', 0, ' ', 0, 4, 5, '39.95', ' ', 0, 0, ''),
(211, 'M/TMPB1GSD', 'Gold Plaster Trowel 11x4.1/2', 0, ' ', 0, 4, 5, '39.95', ' ', 0, 0, ''),
(212, 'M/TMPB13SSD', 'Pre-Worn S/S Plast Trowel 13in', 0, '', 0, 4, 5, '45.95', '', 0, 0, ''),
(213, 'M/TMPB14SSD', 'Pre-Worn S/S Plaster Trowel 14', 0, ' ', 0, 4, 5, '47.95', ' ', 0, 0, ''),
(214, 'M/T520', 'Margin Trowel 5in x 2in Duraso', 0, ' ', 0, 4, 5, '19.95', ' ', 0, 0, ''),
(215, 'M/T455D', 'Pointing Trowel 5in Durasoft', 0, ' ', 0, 4, 5, '16.95', ' ', 0, 0, ''),
(216, 'M/T65SSD', 'Corner Trowel INS.SQ Durasoft', 0, ' ', 0, 4, 5, '16.95', ' ', 0, 0, ''),
(217, 'M/T67SSD', 'Corner Trowel EXT.SQ Durasoft', 0, ' ', 0, 4, 5, '16.95', ' ', 0, 0, ''),
(218, 'M/T1', 'M1D Aluminium Hawk 13"x13"', 0, ' ', 0, 4, 5, '21.95', ' ', 0, 0, ''),
(219, 'M/TCL64D', 'Cam Lock Trowel 14" x4"', 0, ' ', 0, 4, 5, '29.95', ' ', 0, 0, ''),
(220, 'M/T48D', 'Gauging Trowel 7 x 3.3/8" Dura', 0, ' ', 0, 4, 5, '0.00', ' ', 0, 0, ''),
(221, 'RST1611ST', 'Soft Touch Brick Trowel 11in', 0, ' ', 0, 4, 6, '7.32', ' ', 0, 0, ''),
(222, 'RST1016ST', 'Soft Touch Point Trowel 6in', 0, ' ', 0, 4, 6, '3.96', ' ', 0, 0, ''),
(223, 'RST124BST', 'Soft Touch Float B/Handle 11 i', 0, ' ', 0, 4, 6, '7.44', ' ', 0, 0, ''),
(224, 'RST8002ST', 'Soft Notched Trowel SQ 6x6mm', 0, ' ', 0, 4, 6, '12.95', ' ', 0, 0, ''),
(225, 'RST4036', 'RST Multi Mixer Quick Mix 100m', 0, ' ', 0, 4, 6, '8.95', ' ', 0, 0, ''),
(226, 'RSTRTR16SSD', 'S/Grip Finishing Trowel 16in x', 0, ' ', 0, 4, 6, '14.95', ' ', 0, 0, ''),
(227, 'RSTRTR13SSD', 'S/Grip Finishing Trowel 13in x', 0, '', 0, 4, 6, '9.95', '', 0, 0, ''),
(229, 'RSTRTR401', 'Aluminum Hawk', 0, ' ', 0, 4, 6, '14.95', ' ', 0, 0, ''),
(230, 'RST104A', 'Tuck Pointer 3/8"', 0, ' ', 0, 4, 6, '5.95', ' ', 0, 0, ''),
(231, 'RST104B', 'Tuck Pointer 1/2"', 0, ' ', 0, 4, 6, '5.95', ' ', 0, 0, ''),
(232, 'B/S09305', 'Aviation Tinsnip set 3pc', 0, ' ', 0, 4, 7, '16.95', ' ', 0, 0, ''),
(233, 'B/S08184', '82pc Electrical set', 0, ' ', 0, 4, 7, '12.50', ' ', 0, 0, ''),
(234, 'B/S01502', 'Socket set 11pc 3/8sd', 0, ' ', 0, 4, 7, '26.95', ' ', 0, 0, ''),
(235, 'B/S05701', 'Framing Square 24" x 16"', 0, ' ', 0, 4, 7, '8.95', ' ', 0, 0, ''),
(236, 'FAI300', 'Orange Poly Brick Line 18m', 0, ' ', 0, 4, 8, '1.95', ' ', 0, 0, ''),
(237, 'FAI302', 'Twisted Nylon Chalk Line 18m', 0, ' ', 0, 4, 8, '1.95', ' ', 0, 0, ''),
(238, 'FAIBC12EC', 'Bolt Cutter End Cut 12in', 0, ' ', 0, 4, 8, '38.95', ' ', 0, 0, ''),
(239, 'FAICPG', 'Carpenters Pencils (green 3 cr', 0, ' ', 0, 4, 8, '3.95', ' ', 0, 0, ''),
(240, 'FAIECH', 'End Cutter Plier Holder (belt ', 0, ' ', 0, 4, 8, '6.95', ' ', 0, 0, ''),
(241, 'FAIHH2', 'Swivel Hammer Holder', 0, ' ', 0, 4, 8, '6.95', ' ', 0, 0, ''),
(242, 'FAILB', 'Line Blocks Plus 18m Line', 0, ' ', 0, 4, 8, '3.95', ' ', 0, 0, ''),
(243, 'FAIBLREEL', 'Brick Line On Spool 75m', 0, ' ', 0, 4, 8, '8.95', ' ', 0, 0, ''),
(244, 'FAIMP120', 'Mixing Padle 120mm', 0, ' ', 0, 4, 8, '13.95', ' ', 0, 0, ''),
(245, 'FAIPLEC8', 'End Cutting Plier 8in', 0, '', 0, 4, 8, '17.95', '', 0, 0, ''),
(246, 'FAISDVDESPH', 'Soft Grip VDE S/Driver Set Phi', 0, ' ', 0, 4, 8, '27.95', ' ', 0, 0, ''),
(247, 'FAISDVDESPZ', 'SOft Grip VDE S/Driver Set Poz', 0, ' ', 0, 4, 8, '27.95', ' ', 0, 0, ''),
(248, 'FAIST102', 'Professional Chisel Knife 1.1/', 0, ' ', 0, 4, 8, '6.09', ' ', 0, 0, ''),
(249, 'FAIST103', 'Professional Stripping Knife 5', 0, ' ', 0, 4, 8, '6.33', ' ', 0, 0, ''),
(250, 'FAIST104', 'Professional Stripping Knife 6', 0, ' ', 0, 4, 8, '6.81', ' ', 0, 0, ''),
(251, 'FAIST105', 'Professional Stripping Knife 7', 0, ' ', 0, 4, 8, '6.72', ' ', 0, 0, ''),
(252, 'FAIST107', 'Professional Putty Knife 38mm', 0, ' ', 0, 4, 8, '6.19', ' ', 0, 0, ''),
(253, 'FAIST110', 'Professional Filling Knife 25m', 0, ' ', 0, 4, 3, '5.80', ' ', 0, 0, ''),
(254, 'FAIST112', 'Professional Filling Knife 50m', 0, ' ', 0, 4, 8, '6.38', ' ', 0, 0, ''),
(255, 'FAIST115', 'Professional Filling Knife 100', 0, ' ', 0, 4, 8, '9.31', ' ', 0, 0, ''),
(256, 'FAIWB30', 'Wrecking Bar 30in x 3/4', 0, ' ', 0, 4, 8, '19.95', ' ', 0, 0, ''),
(257, 'FAISGTS', 'Soft Grip Triangular Shavebook', 0, ' ', 0, 4, 8, '3.95', ' ', 0, 0, ''),
(258, 'FAITAPEMAS2', 'Masking Tape 25mm x50mm', 0, ' ', 0, 4, 8, '2.75', ' ', 0, 0, ''),
(259, 'FAITAPEMAS5', 'Masking Tape 50mm x50mm', 0, ' ', 0, 4, 8, '3.95', ' ', 0, 0, ''),
(260, 'FAIRTRAY4', 'Plastic Roller Kit Tray 4in', 0, ' ', 0, 4, 8, '1.95', ' ', 0, 0, ''),
(261, 'FAIPBSY12', 'Superflow Synthetic Paint Brus', 0, ' ', 0, 4, 8, '2.75', ' ', 0, 0, ''),
(262, 'FAIPBSY34', 'Superflow Synthetic Paint Brus', 0, ' ', 0, 4, 8, '2.95', ' ', 0, 0, ''),
(263, 'FAIPBSY1', 'Superflow Synthetic Paint Brus', 0, ' ', 0, 4, 8, '4.50', ' ', 0, 0, ''),
(264, 'FAIBSY112', 'Superflow Synthetic Paint Brus', 0, ' ', 0, 4, 8, '4.95', ' ', 0, 0, ''),
(265, 'FAIPBSY2', 'superflow Synthetic Paint Brus', 0, ' ', 0, 4, 8, '6.95', ' ', 0, 0, ''),
(266, 'FAIBSY3', 'Superflow Synthetic Paint Brus', 0, '', 0, 4, 8, '10.95', '', 0, 0, ''),
(267, 'FAIBSY4', 'Superflow Synthetic Paint Brus', 0, ' ', 0, 4, 8, '14.95', ' ', 0, 0, ''),
(268, 'FAIPLANE601', '60.1/2 Block Plane InWooden Bo', 0, ' ', 0, 4, 8, '29.95', ' ', 0, 0, ''),
(269, 'FAIBB3PG', 'Brick Bolster 3in With Grip', 0, ' ', 0, 4, 8, '10.95', ' ', 0, 0, ''),
(270, 'FAIBB3', 'Brick Bolster 3in', 0, ' ', 0, 4, 8, '8.95', ' ', 0, 0, ''),
(271, 'FAIBB4', 'Brick Bolster 4in', 0, ' ', 0, 4, 8, '9.95', ' ', 0, 0, ''),
(272, 'FAIBB4PG', 'Brick Bolster 4in With Grip', 0, ' ', 0, 4, 8, '11.95', ' ', 0, 0, ''),
(273, 'FAISSINKS4', 'Sewsink Set (4)', 0, ' ', 0, 4, 8, '18.21', ' ', 0, 0, ''),
(274, 'FAIDSH', 'Hickory Souble Scutch Hammer', 0, '', 0, 4, 8, '14.95', ' ', 0, 0, ''),
(275, 'FAIBJ1258', 'Brick Jointer 1/2inx5\\8in', 0, ' ', 0, 4, 8, '6.95', ' ', 0, 0, ''),
(276, 'FAISGBUCKW', 'Sodt Grip Bucket Towel', 0, ' ', 0, 4, 8, '6.95', ' ', 0, 0, ''),
(277, 'FAIPSTNOTP', 'Plastic Trowel Notched 4mm & 7', 0, ' ', 0, 4, 8, '6.95', ' ', 0, 0, ''),
(278, 'FAISGTNOT10', 'Soft Grip Notched Trowel s/s 1', 0, ' ', 0, 4, 8, '9.95', ' ', 0, 0, ''),
(279, 'FAISPOFLOAT', 'Sponge Float 11" x 4.1/2"', 0, ' ', 0, 4, 8, '11.95', ' ', 0, 0, ''),
(280, 'FAISGTUCK10', 'Soft Grip Pointer 10mm', 0, '', 0, 4, 8, '4.95', ' ', 0, 0, ''),
(281, 'FAISGTUCK16', 'Soft Grip Pointer 16mm', 0, '', 0, 4, 8, '4.95', '', 0, 0, ''),
(282, 'FAISGTSET5', 'Soft Grip Trowel Set 5pc', 0, ' ', 0, 4, 8, '19.95', ' ', 0, 0, ''),
(283, '', 'Trowel', 0, ' ', 0, 4, 8, '3.95', ' ', 0, 0, ''),
(284, '', 'Trowel', 0, ' ', 0, 4, 8, '6.95', ' ', 0, 0, ''),
(285, '', 'Trowel', 0, ' ', 0, 4, 8, '0.00', ' ', 0, 0, ''),
(286, '', 'Trowel', 0, ' ', 0, 4, 8, '0.00', ' ', 0, 0, ''),
(287, '', 'Trowel', 0, ' ', 0, 4, 8, '0.00', ' ', 0, 0, ''),
(288, 'FAISDSET7', 'Soft Grip Screwdriver Set 7pc', 0, '', 0, 4, 8, '0.00', '', 0, 0, ''),
(289, 'FAI1153M', '25 Cut Off Wheel 115mm Metal', 0, ' ', 0, 4, 8, '1.10', ' ', 0, 0, ''),
(290, 'FAI1153S', '25 Cut Off Wheel 115mm Stone', 0, ' ', 0, 4, 8, '1.12', ' ', 0, 0, ''),
(291, 'FAI2303S', '10 Cut Off Wheel 230mm Stone', 0, ' ', 0, 4, 8, '14.95', ' ', 0, 0, ''),
(292, 'FAI2303M', '10 Cut Off Wheel 230mm Metal', 0, ' ', 0, 4, 8, '13.95', ' ', 0, 0, ''),
(293, 'FAISUKEY', '4 Way Services Utility Meter K', 0, ' ', 0, 4, 8, '3.95', ' ', 0, 0, ''),
(294, 'FAIRADKEY', 'RAdiator Keys-Brass (card 2)', 0, ' ', 0, 4, 8, '2.95', ' ', 0, 0, ''),
(295, 'FAIRTRAY4', '12 Plastic Roller Kit Tray 4in', 0, ' ', 0, 4, 8, '1.95', ' ', 0, 0, ''),
(296, 'FAIHKS9ML', 'Hex Key Set (9) Metric Long Ar', 0, ' ', 0, 4, 8, '16.95', ' ', 0, 0, ''),
(297, 'FAIHKS9AFL', 'Hex Key Set (9) A/F Long Arm', 0, ' ', 0, 4, 8, '16.95', ' ', 0, 0, ''),
(298, 'FAIHKS8M', 'Hex Key Set (8) Metric Short A', 0, ' ', 0, 4, 8, '5.95', ' ', 0, 0, ''),
(299, 'FAIHKS8AF', 'Hex Key Set (8) A/F Short Arm', 0, ' ', 0, 4, 8, '5.95', ' ', 0, 0, ''),
(300, 'FAIMG', 'Mastic Gun 425ml', 0, ' ', 0, 4, 8, '6.95', ' ', 0, 0, ''),
(301, 'FAIDB115C', 'Contract Diamond Blade 115mm', 0, ' ', 0, 4, 8, '12.95', ' ', 0, 0, ''),
(302, 'FAIDB230C', 'Contract Diamond Blade 230mm', 0, ' ', 0, 4, 8, '19.95', ' ', 0, 0, ''),
(303, 'FAIPLB50C', 'Padlock Brass 50mm', 0, ' ', 0, 4, 8, '6.95', ' ', 0, 0, ''),
(304, 'FAIPb25c', 'Padlock Brass 25mm', 0, ' ', 0, 4, 8, '3.95', ' ', 0, 0, ''),
(305, 'FAICT300W', 'Cable Ties', 0, ' ', 0, 4, 8, '5.95', ' ', 0, 0, ''),
(306, 'FAICT300B', 'Cable Ties', 0, ' ', 0, 4, 8, '5.95', ' ', 0, 0, ''),
(307, 'FAICT250W', 'Cable Ties', 0, ' ', 0, 4, 8, '4.95', ' ', 0, 0, ''),
(308, 'FAICT250B', 'Cable Ties', 0, ' ', 0, 4, 8, '4.95', ' ', 0, 0, ''),
(309, 'FAICT200W', 'Cable Ties', 0, ' ', 0, 4, 8, '3.95', ' ', 0, 0, ''),
(310, 'FAICT200B', 'Cable Ties', 0, ' ', 0, 4, 8, '3.95', ' ', 0, 0, ''),
(311, 'FAI23033S', 'Cutting Wheel Single', 0, ' ', 0, 4, 8, '2.95', ' ', 0, 0, ''),
(312, 'FAISBSCOCDR', '1/4 Hex Squre Drive Adaptor 3p', 0, ' ', 0, 4, 8, '9.95', ' ', 0, 0, ''),
(313, 'FAIG4', 'G-Clamp 4in', 0, ' ', 0, 4, 8, '15.95', ' ', 0, 0, ''),
(314, 'FAIG6', 'G-Clamp 6in', 0, ' ', 0, 4, 8, '19.95', ' ', 0, 0, ''),
(315, 'FAIPHAWK', 'Plastic Hawk', 0, ' ', 0, 4, 8, '13.95', ' ', 0, 0, ''),
(316, 'FPPSL1000CT', '1000w 240v Sitelight Twin Adj ', 0, ' ', 0, 4, 8, '34.95', ' ', 0, 0, ''),
(317, 'FPPSL1000CT', '1000w 110v Sitelight Twin Adj ', 0, ' ', 0, 4, 8, '34.95', ' ', 0, 0, ''),
(318, 'FPPSLTUBE55', 'Dual Task Light Tube 55w 110/2', 0, ' ', 0, 4, 8, '10.95', ' ', 0, 0, ''),
(319, 'FAISB55014', 'Mitre Saw Blade 550mm x 14t-Ge', 0, ' ', 0, 4, 8, '6.95', ' ', 0, 0, ''),
(320, 'FAISB56518', 'Mitre Saw Blade 565mm x 18t-Fi', 0, ' ', 0, 4, 8, '7.95', ' ', 0, 0, ''),
(321, 'FPPCR15MER', 'Easy Cable Reel 230v 15m 13a 4', 0, ' ', 0, 4, 8, '28.95', ' ', 0, 0, ''),
(322, 'FPPCR10M10A', 'Cable Reel 230v 10m 10a 4 Sock', 0, ' ', 0, 4, 8, '19.95', ' ', 0, 0, ''),
(323, 'FAIZ13630C', 'TCT Trim Saw Blade 136mm x 10m', 0, ' ', 0, 4, 8, '27.95', ' ', 0, 0, ''),
(324, 'FAISSHD', 'Scaffold Spanner Holder-Double', 0, ' ', 0, 4, 8, '6.95', ' ', 0, 0, ''),
(325, 'FAIWDBSET5', 'Lip & Spur Wood Drillbit (set5', 0, ' ', 0, 4, 8, '10.95', ' ', 0, 0, ''),
(326, 'FAIZ13616C', 'TCT Trim Saw Blade 136mm x 10m', 0, ' ', 0, 4, 8, '29.95', ' ', 0, 0, ''),
(327, 'FAICM4', 'Carpenters Mallet 4"', 0, ' ', 0, 4, 8, '11.95', ' ', 0, 0, ''),
(328, 'FAIFLEX28B', 'Polyethylene Flex Tub 28l Blac', 0, ' ', 0, 4, 8, '5.95', ' ', 0, 0, ''),
(329, 'FAIFLEX28B', 'Polyethylene Flex Tub 28l Blac', 0, ' ', 0, 4, 8, '5.95', ' ', 0, 0, ''),
(330, 'FAIFLEX42B', 'Polyethylene Flex Tub 42l Blac', 0, ' ', 0, 4, 8, '7.95', ' ', 0, 0, ''),
(331, 'FAIFLEX60B', 'Polyethylene Flex Tub 60l Blac', 0, ' ', 0, 4, 8, '9.95', ' ', 0, 0, ''),
(332, 'FAIPLUMBAUT', 'Automatic Plumbline 140z', 0, ' ', 0, 4, 8, '29.95', ' ', 0, 0, ''),
(333, 'FPPSLT300W2', '300x 230v Halogen Tubes (2)', 0, ' ', 0, 4, 8, '3.95', ' ', 0, 0, ''),
(334, 'FPPSLT300WL', '300w 110v Halogen Tubes (2)', 0, ' ', 0, 4, 8, '3.95', ' ', 0, 0, ''),
(335, 'FAILFLOAT', 'Large Plastic Float 14" x 6"', 0, ' ', 0, 4, 8, '8.95', ' ', 0, 0, ''),
(336, 'FAIPLCHSET', '1m Chain & Padlock', 0, ' ', 0, 4, 8, '25.95', ' ', 0, 0, ''),
(337, 'FAIRMW214', 'Rubber Mallet White 57mm / 2.2', 0, ' ', 0, 4, 8, '11.95', ' ', 0, 0, ''),
(338, 'FAIRMW3', 'Rubber Mallet White 76mm / 3.0', 0, ' ', 0, 4, 8, '12.95', ' ', 0, 0, ''),
(339, 'XMS12BIT422', 'S/Driver Security Bit Set 60pc', 0, ' ', 0, 4, 8, '22.95', ' ', 0, 0, ''),
(340, 'XMS12COMB', 'Combination Square 12in', 0, ' ', 0, 4, 8, '13.95', ' ', 0, 0, ''),
(341, 'FAICS400', 'Combination Square 16in', 0, ' ', 0, 4, 8, '19.95', ' ', 0, 0, ''),
(342, 'FAICS150', 'Combination Square 6in', 0, ' ', 0, 4, 8, '6.95', ' ', 0, 0, ''),
(343, 'FAITRY6', 'Carpenters Try Square 6"', 0, ' ', 0, 4, 8, '13.95', ' ', 0, 0, ''),
(344, 'FAITRY9', 'Carpenters Try Square 9"', 0, '', 0, 4, 8, '17.95', '', 0, 0, ''),
(345, 'FAITRY12', 'Carpenters Try Square 12"', 0, '', 0, 4, 8, '21.95', '', 0, 0, ''),
(346, 'FAIES3', 'Engineers Square 3"', 0, ' ', 0, 4, 8, '8.95', ' ', 0, 0, ''),
(347, 'FAIES4', 'Engineers Square 4"', 0, ' ', 0, 4, 8, '11.95', ' ', 0, 0, ''),
(348, 'FAIES6', 'Engineers Square 6"', 0, ' ', 0, 4, 8, '13.95', ' ', 0, 0, ''),
(349, 'FAIES9', 'Engineers Square 9"', 0, ' ', 0, 4, 8, '23.95', ' ', 0, 0, ''),
(350, 'XMS12SHOVEL', 'All Steel Folding Shovel Round', 0, ' ', 0, 4, 8, '7.99', ' ', 0, 0, ''),
(351, 'XMS12TASK', 'Task light 240v 38w Fluorescen', 0, ' ', 0, 4, 8, '21.95', ' ', 0, 0, ''),
(352, 'XMS12PLANES', 'No.4 and No.60.1/2 Planes Wood', 0, ' ', 0, 4, 8, '39.95', ' ', 0, 0, ''),
(353, 'FAISLVG1000', 'H/Duty V Pipe Groove Level 100', 0, ' ', 0, 4, 8, '29.95', ' ', 0, 0, ''),
(354, 'FAISLVG1200', 'H/Duty V Pipe Groove Level 120', 0, ' ', 0, 4, 8, '39.95', ' ', 0, 0, ''),
(355, 'FAISLVG300', 'H/Duty V Pipe Groove Level 300', 0, ' ', 0, 4, 8, '14.95', ' ', 0, 0, ''),
(356, 'FAISLVG600', 'H/Duty V Pipe Groove Level 600', 0, ' ', 0, 4, 8, '19.95', ' ', 0, 0, ''),
(357, 'XMS12SPANNE', 'Flexi Head Ratchet Spanner Set', 0, ' ', 0, 4, 8, '27.95', ' ', 0, 0, ''),
(358, 'FAIGROUTER', 'Rubber Grouter 210mm x 110mm', 0, ' ', 0, 4, 8, '9.95', ' ', 0, 0, ''),
(359, 'FAIDSNW129', 'Dust Sheet NonWoven 12ft x 8ft', 0, '', 0, 4, 8, '7.95', '', 0, 0, ''),
(360, 'FAIDSPC128N', 'Dust Sheet Contton Twill Poly ', 0, ' ', 0, 4, 8, '11.95', ' ', 0, 0, ''),
(361, 'FAITARP129', 'Taurpalin (eye) Green/Sil 12ft', 0, '', 0, 4, 8, '0.00', '', 0, 0, ''),
(362, 'XMS12SCREW', 'Screwdriver Set 18pc', 0, ' ', 0, 4, 8, '0.00', ' ', 0, 0, ''),
(363, 'XMS12TIEDOW', 'Ratchet Tie Down Set 4pc', 0, ' ', 0, 4, 8, '19.95', ' ', 0, 0, ''),
(364, 'XMS12KNIFE', 'Pocket Knife with Blade Storag', 0, ' ', 0, 4, 8, '9.95', ' ', 0, 0, ''),
(365, 'FAIPINKEY', 'Adjustable Pin Key For Angle G', 0, ' ', 0, 4, 8, '0.00', ' ', 0, 0, ''),
(366, 'FAIUBARAV', 'Utility Bar Twin Pack 7in & 14', 0, ' ', 0, 4, 8, '0.00', ' ', 0, 0, ''),
(367, 'FAINP116SH', 'Nail Punch 1/16" - Square Head', 0, ' ', 0, 4, 8, '2.95', ' ', 0, 0, ''),
(368, 'FAISTGROUT6', 'Soft Grip Grout Trowel 6 x 2.5', 0, ' ', 0, 4, 8, '8.95', ' ', 0, 0, ''),
(369, 'FAISGGROUT1', 'Soft Grip Grout Trowel 4x12"', 0, ' ', 0, 4, 8, '10.95', ' ', 0, 0, ''),
(370, 'FAISGTCEXTS', 'Soft Grip Corner Trowel S/S 4x', 0, ' ', 0, 4, 8, '8.95', ' ', 0, 0, ''),
(371, 'FAISGTCINTS', 'Soft Grip Corner Trowel S/S 4x', 0, ' ', 0, 4, 8, '8.95', ' ', 0, 0, ''),
(372, 'FAICHUCK12', 'Chuck 13mm 1/2 x 20 + key + sd', 0, ' ', 0, 4, 8, '9.95', ' ', 0, 0, ''),
(373, 'FAI115110MU', 'Cut Off Wheel 115mm x 1.0 x 22', 0, ' ', 0, 4, 8, '0.00', ' ', 0, 0, ''),
(374, 'FAIHBB35', 'TC Hinge Bore Bit 35mm x 60mm ', 0, ' ', 0, 4, 8, '0.00', ' ', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `productID` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `reviewTitle` varchar(15) NOT NULL,
  `reviewBody` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
